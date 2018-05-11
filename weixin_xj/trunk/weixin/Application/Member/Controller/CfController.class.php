<?php
namespace Member\Controller;
use Think\Controller;
class CfController extends Controller
{
	//医生列表
	public function cf_list()
	{
		$member_id = I('get.member_id', '');
		$consult_id = I('get.consult_id', '');
		$expert_id = I('get.expert_id', '');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取处方列表
		$url = C("PATH_URL")."/interface/yc_member/cf_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"expert_id"=>"$expert_id"
		);
		$json=json_encode($data);
		$cf_list =json_decode(post_json($url,$json),true); 
		//print_R($cf_list);die;
		$this->assign('cf_list',$cf_list);// 医生列表
		$this->assign('member_id',$member_id);// 医生列表
		$this->assign('expert_id',$expert_id);
		$this->assign('consult_id',$consult_id);// 咨询id
		$this->display(); // 输出模板
	}

	//处方列表加载更多
	public function cf_list_append()
	{
		$expert_id = I('get.expert_id', '');
		
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/cf_list.aspx?access_token=".$token;
		$page_num = I('get.page_num', '2');
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"expert_id"=>"$expert_id"
		);
		$json=json_encode($data);
		$cf_list = json_decode(post_json($url,$json),true);
		$this->assign('cf_list',$cf_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//处方去下订单
	public function xiadan()
	{
		$cf_id = I('get.cf_id', '');

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		$url = C("PATH_URL")."/interface/yc_member/member_cf_order_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"cf_id"=>"$cf_id"
		);
		$json=json_encode($data);
		$xiadan =json_decode(post_json($url,$json),true);

		if($xiadan['order_id'])
		{
			//获取当前用户 卡号 手机号 
	        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
	        $json=json_encode($data);
	        $user_info = json_decode(post_json($url,$json),true);

	         //当前用户手机号
	        $mobile = $user_info['MEMBER_MOBILE'];
	        $card_number = $user_info['CARD_NUMBER'];

	        if($card_number)
	        {
	            //获取卡余额
	            $url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
	            $data = array
	            (
	                "mobile"=>"$mobile"
	             );
	            $json=json_encode($data);
	            $card_yue = json_decode(post_json($url,$json),true);

	        }
			$data = array
			(
				"out_trade_no"=>$xiadan['order_id'],
				"subject"=>"电子处方",
				"total"=>$xiadan['order_money'],
				"consult_id"=>"",
				"status"=>"3",
				"doc_id"=>"",
	            "card_number"=>$card_number,
	            "card_money"=>$card_yue['cur_money']

			);
			$json= json_encode($data);
	       // print_R($data);die;
			$json= urlencode(passport_encrypt($json, "123"));
			header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
		}else{
			redirect(U('Order/order_list'));
		}

	}

	//处方详细内容
	public function cf_detail()
	{

		$record_id = I('get.record_id', '');
		$hos_id = I('get.hos_id', '');
		$status = I('get.order_status', '');

		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//获取处方订单详情页
		$url = C("PATH_URL")."/interface/yc_member/cf_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"record_id"=>"$record_id",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$cf_detail =json_decode(post_json($url,$json),true);
		foreach ($cf_detail as $key => $value)
		{
			$sum = $sum+($value['PRODUCT_MONEY']*$value['PRODUCT_NUM']);
		}
		$this->assign('cf_pic',$cf_pic);
		$this->assign('sum',$sum);
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
		$this->assign('status',$status);
		$this->assign('doc_sign',$cf_detail[0]['DOC_SIGNATURE']);
		$this->assign('create_date',$cf_detail[0]['CREATE_DATE']);
		$this->display(); // 输出模板

		/*原始数据开始
		// $cf_pic = I('get.cf_pic', '');//会员id
		// $record_id = I('get.record_id', '');
		// $order_status = I('get.order_status', '');
		// $token = A_token();
		
		// //获取openid
		// include MODULE_PATH.'/Common/open_id.php';

		// //验证手机是否绑定
		// include MODULE_PATH.'/Common/check_band.php';

		// 		//获取坐标
		// include COMMON_PATH.'/Common/lat_lng.php';
		// if($_SESSION['lat'] == "")
		// {
		// 	$this->redirect('?m=Member&c=Cf&a=get_gps&type=cf_detail&record_id='.$record_id.'&cf_pic='.$cf_pic.'&order_status='.$order_status);
		// }

		// //获取订单的详情页
		// $url = C("PATH_URL")."/interface/yc_member/cf_product_list.aspx?access_token=".$token;
		// $data = array
		// (
		// 	"openid"=>"$openid",
		// 	"record_id"=>"$record_id"
		// );
		// $json=json_encode($data);
		// $product_list =json_decode(post_json($url,$json),true);

		// $this->assign('cf_pic',$cf_pic);
		// $this->assign('product_list',$product_list);

		// //获取省数据
		// $url = C("PATH_URL")."/interface/yc_member/province_list.aspx?access_token=".$token;
		// $data = array
		// (
		// 	"openid"=>"$openid"
		// );
		// $json=json_encode($data);
		// $province_list = json_decode(post_json($url,$json),true);
		// $this->assign('province_list',$province_list);// 赋值数据集


		// //获取药店的信息
		// $url = C("PATH_URL")."/interface/yc_member/yd_list.aspx?access_token=".$token;
		// $data = array
		// (
		// 	"openid"=>"$openid",
		// 	"lat"=>"$lat",
		// 	"lng"=>"$lng",
		// 	"province_id"=>"",
		// 	"hos_name"=>"",
		// 	"page_num"=>"1",
		// 	"money_sort"=>"",
		// 	"sale_sort"=>""
		// );
		// $json = json_encode($data);
		// $yd_list = json_decode(post_json($url,$json),true);
		// $this->assign('yd_list',$yd_list);// 赋值数据集
		// $this->assign('record_id',$record_id);
		// $this->assign('order_status',$order_status);
		// $this->display(); // 输出模板
		原始数据开始*/
	}

	//处方详情中药店列表加载更多
	public function cf_detail_append()
	{
		$page_num = I('get.page_num', '2');
		$cf_pic = I('get.cf_pic', '');//会员id
		$record_id = I('get.record_id', '');
		$province_id = I('get.province_id', '');
		$hos_name = I('get.hos_name', '');

		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取药店的信息
		$url = C("PATH_URL")."/interface/yc_member/yd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"lat"=>"$lat",
			"lng"=>"$lng",
			"province_id"=>"$province_id",
			"hos_name"=>"$hos_name",
			"page_num"=>"$page_num",
			"money_sort"=>"",
			"sale_sort"=>""
		);

		$json = json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$this->assign('yd_list',$yd_list);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';

	}
	public function add_ok()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$record_id = I('post.record_id', '');
		$all_price = I('post.all_price', '');
		$hos_id = I('post.hos_id', '');

		//往处方表及及子表里插入产品信息
		$product_arr = I('post.product', '');
		$product_values = "";
		$product_num = "";
		$product_moneys = "";
		for( $i = 0; $i < count($product_arr); $i ++)
		{
			if($i != count($product_arr) - 1)
			{
				$product_values = $product_values.$product_arr[$i].",";
				$product_num = $product_num.I('post.num_'.$product_arr[$i], '').",";
				$product_moneys = $product_moneys.I('post.money_'.$product_arr[$i], '').",";
				$all_price = $all_price + I('post.money_'.$product_arr[$i])*I('post.num_'.$product_arr[$i]);
			}
			else
			{
				$product_values = $product_values.$product_arr[$i];
				$product_num = $product_num.I('post.num_'.$product_arr[$i], '');
				$product_moneys = $product_moneys.I('post.money_'.$product_arr[$i], '');
				$all_price= $all_price +I('post.money_'.$product_arr[$i])*I('post.num_'.$product_arr[$i]);	
			}
		}

		$time2 = date("Y-m-d H:i:s",time());
		//获取订单号
		$url = C("PATH_URL")."/interface/yc_member/cf_order_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_money"=>"$all_price",
			"order_date"=>"$time2",
			"order_status"=>"0",
			"create_date"=>"$time2",
			"order_name"=>"购买药品",
			"record_id"=>"$record_id",
			"hos_id"=>"$hos_id",
			"product_values"=>"$product_values",
			"product_num"=>"$product_num",
			"product_moneys"=>"$product_moneys"
		);

		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		$order_sn = $data['order_id'];

		if($order_sn == '')
		{
			echo "系统错误";
			exit;
		}
		else
		{
			//购买参数转码加密
			$serve_name = "购买药品";
			$data = array
			(
				"out_trade_no"=>$order_sn,
				"subject"=>$serve_name,
				"total"=>$all_price,
				"consult_id"=>0,
				"status"=>2,
				"doc_id"=>0
			);
			
			$json= json_encode($data);
			$json= urlencode(passport_encrypt($json, "123"));
			header("Location:/weixin/Application/Member/weixin_wap/js_api_call.php?json=$json");
		}
	}

	public function onlin_play()
	{
		$order_id = I('get.out_trade_no', '');
		$outtradeno = I('get.outtradeno', '');
		$price = I('get.total', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url=C("PATH_URL")."/interface/yc_member/online_pay.aspx?access_token=".$token;
		//echo  $openid;
		$data=array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id",
			"serial_number"=>"$outtradeno",
			"order_status"=>"1"
		);

		$json=json_encode($data);
		$info = json_decode(post_json($url,$json),true);
		$this->redirect("?m=Member&c=Order&a=order_list");
	}

	public function success()
	{
		$this->display();
	}

	//获取gps
	public function get_gps($type)
	{
		$type = I('get.type', 'cf_detail');
		$cf_pic = I('get.cf_pic', '');//图片
		$record_id = I('get.record_id', '');//记录ID
		$order_status = I('get.order_status', '');//订单状态

		$url_str = "m=Member&c=Cf&a=".$type."&cf_pic=".$cf_pic."&record_id=".$record_id."&order_status=".$order_status;
		$this->assign('url_str', $url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}
}