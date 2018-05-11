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
    <link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet">
    <link href="/weixin/Public/Common/css/commonSearch/search.css" type="text/css" rel="stylesheet">
    <link href="/weixin/Public/Common/css/commonFooter/footer_v2.min.css" type="text/css" rel="stylesheet" />
    <link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet" />
    <!--CSS当前页面文件-->
    <link rel="stylesheet" href="/weixin/Public/Member/css/hos_list.min.css" type="text/css">
    <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
    <script src="/weixin/Public/Member/js/list.js?v=1.10" type="text/javascript"></script>
    <script src="/weixin/Public/Common/js/load.js?v=1.10" type="text/javascript"></script>
    <script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth / 3 + 'px';
    </script>
    <!-- title -->
    <title>医院列表</title>
    <!--meta-->
</head>
<body class="ui-mobile-viewport ui-overlay-c">
    <!-- 引导页 -->
    <!--<section class="swiper-container" id="line">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="unit text-center"> <img src="/weixin/Public/Member/images/yd/hz/pic1.png" alt=""> </div>
            </div>
            <div class="swiper-slide">
                <div class="unit text-center"> <img src="/weixin/Public/Member/images/yd/hz/pic3.png" alt=""> </div>
            </div>
            <div class="swiper-slide">
                <div class="unit text-center" style="position:relative;"><img src="/weixin/Public/Member/images/yd/hz/pic2.png" alt=""> <img src="/weixin/Public/Member/images/yd/hz/pic3-1.png" alt="" style="position:absolute; top:1.4rem; right:0; width:2.36rem;"> </div>
                <div id="test" class="text-center"> <strong class="experience" style="background:#ff647c; color:#fff;">去会诊</strong>
                    <label for="noShow">
                        <input type="checkbox" id="noShow"><span class="color1">不再显示</span></label>
                    <strong class="hide">不再显示</strong></div>
            </div>
        </div>
        <div class="spa"></div>
    </section>-->
    <!--  end  -->
    <div data-role="page" data-title="" id="gp-experts" data-goto="" data-url="gp-experts" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 480px;">
        <div class="experts experts2" style="position:relative;">
             <div class="selectbtn left active" ><a href="<?php echo U('Member/Hos/hos_list',array('serve_id'=>'24'));?>" ><span>远程会诊中心</span></a>
          </div>
          <div class="selectbtn left"><a href="<?php echo U('Member/Hos/hos_list');?>" ><span>远程会诊基地</span></a>
                        </div>
            <div style="clear:both;"></div>
            <!--搜索框3 右侧无内容 start-->
            <div class="ui-search">
                <div class="ui-searchtxt">
                    <input type="text" name="hos_name" id="hos_name" value="" placeholder="请输入医院名称"> </div>
                <input type="button" class="ui-btn-search" onClick="search_list('','0','',document.all.hos_name.value);" readonly unselectable="on" value="搜索"> </div>
            <div class="hos_search">
                <div class="sear" style="width:50%;"> <span><b>医院等级</b><i></i></span>
                    <div class="tiaojian"> <i></i> <a href="javascript:void(0);" onClick="search_list('','0','',document.all.hos_name.value);">全部</a>
                        <?php if(is_array($level_list)): $i = 0; $__LIST__ = $level_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$level): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" onClick="search_list('','<?php echo ($level['LEVEL_ID']); ?>','',document.all.hos_name.value);"><?php echo ($level['LEVEL_NAME']); ?></a><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                    </div>
                    <div class="sear-bg"></div>
                </div>
                <div class="sear" style="width:50%;"> <span><b>选择省</b><i></i></span>
                    <div class="tiaojian"> <i></i> <a href="javascript:void(0);" onClick="search_list('','','0',document.all.hos_name.value);">全部</a>
                        <?php if(is_array($province_list)): $i = 0; $__LIST__ = $province_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$province): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" onClick="search_list('','','<?php echo ($province['PROVINCE_ID']); ?>',document.all.hos_name.value);"><?php echo ($province['PROVINCE_NAME']); ?></a><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                    </div>
                    <div class="sear-bg"></div>
                </div>
            </div>
            <div data-role="content" class="ui-content" role="main" style=" padding:0;">
                <div id="js-list" class="list">
                    <ul id="hos-list">
                        <?php if(is_array($hos_list)): $i = 0; $__LIST__ = $hos_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$hos): $mod = ($i % 2 );++$i;?><li>
                                <div class="feng"></div>

                                <a class="yylist_a" href="/weixin/index.php?m=Member&c=Hos&a=hos_detail&hos_id=<?php echo ($hos['HOS_ID']); ?>&province_name=<?php echo ($hos['PROVINCE_NAME']); ?>">

                                    <div class="hezuoHos-wrap">
                                        <div class="hezuoHos">

                                            <div class="yiyuanpic">
                                                <img class="" src="<?php echo ($hos['HOS_PIC']); ?>" alt="<?php echo ($hos['HOS_NAME']); ?>" class="g-left expert-img" />
                                                <?php if($hos['NEW_HOS'] == '是'): ?><b></b>
                                                <?php else: endif; ?>
                                            </div>    
                                            <h2 class="mingcheng"><i><?php echo ($hos['HOS_NAME']); ?></i> <span>医保</span></h2>
    
                                            <div class="hezuoHosdes">
                                                <p><?php echo ($hos['LEVEL_NAME']); ?></p>
                                                <p><?php echo ($hos['TYPE_NAME']); ?></p>
                                                <p><?php echo ($hos['PROVINCE_NAME']); ?></p>
                                            </div>

                                            <div class="xingji">
                                                <i>
                                                    <b><img src="/weixin/Public/Member/images/icon/start.png" alt=""></b>
                                                    <span style="display: none;"><?php echo ($hos['FZ_NUM']/$hos['FM_NUM']); ?></span>
                                                </i> 
                                            </div>
                                                
                                            <p class="goumaishu">
                                                <b>
                                                    <?php if($hzzx_flag == '1'): else: ?>
                                                        月服务人数:<?php echo ($hos['SERVE_NUM']); endif; ?>
                                                </b>
                                            </p> 
                                            <div class="juli"><?php echo ($hos['JL']); ?>km</div>
                                            
                                        </div> 
                                           
                                    </div>
                                    
                                </a>
                                <div class="kt_service" style=" margin:0; padding-top:10px;">
                                    <?php if(is_array($hos['HOS_SERVES'])): $i = 0; $__LIST__ = $hos['HOS_SERVES'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$serve): $mod = ($i % 2 );++$i;?><!-- 如果服务为空 选择 价格不显示 -->
                                        <?php if($serve['HAVE_SERVE'] == 0): else: ?>
                                            <dl>
                                                <a href="/weixin/index.php?m=Member&c=Hos&a=serve_detail&serve_id=<?php echo ($serve['SERVE_ID']); ?>&hos_id=<?php echo ($hos['HOS_ID']); ?>"> <dt class="on"><?php echo ($serve['SERVE_NAME']); ?></dt>
                                                    <dd style="display:none;"><span class="fuwu fuwu<?php echo ($serve['SERVE_ID']); ?> on"></span></dd>
                                                    <dd>￥<?php echo ($serve['SERVE_MONEY']); ?></dd>
                                                </a>
                                            </dl><?php endif; endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more();">加载更多</a></div>
            <div id="emptyData"></div>
            <div id="current_pagenum" style="display:none">2</div>
            <div id="current_level" style="display:none"><?php echo ($level_id); ?></div>
            <div id="current_province" style="display:none"><?php echo ($province_id); ?></div>
            <div id="current_name" style="display:none"><?php echo ($hos_name); ?></div>
            <div id="hzzx_flag" style="display:none"><?php echo ($hzzx_flag); ?></div>
            <!--预约日期-->
        </div>
    </div>
    <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
    <!--<script src="/weixin/Public/Common/js/swiper.jquery.js"></script>
    <script src="/weixin/Public/Member/js/yd.js"></script>-->
    <script>
        var over_footer = '0';
        function search_list(hzzx_flag, level_id, province_id, hos_name) 
        {
            //$('.sear').eq(hzzx_flag).addClass('active');
            if (level_id != '') {
                $('#current_level').text(level_id);
            }
            if (province_id != '') {
                $('#current_province').text(province_id);
            }
            if (hzzx_flag != '') {
                $('#hzzx_flag').text(hzzx_flag);
            }
            $('#current_name').text(encodeURI(hos_name));
            if ($('#current_level').text() == '0') {
                $('#current_level').text('');
            }
            if ($('#current_province').text() == '0') {
                $('#current_province').text('');
            }
            if ($('#hzzx_flag').text() == '') {
                $('#hzzx_flag').text('0');
            }
            //alert($('#hzzx_flag').text());
            $('#current_pagenum').text('1');
            $('#hos-list').html('');
            $('.ui-jiazai').children('a').text('加载更多');
            loadmore('#current_pagenum', '/weixin/index.php?m=Member&c=Hos&a=hos_list_append&hzzx_flag=' + $('#hzzx_flag').text() + '&hos_name=' + $('#current_name').text() + '&level_id=' + $('#current_level').text() + '&province_id=' + $('#current_province').text() + '', '#hos-list');
             //判断评分数
                $(".xingji").each(function(){
                    var iFen = $(this).find("span").html();
                    if(iFen == 0)
                    {
                        iFen = 5;
                    }
                    var iScale = iFen/5 >= 1 ? 1: iFen/5;
                    $(this).find("b").css("width",86*iScale);
                });
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
            if ($(obj).height() <= $(document).scrollTop() + document.body.clientHeight) 
            {
                onOff = !onOff;
                loadmore('#current_pagenum', '/weixin/index.php?m=Member&c=Hos&a=hos_list_append&hzzx_flag=' + $('#hzzx_flag').text() + '&hos_name=' + $('#current_name').text() + '&level_id=' + $('#current_level').text() + '&province_id=' + $('#current_province').text() + '', '#hos-list');
                //判断评分数
                $(".xingji").each(function(){
                    var iFen = $(this).find("span").html();
                    if(iFen == 0)
                    {
                        iFen = 5;
                    }
                    var iScale = iFen/5 >= 1 ? 1: iFen/5;
                    $(this).find("b").css("width",86*iScale);
                });
            }
        }
        $('.over_footer_yuepian').click(function () {
            alert(1);
        })
        $("#noShow").click(function () {
            $("#line").hide();
        })
         //判断评分数
        $(".xingji").each(function(){
            var iFen = $(this).find("span").html();
            if(iFen == 0)
            {
                iFen = 5;
            }
            var iScale = iFen/5 >= 1 ? 1: iFen/5;
            $(this).find("b").css("width",86*iScale);
        });
    </script>
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
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
    </body>
</html>