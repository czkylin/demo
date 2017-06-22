var https = require('https')
var cheerio = require('cheerio')
var url = 'https://lagou.com/'
function filter(html) {           //可以写在其他js文件中，然后require
  var $ = cheerio.load(html)      //load方法专门加载html，jQuery中是$(document).ready(function(){})
  var menu = $('.menu_main')
  var menuData = []               //存一级标题和二级内容
  menu.each(function(index, value) {              //menu返回的是cheerio对象，相当于jQuery对象
    var menuTitle = $(value).find('h2').text()    //menu.each拿到的是一堆menu_main的集合
    var menuLists = $(value).find('a')            //each方法：$(selector).each(function(index,element))
    var menuList = []                             //value拿到的是原生的js对象，value表示的就是元素
    menuList.each(function(index, value) {        //find方法：$("p").find("span").css('color','red');
      menuList.push($(value).text)
    })
    menuData.push({
      menuTitle: menuTitle,
      menuList: menuList
    })
  })
  return menuData
}
function print(menu) {
  menu.forEach(function(value) {
    console.log(value.menuTitle + '\n');
    value.menuList.forEach(function(value) {
      console.log('-' + value);
    })
  })
}
https.get(url, function(res){        //只能抓取静态内容，不能抓取ajax异步调用的东西
  var html = '';
  res.on('data', function(data) {    //事件，get来数据的时候触发
    html + data
  })
  res.on('end', function(){
    console.log(filter(html))
    print(filter(html))
  })
  res.on('error', function(){
    console.log(err);
  })
})
