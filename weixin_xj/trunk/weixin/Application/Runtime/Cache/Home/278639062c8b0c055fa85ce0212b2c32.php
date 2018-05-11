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
<title>代医生申请记录</title>
<style>
    .wode_hz ul li dl dd{margin-left: 0; position: relative; display: black; float:none; }
    .wode_hz span.state{ position: absolute; right: 10px; top: 30px; color: #E84861;}
    .tab-box{width: 100%; height: 30px; margin-bottom: 4px;}
    .tab-box .tab1,.tab-box .tab2{width: 50%; float: left; height: 30px; line-height: 30px; text-align: center; background: #fff;}
    .tab-box .tab2,.tab-box .tab2 a{background: #FF647C; color: #fff;}
</style>
</head>
<body>
<div class="wode_hz">
<div class="tab-box">
     <a href="<?php echo U('Home/User/tj_expert_list');?>" ><div class="tab1">推荐医生会员</div></a>
     <a href="<?php echo U('Home/User/mydoc_list');?>"><div class="tab2">代医生申请记录</div></a>
</div>
	<ul id="member_list">
        <?php if(empty($doc_list)): ?><div class="nodetail" style="width:100%;height:100%;text-align:center;position:fixed;top:0;left:0;display:box;display:-webkit-box;-webkit-box-pack:center;-webkit-box-align:center;z-index: -1">
            <div>
                <img src="/weixin/Public/Common/images/icon/icon1.png" alt=""><br><br>
                <i>暂无数据</i>
            </div>
        </div>
    <?php else: ?>
		<?php if(is_array($doc_list)): $i = 0; $__LIST__ = $doc_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$doc): $mod = ($i % 2 );++$i;?><li>
			<dl style="height:82px;">
				
				<dd>
					<span class="name">
                        医生姓名: <?php echo ($doc['EXPERT_NAME']); ?>
						
					</span>
					<br>
					<span class="add"> 
                        所属医院：<?php echo ($doc['HOS_NAME']); ?>
						
					</span>
					<br>
					<span class="time">
					   申请时间：<?php echo ($doc['CREATE_DATE']); ?>
					</span>
                    <span class="state">
                       <?php if($doc['CHECK_FLAG'] == 0): ?>审核中
                       <?php elseif($doc['CHECK_FLAG'] == 1): ?>
                            通过
                       <?php else: ?>
                            未通过<?php endif; ?>
                    </span>
				</dd>
			</dl>
		</li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; endif; ?>
	</ul>
</div>
<div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more();"></a></div>
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
                    loadmore('#current_pagenum','/weixin/index.php?m=Home&c=User&a=mydoc_list_append','#member_list');
                }
            }
        </script>
         <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260047007).'" width="0" height="0"/>';?></div>
</body>
</html>