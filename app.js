import * as Browser from './modules/Browser.js';
import * as Model from './modules/Model.js';
import db from './js/db.js';

//expose in global namespace
window.Letterati = {model:Model};
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

// Open the database
db.open().catch(function(error) {
	alert('Uh oh : ' + error);
});


//Context Messaging

/*
* send a message to the active tab (content page) indicating the plugin has loaded.
* listen for a response with scaped content from active tab.
*/
function sendMsgPluginLoaded(activeTabId){
  console.log("sendMsgPluginLoaded to tab:",activeTabId);
  if(activeTabId){
		//const stylesheet = chrome.extension.getURL('/css/content.css');
    chrome.tabs.sendMessage(activeTabId, { 'popup':'load','stylesheet':chrome.extension.getURL('/css/content.css')}, function(response) {
      console.log("plugin load response",response);
      if(response && response.content_data){
        console.log("response.content_data: ",response.content_data);
        Model.set(response.content_data);
      }else {
        console.log("no_active_tab_response");
      }
    });
  }
};

Browser.getActiveTabId.then( sendMsgPluginLoaded );


  //example get operations:
  //db.source.get(3).then(source=> {console.log('source=',source)});
  //example of adding a single resource.
  //db.source.add({"locator":"https://www.someurl.com","title":"The Project Gutenberg eBook, ...something"});

	chrome.windows.onFocusChanged.addListener(function(window) {
	    console.log('background: window closed')
	});
