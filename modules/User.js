//user related state
let authStatus = null;
let token = null;
let user = null;
let setAuthStatus = val => authStatus = val;
let setToken = val => token = val;
let setUser = data => user = data;
let getUserId = () => {
    return (user) ? user.id : null;
  };

export {
  authStatus,
  token as userToken,
  user,
  setAuthStatus,
  setUser,
  setToken as setUserToken,
  getUserId
};
