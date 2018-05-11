<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png" >

<!--CSS库文件-->

<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link href="/weixin/Public/Common/css/commonFooter/footer_v2.min.css" type="text/css" rel="stylesheet"/>

<!--CSS当前页面文件-->

<link href="/weixin/Public/Member/css/gerenzhongxin.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Member/css/yishengbangzs.css" type="text/css" rel="stylesheet"/>
<title>性别设置</title>
</head>

<body>
<div id="J_Account_Info" class="gp GJ_Gp g-items gp-profile" style="padding-bottom: 10px;">
        <form action="<?php echo U('User/update_sex_ok');?>" method="post" id="form" name="form">
                <ul>
                        <li class="avatar"  > <input type="radio" name="column_value" id="male"  
                                <?php if($sex == '男'): ?>checked="checked"
                                        <?php else: endif; ?>
                                class="sex"  value="0" />
                                <label class="xingbie <?php if($sex == '男'): ?>on
                                        <?php else: endif; ?>
                                        " for="male">男</label>
                        </li>
                        <li class="avatar" > <input type="radio"  name="column_value" id="female"  
                                <?php if($sex == '女'): ?>checked="checked"
                                        <?php else: endif; ?>
                                class="sex"  value="1" />
                                <label class="xingbie <?php if($sex == '女'): ?>on
                                        <?php else: endif; ?>
                                        " for="female">女</label>
                        </li>
                </ul>
                <div class="queding"> <a href="#" onclick="checkform()">完成</a> </div>
                <input type="hidden" name="column_name" id="column_name" value="member_sex">
        </form>
</div>
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="/weixin/Application/Member/View/js/jquery.min.js"></script> 
<script type="text/javascript">

$(function(){

	//$('ul li').eq(0).children('.xingbie').addClass('on');

	$('ul li').click(function(){

		$(this).css('background','#e1eefe').siblings().css('background','#fff');

		$(this).children('.xingbie').addClass('on');

		$(this).siblings().children('.xingbie').removeClass('on')

		})

	})

//提交性别修改

function checkform(){

	

	//form.submit()

	var val = $('input:radio[name="column_value"]:checked').val(); 

	if(val==null)

	{

		alert('性别不能为空请选择,请填写!');

		return false;

	}

	else

	{

		form.submit()

	}

}

	

	

</script> 
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
<div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?>
</div>
</body>
</html>