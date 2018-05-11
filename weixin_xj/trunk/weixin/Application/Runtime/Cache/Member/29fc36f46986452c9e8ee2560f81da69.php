<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png" >
<!--CSS库文件-->
<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link href="/weixin/Public/Common/css/commonFooter/footer_v2.min.css" type="text/css" rel="stylesheet"/>
<!--CSS当前页面文件-->

<link href="/weixin/Public/Member/css/personalCenter.min.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Member/css/hos_list.min.css" type="text/css" rel="stylesheet"/>
 <script src="/weixin/Public/Member/js/jquery.min.js"></script>
 <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/3 + 'px';
    wx.config({
        debug: false,
        appId: '<?php echo $appId;?>',
        timestamp: '<?php echo $timestamp;?>', // 必填，生成签名的时间戳
        nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
        signature: '<?php echo $signature;?>',// 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
</script>
<title>账号设置</title>
</head>
<body>
<div class="" style=" width: 100%; position:fixed; top: 35%; left: 0; z-index: 999;">
	<p class="msgtishi"  id="msg"></p>
</div>
<div id="J_Account_Info" class="gp GJ_Gp g-items gp-profile" style="padding-bottom: 80px;">
 	<ul>
		<li class="avatar">
			<label style=" margin-top:14px;">头像</label>
			<b class="jiantou">
				<a href="/weixin/index.php?m=Member&c=User&a=edit_face&user_pic=<?php echo ($member_pic_encode); ?>">
                 <?php if($member_pic == ''): if($member_sex == '女' ): ?><img src="/weixin/Public/Expert/images/fenXiang/dfgirl.png" alt=""style='_margin-top:expression(( 180 - this.height ) / 2);' width="50" height="50"/>
                    <?php else: ?>
                        <img src="/weixin/Public/Expert/images/fenXiang/dfboy.png" style='_margin-top:expression(( 180 - this.height ) / 2);' width="50" height="50"/><?php endif; ?>
                <?php else: ?>
                    <img src="<?php echo ($member_pic); ?>" style='_margin-top:expression(( 180 - this.height ) / 2);' width="50" height="50" /><?php endif; ?>
					
				</a>
			</b>
		</li>
		<li class="link">
			<a href="">
				<label>账号</label>
				<span class="right" style="line-height:20px;"><?php echo ($phone); ?></span>
			</a>
		</li>
		<li class="link">
			<a href="/weixin/index.php?m=Member&c=User&a=band_name" class="">
				<label class="nowidth"><span>*</span>姓名</label>
				<span class="right yirenz"><?php echo ($member_name); ?></span>
			</a>
		</li>
		<li class="link">
			<a href="/weixin/index.php?m=Member&c=User&a=sex_update" class="">
				<label class="nowidth"><span>*</span>性别</label>
				<span class="right yirenz"><?php echo ($member_sex); ?></span>
			</a>
		</li>
        <li class="link">
            <a href="/weixin/index.php?m=Member&c=User&a=age_update" class="">
                <label class="nowidth"><span>*</span>年龄</label>
                <span class="right yirenz"><?php echo ($member_age); ?></span>
            </a>
        </li>
		<li class="link">
			<a href="#" class="">
				<label class="nowidth"><span>*</span>手机号</label>
				<span class="right yirenz"><?php echo ($phone); ?></span>
			</a>
		</li>
		<li class="link">
			<a href="/weixin/index.php?m=Member&c=User&a=band_name" class="">
				<label class="nowidth">身份证</label>
				<span class="right yirenz"><?php echo ($MEMBER_CARD); ?></span>
			</a>
		</li>	
	</ul>
</div>
<!--通底的引用开始-->
<footer id="over_footer">

		<a class="over_footer_shouye" href="<?php echo U('Member/Index/index');?>">首页</a>

		<a class="over_footer_zixun" href="<?php echo U('Member/Doc/doc_list');?>">咨询</a>

		<a class="over_footer_yuepian" href="<?php echo U('Member/Hos/hos_list','serve_id=29');?>">阅片</a>

		<a class="over_footer_dingdan_dd" href="<?php echo U('Member/Order/order_list');?>">订单</a>

		<a class="over_footer_geren" href="<?php echo U('Member/User/user_info');?>">个人中心</a>

</footer>

<div class="" style=" width: 100%; position:fixed; top: 35%; left: 0; z-index: 999;">

	<p class="msgtishi"  id="msg"></p>

</div>

<script>

	var shouye = $("#over_footer .over_footer_shouye"),zixun = $("#over_footer .over_footer_zixun"),yuepian = $("#over_footer .over_footer_yuepian"),dingdan_dd = $("#over_footer .over_footer_dingdan_dd"),geren = $("#over_footer .over_footer_geren");

	$(function()

	{

		if(over_footer==1)

		{

			shouye.removeClass("over_footer_shouye").addClass("over_footer_shouye_on");

		};

		if(over_footer==2)

		{

			zixun.removeClass("over_footer_zixun").addClass("over_footer_zixun_on");

		};

		if(over_footer==3)

		{

			yuepian.removeClass("over_footer_yuepian").addClass("over_footer_yuepian_on");

		};

		if(over_footer==4)

		{

			dingdan_dd.removeClass("over_footer_dingdan_dd").addClass("over_footer_dingdan_dd_on");

		};

		if(over_footer==5)

		{

			geren.removeClass("over_footer_geren").addClass("over_footer_geren_on");

		}

	})

</script>

<script>

    function showmsg(){

        $('#msg').show();

        $('#msg').html('暂未开放！');

        setTimeout(function(){fail();},2000);

        return false;

    }

    function fail(){

        $('#msg').hide()

    }

</script>
 
<script>

    var wx_share_title = '心健康管家';
    var wx_share_desc = '远程心界微信公众平台';
    var wx_share_imgUrl = "<?php echo ($member_pic); ?>";

    wx.ready(function() {
        wx.onMenuShareTimeline({
            title: wx_share_desc,
            link: 'http://weixin.yk2020.com/program/member_member_xj_qrcode.aspx',
            imgUrl: wx_share_imgUrl,
            success: function() {},
            cancel: function() {}
        });
        wx.onMenuShareAppMessage({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://weixin.yk2020.com/program/member_member_xj_qrcode.aspx',
            imgUrl: wx_share_imgUrl,
            success: function() {},
            cancel: function() {}
        });
    });

</script>

<script>
	var over_footer = '5';
</script>
<!--通底的引用结束-->
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
</body>
</html>