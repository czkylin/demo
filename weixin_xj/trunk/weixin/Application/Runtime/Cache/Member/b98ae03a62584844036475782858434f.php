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
        .content.bottom.mod-guarantee .tab .tab1{border-bottom: 2px solid #ef4a65; color: #ef4a65;}
        .content.bottom.mod-guarantee .tab .tab2{border-bottom: 1px solid #cccccc;}
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
    <title>百倍爱心卡</title>
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
        <div class="guarantee-header"> <img src="/weixin/Public/Member/images/baozhang/top_ban.jpg"> </div>
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
        <a href="<?php echo U('Member/Huzhu/jiaruxingdong');?>"> <span><img src="/weixin/Public/Member/images/gerenzhongxin/hz.png"></span> <b>我的百倍爱心卡</b> <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.jpg"></i> </a>
        <a href="<?php echo U('Member/User/expand');?>"> <span><img src="/weixin/Public/Member/images/gerenzhongxin/hz.png"></span> <b>我是代言人</b> <i><img src="/weixin/Public/Member/images/gerenzhongxin/youjiantou.jpg"></i> </a>
    </div>
    <div class="info2" style=" margin:0; padding:0; background:#fff; border:0;">
        <ul id="hos-list">
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/aid_neimeng',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>$path));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/aid_neimeng/share.png" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>有爱就有未来，百倍爱心卡之巴彦淖尔市首例爱心援助 </h2>
                        <p>刚好你需要，正好有我在！百倍爱心卡巴彦淖尔首例援助患者爱心援助！</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/aid',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>$path));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/chuandi.png" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>百倍爱心卡 火热传递中 </h2>
                        <p>百倍爱心卡,火热售卖中</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/blood',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>$path));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/blood.png" alt='百倍爱心高血压健康管理套装带给你健康舒心的呵护!'> </div>
                        <h2>百倍爱心高血压健康管理套装带给你健康舒心的呵护!</h2>
                        <p>为您提供快捷、全面、专业的血压监测及健康运动的咨询、管理服务</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/bbaxk_gwsn',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/icon.jpg" alt='开启高温"桑拿"模式，您想好如何应对三伏天了吗？'> </div>
                        <h2>开启高温"桑拿"模式，您想好如何应对三伏天了吗？ </h2>
                        <p>酷热的天气一言不合就开启高温桑拿模式，处于高温、潮湿、闷热的三伏天，看百倍爱心卡如何帮您应付？</p>
                    </div>
                </a>
            </li>
			<li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/share_zntz',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_zntz/icon.png" alt="百倍爱心-智能手机健康管理套装"> </div>
                        <h2>用智能设备，享智慧健康</h2>
                        <p>享受智能生活，体验健康未来，百倍爱心智能手机健康管理套装，你的健康，随处查看。</p>
                    </div>
                </a>
            </li>
            <!-- <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/father',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/father/icon.jpg" alt="端午大作战，避开炸弹抢粽子了。"> </div>
                        <h2>【父亲节】百倍爱心卡买一送一 “霸”气归来</h2>
                        <p>父亲节百倍爱心卡不仅买一送一，留下父亲电话和想要和父亲说的话，满满的爱意我们来替您传达！</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/duanwujie',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/Lott/images/lott.png" alt="端午大作战，避开炸弹抢粽子了。"> </div>
                        <h2>端午大作战，避开炸弹抢粽子了。</h2>
                        <p>限时20秒，快快抢粽子得分吧，抢得分数越多享受优惠越大哦</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/duanwujie',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/zhuanti/duanwujie/1.png" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>今年端午送父母一个百倍爱心粽——端午大促 买一送一</h2>
                        <p>今年端午，送给父母一份特别的礼物，百倍爱心卡（百倍爱心粽），给父母一份健康的祝福！</p>
                    </div>
                </a>
            </li> -->
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/aid',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/aid/200.jpg" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>百元投入 倾情援助</h2>
                        <p>百倍爱心卡首例手术援助患者术后回访实录</p>
                    </div>
                </a>
            </li>
            <!-- <li style="display:none;">
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/fenxiang',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/zhuanti/christmas/share.jpg" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>百倍爱心卡，爱心送父母</h2>
                        <p>今年圣诞节送给父母最好的礼物，健康贴心的百倍爱心卡。</p>
                    </div>
                </a>
            </li> -->
           <!--  <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/mother',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/mother/icon.jpg" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>妈妈的时光机，满满的全是我</h2>
                        <p>送给妈妈“百倍爱心卡重疾保障”即使不能长期陪伴在妈妈身边，也心安！</p>
                    </div>
                </a>
            </li> -->
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/share_7',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_qi/tu.jpg" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>2000万援助金，只为护住你的心</h2>
                        <p>天呐天呐，2000万援助金到位了？对！“百倍爱心卡”就是这么给力！！你还不知道？你怎么可以还不知道！！</p>
                    </div>
                </a>
            </li>
            <!--<li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/share_6',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/killer.png" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>年关将至少喝酒，来看看我送你的福利！</h2>
                        <p>买酒送礼不如一张“百倍爱心卡”，全民的福音，你绝对不会后悔！</p>
                    </div>
                </a>
            </li>-->
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/share_init',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/baozhang/top_ban.jpg" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>关爱身边人,送您10万健康援助</h2>
                        <p>百倍爱心卡，老年人专属心血管援助。我觉得很适合您，抽空看看呗</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/share_yf',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/share.png" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>好友喊你一起开始慢病管理啦</h2>
                        <p>慢病管理百元援助项目，我们更懂你的身体</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/share_parent',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/parent.png" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>告诉您，百元送父母10万健康援助</h2>
                        <p>感恩回馈，百元爱心援助项目，关爱父母身体健康</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/share_des',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/share_des.png" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>号外号外！！好友喊你快来领取十万援助</h2>
                        <p>给健康100分的呵护，百倍爱心卡健康援助计划。是您保障心血管健康的上上之选</p>
                    </div>
                </a>
            </li>
            <li>
                <a class="yylist_a" href="<?php echo U('Member/Huzhu/share_5',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Member','homeid'=>$openid,'path'=>'栏目菜单百倍爱心卡'));?>">
                    <div class="hezuoHos">
                        <div class="yiyuanpic"> <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/thanks.png" alt="百倍爱心卡 火热传递中"> </div>
                        <h2>好友送您的亲人一份十万援助</h2>
                        <p>老年人健康不可大意！百倍爱心卡，多一份保障，多一份安心</p>
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