<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body{height:100%;position:relative}
    #playvideo{width:80%;position:relative;margin:0 auto;background-color:#000;}
    #playvideo embed,#playvideo video,#playvideo iframe,#playvideo object,#playvideo >div{width:100%;height:100%; background-color:#000;}
  </style>
</head>
<body>
  <!-- <div id="playvideo" typeid="iqiyi" sid="683219500" vid="15f9fbfceb4cc949ddd3f09d4d53fe7c"></div> -->
  <!-- <div id="playvideo" typeid="qq" sid="m0508kcyba7"></div> -->
  <!-- <div id="playvideo" typeid="sohu" sid="3770732"></div> -->
  <!-- <div id="playvideo" typeid="youku" sid="XMjc5NjMyMjgxNg"></div> -->

  <div id="playvideo"></div>
  <div id="hide" videoUrl='<?php echo I("get.videoUrl","");?>' style="display: none;"></div>
<!--   <button id="play" type="button">播放</button>
  <button id="pause" type="button" >暂停</button> -->


<script type="text/javascript" src='/weixin/Public/Member/js/play.js'></script>
<script type="text/javascript" src="/weixin/Public/Member/js/play-video.1.0.6.min.js"></script>
<script>
function play(){
    player.playVideo();
}
function pause() {
    player.pauseVideo();
}
// function play(){
//   if(typeid == 'youku') {
//     player.playVideo();
//   } else if(typeid == 'vrs') {
//     player.play();
//   }
// }
// function pause() {
//   if(typeid == 'youku') {
//     player.pauseVideo();
//   } else if(typeid == 'vrs') {
//     player.pause();
//   }
// }
</script>
</body>
</html>