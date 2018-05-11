<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class WxpayController extends Controller
{
	//微信支付异步通知回调地址 php

    public function wx_notify()
    {
        $openid = I('post.openid','');
        $order_id = I('post.order_id','');
        $status = I('post.status','');
        $serial_number = I('post.serial_number','');

         //获取平台的access_token
        $token = A_token();
        
        /*
        SUCCESS—支付成功 REFUND—转入退款 NOTPAY—未支付 CLOSED—已关闭 REVOKED—已撤销（刷卡支付）
        USERPAYING--用户支付中 PAYERROR--支付失败(其他原因，如银行返回失败)
        */

        //支付成功 更改订单状态
        $log=new Log();
        $url=C("PATH_URL")."/interface/yc_member/online_pay.aspx?access_token=".$token;
        $data=array
        (
            "openid"=>"$openid",
            "order_id"=>"$order_id",
            "status"=>"$status",
            "serial_number"=>"$serial_number",
            "order_status"=>"1"
        );
       
        $json=json_encode($data);
        $pdata = post_json($url,$json);
        $log->write("wx_notify_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
        $log->write("wx_notify_data".$json,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
            
        
    }


//微信支付异步通知回调地址 试纸回调函数

    public function sp_wx_notify()
    {
        $openid = I('post.openid','');
        $order_id = I('post.order_id','');
        $status = I('post.status','');
        $serial_number = I('post.serial_number','');

         //获取平台的access_token
        $token = A_token();
        
        /*
        SUCCESS—支付成功 REFUND—转入退款 NOTPAY—未支付 CLOSED—已关闭 REVOKED—已撤销（刷卡支付）
        USERPAYING--用户支付中 PAYERROR--支付失败(其他原因，如银行返回失败)
        */

        //支付成功 更改订单状态
        $log=new Log();
        $url=C("PATH_URL")."/interface/yc_member/online_pay_cgpt.aspx?access_token=".$token;
        $data=array
        (
            
            "order_id"=>"$order_id",
            "serial_number"=>"$serial_number",
            "order_status"=>"1"
  
        );
       
        $json=json_encode($data);
        $pdata = post_json($url,$json);
        $log->write("wx_notify_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/".date('Y-m')."/sp_wxpay".date('Y-m-d').'.log');
        $log->write("wx_notify_data".$json,"WXPAY","","./Application/Runtime/Logs/".date('Y-m')."/sp_wxpay".date('Y-m-d').'.log');
            
        
    }


    //微信充值异步通知回调地址

    public function card_notify()
    {
        $openid = I('post.openid','');
        $number = I('post.cash_fee','1')/100;
        $out_trade_no = I('post.out_trade_no','');
        $order_id = I('post.order_id','');

         //获取平台的access_token
        $token = A_token();
        

        //支付成功 更改订单状态
        $log=new Log();

        //获取当前用户 卡号 手机号 
        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);

         //当前用户手机号
        $mobile = $user_info['MEMBER_MOBILE'];

        //充值
        $url = "http://weixin.yk2020.com/include/xfb_rechargequery.aspx";
        $data = array
        (
            "curamt"=>"$number",
            "mobile"=>"$mobile",
            "recharge_code"=>"$out_trade_no",
            "merchid"=>"100806200100001", //商户编号
            "termid"=>"00017068" //终端编号
        );
        
        $json = json_encode($data);
        $res = post_json($url,$json);
        $log->write("xfb_rechargequeryjson".$json,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
        $myAccount = json_decode($res,true);
        $log->write("xfb_rechargequeryerror_code".$res,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
    }


    //app   微信支付异步通知回调地址 php

    public function wx_notify_app()
    {

        $order_id = I('post.order_id','');
        $member_id = I('post.member_id','');
        $yw_id = I('post.yw_id','');        
        $serial_number = I('post.serial_number','');

         //获取平台的access_token
        $token = A_token();
        
        /*
        SUCCESS—支付成功 REFUND—转入退款 NOTPAY—未支付 CLOSED—已关闭 REVOKED—已撤销（刷卡支付）
        USERPAYING--用户支付中 PAYERROR--支付失败(其他原因，如银行返回失败)
        */

        //支付成功 更改订单状态
        $log=new Log();
        $url=C("PATH_URL")."/interface/app_member/online_pay.aspx?access_token=".$token;
        $data=array
        (
            "member_id"=>"$member_id",
            "yw_id"=>"$yw_id",
            "order_id"=>"$order_id",
            "serial_number"=>"$serial_number",
            "order_status"=>"1"
        );
       
        $json=json_encode($data);
        $pdata = post_json($url,$json);
        $log->write("wx_notify_app_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
        $log->write("wx_notify_app_data".$json,"WXPAY","","./Application/Runtime/Logs/wxpay".date('Y-m-d').'.log');
            
        
    }


    //app   微信支付异步通知回调地址 php  心电阅片

    public function wx_notify_app_xd()
    {

        $order_id = I('post.order_id','');
        $member_id = I('post.member_id','');
        $yw_id = I('post.yw_id','');        
        $serial_number = I('post.serial_number','');

         //获取平台的access_token
        $token = A_token();
        
        /*
        SUCCESS—支付成功 REFUND—转入退款 NOTPAY—未支付 CLOSED—已关闭 REVOKED—已撤销（刷卡支付）
        USERPAYING--用户支付中 PAYERROR--支付失败(其他原因，如银行返回失败)
        */

        //支付成功 更改订单状态
        $log=new Log();
        $url=C("PATH_URL")."/interface/dmhz/online_pay_xd.aspx?access_token=".$token;
        $data=array
        (
            "member_id"=>"$member_id",
            "yw_id"=>"$yw_id",
            "order_id"=>"$order_id",
            "serial_number"=>"$serial_number",
            "order_status"=>"1"
        );
       
        $json=json_encode($data);
        $pdata = post_json($url,$json);
        $log->write("wx_notify_app_xd_pdata".$pdata,"WXPAY","","./Application/Runtime/Logs/wxpay_xd".date('Y-m-d').'.log');
        $log->write("wx_notify_app_xd_data".$json,"WXPAY","","./Application/Runtime/Logs/wxpay_xd".date('Y-m-d').'.log');
            
        
    }
}