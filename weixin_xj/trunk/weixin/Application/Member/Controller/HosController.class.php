<?php
namespace Member\Controller;
use Think\Controller;
class HosController extends Controller
{
	//获取医院列表
	public function hos_list()
	{
		$level_id = I('get.level_id', '');
		$province_id = I('get.province_id', '');
		$province_name = I('get.province_name', '');
		$serve_id = I('get.serve_id', '');
		$hzzx_flag = I('get.hzzx_flag', '0');
		$hos_name = I('get.hos_name', '');
        $sty = I('get.sty', '');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//echo $openid;die;

		//获取坐标
		include COMMON_PATH.'/Common/lat_lng.php';
		if($openid == "0" || $openid == " " || $openid == "1")
		{
			
			$this->redirect('?m=Member&c=Follow&a=index');
		}
		
		//阅片
		if ($serve_id == "25" || $serve_id=="29")
		{
			$template_html = MODULE_PATH."/View/Hos/hos_dlist.html";
		}
		//会诊
		if ($sty == "1" || $serve_id=="24")
        {
            $template_html = MODULE_PATH."/View/Hos/hos_hzlist.html";
            $hzzx_flag = "1";
        }
        //预约服务(预约手术)
		if ($serve_id=="27" || $serve_id=="28")
        {
            $template_html = MODULE_PATH."/View/Hos/hos_yylist.html";
            $hzzx_flag = "0";
        }

		//获取省数据
		$url = C("PATH_URL")."/interface/yc_member/province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		//print_r($data);die;
		$json=json_encode($data);
		$province_list = json_decode(post_json($url,$json),true);
		$this->assign('province_list',$province_list);// 赋值数据集
		//获取医院等级
		$url = C("PATH_URL")."/interface/yc_member/level_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$level_list = json_decode(post_json($url,$json),true);
		$this->assign('level_list',$level_list);// 赋值数据集
		
		if ($sty == "1" || $serve_id=="24")
        {
            $template_html = MODULE_PATH."/View/Hos/hos_hzlist.html";
            $hzzx_flag = "1";
        }
		//获取医院列表
		$url = C("PATH_URL")."/interface/yc_member/hos_list.aspx?access_token=".$token;
		
		$this->assign('serve_id',$serve_id);

		if($serve_id == "25"||$serve_id == "29"||$serve_id == "24"){
			$data = array
				(
					"openid"=>"$openid",
					"page_num"=>"1",
					"lat"=>"$lat",
					"lng"=>"$lng",
					"level_id"=>"$level_id",
					"province_id"=>"$province_id",
					"serve_id"=>"",
					"hos_name"=>"$hos_name",
					"hzzx_flag"=>"$hzzx_flag",
					"yw_id"=>C('YW_ID')
				);
			
		}else{
			$data = array
				(
					"openid"=>"$openid",
					"page_num"=>"1",
					"lat"=>"$lat",
					"lng"=>"$lng",
					"level_id"=>"$level_id",
					"province_id"=>"$province_id",
					"serve_id"=>"$serve_id",
					"hos_name"=>"$hos_name",
					"hzzx_flag"=>"$hzzx_flag",
					"yw_id"=>C('YW_ID')
				);
		}
		$json=json_encode($data);
		$hos_list = json_decode(post_json($url,$json),true);
		
		$array = array(97,47,53,89,43,59,83,41,61,79,37,67,73,31,71);
		foreach ($hos_list as $k => $v) 
		{
			$num = $k%15;
			$hos_list[$k]['SERVE_NUM'] = $array[$num];
			
		}

		$this->assign('hos_list',$hos_list);// 赋值数据集
		$this->assign('level_id',$level_id);
		$this->assign('province_id',$province_id);
		$this->assign('province_name',$province_name);
		$this->assign('hos_name',$hos_name);
		$this->assign('hzzx_flag',$hzzx_flag);

		
		$this->display($template_html); // 输出模板
	}
	
	//加载更多
	public function hos_list_append()
	{
		$lat = $_SESSION['lat'];
		$lng = $_SESSION['lng'];
		$page_num = I('get.page_num', '2');
		$level_id = I('get.level_id', '');
		$serve_id = I('get.serve_id', '');
		$province_id = I('get.province_id', '');
		$hos_name = I('get.hos_name', '');
		$hzzx_flag = I('get.hzzx_flag', '0');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//输出更多列表
		if ($serve_id == "25" || $serve_id=="29")
		{
			$template_html = MODULE_PATH."/View/Hos/hos_dlist_append.html";
		}
		//预约服务(预约手术)
		if ($serve_id=="27" || $serve_id=="28")
        {
            $template_html = MODULE_PATH."/View/Hos/hos_yylist_append.html";
        }

		//获取医院列表
		$url = C("PATH_URL")."/interface/yc_member/hos_list.aspx?access_token=".$token;
		if($serve_id = "25"||$serve_id = "29"){
			$data = array
				(
					"openid"=>"$openid",
					"page_num"=>"$page_num",
					"lat"=>"$lat",
					"lng"=>"$lng",
					"level_id"=>"$level_id",
					"province_id"=>"$province_id",
					"serve_id"=>"",
					"hos_name"=>"$hos_name",
					"hzzx_flag"=>"$hzzx_flag",
					"yw_id"=>C('YW_ID')
				);
			
		}else{
			$data = array
				(
					"openid"=>"$openid",
					"page_num"=>"$page_num",
					"lat"=>"$lat",
					"lng"=>"$lng",
					"level_id"=>"$level_id",
					"province_id"=>"$province_id",
					"serve_id"=>"$serve_id",
					"hos_name"=>"$hos_name",
					"hzzx_flag"=>"$hzzx_flag",
					"yw_id"=>C('YW_ID')
				);
		}
		$json=json_encode($data);
		$hos_list = json_decode(post_json($url,$json),true);

		$array = array(97,89,83,79,73,71,67,61,59,53,47,43,41,37,31);
		foreach ($hos_list as $k => $v) 
		{
			$num = $k%15;
			$hos_list[$k]['SERVE_NUM'] = $array[$num];
			
		}

		$this->assign('hos_list',$hos_list);
		$this->assign('hzzx_flag',$hzzx_flag);	
		include COMMON_PATH.'/Common/load_more.php';
	}
	
	
	//医院详细页面
	public function hos_detail()
	{
		$hos_id = I('get.hos_id', '');
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/hos_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$hos_info = json_decode(post_json($url,$json),true);

		$hos['HOS_ID'] = $hos_info['HOS_ID'];
		$hos['HOS_NAME'] = $hos_info['HOS_NAME'];
		$hos['LEVEL_NAME'] = $hos_info['LEVEL_NAME'];
		$hos['HOS_ADDRESS'] = $hos_info['HOS_ADDRESS'];
		$hos['HOS_PHONE'] = $hos_info['HOS_PHONE'];
		$hos['HOS_DESC'] = html_entity_decode($hos_info['HOS_DESC']);
		$hos['HOS_PIC'] = $hos_info['HOS_PIC'];
		$hos['TYPE_NAME']=$hos_info['TYPE_NAME'];
		$hos['HOS_XZ']=$hos_info['HOS_XZ'];
		$hos['DEP_COUNT']=$hos_info['DEP_COUNT'];
		$this->assign('hos',$hos);
		$this->assign('serve_list',$hos_info['HOS_SERVES']);// 赋值数据集
		$this->display(); // 输出模板
	}

	//交通地图
	public function jiaotong()
	{
		$hos_id = I('get.hos_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医院名称
		$url = C("PATH_URL")."/interface/yc_member/hos_name.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$hos_name = json_decode(post_json($url,$json),true);
		$this->assign('hos_name',$hos_name['HOS_NAME']);
		$this->assign("hos_id",$hos_name['HOS_ID']);
		$this->assign("hos_address",$hos_name['HOS_ADDRESS']);

		// 获取交通
		$url = C("PATH_URL")."/interface/yc_member/hos_zb.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$hos_jt = json_decode(post_json($url,$json),true);
		$this->assign("hos_jt",$hos_jt);
		$this->display(); // 输出模板
	}

	//医院荣誉
	public function ry_list()
	{
		$hos_id = I('get.hos_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医院名称
		$url = C("PATH_URL")."/interface/yc_member/hos_name.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$hos_name = json_decode(post_json($url,$json),true);
		$this->assign('hos_name',$hos_name['HOS_NAME']);
		$this->assign("hos_id",$hos_name['HOS_ID']);

		$url = C("PATH_URL")."/interface/yc_member/hos_ry_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$ry_list = json_decode(post_json($url,$json),true);
		$this->assign("ry_list",$ry_list);
		$this->display();
	}

	public function serve_list()
	{
		$hos_id = I('get.hos_id', '');

		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医院名称
		$url = C("PATH_URL")."/interface/yc_member/hos_name.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$hos_name = json_decode(post_json($url,$json),true);
		$this->assign('hos_name',$hos_name['HOS_NAME']);
		$this->assign("hos_id",$hos_name['HOS_ID']);

		$url = C("PATH_URL")."/interface/yc_member/hos_serve_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$hos_fw = json_decode(post_json($url,$json),true);
		foreach ($hos_fw as $key => $value)
		{
			$hos_fw[$key]['SERVE_CONTENT'] = strip_tags(html_entity_decode($value['SERVE_CONTENT']));
		}
		$this->assign("serve_list",$hos_fw);
		$this->display();
	}

	public function doc_list()
	{
		$hos_id = I('get.hos_id', '');

		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医院名称
		$url = C("PATH_URL")."/interface/yc_member/hos_name.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$hos_name = json_decode(post_json($url,$json),true);
		$this->assign('hos_name',$hos_name['HOS_NAME']);
		$this->assign("hos_id",$hos_name['HOS_ID']);

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/hos_expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
			"page_num"=>"1"
		);

		$json=json_encode($data);
		$doc_list = json_decode(post_json($url,$json),true);
		$this->assign("doc_list",$doc_list);
		$this->display();
	}

	public function doc_list_append()
	{
		$page_num = I('get.page_num',"1");
		$hos_id = I('get.hos_id', '');

		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_member/hos_expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
			"page_num" => "$page_num"
		);

		$json=json_encode($data);
		$doc_list = json_decode(post_json($url,$json),true);
		$this->assign('doc_list',$doc_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//医院服务详细页面
	public function serve_detail()
	{
		$hos_id = I('get.hos_id', '');
		$serve_id = I('get.serve_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
       $url = C("PATH_URL")."/interface/yc_member/hos_expert_serve.aspx?access_token=".$token;
       $data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
		);
		$json=json_encode($data);
		$exp_list = json_decode(post_json($url,$json),true);
		if(count($exp_list)==0){
			$exp_list = '';
		}else{
			$exp_list = $exp_list;
		}
		//print_r($exp_list);die;
		$list = $exp_list;

		foreach ($list as $v){
		//	$array_price[$v['0']] = 0;
			$array_price[$v['EXPERT_ID']] = $v['SERVE_MONEY'];
			unset($v['SERVE_ID']);
			unset($v['EXPERT_NAME']);
			unset($v['EXPERT_ID']);
		}
			
		$array_price = str_replace('[','{',json_encode($array_price));
		$array_price = str_replace(']','}',$array_price);
		//print_r($array_price);die;
		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/hos_serve_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"hos_id"=>"$hos_id",
			"serve_id"=>"$serve_id"
		);
		$json=json_encode($data);
		$hos_info = json_decode(post_json($url,$json),true);
		$hos['HOS_ID'] = $hos_info['HOS_ID'];
		$hos['HOS_NAME'] = $hos_info['HOS_NAME'];
		$hos['LEVEL_NAME'] = $hos_info['LEVEL_NAME'];
		$hos['HOS_ADDRESS'] = $hos_info['HOS_ADDRESS'];
		$hos['HOS_PHONE'] = $hos_info['HOS_PHONE'];
		$hos['HOS_DESC'] = strip_tags($hos_info['HOS_DESC']);
		// $hos['HOS_DESC'] = str_replace("\n","<br>",$hos['HOS_DESC']);
		// var_dump($hos_info['HOS_DESC'],strip_tags($hos_info['HOS_DESC']));
		$hos['HOS_PIC'] = $hos_info['HOS_PIC'];
		$hos['SERVE_CONTENT'] = strip_tags(html_entity_decode($hos_info['SERVE_CONTENT']));
		$hos['SERVE_MONEY'] = $hos_info['SERVE_MONEY'];
		$hos['SERVE_NAME'] = $hos_info['SERVE_NAME'];
		$hos['SERVE_ID'] = $hos_info['SERVE_ID'];
		$hos['FLOW_PIC'] = $hos_info['FLOW_PIC'];
		$hos['TYPE_NAME'] = $hos_info['TYPE_NAME'];
		$this->assign('hos',$hos);
		$this->assign('serve_list',$hos_info['HOS_SERVES']);// 赋值数据集
		for($i=5; $i < 12; $i ++)
		{
			$str[$i] = date("m月d日",strtotime("+$i day"));
		}	
		$this->assign('date_list',$str);
		$this->assign('exp_list',$exp_list);
		$this->assign('array_price',$array_price);

		switch ($serve_id)
		{
		case 4:
		  $template_html="serve_detail_hz";//省联盟活动详情
		  break;
	  	case 24:
		  $topphoto="ychz/";//图片地址
		  $topphotos="jpg";//图片后缀
		  break;
	  	case 26:
		  $topphoto="yxhz/";//图片地址
		  $topphotos="jpg";//图片后缀
		  break;
	  	case 27:
		  $topphoto="yytj/";//图片地址
		  $topphotos="jpg";//图片后缀
		  break;
	  	case 28:
		  $topphoto="sszy/";//图片地址
		  $topphotos="jpg";//图片后缀
		  break;
		default:
		  $template_html="";//通用详情
		  $topphoto = "";//图片地址
		  $topphotos="png";//图片后缀
		}

		$this->assign('topphoto',$topphoto);
		$this->assign('topphotos',$topphotos);
		$this->display($template_html); // 输出模板
	}

	//购买服务
	public function serve_buy()
	{
		$hos_id = I('post.hos_id', '');
		$serve_id = I('post.serve_id', '');
		$serve_name = I('post.serve_name', '');
		$order_date = I('post.order_date','');
		$expert_id = I('post.expert_id', '');
		$money =  I('post.money', '');
		$price = I('post.serve_money', '');
		if($expert_id){
			$hos_id = $expert_id;
			$value = 'expert_id';
			$price = $money;
		}else{
			$hos_id = $hos_id;
			$value = 'hos_id';
			$price = $price;
		}
		if($order_date != "")
		{
			$str =date("Y")."年".$order_date;
			preg_match_all('/\d/',$str,$arr);
			$timer=implode('',$arr[0]);
			$timer=strtotime($timer);
			$order_date = date("Y-m-d H:i:s",$timer);
		}
		else
		{
			$order_date = date("Y-m-d H:i:s",time());
		}
		
		$time = date("Y-m-d H:i:s",time());
		

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/order_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>$openid,
			"order_money"=>$price,
			"column_name"=>$value,
			"column_value"=>$hos_id,
			"order_date"=>$order_date,
			"order_status"=>"0",
			"create_date"=>$time,
			"order_name" =>$serve_name,
			"record_id"=>$serve_id
		);
		//print_r($data); die;
		$json=json_encode($data);
		$info = json_decode(post_json($url,$json),true);

        //获取当前用户 卡号 手机号 
        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);

         //当前用户手机号
        $mobile = $user_info['MEMBER_MOBILE'];
        $card_number = $user_info['CARD_NUMBER'];
        
        if($card_number)
        {
        	//获取卡余额
			$url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
			$data = array
		    (
				"mobile"=>"$mobile"
			 );
		    $json=json_encode($data);
	        $cardinfo = json_decode(post_json($url,$json),true);
	        $card_money  = $cardinfo['cur_money'];
        }
        
        
		//购买参数转码加密
		$data1 = array
		(
			"out_trade_no"=>$info['order_id'],
			"subject"=>$serve_name,
			"total"=>$price,
			"consult_id"=>0,
			"status"=>1,
			"doc_id"=>0,
			"card_number"=>$card_number,
            "card_money"=>$card_money
		);
		$json= json_encode($data1);
		//echo $json;die;
		$json= urlencode(passport_encrypt($json, "123"));
		header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
	}

	public function onlin_play()
	{
		$order_id = I('get.out_trade_no', '');
		$outtradeno = I('get.outtradeno', '');
		$status = I('get.status', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url=C("PATH_URL")."/interface/yc_member/online_pay.aspx?access_token=".$token;
		$data=array
		(
			"openid"=>"$openid",
			"order_id"=>"$order_id",
			"serial_number"=>"$outtradeno",
			"order_status"=>"1"
		);
		$json=json_encode($data);
		$info = json_decode(post_json($url,$json),true);
		$this->redirect('?m=Member&c=Order&a=order_list');
	}

	//获取gps
	public function get_gps($type)
	{
		$type = I('get.type', 'hos_list');
		$hos_id = I('get.hos_id', '');
		$url_str = "m=Member&c=Hos&a=".$type;
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}
}