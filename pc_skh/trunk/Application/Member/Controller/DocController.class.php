<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class DocController extends BaseController
{
    //医生详情
    public function docDetail()
    {
        $id = I('docid')?I('docid'):69468752;
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
    }



}