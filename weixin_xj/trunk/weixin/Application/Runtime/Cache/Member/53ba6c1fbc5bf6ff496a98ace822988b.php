<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css">
	<link rel="stylesheet" href="/weixin/Public/Member/css/applyHelp.css">
	<title>援助资料提交</title>
	<script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12 + 'px';
  </script>
</head>
<body>
	<article class="art">
	    <section class="bt">
	        <div class="flow">
	            <span>
	                <em class="active">1.资料提交</em>
	                <i><svg t="1504579579772" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2760" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="10"><defs></defs><path d="M774.656 489.57l-479.122-479.157c-13.943-13.907-36.48-13.907-50.422 0-13.943 13.943-13.943 36.515 0 50.458l455.73 455.765-448.205 448.241c-13.551 13.516-13.551 35.446 0 48.961 13.515 13.586 35.446 13.586 48.995 0l465.5-465.464c1.819-1.819 2.71-4.030 4.030-6.133 1.105-0.82 2.461-1.248 3.495-2.282 13.907-13.907 13.907-36.48 0-50.387z" p-id="2761" fill="#ef4866"></path></svg></i>
	            </span>
	            <span>
	                <em>2.邮寄资料</em>
	                <i><svg t="1504579579772" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2760" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="10"><defs></defs><path d="M774.656 489.57l-479.122-479.157c-13.943-13.907-36.48-13.907-50.422 0-13.943 13.943-13.943 36.515 0 50.458l455.73 455.765-448.205 448.241c-13.551 13.516-13.551 35.446 0 48.961 13.515 13.586 35.446 13.586 48.995 0l465.5-465.464c1.819-1.819 2.71-4.030 4.030-6.133 1.105-0.82 2.461-1.248 3.495-2.282 13.907-13.907 13.907-36.48 0-50.387z" p-id="2761" fill="#9a9a9a"></path></svg></i>
	            </span>
	            <span>
	                <em>3.基金会审核</em>
	                <i><svg t="1504579579772" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2760" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="10"><defs></defs><path d="M774.656 489.57l-479.122-479.157c-13.943-13.907-36.48-13.907-50.422 0-13.943 13.943-13.943 36.515 0 50.458l455.73 455.765-448.205 448.241c-13.551 13.516-13.551 35.446 0 48.961 13.515 13.586 35.446 13.586 48.995 0l465.5-465.464c1.819-1.819 2.71-4.030 4.030-6.133 1.105-0.82 2.461-1.248 3.495-2.282 13.907-13.907 13.907-36.48 0-50.387z" p-id="2761" fill="#9a9a9a"></path></svg></i>
	            </span>
	            <span>
	                <em>4.确认收款</em>
	            </span>
	        </div>
	    </section>
	    <section class="section bt">
	        <ul>
	           <li class="box">
	                <span>被援助人姓名:</span>
	                <input type="text" class="text" id="name" value="<?php echo ($bx_info["PERSON_NAME"]); ?>"/>
	           </li>
	           <li class="box">
	               <span>被援助人身份证号:</span>
	               <input type="text" class="text" id="card" value="<?php echo ($bx_info["PERSON_IDCARD"]); ?>"/>
	           </li>
	           <li class="box">
	               <span>会员身份证正面照片:</span>
	               <label for="forward">
	                   <i></i>
	                   <b>选择图片</b>
                       <input type="file" accept="image/*" class="file" id="forward" />
	                   <div class="img"></div>
	               </label>
	           </li>
	           <li class="box">
	               <span>会员身份证反面照片:</span>
	               <label for="back">
	                   <i></i>
	                   <b>选择图片</b>
                       <input type="file" accept="image/*" class="file" id="back" />
	                   <div class="img"></div>
	               </label>
	           </li>
	           <li class="box">
	               <span>会员生活照照片:</span>
	               <label for="life">
	                   <i></i>
	                   <b>选择图片(非必填)</b>
                       <input type="file" accept="image/*" class="file" id="life" />
	                   <div class="img"></div>
	               </label>
	           </li>
	           <li class="box">
	               <span>联系人手机号:</span>
	               <input type="tel" class="phone" id="phone" />
	           </li>
	        </ul>
	    </section>
	    <section class="section">
	        <ul>
                <li class="other"><p>上传医保/新农合/商业保险报销记录</p></li>
	            <li class="box">
	               <span>报销记录:</span>
                   <label for="record">
                       <i></i>
                       <b>选择图片</b>
                       <input type="file" accept="image/*" class="file" id="record" />
                       <div class="img"></div>
                   </label>
	            </li>
                <li class="other"><p>填写并提交《会员援助申请书》</p></li>
	            <li class="box special">
	               <span>会员援助申请书:</span>
                   <label for="book">
                       <i></i>
                       <b>选择图片</b>
                       <input type="file" accept="image/*" class="file" id="book" />
                       <div class="img"></div>
                   </label>
	            </li>
	            <li><small>*《申请书》请与经营人员联系索要填写完整拍照上传</small></li>
	        </ul>
	    </section>
        <input type="hidden" class="text" id="person_id"  value="<?php echo ($person_id); ?>"/>
        <input type="hidden" class="text" id="sale_type" value="<?php echo ($sale_type); ?>"/>
	    <a href="javascript:;" class="go">提交</a>
	</article>
	<div class="cover"><img src="/weixin/Public/Common/images/icon/loading.gif" alt=""><span>正在提交数据，请稍候...</span></div>
</body>
<script src="/weixin/Public/Common/js/jquery.min.js"></script>
<script>
var name = $('#name'),
    card = $('#card'),
    forward = $('#forward'),
    back = $('#back'),
    life = $('#life'),
    phone = $('#phone'),
    record = $('#record'),
    file = $('#file');

//上传图片
$('.file').each(function(){
    var id = $(this).attr('id');
    upFile(id);
});

$('.go').click(function(){
    if($('#name').val().trim() == ''){
        alert('请填写被援助人姓名');
        return;
    }

    if(!isNumber($('#card').val())){
        alert('请填写正确的身份证号');
        return;
    }

    if($('#forward').val() == ''){
        alert('请上传身份证正面照片');
        return;
    }

    if($('#back').val() == ''){
        alert('请上传身份证反面照片');
        return;
    }

    if(!isPhone($('#phone').val())){
        alert('请输入正确的手机号');
        return;
    }

    if($('#record').val() == ''){
        alert('请上传报销记录照片');
        return;
    }

    if($('#book').val() == ''){
        alert('请上传会员援助申请书照片');
        return;
    }
		var top = document.documentElement.scrollTop || document.body.scrollTop;
		$('.cover').css({'display':'block', 'display':'flex','top':top+'px'});
		document.body.style.overflow = 'hidden';
    $.ajax({
        url: "/weixin/index.php?m=Member&c=Huzhu&a=huzhu_info_add",
        type: 'POST',
        data: {
            "person_id": $('#person_id').val().trim(),
            "sale_type": $('#sale_type').val().trim(),
            "forward": $('#forward').next().find('img').attr('src'),
            "back": $('#back').next().find('img').attr('src'),
            "life": $('#life').next().find('img').attr('src'),
            "phone": $('#phone').val().trim(),
            "record": $('#record').next().find('img').attr('src'),
            "book": $('#book').next().find('img').attr('src'),
        },
        success: function(msg){
            if(msg=="ok"){
               window.location.href="/weixin/index.php?m=Member&c=Huzhu&a=jz_status";
            }else{
                alert(data);
            }
        },

    })
})

function upFile(obj){
    var input = document.getElementById(obj);
    var result,div;
    if(typeof FileReader==='undefined'){
        result.innerHTML = "抱歉，你的浏览器不支持 FileReader";
        input.setAttribute('disabled','disabled');
    }else{
        input.addEventListener('change',readFile,false);
    }
    function readFile(){
        for(var i=0;i<this.files.length;i++){
            if (!input['value'].match(/.jpg|.gif|.png|.bmp/i)){　　//判断上传文件格式
                return alert("上传的图片格式不正确，请重新选择")　　　　　　　　　
              }
            var reader = new FileReader();
            reader.readAsDataURL(this.files[i]);
            reader.onload = function(e){
                result = '<br/><img src="'+this.result+'" width="100%" alt=""/>';
                img = input.nextElementSibling;
                img.innerHTML = result;
            }
        }
    }
}

//检查手机是否匹配正则表达式
function isPhone (ssn)
{
    var re=/^(0|86|17951)?(13[0-9]|15[012356789]|17[3678]|18[0-9]|14[57])[0-9]{8}$/i;
    if(re.test(ssn))
    {
        return true;
    }
    else
    {
        return false;
    }
}

 //检验身份证
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
</script>
</html>