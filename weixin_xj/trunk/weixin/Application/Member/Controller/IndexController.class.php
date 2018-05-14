<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class IndexController extends Controller
{
	public function index()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//推荐医生
		$url = C("PATH_URL")."/interface/yc_member/expert_tj_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>C('YW_ID')
		);
		$json = json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign('index_tjys',$data);// 赋值数据集
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
		
		$this->assign("csstime",time());
		$this->display();
	}

	//快速办理
	public function index_ksbl()
	{
		$this->display();
	}

	//热门问题
	public function index_rmwt()
	{
		$this->display();
	}

	public function set_log()
	{
		$log=new Log();
		$type = I("post.type") ? I("post.type") : 'Member';
		$openid = I("post.openid") ? I("post.openid") : '0';
		$link_mobile = I("post.link_mobile") ? I("post.link_mobile") : '0';
		$url_path = I("post.url_path") ? I("post.url_path") : '点别人分享~';
		$act = I("post.act");
		
		$log->write($type."{openid:$openid,link_mobile:$link_mobile,url_path:$url_path,act:$act}","WXSHARE","","./Application/Runtime/Logs/wx_share".date('Y-m-d').'.log');
	}

	public function set_log_get()
	{
		$log=new Log();
		$type = I("get.type") ? I("get.type") : 'Member';
		$openid = I("get.openid") ? I("get.openid") : '0';
		$link_mobile = I("get.link_mobile") ? I("get.link_mobile") : '0';
		$url_path = I("get.url_path") ? I("get.url_path") : '点别人分享~';
		$act = I("get.act");
		
		$log->write($type."{openid:$openid,link_mobile:$link_mobile,url_path:$url_path,act:$act}","WXSHARE","","./Application/Runtime/Logs/wx_share".date('Y-m-d').'.log');
	}


	//dingding
	public function dingding()
	{
		$this->display();
	}

	//医院地图
	public function hos_map()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医院地图列表
		$url = C("PATH_URL")."/interface/yc_member/hos_map.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$hos_list =json_decode(post_json($url,$json),true); 
		$this->ajaxReturn($hos_list);
	}




	//图片上传
	public function uploadImg(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
	    $upload->savePath  =     'temp/'; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {
	        $this->error($upload->getError());
	    }else{
	    	$url = './Public/Uploads/'.$info[0]['savepath'].$info[0]['savename'];
	    	//$this->downfile($url);
	    	$this->viewfile("http://".$_SERVER['SERVER_NAME']."/weixin".trim($url,'.'));
	        //$this->success('上传成功！');
	    }
	}

	//上传页面
	public function imgUpload(){
		$this->getShareinfo();
		$this->display('htm/pics/crop');
		//$this->display();
	}

	//图片下载
	private function downfile($filename)
	{
		header('Content-disposition: attachment; filename='.basename($filename));
		header('Content-Length: '.filesize($filename));
		readfile($filename);
		exit();
	}
	//图片预览
	private function viewfile($filename){
		echo "<img src='{$filename}' width=100% >";
	}

	//分享参数
	private function getShareinfo(){
		//获取平台的access_token 
		$token = $this->token;
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

    	$share = array(
    		"appId" => $appId,
    		"timestamp" => $timestamp,
    		"signature" => $signature,
    		"NonceStr" => $NonceStr
		);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
	}

	//APP分享详情
	public function share()
	{
		$post_id = I('get.post_id','6505407');
		//获取平台的access_token
		$token = A_token();

		//获取详情
		$url = C("PATH_URL")."/interface/app_sale_card/yc_hmo_forum_detail.aspx?access_token=".$token;
		$data = array
		(
			"post_id"=>"$post_id"
		);
		$json=json_encode($data);
		$res =json_decode(post_json($url,$json),true); 
		if($res['error_code'] == 'ok')
		{
			$result = $res['data'][0];
			if($result['VI_PI_URL'])
			{
				$result['VI_PI_URL'] = rtrim($result['VI_PI_URL'],';');
				$arr = explode(";",$result['VI_PI_URL']);
				foreach ($arr as $k => $v) 
				{
					$str[$k]['pic'] = $v;
				}
			}
			$result['VI_PI_URL'] = $str;
			$this->assign('res',$result);
		}

		//获取列表
		$url = C("PATH_URL")."/interface/app_sale_card/yc_hmo_reply_list.aspx?access_token=".$token;
		$data = array
		(
			"page_num"=>"1",
			"post_id"=>"$post_id"
		);
		$json=json_encode($data);
		$reply_list=json_decode(post_json($url,$json),true);
		if($reply_list['error_code'] == 'ok')
		{
			$reply_result = $reply_list['data'];
			foreach ($reply_result as $key => $value) 
			{
				if($value['REPLY_ANNEX'])
				{
					$value['REPLY_ANNEX'] = rtrim($value['REPLY_ANNEX'],';');
					$arr = explode(";",$value['REPLY_ANNEX']);
					foreach ($arr as $k => $v) 
					{
						$reply_str[$k]['reply_pic'] = $v;

					}
				}
				
				$reply_result[$key]['REPLY_ANNEX'] = $reply_str;
			}
			$this->assign('reply_list',$reply_result);
		}
		$this->assign("post_id",$post_id);
		$this->display();
	}

	//APP分享详情
	public function share_append()
	{
		$post_id = I('get.post_id','6505407');
		$page_num = I('get.page_num','2');
		//获取平台的access_token
		$token = A_token();

		//获取列表
		$url = C("PATH_URL")."/interface/app_sale_card/yc_hmo_reply_list.aspx?access_token=".$token;
		$data = array
		(
			"page_num"=>"$page_num",
			"post_id"=>"$post_id"
		);
		$json=json_encode($data);
		$reply_list=json_decode(post_json($url,$json),true);
		if($reply_list['error_code'] == 'ok')
		{
			$reply_result = $reply_list['data'];
			foreach ($reply_result as $key => $value) 
			{
				if($value['REPLY_ANNEX'])
				{
					$value['REPLY_ANNEX'] = rtrim($value['REPLY_ANNEX'],';');
					$arr = explode(";",$value['REPLY_ANNEX']);
					foreach ($arr as $k => $v) 
					{
						$reply_str[$k]['reply_pic'] = $v;

					}
				}
				
				$reply_result[$key]['REPLY_ANNEX'] = $reply_str;
			}
			$this->assign('reply_list',$reply_result);
		}
		include COMMON_PATH.'/Common/load_more.php';
	}


	//为诚--药商帮手
	public function wcyy()
	{
		$this->display();
	}

	public function xn()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$link_mobile = I("get.link_mobile",'0');
		//推荐医生
		$url = C("PATH_URL")."/interface/yc_member/band_other.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"link_phone"=>$link_mobile,
			"token_id"=>C('M_TOKEN_ID')
		);
		$json = json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->display();
	}

	public function wxlogin()
	{
		$link_mobile = I("get.link_mobile",'0');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		if(!$openid || $openid==0 || $openid==1 ){
			redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=".C('M_APPID')."&redirect_uri=http%3a%2f%2fwx-heartorg.yk2020.com%2fweixin%2findex.php%3fm%3dMember%26c%3dIndex%26a%3dxn%26link_mobile%3d".$link_mobile."&response_type=code&scope=snsapi_base&state=1");
			die;
		}else{
			redirect("http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Index&a=xn&link_mobile=".$link_mobile);
		}

	}
}