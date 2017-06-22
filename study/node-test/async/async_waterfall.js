var async = require('async')
console.time('test')
async.waterfall([
  function(callback){
    callback(null, 'one', 'two')
  },
  function(arg1, arg2, callback){
    callback(null, arg1, arg2, 'three')
  },
  function(arg1, arg2, arg3, callback){
    callback(null, [arg1, arg2, arg3, 'done'])
  }
], function(err, results) {
  console.log(results);
  console.timeEnd('test')
})
