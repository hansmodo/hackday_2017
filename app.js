import * as PubSub from './modules/PubSub';
import * as Browser from './modules/Browser.js';
import * as Conf from './modules/Config';
import * as IO from './modules/IO';
import * as User from './modules/User';
import * as Folders from './modules/Folders';
import * as Model from './modules/Model.js';
import * as Facets from './modules/Facets.js';
import * as Results from './modules/Results.js';
import * as DB from './js/db.js';

//expose in global namespace for debugging during development.
window.Letterati = {model:Model,db:DB,results:Results,folders:Folders};
//dom refs
let $parent = document.querySelector('.'+Conf.CSS.PARENT);

/*
//check if we can persist
if (navigator.storage && navigator.storage.persisted){
  navigator.storage.persisted().then(persistPermission => {
    console.log("persistPermission:",persistPermission);
    if(!persistPermission){
      navigator.storage.persist().then(granted => {
        console.log("...granted:",granted);
      });
    }else{
      console.log("storage persistence already granted")
    }
  });
}
*/




//Context Messaging

/*
* send a message to the active tab (content page) indicating the plugin has loaded.
* listen for a response with scaped content from active tab.
*/
function sendMsgPluginLoaded(activeTabId){
  //console.log("sendMsgPluginLoaded to tab:",activeTabId);
  if(activeTabId){
		//const stylesheet = chrome.extension.getURL('/css/content.css');
    chrome.tabs.sendMessage(activeTabId, { 'popup':'load','stylesheet':chrome.extension.getURL('/css/content.css')}, function(response) {
      //console.log("popup:load response",response);
      if(response && response.content_data){
        //console.log("response.content_data: ",response.content_data);
        Model.set(response.content_data);
      }else {
        console.log("no_active_tab_response");
      }
    });
  }
};

Browser.getActiveTabId.then( sendMsgPluginLoaded );

/*
chrome.windows.onFocusChanged.addListener(function(window) {
	console.log('app: window closed')
});
*/

/*
* when facet checked/unchecked
*/
function handleFacetChange(data){
  console.log("App.handleFacetChange:",data);
  if(data && data.checked){
    switch(data.group){
      case 'people':
        getSubjectDocs(data);//search for more people
        break;
      case 'year':
        Results.setYear(data.subject);//trigger results w/this yr.
        break;
      case 'location':
        Results.setLocation(data.subject);//trigger results w/this location.
        break;
      default:
        console.warn("cannot handle unknown facet type:",data.group);
        break;
    }
  }
};

/*
* big hairy mess. gets txt file via chrome url as blob, reads, injects to screen
*/
function onResultsCntrClick(evt){
  console.log("handleResultsCntrClick:",evt);
  let target = evt.target;
  if(target.classList.contains(Conf.CSS.RESULT_MORE)){
    let bodyNode = document.querySelector('.'+Conf.CSS.DOC_BODY);
    let titleNode = document.querySelector('.'+Conf.CSS.DOC_TITLE);
    //console.log("...bodyNode:",bodyNode)
    let docId = target.getAttribute('href').split('/').pop();
    let result = Results.getById(docId);
    if(result && result.media.type){
      if(result.media.type === 'letter'){
        titleNode.innerHTML = result.author.firstName + ' ' + result.author.lastName + ' ' + result.media.type + ' to ' + result.recipient.firstName + ' ' + result.recipient.lastName;
      }else if(result.media.type === 'journal'){
        titleNode.innerHTML = result.author.firstName + ' ' + result.author.lastName + ' ' + result.media.type + ' entry';
      }
    }

    console.log("....result:",result);
    let filePath = chrome.extension.getURL('/docs/'+docId+'.txt');
    //console.log("....filePath:",filePath);

    let reader = new FileReader();
    reader.onload = function(evt){
      //console.log("File ready");
      bodyNode.innerHTML = reader.result;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('GET', filePath, true);
    xhr.responseType = 'blob';
    xhr.onload = function(e) {
      if (this.status == 200) {
        //var Blob = this.response;
        reader.readAsText( this.response );
      }
    };
    xhr.send();

    transitionToDoc(Conf.CSS.READ_DOC);
  }
}

function onBackBtnClick(){
  transitionFromDoc(Conf.CSS.READ_DOC);
}
/* -- Search --*/
//only app file imports db and runs searches.

function getSubjectDocs(data){
	console.log("App.getSubjectDocs:",data.subject)
	let docs = DB.getByAuthor(data.subject);
	Results.update(docs);
}

/*-- get cookies that will determine if user is logged into Edmodo --*/
chrome.cookies.getAll({domain: 'edmodo.com'},
  function(cookies) {
    if(cookies){
      //console.log("Get cookies:",cookies);
      //filter and reduce the cookie api response
      cookies = cookies.filter(function(cookie){
        return ['edtr','logged_out'].indexOf(cookie.name) > -1;
      }).reduce((obj, item) => {
        obj[item.name] = item
        return obj
      }, {});

      if(cookies['edtr'] && cookies['logged_out']){
        //use case #1 - user logged out
        console.log("----- user is currently logged out. -----");
        User.setAuthStatus(false);
        }else if(cookies['edtr']){
        //use case #2 - user currently logged in
        //console.log("user logged in");
        User.setAuthStatus(true);
        IO.fetchCurrentUser().then( (resp) => {
          User.setUser(resp);
        });

        IO.fetchUserToken().then( (token) => {
          User.setUserToken(token);
          Folders.fetch(token).then(Folders.set);
        });

      }else{
        //use case #3 - user never logged in on current device or cleared cookies.
        console.log("user never logged in");
        User.setAuthStatus(false);
      }

    }
});

/*---- Other -------------*/

//As popup loads
document.addEventListener('DOMContentLoaded', function() {
  //
});

function closePlugin(e){
  window.close();
};

function onSaveBtnClick(){
  IO.addNoteToLibrary();
};
/*
* show  the 'Document' screen
*/
function showDoc(selector){
  let node = document.querySelector('.'+selector);
  node.classList.remove(Conf.CSS.TO_RIGHT);
  node.classList.add(Conf.CSS.ACTIVE, Conf.CSS.FROM_RIGHT);
};

function hideDoc(selector){
  let node = document.querySelector('.'+selector);
  node.classList.remove(Conf.CSS.FROM_RIGHT);
  node.classList.add(Conf.CSS.TO_RIGHT);
  setTimeout(function(){ node.classList.remove(Conf.CSS.ACTIVE) }, 500);
};

/*
* SHOW the main screen
*/
function showMain(){
  $parent.classList.add(Conf.CSS.FROM_LEFT);
  $parent.classList.remove(Conf.CSS.TO_LEFT);
};
/*
* HIDE the main screen
*/
function hideMain(){
  $parent.classList.add(Conf.CSS.TO_LEFT);
};

/*
* move main screen out to make room for a document read screen.
*/
function transitionToDoc(selector){
  //console.log("transitionToDoc:",selector);
  hideMain();
  showDoc(selector);
}

/*
* move doc screen out to make room for main screen.
*/
function transitionFromDoc(selector){
  console.log("transitionFromDoc:",selector);
  showMain();
  hideDoc(selector);
}

/*------------------------*/
/*-- dom event handling --*/
document.querySelector('.'+Conf.CSS.RESULTS).addEventListener('click', onResultsCntrClick, false);
document.querySelector('.dismiss-control.document').addEventListener('click', onBackBtnClick, false);
document.querySelector('.save.btn').addEventListener('click', onSaveBtnClick, false);
document.querySelector('.cancel.btn').addEventListener('click', closePlugin, false);
/*-- custom event mediation between modules --*/
//called once on load
PubSub.subscribe('model:set', Facets.render);
//called as facet selection changes
PubSub.subscribe('search:facets:changed', handleFacetChange);
PubSub.subscribe('library:item:added', function(data){console.log("library:item:added says",data)});
