<?php
namespace Expert\Controller;
use Think\Controller;

class ClassController extends Controller
{
    //课程首页
    public function line()
    {
        //获取平台的access_token
        $token = A_token();

        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/book_kc_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"1",
            "yw_id"=>C('YW_ID')
        );
        $json=json_encode($data);
        $kc_list = json_decode(post_json($url,$json),true);

        $this->assign("kc_list",$kc_list);
        $this->display(); // 输出模板
    }

    //加载更多
    public function append_line()
    {
        $page_num = I('get.page_num', '2');
        //获取平台的access_token
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/book_kc_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"$page_num",
            "yw_id"=>C('YW_ID')
        );
        $json=json_encode($data);
        $kc_list = json_decode(post_json($url,$json),true);

        $this->assign("kc_list",$kc_list);
         //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';

    }

    //加薪计划 暂时不做
    public function addMoney()
    {
        $this->display();
    }
    //加薪计划 暂时不做
    public function qxwyjs()
    {
         //获取openid
        include MODULE_PATH.'/Common/open_id.php';
        $this->display();
    }

    //计划首页
    public function jobLine()
    {
        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/book_jh_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $book_list = json_decode(post_json($url,$json),true);

        $this->assign('book_list',$book_list);// 赋值数据集
        $this->display(); // 输出模板
    }

	//计划包含哪些课程-列表页
	public function studyPlan()
	{
		$stype_id = I('get.stype_id', '');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

        //计划包含哪些课程-列表页
		$url = C("PATH_URL")."/interface/yc_doc/book_dj_list.aspx?access_token=".$token;

        //专家介绍头部     
        $url2 = C("PATH_URL")."/interface/yc_doc/book_jh_jj.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "stype_id"=>"$stype_id" //计划ID
        );
        $json=json_encode($data);
        $book_list = json_decode(post_json($url,$json),true);
        $introduce = json_decode(post_json($url2,$json),true);

        $this->assign('data',$introduce);// 赋值数据集
        $this->assign('book_list',$book_list);// 赋值数据集
		$this->display(); // 输出模板
	}

	//课程详情页--目录  课程介绍
	public function studyDetail()
	{
        $book_id  = I('get.book_id', '1045545');

        //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $url = C("PATH_URL")."/interface/yc_doc/book_dj_chap_list.aspx?access_token=".$token;//章节     
        $data = array
        (
            "openid"=>"$openid",
            "book_id"=>"$book_id" //计划ID
        );
        $json=json_encode($data);
        $data = json_decode(post_json($url,$json),true);

        $this->assign('data',$data);// 赋值数据集
        //课程简介
        $url = C("PATH_URL")."/interface/yc_doc/book_kc_jj.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "book_id"=>"$book_id", //计划ID
            "yw_id"=>C('YW_ID')
        );
        $json=json_encode($data);
        $data = json_decode(post_json($url,$json),true);

        $this->assign('data2',$data);// 赋值数据集
        $this->display(); // 输出模板
	}

    //节为pdf格式或者图片
    public function detail()
    {
        $sect_id = I('get.id','');//节的ID

       //获取平台的access_token
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //获取电子书 节 的详细详情
        $url = C("PATH_URL")."/interface/yc_doc/book_sect_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "sect_id"=>"$sect_id"
        );
        $json=json_encode($data);
        $data = json_decode(post_json($url,$json),true);

        $this->assign('data',$data);// 赋值数据集
        $this->display(); // 输出模板
    }
    
    //政策解读
    public function jiedu()
    {
        $this->display();
    } 
}
?>