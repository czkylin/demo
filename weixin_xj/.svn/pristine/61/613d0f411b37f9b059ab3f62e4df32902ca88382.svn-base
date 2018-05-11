<?php
namespace Member\Controller;
use Think\Controller;
class JixiaoController extends Controller
{
	//发布咨询问题页面
	public function add_info()
	{
        
        $tj_type = I('get.tj_type', 'jx_list');
        $lat = I('get.lat', '');
		$lng = I('get.lng', '');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取坐标
		//include COMMON_PATH.'/Common/lat_lng.php';

		if($lat == "")
		{
			$this->redirect('?m=Member&c=jixiao&a=get_gps&type=add_info&tj_type='.$tj_type);
		}
		$this->assign('lat',$lat);
		$this->assign('lng',$lng);

		//获取平台的access_token
		$token = A_token();

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_member/waiqin_type.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$wq_list =json_decode(post_json($url,$json),true);
		$this->assign('wq_list',$wq_list);// 医生列表
        $this->assign('tj_type',$tj_type );
		$this->display(); // 输出模板
	}
	
	//信息提交页面
	public function add_ok()
	{
		//print_r ($_POST);die;
		$lng = I('post.lng', '0');
		$lat = I('post.lat', '0');
        $tj_type= I('post.tj_type', '');
	
		if($lng == 0 || $lat == 0)
		{
			//跳转到成功页面
			$this->redirect("?m=Member&c=Jixiao&a=error&msg=获取地理位置失败，请先设置定位");
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

		$urll = C("PATH_URL")."/interface/yc_member/waiqin_add.aspx?access_token=".$token;
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
			$this->redirect("?m=Member&c=Jixiao&a=success&tj_type=".$tj_type);
		}
		else
		{
			$msg = "信息错误";
			if($con["error_code"] == "00030")
			{
				$msg = "相同类型不能重复提交超过2次";
			}
			//跳转到成功页面
			$this->redirect("?m=Member&c=Jixiao&a=error&msg=".$msg);
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
		$url_str = "m=Member&c=Jixiao&a=".$type."&tj_type=".$tj_type;
		$this->assign('url_str', $url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
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


		//获取会员的头像及昵称
		$url = C("PATH_URL")."/interface/yc_member/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		//dump($data);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);// 赋值

		//获取绩效列表
		$url = C("PATH_URL")."/interface/yc_member/waiqin_list.aspx?access_token=".$token;
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

		$url = C("PATH_URL")."/interface/yc_member/waiqin_list.aspx?access_token=".$token;
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


		//获取会员的头像及昵称
		$url = C("PATH_URL")."/interface/yc_member/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		//dump($data);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);// 赋值

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_member/waiqin_org_list.aspx?access_token=".$token;
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

		$url = C("PATH_URL")."/interface/yc_member/waiqin_org_list.aspx?access_token=".$token;
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

}