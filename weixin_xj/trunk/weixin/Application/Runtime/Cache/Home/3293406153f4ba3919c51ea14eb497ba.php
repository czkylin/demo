<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta name="share-title" content="">
<link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png" >
<!--公用样式调用-->
<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet"/>
<!--分享页面样式调用-->
<link href="/weixin/Public/Home/css/portal.minv2.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Home/css/hos_list.min.css" type="text/css" rel="stylesheet"/>
<link href="/weixin/Public/Home/css/footer_v2.min.css" type="text/css" rel="stylesheet"/>
<style>
body{ position:relative;}
.box{ position:absolute;  top:234px; left:0; right:0; bottom:0; display:none; z-index:100000;}
</style>
<!-- title -->
<title>医院列表</title>
<!--meta-->
</head>
<body class="ui-mobile-viewport ui-overlay-c">
<div data-role="page" data-title="" id="gp-experts" data-goto="" data-url="gp-experts" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 480px;">
	<div class="experts" style="position:relative;">
		<div class="hos_search">
			<div class="sear"> <span><b>医院等级</b><i></i></span>
				<div class="tiaojian">
					<i></i>
					<a href="javascript:void(0);" onClick="search_list('0','');">全部</a>
					<?php if(is_array($level_list)): $i = 0; $__LIST__ = $level_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$level): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" onClick="search_list('<?php echo ($level['LEVEL_ID']); ?>','');"><?php echo ($level['LEVEL_NAME']); ?></a><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
				</div>
			</div>
			<div class="sear">
				<span><b>选择省</b><i></i></span>
				<div class="tiaojian">
					<i></i>
					<a href="javascript:void(0);" onClick="search_list('','0');">全部</a>
					<?php if(is_array($province_list)): $i = 0; $__LIST__ = $province_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$province): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" onClick="search_list('','<?php echo ($province['PROVINCE_ID']); ?>');"><?php echo ($province['PROVINCE_NAME']); ?></a><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
				</div>
			</div>
			<div class="sear no_tab"> <span style=" border-right:0;"><a href="javascript:void(0);" onClick="search_list('','');">智能排序</a></span></div>
		</div>
		<div class="nav_tit">
			<h2>医院列表</h2>
		</div>
		<div data-role="content" class="ui-content" role="main">
			<div id="js-list" class="list">
				<ul id="hos-list">
					<?php if(is_array($hos_list)): $i = 0; $__LIST__ = $hos_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$hos): $mod = ($i % 2 );++$i;?><li>
						<a href="/weixin/index.php?m=Home&c=Hos&a=hos_detail&hos_id=<?php echo ($hos['HOS_ID']); ?>" class="yylist_a">
							<span class="img">
								<img src="<?php echo ($hos['HOS_PIC']); ?>"  alt="<?php echo ($hos['HOS_NAME']); ?>" class="g-left expert-img"/>
							</span>
							<div class="meta">
								<div class="name_dj">
									<strong class="mingcheng"><?php echo ($hos['HOS_NAME']); ?></strong>
									<i><?php echo ($hos['LEVEL_NAME']); ?></i>
								</div>
								<!--<p class="hos_jj"><?php echo ($hos['HOS_DESC']); ?></p>-->
								<div class="juti_info">
									<span style=" width:50%;"><?php echo ($hos['PROVINCE_NAME']); ?> <?php echo ($hos['CITY_NAME']); ?></span>
									<span style="margin-right:0;"><?php echo ($hos['GM_NUM']); ?>人购买</span>
									<span style="float:right;"><?php echo ($hos['JL']); ?>km</span>
								</div>
							</div>
						</a>
					</li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
				</ul>
			</div>
		</div>
		<div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more();" >加载更多</a></div>
		<div id="current_pagenum" style="display:none">2</div>
		<div id="current_level" style="display:none"><?php echo ($level_id); ?></div>
		<div id="current_province" style="display:none"><?php echo ($province_id); ?></div>
		<!--预约日期-->
	</div>
</div>
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260047007).'" width="0" height="0"/>';?></div>
</body>
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<script src="/weixin/Public/Home/js/list.js" type="text/javascript"></script>
<script src="/weixin/Public/Common/js/load.js" type="text/javascript"></script>
<script type="text/javascript">
function search_list(level_id,province_id)
{
	if (level_id != '')
	{
		$('#current_level').text(level_id);
	}
	if (province_id != '')
	{
		$('#current_province').text(province_id);
	}

	if ($('#current_level').text() == '0')
	{
		$('#current_level').text('');
	}
	if ($('#current_province').text() == '0')
	{
		$('#current_province').text('');
	}

	$('#current_pagenum').text('1');

	$('#hos-list').html('');
	$('.ui-jiazai').children('a').text('加载更多');

	loadmore('#current_pagenum','/weixin/index.php?m=Home&c=Hos&a=hos_list_append&level_id='+$('#current_level').text()+'&province_id='+$('#current_province').text()+'','#hos-list');
}

var onOff = true;
window.onscroll = function(){
    load_more('.experts');
}
function load_more(obj)
{	
    if(!onOff) return;
    if($(obj).height() <= $(document).scrollTop() + $(window).height()){
        onOff = !onOff;
        loadmore('#current_pagenum','/weixin/index.php?m=Home&c=Hos&a=hos_list_append&level_id='+$('#current_level').text()+'&province_id='+$('#current_province').text()+'','#hos-list');
    }
}    
    
/*function load_more()
{
	loadmore('#current_pagenum','/weixin/index.php?m=Home&c=Hos&a=hos_list_append&level_id='+$('#current_level').text()+'&province_id='+$('#current_province').text()+'','#hos-list');
}*/
</script>
</html>