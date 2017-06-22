var fs = require('fs')

var fileReadStream = fs.createReadStream('data.json')

var count = 0;

fileReadStream.on('data', (chunk) => {
  console.log(`${count++} 接收到${chunk.length}`);
})

fileReadStream.on('end', () => {
  console.log('end');
})

fileReadStream.on('error', (error) => {
  console.log(error);
})
