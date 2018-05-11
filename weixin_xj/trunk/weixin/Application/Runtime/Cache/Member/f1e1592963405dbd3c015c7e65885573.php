<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png" >
<!--CSS当前页面文件-->
<link rel="stylesheet" type="text/css" href="/weixin/Public/Home/css/baibei/ka_list.css">
<script src="/weixin/Public/Member/js/jquery.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>
    document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12 + 'px';
    wx.config({
        debug: false,
        appId: '<?php echo $appId;?>',
        timestamp: '<?php echo $timestamp;?>', // 必填，生成签名的时间戳
        nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
        signature: '<?php echo $signature;?>',// 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
     var wx_share_title = '百倍爱脑卡—让脑血管患者病有所依';
    var wx_share_desc = '脑部疾病不用愁，百倍爱脑能解忧，三大基金送保障，全面守护脑健康。!';
    var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/huzhu/ainaoka/an_share.jpg";

    wx.ready(function() {
        wx.onMenuShareTimeline({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Home&c=Baibei&a=ka_list2',
            imgUrl: wx_share_imgUrl,
            success: function() {
                set_log('朋友圈');
            },
            cancel: function() {}
        });
        wx.onMenuShareAppMessage({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Home&c=Baibei&a=ka_list2',
            imgUrl: wx_share_imgUrl,
            success: function() {
                set_log('微信');
            },
            cancel: function() {}
        });
    });
</script>
<title>我是代言人</title>
</head>
<body>
	<ul class="list">
		<li>
			<a href="<?php echo U('Member/Huzhu/ainaoka',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/ainaoka/an_share.jpg" alt="">
				<div class="con">
					<h2>百倍爱脑卡—让脑血管患者病有所依</h2>
					<p>脑部疾病不用愁，百倍爱脑能解忧，三大基金送保障，全面守护脑健康。</p>
				</div>
				<div class="code" data-code="ainaoka">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱脑卡—让脑血管患者病有所依">
				</div>
			</a>
		</li>
	</ul>
	<!-- 二维码 -->
	<div id="pop">
	    <div class="mask"></div>
	    <div class="pop-content">
	        <div class="close"></div>
	        <div class="pop-main">
	            <img src="" alt="">
	            <p>扫一扫，即刻加入慢病管理</p>
	        </div>
	        <p class="pop-des">百倍爱脑卡</p>
	    </div>
	</div>
	<div style="display: none;" id="member_vip"><?php echo ($member_vip); ?></div>

<!--通底的引用结束-->
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
<div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?>
</div>
</body>
<script>
/*$('.btn-list').click(function(){
var btn_onoff = true;
	if(btn_onoff){
		$(this).css('height','auto');
	}else{
		$(this).css('height','1.5rem');
	}
	btn_onoff = !btn_onoff;

})*/
$('.list').css('padding-top',$('.nav').height());
function set_log(act)
    {
        var type = "Home_ka_list";
        var link_mobile = "<?php echo ($user_info['link_mobile']); ?>";
        var openid = "<?php echo ($openid); ?>";
        var path = "<?php echo ($path); ?>";
        $.ajax(
                {
                    type: "post",
                    url: "/weixin/index.php?m=Member&c=Index&a=set_log",
                    data: {'type':type,'openid':openid,'link_mobile':link_mobile,'url_path':path,'act':act},
                    dataType: "json",
                    success: function(data)
                    {
                        console.log('set_log:success');
                    }
            });
    }

$('.code').click(function(){
    var a = $(this).data('code');
    var username = encodeURIComponent("<?php echo ($user_info['user_name']); ?>");
    var path = encodeURIComponent("Home_expand_list : {2weima} :Home_"+a);
    var code = "http://weixin.yk2020.com/include/get_share_code.aspx?user_id=<?php echo ($user_info['user_id']); ?>&link_mobile=<?php echo ($user_info['link_mobile']); ?>&user_name="+username+"&a="+a+"&url_path="+path+"&homeid=<?php echo ($openid); ?>";
    console.log(code);
    $('#pop').show();
    $('.pop-main img').attr('src',code);
    return false;
});
$('.close').click(function(){
    $('#pop').hide();
});
</script>
</html>