<?php
namespace Home\Controller;
use Think\Controller;
class JixiaoController extends Controller
{
	//发布咨询问题页面
	public function add_info()
	{
        date_default_timezone_set('prc');
        $tj_type = I('get.tj_type', 'jx_list');
        $lat = I('get.lat', '39.872547');
		$lng = I('get.lng', '116.293015');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取坐标
		//include COMMON_PATH.'/Common/lat_lng.php';

		if($lat == "")
		{
			$this->redirect('?m=Home&c=jixiao&a=get_gps&type=add_info&tj_type='.$tj_type);
		}

		if($lng == 0 && $lat == 0)
		{
			$this->redirect('?m=Home&c=jixiao&a=get_gps3&type=add_info&tj_type='.$tj_type);
			$x_pi = 3.14159265358979324 * 3000.0 / 180.0;
	        $x = $lng;
	        $y = $lat;
	        $z =sqrt($x * $x + $y * $y) + 0.00002 * sin($y * $x_pi);
	        $theta = atan2($y, $x) + 0.000003 * cos($x * $x_pi);
	        $lng = $z * cos($theta) + 0.0065;
	        $lat = $z * sin($theta) + 0.006;
		}
		    
		$this->assign('lat',$lat);
		$this->assign('lng',$lng);

		//获取平台的access_token
		$token = A_token();

		$jiekou = C("PATH_URL");

		//获取签到类型
		$url = $jiekou."/interface/yc_hos/waiqin_type.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$wq_list =json_decode(post_json($url,$json),true);
		
		//错误机制  未开通crm
		if($wq_list["error_code"]=="00010") 
		{
			$this->redirect('?m=Home&c=Follow&a=crm_no');
		}
		//00010以外错误
		if($wq_list["error_code"]) 
		{
			$wq_list=array();
		}
		//print_r($wq_list['TYPE_NAME']);
		$this->assign('empty','<option>空值 刷新获取</option>');
		$this->assign('wq_list',$wq_list);// 医生列表
       	 $this->assign('tj_type',$tj_type );
       	 $this->assign('zhuangtai',$zhuangtai);
		$this->display(); // 输出模板
	}
	
	//信息提交页面
	public function add_ok()
	{
		//print_r ($_POST);die;
		$lng = I('post.lng', '0');
		$lat = I('post.lat', '0');
        $tj_type= I('post.tj_type', '');
		
		if($lng == 0 || $lat == 0 || $lng == 0.0065 || $lat == 0.006)
		{
			//跳转到失败页面
			$this->redirect("?m=Home&c=Jixiao&a=error&msg=获取地理位置失败，请先设置定位");
		}
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$consultContent = I('post.consultContent', '');
		$waiqin_type = I('post.waiqin_type', '');
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
			$new_file = "./Public/Uploads/jixiao/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名

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
				$image->thumb(500, 1000)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}

		$jiekou = C("PATH_URL");

		$urll = $jiekou."/interface/yc_hos/waiqin_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"waiqin_content"=>"$consultContent",
			"lng"=>"$lng",
			"lat"=>"$lat",
			"waiqin_pic"=>"$pic_path",
			"waiqin_type"=>"$waiqin_type"
		);

		$json = json_encode($data); 
		$con = json_decode(post_json($urll,$json),true);
		$result_id = $con["error_code"];
		if($result_id == "ok")
		{
			//跳转到成功页面
			$this->redirect("?m=Home&c=Jixiao&a=success&tj_type=".$tj_type);
		}
		else
		{
			$msg = "信息错误";
			if($con["error_code"] == "00030")
			{
				$msg = "相同类型不能重复提交超过2次";
			}
			//跳转到成功页面
			$this->redirect("?m=Home&c=Jixiao&a=error&msg=".$msg);
		}
	}

	public function success()
	{
        $tj_type = I('get.tj_type', '');
        $this->assign('tj_type', $tj_type);
		$this->display();
	}

	public function error()
	{
		$error_msg = I('get.msg', '');
		$this->assign('error_msg', $error_msg);
		$this->display();
	}

	//获取gps
	public function get_gps($type)
	{
		$type = I('get.type', 'add_info');
		$tj_type = I('get.tj_type', 'jx_list');
		$url_str = "m=Home&c=Jixiao&a=".$type."&tj_type=".$tj_type;
		$this->assign('url_str', $url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

	//获取gps
	public function get_gps3($type)
	{
		$type = I('get.type', 'add_info');
		$tj_type = I('get.tj_type', 'jx_list');
		$url_str = "m=Home&c=Jixiao&a=".$type."&tj_type=".$tj_type;
		$this->assign('url_str', $url_str);
		$this->display(COMMON_PATH.'/Common/gps3.html');
	}

		//分享信息列表
	public function jx_list()
	{  
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");


		//获取会员的头像及昵称
		$url = $jiekou."/interface/yc_hos/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		
		$json=json_encode($data);
		
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);// 赋值

		//获取绩效列表
		$url = $jiekou."/interface/yc_hos/waiqin_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json = json_encode($data);
		$jx_list = json_decode(post_json($url,$json),true);
		//print_r($jx_list);die;
		$this->assign('jx_list',$jx_list);// 医生列表
		$this->display(); // 输出模板
	}
	
	//分享列表加载更多
	public function jx_list_append()
	{
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");

		$url = $jiekou."/interface/yc_hos/waiqin_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);

		$json=json_encode($data);
		$jx_list = json_decode(post_json($url,$json),true);
		$this->assign('jx_list',$jx_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


			//分享信息列表
	public function jx_org_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");


		//获取会员的头像及昵称
		$url = $jiekou."/interface/yc_hos/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		//dump($data);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);// 赋值

		//获取医生列表
		$url = $jiekou."/interface/yc_hos/waiqin_org_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json = json_encode($data);
		$jx_list = json_decode(post_json($url,$json),true);
		//print_r($jx_list);die;
		$this->assign('jx_list',$jx_list);// 医生列表
		$this->display(); // 输出模板
	}
	
	//分享列表加载更多
	public function jx_org_list_append()
	{
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");

		$url = $jiekou."/interface/yc_hos/waiqin_org_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);

		$json=json_encode($data);
		$jx_list = json_decode(post_json($url,$json),true);
		//print_r($jx_list);die;
		$this->assign('jx_list',$jx_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//请假功能
	public function qingjia_list()
	{  
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");

		//获取请假信息列表
		$url = $jiekou."/interface/yc_hos/qj_sp_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json = json_encode($data);

		// print_r(post_json($url,$json));die;

		$qj_list = json_decode(post_json($url,$json),true);
		$this->assign('qj_list',$qj_list);// 医生列表
		$this->display(); // 输出模板
	}

	//请假列表加载
	public function qingjia_list_append()
	{
		$page_num = I('get.page_num');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");


		$url = $jiekou."/interface/yc_hos/qj_sp_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);

		$json=json_encode($data);
		$qj_list = json_decode(post_json($url,$json),true);
		// print_r($qj_list);die;
		$this->assign('qj_list',$qj_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//外出提交页面
	public function add_waichu()
	{
        date_default_timezone_set('prc');
        $tj_type = I('get.tj_type', 'jx_list');
        $lat = I('get.lat', '');
		$lng = I('get.lng', '');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取坐标
		include COMMON_PATH.'/Common/lat_lng.php';

		if($lat == "")
		{
			$this->redirect('/weixn/index.php?m=Home&c=jixiao&a=get_gps&type=add_waichu&tj_type='.$tj_type);
		}
		$this->assign('lat',$lat);
		$this->assign('lng',$lng);

		//获取平台的access_token
		$token = A_token();

		$jiekou = C("PATH_URL");

		//获取签到类型
		$url = $jiekou."/interface/yc_hos/waichu_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$wq_list =json_decode(post_json($url,$json),true);
		
		//错误机制  未开通crm
		if($wq_list["error_code"]=="00010") 
		{
			$this->redirect('?m=Home&c=Follow&a=crm_no');
		}
		//00010以外错误
		if($wq_list["error_code"]) 
		{
			$wq_list=array();
		}
		//print_r($wq_list['TYPE_NAME']);
		$this->assign('empty','<option value="">暂无数据</option>');
		$this->assign('wq_list',$wq_list);// 医生列表
       	$this->assign('tj_type',$tj_type );
       	$this->assign('zhuangtai',$zhuangtai);
		$this->display(); // 输出模板
	}


	//外出提交
	public function waichu_ok()
	{
		//print_r ($_POST);die;
		$lng = I('post.lng', '0');
		$lat = I('post.lat', '0');
        $tj_type= I('post.tj_type', '');
	
		if($lng == 0 || $lat == 0)
		{
			//跳转到成功页面
			$this->redirect("/weixn/index.php?m=Home&c=Jixiao&a=error&msg=获取地理位置失败，请先设置定位");
		}
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$consultContent = I('post.consultContent', '');
		$waiqin_type = I('post.waiqin_type', '');
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
			$new_file = "./Public/Uploads/jixiao/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名

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
				$image->thumb(500, 1000)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}

		$jiekou = C("PATH_URL");

		$urll = $jiekou."/interface/yc_hos/waichu_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"waichu_content"=>"$consultContent",
			"lng"=>"$lng",
			"lat"=>"$lat",
			"waichu_pic"=>"$pic_path",
			"out_id"=>"$waiqin_type"
		);

		$json = json_encode($data); 
		$con = json_decode(post_json($urll,$json),true);
		$result_id = $con["error_code"];
		if($result_id == "ok")
		{
			//跳转到成功页面
			$this->redirect("?m=Home&c=Jixiao&a=successful&tj_type=".$tj_type);
		}
		else
		{
			$msg = "信息错误";
			if($con["error_code"] == "00030")
			{
				$msg = "相同类型不能重复提交超过2次";
			}
			//跳转到成功页面
			$this->redirect("?m=Home&c=Jixiao&a=error&msg=".$msg);
		}
	}


	//差旅申请页面
	public function chailv()
	{
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->display();
	}

	//差旅申请
	public function chailv_add()
	{
		$token = A_token();
		$jiekou = C("PATH_URL");

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$out_date = I('post.out_date','');
		$return_date = I('post.return_date','');
		$out_day = I('post.out_day','');
		$jtf_money = I('post.jtf_money','');
		$snjtf_money = I('post.snjtf_money','');
		$zsf_money = I('post.zsf_money','');
		$cf_money = I('post.cf_money','');
		$hyf_money = I('post.hyf_money','');
		$kdf_money = I('post.kdf_money','');
		$bgf_money = I('post.bgf_money','');
		$bzf_money = I('post.bzf_money','');
		$total_money = I('post.total_money','');
		$out_desc = I('post.out_desc','');
		$yj_money = I('post.yj_money','');
		$th_money = I('post.th_money','');
		$bl_money = I('post.bl_money','');
		$bx_num = I('post.bx_num','');

		if($bx_num == '')
		{
			$bx_num = '0';
		}
		if($yj_money == '')
		{
			$yj_money = '0';
		}
		if($th_money == '')
		{
			$th_money = '0';
		}

		$urll = $jiekou."/interface/yc_hos/ticket_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"out_date"=>"$out_date",
			"return_date"=>"$return_date",
			"out_day"=>"$out_day",
			"jtf_money"=>"$jtf_money",
			"snjtf_money"=>"$snjtf_money",
			"zsf_money"=>"$zsf_money",
			"cf_money"=>"$cf_money",
			"hyf_money"=>"$hyf_money",
			"kdf_money"=>"$kdf_money",
			"bgf_money"=>"$bgf_money",
			"bzf_money"=>"$bzf_money",
			"total_money"=>"$total_money",
			"out_desc"=>"$out_desc",
			"yj_money"=>"$yj_money",
			"th_money"=>"$th_money",
			"bl_money"=>"$bl_money",
			"bx_num"=>"$bx_num"
		);
		$json = json_encode($data);
		$chailv = json_decode(post_json($urll,$json),true);
		if($chailv['error_code'] == 'ok')
		{
			//跳转到成功页面
			$this->redirect("Member/Jixiao/success2");
		}
		else
		{
			$msg = "系统繁忙,请稍后再试！";
			$this->redirect("/weixin/index.php?m=Home&c=Jixiao&a=error&msg=".$msg);
		}
	}

	//差旅列表
	public function chailv_list()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$page_num = I('get.page_num','1');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/ticket_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json = json_encode($data); 
		$chailv = json_decode(post_json($urll,$json),true);
		// dump($chailv);
		$this->assign('cl',$chailv);
		$this->display();
	}

	//差旅列表加载
	public function chailv_list_append()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$page_num = I('get.page_num','2');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/ticket_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json = json_encode($data); 
		$chailv = json_decode(post_json($urll,$json),true);
		// dump($chailv);
		$this->assign('cl',$chailv);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//差旅详情
	public function chailv_info()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$ticket_id = I('get.ticket_id','');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/ticket_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ticket_id"=>"$ticket_id"
		);
		$json = json_encode($data); 
		$chailv = json_decode(post_json($urll,$json),true);
		$this->assign('cl',$chailv);
		$this->display();
	}

	//差旅详情
	public function success2()
	{
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->display();
	}

	//差旅费饼状图-默认时间的
	public function chailv_img()
	{
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
	
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");
		//获取出差人员信息
		$url = $jiekou."/interface/yc_hos/user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json = json_encode($data); 
		$msg = json_decode(post_json($url,$json),true);
		$return_date = date("Y-m-d",time());
		$out_date = date("Y-m-d",strtotime("-1month"));
		$this->assign('out_date',$out_date);
		$this->assign('return_date',$return_date);
		$this->assign('msg',$msg);
		$this->display();

	}

	//差旅费饼状图-默认时间的
	public function chailv_img1()
	{
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
	
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$return_date = date("Y-m-d",time());
		$out_date = date("Y-m-d",strtotime("-1month"));
		$this->assign('out_date',$out_date);
		$this->assign('return_date',$return_date);
		$this->display();

	}

	//借款申请
	public function jiekuan()
	{
		$token = A_token();
		$jiekou = C("PATH_URL");

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$this->display();

	}
	//借款申请
	public function jiekuan_add()
	{
		$token = A_token();
		$jiekou = C("PATH_URL");

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$loan_money = I('post.loan_money','');
		$loan_content = I('post.loan_content','');
		$loan_desc = I('post.loan_desc','');
		$loan_date = I('post.loan_date','');

		$urll = $jiekou."/interface/yc_hos/loan_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"loan_money"=>"$loan_money",
			"loan_content"=>"$loan_content",
			"loan_desc"=>"$loan_desc",
			"loan_date"=>"$loan_date"
		);
		$json = json_encode($data);
		$jiekuan = json_decode(post_json($urll,$json),true);
		if($jiekuan['error_code'] == 'ok')
		{
			//跳转到成功页面
			$this->redirect("Member/Jixiao/success3");
		}
		else
		{
			$msg = "系统繁忙,请稍后再试！";
			$this->redirect("/weixin/index.php?m=Home&c=Jixiao&a=error&msg=".$msg);
		}
	}

	//借款列表
	public function jiekuan_list()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$page_num = I('get.page_num','1');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/loan_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json = json_encode($data);
		$jiekuan = json_decode(post_json($urll,$json),true);
		$this->assign('jiekuan',$jiekuan);
		$this->display();
	}

	//借款列表
	public function jiekuan_list_append()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$page_num = I('get.page_num','2');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/loan_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json = json_encode($data); 
		$jiekuan = json_decode(post_json($urll,$json),true);
		// dump($chailv);
		$this->assign('jiekuan',$jiekuan);
		include COMMON_PATH.'/Common/load_more.php';
	}

	//借款详情
	public function jiekuan_info()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$loan_id = I('get.loan_id','');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/loan_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"loan_id"=>"$loan_id"
		);
		$json = json_encode($data);
		$jiekuan = json_decode(post_json($urll,$json),true);
		$this->assign('jiekuan',$jiekuan);
		$this->display();
	}

	//报销申请
	public function baoxiao()
	{
		$token = A_token();
		$jiekou = C("PATH_URL");

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$this->display();

	}
	//报销申请
	public function baoxiao_add()
	{
		$token = A_token();
		$jiekou = C("PATH_URL");

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
			
		$money_return = I('post.money_return','');
		$money_advance = I('post.money_advance','');
		$money_replace = I('post.money_replace','');
		$er_count = I('post.er_count','');
		$er_content1 = I('post.er_content1','');
		$er_money1 = I('post.er_money1','');
		$er_content2 = I('post.er_content2','');
		$er_money2 = I('post.er_money2','');
		$er_content3 = I('post.er_content3','');
		$er_money3 = I('post.er_money3','');
		$er_content4 = I('post.er_content4','');
		$er_money4 = I('post.er_money4','');
		$er_content5 = I('post.er_content5','');
		$er_money5 = I('post.er_money5','');

		if($er_content1 == '' || $er_money1 == '')
		{
			$er_content1 = '';
			$er_money1 = '';
		}
		if($er_content2 == '' || $er_money2 == '')
		{
			$er_content2= '';
			$er_money2 = '';
		}
		if($er_content3 == '' || $er_money3 == '')
		{
			$er_content3 = '';
			$er_money3 = '';
		}
		if($er_content4 == '' || $er_money4 == '')
		{
			$er_content4 = '';
			$er_money4 = '';
		}
		if($er_content5 == '' || $er_money5 == '')
		{
			$er_content5 = '';
			$er_money5 = '';
		}

		
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
			$type = str_replace("jpeg","jpg","png", $type);
			$new_file = "./Public/Uploads/baoxiao/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名

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
				$image->thumb(500, 1000)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}

		$er_content = "$er_content1,$er_content2,$er_content3,$er_content4,$er_content5";
		$er_content = rtrim($er_content,',');

		$er_money = "$er_money1,$er_money2,$er_money3,$er_money4,$er_money5";
		$er_money = rtrim($er_money,',');

		$urll = $jiekou."/interface/yc_hos/expense_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"money_return"=>"$money_return",
			"money_advance"=>"$money_advance",
			"money_replace"=>"$money_replace",
			"er_file"=>"$pic_path",
			"er_count"=>"$er_count",
			"er_content"=> "$er_content",
			"er_money"=> "$er_money"
		);
		$json = json_encode($data);
		$baoxiao = json_decode(post_json($urll,$json),true);
		if($baoxiao['error_code'] == 'ok')
		{
			//跳转到成功页面
			$this->redirect("Member/Jixiao/success4");
		}
		else
		{
			$msg = "系统繁忙,请稍后再试！";
			$this->redirect("/weixin/index.php?m=Home&c=Jixiao&a=error&msg=".$msg);
		}

		
	}

	//报销列表
	public function baoxiao_list()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$page_num = I('get.page_num','1');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/expense_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json = json_encode($data);
		$baoxiao = json_decode(post_json($urll,$json),true);
		$this->assign('baoxiao',$baoxiao);
		$this->display();
	}

	//报销列表
	public function baoxiao_list_append()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$page_num = I('get.page_num','2');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/expense_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json = json_encode($data); 
		$baoxiao = json_decode(post_json($urll,$json),true);
		$this->assign('baoxiao',$baoxiao);
		include COMMON_PATH.'/Common/load_more.php';
	}

	//报销详情
	public function baoxiao_info()
	{
		$jiekou = C("PATH_URL");
		$token = A_token();

		$expense_id = I('get.expense_id','');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$urll = $jiekou."/interface/yc_hos/expense_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expense_id"=>"$expense_id"
		);
		$json = json_encode($data);
		$baoxiao = json_decode(post_json($urll,$json),true);
		// dump($baoxiao);die;
		$this->assign('baoxiao',$baoxiao);
		$this->display();
	}

	//打卡帮助
	public function introduce()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//安卓打卡帮助
	public function introduceAn()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
	//ios帮助
	public function introduceIos()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
}