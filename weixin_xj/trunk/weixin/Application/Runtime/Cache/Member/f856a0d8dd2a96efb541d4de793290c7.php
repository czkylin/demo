<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-mobile">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="cache-control" content="public">
    <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png">
    <!--CSS库文件-->
    <link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet">
    <link href="/weixin/Public/Common/css/commonFooter/footer_v2.min.css" type="text/css" rel="stylesheet" />
    <!--CSS当前页面文件-->
    <link href="/weixin/Public/Member/css/user/user_info.css?time=<?php echo ($csstime); ?>.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="/weixin/Public/Member/css/baozhang/qscui.css">
    <link rel="stylesheet" href="/weixin/Public/Member/css/baozhang/insurance.min.css">
    <style>
      .content.bottom.mod-guarantee .tab .tab1{border-bottom: 1px solid #cccccc;}
      .content.bottom.mod-guarantee .tab .tab2{border-bottom: 2px solid #ef4a65; color: #ef4a65;}
    </style>
    <script src="/weixin/Public/Member/js/jquery.min.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth / 3 + 'px';
        wx.config({
            debug: false
            , appId: '<?php echo $appId;?>'
            , timestamp: '<?php echo $timestamp;?>', // 必填，生成签名的时间戳
            nonceStr: '<?php echo $NonceStr;?>', // 必填，生成签名的随机串
            signature: '<?php echo $signature;?>', // 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
    </script>
    <title>百倍爱脑卡</title>
</head>

<body>
    <!--<div class="user-title">
        <a href="<?php echo U('Member/User/info_detail');?>" class="clearfix">
            <?php if($member_pic == ''): if($member_sex == '女' ): ?><img src="/weixin/Public/Expert/images/fenXiang/dfgirl.png" alt="">
                <?php else: ?>
                    <img src="/weixin/Public/Expert/images/fenXiang/dfboy.png" alt=""><?php endif; ?>
            <?php else: ?>
             <img src="<?php echo ($member_pic); ?>" /><?php endif; ?>
            <div class="des">
                <p><?php echo ($name); ?></p>
                <p><?php echo ($member_sex); ?> <?php echo ($phone); ?></p>
            </div>
        </a>
    </div>-->
    <div class="content bottom mod-guarantee" style=" padding-bottom:0;">
        <div class="tab">
          <a href="<?php echo U('Member/Huzhu/ka_list');?>"><div class="tab1">百倍爱心卡</div></a>
          <a href="<?php echo U('Member/Huzhu/ka_list2');?>"><div class="tab2">百倍爱脑卡</div></a>
        </div>
        <div class="guarantee-header"> <img src="/weixin/Public/Member/images/baozhang/top_ban2.png"> </div>
        <div class="guarantee-statis clearfix ">
            <div class="item item1 ">
                <div class="main">
                    <h5>总资金</h5>
                    <p style=" line-height:50px;"><span class="join-money"><?php echo ($bx_list['all_money']); ?></span>元</p> <small>今日↑<span><?php echo ($bx_list['day_all_money']); ?></span>元</small> </div>
            </div>
            <div class="item item2 ">
                <div class="main">
                    <h5>已加入会员</h5>
                    <p style=" line-height:50px;"><span class="join-number"><?php echo ($bx_list['hy_num']); ?></span>人</p> <small>今日↑<span><?php echo ($bx_list['day_hy_num']); ?></span>人</small> </div>
            </div>
            <div class="item item3">
                <div class="main">
                    <h5>我已参与</h5>
                    <p style=" line-height:50px;"><span class="average_money"><?php echo ($bx_list['consume_money']); ?></span>人</p> <small></small> </div>
            </div>
        </div>
    </div>
    <div class="info1">
        <a href="<?php echo U('Member/Huzhu/jiaruxingdong2');?>"> <span><img src="/weixin/Public/Member/images/gerenzhongxin/hz.png"></span> <b>我的百倍爱脑卡</b> <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.jpg"></i> </a>
       <!--  <a href="<?php echo U('Member/User/expand');?>"> <span><img src="/weixin/Public/Member/images/gerenzhongxin/hz.png"></span> <b>我是代言人</b> <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.jpg"></i> </a> -->
    </div>
    <div class="info2" style=" margin:0; padding:0; background:#fff; border:0;">
        <ul id="hos-list">
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/ainaoka',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'栏目菜单百倍爱脑卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/ainaoka/an_share.jpg" alt='
                        百倍爱脑卡—让脑血管患者病有所依'> </div>
                        <h2>百倍爱脑卡—让脑血管患者病有所依 </h2>
                        <p>脑部疾病不用愁，百倍爱脑能解忧，三大基金送保障，全面守护脑健康。</p>
                    </div>
                </a>
            </li>
        </ul>
        <br> </div>
    <div style="display: none;" id="member_vip"><?php echo ($member_vip); ?></div>
    <!--通底的引用结束-->
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
    <div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?> </div>
</body>

</html>