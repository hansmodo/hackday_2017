/*---- Browser sugar using Chrome apis -----*/
/*------------------------------------------*/

/*
* Promisify chrome api call to get id of active tab.
*/
let getActiveTabId = new Promise( (resolve, reject) => {
    chrome.tabs.query({active: true, lastFocusedWindow: true}, function(tabs) {
      //console.log("...tabs[0].id:",tabs[0].id);
      if(tabs && tabs.length > 0){
        resolve(tabs[0].id);
      }else{
        reject( new Error('No active tab found.') );
      }
   });
  }
);

export {
  getActiveTabId
}
