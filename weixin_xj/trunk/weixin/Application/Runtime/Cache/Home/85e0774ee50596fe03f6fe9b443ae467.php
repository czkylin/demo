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
     var wx_share_title = '我是代言人';
    var wx_share_desc = '百倍爱心卡贴近老百姓需求，一经问世，就受到老百姓的热烈欢迎!';
    var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Home/images/kalist/00.jpg";

    wx.ready(function() {
        wx.onMenuShareTimeline({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Home&c=Baibei&a=ka_list',
            imgUrl: wx_share_imgUrl,
            success: function() {
                set_log('朋友圈');
            },
            cancel: function() {}
        });
        wx.onMenuShareAppMessage({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Home&c=Baibei&a=ka_list',
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
	<section class="nav">
	    <ul class="btn-list clear">
            <li>
                <a href="<?php echo U('Home/Baibei/ka_list');?>">
                    <span>全部</span>
                </a>
            </li>
            <li class="active">
                <a href="javascript:;">
                    <span>百倍爱心卡</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Home/Baibei/ka_list_main');?>">
                    <span>重疾保障</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Home/Baibei/ka_list_1280');?>">
                    <span>健康管理套装</span>
                </a>
            </li>
            <!-- <li>
                <a href="<?php echo U('Home/Baibei/ka_list_498');?>">
                    <span>百倍爱心卡健康保健套装</span>
                </a>
            </li> -->
            <li>
                <a href="<?php echo U('Home/Baibei/ka_list_880');?>">
                    <span>高血压套装</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Home/Baibei/ka_list_1880');?>">
                    <span>手机套装</span>
                </a>
            </li>
        </ul>
        <div class="hr"></div>
	</section>
	<ul class="list">
        <li>
            <a href="<?php echo U('Home/Baibei/bb_list');?>" class="clear">
                <img src="/weixin/Public/Member/images/huzhu/share_icon/chuandi.png" alt="百倍爱心卡集锦">
                <div class="con">
                    <h2>百倍爱心卡集锦</h2>
                    <p>点击查看更多</p>
                </div>
                <!-- <div class="code">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
                </div> -->
            </a>
        </li>


        <!-- 医联体入口 -->
<!--         <li>
            <a href="<?php echo U('Member/Huzhu/yilianti',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/yilianti/icon.jpg" alt="远程视界科技集团小远带您乘坐医联体特快专列">
                <div class="con">
                    <h2>远程视界科技集团小远带您乘坐医联体特快专列</h2>
                    <p>远程视界科技集团小远带您走近远程人背后的故事</p>
                </div>
                <div class="code" data-code="yilianti">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="远程视界科技集团小远带您乘坐医联体特快专列">
                </div>
            </a>
        </li> -->

        <li>
            <a href="<?php echo U('Member/Huzhu/aid_neimeng',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/aid_neimeng/share.png" alt="百倍爱心卡巴彦淖尔市首例爱心援助">
                <div class="con">
                    <h2>有爱就有未来，百倍爱心卡之巴彦淖尔市首例爱心援助!</h2>
                    <p>刚好你需要，正好有我在！百倍爱心卡巴彦淖尔首例援助患者爱心援助！</p>
                </div>
                <div class="code" data-code="aid_neimeng">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡巴彦淖尔市首例爱心援助">
                </div>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Member/Huzhu/bbaxk_gwsn',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/huzhu/share_icon/icon.jpg" alt='开启高温"桑拿"模式，您想好如何应对三伏天了吗？'>
                <div class="con">
                    <h2>开启高温"桑拿"模式，您想好如何应对三伏天了吗？ </h2>
                    <p>酷热的天气一言不合就开启高温桑拿模式，处于高温、潮湿、闷热的三伏天，看百倍爱心卡如何帮您应付？</p>
                </div>
                <div class="code" data-code="bbaxk_gwsn">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
                </div>
            </a>
        </li>
         <!-- <li>
          <a href="<?php echo U('Member/Huzhu/father',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
            <img src="/weixin/Public/Member/images/huzhu/father/icon.jpg" alt="">
            <div class="con">
              <h2>【父亲节】百倍爱心卡买一送一 “霸”气归来<h2>
              <p>父亲节百倍爱心卡不仅买一送一，留下父亲电话和想要和父亲说的话，满满的爱意我们来替您传达！</p>
            </div>
            <div class="code" data-code="father">
              <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
          </a>
        </li> -->
        <!-- <li style="display:none;">
			<a href="<?php echo U('Member/Huzhu/christmas',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/zhuanti/christmas/share.jpg" alt="">
				<div class="con">
					<h2>圣诞有好礼，百倍爱心卡</h2>
					<p>今年圣诞节送给父母最好的礼物，健康贴心的百倍爱心卡。</p>
				</div>
				<div class="code" data-code="christmas">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li> -->
        <li>
			<a href="<?php echo U('Member/Huzhu/share_7',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_qi/tu.jpg" alt="">
				<div class="con">
					<h2>2000万援助金，只为护住你的心</h2>
					<p>天呐天呐，2000万援助金到位了？对！“百倍爱心卡”就是这么给力！！你还不知道？你怎么可以还不知道！！</p>
				</div>
				<div class="code" data-code="share_7">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>
		<!-- <li>
            <a href="<?php echo U('Member/Huzhu/share_qingming',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/huzhu/qingming/fx.png" alt="">
                <div class="con">
                    <h2>清明节之际，那些离你而去的亲人不为人知的秘密</h2>
                    <p>亲人的突然逝去让“子欲养而亲不待”成为人生最大的悲哀。</p>
                </div>
                <div class="code" data-code="share_qingming">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="VIP心脑护照卡">
                </div>
            </a>
        </li> -->
        
		<li>
			<a href="<?php echo U('Member/Huzhu/share_init',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/baozhang/top_ban.jpg" alt="">
				<div class="con">
					<h2>关爱身边人,<?php echo ($user_info["real_name"]); ?>送您10万健康援助</h2>
					<p>百倍爱心卡，老年人专属心血管援助。我觉得很适合您，抽空看看呗</p>
				</div>
				<div class="code" data-code="share_init">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>
		<li>
			<a href="<?php echo U('Member/Huzhu/share_yf',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','home_openid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_icon/share.png" alt="">
				<div class="con">
					<h2>好友<?php echo ($user_info["real_name"]); ?>喊你一起开始慢病管理啦</h2>
					<p>慢病管理百元援助项目，我们更懂你的身体</p>
				</div>
				<div class="code" data-code="share_yf">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>
		<li>
			<a href="<?php echo U('Member/Huzhu/share_parent',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_icon/parent.png" alt="">
				<div class="con">
					<h2><?php echo ($user_info["real_name"]); ?>告诉您，百元送父母10万健康援助</h2>
					<p>感恩回馈，百元爱心援助项目，关爱父母身体健康</p>
				</div>
				<div class="code" data-code="share_parent">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>
		<li>
			<a href="<?php echo U('Member/Huzhu/share_des',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_icon/share_des.png" alt="">
				<div class="con">
					<h2>号外号外！！好友<?php echo ($user_info["real_name"]); ?>喊你快来领取十万援助</h2>
					<p>给健康100分的呵护，百倍爱心卡健康援助计划。是您援助心血管健康的上上之选</p>
				</div>
				<div class="code" data-code="share_des">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>
		<li>
			<a href="<?php echo U('Member/Huzhu/share_5',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_icon/thanks.png" alt="">
				<div class="con">
					<h2>好友<?php echo ($user_info["real_name"]); ?>送您的亲人一份十万援助</h2>
					<p>老年人健康不可大意！百倍爱心卡，多一份援助，多一份安心</p>
				</div>
				<div class="code" data-code="share_5">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
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
	        <p class="pop-des">百倍爱心卡</p>  
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
$('.list').css('padding-top',$('.nav').height());
/*$('.btn-list').click(function(){
var btn_onoff = true;
	if(btn_onoff){
		$(this).css('height','auto');
	}else{
		$(this).css('height','1.5rem');	
	}
	btn_onoff = !btn_onoff;
		
})*/
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