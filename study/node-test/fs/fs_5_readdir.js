const fs= require('fs')

fs.readdir('logs', (err, files) =>{	//读取目录，目录为一个数组
  console.log(files)
  console.log(files[0])
})
