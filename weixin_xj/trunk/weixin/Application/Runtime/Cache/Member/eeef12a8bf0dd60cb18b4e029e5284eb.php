<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="format-detection" content="telephone=no">
  <meta name="description" content="">
  <meta name="keywords" content="百倍爱脑">
	<title>百倍爱脑卡—让脑血管患者病有所依</title>
	<style type="text/css">
		*{padding: 0;margin:0;}
		img {border-width: 0; vertical-align: middle;}
		a{text-decoration:none;border:none;-webkit-tap-highlight-color: rgba(0,0,0,0);-webkit-tap-highlight-color:transparent;outline:none;}
		.zntz-con{margin-bottom: 1.7rem;}
		.zntz-btn{width: 100%;height: 1.7rem; line-height: 1.7rem; font-size: .64rem; color: #ffffff;position: fixed;
		  left: 0;bottom: 0;overflow: hidden;}
		.zntz-btn span{width: 35%;height:100%;display:block;text-align: center; background: #ff8400;float: left;}
		.zntz-btn a{width: 65%;height:100%;display:block;text-align: center;background: #bf1b20; color: #ffffff;float: right;}
	</style>
	<script type="text/javascript">
		document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/15 + 'px';
	</script>
</head>
<body>
	<section class="zntz-con">
		<img src="/weixin/Public/Member/images/huzhu/ainaoka/ank01.jpg" width="100%;">
		<img src="/weixin/Public/Member/images/huzhu/ainaoka/ank02.jpg" width="100%;">
		<img src="/weixin/Public/Member/images/huzhu/ainaoka/ank03.jpg" width="100%;">
		<img src="/weixin/Public/Member/images/huzhu/ainaoka/ank04.jpg" width="100%;">
	</section>
	<div class="zntz-btn">
        <?php if($footer != 'hide'): ?><span>￥200元</span>
		<a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C('SALE_TYPE_9');?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=ainaoka'));?>&user_name=<?php echo I('get.user_name','');?>">立即购买</a><?php endif; ?>
	</div>
	<script src="/weixin/Public/Common/js/jquery.min.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		//微信分享
		wx.config({
            debug: false,
            appId: '<?php echo $appId;?>',
            timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
            nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
            signature: '<?php echo $signature;?>',// 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
        var wx_share_title = '百倍爱脑卡—让脑血管患者病有所依';
        var wx_share_desc = '脑部疾病不用愁，百倍爱脑能解忧，三大基金送保障，全面守护脑健康。';
        var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/huzhu/ainaoka/an_share.jpg";

        wx.ready(function() {
            wx.onMenuShareTimeline({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=ainaoka&footer=<?php echo ($footer); ?>&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('朋友圈');
                },
                cancel: function() {}
            });
            wx.onMenuShareAppMessage({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=ainaoka&footer=<?php echo ($footer); ?>&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('微信');
                },
                cancel: function() {}
            });
        });
	</script>
	<!-- CNZZ统计代码 -->
	<div style="height:0px;overflow:hidden;">
		<script src="https://s22.cnzz.com/z_stat.php?id=1262826665&web_id=1262826665" language="JavaScript"></script>
	</div>
</body>
</html>