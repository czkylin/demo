<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="cache-control" content="public">
        <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="format-detection" content="telephone=no">
        <meta name="share-title" content="">
        <link type="text/css" rel="stylesheet" href="/weixin/Public/Home/css/gerenzhongxin/gerenzhongxin2.css" />
        <link href="/weixin/Public/Common/css/commonIcon/icon.css" type="text/css" rel="stylesheet" > 
        <link href="/weixin/Public/Common/css/commonFooter/footer.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="/weixin/Public/Home/css/zhengcejiedu/icons.css">
        <title>我的营业额</title>
        <style>
            .header{padding:.13rem 0;background: #ff647c;position:relative;height:auto;}    
            .header a.icon{left:.1rem;top:.13rem;font-size:30px;color:#fff;position:absolute;}    
            .header h2{width:100%;color:#fff;font-size:24px;text-align:center;height:26px;line-height:26px;}  
             #member_list{font-size:12px;}
        </style>
        <script>
            document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/3 + 'px';
        </script>
    </head>
    <body style="background:#fff;">
        <!-- <a class="jfgz_href" href="javascript:void(0)">查看积分明细</a> -->
        <div class="gp GJ_Gp gp-profile g-items gp-profile_index">  
    	    <div class="wdjfmx">
                <ul class="jf_list" id="jf-list">
                    
                    	<li>
                            <p>医院收入总额：<?php echo ($data_list['hos_total_money']); ?>元 </p>
							<a href="<?php echo U('Home/Hos/money_list');?>">查看明细</a>
                        </li>
						<li>
                            <p>药店收入总额：<?php echo ($data_list['yd_total_money']); ?>元</p>
							<a href="<?php echo U('Home/Hos/yd_cf_list');?>">查看明细</a>
                        </li>
						<li>
                           <p>我的医生收入总额：<?php echo ($data_list['ys_total_money']); ?>元</p>
						   <a href="<?php echo U('Home/User/doc_money_list');?>">查看明细</a>
                        </li>
						<li>
                           <p>我的患者消费总额：<?php echo ($data_list['hy_total_money']); ?>元</p>
						   <a href="<?php echo U('Home/User/money_list');?>">查看明细</a>
                        </li>
                        <li>
                           <p>百倍爱心卡提成总额：<?php echo ($data_list['sale_buy_money']); ?>元</p>
                           <a href="<?php echo U('Home/User/hz_order_list');?>">查看明细</a>
                        </li>
                </ul>
                <div class="ui-jiazai" style="margin-bottom: 60px;margin-top: 40px;font-size:24px;color:red;">总额：<?php echo $data_list['hos_total_money']+$data_list['yd_total_money']+$data_list['ys_total_money']+$data_list['hy_total_money']+$data_list['sale_buy_money']?>元</div>
               <!--  <div id="current_pagenum" style="display:none">2</div> -->
            </div>
        </div>  
        <!--Js库文件--> 
        <script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
        <!--加载更多-->
        <script src="/weixin/Public/Common/js/load_more.js " type="text/javascript"></script>
        <script type="text/javascript">
            function load_more()
            {
                loadmore('#current_pagenum','/weixin/index.php?m=Home&c=User&a=jifen_list_append','#jf-list');
            }

        </script>
 <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260047007).'" width="0" height="0"/>';?></div>
    </body>
</html>