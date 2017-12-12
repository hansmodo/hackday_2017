
/*
* This context has PARTIAL access to the chrome apis
* and full access to content page dom.
*/

(function(){
  const RE_IMG_URL      = /(https?:\/\/.*\.(?:png|jpg|jpeg|gif))/;
  const MAX_IMG_WIDTH   = 260;

  let people = [];

  /*
  * return list of data objects describing page.
  */
  function getData(){
    console.log("content_context getData");
    let data = Array.from(document.querySelectorAll('head meta'))
    .map( (item) => {
      let meta={};
      let metaName = item.getAttribute('name') || item.getAttribute('property');
      if(metaName){
        meta[metaName.toLowerCase()] = item.getAttribute('content');
      }
      return meta;
    })
    .filter( (item) => {
      return ['author','og:image','twitter:image','thumbnail','og:title','twitter:title','keywords','description','og:description','twitter:description','article:tag','og:type'].indexOf( Object.keys(item).pop() ) > -1;
    });
    //add the page title
    data.push( {title:document.getElementsByTagName('title')[0].innerText} );
    //console.log("data:",data);

    //add images from body
    let imgs = Array.from(document.querySelectorAll('img'))
    .filter( (item) => {
      //console.log('item.src:',item.src);
      let isFullpath = RE_IMG_URL.test(item.src);
      let isBigEnough = item.height >= 40;
      return isBigEnough && isFullpath;
    })
    .map((item) => {
      return {src:item.src, large:!!(item.naturalWidth >= MAX_IMG_WIDTH)};
    })

    //add headers from the body (e.g. h1...)
    let headers = Array.from(document.querySelectorAll('h1,h2'))
    .map( (item) => {
      return header={level:item.nodeName,text:item.innerText};
    });

    data.push({imgs:imgs});
    data.push({url:document.location.href});
    data.push({headers:headers});
    //console.log('data:',data);
    return data;
  };

  /*
  * recursively walk through a given node looking for text.
  * ignore whitespace textnodes
  * aggregator arg should be array. keeps value between recursive calls
  * e.g. document.body
  */
  function findTextInNode(node, regex, aggregator){
    //console.log("findTextInNode aggregator:",aggregator);
    let nodeNameList = ['div','p','section','article','a'];
    let childNodes = Array.from(node.childNodes);
    childNodes.forEach(function(child){
      //console.log(child)
      let nodeName = child.nodeName.toLowerCase();
      if( nodeNameList.includes(nodeName) ){
        //console.log(child.nodeName.toLowerCase());
        findTextInNode(child,regex,aggregator);
      }else if(nodeName === '#text' && child.nodeValue.trim()){//ignore whitespace
        let matches = getMatchesInStr(child.nodeValue, regex);
        //console.log("...matches:",matches);
        //aggregator = aggregator.concat(matches);
        aggregator.push.apply(aggregator, matches);
        //console.log("...aggregator:",aggregator);
        if(matches.length){
          //console.log(child," ",child.length);
          decorateTextNode(child, matches);
        }
      }
    });
  }

  /*
  * return array of matches given a string to search and a regular expression.
  */
  function getMatchesInStr(str, regex){
    //console.log("matchPersons:",str);
    //console.log("...regex:",regex);
    let matches = [];
    let m;

     while ((m = regex.exec(str)) !== null) {
        // This is necessary to avoid infinite loops with zero-width matches
        if (m.index === regex.lastIndex) {
            regex.lastIndex++;
        }
        matches.push({name:m[0],idx:m.index})
      }
      //console.log(matches);
      return matches;
  }

  /*
  * wrap span tags around text fragments within a text node.
  */
  function decorateTextNode(textNode, matches){
    //console.log("decorateTextNode matches:",matches);
    //add decoration in reverse - else text textNode length will be truncated.
    matches.reverse().forEach(function(match){
      let range = document.createRange();
      let span = document.createElement('span');
      span.classList.add('edmo-person');
      range.setStart(textNode, match.idx);
      range.setEnd(textNode, match.idx+match.name.length);
      range.surroundContents(span);
    })
  };

  /*
  * inject stylesheet into content page
  */
  function injectStylesheet(request){
    //console.log('injectStylesheet');
    if(request){
      //console.log('...request',request);
      let styleMarkup = `<link rel="stylesheet" href="${request.stylesheet}" type="text/css" media="screen" />`;
      document.querySelector('head').append( vivify(styleMarkup) );
    }
  }

  /*
  * given a string of markup return the equivelent set of dom nodes
  */
  function vivify(markup){
    let node = document.createElement('div')
    node.innerHTML = markup;
    return node.firstChild;
  }

  //listen to msgs from extension 'popup' context
  chrome.runtime.onMessage.addListener(
    function(request, sender, sendResponse) {
      //console.log('request:',request);
      if(request.popup === 'load'){
        console.log('popup load:',request)
        injectStylesheet(request);
        let data = getData();
        //let peopleRegex = new RegExp(request.regex, 'gi');
        //let people = [];
        //findTextInNode(document.body, peopleRegex, people);
        //console.log("...people:",people);
        data.push({'people':people});
        //console.log("...peopleRegex:",peopleRegex);
        sendResponse({'content_data':data});

      }
  });


  chrome.runtime.sendMessage({ 'content':'load' }, function(response) {
    //console.log("content load response",response);
    let peopleRegex = new RegExp(response.regex, 'gi');
    findTextInNode(document.body, peopleRegex, people);
    //console.log("people:",people);

    chrome.runtime.sendMessage({'content':'parsed','people':people});
  });


})();

//document.addEventListener("DOMContentLoaded", function(event) {
  //console.log('DOMContentLoaded');

//});

//console.log('Content Context');
