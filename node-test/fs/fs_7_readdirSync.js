const fs = require('fs')

fs.readdirSync('logs').map((file) =>{	//同步操作,返回数组，可以用map方法
  fs.unlink(`logs/${file}`,(error) => {	//删除文件
    if(error){
      console.log(error)
    } else{
      console.log('success')
    }
  })
})

fs.rmdir('logs', (err) => {		//删除目录，需要先读取目录，清空文件
  if(err){
    console.log(err)
  }else{
    console.log('Deleted')
  }
})
