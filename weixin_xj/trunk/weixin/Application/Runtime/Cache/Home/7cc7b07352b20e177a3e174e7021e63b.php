<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>转诊列表</title>
  <link rel="stylesheet" href="/weixin/Public/Home/css/referral/referral_list_info.css">
  <link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet" />
  <script>
    document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/750*100 + 'px';
  </script>
</head>
<body>
   <?php if(empty($referral_list)): ?><div class="nodetail" style="margin-top: 40%;text-align: center;">
                <img src="/weixin/Public/Common/images/icon/icon1.png" alt="">
                <i style="display: block;text-align: center;font-size: 12px;">暂无数据</i>
            </div>
  <?php else: ?>
  <ul  id="referral-list">
    <?php if(is_array($referral_list)): $i = 0; $__LIST__ = $referral_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$referral): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/referral/referral_list_details',array('create_date'=>$referral['CREATE_DATE']));?>">
        <li>
            <div><?php echo ($referral["CREATE_DATE"]); ?></div>
            <div class="count"><?php echo ($referral["COUNT"]); ?>例</div>
            <div class="arrows">
              <span class="bot"></span>
              <span class="top"></span>
            </div>
        </li>
      </a><?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- 加载更多 -->
      <div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more('#referral-list');">加载更多</a></div>
      <div id="emptyData"></div>
      <div id="current_pagenum" style="display:none">2</div>
  </ul><?php endif; ?>
   <script type="text/javascript" src="/weixin/Public/Common/js/jquery.min.js"></script>
  <script src="/weixin/Public/Common/js/load.js" type="text/javascript"></script> 
  <script>
    var onOff = true;
    window.onload = function()
    {
        window.onscroll();
    }
    window.onscroll = function () 
    {
        load_more('#referral-list');
    }
     function load_more(obj) 
     {
         if (!onOff) return;
         if ($(obj).height() <= $(document).scrollTop() + $(window).height()) {
            onOff = !onOff;
            loadmore('#current_pagenum','/weixin/index.php?m=Home&c=Referral&a=referral_info_append','#referral-list');
         }
    }
  </script>
</body>
</html>