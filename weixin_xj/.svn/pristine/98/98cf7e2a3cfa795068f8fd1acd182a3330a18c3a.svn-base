<?php
namespace Home\Controller;
use Think\Controller;
use Think\Log;
class TixianController extends Controller
{

	//提现
	public function take()
	{
		//获取平台的access_token 
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$url = C("PATH_URL")."/interface/yc_hos/user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign("real_name",$data['REAL_NAME']);
		
		//提现余额
		$url = C("PATH_URL")."/interface/yc_hos/my_balance_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);

		$result = json_decode(post_json($url,$json),true);
		$this->assign('result',$result);
		$this->display(); // 输出模板

	}

	//提现提交
	public function take_ok()
	{
		$money = I("post.money",'');
		$real_name = I("post.real_name",'');

		//获取平台的access_token 
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//提现
		// $url = C("NEW_URL")."/ServieYunAPI/AppBaseService.asmx/ApllyReflect_1";

		// $data = "ClientType=1&UserType=1&RequestType=0&Memberid=0&openid=".$openid."&Bankcard=&Acccuntname=&BankName=&CityName=&BankDetail=&IncomeMoney=".$money;

		//提现
		$url = C("PATH_URL")."/interface/yc_hos/income_money_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"bank_card"=>"$bank_card",
			"real_name"=>"$real_name",
			"acccunt_name"=>"$Acccuntname",
			"bank_name"=>"$BankName",
			"city_name"=>"$city_name",
			"bank_detail"=>"$BankDetail",
			"income_money"=>"$money"
		);
		$json=json_encode($data);
		$result = json_decode(post_json($url,$json),true);

		//$tx = json_decode(post_json($url,$data),true);
		if($result['error_code']=='ok')
		{
			echo "<script>alert('提交成功！');location.href='/weixin/index.php?Expert&c=Tixian&a=record';</script>";
			$this->redirect('Tixian/record');
		}
		else
		{
			echo "<script>alert('提交失败！');";
		}
	}
	
	//提现列表
	public function record()
	{
		//获取平台的access_token 

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取提现列表
		// $url = C("NEW_URL")."/ServieYunAPI/AppBaseService.asmx/ApplyReflectList_1";

		// $data = "UserType=1&RequestType=0&Memberid=0&openid=".$openid;
		// $record_list = json_decode(post_json($url,$data),true);

		$url = C("PATH_URL")."/interface/yc_hos/income_money_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);
		$json=json_encode($data);
		//print_r(post_json($url,$json));die;
		$result = json_decode(post_json($url,$json),true);
		// print_r($result);

		$this->assign('record_list',$result);
		$this->display(); // 输出模板

	}
	
 }

 ?>
