<?php
namespace Home\Controller;
use Think\Controller;
class HosController extends Controller
{
	//获取医院列表
	public function hos_list()
	{
		//获取坐标
		include COMMON_PATH.'/Common/lat_lng.php';

		$level_id = I('get.level_id', '');
		$province_id = I('get.province_id', '');
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		// if($_SESSION['lat'] == "")
		// {
		// 	$this->redirect('?m=Home&c=Hos&a=get_gps');
		// }

		//获取省数据
		$url = C("PATH_URL")."/interface/yc_hos/province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		
		$province_list = json_decode(post_json($url,$json),true);
		//print_r($province_list);die;

		$this->assign('province_list',$province_list);// 赋值数据集

		//获取医院等级
		$url = C("PATH_URL")."/interface/yc_hos/level_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$level_list = json_decode(post_json($url,$json),true);
		$this->assign('level_list',$level_list);// 赋值数据集

		//获取医院列表
		$url = C("PATH_URL")."/interface/yc_hos/hos_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"lat"=>"$lat",
			"lng"=>"$lng",
			"level_id"=>"$level_id",
			"province_id"=>"$province_id"
		);
		$json=json_encode($data);
		$hos_list = json_decode(post_json($url,$json),true);
		//echo $json;
		//print_R($hos_list);die;
		$this->assign('hos_list',$hos_list);// 赋值数据集
		$stly = "";
		if(count($hos_list) < 5)
		{
			$stly = "style=\"display:none\"";
		}
		$this->assign('stly',$stly);
		$this->assign('level_id',$level_id);
		$this->assign('province_id',$province_id);

		$this->display(); // 输出模板
	}

	//获取gps
	public function get_gps()
	{
		$url_str = "m=Home&c=Hos&a=hos_list";
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

	//加载更多
	public function hos_list_append()
	{
		$lat = $_SESSION['lat'];
		$lng = $_SESSION['lng'];
		$page_num = I('get.page_num', '');
		$level_id = I('get.level_id', '');
		$province_id = I('get.province_id', '');
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医院列表
		$url = C("PATH_URL")."/interface/yc_hos/hos_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"lat"=>"$lat",
			"lng"=>"$lng",
			"level_id"=>"$level_id",
			"province_id"=>"$province_id"
		);
		$json=json_encode($data);
		$hos_list = json_decode(post_json($url,$json),true);
		
		$this->assign('hos_list',$hos_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//医院详细页面
	public function hos_detail()
	{
		$hos_id = I('get.hos_id', '');

		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_hos/hos_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$hos_info = json_decode(post_json($url,$json),true);
		$hos['HOS_ID'] = $hos_info['HOS_ID'];
		$hos['HOS_NAME'] = $hos_info['HOS_NAME'];
		$hos['LEVEL_NAME'] = $hos_info['LEVEL_NAME'];
		$hos['HOS_ADDRESS'] = $hos_info['HOS_ADDRESS'];
		$hos['HOS_PHONE'] = $hos_info['HOS_PHONE'];
		$hos['HOS_DESC'] = strip_tags(html_entity_decode($hos_info['HOS_DESC']));
		$hos['HOS_PIC'] = $hos_info['HOS_PIC'];
		$this->assign('hos',$hos);
		$this->display(); // 输出模板
	}

	//获取收入列表
	public function money_list()
	{
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_hos/hos_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$money_list = json_decode(post_json($url,$json),true);
		if($money_list['error_code']=="")
		{
			$this->assign('money_list',$money_list);
		}
		$stly = "";
		if(count($money_list) < 5)
		{
			$stly = "style=\"display:none\"";
		}
		$this->assign('stly',$stly);
		$this->display(); // 输出模板
	}

	//获取收入加载更多
	public function money_list_append()
	{
		$token = A_token();
		$page_num = I('get.page_num', '');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_hos/hos_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$money_list = json_decode(post_json($url,$json),true);
		if($money_list['error_code']=="")
		{
			$this->assign('money_list',$money_list);
		}
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//药店处方

	public function yd_cf_list(){
		//获取平台的access_token
		$token = A_token();

		$page_num = I('get.page_num', '');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生列表
		$url = "http://weixin.yk2020.com/interface/yc_hos/yd_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"record_id" =>""
		);
		$json=json_encode($data);
		$cf_list =json_decode(post_json($url,$json),true);
		$this->assign("cf_list",$cf_list);
		$this->display(); // 输出模板
	}

	//药店处方

	public function yd_cf_list_append(){
		//获取平台的access_token
		$token = A_token();

		$page_num=I("get.page_num","2");

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生列表
		$url = "http://weixin.yk2020.com/interface/yc_hos/yd_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"record_id" =>""
		);
		$json=json_encode($data);
		$cf_list =json_decode(post_json($url,$json),true);
		$this->assign("cf_list",$cf_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//推荐医生消费明细
	public function expert_cf_list(){
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取平台的access_token
		$token = A_token();

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_hos/tj_doc_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign("money_list",$data);
		$this->display();
	}

	//推荐会员消费明细加载更多
	public function expert_cf_list_append()
	{
		$token = A_token();
		$page_num = I('get.page_num', '');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_hos/tj_doc_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$money_list = json_decode(post_json($url,$json),true);
		if($money_list['error_code']=="00025"){

		}else{
			$this->assign('money_list',$money_list);
		}
		
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
}