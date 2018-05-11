<?php
namespace Expert\Controller;
use Think\Controller;
class LoverankController extends Controller
{
	// 首页
	public function daiyan_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取个人三级分销明细信息
		$url = C("PATH_URL")."/interface/yc_doc/my_three_sale_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"m_token_id"=>C('M_TOKEN_ID'),
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$daiyan_list = json_decode(post_json($url,$json),true);
		//var_dump($daiyan_list);

		$this->assign("daiyan_list",$daiyan_list);
		$this->display();
	}


	//修改卡号
	public function update_card()
	{
		
		//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$card_number = I("post.card_number",0);
		$buy_id = I("post.buy_id",0);

		//修改卡号
		$url = C("PATH_URL")."/interface/yc_doc/hz_card_update.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"buy_id"=>"$buy_id"
		);
		$json=json_encode($data);
		$res =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($res);
	}

    //我的代言明细
    public function daiyan_list_append()
    {
    	$page_num = I('get.page_num', '2');
    	
        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取个人三级分销明细信息
		$url = C("PATH_URL")."/interface/yc_doc/my_three_sale_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"m_token_id"=>C('M_TOKEN_ID'),
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$daiyan_list = json_decode(post_json($url,$json),true);
		// var_dump($daiyan_list);

		$this->assign("daiyan_list",$daiyan_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
    }

	// 首页
	public function rank_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		
		//百倍爱心卡排行
        $url=C("PATH_URL")."/interface/yc_doc/jyzr_sale_pm_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num" =>"1",
            "my_flag" =>"0"
        );
        $json=json_encode($data);
        $rank_list = json_decode(post_json($url,$json),true);

        //自己排名
        $url = C("PATH_URL")."/interface/yc_doc/my_sale_pm_list.aspx";
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $selfrank  = json_decode(post_json($url,$json),true);
        // var_dump($url,$json,post_json($url,$json));
		$this->assign('list',$rank_list);
		$this->assign('rank_list',$selfrank[0]);
		$this->display();
	}

	public function rank_list_append()
    {
    	$page_num = I('get.page_num','');

        //获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		

		$url=C("PATH_URL")."/interface/yc_doc/jyzr_sale_pm_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num" =>"$page_num",
            "my_flag" =>"0"
        );
        $json=json_encode($data);
        $rank_list = json_decode(post_json($url,$json),true);

		$this->assign('list',$rank_list);
		include COMMON_PATH.'/Common/load_more.php';
    }





}