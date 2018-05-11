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
    <link href="/weixin/Public/Home/css/fenXiang/paiHangBang.css?<?php echo time();?>" type="text/css" rel="stylesheet">
    <style>
        .mail{color:#fff;}
        .jifen p{margin-right:10px;}
        .hot .huoyuedu{line-height: 30px; height: auto;}
        .hot .huoyuedu .title{height: auto;}
        .hot .huoyuedu .title-des{width: 100%;}
        .hot .huoyuedu .title span{ display: inline;}
        .hot .huoyuedu .title span:nth-of-type(2){color: #999;}
        .hot .huoyuedu .title p{color: #333;font-weight:normal;}
        .hot .touxiang{top: 15px;}
        .hot .ww{top: 22px;}
    </style>
    <!-- title -->
    <title>百倍爱心卡排行榜</title>
</head>
<body>  
    <div id="user">
        <div class="PaiHang">
            <div class="headPaiHang clearfix">
                <div class="champion">
                    <!-- 显示头像 -->
                    <a href="javascript:;">
                    <?php if(empty($rank_list[HEADIMGURL])): ?><img src="/weixin/Application/Home/View/images/dtdoctor.png" />
                    <?php else: ?>
                        <img src="<?php echo ($rank_list['HEADIMGURL']); ?>"><?php endif; ?></a>
                </div>
                <div class="name_bot">
                    <!-- 显示姓名 -->
                    <a href="javascript:;">
                        <div class="userinfo clearfix">
                            <p class="xingming"></p>
                            <p class="bumen"></p>
                        </div>
                        <div class="jifen clearfix">
                            <p><?php echo ($rank_list['REAL_NAME']); ?></p>
                            <p><?php echo ($rank_list['CENTER_NAME']); ?></p>
                            <p><?php echo ($rank_list['DEPART_NAME']); ?></p>
                        </div>
                        <div class="jifen clearfix">
                            <p>成功销售：<?php echo ($rank_list['SALE_NUM']); ?>张</p>
                        </div>
                        <div class="jifen clearfix">
                            <p>售卡收入：<?php echo ($rank_list['TOTAL_MONEY']); ?>元</p>
                            <p>第<?php echo ($rank_list['ROWNUMS']); ?>名</p>
                        </div>
                    </a>
                </div>
                <a href="<?php echo U('Doc/phb_list');?>" class="zhixing"><img src="/weixin/Public/Home/images/icon/zhixing12.png" alt=""></a>
            </div>
        </div>
        <div class="hot" id="doc-list">
            <ul class="doc-list" id="rank-list">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rank): $mod = ($i % 2 );++$i;?><li>
                        <div class="ww pos_a"> 
                            <?php if($i == 1): ?><img src="/weixin/Public/Home/images/icon/jiangbei1.png" alt="">
                            <?php elseif($i == 2): ?>
                                <img src="/weixin/Public/Home/images/icon/jiangbei2.png" alt="">
                            <?php elseif($i == 3): ?>
                                <img src="/weixin/Public/Home/images/icon/jiangbei3.png" alt="">
                            <?php else: ?>
                                <?php echo ($rank['ROWNUMS']); endif; ?>
                        </div>
                        <div class="touxiang pos_a">
                            <a href="javascript:;">
                            <?php if(empty($rank[HEADIMGURL])): ?><img src="/weixin/Application/Home/View/images/dtdoctor.png" />
                            <?php else: ?>
                                <img src="<?php echo ($rank['HEADIMGURL']); ?>"><?php endif; ?>
                            </a>
                        </div>
                        <div class="huoyuedu">
                            <div class="title">
                                <div class="title-des">
                                    <div> 
                                        <?php if(!$rank['REAL_NAME']): ?><span><?php echo (substr($rank['LINK_MOBILE'],0,3)); ?>****<?php echo (substr($rank['LINK_MOBILE'],-4)); ?></span>
                                        <?php else: ?>
                                            <span><?php echo ($rank['REAL_NAME']); ?></span><?php endif; ?>
                                        <span class="huadong_hos"><?php echo ($rank['CENTER_NAME']); if($rank['DepartName']): ?>-<?php endif; echo ($rank['DEPART_NAME']); ?></span> 
                                    </div>
                                    <p style="color:#333;">
                                        公司名称：<?php echo ((isset($rank['COMPANY_NAME']) && ($rank['COMPANY_NAME'] !== ""))?($rank['COMPANY_NAME']):"暂无"); ?>
                                    </p>
                                    <p style="color:#333;">
                                        售卡收入：<?php echo ($rank['TOTAL_MONEY']); ?>元
                                    </p>
                                    <p style="color:#333;">
                                       直接销售 (线上：<?php echo ($rank['ONLINEUP']); ?>张,线下：<?php echo ($rank['ONLINEDOWN']); ?>张) 
                                    </p> 
                                    <p style="color:#333;">
                                        间接销售 (<?php echo ($rank['SECONDNUMS']); ?>张<!-- ,<?php echo ($rank['THREEENUMS']); ?>张 -->)
                                    </p>
                                </div>                              
                            </div>
                        </div>
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
                loadmore('#current_pagenum','/weixin/index.php?m=Home&c=Baibei&a=rank_list_append','#rank-list');
            }
        }
    </script>
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
    <div style="height:0px;overflow:hidden;"><img src="http://c.cnzz.com/wapstat.php?siteid=1260047007&amp;r=&amp;rnd=1842507214" width="0" height="0"></div>
    <div id="cli_dialog_div"></div>
</body>
</html>