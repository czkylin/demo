<?php
namespace Home\Controller;
use Think\Controller;
class ReferralController extends Controller
{
	//转诊添加页
	public function referral()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_hos_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$hos_list =json_decode(post_json($url,$json),true);
		$this->assign('hos_list',$hos_list);// 医生列表
		$this->display(); // 输出模板
	}
	

	//转诊添加页
	public function referral_second()
	{	
		$referral_id = I('get.referral_id','');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_hos_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$hos_list =json_decode(post_json($url,$json),true);
		$this->assign('hos_list',$hos_list);// 医生列表

		
		$url = C("PATH_URL")."/interface/yc_hos/referral_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"referral_id"=>"$referral_id"
		);
		$json=json_encode($data);
		$referral_info = json_decode(post_json($url,$json),true);
		$this->assign("referral_info",$referral_info);
		$this->display(); // 输出模板
	}

	//转诊添加提交
	public function referral_add()
	{
		$person_name = I('post.person_name', '');
		$person_mobile = I('post.person_mobile', '');
		$person_idcard = I('post.person_idcard', '');
		$hos_id = I('post.hos_id', '');
		$referral_desc = I('post.referral_desc', '');

		$ch = curl_init();

		$url = "http://apis.juhe.cn/idcard/index?key=3bc516dc2f242cedb72f4aa43834dc02&cardno=".$person_idcard;
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    // 执行HTTP请求
	    curl_setopt($ch , CURLOPT_URL , $url);
	    $res = curl_exec($ch);
	    $result = json_decode($res,true);
	    if($result['resultcode'] != 200)
	    {
	    	echo "<script>alert('身份证号码错误'); history.back();</script>";
	    	return;
	    }

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     0;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads';
		$upload->savePath  =     '/Referral/'; // 设置附件上传目录// 上传文件 
		$info = $upload->upload();
		if(!$info) 
		{
			// 上传错误提示错误信息
			$this->error($upload->getError());
		}
		else
		{
			// 上传成功 获取上传文件信息    
			foreach($info as $file)
			{        
				$file_path = $file['savepath'].$file['savename'];
				$pic_path[] = "http://".$_SERVER['HTTP_HOST'].str_replace("/Referral","/weixin/Public/Uploads/Referral",$file_path);
			}
		}
		$person_idcard_pic = $pic_path[0];

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_name"=>"$person_name",
			"person_mobile"=>"$person_mobile",
			"person_idcard"=>"$person_idcard",
			"person_idcard_pic"=>"$person_idcard_pic",
			"hos_id"=>"$hos_id",
			"referral_desc"=>"$referral_desc"
		);
		$json=json_encode($data);
		$res = json_decode(post_json($url,$json),true);
		if($res['error_code'] == 'ok')
		{
			echo "<script>alert('提交成功'); location.href='/weixin/index.php?m=Home&c=Referral&a=referral_list'</script>";
		}
		else
		{		
			switch ($res['error_code']) 
			{
				case '00010':
					$msg = "没有绑定手机号";
					break;
				case '00001':
					$msg = "系统错误";
					break;
				default:
					$msg = "";
					break;
			}
			echo "<script> alert('提交失败 ".$msg."');javascript:history.go(-1);</script>";
			return false;
		}


	}

	//转诊列表
	public function referral_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$referral_list = json_decode(post_json($url,$json),true);
		$this->assign("referral_list",$referral_list);
		$this->display();
	}

	//转诊列表加载更多
	public function referral_list_append()
	{
		$page_num = I('get.page_num','2');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$referral_list = json_decode(post_json($url,$json),true);
		$this->assign("referral_list",$referral_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//转诊列表加载更多
	public function referral_info()
	{
		$referral_id = I('get.referral_id','');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"referral_id"=>"$referral_id"
		);
		$json=json_encode($data);
		$referral_info = json_decode(post_json($url,$json),true);
		$this->assign("referral_info",$referral_info);
		$this->display();
	}

	//转诊列表加载更多
	public function referral_list_info()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_list_count.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$referral_list = json_decode(post_json($url,$json),true);
		$this->assign("referral_list",$referral_list);
		$this->display();
	}

	//转诊列表加载更多
	public function referral_info_append()
	{
		$page_num = I('get.page_num','2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_list_count.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$referral_list = json_decode(post_json($url,$json),true);
		$this->assign("referral_list",$referral_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//转诊列表
	public function referral_list_details()
	{
		$create_date = I('get.create_date','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_day_count.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"create_date"=>"$create_date",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$day_list = json_decode(post_json($url,$json),true);
		$this->assign("day_list",$day_list);
		$this->assign("create_date",$create_date);
		$this->display();
	}
	//当天统计转诊加载更多
	public function referral_details_append()
	{
		$create_date = I('get.create_date','');
		$page_num = I('get.page_num','2');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/referral_day_count.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"create_date"=>"$create_date",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$day_list = json_decode(post_json($url,$json),true);
		$this->assign("day_list",$day_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
}