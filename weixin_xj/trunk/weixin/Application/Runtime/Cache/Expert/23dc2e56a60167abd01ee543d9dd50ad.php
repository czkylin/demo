<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<!--CSS库文件-->
<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<!--<link href="/weixin/Public/Common/css/commonSearch/search.css" type="text/css" rel="stylesheet">-->
<!--<link href="/weixin/Public/Common/css/commonIcon/icon.css" type="text/css" rel="stylesheet">-->
<link rel="stylesheet" href="/weixin/Public/Expert/css/zhengcejiedu/icons.css">
<link rel="stylesheet" href="/weixin/Public/Expert/css/zhengcejiedu/footer.min.css">
<!--<link href="/weixin/Public/Common/css/commonBtn/btn.css" type="text/css" rel="stylesheet">-->
<link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet">
<!--CSS当前页面文件-->
<link href="/weixin/Public/Expert/css/gerenzhongxin/gerenzhongxin.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Expert/css/gerenzhongxin/yishengbangzs.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/weixin/Public/Expert/css/zhengcejiedu/head.css">
<title>我的咨询</title>
<script>
    document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/3 + 'px';
</script>
</head>
<body>
<header class="header">
    <a href="index.php?m=Expert&c=User&a=mywork_house" class="icon">&#xf62b;</a>
    <h2>我的咨询</h2>
</header>
<?php if(empty($consult_list)): ?><div style=" text-align: center;">
        <br/> 
        <img src="/weixin/Public/Common/images/icon/icon1.png"><br>
        <i style=" line-height: 30px;">暂无数据</i>
    </div>
<?php else: ?>
    <div class="wdzixun_ul" id="consult_list">
    	<?php if(is_array($consult_list)): $i = 0; $__LIST__ = $consult_list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$consult): $mod = ($i % 2 );++$i;?><div class="zxcon">
    		<a href="/weixin/index.php?m=Expert&c=Consult&a=consult_details&consult_id=<?php echo ($consult['CONSULT_ID']); ?>">
    			<div class="zxcon-top">
    			<?php if($consult['RE_STATUS'] == '待回复'): ?><i></i>
    			<?php else: endif; ?>
    			<p><?php echo ($consult['MEMBER_NAME']); ?></p><p><?php echo ($consult['MEMBER_SEX']); ?></p><p><?php if($consult['MEMBER_AGE'] == ''): else: echo ($consult['MEMBER_AGE']); ?>岁<?php endif; ?></p><span><!-- <?php echo ($consult['FREE_FLAG']); ?> -->免费咨询</span></div>
    			<div class="zxcon-bot">
    				<p><?php echo ($consult['CONSULT_CONTENT']); ?></p>
    				<div class="shijian"><p class="left">
                    
                   <?php
 $now_time = time(); $consult['CONSULT_DATE'] = $now_time-strtotime($consult['CONSULT_DATE']); ?>
                        <?php if(($consult['CONSULT_DATE'] < 60 )): echo $consult['CONSULT_DATE']; ?>秒前<?php endif; ?>
    					<?php if(($consult['CONSULT_DATE'] > 60 ) && ($consult['CONSULT_DATE'] < 3600 )): echo ceil($consult['CONSULT_DATE']/60); ?>分钟前<?php endif; ?>
    					<?php if(($consult['CONSULT_DATE'] > 3600 ) && ($consult['CONSULT_DATE'] < 86400 )): echo ceil($consult['CONSULT_DATE']/60/60); ?>小时前<?php endif; ?>
                        <?php if($consult['CONSULT_DATE'] > 86400 ): echo ceil($consult['CONSULT_DATE']/60/60/24); ?>天前<?php endif; ?>

                    </p><!-- <p class="right"><?php echo ($consult['PROVINCE_NAME']); ?></p> --></div>
    			</div>
                
                <div class="daihuifu yihuifu"> 
                	<?php if($consult['RE_STATUS'] == '已回复'): ?><a href="/weixin/index.php?m=Expert&c=Consult&a=consult_details&consult_id=<?php echo ($consult['CONSULT_ID']); ?>"><?php echo ($consult['RE_STATUS']); ?></a><?php endif; ?>
                 </div>
    			 <div class="daihuifu"> 
                	<?php if($consult['RE_STATUS'] == '待回复'): ?><a href="/weixin/index.php?m=Expert&c=Consult&a=consult_details&consult_id=<?php echo ($consult['CONSULT_ID']); ?>"><?php echo ($consult['RE_STATUS']); ?></a><?php endif; ?>
                 </div>
                <!--<div class="yiihuifu"> <a href="/weixin/index.php?m=Expert&c=Consult&a=consult_details&consult_id=<?php echo ($consult['CONSULT_ID']); ?>"><?php echo ($consult['RE_STATUS']); ?></a></div>-->
    		</a>
    	</div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </div>
    <div class="ui-jiazai">
    	<a href="javascript:void(0);" onclick="load_more();">加载更多</a>
    </div>
    <div id="emptyData"></div>
    <div id="current_pagenum" style="display:none">2</div><?php endif; ?>
    
<!--<footer style="background:#f2f2f2;text-align:center;bottom:0;left:0;width:100%;height:60px;overflow:hidden;position:fixed;display:box;display:-webkit-box;-webkit-box-pack:center;-webkit-box-align:center;">
    <object data="/weixin/Public/Expert/css/zhengcejiedu/bottom.svg" src="/weixin/Public/Expert/css/zhengcejiedu/bottom.svg" type="" style="width:100%;transform:scale(0.5,0.5);-webkit-transform:scale(0.5,0.5);"></object>
</footer>-->
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<script src="/weixin/Public/Common/js/load.js" type="text/javascript"></script>
<script>
var over_footer = '2';
var onOff = true;
window.onload = function(){
    window.onscroll();
}
window.onscroll = function(){
    load_more('#consult_list');
}
function load_more(obj)
{	
    if(!onOff) return;
    if($(obj).height()+$('header').outerHeight() <= $(document).scrollTop() + document.body.clientHeight){
        onOff = !onOff;
        loadmore('#current_pagenum','/weixin/index.php?m=Expert&c=Consult&a=consult_list_append','#consult_list',function(){
            $('.empty_data').css({'top':0,'z-index':-1});
        });
    }
}
</script>
 <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145622).'" width="0" height="0"/>';?></div>
</body>
</html>