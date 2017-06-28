//并行无关联
var async = require('async')
console.time('test')
async.parallel([
  function(callback) {
    setTimeout(function() {
      callback(null, 'one')
    }, 1000)
  },
  function(callback) {
    setTimeout(function(){
      callback(null, 'two')
    }, 1000)
  }
], function(err, results) {
  console.log(results);
  console.timeEnd('test');
})
