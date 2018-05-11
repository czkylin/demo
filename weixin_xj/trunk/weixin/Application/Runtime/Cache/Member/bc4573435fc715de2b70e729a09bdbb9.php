<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="cache-control" content="public">
    <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png">
    <!--CSS库文件-->
    <link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet">
    <link href="/weixin/Public/Common/css/commonFooter/footer_v2.min.css" type="text/css" rel="stylesheet" />
    <!--CSS当前页面文件-->
    <link href="/weixin/Public/Member/css/dingdan.min.css" type="text/css" rel="stylesheet" />
    <link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet" />
    <title>我的订单</title>
</head>
<body style=" background:#ebebeb">
    <div id="J_Account_Info" class="gp GJ_Gp g-items gp-profile" style=" background:#ebebeb">
        <div class="tab-box" style="margin:0;">
            <div class="tab1"><a href="<?php echo U('Member/Order/order_list');?>"><span>我的订单</span></a></div>
            <div class="tab2"><a href="<?php echo U('Member/Cf/cf_list');?>"><span>我的处方</span></a></div>
        </div>
        <ul class="states">
           
            <li <?php if($act == 1): ?>class="active"<?php endif; ?>><a href="<?php echo U('Member/Order/order_list',array('act'=>1));?>">全部订单</a></li>
            <li <?php if($act == 2): ?>class="active"<?php endif; ?>><a href="<?php echo U('Member/Order/order_list',array('order_status'=>0,'o2o_flag'=>0,'act'=>2));?>">待付款</a></li>
            <li <?php if($act == 3): ?>class="active"<?php endif; ?>><a href="<?php echo U('Member/Order/order_list',array('order_status'=>1,'act'=>3));?>">已付款</a></li>
            <li <?php if($act == 4): ?>class="active"<?php endif; ?>><a href="<?php echo U('Member/Order/order_list',array('o2o_flag'=>1,'act'=>4));?>">已完成</a></li>
            <li <?php if($act == 5): ?>class="active"<?php endif; ?>><a href="<?php echo U('Member/Order/order_list',array('o2o_flag'=>2,'act'=>5));?>">已作废</a></li>
        </ul>
        <?php if(empty($order_list)): ?><div class="nodetail">
                <img src="/weixin/Public/Common/images/icon/icon1.png" alt="">
                <i>暂无数据</i>
            </div>
        <?php else: ?>
        <div class="diandan_list">
            <ul id="order-list">
               <!--  empty="暂时没有数据" -->
                <?php if(is_array($order_list)): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><li>
                        <div class="tit">

                            <h2><?php echo ($order['SJ_NAME']); ?></h2>

                            <?php if($order['O2O_FLAG'] == '已作废'): ?><i>已作废</i>
                            <?php else: ?>
                             <?php  $ordertime = date("Y-m-d",strtotime($order['CREATE_DATE'])); if($ordertime!= date("Y-m-d")&&$order['ORDER_STATUS']=='待付款') { echo "<i>已过期</i>"; }else{ echo "<i>".$order['ORDER_STATUS']."</i>"; } endif; ?> 
                        </div>
                        <div class="des">
                            <?php if($order["SJ_TYPE"] == '1'): ?><a href="<?php echo U('Member/Order/hos_order_detail',array('order_id'=>$order['ORDER_ID'],'sj_type'=>$order['SJ_TYPE']));?>">
                            <?php elseif($order["SJ_TYPE"] == '2'): ?>
                                <a href="<?php echo U('Member/Order/hz_order_detail',array('order_id'=>$order['ORDER_ID'],'sj_type'=>$order['SJ_TYPE'],'hz_id'=>$order['HZ_ID'],'order_name'=>$order['ORDER_NAME']));?>">
                            <?php else: ?>
                                <a href="<?php echo U('Member/Order/hos_order_detail',array('order_id'=>$order['ORDER_ID'],'sj_type'=>$order['SJ_TYPE']));?>"><?php endif; ?>
                            <img src="<?php echo ((isset($order['SERVE_PIC']) && ($order['SERVE_PIC'] !== ""))?($order['SERVE_PIC']):'/weixin/Public/Member/images/order/order_list.png'); ?>" width="40px" height="40px" />
                             
                            <h2><?php echo ($order['ORDER_NAME']); ?></h2>  <span><?php echo ($order['CREATE_DATE']); ?></span>
                            </a>
                            <!-- SERVE_PIC -->
                        </div>

                        <div class="btn">
                       
                            <?php if($order['O2O_FLAG'] == '已作废'): else: ?>
                                <?php if($order['ORDER_STATUS'] == '待付款'): if($ordertime== date("Y-m-d")){ ?>
                                    <?php if($order["SJ_TYPE"] == '1'): ?><a  class="active" href="<?php echo U('Member/Order/hos_order_detail',array('order_id'=>$order['ORDER_ID'],'sj_type'=>$order['SJ_TYPE']));?>">
                                    <?php elseif($order["SJ_TYPE"] == '2'): ?>
                                        <a class="active" href="<?php echo U('Member/Order/hz_order_detail',array('order_id'=>$order['ORDER_ID'],'sj_type'=>$order['SJ_TYPE'],'hz_id'=>$order['HZ_ID'],'order_name'=>$order['ORDER_NAME']));?>">
                                    <?php else: ?>
                                        <a class="active" href="<?php echo U('Member/Order/hos_order_detail',array('order_id'=>$order['ORDER_ID'],'sj_type'=>$order['SJ_TYPE']));?>"><?php endif; ?>去付款</a><?php }?>
                                <?php elseif($order['ORDER_STATUS'] == '已付款'): ?>
                                    <a href="javascript:;">已付款</a>
                                <?php elseif($order['ORDER_STATUS'] == '支付失败'): ?>
                                <?php else: ?>
                                    <a href="javascript:;"><?php echo ($order['ORDER_STATUS']); ?></a><?php endif; endif; ?>
                        
                            <?php if($order['ORDER_STATUS'] == '支付失败'): ?><a href="javascript:;">已作废</a>
                            <?php else: ?>
                                <a href="javascript:;"><?php echo ($order['O2O_FLAG']); ?></a><?php endif; ?>

                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more('#order-list');">加载更多</a></div>
        <div id="emptyData"></div>
        <div id="order_status" style="display:none"><?php echo ($order_status); ?></div>
        <div id="o2o_flag" style="display:none"><?php echo ($o2o_flag); ?></div>
        <div id="current_pagenum" style="display:none">2</div><?php endif; ?>
    </div>
    <!--通底的引用开始-->
    <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
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
    <script src="/weixin/Public/Common/js/order_load.js" type="text/javascript"></script>
    <script>
        var over_footer = '4';
        var onOff = true;
        function search_list(order_status,o2o_flag) 
        {
            $('#current_pagenum').text('1');
            $('#order-list').html('');
            $('#order_status').text(order_status);
            $('#o2o_flag').text(o2o_flag);
            $('.ui-jiazai').children('a').text('加载更多');
            //load_more('.experts');
            loadmore('#current_pagenum', '/weixin/index.php?m=Member&c=Order&a=order_list_append&order_status=' + order_status + '&o2o_flag=' + o2o_flag, '#order-list');
        }
        window.onload = function(){
            window.onscroll();
        }
        window.onscroll = function () {
            load_more('#order-list');
        }
        function load_more(obj) {
            if (!onOff) return;
            // console.log($(obj).height(),$(document).scrollTop(),$(window).height());
            if ($(obj).height() <= $(document).scrollTop() + $(window).height()) {
                onOff = !onOff;
                loadmore('#current_pagenum', '/weixin/index.php?m=Member&c=Order&a=order_list_append&order_status=' + $('#order_status').text() + '&o2o_flag=' + $('#o2o_flag').text(), '#order-list',function(){
                    $('.empty_data').css({'top':0,'z-index':-1});
                });
            }
        }

        // $(".states > li").each(function(){
        //     $(this).on("touchend",function(){
        //         $(this).addClass("active").siblings().removeClass("active");
        //     })
        // })
    </script>
    <!--通底的引用结束-->
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
    <div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?> </div>
</body>
</html>