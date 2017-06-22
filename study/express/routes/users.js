var express = require('express');
var router = express.Router();

var MongoClient = require('mongodb').MongoClient;
var DB_CONN_STR = 'mongodb://localhost:27017/arriving'    //arriving为连接的数据库

/* GET users listing. */
router.get('/', function(req, res, next) {
  res.send('respond with a resource');
});

// router.post('/register', function(req, res) {
//   res.send('register')
// })

router.post('/register', function(req, res) {       //定义子路由
  var username = req.body['username'];
  var password = req.body['password'];
  var nickname = req.body['nickname'];

  var insertData = function(db, callback) {
    //连接collection
    var conn = db.collection('user');   //user为连接的集合
    //获得前端提交的数据并格式化
    var data = {username: username, password: password, nickname: nickname};
    //插入数据
    conn.insert(data, function(err, results) { //conn相当于db.user 也就是db.user.insert()
      if(err) {
        console.log(err);
      } else {
        callback(results);
      }
    })
  }

  //数据库连接
  MongoClient.connect(DB_CONN_STR, function(err, db) {
    if(err) {
      console.log(err);
    } else {
      console.log('数据库连接成功');
      insertData(db, function(results) {  //引用insertData
        console.log(results);
        res.send('注册成功!')
      })
    }
  })

})

router.post('/login', function(req, res) {
  var username = req.body['username'];
  var password = req.body['password']
  var findData = function(db, callback) {
    var conn = db.collection('user')
    var data = {username: username, password: password}
    conn.find(data).toArray(function (err, results) {
      callback(results)
    })
  }

  MongoClient.connect(DB_CONN_STR, function(err, db) {
    if(err) {
      console.log(err);
    } else {
      findData(db, function(results) {
        if(results.length > 0) {
          req.session.username = results[0].username
          // res.send('登录成功')
          res.redirect('/')
        } else {
          // res.send('登录失败')
          res.redirect('/login')
        }
      })
    }
  })
})

module.exports = router;
