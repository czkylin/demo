<?php
namespace Home\Controller;
use Think\Controller;
class PresaleController extends Controller 
{

    public function detail()
    {
    	$homeid = I('get.homeid');

        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//终端排行

		$url = C("PATH_URL")."/interface/yc_member/ys_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$ys_list = json_decode(post_json($url,$json),true);
		foreach ($ys_list as $k=>$ys) 
		{
			$Pay_parameters['price'] = $ys['PAY_MONEY'];
			$Pay_parameters['order_id'] = $ys['RECORD_ID'];
			$Pay_parameters['apply_name'] = $ys['APPLY_OBJECT2'];
			$json = json_encode($Pay_parameters);
			$ys_list[$k]['PARAMETERS'] = urlencode(passport_encrypt($json, "123"));
		}

		$this->assign('homeid',$homeid);
		$this->assign('ys_list',$ys_list);
		$this->display();
    }


    public function detail_append()
    {
    	$page_num = I('get.page_num');

        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//终端排行
		$url = C("PATH_URL")."/interface/yc_member/ys_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$ys_list = json_decode(post_json($url,$json),true);
		foreach ($ys_list as $k=>$ys) 
		{
			$Pay_parameters['price'] = $ys['PAY_MONEY'];
			$Pay_parameters['order_id'] = $ys['RECORD_ID'];
			$Pay_parameters['apply_name'] = $ys['APPLY_OBJECT2'];
			$json = json_encode($Pay_parameters);
			$ys_list[$k]['PARAMETERS'] = urlencode(passport_encrypt($json, "123"));
		}

		$this->assign('ys_list',$ys_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
    }


}