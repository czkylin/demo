const http = require('http')
http.createServer((req, res) => {
  res.writeHead(200, {'Content-Type': 'text/html; charset = utf-8'})
  console.log('hello world')
  res.write('<b>hello NodeJs</b>')
  res.end()
}).listen(3000)
console.log('Server running at localhost:3000');
