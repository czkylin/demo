<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="cache-control" content="public">
    <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <!--CSS库文件-->
    <link rel="stylesheet" href="/weixin/Public/Common/css/commonIcon/icon.css">
    <link href="/weixin/Public/Common/css/common/basic.css" type="text/css" rel="stylesheet">
    <!--CSS当前页面文件-->
    <!--<link href="/weixin/Public/Member/css/zhuanjia.min.css" type="text/css" rel="stylesheet" />-->
    <link rel="stylesheet" href="/weixin/Public/Member/css/ask.min.css">
    <title>医生咨询</title>
    <script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12 + 'px';
    </script>
</head>
<body>
    <header>
        <div class="bg"></div>
        <div class="content">
            <div class="user"><img src="<?php echo ($doc_detail["SMALL_PIC"]); ?>" width="100%" /></div>
            <h2 class="text-center"><strong><?php echo ($doc_detail["EXPERT_NAME"]); ?></strong><span><?php echo ($doc_detail["EXPERT_RANK"]); ?></span></h2>
            <h2 class="text-center"><span><?php echo ($doc_detail["HOS_NAME"]); ?></span></h2>
            <div class="rated box">
                <div class="block text-center"><i class="ui-icon-like"></i><em>好评率:<?php echo ($hp); ?>%</em></div>
                <div class="block text-center"><!-- <i class="ui-icon-comment"></i><em>回答数:24</em> --></div>
                <div class="block text-center"><i class="ui-icon-ask"></i><em>咨询量：<?php echo ($doc_detail['ZX_COUNT']+17); ?></em></div>
            </div>
        </div>
    </header>
    <article>
        <section class="unit">
            <ul>
                <li class="box">
                    <div class="left"><img src="/weixin/Public/Member/images/gongzuoshi/logos.png" class="tx" /></div>
                    <div class="right box">
                        <div class="txt">
                            <h2>在线咨询</h2>
                            <small>通过文字和图片向医生咨询</small>
                        </div>
                        <!-- <div class="price text-right"><b><?php echo ($doc_detail["EXPERT_SERVES"]["0"]["SERVE_MONEY"]); ?>元</b></div> -->
                    </div>
                </li>
                <li class="box">
                    <div class="left"><img src="/weixin/Public/Member/images/gongzuoshi/logos.png" class="tx" /></div>
                    <div class="right box">
                        <div class="txt">
                            <h2>语音咨询</h2>
                            <small>通过语音向医生咨询</small>
                        </div>
                        <div class="price text-right"><b class="null"></b></div>
                    </div>
                </li>
                <li class="box">
                    <div class="left"><img src="/weixin/Public/Member/images/gongzuoshi/logos.png" class="tx" /></div>
                    <div class="right box">
                        <div class="txt">
                            <h2>视频咨询</h2>
                            <small>通过视频向医生咨询</small>
                        </div>
                        <div class="price text-right"><b class="null"></b></div>
                    </div>
                </li>
            </ul>
        </section>
        <section class="unit sec">
            <header>
                <h2>用户咨询<a href="<?php echo U('Member/Doc/doc_consult_list',array('doc_id'=>$doc_detail['EXPERT_ID']));?>" class="comment fr" style="font-size:14px;">查看全部咨询</a></h2>
                <!-- <div class="rated box">
                    <div class="bl"><em>好评数:<?php echo ((isset($doc_detail["HP_NUM"]) && ($doc_detail["HP_NUM"] !== ""))?($doc_detail["HP_NUM"]):"0"); ?></em></div>
                    <div class="bl text-center"><em>评价数:<?php echo ((isset($doc_detail["PJ_NUM"]) && ($doc_detail["PJ_NUM"] !== ""))?($doc_detail["PJ_NUM"]):"0"); ?></em></div>
                    <div class="bl text-right"><a href="#" class="comment">查看全部咨询</a></div>
                </div> -->
            </header>
            <ul>
                <?php if(is_array($doc_consult)): $i = 0; $__LIST__ = array_slice($doc_consult,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <h2>
                        <?php  echo mb_substr($vo['MEMBER_NAME'],0,1,'utf-8'); ?>**</h2>
                        <p><?php echo ($vo["CONSULT_CONTENT"]); ?></p>
                        <p><?php echo ($vo["CONSULT_DATE"]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </section>
    </article>
    <!--<div class="zhuanjiaInfo zj_xinxi"> <span class="zj_liang"> 
        咨询量：<i><?php echo ($doc_detail['ZX_COUNT']+17); ?></i> </span>
        <div class="zhuanjiaInfoCon">
            <div class="zhuanjiaInfoConImg"> <img src="<?php echo ($doc_detail["SMALL_PIC"]); ?>" width="70" height="70"> </div>
            <div class="zhuanjiaInfoConTxt">
                <h2><?php echo ($doc_detail["EXPERT_NAME"]); ?></h2>
                <p><?php echo ($doc_detail["EXPERT_RANK"]); ?></p>
                <p><?php echo ($doc_detail["HOS_NAME"]); ?>&nbsp;&nbsp;<?php echo ($doc_detail["DEP_NAME"]); ?></p>
            </div>
            <ul class="pingjiacon">
                <li>好评数 <span>
                                <?php if($doc_detail['HP_NUM'] == ''): ?>0
                                        <?php else: ?>
                                        <?php echo ($doc_detail["HP_NUM"]); endif; ?>
                                </span> </li>
                <li>评价数 <span>
                                <?php if($doc_detail['PJ_NUM'] == ''): ?>0
                                        <?php else: ?>
                                        <?php echo ($doc_detail["HP_NUM"]); endif; ?>
                                </span> </li>
                <li><a href="/weixin/index.php?m=Member&c=Doc&a=doc_comment&doc_id=<?php echo ($doc_id); ?>">查看全部评论</a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="zixunshouye"> <img src="/weixin/Application/Member/View/images/icon/tuwen.png" />
        <h2>图文咨询<br>
                <span>通过文字和图片向医生咨询</span></h2> <b>￥<?php echo ($doc_detail["EXPERT_SERVES"]["0"]["SERVE_MONEY"]); ?>元</b> </div>
    <ul class="zixunshouye_ul" id="showContent">
        <?php if(is_array($doc_consult)): $i = 0; $__LIST__ = $doc_consult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$doc): $mod = ($i % 2 );++$i;?><li>
                <?php if($doc["MEMBER_NAME"] == ''): ?><p>用户名：匿名</p>
                <?php else: ?>
                    <p>用户名：<?php echo ($doc["MEMBER_NAME"]); ?></p><?php endif; ?>
                <p><?php echo ($doc["CONSULT_CONTENT"]); ?></p> <b><?php echo ($doc["CONSULT_DATE"]); ?></b> </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>-->
    <div class="zxyisheng"><a href="<?php echo U('Member/Consult/consult_pay',array('json'=>$json));?>">咨询医生</a></div>
    <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
    <div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?> </div>
</body>
</html>