import * as Conf from './Config';

/*
* vivify markup. Assumes markup has a root node.
*/
function markupToNode(markup){
  let node = document.createElement('div');
  node.innerHTML = markup;
  return node.firstChild;
};

/*
* given a url - return false or truthy value (video id)
*/
function isYoutubeVideo(url){
  let match = Conf.RE.YOUTUBE_URL.exec(url);
  return (match && match[1]) ? match[1] : false;
};

export {
  isYoutubeVideo,
  markupToNode as vivify
}
