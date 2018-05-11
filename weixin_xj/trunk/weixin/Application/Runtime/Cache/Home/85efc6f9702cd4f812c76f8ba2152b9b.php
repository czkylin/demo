<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rank): $mod = ($i % 2 );++$i;?><li>
        <div class="ww pos_a"> 
            <?php echo ($rank['PM_RANK']); ?>
        </div>
        <div class="touxiang pos_a">
            <a href="javascript:;"> <img src="<?php echo ((isset($rank['HOS_PIC']) && ($rank['HOS_PIC'] !== ""))?($rank['HOS_PIC']):'/weixin/Public/Member/images/yd/yd.png'); ?>"> </a>
        </div>
        <div class="huoyuedu">
            <div class="title">
                <div class="title-des"> 
                <span><?php echo ($rank['HOS_NAME']); ?></span>  
                </div> 
                <!-- <span class="fr"></span> -->
                
                <div class="clear"></div>
            </div>
        </div>
        <p style="position: absolute; right: 0; top: 10px; line-height:20px;"><span style="font-size:12px;color:#333;margin-right:10px;">售卡收入：<?php echo ($rank['MONEY']); ?>元</span><br>
                <span style="font-size:12px;color:#333;margin-right:10px;">售卡数量：<?php echo ($rank['NUMS']); ?>张</span></p>
        <div class="clear"></div>

    </li>∮<?php endforeach; endif; else: echo "" ;endif; ?>