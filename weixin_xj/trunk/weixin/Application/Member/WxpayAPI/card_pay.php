<?php 
ini_set('date.timezone','Asia/Shanghai');
session_start();
//error_reporting(E_ERROR);
require_once "./lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";



//打印输出数组信息
function printf_info($data)
{
    // foreach($data as $key=>$value){
    //    echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    // }
}

//①、获取用户openid
$tools = new JsApiPay();
$openId = $_SESSION['m_openid'];
//解密支付参数
$json = $_GET['json'];
$json = $tools->passport_decrypt($json, "123");
$json = json_decode(($json),true);
$subject=$json['subject'];
$out_trade_no=$json['out_trade_no'];
$wxtotal=$json['total']*100;
$total=$json['total'];
$order_id =$json['order_id'];
$card_number =$json['card_number'];
$mobile =$json['mobile'];




//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("$subject");  				//商品描述
$input->SetOut_trade_no("$out_trade_no"); 	//订单号
$input->SetTotal_fee("$wxtotal");				//支付总额
$input->SetTime_start(date("YmdHis"));		//订单开始时间
$input->SetTime_expire(date("YmdHis", time() + 1200));//订单失效时间 	
$input->SetNotify_url("http://wx-heartorg.yk2020.com/weixin/Application/Member/WxpayAPI/card_notify.php");
//$input->SetNotify_url("http://wx-heartorg.yk2020.com/");
//接收微信支付 异步通知回调地址
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);

$order = WxPayApi::unifiedOrder($input);
// echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <link type="text/css" rel="stylesheet" href="/weixin/Application/Member/WxpayAPI/css/bootstrap.min.css" >
	<link type="text/css" rel="stylesheet" href="/weixin/Application/Member/WxpayAPI/css/zhifu.css" >
	<link type="text/css" rel="stylesheet" href="/weixin/Application/Member/View/css/studioZj.css"/>
    <title>订单支付</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				//alert(res.err_code+res.err_desc+res.err_msg);
				if(res.err_msg=="get_brand_wcpay_request:ok")
				{
					var order = $("#orderid").val();
					if(order)
					{
						//window.location.href="/weixin/index.php?m=Member&c=User&a=card_cz&order_id=<?php echo $order_id;?>&total=<?php echo $total;?>&$out_trade_no=<?php echo $out_trade_no;?>";
						window.location.href="/weixin/index.php?m=Member&c=User&a=order_card_pay&order_id=<?php echo $order_id;?>";
						alert("充值成功！");
					}
					else
					{
						//window.location.href="/weixin/index.php?m=Member&c=User&a=card_cz&total=<?php echo $total;?>&$out_trade_no=<?php echo $out_trade_no;?>";
						window.location.href="/weixin/index.php?m=Member&c=User&a=myAccount_detail";
						alert("充值成功！");
					}
					

				}
				else if(res.err_msg == "get_brand_wcpay_request:cancel")
				{
					//用户取消支付；
					alert("取消支付！");
					location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
					// window.location.href="../../member/zixun_list.php?dopost=list";
				}
				else if(res.err_msg == "get_brand_wcpay_request:fail")
				{
					//用户支付失败
					alert("支付失败，请重新选择支付");
					location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
					// window.location.href="../../member/zixun_list.php?dopost=list";
				}
				else
				{
					alert("失败了。。");
				}
			}
		);
	}

	function callpay()
	{
		//判断微信版本
		var wechatInfo = navigator.userAgent.match(/MicroMessenger\/([\d\.]+)/i) ;
		if( !wechatInfo )
		{
			alert("微信支付仅支持在微信app内发起");
			return;
		}
		else if ( wechatInfo[1] < "5.0" ) 
		{
			alert("您的微信版本小于5.0,请升级版本后再次尝试");
			return;
		}
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
	<script type="text/javascript">
	//获取共享地址
	function editAddress()
	{
		WeixinJSBridge.invoke(
			'editAddress',
			<?php echo $editAddress; ?>,
			function(res){
				var value1 = res.proviceFirstStageName;
				var value2 = res.addressCitySecondStageName;
				var value3 = res.addressCountiesThirdStageName;
				var value4 = res.addressDetailInfo;
				var tel = res.telNumber;
				
				//alert(value1 + value2 + value3 + value4 + ":" + tel);
			}
		);
	}
	
	window.onload = function(){
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', editAddress); 
		        document.attachEvent('onWeixinJSBridgeReady', editAddress);
		    }
		}else{
			editAddress();
		}
	};
	
	
	</script>
</head>
<body>

<div class="zhifu_top">
	<p>卡号:<span><?php echo $card_number;?></span></p>
</div>
<div class="zhifu_con">
	<p>充值金额:￥<span id='order_money'><?php echo $total;?></span>元</p>
	<input type="hidden" id="out_trade_no" value='<?php echo $out_trade_no ;?>'>
	<input type="hidden" id="orderid" value='<?php echo $order_id ;?>'>
</div>
<div class="zhifu_bot">
	<h2>选择支付方式</h2>
	<ul>
		<li id="wx">
			<div class="img-wrap">
				<img src="/weixin/Application/Member/View/images/gongzuoshi/weixin.png">
			</div>
			<p>微信<span>推荐</span></p>
			<input type="radio" value="1" id="type-1" name="paytype" checked="checked" />
			<label for="type-1" class="dangqian"><span></span></label>
		</li>
	</ul>
	<p>请在<span id="num"></span>内完成支付，逾期将取消</p>
</div>
<div class="queding" style=" margin-top:0;"><a href="javascript:void(0)" onclick="callpay()">确认支付</a></div>

<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
<script>

	//支付页面
	//初始状态 id默认选择第一个微信支付方式
	var zhufuId = $(".zhifu_bot li").eq(0).attr('id');
	$(".zhifu_bot li").eq(0).find('img').attr("src",'/weixin/Application/Member/View/images/gongzuoshi/weixin1.png');
	//支付选择处理
	$(".zhifu_bot li").each(function(){
		$(this).click(function(){
			$(".zhifu_bot li").each(function(){
				$(this).find('img').attr("src",'/weixin/Application/Member/View/images/gongzuoshi/weixin.png');
			});
			$(this).find('img').attr("src",'/weixin/Application/Member/View/images/gongzuoshi/weixin1.png');

			//获取对应的支负ID
			zhufuId = $(this).attr("id");
		})
	})

</script>
</body>
</html>