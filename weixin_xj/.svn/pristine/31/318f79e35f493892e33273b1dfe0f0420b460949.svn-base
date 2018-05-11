<?php

//判断是否已经获取到坐标，不管是允许还是拒绝，都存session
if ($_SESSION['lat'] == "")
{
	$lat = I('get.lat', '');
	$lng = I('get.lng', '');

	if ($lat != "")
	{
		$_SESSION['lat'] = $lat;
		$_SESSION['lng'] = $lng;
	}
}
else
{
	$lat = $_SESSION['lat'];
	$lng = $_SESSION['lng'];
}