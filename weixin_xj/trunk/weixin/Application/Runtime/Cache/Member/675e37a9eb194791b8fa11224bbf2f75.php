<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta name="share-title" content="">
<title>获取地理位置</title>

<!--meta-->

</head>

<body class="ui-mobile-viewport ui-overlay-c">
<div style=" position:fixed; left:31%; top:45%; width:40%; text-align:center;"><img src="/weixin/Application/Member/View/images/icon/zb.gif" /><br>
  获取地理位置....</div>
<script>

	function getLocation()
	{
		if (navigator.geolocation)

		{

			navigator.geolocation.getCurrentPosition(getPositionSuccess, getPositionError);

		}

		else

		{

			alert("浏览器不支持获取坐标位置");

		}

	}

	function getPositionSuccess(position)

	{

		window.location.replace("/weixin/index.php?<?php echo ($url_str); ?>&lat=" + position.coords.latitude + "&lng=" + position.coords.longitude);

	}

	function getPositionError(error)

	{

		switch(error.code)

		{

			case error.TIMEOUT :

			window.location.replace("/weixin/index.php?<?php echo ($url_str); ?>&lat=0&lng=0");

			break;

			case error.PERMISSION_DENIED :

			window.location.replace("/weixin/index.php?<?php echo ($url_str); ?>&lat=0&lng=0");

			break;

			case error.POSITION_UNAVAILABLE : 

			window.location.replace("/weixin/index.php?<?php echo ($url_str); ?>&lat=0&lng=0");

			break;

		}

	}

		getLocation();



	</script>
</body>
</html>