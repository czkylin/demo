<?php if (!defined('THINK_PATH')) exit(); if(is_array($referral_list)): $i = 0; $__LIST__ = $referral_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$referral): $mod = ($i % 2 );++$i;?><li>
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
	</li>∮<?php endforeach; endif; else: echo "" ;endif; ?>