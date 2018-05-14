<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css">
    <style>
html, body { height: 100%; }
body { font-size: 14px; color: #333; }
article { height: 90%; background: url(/weixin/Public/Member/images/huzhu/book/border.jpg) no-repeat center center; background-size: 92%; }
section { width: 6rem; margin: 0 auto; padding-top: 2rem; }
.user_pic { width: 60px; height: 60px; border: 1px solid #4994b3; border-radius: 60px; background: #fff; overflow: hidden; margin: 20px auto; }
section p { line-height: 22px; text-indent: 2em; text-align: justify; text-justify: inter-word; }
section p.no { text-indent: 0; }
.con_zi { padding: 0 30px; }
.con_zi p { line-height: 24px; }
.con_zi a { border: 1px solid #ff647c; font-size: 12px; color: #ff647c; text-align: center; padding: 10px 25px; border-radius: 3px; margin: 20px auto; display: block; width: 4rem; margin-bottom: 100px; margin-top: 40px; }
.con_zi a i { background: url(/weixin/Public/Member/images/icon/jiao.jpg) no-repeat; background-size: 10px; width: 13px; height: 9px; display: inline-block; }
footer { position: fixed; bottom: 0; left: 0; width: 100%; }
footer a { width: 100%; color: #fff; line-height: 50px; display: block; font-size: 20px; background: #e76814; text-align: center; }
</style>
    <title>百倍爱心卡会员证书</title>
    <script>
    document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/10 + 'px';
    </script>

    </head>
    <body>
<article id="art">
            <section class="center">
                <div>
                            <h2 class="text-center"><img src="/weixin/Public/Member/images/huzhu/book/font.png" width="70%" /></h2>
                            <p class="no" style="padding-top: 2em;">尊敬的<?php echo ($bx_info["0"]["PERSON_NAME"]); ?>：</p>
                            <br>
                            <p>您于<?php echo (Dtodiy('Y年m月d日',$bx_info["0"]["BUY_DATE"])); ?>购买百倍爱心卡，恭喜您成为第<?php echo ($bx_info["0"]["NUM"]); ?>位会员！</p>
                            <p>感谢您加入百倍爱心卡慢病管理！</p>
                            <br>
                            <p class="text-right">生效日期：<?php echo (Dtodiy('Y年m月d日',$bx_info["0"]["START_DATE"])); ?></p>
                            <p class="text-right">失效日期：<?php echo (Dtodiy('Y年m月d日',$bx_info["0"]["END_DATE"])); ?></p>
                            <p class="no">特颁此证</p>
                            <br>
                            
                            <p class="text-right"><img src="/weixin/Public/Member/images/huzhu/book/banner.png" width="50%" /></p>
                            <p class="text-right" style="text-indent:0;">北京远程视界科技集团荣誉出品</p>
                    </div>
        </section>
    </article>
    <?php if(base64_decode(I('get.user_name','')) == $bx_info[0][PERSON_NAME]): ?><input type="hidden" id="uname" value="自己" />
    <?php else: ?>
        <input type="hidden" id="uname" value="家人<?php echo ($bx_info[0][PERSON_NAME]); ?>" /><?php endif; ?>
    
<div class="con_zi">
            <p>我是<?php echo base64_decode(I("get.user_name",""));?>，我已为<?php if(base64_decode(I('get.user_name','')) == $bx_info[0][PERSON_NAME]): ?>自己<?php else: ?>家人<?php echo ($bx_info[0][PERSON_NAME]); endif; ?>购买百倍爱心卡，我为百倍爱心卡代言！有了百倍爱心卡，做冠心病支架介入手术、心脏搭桥手术、心律失常介入射频消融手术最高援助10万元！更有七大优质服务送给您！只需200元，助您不得心脏病！慢病管理，从“心”开始。大家赶紧加入吧！</p>
            <a href="javascript:void(0);" class="join"><i></i>了解百倍爱心卡详情</a> </div>
<div style="width:100%; height: 1px; "></div>
<footer class="box"> <a href="/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C("SALE_TYPE_1");?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_card'));?>&user_name=<?php echo I('get.user_name','');?>" class="text-center">立即加入</a> </footer>
<script type="text/javascript" src="/weixin/Public/Expert/js/jquery.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        function set_log(act)
        {
            var type = "<?php echo ($type); ?>"+"_share_card";
            var link_mobile = '<?php echo I("get.link_mobile","");?>';
            var openid = "<?php echo ($homeid); ?>";
            var path = "<?php echo ($path); ?>";
            $.ajax(
                    {
                        type: "post",
                        url: "/weixin/index.php?m=Member&c=Index&a=set_log",
                        data: {'type':type,'openid':openid,'link_mobile':link_mobile,'url_path':path,'act':act},
                        dataType: "json",
                        success: function(data)
                        {
                            console.log('set_log:success');
                        }
                });
        }

        $(function(){  
            var uname = $('#uname').val();
            var wx_share_title = '我为'+uname+'购买百倍爱心卡，我为百信爱心卡代言！';
            var wx_share_desc = '我是<?php echo base64_decode(I("get.user_name",""));?>，我为'+uname+'购买一张百倍爱心卡，我为百信爱心卡代言！';
            var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/huzhu/share_icon/member_card.png";
            // console.log(uname);
            wx.config({
                debug: false,
                appId: '<?php echo $appId;?>',
                timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
                nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
                signature: '<?php echo $signature;?>',// 必填，签名，见附录1
                jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
            });


            wx.ready(function() {
                wx.onMenuShareTimeline({
                    title: wx_share_title,
                    desc: wx_share_desc,
                    link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_card&user_id=<?php echo I("get.user_id","0");?>&person_id=<?php echo I("get.person_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                    imgUrl: wx_share_imgUrl,
                    success: function() {
                        set_log('朋友圈');
                    },
                    cancel: function() {}
                });
                wx.onMenuShareAppMessage({
                    title: wx_share_title,
                    desc: wx_share_desc,
                    link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_card&person_id=<?php echo I("get.person_id","0");?>&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                    imgUrl: wx_share_imgUrl,
                    success: function() {
                        set_log('微信');
                    },
                    cancel: function() {}
                });
            });
        }); 
        
        

    </script>
<script>
    $('.join').click(function(){
        var url = "/weixin/index.php?m=Member&c=Huzhu&a=share_init&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&user_name="+encodeURIComponent("<?php echo I('get.user_name','');?>");
        window.location.href = url;
    })
</script>
</body>
</html>