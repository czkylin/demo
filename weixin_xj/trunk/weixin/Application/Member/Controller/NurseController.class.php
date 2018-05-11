<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class NurseController extends Controller
{
	public function order()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';


		//服务项目
		$url = C("NEW_URL")."/interface/app_nurse_member/GetNurseServiceList.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$list = json_decode(post_json($url,$json),true);
		// var_dump($list);

		$this->assign('slist',$list['Data']);
		$this->display();
	}


	public function order_info()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$lat = I('get.lat', '');
		$lng = I('get.lng', '');
		  
		$this->assign('lat',$lat);
		$this->assign('lng',$lng);

		$SERVICE_ID = I('get.SERVICE_ID',0, 'intval');
		//服务项目
		$url = C("NEW_URL")."/interface/app_nurse_member/GetNurseServiceList.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$list = json_decode(post_json($url,$json),true);
		$ServiceInfo = array();
		if($list['Code']=='9000' && !empty($list['Data'])){
			foreach ($list['Data'] as $key => $value) {
				if($SERVICE_ID == $value['SERVICE_ID']){
					$ServiceInfo = $value;
					$ServiceInfo['json'] = urlencode(passport_encrypt(json_encode($value), "123"));
				}
			}
		}

		// var_dump($ServiceInfo);
		$this->assign('ServiceInfo',$ServiceInfo); 

		$this->display();
	}

	//添加订单
	public function order_add()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取member_id
		$url = C("NEW_URL")."/interface/app_nurse_member/GetWeixinMemberid.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);		
		$json=json_encode($data);
		$user = json_decode(post_json($url,$json),true);

		// var_dump($data);die;

		$payjson = urldecode(I('post.payjson',''));
		$payjson = passport_decrypt($payjson, "123");
		$payjson = json_decode(($payjson),true);


		//提交订单
		$url = C("NEW_URL")."/interface/app_nurse_member/SendAppointMent.aspx?access_token=".$token;
		// $data = "AppointmentAddress=".I('post.AppointmentAddress')."&Userid=".$user['MEMBER_ID']."&SERVICE_ID=".I('post.SERVICE_ID',0,'intval')."&SERVICE_PRICE=".$payjson['SERVICE_PRICE']."&PersonId=".I('post.PersonId',0,'intval')."&Lat=".I('post.Lat')."&Lng=".I('post.Lng')."&AppointmentContent=".I('post.AppointmentContent')."&AppointmentDate=".date('Y-m-d H:i:s',time()+3600)."&FromClient=0";
		$data = array
		(
			"openid"			=>"$openid",
			"AppointmentAddress"=>I('post.AppointmentAddress'),
			"Userid"			=>$user['MEMBER_ID'],
			"ServiceId"		=>I('post.SERVICE_ID',0,'intval'),
			"ServicePrice"		=>$payjson['SERVICE_PRICE'],
			"PersonId"			=>I('post.PersonId',0,'intval'),
			"Lat"				=>I('post.Lat'),
			"Lng"				=>I('post.Lng'),
			"AppointmentContent"=>I('post.AppointmentContent'),
			"AppointmentDate"	=>date('Y-m-d H:i:s',time()+3600),
			"FromClient"		=>"0"
		);		
		$json=json_encode($data);
		$order_add = json_decode(post_json($url,$json),true);
		if($order_add['Code'] == '9000'){
				//暂时不支付，正式之后注释掉
				echo "<script>alert('下单成功！');window.location.href='".U('Nurse/order_wait',array('ORDERID'=>$order_add['OrderId']))."';</script>";die;

				if($payjson['SERVICE_PRICE']==0){
					echo "<script>alert('下单成功！');window.location.href='".U('Nurse/order_wait',array('ORDERID'=>$order_add['OrderId']))."';</script>";die;
				}

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
				$data = array
				(
					"out_trade_no"=>$order_add['ORDERID'],
					"subject"=>'护士帮',
					"total"=>$payjson['SERVICE_PRICE'],
					"status"=>'7',
					"card_number"=>$card_number,
            		"card_money"=>$card_yue['cur_money']
				);
				$json= json_encode($data);
				$json= urlencode(passport_encrypt($json, "123"));
				header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
		}else{
			echo "<script>alert('Code:".$order_add['Code'].",Msg:".$order_add['Msg']."');window.location.href='".U('Nurse/order')."';</script>";
		}

		
	}

	//取消订单
	public function order_close()
	{
		//获取平台的access_token
		$token = A_token();


		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$ORDERID = I('get.ORDERID',0,'intval');

		//获取member_id
		$url = C("NEW_URL")."/interface/app_nurse_member/GetWeixinMemberid.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);		
		$json=json_encode($data);
		$user = json_decode(post_json($url,$json),true);

		// var_dump($user);die;

		//订单列表
		$url = C("NEW_URL")."/interface/app_nurse_member/SetCloseOrder.aspx?access_token=".$token;
		$data = array
		(
			"Userid"=>"$user[MEMBER_ID]",
			"ORDERID"=>"$ORDERID"
		);		
		$json=json_encode($data);
		$order_close = json_decode(post_json($url,$json),true);

		// var_dump($order_close);die;
		if($order_close['Code'] == '9000'){
			echo "<script>alert('取消订单成功！');window.location.href='".U('Nurse/order_center')."';</script>";
		}else{
			echo "<script>alert('Code:".$order_close['Code'].",Msg:".$order_close['Msg']."');window.location.href='".U('Nurse/order_center')."';</script>";
		}

		
	}

	//催单
	public function order_cuidan()
	{
		//获取平台的access_token
		$token = A_token();


		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$ORDERID = I('get.ORDERID',0,'intval');

		//获取member_id
		$url = C("NEW_URL")."/interface/app_nurse_member/GetWeixinMemberid.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);		
		$json=json_encode($data);
		$user = json_decode(post_json($url,$json),true);

		// var_dump($user);die;

		//催单
		$url = C("NEW_URL")."/interface/app_nurse_member/PatientReminder.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"Userid"=>"$user[MEMBER_ID]",
			"ORDERID"=>"$ORDERID",
		);		
		$json=json_encode($data);
		$order_close = json_decode(post_json($url,$json),true);
		// var_dump($order_close);die;
		if($order_close['Code'] == '9000'){
			echo "<script>alert('已催单，请耐心等待！');window.location.href='".U('Nurse/nurse_nogo',array('ORDERID'=>$ORDERID))."';</script>";
		}else{
			echo "<script>alert('Code:".$order_close['Code'].",Msg:".$order_close['Msg']."');window.location.href='".U('Nurse/order_center')."';</script>";
		}

		
	}

	//订单完成
	public function order_success()
	{
		//获取平台的access_token
		$token = A_token();


		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$ORDERID = I('get.ORDERID',0,'intval');

		//订单完成
		$url = C("NEW_URL")."/interface/app_nurse/NurseOrderFinished.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"UserType"=>"0",
			"ORDERID"=>"$ORDERID",
		);		
		$json=json_encode($data);
		$order_close = json_decode(post_json($url,$json),true);

		if($order_close['Code'] == '9000'){
			echo "<script>alert('订单完成！');window.location.href='".U('Nurse/order_complete',array('ORDERID'=>$ORDERID))."';</script>";
		}else{
			echo "<script>alert('Code:".$order_close['Code'].",Msg:".$order_close['Msg']."');window.location.href='".U('Nurse/order_center')."';</script>";
		}
				
	}

	public function order_member()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("NEW_URL")."/interface/yc_member/case_list.aspx?access_token=".$token;
		// $url = C("PATH_URL")."/interface/yc_member/case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);		
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign("cdata",$data);
		// var_dump($data);
        
		$this->display();
	}

	//订单列表
	public function order_center()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取member_id
		$url = C("NEW_URL")."/interface/app_nurse_member/GetWeixinMemberid.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);		
		$json=json_encode($data);
		$user = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$user);

		//订单列表
		$url = C("NEW_URL")."/interface/app_nurse_member/GetAppointMentList.aspx?access_token=".$token;
		$data = array
		(
			"Userid"=>"$user[MEMBER_ID]",
			"PageIndex"=>"1"
		);		
		$json=json_encode($data);
		$order_list = json_decode(post_json($url,$json),true);

        $this->assign("order_list",$order_list['Data']);
		$this->display();
	}


	//订单列表
	public function order_center_append()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$PageIndex = I('get.page_num', 2,'intval');

		//获取member_id
		$url = C("NEW_URL")."/interface/app_nurse_member/GetWeixinMemberid.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);		
		$json=json_encode($data);
		$user = json_decode(post_json($url,$json),true);

		//订单列表
		$url = C("NEW_URL")."/interface/app_nurse_member/GetAppointMentList.aspx?access_token=".$token;
		$data = array
		(
			"Userid"=>"$user[MEMBER_ID]",
			"PageIndex"=>"$PageIndex"
		);		
		$json=json_encode($data);
		$order_list = json_decode(post_json($url,$json),true);

        $this->assign("order_list",$order_list['Data']);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	public function order_wait()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';
        
		$this->display();
	}

	public function order_waitpay()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';
        
		$this->display();
	}

	public function order_complete()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        $ORDERID = I('get.ORDERID',0,'intval');


        //订单详情
		$url = C("NEW_URL")."/interface/app_nurse_member/AppointMentDetail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ORDERID"=>"$ORDERID"
		);		
		$json=json_encode($data);
		$order_detail = json_decode(post_json($url,$json),true);
		// var_dump($order_detail);

        $this->assign("order_detail",$order_detail);

        //订单评价详情
		$url = C("NEW_URL")."/interface/app_nurse_member/GetOrderCommentDetail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ORDERID"=>"$ORDERID"
		);		
		$json=json_encode($data);
		$order_evaluate = json_decode(post_json($url,$json),true);


        $this->assign("order_evaluate",$order_evaluate);
        
		$this->display();
	}

	//评价
	public function order_evaluate()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$ORDERID = I('post.ORDERID',0,'intval');
		$Star = I('post.Star','');
		$Mark = I('post.Mark','');
		$Supplement = I('post.Supplement','');

		//获取member_id
		$url = C("NEW_URL")."/interface/app_nurse_member/GetWeixinMemberid.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);		
		$json=json_encode($data);
		$user = json_decode(post_json($url,$json),true);

		//提交评论
		$url = C("NEW_URL")."/interface/app_nurse_member/OrderComment.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ORDERID"=>"$ORDERID",
			"Userid"=>$user['MEMBER_ID'],
			"Star"=>"$Star",
			"Mark"=>"$Mark",
			"Supplement"=>"$Supplement",
		);		
		$json=json_encode($data);
		$order_evaluate = json_decode(post_json($url,$json),true);

		echo $order_evaluate['Code'];
				
	}

	public function nurse_nogo()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        $ORDERID = I('get.ORDERID',0,'intval');
        
        //订单详情
        $url = C("NEW_URL")."/interface/app_nurse_member/AppointHeaderInfo.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ORDERID"=>"$ORDERID"
		);		
		$json=json_encode($data);
		$order_detail = json_decode(post_json($url,$json),true);

		//获取member_id
		$url = C("NEW_URL")."/interface/app_nurse_member/GetWeixinMemberid.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);		
		$json=json_encode($data);
		$user = json_decode(post_json($url,$json),true);
		// var_dump($user);

        $this->assign("order_detail",$order_detail);
        $this->assign("UserId",$user['MemberId']);

		$this->display();
	}

	public function nurse_alreadygo()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        $ORDERID = I('get.ORDERID',0,'intval');

		//订单详情
        $url = C("NEW_URL")."/interface/app_nurse_member/AppointHeaderInfo.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ORDERID"=>"$ORDERID"
		);		
		$json=json_encode($data);
		$order_detail = json_decode(post_json($url,$json),true);
		// var_dump($order_detail);

        $this->assign("order_detail",$order_detail);
        
		$this->display();
	}

	//获取gps
	public function get_gps3($type)
	{
		$type = I('get.type', 'order');
		$ORDERID = I('get.ORDERID', 0);
		$url_str = "m=Member&c=Nurse&a=".$type."&ORDERID=".$ORDERID;
		$this->assign('url_str', $url_str);
		$this->display(COMMON_PATH.'/Common/gps3.html');
	}
	
	//协议
	public function agree()
	{        
		$this->display();
	}
}