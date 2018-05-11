<?php
namespace Expert\Controller;
use Think\Controller;
class FuwuController extends Controller
{
	//服务记录列表
	public function fuwu_list()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取服务记录信息
		$url = C("PATH_URL")."/interface/yc_doc/jz_info_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"1"
		);
	    $json=json_encode($data);
		$fuwu_jilu = json_decode(post_json($url,$json),true);
		$this->assign('fuwu_jilu',$fuwu_jilu);// 赋值数据集
		$this->display(); // 输出模板
	}

	//服务记录列表加载
	public function fuwu_list_append()
	{
		$page_num = I('get.page_num','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取服务记录信息
		$url = C("PATH_URL")."/interface/yc_doc/jz_info_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$fuwu_jilu = json_decode(post_json($url,$json),true);
		// var_dump($url,$json);die;
		$this->assign('fuwu_jilu',$fuwu_jilu);// 赋值数据集

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
	
}