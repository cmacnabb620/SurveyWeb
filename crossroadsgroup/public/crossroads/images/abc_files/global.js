(function() { var req = {"user":{"key":323190,"config":{"legal":1538131529203},"detail":{"displayname":"yash"},"payment":{},"password":"$2a$12$IuPqD3AkmMyi2VSCgtPare5QMGlrl8lWuKZ5RvLvulFGLHH.ai4fC","username":"yash.kawadkar@smartdatainc.net","usepasswd":true,"createdtime":"2018-09-28T10:45:29.203Z","displayname":"yash"},"global":true,"csrfToken":"8sOb4Ggs-eEWDRvKtYEYceZkFg9PxBootpao","production":true,"ip":"49.248.148.242"};
if(req.user && req.user.key) window.userkey = req.user.key;
if(window._backend_) { angular.module("backend").factory("global",["context",function(context){
  var own={}.hasOwnProperty,key;
  for (key in req) if (own.call(req, key)) context[key] = req[key];
  return req;
}]); }else{
  angular.module("backend",[]).factory("global",[function(){return req;}]);
}})()