<?php
namespace Member\Controller;
use Think\Controller;
class LottController extends WechatController
{
	public function _initialize()
    {
        //获取openid
		$openid = I('session.m_openid', '');

		if(!$openid)
		{
			$this->getCode(U('Wechat/wxlogin@wx-heartorg.yk2020.com',array('controller'=>CONTROLLER_NAME)),'43rfdsfdf');
		}	

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

	public function index()
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

	public function game()
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

	public function details()
	{
		$this->display(); // 输出模板
	}

	public function kai()
	{
		$this->display(); // 输出模板
	}

	public function score_add()
	{
		$fen=I('post.fen','1');

		//获取平台的access_token
		$token = A_token();	

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_member/game_scores_add.aspx?access_token=".$token;	
		$data = array
		(
			"openid"=>"$openid",
			"game_id"=>"1",
			"points"=>"$fen"
		);
		$json=json_encode($data);
		$score_info = json_decode(post_json($url,$json),true);

		if ($score_info['error_code'] != "")
		{

			echo $score_info['error_code'];
		}else{
			echo '服务器错误';
		}

	}

}