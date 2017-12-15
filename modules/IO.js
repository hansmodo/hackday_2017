import * as PubSub from './PubSub';
import {URL} from './Config';
import {userToken, getUserId} from './User';
import * as Model from './Model';
//import * as Util from './Util';
//import * as Folders from './Folders';

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
  console.log('fetchUserToken');
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
* save 'link' resource and handle resulting UI state of btn control
*/
/*
function addLinkToLibrary(){
  //console.log("IO.addLinkToLibrary");
  postToLibrary({type:'link', parent_id:Model.get('folder_id'), description:Model.get('keywords'), item:{title: Model.get('title'), link_url:Model.get('url'), thumb_url:Model.get('thumb_url')}})
  .then( (resp) => {
    //proxy for call success
    if(resp && resp.created_at){
      PubSub.publish('library:item:added',resp);
      return resp;
    }else{
      console.log("link not saved to library: ",resp);
    }
  })
  .then((resp) => {
    //make request to get related content
    let query = Model.get('og:title') || Model.get('twitter:title') || Model.get('title') || Model.get('keywords');
    fetchRelatedContent(query)
    .then((payload) => {
      //console.log('...payload:',payload);
      if(payload.response_code === 'ok'){
        PubSub.publish('rec:content:fetched',payload);
      }else if(payload.response_code === 'no-results'){
        console.log("Build the no results from rec-engine use case!");
        //todo:related items contaner should be hidden by default.
        //when results exist - trigger display of container.
      }
    });

    return resp;
  })
  .then((resp) => {
    //console.log('...resp:',resp);
    //let parent = Folders.getById(resp.parent_id);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_item_id:resp.item.id, edmo_public_folder:parent.is_public});
    //mixpanel.track('browser_extension_desktop:save_link_button:click', logPayload);
  })
  .catch((err) => {
    console.log('error on link save:',err);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
    //mixpanel.track('browser_extension_desktop:add_link:error', logPayload);
  })
};
*/
/*
* get related resources from askmo
*/
/*
function fetchRelatedContent(queryStr){
  //console.log("IO.fetchRelatedContent:",queryStr);
  queryStr = '?q='+queryStr;
  return fetch(URL.ASKMO_SEARCH+queryStr, {
    method: 'GET'
  })
  .then((response) => {
    return response.json()
  }).catch((err)=>{
    console.log("..err:",err);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
    //mixpanel.track('browser_extension_desktop:fetch_askmo_query:error', logPayload);
  });
};
*/
/*
function shareLinkToGroup(){
  //console.log("IO.shareLinkToGroup");
  postToLibrary({type:'link', parent_id:Model.get('folder_id'), description:Model.get('keywords'), item:{title: Model.get('title'), link_url:Model.get('url'), thumb_url:Model.get('thumb_url')}})
  .then((lib_item_resp) => {
    let groupList = Model.get('group_ids').map(groupId => { return {"id":groupId} });
    return postToGroup({content_type:'note', content:{text:Model.get('note'), attachments:{links:[{id:lib_item_resp.item.id}]}}, recipients:{'groups':groupList} })
  })
  .then( (resp) => {
    //proxy for call success
    if(resp && resp.created_at){
      PubSub.publish('group:note:shared',resp);
      return resp;
    }else{
      console.log("note not shared to group: ",resp);
    }
  })
  .then((resp) => {
    let group_ids = resp.recipients.groups.map(item => item.id);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_item_id:resp.id, edmo_groups:group_ids});
    //mixpanel.track('browser_extension_desktop:share_link_button:click', logPayload);
  })
  .catch((err) => {
    console.log('error on link share:',err);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
    //mixpanel.track('browser_extension_desktop:share_link:error', logPayload);
  })
};
*/
export {
  fetchCurrentUser,
  fetchUserToken,
  postToLibrary
}
