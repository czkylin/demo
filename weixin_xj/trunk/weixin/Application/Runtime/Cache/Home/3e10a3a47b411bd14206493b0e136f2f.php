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
    <!--CSS当前页面文件-->
    <link href="/weixin/Public/Home/css/fenXiang/paiHangBang.css?<?php echo time();?>.css" type="text/css" rel="stylesheet">
    <style>
        .mail{color:#fff;}
        .jifen p{margin-right:10px;}
        .hot .huoyuedu .title span{height: 40px; overflow: hidden;}
        .hot .huoyuedu{width: 65%; padding-right: 0;}
    </style>
    <!-- title -->
    <title>终端售卡排行</title>
</head>
<body>  
    <div id="user">

        <div class="hot" id="doc-list">
            <ul class="doc-list" id="rank-list">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rank): $mod = ($i % 2 );++$i;?><li>
                        <div class="ww pos_a"> 
                            <?php if($i < 4): ?><img src="/weixin/Public/Home/images/icon/jiangbei.png" alt="">
                            <?php else: ?>
                                <?php echo ($rank['PM_RANK']); endif; ?>
                        </div>
                        <div class="touxiang pos_a">
                            <a href="javascript:;"> <img src="<?php echo ((isset($rank['HOS_PIC']) && ($rank['HOS_PIC'] !== ""))?($rank['HOS_PIC']):'/weixin/Public/Member/images/yd/yd.png'); ?>"> </a>
                        </div>
                        <div class="huoyuedu">
                            <div class="title">
                                <div class="title-des"> 
                                <span><?php echo ($rank['HOS_NAME']); ?></span>  
                                </div> 
                                <!-- <span class="fr"></span> -->
                                
                                <div class="clear"></div>
                            </div>
                        </div>
                        <p style="position: absolute; right: 0; top: 10px; line-height:20px;"><span style="font-size:12px;color:#333;margin-right:10px;">售卡收入：<?php echo ($rank['MONEY']); ?>元</span><br>
                                <span style="font-size:12px;color:#333;margin-right:10px;">售卡数量：<?php echo ($rank['NUMS']); ?>张</span></p>
                        <div class="clear"></div>

                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="ui-jiazai tac" id="jiazai"><a href="javascript:void(0);"></a></div>
    <div id="current_pagenum" style="display:none">2</div>
    <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
    <!--加载更多-->
    <script src="/weixin/Public/Common/js/load.js " type="text/javascript"></script>
    <script>
        var onOff = true;
        window.onload = function () 
        {
            window.onscroll();
        }
        window.onscroll = function () 
        {
            load_more('#user');
        }
        function load_more(obj) 
        {
            //console.log($(obj).height());
            //console.log($(document).scrollTop() + $(window).height());
            if (!onOff) return;
            if ($(obj).height() <= $(document).scrollTop() + document.body.clientHeight) 
            {
                onOff = !onOff;
                loadmore('#current_pagenum','/weixin/index.php?m=Home&c=Zd&a=rank_list_append','#rank-list');
            }
        }
    </script>
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
    <div style="height:0px;overflow:hidden;"><img src="http://c.cnzz.com/wapstat.php?siteid=1260047007&amp;r=&amp;rnd=1842507214" width="0" height="0"></div>
    <div id="cli_dialog_div"></div>
</body>
</html>