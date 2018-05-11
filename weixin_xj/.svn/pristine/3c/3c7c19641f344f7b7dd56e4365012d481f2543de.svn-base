<?php
namespace Home\Controller;
use Think\Controller;
class BaoZController extends Controller
{
	//运营端增加帮用户提交心脏护照信息
	public function bz_info()
	{
		$person_name = I('get.person_name','');
		$card = I('get.card','');
		$link_mobile = I('get.link_mobile','');
		$today = date("Y-m-d");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		// php人的信息
		$url = C("PATH_URL")."/interface/yc_hos/get_tj_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		// 售卡产品
		$url = C("PATH_URL")."/interface/yc_hos/card_sale_type_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$card_list = json_decode(post_json($url,$json),true);
		// var_dump($card_list);


		//药店列表
		$url = C("PATH_URL")."/interface/yc_hos/hz_yd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$this->assign("yd_list",$yd_list);
		$this->assign("card_list",$card_list);
		$this->assign("name",$user_info['real_name']);
		$this->assign("phone",$user_info['link_mobile']);
		$this->assign("user_id",$user_info['user_id']);
		$this->assign("today",$today);
		$this->assign("person_name",$person_name);
		$this->assign("card",$card);
		$this->assign("link_mobile",$link_mobile);

		$this->display();
	}

	public function bz_add()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$sale_type = I('post.sale_type','');
		$hos_id = I('post.hos_id',''); 
		$tj_name = I('post.tj_name',''); 
		$tj_mobile = I('post.tj_mobile','');
		$person_name = I('post.person_name','');
		$card = I('post.card','');
		$link_mobile = I('post.link_mobile','');
		$today = I('post.today','');
		$user_id = I('get.user_id','');
		$link_number = I('post.link_number','');
	
		$jzr_date = I('post.jzr_date','');

		


		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     0;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads';
		$upload->savePath  =     '/baibei/'; // 设置附件上传目录// 上传文件 
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
				$pic_path[] = "http://".$_SERVER['HTTP_HOST'].str_replace("/baibei","/weixin/Public/Uploads/baibei",$file_path);
			}
		}
		$pic1 = $pic_path[0];
		$pic2 = $pic_path[1];
		$pic3 = $pic_path[2];
		$pic4 = $pic_path[3];
		// $pic5 = $pic_path[4];

		$pic_length = count($pic_path);
		if($pic_length < 4)
		{
			echo "<script>alert('图片上传失败，请重新选择图片！');javascript:history.go(-1);</script>";
			die;
		}


		//$url = "/interface/yc_hos/hos_bx_info_add.aspx";

		$url = C("PATH_URL")."/interface/yc_hos/hos_bx_info_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"tj_userid"=>"$user_id",
			"tj_mobile"=>"$tj_mobile",
			"pic1"=>"$pic1",
			// "pic2"=>"$pic2",
			"pic3"=>"$pic2",
			"pic4"=>"$pic3",
			"pic5"=>"$pic4",
			"sale_type"=>"$sale_type",
			"person_name"=>"$person_name",
			"person_mobile"=>"$link_mobile",
			"person_idcard"=>"$card",
			"hos_id"=>"$hos_id",
			"card_number"=>"$link_number"
		);
		$json=json_encode($data);
		$bz_status = json_decode(post_json($url,$json),true);
		if($bz_status['error_code'] == 'ok')
		{
			echo "<script>alert('提交成功'); location.href='/weixin/index.php?m=Home&c=BaoZ&a=bz_list'</script>";
		}
		else
		{		
			switch ($bz_status['error_code']) {
				case '00010':
					$msg = "没有绑定手机号";
					break;
				case '00001':
					$msg = "系统错误";
					break;
				case '00048':
					$msg = "该卡为预售不可退，您无权限绑定";
					break;
				default:
					$msg = "";
					break;
			}
			echo "<script> alert('提交失败 ".$msg."');javascript:history.go(-1);</script>";
			return false;
		}

	}

	//运营端增加帮用户提交心脏护照信息列表
	public function bz_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//心脏护照信息列表
		$url = C("PATH_URL")."/interface/yc_hos/jyzr_person_bx_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$bz_data = json_decode(post_json($url,$json),true);
		// var_dump($bz_data);

		$this->assign("bz_list",$bz_data);
		$this->assign("user_id",$user_id);
		$this->display();
	}

	public function bz_list_append()
	{
		$page_num = I('get.page_num','2');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//心脏护照信息列表
		$url = C("PATH_URL")."/interface/yc_hos/jyzr_person_bx_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);

		$bz_data = json_decode(post_json($url,$json),true);
		$this->assign("bz_list",$bz_data);
		include COMMON_PATH.'/Common/load_more.php';
	}


	public function income()
	{
		$date_start = date('Y-m-d',strtotime('-6days'));
		$date_end = date('Y-m-d',time());

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//心脏护照信息列表
		$url = C("PATH_URL")."/interface/yc_hos/hk_report.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"date_start"=>"$date_start",
			"date_end"=>"$date_end",
			"x_direction"=>"day"
		);
		$json=json_encode($data);
		$res = json_decode(post_json($url,$json),true);

		foreach ($res as $key => $value) 
		{
			$seven_res['HMOYS'] += $value['HMOYS'];
			$seven_res['HMOXS'] += $value['HMOXS'];
			$seven_res['YP'] += $value['YP'];
			$seven_res['SHOUSHU'] += $value['SHOUSHU'];
			$seven_res['HC'] += $value['HC'];
			$seven_res['HKYP'] += $value['HKYP'];
			$seven_res['HKSB'] += $value['HKSB'];

		}

		$seven_res['COUNT'] = floatval($seven_res['HMOYS'])+floatval($seven_res['HMOXS'])+floatval($seven_res['YP'])+floatval($seven_res['SHOUSHU'])+floatval($seven_res['HC'])+floatval($seven_res['HKYP'])+floatval($seven_res['HKSB']);
		

		$home_date = date('Y').'-01-01';
		$data = array
		(
			"openid"=>"$openid",
			"date_start"=>"$home_date",
			"date_end"=>"$date_end",
			"x_direction"=>"day"
		);
		$json = json_encode($data);
		$result = json_decode(post_json($url,$json),true);
		
		foreach ($result as $k => $v) 
		{
			$all_res['HMOYS'] += $v['HMOYS'];
			$all_res['HMOXS'] += $v['HMOXS'];
			$all_res['YP'] += $v['YP'];
			$all_res['SHOUSHU'] += $v['SHOUSHU'];
			$all_res['HC'] += $v['HC'];
			$all_res['HKYP'] += $v['HKYP'];
			$all_res['HKSB'] += $v['HKSB'];

		}

		$all_res['COUNT'] = floatval($all_res['HMOYS'])+floatval($all_res['HMOXS'])+floatval($all_res['YP'])+floatval($all_res['SHOUSHU'])+floatval($all_res['HC'])+floatval($all_res['HKYP'])+floatval($all_res['HKSB']);
		// dump($all_res);die;
		$this->assign("date_start",$date_start);
		$this->assign("home_date",$home_date);
		$this->assign("date_end",$date_end);
		$this->assign("res",$seven_res);
		$this->assign("result",$all_res);
		$this->display();
	}


	public function income_search()
	{

		$date_start = I('post.start_time','2017-01-01');
		$date_end = I('post.end_time',date('Y-m-d',time()));
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//心脏护照信息列表

		$url = C("PATH_URL")."/interface/yc_hos/hk_report.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"date_start"=>"$date_start",
			"date_end"=>"$date_end",
			"x_direction"=>"day"
		);
		$json=json_encode($data);
		$res = json_decode(post_json($url,$json),true);
		foreach ($res as $key => $value) 
		{
			$search_res['HMOYS'] += $value['HMOYS'];
			$search_res['HMOXS'] += $value['HMOXS'];
			$search_res['YP'] += $value['YP'];
			$search_res['SHOUSHU'] += $value['SHOUSHU'];
			$search_res['HC'] += $value['HC'];
			$search_res['HKYP'] += $value['HKYP'];
			$search_res['HKSB'] += $value['HKSB'];

		}
		$search_res['COUNT'] = floatval($search_res['HMOYS'])+floatval($search_res['HMOXS'])+floatval($search_res['YP'])+floatval($search_res['SHOUSHU'])+floatval($search_res['HC'])+floatval($search_res['HKYP'])+floatval($search_res['HKSB']);
		$this->ajaxReturn($search_res);

	}


	public function income_search_day()
	{

		$date_start = I('post.start_time','2017-01-01');
		$date_end = I('post.end_time',date('Y-m-d',time()));
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//心脏护照信息列表

		$url = C("PATH_URL")."/interface/yc_hos/hk_report.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"date_start"=>"$date_start",
			"date_end"=>"$date_end",
			"x_direction"=>"day"
		);
		$json=json_encode($data);
		$res = json_decode(post_json($url,$json),true);
		
		$this->ajaxReturn($res);

	}


	public function income_search_month()
	{

		$date_start = I('post.start_time','2017-01-01');
		$date_end = I('post.end_time',date('Y-m-d',time()));
		
		$date_start = date('Y-m-d',strtotime($date_start));
		$date_end = date('Y-m-d',strtotime($date_end));
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//心脏护照信息列表

		$url = C("PATH_URL")."/interface/yc_hos/hk_xn_total_month.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"date_start"=>"$date_start",
			"date_end"=>"$date_end"
		);
		$json=json_encode($data);
		$res = json_decode(post_json($url,$json),true);
		
		$this->ajaxReturn($res);

	}
}