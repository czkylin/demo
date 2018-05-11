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
<link rel="stylesheet" href="/weixin/Public/Member/css/doc/doc_comment.css">
<title>咨询列表</title>
</head>

<body>
<article>
  <section class="unit sec">
            <header>
                <!-- <h2>用户咨询<a href="#" class="comment fr" style="font-size:14px;">查看全部咨询</a></h2> -->
                <!-- <div class="rated box">
                    <div class="bl"><em>好评数:<?php echo ((isset($doc_detail["HP_NUM"]) && ($doc_detail["HP_NUM"] !== ""))?($doc_detail["HP_NUM"]):"0"); ?></em></div>
                    <div class="bl text-center"><em>评价数:<?php echo ((isset($doc_detail["PJ_NUM"]) && ($doc_detail["PJ_NUM"] !== ""))?($doc_detail["PJ_NUM"]):"0"); ?></em></div>
                    <div class="bl text-right"><a href="#" class="comment">查看全部咨询</a></div>
                </div> -->
            </header>
            <ul id="doc-list">
                <?php if(is_array($doc_consult)): $i = 0; $__LIST__ = $doc_consult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <h2>
                            <?php  echo mb_substr($vo['MEMBER_NAME'],0,1,'utf-8'); ?>**</h2>
                        <p><?php echo ($vo["CONSULT_CONTENT"]); ?></p>
                        <br/>
                        <p><?php echo ($vo["CONSULT_DATE"]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </section>
    <div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more();" >加载更多</a></div>
    <div id="current_pagenum" style="display:none">2</div>
    <div id="doc_id" style="display:none"><?php echo ($doc_id); ?></div>
</article>
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<script src="/weixin/Public/Common/js/load.js" type="text/javascript"></script>
<script>
var onOff = true;
window.onscroll = function(){
    load_more('#doc-list');
}
function load_more(obj)
{	
    if(!onOff) return;
    if($(obj).height() <= $(document).scrollTop() + document.body.clientHeight){
        onOff = !onOff;
        loadmore('#current_pagenum','/weixin/index.php?m=Member&c=Doc&a=doc_consult_list_append&doc_id='+$('#doc_id').text(),'#doc-list');
    }
}
/*function load_more()
{

  loadmore('#current_pagenum','/weixin/index.php?m=Member&c=Doc&a=doc_comment_append&doc_id='+$('#doc_id').text(),'#doc-list');

} */
</script>
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
</body>

</html>