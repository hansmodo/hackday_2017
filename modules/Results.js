import * as PubSub from './PubSub';
import * as Conf from './Config';
import * as Util from './Util';

//'client' data store of what's currently displayed. (vs indexedDB)
let store = {results:{}};

/* ----- data store methods ---------*/
function deleteResultSet(id){
  console.log("Results.deleteResultSet");
  delete store.results[id];
  PubSub.publish('store:result_set:deleted',{type:'setDeleted', data:{id:id}});
};

function putResultSet(docs){
  console.log("Results.putResultSet ",docs);
  store.results[store.activeFacet.id] = docs;
  //PubSub.publish('search:result:put',store);
  return store;
};

function setActiveFacet(data){
  console.log("setActiveFacet:",data);
  store.activeFacet = data;
  PubSub.publish('store:active_facet:change',{type:'activeFacet', data:store.activeFacet});
}

/*----------------------------------*/
/*
* do something in response to a local store change.
*/
function onStoreChange(prop){
  console.log("onStoreChange:",prop);
  switch(prop.type){
    case 'activeFacet':
      if(!prop.data.checked){
        console.log(prop.data.subject," was unchecked");
        deleteResultSet(prop.data.id);
      }
      break
    default:
      console.warn("unknown event type "+prop.type+" on results local store change.");
      break;
  }
}

/*
* do something in response to deletion of a set in the local store.
*/
function onStoreDelete(prop){
  console.log("onStoreDelete:",prop);
  renderDocCounter( renderDocs( sortBy(store) ) ); //todo: promisify
  //.then(renderDocs)
  //.then(renderDocCounter);
}

function sortBy(store){
  console.log("Results.sortBy",store);
  let docs = [];//store.aba;
  for(var set in store.results){
    console.log("...iterating over set:",set);
    docs = [...docs,...store.results[set]];
  }

  docs.sort(compareMediaByDate);
  //console.log("...docs:",docs);
  return docs;
}

//comparison function used for sorting
function compareMediaByDate(a, b) {
  const dateA = a.media.date;
  const dateB = b.media.date;

  let comparison = 0;
  if (dateA > dateB) {
    comparison = 1;
  } else if (dateA < dateB) {
    comparison = -1;
  }
  return comparison;
}

/*
* markup for a single group item.
* conditionally check the item by default.
*/
function makeItemNode(item, options={}){
  //console.log("Results.makeItemNode: ",item);
  let authorFull = item.author.firstName+' '+item.author.lastName;
  let recipientFull = item.recipient.firstName+' '+item.recipient.lastName;
  //console.log("authorFull:",authorFull)
  let markup = `<li class="${Conf.CSS.RESULT}" id="${item.id}">
  <p class="date">
    <span>${item.media.date}</span>,
    <span>${item.media.city ?item.media.city:'unknown location'}, ${item.media.state ? item.media.state: item.media.country}</span>
  </p>
  <p class="author">${authorFull} ${item.media.type} to ${recipientFull}</p>
  <p><q>${item.media.description}</q> <a href="#read/${item.id}" class="read-more">Read</a></p>
  </li>`;
  //console.log("--------");
  //console.log(markup)
  return Util.vivify(markup);
};

/*
* render documents from a search result
* todo: weird that this returns docs - given it's purpose is to render.
*/
function renderDocs(docs){
  console.log("Results.renderDocs:",docs);
  let resultsCntr = document.querySelector('.'+Conf.CSS.RESULTS);
  resultsCntr.innerHTML = '';
  //console.log("...resultsCntr:",resultsCntr);
  let fragment = document.createDocumentFragment();
  docs.forEach(item => {
    fragment.appendChild( makeItemNode(item) );
  })

  resultsCntr.appendChild(fragment);
  PubSub.publish('search:results:rendered');
  return docs;
};

function renderDocCounter(docs){
  console.log("Results.renderDocCounter:",docs);
  let node = document.querySelector('.'+Conf.CSS.RESULTS_CNT);
  node.innerHTML = 'Showing '+docs.length+' results';
}


/*
* given a promise - update all portions of search UI
*/
function update(resp){
  //console.log("Results render:", resp);
  resp.then(putResultSet)
  .then(sortBy)
  .then(renderDocs)
  .then(renderDocCounter);

}

//listeners
//PubSub.subscribe('search:results:put',update);
PubSub.subscribe('search:facets:changed', setActiveFacet);
PubSub.subscribe('store:active_facet:change', onStoreChange);
PubSub.subscribe('store:result_set:deleted', onStoreDelete);

export {
  putResultSet as put,
  update,
  store
}
