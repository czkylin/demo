function $(v) {
  if(typeof v === 'function') {
    window.onload = v;
  } else if(typeof v === 'string') {
    return document.getElementById(v);
  } else if(typeof v === 'object') {
    return v;
  }
}
function getStyle(obj,attr){    //获取非行间样式，obj是对象，attr是值
    if(obj.currentStyle){   //针对ie获取非行间样式
        return obj.currentStyle[attr];
    }else{
        return getComputedStyle(obj, false)[attr];   //针对非ie 这里的false主要针对FF浏览器4.0之前加任意参数的问题
    };
};
function css(obj,attr,value){   //对象，样式，值。传2个参数的时候为获取样式，3个是设置样式
    if(arguments.length == 2){  //arguments参数数组，当参数数组长度为2时表示获取css样式
        return getStyle(obj,attr);  //返回对象的非行间样式用上面的getStyle函数
    }else{
        if(arguments.length == 3){  //当传三个参数的时候为设置对象的某个值
            obj.style[attr] = value;
        };
    };
};

function doMove(obj, attr, dir, target, endFn) {
  dir = parseInt(getStyle(obj, attr)) + dir > target ? -dir : dir;
  clearInterval(obj.timer);
  obj.timer = setInterval(function(){
    var speed = parseInt(getStyle(obj, attr)) + dir;
    if(speed > target && dir > 0 || speed < target && dir < 0) {
      speed = target;
    }
    obj.style[attr] = speed + 'px';
    if(speed == target) {
      clearInterval(obj.timer);
      // if(fn){
      //   fn();
      // }
      endFn && endFn();
    }
  }, 20)
}
