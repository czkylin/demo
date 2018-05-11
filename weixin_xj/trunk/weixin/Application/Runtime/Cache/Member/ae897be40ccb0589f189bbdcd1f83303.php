<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png" >
<link rel="stylesheet" href="/weixin/Public/Member/css/order/order_detail.css">

<title>订单详情</title>
</head>
<body>
	<div class="bar"></div>
	<div class="state">
		<p>订单状态：<?php  $ordertime = date("Y-m-d",strtotime($array[0]['CREATE_DATE'])); if($ordertime!=date("Y-m-d")&&$array[0]['ORDER_STATUS']=="待付款"){ echo "已过期"; }else{ echo $array[0]['ORDER_STATUS']; } ?></p>
	</div>
	<div class="detail">
		<ul>
			<li>订单名称：<?php echo ($array["0"]["ORDER_NAME"]); ?></li>
			<li>下单时间：<?php echo ($array["0"]["ORDER_DATE"]); ?></li>
			<li>订单号：<?php echo ($array["0"]["ORDER_ID"]); ?></li>
		</ul>
	</div>
	<div class="detail">
		<ul>
			<li>会员姓名：<?php echo ($array["0"]["MEMBER_NAME"]); ?></li>
		</ul>
	</div>
	<div class="price">
		<p>订单价格：</p>
		<span>￥<?php echo (round($array["0"]["ORDER_MONEY"],2)); ?>元</span>
	</div>

	<ul class="btn">
		<input type="hidden" id="order_id" value="<?php echo ($array["0"]["ORDER_ID"]); ?>">
		<?php if($array[0][ORDER_STATUS] == '待付款'): ?><form action="<?php echo U('Order/pay');?>" method="post" id="form_tijao" style="height:auto;">
			  <input type="hidden" name="price" value="<?php echo ($array["0"]["ORDER_MONEY"]); ?>">
			  <input type="hidden" name="serve_name" value="<?php echo ($array["0"]["ORDER_NAME"]); ?>">
			  <input type="hidden" name="order_id" value="<?php echo ($array["0"]["ORDER_ID"]); ?>">
			  <input type="hidden" name="time" value="<?php echo ($array["0"]["ORDER_DATE"]); ?>">
			  <input type="hidden" name="sj_type" id="sj_type" value="<?php echo ($sj_type); ?>">
			   <?php  if($ordertime==date("Y-m-d")) { ?>
			  <li class="cancel"><a href="javascript:void(0)" onClick="tpay()">取消订单</a></li>
			  <?php if($array[0][O2O_FLAG] != '2' && $array[0][ORDER_MONEY] != '0'): ?><li><a href="javascript:document:form_tijao.submit();">立即支付</a></li>
			  	<!-- <input type="submit" value="立即支付" id="sub2" > --><?php endif; ?>
			  <?php if($array[0][ORDER_NAME] == '患者根据处方订单下单'): ?><!-- <li><a id="sub1" href="javascript:;">到店支付</a></li> --><?php endif; ?>
			  <?php }?>
			</form><?php endif; ?>
		<?php if(($array[0][ORDER_STATUS] == '已付款') && ($array[0][O2O_FLAG] == '0')): ?><li><a href="javascript:void(0)" onClick="order()">我要退款</a></li><?php endif; ?>
	</ul>
<!-- 提示框 -->
<div class="tishi">
  <p>您已确定去药店支付</p>
  <a href="javascript:;">好</a>
</div>
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
<script>

	function tpay(){

		var order_id = $("#order_id").val();

		 $.ajax({

             type: "GET",

             url: "/weixin/index.php?m=Member&c=Order&a=tpay&order_id="+order_id,

             success: function(msg){

            	 if(msg=="ok"){

            		 alert("取消成功");

            		 location.href="/weixin/index.php?m=Member&c=Order&a=order_list";

            	 }else{

            		 alert("取消失败")

            	 }

             } 	

		 });

		

	}

	function order(){

		alert("请联系客服：400-656-2020");

	}

	/*提示框*/
	$("#sub1").click(function(){
	  $(".tishi").show();
	});
	$(".tishi a").click(function(){
	$(".tishi").hide();
	})

</script>
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>

</body>
</html>