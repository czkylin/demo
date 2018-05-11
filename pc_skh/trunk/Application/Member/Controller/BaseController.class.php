<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class BaseController extends Controller
{
	public function __construct()
	{
		//初始化系统信息
        parent::__construct();
        //seo数据 10分钟
        $seoarr = F('seoarr');
        $type = I('type','');
        if(!$seoarr || (time()-$seoarr['t']>60*60) || $type==1)
        {
            $token = A_token();
            $jiekou = 'http://weixin.yk2020.com';
            $url = $jiekou."/interface/pc_member/hmo_shop/seo.aspx?access_token=".$token;
            $data = array
            (
                "classid"=>'8'
            );
            $json=json_encode($data);
            $seoo = json_decode(post_json($url,$json),true);
            foreach ($seoo as $key => $value) 
            {
            	$seoarr[$seoo[$key]['TYPE_ID']] = $value;
            	$seoarr['t'] = time();
            }
            F('seoarr',$seoarr);
        }
        // dump($seo);die;
        $this->assign('seoarr',$seoarr);
    }


}
