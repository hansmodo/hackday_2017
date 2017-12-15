import * as PubSub from './modules/PubSub';
import * as Browser from './modules/Browser.js';
import * as Conf from './modules/Config';
import * as Model from './modules/Model.js';
import * as Facets from './modules/Facets.js';
import * as Results from './modules/Results.js';
import * as DB from './js/db.js';

//expose in global namespace for debugging during development.
window.Letterati = {model:Model,db:DB,results:Results};
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

function onResultsCntrClick(evt){
  console.log("handleResultsCntrClick:",evt);
  let target = evt.target;
  if(target.classList.contains(Conf.CSS.RESULT_MORE)){
    let parentNode = document.querySelector('.'+Conf.CSS.READ_DOC);
    console.log("...parentNode:",parentNode)
    let docId = target.getAttribute('href').split('/').pop();
    //console.log("....docId:",docId);
    let filePath = chrome.extension.getURL('/docs/'+docId+'.txt');
    //console.log("....filePath:",filePath);

    let reader = new FileReader();
    reader.onload = function(evt){
      console.log("File ready");
      parentNode.innerHTML = reader.result;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('GET', filePath, true);
    xhr.responseType = 'blob';
    xhr.onload = function(e) {
      if (this.status == 200) {
        console.log("success")
        var myBlob = this.response;
        // myBlob is now the blob that the object URL pointed to.
        reader.readAsText(myBlob);
      }
    };
    xhr.send();





    transitionToConfirm(Conf.CSS.READ_DOC);
  }
}

/* -- Search --*/
//only app file imports db and runs searches.

function getSubjectDocs(data){
	console.log("App.getSubjectDocs:",data.subject)
	let docs = DB.getByAuthor(data.subject);

	Results.update(docs);
  //Results.put(docs);
}

/*---- Other -------------*/

//As popup loads
document.addEventListener('DOMContentLoaded', function() {
  //
});

function closePlugin(e){
  window.close();
};

/*
* show  the 'Save' or 'Share' confirmation screen
*/
function showConfirm(selector){
  document.querySelector('.'+selector).classList.add(Conf.CSS.ACTIVE, Conf.CSS.FROM_RIGHT);
};

/*
* HIDE the main screen
*/
function hideMain(){
  $parent.classList.add(Conf.CSS.TO_LEFT);
};

/*
* move main screen out to make room for a confirmation screen.
*/
function transitionToConfirm(selector){
  //console.log("transitionToConfirm:",selector);
  hideMain();
  showConfirm(selector);
}


/*------------------------*/
/*-- dom event handling --*/
document.querySelector('.'+Conf.CSS.RESULTS).addEventListener('click', onResultsCntrClick, false);

/*-- custom event mediation between modules --*/
//called once on load
PubSub.subscribe('model:set', Facets.render);
//called as facet selection changes
PubSub.subscribe('search:facets:changed', handleFacetChange);
