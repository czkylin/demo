<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class ConsultController extends Controller
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
		
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/home_expert_list.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
		);
		$json=json_encode($data);
		//print(post_json($url,$json));die;
		$expert_list = json_decode(post_json($url,$json),true);
		if(empty($expert_list))
		{

			$this->redirect('?m=Member&c=Consult&a=noconsult_list');
		}
		//print_r($expert_list);die;
		$this->assign('expert_list',$expert_list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
	 // var_dump($consult_list);die;
		$this->display(); // 输出模板
	}

	//获取咨询
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
		

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$this->assign('user_info',$user_info);
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/consult_list.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
			"page_num" => "1",
			"expert_id"=>"$expert_id",
			"small_expert_id"=>"$small_expert_id"
		);
		$json=json_encode($data);
		$consult_list = json_decode(post_json($url,$json),true);

		if(empty($consult_list))
		{
			$this->redirect('index.php?m=Member&c=Doc&a=doc_consult&doc_id='.$expert_id);
		}
		else
		{
			$this->assign('consult_list',$consult_list);// 赋值数据集
			$this->assign('expert_id',$expert_id);// 赋值数据集
		 // var_dump($consult_list);die;
			$this->display(); // 输出模板
		}
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
		//print_r($json);
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
	public function consult_pay()
	{
		//解密支付参数
		$json = urldecode($_GET['json']);
		$json = passport_decrypt($json, "123");
		$json = json_decode(($json),true);
		$doc_id = $json['doc_id'];
		$price = $json['price'];
		$yx_date = $json['yx_date'];
		$fz_flag = $json['fz_flag'];
		$is_consult = $json['is_consult']?$json['is_consult']:0;
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//获取家庭医生满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/vip_flag.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
		);
		$json=json_encode($data);
		$home_expert_list = json_decode(post_json($url,$json),true);
		// var_dump($home_expert_list);die;


		//获取邀请我的专家列表 
        $url = C("PATH_URL")."/interface/yc_member/expert_hz_flag.aspx?access_token=".$token;
        // echo $url;die;
        $data = array
        (
            "openid"=>"$openid",
            "expert_id"=>"$doc_id"
        );
        $json=json_encode($data);
        $expert_list = json_decode(post_json($url,$json),true);


		//判断当前医生是不是我的家庭医生
		$ishome = 0;
		if($home_expert_list['error_code']=="ok"){
			$ishome = 1;
		}

		if($expert_list['error_code']=="ok"){
			$ishome = 1;
		}

		// var_dump($home_expert_list,$expert_list$ishome);die;
		if($price == 0 || !empty($yx_date) || $ishome==1)
		{
			$this->redirect('?m=Member&c=Consult&a=consult_add_index&doc_id='.$doc_id.'&price='.$price.'&order_id=0');
		}
		else
		{
			$time2 = date("Y-m-d H:i:s",time());
			$serve_name = "在线咨询";
			//获取订单号
			$url = C("PATH_URL")."/interface/yc_member/consult_order_add.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"order_money"=>"$price",
				"expert_id"=>"$doc_id",
				"order_date"=>"$time2",
				"order_status"=>"0",
				"create_date"=>"$time2",
				"order_name"=>"$serve_name",
				"record_id"=>"1"
			);

			$json=json_encode($data);
			$data = json_decode(post_json($url,$json),true);
			// var_dump($url,$json,$data);die;
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

				//购买参数转码加密
				//$serve_name = UrlEncode($serve_name);
		        //判断是正常咨询还是医患问诊
				if($is_consult == 1){
					$status = 5;
				}else{
					$status = 0;
				}

				$data = array
				(
					"out_trade_no"=>$order_sn,
					"subject"=>$serve_name,
					"total"=>$price,
					"consult_id"=>0,
					"status"=>$status,
					"doc_id"=>$doc_id,
					"card_number"=>$card_number,
            		"card_money"=>$card_yue['cur_money']
				);
				$json= json_encode($data);
				$json= urlencode(passport_encrypt($json, "123"));
				header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
			}
		}
	}

	public function onlin_play()
	{
		$order_id = I('get.out_trade_no', '');
		$outtradeno = I('get.outtradeno', '');
		$price = I('get.total', '');
		$doc_id = I('get.doc_id', '');
		$hz_id = I('get.hz_id', '');
		$status = I('get.status', 0);
		$homeid = I('get.homeid', 0);
		$person_id = I('get.person_id', 0);

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		if($status == 7){
			$url=C("PATH_URL")."/interface/yc_member/ys_online_pay.aspx?access_token=".$token;
			//echo  $openid;
			$data=array
			(
				"openid"=>"$openid",
				"record_id"=>"$order_id",
				"pay_number"=>"$outtradeno",
				"is_play"=>"1" 
			);
		}elseif ($status == 8) {
			$url=C("PATH_URL")."/interface/yc_member/online_pay_xd.aspx?access_token=".$token;
			//echo  $openid;
			$data=array
			(
				"openid"=>"$openid",
				"order_id"=>"$order_id",
				"serial_number"=>"$outtradeno",
				"order_status"=>"1" 
			);
		}else{
			$url=C("PATH_URL")."/interface/yc_member/online_pay.aspx?access_token=".$token;
			//echo  $openid;
			$data=array
			(
				"openid"=>"$openid",
				"order_id"=>"$order_id",
				"serial_number"=>"$outtradeno",
				"order_status"=>"1" 
			);
		}
		

		$json=json_encode($data);
		$pdata = post_json($url,$json);
		$log=new Log();
        $log->write("onlin_play_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
        $log->write("onlin_play_data".$json,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
		if($status==4){
			$this->redirect("?m=Member&c=Order&a=hz_order_detail&hz_id=$hz_id");
		}else if($status==5){
			$this->redirect("?m=Member&c=Consult&a=consult_details&expert_id=$doc_id");
		}else if($status==6){
			$this->redirect("?m=Member&c=Huzhu&a=pay_success&order_id=$order_id");
		}else if($status==7){
			$this->redirect("?m=Home&c=Presale&a=detail&homeid=".$homeid);
		}else if($status==8){
			$this->redirect("?m=Expert&c=Order&a=xdyp_list");
		}else if($status==9){//商品购买
			$this->redirect("?m=Member&c=Car&a=shoping");
		}
		else{
			$this->redirect("?m=Member&c=Consult&a=consult_add_index&doc_id=$doc_id&price=$price&order_id=$order_id");
		}
	}
	
	//发布咨询问题页面
	public function consult_add_index()
	{
		$doc_id = I('get.doc_id', '');
		 // var_dump($doc_id);
		$price = I('get.price', '');
		$order_id = I('get.order_id', '');

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
			$this->redirect("?m=Member&c=Consult&a=consult_details&consult_id=$consult_id&expert_id=$expert_id");
		}
		else
		{
			$consult_error = $con["error_code"];
			$this->redirect("?m=Member&c=Consult&a=consult_add_index&consult_error=".$consult_error); 
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
		$expert_id = I('get.expert_id','0');

		//测试环信用 start
		$turl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		$turl = str_replace("consult_details","consult_details_bak",$turl);
		redirect($turl);die;
		// if(is_ceshi($openid)){
		// 	redirect($turl);
		// }
		//测试环信用 stop


		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$userinfo = json_decode(post_json($url,$json),true);
		$member_pic = $userinfo['MEMBER_PIC'];
		if($userinfo['MEMBER_PIC'] == "/weixin/Application/Member/View/images/member.png")
		{
			$member_pic="";
		}
		$this->assign("member_pic",$member_pic);

		//咨询标题
		$title_url = C("PATH_URL")."/interface/yc_member/consult_title.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id"
		);
		$json= json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$is_pj = $data[0]['IS_PJ']; //是否评价过 是 就是已经评价过 否 没有评价过
		$this -> assign("is_pj",$is_pj);

		$tdata = json_decode(post_json($title_url,$json),true);
		// var_dump($member_pic,$tdata);
		if($tdata['EXPERT_ID']){
			$expert_id = $tdata['EXPERT_ID'];
		}

		//咨询内容列表
		$url = C("PATH_URL")."/interface/yc_member/consult_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"expert_id"=>"$expert_id"
		);
		$json= json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this -> assign("data",$data);
		// var_dump($url,$json,$tdata);

		

		//获取邀请我的专家列表  判断是不是自己的医生 返回error_code ok 是我的医生 no 不是
        $url = C("PATH_URL")."/interface/yc_member/expert_hz_flag.aspx?access_token=".$token;
        // echo $url;die;
        $data = array
        (
            "openid"=>"$openid",
            "expert_id"=>"$expert_id",
        );
        $json=json_encode($data);
        $expert_list = json_decode(post_json($url,$json),true);
        // var_dump($url,$json,$expert_list);

        //获取家庭医生满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/vip_flag.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
		);
		$json=json_encode($data);
		$home_expert_list = json_decode(post_json($url,$json),true);



        //出院状态 1已出院，默认是0
        $fz_flag = 0;
        if($expert_list['error_code'] != 'ok'){
        	$fz_flag = 1;
        }

        //是否家庭医生 不需要收费
        if($home_expert_list['error_code'] == 'ok'){
        	$fz_flag = 0;
        }


        // var_dump($fz_flag);die;

        //如果已出院则需要付款 查看金额
        $price = 0;
        if($fz_flag == 1){
        	//医生详情
			$url = C("PATH_URL")."/interface/yc_member/expert_info.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"expert_id"=>"$expert_id",
			);
			$json=json_encode($data);
			$doc_detail =json_decode(post_json($url,$json),true);
			
			$price = $doc_detail[EXPERT_SERVES][0][SERVE_MONEY];
			$yx_date = $doc_detail[EXPERT_SERVES][0][YX_DATE];
			// var_dump($price,$yx_date);
			if($price==0 || $yx_date != null){
				// var_dump($price,$yx_date);die;
				$fz_flag = 0;
			}else{
				//购买参数转码加密
				$data = array
				(
					"price"=>$price,
					"yx_date"=>$doc_detail[EXPERT_SERVES][0][YX_DATE],
					"doc_id"=>$expert_id,
					"is_consult"=>1,
				);
				// var_dump($fz_flag,$data);die;
				$json= json_encode($data);
				$json= urlencode(passport_encrypt($json, "123"));
				//模板赋值
				$this->assign("json",$json);
			}

			

        }

		$this -> assign("tdata",$tdata);
		$this -> assign("consult_id",$consult_id);
		$this -> assign("expert_id",$expert_id);
		$this -> assign("fz_flag",$fz_flag);
		$this -> display(); 
	}

	//咨询对话详情
	public function consult_details_bak()
	{
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$consult_id = I('get.consult_id','0');
		$expert_id = I('get.expert_id','0');

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$userinfo = json_decode(post_json($url,$json),true);
		$member_pic = $userinfo['MEMBER_PIC'];
		// var_dump($userinfo);
		if($userinfo['MEMBER_PIC'] == "/weixin/Application/Member/View/images/member.png" || $userinfo['MEMBER_PIC'] == "")
		{
			if($userinfo['MEMBER_SEX'] == '女'){
				$member_pic = "/weixin/Public/Expert/images/fenXiang/dfgirl.png";
			}else{
				$member_pic = "/weixin/Public/Expert/images/fenXiang/dfboy.png";
			}
		}else{
			$member_pic = $userinfo['MEMBER_PIC'];
		}
		

    
		$this->assign("member_pic",$member_pic);

		//咨询标题
		$title_url = C("PATH_URL")."/interface/yc_member/consult_title.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id"
		);
		$json= json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$is_pj = $data[0]['IS_PJ']; //是否评价过 是 就是已经评价过 否 没有评价过
		$this -> assign("is_pj",$is_pj);

		$tdata = json_decode(post_json($title_url,$json),true);
		// var_dump($member_pic,$tdata);
		if($tdata['EXPERT_ID']){
			$expert_id = $tdata['EXPERT_ID'];
		}

		//咨询内容列表
		$url = C("PATH_URL")."/interface/yc_member/consult_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"expert_id"=>"$expert_id"
		);
		$json= json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this -> assign("data",$data);
		// var_dump($url,$json,$tdata);

		

		//获取邀请我的专家列表  判断是不是自己的医生 返回error_code ok 是我的医生 no 不是
        $url = C("PATH_URL")."/interface/yc_member/expert_hz_flag.aspx?access_token=".$token;
        // echo $url;die;
        $data = array
        (
            "openid"=>"$openid",
            "expert_id"=>"$expert_id",
        );
        $json=json_encode($data);
        $expert_list = json_decode(post_json($url,$json),true);
        // var_dump($url,$json,$expert_list);

        //获取家庭医生满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/vip_flag.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
		);
		$json=json_encode($data);
		$home_expert_list = json_decode(post_json($url,$json),true);



        //出院状态 1已出院，默认是0
        $fz_flag = 0;
        if($expert_list['error_code'] != 'ok'){
        	$fz_flag = 1;
        }

        //是否家庭医生 不需要收费
        if($home_expert_list['error_code'] == 'ok'){
        	$fz_flag = 0;
        }


        // var_dump($fz_flag);die;

        //如果已出院则需要付款 查看金额
        $price = 0;
        if($fz_flag == 1){
        	//医生详情
			$url = C("PATH_URL")."/interface/yc_member/expert_info.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"expert_id"=>"$expert_id",
			);
			$json=json_encode($data);
			$doc_detail =json_decode(post_json($url,$json),true);
			
			$price = $doc_detail[EXPERT_SERVES][0][SERVE_MONEY];
			$yx_date = $doc_detail[EXPERT_SERVES][0][YX_DATE];
			// var_dump($price,$yx_date);
			if($price==0 || $yx_date != null){
				// var_dump($price,$yx_date);die;
				$fz_flag = 0;
			}else{
				//购买参数转码加密
				$data = array
				(
					"price"=>$price,
					"yx_date"=>$doc_detail[EXPERT_SERVES][0][YX_DATE],
					"doc_id"=>$expert_id,
					"is_consult"=>1,
				);
				// var_dump($fz_flag,$data);die;
				$json= json_encode($data);
				$json= urlencode(passport_encrypt($json, "123"));
				//模板赋值
				$this->assign("json",$json);
			}

			

        }

		$this -> assign("tdata",$tdata);
		$this -> assign("consult_id",$consult_id);
		$this -> assign("expert_id",$expert_id);
		$this -> assign("member_id",$userinfo['MEMBER_ID']);
		$this -> assign("fz_flag",$fz_flag);
		$this -> display(); 
	}

	//咨询对话列表
	public function consult_details_list()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$consult_id = I('post.consult_id',0);
		$expert_id = I('post.expert_id',0);
		
		//咨询内容列表
		$url = C("PATH_URL")."/interface/yc_member/consult_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"expert_id"=>"$expert_id"
		);
		$json= json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->ajaxReturn($data);

	}

	//咨询回复
	public function consult_response()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$consult_id=I('post.consult_id','0');
		$expert_id=I('post.expert_id','0');
		if($consult_id != 0){
			$expert_id = 0;
		}
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
			"expert_id"=>"$expert_id",
			"reply_content"=>"$reply_content",
			"create_date"=>"$create_date",
			"reply_img"=>"$pic_path",
			"lat"=>"$lat",
			"lng"=>"$lng",
		);

		$json=urldecode(json_encode($data));
		
		$data = post_json($url,$json);
		
		$data = json_decode($data,true);
		// var_dump($url,$json,$data);die;

		$this->redirect("?m=Member&c=Consult&a=consult_details&consult_id=".$consult_id."&expert_id=".$expert_id);
	}
	//咨询评论
	public function pl_ok()
	{
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//print_r($_POST);die;
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
		// print_R($json);die;
		 $data =json_decode(post_json($url,$json),true); 
		//print_R($data);die;
		 $error_code = $data["error_code"];
		 echo $error_code;
	}

	//推送模板消息
	public function ts()
	{
		$consult_id = I('post.consult_id',0);
		$reply_content = I('post.reply_content','');
		$expert_id = I('post.expert_id',0);
		$reply_img = I('post.reply_img','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//推送模板消息
		$url = C("PATH_URL")."/interface/yc_member/consult_reply_info_ts.aspx?access_token=".$token;
		$data = array
		(
			"openid" => "$openid",
			"consult_id" => "$consult_id",
			"expert_id"=>"$expert_id",
			"reply_content"=>"$reply_content",
			"reply_img"=>"$reply_img",
		);
		$json=json_encode($data);
		$status = json_decode(post_json($url,$json),true);
		$this->ajaxReturn($status['error_code']);
	}

	//记录聊天数据100条
	public function keepmsg(){
		$fromid = I("fromid",'1');
		$toid = I("toid",'1');
		$msg = I('msg','哈哈哈');
		$msg = explode('**',trim($msg,'**'));
		$msg = serialize($msg);

		$filename = DATA_PATH.$fromid.'-'.$toid.'.txt';
		file_put_contents($filename,$msg.'~~',FILE_APPEND);
		//保持100条
		$con = file_get_contents($filename);
		$arr = explode('~~',$con);
		if(count($arr)>20){
			unset($arr[0]);
		}
		$con = implode('~~', $arr);
		file_put_contents($filename,$con);
	}
	//读取聊天记录
	public function readmsg(){
		$fromid = I("fromid",'30077599_2');
		$toid = I("toid",'759481_2');
		$filename = DATA_PATH.$fromid.'-'.$toid.'.txt';
		$con = file_get_contents($filename);
		$arr = explode('~~',trim($con,'~~'));
		$i = 0;
		foreach ($arr as $v) {
			$arr1[$i] = unserialize($v);
			$arr1[$i][2] = date('Y/m/d H:i:s',strtotime($arr1[$i][2]));
			$i++;
		}
		$this->ajaxReturn($arr1);
	}
}