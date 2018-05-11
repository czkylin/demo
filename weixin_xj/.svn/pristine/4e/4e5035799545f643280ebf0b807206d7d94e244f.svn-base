<?php
namespace Expert\Controller;
use Think\Controller;
class PaymentController extends Controller
{
	// 首页
	public function mypayment()
	{
        $jifen_date = I("get.jifen_date",date("Y-m"));

		//获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        ////获取医生收入总数
        $url = C("PATH_URL")."/interface/yc_doc/expert_money_sum.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "jifen_date"=>"$jifen_date"
        );
        $json = json_encode($data);
        $doc_money = json_decode(post_json($url,$json),true);

        //获取收入总数
        $url = C("PATH_URL")."/interface/yc_doc/doc_my_count.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "jifen_date"=>"$jifen_date"
        );
        $json = json_encode($data);
        $sr_sum = json_decode(post_json($url,$json),true);

        $wz_sum = $sr_sum[0]['WZ_SUM'] ? $sr_sum[0]['WZ_SUM'] : 0 ; //问诊数
        $cf_sum = $sr_sum[0]['CF_SUM'] ? $sr_sum[0]['CF_SUM'] : 0 ; //处方数
        $yp_sum = $sr_sum[0]['YP_SUM'] ? $sr_sum[0]['YP_SUM'] : 0 ; //阅片数

        //收入列表
        $income_date =date("Y-m");

        $url = C("PATH_URL")."/interface/yc_doc/expert_income_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "income_date"=>"$income_date",
        );
        $json = json_encode($data);
        $sr_list = json_decode(post_json($url,$json),true);

        $this->assign("wz_sum",$wz_sum);
        $this->assign("cf_sum",$cf_sum);
        $this->assign("yp_sum",$yp_sum);

        $this->assign("sr_list",$sr_list[0]);
        $this->assign("jifen_date",$jifen_date);
        $this->assign("doc_money",$doc_money);
		$this->display();
	}

    public function detailed()
    {

        $this->display();
    }

    //转出到银行卡
    public function money_card()
    {
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //获取收入总数
        $url = C("PATH_URL")."/interface/yc_doc/bank_card_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
        );
        $json = json_encode($data);
        $card = json_decode(post_json($url,$json),true);
        if(empty($card)){

            $html = "band_card";

        }else{

            //收入列表
            $income_date =date("Y-m");

            $url = C("PATH_URL")."/interface/yc_doc/expert_money_sum.aspx?access_token=".$token;
            $data = array
            (
                "openid"=>"$openid",
                "income_date"=>"$income_date",
            );
            $json = json_encode($data);
            $sr_list = json_decode(post_json($url,$json),true);
            $money = $sr_list['total_money'];
            $total_money = $money ? $money :0 ;

            $html = "money_card";
            $this->assign("total_money",$total_money);
        }

        $card_num = substr($card[0]['CARD_NUM'],-4);
        $bank_name = $card[0]['BANK_NAME'];

        $this->assign("card_num",$card_num);
        $this->assign("bank_name",$bank_name);
        $this->assign("card_id",$card[0]['CARD_ID']);
        $this->display($html);
    }

    //添加银行卡

    public function add_card()
    {
        $this->display();
    }

    //增加银行卡 
    public function add_card_do()
    {

        $real_name = I("post.real_name");
        $id_card = I("post.id_card");
        $bank_name = I("post.bank_name");
        $card_num = I("post.card_num");
        $link_mobile = I("post.link_mobile");

        //获取平台的access_token
        $token = A_token();

        //获取openid 
        include MODULE_PATH.'/Common/open_id.php';

        //获取收入总数
        $url = C("PATH_URL")."/interface/yc_doc/bank_card_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "real_name"=>"$real_name",
            "id_card"=>"$id_card",
            "card_num"=>"$card_num",
            "bank_name"=>"$bank_name",
            "link_mobile"=>"$link_mobile",
        );
        $json = json_encode($data);
        $info = json_decode(post_json($url,$json),true);

        if($info['error_code'] == "ok"){

            $this->redirect("?m=Expert&c=Payment&a=money_card"); 

        }else{

            $this->redirect("?m=Expert&c=Payment&a=mypayment"); 
        }
    }

   //提现
    public function band_card_tx()
    {
     
        $card_id = I("post.card_id");
        $tx_money = I("post.total"); //提现的钱
        $total_money = I("post.total_money"); //总钱数
        if($total_money>=$tx_money)
        {

             //获取平台的access_token
            $token = A_token();

            //获取openid 
            include MODULE_PATH.'/Common/open_id.php';

            //获取提现添加
            $url = C("PATH_URL")."/interface/yc_doc/bank_card_tx_add.aspx?access_token=".$token;
            $data = array
            (
                "openid"=>"$openid",
                "card_id"=>"$card_id",
                "tx_money"=>"$tx_money"
            );
            $json = json_encode($data);
            $info = json_decode(post_json($url,$json),true);
            header("Content-Type:text/html;charset=utf-8");
            if($info['error_code'] == "ok")
            {

                echo "<script> alert('提现成功！'); location.href='index.php?m=Expert&c=Payment&a=band_card_list&type=2'</script>";
            }
            else
            {

                echo "<script> alert('提现失败！'); location.href='index.php?m=Expert&c=Payment&a=mypayment'</script>";
            }
            
        }
        else
        {

            $this->redirect("?m=Expert&c=Payment&a=mypayment");
        }
       
    }

    //提现列表 
    public function band_card_list()
    {
        $jifen_date = I("get.jifen_date",date("Y-m"));
        $type = I("get.type",1);

         //获取openid 
        include MODULE_PATH.'/Common/open_id.php';

         //获取平台token
        $token = A_token();
        
        //获取提现列表
        $url = C("PATH_URL")."/interface/yc_doc/bank_card_tx_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "jifen_date"=>"$jifen_date",
            "page_num"=>"1"
        );

        $json = json_encode($data);
        $card_list = json_decode(post_json($url,$json),true);

        //获取总金额列表
        $url = C("PATH_URL")."/interface/yc_doc/expert_money_item.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "jifen_date"=>"$jifen_date"
        );
        $json = json_encode($data);
        $money_list = json_decode(post_json($url,$json),true);
      	$this->assign("data",$money_list);
      	$this->assign("card_list",$card_list);
        $this->assign("jifen_date",$jifen_date);
       	$this->assign("type",$type);
       	$this->display();
	}

     //提现加载更多列表
    public function card_list_append()
    {
        
        $page_num = I("get.page_num","2");

        //获取openid 
        include MODULE_PATH.'/Common/open_id.php';

         //获取平台token
        $token = A_token();
        
        //获取提现列表
        $url = C("PATH_URL")."/interface/yc_doc/bank_card_tx_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"$page_num"
        );
        $json = json_encode($data);
        $card_list = json_decode(post_json($url,$json),true);
        $this->assign("card_list",$card_list);
        //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }
      //收入列表
    public function money_list()
    {

        $order_type = I("get.order_type","cf");
        $jifen_date = I("get.jifen_date",date("Y-m"));

         //获取openid 
        include MODULE_PATH.'/Common/open_id.php';

         //获取平台token
        $token = A_token();
        
        //获取提现列表
        $url = C("PATH_URL")."/interface/yc_doc/expert_money_item_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"1",
            "jifen_date"=>"$jifen_date",
            "order_type"=>"$order_type"
        );
        $json = json_encode($data);
        $money_list = json_decode(post_json($url,$json),true);

        $this->assign("money_list",$money_list);
        $this->assign("order_type",$order_type);
        $this->display();
    }

       //收入列表加载更多
    public function money_list_append()
    {

        $page_num = I("get.page_num","2");
        $order_type = I("get.order_type","cf");
        $jifen_date = I("get.jifen_date",date("Y-m"));

         //获取openid 
        include MODULE_PATH.'/Common/open_id.php';

         //获取平台token
        $token = A_token();
        
        //获取提现列表
        $url = C("PATH_URL")."/interface/yc_doc/expert_money_item_info.aspx?access_token=".$token;
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

    public function money_detail()
    {

        $order_id = I('get.order_id');//获取get变量
        $type = I('get.type',"1");
        $page_num = I("post.page_num",1);

        //获取平台token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';
        
        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        if($type=="1")
        {
            //获取处方详情
            $url = C("PATH_URL")."/interface/yc_doc/order_info.aspx?access_token=".$token;
            $data = array
            (
                "openid"=>"$openid",
                "order_id"=>"$order_id"
            );
            $json=json_encode($data);
            $order_info = json_decode(post_json($url,$json),true);

            $this->assign("order_money",$order_info[0]['ORDER_MONEY']);
            $this->assign("order_name",$order_info[0]['ORDER_NAME']);
            $this->assign("order_date",$order_info[0]['CREATE_DATE']);
            $html = "money_detail";

        }
        else if($type=="2")
        {
             //获取提现详情
            $url = C("PATH_URL")."/interface/yc_doc/bank_card_tx_detail.aspx?access_token=".$token;
            $data = array
            (
                "openid"=>"$openid",
                "tx_id"=>"$order_id"
            );

            $json = json_encode($data);
            $detail = json_decode(post_json($url,$json),true);

            $this->assign("TX_MONEY",$detail[0]['TX_MONEY']);
            $card_num = substr($detail[0]['CARD_NUM'],-4);
            $this->assign("card_num",$card_num);
            $this->assign("BANK_NAME",$detail[0]['BANK_NAME']);
            $this->assign("CREATE_DATE",$detail[0]['CREATE_DATE']);
            $this->assign("TX_MONEY",$detail[0]['TX_MONEY']);
            $html = "bank_detail";
        } 
        
        $this->display($html);
    }

}