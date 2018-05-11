<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class HuzhuController extends Controller
{

	//百倍爱心卡消费明细
	public function hz_order_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_member/hz_order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);

		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$data);
		if($data['error_code']=="")
		{
			$this->assign('hz_order_list',$data);
		}

		//获取分销总金额
		$url = C("PATH_URL")."/interface/yc_member/hz_money_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);

		$json=json_encode($data);
		$money = json_decode(post_json($url,$json),true);
		// var_dump(post_json($url,$json));
		$this->assign('hz_money',$money);
		$this->display();

	}


	//百倍爱心卡消费明细加载更多
	public function hz_order_list_append()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$page_num = I("get.page_num","2");

		//获取平台的access_token
		$token = A_token();

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_member/hz_order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);

		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		if($data['error_code']=="")
		{
			$this->assign('hz_order_list',$data);
		}
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


	//卡列表 百倍爱心卡
	public function ka_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$member_id = I('get.member_id','');
			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/bx_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id",
				"yw_id"=>I('get.yw_id','2')
			);
		}
		else
		{
			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';

			//获取首页6项
			$url = C("PATH_URL")."/interface/yc_member/bx_info.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
			"sx_id"=>C('SX_ID')
			);
	  	}
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}
		$this->assign('user_info',$user_info);
		$this->assign('bx_list',$bx_list);
		$this->display();
	}

	//卡列表  百倍爱脑卡
	public function ka_list2()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$member_id = I('get.member_id','');
			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/bx_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id",
				"yw_id"=>I('get.yw_id','2')
			);
		}
		else
		{
			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';

			//获取首页6项
			$url = C("PATH_URL")."/interface/yc_member/bx_info_yw.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"sx_id"=>C('SX_ID1'),
				"yw_id"=>C('YW_ID1')
			);
	  	}
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}
		$this->assign('user_info',$user_info);
		$this->assign('bx_list',$bx_list);
		$this->display();
	}
	//互助首页
	public function index()
	{
		$footer = I('get.footer','show'); //只分享不购买
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//没有获取openid 走app
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$member_id = I('get.member_id','');
			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/bx_info.aspx?access_token=".$token;
			$data = array			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//获取首页6项
			$url = C("PATH_URL")."/interface/yc_member/bx_info.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
			"sx_id"=>C('SX_ID')
			);
	  	}
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		$this->assign("footer",$footer);

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		
		$this->display(); // 输出模板	
	}

	//互助----加入活动 百倍爱心卡
	public function jiaruxingdong()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取互助金额信息
		$url = C("PATH_URL")."/interface/yc_member/bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"sx_id"=>C('SX_ID')
		);
		$json=json_encode($data);
		$bx_info =json_decode(post_json($url,$json),true); 
		// var_dump($url,$json,$bx_info);

		//获取就诊人列表 bx_status==1 已生效 观察期
		$url =C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"bx_status"=>1,
			"sx_id"=>C('SX_ID')
		);		
		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$bx_list1);


		//获取就诊人列表 bx_status==0 未参与
		$url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"bx_status"=>0,
			"sx_id"=>C('SX_ID')
		);		
		$json=json_encode($data);
		$bx_list0 = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$bx_list0);

		//购买参数转码加密
		$data = array
		(
			"price"=>200
		);
		$json= json_encode($data);
		$payjson= urlencode(passport_encrypt($json, "123"));
		//模板赋值
		$this->assign("payjson",$payjson);

		$this->assign('bx_info',$bx_info);
		$this->assign('bx_list1',$bx_list1);// 1 已生效 观察期
		$this->assign('bx_list0',$bx_list0);//0 未参与
		$this->display(); // 输出模板	
	}

	//互助----加入活动 百倍爱脑卡
	public function jiaruxingdong2()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取互助金额信息
		$url = C("PATH_URL")."/interface/yc_member/bx_info_yw.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"sx_id"=>C('SX_ID1'),
			"yw_id"=>C('YW_ID1')

		);
		$json=json_encode($data);
		$bx_info =json_decode(post_json($url,$json),true); 
		//var_dump($url,$json,$bx_info);

		//获取就诊人列表 bx_status==1 已生效 观察期
		$url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"bx_status"=>1,
			"sx_id"=>C('SX_ID1')
		);		
		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$bx_list1);


		//获取就诊人列表 bx_status==0 未参与
		$url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"bx_status"=>0,
			"sx_id"=>C('SX_ID1')
		);		
		$json=json_encode($data);
		$bx_list0 = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$bx_list0);

		//购买参数转码加密
		$data = array
		(
			"price"=>200
		);
		$json= json_encode($data);
		$payjson= urlencode(passport_encrypt($json, "123"));
		//模板赋值
		$this->assign("payjson",$payjson);

		$this->assign('bx_info',$bx_info);
		$this->assign('bx_list1',$bx_list1);// 1 已生效 观察期
		$this->assign('bx_list0',$bx_list0);//0 未参与
		$this->display(); // 输出模板	
	}

	//互助----健康告知
	public function jiankanggaozhi()
	{

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$this->display(); // 输出模板	
	}

	//互助----我的保障
	public function wodebaozhang()
	{

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$this->display(); // 输出模板	
	}

	//互助----会员信息
	public function huiyuanxinxi()
	{

		$person_id = I("get.person_id","");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"sx_id"=>C("SX_ID")
		);
		$json=json_encode($data);
		$bx_info =json_decode(post_json($url,$json),true);
		if($bx_info['error_code'] == '00042')
		{
			echo "<script>alert('被投保人身份证号不正确,请先完善被投保人信息');location.href='/weixin/index.php?m=Member&c=User&a=jzr_update&record_id=".$person_id."'</script>";
			exit;
		}
		//购买参数转码加密

		$data = array
		(
			"price"=>200,
			"person_id"=>$person_id
		);
		
		$json= json_encode($data);
		$payjson100= urlencode(passport_encrypt($json, "123"));

		$data = array
		(
			"price"=>200,
			"person_id"=>$person_id
		);
		
		$json= json_encode($data);
		$payjsonceshi= urlencode(passport_encrypt($json, "123"));
		//模板赋值
		$this->assign("payjson100",$payjson100);
		$this->assign("payjsonceshi",$payjsonceshi);


		$this->assign('person_id',$person_id);
		$this->assign('bx_info',$bx_info);
		$this->display(); // 输出模板	
	}


	//申请援助

	public function huzhu_jz()
	{
		$person_id = I("get.person_id","");
		$sale_type = I("get.sale_type","");
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取救助状态
		$url = C("PATH_URL")."/interface/yc_member/hz_expense_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"sx_id"=>C("SX_ID")
		);
		$json=json_encode($data);
		$info =json_decode(post_json($url,$json),true);
		/*
			CHECK_FLAG 基金审核状态,0未审核,1通过,2拒绝 默认0
			post_status	邮寄状态 0未邮寄 1已邮寄 默认0
			mate_check_flag	材料审核状态,0未审核,1通过,2拒绝 默认0
		*/
		if(isset($info['POST_STATUS']))
		{
			if($info['POST_STATUS']=='1'&&$info['MATE_CHECK_FLAG']=='1'&&$info['CHECK_FLAG']=='0')
			{
				$html = "jjh_send";

			}else if($info['POST_STATUS']=='1'&&$info['MATE_CHECK_FLAG']=='0'&&$info['CHECK_FLAG']=='0')//邮寄后
			{
				$html="email_success1";

			}else if($info['POST_STATUS']=='1'&&$info['MATE_CHECK_FLAG']=='2')
			{
				$html="jjh_error";

			}else if($info['POST_STATUS']=='1'&&$info['MATE_CHECK_FLAG']=='1'&&$info['CHECK_FLAG']=='1' &&!$info['PLAY_DATE'])//全通过
			{
				$html="jz_qrsk";

			}else if($info['POST_STATUS']=='1'&&$info['MATE_CHECK_FLAG']=='1'&&$info['CHECK_FLAG']=='1'&&$info['PLAY_DATE'])//全通过
			{
				$html="jz_qrsk";
				$this->assign('grey','grey');

			}else
			{
				$html = "email_send";
			}
			

		}else
		{
			$html = "huzhu_jz";
		}
		$this->assign('expense_id',$info['EXPENSE_ID']);
		$this->assign('money',$info['SJ_PAY_MONEY']);
		$this->assign('person_id',$person_id);
		$this->assign('sale_type',$sale_type);
		$this->display($html); 
	}

	//我已邮寄
	public function email_success()
	{
		$expense_id = I("get.expense_id","");
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取救助状态
		$url = C("PATH_URL")."/interface/yc_member/hz_expense_update_post.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expense_id"=>"$expense_id"
		);
		$json=json_encode($data);
		$info =json_decode(post_json($url,$json),true);
		if($info['error_code']=='ok')
		{
			$this->display(); 
		}
	}

	//确认收款
	public function jz_qrsk_ok()
	{
		$expense_id = I("get.expense_id","");
		$person_id = I("get.person_id","");
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//确认收款
		$url = C("PATH_URL")."/interface/yc_chuxian/yc_chuxian_date.aspx?access_token=".$token;
		$data = array
		(
			"expense_id"=>"$expense_id",
			"play_date"=>""
		);
		$json=json_encode($data);
		$info =json_decode(post_json($url,$json),true);

		//获取救助状态
		$url = C("PATH_URL")."/interface/yc_member/hz_expense_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"sx_id"=>C("SX_ID")
		);
		$json=json_encode($data);
		$money =json_decode(post_json($url,$json),true);
		$this->assign('money',$money['SJ_PAY_MONEY']);

		if($info['error_code']=='ok')
		{
			$this->display();
		}else
		{

			if($info['error_code']=="00099")
			{
				$this->error("收款确认日期必须在生效日期内!");
			}
			else if($info['error_code']=="00098")
			{
				$this->error("本年度已经援助过!");
			}
			else if($info['error_code']=="00097")
			{
				$this->error("没有生效日期!");
			}
			else if($info['error_code']=="00096")
			{
				$this->error("基金审核未通过");
			}
			
		}
	}

	//备案资料

	public function huzhu_info(){
		$person_id = I("get.person_id","");
		$sale_type = I("get.sale_type","");
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"sx_id"=>C("SX_ID")
		);
		$json=json_encode($data);
		$bx_info =json_decode(post_json($url,$json),true);
		$this->assign('bx_info',$bx_info);
		$this->assign('person_id',$person_id);
		$this->assign('sale_type',$sale_type);
		$this->display(); 
	}

	//备案资料提交
	public function huzhu_info_add()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$card_img1= $this->getimgbase64($_POST['forward']);
		$card_img2= $this->getimgbase64($_POST['back']);
		$baoxiao_img= $this->getimgbase64($_POST['record']);
		$book_img= $this->getimgbase64($_POST['book']);
		$life_img= $this->getimgbase64($_POST['life']);
		$phone = I("post.phone");
		$person_id = I("post.person_id","");
		$sale_type = I("post.sale_type","");
		if(!$card_img1 || !$card_img1)
		{
			$this->error("请上传身份证正反面！");
		}
		else if(!$book_img){
			$this->error("请上传援助申请书！");
		}
		else if(!$baoxiao_img){
			$this->error("请上传报销！");
		}else if(!$phone){
			$this->error("请填写手机号！");
		}else{

			$url = C("PATH_URL")."/interface/yc_member/hz_expense.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"person_id"=>"$person_id",
				"sale_type"=>"$sale_type",
				"contacts_mobile"=>"$phone",
				"daily_pic"=>"$life_img",
				"card_pic_fornt"=>"$card_img1",
				"card_pic_oppo"=>"$card_img2",
				"apply_pic"=>"$book_img",
				"expense_pic"=>"$baoxiao_img"
			);
			$json=json_encode($data);
			$info =json_decode(post_json($url,$json),true);
			
			echo $info['error_code'];
		}
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
				$image->thumb(1000, 1000)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}

		return $pic_path;
	}

	//互助----会员信息 爱脑
	public function huiyuanxinxi2()
	{

		$person_id = I("get.person_id","");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"sx_id"=>C("SX_ID1")
		);
		$json=json_encode($data);
		$bx_info =json_decode(post_json($url,$json),true);
		if($bx_info['error_code'] == '00042')
		{
			echo "<script>alert('被投保人身份证号不正确,请先完善被投保人信息');location.href='/weixin/index.php?m=Member&c=User&a=jzr_update&record_id=".$person_id."'</script>";
			exit;
		}
		//购买参数转码加密

		$data = array
		(
			"price"=>200,
			"person_id"=>$person_id
		);
		
		$json= json_encode($data);
		$payjson100= urlencode(passport_encrypt($json, "123"));

		$data = array
		(
			"price"=>200,
			"person_id"=>$person_id
		);
		
		$json= json_encode($data);
		$payjsonceshi= urlencode(passport_encrypt($json, "123"));
		//模板赋值
		$this->assign("payjson100",$payjson100);
		$this->assign("payjsonceshi",$payjsonceshi);


		$this->assign('person_id',$person_id);
		$this->assign('bx_info',$bx_info);
		$this->display(); // 输出模板	
	}

	//互助----会员证书
	public function member_card()
	{

		$person_id = I("get.person_id","");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_card.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"sx_id"=>C('SX_ID')
		);
		$json=json_encode($data);
		$bx_info =json_decode(post_json($url,$json),true);
		// var_dump($url,$json);die;

		$this->assign('person_id',$person_id);
		$this->assign('bx_info',$bx_info);
		$this->display(); // 输出模板	
	}

	//互助----会员证书
	public function member_card2()
	{

		$person_id = I("get.person_id","");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_card.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"sx_id"=>C('SX_ID1')
		);
		$json=json_encode($data);
		$bx_info =json_decode(post_json($url,$json),true);
		// var_dump($url,$json);die;

		$this->assign('person_id',$person_id);
		$this->assign('bx_info',$bx_info);
		$this->display(); // 输出模板	
	}



	//互助 -- 支付成功
	public function pay_success()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单的详情页
		$order_id = I('get.order_id', '45596');
		$sj_type = I('get.sj_type', '3');
		$url = C("PATH_URL")."/interface/yc_member/order_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id",
			"sj_type"=>"$sj_type"
		);
		$json=json_encode($data);
		$array =json_decode(post_json($url,$json),true);

		$url = C("PATH_URL")."/interface/yc_member/member_subscribe.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$res =json_decode(post_json($url,$json),true);
		if($res['error_code']=="0")
		{
			$this->assign("status","未关注");
		}
		$this->assign('array',$array);
		$this->display();
	}
	//互助----我的账单
	public function zhangdan()
	{

		$person_id = I("get.person_id",'');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_bx_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$zd_list =json_decode(post_json($url,$json),true); 


		$this->assign('zd_list',$zd_list);
		$this->assign('person_id',$person_id);
		$this->display(); // 输出模板	
	}


	//互助----我的账单
	public function zhangdan_append()
	{
		$person_id = I("get.person_id",'');
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_bx_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$zd_list =json_decode(post_json($url,$json),true); 
		// var_dump($url,$json,$zd_list);
		
		$this->assign('zd_list',$zd_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//互助----互助次数查询
	public function huzhucishu()
	{

		$person_id = I("get.person_id",'');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_bx_consume_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$hzcs_list =json_decode(post_json($url,$json),true); 
		// var_dump($url,$json,$hzcs_list);
		
		$this->assign('hzcs_list',$hzcs_list);
		$this->assign('person_id',$person_id);

		$this->display(); // 输出模板	
	}

	//互助----互助次数查询
	public function huzhucishu_append()
	{
		$person_id = I("get.person_id",'');
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_bx_consume_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$zd_list =json_decode(post_json($url,$json),true); 
		// var_dump($url,$json,$zd_list);
		
		$this->assign('zd_list',$zd_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//互助----分享页面
	public function share_init()
	{
		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';	

		//获取最新10条购买数据
		$url = C("PATH_URL")."/interface/yc_member/bx_buy_list_top.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_list_top.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$buy_list =json_decode(post_json($url,$json),true); 

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */



		// var_dump($url,$json,$buy_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("buy_list",$buy_list);

		$this->display(); // 输出模板	
		
	}


	//互助----分享页面
	public function share_init2()
	{
		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';	

		//获取最新10条购买数据
		$url = C("PATH_URL")."/interface/yc_member/bx_buy_list_top.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_list_top.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$buy_list =json_decode(post_json($url,$json),true); 

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */



		// var_dump($url,$json,$buy_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("buy_list",$buy_list);

		$this->display(); // 输出模板	
		
	}
	//预防----分享页面
	public function share_yf()
	{
		$footer = I('get.footer','show'); //只分享不购买
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取最新10条购买数据
		$url = C("PATH_URL")."/interface/yc_member/bx_buy_list_top.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_list_top.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$buy_list =json_decode(post_json($url,$json),true); 

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		// var_dump(post_json($url,$json));die;
		$this->assign('bx_list',$bx_list);

		// var_dump($url,$json,$buy_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("buy_list",$buy_list);

		$this->assign("footer",$footer);


		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板	
		
	}

	public function fenxiang()
	{
		
		//获取平台的access_token 

		$token = A_token();


		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		// var_dump(post_json($url,$json));die;
		$this->assign('bx_list',$bx_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}


	public function share_parent()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		// var_dump(post_json($url,$json));die;
		$this->assign('bx_list',$bx_list);

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	} 

	public function share_5()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		// var_dump(post_json($url,$json));die;
		$this->assign('bx_list',$bx_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}
	
	public function share_6()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		// var_dump(post_json($url,$json));die;
		$this->assign('bx_list',$bx_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}

	public function share_7()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","栏目菜单我是代言人");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}

	//二次销售
	function wxlogin_repay()
	{
		$user_id = I("get.user_id",'0');
		$link_mobile = I("get.link_mobile",'0');
		$user_name = I("get.user_name",' ');
		$attach = urlencode(I("get.attach",' '));
		$sale_type = I("get.sale_type",C("SALE_TYPE_1"));
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		if(!$openid || $openid==0 || $openid==1 ){
			redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=".C('M_APPID')."&redirect_uri=http%3a%2f%2fwx-heartorg.yk2020.com%2fweixin%2findex.php%3fm%3dMember%26c%3dHuzhu%26a%3dshare_repay%26user_id%3d".$user_id."%26user_name%3d".$user_name."%26attach%3d".$attach."%26sale_type%3d".$sale_type."%26link_mobile%3d".$link_mobile."&response_type=code&scope=snsapi_base&state=1");
			die;
		}else{
			redirect("http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_repay&user_id=".$user_id."&link_mobile=".$link_mobile."&attach=".$attach."&sale_type=".$sale_type."&user_name=".$user_name);
		}
		
		// if(!$openid || $openid=="0" || $openid=="1" ){
		// 	redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1f407a87747d4904&redirect_uri=http%3a%2f%2fweixin_xj.yk20.com%2fweixin%2findex.php%3fm%3dMember%26c%3dHuzhu%26a%3dshare%26user_id%3d".$user_id."&response_type=code&scope=snsapi_base&state=1");
		// 	die;
		// }else{
		// 	redirect("http://weixin_xj.yk20.com/weixin/index.php?m=Member&c=Huzhu&a=share&user_id=".$user_id);
		// }
	}


	//互助----分享页面 //二次销售
	public function share_repay()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$sale_type = I("get.sale_type",C("SALE_TYPE_1"));

		$url = C("PATH_URL")."/interface/yc_member/sale_type_info.aspx?access_token=".$token;
		$data = array
		(
			"sale_type"=>"$sale_type"
		);		
		$json=json_encode($data);
		$pdata = json_decode(post_json($url,$json),true);
		if(!$pdata)
		{
			die("产品类型不正确");
		}
		else
		{
			$title = $pdata['SALE_NAME'];
		}
		$this->assign("title",$title);

		//获取当前用户信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info =json_decode(post_json($url,$json),true);
		if($user_info['MEMBER_MOBILE'] == "0"){
			$user_info['MEMBER_MOBILE'] = '';
		} 

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("user_info",$user_info);
		

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板	
		
	}

	//检查卡号是否符合二次销售规则 //二次销售
	public function check_card()
	{
		//获取平台的access_token
		$token = A_token();

		$card_number = I("post.card_number");

		$url = C("PATH_URL")."/interface/check_card.aspx?access_token=".$token;
		$data = array
		(
			"card_number"=>"$card_number"
		);		
		$json=json_encode($data);
		$res = json_decode(post_json($url,$json),true);
		$this->ajaxReturn($res);		
	}



	function wxlogin()
	{
		$user_id = I("get.user_id",'0');
		$link_mobile = I("get.link_mobile",'0');
		$user_name = I("get.user_name",' ');
		$attach = urlencode(I("get.attach",' '));
		$sale_type = I("get.sale_type",C("SALE_TYPE_1"));
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		if(!$openid || $openid==0 || $openid==1 ){
			redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=".C('M_APPID')."&redirect_uri=http%3a%2f%2fwx-heartorg.yk2020.com%2fweixin%2findex.php%3fm%3dMember%26c%3dHuzhu%26a%3dshare%26user_id%3d".$user_id."%26user_name%3d".$user_name."%26attach%3d".$attach."%26sale_type%3d".$sale_type."%26link_mobile%3d".$link_mobile."&response_type=code&scope=snsapi_base&state=1");
			die;
		}else{
			redirect("http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share&user_id=".$user_id."&link_mobile=".$link_mobile."&attach=".$attach."&sale_type=".$sale_type."&user_name=".$user_name);
		}
		
		// if(!$openid || $openid=="0" || $openid=="1" ){
		// 	redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1f407a87747d4904&redirect_uri=http%3a%2f%2fweixin_xj.yk20.com%2fweixin%2findex.php%3fm%3dMember%26c%3dHuzhu%26a%3dshare%26user_id%3d".$user_id."&response_type=code&scope=snsapi_base&state=1");
		// 	die;
		// }else{
		// 	redirect("http://weixin_xj.yk20.com/weixin/index.php?m=Member&c=Huzhu&a=share&user_id=".$user_id);
		// }
	}


	//互助----分享页面
	public function share()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$sale_type = I("get.sale_type",C("SALE_TYPE_1"));

		$url = C("PATH_URL")."/interface/yc_member/sale_type_info.aspx?access_token=".$token;
		$data = array
		(
			"sale_type"=>"$sale_type"
		);		
		$json=json_encode($data);
		$pdata = json_decode(post_json($url,$json),true);
		if(!$pdata)
		{
			die("产品类型不正确");
		}
		else
		{
			$title = $pdata['SALE_NAME'];
		}
		$this->assign("title",$title);

		//获取自己最新成功购买的一条数据
		$url = C("PATH_URL")."/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"sale_type"=>"$sale_type"
		);
		$json=json_encode($data);
		$buy_info =json_decode(post_json($url,$json),true); 


		//获取当前用户信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info =json_decode(post_json($url,$json),true);
		if($user_info['MEMBER_MOBILE'] == "0"){
			$user_info['MEMBER_MOBILE'] = '';
		} 

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("buy_info",$buy_info);
		$this->assign("user_info",$user_info);
		

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板	
		
	}

	//支付  二次销售
	public function share_pay_again()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		// 支付参数

		$person_name = I('post.name','');
		$person_mobile = I('post.phone','0','string');
		$person_idcard = I('post.idCard','0','string');
		$person_sex = I('post.sex',0,'intval');
		$user_id = I('post.user_id',0,'intval');
		$ys_id = I('post.ys_id',0,'intval');
		$hos_id = I('post.hos_id',0,'intval');
		$card_number = I('post.card_number',0,'intval');
		$link_mobile = I('post.link_mobile','0','string');
		$attach = I('post.attach','');
		if($attach != ''){
			$attach = base64_decode(urldecode($attach));
		}
		$attach = $attach."&user_id=".$user_id."&link_mobile=".$link_mobile;
		$member_mobile = I('post.member_mobile','');
		
		$jzr_date = I('post.jzr_date');

		$person_age = date('Y', time()) - date('Y', strtotime($jzr_date)) - 1;  
		if (date('m', time()) == date('m', strtotime($jzr_date)))
		{  
		  
		    if (date('d', time()) > date('d', strtotime($jzr_date)))
		    {  
		    	$person_age++;  
		    }  
		}
		elseif (date('m', time()) > date('m', strtotime($jzr_date)))
		{  
		    $person_age++;  
		} 
		if(!$person_age)
		{
			$person_age == "20";
		}
		// $person_age = I('post.age')?I('post.age'):20;
		$sale_type = I('post.sale_type',C('SALE_TYPE_1'),'string');
		
		$url = C("PATH_URL")."/interface/yc_member/sale_type_info.aspx?access_token=".$token;
		$data = array
		(
			"sale_type"=>"$sale_type"
		);

		$json=json_encode($data);
		$pdata = json_decode(post_json($url,$json),true);
		if(!$pdata)
		{
			die("产品类型不正确");
		}
		else
		{
			$hz_money = $pdata['SALEPRICE'];
			$subject = "购买".$pdata['SALE_NAME'];
		}
		
		//获取订单号 
		$url = "http://192.168.100.228:8080/interface/bx_buy_again.aspx?access_token=".$token;
		// $url = C("PATH_URL")."/interface/bx_buy_again.aspx?access_token=".$token;
		$data = array
		(
			"person_name"=>"$person_name",
			"person_mobile"=>"$person_mobile",
			"person_idcard"=>"$person_idcard",
			"person_sex"=>"$person_sex",
			"person_age"=>"$person_age",
			"yw_id"=>C('YW_ID'),
			"sale_userid"=>"$user_id",
			"sale_mobile"=>"$link_mobile",
			"from_url"=>"$attach",
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile",
			"sale_type"=>"$sale_type",
			"ys_id"=>"$ys_id",
			"hos_id"=>"$hos_id",
			"card_number"=>"$card_number",
			"hz_money"=>"$hz_money"
		);

		$json=json_encode($data);
		// var_dump($url,$json);die;
		$pdata = post_json($url,$json);
		$data = json_decode($pdata,true);
		// var_dump($data,$json,$pdata);die;

		$log=new Log();
        $log->write("share_pay_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
        $log->write("share_pay_data".$json,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
		$order_sn = $data['order_id'];
		// dump($order_sn);die;
		$person_id = $data['person_id'];
		if($order_sn == '')
		{
			echo "系统错误";
			exit;
		}
		else
		{

			//获取当前用户 卡号 手机号 
	        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
	        $json=json_encode($data);
	        $user_info = json_decode(post_json($url,$json),true);
	        // var_dump($openid,$user_info);
	         //当前用户手机号
	        $mobile = $user_info['MEMBER_MOBILE'];
	        $card_number = $user_info['CARD_NUMBER'];
	        // var_dump($openid);die;
	        if($card_number)
	        {
	            //获取卡余额
	            $url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
	            $data = array
	            (
	                "mobile"=>"$mobile"
	             );
	            $json=json_encode($data);
	            $card_yue = json_decode(post_json($url,$json),true);

	        }
	        // var_dump($card_yue);die;

			$data = array
			(
				"out_trade_no"=>$order_sn,
				"subject"=>$subject,
				"total"=>$hz_money,
				"person_id"=>$person_id,
				"status"=>6,
				"card_number"=>$card_number,
        		"card_money"=>$card_yue['cur_money']
			);
			$json= json_encode($data);
		// var_dump($data);die;
			$json= urlencode(passport_encrypt($json, "123"));
			header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
		}
	}

	//支付
	public function share_pay()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		// 支付参数
		$person_name = I('post.name','');
		$person_mobile = I('post.phone','0','string');
		$person_idcard = I('post.idCard','0','string');
		$person_sex = I('post.sex',0,'intval');
		$user_id = I('post.user_id',0,'intval');
		$link_mobile = I('post.link_mobile','0','string');
		$attach = I('post.attach','');
		if($attach != ''){
			$attach = base64_decode(urldecode($attach));
		}
		$attach = $attach."&user_id=".$user_id."&link_mobile=".$link_mobile;
		$member_mobile = I('post.member_mobile','');
		
		$jzr_date = I('post.jzr_date');

		$person_age = date('Y', time()) - date('Y', strtotime($jzr_date)) - 1;  
		if (date('m', time()) == date('m', strtotime($jzr_date)))
		{  
		  
		    if (date('d', time()) > date('d', strtotime($jzr_date)))
		    {  
		    	$person_age++;  
		    }  
		}
		elseif (date('m', time()) > date('m', strtotime($jzr_date)))
		{  
		    $person_age++;  
		} 
		if(!$person_age)
		{
			$person_age == "20";
		}
		// $person_age = I('post.age')?I('post.age'):20;
		$sale_type = I('post.sale_type',C('SALE_TYPE_1'),'string');
		
		$url = C("PATH_URL")."/interface/yc_member/sale_type_info.aspx?access_token=".$token;
		$data = array
		(
			"sale_type"=>"$sale_type"
		);

		$json=json_encode($data);
		$pdata = json_decode(post_json($url,$json),true);
		if(!$pdata)
		{
			die("产品类型不正确");
		}
		else
		{
			$hz_money = $pdata['SALEPRICE'];
			$subject = "购买".$pdata['SALE_NAME'];
			$yw_id = $pdata['YW_ID'];
		}

		//获取订单号 
		// $url = "http://192.168.100.228:8080/interface/bx_buy_ok.aspx?access_token=".$token;
		$url = C("PATH_URL")."/interface/bx_buy_ok.aspx?access_token=".$token;
		$data = array
		(
			"person_name"=>"$person_name",
			"person_mobile"=>"$person_mobile",
			"person_idcard"=>"$person_idcard",
			"person_sex"=>"$person_sex",
			"person_age"=>"$person_age",
			"yw_id"=>"$yw_id",
			"sale_userid"=>"$user_id",
			"sale_mobile"=>"$link_mobile",
			"from_url"=>"$attach",
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile",
			"sale_type"=>"$sale_type",
			"hz_money"=>"$hz_money"
		);

		$json=json_encode($data);
		$pdata = post_json($url,$json);
		$data = json_decode($pdata,true);

		$log=new Log();
        $log->write("share_pay_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
        $log->write("share_pay_data".$json,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
		$order_sn = $data['order_id'];
		// dump($order_sn);die;
		$person_id = $data['person_id'];
		if($order_sn == '')
		{
			echo "系统错误";
			exit;
		}
		else
		{

			//获取当前用户 卡号 手机号 
	        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
	        $json=json_encode($data);
	        $user_info = json_decode(post_json($url,$json),true);
	        // var_dump($openid,$user_info);
	         //当前用户手机号
	        $mobile = $user_info['MEMBER_MOBILE'];
	        $card_number = $user_info['CARD_NUMBER'];
	        // var_dump($openid);die;
	        if($card_number)
	        {
	            //获取卡余额
	            $url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
	            $data = array
	            (
	                "mobile"=>"$mobile"
	             );
	            $json=json_encode($data);
	            $card_yue = json_decode(post_json($url,$json),true);

	        }
	        // var_dump($card_yue);die;

			$data = array
			(
				"out_trade_no"=>$order_sn,
				"subject"=>$subject,
				"total"=>$hz_money,
				"person_id"=>$person_id,
				"status"=>6,
				"card_number"=>$card_number,
        		"card_money"=>$card_yue['cur_money']
			);
			$json= json_encode($data);
		// var_dump($data);die;
			$json= urlencode(passport_encrypt($json, "123"));
			header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
		}
	}


	//支付
	public function huzhu_pay()
	{
		// 解密支付参数
		$type = I('get.type',0);
		$payjson = urldecode(I('get.payjson'));
		$payjson = passport_decrypt($payjson, "123");
		$payjson = json_decode(($payjson),true);
		$person_id = $payjson['person_id']?$payjson['person_id']:I('get.person_id',0);

		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		$sale_type=C('SALE_TYPE_1');
		if($type=='1')
		{
			$sale_type=C('SALE_TYPE_9');
		}
		$url = C("PATH_URL")."/interface/yc_member/sale_type_info.aspx?access_token=".$token;
		$data = array
		(
			"sale_type"=>$sale_type
		);

		$json=json_encode($data);
		$pdata = json_decode(post_json($url,$json),true);
		if(!$pdata)
		{
			die("产品类型不正确");
		}
		else
		{
			$price = $pdata['SALEPRICE'];
			$subject = "购买".$pdata['SALE_NAME'];
		}

		// var_dump($person_id,$price);die;
		if($price == 0)
		{
			redirect(U('Member/Huzhu/jiaruxingdong'));
		}
		else
		{
			//获取当前就诊人信息接口
	        $url = C("PATH_URL")."/interface/yc_member/person_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "record_id"=>"$person_id"
	        );
	        $json=json_encode($data);
	        $jzr_info = post_json($url,$json);


			//获取订单号
			$url = C("PATH_URL")."/interface/yc_member/bx_buy_ok.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"sale_type"=>$sale_type,
				"hz_money"=>"$price",
				"person_id"=>"$person_id"
			);

			$json=json_encode($data);
			$pdata = post_json($url,$json);
			$data = json_decode($pdata,true);
			$log=new Log();
	        $log->write("huzhu_pay_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
	        $log->write("huzhu_pay_data".$json,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
	        $log->write("huzhu_person_data".$jzr_info,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
			// $data = json_decode(post_json($url,$json),true);
			// var_dump($url,$json,$data);die;
			if($data['error_code'] == '00042')
			{
				echo "<script>alert('被投保人身份证号不正确,请先完善被投保人信息');location.href='/weixin/index.php?m=Member&c=User&a=jzr_update&record_id=".$person_id."'</script>";
				exit;
			}
			$order_sn = $data['order_id'];
			if($order_sn == '')
			{
				echo "系统错误";
				exit;
			}
			else
			{

				//获取当前用户 卡号 手机号 
		        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		        $data = array
		        (
		            "openid"=>"$openid"
		        );
		        $json=json_encode($data);
		        $user_info = json_decode(post_json($url,$json),true);

		         //当前用户手机号
		        $mobile = $user_info['MEMBER_MOBILE'];
		        $card_number = $user_info['CARD_NUMBER'];

		        if($card_number)
		        {
		            //获取卡余额
		            $url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
		            $data = array
		            (
		                "mobile"=>"$mobile"
		             );
		            $json=json_encode($data);
		            $card_yue = json_decode(post_json($url,$json),true);

		        }

				$data = array
				(
					"out_trade_no"=>$order_sn,
					"subject"=>"$subject",
					"total"=>$price,
					"person_id"=>$person_id,
					"status"=>6,
					"card_number"=>$card_number,
            		"card_money"=>$card_yue['cur_money']
				);
				$json= json_encode($data);
				$json= urlencode(passport_encrypt($json, "123"));
				header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
			}
		}
	}

	//互助----预约健康服务
	public function yuyue_jkfw()
	{
		$person_id = I("get.person_id",'');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取会员信息
		$url = "http://192.168.100.228:8018/ServieYunAPI/ServicePatient/ServiceYunAPI.asmx/GetServiceList";
		$data = "Personid=".$person_id;
		$yuyue =json_decode(post_json($url,$data),true);
		// dump($yuyue);
		$this->assign('yuyue',$yuyue);
		$this->display();
	}

	//四----分享页面
	public function share_des()
	{
		$footer = I('get.footer','show'); //只分享不购买

		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取最新10条购买数据
		$url = C("PATH_URL")."/interface/yc_member/bx_buy_list_top.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_list_top.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$buy_list =json_decode(post_json($url,$json),true); 


		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign("bx_list",$bx_list);
		$this->assign("time",time());

		// var_dump($url,$json,$buy_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("buy_list",$buy_list);

		$this->assign("footer",$footer);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板	
		
	}

	//商城
	public function shop()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$url = U("Car/shoping");
		$link_mobile = I("get.link_mobile");
		if($link_mobile != '0' && $link_mobile)
		{
			$url .= "&user_id=".I("get.user_id")."&link_mobile=".I("get.link_mobile")."&user_name=".I("get.user_name");
		}
		redirect($url);
		die;


	}

	//商城
	public function shop_bak()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$link_mobile = I("get.link_mobile");
		$user_info = array();
		if($link_mobile == '0' || !$link_mobile)
		{
			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
			//获取患者详细信息
			$url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid"
			);
			$json=json_encode($data);
			$user_info = json_decode(post_json($url,$json),true);

			if($user_info['user_name'])
			{
				$user_info['real_name'] = $user_info['user_name'];
				$user_info['user_name'] = base64_encode($user_info['user_name']);
			}
		}
		else
		{
			$user_info['link_mobile'] = I("get.link_mobile",'999');
			$user_info['user_id'] = I("get.user_id",'0');
			$user_info['user_name'] = I("get.user_name");
		}

		$this->assign('user_info',$user_info);

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","栏目菜单百倍商城");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}

	//分享会员荣誉证书
	public function share_card()
	{
		
		$person_id = I("get.person_id",'');
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取会员信息
		$url = C("PATH_URL")."/interface/yc_member/person_card.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"person_id"=>"$person_id",
			"sx_id"=>'1'
		);
		$json=json_encode($data);
		$bx_info =json_decode(post_json($url,$json),true);
		//var_dump($url,$json);die;

		$this->assign('person_id',$person_id);
		$this->assign('bx_info',$bx_info);


		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}


	//498产品 宣传 1
	public function share_498_1()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';


		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}

	//1280产品 新专题
	public function jiankangguanli()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		
		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}


	//1280产品 宣传 1
	public function share_1280_1()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		
		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}

	//1280产品 宣传 2
	public function share_1280_chunjie()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';


		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		
		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}



	//公共调用分享方法
	public function share_public()
	{

		//获取平台的access_token 

		$token = A_token();

		//分享朋友圈

		$appId=C('M_APPID');
		$secret=C('M_SECRET');

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

    	$return = array(
    		"appId" => $appId,
    		"timestamp" => $timestamp,
    		"signature" => $signature,
    		"NonceStr" => $NonceStr
		);
		return $return;
	
	}

	//朋友圈
	public function bbk()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		$this->display(); // 输出模板

	}

	//提现列表
	public function record()
	{
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取提现列表
		$url = C("PATH_URL")."/interface/yc_member/income_money_list.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
		);

		$json=json_encode($data);
		
		$result = json_decode(post_json($url,$json),true);
		//print_r($result);die;
		$this->assign('record_list',$result);
		$this->display(); // 输出模板

	}

	//提现
	public function take()
	{
		//获取平台的access_token 
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//提现余额
		$url = C("PATH_URL")."/interface/yc_member/my_balance_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$result = json_decode(post_json($url,$json),true);
		$this->assign('result',$result);
		$this->display(); // 输出模板

	}

	//提现提交
	public function take_ok()
	{
		$money = I("post.money",'');
		$real_name = I("post.real_name",'');

		//获取平台的access_token 
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//提现
		$url = C("PATH_URL")."/interface/yc_member/income_money_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"bank_card"=>"$bank_card",
			"real_name"=>"$real_name",
			"acccunt_name"=>"$Acccuntname",
			"bank_name"=>"$BankName",
			"city_name"=>"$city_name",
			"bank_detail"=>"$BankDetail",
			"income_money"=>"$money"
		);
		$json=json_encode($data);
		$result = json_decode(post_json($url,$json),true);

		
		if($result['error_code']=='ok')
		{
			echo "<script>alert('提交成功！');location.href='/weixin/index.php?m=Member&c=Huzhu&a=record';</script>";
		}
		else
		{
			echo "<script>alert('提交失败！');";
		}
	}

	//我的代言明细
    public function daiyan_list()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取个人三级分销明细信息
		$url = C("PATH_URL")."/interface/yc_member/three_sale_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"m_token_id"=>C('M_TOKEN_ID'),
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$daiyan_list = json_decode(post_json($url,$json),true);
		// var_dump($url,$json);

		$this->assign("daiyan_list",$daiyan_list);
		$this->display();
    }


    //我的代言明细
    public function daiyan_list_append()
    {
    	$page_num = I('get.page_num', '2');
    	
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取个人三级分销明细信息
		$url = C("PATH_URL")."/interface/yc_member/three_sale_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"m_token_id"=>C('M_TOKEN_ID'),
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$daiyan_list = json_decode(post_json($url,$json),true);
		// var_dump($daiyan_list);

		$this->assign("daiyan_list",$daiyan_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
    }


    public function fx()
    {
        //获取平台的access_token
		$token = A_token();


		//获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');
        $yw_id = I('get.yw_id','2');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{
			
			//获取三级分销信息
			$url = C("PATH_URL")."/interface/app_member/three_sale_info_list.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id",
				"yw_id"=>"$yw_id"
			);
		}
		else
		{

			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

			 //获取三级分销信息
	        $url = C("PATH_URL")."/interface/yc_member/three_sale_info_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	        );
		}

		$json=json_encode($data);
		$three_list['list'] = json_decode(post_json($url,$json),true);
		$three_list['count'] = count($three_list['list']);
		// var_dump($three_list);

		
		//没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{
			
			//获取二级分销信息
			$url = C("PATH_URL")."/interface/app_member/two_sale_list.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id",
				"yw_id"=>"$yw_id"				
			);
		}
		else
		{

			 //获取二级分销信息
	        $url = C("PATH_URL")."/interface/yc_member/two_sale_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	        );
		}

		$json=json_encode($data);
		$two_list = json_decode(post_json($url,$json),true);
		$two_list['list'] = json_decode(post_json($url,$json),true);
		$two_list['count'] = count($two_list['list']);
		// var_dump($two_list);

		$this->assign("three_list",$three_list);
		$this->assign("two_list",$two_list);
		$this->display();
    }

    //圣诞分享
	public function christmas()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}
		
		$this->assign('user_info',$user_info);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

//app 1280页面

    public function share_1280_app()
    {

    	/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display();
    }

    //高血压健康管理套装
	public function blood()
	{
		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取平台的access_token 
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		
		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	  //高血压健康管理套装
	public function blood2()
	{
		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取平台的access_token 
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		
		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	 //VIP心脑护照卡
	public function share_9900_1()
	{
		$footer = I('get.footer','show'); //只分享不购买
		//获取平台的access_token 

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		
		$this->assign("footer",$footer);
		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	//涨价
	public function rise()
	{
		//获取平台的access_token 

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	//1280产品 宣传 1
	public function share_1280_new()
	{
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';


		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		
		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}

	 //VIP心脑护照卡
	public function long_9900()
	{
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);

		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	 //VIP心脑护照卡
	public function join_1280()
	{
		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);

		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	 //VIP心脑护照卡
	public function join_12802()
	{
		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);

		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}
	//清明
	public function share_qingming()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';	


		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->display(); // 输出模板	
		
	}

	 //机器人
	public function share_jqr_1()
	
{		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

			//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		
		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	 //机器人
	public function share_jqr_2()
	{
		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

			//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		
		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	 //百倍爱心卡重疾保障套装
	public function bbk_z()
	{
		$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

			//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		
		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}


	//百倍爱心卡母亲节重疾保障套装
	public function mother()
	{
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		
		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}


	//百倍爱心卡三伏天
	public function bbaxk_gwsn()
	{
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>I('get.yw_id','2')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		$this->assign('bx_list',$bx_list);
		
		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	
	//测试图片
	public function tututu()
	{
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';


		//分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板

	}

	//端午节专题
	public function duanwujie()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}

		$this->assign('user_info',$user_info);

		//没有获取openid 走app  //获取会员的头像及昵称
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$url = C("PATH_URL")."/interface/app_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "member_id"=>"$member_id",
	            "bx_status"=>1
	        );
		}
		else
		{
	        $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "bx_status"=>1
	        );
    	}

		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		if(isset($bx_list1['error_code'])){
			$bx_list1 =array();
		}

		$this->assign('bx_list1',$bx_list1);

        //分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板
    }

	 //
	public function active1()
	{
		
		$this->display(); // 输出模板
	}
	public function active2()
	{
		
		$this->display(); // 输出模板
	}
	public function active3()
	{
		
		$this->display(); // 输出模板
	}


	//百元投入，倾情援助
	public function aid()
    {
    	$footer = I('get.footer','show'); //只分享不购买
        
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}

		$this->assign('user_info',$user_info);

		//没有获取openid 走app  //获取会员的头像及昵称
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$url = C("PATH_URL")."/interface/app_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "member_id"=>"$member_id",
	            "bx_status"=>1
	        );
		}
		else
		{
	        $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "bx_status"=>1
	        );
    	}

		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		if(isset($bx_list1['error_code'])){
			$bx_list1 =array();
		}

		$this->assign('bx_list1',$bx_list1);

        //分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("footer",$footer);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板
    }
	
	
	//百倍爱心卡智能手机套装
	public function share_zntz()
    {
    	$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}

		$this->assign('user_info',$user_info);

		//没有获取openid 走app  //获取会员的头像及昵称
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$url = C("PATH_URL")."/interface/app_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "member_id"=>"$member_id",
	            "bx_status"=>1
	        );
		}
		else
		{
	        $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "bx_status"=>1
	        );
    	}

		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		if(isset($bx_list1['error_code'])){
			$bx_list1 =array();
		}

		$this->assign('bx_list1',$bx_list1);

        //分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板
    }


	//百倍爱心卡智能手机套装
	public function share_zntz2()
    {
    	$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}

		$this->assign('user_info',$user_info);

		//没有获取openid 走app  //获取会员的头像及昵称
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$url = C("PATH_URL")."/interface/app_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "member_id"=>"$member_id",
	            "bx_status"=>1
	        );
		}
		else
		{
	        $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "bx_status"=>1
	        );
    	}

		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		if(isset($bx_list1['error_code'])){
			$bx_list1 =array();
		}

		$this->assign('bx_list1',$bx_list1);

        //分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板
    }

     //留言板提交
	public function msg()
	{
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$this->display(); // 输出模板

	}

	//提交 ~
	public function msg_do()
	{
		
		$token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $from_name = I('post.from_name','');
        $to_name = I('post.to_name','');
        $to_mobile = I('post.to_mobile','');
        $leave_message = I('post.leave_message','');

       
	        //获取会员的头像及昵称
        $url = C("PATH_URL")."/interface/yc_member/activ_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "from_name"=>"$from_name",
            "to_name"=>"$to_name",
            "to_mobile"=>"$to_mobile",
            "leave_message"=>"$leave_message"
        );
    	
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->redirect(U('Member/Huzhu/father')); // 输出模板

	}

	public function father()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		// var_dump($openid);die;

		$sale_type = I("get.sale_type",C("SALE_TYPE_1"));
		$type = I("get.type",'Member');
		$path=explode("_",I("get.path"));
		if($path[0]=="Home")
		{
			$type=$path[0];
		}
		//获取自己最新成功购买的一条数据
		$url = C("PATH_URL")."/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"sale_type"=>"$sale_type"
		);
		$json=json_encode($data);
		$buy_info =json_decode(post_json($url,$json),true); 


		//获取当前用户信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info =json_decode(post_json($url,$json),true);
		if($user_info['MEMBER_MOBILE'] == "0"){
			$user_info['MEMBER_MOBILE'] = '';
		} 

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("buy_info",$buy_info);
		$this->assign("type",$type);
		$this->assign("user_info",$user_info);
		$this->display(); // 输出模板

	} 

	public function aid_neimeng()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		// var_dump($openid);die;

		$sale_type = I("get.sale_type",C("SALE_TYPE_1"));
		$type = I("get.type",'Member');
		$path=explode("_",I("get.path"));
		if($path[0]=="Home")
		{
			$type=$path[0];
		}
		//获取自己最新成功购买的一条数据
		$url = C("PATH_URL")."/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"sale_type"=>"$sale_type"
		);
		$json=json_encode($data);
		$buy_info =json_decode(post_json($url,$json),true); 


		//获取当前用户信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info =json_decode(post_json($url,$json),true);
		if($user_info['MEMBER_MOBILE'] == "0"){
			$user_info['MEMBER_MOBILE'] = '';
		} 

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("buy_info",$buy_info);
		$this->assign("type",$type);
		$this->assign("user_info",$user_info);
		$this->display(); // 输出模板

	} 

	//医联体专题
	public function yilianti()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		// var_dump($openid);die;

		$sale_type = I("get.sale_type",C("SALE_TYPE_1"));
		$type = I("get.type",'Member');
		$path=explode("_",I("get.path"));
		if($path[0]=="Home")
		{
			$type=$path[0];
		}
		//获取自己最新成功购买的一条数据
		$url = C("PATH_URL")."/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"sale_type"=>"$sale_type"
		);
		$json=json_encode($data);
		$buy_info =json_decode(post_json($url,$json),true); 


		//获取当前用户信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info =json_decode(post_json($url,$json),true);
		if($user_info['MEMBER_MOBILE'] == "0"){
			$user_info['MEMBER_MOBILE'] = '';
		} 

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("buy_info",$buy_info);
		$this->assign("type",$type);
		$this->assign("user_info",$user_info);
		$this->display(); // 输出模板

	}
	
	//试纸购买
	public function shizhi_buy()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		// var_dump($openid);die;

		$type = I("get.type",'Member');
		$path=explode("_",I("get.path"));
		if($path[0]=="Home")
		{
			$type=$path[0];
		}

		$payjson = 'commodity_id=37602518';
		//模板赋值
		$this->assign("payjson",$payjson);



		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		$this->assign("type",$type);
		$this->display(); // 输出模板

	} 


	function sp_wxlogin(){
		$payjson = I("get.commodity_id",'');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		if(!$openid || $openid==0 || $openid==1 ){
			redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=".C('M_APPID')."&redirect_uri=http%3a%2f%2fwx-heartorg.yk2020.com%2fweixin%2findex.php%3fm%3dMember%26c%3dHuzhu%26a%3dsp_info%26commodity_id%3d".$payjson."&response_type=code&scope=snsapi_base&state=1");
			die;
		}else{
			redirect("http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=sp_info&commodity_id=".$payjson);
		}
		
	}

	public function zhuhuichang()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		// var_dump($openid);die;

		$link_mobile = I("get.link_mobile");
		$user_info = array();
		if($link_mobile == '0' || !$link_mobile)
		{
			
			//获取患者详细信息
			$url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid"
			);
			$json=json_encode($data);
			$user_info = json_decode(post_json($url,$json),true);

			if($user_info['user_name'])
			{
				$user_info['real_name'] = $user_info['user_name'];
				$user_info['user_name'] = base64_encode($user_info['user_name']);
			}
		}
		else
		{
			$user_info['link_mobile'] = I("get.link_mobile",'999');
			$user_info['user_id'] = I("get.user_id",'0');
			$user_info['user_name'] = I("get.user_name");
		}

		$this->assign('user_info',$user_info);

		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("user_name",$user_name);
		$this->display(); // 输出模板

	} 

	//商品信息整理
	public function sp_info()
	{
		$commodity_id = I('get.commodity_id');
		//获取商品价格
		
		$url = C("PATH_URL")."/interface/yc_member/commodity_price.aspx?access_token=".$token;

		$data = array
		(
			"commodity_id" => $commodity_id,
		);
		$json=json_encode($data);
		$pdata = post_json($url,$json);
		$data = json_decode($pdata,true);
		$this->assign('commodity_id',$commodity_id);
		$this->assign('price',$data['commodity_money']);
		$this->display();
	}


	//试纸支付
	public function sp_pay()
	{
		$commodity_id = I('commodity_id');
		$price = I('price');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取当前用户信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_member/bx_buy_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info =json_decode(post_json($url,$json),true);

		//获取订单号 
		$url = C("PATH_URL")."/interface/yc_member/order_add_cgpt.aspx?access_token=".$token;

		$data = array
		(
			"member_id" => $user_info['MEMBER_ID'],
			"commodity_id" => $commodity_id,
			"pay_num" =>'1',
			"pay_money" =>$price, 
			"from_flag" =>'0',
			"from_purch" =>'1'
		);
		$json=json_encode($data);
		$pdata = post_json($url,$json);
		$data = json_decode($pdata,true);

		$log=new Log();
        $log->write("shizhi_pay_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/".date('Y-m')."/wxpay".date('Y-m-d').'.log');
        $log->write("shizhi_pay_data".$json,"WXPAY","","./Application/Runtime/Logs/".date('Y-m')."/wxpay".date('Y-m-d').'.log');
	
		// dump($order_sn);die;
		$order_sn = $data['order_id'];//获取的订单号
		if($order_sn == '')
		{
			echo "系统错误";
			exit;
		}
		else
		{

			//获取当前用户 卡号 手机号 
	        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
	        $json=json_encode($data);
	        $user_info = json_decode(post_json($url,$json),true);
	       
	         //当前用户手机号
	        $mobile = $user_info['MEMBER_MOBILE'];
	        $card_number = $user_info['CARD_NUMBER'];
	        // var_dump($openid);die;
	        if($card_number)
	        {
	            //获取卡余额
	            $url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
	            $data = array
	            (
	                "mobile"=>"$mobile"
	             );
	            $json=json_encode($data);
	            $card_yue = json_decode(post_json($url,$json),true);

	        }
	        // var_dump($card_yue);die;

			$data = array
			(
				"out_trade_no"=>$order_sn,
				"subject"=>"爱奥乐血糖试纸",
				"total"=>$price,
				"status"=>1,
				"card_number"=>$card_number,
        		"card_money"=>$card_yue['cur_money']
			);
			$json= json_encode($data);
		// var_dump($data);die;
			$json= urlencode(passport_encrypt($json, "123"));
			header("Location:/weixin/Application/Member/WxpayAPI/sp_jsapi.php?json=$json");
		}
	}

	//百倍爱脑卡智能手机套装
	public function ainaoka()
    {
    	$footer = I('get.footer','show'); //只分享不购买
		$this->assign("footer",$footer);

        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}

		$this->assign('user_info',$user_info);

		//没有获取openid 走app  //获取会员的头像及昵称
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$url = C("PATH_URL")."/interface/app_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "member_id"=>"$member_id",
	            "bx_status"=>1
	        );
		}
		else
		{
	        $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "bx_status"=>1
	        );
    	}

		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		if(isset($bx_list1['error_code'])){
			$bx_list1 =array();
		}

		$this->assign('bx_list1',$bx_list1);

        //分享朋友圈
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*
		分享日志参数
		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

		$this->display(); // 输出模板
    }


	public function heart_health()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>C('YW_ID')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		// var_dump(post_json($url,$json));die;
		$this->assign('bx_list',$bx_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}

	public function art()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>C('YW_ID')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		// var_dump(post_json($url,$json));die;
		$this->assign('bx_list',$bx_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}


	public function share_znphone()
	{
		
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取首页6项
		$url = C("PATH_URL")."/interface/yc_member/fx_bx_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>C('YW_ID')
		);
		$json=json_encode($data);
		$bx_list =json_decode(post_json($url,$json),true);
		// var_dump(post_json($url,$json));die;
		$this->assign('bx_list',$bx_list);
		//分享朋友圈及个人信息
		$share = $this->share_public();
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		/*

		分享日志参数

		*/

		$path = I("get.path","");
		$homeid = I("get.homeid") ? I("get.homeid") : $openid;
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */


		$this->display(); // 输出模板

	}


 }
 ?>
