const fs = require('fs')

fs.mkdir('logs', (error) =>{		//能够创建名为logs的目录
  console.log('成功创建目录')
})
