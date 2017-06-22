var mongodb = require('mongodb')

var server = new mongodb.Server('localhost', 27017, {auto_reconnect: true})

var db = new mongodb.Db('arriving', server, {safe: true})

db.open(function(err, db) {
  if(err) {
    console.log(err);
  } else {
    console.log('connect success!');
    db.conllection('movies', {safe: true}, function(err, conn){
      if(err) {
        console.log(err);
      } else {
        conn.find({
          year: {$lt: '1990'},
          genres: {$in: ['动画']}
        },{
          title: 1,
          year: 1,
          _id: 0,
          genres: 1
        }).toArray(function(err, res) {
          console.log(res);
        })
      }
    })
  }
})
