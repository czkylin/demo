<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class IndexController extends BaseController
{
    public function article($type_id)
    {
        $token = A_token();
        $jiekou = 'http://weixin.yk2020.com';
        $url = $jiekou."/interface/yc_doc/union_act_all.aspx?access_token=".$token;
        $data = array
        (
            "type_id"=>"$type_id",
            "province_id"=>'',
            "page_num"=>"1",
            "page_rows"=>"10",
            "sort_type"=>'',
        );
        $json=json_encode($data);
        $articleList = json_decode(post_json($url,$json),true);
        return $articleList;
    }

    public function _list($list)
    {
        $count = count($list);
        for($p=0;$p<ceil($count/3);$p++)
        {
            for($i=$p*3;$i<($p+1)*3;$i++)
            {
                $arr = array();
                if($i%3 == 2)
                {
                    $arr['doc_list'][0] = $list[$i-2];
                    if($list[$i-1])
                    {
                        $arr['doc_list'][1] = $list[$i-1];
                    }
                    if($list[$i])
                    {
                        $arr['doc_list'][2] = $list[$i];
                    }
                }
            }
            $arrlist[] = $arr;
        }

        return $arrlist;
    }


	public function index()
	{
		//医院动态
        $hdList = $this->article('11111');
        $this->assign('hdList',$hdList);

        //糖网
        $twList = $this->article('11117');
        $this->assign('twList',$twList);

        //白内障
        $bnzList = $this->article('11115');
        $this->assign('bnzList',$bnzList);

        //眼视光
        $ysgList = $this->article('11118');
        $this->assign('ysgList',$ysgList);

        //眼底病
        $ydbList = $this->article('11116');
        $this->assign('ydbList',$ydbList);

        $this->display();
	}

    public function index_list()
	{
        $type_id = I('get.type_id','11119');
        //特需专家
        $txdocList = $this->article($type_id);
        $txdocList = $this->_list($txdocList);
        $this->ajaxReturn($txdocList);

	}

	 //文章内容
    public function arcinfo()
    {
        $id = I('artid')?I('artid'):69468752;
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
        //文章接口数据
        $this->assign('arcinfo',$arcinfo);
        $this->display();
    }


}
