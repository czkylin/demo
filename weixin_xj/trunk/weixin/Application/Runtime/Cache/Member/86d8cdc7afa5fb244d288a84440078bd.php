<?php if (!defined('THINK_PATH')) exit(); if(is_array($doc_list)): $i = 0; $__LIST__ = $doc_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$doc): $mod = ($i % 2 );++$i;?><li>
        <a class="yylist_a" style=" margin-bottom:6px;" href="/weixin/index.php?m=Member&c=Doc&a=doc_detail&doc_id=<?php echo ($doc['EXPERT_ID']); ?>"> 
            <div class="docImg fl">
            <!-- 判断头像 -->
            <?php if(($doc['EXPERT_SEX'] == '未填写') && ($doc['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?><span class="img"><img src="/weixin/Public/Expert/images/yonghu/girl.png" class="g-left expert-img"/></span>

            <?php elseif(($doc['EXPERT_SEX'] == '男') && ($doc['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?>
                <span class="img"><img src="/weixin/Public/Expert/images/yonghu/boy.png" class="g-left expert-img"/></span>

             <?php elseif(($data['EXPERT_SEX'] == '女') && ($data['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?>
                <span class="img"><img src="/weixin/Public/Expert/images/yonghu/girl.png" class="g-left expert-img"/></span>
            <?php else: ?>
                <span class="img"><img src="<?php echo ($doc['SMALL_PIC']); ?>" class="g-left expert-img"/></span><?php endif; ?>
                <?php  $my=intval($doc['MY_NUM']); $hy=intval($doc['HY_NUM']); $cp=intval($doc['CP_NUM']); $sum = ($my*8+$hy*10+$cp*4)*60/(($my+$hy+$cp)*10); $sum1 = round($sum,0); if($sum1 == 0) { $sum1 = 50; } echo "<i><b style='width:".$sum1."px;'>
                    <img src='/weixin/Public/Member/images/icon/start.png' /></b></i>"; ?>												                                   
            </div> 
            <span class="meta fl">
                <div class="name_dj"> 
                    <strong class="mingcheng"><em class="zc"><?php echo ($doc['EXPERT_NAME']); ?></em><em class="zc"><?php echo ($doc['EXPERT_RANK']); ?></em><em class="count">浏览量：<?php echo ($doc['POINT_NUM']+97); ?></em></strong> 
                    <strong class="mingcheng"><em class="zc"><?php echo ($doc['HOS_NAME']); ?></em><em class="zc"><?php echo ($doc['DEP_NAME']); ?></em></strong> 
                </div>
                <!--<p class="hos_jj" style=" margin-top:1px;"> 
                    <?php if($serve['HAVE_SERVE'] == ''): endif; ?>
                </p>-->
                <p class="desc">擅长：<?php echo ($doc['EXPERT_SKILL']); ?>
                    <?php if( $doc['EXPERT_SKILL'] == '' ): ?>暂无<?php endif; ?>
                </p>
            </span> 
        </a>                       
    <div class="kt_service">
        <?php if(is_array($doc['EXPERT_SERVES'])): $i = 0; $__LIST__ = $doc['EXPERT_SERVES'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$serve): $mod = ($i % 2 );++$i; if($serve['HAVE_SERVE'] == 0): ?><a href="javascript:void(0)" class="service weikaitong" style=" margin:0 0 0 10px"><?php echo ($serve['SERVE_NAME']); ?></a>
                <?php else: ?> <a class="service" style=" margin:0 0 0 10px" href="/weixin/index.php?m=Member&c=Doc&a=doc_consult&doc_id=<?php echo ($doc['EXPERT_ID']); ?>"><?php echo ($serve['SERVE_NAME']); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>
    </li>∮<?php endforeach; endif; else: echo "" ;endif; ?>