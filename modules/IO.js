import * as PubSub from './PubSub';
import {URL} from './Config';
import {userToken, getUserId} from './User';
import * as Model from './Model';

/*-- Fetch & Post methods --*/
/*--------------------------*/

function fetchCurrentUser() {
  console.log('fetchCurrentUser');
  return fetch(URL.EDMO_API_USR, {
    method: 'GET',
    credentials: 'include'
  })
  .then((response) => response.json())
  .then(function(resp){
    return resp;
  })
  .catch((err) => {
    console.log(err);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
    //mixpanel.track('browser_extension_desktop:fetch_user:error', logPayload);
  });

};

/*
* returns promise which resolves to user's access token
*/
function fetchUserToken(){
  //console.log('fetchUserToken');
  return fetch(URL.EDMO_GET_TKN, {
    method: 'GET',
    credentials: 'include'
  })
  .then((response) => {
    return response.json()
  })
  .catch((err)=>{
    console.log("fetchUserToken error:",err)
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
    //mixpanel.track('browser_extension_desktop:fetch_user_token:error', logPayload);
  });
};

function postToLibrary(post_data){
  console.log("postToLibrary:",post_data);
  if(post_data){
    let queryParams = '?access_token='+userToken.access_token;
    let apiUrl = URL.EDMO_API_LIB+queryParams;
    let postData = JSON.stringify(post_data);

    return fetch(apiUrl,{
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      method: 'POST',
      credentials: 'include',
      body: postData
    }).then((response) => response.json())
    .catch((err) => {
      console.log(err);
      //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
      //mixpanel.track('browser_extension_desktop:post_to_library:error', logPayload);
    });
  }
};

/*
* Send a message to a group
*/
/*
function postToGroup(post_data){
  //console.log("postToGroup");
  if(post_data){
    let queryParams = '?access_token='+userToken.access_token;
    let apiUrl = URL.EDMO_API_MSG+queryParams;
    let postData = JSON.stringify(post_data);

    return fetch(apiUrl,{
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      method: 'POST',
      credentials: 'include',
      body: postData
    }).then((response) => response.json())
    .catch((err) => {
      console.log(err);
      //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
      //mixpanel.track('browser_extension_desktop:post_to_group:error', logPayload);
    });
  }
};
*/

/*
* save 'note' resource and handle resulting UI state of btn control
*/

function addNoteToLibrary(){
  console.log("IO.addNoteToLibrary");
  postToLibrary({type:'note', parent_id:Model.get('folder_id'), text:'this is a hardwired note test.'})
  .then( (resp) => {
    //proxy for call success
    if(resp && resp.created_at){
      PubSub.publish('library:item:added',resp);
      return resp;
    }else{
      console.log("note not saved to library: ",resp);
    }
  })
  .catch((err) => {
    console.log('error on link save:',err);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
    //mixpanel.track('browser_extension_desktop:add_link:error', logPayload);
  })
};

export {
  fetchCurrentUser,
  fetchUserToken,
  postToLibrary,
  addNoteToLibrary
}
