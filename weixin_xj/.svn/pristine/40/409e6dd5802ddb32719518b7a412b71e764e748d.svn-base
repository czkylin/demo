<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once "./lib/WxPay.Api.php";
require_once './lib/WxPay.Notify.php';
require_once './log.php';

//初始化日志
$logHandler= new CLogFileHandler("../../Runtime/Logs/card_cz".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("queryweixin:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}

		$data1=array
        (
			"openid"=>$data['openid'],
            "order_id"=>$data['attach'],
            "cash_fee"=>$data['cash_fee'],
            "out_trade_no"=>$data['out_trade_no']
        );
		Log::DEBUG("dataquery:" . json_encode($data1));
        Log::DEBUG("weixinquery:" . json_encode($data));
		$url="http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Wxpay&a=card_notify";
		$ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
        $res = curl_exec($ch);//运行curl
        Log::DEBUG("queryres:" . json_encode($res));
        curl_close($ch);
		return true;
	}

}


Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);


