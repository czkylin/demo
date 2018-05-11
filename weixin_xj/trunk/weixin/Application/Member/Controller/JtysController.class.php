<?php
namespace Member\Controller;
use Think\Controller;
class JtysController extends Controller
{
	//获取我的家庭列表
	public function expert_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$this->assign('user_info',$user_info);

		//获取家庭医生满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/home_expert_list.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
		);
		$json=json_encode($data);
		//print(post_json($url,$json));die;
		$expert_list = json_decode(post_json($url,$json),true);
		
		foreach ($expert_list as $key => $value) 
		{
			if($value['EXPERT_TYPE'] == '0')
			{
				$big = $value;
			}
			if($value['EXPERT_TYPE'] == '1')
			{
				$small = $value;
			}
		}
		$this->assign('big',$big);
		$this->assign('small',$small);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$expert_id = $big['EXPERT_ID'];
		$small_expert_id = $small['EXPERT_ID'];
		
		//获取我的咨询列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/consult_list.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
			"page_num" => "1",
			"expert_id"=>"$expert_id",
			"small_expert_id"=>"$small_expert_id",
		);
		$json=json_encode($data);
		$consult_list = json_decode(post_json($url,$json),true);
		$this->assign('consult_list',$consult_list);// 赋值数据集
		$this->assign('expert_id',$expert_id);// 赋值数据集

		//判断是否开通会员卡
		$url = C("PATH_URL")."/interface/yc_member/vip_card_number.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$member_vip = json_decode(post_json($url,$json),true);
		$this->assign('member_vip',$member_vip[0]['CARD_NUMBER']);

		$this->display(); // 输出模板
	}

	//预约视频会诊
	public function sphz()
	{
		$expert_id = I('post.expert_id','');
		$order_type = I('post.order_type','1');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/vip_order_add.aspx?access_token=".$token;
		$data = array
		(
			"openid" => "$openid",
			"order_type" => "$order_type",
			"expert_id"=>"$expert_id",
		);
		$json=json_encode($data);
		$status = json_decode(post_json($url,$json),true);
		$this->ajaxReturn($status['error_code']);
	}
	//获取订单列表
	public function consult_list()
	{
		$expert_id = I('get.expert_id','');
		$small_expert_id = I('get.small_expert_id','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/consult_list.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
			"page_num" => "1",
			"expert_id"=>"$expert_id",
			"small_expert_id"=>"$small_expert_id",
		);
		$json=json_encode($data);
		$consult_list = json_decode(post_json($url,$json),true);
		$this->assign('consult_list',$consult_list);// 赋值数据集
		$this->assign('expert_id',$expert_id);// 赋值数据集

		$this->display(); // 输出模板}

	}

	//订单列表加载更多
	public function consult_list_append()
	{
		$expert_id = I('get.expert_id','');
		$small_expert_id = I('get.small_expert_id','');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/consult_list.aspx?access_token=".$token;
		$page_num = I('get.page_num', '2');
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"expert_id"=>"$expert_id",
			"small_expert_id"=>"$small_expert_id",
		);
		$json=json_encode($data);
		$consult_list = json_decode(post_json($url,$json),true);
		$this->assign('consult_list',$consult_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
	//没有家庭医生
	public function noconsult_list()
	{
			//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}

	//没有家庭医生
	public function consult_introduce()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	public function consult_pay()
	{
		//解密支付参数
		$json = $_GET['json'];
		$json = passport_decrypt($json, "123");
		$json = json_decode(($json),true);
		$doc_id = $json['doc_id'];
		$price = $json['price'];
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		if($price == 0)
		{
			$this->redirect('?m=Member&c=Jtys&a=consult_add_index&doc_id='.$doc_id.'&price='.$price.'&order_id=0');
		}
		else
		{
			$time2 = date("Y-m-d H:i:s",time());
			$serve_name = "在线咨询";

			//获取订单号
			$url = C("PATH_URL")."/interface/yc_member/order_add.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"order_money"=>"$price",
				"column_name"=>"expert_id",
				"column_value"=>"$doc_id",
				"order_date"=>"$time2",
				"order_status"=>"0",
				"create_date"=>"$time2",
				"order_name"=>"$serve_name",
				"record_id"=>"1"
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
				//$serve_name = UrlEncode($serve_name);
				$data = array
				(
					"out_trade_no"=>$order_sn,
					"subject"=>$serve_name,
					"total"=>$price,
					"consult_id"=>0,
					"status"=>0,
					"doc_id"=>$doc_id
				);
				$json= json_encode($data);
				$json= urlencode(passport_encrypt($json, "123"));
				header("Location:/weixin/Application/Member/weixin_wap/js_api_call.php?json=$json");
			}
		}
	}

	public function onlin_play()
	{
		$order_id = I('get.out_trade_no', '');
		$outtradeno = I('get.outtradeno', '');
		$price = I('get.total', '');
		$doc_id = I('get.doc_id', '');

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
		$this->redirect("?m=Member&c=Jtys&a=consult_add_index&doc_id=$doc_id&price=$price&order_id=$order_id");
	}
	
	//发布咨询问题页面
	public function consult_add_index()
	{
		$doc_id = I('get.doc_id', '');
		$price = I('get.price', '1');
		$order_id = I('get.order_id', '1');
		$consult_error = I('get.consult_error', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->assign('doc_id',$doc_id);
		$this->assign('price',$price);
		$this->assign('order_id',$order_id);
		$this->assign('consult_error',$consult_error);
		$this->display(); // 输出模板
	}

	//问题提交页面
	public function consult_add()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取openid
		include MODULE_PATH.'/Common/check_band.php';

		$price = I('post.price', '1');
		$expert_id = I('post.doc_id','');
		$lat = I('post.lat', '0');
		$lng = I('post.lng', '0');
		$order_id = I('post.order_id', '1');
		$consultContent = I('post.consultContent', '');
		$time = date("Y-m-d H:i:s",time());
		$imgbase64 = $_POST['imgbase64'];//获取base64图片字符串
		
		if(empty($imgbase64))
		{
			//上传错误提示错误信息
			$pic_path = "";
			//echo "空值";
		}
		else if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
		{
			//匹配出图片的格式
			$type = $result[2]; //图片类型
			$type = str_replace("jpeg","jpg", $type);
				
			$new_file = "./Public/Uploads/zixun/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
				
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
				$image->thumb(200, 200)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}
		
		$urll = C("PATH_URL")."/interface/yc_member/consult_info_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_content"=>"$consultContent",
			"expert_id"=>"$expert_id",
			"create_date"=>"$time",
			"consult_img"=>"$pic_path",
			"order_id"=>"$order_id",
			"lat"=>"$lat",
			"lng"=>"$lng"
		);
		$json = json_encode($data); 
		$con = json_decode(post_json($urll,$json),true);
		$consult_id = $con["consult_id"];

		if($consult_id != "")
		{
			//跳转到咨询对话页面
			$this->redirect("?m=Member&c=Jtys&a=consult_details&consult_id=$consult_id&expert_id=$expert_id");
		}
		else
		{
			$consult_error = $con["error_code"];
			$this->redirect("?m=Member&c=Jtys&a=consult_add_index&consult_error=".$consult_error); 
		}
	}
	
	//咨询对话详情
	public function consult_details()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$consult_id = I('get.consult_id','0');

		//咨询内容列表
		$url = C("PATH_URL")."/interface/yc_member/consult_info.aspx?access_token=".$token;
		//咨询标题
		$title_url = C("PATH_URL")."/interface/yc_member/consult_title.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id"
		);
		$json= json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$tdata = json_decode(post_json($title_url,$json),true);
		$this -> assign("data",$data);
		$this -> assign("tdata",$tdata);
		$this -> assign("consult_id",$consult_id);
		$this -> assign("expert_id",$tdata['EXPERT_ID']);
		$this -> display(); 
	}
	//咨询回复
	public function consult_response()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$consult_id=I('post.consult_id');
		$lat = I('post.lat', '0');
		$lng = I('post.lng', '0');
		$reply_content=urlencode($_POST['consultContent']);
		$imgbase64 = I('post.imgbase64');//获取base64图片字符串 
		if($reply_content==""&&$imgbase64==""){
			die("不能提交空数据！");
		}
		$create_date=date('Y-m-d H:i:s',time());
		
		if(empty($imgbase64))
		{
			$pic_path = "";
		}
		else if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
		{
			//匹配出图片的格式
			$type = $result[2]; //图片类型
			$type = str_replace("jpeg","jpg", $type);
			$new_file = "./Public/Uploads/zixun/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
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
				$image->thumb(200, 200)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}
		$url = C("PATH_URL")."/interface/yc_member/consult_reply_info_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"reply_content"=>"$reply_content",
			"create_date"=>"$create_date",
			"reply_img"=>"$pic_path",
			"lat"=>"$lat",
			"lng"=>"$lng",
		);

		$json=urldecode(json_encode($data));
		
		$data = post_json($url,$json);
		
		$data = json_decode($data,true);

		if($data['error_code']!='ok')
		{
			$this->redirect("?m=Member&c=Jtys&a=consult_details&consult_id=".$consult_id);
		}
		else
		{
			$this->redirect("?m=Member&c=Jtys&a=consult_details&consult_id=".$consult_id);
		}
	}
	//咨询评论
	public function pl_ok()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$consult_id = I('post.consult_id', '0');	
		$expert_id = I('post.expert_id', '0');
		$pj_content = I('post.desc', '');
		$pj_flag = I('post.pj_flag', '0');
		$url = C("PATH_URL")."/interface/yc_member/consult_pj_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"expert_id"=>"$expert_id",
			"pj_content"=>"$pj_content",
			"pj_flag"=>"$pj_flag"
		);
		 $json=json_encode($data);
		 $data =json_decode(post_json($url,$json),true); 
		 $error_code = $data["error_code"];
		 echo $error_code;
	}
}