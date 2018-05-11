<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller
{
	//医生列表
	public function member_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = "http://weixin.yk2020.com/interface/yc_hos/member_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$member_list =json_decode(post_json($url,$json),true);
		$this->assign('member_list',$member_list);// 医生列表
		$this->display(); // 输出模板
	}
	
	//医生列表加载更多
	public function member_list_append()
	{
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = "http://weixin.yk2020.com/interface/yc_hos/member_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$member_list =json_decode(post_json($url,$json),true);
		$this->assign('member_list',$member_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
}