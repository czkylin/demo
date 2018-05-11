<?php
namespace Member\Controller;
use Think\Controller;
class FjYdController extends Controller
{
	//获取药店列表
	public function yd_list()
	{
		$province_id = I('get.province_id', '');
		$hos_name = I('get.hos_name', '');
		$money_sort=I('get.money_sort','');
		$sale_sort=I('get.sale_sort','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//获取坐标
		include COMMON_PATH.'/Common/lat_lng.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		if($_SESSION['lat'] == "")
		{
			$this->redirect('?m=Member&c=FjYd&a=get_gps&type=yd_list');
		}

		//获取省数据
		$url = C("PATH_URL")."/interface/yc_member/province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$province_list = json_decode(post_json($url,$json),true);
		$this->assign('province_list',$province_list);// 赋值数据集

		//药店列表
		$url = C("PATH_URL")."/interface/yc_member/yd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"lat"=>"$lat",
			"lng"=>"$lng",
			"province_id"=>"$province_id",
			"hos_name"=>"$hos_name",
			"money_sort"=>"",
			"sale_sort"=>""
		);
		$json = json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$this->assign('yd_list',$yd_list);// 赋值数据集
		$this->assign("csstime",time());
		$this->display(); // 输出模板
	}
	
	//加载更多
	public function yd_list_append()
	{
		$page_num = I('get.page_num', '2');
		$province_id = I('get.province_id', '');
		$hos_name = I('get.hos_name', '');
		$money_sort = I('get.money_sort', '');
		$sale_sort = I('get.sale_sort', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取坐标
		include COMMON_PATH.'/Common/lat_lng.php';

		//获取药店列表
		$url = C("PATH_URL")."/interface/yc_member/yd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"lat"=>"$lat",
			"lng"=>"$lng",
			"province_id"=>"$province_id",
			"hos_name"=>"$hos_name",
			"money_sort"=>"$money_sort",
			"sale_sort"=>"$sale_sort"
		);
		$json=json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$this->assign('yd_list',$yd_list);
		include COMMON_PATH.'/Common/load_more.php';
	}
	//详情
	public function yd_detail()
	{
		$hos_id = I('get.hos_id','');
		$hos_address = I('get.hos_address','');
		$hos_pic = I('get.hos_pic','');
		$hos_name = I('get.hos_name','');

		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/yd_expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$expert_list = json_decode(post_json($url,$json),true);
		// var_dump($expert_list);
		$this->assign('expert_list',$expert_list);// 赋值数据集
		$this->assign('hos_id',$hos_id);// 赋值数据集
		$this->assign('hos_address',$hos_address);// 赋值数据集
		$this->assign('hos_pic',$hos_pic);// 赋值数据集
		$this->assign('hos_name',$hos_name);// 赋值数据集
		$this->display(); // 输出模板
	}

	//医生列表加载更多
	public function doc_list_append()
	{
		$hos_id = I('get.hos_id', '');
		$page_num = I('get.page_num', '');

		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/yd_expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$expert_list = json_decode(post_json($url,$json),true);
		$this->assign('expert_list',$expert_list);// 赋值数据集

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

		//获取gps
	public function get_gps($type)
	{
		$type = I('get.type', 'yd_list');
		$url_str = "m=Member&c=FjYd&a=".$type;
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

}