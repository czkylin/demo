var express = require('express')
var router = express.Router()
var async = require('async')
var fs = require('fs')

var multiparty = require('multiparty');

var MongoClient = require('mongodb').MongoClient
var DB_CONN_STR = 'mongodb://localhost:27017/arriving'

router.post('/submit', function(req, res) {
  var title = req.body['title']
  var content = req.body['content']

  // var insertData = function(db, callback) {
  //   var conn = db.collection('comment')
  //   var data = {title: title, content: content}
  //   conn.insert(data, function(err, results) {
  //     callback(results)
  //   })
  // }
  var insertData = function (db, callback) {
    var comment = db.collection('comment')
    var ids = db.collection('ids')

    async.waterfall([
      function (callback) {
        ids.findAndModify(    //findAndModify查询并修改
          {name: 'comment'},
          [['_id', 'desc']],  //desc 降级排序
          {$inc:{id:1}},      //inc  增加 id每次加1   这里是modify
          function (err, results) {   //这里是find
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
            callback(results)
          }
        })
      }
    ], function (err, results) {
      callback(results)
    })
  }


  MongoClient.connect(DB_CONN_STR, function(err, db) {
    if(err) {
      console.log(err);
    } else {
      insertData(db, function(results) {
        // console.log(results);
        // res.send('done')
        res.redirect('./list')
      })
    }
  })
})

router.get('/list', function(req, res) {
  // var findData = function(db, callback) {
  //   var conn = db.collection('comment')
  //   conn.find({}).toArray(function(err, results) {
  //     callback(results)
  //   })
  // }

  var pageNo = parseInt(req.query['pageNo'], 10) || 1
  var pageSize = 3
  var count = 0
  var totalPage = 0

  var findData = function (db, cb) {
    var conn = db.collection('comment')
    async.series([
      function(callback) {
        conn.find({}).toArray(function(err, results) {
          if(err) {
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
      function(callback) {
        conn.find({}).sort({_id: -1}).skip((pageNo-1)*pageSize).limit(pageSize).toArray(function(err, results) {
          if(err) {
            console.log(err);
          } else {
            callback(null, results)
          }
        })
      }
    ], function(err, results) {
      cb(results[1])
    })
  }

  MongoClient.connect(DB_CONN_STR, function(err, db) {
    if(err) {
      console.log(err);
    } else {
      findData(db, function(results) {
        console.log(results);
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

  form.encoding = 'utf-8'
  form.maxFilesSize = 2 * 1024 * 1024
  form.uploadDir = './uploadtemp'

  form.parse(req, function (err, fields, files) {   //fields 文件域     files 文件对象
    console.log(fields);
    console.log(files);
    var uploadurl = '/images/upload/'  //目标文件路径
    file = files['filedata']  //相当于<input type="file" name="filedata" />
    originalFilename = file[0].originalFilename //原始文件名 从前端拷贝过来的文件名，也就是上传的文件名
    tmpPath = file[0].path  //前端的路径

    var timestamp = new Date().getTime()
    uploadurl += timestamp + originalFilename //文件名的改写，避免重名覆盖
    newPath = './public/' + uploadurl //真正的物理路径     ./public/images/upload/290298080980.jpg

    var fileReadStream = fs.createReadStream(tmpPath)
    var fileWriteStream = fs.createWriteStream(newPath)
    fileReadStream.pipe(fileWriteStream)     //读取
    fileWriteStream.on('close', function() {  //监听  拷贝完之后把临时文件删除掉
      fs.unlinkSync(tmpPath)    //删除方法
      res.send('{"err": "", "msg": "'+ uploadurl + '"}')  //xheditor要求的格式
    })
  })
})

router.get('/detail', function (req, res) {
  var uid = parseInt(req.query['uid'], 10)

  var findData = function (db, callback) {
    var conn = db.collection('comment')
    conn.find({uid: uid}).toArray(function (err, results) {
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
