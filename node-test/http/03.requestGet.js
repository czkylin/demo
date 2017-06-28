var https =  require('https')

var options={
  hostname: 'api.douban.com',
  port: 443,			//http为80
  method: 'GET',
  path: '/v2/movie/top250'
}

var responseData= ''

var request = https.request(options,function(response){
  // console.log(response)
  response.on('data',function(chunk){
    responseData += chunk
  })
  response.on('end',function(){
    console.log(responseData)
  })
})

request.on('error',function(err){
  console.log(err)
})

request.end()
