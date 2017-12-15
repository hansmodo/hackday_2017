// css classnames of nodes used in chrome extension.

let CSS = {
PARENT        : 'edmo-plugin',
FACETS        : 'facet-container',
FACET_GRP     : 'facet-group',
PPL_FACETS    : 'people',
PLACE_FACETS  : 'location',
YR_FACETS     : 'year',
ALL_YR_CNTRL  : 'all_years',
ALL_LC_CNTRL  : 'all_locations',
FACET         : 'facet-item',
FACET_TITLE   : 'facet-title',
PPL_SEARCH    : 'person-search-control',
ACTIVE        : 'active',

RESULTS       : 'results-container',
RESULT        : 'result-item',
RESULTS_CNT   : 'results-counter',
RESULT_MORE   : 'read-more',
READ_DOC      : 'read-document',

FADE_IN       : 'fade-in',
FADE_OUT      : 'fade-out',
FROM_LEFT     : 'move-from-left',
FROM_RIGHT    : 'move-from-right',
TO_LEFT       : 'move-to-left',
TO_RIGHT      : 'move-to-right'
};

let RE = {YOUTUBE_URL:/https:\/\/www\.youtube\.com\/watch\?v=([a-zA-Z0-9_-]*)/};
let URL = {
  ASKMO_SEARCH:'https://askmo.edmodo.com/api/search',
  EDMO_LOGIN:'https://www.edmodo.com?show_login_modal=1',
  EDMO_LIB_FLDR:'https://www.edmodo.com/home#/library/folder/',
  EDMO_GRP:'https://www.edmodo.com/group?id=',
  EDMO_POST:'https://www.edmodo.com/post/',
  EDMO_GET_TKN:'https://www.edmodo.com/one-api/get-access-token',
  EDMO_API_GRPS:'https://api.edmodo.com/groups',
  EDMO_API_LIB:'https://api.edmodo.com/library_items',
  EDMO_API_MSG:'https://api.edmodo.com/messages',
  EDMO_API_USR:'https://api.edmodo.com/users/me'
};

export {
  CSS, RE, URL
}
