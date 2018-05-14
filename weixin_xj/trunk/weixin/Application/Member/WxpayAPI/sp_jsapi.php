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
//$wxtotal=1;
$total=$json['total'];
@$consult_title = $json['subject'];
@$status =$json['status'];
@$person_id =$json['person_id'];
@$card_number =$json['card_number'];
@$card_money =round($json['card_money'],2);


// $wxorderid = $out_trade_no."-".rand(100,999);
$attach = $out_trade_no."|".$status;
//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("$subject");  				//商品描述
$input->SetOut_trade_no("$out_trade_no"); 	//订单号
$input->SetTotal_fee("$wxtotal");				//支付总额
$input->SetTime_start(date("YmdHis"));		//订单开始时间
$input->SetTime_expire(date("YmdHis", time() + 1200));//订单失效时间 
$input->SetAttach("$attach");						//商品标记 可不填

// $input->SetNotify_url("http://wx-heartorg.yk2020.com/weixin/Application/Member/WxpayAPI/wx_notify_bak.php");
$input->SetNotify_url("http://wx-heartorg.yk2020.com/weixin/Application/Member/WxpayAPI/sz_wx_notify.php");


//接收微信支付异步通知回调地址

$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);

$order = WxPayApi::unifiedOrder($input);


//预支付 流水号


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
    <title><?php echo $consult_title;?></title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if(res.err_msg=="get_brand_wcpay_request:ok"){
					$('#pay_sub').removeAttr('onclick');//去掉a标签中的onclick事件
					if(<?php echo $status;?> == "1")
                    {
                        //去医院购买服务处理页面
                        window.location.href="/weixin/index.php?m=Member&c=User&a=user_info";
                    }
                    else 
					{
						//去到会员的咨询页面
						window.location.href="/weixin/index.php?m=Member&c=User&a=user_info";
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
					//TODO}
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
	function confirmpay()
	{
		if(zhufuId=='wx')
		{

			callpay();

		}
		else
		{
			
			var card_number = $('#card_number').html();
			var card_money = $('#card_money').html();
			var order_money = $('#order_money').html();
			var order_id = $('#out_trade_no').val();
			if(!parseFloat(card_money))
			{
				alert("您没有开卡!"); return false;
			}
			//alert(parseFloat(order_money));
			if(parseFloat(order_money)>parseFloat(card_money)||parseFloat(card_money)<=0){

				if(confirm("您的余额不足，是否去充值？"))
				{
					location.href='/weixin/index.php?m=Member&c=User&a=myAccount_cz&money='+order_money+'&order_id='+order_id;
				}
			}
			else
			{
				var pwd = prompt("请输入你的心脑护照卡密码:","");
				if(pwd==null){
					return false;
				}
				if(pwd=="")
				{
					alert("请输入你的心脑护照卡密码！"); return false;
				}
				$.ajax(
				{
					type: "post",
		            url: "/weixin/index.php?m=Member&c=Order&a=order_card_pay",
		            data: {'order_id':order_id,'card_number':card_number,'order_money':order_money,'available_amount':card_money,'pwd':pwd},
		            dataType: "json",
		            success: function(data)
                    {
                        data = eval('('+data+')');

                        if(data['error_code']=="ok")
                        {
                            	if(<?php echo $status;?> == "1")
                                {
                                    //去医院购买服务处理页面
                                    window.location.href="/weixin/index.php?m=Member&c=User&a=user_info";
                                }
                                else 
								{
									//去到会员的咨询页面
									window.location.href="/weixin/index.php?m=Member&c=User&a=user_info";
								}
                        }else
                        {
                            alert(data['error_desc']);
                            location.href='/weixin/index.php?m=Member&c=Order&a=order_detail&order_id='+order_id;
                        }
              
                    }
				});
			}
			
		}
	}
	
	</script>
</head>
<body>

<div class="zhifu_top">
	<p>服务:<span><?php echo $subject;?></span>
	<?php if($subject=="在线咨询"){?>
	<span style="color:#ff647c;">　(咨询服务在支付后当天有效)</span>
	<?php }?>
	</p>
	
</div>
<div class="zhifu_con">
	<p>费用:<b>￥<span id='order_money'><?php echo sprintf('%.2f',$total);;?></span>元</b></p>
	<input type="hidden" id="out_trade_no" value='<?php echo $out_trade_no ;?>'>
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
		<li id="czk">
			<div class="img-wrap">
				<img src="/weixin/Application/Member/View/images/gongzuoshi/weixin.png">
			</div>
			<div class="chongzhika"><span class="card">心脑护照卡</span> 
			<?php
			if($card_number)
			{
				echo "<font style='color:#333;font-size:12px'>卡号：<i style='color:#EF2525' id='card_number'>*** *** *** ".substr($card_number,-4)."</i> <br> 余额：<i style='color:#EF2525' id='card_money'>$card_money</i></font>";
			}
			else
			{
				echo "<font style='color:#EF2525;font-size:12px'>请您到当地医院内办储值卡</font>";
			}
			?>
			</div>
			<input type="radio" value="1" id="type-1" name="paytype"  />
			<label for="type-1" class="dangqian"><span></span></label>
		</li>
	</ul>
	<p><!-- 请在 --><span id="num"></span><!-- 内完成支付，逾期将取消 --></p>
</div>
<div class="queding" style=" margin-top:0;"><a href="javascript:void(0)" id="pay_sub" onclick="confirmpay()">确认支付</a></div>

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