const fs = require('fs')

fs.writeFile('logs/hello.log', '您好~ \n', (error) =>{		//写入文件
  if(error){
    console.log(error)
  } else{
    console.log('文件创建成功~')
  }
})

fs.appendFile('logs/hello.log', 'hello~ \n', (error) =>{		//追加内容
  if(error){
    console.log(error)
  } else{
    console.log('成功写入内容~')
  }
})
