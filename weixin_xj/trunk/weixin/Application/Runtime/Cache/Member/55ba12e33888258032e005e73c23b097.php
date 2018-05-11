<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css">
    <link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/weixin/Public/Member/css/info.css?<?php echo time();?>.css">
    <title>我的代言成果</title>
    <script>
    document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12 + 'px';
    </script>
</head>
<body>
<?php if(empty($daiyan_list)): ?><div style=" text-align: center;"> 
        <br>
        <img src="/weixin/Public/Common/images/icon/icon1.png"><br>
        <i style=" line-height: 30px;">暂无数据</i>
    </div>
<?php else: ?>

<article id="art">
<div class="title">
        <h1>我的代言成果</h1>
    </div>
    <?php if(is_array($daiyan_list)): $i = 0; $__LIST__ = $daiyan_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$daiyan): $mod = ($i % 2 );++$i;?><section>
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
            
        </section><?php endforeach; endif; else: echo "" ;endif; ?>
</article>
    <!-- 加载更多 -->
    <div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more('body');"></a></div>
    <div id="current_pagenum" style="display:none">2</div><?php endif; ?>
 <!--    <section>
        <div class="unit box">
            <div class="img"><img src="/weixin/Application/Home/View/images/dtdoctor.png" width="100%" /></div>
            <div class="txt">
                <p class="nick_name">
                    <span>昵称</span>
                    <span>会员姓名：张三</span>
                </p>
                <p class="member_name">
                    <span>保障人姓名：张三</span>
                </p>
                <p class="person_mobile">
                    <span>保障人手机号：132****6119</span>
                </p>
            </div>
        </div>
        <i class="ok">已付款</i>
    </section> -->
<script type="text/javascript" src="/weixin/Public/Common/js/jquery.min.js"></script> 
<script src="/weixin/Public/Common/js/load.js" type="text/javascript"></script>
<script>
var onOff = true;

window.onload = function(){
    window.onscroll();
}

window.onscroll = function(){
    load_more('#art');
}


function load_more(obj)
{   

    if(!onOff) return;

    if($(obj).height()+$('header').outerHeight() <= $(document).scrollTop() + $(window).height())
    {
        onOff = !onOff;
        loadmore('#current_pagenum','/weixin/index.php?m=Member&c=Huzhu&a=daiyan_list_append','#art');
    }
}
</script>
</body>
</html>