<?php
namespace Member\Controller;
use Think\Controller;
class PcController extends Controller
{
	//评测页面
	public function add_info()
	{
		$eval_user_id = I('get.user_id', '');
		$real_name = I('get.real_name', '');
		$this->assign('eval_user_id',$eval_user_id);// 绑定赋值
		$this->assign('real_name',$real_name);// 绑定赋值
		$this->display(); // 输出模板
	}
	
	//信息提交页面
	public function add_ok()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$eval_user_id = I('post.eval_user_id', '');
		$eval_content = I('post.eval_content', '');
		$eval_score = I('post.eval_score', '');

		$urll = C("PATH_URL")."/interface/yc_member/pc_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"eval_user_id"=>"$eval_user_id",
			"eval_content"=>"$eval_content",
			"eval_score"=>"$eval_score"
		);

		$json = json_encode($data); 
		$con = json_decode(post_json($urll,$json),true);
		$result_id = $con["error_code"];
		if($result_id == "ok")
		{
			//跳转到成功页面
			$this->redirect("?m=Member&c=Pc&a=success");
		}
		else
		{
			$msg = "信息错误";
			if($con["error_code"] == "00030")
			{
				$msg = "您已经评测过此人，请勿重复提交";
			}
			//跳转到成功页面
			$this->redirect("?m=Member&c=Pc&a=error&msg=".$msg);
		}
	}

	public function success()
	{
		$this->display();
	}

	public function error()
	{
		$error_msg = I('get.msg', '');
		$this->assign('error_msg', $error_msg);
		$this->display();
	}

	//分享信息列表
	public function pc_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_member/pc_user_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json = json_encode($data);
		$pc_list = json_decode(post_json($url,$json),true);
		//print_r($pc_list);die;
		$this->assign('pc_list',$pc_list);// 绑定赋值
		$this->display(); // 输出模板
	}
	
	//分享列表加载更多
	public function pc_list_append()
	{
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_member/pc_user_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);

		$json=json_encode($data);
		$pc_list = json_decode(post_json($url,$json),true);
		$this->assign('pc_list',$pc_list);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
}