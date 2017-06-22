const fs= require('fs')

fs.rename('logs/hello.log', 'logs/greeting.log', (err)=>{		//重命名
  console.log('重命名成功')
})
