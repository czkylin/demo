<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="cache-control" content="public">

<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

<meta name="apple-mobile-web-app-capable" content="yes">

<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<meta name="format-detection" content="telephone=no">

<!--公用样式调用-->

<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >

<link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet"/>

<!--分享页面样式调用-->

<link href="/weixin/Public/Home/css/order.min.css" type="text/css" rel="stylesheet"/>

<title>我的订单</title>

</head>

<body>

<div id="J_Account_Info" class="gp GJ_Gp g-items gp-profile" style="padding-bottom: 10px;">

	<div class="dingdan_list">

		<div class="chose_fuwu list_show" id="order-list">
            <?php if(empty($order_list)): ?><div class="nodetail" style="width:100%;height:100%;text-align:center;position:fixed;top:0;left:0;display:box;display:-webkit-box;-webkit-box-pack:center;-webkit-box-align:center;background:#fff;">
                    <div>
                        <img src="/weixin/Public/Common/images/icon/icon1.png" alt=""><br><br>
                        <i>暂无数据</i>
                    </div>
                </div>
            <?php else: ?>
			<?php if(is_array($order_list)): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><dl>
			<?php if($order['ORDER_NAME'] == '患者根据处方订单下单'): ?><a href="/weixin/index.php?m=Home&c=Order&a=order_detail&order_id=<?php echo ($order['ORDER_ID']); ?>">
			<?php else: ?>
				<a href="/weixin/index.php?m=Home&c=Order&a=order_info&order_id=<?php echo ($order['ORDER_ID']); ?>"><?php endif; ?>
				<dt>

					<span><img width="75" height="75" <?php if($order['HEADIMGURL'] != '' ): ?>src="<?php echo ($order['HEADIMGURL']); ?>" <?php else: ?> src="/weixin/Public/Home/images/common/cf_list.png"<?php endif; ?> /></span>

				</dt>

				<dd>

					<h2>服务名称：<?php echo ($order['ORDER_NAME']); ?></h2>

					<p>订单ID：<?php echo ($order['ORDER_ID']); ?>&nbsp;&nbsp;&nbsp;总价：<em class="quantity"><?php echo (round($order['ORDER_MONEY'],2)); ?></em>元&nbsp;&nbsp;&nbsp;数量：<em class="quantity">1</em></p>

					<p>下单时间：<?php echo ($order['CREATE_DATE']); ?></p>

					<span>订单状态：<?php echo ($order['ORDER_STATUS']); ?>&nbsp;&nbsp;&nbsp;核销状态：<?php echo ($order['O2O_FLAG']); ?></span>

				</dd>

				<br clear="all" />

				</a>

			</dl><?php endforeach; endif; else: echo "" ;endif; endif; ?>

		</div>

	</div>

	<div class="ui-jiazai"><a href="javascript:void(0);" onClick="loadmore('#current_pagenum','/weixin/index.php?m=Home&c=Order&a=order_list_append&order_id=','#order-list');" <?php echo ($stly); ?>>加载更多</a></div>

	<div id="current_pagenum" style="display:none">2</div>

</div>

<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>

<script src="/weixin/Public/Common/js/load_more.js" type="text/javascript"></script>
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260047007).'" width="0" height="0"/>';?></div>
</body>

</html>