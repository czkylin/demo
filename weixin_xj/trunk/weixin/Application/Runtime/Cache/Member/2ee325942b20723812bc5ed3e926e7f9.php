<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="cache-control" content="public">
    <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <!--CSS库文件-->
    <link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/weixin/Public/Member/css/photoswipe.css">
    <link rel="stylesheet" href="/weixin/Public/Member/css/default-skin.css">
    <!--CSS当前页面文件-->
    <link href="/weixin/Public/Expert/css/zhuanjiagongzuoshi/zhuanjiagongzuoshi3.css" type="text/css" rel="stylesheet"/>
    <link href="/weixin/Public/Member/css/zhuanjia.min.css?time=.css" type="text/css" rel="stylesheet">
    <title>医生咨询</title>
    <script>
        if (navigator.geolocation) {  
            navigator.geolocation.getCurrentPosition(function(pos) {  
                // 成功回调函数，接受一个地理位置的对象作为参数。  
                // https://developer.mozilla.org/cn/docs/Web/API/Position 参数说明  
                // alert(pos.coords.latitude + '  '+pos.coords.longitude);
                var lat = pos.coords.latitude;
                var lng = pos.coords.longitude;
                $("#lat").val(lat);
                $("#lng").val(lng);
            }, function(err) {  
                // 错误的回调  
                // https://developer.mozilla.org/cn/docs/Web/API/PositionError 错误参数  
                // console.log(err.code);
                console.log(err);
            }, {  
                enableHighAccuracy: true, // 是否获取高精度结果  
                timeout: 30000, //超时,毫秒  
                maximumAge: 20000 //可以接受多少毫秒的缓存位置  
                // 详细说明 https://developer.mozilla.org/cn/docs/Web/API/PositionOptions  
            });  
        } else {  
            console.log('抱歉！您的浏览器无法使用地位功能');  
        }
    </script>
</head>
<!-- background-color:#d0d6e0; -->

<body onLoad="window.scrollTo(0,document.body.scrollHeight);" class="white">
<?php if($consult_id != '0' ): ?><div class="danzi" style="display: none;">
                <div class="times only"><small><?php echo ($tdata["CREATE_DATE"]); ?></small></div>
                <div class="msg-doctor">
                    <div class="liaotian">
                        <!-- 患者区域 start -->
                        <div class="piece_lstw2 pos">
                            <div class="textC">
                                <p>
                                <?php echo ($tdata["CONSULT_CONTENT"]); ?>
                                <?php if($tdata['CONSULT_IMG'] != '' ): ?><div class="fatherImg"><img src="<?php echo ($tdata["CONSULT_IMG"]); ?>" class="dialogImg" style="border-radius:3px;" ></div><?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="huanzhe-portait">
                            <a href="/weixin/index.php?m=Member&c=User&a=info_detail"> 
                           <!--  <?php echo ($member_pic); echo ($tdata["MEMBER_SEX"]); ?> -->
                            <?php if($member_pic == '' and $tdata['MEMBER_SEX'] == '女'): ?><img src="/weixin/Public/Expert/images/fenXiang/dfgirl.png" alt="">
                            <else if condition="$member_pic eq '' and $tdata['MEMBER_SEX'] eq '男'">
                                <img src="/weixin/Public/Expert/images/fenXiang/dfboy.png" alt="">
                            <?php else: ?>
                                <img src="<?php echo ($member_pic); ?>" /><?php endif; ?>
                            </a>
                        </div>
                        <!-- 患者区域 end -->
                    </div>
                </div>
            </div><?php endif; ?>
    <div class="zixuncon" id="consult-details">

        <!--<div class="zixuntop">
                <h3> 潘** <i> 女 </i> <span>
                        31                        </span><b></b> </h3>
                <p>问题：test </p>
                        </div>-->
        

    <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["ALIGN_TYPE"] == 1): ?><div class="zixunbot">
        <h4 class="times"><small style="margin:0;"><?php echo ($v["REPLY_DATE"]); ?></small></h4>
            <!--<div class="date">2016-10-28 13:53:53</div>-->
            <div class="msg-doctor left">
                <div class="liaotian">
                    <div class="doctor-portait">
                        <a href="javascript:void(0)">
                            <?php if(($v['MEMBER_SEX'] == '女') && ($v['USER_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?><img src="/weixin/Public/Expert/images/yonghu/girl.png" />
                            <?php elseif(($v['MEMBER_SEX'] == '男') && ($v['USER_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?>
                                <img src="/weixin/Public/Expert/images/yonghu/boy.png" />
                            <?php else: ?>
                                <img src="<?php echo ($v["USER_PIC"]); ?>" alt=""><?php endif; ?>
                       </a>
                    </div>
            <?php if($v['REPLY_CONTENT'] != '已开处方，请点击详细进行查看！'): ?><div class="piece_lstw3 pos">
                        <div class="textC">
                            
                            <!-- <h4 class="times"> <?php echo ($v["REPLY_USER_NAME"]); ?><small class="right"><?php echo ($v["REPLY_DATE"]); ?></small></h4> -->
                            <p>
                            <?php echo ($v["REPLY_CONTENT"]); ?>
                            
                            </p>
                            <?php if($v['REPLY_IMG'] != '' ): ?><div class="fatherImg"><img src="<?php echo ($v["REPLY_IMG"]); ?>" class="dialogImg" style="border-radius:3px;" >
                            </div><?php endif; ?>
                            
                        </div>
                    </div>
                   
            <?php else: ?>
                <div class="piece_lstw3 pos oranges" style="padding:10px;">
                        <div class="textC" style="overflow:hidden;">
                            <div class="left"><img src="/weixin/Public/Expert/images/fenXiang/drug.png" class="drug" /></div>
                            <div class="left">
                                <h2>处方已开</h2>
                                <p>请点击详情进行查看</p>
                            </div>
                            <a href="/weixin/index.php?m=Member&amp;c=Cf&amp;a=cf_list&amp;" class="join"></a>
                        </div>
                    </div><?php endif; ?>
                    
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="zixunbot">
            <!--<div class="date">2016-10-28 13:54:14</div>-->
            <div class="times"><small><?php echo ($v["REPLY_DATE"]); ?></small></div>
            <div class="msg-doctor">
                <div class="liaotian">
                    <!-- 医生区域 start -->
                    <div class="piece_lstw2 pos">
                        <div class="textC">
                            
                            <p><?php echo ($v["REPLY_CONTENT"]); ?></p>
                            <?php if($v['REPLY_IMG'] != '' ): ?><div class="fatherImg"><img src="<?php echo ($v["REPLY_IMG"]); ?>" class="dialogImg" style="border-radius:3px;" >
                            </div><?php endif; ?>
                            
                        </div>
                    </div>
                    <div class="huanzhe-portait">
                        <a href="/weixin/index.php?m=Member&c=User&a=info_detail">
                        <img src="<?php echo ($member_pic); ?>" />
                        </a>
                    </div>
                    <!-- 医生区域 end -->
                </div>
            </div>
        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
       <!-- 处方
       <div class="piece_lstw2 bgorange">
                        <div class="textC" style="overflow:hidden;">
                            <div class="left"><img src="/weixin/Public/Expert/images/fenXiang/drug.png" class="drug" /></div>
                            <div class="left">
                                <h2>处方已开</h2>
                                <p>请点击详情进行查看</p>
                            </div>
                            <a href="/weixin/index.php?m=Member&amp;c=Cf&amp;a=cf_list&amp;member_id=92&amp;consult_id=41024&amp;expert_id=582982" class="join"></a>
                        </div>
                    </div> -->
        <!--<a name="bottom"></a>
        <div class="zixunbot" style="margin-bottom:50px;"></div>-->
        
        <?php if($is_pj == '是'): else: ?>
       <!--  <div class="endzx"><span>我要</span><span>评价</span></div> --><?php endif; ?>
        <!-- <div class="pingjialist">
            <p>欢迎您对我的服务评价</p>
            <form>
                <ul class="pllist">
                    <li>
                        <label for="fcmy">非常满意</label>
                        <input type="radio" value="1" id="fcmy"> </li>
                    <li class="active">
                        <label for="my">满意</label>
                        <input type="radio" value="0" id="my"> </li>
                    <li>
                        <label for="bmy">不满意</label>
                        <input type="radio" value="2" id="bmy"> </li>
                </ul>
                <textarea placeholder="请填入内容" id="desc"></textarea>
                <input type="button" value="提交" class="sub" onclick="pj_tj()">
                <input type="hidden" name="consult_id" id="con_id" value="<?php echo ($consult_id); ?>">
                <input type="hidden" name="expert_id" id="eid" value="<?php echo ($expert_id); ?>">
            </form>
                <i></i>
        </div> -->
    </div>  
    <?php if($is_pj == '是'): else: ?>
            <form method="post" action="" >
                <div class="input-controller J_Input_Ctrl" al-show="(status.code==0|| status.code==1)&amp;&amp; myself &amp;&amp; asknum>0" style="padding-left:60px;">
                    <div class="item both uploader">
                        <div class="g-image-upload-box" style="left:0;">
                            <div class="J_UploadBtn upload-btn small">
                                <input type="file" accept="image/*" capture="camera" class="J_FileInput file-input fileupload" name="mypic" id="fileupload" onchange="press_img(this,'#imgbase64','#pre_pic','#press_status');"><span>图片</span> </div>
                        </div> <img src="" id="pre_pic" width="200" style="display:none">
                        <div id="press_status"></div>
                        <textarea name="imgbase64" id="imgbase64" style="display:none"></textarea>
                        <div class="desc J_Showmeonfileuploaded" style="display:none">
                            <h3>上传图片资料</h3>
                            <p>病症部位，检查报告或者其他病情资料</p>
                        </div>
                    </div>
                    <input type="text" al-keyup="inputText($event)" name="consultContent" id="sendBox" placeholder="请输入..." al-value="textMsg" class="nofixed text-input">
                    <input type="hidden" id="consult_id" name="consult_id" value="<?php echo ($consult_id); ?>">
                    <input type="hidden" id="expert_id" name="expert_id" value="<?php echo ($expert_id); ?>">
                    <input type="hidden" name="lat" id="lat">
                    <input type="hidden" name="lng" id="lng">
                    <input type="submit" value="发送"  id="send" class="gbn gbt-pri"> </div>
            </form><?php endif; ?>
    
    <div class="img-scale"> <span>关闭</span> <img src="" alt=""> </div>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe. 
                         It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)">关闭</button>
                    <!--<div class="img-scale" style="display:block;">
                            <span>关闭</span>
                        </div>-->
                    <!--<button class="pswp__button pswp__button--share" title="Share"></button>-->
                    <!--<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>-->
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="zhidao">&nbsp;</div>
    <!--Js库文件 -->
    <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
    <script src="/weixin/Public/Member/js/jquery.form.min.js " type="text/javascript"></script>
    <script type="text/javascript" src="/weixin/Application/Member/View/js/mobileFix.mini.js?v=8d13c59"></script>
    <script type="text/javascript" src="/weixin/Application/Member/View/js/exif.js?v=c65d9ea"></script>
    <script type="text/javascript" src="/weixin/Application/Member/View/js/lrz.min.js?v=b542f0a"></script>

    <script type="text/javascript" src="/weixin/Public/Expert/js/webim/webim.config.js"></script>
<script type="text/javascript" src="/weixin/Public/Expert/js/webim/strophe-1.2.8.min.js"></script>
<script type="text/javascript" src="/weixin/Public/Expert/js/webim/websdk-1.1.3.js"></script>
    <script>
        document.getElementById('zhidao').scrollIntoView();
        var SMALL_PIC = "<?php echo ($member_pic); ?>";
        var Consultid = "<?php echo I('consult_id','0');?>";
        var Expertid = "<?php echo ($expert_id); ?>";
        var Memberid = "<?php echo ($member_id); ?>";
        //consult_list();
        readmsg();
        if(Consultid!="0"){
            Expertid = "0";
        }

        
        function getNowTime(){
           var d = new Date();
            //var nowtime=d.toLocaleString();
            var nowtime=d.toLocaleDateString().split('/').join('-')+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            return nowtime;
        }

        function sub() {
            var sendBox = $("#sendBox").val();
            if (sendBox == "") {
                alert("请输入内容！");
                return false;
            }

            var fz_flag = "<?php echo ($fz_flag); ?>";
            if(fz_flag == "1"){
                alert("您已出院，咨询需收费！");
                var url = "<?php echo U('Member/Consult/consult_pay',array('json'=>$json));?>";
                window,location.href=url;
                return false;
            }
        }

        function press_img(input_file, imgbase64, pre_pic, press_status) {
            lrz(input_file.files[0], {
                width: 200
                , before: function () {
                    document.querySelector(press_status).innerHTML = "";
                }
                , fail: function (err) {
                    document.querySelector(press_status).innerHTML = err;
                }
                , always: function () {
                    document.querySelector(press_status).innerHTML = "";
                }
                , done: function (results) {
                    document.querySelector(imgbase64).innerHTML = results.base64; //返回base64字符串，放置到textarea区域
                    document.querySelector(pre_pic).src = results.base64; //展示预览图片
                }
            });
        }
        //tab
        var iNum = 1;
        $(".pingjialist li").each(function (index) {
            $(this).click(function () {
                $(".pingjialist li").each(function () {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');
                iNum = index;
            })
        });
        $(".endzx").click(function () {
                $(".pingjialist").show();
            })
            //评论提交
        function pj_tj() {
            var desc = $("#desc").val();
            var pj_flag = $(".pllist li").eq(iNum).find('input').val();
            var expert_id = $("#eid").val();
            var consult_id = $("#con_id").val();
            // alert(consult_id);false;
            if (pj_flag == "") {
                alert("请输入评价服务！");
                return false;
            }
            if (desc == "") {
                alert("请输入评价内容内容！");
                return false;
            }
            else {
                $.ajax({
                    type: "POST", 
                    url: "/weixin/index.php?m=Member&c=Consult&a=pl_ok", 
                    data: {
                        "desc": desc,
                        "pj_flag": pj_flag,
                        "expert_id": expert_id,
                        "consult_id": consult_id
                    }, 
                success: function (msg) {
                        switch (msg) {
                        case '1': //注册成功
                            alert('已经评论过');
                            location.href = "/weixin/index.php?m=Member&c=Doc&a=doc_consult&doc_id="+expert_id;
                            break;
                            break;
                        case 'ok': //已经注册过
                            location.href = "/weixin/index.php?m=Member&c=Doc&a=doc_consult&doc_id="+expert_id;
                            break;
                        default: //错误！请直接发送资料到公众号 
                            alert('评论失败');
                            return false;
                            break;
                        }
                    }
                });
            }
        }
        //关闭评价框
        $('.pingjialist i').click(function(){
            $(this).parent().hide();
        });
        
        //图片放大
var arrImg = [];
window.onload = function () {
    var oImg = document.querySelectorAll('.fatherImg');
    for(var i=0;i<oImg.length;i++){
        var jImg = {};
        jImg.src = oImg[i].getElementsByTagName('img')[0].getAttribute('src');
        jImg.w = oImg[i].getElementsByTagName('img')[0].offsetWidth * 10;
        jImg.h = oImg[i].getElementsByTagName('img')[0].offsetHeight * 10;
        arrImg.push(jImg);
    }
    arrImg.forEach(function (value, index) {
        $('.fatherImg').eq(index).html('<figure itemprop="associatedMedia"><a href="' + value.src + '" data-size="' + value.w + 'x' + value.h + '"><img src="' + value.src + '"  class="dialogImg" style="border-radius:3px;"></a></figure>');
    });

    initPhotoSwipeFromDOM('.fatherImg');
    $('html,body').animate({scrollTop:$(document).height()});
}


       //刷新时间
        function times(obj){
            var str = $(obj).find('small').html(),
                y = str.split(':')[0].split(' ')[0],
                h = str.split(':')[0].split(' ')[1],
                m = str.split(':')[1];
            var s1 = new Date(y),
                s2 = new Date();
            var days = s2.getTime() - s1.getTime();
            var time = parseInt(days / (1000 * 60 * 60 * 24));
           // console.log( time );
            if(time == 0){
                $(obj).find('small').html((h>12?((parseInt(h)-12)+':'+m+' PM'):(h+':'+m+' AM')));
            }else if(time == 1){
                $(obj).find('small').html('昨天 '+(h>12?((parseInt(h)-12)+':'+m+' PM'):(h+':'+m+' AM')));
            }else if(time == 2){
                $(obj).find('small').html('前天 '+(h>12?((parseInt(h)-12)+':'+m+' PM'):(h+':'+m+' AM')));
            }else{
                $(obj).find('small').html(y);
            }   
        }
        


/********** 环信集成 start **********/
//创建连接
var conn = new WebIM.connection({
    https: WebIM.config.https,
    url: WebIM.config.xmppURL,
    isAutoLogin: true,
    isMultiLoginSessions: WebIM.config.isMultiLoginSessions
});

//添加回调函数
conn.listen({
  onOpened: function ( message ) {          //连接成功回调
    //如果isAutoLogin设置为false，那么必须手动设置上线，否则无法收消息
    conn.setPresence(); 
    console.log('已经成功');            
  },  
  onClosed: function ( message ) {},         //连接关闭回调
  onTextMessage: function ( message ) {     //收到文本消息
    //判断是否当前用户发来的消息
    if(message.ext.Expertid == "<?php echo ($expert_id); ?>" && !message.delay){
        var t= getNowTime();
        keepmsg('txt'+'**'+'doctor'+'**'+t+'**'+message.data+'**'+message.ext.YCUserAvatarUrlKey);
        var text = '<div class="zixunbot"><div class="times" style="color:#333;"> <small>' + getNowTime() + '</small> </div> <div class="msg-doctor" style="float:left;"> <div class="liaotian"> <div class="doctor-portait"> <a href="javascript:void(0)"> <img src="' + message.ext.YCUserAvatarUrlKey + '" width="50" height="50"> </a> </div>';
            if(message.data != "已开处方，请点击详细进行查看！"){
                text +='<div class="piece_lstw3 pos"><div class="textC"><p>' + message.data + '</p></div></div> ';
            }else{
                text +='<div class="piece_lstw3 pos oranges"style="padding:10px;"><div class="textC"style="overflow:hidden;"><div class="left"><img src="/weixin/Public/Expert/images/fenXiang/drug.png"class="drug"></div><div class="left"><h2 style="color:#fff;">处方已开</h2><p>请点击详情进行查看</p></div><a href="/weixin/index.php?m=Member&c=Cf&a=cf_list"class="join"></a></div></div>';
            }
            text +=' <div class="textC" style="padding:0; margin:0;"> <p style="padding:0; margin:0;">  </p> </div> </div> </div> </div></div>';
        $('.zixuncon').append(text);
        times('.zixunbot:last-child .times');
        $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()})
    }
  },    
  onEmojiMessage: function ( message ) {},   //收到表情消息
  onPictureMessage: function ( message ) {
    //判断是否当前用户发来的消息
    if(message.ext.Expertid == "<?php echo ($expert_id); ?>" && !message.delay){
        var t= getNowTime();
        keepmsg('pic'+'**'+'doctor'+'**'+t+'**'+'kong'+'**'+message.url+'**'+message.ext.YCUserAvatarUrlKey);
        // $('#info').append(message.from+":<img src=\""+message.url+"\" width='100' /><br>");
        var text = '<div class="zixunbot"><div class="times" style="color:#333;"> <small>' + getNowTime() + ' </small> </div> <div class="msg-doctor" style="float:left;"> <div class="liaotian"> <div class="doctor-portait"> <a href="javascript:void(0)"> <img src="' + message.ext.YCUserAvatarUrlKey + '" width="50" height="50"> </a> </div> <div class="piece_lstw3 pos"> <div class="textC"> <p style="color:#333;"></p> </div> <div class="textC" style="padding:0; margin:0;"> <p style="padding:0; margin:0;"><div class="fatherImg"><figure itemprop="associatedMedia"><a href="' + message.url + '" data-size="1600x1300"><img src="' + message.url + '" style="padding:0; margin:0; width:100%; border-radius:3px;" class="piece_lstw3-img" /></a></figure> </div>  </p> </div> </div> </div> </div></div>';
        $('.zixuncon').append(text);
        times('.zixunbot:last-child .times');
        initPhotoSwipeFromDOM('.fatherImg');
         $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()});
    }
  }, //收到图片消息
  onCmdMessage: function ( message ) {
    console.log(message)
  },     //收到命令消息
  onAudioMessage: function ( message ) {},   //收到音频消息
  onLocationMessage: function ( message ) {},//收到位置消息
  onFileMessage: function ( message ) {},    //收到文件消息
  onVideoMessage: function ( message ) {},   //收到视频消息
  onPresence: function ( message ) {},       //收到联系人订阅请求、处理群组、聊天室被踢解散等消息
  onRoster: function ( message ) {},         //处理好友申请
  onInviteMessage: function ( message ) {},  //处理群组邀请
  onOnline: function () {},                  //本机网络连接成功
  onOffline: function () {},                 //本机网络掉线
  onError: function ( message ) {   //失败回调
    console.log('失败');
    console.log(message);
  }           
});

var from_id = "<?php echo ($member_id); ?>_<?php echo C('YW_ID');?>";
var to_id = "<?php echo ($expert_id); ?>_<?php echo C('YW_ID');?>";
var username = from_id;
var password = from_id;

//登录
var options = { 
  apiUrl: WebIM.config.apiURL,
  user: username,
  pwd: password,
  appKey: WebIM.config.appkey
};  

conn.open(options);

var oldTime;
var newTime;
var oSend = document.getElementById('send');
oSend.onclick = function(){
    //判断图片还是文字消息
    var img_val = $('#fileupload').val();
    var txt_val = $('#sendBox').val();

    var fz_flag = "<?php echo ($fz_flag); ?>";
    if(fz_flag == "1"){
        alert("您已出院，咨询需收费！");
        var url = "<?php echo U('Member/Consult/consult_pay',array('json'=>$json));?>";
        window,location.href=url;
        return false;
    }
    
    //判断最新一条时间去推送末班消息
    if(img_val != '' || txt_val != ''){
        newTime = new Date().getTime();
        //如果oldtime为0
        var ret = false;
        if( oldTime == 0 ){
            ret = true;
        }else{
            
            var num = (newTime - oldTime)/1000/60;
            if( num >= 5 ){
               ret = true;
            }
        } 

        oldTime = newTime;
        if(ret){
            console.log("success");
            $.ajax({
                type: "POST", //用POST方式传输
                url: "<?php echo U('Consult/ts');?>", 
                data: {"consult_id":Consultid,"expert_id":Expertid,"reply_content":txt_val,"reply_img":img_val},
                async : false,
                error: function (XMLHttpRequest, textStatus, errorThrown) { },
                success: function (msg){
                    console.log(msg);
                }
            });
        }
    }

    if(img_val != '' && txt_val == ''){
        img_send();
        $('#fileupload').val('');
    }else if(txt_val != '' && img_val == ''){
        txt_send();
        $('#sendBox').val('');
    }else if(txt_val != '' && img_val != ''){
        img_send();
        $('#fileupload').val('');
        txt_send();
        $('#sendBox').val('');
    }else{
        alert("内容不能为空！");
    }
    
    return false;

}

function img_send(){

    var input = document.getElementById('fileupload');//选择图片的input
        
    var id_img = conn.getUniqueId();//生成本地消息id
    var msg_img = new WebIM.message('img', id_img);
    var file = WebIM.utils.getFileUrl(input);
    var allowType = {
      "jpg": true,
      "gif": true,
      "png": true,
      "bmp": true
    };
     
    if ( file.filetype.toLowerCase() in allowType ) {
        msg_img.set({
            apiUrl: WebIM.config.apiURL,
            file: file,
            to: to_id,
            action : 'action', //用户自定义
            ext :{"YCConversationType":"0","YCConsultationid":"0","Consultid":Consultid,"Expertid":Expertid,"Memberid":Memberid,"YCUserAvatarUrlKey":SMALL_PIC,"AlignType":"0"},//用户自扩展的消息内容 YCConsultationid:会诊ID 没有穿0  YCConversationType 0 医患交流 1 医医交流 YCPrescriptionExtKey ： 处方   YCUserAvatarUrlKey ：头像
            onFileUploadError: function ( error ) {
                //图片上传失败
                console.log(error);
            },
            onFileUploadComplete: function ( data ) {
              //图片地址：
              console.log(data);
              var t = getNowTime();
              keepmsg('pic'+'**'+'sick'+'**'+t+'**'+data.uri+'**'+ data.entities[0].uuid +'**'+SMALL_PIC);

              var text = '<div class="zixunbot"><div class="times"> <small>' + getNowTime() + '</small> </div> <div class="msg-doctor"> <div class="liaotian"> <div class="piece_lstw2 pos"> <div class="textC"> <p> </p> </div> <div class="textC" style="padding: 0;margin: 0;"> <p style="padding: 0;margin: 0;"> <div class="fatherImg"><figure itemprop="associatedMedia"><a href="' + data.uri + '/' + data.entities[0].uuid + '" data-size="1600x1300"><img src="' + data.uri + '/' + data.entities[0].uuid + '" style="padding: 0;margin: 0;width: 100%;" class="piece_lstw3-img"></a></figure></div>  </p> </div> </div> <div class="huanzhe-portait"> <a href="javascript: void(0)"> <img src="'+SMALL_PIC+'" style="border-radius:3px;"> </a> </div>  </div> </div></div>';
                $('.zixuncon').append(text);
                //图片消息发送成功
                $('.zixunbot:last-child .fatherImg a img').get(0).onload = function(){
                    $('.zixunbot:last-child .fatherImg a').attr('data-size',this.offsetWidth*10 +'x'+ this.offsetHeight*10)
                }
                times('.zixunbot:last-child .times');
                initPhotoSwipeFromDOM('.fatherImg');
                $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()})
              
              // $('#info').append("551144_2:<img src=\""+data.uri + '/' + data.entities[0].uuid+"\" width='100' /><br>");
            },
            success: function ( id_img, serverMsgId ) {
                
                console.log(serverMsgId);

            },
            flashUpload: WebIM.flashUpload
        });
    }
    conn.send(msg_img.body);
}


function txt_send(){
    var id_txt = conn.getUniqueId();//生成本地消息id
    var msg_txt = new WebIM.message('txt', id_txt);//创建文本消息
    var sendBox = $('#sendBox').val();
    msg_txt.set({
      msg: sendBox,
      to: to_id,
      action : 'action', //用户自定义
      ext :{"YCConversationType":"0","YCConsultationid":"0","Consultid":Consultid,"Expertid":Expertid,"Memberid":Memberid,"YCUserAvatarUrlKey":SMALL_PIC,"AlignType":"0"},//用户自扩展的消息内容 YCConsultationid:会诊ID 没有穿0  YCConversationType 0 医患交流 1 医医交流 YCPrescriptionExtKey ： 处方   YCUserAvatarUrlKey ：头像
      success: function ( id_txt,serverMsgId ) {
        var t = getNowTime();
        keepmsg('txt'+'**'+'sick'+'**'+t+'**'+sendBox+'**'+SMALL_PIC);
        //消息发送成功回调 
        var text = '<div class="zixunbot"><div class="times"> <small>' + getNowTime() + '</small> </div> <div class="msg-doctor"> <div class="liaotian"> <div class="piece_lstw2 pos"> <div class="textC"> <p> ' + sendBox + ' </p> </div> <div class="textC" style="padding: 0;margin: 0;"> <p style="padding: 0;margin: 0;">  </p> </div> </div> <div class="huanzhe-portait"> <a href="javascript: void(0)"> <img src="'+SMALL_PIC+'" width="50" height="50"> </a> </div>  </div> </div></div>';
        $('.zixuncon').append(text);
        times('.zixunbot:last-child .times');
        $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()})

      } 
    });
    conn.send(msg_txt.body);
}
function consult_list(){
    $.ajax({
        type: "POST",
        url: "<?php echo U('consult_details_list');?>",
        data: {"consult_id":Consultid,"expert_id":Expertid},
        async : false,
        success: function(data)
        {
            if(Consultid!="0"){
                $('.zixuncon > .zixunbot').each(function(index){
                    if(index!=0){
                        $(this).remove();
                    }
                })
            }else{
                $('.zixuncon > .zixunbot').remove();
            }

            //判断最新一条时间去推送末班消息
            if(data.length==0){
                oldTime = 0;
            }else{
                var timestamp2 = Date.parse(new Date(data[data.length-1].REPLY_DATE));
                oldTime = timestamp2;
                
            }
            var text='';
            console.log(data);
            $.each(data, function(i,v){
                text += '<div class="zixunbot">';
                if(v.ALIGN_TYPE==0)
                {
                    text += '<div class="times" style="color:#333;"><small style="font-size:12px;">' + v.REPLY_DATE + '</small></div><div class="msg-doctor"><div class="liaotian">';
                    
  
                        text += '<div class="piece_lstw2 pos"><div class="textC"><p style="color:#333;">' + v.REPLY_CONTENT + '</p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';

                        if(v.REPLY_IMG != '' && v.REPLY_IMG)
                        {
                            text += '<div class="fatherImg"><img src="' + v.REPLY_IMG + '" style="padding:0; margin:0; width:100%; border-radius:3px;" class="piece_lstw3-img"/></div>';
                        }

                        text += '</p></div></div>';

                        text += '<div class="huanzhe-portait"><a href="javascript:void(0)">'
                        if(v.MEMBER_SEX=='男' && v.USER_PIC=='')
                        {
                            text += '<img src="/weixin/Public/Expert/images/fenXiang/dfboy.png" width="50" height="50">';
                        }
                        else if(v.MEMBER_SEX=='女' && v.USER_PIC=='')
                        {
                            text += '<img src="/weixin/Public/Expert/images/fenXiang/dfgirl.png" width="50" height="50">';
                        }
                        else
                        {
                            text += '<img src="' + v.USER_PIC + '" width="50" height="50">';
                        }
                        text += '</a></div></div></div>';
                }
                else
                {
                    text += '<div class="times"><small style="font-size:12px;">' + v.REPLY_DATE + '</small></div><div class="msg-doctor left"><div class="liaotian">';

                    text += '<div class="huanzhe-portait"><a href="javascript:void(0)">';

                    if(v.MEMBER_SEX=='男' && v.USER_PIC=='/weixin/Application/Expert/View/images/dtdoctor.png')
                    {
                        text += '<img src="/weixin/Public/Expert/images/yonghu/boy.png" width="50" height="50">';
                    }
                    else if(v.MEMBER_SEX=='女' && v.USER_PIC=='/weixin/Application/Expert/View/images/dtdoctor.png')
                    {
                        text += '<img src="/weixin/Public/Expert/images/yonghu/girl.png" width="50" height="50">';
                    }
                    else
                    {
                        text += '<img src="' + v.USER_PIC + '" width="50" height="50">';
                    }

                    text += '</a></div>';

                    if(v.REPLY_CONTENT == '已开处方，请点击详细进行查看！')
                    {
                        text += '<div class="piece_lstw3 pos oranges" style="padding:10px;"><div class="textC" style="overflow:hidden;"><div class="left"><img src="/weixin/Public/Expert/images/fenXiang/drug.png" class="drug"></div><div class="left"><h2>处方已开</h2><p>请点击详情进行查看</p></div><a href="/weixin/index.php?m=Member&amp;c=Cf&amp;a=cf_list&amp;" class="join"></a></div></div>';

                        if(v.REPLY_IMG != '' && v.REPLY_IMG)
                        {
                            text += '<div class="fatherImg"><img src="' + v.REPLY_IMG + '" style="padding:0; margin:0; width:100%; border-radius:3px;"class="piece_lstw3-img"></div>';
                        }

                        text += '</p></div></div>';

                    }
                    else
                    {
                        text += '<div class="piece_lstw3 pos"><div class="textC"><p>' + v.REPLY_CONTENT + '</p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';

                        if(v.REPLY_IMG != '' && v.REPLY_IMG)
                        {
                            text += '<div class="fatherImg"><img src="' + v.REPLY_IMG + '" style="padding:0; margin:0; width:100%; border-radius:3px;"class="piece_lstw3-img"></div>';
                        }

                        text += '</p></div></div>';
                    }

                    
                    
                }
                text += '</div></div></div>';
            });
            $('.zixuncon').append(text);
        }
    })
}
function keepmsg(msg=''){
    var from_id = "<?php echo ($member_id); ?>_<?php echo C('YW_ID');?>";
    var to_id = "<?php echo ($expert_id); ?>_<?php echo C('YW_ID');?>";
    $.post("<?php echo U('Consult/keepmsg');?>",{'fromid':from_id,'toid':to_id,'msg':msg},function(){});
}
function readmsg(){
    var from_id = "<?php echo ($member_id); ?>_<?php echo C('YW_ID');?>";
    var to_id = "<?php echo ($expert_id); ?>_<?php echo C('YW_ID');?>";
    $.post("<?php echo U('Consult/readmsg');?>",{'fromid':from_id,'toid':to_id},function(res){
        console.log(res);
        var text='';
        if(res!='false')
        {
            $.each(res, function(i,v){
                text += '<div class="zixunbot" tt="'+Date.parse(new Date(v[2]))+'">';
                if(v[1]=='sick')
                {
                    text += '<div class="times" style="color:#333;"><small style="font-size:12px;">' + v[2] + '</small></div><div class="msg-doctor"><div class="liaotian">';
                    
                        if(v[4] != '' && v[4] && v[0]=='pic')
                        {
                        text += '<div class="piece_lstw2 pos"><div class="textC"><p style="color:#333;"></p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                        }else{
                            text += '<div class="piece_lstw2 pos"><div class="textC"><p style="color:#333;">' + v[3] + '</p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                        }
                        if(v[4] != '' && v[4] && v[0]=='pic')
                        {
                            text += '<div class="fatherImg"><img src="' + v[3]+'/'+v[4] + '" style="padding:0; margin:0; width:100%; border-radius:3px;" class="piece_lstw3-img"/></div>';
                        }

                        text += '</p></div></div>';

                        text += '<div class="huanzhe-portait"><a href="javascript:void(0)">'
                        if(v[0]=='pic' && v[5]=='')
                        {
                            text += '<img src="/weixin/Public/Expert/images/fenXiang/dfboy.png" width="50" height="50">';
                        }
                        else if(v[0]=='txt' && v[4]=='')
                        {
                            text += '<img src="/weixin/Public/Expert/images/fenXiang/dfgirl.png" width="50" height="50">';
                        }
                        else if(v[0]=='txt' && v[4])
                        {
                            text += '<img src="' + v[4] + '" width="50" height="50">';
                        }
                        else if(v[0]=='pic' && v[5])
                        {
                            text += '<img src="' + v[5] + '" width="50" height="50">';
                        }
                        text += '</a></div></div></div>';
                }
                else
                {
                    text += '<div class="times"><small style="font-size:12px;">' + v[2] + '</small></div><div class="msg-doctor left"><div class="liaotian">';
                    text += '<div class="huanzhe-portait"><a href="javascript:void(0)">';

                    text += '<img src="/weixin/Public/Expert/images/yonghu/boy.png" width="50" height="50">';
                    text += '</a></div>';
                    if(v[0]=='txt' && v[3]=='已开处方，请点击详细进行查看！'){
                        text += '<div class="piece_lstw3 pos oranges" style="padding:10px;"><div class="textC" style="overflow:hidden;"><div class="left"><img src="/weixin/Public/Expert/images/fenXiang/drug.png" class="drug"></div><div class="left"><h2>处方已开</h2><p>请点击详情进行查看</p></div><a href="/weixin/index.php?m=Member&amp;c=Cf&amp;a=cf_list&amp;" class="join"></a></div></div>';
                    }else{
                       if(v[0]=='txt'){
                            text += '<div class="piece_lstw3 pos"><div class="textC"><p>' + v[3] + '</p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                        }else{
                            text += '<div class="piece_lstw3 pos"><div class="textC"><p></p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                        } 
                    }
                    
                    

                    if(v[4] != '' && v[0]=='pic')
                    {
                        text += '<div class="fatherImg"><img src="' + v[4] + '" style="padding:0; margin:0; width:100%; border-radius:3px;"class="piece_lstw3-img"></div>';
                    }
                    else
                    {
                        text += '<div class="fatherImg"><img src="" style="padding:0; margin:0; width:100%; border-radius:3px;"class="piece_lstw3-img"></div>';
                    }


                    text += '</p></div></div>';
                    

                    
                    
                }
                text += '</div></div></div>';
            });
            $('.zixuncon').append(text);
            
        }
        if($(".danzi").html() != "" && $(".danzi").html() != undefined)
            {
                $('.zixuncon').append('<div class="zixunbot" tt="<?php echo strtotime($tdata['CREATE_DATE']); ?>000">'+$(".danzi").html()+'</div>');
            }
            sortkey();
    });
}
    function sortkey(){
        var arr = new Array();
        var i = 0;
        $('.zixunbot').each(function(){
            arr[i] = $(this).attr('tt');
            i++;
        });
        arr = arr.sort(function(a, b) {
            return a > b ? 1 : -1;
        })
        //console.log(arr);
        var chtml = '';
        for(var i=0;i<arr.length;i++){
            chtml += '<div class="zixunbot">'+$('[tt="'+arr[i]+'"]').html()+'</div>';
        }
        //console.log(chtml);
        $('.zixuncon').html(chtml);
        $('.times').each(function()
        {
            times(this);
        });
    }
    </script>
    <script src="/weixin/Public/Member/js/photoswipe.min.js"></script>
    <script src="/weixin/Public/Member/js/photoswipe-ui-default.min.js"></script>
    <script src="/weixin/Public/Member/js/photo2.js"></script>
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
    <div style="height:0px;overflow:hidden;"> <img src="http://c.cnzz.com/wapstat.php?siteid=1259145768&amp;r=http%3A%2F%2Fweixin-xj-test.yk202.com%2Fweixin%2Findex.php%3Fm%3DMember%26c%3DConsult%26a%3Dconsult_response%26m%3DMember%26c%3DConsult%26a%3Dconsult_details%26consult_id%3D41024&amp;rnd=1785662627" width="0" height="0"> </div>
    <div id="cli_dialog_div"></div>
</body>

</html>