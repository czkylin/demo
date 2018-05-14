<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/weixin/Public/Common/css/Swiper/swiper.min.css">
	<link rel="stylesheet" href="/weixin/Public/Common/css/Swiper/animate.min.css">
	<link rel="stylesheet" href="/weixin/Public/Member/css/huzhu/heart_health.css">
	<title>预防>治疗，让“心”更健康</title>
</head>
<body>
	<div class="wrapper">
		<div class="swiper-container">
	    <div class="swiper-wrapper">

	        <div class="swiper-slide page1">
	        	<img src="/weixin/Public/Member/images/huzhu/heart_health/p1-title.jpg" alt="" class="p1-title ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
	        </div>

	        <div class="swiper-slide page2">
	        	<div class="ani p2-title" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
	        		<h3>健康测试您达标吗？</h3>
	        		<p>让这些困扰离我们远去…</p>
	        	</div>
	        	<img src="/weixin/Public/Member/images/huzhu/heart_health/p2-des.png" alt="" class="p2-des ani" swiper-animate-effect="fadeIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.8s">
	        	<img src="/weixin/Public/Member/images/huzhu/heart_health/p2-pic.jpg" alt="" class="p2-pic ani" swiper-animate-effect="fadeIn" swiper-animate-duration="0.5s" swiper-animate-delay="1.4s">
	        </div>

	        <div class="swiper-slide page3">
	        	<h3 class="ani p3-title" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">心血管疾病已经成为死亡杀手</h3>
	        	<img src="/weixin/Public/Member/images/huzhu/heart_health/p3-des.jpg" alt="" class="ani p3-des" swiper-animate-effect="fadeIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.8s">
	        </div>

	        <div class="swiper-slide page4">
	        	<h3 class="ani p4-title" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">导致心血管疾病的危险因素</h3>
	        	<img src="/weixin/Public/Member/images/huzhu/heart_health/p4-des.jpg" alt="" class="ani p4-des" swiper-animate-effect="fadeIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.8s">
	        </div>

	        <div class="swiper-slide page5">
	        	<h3 class="ani p5-title" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">预防>治疗，预防三要点</h3>
	        	<div class="p5-des-wrapper">
	        		<img src="/weixin/Public/Member/images/huzhu/heart_health/p5-pic1.jpg" alt="" class="ani p5-pic1" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.8s">
	        		<img src="/weixin/Public/Member/images/huzhu/heart_health/p5-pic2.jpg" alt="" class="ani p5-pic2" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.3s" swiper-animate-delay="1s">
	        		<img src="/weixin/Public/Member/images/huzhu/heart_health/p5-pic3.jpg" alt="" class="ani p5-pic3" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.3s" swiper-animate-delay="1.2s">
	        	</div>
	        </div>

	        <div class="swiper-slide page6">
	        	<h3 class="ani p6-title" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">高血压健康管理套装设备</h3>
	        	<div class="p6-des-wrapper">
	        		<img src="/weixin/Public/Member/images/huzhu/heart_health/p6-pic1.jpg" alt="" class="ani p6-pic1" swiper-animate-effect="slideInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.8s">
	        		<img src="/weixin/Public/Member/images/huzhu/heart_health/p6-pic2.jpg" alt="" class="ani p6-pic2" swiper-animate-effect="slideInRight" swiper-animate-duration="0.3s" swiper-animate-delay="1s">
	        	</div>
	        </div>

	        <div class="swiper-slide page7">
	        	<img src="/weixin/Public/Member/images/huzhu/heart_health/p7-pic.jpg" alt="" class="ani p7-pic" swiper-animate-effect="slideIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
	        	<a class="link ani" href="/weixin/index.php?m=Member&c=Huzhu&a=blood&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&user_name=<?php echo I('get.user_name','');?>" swiper-animate-effect="fadeIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">点击了解详情</a>
	        </div>
	    </div>
	</div>
	</div>
	<script src="/weixin/Public/Common/js/jquery.min.js"></script> 
	<script src="/weixin/Public/Common/js/swiper.min.js"></script>
	<script src="/weixin/Public/Common/js/swiper.animate.min.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		var mySwiper = new Swiper ('.swiper-container', {
			direction: 'vertical',
		  onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
		    swiperAnimateCache(swiper); //隐藏动画元素 
		    swiperAnimate(swiper); //初始化完成开始动画
		  }, 
		  onSlideChangeEnd: function(swiper){ 
		    swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
		  } 
	  })
	  wx.config({
          debug: false,
          appId: '<?php echo $appId;?>',
          timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
          nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
          signature: '<?php echo $signature;?>',// 必填，签名，见附录1
          jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
      });

      var wx_share_title = '预防>治疗，让“心”更健康';
      var wx_share_desc = '预防是最好的治疗，百倍爱心高血压健康管理套装能够实时监测身体健康数据，达到疾病早发现早治疗，帮助我们快速战胜心血管疾病。';
      var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/huzhu/heart_health/icon.png";

      wx.ready(function() {
          wx.onMenuShareTimeline({
              title: wx_share_title,
              desc: wx_share_desc,
              link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=heart_health&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
              imgUrl: wx_share_imgUrl,
              success: function() {

                  set_log('朋友圈');
                
              },
              cancel: function() {}
          });
          wx.onMenuShareAppMessage({
              title: wx_share_title,
              desc: wx_share_desc,
              link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=heart_health&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
              imgUrl: wx_share_imgUrl,
              success: function() {
                 set_log('微信');
              },
              cancel: function() {}
          });
      });       
	</script>
	<div style="height:0px;overflow:hidden;"><script src="https://s11.cnzz.com/z_stat.php?id=1259145768&web_id=1259145768" language="JavaScript"></script></div>
	<div style="height:0px;overflow:hidden;"><script src="https://s19.cnzz.com/z_stat.php?id=1263440746&web_id=1263440746" language="JavaScript"></script></div>
</body>
</html>