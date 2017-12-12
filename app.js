import * as PubSub from './modules/PubSub';
import * as Browser from './modules/Browser.js';
import * as Model from './modules/Model.js';
import * as Facets from './modules/Facets.js';
import * as Results from './modules/Results.js';
import * as DB from './js/db.js';

//expose in global namespace for debugging during development.
window.Letterati = {model:Model,db:DB};
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

/* -- Search --*/
//only app file imports db and runs searches.

function getSubjectDocs(data){
	console.log("getSubjectDocs")
	let docs = DB.getByAuthor(data.subject.name);
	//PubSub.publish('search:results:subject',docs);
	Results.render(docs);
}




//mediate custom events between modules
PubSub.subscribe('model:set', Facets.render);
PubSub.subscribe('model:set', getSubjectDocs);
