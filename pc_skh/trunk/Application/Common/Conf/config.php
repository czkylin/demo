<?php
header("Content-Type:text/html;charset=utf-8");
return array(
	//'配置项'=>'配置值'
	'URL_MODEL' => 2, //URL模式
	'URL_CASE_INSENSITIVE'=>true, //URL不区分大小写
	'URL_HTML_SUFFIX'=>'.html',
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES' => array( //定义路由规则 

		'focus/:artid\d$'  => 'Focus/newsDetail',
	    //'focus/:type_id\d$'    => 'Focus/doc',
	    'doc/:docid$'    => 'Doc/docDetail',

	),

	'MSG_USERNAME'=>'SDK-YCSJ-0077',
	'MSG_PASSWORD'=>'08UyT5Req',
	'DEFAULT_MODULE' => 'Member',
	'EMPTY_HEADER' =>'<head><meta charset="UTF-8"><meta http-equiv="cache-control" content="public"><meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><meta name="format-detection" content="telephone=no"><title>Document</title></head>',
	'EMPTY_DATA' =>'<div class="empty_data" style="width: 100%;height: 100%;display: box;display: -webkit-box;-webkit-box-pack: center;-webkit-box-align: center;position:absolute;top:0;left:0;right:0;bottom:0;"><div><div style="text-align:center;width:100px;height:100px;margin:0 auto;overflow:hidden;margin-bottom:10px;"><img src="/weixin/Public/Common/images/icon/empty.png" width="100%" /></div><p style="text-align:center;font-size:16px;">暂无患者问诊</p><br></div></div>',//数据为空
	'YW_ID' => '19',//业务线
	'SX_ID' => '10',//肺保卡生效ID
	'M_TOKEN_ID' => '121',//患者端token_id
	'D_TOKEN_ID' => '109',//医生端token_id
	'H_TOKEN_ID' => '18',//运营端token_id
	'M_APPID'=>'wxb6c692ba6261e704',
	'M_SECRET'=>'8e4079ca9ce6a661ac7ed68b6a839c21',
	'D_APPID'=>'wx60735d1fd7fcec96',
	'D_SECRET'=>'dc8d1eaff33a817ccaaedc06f87696bb',
	//'H_APPID'=>'wxf69e410e9842b987',
	//'H_SECRET'=>'e7d3282dd91588016e2d076de9c30afa',
	'SALE_TYPE_1'=>'32',//医美卡

	'PATH_URL'=>'http://weixin.yk2020.com',
	'EMPTY_JTYS'=>'<div class="empty_data" style="width: 100%;height: 100%;display: box;display: -webkit-box;-webkit-box-pack: center;-webkit-box-align: center;position:absolute;top:0;left:0;right:0;bottom:0;"><div><div style="text-align:center;width:100px;height:100px;margin:0 auto;overflow:hidden;margin-bottom:10px;"><img src="/weixin/Public/Common/images/icon/empty.png" width="100%" style="margin-top:-200px;" /></div><p style="text-align:center;font-size:16px;">没有收藏的医生</p><br></div></div>',
	'NEW_URL'=>'http://jiekou.yk2020.com/',

);