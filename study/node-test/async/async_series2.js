var async = require('async');
console.time('test');
async.series({
  one: function(callback) {
    setTimeout(function(){
      callback(null, 'one')
    }, 1000)
  },
  two: function(callback) {
    setTimeout(function(){
      callback(null, 'two')
    }, 1000)
  }
}, function(err, results) {
  console.log(results);
  console.timeEnd('test')
})
