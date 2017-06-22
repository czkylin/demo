var express = require('express')
var router = express.Router()
var async = require('async')
var fs = require('fs')

var multiparty = require('multiparty')

var MongoClient = require('mongodb').MongoClient
var DB_CONN_STR = "mongodb://localhost:27017/arriving"

router.post('/submit', function (req, res) {
  var title = req.body['title']
  var content = req.body['content']

  var insertData = function (db, callback) {
    var comment = db.collection('comment')
    var ids = db.collection('ids')

    async.waterfall([
      function (callback) {
        ids.findAndModify(
          {name: 'comment'},
          [['_id', 'desc']],
          {$inc:{id:1}},
          function (err, results) {
            callback(null, results)
          }
        )
      },
      function (results, callback) {
        var data = {uid: results.value.id, title: title, content: content}
        comment.insertOne(data, function (err, results) {
          if (err) {
            console.log(err);
          } else {
            callback(null, results)
          }
        })
      }
    ], function (err, results) {
      callback(results)
    })
  }

  MongoClient.connect(DB_CONN_STR, function(err, db){
    if (err) {
      console.log(err);
    } else {
      insertData(db, function(results){
        res.redirect('./list')
      })
    }
  })
})

router.get('/list', function (req, res) {
  // var findData = function (db, callback) {
  //   var conn = db.collection('comment')
  //   conn.find({}).toArray(function (err, results) {
  //     callback(results)
  //   })
  // }

  // 构建分页信息
  var pageNo = parseInt(req.query['pageNo'], 10) || 1
  var pageSize = 3
  var count = 0
  var totalPage = 0

  var findData = function (db, cb) {
    var conn = db.collection('comment')
    console.time('test')
    async.series([
      function (callback) {
        conn.find({}).toArray(function (err, results) {
          if (err) {
            console.log(err);
          } else {
            count = results.length
            totalPage = Math.ceil(count/pageSize)

            pageNo = pageNo > totalPage ? totalPage : pageNo
            pageNo = pageNo < 1 ? 1 : pageNo

            callback(null, '')
          }
        })
      },
      function (callback) {
        conn.find({}).sort({_id: -1}).skip((pageNo-1)*pageSize).limit(pageSize).toArray(function (err, results) {
          if (err) {
            console.log(err);
          } else {
            callback(null, results)
          }
        })
      }
    ], function (err, results) {
      cb(results[1])
    })
  }

  MongoClient.connect(DB_CONN_STR, function (err, db) {
    if (err) {
      console.log(err);
    } else {
      findData(db, function (results) {
        res.render('list', {
          list: results,
          pageNo: pageNo,
          totalPage: totalPage,
          count: count
        })
      })
    }
  })
})

router.post('/uploadImg', function (req, res) {
  var form = new multiparty.Form()

  //设置编码
  form.encoding = 'utf-8'

  //设置文件大小限制
  form.maxFilesSize = 2 * 1024 * 1024

  // 设置临时文件存储路径
  form.uploadDir = './uploadtemp'

  // 文件上传
  form.parse(req, function (err, fields, files) {
    var uploadurl = '/images/upload/'
    file = files['filedata']
    originalFilename = file[0].originalFilename
    tmpPath = file[0].path

    var timestamp = new Date().getTime()
    uploadurl += timestamp + originalFilename
    newPath = './public/' + uploadurl

    var fileReadStream = fs.createReadStream(tmpPath)
    var fileWriteStream = fs.createWriteStream(newPath)
    fileReadStream.pipe(fileWriteStream)
    fileWriteStream.on('close', function () {
      fs.unlinkSync(tmpPath)
      res.send('{"err":"", "msg":"'+uploadurl+'"}')
    })
  })
})

router.get('/detail', function (req, res) {
  var uid = parseInt(req.query['uid'], 10)
  var findData = function (db, callback) {
    var conn = db.collection('comment')
    conn.find({uid:uid}).toArray(function (err, results) {
      callback(results)
    })
  }

  MongoClient.connect(DB_CONN_STR, function (err, db) {
    if (err) {
      console.log(err);
    } else {
      findData(db, function (results) {
        res.render('detail', {
          res: results[0]
        })
      })
    }
  })
})

module.exports = router
