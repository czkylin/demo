<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="keywords" content="百倍爱心卡" />
	<meta name="description" content="" />
	<title>百倍爱心-智能手机健康管理套装</title>
	<link rel="stylesheet" href="/weixin/Public/Member/css/huzhu/znphone.css">
</head>
<body>
	<div class="wrapper">
		<!-- 头部 -->
		<div class="header">
			<img src="/weixin/Public/Member/images/huzhu/znphone/mainpic.jpg" alt="">
		</div>
		<!-- 切换 -->
		<ul class="tab">
			<li class="active">概述</li>
			<li>参数</li>
		</ul>
		<!-- 切换内容 -->
		<div class="content active">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con1-pic1.jpg" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic2.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic3.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic4.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic5.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic6.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic7.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic8.jpg" class="lazy"alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic9.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic10.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic11.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic12.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic13.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic14.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic15.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic16.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic17.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic18.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic19.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic20.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic21.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic22.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic23.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic24.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic25.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic26.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic27.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic28.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic29.jpg" class="lazy" alt="">
			<img data-original="/weixin/Public/Member/images/huzhu/znphone/con1-pic30.jpg" class="lazy" alt="">
		</div>
		<div class="content">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con2-pic1.jpg" alt="">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con2-pic2.jpg" alt="">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con2-pic3.jpg" alt="">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con2-pic4.jpg" alt="">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con2-pic5.jpg" alt="">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con2-pic6.jpg" alt="">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con2-pic7.jpg" alt="">
			<img src="/weixin/Public/Member/images/huzhu/znphone/con2-pic8.jpg" alt="">
		</div>
		<div class="block"></div>
		<!-- 链接 -->
		<div class="link">
			<span>￥1880元</span>
			<a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_zntz'));?>&sale_type=<?php echo C("SALE_TYPE_8");?>&user_name=<?php echo I('get.user_name','');?>">立即购买</a>
		</div>
	</div>
	<script src="/weixin/Public/Common/js/jquery.min.js"></script>
	<script src="/weixin/Public/Common/js/jquery.lazyload.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		//图片懒加载
		$("img.lazy").lazyload();

		tabFn()
		scorllFn()

		//微信分享
		wx.config({
            debug: false,
            appId: '<?php echo $appId;?>',
            timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
            nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
            signature: '<?php echo $signature;?>',// 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

        var wx_share_title = '用智能设备，享智慧健康';
        var wx_share_desc = '享受智能生活，体验健康未来，百倍爱心智能手机健康管理套装，你的健康，随处查看。';
        var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/huzhu/share_zntz/icon.png";

        wx.ready(function() {
            wx.onMenuShareTimeline({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_zntz&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('朋友圈');
                },
                cancel: function() {}
            });
            wx.onMenuShareAppMessage({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_zntz&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('微信');
                },
                cancel: function() {}
            });
        });

        //切换控制函数
        function tabFn(){
        	$('.tab > li').each(function(index){
        		$(this).click(function(){
	        		$(this).addClass('active').siblings().removeClass('active')
	        		$('.content').eq(index).addClass('active').siblings().removeClass('active')
	        	})
        	})
        }

        //滑动时tab固定函数
        function scorllFn(){
        	$(document).on('scroll',function(){
        		// console.log($(document).scrollTop() + ":" + $('.header').height())
        		if( $(document).scrollTop() >= $('.header').height()){
        			$('.tab').css({
        				'position':'fixed',
        				'left':0,
        				'top':0
        			})
        		}else if($(document).scrollTop() < $('.header').height()){
        			$('.tab').css({
        				'position':'relative'
        			})
        		}
        	})
        }

	</script>
	<!-- CNZZ统计代码 -->
	<div style="height:0px;overflow:hidden;"></div>
	<!-- CNZZ统计代码  百倍爱心宣四单独统计-->
	<div style="height:0px;overflow:hidden;"></div>
</body>
</html>