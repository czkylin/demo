<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">

<!--设置页面无缓存-->
<meta HTTP-EQUIV="pragma" CONTENT="no-cache"> 
<meta HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate"> 
<meta HTTP-EQUIV="expires" CONTENT="0"> 


<meta name="share-title" content="">
<title>健康档案</title>
<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link rel="stylesheet" href="/weixin/Public/Member/css/user/dangan.css">
<script>
	document.getElementsByTagName("html")[0].style.fontSize= document.documentElement.clientWidth / 16 + "px";
</script>
<style type="text/css">

</style>
</head>
<body>

<div class="xinxi">
	<div class="des">
		<?php if($member_info['MEMBER_PIC'] == ''): ?><div class="touxiang">
				<div  style=" background: url(/weixin/Application/Member/View/images/member.png) no-repeat; background-size: 100% 100% ;"><img src="/weixin/Public/Common/images/1px.png" alt=""></div>
			</div>

		<?php else: ?>
			<div class="touxiang">
				<div  style=" background: url(<?php echo ($member_info['MEMBER_PIC']); ?>) no-repeat; background-size: 100% 100% ;"><img src="/weixin/Public/Common/images/1px.png" alt=""></div>
			</div><?php endif; ?>
		<a href="javascript:;" class="arw" onclick="self.location=document.referrer;"></a>
		<p class="name"><?php echo ($member_ytj["0"]["MEMBER_NAME"]); ?></p>
	</div>
	<ul class="list">
		<li>
			<a href="javscript:;">
				<span>出生日期</span>
				<?php if(!$member_info.BIRTH_DAY): ?><i>暂无</i>
				<?php else: ?>
					<i><?php echo ($member_info["BIRTH_DAY"]); ?></i><?php endif; ?>
			</a>
		</li>
		<li>
			<a href="javscript:;">
				<span>性别</span>
				<i><?php echo ($member_ytj["0"]["MEMBER_SEX"]); ?></i>
			</a>
		</li>
		<li>
		<!-- 判断从我的患者过来的直接去自己的病例，否则去所有的病例 -->
			<?php if($isperson == 1): ?><a href="<?php echo U('Expert/User/wd_bingli',array('member_id'=>$person_id));?>"><span>病例</span><i></i></a>
			<?php else: ?>
				<a href="<?php echo U('Expert/User/my_bingli',array('member_id'=>$member_id));?>"><span>病例</span><i></i></a><?php endif; ?>
		</li>
		<!-- <li>
			<a href="javscript:;">
				<span>血型</span>
				<i>AB</i>
			</a>
		</li> -->
		<li class="jiantou">
			<a href="javscript:;">
				<span>健康档案</span>
				<i class="jiantou active"><!-- <img src="/weixin/Public/Member/images/user/jiantou1.png" alt=""> --></i>
			</a>
		</li>
	</ul>
	<div class="more-list">
		<ul class="con">
			<li>
				<a href="<?php echo U('Expert/User/dangan_yitiji',array('tj_type'=>0,'member_id'=>$member_id,'member_mobile'=>$member_mobile));?>"><span>血糖</span>
					<i class="hui">
						<?php if(!empty($member_ytj[0]['GLUCOSE'])): echo (round($member_ytj["0"]["GLUCOSE"],1)); endif; ?>
					</i>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Expert/User/dangan_yitiji',array('tj_type'=>1,'member_id'=>$member_id,'member_mobile'=>$member_mobile));?>"><span>血氧</span><i class="hui"><?php echo ((isset($member_ytj["0"]["BLOODOXYGEN"]) && ($member_ytj["0"]["BLOODOXYGEN"] !== ""))?($member_ytj["0"]["BLOODOXYGEN"]):""); ?></i></a>
			</li>
			<li>
				<a href="<?php echo U('Expert/User/dangan_yitiji',array('tj_type'=>2,'member_id'=>$member_id,'member_mobile'=>$member_mobile));?>"><span>血压</span><i class="hui"><?php echo ((isset($member_ytj["0"]["BLOODPRESSURE"]) && ($member_ytj["0"]["BLOODPRESSURE"] !== ""))?($member_ytj["0"]["BLOODPRESSURE"]):""); ?></i></a>
			</li>
			<li>
				<a href="<?php echo U('Expert/User/dangan_yitiji',array('tj_type'=>3,'member_id'=>$member_id,'member_mobile'=>$member_mobile));?>"><span>心率</span><i class="hui"></i></a>
			</li>
			<li>
				<a href="<?php echo U('Expert/User/dangan_yitiji',array('tj_type'=>4,'member_id'=>$member_id,'member_mobile'=>$member_mobile));?>"><span>身高、体重</span><i class="hui"><?php echo ((isset($member_ytj["0"]["HEIGHTWEIGHT"]) && ($member_ytj["0"]["HEIGHTWEIGHT"] !== ""))?($member_ytj["0"]["HEIGHTWEIGHT"]):""); ?></i></a>
			</li>
			<li>
				<a href="<?php echo U('Expert/User/dangan_yitiji',array('tj_type'=>5,'member_id'=>$member_id,'member_mobile'=>$member_mobile));?>"><span>尿常规</span><i class="hui"></i></a>
			</li>
			<li>
				<a href="<?php echo U('Expert/User/dangan_yitiji',array('tj_type'=>6,'member_id'=>$member_id,'member_mobile'=>$member_mobile));?>"><span>体温</span><i class="hui">
				<?php if(!empty($member_ytj[0]['TEMPERATURE'])): echo (round($member_ytj["0"]["TEMPERATURE"],1)); endif; ?></i></a>
			</li>

		</ul>
	</div>	
</div>

<script src="/weixin/Public/Expert/js/jquery.min.js"></script>
<script src="/weixin/Public/Common/js/zepto.js"></script>
<script>
	var onOff = false; 
	$('.jiantou').on("touchend",function(){
		if( onOff ){
			$(this).addClass("active");
			$('.more-list').slideDown();
		}else{
			$(this).removeClass("active");
			$('.more-list').slideUp();
		}
		onOff = !onOff;	
	})
</script>	
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145622).'" width="0" height="0"/>';?></div>
</body>
</html>