<?php
namespace Home\Controller;
use Think\Controller;
class ZdController extends Controller 
{
	
    public function rank_list()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		
		//终端排行

		$url = C("PATH_URL")."/interface/yc_hos/yd_sale_pm_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$rank_list = json_decode(post_json($url,$json),true);

		
		$this->assign('list',$rank_list);
		$this->display();
    }

    public function rank_list_append()
    {
    	$page_num = I('get.page_num','');

        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//终端排行

		$url = C("PATH_URL")."/interface/yc_hos/yd_sale_pm_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$rank_list = json_decode(post_json($url,$json),true);

		
		$this->assign('list',$rank_list);
		include COMMON_PATH.'/Common/load_more.php';
    }

}