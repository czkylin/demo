<?php
namespace Member\Controller;
use Think\Controller;
class FollowController extends Controller
{
	//获取订单列表
	public function index()
	{
		header("Content-type: text/html; charset=utf-8"); 
		$this->display(); // 输出模板
	}

	public function yure()
	{
		$this->display(); // 输出模板
	}
	
}