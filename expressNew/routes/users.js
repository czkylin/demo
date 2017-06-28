var express = require('express');
var router = express.Router();

var MongoClient = require('mongodb').MongoClient
var DB_CONN_STR = 'mongodb://localhost:27017/arriving'

/* GET users listing. */
router.get('/', function(req, res, next) {
  res.send('respond with a resource');
});

router.all('/registor', function (req, res) {
  var username = req.body['username']
  var password = req.body['password']
  var nickname = req.body['nickname']

  var insertData = function (db, callback) {
    // 连接collection
    var conn = db.collection('user')

    // 获得前端提交的数据并格式化
    var data = {username: username, password: password, nickname: nickname}

    // 出入数据
    conn.insert(data, function (err, results) {
      if (err) {
        console.log(err);
      } else {
        callback(results)
      }
    })
  }

  // 数据库连接
  MongoClient.connect(DB_CONN_STR, function (err, db) {
    if (err) {
      console.log(err);
    } else {
      console.log('数据库连接成功');
      insertData(db, function (results) {
        console.log(results);
        res.send('注册成功！')
        db.close()
      })
    }
  })
})

router.post('/login', function (req, res) {
  var username = req.body['username']
  var password = req.body['password']

  var findData = function (db, callback) {
    var conn = db.collection('user')
    var data = {username: username, password: password}
    conn.find(data).toArray(function (err, results) {
      callback(results)
    })
  }

  MongoClient.connect(DB_CONN_STR, function (err, db) {
    if (err) {
      console.log(err);
    } else {
      findData(db, function (results) {
        if (results.length > 0) {
          // res.send('登录成功！')
          req.session.username = results[0].username
          res.redirect('/')
        } else {
          // res.send('登录失败！')
          res.redirect('/login')
        }
      })
    }
  })
})

module.exports = router;
