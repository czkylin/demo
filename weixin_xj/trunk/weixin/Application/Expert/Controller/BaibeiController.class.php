<?php
namespace Expert\Controller;
use Think\Controller;
class BaibeiController extends Controller
{
	// 首页
	public function share_init()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid,"0");
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		
		$this->display();
	}


	//百倍爱心卡消费明细

	public function hz_order_list()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取平台的access_token
		$token = A_token();

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_doc/hz_order_list.aspx?access_token=".$token;
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
		$url = C("PATH_URL")."/interface/yc_doc/hz_order_list.aspx?access_token=".$token;
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
	
	//百倍爱心分享
	public function ka_list()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		$expert_id = I('get.expert_id','');

		//分享朋友圈及个人信息
		$share = $this->share($openid,$expert_id);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

		$this->assign("openid",$openid);
		$this->assign("path","菜单百倍爱心分享");
		
		$this->display();
    }


	public function share($openid,$expert_id){

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

    	//没有获取openid 走app
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			//获取首页三项
			$url = C("PATH_URL")."/interface/app_expert/get_sale_info.aspx?access_token=".$token;
			$data = array			
			(
				"expert_id"=>"$expert_id"
			);
		}
		else
		{
			//获取分享需用手机号
			$url = C("PATH_URL")."/interface/yc_doc/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid"
			);
		}
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		if($user_info['user_name'])
		{
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}


    	$return = array(
    		"appId" => $appId,
    		"timestamp" => $timestamp,
    		"signature" => $signature,
    		"NonceStr" => $NonceStr,
    		"user_info" => $user_info
		);
		return $return;
    }
}