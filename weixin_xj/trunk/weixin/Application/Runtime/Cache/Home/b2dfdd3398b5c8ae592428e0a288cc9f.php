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
	    <ul class="btn-list">
            <li class="active">
                <a href="javascript:;">
                    <span>全部</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Home/Baibei/ka_list_baibei');?>">
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
        <!-- <li>
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
            <a href="<?php echo U('Member/Huzhu/yilianti',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/yilianti/icon.jpg" alt="远程视界科技集团小远带您乘坐医联体特快专列">
                <div class="con">
                    <h2>远程视界科技集团小远带您乘坐医联体特快专列!</h2>
                    <p>远程视界科技集团小远带您走近远程人背后的故事</p>
                </div>
                <div class="code" data-code="yilianti">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="远程视界科技集团小远带您乘坐医联体特快专列">
                </div>
            </a>
        </li>
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
            <a href="<?php echo U('Member/Huzhu/blood',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/huzhu/share_icon/blood.png" alt="百倍爱心高血压健康管理套装">
                <div class="con">
                    <h2>百倍爱心高血压健康管理套装带给你健康舒心的呵护!</h2>
                    <p>为您提供快捷、全面、专业的血压监测及健康运动的咨询、管理服务</p>
                </div>
                <div class="code" data-code="blood">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心高血压健康管理套装">
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
		<!--<li>
			<a href="<?php echo U('Member/Huzhu/rise',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/rise.jpg" alt="">
				<div class="con">
					<h2>心血管病看病难看病贵，爱心卡是否水涨船高？</h2>
					<p>百倍爱心卡涨价，官方表示“很无奈”</p>
				</div>
				<div class="code" data-code="rise">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>
        <li>
			<a href="<?php echo U('Member/Huzhu/share_6',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_icon/zjl.jpg" alt="">
				<div class="con">
					<h2>百倍爱心卡要涨价了</h2>
					<p>护心大行动，爱心同传递！我们的援助一直在进行!</p>
				</div>
				<div class="code" data-code="share_6">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>-->
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
    <li>
         <a href="<?php echo U('Member/Huzhu/share_zntz',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'));?>" class="clear">
            <img src="/weixin/Public/Member/images/huzhu/share_zntz/icon.png" alt="百倍爱心-智能手机健康管理套装">
            <div class="con">
            <h2>用智能设备，享智慧健康</h2>
              <p>享受智能生活，体验健康未来，百倍爱心智能手机健康管理套装，你的健康，随处查看。</p>
            </div>
            <div class="code" data-code="share_zntz">
              <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
          </a>
    </li>
    <!-- <li>
      <a href="/weixin/index.php?m=Member&c=Lott&a=index" class="clear">
        <img src="/weixin/Public/Member/Lott/images/lott.png" alt="">
        <div class="con">
          <h2>端午大作战，避开炸弹抢粽子了。<h2>
          <p>限时20秒，快快抢粽子得分吧，抢得分数越多享受优惠越大哦</p>
        </div>
        <div class="code" data-code="duanwujie">
          <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
        </div>
      </a>
    </li> -->

    <!-- <li>
			<a href="<?php echo U('Member/Huzhu/duanwujie',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/zhuanti/duanwujie/1.png" alt="">
				<div class="con">
					<h2>今年端午送父母一个百倍爱心粽——端午大促 买一送一<h2>
					<p>今年端午，送给父母一份特别的礼物，百倍爱心卡（百倍爱心粽），给父母一份健康的祝福！</p>
				</div>
				<div class="code" data-code="duanwujie">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li> -->

    <li>
			<a href="<?php echo U('Member/Huzhu/aid',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
        <img class="" src="/weixin/Public/Member/images/aid/200.jpg" alt="">
        <div class="con">
					<h2>百元投入 倾情援助<h2>
					<p>百倍爱心卡首例手术援助患者术后回访实录</p>
				</div>
				<div class="code" data-code="aid">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>

		<!-- <li>
			<a href="<?php echo U('Member/Huzhu/mother',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/mother/icon.jpg" alt="">
				<div class="con">
					<h2>妈妈的时光机，满满的全是我</h2>
					<p>送给妈妈“百倍爱心卡重疾保障”即使不能长期陪伴在妈妈身边，也心安！</p>
				</div>
				<div class="code" data-code="mother">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li> -->
		<li>
			<a href="<?php echo U('Member/Huzhu/bbk_z',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_bbk/bbk.jpg" alt="">
				<div class="con">
					<h2>百倍爱心卡重疾保障，<?php echo base64_decode($user_info['user_name']);?>送你两个10万，请查收</h2>
					<p>成为我们的会员，不但能获得最高10万元的手术健康援助，而且如果突发急性心肌梗塞还可获得10万保险赔偿。</p>
				</div>
				<div class="code" data-code="bbk_z">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>
		<li>
            <a href="<?php echo U('Member/Huzhu/share_jqr_1',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/huzhu/share_icon/jqr_1.jpg" alt="">
                <div class="con">
                    <h2>地球人你好，我是机器人萌萌，有我你家会去大专家,傲娇脸</h2>
                    <p>心脏有病不是事儿，术前检查大数据，术中援助百倍卡，专家伴你常管理，健康长长久久，点击查看详情</p>
                </div>
                <div class="code" data-code="share_jqr_1">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="VIP心脑护照卡">
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
            <a href="<?php echo U('Member/Huzhu/share_9900_1',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/huzhu/share_icon/9900.jpg" alt="">
                <div class="con">
                    <h2>管理 “心脑血管”疾病 家庭医生为你护航</h2>
                    <p>健康数据采集,健康状况判断,健康计划执行，私人家庭医生,医疗陪护机器人 。加入我们，远离心血管疾病，健康管理身体</p>
                </div>
                <div class="code" data-code="share_9900_1">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="VIP心脑护照卡">
                </div>
            </a>
        </li>

		<li>
            <a href="<?php echo U('Member/Huzhu/share_1280_new',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/newbaibei/fx.jpg" alt="">
                <div class="con">
                    <h2>2017，<?php echo base64_decode($user_info['user_name']);?>邀您一起开启慢性病管理！</h2>
                    <p>健康检查，紧急呼救，智能定位，数据传输，远程查看，你需要的全都有！只有你想不到的，没有我们做不到的！</p>
                </div>
                <div class="code" data-code="share_1280_new">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
                </div>
            </a>
        </li>
        <!-- <li>
			<a href="<?php echo U('Member/Huzhu/long_9900',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/long/icon.jpg" alt="">
				<div class="con">
					<h2><?php echo base64_decode($user_info['user_name']);?>,夜华约你一起谈谈“心脑”的故事</h2>
					<p>三生三世，十里桃花，夜华君与你相约，还在等什么？走，赴约去...</p>
				</div>
				<div class="code" data-code="long_9900">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li> -->
		<li>
			<a href="<?php echo U('Member/Huzhu/join_1280',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/join/icon.jpg" alt="">
				<div class="con">
					<h2><?php echo base64_decode($user_info['user_name']);?>让最亲的人拥有“1+3”健康管理</h2>
					<p>“1+3”百倍爱心卡健康管理您的身体，百倍爱心卡+3套智能设备，身体健康数据实时掌控，帮助您为最亲的人健康管理</p>
				</div>
				<div class="code" data-code="join_1280">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li>
		<!-- <li>
            <a href="<?php echo U('Member/Huzhu/share_1280_chunjie',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
                <img src="/weixin/Public/Member/images/huzhu/share_9/icon.jpg" alt="">
                <div class="con">
                    <h2>新年礼物已送达，各位快来看看这是啥！</h2>
                    <p>健康检查，紧急呼救，智能定位，数据传输，远程查看，你需要的全都有！只有你想不到的，没有我们做不到的！</p>
                </div>
                <div class="code" data-code="share_1280_chunjie">
                    <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
                </div>
            </a>
        </li> -->

		<!-- <li>
			<a href="<?php echo U('Member/Huzhu/share_1280_1',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_9/icon.png" alt="">
				<div class="con">
					<h2>礼物都给你备好了！全在这了！把“我”收了吧！</h2>
					<p>健康检查，紧急呼救，智能定位，数据传输，远程查看，你需要的全都有！只有你想不到的，没有我们做不到的！</p>
				</div>
				<div class="code" data-code="share_1280_1">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
				</div>
			</a>
		</li> -->
		<li>
			<a href="<?php echo U('Member/Huzhu/blood',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_icon/blood.png" alt="百倍爱心高血压健康管理套装">
				<div class="con">
					<h2>百倍爱心高血压健康管理套装带给你健康舒心的呵护!</h2>
					<p>为您提供快捷、全面、专业的血压监测及健康运动的咨询、管理服务</p>
				</div>
				<div class="code" data-code="blood">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心高血压健康管理套装">
				</div>
			</a>
		</li>
		<!-- <li>
			<a href="<?php echo U('Member/Huzhu/share_498_1',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>$path));?>" class="clear">
				<img src="/weixin/Public/Member/images/huzhu/share_icon/hlqz.jpg" alt="">
				<div class="con">
					<h2>血管轻松，健康保障！套装更优惠哦!</h2>
					<p>百倍爱心卡保健套餐，只为更好护住你的心！</p>
				</div>
				<div class="code" data-code="share_498_1">
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