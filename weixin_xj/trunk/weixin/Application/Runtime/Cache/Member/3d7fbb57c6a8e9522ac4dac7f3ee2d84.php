<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title>js控制优酷视频播放</title>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://player.youku.com/jsapi"></script>

</head>
<body>
<div id="youkuplayer" style="width:100%;"></div>
<br />
<!-- <input type="button" onclick="playVideo();" value="播放" style="height:30px;width:50px;">
<input type="button" onclick="pauseVideo();" value="暂停" style="height:30px;width:50px;"> -->
</body>
<script>
$('#youkuplayer').height(document.documentElement.clientHeight);
player = new YKU.Player('youkuplayer',{
styleid: '0',
client_id: 'd8781b239fdad45b',
vid: 'XMjc4NTEwNjQ2MA',
autoplay: false,
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
</script>
</html>