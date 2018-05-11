<?php if (!defined('THINK_PATH')) exit(); if(is_array($daiyan_list)): $i = 0; $__LIST__ = $daiyan_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$daiyan): $mod = ($i % 2 );++$i;?><section>
        <div class="unit box">
            <div class="img">
                <?php if(empty($daiyan[HEADIMGURL])): ?><img src="/weixin/Application/Home/View/images/dtdoctor.png" width="100%" />
                <?php else: ?>
                    <img src="<?php echo ($daiyan[HEADIMGURL]); ?>" width="100%" /><?php endif; ?>
            </div>
            <div class="txt">
                <p class="nick_name">
                    <span><?php echo ($daiyan["NICKNAME"]); ?></span>
                    <span>会员姓名：<?php echo ($daiyan["MEMBER_NAME"]); ?></span>
                </p>
                <p class="member_name">
                    <span>保障人姓名：<?php echo ($daiyan["PERSON_NAME"]); ?></span>
                </p>
                <p class="person_mobile">
                    <span>保障人手机号：<?php echo ($daiyan["PERSON_MOBILE"]); ?></span>
                </p>
                <p class="person_mobile">
               
                <?php if(($daiyan['WL_CODE'] == '') && ($daiyan['ZT_FLAG'] == '物流')): ?><span>配送状态：未发货</span>
                    <br>
                    <span>物流编号：暂无</span>

                <?php elseif($daiyan['ZT_FLAG'] == '自提'): ?>
                     <span style="">配送状态：<em style="color:#6ed615;font-style:normal;">已发货</em>-<?php echo ($daiyan["ZT_FLAG"]); ?></span>

                <?php else: ?>
                    <span>配送状态：<em style="color:#6ed615;font-style:normal;">已发货</em>-快递</span>
                    <br>
                    <span>物流编号：<?php echo ($daiyan["WL_CODE"]); ?></span><?php endif; ?>
                </p>
                <p class="person_mobile">
                    <span>购买类型：<?php echo ($daiyan["SALE_TYPE"]); ?></span>
                </p>
            </div>
        </div>
        <?php if($daiyan[ORDER_STATUS] == '已付款'): ?><i class="ok"><?php echo ($daiyan["ORDER_STATUS"]); ?></i>
        <?php else: ?>
            <i class="wait"><?php echo ($daiyan["ORDER_STATUS"]); ?></i><?php endif; ?>
        
    </section>∮<?php endforeach; endif; else: echo "" ;endif; ?>