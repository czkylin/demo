<?php
namespace Expert\Controller;
use Think\Controller;
class ShareController extends Controller
{
	//发布咨询问题页面
	public function add_info()
	{	
		$doc_id = I('get.doc_id', '');
		$this->assign('doc_id', $doc_id);
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取坐标
		//include COMMON_PATH.'/Common/lat_lng.php';
		// if($_SESSION['lat'] == "")
		// {
		// 	$this->redirect('?m=Expert&c=Share&a=get_gps&type=add_info&doc_id='.$doc_id);
		// }

		$this->assign('lat',$lat);
		$this->assign('lng',$lng);

		//获取平台的access_token
		$token = A_token();

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_doc/share_type.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$share_list =json_decode(post_json($url,$json),true);

		$this->assign('share_list',$share_list);// 医生列
		$this->display(); // 输出模板
	}
	
	//信息提交页面
	public function add_ok()
	{
		$doc_id = I('get.doc_id', '');
		$lng = I('post.lng', '0');
		$lat = I('post.lat', '0');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$consultContent = I('post.consultContent', '');
		$share_type = I('post.share_type', '');
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
			$new_file = "./Public/Uploads/Share/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名

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

		$urll = C("PATH_URL")."/interface/yc_doc/share_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"share_content"=>"$consultContent",
			"lng"=>"$lng",
			"lat"=>"$lat",
			"share_pic"=>"$pic_path",
			"share_type"=>"$share_type"
		);
		$json = json_encode($data); 
		$con = json_decode(post_json($urll,$json),true);
		$result_id = $con["error_code"];
		if($result_id == "ok")
		{
			//跳转到成功页面
			$this->redirect("?m=Expert&c=Share&a=success&doc_id=".$doc_id);
		}
		else
		{
			$msg = "信息错误";
			if($con["error_code"] == "00030")
			{
				$msg = "相同类型不能重复提交";
			}
			//跳转到成功页面
			$this->redirect("?m=Expert&c=Share&a=error&msg=".$msg);
		}
	}

	public function success()
	{
		$doc_id = I('get.doc_id', '');
		$this->assign('doc_id', $doc_id);
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
		$doc_id = I('get.doc_id', '');
		$url_str = "m=Expert&c=Share&a=".$type."&doc_id=".$doc_id;
		$this->assign('url_str', $url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

	//所有专家分享信息列表
	public function share_list()
	{
		$doc_id = I('get.doc_id', '');
		$check_flag = I('get.check_flag', '1');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_doc/share_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"doc_id"=>"$doc_id",
			"check_flag"=>"$check_flag"
		);
		$json=json_encode($data);
		$share_list =json_decode(post_json($url,$json),true);
		$this->assign('share_list',$share_list);// 医生列表

		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json=json_encode($data);
		$data =post_json($url,$json);

		$doc_intro =json_decode($data,true);
		$doc['EXPERT_NAME'] = $doc_intro['EXPERT_NAME'];
		$doc['SMALL_PIC'] = $doc_intro['SMALL_PIC'];
		$doc['EXPERT_ID'] = $doc_intro['EXPERT_ID'];
		$doc['SMALL_PIC'] = $doc_intro['SMALL_PIC'];
		$doc['EXPERT_SEX'] = $doc_intro['EXPERT_SEX'];

		$this->assign("doc",$doc);
		$this->assign("doc_id",$doc_id);
		$this->display(); // 输出模板
	}
	
	//所有专家分享列表加载更多
	public function share_list_append()
	{
		$doc_id = I('get.doc_id', '');
		$check_flag = I('get.check_flag', '1');
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/share_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"doc_id"=>"$doc_id",
			"check_flag"=>"$check_flag"
		);
		$json=json_encode($data);
		$share_list = json_decode(post_json($url,$json),true);

		$this->assign('share_list',$share_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//专家个人分享信息列表
	public function my_share_list()
	{
		$doc_id = I('get.doc_id', '');
		$check_flag = I('get.check_flag', '0');
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_doc/share_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"doc_id"=>"$doc_id",
			"check_flag"=>"$check_flag"
		);
		$json=json_encode($data);
		$share_list =json_decode(post_json($url,$json),true);
		$count = count($share_list);//列表数量
		$this->assign('share_list',$share_list);// 医生列表
		$this->assign('count',$count);//数量判断

		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id"
		);
		$json=json_encode($data);
		$data =post_json($url,$json);
		$doc_intro =json_decode($data,true);

		$doc['EXPERT_NAME'] = $doc_intro['EXPERT_NAME'];
		$doc['EXPERT_SEX'] = $doc_intro['EXPERT_SEX'];
		$doc['SMALL_PIC'] = $doc_intro['SMALL_PIC'];
		$doc['EXPERT_ID'] = $doc_intro['EXPERT_ID'];
		$doc['IS_FLAG'] = $doc_intro['IS_FLAG'];
		$this->assign("doc",$doc);
		$str = "";
		if($doc['IS_FLAG'] == "1")
		{
			$str = "style=\"display:''\"";
		}
		else
		{
			$str = "style=\"display:none\"";
		}
		
		$this->assign("str",$str);
		$this->assign("doc_id",$doc_id);
		$this->assign("check_flag",$check_flag);
		$this->display(); // 输出模板
	}
	
	//专家个人分享列表加载更多
	public function my_share_list_append()
	{
		$page_num = I('get.page_num', '2');
		$doc_id = I('get.doc_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/share_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"doc_id"=>"$doc_id",
			"check_flag"=>""
		);
		$json=json_encode($data);
		$share_list = json_decode(post_json($url,$json),true);

		$this->assign('share_list',$share_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//分享详情
	public function share_info()
	{
		$record_id = I('get.record_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/talk_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"record_id"=>"$record_id"
		);
		$json = json_encode($data);
		$data = post_json($url,$json);
		
		if($data != "0")
		{
			$share['expert_str'] = $data;
		}
		else
		{
			$share['expert_str'] = "";
		}
		$this->assign("expert_str",$share['expert_str']);

		$url = C("PATH_URL")."/interface/yc_doc/share_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"record_id"=>"$record_id"
		);
		$json=json_encode($data);
		$data =post_json($url,$json);
		$share_info =json_decode($data,true);

		$share['type_name'] = $share_info['TYPE_NAME'];
		$share['share_content'] = $share_info['SHARE_CONTENT'];
		$share['share_pic'] = $share_info['SHARE_PIC'];
		$share['create_date'] = $share_info['CREATE_DATE'];
		$share['record_id'] = $share_info['RECORD_ID'];
		$this->assign("share",$share);	
		$this->display();
	}

	//分享详情点赞功能
	public function dz_add()
	{
		$record_id = I('get.record_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/talk_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"record_id"=>"$record_id"
		);
		$json = json_encode($data);
		$data = post_json($url,$json);
		$str = json_encode($data);
		echo $str;
	}
}