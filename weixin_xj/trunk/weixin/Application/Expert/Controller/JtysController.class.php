<?php
namespace Expert\Controller;
use Think\Controller;
class JtysController extends Controller
{
	//获取医生的患者列表
	public function member_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/home_member_list.aspx?access_token=".$token;
		$data = array
		(
			"openid" => "$openid",
			"page_num" => "1",
		);
		$json=json_encode($data);
		$member_list = json_decode(post_json($url,$json),true);
		$this->assign('member_list',$member_list);// 赋值数据集
		$this->assign('empty',"暂无数据");
		$this->assign('count',$count);// 赋值数据集
		$this->display(); // 输出模板
	}

	//订单列表加载更多
	public function member_list_append()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/home_expert_list.aspx?access_token=".$token;
		$page_num = I('get.page_num', '2');
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
		);
		$json=json_encode($data);
		$member_list = json_decode(post_json($url,$json),true);

		$this->assign('member_list',$member_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//获取咨询列表
	public function consult_list()
	{
		$member_id  = I('get.member_id','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/home_consult_list.aspx?access_token=".$token;
		$data = array
		(
			"openid" => "$openid",
			"page_num" => "1",
			"member_id"=>"$member_id"
		);
		$json=json_encode($data);
		$consult_list = json_decode(post_json($url,$json),true);

		$this->assign('consult_list',$consult_list);// 赋值数据集
		$count = count($consult_list);//显示数量
		$this->assign('empty',"暂无数据");
		$this->assign('count',$count);// 赋值数据集
		$this->assign('member_id',$member_id);// 赋值数据集
		$this->display(); // 输出模板
	}

	//订单列表加载更多
	public function consult_list_append()
	{
		//获取平台的access_token
		$token = A_token();

		$member_id  = I('get.member_id','');

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/home_consult_list.aspx?access_token=".$token;
		$page_num = I('get.page_num', '2');
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"member_id"=>"$member_id"
		);
		$json=json_encode($data);
		//print_r($json);die;
		$consult_list = json_decode(post_json($url,$json),true);
		$this->assign('consult_list',$consult_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
//医生诊后随访页面
	public function consult_pay()
	{
		$consult_error = I('get.consult_error', '');

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$member_id  = I('get.member_id','');
		$this->assign('member_id',$member_id);// 赋值数据集
		$this->assign('consult_error',$consult_error);
		$this->display(); 
		
	}

	//问题提交页面
	public function consult_add()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取openid
		include MODULE_PATH.'/Common/check_band.php';

		$lat = I('post.lat', '0');
		$lng = I('post.lng', '0');
		$consultContent = I('post.consultContent', '');
		$member_id = I('post.member_id', '0');
		$order_id = I('post.order_id','1');

		$time = date("Y-m-d H:i:s",time());

		$urll = C("PATH_URL")."/interface/yc_doc/consult_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_content"=>"$consultContent",
			"member_id"=>"$member_id",
			"create_date"=>"$time",
			"consult_img"=>"",
			"order_id"=>"0",
			"lat"=>"$lat",
			"lng"=>"$lng"
		);
		$json = json_encode($data); 
		$con = json_decode(post_json($urll,$json),true);

		$consult_id = $con["consult_id"];

		if($consult_id != "")
		{
			//跳转到咨询对话页面
			$this->redirect("?m=Expert&c=Jtys&a=consult_details&consult_id=$consult_id&expert_id=$expert_id");
		}
		else
		{
			$consult_error = $con["error_code"];
			$this->redirect("?m=Expert&c=Jtys&a=consult_pay&consult_error=".$consult_error); 
		}
	}
	
	//咨询对话详情
	public function consult_details()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$consult_id = I('get.consult_id',0);
		$member_id = I('get.member_id',0);

		//测试环信用 start
		$turl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		$turl = str_replace("consult_details","consult_details_bak",$turl);
		redirect($turl);die;
		// if(is_ceshi($openid)){
		// 	redirect($turl);
		// }
		//测试环信用 stop

		
		
		//咨询内容列表
		// $url = "http://192.168.100.228:8080/interface/yc_doc/consult_jtys_info.aspx?access_token=".$token;
		$url = C("PATH_URL")."/interface/yc_doc/consult_info.aspx?access_token=".$token;
		// $url = C("PATH_URL")."/interface/yc_doc/consult_jtys_info.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"member_id"=>"$member_id"
		);
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		$this->assign("data",$data);
		$this->assign("consult_id",$consult_id);
		$this->assign("member_id",$member_id);

			//医生是否绑定药店
		$url =C("PATH_URL")."interface/yc_doc/doc_to_yd.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);

		$json=json_encode($data);
		$doc_to_yd_status = json_decode(post_json($url,$json),true);

		$doc_to_yd = $doc_to_yd_status['error_code'];
		$this->assign('doc_to_yd',$doc_to_yd); //医生是否绑定药店
		

		$this->display(); 
	}

	//咨询对话详情
	public function consult_details_bak()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$consult_id = I('get.consult_id',0);
		$member_id = I('get.member_id',0);
		
		//咨询内容列表
		// $url = "http://192.168.100.228:8080/interface/app_expert/consult_info_wz.aspx?access_token=".$token;
		$url = C("PATH_URL")."/interface/yc_doc/consult_info.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"member_id"=>"$member_id"
		);
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$data);
		$this->assign("data",$data);
		$this->assign("consult_id",$consult_id);
		$this->assign("member_id",$member_id);

			//医生是否绑定药店
		$url =C("PATH_URL")."interface/yc_doc/doc_to_yd.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);

		$json=json_encode($data);
		$doc_to_yd_status = json_decode(post_json($url,$json),true);

		$doc_to_yd = $doc_to_yd_status['error_code'];
		$this->assign('doc_to_yd',$doc_to_yd); //医生是否绑定药店


		//获取医生详细信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);	
		$json = json_encode($data);
		$expert_info = json_decode(post_json($url,$json),true);
		// var_dump($expert_info);

        if($expert_info['EXPERT_SEX'] == '未填写' && $expert_info['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png'){
        	$expert_info['SMALL_PIC'] =  "/weixin/Public/Expert/images/yonghu/girl.png";
        }else if($expert_info['EXPERT_SEX'] == '男' && $expert_info['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png'){
        	$expert_info['SMALL_PIC'] =  "/weixin/Public/Expert/images/yonghu/boy.png";
        }else if($expert_info['EXPERT_SEX'] == '女' && $expert_info['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png'){
        	$expert_info['SMALL_PIC'] =  "/weixin/Public/Expert/images/yonghu/girl.png";
        }else if(empty($expert_info)){
        	$expert_info['SMALL_PIC'] =  "/weixin/Public/Expert/images/yonghu/girl.png";
        }
		$this->assign('expert_info',$expert_info); //医生是否绑定药店
		$this->display(); 
	}

	//咨询对话列表
	public function consult_details_list()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$consult_id = I('post.consult_id',0);
		$member_id = I('post.member_id',0);
		
		//咨询内容列表
		$url = C("PATH_URL")."/interface/yc_doc/consult_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"member_id"=>"$member_id"
		);
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($data);

	}


	//咨询回复
	public function consult_response()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$consult_id=I('post.consult_id',0);
		$member_id=I('post.member_id',0);
		$reply_content=urlencode(I('post.consultContent'));
		$create_date=date('Y-m-d H:i:s',time());
		$imgbase64 = I('post.imgbase64');//获取base64图片字符串 

		if($reply_content==""&&$imgbase64=="")
		{
			die("不能提交空数据！");
		}
		if(empty($imgbase64))
		{
			$pic_path = "";
		}
		else if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
		{
			//匹配出图片的格式
			$type = $result[2]; //图片类型
			$type = str_replace("jpeg","jpg", $type);
			$new_file = "./Public/Uploads/zixun/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
			if (is_dir(dirname($new_file)) == false)
			{
				mkdir(dirname($new_file), 0777, true);
			}
			$base64 = base64_decode(str_replace($result[1],"",$imgbase64));//去除头部无用信息
			if (file_put_contents($new_file, $base64))
			{
				//处理图片
				$image = new \Think\Image();
				$image->open($new_file);
				// 按照原图的比例生成一个最大为1000*1000的缩略图并保存
				$image->thumb(200, 200)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}
		$url = C("PATH_URL")."/interface/yc_doc/consult_reply_info_add.aspx?access_token=".$token;
		// $url = C("PATH_URL")."/interface/yc_doc/consult_jtys_reply_info_add.aspx?access_token=".$token;
		// $url = "http://192.168.100.228:8080/interface/yc_doc/consult_jtys_reply_info_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"token_id"=>C('M_TOKEN_ID'),
			"consult_id"=>"$consult_id",
			"member_id"=>"$member_id",
			"reply_content"=>"$reply_content",
			"create_date"=>"$create_date",
			"reply_img"=>"$pic_path"
		);
		
		$json=urldecode(json_encode($data));
		$data = post_json($url,$json);
		$data = json_decode($data,true);

        $this->redirect("?m=Expert&c=Jtys&a=consult_details&consult_id=".$consult_id."&member_id=".$member_id);

	}

	//推送模板消息
	public function ts()
	{
		$consult_id = I('post.consult_id',0);
		$reply_content = I('post.reply_content','');
		$member_id = I('post.member_id',0);
		$reply_img = I('post.reply_img','');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//推送模板消息
		$url = C("PATH_URL")."/interface/yc_doc/consult_reply_info_ts.aspx?access_token=".$token;
		$data = array
		(
			"openid" => "$openid",
			"consult_id" => "$consult_id",
			"member_id"=>"$member_id",
			"token_id"=>C('M_TOKEN_ID'),
			"reply_content"=>"$reply_content",
			"reply_img"=>"$reply_img",
		);
		$json=json_encode($data);
		$status = json_decode(post_json($url,$json),true);
		$this->ajaxReturn($status['error_code']);
	}
	//记录聊天数据100条
	public function keepmsg(){
		$fromid = I("fromid",'1');
		$toid = I("toid",'1');
		$msg = I('msg','哈哈哈');
		$msg = explode('**',trim($msg,'**'));
		$msg = serialize($msg);

		$filename = DATA_PATH.$fromid.'-'.$toid.'.txt';
		file_put_contents($filename,$msg.'~~',FILE_APPEND);
		//保持100条
		$con = file_get_contents($filename);
		$arr = explode('~~',$con);
		if(count($arr)>20){
			unset($arr[0]);
		}
		$con = implode('~~', $arr);
		file_put_contents($filename,$con);
	}
	//读取聊天记录
	public function readmsg(){
		$fromid = I("fromid",'30077599_2');
		$toid = I("toid",'759481_2');
		$filename = DATA_PATH.$fromid.'-'.$toid.'.txt';
		$con = file_get_contents($filename);
		$arr = explode('~~',trim($con,'~~'));
		foreach ($arr as $v) {
			$arr1[] = unserialize($v);
		}
		$this->ajaxReturn($arr1);
	}
}