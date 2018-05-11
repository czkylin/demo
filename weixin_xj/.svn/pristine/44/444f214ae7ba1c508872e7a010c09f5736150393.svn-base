<?php
namespace Expert\Controller;
use Think\Controller;
class UnexpController extends Controller
{
	//联盟专家——指南解读列表
    public function book_list()
    {
        //获取get传参
        $book_name = I('get.book_name', '');
        //$province_id = I('get.province_id', '');
        $book_type = I('get.type_id', '');
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //获取省份
        $url = C("PATH_URL")."/interface/yc_doc/union_province_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $province_list = json_decode(post_json($url,$json),true);
        //print_r($province_list);
        $this->assign('province_list',$province_list);// 赋值数据集

        
        //获取指南解读（对应电子书）列表接口
        $url = C("PATH_URL")."/interface/yc_doc/book_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "book_type"=>"$book_type",
            "book_name"=>"$book_name",
            "page_num"=>"1"
        );
        $json=json_encode($data);
        $book_list = json_decode(post_json($url,$json),true);
       // print_r($book_list);die;
        $this->assign('book_list',$book_list);// 赋值数据集
        $this->assign('name',$book_name);
        $this->assign('book_type',$book_type);
        $this->display(); // 输出模板
    }
    
    //联盟列表加载更多
    public function book_list_append()
    {
        $book_name = I('get.book_name','');
        $page_num = I('get.page_num', '2');
        $book_type = I('get.book_type', '');
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';


        //获取指南解读（对应电子书）列表接口
       $url = C("PATH_URL")."/interface/yc_doc/book_list.aspx?access_token=".$token;
       $data = array
        (
            "openid"=>"$openid",
            "book_type"=>"$book_type",
            "book_name"=>"$book_name",
            "page_num"=>"$page_num"
        );
        
        $json=json_encode($data);
        $book_list = json_decode(post_json($url,$json),true);
        $this->assign('book_list',$book_list);// 赋值数据集
        $this->assign('book_type',$book_type);
    
        //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';

    }

	//电子书 基本信息 章节列表
	public function book_info()
	{
		$book_id = I('get.book_id', '455503');
        $book_type = I('get.type_id', '');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取省数据
		$url = C("PATH_URL")."/interface/yc_doc/union_province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$province_list = json_decode(post_json($url,$json),true);
		$this->assign('province_list',$province_list);// 赋值数据集

		//获取电子书的基本信息
		$url = C("PATH_URL")."/interface/yc_doc/book_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"book_id"=>"$book_id"
		);
		$json=json_encode($data);
		//echo $json;
		$book = json_decode(post_json($url,$json),true);
		//print_r($book);
		$this->assign('book',$book);// 赋值数据集

		//获取电子书的章节目录
		$url = C("PATH_URL")."/interface/yc_doc/book_chap_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"book_id"=>"$book_id"
		);
		$json=json_encode($data);
		//echo $json;
		$chap_list = json_decode(post_json($url,$json),true);
		//print_r($chap_list);
		$this->assign('chap_list',$chap_list);// 赋值数据集

        switch ($book_type)
        {
        case 357035:
        $booktitle="";
        $template_html="qkzz_info";//期刊杂志详情
        $zt = $this -> duan();
        if($zt==2||$zt==3){
             $template_html="qkzz_iphone_info";//期刊杂志详情
         }
        break;
        default:
        $booktitle="指南解读";
        $template_html="";//通用详情
        }
        $this->assign('booktitle',$booktitle);// 赋值数据集
        $this->display($template_html); // 输出模板

	}


	//电子书 小节详情页
	public function sect_info()
	{
		$sect_id = I('get.s_id', '');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取省数据
		$url = C("PATH_URL")."/interface/yc_doc/union_province_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$province_list = json_decode(post_json($url,$json),true);
		$this->assign('province_list',$province_list);// 赋值数据集

		//获取电子书 节 的详细详情
		$url = C("PATH_URL")."/interface/yc_doc/book_sect_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"sect_id"=>"$sect_id"
		);
		$json=json_encode($data);
		$sect_info = json_decode(post_json($url,$json),true);
		$this->assign('sect_info',$sect_info);// 赋值数据集

		//输出模板
		$this->display(); 

	}
    //指南解读-视频列表
    public function video_list()
    {
        
        $sort_id = I('get.ux_id', '');
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

         //获取电子书视频推荐列表接口
        $url = C("PATH_URL")."/interface/yc_doc/book_tj_video_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "get_num"=>"1"
        );
        $json=json_encode($data);
        $book_tj = json_decode(post_json($url,$json),true);
        $this->assign('book_tj',$book_tj);// 赋值数据集
        //print_r($book_tj);die;

        //获取小节视频列表接口
        $url = C("PATH_URL")."/interface/yc_doc/book_video_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "sort_id"=>"$sort_id",
            "page_num"=>"1"
         
        );
        $json=json_encode($data);
        //echo $json;
        $video_list = json_decode(post_json($url,$json),true);
        //print_r($video_list);
        $this->assign('video_list',$video_list);// 赋值数据集
        $this->display(); // 输出模板
    }

     //指南解读-视频列表-加载更多
    public function video_list_append()
    {
        
        $sort_id = I('get.ux_id', '');
        $page_num = I('get.page_num', '2');
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //获取小节视频列表接口
        $url = C("PATH_URL")."/interface/yc_doc/book_video_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "sort_id"=>"$sort_id",
            "page_num"=>"$page_num"
        );
        $json=json_encode($data);
        //echo $json;
        $video_list = json_decode(post_json($url,$json),true);
        //print_r($voide_list);die;
        $this->assign('video_list',$video_list);// 赋值数据集
        //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }


    //专家讲座-视频列表
    public function lect_list()
    {
        
        $type_id = I('get.type_id', '');

        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        if($openid == "0" || $openid =="" || $openid == "1")
        {
            $this->redirect('?m=Expert&c=Follow&a=index');
        }

        //验证手机是否绑定
        // include MODULE_PATH.'/Common/check_band.php';

        //验证申请状态
        // $phoneCode = phone_status();
        // switch ($phoneCode)
        // {
        //     case 2:
        //        $this->redirect('?m=Expert&c=User&a=jujue');
        //         break;
        //     case 3:
        //        $this->redirect('?m=Expert&c=User&a=zhuce');
        //         break; 
        // }

        //获取推荐视频列表接口
        $url = C("PATH_URL")."/interface/yc_doc/lect_tj_video_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "sort_type"=>"1",
            "yw_id"=>C('YW_ID'),
            "get_num"=>"1"
        );
        $json=json_encode($data);
        //print_r($json);
        $lect_tj = json_decode(post_json($url,$json),true);
        //print_r($lect_tj);
        $this->assign('lect_tj',$lect_tj);// 赋值数据集

        //获取视频类型接口
        $url = C("PATH_URL")."/interface/yc_doc/expert_lect_type.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "type_id"=>"$type_id",
            "page_num"=>"1",
            "yw_id"=>C('YW_ID')
        );
        $json=json_encode($data);
        $type_list = json_decode(post_json($url,$json),true);
        $this->assign('type_list',$type_list);// 赋值数据集
        
        //获取小节视频列表接口
        $url = C("PATH_URL")."/interface/yc_doc/expert_lect_all_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "type_id"=>"$type_id",
            "page_num"=>"1",
            "yw_id"=>C('YW_ID')
        );
        $json=json_encode($data);
        $lect_list = json_decode(post_json($url,$json),true);
        //print_r($lect_list);die;
        $this->assign('lect_list',$lect_list);
        $this->assign('type_id',$type_id);
        $this->display(); // 输出模板
    }

     //专家讲座-视频列表-加载更多
    public function lect_list_append()
    {
        
        $type_id = I('get.type_id','');
        $page_num = I('get.page_num','2');
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //获取视频列表接口
        $url = C("PATH_URL")."/interface/yc_doc/expert_lect_all_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "type_id"=>"$type_id",
            "page_num"=>"$page_num",
            "yw_id"=>C('YW_ID')
        );
        $json=json_encode($data);
        $lect_list = json_decode(post_json($url,$json),true);
        $this->assign('lect_list',$lect_list);// 赋值数据集
        //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }


     //视频详情
    public function lect_info()
    {
        
        $sect_id = I('get.s_id', '');
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //获取推荐视频列表接口
        $url = C("PATH_URL")."/interface/yc_doc/lect_tj_video_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "sort_type"=>"1",
            "get_num"=>"5",
            "yw_id"=>C('YW_ID')
        );
        $json=json_encode($data);
        //echo $json;
        $lect_tj = json_decode(post_json($url,$json),true);
        $this->assign('lect_tj',$lect_tj);// 赋值数据集

        //获取详细详情
        $url = C("PATH_URL")."/interface/yc_doc/lect_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "sect_id"=>"$sect_id"
        );
        $json=json_encode($data);
        $lect_info = json_decode(post_json($url,$json),true);
        $this->assign('lect_info',$lect_info);// 赋值数据集

         // 课程时长增加
        $url = C("PATH_URL")."/interface/yc_doc/doc_sc_total_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "book_id"=>"$sect_id", //视频id
            "yw_id"=>C('YW_ID'),
            "sc_num"=>"10"
        );
        $json=json_encode($data);
        $doc_sc_total_add = json_decode(post_json($url,$json),true);

           // 经验增加 
        $time = date("Y-m-d");
        $url = C("PATH_URL")."/interface/yc_doc/doc_jy_total_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "book_id"=>"$sect_id", //视频id
            "yw_id"=>C('YW_ID'),
            "jingyan_num"=>"1",
            "jingyan_name"=>"课时经验",
            "jingyan_date"=>"$time",
            "jingyan_desc"=>"课时获得经验,积分类型:课时经验,积分值:1"
        );
        $json=json_encode($data);
        $doc_jy_total_add = json_decode(post_json($url,$json),true);
       //print_r($doc_jy_total_add);die;

        // 积分增加 
        $url = C("PATH_URL")."/interface/yc_doc/doc_sp_jifen_add.aspx?access_token=".$token;
        //$url = "http://172.16.17.55/interface/yc_doc/doc_sp_jifen_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "book_id"=>"$sect_id", //视频id
            "yw_id"=>C('YW_ID'),
            "jifen_num"=>"20",
            "jifen_name"=>"课时积分",
            "jifen_date"=>"$time",
            "jifen_desc"=>"课时获得积分,积分类型:课时积分,积分值:20"
        );
        $json=json_encode($data);
        $doc_sp_jifen_add = json_decode(post_json($url,$json),true);
       //print_r($doc_sp_jifen_add);die;


        //输出模板
        $this->display(); 
    }

	
	
	//获取gps
	public function get_gps()
	{
		$url_str = "m=Expert&c=Doc&a=doc_list";
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}  

    //强制pdf
    public function qz_pdf()
    {
        $filename = I('get.pdf', '');
        //echo $filename;die;
        forceDownload($filename);

        
    }

    public function duan()
    {
        //获取USER AGENT
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        //分析数据
        $is_pc = (strpos($agent, 'windows nt')) ? true : false;   
        $is_iphone = (strpos($agent, 'iphone')) ? true : false;   
        $is_ipad = (strpos($agent, 'ipad')) ? true : false;   
        $is_android = (strpos($agent, 'android')) ? true : false;   
         
        //输出数据 
            if($is_pc){   
                return 1;
            }   
            if($is_iphone){   
                return 2; 
            }   
            if($is_ipad){   
                return 3;  
            }   
            if($is_android){   
                return 4;  
            }   

    }

    
}