player = new YKU.Player('youkuplayer',{
  styleid: '0',
  client_id: 'd8781b239fdad45b',
  vid: 'XMjg1MTcyNDQ0',
  autoplay: true,
  show_related: true,
  events:{
    onPlayEnd: function(){ },
    onPlayStart: function(){ },
    onPlayerReady: function(){ }
  }
});
function playVideo(){
  try{
    player.playVideo();
  } catch(err){
    alert("*"+err);
  }
}
function pauseVideo(){
  player.pauseVideo();
}
function seekTo(s){
  player.seekTo(s);
}
function currentTime(){
  return player.currentTime();
}
