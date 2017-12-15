import * as PubSub from './PubSub';
import * as Conf from './Config';
import * as Util from './Util';

//Dom references
let parentNode = document.querySelector('.'+Conf.CSS.FACETS);

//'client' data store of what's currently displayed. (vs indexedDB)
let store = {
  results:{},
  filters:{years:[]},
  getDocs:() => {
    //console.log("Results.store.getDocs");
    let docs=[];
    for(var set in this.store.results){
      docs = docs.concat(this.store.results[set])
    }
    return docs;
  },
  getUniqueYears:() => {
    console.log("Results.store.getUniqueYears");
    let years = [];
    for(var set in this.store.results){
      //console.log("...set:",set);
      let setYrs = this.store.results[set].map(doc => {
        return doc.media.date.split('-')[0];
      })
      //console.log(".......setYrs:",setYrs);
      years = years.concat(setYrs);
    }
    return [...new Set(years)].sort();
  },
  getFilterYears:() => {
    return this.store.filters.years;
  },
  resetFilterYears:() => {
    console.log("Results.store.resetFilterYear");
    this.store.filters.years = [];
    PubSub.publish('store:filter:year:updated',{years:this.store.filters.years});
  },
  setFilterYear:(year) => {
    console.log("Results.store.setFilterYear:",year);
    if( this.store.filters.years.indexOf(year) == -1 && year !== Conf.CSS.ALL_YR_CNTRL){
      this.store.filters.years.push(year);
      PubSub.publish('store:filter:year:updated',{years:this.store.filters.years});
    }
  },
  deleteFilterYear:(year) => {
    console.log("Results store.deleteFilterYear:",year);
    let yearFilters = this.store.filters.years;
    let idx = yearFilters.indexOf(year);
    yearFilters.splice(idx,1);
    PubSub.publish('store:filter:year:updated',{years:this.store.filters.years});
  }
};

/* ----- data store methods ---------*/
//todo: move some of these methods into the store.
function deleteResultSet(id){
  console.log("Results.deleteResultSet");
  delete store.results[id];
  PubSub.publish('store:result_set:deleted',{type:'setDeleted', data:{id:id}});
};

function putResultSet(docs){
  //console.log("Results.putResultSet ",docs);
  store.results[store.activeFacet.id] = docs;
  return store;
};

function setActiveFacet(data){
  console.log("Results.setActiveFacet:",data);
  store.activeFacet = data;
  PubSub.publish('store:active_facet:change',{type:'activeFacet', data:store.activeFacet});
}
/*----------------------------------*/

//todo:this belongs in the Facets module.
function toggleAllItemsCheckboxSelect(grpType){
  console.log("toggleAllItemsCheckboxSelect");
  let facetCheckboxNodes = Array.from(document.querySelectorAll('.facet-group'+'.'+grpType+' input'));
  let allItems = facetCheckboxNodes.splice(0,1);
  let allItemsNode = allItems.pop();
  let len = facetCheckboxNodes.length;
  console.log("...allItemsNode:",allItemsNode);
  for(var i=0;i<=len;i++){
    if(facetCheckboxNodes[i].checked){
      //console.log("...found one, uncheck the box")
      allItemsNode.checked = false;
      break;
    };
    if(i === len){
      //console.log("...end of loop, check the box")
      allItemsNode.checked = true;
    }
  }
};

//todo:this belongs in the Facets module.
function deselectCheckboxes(grpType){
  console.log("deselectCheckboxes: ",grpType);
  let facetCheckboxNodes = Array.from(document.querySelectorAll('.facet-group'+'.'+grpType+' input'));
  facetCheckboxNodes.splice(0,1);
  facetCheckboxNodes.forEach((box) => {
    box.checked = false;
  });
  store.resetFilterYears();
}

/*
* do something in response to a facet changing.
*/
function onFacetChange(prop){
  console.log("Results.onFacetChange:",prop);
  switch(prop.data.group){
    case 'people':
      if(!prop.data.checked){
        console.log("...",prop.data.subject," was unchecked");
        deleteResultSet(prop.data.id);
      }
      break;
    case 'year':
      if(!prop.data.checked){
        console.log("...",prop.data.subject," was unchecked");
        store.deleteFilterYear(prop.data.subject);
      }
      //check if every years unselected - if so check the 'all' box
      //todo:this belongs in the Facets module.
      if(prop.data.subject !== Conf.CSS.ALL_YR_CNTRL){
        toggleAllItemsCheckboxSelect('year');
      }else{
        deselectCheckboxes('year');
      }

      break;
    default:
      console.warn("unknown event type "+prop.type+" on results local store change.");
      break;
  }
}

/*
* do something in response to deletion of a set in the local store.
*/
function onStoreDelete(prop){
  console.log("Results.onStoreDelete:",prop);
  renderDocCounter( renderDocs( applyYearFilter( sortBy(store) ) ) );//todo: centralize this call
}

/*
* do something in response to *put* of a set into the local store.
*/
function onStorePut(store){
  //console.log("onStorePut");
  //getUniqueYears();
}

/*
* use secondary facet vals to create a filtered list of documents.
*/
function onFilter(data){
  console.log("Results.onFilter:",data);
  let docs = store.getDocs();
  docs = applyYearFilter(docs);
  renderDocsPipeline(docs);
};

function applyYearFilter(docs){
  console.log("applyYearFilter:",docs.length);
  let filterYrs = store.getFilterYears();
  if(filterYrs.length){
    docs = docs.filter((doc) => {
      if(doc.media && doc.media.date && doc.media.date.split){//account strings and date objects till they are cleaned up.
        let docYear = doc.media.date.split('-')[0];
        return (filterYrs.indexOf(docYear) > -1);
      }
    });
  }
  //console.log("...",docs.length);
  return docs;
};

function sortBy(store){
  console.log("Results.sortBy",store);
  let docs = [];//store.aba;
  for(var set in store.results){
    //console.log("...iterating over set:",set);
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
* display docs with only this or other selected yrs.
*/
function setFilterYear(year){
  //console.log("Results.setFilterYear:",year);
  store.setFilterYear(year);
};

/*----- UI render methods ----*/
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
* markup for a single group item.
* conditionally check the item by default.
*/
function makeYearNode(year, options={}){
  //console.log("Results.makeYearNode: ",year);
  let markup = `<li class="${Conf.CSS.FACET}"><label for="${year}"><input type="checkbox" value="${year}" id="${year}" ${options.selected ? 'checked':''}>${year}</label></li>`;
  return Util.vivify(markup);
};

function makeAllYearsNode(options={}){
  let markup = `<li class="${Conf.CSS.FACET} ${Conf.CSS.ALL_YR_CNTRL}"><label for="all_years"><input type="checkbox" value="all_years" id="all_years" ${options.selected ? 'checked':''}>All Years</label></li>`;
  return Util.vivify(markup);
}

/*
* render documents from a search result
* todo: weird that this returns docs - given it's purpose is to render.
*/
function renderDocs(docs){
  console.log("Results.renderDocs:",docs.length);
  let resultsCntr = document.querySelector('.'+Conf.CSS.RESULTS);
  let fragment = document.createDocumentFragment();

  resultsCntr.innerHTML = '';
  docs.forEach(item => {
    fragment.appendChild( makeItemNode(item) );
  })

  resultsCntr.appendChild(fragment);
  PubSub.publish('search:results:rendered');
  return docs;
};

function renderDocCounter(docs){
  //console.log("Results.renderDocCounter:",docs);
  let node = document.querySelector('.'+Conf.CSS.RESULTS_CNT);
  node.innerHTML = 'Showing '+docs.length+' results';
  return;
}

function renderYears(){
  console.log("renderYears");
  let facetsCntr = parentNode.querySelector('.'+Conf.CSS.FACET_GRP+'.'+Conf.CSS.YR_FACETS);
  let uniqueYrs = store.getUniqueYears();
  let filterYrs = store.getFilterYears();
  let allBoxSelected = filterYrs.length === 0;
  let fragment = document.createDocumentFragment();

  facetsCntr.innerHTML = '';
  //if no filter yrs then 'all' checkbox is selected
  fragment.appendChild( makeAllYearsNode({selected:allBoxSelected}) );
  uniqueYrs.forEach((item) => {
    let selected = (filterYrs.indexOf(item) > -1);
    fragment.appendChild( makeYearNode(item, {selected:selected}) );
  });

  facetsCntr.appendChild(fragment);
  return;
};

function renderDocsPipeline(docs){
  console.log("renderDocsPipeline");
  renderDocCounter( renderDocs( docs ) ); //todo: promisify
};
/*----- ----------------- ----*/

/*
* given a promise - pipeline to update all portions of search UI
* note: called everytime db queried.
*/
function update(resp){
  console.log("Results.update:", resp);
  resp.then(putResultSet)
  .then(sortBy)
  .then(applyYearFilter)
  .then(renderDocs)
  .then(renderDocCounter)
  .then(renderYears);
}

//listeners
//PubSub.subscribe('search:results:put',update);
PubSub.subscribe('search:facets:changed', setActiveFacet);
PubSub.subscribe('store:active_facet:change', onFacetChange);
PubSub.subscribe('store:result_set:deleted', onStoreDelete);
PubSub.subscribe('store:result_set:put', onStorePut);
PubSub.subscribe('store:filter:year:updated', onFilter);

export {
  putResultSet as put,
  update,
  setFilterYear as setYear,
  store
}
