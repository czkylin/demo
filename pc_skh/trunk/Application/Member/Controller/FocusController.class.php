<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class FocusController extends BaseController
{
	public function intro()
	{
		$this->display();
	}


    //医生列表
    public function doc()
    {
        $page_num = I('get.p','1');
        $type_id = I('get.type_id','11126');
        $token = A_token();
        $jiekou = 'http://weixin.yk2020.com';
        $url = $jiekou."/interface/yc_doc/union_act_all.aspx?access_token=".$token;
        $data = array
        (
            "type_id"=>"$type_id",
            "province_id"=>'',
            "page_num"=>"$page_num",
            "page_rows"=>"10",
            "sort_type"=>'',
        );
        $json=json_encode($data);
        $newsList = json_decode(post_json($url,$json),true);
        $this->assign('newsList',$newsList);


        //总条数
        $url1 = $jiekou."/interface/yc_doc/arc_num.aspx?access_token=".$token;
        $data1 = array
        (
            "type_id"=>"$type_id",
        );
        $json1=json_encode($data1);
        $ret = json_decode(post_json($url1,$json1),true);

        $Page = new \Think\Page($ret['total'],10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出

        $empty = "<li><i></i>暂无数据<span></span></li>";
        $this->assign('empty',$empty);
        $this->display();
    }

    
	//新闻列表
	public function news()
	{
		$page_num = I('get.p','1');
        $type_id = I('get.type_id','11111');
		$token = A_token();
        $jiekou = 'http://weixin.yk2020.com';
        $url = $jiekou."/interface/yc_doc/union_act_all.aspx?access_token=".$token;
        $data = array
        (
            "type_id"=>"$type_id",
            "province_id"=>'',
            "page_num"=>"$page_num",
            "page_rows"=>"10",
            "sort_type"=>'',
        );
        $json=json_encode($data);
        $newsList = json_decode(post_json($url,$json),true);
        $this->assign('newsList',$newsList);


        //总条数
        $url1 = $jiekou."/interface/yc_doc/arc_num.aspx?access_token=".$token;
        $data1 = array
        (
            "type_id"=>"$type_id",
        );
        $json1=json_encode($data1);
        $ret = json_decode(post_json($url1,$json1),true);

        $Page = new \Think\Page($ret['total'],10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $empty = "<li><i></i>暂无数据<span></span></li>";
        $this->assign('empty',$empty);
		$this->display();
	}

	//新闻详情
    public function newsDetail()
    {
        $id = I('artid')?I('artid'):69468752;
        $type = I('type','1');
        //文章接口数据
        $token = A_token();
        $jiekou = 'http://weixin.yk2020.com';
        $url = $jiekou."/interface/yc_doc/union_act_info.aspx?access_token=".$token;
        $data = array
        (
            "record_id"=>$id,
        );
        $json=json_encode($data);
        $arcinfo = json_decode(post_json($url,$json),true);
        $arcinfo[0]['ACT_DESC'] = htmlspecialchars_decode($arcinfo[0]['ACT_DESC']);
        $arcinfo[0]['ACT_DESC'] = str_replace('src="', 'src="http://weixin.yk2020.com', $arcinfo[0]['ACT_DESC']);
        $this->assign('arcinfo',$arcinfo[0]);
        $type_id = $arcinfo[0]['TYPE_ID'];

        //文章上下篇循环
        $url1 = $jiekou."/interface/yc_doc/union_act_nl.aspx?access_token=".$token;
        $data1 = array
        (
            "record_id"=>$id,
            "type_id"=>"$type_id",
            "province_id"=>'',
            "sort_type"=>''
        );
        $json=json_encode($data1);
        $arcnl = json_decode(post_json($url1,$json),true);
        $this->assign('arcnl',$arcnl);
        $this->display();
        // switch ($type) {
        //     case '1':
        //         $this->display();
        //         break;
        //     case '2':
        //         $this->display("serviceArticle");
        //         break;
        //     case '3':
        //         $this->display("focusArticle");
        //         break;
        //     default:
        //         $this->display();
        //         break;
        // }
        
    }

}
