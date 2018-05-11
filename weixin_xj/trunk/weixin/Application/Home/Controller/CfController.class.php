<?php
namespace Home\Controller;
use Think\Controller;
class CfController extends Controller
{
	//处方列表
	public function cf_list()
	{
	
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生列表
		$url = "http://weixin.yk2020.com/interface/yc_hos/cf_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"record_id" =>""
		);
		$json=json_encode($data);
		$cf_list =json_decode(post_json($url,$json),true);
		if($cf_list['error_code'])
		{
			$this->assign('cf_list',"");
		}
		else
		{
			$this->assign('cf_list',$cf_list);
		}
		$this->display(); // 输出模板
	}
	//处方列表加载更多
	public function cf_list_append()
	{
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/cf_list.aspx?access_token=".$token;
		$page_num = I('get.page_num', '2');
		$record_id = I('get.cf_id', '');
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"record_id" => "$record_id"
		);
		$json=json_encode($data);
		$cf_list = json_decode(post_json($url,$json),true);
		if($cf_list['error_code']){
			$this->assign('cf_list',"");
		}else{
			$this->assign('cf_list',$cf_list);
		}
		
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';

	}

	//处方详细内容
	public function cf_detail()
	{

		//$cf_pic = I('get.cf_pic', '');
		$record_id = I('get.record_id', '');
		//$order_status = I('get.order_status', '');
		$hos_id = I('get.hos_id', '');
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取处方订单详情页
		$url = "http://weixin.yk2020.com/interface/yc_hos/cf_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"record_id"=>"$record_id",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$cf_detail =json_decode(post_json($url,$json),true);
		$this->assign('cf_pic',$cf_pic);
		$this->assign('cf_detail',$cf_detail);
		$this->assign('hos_name',$cf_detail[0]['HOS_NAME']);
		$this->assign('yd_name',$cf_detail[0]['YD_NAMME']);
		$this->assign('cf_content',$cf_detail[0]['CF_CONTENT']);
		$this->assign('cf_pic',$cf_detail[0]['CF_PIC']);
		$this->assign('cf_id',$cf_detail[0]['CF_ID']);
		$this->assign('expert_name',$cf_detail[0]['EXPERT_NAME']);
		$this->assign('hos_name',$cf_detail[0]['HOS_NAME']);
		$this->assign('yd_phone',$cf_detail[0]['YD_PHONE']);
		$this->assign('yd_address',$cf_detail[0]['YD_ADDRESS']);
		$this->assign('lng_point',$cf_detail[0]['LNG_POINT']);
		$this->assign('lat_point',$cf_detail[0]['LAT_POINT']);
		$this->display(); // 输出模板
	}
	
}