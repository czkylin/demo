var EventEmitter = require('events')

class Player extends EventEmitter{}

var player = new Player()

player.on('play', (track) => {				//once	用on来注册
  console.log(`正在播放《${track}》`)		//``esc下的键，表示字符串模板，
  //不再用+连接而是将变量放入${}中
})

player.emit('play', '精绝古城')		//用emit来触发事件，可以传参 ,类似jQuery中的trigger
player.emit('play', '黄皮子坟')
