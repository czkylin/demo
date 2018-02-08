var ul = document.getElementsByTagName('ul')[0];
var ol = document.getElementsByTagName('ol')[0];
var li = ol.getElementsByTagName('li')
var timer = null;
for(var i=0; i<li.length; i++) {
  li[i].style.display = 'none';
}
ul.addEventListener('mouseover', function(e) {
  if(e.target && e.target.nodeName == 'LI') {
    var index = e.target.getAttribute('index');
    show(index);
  }
})
ul.addEventListener('mouseout', function(e) {
  if(e.target && e.target.nodeName == 'LI') {
    var index = e.target.getAttribute('index');
    hide(index);
  }
})

ol.addEventListener('mouseover', function(e){
  if(e.target && e.target.nodeName == 'LI') {
    var index = e.target.getAttribute('index');
    clearInterval(timer);
  }
  if(e.target && e.target.nodeName == 'SPAN') {
    var index = e.target.parentNode.getAttribute('index');
    clearInterval(timer);
  }
})

ol.addEventListener('mouseout', function(e){
  if(e.target && e.target.nodeName == 'LI') {
    var index = e.target.getAttribute('index');
    hide(index);
  }
  if(e.target && e.target.nodeName == 'SPAN') {
    var index = e.target.parentNode.getAttribute('index');
    hide(index);
  }
})

function show(index) {
  clearInterval(timer);
  for(var i=0; i<li.length; i++) {
    li[i].style.display = 'none';
  }
  li[index].style.display = 'block';
}

function hide(index) {
  timer = setTimeout(function(){
    li[index].style.display = 'none';
  },500)
}
