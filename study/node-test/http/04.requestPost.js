var http =  require('http')

var querystring = require('querystring')

var postData = querystring.stringify({		//stringify方法将对象转换成字符串
//这里写入的就是Form Data中的内容
})

var options = {
  hostname: 'www.codingke.com',
  port:80,
  method:'POST',
  path:'/ajax/create/course/question',
  headers:{
    //这里写入的是Request Headers中的内容
    // 注：'Content-Length':postData.length	length应与提交内容长度一致
  }
}
var request = http.request(options, function(res){
  console.log('Status' + res.statusCode)
  console.log('headers:' + JSON.stringify(res.header))
  res.on('data', function(chunk){	//chunk是请求完之后后端返回的数据
    console.log(chunk)
  })
  res.on('end',function(){
    console.log('技术问答完毕！')
  })
})

request.on('error',function(err){
  console.log(err)
})

request.write(postData)		//通过write方法，向后台传送数据

request.end()
