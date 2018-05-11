<?php
namespace Member\Controller;
use Think\Controller;
class CardController extends Controller
{
	//首页
	public function n_index()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		if($openid == "0" || $openid == " " || $openid == "1")
		{
			
			$this->redirect('?m=Member&c=Follow&a=index');
		}	
		$this->display();
	}

	//首页
	public function liucheng()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		if($openid == "0" || $openid == " " || $openid == "1")
		{
			
			$this->redirect('?m=Member&c=Follow&a=index');
		}	
		$this->display();
	}

	//首页
	public function tese()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		if($openid == "0" || $openid == " " || $openid == "1")
		{
			
			$this->redirect('?m=Member&c=Follow&a=index');
		}	
		$this->display();
	}

	//首页
	public function xinxi()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		if($openid == "0" || $openid == " " || $openid == "1")
		{
			
			$this->redirect('?m=Member&c=Follow&a=index');
		}	
		$this->display();
	}

	
	//贵宾卡-商品信息
	public function card980Information()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//贵宾卡-服务特色
	public function Features980()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//贵宾卡-服务流程
	public function Process980()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}

	//金卡-商品信息
	public function card1980Information()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//金卡-服务特色
	public function Features1980()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//金卡-服务流程
	public function Process1980()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}

	//白金卡-商品信息
	public function card9800Information()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//白金卡-服务特色
	public function Features9800()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//白金卡-服务流程
	public function Process9800()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}

	//砖石卡-商品信息
	public function card99000Information()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//砖石卡-服务特色
	public function Features99000()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//砖石卡-服务流程
	public function Process99000()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}

}