<?php
namespace Member\Controller;
use Think\Controller;
class DjtController extends Controller
{
	public function index()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//分享朋友圈及个人信息
		$share = $this->share_public($openid);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
		$this->assign("user_info",$share['user_info']);

		$this->display(); 
        // 输出模板
	}


	//公共调用分享方法
	public function share_public($openid = 0)
	{

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

		//获取平台的access_token 
		$token = A_token();

    	//获取会员的头像及昵称
        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}

    	$return = array(
    		"user_info" => $user_info,
    		"appId" => $appId,
    		"timestamp" => $timestamp,
    		"signature" => $signature,
    		"NonceStr" => $NonceStr
		);
		return $return;

		
	}
}
