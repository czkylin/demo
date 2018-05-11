<?php if (!defined('THINK_PATH')) exit(); if(is_array($consult_list)): $i = 0; $__LIST__ = $consult_list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$consult): $mod = ($i % 2 );++$i;?><div class="zxcon">
		<a href="/weixin/index.php?m=Expert&c=Consult&a=consult_details&consult_id=<?php echo ($consult['CONSULT_ID']); ?>">
			<div class="zxcon-top">
			<?php if($consult['RE_STATUS'] == '待回复'): ?><i></i>
			<?php else: endif; ?>
			<p><?php echo ($consult['MEMBER_NAME']); ?></p><p><?php echo ($consult['MEMBER_SEX']); ?></p><p><?php if($consult['MEMBER_AGE'] == ''): else: echo ($consult['MEMBER_AGE']); ?>岁<?php endif; ?></p><span><?php echo ($consult['FREE_FLAG']); ?></span></div>
			<div class="zxcon-bot">
				<p><?php echo ($consult['CONSULT_CONTENT']); ?></p>
				<div class="shijian">
                <p class="left">

                 <?php
 $now_time = time(); $consult['CONSULT_DATE'] = $now_time-strtotime($consult['CONSULT_DATE']); ?>

                <?php if(($consult['CONSULT_DATE'] < 60 )): echo $consult['CONSULT_DATE']; ?>秒前<?php endif; ?>
                <?php if(($consult['CONSULT_DATE'] > 60 ) && ($consult['CONSULT_DATE'] < 3600 )): echo ceil($consult['CONSULT_DATE']/60); ?>分钟前<?php endif; ?>
                <?php if(($consult['CONSULT_DATE'] > 3600 ) && ($consult['CONSULT_DATE'] < 86400 )): echo ceil($consult['CONSULT_DATE']/60/60); ?>小时前<?php endif; ?>
                <?php if($consult['CONSULT_DATE'] > 86400 ): echo ceil($consult['CONSULT_DATE']/60/60/24); ?>天前<?php endif; ?>

                <!-- <p class="right"><?php echo ($consult['PROVINCE_NAME']); ?></p> --></div>
			</div>
            
            <div class="daihuifu yihuifu"> 
            	<?php if($consult['RE_STATUS'] == '已回复'): ?><a href="/weixin/index.php?m=Expert&c=Consult&a=consult_details&consult_id=<?php echo ($consult['consult']); ?>"><?php echo ($consult['RE_STATUS']); ?></a><?php endif; ?>
             </div>
			 <div class="daihuifu"> 
            	<?php if($consult['RE_STATUS'] == '待回复'): ?><a href="/weixin/index.php?m=Expert&c=Consult&a=consult_details&consult_id=<?php echo ($consult['consult']); ?>"><?php echo ($consult['RE_STATUS']); ?></a><?php endif; ?>
             </div>
            <!--<div class="yiihuifu"> <a href="/weixin/index.php?m=Expert&c=Consult&a=consult_details&consult_id=<?php echo ($consult['CONSULT_ID']); ?>"><?php echo ($consult['RE_STATUS']); ?></a></div>-->
		</a>
	</div>∮<?php endforeach; endif; else: echo "$empty" ;endif; ?>