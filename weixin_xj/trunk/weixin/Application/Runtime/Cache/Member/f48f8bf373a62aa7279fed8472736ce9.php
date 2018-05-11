<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	<title>转诊申请</title>
	<link rel="stylesheet" type="text/css" href="/weixin/Public/Member/css/referral.css">
	<link rel="stylesheet" href="/weixin/Public/Member/css/pickout.min.css">
	<style>
		.pk-modal{
			height: 100%;
		}
		.pk-modal .head{
			position: fixed;
		}
		.pk-modal .pk-search{
			position: fixed;
			top: 62px;
			width: 100%;
		}
		ul.main{
			position: absolute;
			top: 109px;
			height: 100%;
			overflow: auto;
		}
		#sub-re-btn{
			-webkit-appearance: none;
		}
		.referralInfo li.last{
			margin: 0;
		}
		.referralInfo li.last input{
			margin-top: 0;
		}
	</style>
	<script type="text/javascript">
		document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/15 + 'px';
	</script>
</head>
<body>
	<form action="<?php echo U('Referral/referral_add');?>" method="POST" id="form" enctype="multipart/form-data">
		<ul class="referralInfo">
			<li>
				<span>姓名</span>
				<input type="text" name="person_name" onblur="check_name()" onkeydown="check_name()" onkeyup="check_name()" maxlength="20" id="person_name">
			</li>
			<li>
				<span>手机</span>
				<input type="text" id="phone" class="" name="person_mobile" oninput="if(value.length>11)value=value.slice(0,11)">
			</li>
			<li>
				<span>身份证号</span>
				<input type="text" maxlength="18" id="idNum" name="person_idcard">
			</li>
			<li class="file-box">
				<span>证件照片</span>
				<a href="javascript:;" class="file-btn" onclick="fileInput.click()"><em></em><i>上传图片</i></a>
				<input type="file" id="fileInput" accept="image/*" name="photo[]">
				<em id="myImg"></em>
			</li>
			<li>
				<span>转诊医院</span>
				<select name="hos_id" id="hospital" class="hospital pickout" placeholder="请选择医院">
					<?php if(is_array($hos_list)): $i = 0; $__LIST__ = $hos_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hos): $mod = ($i % 2 );++$i;?><option value="<?php echo ($hos['HOS_ID']); ?>"><?php echo ($hos['HOS_NAME']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</li>
			<li>
				<span>转诊理由</span>
				<textarea class="area" name="referral_desc" id="referral_desc" maxlength="200" placeholder="200字以内"></textarea>
				<i id="count"></i>
			</li>
			<li class="last">
				<input type="button" value="确认提交" class="re-btn" id="sub-re-btn">
			</li>
		</ul>
	</form>
	<script src="/weixin/Public/Common/js/jquery.min.js"></script>
	<script>
	if(!document.addEventListener) {
		document.write('<script src = "/weixin/Public/Member/js/ieBetter-min.js"><\/script>')
	}
	</script>

	<script src="/weixin/Public/Member/js/pickout.min.js"></script>
	<script src="/weixin/Public/Member/js/verify.js"></script>
	<script src="/weixin/Public/Member/js/referral.js"></script>
	<script src="/weixin/Public/Member/js/upFile.js"></script>
	<script>
		pickout.to({
			el:'.hospital',
			search: true
		});
		pickout.updated('.hospital');

		$('#idNum').bind('input propertychange', function() {
			IdentityCodeValid($('#idNum').val());
		});

		$('#phone').bind('input propertychange', function() {
			checkPhone($('#phone').val());
		});



		var maxCount = 200;
		$("#count").html(maxCount+'/'+maxCount);
		$("#referral_desc").on('keyup', function() {
		    var len = getStrLength(this.value);
		    $("#count").html(maxCount-len+'/'+maxCount);
		})
		function getStrLength(str) {
		    var len = str.length;
		    var reLen = 0;
		    for (var i = 0; i < len; i++) {
		      reLen++;
		    }
		    return reLen;
		}

		$("#sub-re-btn").click(function(){
				console.log($("#hospital").val());
			if(check_form())
			{
				$("#form").submit();
			}
		});

		function check_name() 
		{
			var person_name = $("#person_name").val();
			//if(!/^[\u2E80-\uFE4F]+$/gi.test(person_name))
	        if(/[0-9\s]/gi.test(person_name))
	        {	
	        	$("#person_name").css("border","1px #f00 solid");
	            return false;
	        }
	        else
	        {
	        	$("#person_name").css("border","1px #ccc solid");
	        }
		}

		function check_form()
		{
			var person_name = $("#person_name").val();
			var person_mobile = $("#phone").val();
			var person_idcard = $("#idNum").val();
			var person_idcard_pic = $("#fileInput").val();
			var hos_id = $("#hospital").val();
			var referral_desc = $("#referral_desc").val().trim();
			if(person_name == '')
	        {
	            alert("请填写姓名！");
	            $("#person_name").focus();
	            return false;
	        }
	        if(/[0-9\s]/gi.test(person_name))
	        {
	            alert("姓名不能输入数字和空格");
	            $("#person_name").focus();
	            return false;
	        }

	        if(person_mobile == '')
	        {
	            alert("手机号不能为空！");
	            $("#phone").focus();
	            return false;
	        }

	        if(!isMobile(person_mobile))
	        {
	            alert("手机号有误！");
	            $("#phone").focus();
	            return false;
	        }

	        if(person_idcard == '')
	        {
	            alert("身份证不能为空！");
	            $("#idNum").focus();
	            return false;
	        }

	        if(!isNumber(person_idcard))
	        {
	            alert("身份证号码有误！");
	            $("#idNum").focus();
	            return false;
	        }
	        if(person_idcard_pic == '')
	        {
	            alert("证件照不能为空！");
	            return false;
	        }
	        if(hos_id == '')
	        {
	            alert("请选择转诊医院！");
	            return false;
	        }
	        if(referral_desc == '')
	        {
	            alert("转诊理由不能为空！");
	            $("#referral_desc").focus();
	            return false;
	        }

	        return true;
		}



		//检验手机
	    function isMobile(str)
	    {
	        var reg=/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/i;
	        if(reg.test(str))
	        {
	            return true;
	        }
	        else
	        {
	            return false;
	        }
	    }

		function isNumber(str)
	    {
	        var reg15=/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/;
	        var reg18=/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X|x)$/;
	        if(reg15.test(str)||reg18.test(str))
	        {
	            return true;
	        }
	        else
	        {
	            return false;
	        }
	    }
			document.getElementsByClassName('pk-input')[0].addEventListener("click", function(e) {
				// console.log('1');
				document.getElementsByClassName('pk-input')[0].blur();
				// console.log(document.getElementsByTagName('input')[6]);
			})
			var userAgent = navigator.userAgent;
			var index = userAgent.indexOf("Android");
			if (index >= 0) {
			    var androidVersion = parseFloat(userAgent.slice(index + 8));
			    if (androidVersion < 4.3) {
			        var androidH = $('.pk-modal').height();
			        $('.pk-modal').css({ 'height': androidH, '-webkit-transform': 'translate3d(0,0,0)', 'transform': 'translate3d(0,0,0)', 'top': '50%', 'margin-top': -androidH / 2 });
			    }
			}


</script>
</body>
</html>