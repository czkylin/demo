<?php if (!defined('THINK_PATH')) exit(); if(is_array($yd_list)): $i = 0; $__LIST__ = $yd_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yd): $mod = ($i % 2 );++$i;?><a href="<?php echo U('FjYd/yd_detail',array('hos_id'=>$yd['HOS_ID'],'hos_address'=>$yd['HOS_ADDRESS'],'hos_pic'=>$yd['HOS_PIC'],'hos_name'=>$yd['HOS_NAME']));?>">
		<li class="clear">
			<?php if(!$yd['HOS_PIC']): ?><img src="/weixin/Public/Member/images/yd/yd.png" class="img">
			<?php else: ?>
				<img src="<?php echo ($yd["HOS_PIC"]); ?>" class="img"><?php endif; ?>
			<div class="list-info">
				<h2><?php echo ($yd["HOS_NAME"]); ?></h2>
				<p class="add"><?php echo ($yd["PROVINCE_NAME"]); ?> <?php echo ($yd["CITY_NAME"]); ?></p>
				<!-- <div class="xingji">
					<i>
						<b style="width:90%;">
							<img src="/weixin/Public/Member/images/icon/start.png">
						</b>
					</i>
				</div> -->
				<span class="distance"><?php echo ($yd["JL"]); ?>km</span>
			</div>
		</li>
	</a>∮<?php endforeach; endif; else: echo "" ;endif; ?>