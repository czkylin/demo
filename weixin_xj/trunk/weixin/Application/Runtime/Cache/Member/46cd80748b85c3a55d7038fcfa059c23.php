<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="cache-control" content="public">
        <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="format-detection" content="telephone=no">
        <meta name="share-title" content="">        
        <link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
        <link type="text/css" rel="stylesheet" href="/weixin/Public/Expert/css/gerenzhongxin/gerenzhongxin2.css" />
        <link href="/weixin/Public/Common/css/commonIcon/icon.css" type="text/css" rel="stylesheet" > 
        <link href="/weixin/Public/Common/css/commonFooter/footer.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="/weixin/Public/Expert/css/zhengcejiedu/icons.css">
        <title>我的积分</title>
        <style>
            .header{padding:.13rem 0;background: #ff647c;position:relative;height:auto;}    
            .header a.icon{left:.1rem;top:.13rem;font-size:30px;color:#fff;position:absolute;}    
            .header h2{width:100%;color:#fff;font-size:24px;text-align:center;height:26px;line-height:26px;}  
             #member_list{font-size:12px;}
            .wdjfmx .jf_list li{ height: auto; }
        </style>
        <script>
            document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/3 + 'px';
        </script>
    </head>
    <body style="background:#fff;">
        <header class="header">
            <a href="index.php?m=Member&c=User&a=user_info" class="icon">&#xf62b;</a>
            <h2>查看积分明细</h2>
        </header>
        <!-- <a class="jfgz_href" href="javascript:void(0)">查看积分明细</a> -->
        <div class="gp GJ_Gp gp-profile g-items gp-profile_index">  
    	    <div class="wdjfmx">
                <ul class="jf_list" id="jf-list" style="box-shadow:none;">
                    <?php if(is_array($jifen_list)): $i = 0; $__LIST__ = $jifen_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jifen): $mod = ($i % 2 );++$i;?><li class="clear">
                         <?php if($jifen['JIFEN_NAME'] > 0 ): ?><p>课程学习获得积分</p>
                        <?php else: ?> 
                            <p><?php echo ($jifen['JIFEN_NAME']); ?></p><?php endif; ?> 
                            <div style="width: 120px">
                            	<span>+<?php echo (round($jifen['JIFEN_NUM'],2)); ?>分</span>
                                <i><?php echo ($jifen['CREATE_DATE']); ?></i>
                            </div>
                            <br clear="all" />
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="ui-jiazai" style="margin-bottom: 60px;margin-top: 20px"><a href="javascript:void(0);" onClick="load_more();">加载更多</a></div>
                <div id="current_pagenum" style="display:none">2</div>
            </div>
        </div>  
        <!--Js库文件--> 
        <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
        <!--加载更多-->
        <script src="/weixin/Public/Common/js/load_more.js " type="text/javascript"></script>
        <script type="text/javascript">
            function load_more()
            {
                loadmore('#current_pagenum','/weixin/index.php?m=Member&c=user&a=jifen_list_append','#jf-list');
            }

        </script>
 <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145622).'" width="0" height="0"/>';?></div>
    </body>
</html>