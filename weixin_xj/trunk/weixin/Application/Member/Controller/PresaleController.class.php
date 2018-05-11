<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class PresaleController extends Controller 
{
	
    public function presale()
    {

    	$homeid = I('get.homeid');

        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取个人信息
		$url = C("PATH_URL")."/interface/yc_hos/user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$homeid"
		);
		$json=json_encode($data);
		$my_info = json_decode(post_json($url,$json),true);

		//获取终端列表
		$url = C("PATH_URL")."/interface/yc_hos/hz_yd_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$homeid",
			"page_num" => "1",
		);
		$json = json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);

		// 售卡产品
		$url = C("PATH_URL")."/interface/yc_hos/card_sale_type_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$card_list = json_decode(post_json($url,$json),true);
		
		$this->assign('homeid',$homeid);
		$this->assign('my_info',$my_info);
		$this->assign('yd_list',$yd_list);
		$this->assign('card_list',$card_list);
		$this->display();
    }


    public function presale_add()
    {

    	$homeid = I('post.homeid');
    	$user_id = I('post.user_id');
    	$hospital = I('post.hospital');
    	$outerName = I('post.outerName');
    	$outerPhone = I('post.outerPhone');
    	$types = I('post.types');
    	$applyCard = I('post.applyCard');
    	$applyNum = I('post.applyNum');
    	$price = I('post.price');
    	//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		switch ($applyCard) 
		{
			case '1':
				$apply_name = "百倍爱心卡";
				break;
			case '2':
				$apply_name = "腕表套装";
				break;
			case '9':
				$apply_name = "高血压健康管理套装";
				break;
			default:
				# code...
				break;
		}

		//获取个人信息
		$url = C("PATH_URL")."/interface/yc_member/ys_buy_ok.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"sale_userid"=>"$user_id",
			"hos_id"=>"$hospital",
			"apply_object"=>"$applyCard",
			"apply_name"=>"$apply_name",
			"apply_number"=>"$applyNum",
			"pay_money"=>"$price",
			"external_user"=>"$outerName",
			"external_mobile"=>"$outerPhone",
			"ys_type"=>"$types",
			"homeid"=>"$homeid"
		);
		$json=json_encode($data);
		$pdata = post_json($url,$json);
		$data = json_decode($pdata,true);
		
		$log=new Log();
        $log->write("persale_pay_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/persale".date('Y-m-d').'.log');
        $log->write("persale_pay_data".$json,"WXPAY","","./Application/Runtime/Logs/persale".date('Y-m-d').'.log');
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
				"subject"=>$apply_name,
				"total"=>$price,
				"status"=>7,
				"homeid"=>$homeid,
				"card_number"=>$card_number,
        		"card_money"=>$card_yue['cur_money']
			);
			$json= json_encode($data);
			// var_dump($data);die;
			$json= urlencode(passport_encrypt($json, "123"));
			header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
		}
		// dump(post_json($url,$json));
    }

    public function persale_pay()
    {
    	$homeid = I('post.homeid');
    	$payjson = urldecode(I('get.parameters'));
		$payjson = passport_decrypt($payjson, "123");
		$payjson = json_decode(($payjson),true);

        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


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
			"out_trade_no"=>$payjson['order_id'],
			"subject"=>$payjson['apply_name'],
			"total"=>$payjson['price'],
			"status"=>7,
			"homeid"=>$homeid,
			"card_number"=>$card_number,
    		"card_money"=>$card_yue['cur_money']
		);
		$json= json_encode($data);
		// var_dump($data);die;
		$json= urlencode(passport_encrypt($json, "123"));
		header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
    }

}