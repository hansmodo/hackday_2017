import * as PubSub from './PubSub';
import * as Conf from './Config';
//import * as Util from './Util';
//import * as IO from './IO';
import * as Model from './Model';
import {getUserId} from './User';

/*---- Folder methods -----*/
/*-------------------------*/

//data store.
let store = {};

//data store methods.
function setFolders(data){
  console.log("Folders.set:",data);
  if(Array.isArray(data)){
    //ensure 'Public' folder at top of list.
    let fldrIdx = data.findIndex((item) => {
      return item.name==='Public' && item.is_public;
    });
    if(fldrIdx > 0){
      let publicFldrObj = data.splice(fldrIdx,1);
      data.unshift(publicFldrObj[0]);
    }
    store.folders = data;
    PubSub.publish('user:folders:set',store.folders);
  }
};
function addFolder(data){
  //console.log("Folders.add:",data);
  store.folders.push(data);
};
function getFolderById(id){
  //console.log("Folders.getById:",id);
  let matches = store.folders.filter((item) => {return item.id === id});
  return matches[0];//just send back first item.
};

/*
* given a folder name make api call to create a new folder. returns promise w/json resp
*/
/*
function addFolderToLibrary(folder_name){
  //console.log("addFolderToLibrary: ",folder_name);
  return IO.postToLibrary({type:'folder', item:{name: folder_name}})
};
*/
/*
* create new folder via api then update UI.
* Upon response - add folder as second item in UI folder list.
*/
/*function createFolder(){
  //console.log("createFolder");
  let folderNode = document.querySelector(Util.makeQuerySelector(Conf.CSS.FLDR_NEW));
  let folderName = folderNode.value;
  addFolderToLibrary(folderName)
  .then((resp) => {
    //console.log('now add folder to UI / json resp:',resp);
    let liNode = makeFolderNode(resp, {created:true});
    let folderListNode = document.querySelector(Util.makeQuerySelector(Conf.CSS.FLDRS));
    let currentSecondItem = folderListNode.firstChild.nextSibling;
    folderListNode.insertBefore(liNode, currentSecondItem);
    folderNode.value = '';
    toggleCreateFolderForm();
    addFolder(resp);//sync internal state
    let logPayload = Object.assign(Util.getBaseLogPayload(getUserId),{edmo_folder_id: resp.id});
    mixpanel.track('browser_extension_desktop:folder_list:add', logPayload);
  }).catch((err) => {
    let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
    mixpanel.track('browser_extension_desktop:create_folder:error', logPayload);
  });
};
*/
/*
* returns promise which resolves to array of user folders
*/
function fetchLibraryFolders(token) {
  console.log("Folders.fetch");
  let queryStr = '?root=true&page=1&per_page=100&types=folder&access_token='+token;
  return fetch(Conf.URL.EDMO_API_LIB+queryStr, {
    method: 'GET',
    credentials: 'include'
  })
  .then((response) => {
    //let data = response.json();
    //console.log("data:",data);
     return response.json();//todo- convert from from to json string.call render

  }).catch((err)=>{
    console.log("..err:",err);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId), {edmo_err:err});
    //mixpanel.track('browser_extension_desktop:fetch_user_folders:error', logPayload);
  });
};

/*
* markup for a single folder item.
*/
/*
function makeFolderNode(folder, options={}){
  //console.log("Folders.makeNode: ",folder);
  let liNode = document.createElement('li');
  liNode.className = 'folder';
  liNode.id = folder.id;
  let titleNode = document.createElement('span');
  titleNode.innerText = folder.name;
  titleNode.className = 'folder-title';
  //default select the public folder OR a newly created folder.
  if(folder.name.toLowerCase() === 'public' && folder.is_public || options.created){
    selectFolder(liNode);
  }
  liNode.appendChild(titleNode);
  return liNode;
};
*/
/*
* render user library folders given array of models
*/
/*
function renderFolders(data){
  //console.log('Folders.render data:',data);
  let foldersNode = document.querySelector('.'+Conf.CSS.FLDRS);
  if(Array.isArray(data) && foldersNode){
    foldersNode.innerHTML='';
    data.forEach((item) => {
      let liNode = makeFolderNode(item);
      foldersNode.appendChild(liNode);
    });
  }
};
*/
/*
function toggleCreateFolderForm(){
  console.log("Folders.toggleCreateForm");
  let createFolderGrpNode = document.querySelector(Util.makeQuerySelector(Conf.CSS.FLDR_GRP));
  createFolderGrpNode.classList.toggle(Conf.CSS.ACTIVE);
  document.querySelector(Util.makeQuerySelector(Conf.CSS.FLDR_NEW)).value='';
};
*/
/*
* update selected folder id in model. handle ui changes.
* given either a native event object or a dom node.
*/
/*
function selectFolder(e){
  //console.log("Folders.select: ",e);
  let nativeEvt = !!e.target;
  let target = e.target || e;
  target = (target.classList.contains(Conf.CSS.FLDR_TITLE)) ? target.parentNode : target;
  unselectAllFolders();
  target.classList.add(Conf.CSS.SELECTED);
  if(nativeEvt){//log only mouse evts - not default selection.
    Model.update('folder_id', target.id);
    //let logPayload = Object.assign(Util.getBaseLogPayload(getUserId),{edmo_folder_id: target.id});
    //console.log("...logPayload:",logPayload);
    //mixpanel.track('browser_extension_desktop:folder_list:select', logPayload);
  }
};
*/
function unselectAllFolders(){
  [...document.getElementsByClassName(Conf.CSS.FLDR)].forEach((node) => node.classList.remove(Conf.CSS.SELECTED));
};

/*
* simple validation for name field.
*/
function setFolderValidState(e){
  console.log("Folders.setValidState",e.target.value);
  let btnNode = document.querySelector('.'+Conf.CSS.FLDR_SAVE);
  if(e.target.value.length >= 2){
    btnNode.removeAttribute('disabled');
  }else{
    btnNode.setAttribute('disabled',true)
  };
};

/*
* find the Public folder and set it as the currently selected in Model.
*/
function setPublicFolderAsSelected(folders){
  console.log("setPublicFolderAsSelected");
  let pubIdx = folders.findIndex((item) => {
    return item.name==='Public' && item.is_public;
  });
  Model.update('folder_id', folders[pubIdx].id);
};

//subscribe to custom events
PubSub.subscribe('user:folders:set', setPublicFolderAsSelected);

export {
  fetchLibraryFolders as fetch,
  setFolders as set,
  //createFolder as create,
  //renderFolders as render,
  //selectFolder as select,
  getFolderById as getById,
  //toggleCreateFolderForm as toggleCreateForm,
  setFolderValidState as setValidState,
  store
}
