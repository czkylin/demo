<?php if (!defined('THINK_PATH')) exit(); if(is_array($expert_list)): $i = 0; $__LIST__ = $expert_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$doc): $mod = ($i % 2 );++$i;?><li>
      <a class="yylist_a" href="/weixin/index.php?m=Member&c=Doc&a=doc_detail&doc_id=<?php echo ($doc['EXPERT_ID']); ?>"> 
          <div class="docImg fl">
            <span class="img"><img src="<?php echo ($doc["SMALL_PIC"]); ?>" class="g-left expert-img"/></span>
              <?php  $my=intval($doc['MY_NUM']); $hy=intval($doc['HY_NUM']); $cp=intval($doc['CP_NUM']); $sum = ($my*8+$hy*10+$cp*4)*60/(($my+$hy+$cp)*10); $sum1 = round($sum,0); if($sum1 == 0) { $sum1 = 60; } echo "<i><b style='width:".$sum1."px;'>
                  <img src='/weixin/Public/Member/images/icon/start.png' /></b></i>"; ?>                                                   
        </div> 
          <span class="meta fl">
              <div class="name_dj"> 
                  <strong class="mingcheng"><em class="zc"><?php echo ($doc["EXPERT_NAME"]); ?></em><em class="zc"><?php echo ($doc["EXPERT_RANK"]); ?></em><em class="count">浏览量：<?php echo ($doc["POINT_NUM"]); ?></em></strong> 
                  <strong class="mingcheng"><em class="zc"><?php echo ($doc["HOS_NAME"]); ?></em><em class="zc"><?php echo ($doc["EXPERT_ROLE"]); ?></em></strong> 
              </div>
              <p class="desc">擅长：<?php echo ((isset($doc["EXPERT_SKILL"]) && ($doc["EXPERT_SKILL"] !== ""))?($doc["EXPERT_SKILL"]):"暂无"); ?></p>
          </span> 
      </a>
                          
      <div class="kt_service">
          <a class="service" style=" margin:0 0 0 10px" href="/weixin/index.php?m=Member&c=Doc&a=doc_consult&doc_id=<?php echo ($doc['EXPERT_ID']); ?>">在线咨询</a>
          <a class="service weikaitong" style=" margin:0 0 0 10px" href="javascript:;">视频咨询</a>
        <a href="javascript:void(0)" class="service weikaitong" style=" margin:0 0 0 10px">语音电话</a>
      </div>
  </li>∮<?php endforeach; endif; else: echo "" ;endif; ?>