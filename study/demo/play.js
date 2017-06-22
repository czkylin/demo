var playvideo=document.getElementById("playvideo");
playvideo.style.height=playvideo.offsetWidth*0.5+"px";

var videoUrl = 'http://player.youku.com/player.php/sid/XMjc1MDg3NjI5Ng==/v.swf';
var videoUrl = document.getElementById('hide').getAttribute('videoUrl');
var arr = videoUrl.split('/');
// console.log(arr);
var arr1 = arr[2].split('.');
// console.log(arr1);
var typeid = arr1[1];
if (typeid == 'qq') {
  playvideo.setAttribute('typeid', 'qq');
  var arrQQ = arr[5].split('&');
  var sidQQ = arrQQ[2].split('=')[1];
  playvideo.setAttribute('sid', sidQQ);
} else if (typeid == 'video') {
  playvideo.setAttribute('typeid', 'iqiyi');
  var arrQiyi = arr[6].split('-');
  var sidQiyi = arrQiyi[1].split('=')[1];
  var vidQiyi = arr[3];
  playvideo.setAttribute('sid', sidQiyi);
  playvideo.setAttribute('vid', vidQiyi);
} else if (typeid == 'vrs') {
  playvideo.setAttribute('typeid', 'sohu');
  playvideo.setAttribute('sid', arr[3]);
} else if (typeid == 'youku') {
  playvideo.setAttribute('typeid', 'youku');
  var sidYouku = arr[5].split('=')[0];
  playvideo.setAttribute('sid', sidYouku);
}



window.onload = function(){
  createVideo({id:"playvideo",autoplay:true,qqchannel:false});
}

window.onresize=function(){
  playvideo.style.height=playvideo.offsetWidth*0.5+"px";
};
