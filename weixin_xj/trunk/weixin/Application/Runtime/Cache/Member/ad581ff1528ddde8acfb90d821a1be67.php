<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	<title>转诊列表</title>
	<link rel="stylesheet" type="text/css" href="/weixin/Public/Member/css/referral.css">
	<link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript">
		document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/15 + 'px';
	</script>
</head>
<body>
	<ul class="referral referralList">
		<?php if(empty($referral_list)): ?><div class="nodetail" style="margin-top: 40%;text-align: center;">
                <img src="/weixin/Public/Common/images/icon/icon1.png" alt="">
                <i style="display: block;text-align: center;font-size: 12px;">暂无数据</i>
            </div>
        <?php else: ?>
			<li>
				<p>您共有<i><?php echo ($referral_list[0]['R']); ?></i>条转诊记录</p>
			</li>
			<div id="referral-list">
				<?php if(is_array($referral_list)): $i = 0; $__LIST__ = $referral_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$referral): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('Referral/referral_info',array('referral_id'=>$referral['REFERRAL_ID']));?>">
							<?php if($referral['REFERRAL_STATUS'] == '1'): ?><span class="pass">通过</span>
							<?php elseif($referral['REFERRAL_STATUS'] == '0'): ?>
								<span class="await">待审</span>
							<?php else: ?>
								<span class="fail">拒绝</span><?php endif; ?>
							
							<p>患者姓名：<em><?php echo ($referral['PERSON_NAME']); ?></em></p>
							<p>转诊医院：<em><?php echo ($referral['HOS_NAME']); ?></em></p>
							<p>提交日期：<em><?php echo ($referral['CREATE_DATE']); ?></em> </p>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!-- 加载更多 -->
			<div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more('#referral-list');">加载更多</a></div>
			<div id="emptyData"></div>
		    <div id="current_pagenum" style="display:none">2</div><?php endif; ?>
	</ul>
	
    <script type="text/javascript" src="/weixin/Public/Common/js/jquery.min.js"></script>
	<script src="/weixin/Public/Common/js/load_more.js" type="text/javascript"></script> 
	<script>
		var onOff = true;
		window.onload = function(){
            window.onscroll();
        }
        window.onscroll = function () {
            load_more('#referral-list');
        }
        function load_more(obj) {
            if (!onOff) return;
            // console.log($(obj).height(),$(document).scrollTop(),$(window).height());
            if ($(obj).height() <= $(document).scrollTop() + $(window).height()) {
                onOff = !onOff;
                loadmore('#current_pagenum', '/weixin/index.php?m=Member&c=Referral&a=referral_list_append','#referral-list',function(){
                    $('.empty_data').css({'top':0,'z-index':-1});
                });
            }
        }
	</script>
</body>
</html>