<?php
namespace Expert\Controller;
use Think\Controller;
class IndexController extends Controller
{
	// 首页
	public function developing()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$this->display();
	}

	// 首页
	public function index()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$this->display();
	}

	public function read_pdf()
	{
        //$pdf = I('get.pdf', '');
    	$pdf="http%3A%2F%2Fyun.yk2020.com%2Fupload%2Fbook_pdf%2F2261.pdf";
    	$this->assign('pdf',$pdf);
        $this->display();
  	}
  	public function read_pdf2()
	{
    	$pdf="/weixin/Public/Uploads/pdf/1.pdf";
    	$this->assign('pdf',$pdf);
        $this->display();
  	}





}