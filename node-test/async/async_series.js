var async = require('async')
//串行无关联
console.time('test')
async.series([
  function(callback) {
    setTimeout(function() {
      callback(null, 'one')
    }, 1000)
  },
  function(callback) {
    setTimeout(function() {
      callback(null, 'two')
    }, 2000)
  }
], function(err, results) {
  console.log(results);
  console.timeEnd('test');
})
