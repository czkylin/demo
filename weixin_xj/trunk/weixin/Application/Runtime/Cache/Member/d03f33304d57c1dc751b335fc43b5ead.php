<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-mobile">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="cache-control" content="public">
    <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <meta name="share-title" content="">
    <link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png">
    <!--CSS库文件-->
    <link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css">
    <link href="/weixin/Public/Common/css/commonFooter/footer_v2.min.css" type="text/css" rel="stylesheet" />
    <!--CSS当前页面文件-->
    <link href="/weixin/Public/Member/css/index/portal.min.css" type="text/css" rel="stylesheet" />
    <link href="/weixin/Public/Member/css/index/weiguanwang.min.css?time=<?php echo ($csstime); ?>.css" type="text/css" rel="stylesheet" />
    <!-- title -->
    <title>心脑血管医联体</title>
    <!--meta-->
    <script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth / 10 + 'px';
    </script>
</head>
<body class="ui-mobile-viewport ui-overlay-c" style="background:rgb(240, 240, 240);">
    <div id="app" class="app clear">
        <div class="tl fl"> <i></i> <span>上客户端享受更多服务</span> </div>
        <div class="tr fr"><a href="http://weixin.yk2020.com/appdown/xj/member/download.aspx">立即享受</a></div>
    </div>
    <div id="gp-experts" class="ui-page ui-body-c ui-page-active" style="min-height: 480px;position:inherit;">
        <div data-role="content" class="ui-content" role="main">
            <!--<div class="head">
                        <ul>
                                <li><a class="curr" href="<?php echo U('Member/Index/index');?>">
                                        <p><img src="/weixin/Application/Member/View/images/weiguanwang/head1.png" width="35px" height="35px"></p>
                                        <p class=" mat_10 font14">官网首页</p>
                                        </a></li>
                                <li><a href="<?php echo U('Member/Hos/hos_list');?>">
                                        <p><img src="/weixin/Application/Member/View/images/weiguanwang/head2.png" width="35px" height="35px"></p>
                                        <p class=" mat_10 font14">快速办理</p>
                                        </a></li>
                                <li><a href="<?php echo U('Member/Index/index_rmwt');?>">
                                        <p><img src="/weixin/Application/Member/View/images/weiguanwang/head3.png" width="35px" height="35px"></p>
                                        <p class=" mat_10 font14">帮助中心</p>
                                        </a></li>
                        </ul>
                </div>-->
            <div class="scroll relative">
                <div class="scroll_box" id="scroll_img">
                    <ul class="scroll_wrap">
                        <!--<li>
                            <a href="<?php echo U('Member/Huzhu/father',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'首页banner'));?>"> <img src="/weixin/Public/Member/images/banner/banner6.jpg" alt="百元投入 倾情援助"> </a>
                        </li>-->
                        <li>
                            <a href="<?php echo U('Member/Huzhu/aid',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'首页banner'));?>"> <img src="/weixin/Public/Member/images/banner/resouce.jpg" alt="百元投入 倾情援助"> </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Member/Huzhu/share_init',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'首页banner'));?>"> <img src="/weixin/Public/Member/images/banner/banner1.jpg" alt="百倍爱心卡"> </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Member/Huzhu/share_1280_1',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'首页banner'));?>"> <img src="/weixin/Public/Member/images/banner/banner2.jpg" alt="穿戴式设备"> </a>
                        </li>
                        <li>
                            <a href="https://weidian.com/item.html?itemID=1927804008"> <img src="/weixin/Public/Member/images/banner/banner3.jpg" alt="VIP心脑护照卡"> </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Member/Huzhu/blood',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'首页banner'));?>">
                                <img src="/weixin/Public/Member/images/banner/banner5.jpg" alt="百倍爱心高血压健康管理套装">
                            </a>
                        </li>
                        <!--<li>
                            <a href="/weixin/index.php?m=Member&c=Doc&a=doc_list"> <img src="/weixin/Public/Member/images/banner/3.jpg" alt="我的医生"> </a>
                        </li>-->
                        <li>
                            <a href="https://weidian.com/item.html?itemID=1965773075"> <img src="/weixin/Public/Member/images/banner/banner4.jpg" alt="家用健康一体机"> </a>
                        </li>
                    </ul>
                </div>
                <ul class="scroll_position" id="scroll_position">
                    <li class="on"><a href="javascript:void(0);">1</a></li>
                    <li><a href="javascript:void(0);">2</a></li>
                    <li><a href="javascript:void(0);">3</a></li>
                    <li><a href="javascript:void(0);">4</a></li>
                    <li><a href="javascript:void(0);">5</a></li>
                    <li><a href="javascript:void(0);">6</a></li>
                    <!--<li><a href="javascript:void(0);">5</a></li>-->
                </ul>
            </div>
            <div class="experts">
                <h2 class="shouyeh2 btb"><i class="ilogo"></i><span>百倍爱心卡热销畅卖中...</span></h2>
                <div class="ind_con2">
                    <div class="left con2_left big">
                        <a href="<?php echo U('Member/Huzhu/index');?>">
                            <div class="coment text-center">
                                <img src="/weixin/Application/Member/View/images/weiguanwang/pic1.png" style="margin-left:20px">
                                <h2>百倍爱心卡</h2>
                                <small>开启慢病管理新模式</small>
                            </div>
                        </a>
                    </div>
                    <div class="left con2_center btb">
                        <a href="<?php echo U('Member/User/expand');?>">
                            <div class="coment"><img src="/weixin/Application/Member/View/images/weiguanwang/pic2.png">
                                <h2>爱心传递</h2>
                                <h2>共享健康</h2>
                            </div>
                        </a>
                    </div>
                    <div class="left con2_center">
                        <a href="<?php echo U('Member/Doc/doc_list');?>">
                            <div class="coment"><img src="/weixin/Application/Member/View/images/weiguanwang/pic3.png">
                                <h2>在线咨询</h2>
                                <h2>有问有答</h2>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="ind_con2">
                    <div class="right con2_center big">
                        <a href="https://weidian.com/i/1927804008?string=b2M1b050emxab1dMWEtwaXhsQkZtczR1MlRjbw==">
                            <div class="coment text-center">
                                <img src="/weixin/Application/Member/View/images/weiguanwang/pic6.png">
                                <h2>VIP心脑护照卡</h2>
                                <small>真实解决看病难</small>
                            </div>
                        </a>
                    </div>
                    <div class="right con2_left btb">
                        <a href="<?php echo U('Member/Hos/hos_list');?>">
                            <div class="coment"><img src="/weixin/Application/Member/View/images/weiguanwang/pic5.png">
                                <h2>会诊基地</h2>
                                <h2>远程阅片</h2>
                            </div>
                        </a>
                    </div>
                    <div class="right con2_left">
                        <a href="<?php echo U('Member/Hos/hos_list','serve_id=24');?>">
                            <div class="coment"><img src="/weixin/Application/Member/View/images/weiguanwang/pic4.png">
                                <h2>会诊中心</h2>
                                <h2>预约手术</h2>
                            </div>
                        </a>
                    </div>
                </div>
                <!--<div class="ind_con2">
                    <div class="left con2_left">
                        <a href="<?php echo U('Member/Hos/hos_list');?>">
                            <div class="coment"><img src="/weixin/Application/Member/View/images/weiguanwang/con2.png">
                                <h2>会诊基地</h2> </div>
                        </a>
                    </div>
                    <div class="left con2_center">
                        <a href="<?php echo U('Member/Hos/hos_list','serve_id=29');?>">
                            <div class="coment"><img src="/weixin/Application/Member/View/images/weiguanwang/con3.png">
                                <h2>远程阅片</h2> </div>
                        </a>
                    </div>
                </div>
                <div class="ind_con2">
                    <div class="left con2_left">
                        <a href="<?php echo U('Member/Doc/doc_list');?>">
                            <div class="coment"><img src="/weixin/Application/Member/View/images/weiguanwang/con5.png">
                                <h2>专家咨询</h2> </div>
                        </a>
                    </div>
                    <div class="left con2_center">
                        <a href="<?php echo U('Member/Hos/hos_list','serve_id=24');?>">
                            <div class="coment"><img src="/weixin/Application/Member/View/images/weiguanwang/con4.png">
                                <h2>会诊中心</h2> </div>
                        </a>
                    </div>
                </div>-->
                <div class="clear"></div>
                <h2 class="shouyeh2">推荐咨询专家</h2>
                <div class="guahaoT">
                    <?php if(empty($index_tjys)): ?><div style=" text-align: center;"> <img src="/weixin/Public/Common/images/icon/icon1.png">
                            <br> <i style=" line-height: 30px;">暂无数据</i> </div>
                        <?php else: ?>
                        <div class="guahaoTCon">
                            <?php if(is_array($index_tjys)): $i = 0; $__LIST__ = $index_tjys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div>
                                    <a href="/weixin/index.php?m=Member&c=Doc&a=doc_detail&doc_id=<?php echo ($val['EXPERT_ID']); ?>">
                                        <p><img src="<?php echo ($val['SMALL_PIC']); ?>" style='_margin-top:expression(( 180 - this.height ) / 2);' /></p>
                                        <p class="name_p"><?php echo ($val['EXPERT_NAME']); ?></p>
                                        <p><?php echo ($val['DEP_NAME']); ?></p>
                                    </a>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div><?php endif; ?>
                </div>
                <iframe src="http://www.yc999120.com/jbbk/" width="100%" height="416px" scrolling="no"></iframe>
            </div>
        </div>
    </div>
    <div style="height:60px"></div>
    <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
    <footer id="over_footer">

		<a class="over_footer_shouye" href="<?php echo U('Member/Index/index');?>">首页</a>

		<a class="over_footer_zixun" href="<?php echo U('Member/Doc/doc_list');?>">咨询</a>

		<a class="over_footer_yuepian" href="<?php echo U('Member/Hos/hos_list','serve_id=29');?>">阅片</a>

		<a class="over_footer_dingdan_dd" href="<?php echo U('Member/Order/order_list');?>">订单</a>

		<a class="over_footer_geren" href="<?php echo U('Member/User/user_info');?>">个人中心</a>

</footer>

<div class="" style=" width: 100%; position:fixed; top: 35%; left: 0; z-index: 999;">

	<p class="msgtishi"  id="msg"></p>

</div>

<script>

	var shouye = $("#over_footer .over_footer_shouye"),zixun = $("#over_footer .over_footer_zixun"),yuepian = $("#over_footer .over_footer_yuepian"),dingdan_dd = $("#over_footer .over_footer_dingdan_dd"),geren = $("#over_footer .over_footer_geren");

	$(function()

	{

		if(over_footer==1)

		{

			shouye.removeClass("over_footer_shouye").addClass("over_footer_shouye_on");

		};

		if(over_footer==2)

		{

			zixun.removeClass("over_footer_zixun").addClass("over_footer_zixun_on");

		};

		if(over_footer==3)

		{

			yuepian.removeClass("over_footer_yuepian").addClass("over_footer_yuepian_on");

		};

		if(over_footer==4)

		{

			dingdan_dd.removeClass("over_footer_dingdan_dd").addClass("over_footer_dingdan_dd_on");

		};

		if(over_footer==5)

		{

			geren.removeClass("over_footer_geren").addClass("over_footer_geren_on");

		}

	})

</script>

<script>

    function showmsg(){

        $('#msg').show();

        $('#msg').html('暂未开放！');

        setTimeout(function(){fail();},2000);

        return false;

    }

    function fail(){

        $('#msg').hide()

    }

</script>
    <script src="/weixin/Public/Member/js/hhSwipe.js" type="text/javascript"></script>
    <script src="/weixin/Public/Member/js/gundong.js" type="text/javascript"></script>
    <script>
        var over_footer = '1';
        $('#app i').click(function(){
            $('#app').hide();
        })
    </script>
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
    <div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
</body>
</html>