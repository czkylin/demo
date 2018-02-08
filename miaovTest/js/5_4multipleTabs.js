var arr = [
  [{
    title: 'i9 7900X 酷睿十核',
    img: './img/multipleTabs/1.jpg'
  },{
    title: '华硕（ASUS）PRIME X299-DELUXE 主板',
    img: './img/multipleTabs/2.jpg'
  },{
    title: 'GTX 1080Ti',
    img: './img/multipleTabs/3.jpg'
  }],[{
    title: '复仇者LPX DDR4 3000 16GB(8Gx2条)',
    img: './img/multipleTabs/4.jpg'
  },{
    title: 'H115i 一体式水冷CPU散热器',
    img: './img/multipleTabs/5.jpg'
  },{
    title: '600P系列 256G M.2 2280接口固态硬盘',
    img: './img/multipleTabs/6.jpg'
  },{
    title: '希捷(SEAGATE)酷鱼系列 3TB 7200转64M SATA3',
    img: './img/multipleTabs/7.jpg'
  }],[{
    title: '额定600W巨龙GW-6800（90+）电源',
    img: './img/multipleTabs/8.jpg'
  },{
    title: '乔思伯（JONSBO）QT01 黑色 中塔式机箱',
    img: './img/multipleTabs/9.jpg'
  },{
    title: 'AOC 爱攻II AG352QCX',
    img: './img/multipleTabs/10.jpg'
  }],[{
    title: '阿卡丁AKPLAYER 电竞桌游戏桌子',
    img: './img/multipleTabs/11.jpg'
  },{
    title: '阿卡丁AKPLAYER战狼 电竞椅',
    img: './img/multipleTabs/12.jpg'
  },{
    title: '雷蛇（Razer）黑寡妇蜘蛛终极版2016 游戏机械键盘',
    img: './img/multipleTabs/13.jpg'
  },{
    title: '罗技（Logitech）G502 炫光自适应游戏鼠标 RGB鼠标',
    img: './img/multipleTabs/14.jpg'
  }]
];
  var list = document.getElementById('list');
  var olist = list.getElementsByTagName('li');
  var num = [];
  for(var i=0; i<olist.length; i++) {
    fn(olist[i]);
  }
  function fn(option) {
    var oDiv = document.getElementsByClassName('bottom')[0];
    var img = document.getElementsByTagName('img')[0];
    // var li = ol.getElementsByTagName('li');
    option.onclick = function() {
      for(var i=0; i<olist.length; i++) {
        olist[i].style.background = '#ccc';
      }
      option.style.background = '#fff';

      var index = Number(option.getAttribute('index'));
      var item = arr[index];
      var sol = document.getElementsByTagName('ol');
      // console.log(sol);
      for(var i=0; i<sol.length; i++) {
        sol[i].className = 'hide';
      }
      // console.log(num.indexOf(index));
      // console.log(num);
      // console.log(index);
      if(num.indexOf(index) == -1 ){
        num.push(index);
        var ol = document.createElement('ol');
        var li;
        for(var i=0; i<item.length; i++) {
          li = document.createElement('li');
          li.innerHTML = item[i].title;
          ol.appendChild(li);
          if(item.length == 3) {
            li.style.width = '33%';
          } else if(item.length == 4) {
            li.style.width = '24%';
          }
        }
        oDiv.appendChild(ol);
      }
      console.log(index+1);
      sol[index+1].className = 'show';
      img.src = item[0].img;
      sol[index+1].getElementsByTagName('li')[0].style.background = 'rgba(200, 0, 40, 0.5)';
      // console.log(item);
    }
  }
