<?php
namespace Expert\Controller;
use Think\Controller;
class FollowController extends Controller
{
	//获取引导页面
	public function index()
	{
		header("Content-type: text/html; charset=utf-8"); 
		$this->display(); // 输出模板
	}

	
}