import * as PubSub from './PubSub';
import * as Util from './Util';

/*---- Model methods -----*/
/*------------------------*/

//store for data scraped from content page
//and state of popup (e.g. currently selected folder)
let model = {};

/*
* accepts an array of objects and saves as a nested object.
*/
function setModel(data=[]){
  model = {};
  console.log("Model.set model:",model);
  let dataObj = Object.assign({}, ...data);
  //console.log("...dataObj.imgs.length:",dataObj.imgs.length);
  //add video thumbnail if YT url
  if(dataObj.url){
    let vidId = Util.isYoutubeVideo(dataObj.url);
    if(vidId){
      //console.log("...vidId:",vidId);
      let thumbnail = 'https://img.youtube.com/vi/'+vidId+'/0.jpg'
      updateModel('thumb_url', thumbnail);
      dataObj.imgs.unshift({src:thumbnail});
    }
  }
  //find unique set of people
  if(dataObj.people){
    dataObj.people = dataObj.people.filter((person, index, self) => self.findIndex(t => t.name === person.name ) === index);
  }

  //find primary search term
  // - either the first person's name found in title or default to first person
  dataObj.subject='';
  if(dataObj.title && dataObj.people.length){
    dataObj.subject = dataObj.people[0];//set default
    for(var i =0;i<dataObj.people.length;i++){
      let person = dataObj.people[i].name;
      console.log("person:",person);
      if( dataObj.title.indexOf(person) > -1 ){
        console.log('found subject');
        dataObj.subject = person;
        break;
      }
    }
  }


  model = Object.assign(model, dataObj);
  //console.log("......model.imgs.length:",model.imgs.length);
  PubSub.publish('model:set',model);
};

/*
* Update model with a given field and value
*/
function updateModel(field, value){
  //console.log("Model.update:",field, value);
  switch(field){
    case 'imgs':
      model.imgs = model.imgs || [];
      model.imgs.push({src:value});
      break;
    case 'add_group_id':
      model.group_ids = model.group_ids || [];
      model.group_ids.push(value);
      break;
    case 'clear_group_ids':
      model.group_ids = [];
      break;
    case 'remove_group_id':
      model.group_ids = model.group_ids || [];
      let idx = model.group_ids.indexOf(value);
      model.group_ids.splice(idx,1);
      break;
    default:
      model[field] = value;
      break;
  }
  let msgName = 'model:update:'+field;
  PubSub.publish(msgName, {field:field, value:value});
  //console.log('...model:',model);
};

function getModelProperty(name){
  return model[name] || null;
};

function getAllImgs(){
  let metaTagImgs = getMetaTagImgs();
  return [].concat(model.imgs, metaTagImgs);
};
/*
* return an array of images that were found in the header.
* e.g. from open graph or twitter card tags
*/
function getMetaTagImgs(){
  //console.log("Model.getMetaTagImgs");
  let imgTypes = ['og:image','twitter:image','thumbnail'];
  let imgMetaTags = Object.keys(model)
  .filter(key => imgTypes.includes(key))
  .reduce((arr, key) => {
    arr.push({'src':model[key],'type':key});
    return arr;
  }, []);
  return imgMetaTags;
};

//listen to custom events
PubSub.subscribe('group:note:shared', resp => updateModel('post',resp));

export {
  setModel as set,
  updateModel as update,
  getModelProperty as get,
  getAllImgs,
  getMetaTagImgs
}
