<?php
namespace Member\Controller;
use Think\Controller;
class PayController extends Controller
{
	public function index()
	{
        $boby = $_POST['params'][0];//商品描述
        $Total =  $_POST['params'][1]*100;//总金额
        $out_trade_no = $_POST['params'][2];//商户订单号
        $yw_id = $_POST['params'][3];//业务id

        // $detail = I("post.detail");//商品详情
        
        // $Goods_tag =  I("post.goods_tag");//商品标记

        if(!$Total){
            die("total 总金额为必填字段"); 
        }
        if(!$boby){
            die("boby 商品描述为必填字段"); 
        }
        if(!$out_trade_no){
            die("out_trade_no 商户订单号为必填字段"); 
        }
        if(!$yw_id){
            die("yw_id 业务ID为必填字段"); 
        }


        require_once MODULE_PATH.'weixin_pay/lib/WxPay.Api.php';

        require_once MODULE_PATH.'weixin_pay/lib/WxPay.Data.php';

        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";

        $res = self::getappid($yw_id);

         $appid=$res['appid'];//应用ID
         $mch_id=$res['mch_id'];//   mch_id
        
        //②、统一下单
        $input = new\WxPayUnifiedOrder();
        $input->SetBody($boby);//商品描述

        $input->SetDetail($detail);
    
        $input->SetOut_trade_no($out_trade_no);

        $input->SetTotal_fee($Total);

        // $input->SetTime_start(date("YmdHis"));//交易起始时间

        // $input->SetTime_expire(date("YmdHis", time() + 600));//交易结束时间

        $input->SetGoods_tag($Goods_tag);//商品标记

        $input->SetNotify_url("http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Pay&a=notify");//通知地址

        $input->SetTrade_type("APP"); //支付类型
        
        $input->SetAppid($appid);//公众账号ID
        $input->SetMch_id($mch_id);//商户号
        $input->SetSpbill_create_ip($_SERVER['REMOTE_ADDR']);//终端ip   
    
        $input->SetNonce_str(self::getNonceStr());//随机字符串

        //签名
        $inputObj = new\WxPayDataBase();
        $sign =$inputObj->SetSign();
       
        

        $input->SetSign($sign);

        $xml = $input->ToXml();
        
       // print_R($xml);die;
        
        $startTimeStamp = self::getMillisecond();//请求开始时间
        $response = self::postXmlCurl($xml, $url, false, $timeOut);
        $res = new\WxPayResults;
        $result =  $res ::Init($response);
       // self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费时间
        echo json_encode($result);
		
	}

    public function notify(){}

    /**
     * 根据业务id获取appid 
     */
    private static function getappid($yw_id)
    {
        if($yw_id==2){
            $res = array(
                "appid"=>'wxd6fc1b8eeed5be39', //应用ID
                "mch_id"=>'1351840501', //   mch_id
                );
           
        }else if($yw_id==6){
            $res = array(
                "appid"=>'wxcdc5a74a0d127b83', //应用ID
                "mch_id"=>'1340255701', //   mch_id
                );
           
        }

        return $res;
    }

/**
     * 
     * 产生随机字符串，不长于32位
     * @param int $length
     * @return 产生的随机字符串
     */
    public static function getNonceStr($length = 32) 
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
        $str ="";
        for ( $i = 0; $i < $length; $i++ )  {  
            $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
        } 
        return $str;
    }
	/**
     * 获取毫秒级别的时间戳
     */
    private static function getMillisecond()
    {
        //获取毫秒的时间戳
        $time = explode ( " ", microtime () );
        $time = $time[1] . ($time[0] * 1000);
        $time2 = explode( ".", $time );
        $time = $time2[0];
        return $time;
    }

    /**
     * 以post方式提交xml到对应的接口url
     * 
     * @param string $xml  需要post的xml数据
     * @param string $url  url
     * @param bool $useCert 是否需要证书，默认不需要
     * @param int $second   url执行超时时间，默认30s
     * @throws WxPayException
     */
    private static function postXmlCurl($xml, $url, $useCert = false, $second = 30)
    {       
         require_once MODULE_PATH.'weixin_pay/lib/WxPay.Exception.php';

        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        
        // //如果有配置代理这里就设置代理
        // if(WxPayConfig::CURL_PROXY_HOST != "0.0.0.0" 
        //     && WxPayConfig::CURL_PROXY_PORT != 0){
        //     curl_setopt($ch,CURLOPT_PROXY, "0.0.0.0");
        //     curl_setopt($ch,CURLOPT_PROXYPORT, "0");
        // }
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//严格校验
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
        // if($useCert == true){
        //     //设置证书
        //     //使用证书：cert 与 key 分别属于两个.pem文件
        //     curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
        //     curl_setopt($ch,CURLOPT_SSLCERT, WxPayConfig::SSLCERT_PATH);
        //     curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
        //     curl_setopt($ch,CURLOPT_SSLKEY, WxPayConfig::SSLKEY_PATH);
        // }
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        //运行curl
        $data = curl_exec($ch);
        //返回结果
        if($data){
            curl_close($ch);
            return $data;
        } else { 
            $error = curl_errno($ch);
            curl_close($ch);
            throw new\WxPayException("curl出错，错误码:$error");
        }
    }

    /**
     * 
     * 上报数据， 上报的时候将屏蔽所有异常流程
     * @param string $usrl
     * @param int $startTimeStamp
     * @param array $data
     */
    // private static function reportCostTime($url, $startTimeStamp, $data)
    // {
    //     //如果不需要上报数据
    //     if(WxPayConfig::REPORT_LEVENL == 0){
    //         return;
    //     } 
    //     //如果仅失败上报
    //     if(WxPayConfig::REPORT_LEVENL == 1 &&
    //          array_key_exists("return_code", $data) &&
    //          $data["return_code"] == "SUCCESS" &&
    //          array_key_exists("result_code", $data) &&
    //          $data["result_code"] == "SUCCESS")
    //      {
    //         return;
    //      }
         
    //     //上报逻辑
    //     $endTimeStamp = self::getMillisecond();
    //     $objInput = new WxPayReport();
    //     $objInput->SetInterface_url($url);
    //     $objInput->SetExecute_time_($endTimeStamp - $startTimeStamp);
    //     //返回状态码
    //     if(array_key_exists("return_code", $data)){
    //         $objInput->SetReturn_code($data["return_code"]);
    //     }
    //     //返回信息
    //     if(array_key_exists("return_msg", $data)){
    //         $objInput->SetReturn_msg($data["return_msg"]);
    //     }
    //     //业务结果
    //     if(array_key_exists("result_code", $data)){
    //         $objInput->SetResult_code($data["result_code"]);
    //     }
    //     //错误代码
    //     if(array_key_exists("err_code", $data)){
    //         $objInput->SetErr_code($data["err_code"]);
    //     }
    //     //错误代码描述
    //     if(array_key_exists("err_code_des", $data)){
    //         $objInput->SetErr_code_des($data["err_code_des"]);
    //     }
    //     //商户订单号
    //     if(array_key_exists("out_trade_no", $data)){
    //         $objInput->SetOut_trade_no($data["out_trade_no"]);
    //     }
    //     //设备号
    //     if(array_key_exists("device_info", $data)){
    //         $objInput->SetDevice_info($data["device_info"]);
    //     }
        
    //     try{
    //         self::report($objInput);
    //     } catch (WxPayException $e){
    //         //不做任何处理
    //     }
    // }


}