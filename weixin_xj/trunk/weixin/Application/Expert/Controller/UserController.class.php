<?php
namespace Expert\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8");
class UserController extends Controller
{
	//个人中心
	public function index()
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
		$user_info = json_decode(post_json($url,$json),true);

		//获取医生积分总分
		$url = C("PATH_URL")."/interface/yc_doc/expert_jf.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json=json_encode($data);
		$jifen = json_decode(post_json($url,$json),true);

		$this->assign('jifen',$jifen);
		$this->assign('user_info',$user_info);
		$this->assign('openid',$openid);
		$this->display(); // 输出模板
	}

	//消息列表
	public function xiaoxi_list()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取消息列表信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_ts_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$xiaoxi_list = json_decode(post_json($url,$json),true);

		$num = '5';
		$this->assign('num',$num);
		$this->assign('xiaoxi_list',$xiaoxi_list);
		$this->display(); // 输出模板
	}

	//消息列表加载更多
	public function xiaoxi_list_append()
	{
		$page_num = I('get.page_num','2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取消息列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_ts_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"expert_id"=>""
		);
		$json=json_encode($data);
		$xiaoxi_list = json_decode(post_json($url,$json),true);

		$this->assign('xiaoxi_list',$xiaoxi_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//消息详情
	public function xiaoxi_info()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取消息详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_ts_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$xiaoxi_info = json_decode(post_json($url,$json),true);

		$this->assign('xiaoxi_info',$xiaoxi_info);
		$this->display(); // 输出模板
	}

	//积分明细
	public function jifen_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_jf_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$jifen_list = json_decode(post_json($url,$json),true);

		$this->assign('jifen_list',$jifen_list);
		$this->display(); // 输出模板
	}

	//积分明细加载更多
	public function jifen_list_append()
	{
		$page_num = I('get.page_num','2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_jf_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$jifen_list = json_decode(post_json($url,$json),true);

		$this->assign('jifen_list',$jifen_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//积分规则
	public function jifen_guize()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$this->display();
	}

	//获取证书
	public function zhengshu()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取证书信息
		$img = C("PATH_URL")."/interface/yc_doc/get_zs_s_pic.aspx?openid=$openid";
		return $img;
	}

	//审核成功页面
	public function shenheCg()
	{
		$openid = I('get.openid','');

		if($openid=="")
		{
			$this->redirect('?m=Expert&c=Follow&a=index');
		}
		//获取证书信息
		$img = C("PATH_URL")."/interface/yc_doc/get_zs_s_pic.aspx?openid=$openid";

		$this->assign('zhengshu',$img);
		$this->display();
	}

	//注册
	public function zhuce()
	{	
		$flag = I('get.flag','1');
		$link_phone = I('get.link_phone','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		if($openid=="")
		{
		    $this->redirect('?m=Expert&c=Follow&a=index');
		}

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
	
		//获取医生详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_info_band.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid", 
			"expert_id"=>""
		);
		$json=json_encode($data);
		$user_info_wx = json_decode(post_json($url,$json),true);
		$link_mobile = $user_info_wx['EXPERT_MOBILE'];//绑定

		//申请状态
			//①获取申请信息
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$tj_mobile = $user_info['TJ_MOBILE'];// 推挤手机号
			//②获取申请信息
		$url = C("PATH_URL")."/interface/yc_doc/doc_info_add_flag.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"link_mobile"=>"$link_mobile"
		);
		$json = json_encode($data);
		$user_zt = json_decode(post_json($url,$json),true);
		switch ($user_zt['error_code'])
		{
			case 0:
			  	$template_html="shenHeZhong";//待审页面
			  	break;
			case 1:
			  	$template_html="shenheCg";//通过页面
			  	if($flag)
			  	{
			  		$zhengshu = $this->zhengshu();//证书
			  	}else{
			  		$this->redirect('?m=Expert&c=User&a=mywork_house');
			  	}
			  		
			  	break;
			case 2:
	          	$template_html="jujue";//拒绝页面
	          	$data = "审核拒绝,暂时不能注册！";
	          	$img = "yjimg";
	          	break;
	        case 3:
	          	$template_html="zhuce";//注册页面
	          	break; 
			default:
			  	$template_html="";//系统错误
		}
		

		$this->assign('user_info',$user_info);
		$this->assign('zhengshu',$zhengshu);
		$this->assign('openid',$openid);
		$this->assign('img',$img);
		$this->assign('data',$data);
		$this->assign('link_mobile',$link_mobile);
		$this->assign('tj_mobile',$tj_mobile);
		$this->display($template_html); // 输出模板
	}
	//注册须知
	public function zhuce_xz()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}


	public function getimgbase64($imgbase64){
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
				
			$new_file = "./Public/Uploads/zhuce/".date("Y-m-d")."/".time().rand(99,9999).".{$type}";//保存名称、文件名
				
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

		return $pic_path;
	}


	//注册成功
	public function zhuce_cg()
	{
		$doc_img = I('post.doc_img','');
		$ys_img = I('post.ys_img','');
		$gz_img = I('post.gz_img','');
		$qm_img = I('post.qm_img','');

		$doc_img= $this->getimgbase64($doc_img); //医生照片
		$ys_img= $this->getimgbase64($ys_img); //医师执业资格证图片
		$gz_img= $this->getimgbase64($gz_img); //工作证图片
		$qm_img= $this->getimgbase64($qm_img); //签名

		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		//必填项

		$list['expert_name'] = I('post.expert_name','');		//医生名字
	 	$list['expert_sex'] = I('post.sex','');					//性别
		if($list['expert_sex']=="女")
		{
			$list['expert_sex']=1;
		}
		else
		{
			$list['expert_sex']=0;
		}
		$list['birth_date'] = I('post.birs','');				//出生年月日
		$list['hos_name']= I('post.hos_name','');				//医院名称
		$list['dep_name']= I('post.dep_name','');				//科室
		$list['expert_role']= I('post.expert_role','');					//职务职称
		$list['expert_certificateid']= I('post.ex_cid','');	    //医生证件号
		$list['expert_wx'] = I('post.wx_cid','');				//微信号
		$list['expert_qq'] = I('post.qq_cid','');				//QQ号
		$list['link_email'] = I('post.email','');				//邮箱
		$list['link_mobile'] = I('post.link_mobile','');		//手机号

		//非填项
		$list['ddzy_start_date']= I('post.dd_start','');		//多点执业开始
		$list['ddzy_end_date']= I('post.dd_end','');			//多点执业结束
		$list['link_address'] = I('post.link_address','');		//通讯地址
		$list['expert_experience'] = I('post.ex_xxjl','');		//学习经历
		$list['expert_skill']= I('post.expert_skill','');		//技能
		$list['expert_desc']= I('post.expert_desc','');		  	//其他

		$list['link_cz'] = I('post.link_cz','');
		$list['sq_name'] = I('post.expert_name','');			//申请人
		$list['sq_date'] = I('post.sq_date','');				//申请时间
		$list['tj_name'] = I('post.tj_name','');				//推荐人
		$list['tj_mobile'] = I('post.tj_mobile','');			//推荐人手机号

		$url = C("PATH_URL")."/interface/yc_doc/doc_info_add_yk.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_name" => $list['expert_name'],	//医生名字
			"expert_sex" => $list['expert_sex'],	//性别
			"birth_date"=>$list['birth_date'],		//出生年月日
			"hos_name"=>$list['hos_name'],			//医院名称
			"dep_name"=>$list['dep_name'],			//科室
			"expert_role"=>$list['expert_role'],	//职务职称
			"expert_card_id"=>$list['expert_certificateid'],	//医生证件号
			"expert_wx"=>$list['expert_wx'], 					//微信号
			"expert_qq"=>$list['expert_qq'], 					//QQ号
			"link_email"=>$list['link_email'], 					//邮箱
			"link_mobile"=>$list['link_mobile'], 				//手机号
			"yw_id"=>C('YW_ID'), 									//

			"ddzy_start_date"=>$list['ddzy_start_date'],		//多点执业开始
			"ddzy_end_date"=>$list['ddzy_end_date'],			//多点执业结束
			"link_address"=>$list['link_address'],			//通讯地址
			"expert_experience"=>$list['expert_experience'],		//学习经历
			"expert_skill"=>$list['expert_skill'],			//技能
			"expert_desc"=>$list['expert_desc'],			//其他

			"tj_name"=>$list['tj_name'],
			"tj_mobile"=>$list['tj_mobile'],
			"link_cz"=>$list['link_cz'],
			"sq_name"=>$list['sq_name'],
			"sq_date"=>date("Y-m-d",time()),

			"small_pic"=>$doc_img, //医生头像
			"certificateid_pic"=>$ys_img,  //医师执业资格证图片
			"work_pic"=>$gz_img,  //工作证图片
			"doc_signature"=>$qm_img,  //医生头像

			"yc_service"=>'0'
		);
		$json=json_encode($data);
		// print_r(post_json($url,$json));die;
		$user_info = json_decode(post_json($url,$json),true);
		$code = error_code($user_info['error_code']);
		echo $code;
	}

	public function band_phone()
	{
		//获取平台的access_token
		$token = A_token();

		include MODULE_PATH.'/Common/open_id.php';	

		if($openid=="")
		{
		    $this->redirect('?m=Expert&c=Follow&a=index');
		}

		//获取会员的头像及昵称
		$url = C("PATH_URL")."/interface/yc_doc/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$user['HEADIMGURL'] = $user_info['HEADIMGURL'];
		$user['NICKNAME'] = $user_info['NICKNAME'];
		$this->assign('user',$user);

		$zt = band_doc_status();
		if($zt == "true")
		{
		    $this->redirect('?m=Expert&c=User&a=zhuce');
		}
		
		$this->assign('openid',$openid);	
		$this->display(); // 输出模板
	}

	//绑定手机号
	public function band_phone_add()
	{
		$link_phone = I('post.link_mobile');//获取post变量
		$sms_code=I('post.sms_code');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//提交手机号信息
		$url = C("PATH_URL")."/interface/yc_doc/phone_band.aspx?Access_token=".$token;		
		$data = array
		(
			"openid"=>"$openid",
			"link_phone"=>"$link_phone",
			"sms_number"=>"$sms_code" 
		);
		$json=json_encode($data);
		$doc_info = json_decode(post_json($url,$json),true);

		if ($doc_info['info_flag'] != "")
		{
			echo  $doc_info['info_flag'];
		}
		else
		{
			if($doc_info['error_code'])
			{
				echo $doc_info['error_code'];
			}else
			{
				echo "服务器错误";
			}
		}
	}

	public function band_name()
	{
		$data['truename'] = I('get.truename','');
		$data['pro'] = I('get.pro','');
		$data['city'] = I('get.city','');
		$data['hos_id'] = I('get.hos_id','');
		$data['hosname'] = I('get.hosname','');
		$data['zhic'] = I('get.zhic','');
		$data['keshi'] = I('get.keshi','');
		$data['keshiname'] = I('get.keshiname','');
		$this->assign('data',$data);
		$this->display();
	}

	//获取医院列表
	public function province_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url_data['truename']=I('get.truename','');
		$url_data['zhic']=I('get.zhic');

		// 获取省份
		$url = C("PATH_URL")."/interface/yc_doc/province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		$this->assign('data',$data);
		$this->assign('url_data',$url_data);
		$this->display();
	}

	// ajax获取市
	public function city_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$province_id=I('post.province_id',"2");
		$url = C("PATH_URL")."/interface/yc_doc/city_list.aspx?access_token=".$token;
		$posdata = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id"
		);
		$json=json_encode($posdata);
		$row = json_decode(post_json($url,$json),true);
		$str="<option value='kong'>请选择</option>";
		foreach ($row as $key => $value)
		{
			$str.='<option value='.$value['CITY_ID'].'>'.$value['CITY_NAME'].'</option>';
		}
		echo $str;
	}
	// ajax获取医院
	public function hos_list()
	{
		$city_id = I('post.city_id','2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/hospital_list.aspx?access_token=".$token;
		$posdata = array
		(
			"openid"=>"$openid",
			"city_id"=>"$city_id"
		);
		$json= json_encode($posdata);
		$row = json_decode(post_json($url,$json),true);
		$str="<option value='kong'>请选择</option>";

		foreach ($row as $key => $value)
		{
			$str.='<option value='.$value[HOS_ID].'>'.$value[HOS_NAME].'</option>';
		}

		$str.="<option value='0'>没有?新增一个吧</option>";
		echo $str;
	}
	// 补全科室信息
	public function dep_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$data['truename'] = I('get.truename','');
		$data['pro'] = I('get.pro','');
		$data['city'] = I('get.city','');
		$data['hos_id'] = I('get.hos_id','');
		$data['hosname'] = I('get.hosname','');
		$data['zhic'] = I('get.zhic','');
		$data['keshi'] = I('get.keshi','');
		$data['keshiname'] = I('get.keshiname','');

		$hos_id=I('get.hos_id','');

		$url = C("PATH_URL")."/interface/yc_doc/dep_list.aspx?access_token=".$token;
		$posdata = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($posdata);
		$row = json_decode(post_json($url,$json),true);

		$this->assign('row',$row);
		$this->assign('data',$data);
		$this->display();
	}

	// 补全职称信息
	public function expert_rank()
	{
		$data['truename'] = I('get.truename','');
		$data['pro'] = I('get.pro','');
		$data['city'] = I('get.city','');
		$data['hos_id'] = I('get.hos_id','');
		$data['hosname'] = I('get.hosname','');
		$data['zhic'] = I('get.zhic','');
		$data['keshi'] = I('get.keshi','');
		$data['keshiname'] = I('get.keshiname','');
		$this->assign('data',$data);
		$this->display();
	}

	// 提交补全信息
	public function complete_info_update()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$provice = I('post.pro').','.I('post.city');
		$dep_id = I('post.keshi','0');
		$keshiname = I('post.keshiname');
		$hos_id = I('post.hos_id');
		$zhic = I('post.zhic');
		$truename = I('post.truename');

		$expert_name=urlencode($truename);
		$expert_rank=urlencode($zhic);

		$url = C("PATH_URL")."/interface/yc_doc/expert_info_add.aspx?access_token=".$token;
		$posdata = array
		(
			"openid"=>"$openid",
			"expert_name"=>"$expert_name",
			"hos_id"=>"$hos_id",
			"dep_id"=>"0",
			"expert_rank"=>"$expert_rank"
		);
		$json = urldecode(json_encode($posdata));
		$redata = json_decode(post_json($url,$json),true);

		if($redata['error_code']=="ok")
		{
			echo 'ok';
		}
		else
		{
			echo '123';
		}
	}

	//补全用户信息、用户名、省份证号
	public function band_name_add()
	{
		$username = I('get.username', '');//获取get变量
		$idcard = I('get.idcard', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取患者姓名、身份证信息
		$url = C("PATH_URL")."/interface/yc_doc/name_edit.aspx?Access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_name"=>"$username",
			"member_card"=>"$idcard"
		);

		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		if($user_info['error_code']!="ok")
		{
			echo 'fail';
			die;
		}
		else
		{
			echo 'ok';
		}
	}

	//判断会员手机是否绑定成功
	public function band_success()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->display(); // 输出模板
	}


	//会员个人空间
	public function doc_index()
	{
		//获取平台token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者端个人空间信息
		$url = C("PATH_URL")."/interface/yc_doc/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		$nickname = $data['NICKNAME'];
		$headimgurl = $data['HEADIMGURL'];
		$this->assign('nickname',$nickname);
		$this->assign('headimgurl',$headimgurl);
		$this->display(); // 输出模板
	}

	//个人账户详细页面
	public function user_info()
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
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$user['EXPERT_ID'] = $user_info['EXPERT_ID'];
		$user['EXPERT_NAME'] = $user_info['EXPERT_NAME'];
		$user['HOS_ID'] = $user_info['HOS_ID'];
		$user['HOS_NAME'] = isset($user_info['HOS_NAME'])?$user_info['HOS_NAME']:'0';
		$user['SMALL_PIC'] = $user_info['SMALL_PIC'];
		$user['DOC_SIGNATURE'] = $user_info['DOC_SIGNATURE'];
		$user['DEP_NAME'] = isset($user_info['DEP_NAME'])?$user_info['DEP_NAME']:'0';
		$user['EXPERT_SEX'] = $user_info['EXPERT_SEX'];
		$user['EXPERT_SKILL'] = $user_info['EXPERT_SKILL'];
		$user['EXPERT_DESC'] = $user_info['EXPERT_DESC'];
		$user['EXPERT_RANK'] = isset($user_info['EXPERT_RANK'])?$user_info['EXPERT_RANK']:'0';
		$this->assign('user',$user);
		$this->assign('sign_pic_encode',urlencode(passport_encrypt($user['DOC_SIGNATURE'], "123")));
		$this->assign('member_pic_encode',urlencode(passport_encrypt($user['SMALL_PIC'], "123")));
		$this->display(); // 输出模板
	}
	//职称
	public function expert_zhic()
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
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$zhic = $user_info['EXPERT_RANK'];

		$this->assign('zhic',$zhic);
		$this->display();
	}
	//科室
	public function dep_name()
	{
		
		$hos_id = I('get.hos_id','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url1 = C("PATH_URL")."/interface/yc_doc/dep_list.aspx?access_token=".$token;
		$posdata = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($posdata);
		$row = json_decode(post_json($url1,$json),true);
		$this->assign('row',$row);

		//获取医生详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$dep_name = $user_info['DEP_NAME'];
		$dep_id = $user_info['DEP_ID'];
		$this->assign('dep_id',$dep_id);
		$this->assign('dep_name',$dep_name);
		$this->display();

	}
	//医院
	public function expert_hos()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		//获取医生详细信息
		// 获取省份
		$url1 = C("PATH_URL")."/interface/yc_doc/province_list.aspx?access_token=".$token;
		$url = C("PATH_URL")."/interface/yc_doc/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		 $json1=json_encode($data);
		$data1 = json_decode(post_json($url1,$json1),true);
		$this->assign('data',$data1);

		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$hos_name=$user_info['HOS_NAME'];
		$this->assign('hos_name',$hos_name);
		$this->display();
	}
	//性别
	public function  expert_sex()
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
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$sex = $user_info['EXPERT_SEX'];
		$this->assign('sex',$sex);
		$this->display();
	}

	// 擅长
	public function expert_skill()
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
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$skill=$user_info['EXPERT_SKILL'];
		$this->assign('skill',$skill);
		$this->display();
	}

	// 简介
	public function expert_desc()
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
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$skill=$user_info['EXPERT_DESC'];
		$this->assign('skill',$skill);
		$this->display();
	}

	//修改信息
	public function expert_update_info()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$column_value = I('post.column_value', '');
		$column_name = I('post.column_name', '');

		//获取医生详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_update_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"column_name"=>"$column_name",
			"column_value"=>"$column_value"
		);
		$json=json_encode($data); 
		$update_info = json_decode(post_json($url,$json),true);
		$this->redirect('?m=Expert&c=User&a=user_info');
	}

	//修改信息
	public function expert_update_zhic()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$column_value = I('post.column_value', '');
		$column_name = I('post.column_name', '');
		$zhic = I('post.zhic', '');
		if($column_value!="其他"){
			$column_value = $column_value;
		}else{
			$column_value = $zhic;
		}

		//获取医生详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_update_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"column_name"=>"$column_name",
			"column_value"=>"$column_value"
		);
		$json=json_encode($data);
		$update_info = json_decode(post_json($url,$json),true);
		$this->redirect('?m=Expert&c=User&a=user_info');
	}

	//修改会员密码
	public function pwd_edit()
	{
		$this->display();
	}

	//修改会员头像
	public function edit_face()
	{
		$user_pic = I('get.user_pic', '');
		$this->assign('user_pic',passport_decrypt($user_pic, "123"));
		$this->display();
	}

	
	//修改会员头像
	public function edit_face_ok()
	{
		//新方法
		$imgbase64 = $_POST['imgbase64'];//获取base64图片字符串
		if(empty($imgbase64))
		{
			//上传错误提示错误信息
			$this->redirect('?m=Expert&c=User&a=user_info');
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

			if (preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
			{
				$type = $result[2]; //图片类型
				$type = str_replace("jpeg","jpg", $type);
				
				$new_file = "./Public/Uploads/expert_face/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
				
				if (is_dir(dirname($new_file)) == false)
				{
					mkdir(dirname($new_file), 0777, true);
				}

				$base64 = base64_decode(str_replace($result[1],"",$imgbase64));//去除头部无用信息

				if (file_put_contents($new_file, $base64))
				{
					$x1 = I('post.x1', '');
					if ($x1 != "")
					{
						$y1 = I('post.y1', '');
						$rec_width = I('post.rec_width', '');
						$rec_height = I('post.rec_height', '');
						$prepic_width = I('post.prepic_width', '');

						//处理图片
						$image = new \Think\Image(); 
						$image->open($new_file);

						$real_width = $image->width();

						$scale_ratio = $real_width / $prepic_width;

						//按照坐标裁剪图并保存
						$image->crop($rec_width * $scale_ratio, $rec_height * $scale_ratio, $x1 * $scale_ratio, $y1 * $scale_ratio, $rec_width * $scale_ratio, $rec_height * $scale_ratio)->save($new_file);
					}

					//平台access_token
					$token = A_token();

					//获取openid
					include MODULE_PATH.'/Common/open_id.php';

					//验证手机是否绑定
					include MODULE_PATH.'/Common/check_band.php';

					$user_pic = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);

					$url = C("PATH_URL")."/interface/yc_doc/expert_update_info.aspx?access_token=".$token;
					$data = array
					(
						"openid"=>"$openid",
						"column_name"=>"small_pic",
						"column_value"=>"$user_pic"
					);
					$json=json_encode($data);
					$case_add = json_decode(post_json($url,$json),true);

					if($case_add['error_code'] == "ok")
					{
						$this->redirect('?m=Expert&c=User&a=user_info');
					}
					else
					{
						$this->redirect('?m=Expert&c=User&a=user_info');
					}
				}
				else
				{
					$this->redirect('?m=Expert&c=User&a=user_info');
				}
			}
			else
			{
				//上传错误提示错误信息
				$this->redirect('?m=Expert&c=User&a=user_info');
				//echo "存文件失败";
			}
		}
		else
		{
			//上传错误提示错误信息
			$this->redirect('?m=Expert&c=User&a=user_info');
			//echo "匹配失败";
		}
	}

	//修改医生签名
	public function edit_sign()
	{
		$user_pic = I('get.user_pic', '');
		$this->assign('user_pic',passport_decrypt($user_pic, "123"));
		$this->display();
	}


	//修改医生签名
	public function edit_sign_ok()
	{
		//新方法
		$imgbase64 = $_POST['imgbase64'];//获取base64图片字符串
		if(empty($imgbase64))
		{
			//上传成功
			$this->redirect('?m=Expert&c=User&a=setting');
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

			if (preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
			{
				$type = $result[2]; //图片类型
				$type = str_replace("jpeg","jpg", $type);
				
				$new_file = "./Public/Uploads/expert_face/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
				
				if (is_dir(dirname($new_file)) == false)
				{
					mkdir(dirname($new_file), 0777, true);
				}

				$base64 = base64_decode(str_replace($result[1],"",$imgbase64));//去除头部无用信息

				if (file_put_contents($new_file, $base64))
				{
					$x1 = I('post.x1', '');
					if ($x1 != "")
					{
						$y1 = I('post.y1', '');
						$rec_width = I('post.rec_width', '');
						$rec_height = I('post.rec_height', '');
						$prepic_width = I('post.prepic_width', '');

						//处理图片
						$image = new \Think\Image(); 
						$image->open($new_file);

						$real_width = $image->width();

						$scale_ratio = $real_width / $prepic_width;

						//按照坐标裁剪图并保存
						$image->crop($rec_width * $scale_ratio, $rec_height * $scale_ratio, $x1 * $scale_ratio, $y1 * $scale_ratio, $rec_width * $scale_ratio, $rec_height * $scale_ratio)->save($new_file);
					}

					//平台access_token
					$token = A_token();

					//获取openid
					include MODULE_PATH.'/Common/open_id.php';

					//验证手机是否绑定
					include MODULE_PATH.'/Common/check_band.php';

					$user_pic = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);

					$url = C("PATH_URL")."/interface/yc_doc/signature_edit.aspx?access_token=".$token;
					$data = array
					(
						"openid"=>"$openid",
						"doc_signature"=>"$user_pic",
					);
					$json=json_encode($data);
					$case_add = json_decode(post_json($url,$json),true);
					if($case_add['error_code'] == "ok")
					{
						$this->redirect('?m=Expert&c=User&a=setting');
					}
					else
					{
						$this->redirect('?m=Expert&c=User&a=setting');
					}
				}
				else
				{
					$this->redirect('?m=Expert&c=User&a=setting');
				}
			}
			else
			{
				//上传错误提示错误信息
				$this->redirect('?m=Expert&c=User&a=user_info');
				//echo "存文件失败";
			}
		}
		else
		{
			//上传错误提示错误信息
			$this->redirect('?m=Expert&c=User&a=user_info');
			//echo "匹配失败";
		}
	}


	

	//关于我们
	public function about_us()
	{
		$this->display();
	}
	//绑定手机号发送验证码
	public function send_msm()
	{
		$link_mobile = I('post.link_mobile');
		$type = I('post.type', '1');

		if(!strstr($_SERVER['HTTP_REFERER'],"band_phone")){
			echo "00006";exit;
		}

		if (strlen($link_mobile) == "11") {
			if(preg_match("/^(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[0-9])[0-9]{8}$/", $link_mobile)){
				$error_code = post_code1($link_mobile,$type);
				echo $error_code;
			}else{
				echo "00020";
			}			
		}else{
			echo "00020";
		}
		exit;
	}
	//生成验证码
	public function verify() 
	{
		$Verify =     new \Think\Verify();
		// 设置验证码字符为纯数字
		$Verify->codeSet = '0123456789'; 
		$Verify->useNoise = false;
		$Verify->fontSize = 18;
		$Verify->length   = 4;
		$Verify->entry();
	}

//我的工作室首页
	public function mywork_house()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jifen_date = date("Y-m");

		//验证手机是否绑定
		$bandCode = band_phone_code();

		//验证申请状态
		$phoneCode = phone_status();

		//获取医生详细信息//
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json = json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		if(empty($user_info))
		{
			$user_info['SMALL_PIC']="/weixin/Public/Expert/images/yonghu/girl.png";
		}

		//获取医生积分总分
		$url = C("PATH_URL")."/interface/yc_doc/expert_pm.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"jifen_date"=>""
		);

		$json=json_encode($data);
		$jifen = json_decode(post_json($url,$json),true);
		if(empty($jifen['JIFEN_NUM']))
		{
			$jifen['JIFEN_NUM'] = 0; 
		}
		$this->assign('jifen',$jifen);
		$this->assign('openid',$openid);
		$this->assign('data',$user_info);
		$this->assign('openid',$openid);
		$this->assign('bandCode',$bandCode); ////验证手机是否绑定
		$this->assign('code',$phoneCode); //验证申请状态

		//课程时长总数 
		$url = C("PATH_URL")."/interface/yc_doc/doc_sc_total.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);

		$json=json_encode($data);
		$doc_sc_total = json_decode(post_json($url,$json),true);
		//print_r($doc_sc_total);die;
		$sc_total = $doc_sc_total[0]['SC_TOTAL'];
		//print_r($sc_total);die;
		$total = round($sc_total/60,1);//转化为时间
		//echo $total;die;
		$this->assign('total',$total); //课程时长总数

		//经验总数 
		$url = C("PATH_URL")."/interface/yc_doc/doc_jy_total.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);

		$json=json_encode($data);
		$doc_jy_total = json_decode(post_json($url,$json),true);
	//print_r($doc_jy_total);die;
		$jy_total = $doc_jy_total[0]['JY_TOTAL'];
		if(empty($jy_total))
		{
			$jy_total=0;
		}
		$this->assign('jy_total',$jy_total); //课程时长总数

		//处方是否开通
		$url = C("PATH_URL")."/interface/yc_doc/cf_kt_zt.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);

		$json=json_encode($data);
		$cf_kt_zt = json_decode(post_json($url,$json),true);
		$this->assign('cf_kt_zt',$cf_kt_zt);
		
		$url = C("PATH_URL")."/interface/yc_doc/referral_dlist_aut.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$referral_aut = json_decode(post_json($url,$json),true);
		if($referral_aut)
		{
			$this->assign('referral_aut',$referral_aut);
		}

		// print_r($cf_kt_zt);
		$this->display(); // 输出模板
	}

//用户为待审状态
	public function zhuce_info()
	{
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
	
		//获取医生详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid", 
			"expert_id"=>""
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		//print_r($user_info);die;
		$user['EXPERT_ID'] = $user_info['EXPERT_ID'];
		$user['EXPERT_NAME'] = $user_info['EXPERT_NAME'];
		$user['HOS_ID'] = $user_info['HOS_ID'];
		$user['HOS_NAME'] = $user_info['HOS_NAME'];
		$user['SMALL_PIC'] = $user_info['SMALL_PIC'];
		$user['DEP_NAME'] = $user_info['DEP_NAME'];
		$user['EXPERT_SEX'] = $user_info['EXPERT_SEX'];
		$user['EXPERT_RANK'] = $user_info['EXPERT_RANK'];
		$user['EXPERT_SKILL'] = $user_info['EXPERT_SKILL'];
		$user['EXPERT_DESC'] = $user_info['EXPERT_DESC'];
		$user['EXPERT_RANK'] = $user_info['EXPERT_RANK'];
		$this->assign('user',$user);
		$this->assign('member_pic_encode',urlencode(passport_encrypt($user['SMALL_PIC'], "123")));
		$this->display(); // 输出模板
	}

	//个人设置
	public function setting()
	{
		$flag = I('get.flag','1');
		//echo $flag;die;
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);

		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$user['EXPERT_NAME'] = $user_info['EXPERT_NAME'];//审核通过姓名
		//$user['DS_NAME'] = $user_info['DS_NAME'];//待审姓名
		$user['DEP_NAME'] = $user_info['DEP_NAME'];//科室
		$user['HOS_NAME'] = $user_info['HOS_NAME'];//医院
		$user['SMALL_PIC'] = $user_info['SMALL_PIC'];//头像
		$user['DOC_SIGNATURE'] = $user_info['DOC_SIGNATURE'];
		$user['EXPERT_SKILL'] = $user_info['EXPERT_SKILL']; //擅长
		$user['EXPERT_SEX'] = $user_info['EXPERT_SEX'];//性别
		$user['EXPERT_ROLE'] = $user_info['EXPERT_ROLE']; //职称
		$user['EX_CID'] = $user_info['EXPERT_CERTIFICATEID']; //营业资格证
		$user['LINK_MOBILE'] = $user_info['LINK_MOBILE'];//手机号
		$user['TJ_MOBILE'] = $user_info['TJ_MOBILE'];//推荐人电话
		$user['EXPERT_SEX'] = $user_info['EXPERT_SEX'];//待审性别

		$user['BIRTH_DATE'] = date("Y-m-d",strtotime($user_info['BIRTH_DATE']));//出生日期

		//获取医生积分总分
		$url = C("PATH_URL")."/interface/yc_doc/expert_jf.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);

		$json=json_encode($data);
		$jifen = json_decode(post_json($url,$json),true);
		if(empty($jifen['JF_NUM']))
		{
			$jifen['JF_NUM'] = 0;
		}
		$this->assign('jifen',$jifen);
		$this->assign('flag',$flag);
		$this->assign('user',$user);
		$this->assign('sign_pic_encode',urlencode(passport_encrypt($user['DOC_SIGNATURE'], "123")));
		$this->assign('member_pic_encode',urlencode(passport_encrypt($user['SMALL_PIC'], "123")));
		$this->display(); // 输出模板
	}

	//帮助中心
	public function help()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}

//关于我们
	public function aboutus()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
//我的积分
	public function point()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医生积分总分
		$url = C("PATH_URL")."/interface/yc_doc/expert_jf.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);

		$json=json_encode($data);
		$jifen = json_decode(post_json($url,$json),true);
		if(empty($jifen))
		{
			$jifen['JF_NUM'] = 0;
		}
		$this->assign('jifen',$jifen);
		$this->assign('openid',$openid);
		$this->display();
	}
//积分流水
	public function pointWater()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
//如何赚积分
	public function howPoint()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
//关注联盟
	public function aboultyc()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
//历史记录
	public function history()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
//核心价值
	public function value()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
//我的意见
	public function myAdvise()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}
//意见提交成功
	public function mySuccess()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}


	//申请处方开通页面
	public function eprescribing()
	{
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/cf_check_zt.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);

		$json=json_encode($data);
		$cf_status= json_decode(post_json($url,$json),true);
		
		if($cf_status[0]['CF_CHECK_FLAG']=="0")
		{
			$this->redirect('?m=Expert&c=User&a=cfds');
		}
		else
		{
			$this->assign('cf_status',$cf_status);
		}
		$this->display();
	}

	//申请处方开通，进入待审核 处方待审
	public function cfds()
	{
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/cf_check.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);

		$json=json_encode($data);
		$cf_status= json_decode(post_json($url,$json),true);
		if($cf_status['error_code']=="ok")
		{

			$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"expert_id"=>""
			);

			$json=json_encode($data);
			$user_info = json_decode(post_json($url,$json),true);
			$this->assign('user_info',$user_info);
		}
		
		$this->display();
	}
	//判断能否进入处方页面1
	public function sfcf()
	{
		//获取平台的access_token
		$token = A_token();

		$consult_id = I("get.consult_id");
		$member_id =  I("get.member_id");

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/cf_check_zt.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);

		$json=json_encode($data);
		$is_cf = json_decode(post_json($url,$json),true);
		//print_r($is_cf);die;
		if(!$is_cf[0]['CF_CHECK_FLAG'] || (!$is_cf[0]['CF_CHECK_FLAG']&& $consult_id) )
		{
			$is_cf[0]['CF_CHECK_FLAG']=4;
		}

		if($is_cf[0]['CF_CHECK_FLAG']  == 1 && $consult_id ){

			$is_cf[0]['CF_CHECK_FLAG']= 5;
		}

		switch ($is_cf[0]['CF_CHECK_FLAG'])
		{
			case 0:
				$this->redirect('?m=Expert&c=User&a=cfds');
			  	$template_html="cfds";//待审页面
			  	break;
			case 1:			  	
		  		$this->redirect('?m=Expert&c=Cf&a=cf_addm');
		  		$template_html="cf_addm";
			  	break;
			case 2:
	          	$template_html="jujue";//拒绝页面
	          	$data = "审核拒绝, ";
	          	$img = "yjimg";
	          	break;
	        case 5:
				$this->redirect('?m=Expert&c=Cf&a=cf_add&member_id='.$member_id.'&consult_id='.$consult_id);
			  	$template_html="cf_add";//待审页面
			  	break;
			default:
			  $this->redirect('?m=Expert&c=User&a=eprescribing');
		}
		$this->display($template_html);
	}

		//注册协议
	public function agreement()
	{	
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display();
	}


	//二维码 首页
	public function expand()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->assign('openid',$openid);
		$this->display();
	}

	//推荐结果
	public function tj_results()
	{
		$search_month = date('Y年m月');
		//print_r($search_month);die;
		//获取平台的access_token
		$token = A_token();
		// var_dump($token);
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$jiekou = C("PATH_URL");
		
		//二维码推荐结果
		$url = $jiekou."/interface/yc_doc/ewm_tj_stat.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"search_month"=>"$search_month"
		);

		$json=json_encode($data);
		$ewm_tj_stat = json_decode(post_json($url,$json),true);
		//print_r($ewm_tj_stat);die;
		$tj_apply= $ewm_tj_stat['tj_apply']; //本月成功推荐人数
		$this->assign('tj_apply',$tj_apply);
		$this->display();
	}
	//推荐别人后打开的
	public function results()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$this->assign('openid',$openid);

		$this->display();
	}
	//历史推荐
	public function collect()
	{
		$search_month = date('Y年m月');
		//获取平台的access_token
		$token = A_token();
		// var_dump($token);
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$jiekou = C("PATH_URL");
		
		//二维码推荐结果
		$url = $jiekou."/interface/yc_doc/ewm_tj_stat.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"search_month"=>"$search_month"
		);

		$json=json_encode($data);
		$ewm_tj_stat = json_decode(post_json($url,$json),true);
		$this->assign('ewm_tj_stat',$ewm_tj_stat);
		$this->display();
	}

	public function collect_search()
	{
		$search_month = I("get.search_month",'');
		//获取平台的access_token
		$token = A_token();
		// var_dump($token);
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$jiekou = C("PATH_URL");
		
		//二维码推荐结果
		$url = $jiekou."/interface/yc_doc/ewm_tj_stat.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"search_month"=>"$search_month"
		);

		$json=json_encode($data);
		$ewm_tj_stat = json_decode(post_json($url,$json),true);
		$this->ajaxReturn($ewm_tj_stat);
	}

	//医生详情二维码
	public function doc_yard()
	{	
		//获取平台的access_token
		$token = A_token();
		// var_dump($token);
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$appId=C('D_APPID');
		$secret=C('D_SECRET');

		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    	$url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    	//获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

		
		$NonceStr = createNonceStr();
		$timestamp = time();
		$string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
    	$signature = sha1($string);



    	$this->assign("signature",$signature);
		$this->assign("NonceStr",$NonceStr);
		$this->assign("timestamp",$timestamp);
		$this->assign("appId",$appId);


		$jiekou = C("PATH_URL");

		$openid = I("get.oid",$openid);
		
		$url = $jiekou."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);

		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$url = $jiekou."/interface/yc_doc/expert_ewm.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"token_id"=>C('M_TOKEN_ID'),
		);

		$json=json_encode($data);
		// var_dump($json);
		$user_ewm = json_decode(post_json($url,$json),true);
		// var_dump($user_ewm);die;
		$user['EXPERT_NAME'] = $user_info['EXPERT_NAME'];//审核通过姓名
		$user['HOS_NAME'] = $user_info['HOS_NAME'];//医院
		$user['SMALL_PIC'] = $user_info['SMALL_PIC'];//头像
		$user['EXPERT_RANK'] = $user_info['EXPERT_RANK']; //职称
		$user['DEP_NAME'] = $user_info['DEP_NAME']; //科室
		$user['EXPERT_SEX'] = $user_info['EXPERT_SEX'];//性别
		$this->assign('user',$user);
		$this->assign('user_ewm',$user_ewm);
		$this->assign('openid',$openid);

		$this->display();
	}

	//我的档案
	public function dangan()
	{
		$member_id = I("get.member_id");
		$isperson = I("get.isperson",'0');
		$member_mobile = I("get.member_mobile",'');
		$expert_id = I("get.expert_id",''); 
		$hos_id = I("get.hos_id",'');  

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//去掉红点
		$urlred = C("NEW_PATH_URL")."/ServieYunAPI/ServiceDoctor/WebService.asmx/MemberExaminationRead";
		$data = "MemberId=".$member_id."&Docid=".$expert_id."&ReadDate=2016-1-1";
		$result =json_decode(post_json($urlred,$data),true);
		$this->assign('person_id',$member_id);

		//患者信息
		$url = C("PATH_URL")."/interface/yc_doc/member_info.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
		$json=json_encode($data);
		$member_info =json_decode(post_json($url,$json),true);

		if(!empty($member_info)){
			$member_id = $member_info['MEMBER_ID'];
			$member_mobile = $member_info['MEMBER_MOBILE'];
		}

		//列表 首页
		$url = C("PATH_URL")."/interface/yc_doc/member_ytj_all.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
		$json=json_encode($data);
		$member_ytj =json_decode(post_json($url,$json),true);
		$this->assign('member_ytj',$member_ytj);
		$this->assign('member_info',$member_info);
		$this->assign('member_id',$member_id);
		$this->assign('member_mobile',$member_mobile);
		$this->assign('isperson',$isperson);
		$this->assign('hos_id',$hos_id);
		$this->display();
	}


	//一体机 曲线图
	public function dangan_yitiji()
	{
		$member_mobile = I('get.member_mobile','');
		$member_id = I('get.member_id','');
		$tj_type = I('get.tj_type','');

		$token = A_token();
		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else{
			$openid=0;
		}
		

		//获取健康报告详情信息
		$url = C("PATH_URL")."/interface/yc_doc/member_ytj_all_list.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_doc/member_ytj_all_list.aspx?access_token=".$token;
		$data = array
	    (
	    	"openid"=>"$openid",
			"member_id"=>"$member_id",
			"tj_type"=>"$tj_type",
			"member_mobile"=>"$member_mobile"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		// var_dump($url,$json);
		$info = array();
		if(!empty($jk_info)){
			foreach ($jk_info as $k1 => $v1) {
				foreach ($v1 as $key => $value) {
					if($key=="EXAMTIME" || $key=="CREATE_DATE" ){
							continue;
					}
					if($tj_type==5){
						$info["$key"] .= $value.",";
					}else{
						$info["$key"] .= round($value,1).",";
					}
					
				}
			}
			foreach ($info as $k2 => $v2) {
				$info["$k2"] = rtrim($v2,',');
			}
		}
		// var_dump($info);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('info',$info);
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$member_id);
		$this->assign('member_mobile',$member_mobile);
		$this->display(); // 输出模板
	}

	//腕表档案
	public function dangan_expert()
	{
		$member_id = I('get.member_id','');

		$token = A_token();
		if(!$member_id){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else{
			$openid=0;
		}
		

		//获取健康报告详情信息
		$url = C("PATH_URL")."/interface/yc_member/member_wb_all_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_id"=>"$member_id"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$jk_info);
		$info = array();
		foreach ($jk_info[0] as $k1 => $v1) {
			if($k1=="MEMBER_ID" || $k1=="MEMBER_NAME" || $k1=="MEMBER_MOBILE"){
				continue;
			}
			if(!empty($v1)){
				foreach ($v1 as $key => $value) {

					foreach ($value as $k => $v) {
						if($k=="EXAMTIME" || $k=="CREATE_DATE"){
							continue;
						}
						$info["$k1"]["$k"] .= $v.",";
					}
				}
				foreach ($info["$k1"] as $k2 => $v2) {
					$info["$k1"]["$k2"] = rtrim($v2,',');
				}
			}
		}
		// var_dump($info);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('info',$info);
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$jk_info[0]['MEMBER_ID']);
		$this->display(); // 输出模板
	}

	//健康档案详情 ytj wb
	public function dangan_detail()
	{
		$tj_type = I('get.tj_type','');
		$member_mobile = I('get.member_mobile','');
		$token = A_token();
		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';
			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else{
			$openid=0;
		}

		if($tj_type===''){
			redirect(U('dangan',array('member_id'=>$member_id)));
		}

		//获取健康报告详情信息
		//判断是腕表还是一体机

		$url = C("PATH_URL")."/interface/yc_doc/member_ytj_list.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_doc/member_ytj_list.aspx?access_token=".$token;

		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile",
			"page_num"=>"1",
			"tj_type"=>"$tj_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$jk_info);

		//模板赋值
		$temp = "";
		switch ($tj_type)
		{
			case 0:
				$temp = "dangan_yitiji_xt";
				break;
			case 1:
				$temp = "dangan_yitiji_xyang";
				break;
			case 2:
				$temp = "dangan_yitiji_xya";
				break;
			case 3:
				$temp = "dangan_yitiji_xl";
				break;
			case 4:
				$temp = "dangan_yitiji_sg";
				break;
			case 5:
				$temp = "dangan_yitiji_niao";
				break;
			case 6:
				$temp = "dangan_yitiji_tw";
				break;	
			case 7:
				$temp = "dangan_yitiji_xt";
				break;
			case 8:
				$temp = "dangan_yitiji_xya";
				break;
			default:
				$temp = "dangan_yitiji_xt";
				break;								
		}
		
		// var_dump($url,$json,$jk_info);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$member_id);
		$this->assign('member_mobile',$member_mobile);
		$this->display($temp); // 输出模板	
		
	}

	//一体机详情
	public function dangan_detail_append()
	{
		$tj_type = I('get.tj_type','');
		$page_num = I('get.page_num','');
		$member_mobile = I('get.member_mobile','');

		$token = A_token();
		if(!$member_id){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else{
			$openid=0;
		}

		$url = C("PATH_URL")."/interface/yc_doc/member_ytj_list.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_doc/member_ytj_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile",
			"page_num"=>"$page_num",
			"tj_type"=>"$tj_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);

		// var_dump($jk_info);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('tj_type',$tj_type);
		include COMMON_PATH.'/Common/load_more.php';
		
	}

	
	//健康报告
	public function jiankang()
	{
		$member_id = I("get.member_id");

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		$this->assign('member_id',$member_id);
		$this->display(); // 输出模板
	}

	//健康报告详情
	public function jk_info()
	{
		$tj_type = I('get.tj_type','');
		$member_id = I('get.member_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取健康报告详情信息
		// $url = "192.168.100.228:8080/interface/yc_doc/member_ytj_list.aspx?access_token=".$token;

		$url = C("PATH_URL")."/interface/yc_doc/member_ytj_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num"=>"1",
			"tj_type"=>"$tj_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$member_id);
		$this->display(); // 输出模板
	}


	//健康报告详情
	public function jk_info_append()
	{
		$tj_type = I('get.tj_type','');
		$page_num = I('get.page_num','');
		$member_id = I('get.member_id','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取健康报告详情信息
		//
		// $url = "192.168.100.228:8080/interface/yc_doc/member_ytj_list.aspx?access_token=".$token;

		$url = C("PATH_URL")."/interface/yc_doc/member_ytj_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num"=>"$page_num",
			"tj_type"=>"$tj_type"
		 );
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		$this->assign('tj_type',$tj_type);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//健康报告
	public function wanbiao()
	{
		$member_id = I("get.member_id",'');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		$this->assign('member_id',$member_id);
		$this->display(); // 输出模板
	}

	//健康报告详情
	public function wb_info()
	{
		$tj_type = I('get.tj_type','');
		$member_id = I('get.member_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取健康报告详情信息
		// $url = "http://192.168.100.228:8080/interface/yc_doc/expert_wb_list.aspx?access_token=".$token;
		$url = C("PATH_URL")."/interface/yc_doc/expert_wb_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num"=>"1",
			"tj_type"=>"$tj_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$member_id);
		$this->display(); // 输出模板
	}


	//健康报告详情
	public function wb_info_append()
	{
		$tj_type = I('get.tj_type','');
		$page_num = I('get.page_num','');
		$member_id = I('get.member_id','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取健康报告详情信息
		
		// $url = "http://192.168.100.228:8080/interface/yc_doc/expert_wb_list.aspx?access_token=".$token;
		
		$url = C("PATH_URL")."/interface/yc_doc/expert_wb_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num"=>"$page_num",
			"tj_type"=>"$tj_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		$this->assign('tj_type',$tj_type);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//医生端患者病例资料
	public function wd_bingli()
	{
		$member_id = I('get.member_id','');

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
		// var_dump($url,$json,$case_list);

		$this->assign('case_list',$case_list);
		$this->assign('member_id',$member_id);
		$this->display(); // 输出模板
	}


	//医生端患者病例资料列表
	public function wd_bingli_append()
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


	//我的病例
	public function my_bingli()
	{
		$member_id = I("get.member_id");

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_doc/case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		$this->assign("data",$data);
		$this->assign("member_id",$member_id);
		$this->display();
	}

	//我的病例 加载更多
	public function my_bingli_append()
	{
		$member_id = I("get.member_id");
		$page_num = I('get.page_num', '2');

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_doc/case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign("data",$data);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//我关联的药店列表
	public function yd_list()
	{
		$hos_name = I('get.hos_name', '');

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//我关联的药店
		$url = C("PATH_URL")."/interface/yc_doc/yd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_name"=>"$hos_name",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);

		$this->assign("yd_list",$yd_list);
		$this->display();
	}
	//我关联的药店列表 加载更多
	public function yd_list_append()
	{
		$page_num = I('get.page_num', '2');
		$hos_name = I('get.hos_name', '');

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
	
		//我关联的药店
		$url = C("PATH_URL")."/interface/yc_doc/yd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_name"=>"$hos_name",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$this->assign("yd_list",$yd_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//我关联的药店列表
	public function yd_detail()
	{
		$hos_id = I('get.hos_id', '');

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取医生详细信息//
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json = json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		//会员列表
		$url = C("NEW_PATH_URL")."/ServieYunAPI/ServiceDoctor/WebService.asmx/GetMemberExaminationList";
		$data = "HospitalId=".$hos_id."&Name=".$member_name."&Pageindex=1&Docid=".$user_info['EXPERT_ID'];
		$member_list = json_decode(post_json($url,$data),true);
		$member_list = $member_list['MemberList']; 
		foreach ($member_list as $key => $value) 
		{			
			$member[$key]['MEMBER_ID'] = $member_list[$key]['Personid'];
			// $member[$key]['PERSON_ID'] = $member_list[$key]['Personid'];
			$member[$key]['MEMBER_NAME'] = $member_list[$key]['MemberName']?$member_list[$key]['MemberName']:$member_list[$key]['MemberPhone'];
			$member[$key]['MEMBER_MOBILE'] = $member_list[$key]['MemberPhone'];
			if($member_list[$key]['MemberSex'] == 0)
			{
				$member[$key]['MEMBER_SEX'] = "男";
			}
			elseif($member_list[$key]['MemberSex'] == 1)
			{
				$member[$key]['MEMBER_SEX'] = "女";
			}
			else
			{
				$member[$key]['MEMBER_SEX'] = "未填写";
			}

			
			$member[$key]['MEMBER_PIC'] = $member_list[$key]['MemberIcon'];
			$member[$key]['MEMBER_AGE'] = $member_list[$key]['MemberAge'];
			$member[$key]['MEMBER_CARD'] = $member_list[$key]['MemberCard'];
			$member[$key]['Relationship'] = $member_list[$key]['Relationship'];
			$member[$key]['MemberHosid'] = $member_list[$key]['MemberHosid'];
			$member[$key]['Sign'] = $member_list[$key]['Sign'];
			$member[$key]['CheckDate'] = $member_list[$key]['CheckDate'];
		}
		foreach ($member as $key => $value) 
		{
			$member[$key]['jsondate'] = base64_encode(json_encode($value));
		}
		$this->assign("member_list",$member);
		$this->assign("hos_id",$hos_id);
		$this->display();
	}


	//我关联的药店列表 加载更多
	public function yd_detail_append()
	{
		$member_name = I('get.member_name', '');
		$page_num = I('get.page_num', '2');
		$hos_id = I('get.hos_id', '');

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
	
		//获取医生详细信息//
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json = json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		//会员列表

		$url = C("NEW_PATH_URL")."/ServieYunAPI/ServiceDoctor/WebService.asmx/GetMemberExaminationList";
		$data = "HospitalId=".$hos_id."&Name=".$member_name."&Pageindex=".$page_num."&Docid=".$user_info['EXPERT_ID'];
		$member_list = json_decode(post_json($url,$data),true);

		$member_list = $member_list['MemberList'];
		foreach ($member_list as $key => $value) 
		{
			
			$member[$key]['MEMBER_ID'] = $member_list[$key]['MemberId'];
			$member[$key]['MEMBER_NAME'] = $member_list[$key]['MemberName']?$member_list[$key]['MemberName']:$member_list[$key]['MemberPhone'];
			$member[$key]['MEMBER_MOBILE'] = $member_list[$key]['MemberPhone'];
			if($member_list[$key]['MemberSex'] == 0)
			{
				$member[$key]['MEMBER_SEX'] = "男";
			}
			elseif($member_list[$key]['MemberSex'] == 1)
			{
				$member[$key]['MEMBER_SEX'] = "女";
			}
			else
			{
				$member[$key]['MEMBER_SEX'] = "未填写";
			}

			$member[$key]['MEMBER_PIC'] = $member_list[$key]['MemberIcon'];
			$member[$key]['MEMBER_AGE'] = $member_list[$key]['MemberAge'];
			$member[$key]['MEMBER_CARD'] = $member_list[$key]['MemberCard'];
			$member[$key]['Relationship'] = $member_list[$key]['Relationship'];
			$member[$key]['MemberHosid'] = $member_list[$key]['MemberHosid'];
			$member[$key]['Sign'] = $member_list[$key]['Sign'];
			$member[$key]['CheckDate'] = $member_list[$key]['CheckDate'];
		}
		foreach ($member as $key => $value) 
		{
			$member[$key]['jsondate'] = base64_encode(json_encode($value));
		}

		$this->assign("member_list",$member);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


	//合作申请表下载
	public function download()
	{
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
	
		$this->display();
	}

	//知情告知书
	public function agreement_zhiqing()
	{	
		$xs = I('get.xs','1');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->assign("xs",$xs);
		$this->display();
	}

}