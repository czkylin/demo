<?php
 // $_SESSION['h_openid'] = C('OPENID_CE');
//获取openid
$openid = I('get.openid', '');

if ($openid == "")
{
	$openid = I('get.open_id', '');
}

if ($openid == "")
{
	$openid = I('session.h_openid', '');
}
else
{
	$_SESSION['h_openid'] = $openid;  
}

if ($openid == "")
{
	$code = I('get.code', '');
	$openid = get_hos_openid($code);
	$_SESSION['h_openid'] = $openid;
}

