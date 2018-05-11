<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta name="share-title" content="">
<link href="/weixin/Application/Home/View/css/docInfo.css" type="text/css" rel="stylesheet">
<link href="/weixin/Public/Common/css/common/common.css" rel="stylesheet" type="text/css" />
<style>
    #dateshadow{
        z-index: 100;
    }
    #datePage{
        position: fixed;
        top: 25%;
        z-index: 105;
    }
</style>
</head>
<script>
	document.getElementsByTagName("html")[0].style.fontSize = document.documentElement.clientWidth / 16 + 'px';
</script>
<body>
<div id="datePlugin"></div>
	<form action="<?php echo U('Home/Doc/docinfo_add');?>" method="post" onsubmit="return ajaxcheck()">
		<ul class="info">
			<li>
				<span class="fl">推荐人:</span>
				<input type="text" class="fl" name="tj_name" value="<?php echo ($name); ?>" readOnly="true"> 
			</li>
			<li>
				<span class="fl">推荐人手机:</span>
				<input type="text" class="fl" name="tj_mobile" value="<?php echo ($phone); ?>" readOnly="true">
			</li>
			<li>
				<i>*</i>
				<span class="fl">医生姓名:</span>
				<input type="text" class="fl" name="expert_name" id="expert_name">
			</li>
			<li>
				<i>*</i>
				<span class="fl">出生年月:</span>
				<input type="text" class="fl" name="birth_date" id="beginTime">
			</li>
			<li>
				<i>*</i>
				<span class="fl">机构名称:</span>
				<input type="text" class="fl"  name="hos_name" id="hos_name">
			</li>
			<li>
				<i>*</i>
				<span class="fl">所属科室:</span>
				<input type="text" class="fl" name="hos_keshi" id="hos_keshi">
			</li>
			<li>
				<i>*</i>
				<span class="fl">职务职称:</span>
				  <select id="expert_role" name="expert_role" class="fl" id="expert_role">
			          <option value ="住院医师">住院医师</option>
			          <option value ="主治医师">主治医师</option>
			          <option value="副主任医师">副主任医师</option>
			          <option value="主任医师">主任医师</option>
			          <option value="主任医师">实习医生</option>
			          <option value="主任医师">基层医生</option>
			      </select>
			</li>
			<li>
				<span class="fl">擅长:</span>
				<input type="text" class="fl"  name="expert_skill" id="expert_skill">
			</li>
			<li style="height:auto;">
				<i>*</i>
				<span>执业医生资格证号:</span><br>
				<input type="text" name="expert_code" id="expert_code" >
			</li>
			<li>
				<i>*</i>
				<span class="fl">联系电话:</span>
				<input type="text" class="fl" id="link_mobile" name="link_mobile" maxlength="11">
			</li>
		</ul>
		<div class="doc-pic">
			<p>医生照片</p>
			<div class="upload">
				<label for="pic"></label>
				<input type="file" id="pic" onchange="press_img(this,'#doc_img','#pre_pic','#press_status');">
				<img src="" id="pre_pic" width="200" name="img"><div id="press_status"></div>
				<textarea name="doc_img" id="doc_img" style="display:none"></textarea>
			</div>
		</div>
		<div class="doc-pic">
			<p>医师执业证书</p>
			<div class="upload">
				<label for="zhengshu"></label>
				<input type="file" id="zhengshu" onchange="press_img(this,'#ys_img','#ys_pic','#ys_status');">
				<img src="" id="ys_pic" width="200"><div id="ys_status"></div>
				<textarea name="ys_img" id="ys_img" style="display:none"></textarea>
			</div>
		</div>
		<div class="doc-pic">
			<p>工作证</p>
			<div class="upload">
				<label for="zheng"></label>
				<input type="file" id="zheng" onchange="press_img(this,'#gz_img','#gz_pic','#gz_status');">
				<img src="" id="gz_pic" width="200"><div id="gz_status"></div>
				<textarea name="gz_img" id="gz_img" style="display:none"></textarea>
			</div>
		</div>
		<div class="doc-pic">
			<p>医生签名</p>
			<div class="upload">
				<label for="qianming"></label>
				<input type="file" id="qianming" onchange="press_img(this,'#qm_img','#qm_pic','#qm_status');">
				<img src="" id="qm_pic" width="200"><div id="qm_status"></div>
				<textarea name="qm_img" id="qm_img" style="display:none"></textarea>
			</div>
		</div>
		<ul class="btn clear">
			<!-- <li class="baocun fl"><a href="javascript:;" class="fl">保存草稿</a></li> -->
			<li class="sub fr"><input type="submit" value="提交" id="tijiao"></li>
		</ul>
	</form>

	<script type="text/javascript" src="/weixin/Public/Common/js/jquery.min.js"></script> 
    <script type="text/javascript" src="/weixin/Public/Common/js/date/date.js" ></script> 
    <script type="text/javascript" src="/weixin/Public/Common/js/date/iscroll.js"></script> 


<script type="text/javascript" src="/weixin/Public/Expert/js/mobileFix.mini.js?v=8d13c59"></script>

<script src="/weixin/Public/Expert/js/exif.js?v=c65d9ea" type="text/javascript"></script>

<script src="/weixin/Public/Expert/js/lrz.min.js?v=b542f0a" type="text/javascript"></script>



	<script type="text/javascript">

    $(function(){
                $('#beginTime').date();
                $('#endTime').date({theme:"datetime"});
            });

	function sub()

	{

		var sendBox = $("#v_content").val();

		if(sendBox=="")

		{

			alert("请输入内容！");

			return false;

		}

	}



	function press_img(input_file, imgbase64, pre_pic, press_status)

	{

		lrz(input_file.files[0], {

			width:200,

			before: function() {

				document.querySelector(press_status).innerHTML="压缩处理开始，请稍后...";

			},

			fail: function(err) {

				document.querySelector(press_status).innerHTML=err;

			},

			always: function() {

				document.querySelector(press_status).innerHTML="";

			},

			done: function (results) {



			document.querySelector(imgbase64).innerHTML=results.base64;//返回base64字符串，放置到textarea区域

			document.querySelector(pre_pic).src=results.base64;//展示预览图片

            $(pre_pic).siblings("label").css("background-image",'none');

		}

	});

	}


	    function ajaxcheck(){

                var expert_name = $.trim($('#expert_name').val());
                var beginTime = $.trim($('#beginTime').val());
                var hos_name = $.trim($('#hos_name').val());
                var hos_keshi = $.trim($('#hos_keshi').val());
                var expert_role = $.trim($('#expert_role').val());
                var expert_code = $.trim($('#expert_code').val());
                var link_mobile = $.trim($('#link_mobile').val());
                if(expert_name=='')
                {
                    alert('姓名不能为空！');
                    document.getElementById("expert_name").focus(); 
                    return false;
                }

                if(beginTime=='')
                {
                    alert('出生年月不能为空！');
                    document.getElementById("beginTime").focus(); 
                    return false;
                }
                if(hos_name=='')
                {
                    alert('机构名称不能为空！');
                    document.getElementById("hos_name").focus(); 
                    return false;
                }
                if(hos_keshi=='')
                {
                    alert('所属科室不能为空！');
                    document.getElementById("hos_keshi").focus(); 
                    return false;
                }
                if(expert_role=='')
                {
                    alert('职务职称不能为空！');
                    document.getElementById("expert_role").focus(); 
                    return false;
                }
                
                if(expert_code=='')
                {
                    alert('执业医生资格证号不能为空！');
                    document.getElementById("expert_code").focus(); 
                    return false;
                }
                
                if($("#expert_code").val().length >27)
		        {
		           	alert('从业资格证编码长度小于27');
           			return false;
		        }
		        
                if (!isPhone(link_mobile))
                {
                    alert("您的电话格式不正确！" );
                    document.getElementById("link_mobile").focus();
                    return false;
                }
           
            }

            function isMail (ssn) //检查邮箱是否匹配正则表达式
            {
                var re=/^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+((\.[0-9a-zA-Z_-]{2,3}){1,2})$/i;
                if(re.test(ssn))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

            function isPhone (ssn) //检查手机是否匹配正则表达式
            {

                var re=/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/i;
                if(re.test(ssn))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }




	</script>
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260047007).'" width="0" height="0"/>';?></div>
</body> 
</html>