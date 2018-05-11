<?php
$_SESSION['m_openid'] = C('OPENID_CE');
//获取openid
$openid = I('session.m_openid', '');
if ($openid == "")
{
	$openid = I('get.open_id', '');
	$_SESSION['m_openid'] = $openid;
}
if ($openid == "")
{
	$code = I('get.code', '');
    $state = I('get.state','');
	$openid = get_member_openid($code,$state);
	$_SESSION['m_openid'] = $openid;
}

if ($openid == "")
{
    if (strpos($_SERVER["HTTP_USER_AGENT"],"MicroMessenger"))
    {
        $openid = "1";
    }
    else
    {
        $openid = "0";
    }
}
