<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>北京圣康华</title>
  <!-- 公共样式 -->
  <link rel="stylesheet" href="/Public/Common/css/header_ft.css">
  <!-- 当前样式 -->
  <link rel="stylesheet" href="/Public/css/focus/newsDetail.css">
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
      <div class="title">公司动态</div>
      <div class="desc">Company News</div>
    </div>
  </div>
  <div class="nav con">
    <div class="w1080">
      <a href="">首页</a><span>></span><a href="">新闻动态</a><span>></span><a href=""><?php echo ($arcinfo['ACT_TITLE']); ?></a>
    </div>
  </div>
  <div class="con1 con">
      <h2><?php echo ($arcinfo['ACT_TITLE']); ?></h2>
      <div class="title">
        <div class="title1 fl">发布时间： <span><?php echo (Dtodiy("Y-m-d",$arcinfo['CREATE_DATE'])); ?></span></div>
        <div class="title2 fl">编辑： <span><?php echo ($arcinfo['USER_NAME']); ?></span></div>
        <div class="title3 fr">
          <!-- <span class="phone fl">手机查看</span> -->
          <ul class="fl fz">
            <li class="fl">大</li>
            <li class="fl active">中</li>
            <li class="fl">小</li>
          </ul>
          <div class="QRcode">
            <img src="/Public/images/focus/newsDetail/img2.png" alt="">
            <span>扫描二维码 手机上观看</span>
          </div>
        </div>
      </div>
      <div class="text">
        <p><?php echo ($arcinfo['ACT_DESC']); ?></p>
        <p class="last"><span>温馨提示：</span>以上资料仅供参考，具体情况请免费咨询在线专家   <a href="javascript:;" onclick="openZoosUrl('chatwin');">立即咨询</a></p>
        <p class="bottom">
          <?php if(!$arcnl['DT_LAST']): ?><a href="javascript:;"><span>上一篇：</span>没有了</a>
          <?php else: ?>
            <a href="/Focus/<?php echo ($arcnl['DT_LAST'][0]['RECORD_ID']); ?>/1"><span>上一篇：</span><?php echo ($arcnl['DT_LAST'][0]['ACT_TITLE']); ?></a><?php endif; ?>
          <?php if(!$arcnl['DT_NEXT']): ?><a href="javascript:;"><span>下一篇：</span>没有了</a>
          <?php else: ?>
            <a href="/Focus/<?php echo ($arcnl['DT_NEXT'][0]['RECORD_ID']); ?>/1"><span>下一篇：</span><?php echo ($arcnl['DT_NEXT'][0]['ACT_TITLE']); ?></a><?php endif; ?>
        </p>
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
    var fz = document.getElementsByClassName('fz')[0];
    var oLi = fz.getElementsByTagName('li');
    var p = document.getElementsByTagName('p');
    var phone = document.getElementsByClassName('phone')[0];
    var QRcode = document.getElementsByClassName('QRcode')[0];
    for(var i=0; i<oLi.length; i++) {
      oLi[i].index = i;
      oLi[i].onclick = function() {
        for(var i=0; i<oLi.length; i++) {
          oLi[i].classList.remove('active');
        }
        this.classList.add('active');
        console.log(this.index);
        if(this.index == 0) {
          for(var i=0; i<p.length; i++) {
            p[i].classList.remove('font1', 'font2', 'font3');
            p[i].classList.add('font1');
          }
        } else if(this.index == 1) {
          for(var i=0; i<p.length; i++) {
            p[i].classList.remove('font1', 'font2', 'font3');
            p[i].classList.add('font2');
          }
        } else if(this.index == 2) {
          for(var i=0; i<p.length; i++) {
            p[i].classList.remove('font1', 'font2', 'font3');
            p[i].classList.add('font3');
          }
        }
      }
    }
    phone.onmouseover = function() {
      QRcode.classList.add('active');
    }
    phone.onmouseout = function() {
      QRcode.classList.remove('active');
    }
  </script>
</body>
</html>