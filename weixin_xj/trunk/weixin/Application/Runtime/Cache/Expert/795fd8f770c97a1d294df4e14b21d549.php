<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">

<!--CSS库文件-->

<!--CSS当前页面文件-->
<link rel="stylesheet" href="/weixin/Public/Member/css/photoswipe.css">
<link rel="stylesheet" href="/weixin/Public/Member/css/default-skin.css">
<link rel="stylesheet" href="/weixin/Public/Expert/css/consult/consult_details.css">
<link href="/weixin/Public/Expert/css/zhuanjiagongzuoshi/zhuanjiagongzuoshi3.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Member/css/zhuanjia.min.css" type="text/css" rel="stylesheet"/>
<title>医生咨询</title>
<style type="text/css">
    .endzx { width: 30px; height: 30px; font-size: 12px; color: #fff; background-color: #ff647c; border-radius: 30px; position: fixed; bottom: 65px; right: 10px; text-align: center; padding: 10px; }
    .pingjialist { width: 84%; display: block; border: 1px solid #ccc; padding: 10px 3%; position: fixed; bottom: 120px; left: 5%; background-color: #fff; box-shadow: 0 0 10px 5px rgba(0,0,0,0.1); display: none; }
    .pingjialist p { height: 50px; font-size: 20px; text-align: center; line-height: 50px; color: #333; border-bottom: 1px dashed #333; margin-bottom: 10px; }
    .pingjialist ul { height: 30px; margin-bottom: 10px; }
    .pingjialist ul li { height: 30px; width: 30%; float: left; line-height: 30px; font-size: 14px; color: #333; margin: 0 2px; text-align: center; border: 1px solid #e7e7e7; }
    .pingjialist ul li.active { color: #ff647c; border: 1px solid #ff647c; }
    .pingjialist ul li input { display: none; }
    .pingjialist textarea { border: 1px solid #999; font-size: 12px; color: #333; line-height: 20px; text-indent: 1em; margin-bottom: 10px; }
    .pingjialist .sub { width: 70%; display: block; height: 30px; line-height: 30px; text-align: center; background-color: #ff647c; color: #fff; border: none; margin: 0 auto 10px; border-radius: 6px; }
    .liaotian{ position: relative;}
    .msg-doctor .piece_lstw3 p{ color: #fff;  }
    .liaotian .textC p{ margin: 0;margin:5px 0; }
    .liaotian .textC p img{ width: auto; max-width: 100%; margin: 0; }
    .online{height: 40px; line-height: 40px; font-size: 16px; background: #fff; text-align: center;}
    .online strong{font-weight: normal; color: #333333;}
    .online i{display: inline-block; width: 10px; height: 10px; background: #00cc66; margin: 0 5px;}
    .online span{color: #333333;}
    .gbn{padding: 0 5px;}
    .input-controller{box-sizing:border-box; -webkit-box-sizing:border-box;}
    .input-controller .text-input{box-sizing:border-box; -webkit-box-sizing:border-box; width: 70%;}
    .img-scale{ display: none; text-align: center; position: absolute; width: 100%; height: 100%; left: 0; top: 0; background: rgba(0,0,0,0.8);}
    .img-scale span{position: fixed; right: 15px; top: 15px; width: 10px; height: 10px; color: #fff; font-size: 18px; }
    .img-scale img{ width: 80%; position: fixed; left: 10%; top: 10%;}
    .msg-doctor{width: auto;}
    .input-controller .upload-btn{margin: 0 10px; background-position:center 10px;  padding-bottom: 5px;}
    .input-controller .upload-btn span{ position: absolute;left: 0;bottom: 0;width: 100%;text-align: center;color: #798ead;font-size: 12px;}
    .input-controller .text-input{background: #fff; color: #333;}
    .input-controller{z-index: 1001;}
    .img-scale span{position: fixed;left: 10%;top: 15px;width: 80%;height: 30px;line-height: 30px;color: #fff;font-size: 18px;color: #fff;text-align: center;background: #ff8400; border-radius: 0;}
    .zixuntop .fatherImg{position: relative;}
    .zixuntop .question-des figure{width:100%;position:relative;height:50px;}
    .zixuntop .question-des a{width:100%;text-align:center;}
</style>
<script>
    
    document.getElementsByTagName('html')[0].style.fontSize=document.documentElement.clientWidth /16 +"px";
</script>
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
            switch (error.code) {
                case error.TIMEOUT:
                    console.log("连接超时，请重试");
                    break;
                case error.PERMISSION_DENIED:
                    console.log("您拒绝了使用位置共享服务，查询已取消");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.log("获取位置信息失败");
                    break;
            }
        }

</script>

<body onLoad="window.scrollTo(0,document.body.scrollHeight);" class="white">
    <div class="zixuncon">
    <div class="zixuntop" style="background: #e7eff7;border-bottom: 1px solid #ccc;padding: 5%;position:fixed;top:0;left:3.2%;width:83.6%;z-index:100;border-bottom-right-radius: 6px;border-bottom-left-radius: 6px;">
        
        <div class="mes clearfix">
            <div class="touxiang">
            <?php if($tdata["MEMBER_PIC"] != '' ): ?><img src="<?php echo ($tdata["MEMBER_PIC"]); ?>" alt="">
            <?php else: ?> 
                <?php if($tdata["MEMBER_SEX"] == '女' ): ?><img src="/weixin/Public/Expert/images/fenXiang/dfgirl.png" alt="">
                <?php else: ?>
                    <img src="/weixin/Public/Expert/images/fenXiang/dfboy.png" alt=""><?php endif; endif; ?>
            </div>
            <div class="des">
                <h3><?php echo ($tdata["MEMBER_NAME"]); ?></h3>
                <p><?php echo ($tdata["MEMBER_SEX"]); ?>  <?php echo ($tdata["MEMBER_AGE"]); ?>岁  <?php echo ($tdata["MEMBER_MOBILE"]); ?></p>
            </div>
            <a href="<?php echo U('Expert/User/dangan',array('member_id'=>$tdata['MEMBER_ID'],'member_mobile'=>$tdata['MEMBER_MOBILE']));?>" style="color:#0099ff;">健康档案 ></a>
        </div>

        <div class="question clearfix">
            <div class="question-title" style="font-size:14px;">Q:</div>
            <div class="question-des">
                <p><?php echo ($tdata["CONSULT_CONTENT"]); ?></p>
                <?php if($tdata["CONSULT_IMG"] != '' ): ?><div class="img-wrap fatherImg" style="text-align:center;height:50px;">
                        <img src="<?php echo ($tdata["CONSULT_IMG"]); ?>" class="piece_lstw3-img"/>
                    </div><?php endif; ?>
                <!-- <a href="<?php echo U('Expert/Member/member_detail',array('member_id'=>$tdata['MEMBER_ID'],'member_mobile'=>$tdata['MEMBER_MOBILE']));?>">以往病例 ></a> -->
            </div>
        </div>

    </div>
          
            
         <!--    <div class="endzx">结束<br>
                    咨询</div>
            <div class="pingjialist">
                    <p>欢迎您对我的服务评价</p>
                    <form >
                            <ul class="pllist" >
                                    <li>
                                            <label for="fcmy">非常满意</label>
                                            <input type="radio" value="1" id="fcmy"/>
                                    </li>
                                    <li class="active">
                                            <label for="my">满意</label>
                                            <input type="radio" value="0" id="my"/>
                                    </li>
                                    <li>
                                            <label for="bmy">不满意</label>
                                            <input type="radio" value="2" id="bmy"/>
                                    </li>
                            </ul>
                            <textarea placeholder="请填入内容" id="desc"></textarea>
                            <input type="button" value="提交" class="sub" onclick="pj_tj()"/>
                            <input type="hidden" name="consult_id" id="con_id" value="<?php echo ($consult_id); ?>"/>
                            <input type="hidden" name="expert_id" id="eid" value="<?php echo ($expert_id); ?>"/>
                    </form>
            </div> -->
    </div>

<a name="bottom"></a>
        <div style="margin-bottom:50px;"></div>
        <form method="post" action="">
        <!-- <form method="post" action="/weixin/index.php?m=Expert&c=Jtys&a=consult_response" onSubmit="return sub()"> -->
                <div class="input-controller J_Input_Ctrl" al-show="(status.code==0|| status.code==1)&amp;&amp; myself &amp;&amp; asknum&gt;0">
                        <div class="item both uploader">
                                <div class="ruko" style="left: 50px;">
                                    <a href="/weixin/index.php?m=Expert&c=Cf&a=cf_add&member_id=<?php echo ($member_id); ?>&consult_id=<?php echo ($consult_id); ?>"><span>处方</span></a>
                                </div>
                                <div class="g-image-upload-box" style="left: 0;">
                                        <div class="J_UploadBtn upload-btn small" style="overflow: hidden;" >
                                                <span>图片</span>
                                                <input type="file" accept="image/*" capture="camera" class="J_FileInput file-input fileupload" name="mypic" id='fileupload' onChange="press_img(this,'#imgbase64','#pre_pic','#press_status');">
                                        </div>
                                </div>
                                <img src="" id="pre_pic" width="200" style="display:none">
                                <div id="press_status"></div>
                                <textarea name="imgbase64" id="imgbase64" style="display:none"></textarea>
                                <div class="desc J_Showmeonfileuploaded" style="display:none">
                                        <h3>上传图片资料</h3>
                                        <p>病症部位，检查报告或者其他病情资料</p>
                                </div>
                        </div>
                        <input type="text" al-keyup="inputText($event)" name="consultContent" id="sendBox" placeholder="请输入内容" al-value="textMsg" class="nofixed text-input" style="margin-left: 40px;width: 55%;">
                        <input type="hidden" id="consult_id" name="consult_id" value="<?php echo ($consult_id); ?>">
                        <input type="hidden" id="member_id" name="member_id" value="<?php echo ($member_id); ?>">
                        <input type="hidden" name="lat" id="lat" />
                        <input type="hidden" name="lng" id="lng"/>
                        <input type="submit" value="发送" id="send" class="gbn gbt-pri"  />
                </div>
        </form>
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
<a href="javascript:void(0);" id="zhidao"></a>

<!--Js库文件--> 

<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
<script src="/weixin/Public/Member/js/jquery.form.min.js " type="text/javascript"></script> 
<script type="text/javascript" src="/weixin/Application/Member/View/js/mobileFix.mini.js?v=8d13c59"></script> 
<script type="text/javascript" src="/weixin/Application/Member/View/js/exif.js?v=c65d9ea"></script> 
<script type="text/javascript" src="/weixin/Application/Member/View/js/lrz.min.js?v=b542f0a"></script> 

<script type="text/javascript" src="/weixin/Public/Expert/js/webim/webim.config.js"></script>
<script type="text/javascript" src="/weixin/Public/Expert/js/webim/strophe-1.2.8.min.js"></script>
<script type="text/javascript" src="/weixin/Public/Expert/js/webim/websdk-1.1.3.js"></script>
<script>
    var oldTime;
    var newTime;
    var conn = new WebIM.connection({
        https: WebIM.config.https,
        url: WebIM.config.xmppURL,
        isAutoLogin: WebIM.config.isAutoLogin,
        isMultiLoginSessions: WebIM.config.isMultiLoginSessions
    }); 

    var from_id = "<?php echo ($expert_info["EXPERT_ID"]); ?>_<?php echo C('YW_ID');?>";
    var to_id = "<?php echo ($member_id); ?>_<?php echo C('YW_ID');?>";
    console.log(from_id);
    console.log(to_id);
    var username = from_id;
    var password = from_id;

    var options = { 
      apiUrl: WebIM.config.apiURL,
      user: username,
      pwd: password,
      appKey: WebIM.config.appkey
    }; 
    conn.open(options);


    var SMALL_PIC = "<?php echo ($expert_info["SMALL_PIC"]); ?>";
    var Consultid = "<?php echo I('consult_id','0');?>";
    var Expertid = "<?php echo ($expert_info["EXPERT_ID"]); ?>";
    var Memberid = "<?php echo ($member_id); ?>";
    if(Consultid!="0"){
        Memberid = "0";
    }



    function iscf(){
        if(localStorage.getItem('iscf')=="hasload"){
            cf_send();
            localStorage.removeItem('iscf');  

             //判断有处方去推送末班消息
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
                    data: {"consult_id":Consultid,"member_id":Memberid,"reply_content":'已开处方，请点击详细进行查看！',"reply_img":''},
                    async : false,
                    error: function (XMLHttpRequest, textStatus, errorThrown) { },
                    success: function (msg){
                        console.log(msg);
                    }
                });
            }
        }
    }


    //添加回调函数
    conn.listen({
      onOpened: function ( message ) {          //连接成功回调
        //如果isAutoLogin设置为false，那么必须手动设置上线，否则无法收消息
        conn.setPresence(); 
        
        
        iscf();      
      },  
      onClosed: function ( message ) {},         //连接关闭回调
      onTextMessage: function ( message ) {     //收到文本消息
        //判断是否当前用户发来的消息
        var t= getNowTime();
        keepmsg('txt'+'**'+'sick'+'**'+t+'**'+message.data+'**'+message.ext.YCUserAvatarUrlKey);
        if(message.ext.Memberid == "<?php echo ($member_id); ?>" && !message.delay){
            console.log(message);
            var text = '<div class="zixunbot"><div class="times" style="color:#333;"> <small  style="font-size:12px;">' + getNowTime() + ' </small> </div> <div class="msg-doctor" style="float:left;"> <div class="liaotian"> <div class="doctor-portait"> <a href="javascript:void(0)"> <img src="' + message.ext.YCUserAvatarUrlKey + '" width="50" height="50"> </a> </div> <div class="piece_lstw2 begin"> <div class="textC"> <p style="color:#333;">' + message.data + '</p> </div> <div class="textC" style="padding:0; margin:0;"> <p style="padding:0; margin:0;">  </p> </div> </div> </div> </div></div>';
            $('.zixuncon').append(text);
            times('.zixunbot:last-child .times');
            $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()});
            $(".zixunbot").eq(0).css("padding-top",$('.zixuntop').height() + 50);
        }
        // $('#info').append(message.from+":"+message.data+"<br>");
      },    
      onEmojiMessage: function ( message ) {},   //收到表情消息
      onPictureMessage: function ( message ) {
        var t= getNowTime();
        keepmsg('pic'+'**'+'sick'+'**'+t+'**'+'kong'+'**'+message.url+'**'+message.ext.YCUserAvatarUrlKey);
        //判断是否当前用户发来的消息
        if(message.ext.Memberid == "<?php echo ($member_id); ?>" && !message.delay){
            console.log(message);
            // $('#info').append(message.from+":<img src=\""+message.url+"\" width='100' /><br>");
            var text = '<div class="zixunbot"><div class="times" style="color:#333;"> <small  style="font-size:12px;">' + getNowTime() + ' </small> </div> <div class="msg-doctor" style="float:left;"> <div class="liaotian"> <div class="doctor-portait"> <a href="javascript:void(0)"> <img src="' + message.ext.YCUserAvatarUrlKey + '" width="50" height="50"> </a> </div> <div class="piece_lstw2 begin"> <div class="textC"> <p style="color:#333;"></p> </div> <div class="textC" style="padding:0; margin:0;"> <p style="padding:0; margin:0;"><div class="fatherImg"><figure itemprop="associatedMedia"><a href="' + message.url + '" data-size="1600x1300"><img src="' + message.url + '" style="padding:0; margin:0; width:100%;border-radius:3px; class="piece_lstw3-img" /></a></figure> </div>  </p> </div> </div> </div> </div></div>';
            $('.zixuncon').append(text);
            $('.zixunbot:last-child .fatherImg a img').get(0).onload = function(){
                $('.zixunbot:last-child .fatherImg a').attr('data-size',this.offsetWidth*10 +'x'+ this.offsetHeight*10)
            }
            times('.zixunbot:last-child .times');
            initPhotoSwipeFromDOM('.fatherImg');
            $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()});
            $(".zixunbot").eq(0).css("padding-top",$('.zixuntop').height() + 50);
        }
      }, //收到图片消息
      onCmdMessage: function ( message ) {},     //收到命令消息
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

    

    var oSend = document.getElementById('send');
    oSend.onclick = function(){
        // console.log($('html,body').scrollTop())
        // $('html,body').animate({scrollTop:$('html,body').scrollTop()-$('.zixunbot').height()})

        //判断图片还是文字消息
        var img_val = $('#fileupload').val();
        var txt_val = $('#sendBox').val();

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
                    data: {"consult_id":Consultid,"member_id":Memberid,"reply_content":txt_val,"reply_img":img_val},
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

    function cf_send(){
        var id_cf = conn.getUniqueId();//生成本地消息id
        var msg_cf = new WebIM.message('txt', id_cf);//创建文本消息

        msg_cf.set({
          msg: "已开处方，请点击详细进行查看！",
          to: to_id,
          action : 'action', //用户自定义
          ext :{"YCConversationType":"0","YCConsultationid":"0","Consultid":Consultid,"Expertid":Expertid,"Memberid":Memberid,"YCUserAvatarUrlKey":SMALL_PIC,"AlignType":"1"},//用户自扩展的消息内容 YCConsultationid:会诊ID 没有穿0  YCConversationType 0 医患交流 1 医医交流 YCPrescriptionExtKey ： 处方   YCUserAvatarUrlKey ：头像
          success: function ( id_cf,serverMsgId ) {
            var t = getNowTime();
            keepmsg('txt'+'**'+'doctor'+'**'+t+'**'+"处方已开"+'**'+SMALL_PIC);
            //消息发送成功回调 
            console.log(serverMsgId);
            
            var herf = window.location.href.split('&');
            // console.log(herf);
            // console.log(herf.slice(0,3).join('&') + '&' + window.location.href.split('&').slice(4,herf.length).join('&'));
            // window.location.href = herf.slice(0,3).join('&') + '&' + herf.slice(4,herf.length).join('&');

            var text = '<div class="zixunbot"><div class="times"> <small style="font-size:12px;">' + getNowTime() + '</small> </div> <div class="msg-doctor"> <div class="liaotian"> <div class="piece_lstw3 begin oranges" style="padding:10px;"><div class="textC" style="overflow:hidden;"><div class="left"><img src="/weixin/Public/Expert/images/fenXiang/drug.png" class="drug"></div><div class="left"><h2 style="font-size:14px;font-weight:normal;margin-left:6px;line-height:15px;">处方已开</h2><p style="margin:4px 0 4px 6px;">请点击详情进行查看</p></div><a href="/weixin/index.php?m=Expert&amp;c=Cf&amp;a=cf_list" class="join"></a></div><div class="textC" style="padding:0; margin:0;"><p style="padding:0; margin:0;"></p></div></div><div class="huanzhe-portait"> <a href="javascript: void(0)"> <img src="'+SMALL_PIC+'" width="50" height="50"> </a> </div></div></div></div>'
            $('.zixuncon').append(text);
            times('.zixunbot:last-child .times');
            $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()})
            $(".zixunbot").eq(0).css("padding-top",$('.zixuntop').height() + 50);
          }
        });
        conn.send(msg_cf.body);
    }
</script>
<script>
document.getElementById('zhidao').scrollIntoView();

var SMALL_PIC = "<?php echo ($expert_info["SMALL_PIC"]); ?>";
var Consultid = "<?php echo I('consult_id','0');?>";
var Expertid = "<?php echo ($expert_info["EXPERT_ID"]); ?>";
var Memberid = "<?php echo ($member_id); ?>";
readmsg();
if(Consultid!="0"){
    Memberid = "0";
}
function getNowTime(){
   var d = new Date();
    //var nowtime=d.toLocaleString();
    var nowtime=d.toLocaleDateString().split('/').join('-')+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
    return nowtime;
}
function sub()

{

    var sendBox = $("#sendBox").val();

    if(sendBox=="")

    {

        alert("请输入内容！");

        return false;

    }

}



function press_img(input_file, imgbase64, pre_pic, press_status)

{

    lrz(input_file.files[0], 

    {

        width:200,

        before: function()

        {

            document.querySelector(press_status).innerHTML="";

        },

        fail: function(err)

        {

            document.querySelector(press_status).innerHTML=err;

        },

        always: function()

        {

            document.querySelector(press_status).innerHTML="";

        },

        done: function (results)

        {

            

            document.querySelector(imgbase64).innerHTML=results.base64;//返回base64字符串，放置到textarea区域

            document.querySelector(pre_pic).src=results.base64;//展示预览图片

        }

    });

}

//tab
var iNum = 1;
$(".pingjialist li").each(function( index ){
    $(this).click(function(){
        $(".pingjialist li").each(function(){
            $(this).removeClass('active');
        })
        $(this).addClass('active');
        iNum = index;
    })
});

$(".endzx").click(function(){
    $(".pingjialist").show();
})

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
$('.times').each(function(){
    times(this);
});
//评论提交
function pj_tj()
{
      var desc = $("#desc").val();
      var pj_flag = $(".pllist li").eq(iNum).find('input').val();
      var expert_id = $("#eid").val();
      var consult_id = $("#con_id").val();
     // alert(consult_id);false;
     if(pj_flag=="")
      {
            alert("请输入评价服务！");
            return false;
      }
      if(desc=="")
      {
            alert("请输入评价内容内容！");
            return false;
      }
      else
      {
            $.ajax({
            type: "POST",
            url: "/weixin/index.php?m=Expert&c=Jtys&a=pl_ok",
            data: {"desc":desc,"pj_flag":pj_flag,"expert_id":expert_id,"consult_id":consult_id},
            success: function(msg)
            {

                switch (msg) {
                    case '1': //注册成功
                       alert('已经评论过');
                        location.href="/weixin/index.php?m=Expert&c=Jtys&a=consult_details";
                        break;
                        break;
                    case 'ok': //已经注册过
                        location.href="/weixin/index.php?m=Expert&c=Jtys&a=consult_details";
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



/********** 环信集成 start **********/
//创建连接
/*var conn = new WebIM.connection({
    https: WebIM.config.https,
    url: WebIM.config.xmppURL,
    isAutoLogin: WebIM.config.isAutoLogin,
    isMultiLoginSessions: WebIM.config.isMultiLoginSessions
});*/



//登录


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
            ext :{"YCConversationType":"0","YCConsultationid":"0","Consultid":Consultid,"Expertid":Expertid,"Memberid":Memberid,"YCUserAvatarUrlKey":SMALL_PIC,"AlignType":"1"},//用户自扩展的消息内容 YCConsultationid:会诊ID 没有穿0  YCConversationType 0 医患交流 1 医医交流 YCPrescriptionExtKey ： 处方   YCUserAvatarUrlKey ：头像
            onFileUploadError: function ( error ) {
                //图片上传失败
                console.log(error);
            },
            onFileUploadComplete: function ( data ) {
                var t = getNowTime();
              keepmsg('pic'+'**'+'doctor'+'**'+t+'**'+data.uri+'**'+ data.entities[0].uuid +'**'+SMALL_PIC);
              //图片地址：
              console.log(data);
              var text = '<div class="zixunbot"><div class="times"> <small  style="font-size:12px;">' + getNowTime() + '</small> </div> <div class="msg-doctor"> <div class="liaotian"> <div class="piece_lstw3 begin"><div class="textC" style="padding: 0;margin: 0;"> <p style="padding: 0;margin: 0;"> <div class="fatherImg"><figure itemprop="associatedMedia"><a href="' + data.uri + '/' + data.entities[0].uuid + '" data-size="1600x1300"><img src="' + data.uri + '/' + data.entities[0].uuid + '" style="padding: 0;margin: 0;width: 100%;" class="piece_lstw3-img"></a></figure></div>  </p> </div> </div> <div class="huanzhe-portait"> <a href="javascript: void(0)"> <img src="'+SMALL_PIC+'" style="border-radius:3px;"> </a> </div>  </div> </div></div>';
              $('.zixuncon').append(text);

              //图片消息发送成功
                $('.zixunbot:last-child .fatherImg a img').get(0).onload = function(){
                    $('.zixunbot:last-child .fatherImg a').attr('data-size',this.offsetWidth*10 +'x'+ this.offsetHeight*10)
                }
                
                times('.zixunbot:last-child .times');
                initPhotoSwipeFromDOM('.fatherImg');
                $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()})
                $(".zixunbot").eq(0).css("padding-top",$('.zixuntop').height() + 50);
              
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
      ext :{"YCConversationType":"0","YCConsultationid":"0","Consultid":Consultid,"Expertid":Expertid,"Memberid":Memberid,"YCUserAvatarUrlKey":SMALL_PIC,"AlignType":"1"},//用户自扩展的消息内容 YCConsultationid:会诊ID 没有穿0  YCConversationType 0 医患交流 1 医医交流 YCPrescriptionExtKey ： 处方   YCUserAvatarUrlKey ：头像
      success: function ( id_txt,serverMsgId ) {
        var t = getNowTime();
        keepmsg('txt'+'**'+'doctor'+'**'+t+'**'+sendBox+'**'+SMALL_PIC);
        //消息发送成功回调 
        console.log(serverMsgId);
        var text = '<div class="zixunbot"><div class="times"> <small  style="font-size:12px;">' + getNowTime() + '</small> </div> <div class="msg-doctor"> <div class="liaotian"> <div class="piece_lstw3 begin"> <div class="textC"> <p> ' + sendBox + ' </p> </div> <div class="textC" style="padding: 0;margin: 0;"> <p style="padding: 0;margin: 0;">  </p> </div> </div> <div class="huanzhe-portait"> <a href="javascript: void(0)"> <img src="'+SMALL_PIC+'" width="50" height="50"> </a> </div>  </div> </div></div>';
        $('.zixuncon').append(text);
        times('.zixunbot:last-child .times');
        $('html,body').animate({scrollTop:$(document).height()+$('.zixunbot:last-child').height()})
        $(".zixunbot").eq(0).css("padding-top",$('.zixuntop').height() + 50);
      } 
    });
    conn.send(msg_txt.body);
}

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
function consult_list(){
    $.ajax({
        type: "POST",
        url: "<?php echo U('consult_details_list');?>",
        data: {"consult_id":Consultid},
        async : false,
        success: function(data)
        {
            $('.zixuncon .zixunbot').remove();
            var text='';
            //判断最新一条时间去推送末班消息
            if(data.length==0){
                oldTime = 0;
            }else{
                var timestamp2 = Date.parse(new Date(data[data.length-1].REPLY_DATE));
                oldTime = timestamp2;
                
            }
console.log(data);
            $.each(data, function(i,v){
                text += '<div class="zixunbot">';
                if(v.ALIGN_TYPE==0)
                {
                    text += '<div class="times" style="color:#333;"><small style="font-size:12px;">' + v.REPLY_DATE + '</small></div><div class="msg-doctor" style="float:left;"><div class="liaotian"><div class="doctor-portait"><a href="javascript:void(0)">';

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

                        text += '</a></div><div class="piece_lstw2 begin"><div class="textC"><p style="color:#333;">' + v.REPLY_CONTENT + '</p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';

                        if(v.REPLY_IMG != '' && v.REPLY_IMG)
                        {
                            text += '<div class="fatherImg"><img src="' + v.REPLY_IMG + '" style="padding:0; margin:0; width:100%; border-radius:3px;" class="piece_lstw3-img"/></div>';
                        }
                        text += '</p></div></div></div></div>';
                }
                else
                {
                    text += '<div class="times"><small style="font-size:12px;">' + v.REPLY_DATE + '</small></div><div class="msg-doctor"><div class="liaotian">';

                    if(v.REPLY_CONTENT == '已开处方，请点击详细进行查看！')
                    {
                        text += '<div class="piece_lstw3 begin oranges" style="padding:10px;"><div class="textC" style="overflow:hidden;"><div class="left"><img src="/weixin/Public/Expert/images/fenXiang/drug.png" class="drug"/></div><div class="left"><h2 style="font-size:14px;font-weight:normal;margin-left:6px;line-height:15px;">处方已开</h2><p style="margin:4px 0 4px 6px;">请点击详情进行查看</p></div><a href="/weixin/index.php?m=Expert&c=Cf&a=cf_list" class="join"></a></div><div class="textC" style="padding:0; margin:0;"><p style="padding:0; margin:0;">';

                        if(v.REPLY_IMG != '' && v.REPLY_IMG)
                        {
                            text += '<div class="fatherImg"><img src="' + v.REPLY_IMG + '" style="padding:0; margin:0; width:100%; border-radius:3px;"class="piece_lstw3-img"></div>';
                        }

                        text += '</p></div></div>';

                    }
                    else
                    {
                        text += '<div class="piece_lstw3 begin"><div class="textC"><p>' + v.REPLY_CONTENT + '</p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';

                        if(v.REPLY_IMG != '' && v.REPLY_IMG)
                        {
                            text += '<div class="fatherImg"><img src="' + v.REPLY_IMG + '" style="padding:0; margin:0; width:100%; border-radius:3px;"class="piece_lstw3-img"></div>';
                        }

                        text += '</p></div></div>';
                    }

                    
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

                    text += '</a></div></div></div>';
                }
                text += '</div>';
            });
            $('.zixuncon').append(text);
            //initPhotoSwipeFromDOM('.fatherImg');
            /*$('.times').each(function(){
                times(this);
            });*/
            $(".zixunbot").eq(0).css("padding-top",$('.zixuntop').height() + 50);
            //initPhotoSwipeFromDOM('.fatherImg');
        }
    })
}
function keepmsg(msg=''){
    $.post("<?php echo U('Jtys/keepmsg');?>",{'fromid':from_id,'toid':to_id,'msg':msg},function(){});
}
function readmsg(){
    $.post("<?php echo U('Jtys/readmsg');?>",{'fromid':from_id,'toid':to_id},function(res){
        var text='';
        if(res!='false'){
        $.each(res, function(i,v){
                text += '<div class="zixunbot">';
                if(v[1]=='sick')
                {
                    text += '<div class="times" style="color:#333;"><small style="font-size:12px;">' + v[2] + '</small></div><div class="msg-doctor" style="float:left;"><div class="liaotian"><div class="doctor-portait"><a href="javascript:void(0)">';

                        if(v[0]=='txt' && v[4]=='')
                        {
                            text += '<img src="/weixin/Public/Expert/images/fenXiang/dfboy.png" width="50" height="50">';
                        }
                        else if(v[0]=='pic' && v[5]=='')
                        {
                            text += '<img src="/weixin/Public/Expert/images/fenXiang/dfgirl.png" width="50" height="50">';
                        }
                        else if(v[0]=='pic' && v[5])
                        {
                            text += '<img src="' + v[5] + '" width="50" height="50">';
                        }
                        else if(v[0]=='txt' && v[4])
                        {
                            text += '<img src="' + v[4] + '" width="50" height="50">';
                        }
                        if(v[0]=='txt'){
                            text += '</a></div><div class="piece_lstw2 begin"><div class="textC"><p style="color:#333;">' + v[3] + '</p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                        }else{
                            text += '</a></div><div class="piece_lstw2 begin"><div class="textC"><p style="color:#333;"></p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                        }
                        

                        if(v[0] == 'pic' && v[4])
                        {
                            text += '<div class="fatherImg"><img src="' + v[4] + '" style="padding:0; margin:0; width:100%; border-radius:3px;" class="piece_lstw3-img"/></div>';
                        }
                        text += '</p></div></div></div></div>';
                }
                else
                {
                    text += '<div class="times"><small style="font-size:12px;">' + v[2] + '</small></div><div class="msg-doctor"><div class="liaotian">';
                    if(v[0]=='txt' && v[3]=='处方已开'){
                        text += '<div class="piece_lstw3 begin oranges" style="padding:10px;"><div class="textC" style="overflow:hidden;"><div class="left"><img src="/weixin/Public/Expert/images/fenXiang/drug.png" class="drug"/></div><div class="left"><h2 style="font-size:14px;font-weight:normal;margin-left:6px;line-height:15px;">处方已开</h2><p style="margin:4px 0 4px 6px;">请点击详情进行查看</p></div><a href="/weixin/index.php?m=Expert&c=Cf&a=cf_list" class="join"></a></div><div class="textC" style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                    }else{
                        if(v[0]=='txt'){
                            text += '<div class="piece_lstw3 begin"><div class="textC"><p>' + v[3] + '</p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                        }else{
                            text += '<div class="piece_lstw3 begin"><div class="textC"><p></p></div><div class="textC"style="padding:0; margin:0;"><p style="padding:0; margin:0;">';
                        }
                    }
                    
                    
                    

                        if(v[0] == 'pic' && v[4])
                        {
                            text += '<div class="fatherImg"><img src="' + v[3] +'/'+v[4]+ '" style="padding:0; margin:0; width:100%; border-radius:3px;"class="piece_lstw3-img"></div>';
                        }

                        text += '</p></div></div>';
                    

                    
                    text += '<div class="huanzhe-portait"><a href="javascript:void(0)">';

                    if(v[0]=='txt' && v[4]=='')
                    {
                        text += '<img src="/weixin/Public/Expert/images/yonghu/boy.png" width="50" height="50">';
                    }
                    else if(v[0]=='pic' && v[5]=='')
                    {
                        text += '<img src="/weixin/Public/Expert/images/yonghu/girl.png" width="50" height="50">';
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
                text += '</div>';
            });
            $('.zixuncon').append(text);
            $('.times').each(function(){
                times(this);
            });
        }
    });
}
</script>
<script src="/weixin/Public/Member/js/photoswipe.min.js"></script>
<script src="/weixin/Public/Member/js/photoswipe-ui-default.min.js"></script>
<script src="/weixin/Public/Member/js/photo2.js"></script> 
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
<div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?>
</div>
</body>
</html>