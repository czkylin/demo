<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<!--CSS库文件-->
<link rel="stylesheet" href="/weixin/Public/Common/css/commonIcon/icon.css">
<link href="/weixin/Public/Common/css/common/basic.css" type="text/css" rel="stylesheet" >
<!--<link href="/weixin/Public/Common/css/commonFooter/footer_v2.min.css" type="text/css" rel="stylesheet"/>-->
<!--CSS当前页面文件-->
<link rel="stylesheet" href="/weixin/Public/Member/css/ask.min.css">
<link rel="stylesheet" href="/weixin/Public/Member/css/doc/doc_comment.css">
<script src="/weixin/Application/Member/View/js/jquery.min.js" type="text/javascript"></script>
<title>专家工作室</title>
<script>
    document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12 + 'px';
</script>
</head>
<body>
<div class="consult_add">
        <p class="msgtishi" id="msg"></p>
</div>
<header>
    <div class="bg"></div>
    <div class="content">
        <div class="user"><img src="<?php echo ($doc_detail["SMALL_PIC"]); ?>" width="100%" /></div>
        <h2 class="text-center"><strong><?php echo ($doc_detail["EXPERT_NAME"]); ?></strong><span><?php echo ($doc_detail["EXPERT_RANK"]); ?></span></h2>
        <h2 class="text-center"><span><?php echo ($doc_detail["HOS_NAME"]); ?></span></h2>
        <div class="rated box">
            <div class="block text-center"><i class="ui-icon-like"></i><em>好评率:暂无<!-- <?php echo ($hp); ?>% --></em></div>
            <div class="block text-center"><!-- <i class="ui-icon-comment"></i><em>回答数:24</em> --></div>
            <div class="block text-center"><i class="ui-icon-ask"></i><em>咨询量：<?php echo ($doc_detail['ZX_COUNT']+17); ?></em></div>
        </div>
    </div>
</header>
<article>
    <section class="unit">
        <ol class="box">
            <li>
                <i></i>
                <span>预约挂号</span>
                <a href="#" onClick="showmsg()"></a>
            </li>
            <li>
                <i></i>
                <span>医生咨询</span>
                <a href="/weixin/index.php?m=Member&c=Doc&a=doc_consult&doc_id=<?php echo ($doc_detail["EXPERT_ID"]); ?>"></a>
            </li>
            <li>
                <i></i>
                <span>就医经验</span>
                <a href="#" onClick="showmsg()"></a>
            </li>
            <li>
                <i></i>
                <span>医生公告</span>
                <a class="wenzhang" href="#" onClick="showmsg()"></a>
            </li>
        </ol>
    </section>
    <section class="unit sec">
        <ul>
            <li class="no">
                <h2>医生简介</h2>
                <p class="limit"><?php echo ($doc_detail["EXPERT_NAME"]); ?>，<?php echo ($doc_detail["HOS_NAME"]); ?>， <?php echo (htmlspecialchars_decode($doc_detail["EXPERT_DESC"])); ?></p>
                <div class="line text-right"><i class="ui-icon-unfold"></i></div>
            </li>
        </ul>
    </section>
    <section class="unit sec">
        <ul>
            <li class="no">
                <h2>医生擅长</h2>
                <p class="limit"><?php echo ($doc_detail["EXPERT_SKILL"]); ?></p>
                <div class="line text-right"><i class="ui-icon-unfold"></i></div>
            </li>
        </ul>
    </section>
    <section class="unit sec">
        <header class="head clear">
            <h2 class="fl">用户评价：(<?php echo ((isset($doc_detail["PJ_NUM"]) && ($doc_detail["PJ_NUM"] !== ""))?($doc_detail["PJ_NUM"]):"0"); ?>)</h2>
            <a href="<?php echo U('Member/Doc/doc_comment',array('doc_id'=>$doc_detail['EXPERT_ID']));?>" class="fr">查看全部评价</a>
        </header>
        <div class="comment-list">
            <ul id="doc-list">
                <?php if(is_array($doc_consult)): $i = 0; $__LIST__ = array_slice($doc_consult,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="height: auto;">
                        <?php if($vo['MEMBER_PIC'] == ''): ?><img src="/weixin/Public/Member/images/yonghu/comment.png" alt="" class="touxiang" style="border:1px solid #999">
                            <?php else: ?> <img src="<?php echo ($vo["MEMBER_PIC"]); ?>" alt="" class="touxiang" style="border:1px solid #999"><?php endif; ?>
                        <div class="des" style="height: auto;">
                            <div class="info" style="height: auto;"> <span class="name"><?php echo ($vo["MEMBER_NAME"]); ?></span> <b class="comment-reslut fcmy">
                    <?php if($vo['PJ_FLAG'] == '0'): ?>满意
                    <?php elseif($vo['PJ_FLAG'] == '1'): ?>
                      非常满意
                    <?php else: ?>
                      不满意<?php endif; ?>
                    </b> </div>
                            <div class="con"> <?php echo ($vo["PJ_CONTENT"]); ?> </div>
                            <div style="float: right; padding-bottom: 5px;"> <?php echo ($vo["CREATE_DATE"]); ?> </div>
                            <div style="clear: both;"></div>
                        </div>
                        <div style="clear: both;"></div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </section>
    <section class="unit">
        <div class="box">
            <section>
                <a href="<?php echo U('Member/Consult/consult_pay',array('json'=>$json));?>" style="color:#333;">
                     <div class="imgs text-center"><img src="/weixin/Public/Member/images/gongzuoshi/logos.png" /></div>
                    <h2 class="text-center">在线咨询</h2>
                    <p class="text-center">通过文字和图片向医生咨询</p>
                </a>
            </section>
            <section>
                <a href="javascript:;" style="color:#333;">
                    <div class="imgs text-center"><img src="/weixin/Public/Member/images/gongzuoshi/logos.png" class="active" /></div>
                    <h2 class="text-center">语音咨询</h2>
                    <p class="text-center">通过语音向医生咨询</p>
                </a> 
            </section>
            <section>
                <a href="javascript:;" style="color:#333;">
                    <div class="imgs text-center"><img src="/weixin/Public/Member/images/gongzuoshi/logos.png" class="active" /></div>
                    <h2 class="text-center">视频咨询</h2>
                    <p class="text-center">通过视频向医生咨询</p>
                </a>
            </section>
        </div>
    </section>
</article>
<!--<div class="zhuanjiaInfo">
        <div class="zhuanjiaInfoCon">
                <div class="yuyueL"> <span class="liang">咨询量：<span><?php echo ($doc_detail['ZX_COUNT']+17); ?></span></span></div>
                <div class="zhuanjiaInfoConImg"> <img  src='<?php echo ($doc_detail["SMALL_PIC"]); ?>' height="70" width="70" /> </div>
                <div class="zhuanjiaInfoConTxt">
                        <h2><?php echo ($doc_detail["EXPERT_NAME"]); ?></h2>
                        <p><?php echo ($doc_detail["HOS_NAME"]); ?></p>
                        <p><?php echo ($doc_detail["DEP_NAME"]); ?></p>
                </div>
                <div class="clear"></div>
        </div>
</div>-->
<!--<div class="content">
        <div class="conPad">
                <div class="aLian borderBottom" > <a class="jianjie" href="/weixin/index.php?m=Member&c=Doc&a=doc_desc&doc_id=<?php echo ($doc_detail["EXPERT_ID"]); ?>">医生简介<span></span></a> <a class="guahao"  href="#" onClick="showmsg()">预约挂号<span></span></a> <a class="zixun" href="/weixin/index.php?m=Member&c=Doc&a=doc_consult&doc_id=<?php echo ($doc_detail["EXPERT_ID"]); ?>">医生咨询</a> <br class="clear">
                </div>
                <div class="aLian" > 
                        <a class="jingyan" href="#" onClick="showmsg()">就医经验<span></span></a> <a class="wenzhang" href="#" onClick="showmsg()">医生公告</a> </div>
        </div>
</div>-->
<!--<footer id="over_footer">

		<a class="over_footer_shouye" href="<?php echo U('Member/Index/index');?>">首页</a>

		<a class="over_footer_zixun" href="<?php echo U('Member/Doc/doc_list');?>">咨询</a>

		<a class="over_footer_yuepian" href="<?php echo U('Member/Hos/hos_list','serve_id=29');?>">阅片</a>

		<a class="over_footer_dingdan_dd" href="<?php echo U('Member/Order/order_list');?>">订单</a>

		<a class="over_footer_geren" href="<?php echo U('Member/User/user_info');?>">个人中心</a>

</footer>

<div class="" style=" width: 100%; position:fixed; top: 35%; left: 0; z-index: 999;">

	<p class="msgtishi"  id="msg"></p>

</div>

<script>

	var shouye = $("#over_footer .over_footer_shouye"),zixun = $("#over_footer .over_footer_zixun"),yuepian = $("#over_footer .over_footer_yuepian"),dingdan_dd = $("#over_footer .over_footer_dingdan_dd"),geren = $("#over_footer .over_footer_geren");

	$(function()

	{

		if(over_footer==1)

		{

			shouye.removeClass("over_footer_shouye").addClass("over_footer_shouye_on");

		};

		if(over_footer==2)

		{

			zixun.removeClass("over_footer_zixun").addClass("over_footer_zixun_on");

		};

		if(over_footer==3)

		{

			yuepian.removeClass("over_footer_yuepian").addClass("over_footer_yuepian_on");

		};

		if(over_footer==4)

		{

			dingdan_dd.removeClass("over_footer_dingdan_dd").addClass("over_footer_dingdan_dd_on");

		};

		if(over_footer==5)

		{

			geren.removeClass("over_footer_geren").addClass("over_footer_geren_on");

		}

	})

</script>

<script>

    function showmsg(){

        $('#msg').show();

        $('#msg').html('暂未开放！');

        setTimeout(function(){fail();},2000);

        return false;

    }

    function fail(){

        $('#msg').hide()

    }

</script> -->
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
<script>
    $('.line i').click(function(){
        $(this).parent().prev().toggleClass('limit');
        if($(this).parent().prev().hasClass('limit')){
            $(this).css({
                'transform': 'rotateX(0)',
                '-webkit-transform': 'rotateX(0)'
            })
        }else{
            $(this).css({
                'transform': 'rotateX(-180deg)',
                '-webkit-transform': 'rotateX(-180deg)'
            })
        }
    })
</script>
<script>
function showmsg()
{
    var text='<div style=" text-align: center;"><br/><img src="/weixin/Public/Common/images/icon/icon1.png"><br><i style=" line-height: 30px;font-size:14px;font-style: normal;">暂无数据</i></div>';
    $(".consult_add").height($('body').height()).show();
	$('#msg').show();
	$('#msg').html(text);
	setTimeout(function(){fail();},2000);
	return false
}
function fail(){
    $(".consult_add").hide();
    $('#msg').hide();
}
</script>
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
</body>
</html>