<?php if (!defined('THINK_PATH')) exit();?> <?php if(is_array($doc_consult)): $i = 0; $__LIST__ = $doc_consult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
        <h2> 
        <?php  echo mb_substr($vo['MEMBER_NAME'],0,1,'utf-8'); ?>**</h2>
        <p><?php echo ($vo["CONSULT_CONTENT"]); ?></p>
        <br/>
        <p><?php echo ($vo["CONSULT_DATE"]); ?></p>
    </li>∮<?php endforeach; endif; else: echo "" ;endif; ?>