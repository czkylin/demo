<?php
namespace Expert\Controller;
use Think\Controller;
class OrderController extends Controller
{
	//获取阅片订单列表
	public function order_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/order_list.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$order_list = json_decode(post_json($url,$json),true);
//print_R($order_list);die;
		$count = count($order_list);
		$this->assign('order_list',$order_list);// 赋值数据集
		$this->assign('empty',"暂无数据");
		$this->assign('count',$count);// 赋值数据集
		$this->display(); // 输出模板
	}

	//加载更多
	public function order_list_append()
	{
		$page_num = I('get.page_num', '2');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医院列表
		$url = C("PATH_URL")."/interface/yc_doc/order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$order_list = json_decode(post_json($url,$json),true);
		$this->assign('order_list',$order_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//获取阅片订单详细信息
	public function order_detail()
	{
		$order_id = $_GET['order_id'];//获取get变量

		//获取平台token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/order_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id"
		);
		$json=json_encode($data);
		$order_info = json_decode(post_json($url,$json),true);
		//print_r($order_info );die;
		$order['ORDER_ID'] = $order_info[0]['ORDER_ID'];
		$order['ORDER_STATUS'] = $order_info[0]['ORDER_STATUS'];
		$order['SERVE_NAME'] = $order_info[0]['SERVE_NAME'];
		$order['ORDER_NAME'] = $order_info[0]['ORDER_NAME'];
		$order['ORDER_DATE'] = $order_info[0]['ORDER_DATE'];
		$order['CREATE_DATE'] = $order_info[0]['CREATE_DATE'];
		$order['ORDER_MONEY'] = $order_info[0]['ORDER_MONEY'];
		$order['HOS_NAME'] = $order_info[0]['HOS_NAME'];
		$order['MEMBER_NAME'] = $order_info[0]['MEMBER_NAME'];
		$order['HOS_ID'] = $order_info[0]['HOS_ID'];
		$order['HOS_PHONE'] = $order_info[0]['HOS_PHONE'];
		$this->assign('order',$order);// 赋值数据集
		$this->display(); // 输出模板
	}

	// 我的收入总计
	public function money_list()
	{
		$token=A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$money_list = json_decode(post_json($url,$json),true);
		$this->assign('money_list',$money_list);
		$this->display(); // 输出模板
	}

	public function money_list_append()
	{
		//获取平台token
		$token=A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$page_num = I('get.page_num', '2');
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$money_list = json_decode(post_json($url,$json),true);
		$this->assign('money_list',$money_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	// 我的收入总计
	public function money_sum()
	{
		//获取平台token
		$token=A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$url = C("PATH_URL")."/interface/yc_doc/money_sum.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$money_sum = json_decode(post_json($url,$json),true);
		
		$total = $money_sum['MONEY_SUM'];
		$this->assign('total',$total);
		$this->display();
	}

	//心电阅片订单列表
	public function xdyp_list()
	{
		//获取平台token
		$token=A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$url = C("PATH_URL")."/interface/yc_member/order_xd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json = json_encode($data);
		$xdyp_list = json_decode(post_json($url,$json),true);
		$this->assign('xdyp_list',$xdyp_list);
		$this->assign('openid',$openid);
		$this->display();
	}

	//心电阅片订单列表
	public function xdyp_list_append()
	{
		//获取平台token
		$token=A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$page_num = I('get.page_num','2');

		$url = C("PATH_URL")."/interface/yc_member/order_xd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json = json_encode($data);
		$xdyp_list = json_decode(post_json($url,$json),true);
		$this->assign('xdyp_list',$xdyp_list);
		$this->assign('openid',$openid);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//心电阅片订单详情
	public function xdyp_detail()
	{
		//获取平台token
		$token=A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$order_id = I('get.order_id','');

		$url = C("PATH_URL")."/interface/yc_member/order_xd_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id"
		);
		$json = json_encode($data);
		$xdyp_detail = json_decode(post_json($url,$json),true);
		if($xdyp_detail['PAY_TIME'])
		{
			if($xdyp_detail['PAY_TIME'] == '0')
			{
				$end_time = date("Y-m-d", strtotime("+1 months", strtotime($time)));
			}
			elseif($xdyp_detail['PAY_TIME'] == '1')
			{
				$end_time = date("Y-m-d", strtotime("+3 months", strtotime($time)));
			}
			else
			{
				$end_time = $xdyp_detail['PAY_TIME'];
			}
			
		}
		$xdyp_detail['END_TIME'] = $end_time;
		$this->assign('xdyp_detail',$xdyp_detail);
		$this->assign('openid',$openid);
		$this->display();
	}

}