<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rank): $mod = ($i % 2 );++$i;?><li>
        <div class="ww pos_a"> 
            <?php echo ($rank['ROWNUMS']); ?>
        </div>
        <div class="touxiang pos_a">
            <a href="javascript:;">
            <?php if(empty($rank_list[HEADIMGURL])): ?><img src="/weixin/Application/Home/View/images/dtdoctor.png" />
            <?php else: ?>
                <img src="<?php echo ($rank_list['HEADIMGURL']); ?>"><?php endif; ?></a>
        </div>
        <div class="huoyuedu">
            <div class="title">
                <div class=" title-des">
                     <div> 
                        <?php if(!$rank['REAL_NAME']): ?><span><?php echo (substr($rank['LINK_MOBILE'],0,3)); ?>****<?php echo (substr($rank['LINK_MOBILE'],-4)); ?></span>
                        <?php else: ?>
                            <span><?php echo ($rank['REAL_NAME']); ?></span><?php endif; ?>
                        <span class="huadong_hos"><?php echo ($rank['CENTER_NAME']); if($rank['DepartName']): ?>-<?php endif; echo ($rank['DEPART_NAME']); ?></span> 
                    </div>
                    <p style="color:#333;">
                        公司名称：<?php echo ((isset($rank['COMPANY_NAME']) && ($rank['COMPANY_NAME'] !== ""))?($rank['COMPANY_NAME']):"暂无"); ?>
                    </p>
                    <p style="color:#333;">
                        售卡收入：<?php echo ($rank['TOTAL_MONEY']); ?>元
                    </p>
                    <p style="color:#333;">
                       直接销售 (线上：<?php echo ($rank['ONLINEUP']); ?>张,线下：<?php echo ($rank['ONLINEDOWN']); ?>张)
                    </p> 
                    <p style="color:#333;">
                        间接销售 (<?php echo ($rank['SECONDNUMS']); ?>张<!-- ,<?php echo ($rank['THREEENUMS']); ?>张 -->)
                    </p>    
                </div>                              
            </div>
        </div>
    </li>∮<?php endforeach; endif; else: echo "" ;endif; ?>