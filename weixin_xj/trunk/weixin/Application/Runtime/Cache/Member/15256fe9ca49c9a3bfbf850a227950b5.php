<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="keywords" content="百倍爱心卡" />
	<meta name="description" content="给健康100分的呵护，百倍爱心卡健康保障计划。是您保障心血管健康的上上之选。" />
	<link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css?time=<?php echo ($time); ?>.css">
	<link rel="stylesheet" href="/weixin/Public/Common/css/Swiper/swiper.min.css">
	<link rel="stylesheet" href="/weixin/Public/Common/css/Swiper/animate.min.css">
	<link rel="stylesheet" type="text/css" href="/weixin/Public/Member/css/huzhu/share_des.css?time=<?php echo ($time); ?>.css">
	<title>号外号外！！好友<?php echo base64_decode(I("get.user_name",""));?>喊你快来领取十万援助！</title>
	<script>
		document.getElementsByTagName("html")[0].style.fontSize = document.documentElement.clientWidth / 15 + "px";
	</script>
</head>

<body>
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
	        <div class="swiper-slide page page1">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p1-title.jpg" alt="" class="title" alt="百倍爱心卡">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p1-des1.png" alt="" class="des1"  alt="投入百元，既享十万医疗保障">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p1-des2.png" alt="" class="des2" alt="让健康离你不再遥远">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p1-img.jpg" alt="" class="img">
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page page2">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p2-title.jpg" alt="" class="title">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p2-des.png" alt="" class="des" alt="10万爱心援助 北京三大基金会">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p2-con.jpg" alt="" class="con" alt="援助对象 援助额度 援助范围">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p2-img.jpg" alt="" class="img">
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page page3">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p3-title.jpg" alt="" class="title">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p3-des1.png" alt="" class="des1" alt="十万元解决看病昂贵">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p3-des2.png" alt="" class="des2">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p3-con.png" alt="" class="con" alt="手术费八万，我只花二百。爱心百倍卡为我健康保驾护航">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p3-img.jpg" alt="" class="img" style="width:100%;">
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page page4">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p4-title.jpg" alt="" class="title">
	        	<div class="con">
	        		<div class="swiper-container1">
					    <div class="swiper-wrapper">
					        <div class="swiper-slide"><img src="/weixin/Public/Member/images/huzhu/share_des/p4-img1.jpg" alt=""></div>
					        <div class="swiper-slide"><img src="/weixin/Public/Member/images/huzhu/share_des/p4-img2.jpg" alt=""></div>
					    </div>
					    <!-- 分页器 -->
					    <div class="swiper-pagination"></div>
					</div>
	        	</div>
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page page5">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p5-title.jpg" alt="" class="title">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p5-des.jpg" alt="" class="des" alt="援助额度 保障对象 保障范围">
	        	<img src="/weixin/Public/Member/images/huzhu/share_des/p5-img.jpg" alt="" class="img" alt="三大基金">
	        	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page page6">
	         	<img src="/weixin/Public/Member/images/huzhu/share_des/p6-title.jpg" alt="" class="title">
	         	<img src="/weixin/Public/Member/images/huzhu/share_des/p6-img1.jpg" alt="" class="img1" alt="发病率高 心血管">
	         	<img src="/weixin/Public/Member/images/huzhu/share_des/p6-img2.jpg" alt="" class="img2" alt="死亡率高 心血管">
	         	<img src="/weixin/Public/Member/images/huzhu/share_des/p6-des.jpg" alt="" class="des" alt="预防重要性">
	         	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page page7">
	         	<img src="/weixin/Public/Member/images/huzhu/share_des/p7-title.jpg" alt="" class="title">
	         	<img src="/weixin/Public/Member/images/huzhu/share_des/p7-img.jpg" alt="" class="img">
	         	<div class="arrow"></div>
	        </div>
	        <div class="swiper-slide page page8">
	         	<img src="/weixin/Public/Member/images/huzhu/share_des/p8-title.jpg" alt="" class="title">
	         	<img src="/weixin/Public/Member/images/huzhu/share_des/p8-img.jpg" alt="" class="img" alt="加入流程 百倍爱心卡 立即加入">
	        </div>
	    </div>    
	</div>
	<?php if($footer != 'hide'): ?><footer>
			<span>￥200</span>
			<a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C("SALE_TYPE_1");?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_des'));?>&user_name=<?php echo I('get.user_name','');?>" class="link">立即加入</a>
		</footer>
	<?php else: endif; ?>
	<script src="/weixin/Public/Common/js/jquery.min.js"></script>
	<script src="/weixin/Public/Common/js/zepto.js"></script>
	<script src="/weixin/Public/Common/js/swiper.min.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
	//appIOS端
	/*if (window.webkit) {
		$('.link').hide()
	}*/
    function set_log(act)
    {
        var type = "<?php echo ($type); ?>"+"_share_des";
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

		var mySwiper = new Swiper ('.swiper-container', {
		    direction: 'vertical',
		    height : window.innerHeight,
		    //Swiper初始化了	
		    onInit: function(swiper){
		      //alert(swiper.activeIndex);提示Swiper的当前索引
		      $(".page").eq(swiper.activeIndex).addClass("animate");
		    },
		    //Swiper切换结束后触发
		    onSlideChangeEnd: function(swiper){
		      $(".page").removeClass('animate');
		      $(".page").eq(swiper.activeIndex).addClass('animate');
		    }
		})  

		var mySwiper1 = new Swiper ('.swiper-container1', {
			direction: 'horizontal',
			loop: true,
			autoplay:5000,

			// 分页器
			pagination: '.swiper-pagination'
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

        var wx_share_title = '号外号外！！好友<?php echo base64_decode(I("get.user_name",""));?>喊你快来领取十万援助！';
        var wx_share_desc = '给健康100分的呵护，百倍爱心卡健康援助计划。是您保障心血管健康的上上之选。';
        var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/huzhu/share_icon/share_des.png";

        wx.ready(function() {
            wx.onMenuShareTimeline({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_des&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('朋友圈');
                },
                cancel: function() {}
            });
            wx.onMenuShareAppMessage({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_des&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('微信');
                },
                cancel: function() {}
            });
        });
	</script>
		<script type="text/javascript">
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
<!-- CNZZ统计代码  百倍爱心宣四单独统计-->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260919743).'" width="0" height="0"/>';?></div>
</body>
</html>