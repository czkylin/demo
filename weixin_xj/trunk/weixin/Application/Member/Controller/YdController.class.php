<?php
namespace Member\Controller;
use Think\Controller;
class YdController extends Controller
{
	//获取医院列表
	public function yd_list()
	{
		//$_SESSION['m_openid'] = "oXUWms06UE0utwCS3wgzq6NGQYuE";
		$province_id = I('get.province_id', '');
		$hos_name = I('get.hos_name', '');
		$money_sort=I('get.money_sort','');
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
			$this->redirect('?m=Member&c=Yd&a=get_gps&type=yd_list');
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

		//获取省数据
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

		//获取医院列表
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

	//获取单个药店药品列表
	public function yd_product_list()
	{
		$hos_id = I('get.hos_id', '');
		$product_name = I('get.product_name', '');
		$hos_name = I('get.hos_name', '');
		$hos_pic = I('get.hos_pic', '');
		$type= I('get.type', '');

		//获取平台的access_token
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/product_type_list.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$type_list = json_decode(post_json($url,$json),true);
		$this->assign('type_list',$type_list);// 赋值数据集
		
		//获取单个药店药品列表满足的查询条件
		$url = C("PATH_URL")."/interface/yc_member/yd_product_list.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"product_name" => "$product_name",
			"hos_id" => "$hos_id",
			"type_id" => ""
		);
		$json=json_encode($data);
		$product_list = json_decode(post_json($url,$json),true);
		$this->assign('product_list',$product_list);// 赋值数据集
		$this->assign('product_name',$product_name);
		$this->assign('hos_id',$hos_id);
		$this->assign('hos_name',$hos_name);
		$this->assign('hos_pic',$hos_pic);

		//获取购物车数量
		$url = C("PATH_URL")."/interface/yc_member/cart_num.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json = json_encode($data);
		$cart_num = json_decode(post_json($url,$json),true);
		$this->assign('cart_num',$cart_num);

		//指定模板
		if($type==1)
		{
		$template_html = "Yd/search_product_list";

		}
		$this->display($template_html); // 输出模板
	}

	//订单列表加载更多
	public function yd_product_list_append()
	{
		$page_num = I('get.page_num', '2');
		$hos_id = I('get.hos_id', '');
		$product_name = I('get.product_name', '');
		$type_id = I('get.type_id', '');

		//获取平台的access_token
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/yd_product_list.aspx?access_token=".$token;
		$page_num=$_GET['page_num'];
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"product_name" => "$product_name",
			"hos_id" => "$hos_id",
			"type_id" => "$type_id"
		);
		$json=json_encode($data);
		$product_list = json_decode(post_json($url,$json),true);
		$this->assign('product_list',$product_list);
		$this->assign('hos_id',$hos_id);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


		//获取全站药品 搜索列表
	public function search_product_list()
	{
		//获取平台的access_token
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		$product_name = I('get.product_name', '');
		$money_sort=I('get.money_sort','');
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/product_type_list.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid"

		);
		$json=json_encode($data);
		$type_list = json_decode(post_json($url,$json),true);
		$this->assign('type_list',$type_list);// 赋值数据集

		//获取全站药品列表满足的查询条件
		$url = C("PATH_URL")."/interface/yc_member/search_product_name.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"product_name" => "$product_name",
			"money_sort"=>"$money_sort",
			"type_id" => ""
		);
		$json=json_encode($data);
		//echo $json;die;
		$product_list = json_decode(post_json($url,$json),true);
		//print_r($product_list);die;
		$this->assign('product_name',$product_name);// 赋值
		$this->assign('product_list',$product_list);// 赋值数据集
		$this->display(); 
	}

	//获取全站药品 加载更多
	public function search_product_list_append()
	{
		$page_num = I('get.page_num', '2');
		$product_name = I('get.product_name', '');
		$type_id = I('get.type_id', '');
		$money_sort=I('get.money_sort','');
		//获取平台的access_token
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/search_product_name.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"product_name" => "$product_name",
			"money_sort"=>"$money_sort",
			"type_id" => ""
		);
		$json=json_encode($data);
		$product_list = json_decode(post_json($url,$json),true);
		$this->assign('product_list',$product_list);
		$this->assign('money_sort',$money_sort);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}



	//产品详细页面
	public function product_content()
	{
		$hos_id = I('get.hos_id', '');
		$product_id = I('get.product_id', '');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/product_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
			"product_id"=>"$product_id"
		);
		$json=json_encode($data);
		//echo $json;
		$product_info = json_decode(post_json($url,$json),true);
		//var_dump($product_info);die;
		$product['product_money'] = $product_info['PRODUCT_MONEY'];
		$product['product_unit'] = $product_info['PRODUCT_UNIT'];
		$product['ty_name'] = $product_info['TY_NAME'];
		$product['product_name'] = $product_info['PRODUCT_NAME'];
		$product['ty_name'] = $product_info['TY_NAME'];
		$product['product_pic'] = $product_info['PRODUCT_PIC'];
		$product['pz_num'] = $product_info['PZ_NUM'];
		$product['product_content'] = html_entity_decode($product_info['PRODUCT_CONTENT']);
		$product['product_jx'] = $product_info['PRODUCT_JX'];
		$product['product_gg'] = $product_info['PRODUCT_GG'];
		$product['product_cf'] = $product_info['PRODUCT_CF'];
		$product['product_address'] = $product_info['PRODUCT_ADDRESS'];
		$product['product_md'] = $product_info['PRODUCT_MD'];
		$product['product_ingre'] = $product_info['PRODUCT_INGRE'];
		$product['product_zz'] = $product_info['PRODUCT_ZZ'];
		$product['product_yl'] = $product_info['PRODUCT_YL'];
		$product['product_yf'] = $product_info['PRODUCT_YF'];
		$product['stype_id'] = $product_info['STYPE_ID'];
		$product['product_num'] = $product_info['PRODUCT_NUM'];
		$product['product_kc_num'] = $product_info['KC_NUM'];
		
		$this->assign('product',$product);
		$this->assign('product_id',$product_id);
		$this->assign('hos_id',$hos_id);


		//获取推荐产品列表
		$url = C("PATH_URL")."/interface/yc_member/tj_product_list.aspx?access_token=".$token;
		$page_num = $_GET['page_num'];
		$data = array
		(
			"openid"=>"$openid",
			"stype_id" => $product['stype_id']
		);
		$json=json_encode($data);
		$tj_list = json_decode(post_json($url,$json),true);
		$this->assign('tj_list',$tj_list);

		//获取图片列表
		$url = C("PATH_URL")."/interface/yc_member/product_pic_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"product_id"=>"$product_id"
		);
		$json = json_encode($data);
		$pic_list = json_decode(post_json($url,$json),true);
		$this->assign('pic_list', $pic_list);

		//获取购物车数量
		$url = C("PATH_URL")."/interface/yc_member/cart_num.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json = json_encode($data);
		$cart_num = json_decode(post_json($url,$json),true);
		$this->assign('cart_num',$cart_num);
		$this->display(); // 输出模板
	}

	//获取gps
	public function get_gps($type)
	{
		$type = I('get.type', 'yd_list');
		$url_str = "m=Member&c=Yd&a=".$type;
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

	//加入购物车
	public function cart_add()
	{
		$product_id = I('get.product_id', '');
		$hos_id = I('get.hos_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_member/product_cart_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"product_id"=>"$product_id",
			"hos_id"=>"$hos_id",
			"product_num"=>"1"
		);
		$json = json_encode($data);
		$data = post_json($url,$json);
		$str = json_encode($data);
		echo $str;
	}

	//购买服务
	public function product_buy()
	{
		$hos_id = I('post.hos_id', '');
		$product_id = I('post.product_id', '');
		$ty_name = I('post.ty_name', '');
		$price = I('post.product_money','');
		$time = date("Y-m-d H:i:s",time());

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/order_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>$openid,
			"order_money"=>$price,
			"column_name"=>"hos_id",
			"column_value"=>$hos_id,
			"order_date"=>$time,
			"order_status"=>"0",
			"create_date"=>$time,
			"order_name" =>$ty_name,
			"record_id"=>$product_id
		);
		$json=json_encode($data);
		$info = json_decode(post_json($url,$json),true);
		//购买参数转码加密
		$data = array
		(
			"out_trade_no"=>$info['order_id'],
			"subject"=>$ty_name,
			"total"=>$price,
			"consult_id"=>0,
			"status"=>3,
			"doc_id"=>0
		);
		$json= json_encode($data);
		//echo "$json";die;
		$json= urlencode(passport_encrypt($json, "123"));
		header("Location:/weixin/Application/Member/weixin_wap/js_api_call.php?json=$json");
	}

	public function cart_buy()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//批量提交购物车产品
		$cart_arr = I('post.checked_id', '');
		//print_r($cart_arr);die;
		$product_values = "";
		$product_num = "";
		$product_moneys = "";
		$hos_id = "";
		$cart_str = "";
		for( $i = 0; $i < count($cart_arr); $i ++)
		{
			if($i != count($cart_arr) - 1)
			{
				$product_values = $product_values.I('post.product_'.$cart_arr[$i], '').",";
				$product_num = $product_num.I('post.num_'.$cart_arr[$i], '').",";
				$product_moneys = $product_moneys.I('post.money_'.$cart_arr[$i], '').",";
				$hos_id = $hos_id.I('post.hos_'.$cart_arr[$i], '').",";
				$cart_str = $cart_str.$cart_arr[$i].",";
			}
			else
			{
				$product_values = $product_values.I('post.product_'.$cart_arr[$i], '');
				$product_num = $product_num.I('post.num_'.$cart_arr[$i], '');
				$product_moneys = $product_moneys.I('post.money_'.$cart_arr[$i], '');
				$hos_id = $hos_id.I('post.hos_'.$cart_arr[$i], '');
				$cart_str = $cart_str.$cart_arr[$i];
			}
		}

		$time2 = date("Y-m-d H:i:s",time());
		//获取订单号
		$url = C("PATH_URL")."/interface/yc_member/cart_order_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_date"=>"$time2",
			"create_date"=>"$time2",
			"product_values"=>"$product_values",
			"product_num"=>"$product_num",
			"product_moneys"=>"$product_moneys",
			"hos_id"=>"$hos_id",
			"cart_arr"=>"$cart_str"
		);
		//print_r($data);die;
		$json = json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		if($data['error_code'] == "ok")
		{
			$this->redirect('?m=Member&c=Order&a=order_list');
		}
		else
		{
			print_r($data['error_code']);
		}
	}

	public function onlin_play()
	{
		$order_id = I('get.out_trade_no', '');
		$outtradeno = I('get.outtradeno', '');
		$status = I('get.status', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url=C("PATH_URL")."/interface/yc_member/online_pay.aspx?access_token=".$token;
		$data=array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id",
			"serial_number"=>"$outtradeno",
			"order_status"=>"1"
		);
		$json=json_encode($data);
		//echo "$json";die;
		$info = json_decode(post_json($url,$json),true);
		$this->redirect('?m=Member&c=Order&a=order_list');
	}

	//购物车列表
	public function cart_list()
	{
		//$_SESSION['m_openid'] = "oXUWms06UE0utwCS3wgzq6NGQYuE";
		//获取平台的access_token
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/product_cart_list.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$this->assign('yd_list',$yd_list);// 赋值数据集

		$this->display(); // 输出模板
	}

	//购物车编辑页面
	public function cart_edit()
	{
		$hos_id = I('get.hos_id',"");
		$product_str = I('get.product_str',"");
		$num_str = I('get.num_str',"");
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_member/product_cart_edit.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
			"product_str"=>"$product_str",
			"num_str"=>"$num_str"
		);

		$json = json_encode($data);
		$data = post_json($url,$json);
		$str = json_encode($data);
		echo $str;
	}

	//删除购物车
	public function delete_ok()
	{
		$product_id = I('get.product_id', '');
		$hos_id = I('get.hos_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_member/product_cart_delete.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
			"product_id"=>"$product_id"
		);
		$json = json_encode($data);
		$data = post_json($url,$json);
		$str = json_encode($data);
		echo $str;
	}

		//医生列表
	public function doc_list()
	{
		$hos_id = I('get.hos_id', '');

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
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$expert_list = json_decode(post_json($url,$json),true);

		$this->assign('expert_list',$expert_list);// 赋值数据集
		$this->assign('hos_id',$hos_id);// 赋值数据集

		$this->display(); // 输出模板
	}

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
	
}