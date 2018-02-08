function bind(obj, events, fn) {
  if(obj.addEventListener) {
    obj.addEventListener(events, fn , false);
  } else {
    obj.attachEvent('on'+events, fn);
  }
}

function getByClass(oParent, sClass) {
  var arr = [];
  var elems = oParent.getElementsByTagName('*');
  for(var i=0; i<elems.length; i++) {
    if( elems[i].className == sClass ) {
      arr.push( elems[i] );
    }
  }
  return arr;
}
function toArray(elems) {
  var arr = [];
  for(var i=0; i<elems.length; i++) {
    arr.push(elems[i])
  }
  return arr;
}

function getStyle(obj, attr) {
  if(obj.currentStyle) {
    return obj.currentStyle[attr];
  } else {
    return getComputedStyle(obj, false)[attr];
  }
}
//构造函数
function Vquery(vArg) {
  this.elements = [];   //选择元素的这样一个集合
  switch(typeof vArg) {
    case 'function':
    // window.onload = vArg;
    bind(window, 'load', vArg);
    break;
    case 'string':
      switch(vArg.charAt(0)) {
        case '#':
          this.elements.push(document.getElementById(vArg.substring(1)))
        break;
        case '.':
          this.elements = getByClass(document, vArg.substring(1));
        break;
        default:
          this.elements = toArray(document.getElementsByTagName(vArg));
        break;
      }
    break;
    case 'object':
      this.elements.push(vArg);
    break;
  }
}

Vquery.prototype.html = function(str) {
  if(str) {
    for(var i=0; i<this.elements.length; i++) {
      this.elements[i].innerHTML = str;
      // console.log(this.elements[i]);
    }
  } else {
    return this.elements[0].innerHTML;
  }
}

Vquery.prototype.click = function(fn) {
  // for(var i=0; i<this.elements.length; i++) {
  //   bind(this.elements[i], 'click', fn);
  // }
  this.on('click', fn);
}

Vquery.prototype.mouseover = function(fn) {
  this.on('mouseover', fn);
}

Vquery.prototype.on = function(events, fn) {
  for(var i=0; i<this.elements.length; i++) {
    bind(this.elements[i], events, fn);
  }
}

Vquery.prototype.hide = function() {
  for(var i=0; i<this.elements.length; i++) {
    this.elements[i].style.display = 'none';
  }
}

Vquery.prototype.show = function() {
  for(var i=0; i<this.elements.length; i++) {
    this.elements[i].style.display = 'block';
  }
}

Vquery.prototype.hover = function(fnOver, fnOut) {
  this.on('mouseover', fnOver);
  this.on('mouseout', fnOut);
}

Vquery.prototype.css = function(attr, value) {
  if(arguments.length == 2) {   //设置
    for(var i=0; i<this.elements.length; i++) {
      this.elements[i].style[attr] = value;
    }
  } else if(arguments.length == 1){   //获取
    if(typeof attr == 'object') {
      for(var j in attr) {
        // console.log(j);
        for(var i=0; i<this.elements.length; i++) {
          this.elements[i].style[j] = attr[j];
          // console.log(attr);
        }
      }
    } else {
      return getStyle(this.elements[0], attr);
    }
  }
}

Vquery.prototype.attr = function(attr, value) {
  if(arguments.length == 2) {   //设置
    for(var i=0; i<this.elements.length; i++) {
      this.elements[i].setAttribute(attr, value);
    }
  } else if(arguments.length == 1){   //获取
    return this.elements[0].getAttribute(attr);
  }
}




















function $(vArg) {
  return new Vquery(vArg);
  //return 对象;
}
