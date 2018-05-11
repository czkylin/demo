<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">

<!--CSS库文件-->

<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >

<!--CSS当前页面文件-->

<link href="/weixin/Public/Member/css/zhuanjia.min.css" type="text/css" rel="stylesheet"/>
<title>我要咨询</title>
</head>
<script>

        var position_option = {
                enableHighAccuracy: true,
                maximumAge: 30000,
                timeout: 20000
            };

        navigator.geolocation.getCurrentPosition(getPositionSuccess, getPositionError, position_option);
        function getPositionSuccess( position ){
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                $("#lat").val(lat);
                $("#lng").val(lng);
        }
        function getPositionError(error) {
            // switch (error.code) {
            //     case error.TIMEOUT:
            //         alert("连接超时，请重试");
            //         break;
            //     case error.PERMISSION_DENIED:
            //         alert("您拒绝了使用位置共享服务");
            //         break;
            //     case error.POSITION_UNAVAILABLE:
            //         alert("获取位置信息失败");
            //         break;
            // }
        }

</script>

<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
<div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?>
</div>
<body>
<div class="consult_add">
        <p class="msgtishi"  id="msg"></p>
</div>
<div id="J_QK_zixun" class="gp GJ_Gp gp-quankezixun-zixun">
        <form method="post" name="consult" action="/weixin/index.php?m=Member&c=Consult&a=consult_add" onsubmit="return sub()">
                <div class="g-list shadow">
                        <div class=" item both content">
                                <textarea placeholder="请详细描述您的病情，症状，治疗经过以及想要获得的帮助"  name="consultContent" id="v_content"></textarea>
                        </div>
                        <div class="item both uploader">
                                <div class="g-image-upload-box">
                                        <div class="J_UploadBtn upload-btn small" style="overflow: hidden;" >
                                                <input type="file" accept="image/*" capture="camera" class="J_FileInput file-input fileupload" name="mypic" id='fileupload' onchange="press_img(this,'#imgbase64','#pre_pic','#press_status');">
                                        </div>
                                </div>
                                <img src="" id="pre_pic" width="200">
                                <div id="press_status"></div>
                                <textarea name="imgbase64" id="imgbase64" style="display:none"></textarea>
                                <div class="desc J_Showmeonfileuploaded">
                                        <h3>上传图片资料</h3>
                                        <p>病症部位，检查报告或者其他病情资料</p>
                                </div>
                        </div>
                </div>
                <?php if($consult_error != '' ): ?><div >提交失败，错误代码：<?php echo ($consult_error); ?></div><?php endif; ?>
                <div class="g-btn-padding fixed">
                        <input type="hidden" value="" name="expertId">
                        <input type="hidden" value="1" class="J_HiddenConsultLimit">
                        <input type="submit" value="提问" class="gbn gbt-pri"  onclick="return sub()"/>
                        
                        <!--<a al-click="submit()" class="gbn gbt-pri" href="javascript:;">提问</a>--> 
                        
                </div>
                <input type="hidden" name="doc_id" value="<?php echo ($doc_id); ?>" />
                <input type="hidden" name="price" value="<?php echo ($price); ?>"/>
                <input type="hidden" name="order_id" value="<?php echo ($order_id); ?>"/>
                <input type="hidden" name="lat" id="lat" />
                <input type="hidden" name="lng" id="lng"/>
        </form>
</div>
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
<script src="/weixin/Public/Member/js/jquery.form.min.js " type="text/javascript"></script> 
<script src="/weixin/Application/Member/View/js/mobileFix.mini.js?v=8d13c59" type="text/javascript"></script> 
<script src="/weixin/Application/Member/View/js/exif.js?v=c65d9ea" type="text/javascript"></script> 
<script src="/weixin/Application/Member/View/js/lrz.min.js?v=b542f0a" type="text/javascript"></script> 
<script type="text/javascript">

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

				document.querySelector(press_status).innerHTML="压缩处理完毕，可以开始上传";

			},

			done: function (results) {



			document.querySelector(imgbase64).innerHTML=results.base64;//返回base64字符串，放置到textarea区域

			document.querySelector(pre_pic).src=results.base64;//展示预览图片

		}

	});

	}



	</script>
</body>
</html>