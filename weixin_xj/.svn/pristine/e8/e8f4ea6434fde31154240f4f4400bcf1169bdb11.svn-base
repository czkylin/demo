<?php
namespace Expert\Controller;
use Think\Controller;
class MemberController extends Controller
{
	//医生我的患者列表 --我添加的
	public function member_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);	
		$json = json_encode($data);
		$expert_info = json_decode(post_json($url,$json),true);
		// var_dump($expert_info);
		//医生我的患者列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_member_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"fz_flag"=>"0",
			"token_id"=>C('M_TOKEN_ID'), //患者端token_id
			"user_type"=>"0"
		);
		$json=json_encode($data);
		$member_list =json_decode(post_json($url,$json),true);
		//按字母区分
		foreach ($member_list as $key => $value) 
		{
			$member_list[$key]['jsondate'] = base64_encode(json_encode($value));
			$str = str($value['MEMBER_NAME']);
			if(!$str)
			{
				$str = '#';
			}
			$member_list[$key]['STR'] = $str;

			$str_list[] = $str;
		}

		$str_list = array_unique($str_list);
		sort($str_list);
		
		$this->assign('str_list',$str_list);// 字符串列表
		$this->assign('member_list',$member_list);// 医生我的患者列表
		$this->assign('expert_info',$expert_info);// 医生我的患者列表
		$this->display(); // 输出模板
	}
	

	//医生我的患者列表 --已出院的
	public function member_leavehosptial()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);	
		$json = json_encode($data);
		$expert_info = json_decode(post_json($url,$json),true);
		// var_dump($expert_info);
		//医生我的患者列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_member_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"fz_flag"=>"1",
			"token_id"=>C('M_TOKEN_ID'), //患者端token_id
			"user_type"=>"0"
		);
		$json=json_encode($data);
		$member_list =json_decode(post_json($url,$json),true);

		//按字母区分
		foreach ($member_list as $key => $value) 
		{
			$member_list[$key]['jsondate'] = base64_encode(json_encode($value));
			$str = str($value['MEMBER_NAME']);
			if(!$str)
			{
				$str = '#';
			}
			$member_list[$key]['STR'] = $str;

			$str_list[] = $str;
		}

		$str_list = array_unique($str_list);
		sort($str_list);
		// var_dump($member_list,$str_list);
// dump($member_list);
		$this->assign('str_list',$str_list);// 字符串列表
		$this->assign('member_list',$member_list);// 医生我的患者列表
		$this->assign('expert_info',$expert_info);// 医生我的患者列表
		$this->display(); // 输出模板
	}


	//医生我的患者列表 --咨询我的
	public function cousult_me_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//医生我的患者列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_member_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"fz_flag"=>"0",
			"token_id"=>C('M_TOKEN_ID'), //患者端token_id
			"user_type"=>"1"
		);
		$json=json_encode($data);
		$member_list =json_decode(post_json($url,$json),true);
		// var_dump($url,$json);

		//按字母区分
		foreach ($member_list as $key => $value) 
		{
			$member_list[$key]['jsondate'] = base64_encode(json_encode($value));
			$str = str($value['MEMBER_NAME']);
			if(!$str)
			{
				$str = '#';
			}
			$member_list[$key]['STR'] = $str;

			$str_list[] = $str;
		}

		$str_list = array_unique($str_list);
		sort($str_list);
		// var_dump($member_list,$str_list);

		$this->assign('str_list',$str_list);// 字符串列表
		$this->assign('member_list',$member_list);// 医生我的患者列表
		$this->assign('expert_info',$expert_info);// 医生我的患者列表
		$this->display(); // 输出模板
	}

	//发送邀请 
	public function send_yq()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$expert_id = I('post.expert_id','');
		$member_id = I('post.member_id','');


		$url = C("PATH_URL")."/interface/send_yq.aspx?access_token=".$token;
		$data = array
		(
			"member_id"=>"$member_id",
			"expert_id"=>"$expert_id",
			"yw_id"=>C("YW_ID")
		);
		$json=json_encode($data);
		$send_yq =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($send_yq['error_code']);
	}

	// //医生我的患者列表
	// public function member_list_append()
	// {
	// 	$page_num = I('get.page_num', '2');

	// 	//获取平台的access_token
	// 	$token = A_token();

	// 	//获取openid
	// 	include MODULE_PATH.'/Common/open_id.php';

	// 	//验证手机是否绑定
	// 	include MODULE_PATH.'/Common/check_band.php';

	// 	//医生我的患者列表
	// 	$url = C("PATH_URL")."/interface/yc_doc/expert_member_list.aspx?access_token=".$token;
	// 	$data = array
	// 	(
	// 		"openid"=>"$openid",
	// 		"page_num"=>"$page_num",
	// 		"token_id"=>C('M_TOKEN_ID') //患者端token_id
	// 	);
	// 	$json=json_encode($data);
	// 	$member_list =json_decode(post_json($url,$json),true);

	// 	$this->assign('member_list',$member_list);// 医生列表
	// 	//输出更多列表
	// 	include COMMON_PATH.'/Common/load_more.php';
	// }

	//医生添加我的患者
	public function member_add()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->display(); // 输出模板
	}

	//我的患者
	public function huanzhe_info()
	{
		$jsondate = I('get.jsondate','');
		$person_date = json_decode(base64_decode($jsondate),true);
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		$this->assign('person_date',$person_date);
		$this->display();

	}

	//我的患者
	public function huanzhe_update()
	{
		$fz_flag = I('post.fz_flag','');
		$member_id = I('post.member_id','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/expert_member_update.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"fz_flag"=>"$fz_flag"
		);
		$json=json_encode($data);
		$update =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($update['error_code']);
	}

	//我的患者
	public function huanzhe_del()
	{
		$member_id = I('post.member_id','');
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/expert_member_del.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_id"=>"$member_id",
		);
		$json=json_encode($data);
		$del =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($del['error_code']);
	}


	//我的患者
	public function member_info()
	{
		$member_mobile = I('post.member_mobile','');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//患者信息
		$url = C("PATH_URL")."/interface/yc_doc/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
		$json=json_encode($data);
		$member_info =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($member_info);

	}


	//医生添加我的患者
	public function member_add_ok()
	{
		$jsondate = I('post.jsondate','');
		$person_date = json_decode(base64_decode($jsondate),true);
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		if($person_date)
		{
			$member_name = $person_date['MEMBER_NAME'];
			$member_mobile = $person_date['MEMBER_MOBILE'];
			if($person_date['MEMBER_SEX'] == '男')
			{
				$member_sex = '0';
			}
			elseif($person_date['MEMBER_SEX'] == '女')
			{
				$member_sex = '1';
			}
			else
			{
				$member_sex = '';
			}
			$member_age = $person_date['MEMBER_AGE'];
			$member_card = $person_date['MEMBER_CARD'];
			$pic_path = $person_date['MEMBER_PIC'];
		}
		else
		{
			$member_name = I('post.member_name','');
			$member_sex = I('post.member_sex','');
			$member_mobile = I('post.member_mobile','');
			$member_age = I('post.member_age','');
			$member_card = I('post.member_card','');

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
				$new_file = "./Public/Uploads/member_add/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名

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
		}

		$url = C("PATH_URL")."/interface/yc_doc/expert_member_add.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"member_pic"=>"$pic_path",
			"member_name"=>"$member_name",
			"member_sex"=>"$member_sex",
			"member_mobile"=>"$member_mobile",
			"member_age"=>"$member_age",
			"member_card"=>"$member_card"
		);
		$json=json_encode($data);
		$member_add =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($member_add['error_code']);
	}

	//获取医生的VIP患者列表
	public function member_viplist()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取医生的VIP患者列表
		$url = C("PATH_URL")."/interface/yc_doc/home_member_list.aspx?access_token=".$token;
		$data = array
		(
			"openid" => "$openid",
			"page_num" => "1",
		);
		$json=json_encode($data);
		$member_viplist = json_decode(post_json($url,$json),true);

		if($member_viplist)
		{
			foreach ($member_viplist as $key => $value) 
			{
				$member_viplist[$key]['jsondate'] = base64_encode(json_encode($value));
			}
		}
		$this->assign('member_viplist',$member_viplist);//赋值数据集
		$this->assign('empty',"暂无数据");
		$this->assign('count',$count);// 赋值数据集
		$this->display(); // 输出模板
	}

	//获取医生的VIP患者列表加载更多
	public function member_viplist_append()
	{
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生的VIP患者列表
		$url = C("PATH_URL")."/interface/yc_doc/home_member_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
		);
		$json=json_encode($data);
		$member_viplist = json_decode(post_json($url,$json),true);

		$this->assign('member_viplist',$member_viplist);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


	//医生端患者病例资料
	public function member_detail()
	{
		$jsondate = I('get.jsondate','');
		$pd = I('get.pd','');
		$person_date = json_decode(base64_decode($jsondate),true);
		// print_r($person_date);
		$member_id = $person_date['MEMBER_ID'];
		$sign = $person_date['Sign'];
		$hos_id = $person_date['MemberHosid'];

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//病例
		$url = C("PATH_URL")."/interface/yc_doc/case_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$case_list =json_decode(post_json($url,$json),true);
		

		//患者信息
		$url = C("PATH_URL")."/interface/yc_doc/person_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_id"=>"$member_id"
		);
		$json=json_encode($data);
		$member_info =json_decode(post_json($url,$json),true);


		//获取医生详细信息//
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json = json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$expert_id = $user_info['EXPERT_ID'];
		$date = $person_date['CheckDate'];

		//判断红点 是否显示
		$urlspot = C("NEW_PATH_URL")."/ServiceYunWeixinAPI/ServiceDoctor/ServiceYunAPI.asmx/JudgeRedState";
		$data = "Personid=".$member_id."&ExpertId=".$expert_id;
		$isSpot = json_decode(post_json($urlspot,$data),true);

		//判断医生与患者是否有关系
		$urlred = C("NEW_PATH_URL")."/ServieYunAPI/ServiceDoctor/WebService.asmx/DocMemberRelationship";
		$data = "PersonId=".$member_id."&Docid=".$expert_id;

		$exmb = json_decode(post_json($urlred,$data),true);
		if(!$exmb)
		{
			$exmb = '';
		}
		$this->assign('member_info',$member_info);
		$this->assign('isSpot',$isSpot); //判断红点
		$this->assign('person_date',$person_date);
		$this->assign('case_list',$case_list);
		$this->assign('jsondate',$jsondate);
		$this->assign('exmb',$exmb);
		$this->assign('expert_id',$expert_id);
		$this->assign('member_id',$member_id);
		$this->assign('date',$date);
		$this->assign('pd',$pd);
		$this->assign('hos_id',$hos_id);
		$this->display(); // 输出模板
	}


	//医生端患者病例资料列表
	public function member_detail_append()
	{
		$member_id = I('get.member_id','');
		$page_num = I('get.page_num','');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/case_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$case_list =json_decode(post_json($url,$json),true);
		$this->assign('case_list',$case_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//医生诊后随访页面
	public function consult_pay()
	{
		$consult_error = I('get.consult_error', '');

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$member_id  = I('get.member_id','');
		$this->assign('member_id',$member_id);// 赋值数据集
		$this->assign('consult_error',$consult_error);
		$this->display(); 
		
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

		$lat = I('post.lat', '0');
		$lng = I('post.lng', '0');
		$consultContent = I('post.consultContent', '');
		$member_id = I('post.member_id', '0');
		$order_id = I('post.order_id','1');

		$time = date("Y-m-d H:i:s",time());

		$urll = C("PATH_URL")."/interface/yc_doc/consult_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_content"=>"$consultContent",
			"member_id"=>"$member_id",
			"create_date"=>"$time",
			"consult_img"=>"",
			"order_id"=>"0",
			"lat"=>"$lat",
			"lng"=>"$lng"
		);
		$json = json_encode($data);
		$con = json_decode(post_json($urll,$json),true);
		// var_dump($urll,$json);die();

		$consult_id = $con["consult_id"];

		if($consult_id != "")
		{
			//跳转到咨询对话页面
			$this->redirect("?m=Expert&c=Jtys&a=consult_details&consult_id=$consult_id");
		}
		else
		{
			$consult_error = $con["error_code"];
			$this->redirect("?m=Expert&c=Member&a=consult_pay&consult_error=".$consult_error); 
		}
	}

	
	//创建就诊记录
    public function bingli_add()
    {
    	$record_id = I('get.record_id','');
    	$member_id = I('get.member_id','0');
    	$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->assign('record_id',$record_id);
		$this->assign('member_id',$member_id);
    	$this->display();
    }


    //创建就诊记录
    public function bingli_add_ok()
    {
        $record_id = I('post.record_id','');
        $member_id = I('post.member_id','0');
        $case_title = I('post.bingli_name','');
        $case_desc = I('post.bingli_ms','');
        $imgbase64 = I('post.imgbase64','');
        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

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
                
            $new_file = "./Public/Uploads/bingli/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
                
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
                $pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
            }
        }
        //获取创建就诊记录接口
        $url = C("PATH_URL")."/interface/yc_doc/case_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "record_id"=>"$record_id",
            "member_id"=>"$member_id",
            "case_title"=>"$case_title",
            "case_desc"=>"$case_desc",
            "case_pics"=>"$pic_path"
        );
        // var_dump($url,$data);die();

        $json=json_encode($data);
        $bingli = json_decode(post_json($url,$json),true);
        // var_dump($url,$json,$bingli);
        if($bingli['error_code'] == 'ok')
        {
            echo "1";
        }
    }

}