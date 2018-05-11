<?php if (!defined('THINK_PATH')) exit(); if(is_array($hos_list)): $i = 0; $__LIST__ = $hos_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hos): $mod = ($i % 2 );++$i;?><li>
        <div class="feng"></div>
        <a class="yylist_a" href="/weixin/index.php?m=Member&c=Hos&a=hos_detail&hos_id=<?php echo ($hos['HOS_ID']); ?>&province_name=<?php echo ($hos['PROVINCE_NAME']); ?>">

            <div class="hezuoHos-wrap">
                <div class="hezuoHos">

                    <div class="yiyuanpic">
                        <img class="" src="<?php echo ($hos['HOS_PIC']); ?>" alt="<?php echo ($hos['HOS_NAME']); ?>" class="g-left expert-img" />
                        <?php if($hos['NEW_HOS'] == '是'): ?><b></b>
                        <?php else: endif; ?>
                    </div>    
                    <h2 class="mingcheng"><i><?php echo ($hos['HOS_NAME']); ?></i> <span>医保</span></h2>

                    <div class="hezuoHosdes">
                        <p><?php echo ($hos['LEVEL_NAME']); ?></p>
                        <p><?php echo ($hos['TYPE_NAME']); ?></p>
                        <p><?php echo ($hos['PROVINCE_NAME']); ?></p>
                    </div>

                    <div class="xingji">
                        <i>
                            <b><img src="/weixin/Public/Member/images/icon/start.png" alt=""></b>
                            <span style="display: none;"><?php echo ($hos['FZ_NUM']/$hos['FM_NUM']); ?></span>
                        </i> 
                    </div>
                        
                    <p class="goumaishu">
                        <b>
                            <?php if($hos['SERVE_NUM'] == '0'): else: ?>
                                月服务人数:<?php echo ($hos['SERVE_NUM']); endif; ?>
                        </b>
                    </p> 
                    <div class="juli"><?php echo ($hos['JL']); ?>km</div>
                    
                </div> 
                   
            </div>
            
        </a>
        <div class="kt_service" style=" margin:0; padding-top:10px;">
            <?php if(is_array($hos['HOS_SERVES'])): $i = 0; $__LIST__ = $hos['HOS_SERVES'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$serve): $mod = ($i % 2 );++$i;?><!-- 如果服务为空 选择 价格不显示 -->
                <?php if($serve['HAVE_SERVE'] == 0): else: ?>
                    <?php if(($serve['SERVE_ID'] == 25) or ($serve['SERVE_ID'] == 29)): ?><dl>
                            <a href="/weixin/index.php?m=Member&c=Hos&a=serve_detail&serve_id=<?php echo ($serve['SERVE_ID']); ?>&hos_id=<?php echo ($hos['HOS_ID']); ?>"> <dt class="on"><?php echo ($serve['SERVE_NAME']); ?></dt>
                                <dd style="display:none;"><span class="fuwu fuwu<?php echo ($serve['SERVE_ID']); ?> on"></span></dd>
                                <dd>￥<?php echo ($serve['SERVE_MONEY']); ?></dd>
                            </a>
                        </dl><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </li>∮<?php endforeach; endif; else: echo "" ;endif; ?>

<script type="text/javascript">
//判断评分数
        $(".xingji").each(function(){
            var iFen = $(this).find("span").html();
            if(iFen == 0)
            {
                iFen = 5;
            }
            var iScale = iFen/5 >= 1 ? 1: iFen/5;
            $(this).find("b").css("width",86*iScale);
        })
    </script>