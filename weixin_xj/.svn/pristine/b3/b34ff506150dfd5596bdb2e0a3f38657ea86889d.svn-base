<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller
{
	//获取阅片订单列表
	public function order_list()
	{
		$order_id = $_POST['order_id'];//获取get变量

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/order_list.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$order['order_id'] = $order_id;
		$this->assign('order',$order);
		$order_list = json_decode(post_json($url,$json),true);
		$this->assign('order_list',$order_list);// 赋值数据集
		$stly = "";
		if(count($order_list) < 5)
		{
			$stly = "style=\"display:none\"";
		}
		$this->assign('stly',$stly);
		$this->display(); // 输出模板
	}

	//加载更多
	public function order_list_append()
	{
		$page_num = I('get.page_num', '2');
		$order_id = $_POST['order_id'];

		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//获取医院列表
		$url = "http://weixin.yk2020.com/interface/yc_hos/order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$order_list = json_decode(post_json($url,$json),true);
		$this->assign('order_list',$order_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//获取阅片订单详细信息
	public function order_info()
	{
		$order_id = $_GET['order_id'];//获取get变量

		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/order_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id"
		);
		$json=json_encode($data);
		$order_info = json_decode(post_json($url,$json),true);
		$order['ORDER_ID'] = $order_info['ORDER_ID'];
		$order['ORDER_STATUS'] = $order_info['ORDER_STATUS'];
		$order['MEMBER_MOBILE'] = $order_info['MEMBER_MOBILE'];
		$order['ORDER_NAME'] = $order_info['ORDER_NAME'];
		$order['ORDER_DATE'] = $order_info['ORDER_DATE'];
		$order['CREATE_DATE'] = $order_info['CREATE_DATE'];
		$order['ORDER_MONEY'] = $order_info['ORDER_MONEY'];
		$order['HOS_NAME'] = $order_info['HOS_NAME'];
		$order['HOS_ADDRESS'] = $order_info['HOS_ADDRESS'];
		$order['HOS_ID'] = $order_info['HOS_ID'];
		$order['HOS_PHONE'] = $order_info['HOS_PHONE'];
		$this->assign('order',$order_info);// 赋值数据集
		$this->display(); // 输出模板
	}
	//获取处方订单详细信息
	public function order_detail()
	{
		$order_id = $_GET['order_id'];//获取get变量

		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/order_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id"
		);
		$json=json_encode($data);
		$order_info = json_decode(post_json($url,$json),true);
		//print_r($order_info);die;
		$order['ORDER_ID'] = $order_info['ORDER_ID'];
		$order['ORDER_STATUS'] = $order_info['ORDER_STATUS'];
		$order['MEMBER_MOBILE'] = $order_info['MEMBER_MOBILE'];
		$order['ORDER_NAME'] = $order_info['ORDER_NAME'];
		$order['ORDER_DATE'] = $order_info['ORDER_DATE'];
		$order['CREATE_DATE'] = $order_info['CREATE_DATE'];
		$order['ORDER_MONEY'] = $order_info['ORDER_MONEY'];
		$order['HOS_NAME'] = $order_info['HOS_NAME'];
		$order['HOS_ADDRESS'] = $order_info['HOS_ADDRESS'];
		$order['HOS_ID'] = $order_info['HOS_ID'];
		$order['HOS_PHONE'] = $order_info['HOS_PHONE'];
		$this->assign('order',$order_info);// 赋值数据集
		$this->display(); // 输出模板
	}

		//核销订单
	public function order_single()
	{
		$order_id = $_POST['order_id'];//获取get变量

		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取医生详细信息
		$url = "http://weixin.yk2020.com/interface/yc_hos/order_single.aspx?access_token=".$token;
		//$url = "http://localhost:8080/interface/yc_hos/order_single.aspx?access_token=".$token;
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id"
		);
		$json = json_encode($data);
		$expert_info = json_decode(post_json($url,$json),true);
		if($expert_info['error_code'] == "ok")
		{
			$this->redirect('?m=Home&c=Order&a=success');
		}
		else
		{
			$this->redirect('?m=Home&c=Order&a=error');
		}
	}

	//获取手术订单列表
	public function opt_list()
	{
		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/opt_order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$opt_list = json_decode(post_json($url,$json),true);
		$this->assign('opt_list',$opt_list);// 赋值数据集
		$stly = "";
		if(count($opt_list) < 5)
		{
			$stly = "style=\"display:none\"";
		}
		$this->assign('stly',$stly);
		$this->display(); // 输出模板
	}

	//获取手术订单加载更多
	public function opt_list_append()
	{
		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$page_num = I('get.page_num', '2');
		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/opt_order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$opt_list = json_decode(post_json($url,$json),true);
		$this->assign('opt_list',$opt_list);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//获取未上传病例数量
	public function case_num()
	{
		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/opt_case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$case_list = json_decode(post_json($url,$json),true);
		$case['case_count'] = count($case_list);
		$this->assign('case',$case);
		$this->display(); // 输出模板
	}

	//获取未上传病例订单列表
	public function case_list()
	{
		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$order_id = $_POST['order_id'];//获取get变量

		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/opt_case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$case_list = json_decode(post_json($url,$json),true);
		$this->assign('case_list',$case_list);
		$stly = "";
		if(count($case_list) < 5)
		{
			$stly = "style=\"display:none\"";
		}
		$this->assign('stly',$stly);

		$order['order_id'] = $order_id;
		$this->assign('order',$order);
		$this->display(); // 输出模板
	}

		//获取未上传病例订单列表
	public function case_list_append()
	{
		//平台access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$order_id = $_POST['order_id'];//获取get变量
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$page_num = I('get.page_num', '2');

		//获取订单列表满足查询条件的
		$url = "http://weixin.yk2020.com/interface/yc_hos/opt_case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$case_list = json_decode(post_json($url,$json),true);
		$this->assign('case_list',$case_list);

		$order['order_id'] = $order_id;
		$this->assign('order',$order);
		
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//上传病例
	public function case_add()
	{
		$order_id = $_POST['order_id'];//获取get变量
		$member_id = $_POST['member_id'];//获取get变量

		//新方法
		$imgbase64 = $_POST['imgbase64_'.$order_id];//获取base64图片字符串
		if(empty($imgbase64))
		{
			//上传错误提示错误信息
			$this->redirect('?m=Home&c=Order&a=error');
			//echo "空值";
		}

		//匹配出图片的格式 
		if (preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
		{
			$type = $result[2]; //图片类型
			$type = str_replace("jpeg","jpg", $type);
			
			$new_file = "./Public/Uploads/case/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
			
			if (is_dir(dirname($new_file)) == false)
			{
				mkdir(dirname($new_file), 0777, true);
			}

			$base64 = base64_decode(str_replace($result[1],"",$imgbase64));//去除头部无用信息

			if (file_put_contents($new_file, $base64))
			{
				//处理图片
				$image = new \Think\Image(); 
				$image->open($new_file);
				// 按照原图的比例生成一个最大为1000*1000的缩略图并保存
				$image->thumb(1000, 1000)->save($new_file);

				//平台access_token
				$token = A_token();

				//获取openid
				include MODULE_PATH.'/Common/open_id.php';

				//验证手机是否绑定
				include MODULE_PATH.'/Common/check_band.php';

				$yp_pic = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
				//获取订单列表满足查询条件的
				$url = "http://weixin.yk2020.com/interface/yc_hos/case_add.aspx?access_token=".$token;
				$data = array
				(
					"openid"=>"$openid",
					"order_id"=>"$order_id",
					"yp_pic"=>"$yp_pic",
					"member_id"=>"$member_id"
				);
				
				$json=json_encode($data);
				$case_add = json_decode(post_json($url,$json),true);
				
				if($case_add['error_code'] == "ok")
				{
					$this->redirect('?m=Home&c=Order&a=success');
				}
				else
				{
					$this->redirect('?m=Home&c=Order&a=error');
				}
			}
			else
			{
				//上传错误提示错误信息
				$this->redirect('?m=Home&c=Order&a=error');
				//echo "存文件失败";
			}
		}
		else
		{
			//上传错误提示错误信息
			$this->redirect('?m=Home&c=Order&a=error');
			//echo "匹配失败";
		}

	}

	public function success()
	{
		$this->display(); // 输出模板
	}

	public function error()
	{
		$this->display(); // 输出模板
	}
}