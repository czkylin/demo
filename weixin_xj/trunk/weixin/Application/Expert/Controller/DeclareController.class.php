<?php
namespace Expert\Controller;
use Think\Controller;
class DeclareController extends Controller
{
	//手术申报
	public function apply()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$jiekou = C("PATH_URL");
		// 获取省份
		$url = $jiekou."interface/yc_doc/province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign('data',$data);

		//获取手术类型
		$url = $jiekou."interface/yc_doc/declare_type.aspx?access_token=".$token;
		$data2 = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data2);
		$data2 = json_decode(post_json($url,$json),true);

		$this->assign('data2',$data2);

		$this->display();
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

		$province_id=I('post.province_id',"2");
	
		$jiekou = C("PATH_URL");

		$url = $jiekou."interface/yc_doc/city_list.aspx?access_token=".$token;
		$posdata = array
		(
			"openid"=>"$openid",
			"province_id"=>"$province_id"
		);
		$json=json_encode($posdata);
		/*echo "$json";die;*/
		$row = json_decode(post_json($url,$json),true);
		
		$str='<div class="ss swiper-slide text-center" value="kong">请选择</div>';
	
		foreach ($row as $key => $value)
		{
			$str.='<div class="ss swiper-slide text-center"   value='.$value[CITY_ID].'>'.$value['CITY_NAME'].'</div>';
		}
		echo $str;

	}
	
	// ajax获取医院
	public function hos_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$jiekou = C("PATH_URL");

		$city_id = I('post.city_id','2');
		$url = $jiekou."interface/yc_doc/hospital_list.aspx?access_token=".$token;
		$posdata = array
		(
			"openid"=>"$openid",
			"city_id"=>"$city_id"
		);
		$json= json_encode($posdata);
		$row = json_decode(post_json($url,$json),true);
		
		$str='<div class="ss swiper-slide text-center" value="kong">请选择</div>';
	
		foreach ($row as $key => $value)
		{
			$str.='<div class="ss swiper-slide text-center"   value='.$value[HOS_ID].'>'.$value['HOS_NAME'].'</div>';
		}
		echo $str;
	}
	
	public function apply_list(){

		$page_num = I('get.page_num',1);

		//获取openid 
        include MODULE_PATH.'/Common/open_id.php';

         //获取平台token
        $token = A_token();
        
        //手术列表
      	$url = C("PATH_URL")."/interface/yc_doc/expert_ss_list.aspx?access_token=".$token;
        //$url ="http://172.16.17.55/interface/yc_doc/expert_ss_list.aspx?access_token=".$token; 
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"$page_num",
        );
        $json = json_encode($data);
        $ss_list = json_decode(post_json($url,$json),true);
        $this->assign("ss_list",$ss_list);
		$this->display();
	}

    public function apply_list_append()
    {
        $page_num =I('get.page_num','2');

        //获取平台token
        $token = A_token();

        //获取openid 
        include MODULE_PATH.'/Common/open_id.php';

       //我的手术立项
        $url = C("PATH_URL")."/interface/yc_doc/expert_ss_list.aspx?access_token=".$token;
        //$url ="http://172.16.17.55/interface/yc_doc/expert_ss_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"$page_num",
        );
        $json = json_encode($data);
        $ss_list = json_decode(post_json($url,$json),true);
        $this->assign("ss_list",$ss_list);
        //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }
    
	//手术申报提交数据
	public function apply_add()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$ss_id = I('get.id');
		
		$jiekou = C("PATH_URL");

		//手术申报提交数据
		$url = C("PATH_URL")."/interface/yc_doc/expert_ss_apply_add.aspx?access_token=".$token;
		//$url = "http://172.16.17.55/interface/yc_doc/expert_ss_apply_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"ss_id" =>"$ss_id" ,//手术
		);
		$json=json_encode($data);

		$data = json_decode(post_json($url,$json),true);

		if($data['error_code']=="ok")
		{

			$this->redirect("?m=Expert&c=Declare&a=myapply_list"); 
		}else
		{

			$this->redirect("?m=Expert&c=Declare&a=apply_list"); 
		}
		
	}
	//我的手术立项
	public function myapply_list()
	{
		//获取openid 
        include MODULE_PATH.'/Common/open_id.php';

         //获取平台token
        $token = A_token();
        
       //我的手术立项
        $url = C("PATH_URL")."/interface/yc_doc/expert_ss_apply_list.aspx?access_token=".$token;
        //$url ="http://172.16.17.55/interface/yc_doc/expert_ss_apply_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"1",
        );
        $json = json_encode($data);
        $ss_list = json_decode(post_json($url,$json),true);

        $this->assign("ss_list",$ss_list);
		$this->display();
	}
	//我的手术立项
	public function myapply_list_append()
	{
		$page_num =I('get.page_num','2');

        //获取平台token
        $token = A_token();

		//获取openid 
        include MODULE_PATH.'/Common/open_id.php';

       //我的手术立项
        $url = C("PATH_URL")."/interface/yc_doc/expert_ss_apply_list.aspx?access_token=".$token;
        //$url ="http://172.16.17.55/interface/yc_doc/expert_ss_apply_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"$page_num",
        );
        $json = json_encode($data);
        $ss_list = json_decode(post_json($url,$json),true);
        $this->assign("ss_list",$ss_list);
        //输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}
	
} 