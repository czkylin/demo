<?php
namespace Home\Controller;
use Think\Controller;
class PaymentController extends Controller {
    // 首页
	public function mypayment()
	{
		//获取平台的access_token
        $token = A_token();

        $jifen_date = I("get.jifen_date",date("Y-m"));
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        ////获取医生收入总数
        $url = C("PATH_URL")."/interface/yc_hos/jyzr_money_sum.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "jifen_date"=>"$jifen_date"

        );
        $json = json_encode($data);
        $doc_money = json_decode(post_json($url,$json),true);

        $url = C("PATH_URL")."/interface/yc_hos/jyzr_money_item.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "jifen_date"=>"$jifen_date"
        );
        $json = json_encode($data);
        //echo $json;
        $money_list = json_decode(post_json($url,$json),true);
        $this->assign("jifen_date",$jifen_date);
      // print_R($doc_money);
      	$this->assign("data",$money_list);
        $this->assign("doc_money",$doc_money);
		$this->display();
	}


	  //收入详细
    public function money_list()
    {

        $order_type = I("get.order_type","tj");
        $jifen_date = I("get.jifen_date",date("Y-m"));

         //获取openid 
        include MODULE_PATH.'/Common/open_id.php';

         //获取平台token
        $token = A_token();
        
        //收入详细
        $url = C("PATH_URL")."/interface/yc_hos/jyzr_money_item_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"1",
            "jifen_date"=>"$jifen_date",
            "order_type"=>"$order_type"
        );
        $json = json_encode($data);
        $money_list = json_decode(post_json($url,$json),true);

        $this->assign("jifen_date",$jifen_date);
        $this->assign("money_list",$money_list);
        $this->assign("order_type",$order_type);
        $this->display();
    }

        //收入详细加载更多
    public function money_list_append()
    {

        $page_num = I("get.page_num","2");
        $order_type = I("get.order_type","tj");
        $jifen_date = I("get.jifen_date",date("Y-m"));

         //获取openid 
        include MODULE_PATH.'/Common/open_id.php';

         //获取平台token
        $token = A_token();
        
        //收入详细
        $url = C("PATH_URL")."/interface/yc_hos/jyzr_money_item_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"$page_num",
            "jifen_date"=>"$jifen_date",
            "order_type"=>"$order_type"
        );
        $json = json_encode($data);
        $money_list = json_decode(post_json($url,$json),true);
        $this->assign("money_list",$money_list);
       //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }
}