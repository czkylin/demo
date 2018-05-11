<?php
//验证手机是否绑定
$zt = band_member_status();
if($zt == "false")
{
	$this->redirect('?m=Member&c=User&a=band_phone');
}
if($zt == "3")
{
    $this->redirect('?m=Member&c=Follow&a=index');
}