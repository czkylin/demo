<?php
namespace Member\Controller;
use Think\Controller;
class DocController extends Controller
{
	//咨询首页
	public function doc_index()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_member/expert_tj_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"yw_id"=>C("YW_ID")
		);
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		//print_r($data);die;
		$this->assign("data",$data);
		$this->display();
	}

	//医生列表
	public function doc_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取坐标
		include COMMON_PATH.'/Common/lat_lng.php';

		if($openid == "0" || $openid == " " || $openid == "1")
		{
			
			$this->redirect('?m=Member&c=Follow&a=index');
		}

		//获取区域
		$url = C("PATH_URL")."/interface/yc_member/province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);
		$json=json_encode($data);
		$PROVINCE =json_decode(post_json($url,$json),true);

		//获取医生列表
		$province_id  = I('get.province_id ','');
		$free_flag = I('get.free_flag', '');//是否付费 空显示所有 ，0所有免费 ，1付费
		$expert_name = I('get.expert_name', '');
		$ill_id = I('get.ill_id', '');
		$leader_flag = I('get.leader_flag','');

		$url = C("PATH_URL")."/interface/yc_member/expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ill_id"=>"$ill_id",
			"province_id"=>"$province_id",
			"lat"=>"$lat",
			"lng"=>"$lng",
			"free_flag"=>"$free_flag",
			"page_num" => "1",
			"expert_name"=>"$expert_name",
			"serve_id"=>"21",
			"leader_flag"=>"$leader_flag"
		);		
		$json=json_encode($data);
		$doc_list =json_decode(post_json($url,$json),true);
		$count = count($doc_list);
		$this->assign("province_id ",$province_id );
		$this->assign('doc_list',$doc_list);// 医生列表
		$this->assign('PROVINCE',$PROVINCE);// 疾病列表
		$this->assign('free_flag',$free_flag);
		$this->assign('count',$count);
		$this->display(); // 输出模板
	}

	//医生列表加载更多
	public function doc_list_append()
	{
		
		$lat = $_SESSION['lat'];
		$lng = $_SESSION['lng'];
		$page_num = I('get.page_num',"1");
		$province_id  = I('get.province_id','');
		$free_flag = I('get.free_flag', '');
		$expert_name=I('get.expert_name', '');
		$ill_id = I('get.ill_id', '');
		$leader_flag = I('get.leader_flag', '');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_member/expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ill_id"=>"$ill_id",
			"province_id"=>"$province_id",
			"lat"=>"$lat",
			"lng"=>"$lng",
			"free_flag"=>"$free_flag",
			"page_num" => "$page_num",
			"expert_name"=>"$expert_name",
			"serve_id"=>"21",
			"leader_flag"=>"$leader_flag"
		);
		$json=json_encode($data);
		$doc_list = json_decode(post_json($url,$json),true);

		$this->assign('doc_list',$doc_list);
		$this->assign('free_flag',$free_flag);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//医生详情
	public function doc_detail()
	{
		$doc_id = I('get.doc_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//医生详情
		$url = C("PATH_URL")."/interface/yc_member/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id"
		);
		$json=json_encode($data); 
		$doc_detail =json_decode(post_json($url,$json),true);;
		$hp = sprintf("%.2f", $doc_detail['HP_NUM']/$doc_detail['PJ_NUM']*100);
		if($hp == '0.00')
		{
			$hp = '100';
		}
		$doc_detail['EXPERT_DESC'] = str_replace("\n","<br>",$doc_detail['EXPERT_DESC']);

		$this->assign("hp",$hp);
		$this->assign("doc_detail",$doc_detail);

		//咨询列表
		$url = C("PATH_URL")."/interface/yc_member/consult_pj_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id",
			"page_num"=>"1",
		);
		$json=json_encode($data);
		$doc_consult =json_decode(post_json($url,$json),true); 
		$this->assign("doc_consult",$doc_consult);

		//购买参数转码加密
		$data = array
		(
			"price"=>$doc_detail[EXPERT_SERVES][0][SERVE_MONEY],
			"yx_date"=>$doc_detail[EXPERT_SERVES][0][YX_DATE],
			"doc_id"=>$doc_id
		);
		$json= json_encode($data);
		$json= urlencode(passport_encrypt($json, "123"));
		$this->assign("json",$json);

		//医生详情
		$url = C("PATH_URL")."/interface/yc_member/point_num_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id"
		);

		$json=json_encode($data);
		$num = json_decode(post_json($url,$json),true);
		$this->display();
	}
	
	//医生简介
	public function doc_desc()
	{
		$doc_id = I('get.doc_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_member/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id"
		);
		$json=json_encode($data);
		$data =post_json($url,$json);
		$doc_intro =json_decode($data,true);

		$doc['EXPERT_SKILL'] = $doc_intro['EXPERT_SKILL'];
		$doc['EXPERT_SEX'] = $doc_intro['EXPERT_SEX'];
		$doc['EXPERT_NAME'] = $doc_intro['EXPERT_NAME'];
		$doc['SMALL_PIC'] = $doc_intro['SMALL_PIC'];
		$doc['ZX_COUNT'] = $doc_intro['ZX_COUNT'];
		$doc['DEP_NAME'] = $doc_intro['DEP_NAME'];
		$doc['HOS_NAME'] = $doc_intro['HOS_NAME'];
		$doc['EXPERT_ID'] = $doc_intro['EXPERT_ID'];
		$doc['EXPERT_DESC'] = $doc_intro['EXPERT_DESC'];
		$this->assign("doc",$doc);
		$this->display();
	}

	//获取gps
	public function get_gps()
	{
		$url_str = "m=Member&c=Doc&a=doc_list";
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

	//医生咨询
	public function doc_consult()
	{
		$doc_id = I('get.doc_id', '');
		$fz_flag = I('get.fz_flag', '1');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//咨询列表
		$url = C("PATH_URL")."/interface/yc_member/expert_consult_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id",
			"page_num" => "1"
		);
		$json=json_encode($data);
		$doc_consult =json_decode(post_json($url,$json),true);
		// var_dump($doc_consult);
		$this->assign("doc_consult",$doc_consult);

		//医生详情
		$url = C("PATH_URL")."/interface/yc_member/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id",
		);
		$json=json_encode($data);
		$doc_detail =json_decode(post_json($url,$json),true);
		// var_dump($doc_detail);
		$hp = sprintf("%.2f", $doc_detail['HP_NUM']/$doc_detail['PJ_NUM']*100);
		$this->assign("hp",$hp);
		$this->assign("doc_detail",$doc_detail);
		$this->assign("doc_id",$doc_id);

		//购买参数转码加密
		$data = array
		(
			"price"=>$doc_detail[EXPERT_SERVES][0][SERVE_MONEY],
			"yx_date"=>$doc_detail[EXPERT_SERVES][0][YX_DATE],
			"doc_id"=>$doc_id,
			"fz_flag"=>$fz_flag
		);
		$json= json_encode($data);
		$json= urlencode(passport_encrypt($json, "123"));
		//模板赋值
		$this->assign("json",$json);

		//增肌浏览量
		$url = C("PATH_URL")."/interface/yc_member/point_num_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id"
		);
		$json=json_encode($data); 
		$point_num_add =json_decode(post_json($url,$json),true);

		$this->display(); 
	}


	//咨询列表
	public function doc_consult_list()
	{
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//print_r($_POST);die;	
		$doc_id = I('get.doc_id', '0');
		//咨询列表
		$url = C("PATH_URL")."/interface/yc_member/expert_consult_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id",
			"page_num" => "1"
		);
		$json=json_encode($data);
		$doc_consult =json_decode(post_json($url,$json),true);
		$this->assign("doc_consult",$doc_consult);
		$this->assign("doc_id",$doc_id);
		$this->display();
	}


	//评价列表加载更多
	public function doc_consult_list_append()
	{	
		$doc_id = I('get.doc_id', '0');
		$page_num = I('get.page_num', '2');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$url = C("PATH_URL")."/interface/yc_member/expert_consult_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$doc_id",
			"page_num"=>"$page_num",
		);
		$json=json_encode($data);
		$doc_consult =json_decode(post_json($url,$json),true);
		// var_dump($doc_consult);
		$this->assign("doc_consult",$doc_consult);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


	//评论列表
	public function doc_comment()
	{
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//print_r($_POST);die;	
		$expert_id = I('get.doc_id', '0');
		$url = C("PATH_URL")."/interface/yc_member/consult_pj_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$expert_id",
			"page_num"=>"1",
		);
		 $json=json_encode($data);
		 $data =json_decode(post_json($url,$json),true); 
		 $this->assign("data",$data);
		 $this->assign('expert_id',$expert_id);
		 $this->display();
	}

	//评价列表加载更多
	public function doc_comment_append()
	{	
		$expert_id = I('get.expert_id', '0');
		$page_num = I('get.page_num', '2');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$url = C("PATH_URL")."/interface/yc_member/consult_pj_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$expert_id",
			"page_num"=>"$page_num",
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign('data',$data);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
}