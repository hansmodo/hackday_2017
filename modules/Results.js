import * as PubSub from './PubSub';
import * as Conf from './Config';
import * as Util from './Util';


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
  <p><q>${item.media.description}</q></p>
  </li>`;
  //console.log("--------");
  //console.log(markup)
  return Util.vivify(markup);
};

/*
* render documents from a search result
*/
function renderDocs(docs){
  console.log("renderDocs:",docs);
  let resultsCntr = document.querySelector('.'+Conf.CSS.RESULTS);
  //console.log("...resultsCntr:",resultsCntr);
  let fragment = document.createDocumentFragment();
  docs.forEach(item => {
    fragment.appendChild( makeItemNode(item) );
  })

  resultsCntr.appendChild(fragment);
  PubSub.publish('search:results:rendered');
}

/*
* given a promise - update all portions of search UI
*/
function updateUI(resp){
  console.log("Results render:", resp);
  resp.then(renderDocs);

}

//listeners
//PubSub.subscribe('search:results:subject',updateUI);


export {
  updateUI as render
}
