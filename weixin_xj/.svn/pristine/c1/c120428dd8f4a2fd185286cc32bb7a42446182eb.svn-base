<?php
namespace Home\Controller;
use Think\Controller;
class ReturnController extends Controller {
    public function assistant()
    {
         //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        
        //医院列表
        $url=C("PATH_URL")."/interface/yc_hos/hk_search_hos.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "keygrow" =>""
        );
        $json=json_encode($data);
        $hos_list = json_decode(post_json($url,$json),true);

        $this->assign("hos_list",$hos_list);
        //print_R($hos_list);die;
        $this->display();
    }

    //手动搜索医院
    public function hos_list()
    {
         //获取平台的access_token
        $token = A_token();

        $keygrow = I("post.val");

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        
        //医院列表
        $url=C("PATH_URL")."/interface/yc_hos/hk_search_hos.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "keygrow" =>"$keygrow"
        );
        $json=json_encode($data);
        
        $hos_list = json_decode(post_json($url,$json),true);
        $this->ajaxReturn($hos_list);
        //print_R($hos_list);die;
        // foreach ($hos_list as $key => $value) {
        //    $html .= "<li hos_id='".$value['HOS_ID']."'>".$value['HOS_NAME']."</li>";
        // }
        // echo $html;
    }


    //回款提交

    public function hk_do()
    {
         //获取平台的access_token
        $token = A_token();

        $yl_money = I("post.yl_money","0");
        $hos_id = I("post.hos_id","0");
        $hc_money = I("post.hc_money","0");


        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        
        //医院列表
        $url=C("PATH_URL")."/interface/yc_hos/hk_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "yl_money" =>"$yl_money",
            "hos_id" =>"$hos_id",
            "hc_money" =>"$hc_money"
        );
        $json=json_encode($data);
        $result = json_decode(post_json($url,$json),true);

        if($result['error_code'] == "ok")
        {
            $this->redirect('?m=Home&c=Return&a=hk_list');
        }
        else
        {
            $this->redirect('?m=Home&c=Return&a=assistant');
        }
    }

    //回款列表

    public function hk_list()
    {
        $token = A_token();

        $keygrow = I("post.val");

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        
        //医院列表
        $url=C("PATH_URL")."/interface/yc_hos/hk_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num" =>"1", 
        );
        $json=json_encode($data);
        
        $hk_list = json_decode(post_json($url,$json),true);
        //print_R($hk_list);die;
        $this->assign("hk_list",$hk_list);
        $this->display();
    }

    //回款列表

    public function hk_detail()
    {
        $token = A_token();

        $record_id = I("get.record_id");

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        
        //医院列表
        $url=C("PATH_URL")."/interface/yc_hos/hk_detail.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "record_id" =>"$record_id", 
        );
        $json=json_encode($data);
        
        $hk_detail = json_decode(post_json($url,$json),true);
        //print_R($hk_detail);//die;
        $this->assign("hk_detail",$hk_detail[0]);
        $this->display();
    }
}
