<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css">
<link rel="stylesheet" href="/weixin/Public/Member/css/zhengcejiedu/expand_result.css">
<link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet">
<title>我的业绩</title>
<script>
	document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/15 + 'px';
</script>
</head>
<body>
	<!--<article>
		<h1>汇总</h1>
		 <p class="des">累积成功分享<span></span>人</p> 
		<ul>
			<li>
				<p class="con">您分享的链接已购买</p>
				<p class="num"><span><?php echo ($info["sale_num"]); ?></span>人</p>
			</li>
		</ul>
	</article>-->
	<section class="unit">
	    <h2>我的成绩</h2>
	    <ul class="box">
	        <li class="text-center">
	            <div class="mail">
	                <p>直接销售</p>
	                <p>线上：<?php echo ($info['on_sale_num']); ?>张</p>
	            </div>
	        </li>
	        <li class="text-center">
	            <div class="mail">
	                <p>间接销售</p>
	                <p><?php echo ($info['tow_sale_num']); ?>张<!-- ，<?php echo ($info['three_sale_num']); ?> 张--></p>
	            </div>
	        </li>
	    </ul>
	</section>
	<section class="unit">
		<p>提成总金额：<?php echo ($info['sale_total_money']); ?></p>
	</section>
	<section class="unit">
		<div class="mingxicon showMoreNChildren" id="money-list">
		    <?php if(is_array($hz_order_list)): $i = 0; $__LIST__ = $hz_order_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$money): $mod = ($i % 2 );++$i; if($money["TAKE_MONEY"] != '2'): ?><div class="mx_list">
	                <p class="mx"><?php echo ($money['TAKE_NAME']); ?></p>
	                <p class="mx">保障人：<?php echo ($money['PERSON_NAME']); ?></p>
	                <p class="mx">提成金额：￥<b><?php echo (round($money['TAKE_MONEY'],2)); ?></b></p>
	                <p class="mx">手机：<?php echo (substr($money['PERSON_MOBILE'],0,3)); ?>****<?php echo (substr($money['PERSON_MOBILE'],-4)); ?></p>
	                <p class="mx">提成明细：<?php echo ($money['TAKE_DESC']); ?></p>
	                <p>时间：<?php echo ($money['CREATE_DATE']); ?></p> </div>
		        </div><?php endif; endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
		</div>
	</section>
	
	<div class="ui-jiazai"><a href="javascript:void(0);" onClick="loadmore('#current_pagenum','/weixin/index.php?m=Member&c=User&a=hz_order_list_append','#money-list');" <?php echo ($stly); ?>>加载更多</a></div>
	<div id="current_pagenum" style="display:none">2</div>
	<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
	<script src="/weixin/Public/Expert/js/erji_chengshi.js" type="text/javascript"></script> 
	<script src="/weixin/Public/Common/js/load_more.js" type="text/javascript"></script>

</body>
</html>