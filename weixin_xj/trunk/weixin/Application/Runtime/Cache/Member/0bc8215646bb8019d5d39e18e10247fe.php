<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">

<!--11112222-->

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

<link href="/weixin/Public/Member/css/studioZj.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Member/css/hos_list.min.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Member/css/crop/jquery.Jcrop.css" type="text/css"  rel="stylesheet"/>
<title>上传头像</title>
</head>

<body style=" height:100%; background:#000;">
<div style=" height:88%; text-align:center;"><img src="<?php echo ($user_pic); ?>" id="pre_pic" style="max-width:100%; max-height:100%;">
        <div id="press_status" style=" display:none;"></div>
</div>
<div id="J_QK_zixun" class="gp GJ_Gp gp-quankezixun-zixun">
        <form id="coords" class="coords" action="/weixin/index.php?m=Member&c=User&a=edit_face_ok" method="post">
                <textarea name="imgbase64" id="imgbase64" style="display:none"></textarea>
                <div class="g-image-upload-box tou-img-p">
                        <div class="caijian">
                                <button id="pic_do" style="display:none" type="button" class="image_sc" onclick="crop_img('#pre_pic');">裁剪</button>
                                &nbsp;</div>
                        <div class="J_UploadBtn upload-btn small" style="overflow: hidden;" >
                                <p>选取文件</p>
                                <input type="file" accept="image/*" capture="camera" class="J_FileInput file-input fileupload" name="mypic" id='fileupload' onchange="press_img(this,'#imgbase64','#pre_pic','#press_status');">
                        </div>
                        <div class="shangchuan" >
                                <button id="pic_do2" style="display:none" type="submit" class="image_sc">上传</button>
                                &nbsp;</div>
                </div>
                <input type="hidden" size="4" id="x1" name="x1" />
                <input type="hidden" size="4" id="y1" name="y1" />
                <input type="hidden" size="4" id="rec_width" name="rec_width" />
                <input type="hidden" size="4" id="rec_height" name="rec_height" />
                <input type="hidden" size="4" id="prepic_width" name="prepic_width" />
        </form>
</div>
<script src="/weixin/Application/Member/View/js/crop/jquery-1.5.2.min.js"></script> 
<script src="/weixin/Public/Member/js/crop/jquery.Jcrop.js"></script> 
<script type="text/javascript" src="/weixin/Application/Member/View/js/mobileFix.mini.js?v=8d13c59"></script> 
<script type="text/javascript" src="/weixin/Application/Member/View/js/exif.js?v=c65d9ea"></script> 
<script type="text/javascript" src="/weixin/Application/Member/View/js/lrz.js?v=b542f0a"></script> 
<script type="text/javascript">

var jcrop_api;

function crop_img(pic_id)

{



	if (jcrop_api == null)

	{

	

		jQuery(function($)

		{

			$(pic_id).Jcrop({

			touchSupport: true,

			aspectRatio: 1,

			onChange: showCoords,

			onSelect: showCoords,

			onRelease: clearCoords,

			onDblClick: submitCoords,

			setSelect: [50, 50, 250, 250]

			}, function()

			   {

				   jcrop_api = this;

			   }

			);



		});

	}

	else

	{

		cancel_crop();

	}



}



function showCoords(c)

{

	$('#x1').val(c.x);

	$('#y1').val(c.y);

	$('#rec_width').val(c.w);

	$('#rec_height').val(c.h);

	$('#prepic_width').val($('#pre_pic').width());

};



function clearCoords()

{

	$('#coords input').val('');

};



function submitCoords()

{

	$('#coords').submit();

};



function cancel_crop()

{

	if (jcrop_api != null)

	{

		jcrop_api.destroy();

		jcrop_api = null;

		clearCoords();

	}

};





function press_img(input_file, imgbase64, pre_pic, press_status)

{

	lrz(input_file.files[0], {

		width:600,

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

			

			cancel_crop();



			document.querySelector('#pic_do').style.display="block";

			document.querySelector('#pic_do2').style.display="block";

		}

	});

}

</script> 
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
<div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?>
</div>
</body>
</html>