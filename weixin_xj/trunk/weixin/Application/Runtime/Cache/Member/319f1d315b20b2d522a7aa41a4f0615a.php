<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no" />
    <meta name="description" content="为您和您的家人获取最高10万元大病保障金" />
    <meta name="keywords" content="百倍爱心卡" />
	<title>好友<?php echo base64_decode(I("get.user_name",""));?>喊你一起开始慢病管理啦！！</title>
    <link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css">
    <link rel="stylesheet" href="/weixin/Public/Member/css/100card.css?<?php echo time();?>.css">
    <script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12 + 'px';
    </script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '<?php echo $appId;?>',
            timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
            nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
            signature: '<?php echo $signature;?>',// 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

        var wx_share_title = '好友<?php echo base64_decode(I("get.user_name",""));?>喊你一起开始慢病管理啦！！';
        var wx_share_desc = '慢病管理百元援助项目，我们更懂你的身体。';
        var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/huzhu/share_icon/share.png";

        wx.ready(function() {
            wx.onMenuShareTimeline({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_yf&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('朋友圈');
                },
                cancel: function() {}
            });
            wx.onMenuShareAppMessage({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_yf&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('微信');
                },
                cancel: function() {}
            });
        });

    </script>
</head>
<body>
     <nav id="nav" class="nav clear">
        <span class="fl">最新数据：</span>
        <div class="people fl">
                <ul class="box">
                    <li class="box">
                    <!-- <?php if(is_array($buy_list)): $i = 0; $__LIST__ = $buy_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$buy): $mod = ($i % 2 );++$i;?><em><?php echo (msubstr($buy["PERSON_NAME"],0,1,'utf-8',false)); ?>**&nbsp;<?php echo (substr($buy["PERSON_MOBILE"],0,3)); ?>****<?php echo (substr($buy["PERSON_MOBILE"],-4)); ?></em><?php endforeach; endif; else: echo "" ;endif; ?> -->
                    <em>总资金：<?php echo ($bx_list["all_money"]); ?>元</em>
                    <em>今日增长资金：<?php echo ($bx_list["day_all_money"]); ?>元</em>
                    <em>已加入会员：<?php echo ($bx_list["hy_num"]); ?>人</em>
                    <em>今日增长会员：<?php echo ($bx_list["day_hy_num"]); ?>人</em>
                    </li>
                </ul>
            </div>
    </nav> 
    <section>
        <img src="/weixin/Public/Member/images/100card/fh/wh01.jpg" width="100%" alt="百倍爱心卡" />
        <img src="/weixin/Public/Member/images/100card/fh/wh02.jpg" width="100%" alt="百倍爱心卡" />
        <img src="/weixin/Public/Member/images/100card/fh/wh03.jpg" width="100%" alt="百倍爱心卡" />
        <img src="/weixin/Public/Member/images/100card/fh/wh04.jpg" width="100%" alt="百倍爱心卡" />
        <img src="/weixin/Public/Member/images/100card/fh/wh051.jpg" width="100%" alt="百倍爱心卡" />
        <img src="/weixin/Public/Member/images/100card/fh/wh06.jpg" width="100%" alt="百倍爱心卡" />
        <img src="/weixin/Public/Member/images/100card/fh/wh07.jpg" width="100%" alt="百倍爱心卡" />
    </section>
    <section class="guarantee-faq">
        <div class="item active">
            <header class="active">Q1 什么是百倍爱心卡行动？</header>
            <div class="q-content"> <p>百倍爱心卡行动是一项健康管理服务，加入者只需支付200元即可享受7大服务，除此之外，符合条件的加入者还能获得基金会最高10万元的手术健康援助。</p></div>
        </div>
        <div class="item">
            <header>Q2 什么是观察期?</header>
            <div class="q-content">
                <p>又称等待期或免责期，是为了防止参与行动的会员明知道将发生风险事故，而马上加入以获得利益的行为。</p>
                <img src="/weixin/Public/Member/images/100card/data_table_1.png" width="100%" alt="百倍爱心卡观察期"> 
            </div>
        </div>
        <div class="item">
            <header>Q3 什么情况下可以获得救助？</header>
            <div class="q-content">
                <p>
                1、百倍爱心卡正式会员<br>
                2、通过观察期后在北京远程视界集团合作的基地医院进行的手术<br>
                3、二甲及以上医院确诊是援助行动中所包含的心脏血管相关重大手术<br>
                以上条件均符合的会员即可进行申请援助金，经第三方权威机构核实后符合条件的会员即可获得基金会爱心援助
                </p>
            </div>
        </div>
        <div class="item">
            <header>Q4 什么情况下可以退出援助行动？</header>
            <div class="q-content"> <img src="/weixin/Public/Member/images/100card/data_table_3_v2.png" width="100%" alt="百倍爱心卡"> </div>
        </div>
        <div class="item">
            <header>Q5 不予救助的范围</header>
            <div class="q-content">
                <ol>
                    <li><p>1. 会员主动吸食或注射毒品;</p></li>
                    <li><p>2. 核爆炸、核辐射或核污染;</li>
                    <li><p>3. 会员感染艾滋病病毒或患艾滋病期间因疾病导致的;</p></li>
                    <li><p>4. 遗传性疾病，先天性畸形、变形或染色体异常;</p></li>
                    <li><p>5. 在诊疗过程中发生的医疗事故;</p></li>
                    <li><p>6. 非法行为;</p></li>
                    <li><p>7. 观察期内不予以援助;</p></li>
                    <li><p>8. 猝死;</p></li>
                    <li><p>9. 已身故情况下申请保障。</p></li>
                </ol>
            </div>
        </div>
   
        <div class="item">
            <header>Q6 为什么援助申请被驳回了？</header>
            <div class="q-content">
                <ol>
                    <li><p>未渡过观察期；</p></li>
                    <li><p>未提交完善、真实且符合申请条件的申请材料；</p></li>
                    <li><p>未通过第三方权威调查机构的线下调查；</p></li>
                    <li><p>不符合申请条件。</p></li>
                </ol>
            </div>
        </div>
        <div class="item">
            <header>Q7 申请援助需要准备什么材料？</header>
            <div class="q-content">
                <ol>
                    <li><p>援助会员生活照一张；</p></li>
                    <li><p>援助会员身份证正反面照片各一张；</p></li>
                    <li><p>如申请人不具有完全民事行为能力，需委托他人代为申请，需提交《授权委托书》原件、委托人和受托人的身份证明等相关证明文件；</p></li>
                    <li><p>《援助申请书》；</p></li>
                    <li><p>援助会员的医保、新农合或者商业保险报销记录（非必要）；</p></li>
                    <li><p>二级及以上医院专科医生出具的病历，病理检验报告，血液检查报告及其他科学诊断报告，附有病理学检查结果的临床诊断证明文件；</p></li>
                    <li><p>二级及以上医院专科医生出具的门诊病历；</p></li>
                    <li><p>住院确诊的会员，需提供住院病案资料一套，可通过就诊医院病案室予以调取（包括住院病案首页、入院记录或住院志、出院小结、手术记录、确诊的病理报告、各类检查报告）；</p></li>
                    <li><p>确诊重疾前的最后一次体检报告（非必要）。</p></li>
                </ol>
            </div>
        </div>
        <div class="item">
            <header>Q8 援助申请的流程是什么？</header>
            <div class="q-content">
                <p>第一步 准备申请材料；</p>
                <p>第二步 在线申请或拨打客服电话400-656-2020申请；</p>
                <p>第三步 邮寄（原件）援助材料；</p>
                <p>第四步 平台对申请材料进行初审；</p>
                <p>第五步</p>
                <ol>
                        <li><p>平台初审通过，将纸质资料转交给第三方权威调查机构进行调查；</p></li>
                        <li>
                            <p>调查机构对申请材料进行初步调查，并提交初步调查报告及调查意见表，由平台决定是否继续深度调查；</p>
                            <p>初步调查：指调查人员针对申请人提供的医疗资料进行核实，方法是调查人员走访出具申请人医疗资料的医院等机构，核实此医疗资料真伪并检索病案系统查看既往就诊或住院情况；</p>
                            <p>深度调查：指在初步调查基础上，发现有加入会员前发病的疑点，调查人员实施围绕申请人的生活和工作轨迹附近的医院、社保、单位等机构进行调查，搜集申请人既往就诊资料等工作；</p>
                        </li>
                </ol>
                <p>第六步 通过后进行划款。</p>
            </div>
        </div>
    </section>

    <div style="width: 100%; height: 80px;"></div>
    <?php if($footer != 'hide'): ?><footer id="box">
            <span>￥200</span>
            <a href="http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=wxlogin&user_id=<?php echo I('get.user_id','0');?>&link_mobile=<?php echo I('get.link_mobile','0');?>&sale_type=<?php echo C("sale_type_1");?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=Huzhu&a=share_yf'));?>&user_name=<?php echo I('get.user_name','');?>" class="text-center">立即加入</a>
        </footer>
    <?php else: endif; ?>
</body>
<script src="/weixin/Public/Common/js/jquery.min.js"></script>
<script>
function set_log(act)
    {
        var type = "<?php echo ($type); ?>"+"_share_yf";
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

$('#qus').click(function(){
    $('#mask').show();
});
$('.cancel').click(function(){
    $('#mask').hide();
});
    
var h = $('#nav ul').html();
var w = 0;
$('#nav em').each(function(){
    w += $(this).outerWidth() + 20;
})
$('#nav ul').append(h).width(w);
var iNow = 0;
setInterval(function(){
    $('#nav ul').css({
        'transform': 'translate3d(-'+iNow+'px,0,0)',
        '-webkit-transform': 'translate3d(-'+iNow+'px,0,0)'
    });
    iNow++;
    if(iNow > $('#nav li').width()){
        iNow = 0;
    }
},30);
$('.item header').click(function(){  $(this).toggleClass('active').parent().siblings().find('header').removeClass('active');
    $(this).next().slideToggle().parent().siblings().find('.q-content').slideUp();
})
</script>
<!-- CNZZ统计代码 -->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
<!-- CNZZ统计代码  百倍健康维护单独统计-->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260887013).'" width="0" height="0"/>';?></div>
</html>