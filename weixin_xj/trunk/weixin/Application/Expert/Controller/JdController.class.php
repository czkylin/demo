<?php
namespace Expert\Controller;
use Think\Controller;

class JdController extends Controller
{
	//政策解读-频道页
	public function jd_index()
	{
         $type_id = I('get.type_id', '123');
        $province_id = I('get.province_id', '');

        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/union_act_wqhg.aspx?access_token=".$token;;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "tj_flag"=>"",
            "get_num"=>"10",
            "page_num"=>"1"

        );
        $json=json_encode($data);
        $wjhd_act_list = json_decode(post_json($url,$json),true);

        $this->assign('act_list',$wjhd_act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
        $this->display();
    }

    //加载页面
    //政策解读-频道页
    public function append_index()
    {
        $page_num = I('get.page_num', '2');
        $type_id = I('get.type_id', '123');
        $province_id = I('get.province_id', '');

        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/union_act_wqhg.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "tj_flag"=>"",
            "get_num"=>"10",
            "page_num"=>"$page_num"

        );
        $json=json_encode($data);
        $hdyg_act_list = json_decode(post_json($url,$json),true);
        $this->assign('act_list',$hdyg_act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
       //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }

    //远程头天-列表页
    public function yctt_list()
    {
         $type_id = I('get.type_id', '123');
        $province_id = I('get.province_id', '');

        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/union_act_wqhg.aspx?access_token=".$token;;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "tj_flag"=>"",
            "get_num"=>"10",
            "page_num"=>"1"

        );
        $json=json_encode($data);
        $wjhd_act_list = json_decode(post_json($url,$json),true);

        $this->assign('act_list',$wjhd_act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
        $this->display();
    }

    //加载页面
    //政策解读-频道页
    public function append_yctt_list()
    {
        $page_num = I('get.page_num', '2');
        $type_id = I('get.type_id', '123');
        $province_id = I('get.province_id', '');

        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/union_act_wqhg.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "tj_flag"=>"",
            "get_num"=>"10",
            "page_num"=>"$page_num"

        );
        $json=json_encode($data);
        $hdyg_act_list = json_decode(post_json($url,$json),true);
        $this->assign('act_list',$hdyg_act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
       //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }
    
    //政策解读-栏目列表页
    public function jd_list()
    {
    
        $type_id = I('get.type_id', C('TYPEID_ID7'));
        $province_id = I('get.province_id', '');
        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        
        //列表接口
        $url = C("PATH_URL")."/interface/yc_doc/union_act_all.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "page_rows"=>"10",
            "sort_type"=>"",
            "page_num"=>"1"
        );
        $json=json_encode($data);
        $act_list = json_decode(post_json($url,$json),true);
        $this->assign('act_list',$act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
        switch ($type_id)
        {
            case 82:
              $template_html="jd_list";//联盟风采1
              $list_title="病例展示";
              break;
            case 88:
              $template_html="jd_list";//学术动态2 
              $list_title="联盟头条";
              break;
            case 85:
                $template_html="jd_list";//公益慈善3 
                $list_title="医学专题";
                break; 
            default:
                $template_html="jd_list";//其他详情3
                $list_title="名医风采";
        
        }
        $this->assign('list_title',$list_title);
        $this->assign('type_id',$type_id);
        $this->display($template_html); // 输出模板

    }


    //政策解读-栏目列表页
    public function append_list()
    {
        $page_num = I('get.page_num', '2');
        $type_id = I('get.type_id', C('TYPEID_ID7'));
        $province_id = I('get.province_id', '');
        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //列表接口
        $url = C("PATH_URL")."/interface/yc_doc/union_act_all.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "page_rows"=>"10",
            "sort_type"=>"",
            "page_num"=>"$page_num"
        );
        $json=json_encode($data);
        $act_list = json_decode(post_json($url,$json),true);
        $this->assign('act_list',$act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
        $this->assign('list_title',$list_title);
        //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';

    }

    //政策解读——详情页
    public function jd_info()
    {
        $record_id = I('get.record_id', '');
        $type_id = I('get.type_id', '');

        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';
       
        //获取活动详情接口
        $url = C("PATH_URL")."/interface/yc_doc/union_act_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "record_id"=>"$record_id"
        );
        $json=json_encode($data);
        $act_info = json_decode(post_json($url,$json),true);
        $this->assign('act_info',$act_info);// 赋值数据集
        $this->assign('record_id',$record_id);// 赋值数据集

        $this->display(); // 输出模板

    }
    //活动预告
    public function hdyg_list()
    {
        $type_id = I('get.type_id',C('TYPEID_ID2'));
        $province_id = I('get.province_id', '');
        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/union_act_hdtz.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "tj_flag"=>"0",
            "get_num"=>"10",
            "page_num"=>"1"

        );
        $json=json_encode($data);
        $hdyg_act_list = json_decode(post_json($url,$json),true);
  
        $this->assign('act_list',$hdyg_act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
        $this->display();

    }
    //加载更多
      //活动预告
    public function append_hdyg_list()
    {
        $page_num = I('get.page_num', '2');
        $type_id = I('get.type_id',C('TYPEID_ID2'));
        $province_id = I('get.province_id', '');

        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/union_act_hdtz.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "tj_flag"=>"0",
            "get_num"=>"10",
            "page_num"=>"$page_num"

        );
        $json=json_encode($data);
        $hdyg_act_list = json_decode(post_json($url,$json),true);
  
        $this->assign('act_list',$hdyg_act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
       //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }
    //完结活动
    public function wjhd_list()
    {
        $type_id = I('get.type_id',C('TYPEID_ID2'));
        $province_id = I('get.province_id', '');

        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/union_act_wqhg.aspx?access_token=".$token;;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "tj_flag"=>"",
            "get_num"=>"10",
            "page_num"=>"1"

        );
        $json=json_encode($data);
        $wjhd_act_list = json_decode(post_json($url,$json),true);

        $this->assign('act_list',$wjhd_act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
        $this->display();

    }
    //加载更多
      //完结活动
    public function append_wjhd_list()
    {
         $page_num = I('get.page_num', '2');
        $type_id = I('get.type_id',C('HDTZ_ID'));
        $province_id = I('get.province_id', '');

        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/union_act_wqhg.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "province_id"=>"$province_id",
            "type_id"=>"$type_id",
            "tj_flag"=>"",
            "get_num"=>"10",
            "page_num"=>"$page_num"

        );
        $json=json_encode($data);
        $hdyg_act_list = json_decode(post_json($url,$json),true);
  
        $this->assign('act_list',$hdyg_act_list);// 赋值数据集
        $this->assign('province_id',$province_id);
        $this->assign('type_id',$type_id);
       //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }
}