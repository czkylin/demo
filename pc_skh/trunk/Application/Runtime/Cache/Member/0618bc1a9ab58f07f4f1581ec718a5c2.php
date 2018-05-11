<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta content="<?php echo ($seoarr['69942697']['KEYWORDS']); ?>" name="keywords">
  <meta content="<?php echo ($seoarr['69942697']['DESCRIPTION']); ?>" name="description">
  <title><?php echo ($seoarr['69942697']['TITLE']); ?></title>
  <!-- 公共样式 -->
  <link rel="stylesheet" href="/Public/Common/css/header_ft.css">
  <!-- 当前样式 -->
  <link rel="stylesheet" href="/Public/css/focus/news.css">
</head>
<body>
  <!-- 头部start -->
  
  <!-- 头部start -->
  <div class="header">
      <div class="h_top">
        <div class="w1200">
          <div class="fl"><span>欢迎来到北京圣康华</span></div>
          <div class="fr tr"><span>客服热线：400-656-2020</span></div>
        </div>
      </div>
      <div class="h_bottom clear">
        <div class="w1200">
          <a href="/" class="fl logo"><img src="/Public/Common/images/logo.png" alt=""></a>
          <div class="fl">
            <ul id="list">
              <li class="tab_nav"><a href="/">首页</a></li>
              <li class="tab_nav">
                <a href="/Focus/11126">知名专家<i></i></a>
                <!-- <ol class="tab_con"> -->
                  <!-- <a href="/Focus/doc/type_id/11119"><li>特需专家</li></a>
                  <a href="/Focus/doc/type_id/11120"><li>会诊专家</li></a>
                  <a href="/Focus/doc/type_id/11121"><li>眼底病科</li></a>
                  <a href="/Focus/doc/type_id/11122"><li>白内障科</li></a>
                  <a href="/Focus/doc/type_id/11123"><li>眼外伤科</li></a>
                  <a href="/Focus/doc/type_id/11124"><li>神经眼科</li></a>
                  <a href="/Focus/doc/type_id/11125"><li>眼视光与功能视觉</li></a> -->
                <!-- </ol> -->
              </li>
              <li class="tab_nav">
                <a href="#">就诊服务<i></i></a>
                <ol class="tab_con">
                  <a href="/Service/minSug"><li>糖网</li></a>
                  <a href="/Service/cataract"><li>白内障</li></a>
                  <a href="/Service/fundusDiseases"><li>眼底病</li></a>
                  <a href="/Service/optometry"><li>眼视光</li></a>
                  <!-- <a href="#"><li>眼整形</li></a> -->
                </ol>
              </li>
              <li class="tab_nav">
                <a href="#">特色服务<i></i></a>
                <ol class="tab_con">
                  <a href="/KeyService/consultationCentre"><li>远程眼科会诊中心</li></a>
                  <a href="/KeyService/imgDiagnosis"><li>眼科影像诊断中心</li></a>
                  <!-- <a href="#"><li>糖尿病眼病远程医疗服务中心</li></a>
                  <a href="#"><li>视觉医疗质控管理服务中心</li></a> -->
                </ol>
              </li>
              <li class="tab_nav">
                <a href="#">聚焦圣康华<i></i></a>
                <ol class="tab_con">
                  <a href="/Focus/intro"><li>圣康华简介</li></a>
                  <a href="/Focus/news"><li>新闻动态</li></a>
                </ol>
              </li>
              <li class="tab_nav">
                <a href="#">联系我们<i></i></a>
                <ol class="tab_con">
                  <a href="/Contact/guide"><li>患者就医指南</li></a>
                  <!-- <a href="#"><li>联系我们</li></a> -->
                </ol>
              </li>
            </ul>
          </div>
          <!-- <div class="fr search_box">
            <input class="search" type="text" name="" value="" placeholder="搜索医生服务">
            <input type="button" name="" value="" class="searchButton">
          </div> -->
        </div>
      </div>
    </div>
  <!-- 头部end -->

  <!-- 头部end -->
  <div class="banner con">
    <div class="w1200">
      <p class="title">知名专家</p>
      <p class="desc">Famous expert</p>
    </div>
  </div>
  <div class="nav con">
    <div class="w1200">
      <a href="">首页</a><span>></span><a href="">知名专家</a>
    </div>
  </div>
  <div class="con1 con">
    <div class="w1200">
      <div class="conLeft fl">
        <ul>
          <?php if(is_array($newsList)): $i = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><a href="/Doc/<?php echo ($news['RECORD_ID']); ?>"><li><i></i><?php echo ($news['ACT_LECTOR']); ?><span class="fr"><?php echo (Dtodiy("Y-m-d",$news['CREATE_DATE'])); ?></span></li></a><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </ul>
        <!-- <ol> -->
          <!-- <li class="prev">上一页</li>
          <li class="item active">1</li>
          <li class="item">2</li>
          <li class="item">3</li>
          <li class="item">4</li>
          <li class="none">...</li>
          <li class="item">38</li>
          <li class="next">下一页</li>
          <li class="last"><input type="text" name="" value="" class="ent"></li> -->
          <!-- <?php echo ($page); ?> -->
          <!-- <li class="last"><form action="/Focus/news')}" method="GET"><input type="text" name="p" value="" class="ent"></form></li> -->
        <!-- </ol> -->


      </div>
      <div class="conRight fr">
        <img src="/Public/images/focus/news/pic1.jpg" alt="">
        <img src="/Public/images/focus/news/pic2.jpg" alt="">
        <img src="/Public/images/focus/news/pic3.jpg" alt="">
      </div>
    </div>
  </div>
  <!-- 底部start -->
  
  <!-- 底部start -->
    <div class="footer">
      <div class="ft_top clear">
        <div class="w1200">
          <ul>
            <li><a href="">诊疗项目</a></li>
            <li><a href="/Service/minSug">糖网</a></li>
            <li><a href="/Service/cataract">白内障</a></li>
            <li><a href="/Service/fundusDiseases">眼底病</a></li>
            <li><a href="/Service/optometry">眼视光</a></li>
          </ul>
          <ul>
            <li><a href="">便捷服务</a></li>
            <li><a href="/Contact/guide/">来院路线</a></li>
            <li><a href="http://pbt.zoosnet.net/LR/Chatpre.aspx?id=PBT44701575&lng=cn&p=%e9%a2%84%e7%ba%a6%e4%b8%93%e5%ae%b6">在线咨询</a></li>
            <li><a href="http://pbt.zoosnet.net/LR/Chatpre.aspx?id=PBT44701575&lng=cn&p=%e9%a2%84%e7%ba%a6%e4%b8%93%e5%ae%b6">预约挂号</a></li>
          </ul>
          <ul>
            <li><a href="">聚焦圣康华</a></li>
            <li><a href="/Focus/intro">圣康华简介</a></li>
            <li><a href="/Focus/news">媒体报道</a></li>
          </ul>
          <div class="text">
            <p class="title">服务热线</p>
            <strong>400-656-2020</strong>
            <p class="range">周一至周五 8:00-17:00</p>
          </div>
        </div>
      </div>
      <div class="ft_bottom">Copyright © 2016 北京远程新华网络技术有限公司 版权所有 京ICP备14009444-1</div>
    </div>
    <div style="width:0; height:0px; overflow:hidden;"><script src="https://s19.cnzz.com/z_stat.php?id=1271236175&web_id=1271236175" language="JavaScript"></script><div>
    <script language="javascript" src="http://pbt.zoosnet.net/JS/LsJS.aspx?siteid=PBT44701575&float=1&lng=cn"></script>

    <script>
      var _hmt = _hmt || [];
      (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?4b0a00a669721496ca7a8bc6d4cf58f9";
        var s = document.getElementsByTagName("script")[0]; 
        s.parentNode.insertBefore(hm, s);
      })();
    </script>

  <!-- 底部end -->

  <!-- 底部end -->
  <script src="/Public/Common/js/jquery.js" charset="utf-8"></script>
  <script src="/Public/Common/js/header.js" charset="utf-8"></script>
  <script type="text/javascript">
    var item = document.getElementsByClassName('item');
    for(var i=0; i<item.length; i++) {
      item[i].index = i;
      item[i].onclick = function(e) {
        for(var i=0; i<item.length; i++) {
          item[i].classList.remove('active');
        }
        this.classList.add('active');
        console.log(this.innerHTML);
        $.ajax({
          url: '/path/to/file',
          type: 'GET',
          dataType: 'json',
          data: {param1: 'value1'}
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })

      }
    }
    var ent = document.getElementsByClassName('ent')[0];
    ent.onkeydown = function(e) {
      var keynum;
      if(window.event) {
        keynum = e.keyCode;
      } else if(e.which) {
        keynum = e.which;
      }
      if(keynum == 13) {
        console.log(e.target.value);
        $.ajax({
          url: '/path/to/file',
          type: 'GET',
          dataType: 'json',
          data: {num: e.target.value}
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      }
    }
    // var next = document.getElementsByClassName('next')[0];
    // next.onclick = function() {
    //   var active = document.getElementsByClassName('active')[0];
    //   var current = parseInt(active.innerHTML);
    //   for(var i=0; i<item.length-1; i++) {
    //     item[i].innerHTML = current + i;
    //   }
    // }

    // var prev = document.getElementsByClassName('prev')[0];
    // prev.onclick = function() {
    //   var active = document.getElementsByClassName('active')[0];
    //   var current = parseInt(active.innerHTML);
    //   for(var i=0; i<item.length-1; i++) {
    //     item[i].innerHTML = current-1 + i;
    //   }
    // }
  </script>
</body>
</html>