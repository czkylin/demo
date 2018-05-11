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

<!--公用样式调用-->

<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >

<!--分享页面样式调用-->

<link href="/weixin/Public/Home/css/portal.minv2.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Home/css/hos_list.min.css" type="text/css" rel="stylesheet"/>

<!-- title -->

<title>我的医院</title>

<!--meta-->

</head>

<body class="ui-mobile-viewport ui-overlay-c">
<div data-role="page" data-title="" id="gp-experts" data-goto="" data-url="gp-experts" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 480px;">
        <div class="experts" style="position:relative;">
               <?php if(empty($hos_list)): ?><div class="nodetail" style="width:100%;height:100%;text-align:center;position:fixed;top:0;left:0;display:box;display:-webkit-box;-webkit-box-pack:center;-webkit-box-align:center;background:#fff;">
                        <div>
                            <img src="/weixin/Public/Common/images/icon/icon1.png" alt=""><br><br>
                            <i>暂无数据</i>
                        </div>
                    </div>
                <?php else: ?>
                <?php if(is_array($hos_list)): $i = 0; $__LIST__ = $hos_list;if( count($__LIST__)==0 ) : echo "暂无相关医院" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="xq1">
                                <div class="detal_shoushu">
                                        <div class="name_dj"> <strong class="mingcheng"><?php echo ($vo["HOS_NAME"]); ?></strong> </div>
                                </div>
                        </div><?php endforeach; endif; else: echo "暂无相关医院" ;endif; endif; ?>
        </div>
</div>
 <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260047007).'" width="0" height="0"/>';?></div>
</body>
</html>