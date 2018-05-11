<?php
//验证手机是否绑定
$zt= band_doc_status();
//$zt = $band_info['band_flag'];
$error = $band_info['error_code'];
if($zt == "false")
{
	$this->redirect('?m=Expert&c=User&a=band_phone');
}


