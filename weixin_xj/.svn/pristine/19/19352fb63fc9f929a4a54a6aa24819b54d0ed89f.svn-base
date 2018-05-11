<?php
namespace Home\Controller;
use Think\Controller;
class BaibeiController extends Controller 
{
	
    public function rank_list()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		
		//百倍爱心卡排行
        $url=C("PATH_URL")."/interface/yc_hos/jyzr_sale_pm_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num" =>"1",
            "my_flag" =>"0"
        );
        $json=json_encode($data);
        $rank_list = json_decode(post_json($url,$json),true);

        //自己排名
        $url = C("PATH_URL")."/interface/yc_hos/my_sale_pm_list.aspx";
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $selfrank  = json_decode(post_json($url,$json),true);
        // var_dump($url,$json,post_json($url,$json));
		$this->assign('list',$rank_list);
		$this->assign('rank_list',$selfrank[0]);
		$this->display();
    }

    public function rank_list_append()
    {
    	$page_num = I('get.page_num','');

        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		

		$url=C("PATH_URL")."/interface/yc_hos/jyzr_sale_pm_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num" =>"$page_num",
            "my_flag" =>"0"
        );
        $json=json_encode($data);
        $rank_list = json_decode(post_json($url,$json),true);

		$this->assign('list',$rank_list);
		include COMMON_PATH.'/Common/load_more.php';
    }

    public function fx()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取三级分销信息
		$url = C("PATH_URL")."/interface/yc_hos/three_sale_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$three_list['list'] = json_decode(post_json($url,$json),true);
		$three_list['count'] = count($three_list['list']);
		// var_dump($three_list);

		//获取二级分销信息
		$url = C("PATH_URL")."/interface/yc_hos/two_sale_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$two_list = json_decode(post_json($url,$json),true);
		$two_list['list'] = json_decode(post_json($url,$json),true);
		$two_list['count'] = count($two_list['list']);
		// var_dump($two_list);

		$this->assign("three_list",$three_list);
		$this->assign("two_list",$two_list);
		$this->display();
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
		$url = C("PATH_URL")."/interface/yc_hos/my_three_sale_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"m_token_id"=>C('M_TOKEN_ID'),
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$daiyan_list = json_decode(post_json($url,$json),true);
		//var_dump($daiyan_list);

		$this->assign("daiyan_list",$daiyan_list);
		$this->display();
    }

	//修改卡号
	public function update_card()
	{
		
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$card_number = I("post.card_number",0);
		$buy_id = I("post.buy_id",0);

		//微课列表
		$url = C("PATH_URL")."/interface/yc_hos/hz_card_update.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"buy_id"=>"$buy_id"
		);
		$json=json_encode($data);
		$res =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($res);
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
		$url = C("PATH_URL")."/interface/yc_hos/my_three_sale_list.aspx?access_token=".$token;
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

	//商城
	public function shop()
	{
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$url = U("Member/Car/shoping");

		//分享朋友圈及个人信息
		$share = $this->share($openid);

		$link_mobile = I("get.link_mobile");
		$user_info = array();
		if($link_mobile == '0' || !$link_mobile)
		{
			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
			$user_info = $share['user_info'];

		}
		else
		{
			$user_info['link_mobile'] = I("get.link_mobile",'999');
			$user_info['user_id'] = I("get.user_id",'0');
			$user_info['user_name'] = I("get.user_name");
		}

		$url .= "&user_id=".$user_info['user_id']."&link_mobile=".$user_info['link_mobile']."&user_name=".$user_info['user_name'];
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

	
		//分享朋友圈及个人信息
		$share = $this->share($openid);


		$link_mobile = I("get.link_mobile");
		$user_info = array();
		if($link_mobile == '0' || !$link_mobile)
		{
			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';

			$user_info = $share['user_info'];

		}
		else
		{
			$user_info['link_mobile'] = I("get.link_mobile",'999');
			$user_info['user_id'] = I("get.user_id",'0');
			$user_info['user_name'] = I("get.user_name");
		}
		
		$this->assign('user_info',$user_info);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        $this->assign("openid",$openid);
		$this->display(); // 输出模板

	}
//爱脑卡
	public function ka_list2()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","运营栏目菜单代言人");
        $this->assign("path",$path);
		$this->display();
    }

    public function ka_list()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","运营栏目菜单代言人");
        $this->assign("path",$path);
		$this->display();
    }

    public function ka_list_1880()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","运营栏目菜单代言人");
        $this->assign("path",$path);
		$this->display();
    }


    public function ka_list_baibei()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","代言人爱心卡");
        $this->assign("path",$path);
		$this->display();
    }

    public function ka_list_main()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","代言人main");
        $this->assign("path",$path);
		$this->display();
    }

     public function ka_list_1280()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","代言人1280");
        $this->assign("path",$path);
		$this->display();
    }

    public function ka_list_498()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","代言人498");
        $this->assign("path",$path);
		$this->display();
    }

    public function ka_list_880()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","代言人880");
        $this->assign("path",$path);
		$this->display();
    }

    public function bb_list()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        $this->assign("openid",$openid);
		$this->display();
    }

    public function bb_detail()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);


        $path = I("get.path","点别人分享~");

        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }


    public function bb_detail_07()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
       

        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }

    public function bb_detail_08()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);


         $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }

    public function share($openid){

    	$appId=C('H_APPID');
		$secret=C('H_SECRET');


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

    	//获取分享需用手机号
		$url = C("PATH_URL")."/interface/yc_hos/get_sale_info.aspx?access_token=".$token;
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


    	$return = array(
    		"appId" => $appId,
    		"timestamp" => $timestamp,
    		"signature" => $signature,
    		"NonceStr" => $NonceStr,
    		"user_info" => $user_info
		);
		return $return;
    }
	
	
	public function bb_detail_09()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);
		$this->display();
    }
	
	public function bb_detail_11()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_13()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);
		$this->display();
    }
	public function bb_detail_14()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);
		$this->display();
    }
	public function bb_detail_15()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_16()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_19()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
public function bb_detail_20()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);
		$this->display();
    }
	public function bb_detail_21()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_22()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_25()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);
		$this->display();
    }
	public function bb_detail_26()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_27()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_28()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_29()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_30()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_31()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);
		$this->display();
    }
	public function bb_detail_102()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_105()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_106()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }public function bb_detail_109()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_217()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_227()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }
	public function bb_detail_314()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);

        
        
        $path = I("get.path","点别人分享~");
        
        $this->assign("path",$path);

        $this->assign("openid",$openid);

		$this->display();
    }

    //1280新
     public function share_1280_new()
    {
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//分享朋友圈及个人信息
		$share = $this->share($openid);
		$this->assign('user_info',$share['user_info']);
		$this->assign("signature",$share['signature']);
		$this->assign("NonceStr",$share['NonceStr']);
		$this->assign("timestamp",$share['timestamp']);
		$this->assign("appId",$share['appId']);
        $this->assign("openid",$openid);

		$path = I("get.path","代言人1280新");
        $this->assign("path",$path);
		$this->display();
    }
}