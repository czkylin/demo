<?php
namespace Expert\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8");
class HuzhuController extends Controller
{
	public function fx()
    {
        //获取平台的access_token
		$token = A_token();


		//获取openid
        include MODULE_PATH.'/Common/open_id.php';
        $expert_id = I('get.expert_id','');
        $yw_id = I('get.yw_id','2');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($expert_id))
		{
			//获取三级分销信息
			$url = C("PATH_URL")."/interface/app_expert/three_sale_info_list.aspx?access_token=".$token;
			$data = array
			(
				"expert_id"=>"$expert_id",
				"yw_id"=>"$yw_id"
			);
		}
		else
		{

			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

			 //获取三级分销信息
	        $url = C("PATH_URL")."/interface/yc_member/three_sale_info_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	        );
		}

		$json=json_encode($data);
		$three_list['list'] = json_decode(post_json($url,$json),true);
		$three_list['count'] = count($three_list['list']);

		
		//没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($expert_id))
		{
			
			//获取二级分销信息
			$url = C("PATH_URL")."/interface/app_expert/two_sale_list.aspx?access_token=".$token;
			$data = array
			(
				"expert_id"=>"$expert_id",
				"yw_id"=>"$yw_id"				
			);
		}
		else
		{

			 //获取二级分销信息
	        $url = C("PATH_URL")."/interface/yc_member/two_sale_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	        );
		}

		$json=json_encode($data);
		$two_list = json_decode(post_json($url,$json),true);
		$two_list['list'] = json_decode(post_json($url,$json),true);
		$two_list['count'] = count($two_list['list']);

		$this->assign("three_list",$three_list);
		$this->assign("two_list",$two_list);
		$this->display();
    }
}