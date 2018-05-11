<?php
namespace Member\Controller;
use Think\Controller;
class OperationController extends Controller
{
	public function operation_index()
	{
		//获取平台的token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//判断是否是从手机浏览器进入
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MicroMessenger"))
		{
			$from_flag = "1";
		}
		else
		{
			$from_flag = "0";
		}

		//获取默认的用户信息
		$data = array
		(
			"openid"=>"$openid"
		);
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$json=json_encode($data);
		$user_date =json_decode(post_json($url,$json),true);

		$member_name = $user_date['MEMBER_NAME'];
		$member_mobile = $user_date['MEMBER_MOBILE'];

		$this->assign('member_name',$member_name);
		$this->assign('member_mobile',$member_mobile);

		$this->assign('from_flag',$from_flag);

		//根据type输出不同的模板，0默认当前模板，1是operation_info,2是zizhu_add
		$type = I('get.type', '0');
		if($type == "1")
		{
			$this->display(operation_info);
		}
		else if($type == "2")
		{
			$this->display(zizhu_add);
		}
		else
		{
			$this->display();
		}
	}

	public function operation_add()
	{
		//获取平台的token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$name = $_POST['name'];
		$phone =  $_POST['phone'];
		$from_flag = $_POST['from_flag'];
		$data = array
		(
			"openid"=>"$openid",
			"member_name"=>"$name",
			"member_mobile"=>"$phone",
			"from_flag" =>"$from_flag"
		);
		$url = C("PATH_URL")."/interface/yc_member/opt_order_info_add.aspx?access_token=".$token;
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		if($data['error_code'] == "ok")
		{
			echo "ok";
		}
		else
		{
			echo "no";
		}
	}
//除了住院的，其余添加
	public function serveroperation_add()
	{
		//获取平台的token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$member_name = I('post.name','');
        $member_mobile = I('post.mobile','');
        $member_age = I('post.age','0');
        $member_sex = I('post.sex','0');
        $order_province = I('post.address','空');
        $order_name = I('post.jibing','');
        $ill_desc = I('post.miaoshu','空');
        $order_title = I('post.biaoti','空');
        $order_pic = I('post.order_pic','http://yk.yc912.com/Public/Uploads/yuyue/2016-05-06/1462537195.jpg');
        $url = C("PATH_URL")."/interface/yc_member/post_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
            "member_name"=>"$member_name",  //患者姓名
            "member_mobile"=>"$member_mobile",  //手机号
            "member_age" => "$member_age",  //年龄
            "member_sex" => "$member_sex", // 0男1女
            "order_pic" => "$order_pic", //图片
            "order_province" => "$order_province", //地址
            "order_title" => "$order_title", //标题
            "hos_name" => "", //医院名称
            "doc_name" => "", //医生姓名
            "order_date" => "", //就诊日期
            "order_name" => "$order_name", //预约项目(所患疾病)
            "order_type" => "$order_name", //预约类型
            "ill_desc" => "$ill_desc", //描述
            "from_flag" => C("FROM_FLAG"), //订单来源，0微信公众号，1手机浏览器，2pc，3app
            "yw_id" => C("YW_ID") //业务id    1是眼科   6是肝病
		);
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		//print_r($data);die;
		if($data['error_code'] == "ok")
		{
			echo "1";
		}
	}

	public function operation_list()
	{
	
		$flag= I('get.flag','');
		switch ($flag) {
			case '1':
				$title="预约体检";
				break;
			case '2':
				$title="导医陪同";
				break;
			default:
				$title="手术住院";
				break;
		}
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_member/opt_order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1"
		);
		
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		$count = count($data);
		$this->assign("list",$data);
		$this->assign("count",$count);
		$this->assign("title",$title);
		$this->display(); // 输出模板
	}

	public function operation_list_append()
	{
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$page_num = I('get.page_num', '2');

		$url = C("PATH_URL")."/interface/yc_member/opt_order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num"
		);
		
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		$this->assign("list",$data);

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	public function operation_detail()
	{
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$oid = I("get.oid","");

		$url = C("PATH_URL")."/interface/yc_member/opt_order_info.aspx?access_token=".$token;

		$data = array
		(
			"openid"=>"$openid",
			"order_id"=>"$oid"
		);
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		$this->assign("list",$data);
		$this->display();
	}
	//预约手术住院
	public function zhuyuan()
	{
		//获取平台的token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		//include MODULE_PATH.'/Common/check_band.php';

		//判断是否是从手机浏览器进入
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MicroMessenger"))
		{
			$from_flag = "1";
		}
		else
		{
			$from_flag = "0";
		}

		//获取默认的用户信息
		$data = array
		(
			"openid"=>"$openid"
		);
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$json=json_encode($data);
		$user_date =json_decode(post_json($url,$json),true);

		$member_name = $user_date['MEMBER_NAME'];
		$member_mobile = $user_date['MEMBER_MOBILE'];

		$this->assign('member_name',$member_name);
		$this->assign('member_mobile',$member_mobile);

		$this->assign('from_flag',$from_flag);
		$this->display(); // 输出模板
	}

	//导医陪同
	public function daoyipeitong()
	{
		//获取平台的token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		//include MODULE_PATH.'/Common/check_band.php';

		//判断是否是从手机浏览器进入
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MicroMessenger"))
		{
			$from_flag = "1";
		}
		else
		{
			$from_flag = "0";
		}

		//获取默认的用户信息
		$data = array
		(
			"openid"=>"$openid"
		);
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$json=json_encode($data);
		$user_date =json_decode(post_json($url,$json),true);

		$member_name = $user_date['MEMBER_NAME'];
		$member_mobile = $user_date['MEMBER_MOBILE'];

		$this->assign('member_name',$member_name);
		$this->assign('member_mobile',$member_mobile);

		$this->assign('from_flag',$from_flag);
		$this->display(); // 输出模板
	}
	//预约体检
	public function yuyuetijian()
	{
		//获取平台的token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		// //验证手机是否绑定
		// include MODULE_PATH.'/Common/check_band.php';
		
		//判断是否是从手机浏览器进入
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MicroMessenger"))
		{
			$from_flag = "1";
		}
		else
		{
			$from_flag = "0";
		}

		//获取默认的用户信息
		$data = array
		(
			"openid"=>"$openid"
		);
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$json=json_encode($data);
		$user_date =json_decode(post_json($url,$json),true);

		$member_name = $user_date['MEMBER_NAME'];
		$member_mobile = $user_date['MEMBER_MOBILE'];

		$this->assign('member_name',$member_name);
		$this->assign('member_mobile',$member_mobile);

		$this->assign('from_flag',$from_flag);
		$this->display(); // 输出模板
	}
}