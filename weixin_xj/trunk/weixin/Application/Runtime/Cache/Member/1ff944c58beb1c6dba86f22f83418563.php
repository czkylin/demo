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

<link href="/weixin/Public/Member/css/personalCenter.min.css" type="text/css" rel="stylesheet"/>
<style type="text/css">
	#t1,#t2{position: absolute; height: 20px; color: red; line-height: 20px; right: 0; top: 15px; display: none;}
</style>
<title>基本信息</title>
</head>

<body>

<!--<div class="back"><a href="javascript:history.go(-1);"><img src="/weixin/Application/Member/View/images/icon/back.png" /></a></div>-->
<div class="gp GJ_Gp g-items gp-profile-auth">
        <ul>
                <li>
                        <label>账号:</label>
                        <?php echo ($phone); ?> </li>
                <li style="position:relative;">
                        <label>姓名:</label>
                        <input type="text" placeholder="请输入真实的姓名，必填" class="weism" value="<?php echo ($member_name); ?>" id="username">
                        <p id="t1">姓名必须为中文！</p>
                </li>
                <li style="position:relative;">
                        <label>身份证:</label>
                        <input type="text" placeholder="请输入您的身份证号码，非必填" value="<?php echo ($member_card); ?>" class="weism" id="sfz">
                        <p id="t2">格式不正确！</p>
                </li>
        </ul>
</div>
<div class="" style=" width: 100%;color:red;">
        <p class="msgtishi"  id="msg" style="text-align:center; color:#333;"></p>
</div>
<div class="tuichu"><a href="javascript:void(0)" onclick="check(this,2)">提交</a></div>
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
<script>

function check(obj,second)

{

	var username = $('#username').val();

	var sfz = $('#sfz').val();

	var sfzreg = /^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/;

	var reg = /^([\u4E00-\u9FA5]+，?)+$/;

	var yesorno = username.match(reg) != null;

	if (!yesorno)

	{

		if(second>0)

		{

			/*$('#msg').show();

			$('#msg').html('姓名必须为中文！');*/
			$('#t1').show();
			setTimeout(function(){
				$('#t1').hide();
			},1000)

			second--;

			setTimeout(function(){check(obj,second);},1000);

		}

		else

		{

			$('#t1').hide();

		}

		return false;

	}

	if(sfz.length!=0&&!sfz.match(sfzreg))

	{

		if(second>0)

		{

			

				$('#t2').show();
				setTimeout(function(){
					$('#t2').hide();
				},1000)
				second--;

				setTimeout(function(){check(obj,second);},1000);


		}

		else

		{

			$('#t2').hide();

		}

		return false;

	}

	else

	{

		$.ajax

		({

			url: "/weixin/index.php?m=Member&c=User&a=band_name_add&idcard="+sfz+"&username="+username,

			success: function(msg)

			{

				if(msg=='ok')

				{

					$('#msg').show();

					$('#msg').html('提交成功！');

					setTimeout(function(){success();},1000);

				}

				else if(msg=='fail')

				{

					$('#msg').show();

					$('#msg').html('提交失败！');

					setTimeout(function(){fail();},2000);

				}

				else if(msg=='exist')

				{

					$('#msg').show();

					$('#msg').html('身份证已经认证过！');

					setTimeout(function(){fail();},2000);

				}

				else

				{

					$('#msg').show();

					$('#msg').html('身份证不正确！');

					setTimeout(function(){fail();},2000);

				}

			}

		});

	}

}



function success()

{

	location.href = "/weixin/index.php?m=Member&c=User&a=info_detail"

}



function fail()

{

	$('#msg').hide();

}

</script> 
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
<div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?>
</div>
</body>
</html>