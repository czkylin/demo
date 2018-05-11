<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="/weixin/Public/Member/css/bootstrap.min.css" type="text/css">
<link type="text/css" rel="stylesheet" href="/weixin/Public/Common/css/commonLoadMore/loadMore.css"/>
<link type="text/css" rel="stylesheet" href="/weixin/Public/Home/css/gerenzhongxin.css"/>
<link type="text/css" rel="stylesheet" href="/weixin/Public/Home/css/yishengbangzs.css"/>
<script type="text/javascript" src="/weixin/Public/Member/js/jquery.min.js"></script>
<script src="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/javascript"></script>
<title>我推荐的患者会员</title>
</head>
<body>
<div class="wode_hz">
	<ul id="member_list">
		<?php if(is_array($member_list)): $i = 0; $__LIST__ = $member_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$member): $mod = ($i % 2 );++$i;?><li>
			<dl style="height:82px;">
				<dt style="margin-top:0;">
					<img src="<?php echo ($member['HEADIMGURL']); ?>" />
				</dt>
				<dd>
					<span class="name">
                    <!-- 患者姓名: -->
                        患者姓名: <?php echo ($member['MEMBER_NAME']); ?>
						
					</span>
					<br>
					<span class="add"> 
                    昵称：<?php echo ($member['NICKNAME']); ?>
						
					</span>
					<br>
					<span class="time">
						<!-- 推荐时间： -->
						推荐时间：<?php echo ($member['TJ_DATE']); ?>
					</span>
				</dd>
			</dl>
		</li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
	</ul>
</div>
<div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more();">加载更多</a></div>
<div id="current_pagenum" style="display:none">2</div>
<!--Js库文件--> 
        <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
        <!--加载更多-->
        <script src="/weixin/Public/Common/js/load.js " type="text/javascript"></script>
        <script type="text/javascript">
             var onOff = true;
            window.onscroll = function () {
                load_more('.wode_hz');
            }
            function load_more(obj) {
                if (!onOff) return;
                if ($(obj).height() <= $(document).scrollTop() + document.body.clientHeight) {
                    onOff = !onOff;
                    loadmore('#current_pagenum','/weixin/index.php?m=Home&c=User&a=member_list_append','#member_list');
                }
            }
        </script>
         <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260047007).'" width="0" height="0"/>';?></div>
</body>
</html>