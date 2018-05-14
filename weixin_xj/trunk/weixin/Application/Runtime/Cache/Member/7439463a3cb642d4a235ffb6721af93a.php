<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta name="share-title" content="">
<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link rel="stylesheet" href="/weixin/Public/Member/css/user/myaccount.css">
<title>我的账户</title>
</head>
<body>
	<h2 class="title">基本信息</h2>
	<div class="kainfo">
		<ul>
			<li class="name">
				<div>
					<span>真实姓名</span>
					<i><?php echo ($card_info["MEMBER_NAME"]); ?></i>
				</div>
			</li>

			<li class="shenfenzheng">
				<div>
					<span>身份证号</span>
					<i>
					<?php if($card_info['MEMBER_CARD'] == ''): ?>未填写
					<?php else: ?>
					<?php echo (substr($card_info["MEMBER_CARD"],0,4)); ?>***<?php echo (substr($card_info["MEMBER_CARD"],-4)); endif; ?>
					</i>
				</div>
			</li>

			<li class="tel">
				<div>
					<span>手机号码</span>
					<i><?php echo ($card_info["MEMBER_MOBILE"]); ?></i>
				</div>
			</li>

			<?php if($card_info['CARD_NUMBER'] != ''): ?><li class="ls">
				<a class="noborder" href="<?php echo U('Member/User/myAccount_list');?>&type=2">
					<span>查看历史账单</span>
				</a>
			</li><?php endif; ?>

		</ul>
	</div>
	<!-- VIP卡 -->
	<h2 class="title">
		VIP心脑护照卡
		<?php if($card_info['VIP_CARD_NUMBER'] != ''): ?><a href="<?php echo U('Member/User/fuwu');?>">服务</a>
		<?php else: endif; ?>
	</h2>
	<div class="kainfo">
		<div class="ka vip">
			<!--有卡-->
			<?php if($card_info['VIP_CARD_NUMBER'] != ''): ?><a href="<?php echo U('Member/User/fuwu');?>" class="noborder">
					<img src="/weixin/Public/Member/images/user/ka1.jpg" alt="">
					<h3>VIP会员</h3>
					<p>*** *** *** <?php echo (substr($card_info["VIP_CARD_NUMBER"],(-4))); ?></p>
				</a>
			<?php else: ?>
			<!-- 没有卡 -->
			<img src="/weixin/Public/Member/images/user/wuka.jpg" alt="">
			<div>您还不是VIP会员,<a href="https://weidian.com/item.html?itemID=1927804008">马上成为VIP会员</a></div><?php endif; ?>
		</div>
	</div>
	<!--心脑护照卡-->
	<h2 class="title">
		心脑护照卡
		<?php if($card_info['CARD_NUMBER'] != ''): ?><a href="<?php echo U('Member/User/myAccount_list');?>">账单</a><?php endif; ?>
	</h2>
	<div class="kainfo">
		<div class="ka">
			<!--没有卡-->
			<?php if($card_info['CARD_NUMBER'] == ''): ?><img src="/weixin/Public/Member/images/user/wuka.jpg" alt="">
				<div style="color:#333;">您还没有心脑护照卡,<a href="https://weidian.com/item.html?itemID=1935370148 ">马上去办理</a></div>
			<?php else: ?>
				<a href="<?php echo U('Member/User/myAccount_detail');?>" class="noborder">
					<!--有卡-->
					<img src="/weixin/Public/Member/images/user/ka.jpg" alt="">
					<h3>心脑护照卡</h3>
					<span>储值卡</span>
					<p>*** *** *** <?php echo (substr($card_info["CARD_NUMBER"],(-4))); ?></p>
				</a><?php endif; ?>
		</div>
		<?php if($card_info['CARD_NUMBER'] != ''): ?><ul>
			<li class="account">
				<a href="<?php echo U('Member/User/myAccount_detail');?>" class="noborder">
					<span>余额</span>
					<i>￥<?php if($card_yue['cur_money'] == ''): ?>0
					<?php else: ?>

						<?php echo (round($card_yue['cur_money'],2)); endif; ?></i>
				</a>
			</li>
		</ul><?php endif; ?>
	</div>
	<script src="/weixin/Public/Member/js/jquery.min.js"></script>
	<script>
		$("#fuwu").click(function(){
	        var member_vip = $("#member_vip").text();
	        if(member_vip == 0)
	        {
	            $("#fuwu").attr("href","javascript:void(0);");
	            alert("您好！你暂无开通心脑护照卡！");
	        }
	        
	    });
	</script>
</body>
</html>