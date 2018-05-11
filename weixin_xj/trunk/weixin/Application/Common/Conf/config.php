<?php
header("Content-Type:text/html;charset=utf-8");
return array(
	//'配置项'=>'配置值'
	'URL_MODEL' => 0, //URL模式
	'URL_CASE_INSENSITIVE'=>true, //URL不区分大小写
	'MSG_USERNAME'=>'SDK-YCSJ-0077',
	'MSG_PASSWORD'=>'08UyT5Req',
	'SHOW_ERROR_MSG' => TRUE,
	'DEFAULT_MODULE' => 'Member',
	'EMPTY_HEADER' =>'<head><meta charset="UTF-8"><meta http-equiv="cache-control" content="public"><meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><meta name="format-detection" content="telephone=no"><title>Document</title></head>',
	'EMPTY_DATA' =>'<div class="empty_data" style="width: 100%;height: 100%;display: box;display: -webkit-box;-webkit-box-pack: center;-webkit-box-align: center;position:absolute;top:0;left:0;right:0;bottom:0;"><div><div style="text-align:center;width:100px;height:100px;margin:0 auto;overflow:hidden;margin-bottom:10px;"><img src="/weixin/Public/Common/images/icon/empty.png" width="100%" /></div><p style="text-align:center;font-size:16px;">暂无患者问诊</p><br></div></div>',//数据为空
	'YW_ID' => '2',//业务线 心脑
	'YW_ID1' => '7',//业务线 爱脑
	'SX_ID' => '1',//生效ID 爱心卡
	'SX_ID1' => '7',//生效ID 爱脑卡
	'M_TOKEN_ID' => '19',//患者端token_id
	'D_TOKEN_ID' => '28',//医生端token_id
	'H_TOKEN_ID' => '20',//运营端token_id
	'M_APPID'=>'wx1f407a87747d4904',
	'M_SECRET'=>'cfca9fd1a2f0993700c22a60bf633074',
	'D_APPID'=>'wxeb16d6a558250306',
	'D_SECRET'=>'a69812db261918567a40c97d0b28e484',
	'H_APPID'=>'wx9292d0f64d78d8a8',
	'H_SECRET'=>'f5497fce1db2450ed46673ec2f57b796',
	'SALE_TYPE_1'=>'1',//百倍爱心卡100
	'SALE_TYPE_2'=>'2',//腕表套装1280
	'SALE_TYPE_3'=>'3',//清脂套装498
	'SALE_TYPE_4'=>'9',//高血压健康管理套装
	'SALE_TYPE_5'=>'10',//VIP心脑护照卡
	'SALE_TYPE_6'=>'11',//机器人
	'SALE_TYPE_7'=>'14',//百倍爱心卡重疾保障套装
	'SALE_TYPE_8'=>'19',//百倍爱心卡智能手机健康管理套装
	'SALE_TYPE_9'=>'23',//百倍爱心卡智能手机健康管理套装
	'PATH_URL'=>'http://weixin.yk2020.com',
	'CS_URL'=>'http://192.168.100.228:8080',
	'EMPTY_JTYS'=>'<div class="empty_data" style="width: 100%;height: 100%;display: box;display: -webkit-box;-webkit-box-pack: center;-webkit-box-align: center;position:absolute;top:0;left:0;right:0;bottom:0;"><div><div style="text-align:center;width:100px;height:100px;margin:0 auto;overflow:hidden;margin-bottom:10px;"><img src="/weixin/Public/Common/images/icon/empty.png" width="100%" style="margin-top:-200px;" /></div><p style="text-align:center;font-size:16px;">没有收藏的医生</p><br></div></div>',

	'DATA_CACHE_TYPE' => 'Memcache',   
	'MEMCACHE_HOST'   => 'tcp://127.0.0.1:11211',   
	'DATA_CACHE_TIME' => '3600', 
);