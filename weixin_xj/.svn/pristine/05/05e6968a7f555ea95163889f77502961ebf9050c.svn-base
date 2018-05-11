<?php
namespace Expert\Controller;
use Think\Controller;
class CfController extends Controller
{
	//开处方
	public function cf_add()
	{
		$error_code = I('get.error_code','');  //错误提示
		$member_id = I('get.member_id', '92');
		$consult_id = I('get.consult_id', '0');
		$product_name = I('get.name', '');
		$imgbase64 = $_POST['imgbase64'];//获取base64图片字符串
		if(empty($imgbase64))
		{
			//上传错误提示错误信息
			$pic_path = "";
			//echo "空值";
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
		 
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		
		//选择药店
		$url = C("PATH_URL")."/interface/yc_doc/yd_all_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"consult_id" => "$consult_id",
			"province_id" => "$province_id",
			"city_id" => "$city_id",
		);
		$json = json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json = json_encode($data);

		$user_info = json_decode(post_json($url,$json),true);
		$BaiduLng = 0;
		$BaiduLat = 0;

		// $url = C("NEW_PATH_URL")."/ServieYunAPI/ServiceDoctor/WebService.asmx/PharmacyList";
		// $data = "Docid=".$user_info['EXPERT_ID']."&BaiduLat=".$BaiduLat."&BaiduLng=".$BaiduLng."";
  //       $yd_list =json_decode(post_curl($url,$data),true);
		$this->assign('yd_list',$yd_list);
		// print_R($yd_list);
		//获取药店药品列表
		$url = C("PATH_URL")."/interface/yc_doc/product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"product_name"=>"$product_name",
			"hos_id"=>$yd_list[0]['HOS_ID'],
			"record_id"=>"$record_id"
		);
		$json=json_encode($data);
		$product_list =json_decode(post_json($url,$json),true);
		//print_R($product_list);die;
		//获取省市
		$url =C("PATH_URL")."/interface/yc_member/province_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $data_pre = json_decode(post_json($url,$json),true);
        // print_r($data_pre);die;
        $this->assign('data_pre',$data_pre);

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
		$this->assign('expert_info',$expert_info); //医生信息

		$this->assign('product_list',$product_list);// 药品列表
		$this->assign('member_id',$member_id);//患者id
		$this->assign('consult_id',$consult_id);// 咨询id
		$this->assign('name',$product_name);// 药品名称
		$this->assign('error_code',$error_code);// 错误提示
		$this->display(); // 输出模板
	}

	//根据药店获取药品
	function getpro_byhos()
	{

		//获取平台的access_token
		$token = A_token();

		$hos_id = I("post.hos_id");
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_doc/product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"product_name"=>"$product_name",
			"hos_id"=>"$hos_id",
			"record_id"=>"$record_id"
		);
		$json=json_encode($data);
		//echo $json;
		$product_list =json_decode(post_json($url,$json),true);
		//print_R($product_list);die;
		foreach ($product_list as $key => $value)
		{
			$value['PRODUCT_MONEY'] = round($value['PRODUCT_MONEY'],2);
			$str .= '<li id="y_'.$value['PRODUCT_ID'].'">
			<label class="ui-icon-unchecked-s xz" for="week1_'.$value['PRODUCT_ID'].'" ></label>
			<input type="checkbox" name="product[]" id="week1_'.$value['PRODUCT_ID'].'" onclick="checkproduct('.$value['PRODUCT_ID'].')" value="'.$value['PRODUCT_ID'].'" style="display:none" />
			<h3>'.$value['TY_NAME'].'-'.$value['PRODUCT_GG'].' ￥'.$value['PRODUCT_MONEY'].' - '.$value['PRODUCT_TYPE'].'</h3>
			<div style=" height:40px;">
			<div style="padding-right:30px;width:100px; line-height:40px">数量：</div>
			<label  class="label1">
                <span class="jianshao"></span>
                <span class="num"><span>1</span></span>
                <span class="zengjia"></span>
                <input name="num_'.$value['PRODUCT_ID'].'" type="hidden" value="1">
            </label>
            </div>
            <div style=" height:40px; width:300px;">
            <div style="padding-right:30px;width:100px; float:left; line-height:40px">用量：</div>
             <label class="label2">
                <span class="jianshao"></span>
                <span class="num2"><span>1</span></span>
                <span class="zengjia"></span>
                <input name="yl_'.$value['PRODUCT_ID'].'" type="hidden" value="1">
            </label>
            <div style="width:100px; float:right; line-height:40px;">次/日</div>
        	</div>
	        <div style=" height:40px; width:300px;">
	        <label class="label3">
		      <span class="jianshao"></span>
		      <span class="num3"><span>1</span></span>
		      <span class="zengjia"></span>
      		<input name="jl_'.$value['PRODUCT_ID'].'" type="hidden" value="1" />
    	</label>
          <div style="width:100px; float:right; line-height:40px;">
                <select name="jldanwei" id="danwei_'.$value['PRODUCT_ID'].'">
                  <option value ="滴" selected >滴</option>
                  <option value ="粒">粒</option>
                  <option value="袋">袋</option>
                </select> /次
      </div>
        </div> 
        <input name="dj_'.$value['PRODUCT_ID'].'" id="ypdj" type="hidden" value="'.$value['PRODUCT_MONEY'].'">
  </li>';
		}

		echo $str;
	}
	//药品加载更多
	public function cf_add_append()
	{
		$hos_id = I("get.hos_id");
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"product_name"=>"$product_name",
			"hos_id"=>"$hos_id",
			"record_id"=>"$record_id"
		);
		$json=json_encode($data); 
		$product_list = json_decode(post_json($url,$json),true);

		$this->assign('product_list',$product_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//x续方药品加载更多
	public function cf_addx_append()
	{	
		$record_id = I("get.record_id");
		$hos_id = I("get.hos_id",'');
		$page_num = I('get.page_num', '1');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取药店药品列表
		$url = C("PATH_URL")."/interface/yc_doc/product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"product_name"=>"$product_name",
			"hos_id"=>$hos_id, 
			"record_id"=>"$record_id"
		);
		$json=json_encode($data);
		$product_list =json_decode(post_json($url,$json),true);
		//print_R($product_list);
		$this->assign('cf_detail',$product_list);
		//输出更多列表   
		include COMMON_PATH.'/Common/load_more.php';
	}

	public function add_ok()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$yf_desc = I('post.yf_desc', '用法描述');	//用法描述
		$member_id = I('post.member_id', '');//会员id
		$hos_id = I('post.hos_id', '0');
		$consultContent = I('post.consultContent', '');//处方内容描述
		$time = date("Y-m-d H:i:s",time());
		$imgbase64 = $_POST['imgbase64'];//获取base64图片字符串
		
		if(empty($imgbase64))
		{
			//上传错误提示错误信息
			$pic_path = "";
			//echo "空值";
		}
		else if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
		{
			//匹配出图片的格式
			$type = $result[2]; //图片类型
			$type = str_replace("jpeg","jpg", $type);
			$new_file = "./Public/Uploads/cf/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名

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
				$image->thumb(500, 1000)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}

		//往正式处方表添加信息
		$product_arr = I('post.product', '');		//信息数组
		$product_values = "";						//药品id集
		$product_num = "";							//药品数量集
		$product_yl = "";							//药品用量集
		$product_jl	= "";							//药品剂量集
		$product_jldw = "";						    //计量单位
		$product_moneys = "";						//药品单价
		for( $i = 0; $i < count($product_arr); $i ++)
		{
			if($i != count($product_arr) - 1)
			{
				$product_values = $product_values.$product_arr[$i].",";
				
				$product_num = $product_num.I('post.num_'.$product_arr[$i], '').",";
				$product_yl = $product_yl.I('post.yl_'.$product_arr[$i],'').",";
				$product_jldw = I('post.jldw_'.$product_arr[$i],'');
				$product_jl = $product_jl.I('post.jl_'.$product_arr[$i],'').$product_jldw.",";
				$product_moneys = $product_moneys.I('post.dj_'.$product_arr[$i],'').",";
			}
			else
			{
				$product_values = $product_values.$product_arr[$i];
				
				$product_num = $product_num.I('post.num_'.$product_arr[$i], '');
				$product_yl = $product_yl.I('post.yl_'.$product_arr[$i],'');
				$product_jldw = I('post.jldw_'.$product_arr[$i],'');
				$product_jl = $product_jl.I('post.jl_'.$product_arr[$i],'').$product_jldw;
				$product_moneys = $product_moneys.I('post.dj_'.$product_arr[$i],'');
			}
		}
		
		$url = C("PATH_URL")."/interface/yc_doc/cf_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_mobile"=>"$member_phone",
			"cf_content"=>"$consultContent",
			"cf_pic"=>"$pic_path",
			"member_id"=>"$member_id",
			"member_name"=>"$member_name",
			"hos_id"=>"$hos_id",
			"product_data"=>"$product_values",
			"product_num"=>"$product_num",
			"member_sex" => "$member_sex",
			"member_age" => "$member_age",
			"yl_num" => "$product_yl",
			"jl_num" => "$product_jl",
			"product_moneys" => "$product_moneys",
			"yf_desc" => "$yf_desc"
		);
		 $json=json_encode($data);
		// echo $json;die;
		 $data =json_decode(post_json($url,$json),true); 
		 $error_code = $data["error_code"];
		if($error_code == "ok")
		{
			$consult_id=I('post.consult_id');
			if($consult_id!=0)
			{
				$member_id = 0;
			}
			//测试环信用 start
			if($consult_id=="0")
			{
				redirect(U("Expert/Jtys/consult_details_bak",array("consult_id"=>$consult_id,"member_id"=>$member_id)));
			}
			else
			{
				redirect(U("Expert/Consult/consult_details_bak",array("consult_id"=>$consult_id)));
			}
			// if(is_ceshi($openid)){
			// 	if($consult_id=="0")
			// 	{
			// 		redirect(U("Expert/Jtys/consult_details_bak",array("consult_id"=>$consult_id,"member_id"=>$member_id)));
			// 	}
			// 	else
			// 	{
			// 		redirect(U("Expert/Consult/consult_details_bak",array("consult_id"=>$consult_id)));
			// 	}
			// }else{
			// 	$create_date=date('Y-m-d H:i:s',time());
			// 	$url = C("PATH_URL")."/interface/yc_doc/consult_reply_info_add.aspx?access_token=".$token;
			// 	$data = array
			// 	(
			// 		"openid"=>"$openid",
			// 		"token_id"=>C("M_TOKEN_ID"),
			// 		"consult_id"=>"$consult_id",
			// 		"member_id"=>"$member_id",
			// 		"reply_content"=>"已开处方，请点击详细进行查看！",
			// 		"create_date"=>"$create_date",
			// 		"reply_img"=>''
			// 	);
			// 	$json = urldecode(json_encode($data));
			// 	$data = post_json($url,$json);			
			// 	$data = json_decode($data,true);
				
			// 	if($data['error_code']=='ok')
			// 	{

			// 		if($consult_id=="0")
			// 		{
			// 			$this->redirect("?m=Expert&c=Jtys&a=consult_details&consult_id=".$consult_id."&member_id=".$member_id);
			// 		}
			// 		else
			// 		{
			// 			$this->redirect("?m=Expert&c=Consult&a=consult_details&consult_id=".$consult_id);
			// 		}
			// 	}

			// }
			//测试环信用 stop
			
		}
		else
		{
			$this->redirect("?m=Expert&c=Cf&a=cf_add&error_code=$error_code");
		}
	}

	public function success()
	{
		$this->display();
	}

	//处方列表
	public function cf_list()
	{
		$member_name = I("get.name","");
		$member_mobile = I("get.member_mobile","");
		$member_id = I("get.member_id","");
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取处方列表
		$url = C("PATH_URL")."/interface/yc_doc/cf_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"member_id"=>"$member_id",
			"member_name"=>"$member_name",
			"member_mobile"=>"$member_mobile",
		);
		$json=json_encode($data);
		$cf_list =json_decode(post_json($url,$json),true);
		$this->assign('cf_list',$cf_list);// 医生列表
		$this->assign('member_name',$member_name);
		$this->assign('member_id',$member_id);
		$this->display(); // 输出模板
	}
	//处方列表加载更多
	public function cf_list_append()
	{
		$member_id = I("get.member_id","");
		$member_name = I("get.name","");

		//获取平台的access_token
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/cf_list.aspx?access_token=".$token;
		$page_num = I('get.page_num', '2');
		$data = array
		(
			"openid"=>"$openid",
			"member_id"=>"$member_id",
			"page_num" => "$page_num",
			"member_name"=>"$member_name",
			"member_mobile"=>"$member_mobile",
		);
		$json=json_encode($data);
		$cf_list = json_decode(post_json($url,$json),true);
		$this->assign('cf_list',$cf_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';

	}

	//处方续方
	public function cf_addx()
	{

		$record_id = I('get.record_id', '');

		//获取平台的access_token
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取药店
		$url = C("PATH_URL")."/interface/yc_doc/yd_all_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"consult_id" => "$consult_id",
			"province_id" => "$province_id",
			"city_id" => "$city_id",
		);
		$json = json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		//获取处方订单详情页
		$url = C("PATH_URL")."/interface/yc_doc/cf_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"record_id"=>"$record_id",
			"hos_id"=>"$hos_id"
		);

		$json=json_encode($data);
		$cf_detail =json_decode(post_json($url,$json),true);

		//print_R($cf_detail);die;
		//药店
		$this->assign("yd_list",$yd_list);

		$this->assign('cf_pic',$cf_detail[0]['CF_PIC']);
		$this->assign('cf_detail',$cf_detail);
		$this->assign('hos_name',$cf_detail[0]['HOS_NAME']);
		$this->assign('cf_content',$cf_detail[0]['CF_CONTENT']);
		$this->assign('hos_id',$cf_detail[0]['HOS_ID']);
		$this->assign('cf_id',$cf_detail[0]['CF_ID']);
		$this->assign('member_name',$cf_detail[0]['MEMBER_NAME']);
		$this->assign('member_age',$cf_detail[0]['MEMBER_AGE']);
		$this->assign('doc_signature',$cf_detail[0]['DOC_SIGNATURE']);
		$this->assign('member_mobile',$cf_detail[0]['MEMBER_MOBILE']);
		$this->assign('record_id',$record_id);

		if($cf_detail[0]['MEMBER_SEX']==0)
		{
			$this->assign('member_sex',"男");
		}
		else
		{
			$this->assign('member_sex',"女");
		}
		$this->display();
	}

	public function cf_addx_do()
	{

		$yf_desc = I('post.yf_desc', '用法描述');
		$member_phone = I('post.phone', '');	//获取提交手机号
		$consultContent = I('post.desc', '');	//处方内容描述
		$member_name = I('post.product_id','');		//获取姓名
		$sex = I('post.sex','');			//获取性别

		if($sex == "男")
		{
			$member_sex = 0;
		}
		else
		{
			$member_sex = 1;
		}

		$member_age = I('post.age',''); 		//获取年龄
		$hos_id = I('post.hos_id', '0');  		//获取药店id 				
		$time = date("Y-m-d H:i:s",time());		//系统时间

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//通过手机号获取患者的 member_id
		$url = C("PATH_URL")."/interface/yc_doc/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_mobile" => "$member_phone"
		);
		$json=json_encode($data); 
		$list = json_decode(post_json($url,$json),true);
		$member_id = $list['MEMBER_ID'];

		//往正式处方表添加信息
		$product_arr = I('post.info', '');		//信息数组

		foreach ($product_arr as $key => $value)
		{
			$product_id .= $value['name'].",";  //药品id集
			$product_num .= $value['num1'].",";  //药品数量集
			$product_yl .= $value['yl_num'].",";  //药品用量集
			$product_jl .= $value['jl_num'].",";  //药品剂量集
			$product_moneys .= $value['money'].",";  //药品单价
		}

		//生成处方订单
		$url = C("PATH_URL")."/interface/yc_doc/doc_cf_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_mobile"=>"$member_phone",
			"cf_content"=>"$consultContent",
			"cf_pic"=>"$pic_path",
			"member_id"=>"$member_id",
			"member_name"=>"$member_name",
			"hos_id"=>"$hos_id",
			"product_data"=> trim($product_id,','),
			"product_num"=> trim($product_num,','),
			"member_sex" => "$member_sex",
			"member_age" => "$member_age",
			"yl_num" => trim($product_yl,','),
			"jl_num" => trim($product_jl,','),
			"product_moneys" => trim($product_moneys,','),
			"yf_desc" => "$yf_desc"
		);

		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		echo json_encode($data["error_code"]);
	}

	//处方详细内容
	public function cf_detail()
	{

		$record_id = I('get.record_id', '');
		$hos_id = I('get.yd_id', '');

		//获取平台的access_token
		$token = A_token();
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取处方订单详情页
		$url = C("PATH_URL")."/interface/yc_doc/cf_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"record_id"=>"$record_id",
			"hos_id"=>"$hos_id"
		);
		$json=json_encode($data);
		$cf_detail =json_decode(post_json($url,$json),true);
		$this->assign('cf_pic',$cf_detail[0]['CF_PIC']);
		$this->assign('cf_detail',$cf_detail);
		$this->assign('hos_name',$cf_detail[0]['HOS_NAME']);
		$this->assign('cf_content',$cf_detail[0]['CF_CONTENT']);
		$this->assign('cf_id',$cf_detail[0]['CF_ID']);
		$this->assign('member_name',$cf_detail[0]['MEMBER_NAME']);
		$this->assign('member_age',$cf_detail[0]['MEMBER_AGE']);
		$this->assign('doc_signature',$cf_detail[0]['DOC_SIGNATURE']);
		if($cf_detail[0]['MEMBER_SEX']==0)
		{
			$this->assign('member_sex',"男");
		}
		else
		{
			$this->assign('member_sex',"女");
		}

		//①获取申请信息
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);	
		$doc_sign = $user_info['DOC_SIGNATURE'];//个性签名

		$this->assign('doc_sign',$doc_sign);
		$this->assign('member_mobile',$cf_detail[0]['MEMBER_MOBILE']);
		$this->display(); // 输出模板
	}

	//获取gps
	public function get_gps($type)
	{
		$type = I('get.type', 'cf_detail');
		$cf_pic = I('get.cf_pic', '');//图片
		$record_id = I('get.record_id', '');//记录ID
		$order_status = I('get.order_status', '');//订单状态

		$url_str = "m=Expert&c=Cf&a=".$type."&cf_pic=".$cf_pic."&record_id=".$record_id."&order_status=".$order_status;
		$this->assign('url_str', $url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

//开处方单独出来
	public function cf_addm()
	{
		

		$error_code = I('get.error_code','');
		$member_id = I('get.member_id', '');
		$consult_id = I('get.consult_id', '');
		$product_name = I('get.name', '');
		$imgbase64 = $_POST['imgbase64'];//获取base64图片字符串

		if(empty($imgbase64))
		{
			//上传错误提示错误信息
			$pic_path = "";
			//echo "空值";
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
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json = json_encode($data);

		$user_info = json_decode(post_json($url,$json),true);
		$BaiduLng = 0;
		$BaiduLat = 0;
		//选择药店--
		// $url = C("NEW_PATH_URL")."/ServieYunAPI/ServiceDoctor/WebService.asmx/PharmacyList";
		// $data = "Docid=".$user_info['EXPERT_ID']."&BaiduLat=".$BaiduLat."&BaiduLng=".$BaiduLng."";

		$url = C("PATH_URL")."/interface/yc_doc/yd_all_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"consult_id" => "$consult_id",
			"province_id" => "$province_id",
			"city_id" => "$city_id",
		);
		$json = json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$url =C("PATH_URL")."/interface/yc_member/province_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $data_pre = json_decode(post_json($url,$json),true);
        $this->assign('data_pre',$data_pre);
		$url = C("PATH_URL")."/interface/yc_doc/product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"product_name"=>"$product_name",
			"hos_id"=>$yd_list[0]['HOS_ID'],
			"record_id"=>"$record_id"
		);
		$json=json_encode($data);
		//echo $json;
		$product_list =json_decode(post_json($url,$json),true);
		//print_R($product_list);
        $this->assign('product_list',$product_list);
       // print_R($product_list);die;

		$this->assign('yd_list',$yd_list);// 赋值数据集

		//申请开通处方
		$url = C("PATH_URL")."/interface/yc_doc/cf_check_zt.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);

		$json=json_encode($data);
		$is_cf = json_decode(post_json($url,$json),true);

		if($is_cf[0]['CF_CHECK_FLAG']=="")
		{
			$is_cf[0]['CF_CHECK_FLAG']=4;
		}
		switch ($is_cf[0]['CF_CHECK_FLAG'])
		{
			case 0:
				$this->redirect('?m=Expert&c=User&a=cfds');
			  	$template_html="cfds";//待审页面
			  	break;
			case 1:			  	
			  		$template_html="cf_addm";
			  	break;
			case 2:
	          	$template_html="jujue";//拒绝页面
	          	$data = "审核拒绝, ";
	          	$img = "yjimg";
	          	break;
			default:
			  	$this->redirect('?m=Expert&c=User&a=eprescribing');
		}
		$this->assign('empty',$data['0']['HOS_ID']);
		$this->assign('error_code',$error_code);// 返回结果
		$this->display($template_html); // 输出模板
	}

	//根据省市 获取药店
	public function city_yd_list()
	{

		$province_id=I('post.pid',"2");
		$city_id=I('post.city_id',"2");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//选择药店--
		$url = C("PATH_URL")."/interface/yc_doc/yd_all_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"consult_id" => "$consult_id",
			"province_id" => "$province_id",
			"city_id" => "$city_id",
		);
		$json = json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);
		$info['hos_id'] = $yd_list['0']['HOS_ID'];
		$info['hos_name'] = $yd_list['0']['HOS_NAME'];
		foreach ($yd_list as $key => $value)
        {
            $info['str'].="<option value='".$value['HOS_ID']."'>".$value['HOS_NAME']."</option>";
        }
         echo json_encode($info);

	}

	//根据药店id 获取药品
	public function get_product_append()
	{

		$hos_id = I("get.hos_id");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取药品列表
		$url = C("PATH_URL")."/interface/yc_doc/product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"product_name"=>"$product_name",
			"hos_id"=>"$hos_id",
			"record_id"=>"$record_id"
		);
		$json=json_encode($data);
		$product_list =json_decode(post_json($url,$json),true);

		$this->assign('product_list',$product_list);
		include COMMON_PATH.'/Common/load_more.php';
	}

	 // ajax获取市
    public function city_list()
    {
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        $jiekou = C("PATH_URL");

        $province_id=I('post.city_id',"2");

        $url =$jiekou."/interface/yc_member/city_list.aspx?access_token=".$token;
        $posdata = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id"
        );
        $json=json_encode($posdata);
        $row = json_decode(post_json($url,$json),true);

        $str ="<option value='0'>请选择</option>";
        
        foreach ($row as $key => $value)
        {
            $str.="<option value='".$value['CITY_ID']."'>".$value['CITY_NAME']."</option>";
        }
         echo $str;
    }

	public function mb_pr_list_append()
	{
		$mb_id = I('get.yd_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/expert_mb_product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"mb_id" => "$mb_id"
		);
		$json=json_encode($data); 
		$product_list = json_decode(post_json($url,$json),true);
		if(!empty($product_list)){
			foreach ($product_list as $key => $value) {
				$product_list[$key]['JL_NUM'] = str_replace("#","",$product_list[$key]['JL_NUM']);
			}
		}

		$this->assign('product_list',$product_list);
		include COMMON_PATH.'/Common/load_more.php';
	}

	public function yaopin_list_append()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$page_num = I('get.page_num', '2');
		$product_name = I('get.name', '');
		$hos_id = I('get.yd_id', '');
		$product_id = I('get.product_id');
		$url = C("PATH_URL")."/interface/yc_doc/product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "$page_num",
			"product_name"=>"$product_name",
			"hos_id"=>"$hos_id",
			"record_id"=>"$record_id"
		);
		$json=json_encode($data); 
		$product_list = json_decode(post_json($url,$json),true);
		$this->assign('product_list',$product_list);
		include COMMON_PATH.'/Common/load_more.php';
	}

	//处方单独出来 提交成功
	public function tj_ok()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//参数
		$yf_desc = I('post.yf_desc', '用法描述');	//获取提交手机号
		$member_phone = I('post.member_phone', '');	//获取提交手机号
		$consultContent = I('post.consultContent', '');	//处方内容描述
		$member_name = I('post.member_name','');		//获取姓名
		$member_sex = I('post.member_sex','');			//获取性别
		$member_age = I('post.member_age','');			//获取年龄
		$hos_id = I('post.hos_id', '0');  						//获取药店id 					
		$time = date("Y-m-d H:i:s",time());				//系统时间

		//echo $hos_id;die;
		//通过手机号获取患者的 member_id
		$url = C("PATH_URL")."/interface/yc_doc/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_mobile" => "$member_phone"
		);
		$json=json_encode($data); 
		$list = json_decode(post_json($url,$json),true);
		$member_id = $list['MEMBER_ID'];
	
		//获取base64图片字符串
		$imgbase64 = $_POST['imgbase64'];
		if(empty($imgbase64))
		{
			//上传错误提示错误信息
			$pic_path = "";
			//echo "空值";
		}
		else if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
		{
			//匹配出图片的格式
			$type = $result[2]; //图片类型
			$type = str_replace("jpeg","jpg", $type);
			$new_file = "./Public/Uploads/cf/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名

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
				$image->thumb(500, 1000)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}

		//往正式处方表添加信息
		$product_arr = I('post.product', '');		//信息数组
		$product_values = "";						//药品id集
		$product_num = "";							//药品数量集
		$product_yl = "";							//药品用量集
		$product_jl	= "";							//药品剂量集
		$product_jldw = "";						    //计量单位
		$product_moneys = "";						//药品单价

		for( $i = 0; $i < count($product_arr); $i ++)
		{
			if($i != count($product_arr) - 1)
			{
				$product_values = $product_values.$product_arr[$i].",";
				
				$product_num = $product_num.I('post.num_'.$product_arr[$i], '').",";
				$product_yl = $product_yl.I('post.yl_'.$product_arr[$i],'').",";
				$product_jldw = I('post.jldw_'.$product_arr[$i],'');
				$product_jl = $product_jl.I('post.jl_'.$product_arr[$i],'').$product_jldw.",";
				$product_moneys = $product_moneys.I('post.dj_'.$product_arr[$i],'').",";
			}
			else
			{
				$product_values = $product_values.$product_arr[$i];
				
				$product_num = $product_num.I('post.num_'.$product_arr[$i], '');
				$product_yl = $product_yl.I('post.yl_'.$product_arr[$i],'');
				$product_jldw = I('post.jldw_'.$product_arr[$i],'');
				$product_jl = $product_jl.I('post.jl_'.$product_arr[$i],'').$product_jldw;
				$product_moneys = $product_moneys.I('post.dj_'.$product_arr[$i],'');
			}
		}
		//生成处方订单
		$url = C("PATH_URL")."/interface/yc_doc/doc_cf_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_mobile"=>"$member_phone",
			"cf_content"=>"$consultContent",
			"cf_pic"=>"$pic_path",
			"member_id"=>"$member_id",
			"member_name"=>"$member_name",
			"hos_id"=>"$hos_id",
			"product_data"=>"$product_values",
			"product_num"=>"$product_num",
			"member_sex" => "$member_sex",
			"member_age" => "$member_age",
			"yl_num" => "$product_yl",
			"jl_num" => "$product_jl",
			"product_moneys" => "$product_moneys",
			"yf_desc" => "$yf_desc"
		);
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		$error_code = $data["error_code"];

		//添加后状态返回 
		if( $error_code == "ok")
		{
			//print_r($data["order_id"]);die;
			//$text = "您好！处方已为您开出.流水号：".$data["order_id"]."时间：".$time."【远程慧视】";
			//$text = "您接收的短信为电子处方服务，您需要前去xxxxx取药，地址：xxxxxxxxxxx，订单号：".$data["order_id"]."，请您妥善保管此短信内容，祝您健康。（24小时有效）如有需要请联系：010-59424811【远程视界专家】";
			//sed_mstext($member_phone,$text);
			$this->redirect("?m=Expert&c=Cf&a=cf_list");	
		}
		else
		{
			$this->redirect("?m=Expert&c=Cf&a=cf_addm&error_code=$error_code");
		}
	}

	//检测患者是否存在
	public function checkphone()
	{	
		$member_phone = I('post.member_phone', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_doc/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"member_mobile"	=>"$member_phone"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		//print_R($user_info);die;
		if($user_info['MEMBER_ID'])
		{
			if($user_info['MEMBER_NAME'])
			{
				echo json_encode($user_info);
			}else
			{
				echo "1";	//患者已注册，但未补全信息
			}
		}else
		{
			echo 0;
		}
	}

	public function cf_add_mb()
	{
		$province_id = I('post.province_id', '0');
		$city_id = I('post.city_id', '0');
		$consult_id = I('get.consult_id', '0'); //咨询id
		$type = I('get.type', '0'); //咨询id

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_doc/yd_all_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"consult_id" => "$consult_id",
			"province_id" => "$province_id",
			"city_id" => "$city_id",
		);
		$json = json_encode($data);
		$yd_list = json_decode(post_json($url,$json),true);

		$this->assign('empty','<option>暂未指定药店</option>');
		$this->assign('yd_list',$yd_list);// 赋值数据集

		//获取第一药店对应产品
		$yd_id = $yd_list['0']['HOS_ID'];
		$url = C("PATH_URL")."/interface/yc_doc/cf_yp_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num" => "1",
			"product_name" => "$product_name",
			"product_id"=>"$product_id",
			"hos_id"=>"$hos_id",
			"type_id" => "",
			"record_id"=>"$record_id"
		);
		$json=json_encode($data); 
		$product_list = json_decode(post_json($url,$json),true);

		$this->assign('product_list',$product_list);
		$this->assign('type',$type);
		$this->assign('consult_id',$consult_id);
		$this->display();
	}


	//处方单独出来 提交成功
	public function tj_cfmb_ok()
	{
		$consult_id = I('get.consult_id', '0'); //咨询id
		$type = I('get.type', '0'); //咨询id

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//参数
		$province_id = I('post.province_id', '0');
		$city_id = I('post.city_id', '0');
		$yf_desc = I('post.yf_desc','用法描述');		//获取预设处方名称
		$cfmb_name = I('post.cfmb_name','');		//获取预设处方名称
		// $yd_id = I('post.yd_id','');					//获取药店id
		$time = date("Y-m-d H:i:s",time());				//系统时间
		
		//往预设处方模板添加信息
		$product_arr = I('post.product', '');		//信息数组
		$product_values = "";						//药品id集
		$product_num = "";							//药品数量集
		$product_yl = "";							//药品用量集
		$product_jl	= "";							//药品剂量集
		$product_jldw = "";						    //计量单位
		for( $i = 0; $i < count($product_arr); $i ++)
		{
			if($i != count($product_arr) - 1)
			{
				$product_values = $product_values.$product_arr[$i].",";
				
				$product_num = $product_num.I('post.num_'.$product_arr[$i], '').",";
				$product_yl = $product_yl.I('post.yl_'.$product_arr[$i],'').",";
				$product_jldw = I('post.jldw_'.$product_arr[$i],'');
				$product_jl = $product_jl.I('post.jl_'.$product_arr[$i],'').$product_jldw.",";
			}
			else
			{
				$product_values = $product_values.$product_arr[$i];
				
				$product_num = $product_num.I('post.num_'.$product_arr[$i], '');
				$product_yl = $product_yl.I('post.yl_'.$product_arr[$i],'');
				$product_jldw = I('post.jldw_'.$product_arr[$i],'');
				$product_jl = $product_jl.I('post.jl_'.$product_arr[$i],'').$product_jldw;
			}
		}

		$url = C("PATH_URL")."/interface/yc_doc/doc_cf_mb_add.aspx?access_token=".$token;
		$data = array
		(
			"openid" => "$openid",
			"mb_name" => "$cfmb_name",
			"product_data" => "$product_values",
			"product_num" => "$product_num",
			"yl_num" => "$product_yl",
			"jl_num" => "$product_jl",
			"yf_desc" => "$yf_desc" //用法描述
		);
		$json=json_encode($data);
		$data =json_decode(post_json($url,$json),true);
		if($data["error_code"] = "ok")
		{
			$this->redirect("?m=Expert&c=Cf&a=cf_mb_list&type=$type&consult_id=$consult_id");	
		}
		else
		{
			$this->redirect("?m=Expert&c=Cf&a=cf_add_mb");
		}
	}

	public function cf_mb_list()
	{

		$type = I('get.type', '0');
		$consult_id = I('get.consult_id', '0');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取预设处方名称列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_mb_list.aspx?access_token=".$token;
		$data = array
		(
			"openid" => "$openid",
		);
		$json = json_encode($data);

		$cfname_list = json_decode(post_json($url,$json),true);
		$counts = count($cfname_list);
		$this->assign('empty','<option>暂未预设处方</option>');
		$this->assign('counts',$counts);// 处方个数
		$this->assign('cfname_list',$cfname_list);// 赋值数据集

		$mb_id=I('get.yd_id',$cfname_list[0][MB_ID]);

		$url = C("PATH_URL")."/interface/yc_doc/expert_mb_product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"mb_id" =>"$mb_id"
		);
		$json=json_encode($data); 
		$product_list = json_decode(post_json($url,$json),true);
		if(!empty($product_list)){
			foreach ($product_list as $key => $value) {
				$product_list[$key]['JL_NUM'] = str_replace("#","",$product_list[$key]['JL_NUM']);
			}
		}

		$this->assign('product_list',$product_list);
		$this->assign('consult_id',$consult_id);
		$this->assign('type',$type);
		$this->display(); // 输出模板
		
	}

	public function cf_mb_list_append()
	{
		$mb_id = I('get.yd_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/expert_mb_product_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"mb_id" => "$mb_id"
		);
		$json=json_encode($data); 
		$product_list = json_decode(post_json($url,$json),true);
		if(!empty($product_list)){
			foreach ($product_list as $key => $value) {
				$product_list[$key]['JL_NUM'] = str_replace("#","",$product_list[$key]['JL_NUM']);
			}
		}

		$this->assign('product_list',$product_list);
		include COMMON_PATH.'/Common/load_more.php';
	}

	//删除处方信息
	public function cf_mb_del()
	{
		$mb_id = I('post.yd_id', '');
		$type = I('get.type', '0');
		$consult_id = I('get.consult_id', '0');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_doc/doc_cf_mb_delete.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"mb_id" => "$mb_id"
		);
		$json=json_encode($data); 
		$data = json_decode(post_json($url,$json),true);

		if($data["error_code"] = "ok")
		{
			$this->redirect("?m=Expert&c=Cf&a=cf_mb_list&type=$type&consult_id=$consult_id");	
		}
		else
		{
			$this->redirect("Expert/Cf/cf_mb_list");
		}
	}
}