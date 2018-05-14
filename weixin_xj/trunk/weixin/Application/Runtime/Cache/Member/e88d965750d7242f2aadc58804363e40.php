<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="keywords" content="百倍爱心卡" />
	<meta name="description" content="感恩回馈，百元爱心援助项目，关爱父母身体健康。" />
	<link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css"?time=<?php echo ($time); ?>.css>
	<link rel="stylesheet" href="/weixin/Public/Common/css/Swiper/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="/weixin/Public/Member/css/huzhu/share_parent.css?time=<?php echo ($time); ?>.css">
	<title><?php echo base64_decode(I("get.user_name",""));?>告诉您，百元送父母10万健康援助</title>
	<script>
		document.getElementsByTagName("html")[0].style.fontSize = document.documentElement.clientWidth / 15 + "px";
	</script>
	<style>
		body{
			background: #000;
		}
	</style>
</head>
<body class="scroll">
      <nav id="nav" class="nav clear">
        <span class="fl">最新数据：</span>
        <div class="people fl">
                <ul class="box">
                    <li class="box">
                    <!-- <?php if(is_array($buy_list)): $i = 0; $__LIST__ = $buy_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$buy): $mod = ($i % 2 );++$i;?><em><?php echo (msubstr($buy["PERSON_NAME"],0,1,'utf-8',false)); ?>**&nbsp;<?php echo (substr($buy["PERSON_MOBILE"],0,3)); ?>****<?php echo (substr($buy["PERSON_MOBILE"],-4)); ?></em><?php endforeach; endif; else: echo "" ;endif; ?> -->
                    <em>总资金：<?php echo ($bx_list["all_money"]); ?>元</em>
                    <em>今日增长资金：<?php echo ($bx_list["day_all_money"]); ?>元</em>
                    <em>已加入会员：<?php echo ($bx_list["hy_num"]); ?>人</em>
                    <em>今日增长会员：<?php echo ($bx_list["day_hy_num"]); ?>人</em>
                    </li>
                </ul>
            </div>
    </nav> 
	<div class="swiper-container">
	    <div class="swiper-wrapper">
	        <div class="swiper-slide page1">
	        	<img src="/weixin/Public/Member/images/huzhu/share_parent/p1.jpg" alt="为父母做些什么">
	        	<div class="link clear">
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=share_yf&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&user_name=<?php echo I('get.user_name','0');?>">查看详情</a>
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C("SALE_TYPE_1");?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_parent'));?>&user_name=<?php echo I('get.user_name','0');?>">立即加入</a>
				</div>
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page2">
	        	<img src="/weixin/Public/Member/images/huzhu/share_parent/p2.jpg" alt="二百元 手术费">
	        	<div class="link clear">
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=share_yf&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&user_name=<?php echo I('get.user_name','0');?>">查看详情</a>
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C("SALE_TYPE_1");?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_parent'));?>&user_name=<?php echo I('get.user_name','0');?>">立即加入</a>
				</div>
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page3">
	        	<img src="/weixin/Public/Member/images/huzhu/share_parent/p3.jpg" alt="只花200元，享受各种服务">
	        	<div class="link clear">
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=share_yf&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&user_name=<?php echo I('get.user_name','0');?>">查看详情</a>
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C("SALE_TYPE_1");?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_parent'));?>&user_name=<?php echo I('get.user_name','0');?>">立即加入</a>
				</div>
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page4">
	        	<img src="/weixin/Public/Member/images/huzhu/share_parent/p4.jpg" alt="最高援助10万">
	        	<div class="link clear">
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=share_yf&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&user_name=<?php echo I('get.user_name','0');?>">查看详情</a>
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C("SALE_TYPE_1");?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_parent'));?>&user_name=<?php echo I('get.user_name','0');?>">立即加入</a>
				</div>
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page5 scroll">
	        	<img src="/weixin/Public/Member/images/huzhu/share_parent/p5.jpg" alt="立即加入">
				<div class="link clear">
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=share_yf&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&user_name=<?php echo I('get.user_name','0');?>">查看详情</a>
					<a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C("SALE_TYPE_1");?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_parent'));?>&user_name=<?php echo I('get.user_name','0');?>">立即加入</a>
				</div>
	        </div>
	    </div>    
	</div>
	<script src="/weixin/Public/Common/js/zepto.js"></script>
	<script src="/weixin/Public/Common/js/swiper.min.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		var mySwiper = new Swiper ('.swiper-container', {
		    direction: 'vertical',
		    height : window.innerHeight,
		    resistanceRatio:0
		})  

		//微信分享
		wx.config({
            debug: false,
            appId: '<?php echo $appId;?>',
            timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
            nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
            signature: '<?php echo $signature;?>',// 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

        var wx_share_title = ' <?php echo base64_decode(I("get.user_name",""));?>告诉您，百元送父母10万健康援助';
        var wx_share_desc = '感恩回馈，百元爱心援助项目，关爱父母身体健康。';
        var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/huzhu/share_icon/parent.png";

        wx.ready(function() {
            wx.onMenuShareTimeline({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_parent&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('朋友圈');

                },
                cancel: function() {}
            });
            wx.onMenuShareAppMessage({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_parent&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                     set_log('微信');
                },
                cancel: function() {}
            });

        });
	</script>
	<script src="/weixin/Public/Common/js/jquery.min.js"></script>

	<script type="text/javascript">


    function set_log(act)
    {
        var type = "<?php echo ($type); ?>"+"_share_parent";
        var link_mobile = '<?php echo I("get.link_mobile","");?>';
        var openid = "<?php echo ($homeid); ?>";
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

	var h = $('#nav ul').html();
	var w = 0;
	$('#nav em').each(function(){
	    w += $(this).outerWidth() + 20;
	})
	$('#nav ul').append(h).width(w);
	var iNow = 0;

setInterval(function(){
    $('#nav ul').css({
        'transform': 'translate3d(-'+iNow+'px,0,0)',
        '-webkit-transform': 'translate3d(-'+iNow+'px,0,0)'
    });
    iNow++;
    if(iNow > $('#nav li').width()){
        iNow = 0;
    }
},30);
	</script>
<!-- CNZZ统计代码 -->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
<!-- CNZZ统计代码  百倍爱心送父母单独统计-->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260894085).'" width="0" height="0"/>';?></div>

</body>
</html>