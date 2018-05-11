<?php
namespace Home\Controller;
use Think\Controller;
class ShouceController extends Controller
{
	public function bigBook()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display(); // 输出模板
	}

	public function caiye()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display(); // 输出模板
	}

	public function smallBook()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display(); // 输出模板
	}

	public function zheye()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display(); // 输出模板
	}
	
}