<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta name="share-title" content="">
<link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png" >

<!--CSS库文件-->

<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link href="/weixin/Public/Common/css/commonIcon/icon.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/weixin/Public/Member/css/photoswipe.css">
<link rel="stylesheet" href="/weixin/Public/Member/css/default-skin.css">
<link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet"/>
<!--CSS当前页面文件-->
<link rel="stylesheet" href="/weixin/Public/Member/css/clinic/clinic.css">
<script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth / 20 + 'px';
</script>
<!-- title -->
<title>会诊列表</title>
<!--meta-->
</head>
<body class="ui-mobile-viewport ui-overlay-c">
	<div class="huizhen_jg" id="hz_list">
        <?php if(is_array($hz_list)): $i = 0; $__LIST__ = $hz_list;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i; if($user['ENABLE_FLAG'] != '0'): ?><div class="con_hzjg">
                <h2 class="yi">
                    <?php if($user['ENABLE_FLAG'] == '3'): ?>已取消<?php endif; ?>
                  <!--   <?php if($user['ENABLE_FLAG'] == '2'): ?>待确定<?php endif; ?> -->
                    <?php if($user['ENABLE_FLAG'] == '1'): echo ($user["ORDER_STATUS"]); endif; ?>
                </h2>
                <div class="con_jg" style="background:none;">
                    <div class="touxiang">
                        <img src="/weixin/Public/Member/images/default/Diagnosis@2x.png">
                    </div>
                    <div class="xinxi">
                        <p>发起医生：<span><?php echo ($user["XNAME"]); ?></span></p>
                        <p>会诊专家：<span><?php echo ($user["DNAME"]); ?></span></p>
                        <p><b><?php echo ($user["CREATE_DATE"]); ?></b></p>
                    </div>
                </div>
                <div class="chakan">
                <?php if($user['ENABLE_FLAG'] == '1'): if($user['ORDER_STATUS'] == '已支付'): ?><a href="<?php echo U('Order/hz_order_detail',array('hz_id'=>$user['RECORD_ID'],'order_id'=>$user['ORDER_ID']));?>">查看结果</a>
                    <?php else: ?>
                        <a href="javascript:void(0)" onclick="sub(this)">去支付</a><?php endif; endif; ?>
                </div>
                </div>
                <form action="<?php echo U('Order/pay');?>" method="post" class="subfrom">
                <input type="hidden" name="price" value="<?php echo ($user["ORDER_MONEY"]); ?>">
                <input type="hidden" name="order_id" value="<?php echo ($user["ORDER_ID"]); ?>">
                <input type="hidden" name="hz_id" value="<?php echo ($user["RECORD_ID"]); ?>">
                <input type="hidden" name="time" value="<?php echo ($user["CREATE_DATE"]); ?>">
                <input type="hidden" name="serve_name" value="购买远程会诊服务">
                </form><?php endif; endforeach; endif; else: echo "暂无数据" ;endif; ?>
        </div>
    <div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more('#hz-list');"></a></div>
    <div id="current_pagenum" style="display:none">2</div>
    <div id="emptyData"></div>
    
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
 <script src="/weixin/Public/Common/js/order_load.js" type="text/javascript"></script>
<!--通底的引用结束-->
<script>
 function sub(obj)
{
    $(obj).parents('.con_hzjg').next().submit();
}
var onOff = true;
window.onload = function()
{
    window.onscroll();
}
window.onscroll = function () 
{
    load_more('#hz_list');
}
 function load_more(obj) 
 {
     if (!onOff) return;
     if ($(obj).height() <= $(document).scrollTop() + $(window).height()) {
        onOff = !onOff;
        loadmore('#current_pagenum','/weixin/index.php?m=Member&c=Order&a=hz_list_append','#hz_list');
     }
}

</script>
</body>
</html>