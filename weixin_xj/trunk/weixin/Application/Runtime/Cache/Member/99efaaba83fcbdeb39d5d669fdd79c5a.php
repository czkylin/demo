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
<link href="/weixin/Public/Member/css/user/user_info.css?<?php echo time();?>.css" type="text/css" rel="stylesheet"/>
<script src="/weixin/Public/Member/js/jquery.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/3 + 'px';
</script>
<title>个人中心</title>
</head>
<body>
   

    <div class="user-title">
        <div class="touxiang">
            <a href="<?php echo U('Member/User/info_detail');?>">
                <?php if($member_pic == ''): if($member_sex == '女' ): ?><img src="/weixin/Public/Expert/images/fenXiang/dfgirl.png" alt="">
                        <i style="display:none;"></i>
                    <?php else: ?>
                        <img src="/weixin/Public/Expert/images/fenXiang/dfboy.png" alt="">
                        <i style="display:none;"></i><?php endif; ?>
                <?php else: ?>
                    <img src="<?php echo ($member_pic); ?>" />
                    <i style="display:none;" class="existence"></i><?php endif; ?>
            </a>
            <div class="name"><?php echo ($name); ?>
                <?php if($member_sex == '女' ): ?><span class="nv"></span>
                <?php else: ?>
                    <span class="nan"></span><?php endif; ?>
            </div>
        </div>
        <p class="tel">电话：<?php echo ($phone); ?></p>
        <p class="reg-time">注册时间：<?php echo ($time); ?></p>
       <!--  <img class="mask" /> -->
        <div class="mask" id="mask"></div>
    </div>

    <!-- 百倍爱心卡 -->
    <div class="hot">
        <a href="<?php echo U('Member/Huzhu/jiaruxingdong2');?>" class="hot-title">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/harns.png"></span>
            <b>百倍爱脑卡</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
         <ul class="hot-list clearfix">
            <li>
                <a href="<?php echo U('Member/User/expand_anklist',array('path'=>'个人中心我是代言人'));?>">
                    <img src="/weixin/Public/Member/images/gerenzhongxin/icon/hot1.png">
                    <p>爱脑卡代言人</p>
                </a>
            </li>
        </ul>
        <a href="<?php echo U('Member/Huzhu/jiaruxingdong');?>" class="hot-title">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/heart.png"></span>
            <b>百倍爱心卡</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
        <ul class="hot-list clearfix">
            <li>
                <a href="<?php echo U('Member/User/expand',array('path'=>'个人中心我是代言人'));?>">
                    <img src="/weixin/Public/Member/images/gerenzhongxin/icon/hot1.png">
                    <p>代言人</p>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Member/Huzhu/daiyan_list');?>">
                    <img src="/weixin/Public/Member/images/gerenzhongxin/icon/hot2.png">
                    <p>代言成果</p>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Member/Huzhu/fx');?>">
                    <img src="/weixin/Public/Member/images/gerenzhongxin/icon/hot3.png">
                    <p>销售结构</p>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Member/Huzhu/hz_order_list');?>">
                    <img src="/weixin/Public/Member/images/gerenzhongxin/icon/hot4.png">
                    <p>我的收入</p>
                </a>
            </li>
            <li>
                <a href="" id="sqtx">
                    <img src="/weixin/Public/Member/images/gerenzhongxin/icon/hot5.png">
                    <p>申请提现</p>
                </a>
                <div style="display: none;" id="is_staff"><?php echo ($res['error_code']); ?></div>
            </li>
        </ul>
    </div>

    <div class="info1">

        <a href="<?php echo U('Member/Order/order_list');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/zhangdan.png"></span>
            <b>我的订单</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <a href="<?php echo U('Member/User/myAccount');?>">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/zhanghu.png"></span>
            <b>我的账户</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>


        <a href="<?php echo U('Member/Consult/consult_list');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/zixun.png"></span>
            <b>我的咨询</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <a href="<?php echo U('Member/User/wd_bingli');?>">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/bingli.png"></span>
            <b>我的病例</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <a href="<?php echo U('Member/User/dangan');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/bl.png"></span>
            <b>我的健康档案</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <a href="<?php echo U('Member/User/my_bingli');?>">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin//icon/cy.png"></span>
            <b>管理就诊人</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <?php if($is_ceshi == '1'): ?><a href="<?php echo U('Member/Nurse/order');?>">
                <span><img src="/weixin//Public/Member/images/gerenzhongxin/take.png"></span>
                <b>护士集团</b>
                <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
            </a>
            <a href="<?php echo U('Member/Nurse/order_center');?>">
                <span><img src="/weixin//Public/Member/images/gerenzhongxin/take.png"></span>
                <b>护士订单</b>
                <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
            </a><?php endif; ?>

        <!--



        <a href="<?php echo U('Member/User/jzr_add');?>">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin/jzr.png"></span>
            <b>添加家庭成员</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>


         -->

    </div>
    <div class="info2">

        <a href="<?php echo U('Member/User/myExpert');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/yisheng.png"></span>
            <b>我的医生</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <a href="<?php echo U('Member/Order/yuyue_list');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/yyfu.png"></span>
            <b>我的预约</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <a href="<?php echo U('Member/Order/hz_list');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin//icon/huizhen.png"></span>
            <b>我的会诊</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <a href="<?php echo U('Member/User/yuepian_list');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/yp.png"></span>
            <b>我的阅片</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

    	<a href="<?php echo U('Member/Cf/cf_list');?>">
        	<span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/cf.png"></span>
            <b>我的电子处方</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

        <?php if($flag == 'ok'): ?><a href="<?php echo U('Member/User/fuwu');?>">
            	<span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/fwjl.png"></span>
                <b>我的服务记录</b>
                <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
            </a>
        <?php else: ?>
            <a href="javascript:;" id="fuwu">
                <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/fwjl.png"></span>
                <b>我的服务记录</b>
                <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
            </a><?php endif; ?>

        <a href="<?php echo U('Member/User/jifen_list');?>">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/jf.png"></span>
            <b>我的积分</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>

    </div>

    <div class="info1">
        <a href="<?php echo U('Member/FjYd/yd_list');?>">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/bl2.png"></span>
            <b>附近药店</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
        <a href="<?php echo U('Member/Huzhu/shop');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/mall.png"></span>
            <b>健康商城</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
        <a href="<?php echo U('Member/Djt/index');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/tv.png"></span>
            <b>健康大讲堂</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
    </div>

    <div class="info1" style="border-bottom: none">
        <?php if($flag == 'ok'): ?><a href="<?php echo U('Member/Jtys/expert_list');?>">
                <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/fuwu.png"></span>
                <b>VIP会员服务</b>
                <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
            </a>
        <?php else: ?>
            <a href="javascript:;" id="jtys">
                <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/fuwu.png"></span>
                <b>VIP会员服务</b>
                <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
            </a><?php endif; ?>
        <a href="<?php echo U('Home/Shouce/caiye');?>">
            <span><img src="/weixin//Public/Member/images/gerenzhongxin/icon/vip.png"></span>
            <b>VIP卡服务</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
        <a href="<?php echo U('Home/Shouce/smallBook');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/shuoming.png"></span>
            <b>VIP使用说明</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
        <a href="<?php echo U('Referral/referral');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/zhuanzhen.png"></span>
            <b>转诊申请</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
        <a href="<?php echo U('Referral/referral_list');?>">
            <span><img src="/weixin/Public/Member/images/gerenzhongxin/icon/zhuanzhen.png"></span>
            <b>转诊申请列表</b>
            <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.png"></i>
        </a>
    </div>

    <div style="display: none;" id="member_vip"><?php echo ($member_vip); ?></div>
    <div style="display: none;" id="flag"><?php echo ($flag); ?></div>
    <div style="display: none;" id="vip_flag"><?php echo ($vip_flag); ?></div>

<div style="height:55px"></div>
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
    wx.config({
            debug: false,
            appId: '<?php echo $appId;?>',
            timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
            nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
            signature: '<?php echo $signature;?>',// 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

    var wx_share_title = '心脑管家';
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

    $("#fuwu").click(function(){
        var flag = $("#flag").text();
        var vip_flag = $("#vip_flag").text();
        if(vip_flag == "ok")
        {
            // alert(flag);
            location.href="<?php echo U('User/fuwu');?>";
            return false;
        }else if(vip_flag == "00028" || vip_flag == "00024"){
            alert(flag);
            location.href="<?php echo U('Jtys/consult_introduce');?>";
            return false;
        }else{
            alert(flag);
            return false;
        }

    });

    $("#card").click(function(){
        var member_vip = $("#member_vip").text();
        if(member_vip == 0)
        {
            $("#fuwu").attr("href","javascript:void(0);");
            alert("您好！你暂无开通心脑护照卡！");
            return false;
        }

    });

    $("#jtys").click(function(){
        var flag = $("#flag").text();
        var vip_flag = $("#vip_flag").text();
        if(vip_flag == "ok")
        {
            // alert(flag);
            location.href="<?php echo U('Jtys/expert_list');?>";
            return false;
        }else if(vip_flag == "00028" || vip_flag == "00024"){
            alert(flag);
            location.href="<?php echo U('Jtys/consult_introduce');?>";
            return false;
        }else{
            alert(flag);
            return false;
        }
    });

    //头像
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
    if( $('.touxiang i').attr('class') == 'existence' ){
        var src = $('.touxiang img').attr('src');
        var obj = document.getElementById('mask');
        //判断安卓和IOS
        if(isAndroid){
            blur(obj, src, 5);
        }else{
            $('.user-title > .mask').css('background-image','url('+ src +')');
            obj.style.filter = obj.style.WebkitFilter = 'blur(5px)';
        }
        $('.user-title > .mask').css('background-position','center center');
        $('.user-title > .mask').css('background-size','150% 150%');
        $('.user-title > .mask').show();
    }


    function blur(element, src, strength){
        var image = new Image();
        image.onload = function(e){
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');

            canvas.width = this.width;
            canvas.height = this.height;

            context.drawImage(this, 0, 0);

            context.globalAlpha = 0.5; // Higher alpha made it more smooth
            // Add blur layers by strength to x and y
            // 2 made it a bit faster without noticeable quality loss
            for (var y = -strength; y <= strength; y += 2) {
                for (var x = -strength; x <= strength; x += 2) {
                    context.drawImage(canvas, x, y);
                }
            }
            context.globalAlpha = 1;
            element.style.backgroundImage = 'url('+canvas.toDataURL()+')';
        }
        image.src = src;

    }

    var is_staff = $("#is_staff").text();
    if(is_staff == 'ok')
    {
        $("#sqtx").click(function(){
            alert('内部员工不能提现');
            return false;
        });
    }
    else
    {
        $("#sqtx").attr('href',"<?php echo U('Member/Huzhu/take');?>");
    }

</script>
<script>
	var over_footer = '5';
</script>
<!--通底的引用结束-->
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
</body>
</html>