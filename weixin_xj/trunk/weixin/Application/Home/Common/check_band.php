<?php
//验证手机是否绑定
$zt = band_status();
if($zt == "false")
{
	$this->redirect('?m=Home&c=User&a=band_phone');
}