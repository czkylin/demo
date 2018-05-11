<?php
namespace Expert\Controller;
use Think\Controller;
class UnionController extends Controller
{
	//亚太联盟-各省联盟列表
	public function union_list()
	{
		//获取get传参
		//$level_id = I('get.level_id', '');
		$province_id = I('get.province_id', '');
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

		
		//获取联盟列表
		$url = C("PATH_URL")."/interface/yc_doc/union_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$union_list = json_decode(post_json($url,$json),true);
		$this->assign('union_list',$union_list);// 赋值数据集
		$this->assign('province_id',$province_id);
		$this->display(); // 输出模板
	}
	
	//联盟列表加载更多
	public function union_list_append()
	{
		$province_id = I('get.province_id', '');
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取联盟列表
		$url = C("PATH_URL")."/interface/yc_doc/union_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$union_list = json_decode(post_json($url,$json),true);

		$this->assign('union_list',$union_list);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//联盟详情页
	public function union_info()
	{
		$union_id = I('get.union_id', '');

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

		//获取联盟详情接口
		$url = C("PATH_URL")."/interface/yc_doc/union_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"union_id"=>"$union_id"
		);
		$json=json_encode($data);
		$union_info = json_decode(post_json($url,$json),true);

		$this->assign('union_info',$union_info);// 赋值数据集
		//输出模板
		$this->display();
	}

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
		$this->assign('act_info',$act_info);// 赋值数据集
		switch ($type_id)
		{
			case 1:
			  $template_html="act_info";//省联盟活动详情
			  break;
			case 4:
			  $template_html="hdyg_info";//省联盟活动详情
			  break; 

	          case 5:
	          $template_html="blzs_info";//省联盟活动详情
	          break; 
			default:
			  $template_html="all_info";//通用详情
		}
		$this->display($template_html); // 输出模板
	}

	//通用活动-列表
	public function act_list()
	{
		
		$type_id = I('get.type_id', C('BLTL_ID'));
		$province_id = I('get.province_id', '');

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
		switch ($type_id)
		{
			case C('BLTL_ID'):
			   $template_html="blzs_list";//病例展示
			   $list_title="病例展示";
			  break; 
			case C('LMFC_ID'):
			  $template_html="act_list";//联盟风采1
			  $list_title="联盟风采";
			  break;
			case C('LMFC_ID'):
			  $template_html="pwc_list";//学术动态2 
			  $list_title="学术动态";
			  break;
			case C('GYCS_ID'):
			  	$template_html="pwc_list";//公益慈善3 
			  	$list_title="公益慈善";
			  	break;
			default:
			 	$template_html="pwc_list";//其他详情3
				$list_title="活动列表";
		
		}
		$this->assign('list_title',$list_title);
		$this->display($template_html); // 输出模板	
	}

	//活动通知-列表
	public function hdyg_list()
	{
		
		$type_id = I('get.type_id', C('HDTZ_ID'));
		$province_id = I('get.province_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获详情接口
		$url = C("PATH_URL")."/interface/yc_doc/union_act_hdtz.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id",
			"type_id"=>"$type_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$hdyg_act_list = json_decode(post_json($url,$json),true);
		$this->assign('hdyg_act_list',$hdyg_act_list);// 赋值数据集

		//获详情接口
		$url = C("PATH_URL")."/interface/yc_doc/union_act_wqhg.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id",
			"type_id"=>"$type_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$act_list = json_decode(post_json($url,$json),true);

		$this->assign('act_list',$act_list);// 赋值数据集
		$this->display(); // 输出模板		
	}

//联盟活动通知-加载更多
	public function hdyg_list_append()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$page_num = I('get.page_num', '2');

		//获详情接口
		$url = C("PATH_URL")."/interface/yc_doc/union_act_wqhg.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id",
			"type_id"=>C('HDTZ_ID'),
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$act_list = json_decode(post_json($url,$json),true);

		$this->assign('act_list',$act_list);// 赋值数据集
		$template_html="hdyg_list_append";//活动通知4（栏目稍后修改）
		
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

//活动通知-列表
	public function hdtz_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$type_id = I('get.type_id', C('HDTZ_ID'));
		$province_id = I('get.province_id', '');

		//获详情接口
		$url = C("PATH_URL")."/interface/yc_doc/union_act_hdtz.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id",
			"type_id"=>"$type_id",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$hdyg_act_list = json_decode(post_json($url,$json),true);
		$this->assign('hdyg_act_list',$hdyg_act_list);// 赋值数据集
		$this->display(); // 输出模板		
	}

//联盟活动通知-加载更多
	public function hdtz_list_append()
	{
		
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获详情接口
		$url = C("PATH_URL")."/interface/yc_doc/union_act_hdtz.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id",
			"type_id"=>C('HDTZ_ID'),
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$act_list = json_decode(post_json($url,$json),true);

		$this->assign('act_list',$act_list);// 赋值数据集
		$template_html="hdtz_list_append";//活动通知4（栏目稍后修改）
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
	
	//联盟活动通知-加载更多
	public function act_list_append()
	{
		$type_id = I('get.type_id', C('BLTL_ID'));
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
		switch ($type_id)
		{
			case 1:
			  $template_html="act_list_append";//联盟风采1
			  break;
			case 2:
			  $template_html="pwc_list_append";//学术动态2 
			  break;
			case 3:
			  $template_html="pwc_list_append";//公益慈善3
			  break;
	          case 5:
	          $template_html="blzs_list_append";//联盟风采1
	          break;
			default:
			 $template_html="pwc_list_append";//其他详情3   
		}
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//联盟之家
	public function about()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			'ill_id'=>'',
			"page_num"=>"1",
			"sortflag" =>"qz",
			"leader_flag" => "1",
			"tj_flag"=>"1",
			"page_rows"=>"100"
		);
		$json=json_encode($data);
		$doc_list =json_decode(post_json($url,$json),true);

		$this->assign("doc_list",$doc_list);
		$this->display();
	}
	public function dow_table()
	{
		$this->display();
	}

	//获取gps
	public function get_gps()
	{
		$url_str = "m=Expert&c=Doc&a=doc_list";
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}
}