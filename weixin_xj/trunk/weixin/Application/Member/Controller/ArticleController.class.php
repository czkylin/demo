<?php
namespace Member\Controller;
use Think\Controller;
class ArticleController extends Controller
{
	//活动详情页
	public function act_info()
	{
		$record_id = I('get.record_id', '');
		$type_id = I('get.type_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取省数据
		$url = C("PATH_URL")."/interface/yc_doc/union_province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$province_list = json_decode(post_json($url,$json),true);
		$this->assign('province_list',$province_list);// 赋值数据集

		//获取活动详情接口
		$url = C("PATH_URL")."/interface/yc_doc/union_act_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"record_id"=>"$record_id"
		);
		$json=json_encode($data);
		$act_info = json_decode(post_json($url,$json),true);
		$this->assign('act_info',$act_info);// 赋值数据
		$this->display(); // 输出模板	
	}

	//活动通知-列表
	public function act_list()
	{
		
		$type_id = I('get.type_id', C('TYPEZS_ID'));
		$province_id = I('get.province_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		if($openid == "0" || $openid == " " || $openid == "1")
		{
			
			$this->redirect('?m=Member&c=Follow&a=index');
		}

		//获取省数据
		$url = C("PATH_URL")."/interface/yc_doc/union_province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$province_list = json_decode(post_json($url,$json),true);
		$this->assign('province_list',$province_list);// 赋值数据集

		//列表接口
		$url = C("PATH_URL")."/interface/yc_doc/union_act.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id",
			"type_id"=>"$type_id",
			"sort_type"=>"",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$act_list = json_decode(post_json($url,$json),true);

		$this->assign('act_list',$act_list);// 赋值数据集
		$this->assign('province_id',$province_id);
		$this->assign('type_id',$type_id);
		$this->display(); // 输出模板	
	}

	//加载更多
	public function act_list_append()
	{
		$type_id = I('get.type_id', C('TYPEZS_ID'));
		$province_id = I('get.province_id', '');
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取联盟列表
		$url = C("PATH_URL")."/interface/yc_doc/union_act.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id",
			"type_id"=>"$type_id",
			"sort_type"=>"",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$act_list = json_decode(post_json($url,$json),true);

		$this->assign('act_list',$act_list);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
 }

 ?>
