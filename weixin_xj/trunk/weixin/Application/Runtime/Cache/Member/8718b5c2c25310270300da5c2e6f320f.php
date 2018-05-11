<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta name="share-title" content="">
<!--CSS库文件-->
<link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css">
<link rel="stylesheet" href="/weixin/Public/Member/css/h5_bbaxktc.css">
<link rel="stylesheet" href="/weixin/Public/Member/css/buy.css">
<title>百元投入 倾情援助</title>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="/weixin/Public/Common/js/jquery.min.js"></script>
<script>
document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12 + 'px';
</script>
<script>

    function set_log(act){
    var type = "<?php echo ($type); ?>"+"_aid";
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
    wx.config({
        debug: false,
        appId: '<?php echo $appId;?>',
        timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
        nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
        signature: '<?php echo $signature;?>',// 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    var wx_share_title = '百元投入 倾情援助';
    var wx_share_desc = '百倍爱心卡首例手术援助患者术后回访实录';
    var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/aid/200.jpg";

    wx.ready(function() {
        wx.onMenuShareTimeline({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=aid&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
            imgUrl: wx_share_imgUrl,
            success: function() {
                 set_log('朋友圈');
            },
            cancel: function() {}
        });
        wx.onMenuShareAppMessage({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=aid&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
            imgUrl: wx_share_imgUrl,
            success: function() {
                set_log('微信');
            },
            cancel: function() {}
        });
    });
</script>

</head>
<body class="ui-mobile-viewport ui-overlay-c" style="padding-bottom: 49px;">
    <div class="ka_box">
        <img src="/weixin/Public/Member/images/aid/img0.jpg" alt=""/>
        <img src="/weixin/Public/Member/images/aid/img1.jpg" alt=""/>
        <img src="/weixin/Public/Member/images/aid/img2.jpg" alt=""/>
        <img src="/weixin/Public/Member/images/aid/img3.jpg" alt=""/>
        <img src="/weixin/Public/Member/images/aid/img4.jpg" alt=""/>
        <?php if($footer != 'hide'): ?><a href="<?php echo U('Member/Huzhu/share_init',array('user_id'=>I('get.user_id','0'),'link_mobile'=>I('get.link_mobile','0'),'user_name'=>I('get.user_name','0'),'path'=>$path));?>"><img src="/weixin/Public/Member/images/aid/img5.jpg" alt="" style="position: fixed; bottom: 0; left:0; z-index: 100;"/></a>
        <?php else: endif; ?>
    </div>
      <!-- CNZZ统计代码 -->
    <div style="height:0px;overflow:hidden;"><script src="https://s13.cnzz.com/z_stat.php?id=1262020855&web_id=1262020855" language="JavaScript"></script></div>
</body>
</html>