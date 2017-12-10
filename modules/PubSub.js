// Custom event management system using publish / subscribe model.
// based in part on https://davidwalsh.name/pubsub-javascript

let topics = {};
let hOP = topics.hasOwnProperty;

let subscribe = function(topic, listener) {
  // Create the topic's object if not yet created
  if(!hOP.call(topics, topic)) topics[topic] = [];

  // Add the listener to queue
  var index = topics[topic].push(listener) -1;

  // Provide handle back for removal of topic
  return {
    remove: function() {
      delete topics[topic][index];
    }
  };
};

let publish = function(topic, info) {
  //console.log("Publish topic:",topic);
  // If the topic doesn't exist, or there's no listeners in queue, just leave
  if(!hOP.call(topics, topic)) return;

  // Cycle through topics queue, fire!
  topics[topic].forEach(function(item) {
    if(item && typeof item === 'function'){
  	 item(info != undefined ? info : {});
    }
  });
};

export {
  subscribe, publish
}
