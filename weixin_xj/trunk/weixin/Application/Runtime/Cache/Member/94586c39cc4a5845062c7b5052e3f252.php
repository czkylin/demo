<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">

<!--1111-->

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="cache-control" content="public">

<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

<meta name="apple-mobile-web-app-capable" content="yes">

<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<meta name="format-detection" content="telephone=no">

  <!--CSS库文件-->

<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link rel="stylesheet" href="/weixin/Public/Member/css/doc/doc_comment.css">
<title>评价列表</title>
</head>

<body class="bgChui">

  <div class="comment-list">
    <ul id="doc-list">
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="height: auto;">
        <?php if($vo['MEMBER_PIC'] == ''): ?><img src="/weixin/Public/Member/images/yonghu/comment.png" alt="" class="touxiang" style="border:1px solid #999">
        <?php else: ?>
          <img src="<?php echo ($vo["MEMBER_PIC"]); ?>" alt="" class="touxiang" style="border:1px solid #999"><?php endif; ?>
        <div class="des"  style="height: auto;">
          <div class="info"  style="height: auto;">
            <span class="name"><?php echo ($vo["MEMBER_NAME"]); ?></span>
            <b class="comment-reslut fcmy">
            <?php if($vo['PJ_FLAG'] == '0'): ?>满意
            <?php elseif($vo['PJ_FLAG'] == '1'): ?>
              非常满意
            <?php else: ?>
              不满意<?php endif; ?>
            </b>
          </div>
          <div class="con">
            <?php echo ($vo["PJ_CONTENT"]); ?>  
          </div>
          <div style="float: right; padding-bottom: 5px;">
            <?php echo ($vo["CREATE_DATE"]); ?>
          </div>
          <div style="clear: both;"></div>
        </div>

          <div style="clear: both;"></div>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
    <div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more();" >加载更多</a></div>
    <div id="current_pagenum" style="display:none">2</div>
    <div id="expert_id" style="display:none"><?php echo ($expert_id); ?></div>
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
        loadmore('#current_pagenum','/weixin/index.php?m=Member&c=Doc&a=doc_comment_append&expert_id='+$('#expert_id').text(),'#doc-list');
    }
}
/*function load_more()
{

  loadmore('#current_pagenum','/weixin/index.php?m=Member&c=Doc&a=doc_comment_append&expert_id='+$('#expert_id').text(),'#doc-list');

} */
</script>
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
</body>

</html>