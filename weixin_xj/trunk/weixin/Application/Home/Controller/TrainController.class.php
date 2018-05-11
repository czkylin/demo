<?php
namespace Home\Controller;
use Think\Controller;
class TrainController extends Controller
{
	
	//培训首页
	public function index()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");

		//等级接口
		$url = $jiekou."/interface/yc_member/wk_level_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"type_flag"=>"2"
		);

		$json=json_encode($data);
		$wk_level_list =json_decode(post_json($url,$json),true);
		//print_r($wk_level_list);
		$this->assign("wk_level_list",$wk_level_list);

		//微课列表
		$url = $jiekou."/interface/yc_member/wk_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"level1_id"=>"",
			"level2_id"=>"",
			"level3_id"=>"",
			"type_flag"=>"2"
		);
		$json=json_encode($data);
		$wk_list =json_decode(post_json($url,$json),true);
		$num = count($wk_list);
		$this->assign('num',$num);
		//print_r(post_json($url,$json));die;
		$this->assign("wk_list",$wk_list); //微课列表

		$this->display(); // 输出模板
	}

		//培训首页
	public function index_list()
	{
		
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jiekou = C("PATH_URL");

		$level1_id = I('get.level1',''); //第一集
		$level2_id = I('get.level2',''); //第二集
		$level3_id = I('get.level3',''); //第三集

		if($level2_id == '0')
		{
			$level2_id = '';
		}
		if($level3_id == '0')
		{
			$level3_id = '';
		}
		//微课列表
		$url = $jiekou."/interface/yc_member/wk_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"level1_id"=>"$level1_id",
			"level2_id"=>"$level2_id",
			"level3_id"=>"$level3_id",
			"type_flag"=>"2"
		);
		$json=json_encode($data);
		$wk_list =json_decode(post_json($url,$json),true);
		$this->assign("wk_list",$wk_list); //微课列表
		$this->ajaxReturn($wk_list);
	}


	//微课列表加载更多
	public function index_append()
	{

	
		$level1_id = I('get.level1',''); //第一集
		$level2_id = I('get.level2',''); //第二集
		$level3_id = I('get.level3',''); //第三集

		if($level2_id == '0')
		{
			$level2_id = '';
		}
		if($level3_id == '0')
		{
			$level3_id = '';
		}
		$page_num = I('get.page_num', '2');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jiekou = C("PATH_URL");
		//微课列表
		$url = $jiekou."/interface/yc_member/wk_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"level1_id"=>"$level1_id",
			"level2_id"=>"$level2_id",
			"level3_id"=>"$level3_id",
			"type_flag"=>"2"
		);
		$json=json_encode($data);
		$wk_list =json_decode(post_json($url,$json),true);
		$this->assign("wk_list",$wk_list);
		 //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
	}
	//详情页面
	public function info()
	{
		
		$wk_id = I('get.wk_id','');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jiekou = C("PATH_URL");
		//部门列表详情
		$url = $jiekou."/interface/yc_member/wk_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"wk_id"=>"$wk_id"		
		);

		$json=json_encode($data);

		$wk_info =json_decode(post_json($url,$json),true);
		//print_r($wk_info);die;
		$this->assign("wk_info",$wk_info);

		
//图片接口
		$url = $jiekou."/interface/yc_member/wk_img_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"wk_id"=>"$wk_id"		
		);

		$json=json_encode($data);
		$wk_img_list =json_decode(post_json($url,$json),true);
		//print_r($wk_img_list);die;
		$this->assign("wk_img_list",$wk_img_list);
		
		//点赞数量 评论数量
		$url = $jiekou."/interface/yc_member/wk_count.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"wk_id"=>"$wk_id"		
		);

		$json=json_encode($data);
		$wk_count =json_decode(post_json($url,$json),true);		
//print_r($wk_count);die;
		$dz_num = $wk_count['DZ_NUM']; //点赞数量
		$reply_num = $wk_count['REPLY_NUM']; //评论数量

		$this->assign("dz_num",$dz_num);
		$this->assign("reply_num",$reply_num);

		$this->assign("wk_id",$wk_id); //微课Id

		//评论列表
		$url = $jiekou."/interface/yc_member/wk_reply_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"wk_id"=>"$wk_id",
			"type_flag"=>"2"
		);
		$json=json_encode($data);
		$wk_reply_list =json_decode(post_json($url,$json),true);
		//print_r($wk_reply_list);die;
		//echo count($wk_reply_list);die;
		$this->assign("wk_reply_list",$wk_reply_list);


		//参与本科学习的头像列表
		$url = $jiekou."/interface/yc_member/wk_member_cy_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"wk_id"=>"$wk_id",
			"type_flag"=>"2"		
		);

		$json=json_encode($data);
	
		$wk_cylist =json_decode(post_json($url,$json),true);
		$this->assign("wk_cylist",$wk_cylist);


		//微课总数列表
		$url = $jiekou."/interface/yc_member/wk_member_cy_total.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"wk_id"=>"$wk_id",
			"type_flag"=>"2"		
		);

		$json=json_encode($data);

		$wk_cytotal =json_decode(post_json($url,$json),true);
		//print_r($wk_cytotal);die;
		$wk_total = $wk_cytotal[0]['MEMBER_NUM'];
		$this->assign("wk_total",$wk_total);

		$this->assign('wk_id',$wk_id); //微课id

		$this->display(); // 输出模板
	}

	//评论列表加载更多
	public function reply_append()
	{

		$wk_id = I('get.wk_id','');

		$page_num = I('get.page_num', '2');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jiekou = C("PATH_URL");
		//评论列表
		$url = $jiekou."/interface/yc_member/wk_reply_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"wk_id"=>"$wk_id",
			"type_flag"=>"2"
		);
		$json=json_encode($data);
		//print_r($data);die;
		$wk_reply_list =json_decode(post_json($url,$json),true);
		$this->assign("wk_reply_list",$wk_reply_list);
		 //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
	}

	//评论提交页面
	public function reply_add()
	{

		$reply_content = I('post.reply_content','');
		$wk_id = I('post.wk_id','');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jiekou = C("PATH_URL");

		//微课增加评论 
		$url = $jiekou."/interface/yc_member/wk_reply_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"wk_id"=>"$wk_id",
			"reply_content"=>"$reply_content",
			"enable_flag"=>"1",
			"type_flag"=>"2"
		);

		$json=json_encode($data);
		$wk_reply_add =json_decode(post_json($url,$json),true);
		if($wk_reply_add['error_code']="ok")
		{
			$this->redirect('?m=Home&c=Train&a=info&wk_id='.$wk_id);
		}else
		{
			$this->redirect("?m=Home&c=Train$a=info");
		}
	}

	//内容详情查看更多
	public function about()
	{
		$wk_id = I('get.wk_id','');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jiekou = C("PATH_URL");

		//部门列表详情
		$url = $jiekou."/interface/yc_member/wk_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"wk_id"=>"$wk_id"		
		);

		$json=json_encode($data);

		$wk_info =json_decode(post_json($url,$json),true);
		$this->assign("wk_info",$wk_info);
		//print_r($wk_info);die;
		$this->display();
	}


	//点赞功能
	public function dz_add()
	{
		$wk_id = I('get.wk_id', '');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jiekou = C("PATH_URL");
		//点赞是否成功
		$url = $jiekou."/interface/yc_member/wk_dz_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"wk_id"=>"$wk_id",
			"type_flag"=>"2"		
		);

		$json=json_encode($data);
		$data = post_json($url,$json);
		$str = json_encode($data);
		echo $str;
	}
}
