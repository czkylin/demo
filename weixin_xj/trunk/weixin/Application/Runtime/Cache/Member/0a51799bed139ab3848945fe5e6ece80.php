<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
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
    <link href="/weixin/Public/Common/css/commonSearch/search.css" type="text/css" rel="stylesheet">
    <link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet">
    <link href="/weixin/Public/Common/css/commonFooter/footer_v2.min.css" type="text/css" rel="stylesheet" />
    <link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet" />
    <!--CSS当前页面文件-->
    <link href="/weixin/Public/Member/css/portal.min.css" type="text/css" rel="stylesheet" />
    <link href="/weixin/Public/Member/css/hos_list.min.css" type="text/css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="/weixin/Public/Member/css/swiper.min.css">
    <link rel="stylesheet" href="/weixin/Public/Member/css/yd.css">-->
    <script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth / 3 + 'px';
    </script>
    <!-- title -->
    <title>医生列表</title>
    <!--meta-->
</head>
<body class="ui-mobile-viewport ui-overlay-c">
    <!-- 引导页 -->
    <!--<section class="swiper-container" id="line">
        <div class="swiper-wrapper">
                <div class="swiper-slide bg1">
                        <div class="unit bg1 text-center"> <img src="/weixin/Public/Member/images/yd/zx/pic1.jpg" alt=""> </div>
                </div>
                <div class="swiper-slide bg2">
                        <div class="unit bg2 text-center"> <img src="/weixin/Public/Member/images/yd/zx/pic2.jpg" alt=""> </div>
                </div>
                <div class="swiper-slide bg3">
                        <div class="unit bg3 text-center" style="position:relative;"><img src="/weixin/Public/Member/images/yd/zx/pic3.jpg" alt=""> <img src="/weixin/Public/Member/images/yd/zx/pic3-1.png" alt="" style="position:absolute; top:1.8rem; left:50%; margin-left:-1.054rem; width:2.108rem;"> </div>
                        <div id="test" class="text-center"> <strong class="experience" style="color:#fff; border-color:#ff647c; background-color:#ff647c;">去咨询</strong>
                                <label for="noShow">
                                        <input type="checkbox" id="noShow">
                                        <span style="color:#ff647c; border:1px solid #ff647c;">不再显示</span></label>
                        </div>
                </div>
        </div>
        <div class="spa"></div>
</section>
-->
    <!--  end  -->
    <div data-role="page" data-title="" id="gp-experts" data-goto="" data-url="gp-experts" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 480px;">
        <div class="experts" style="position:relative;">
            <div class="ui-search">
                <div class="ui-searchtxt">
                    <input type="text" name="expert_name" id="expert_name" value="" placeholder="请输入医生姓名或医院名称"> 
                </div>
                <input type="button" class="ui-btn-search" onClick="search_list('',document.all.expert_name.value,'');" readonly="readonly" unselectable="on" value="搜索"> </div>
            <div class="hos_search" style="border-bottom:4px solid #eaeaea;">
                <div class="sear" style="height:40px;"> 
                    <span style='width:50%; float:left;'><b>选择区域</b><i></i></span>
                    <span style='width:50%; float:right;'><b>医生级别</b><i></i></span>
                    <!--区域筛选-->
                    <div class="tiaojian"> <i></i> <a href="javascript:void(0)" onClick="search_list('0',document.all.expert_name.value,'');">全 部</a>
                        <?php if(is_array($PROVINCE)): $i = 0; $__LIST__ = $PROVINCE;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" onClick="search_list('<?php echo ($pro['PROVINCE_ID']); ?>',document.all.expert_name.value,'<?php echo ($leader_flag); ?>');"><?php echo ($pro['PROVINCE_NAME']); ?></a><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                    </div>
                    <!--级别筛选-->
                    <div class="tiaojian"> <i></i> <a href="javascript:void(0)" onClick="search_list('',document.all.expert_name.value,'3');">全 部</a>
                        <a href="javascript:void(0);" onClick="search_list('',document.all.expert_name.value,'1');">知名专家</a>
                        <a href="javascript:void(0);" onClick="search_list('',document.all.expert_name.value,'0');">专科医生</a>
                    </div>
                </div>
            </div>
            <div data-role="content" class="ui-content" role="main">
                <div id="js-list" class="list">
                    <ul id="doc-list">
                        <?php if(is_array($doc_list)): $i = 0; $__LIST__ = $doc_list;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$doc): $mod = ($i % 2 );++$i;?><li>
                                <a class="yylist_a" style=" margin-bottom:6px;" href="/weixin/index.php?m=Member&c=Doc&a=doc_detail&doc_id=<?php echo ($doc['EXPERT_ID']); ?>"> 
                                    <div class="docImg fl">
                                    <!-- 判断头像 -->
                                    <?php if(($doc['EXPERT_SEX'] == '未填写') && ($doc['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?><span class="img"><img src="/weixin/Public/Expert/images/yonghu/girl.png" class="g-left expert-img"/></span>

                                    <?php elseif(($doc['EXPERT_SEX'] == '男') && ($doc['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?>
                                        <span class="img"><img src="/weixin/Public/Expert/images/yonghu/boy.png" class="g-left expert-img"/></span>

                                     <?php elseif(($data['EXPERT_SEX'] == '女') && ($data['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?>
                                        <span class="img"><img src="/weixin/Public/Expert/images/yonghu/girl.png" class="g-left expert-img"/></span>
                                    <?php else: ?>
                                        <span class="img"><img src="<?php echo ($doc['SMALL_PIC']); ?>" class="g-left expert-img"/></span><?php endif; ?>
                                        <?php  $my=intval($doc['MY_NUM']); $hy=intval($doc['HY_NUM']); $cp=intval($doc['CP_NUM']); $sum = ($my*8+$hy*10+$cp*4)*60/(($my+$hy+$cp)*10); $sum1 = round($sum,0); if($sum1 == 0) { $sum1 = 50; } echo "<i><b style='width:".$sum1."px;'>
                                            <img src='/weixin/Public/Member/images/icon/start.png' /></b></i>"; ?>												                                   
                                    </div> 
                                    <span class="meta fl">
                                        <div class="name_dj"> 
                                            <strong class="mingcheng"><em class="zc"><?php echo ($doc['EXPERT_NAME']); ?></em><em class="zc"><?php echo ($doc['EXPERT_RANK']); ?></em><em class="count">浏览量：<?php echo ($doc['POINT_NUM']+97); ?></em></strong> 
                                            <strong class="mingcheng"><em class="zc"><?php echo ($doc['HOS_NAME']); ?></em><em class="zc"><?php echo ($doc['DEP_NAME']); ?></em></strong> 
                                        </div>
                                        <!--<p class="hos_jj" style=" margin-top:1px;"> 
                                            <?php if($serve['HAVE_SERVE'] == ''): endif; ?>
                                        </p>-->
                                        <p class="desc">擅长：<?php echo ($doc['EXPERT_SKILL']); ?>
                                            <?php if( $doc['EXPERT_SKILL'] == '' ): ?>暂无<?php endif; ?>
                                        </p>
                                    </span> 
                                </a>
                                                        
                                <div class="kt_service">
                                    <?php if(is_array($doc['EXPERT_SERVES'])): $i = 0; $__LIST__ = $doc['EXPERT_SERVES'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$serve): $mod = ($i % 2 );++$i; if($serve['HAVE_SERVE'] == 0): ?><a href="javascript:void(0)" class="service weikaitong" style=" margin:0 0 0 10px"><?php echo ($serve['SERVE_NAME']); ?></a>
                                            <?php else: ?> <a class="service" style=" margin:0 0 0 10px" href="/weixin/index.php?m=Member&c=Doc&a=doc_consult&doc_id=<?php echo ($doc['EXPERT_ID']); ?>"><?php echo ($serve['SERVE_NAME']); ?></a><?php endif; endforeach; endif; else: echo "暂无数据" ;endif; ?>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="ui-jiazai">
                <a href="javascript:void(0);" onClick="load_more();"><div id="loading" class="loading"><i></i><i></i><i></i></div></a>
            </div>
            
            <div id="emptyData"></div>
            <div id="current_pagenum" style="display:none">2</div>
            <div id="current_ill" style="display:none"><?php echo ($province_id); ?></div>
            <div id="current_free_flag" style="display:none"><?php echo ($free_flag); ?></div>
            <div id="current_name" style="display:none"><?php echo ($expert_name); ?></div>
            <div id="leader_flag" style="display:none"></div>
            <!--预约日期-->
        </div>
    </div>
    <!--通底的引用开始-->
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
    <!--<script src="/weixin/Public/Common/js/swiper.jquery.js"></script>
    <script src="/weixin/Public/Member/js/yd3.js"></script>-->
    <!--old-->
    <!--<script src="/weixin/Public/Member/js/list.js" type="text/javascript"></script>-->
    <script src="/weixin/Public/Common/js/load.js" type="text/javascript"></script>
    <script>
        var over_footer = '2';
        function search_list(province_id, expert_name, leader_flag) 
        {
            onOff = true;
            if (province_id != '') 
            {
                $('#current_ill').text(province_id);
            }
            if ($('#current_ill').text() == '0') 
            {
                $('#current_ill').text('');
            }

            if (leader_flag != '') 
            {
                $('#leader_flag').text(leader_flag);
            }
            if ($('#leader_flag').text() == '3') 
            {
                $('#leader_flag').text('');
            }
            
            $('#current_name').text(encodeURI(expert_name));
            $('#current_pagenum').text('1');
            $('#doc-list').html('');
            $('.ui-jiazai').children('a').text('加载更多');
            load_more('.experts');
            /*loadmore('#current_pagenum', '/weixin/index.php?m=Member&c=Doc&a=doc_list_append&province_id=' + $('#current_ill').text() + '&free_flag=' + $('#current_free_flag').text() + '&expert_name=' + $('#current_name').text()+ '&leader_flag=' + $('#leader_flag').text(), '#doc-list');*/
        }
        var onOff = true;
        window.onload = function()
        {
            window.onscroll();
        }
        window.onscroll = function () 
        {
            load_more('.experts');
        }
        function load_more(obj) 
        {
            if (!onOff) return;
            if ($(obj).height() <= $(document).scrollTop() + $(window).height()) {
                onOff = !onOff;
                loadmore('#current_pagenum', '/weixin/index.php?m=Member&c=Doc&a=doc_list_append&province_id=' + $('#current_ill').text() + '&free_flag=' + $('#current_free_flag').text() + '&expert_name=' + $('#current_name').text()+ '&leader_flag=' + $('#leader_flag').text(), '#doc-list');
            }
        }
        /*function load_more()
        {
        loadmore('#current_pagenum','/weixin/index.php?m=Member&c=Doc&a=doc_list_append&province_id='+$('#current_ill').text()+'&free_flag='+$('#current_free_flag').text()+'&expert_name='+$('#current_name').text(),'#doc-list');
        }*/
        $("#noShow").click(function () 
        {
            $("#line").hide();
        });

        //search
        $(function(){

            var nowIndex = 0;

            $('.sear').children('span').each(function( index ){
                $(this).click(function(){
                    nowIndex = index;
                    $('.tiaojian').slideUp();
                    var iH = $('body').height() - $(".ui-search").height() -$(".hos_search").height();  
                    $(this).siblings('.tiaojian').eq(index).toggle();
                    $(this).siblings(".sear-bg").css('height',iH).toggle();      
                    $(this).parents('.sear').siblings().children('.tiaojian').slideUp();
                    $(this).parents('.sear').siblings().children('.sear-bg').hide();
                })
            })

            $('.tiaojian').children('a').click(function(){
                var a_val=$(this).html();
                $(this).parent().siblings('span').eq(nowIndex).children('b').text(a_val);
                $(this).addClass('red_bot').siblings().removeClass('red_bot');
                $('.tiaojian').delay(3000).hide();
                $(".sear-bg").hide();
                $('.sear').children('span').children('i').removeClass('top_bg');
            })


            /*$('.sear').children('span').click(function(){
                var iH = $('body').height() - $(".ui-search").height() -$(".hos_search").height();  
                $(this).siblings('.tiaojian').toggle();    
                $(this).parents('.sear').siblings().children('.tiaojian').slideUp();
            })

            $('.tiaojian').children('a').click(function(){
                var a_val=$(this).html();
                $(this).parent().siblings('span').children('b').text(a_val);
                $('.tiaojian').delay(3000).hide();
            })    */
        })
    </script>
    <!--通底的引用结束-->
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
    <div style="height:0px;overflow:hidden;">
        <?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?> </div>
</body>
</html>