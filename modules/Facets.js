import * as PubSub from './PubSub';
import * as Conf from './Config';
import * as Util from './Util';

//data store.
let store = {};

//
let parentNode = document.querySelector('.'+Conf.CSS.FACETS);
/*
* markup for a single group item.
* conditionally check the item by default.
*/
function makeItemNode(item, options={}){
  console.log("Facets.makeItemNode: ",item, options);
  let uid = item.name.toLowerCase().replace(/\s/g,'') +'_'+ item.idx;
  let markup = `<li class="${Conf.CSS.FACET}"><label for="${uid}"><input type="checkbox" value="${item.name}" id="${uid}" ${options.isSubject ? 'checked':''}>${item.name}</label></li>`;
  return Util.vivify(markup);
};

/*
* markup for a subtitle to be inserted into list.
* returns a new, live node with supplied 'title' string
*/
function makeSubTitleNode(title){
  let markup = `<li class="${Conf.CSS.FACET_TITLE}"><h3 class="small normal">${title}</h3></li>`;
  return Util.vivify(markup);
}

/*
* render search facets given array of models
*/
function renderFacets(data){
  //console.log("renderFacets")

  if(Array.isArray(data.people) && parentNode){
    let peopleFacetsCntr = parentNode.querySelector('.'+Conf.CSS.FACET_GRP+'.'+Conf.CSS.PPL_FACETS);
    let uniqPeople = data.people.filter((person, index, self) => self.findIndex(t => t.name === person.name ) === index);
    let fragment = document.createDocumentFragment();

    fragment.appendChild( makeSubTitleNode('Authors') );
    uniqPeople.forEach((item) => {
      fragment.appendChild( makeItemNode(item, {isSubject:(data.subject.name == item.name)}) );
    });
    fragment.appendChild( makeSubTitleNode('Recipients') );
    //todo: get unique list of recipients from all Authors
    //get count for each, unique recipent

    //add to live page node
    peopleFacetsCntr.appendChild(fragment);
    PubSub.publish('search:facets:rendered');
  }
};
/*
function selectSubjectFacet(){
  console.log("selectSubjectFacet");
  let peopleFacetsCntr = parentNode.querySelector('.'+Conf.CSS.FACET_GRP+'.'+Conf.CSS.PPL_FACETS);
  let targetFacet = peopleFacetsCntr.querySelector('[value="James Madison"]');
  //targetFacet.set
};
*/
/*
* set search input value
*/
function updatePeopleSearchFld(val){
  console.log("updatePeopleSearchFld:",val);
  let inputNode = document.querySelector('.'+Conf.CSS.PPL_SEARCH);
  inputNode.value = val;
}

/*
* update all portions of search UI
*/
function updateUI(data){
  console.log("Facets render")
  renderFacets(data);
  updatePeopleSearchFld(data.subject.name);
}

//listeners
//PubSub.subscribe('search:facets:rendered',selectSubjectFacet);

export {
  updateUI as render,
  updatePeopleSearch
}
