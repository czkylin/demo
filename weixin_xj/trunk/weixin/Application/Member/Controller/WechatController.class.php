<?php
namespace Member\Controller;
use Think\Controller;
class WechatController extends Controller
{

    /**
     * 微信获取code
     */
    public function getCode($url='',$state='')
    {
        $url=$this->getOauthRedirect($url,$state);
        redirect($url);
    } 

    /**
     * oauth 授权跳转接口
     * @param string $callback 回调URI
     * @return string
     */
    public function getOauthRedirect($callback,$state='',$scope='snsapi_userinfo'){
        return 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.C('M_APPID').'&redirect_uri='.urlencode($callback).'&response_type=code&scope='.$scope.'&state='.$state.'#wechat_redirect';
    }

    /**
     * 获取授权后的用户资料
     * @param string $access_token
     * @param string $openid
     * @return array {openid,nickname,sex,province,city,country,headimgurl,privilege,[unionid]}
     * 注意：unionid字段 只有在用户将公众号绑定到微信开放平台账号后，才会出现。建议调用前用isset()检测一下
     */
    public function getOauthUserinfo($access_token,$openid){

        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
        $res = post_json($url,"");
        if ($res)
        {
            $json = json_decode($res,true);
            return $json;
        }
        return false;
    }
    /**
     * 获取未关注授权后的用户信息
     * @param string $access_token
     * @param string $openid
     * @return array {openid,nickname,sex,province,city,country,headimgurl,privilege,[unionid]}
     * 注意：unionid字段 只有在用户将公众号绑定到微信开放平台账号后，才会出现。建议调用前用isset()检测一下
     *
     * By 就是喜欢林俊杰呀 ~
     */
     public function getUserinfo($access_token,$openid){

        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
        $res = post_json($url,"");
        if ($res)
        {
            $json = json_decode($res,true);
            return $json;
        }
        return false;
    }



    public function wxlogin()
    {
        /*
            就是获取授权accesstoken 啊~ php

             By就是喜欢林俊杰吖 ~
        */
       
        $appId=C('M_APPID');
        $secret=C('M_SECRET');

        $code = I("get.code","");
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appId."&secret=".$secret."&code=".$code."&grant_type=authorization_code";
        $res = json_decode(post_json($url,""),true);

        //拉取用户信息
        $wechat_info=$this->getUserinfo($res['access_token'],$res['openid']);
        $_SESSION['m_openid'] = $wechat_info['openid'];
       
        
        //获取平台的access_token
        $token = A_token();

        //添加~ 用户信息
        $url = C("PATH_URL")."/interface/yc_member/wx_user_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>$wechat_info['openid'],
            "nickname"=>$wechat_info['nickname'],
            "sex"=>$wechat_info['sex'],
            "language"=>$wechat_info['language'],
            "city"=>$wechat_info['city'],
            "province"=>$wechat_info['province'],
            "country"=>$wechat_info['country'],
            "headimgurl"=>$wechat_info['headimgurl'],
            "subscribe_time"=>$wechat_info['subscribe_time'],
            "remark"=>$wechat_info['remark'],
            "token_id"=>C('M_TOKEN_ID'),
        );
        $json = json_encode($data);
        $res = post_json($url,$json);
        $data = json_decode($res,true);
        if($data['error_code']=='ok')
        {
           $this->redirect('?m=Member&c='.I('get.controller').'&a=index');
        }else{
            print_r($res);die;
        }
        
        
    }

    
    
}