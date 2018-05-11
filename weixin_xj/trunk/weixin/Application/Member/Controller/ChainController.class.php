<?php
namespace Member\Controller;
use Think\Controller;
//合作医院类
class ChainController extends Controller
{
    public function chain_list()
    {
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        $province_id = I('get.province_id', '');
        $city_id = I('get.city_id', '');
        $district_id = I('get.district_id', '');
        $hos_name = I('get.hos_name', '');

        // 获取省份
        $url = C("PATH_URL")."/interface/yc_member/province_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $data_pre = json_decode(post_json($url,$json),true);
        $url = C("PATH_URL")."/interface/yc_member/hos_xy_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "city_id"=>"$city_id",
            "district_id"=>"$district_id",
            "hos_name"=>"$hos_name",
            "page_num"=>"1"
        );
        $json=json_encode($data);
        $list = json_decode(post_json($url,$json),true);

        $this->assign('list',$list);
        $this->assign('province_id',$province_id);
        $this->assign('city_id',$city_id);
        $this->assign('district_id',$district_id);
        $this->assign('hos_name',$hos_name);
        $this->assign('data_pre',$data_pre);    
        $this->display();
    }
    public function chain_list_append()
    {
         //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        $province_id = I('get.province_id', '');
        $city_id = I('get.city_id', '');
        $district_id = I('get.district_id', '');
        $hos_name = I('get.hos_name', '');
        $page_num = I('get.page_num', '1');
        $url = C("PATH_URL")."/interface/yc_member/hos_xy_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "city_id"=>"$city_id",
            "district_id"=>"$district_id",
            "hos_name"=>"$hos_name",
            "page_num"=>"$page_num"
        );
        $json=json_encode($data);
        $list = json_decode(post_json($url,$json),true);

        $this->assign('list',$list);
        $this->assign('province_id',$province_id);
        $this->assign('city_id',$city_id);
        $this->assign('district_id',$district_id);
        $this->assign('hos_name',$hos_name);
        $this->assign('data_pre',$data_pre);
        include COMMON_PATH.'/Common/load_more.php';
    }
    //详情
    public function chain_detail()
    {

        $hos_id = I('get.hos_id', '397424');

        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        //获取订单列表满足查询条件的
        $url = C("PATH_URL")."/interface/yc_member/hos_xy_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "hos_id"=>"$hos_id"
        );
        $json=json_encode($data);
        $info = json_decode(post_json($url,$json),true);

        $this->assign('info',$info);
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

        $url = C("PATH_URL")."/interface/yc_member/city_list.aspx?access_token=".$token;
        $posdata = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id"
        );
        $json=json_encode($posdata);
        $row = json_decode(post_json($url,$json),true);

        $str="<i></i><a href='javascript:void(0);' onClick=search_list('','cty','','')>全部</a>";
        
        foreach ($row as $key => $value)
        {
            $str.="<a href='javascript:void(0);' onClick=search_list('',".$value['CITY_ID'].",'','');>".$value['CITY_NAME']."</a>";
        }
        echo $str;
    }
    // ajax获取县
    public function district_list()
    {
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        $city_id = I('post.city_id','2');

        $url = C("PATH_URL")."/interface/yc_member/district_list.aspx?access_token=".$token;
        $posdata = array
        (
            "openid"=>"$openid",
            "city_id"=>"$city_id"
        );
        $json= json_encode($posdata);
        $row = json_decode(post_json($url,$json),true);
        $str="<i></i><a href='javascript:void(0);' onClick=search_list('','','con','')>全部</a>";

        foreach ($row as $key => $value)
        {
            $str.="<a href='javascript:void(0);' onClick=search_list('','',".$value['DISTRICT_ID'].",'');>".$value['DISTRICT_NAME']."</a>";
        }
        echo $str;
    }
	
}