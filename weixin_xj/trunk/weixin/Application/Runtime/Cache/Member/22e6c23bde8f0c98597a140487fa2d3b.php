<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="cache-control" content="public">
    <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <meta name="share-title" content="">
    <!--CSS库文件-->
    <link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet">
    <link href="/weixin/Public/Common/css/commonIcon/icon.css" type="text/css" rel="stylesheet">
    <link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet">

    <style>
        .mail{color:#fff;}
        .jifen p{margin-right:10px;}
    </style>
    <!-- title -->
    <title>销售结构明细展示</title>
<style type="text/css">
body{ background-color: #fff; }
.title h1{ text-align: center; padding: 1em 0; font-size: 1.2em; color: #666;}
.section{  }
.section h2{ padding: 0.5em 0; line-height: 3em;  padding: 0 1em; border-top: 1em solid #f3f3f3; color: #666;}
.con-box{ border-bottom: 0.5em solid #f3f3f3; padding: 0.5em 0; }
.con-box:last-child{ border:0; }
.con-box p{ padding: 0 1em;line-height: 2em; overflow: hidden; /*overflow: hidden; text-overflow: ellipsis; white-space: nowrap;*/ }
.con-box p span{ display:block; float:left;}
.con-box p span:nth-child(1){width:15%;}
.con-box p span:nth-child(2){width:35%;text-align:center;}
.con-box p span:nth-child(3){width:50%;text-align:center;}
.con-box.second p{font-size:12px;}
.con-box.second p span:nth-child(1){width:15%;}
.con-box.second p span:nth-child(2){width:15%;text-align:left;}
.con-box.second p span:nth-child(3){width:30%;text-align:left;}
.con-box.second p span:nth-child(4){width:40%;text-align:center;}
</style>
</head>
<body>
    <div class="title">
        <h1>销售结构明细展示</h1>
    </div>
    <div class="section">
        <h2>我是哪些人的间接销售者(<?php echo ($two_list["count"]); ?>人)</h2>
        <?php if(is_array($two_list["list"])): $i = 0; $__LIST__ = $two_list["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$two): $mod = ($i % 2 );++$i;?><div class="con-box">
                <p>
                    <span><?php echo ($two["USER_NAME"]); ?></span>
                    <span><?php echo (substr($two['LINK_MOBILE'],0,3)); ?>****<?php echo (substr($two['LINK_MOBILE'],-4)); ?></span>
                    <span><?php echo ($two["CREATE_DATE"]); ?></span>
                </p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
    </div>
    <div class="section" style="display:none;">
        <h2>我是哪些人的间接销售者(<?php echo ($three_list["count"]); ?>人)</h2>
        <?php if(is_array($three_list["list"])): $i = 0; $__LIST__ = $three_list["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$three): $mod = ($i % 2 );++$i;?><div class="con-box second">
                <p>
                    <span>间接销售:</span>
                    <span><?php echo ($three["ONE_USER_NAME"]); ?></span>
                    <span><?php echo (substr($three['ONE_LINK_MOBILE'],0,3)); ?>****<?php echo (substr($three['ONE_LINK_MOBILE'],-4)); ?></span>
                    <span><?php echo ($three["ONE_CREATE_DATE"]); ?></span>
                </p>
                <!-- <p>
                    <span>间接销售:</span>
                    <span><?php echo ($three["TWO_USER_NAME"]); ?></span>
                    <span><?php echo (substr($three['TWO_LINK_MOBILE'],0,3)); ?>****<?php echo (substr($three['TWO_LINK_MOBILE'],-4)); ?></span>
                    <span><?php echo ($three["ONE_CREATE_DATE"]); ?></span>
                </p> -->
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- 
        <div class="con-box">
            <p>
                <span>一级销售者</span>
                <span>张春燕</span>
                <span>132123456789</span>
                <span>15:30</span>
            </p>
            <p>
                <span>二级销售者</span>
                <span>张春燕</span>
                <span>132123456789</span>
            </p>
        </div> -->


    </div>
</body>
</html>