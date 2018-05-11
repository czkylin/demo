<?php if (!defined('THINK_PATH')) exit(); if(is_array($hz_list)): $i = 0; $__LIST__ = $hz_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i; if($user['ENABLE_FLAG'] != '0'): ?><div class="con_hzjg">
        <h2 class="yi">
            <?php if($user['ENABLE_FLAG'] == '3'): ?>已取消<?php endif; ?>
          <!--   <?php if($user['ENABLE_FLAG'] == '2'): ?>待确定<?php endif; ?> -->
            <?php if($user['ENABLE_FLAG'] == '1'): echo ($user["ORDER_STATUS"]); endif; ?>
        </h2>
        <div class="con_jg" style="background:none;">
            <div class="touxiang">
                <img src="/weixin/Public/Member/images/default/Diagnosis@2x.png">
            </div>
            <div class="xinxi">
                <p>发起医生：<span><?php echo ($user["XNAME"]); ?></span></p>
                <p>会诊专家：<span><?php echo ($user["DNAME"]); ?></span></p>
                <p><b><?php echo ($user["CREATE_DATE"]); ?></b></p>
            </div>
        </div>
        <div class="chakan">
        <?php if($user['ENABLE_FLAG'] == '1'): if($user['ORDER_STATUS'] == '已支付'): ?><a href="<?php echo U('Order/hz_order_detail',array('hz_id'=>$user['RECORD_ID'],'order_id'=>$user['ORDER_ID']));?>">查看结果</a>
            <?php else: ?>
                <a href="javascript:void(0)" onclick="sub(this)">去支付</a><?php endif; endif; ?>
        </div>
        </div>
        <form action="<?php echo U('Order/pay');?>" method="post" class="subfrom">
        <input type="hidden" name="price" value="<?php echo ($user["ORDER_MONEY"]); ?>">
        <input type="hidden" name="order_id" value="<?php echo ($user["ORDER_ID"]); ?>">
        <input type="hidden" name="hz_id" value="<?php echo ($user["RECORD_ID"]); ?>">
        <input type="hidden" name="time" value="<?php echo ($user["CREATE_DATE"]); ?>">
        <input type="hidden" name="serve_name" value="购买远程会诊服务">
        </form><?php endif; ?>∮<?php endforeach; endif; else: echo "" ;endif; ?>