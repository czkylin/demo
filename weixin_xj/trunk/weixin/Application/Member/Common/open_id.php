<?php
$openid = I('get.openid', 'oEMR8jm5iBtyqbTpUQ7pYFXOfwvw');
// $openid = I('get.openid', 'oSY_-vv7pkcA0WjKTtrJuvvSaOnE');

if ($openid == "")
{
	$openid = I('get.open_id', '');
}

if ($openid == "")
{
	$openid = I('session.m_openid', '');
}
else
{
	$_SESSION['m_openid'] = $openid;
}

if ($openid == "")
{
	$code = I('get.code', '');
	$openid = get_member_openid($code);
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