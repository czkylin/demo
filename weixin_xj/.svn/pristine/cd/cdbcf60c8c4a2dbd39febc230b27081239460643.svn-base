<?php
namespace Member\Controller;
use Think\Controller;
class MiniappsController extends Controller
{
	
	public function _initialize(){
		$mini = C('mimiapp');
		$this->appid = $mini['appid'];
		$this->secret = $mini['secret'];
	}

	/*
	//获取并存储session_key
	public function getSession(){
		$code = I('code','"071xwL690QMfsu1F88890bUG690xwL6p"','string');
		if(!$code){
			$ret['code'] = -1;
			$ret['msg'] = '请重新打开小程序';
		}
		$mini = C('mimiapp');
		$url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$mini['appid']."&secret=".$mini['secret']."&js_code=".$code."&grant_type=authorization_code";
		$retdata = file_get_contents($url); 
		if(isset($retdata['errcode'])){
			$ret['code'] = -1;
			$ret['msg'] = 'code无效';
		}
		session('session_key',$retdata['session_key']);
		session('openid',$retdata['oZGb_0De7MfvMe6RqmcBwb3VEO7I']);
		
		$ret['code'] = $ret['code']?$ret['code']:1;
		$ret['msg'] = $ret['msg']?$ret['msg']:'成功';
		$ret['data'] = $retdata;
		$ret['sid'] = $this->sid;
		$this->ajaxReturn($ret);
	}
*/
	//获取验证码
	public function getMsg(){
		$post = $_POST;
		dump($post);
	}

	//微信解密获取unid
	public function unCode(){
		vendor("miapp.wxBizDataCrypt");
		$encryptedData = I("encryptedData","FRkV6eGVRqGP57PxAtlqMmZC5v9ArpRB5elyuBfXAouw8JTkUQHJOwWK3pu+meWJ03f+2V2Evmz4cBnt4NHPYPInp0qHqGZR0qiFMoYZ1QssowOfSjWtgEELOsSW6YlKtaKtLuf+AX7dcexcZqgDmV7ZgDcZZzGUBTj4QdH2mwLpj2Vm/F0VOyj2CX1tLaMJiJ+2fS6IYaLRL2w2jnTqvMhjNMcrXbYNBJDLfwUR2POQQQRdbGhEDGd0ijJRi4CDOhTPh77o0QeTTl7w9NTnBMYH/W1L0bipx4gw6YGwBjgfxYD2FTWqoTOokghBuq7noA9omTxylMnjHsUlmY5nRz2VbX3uYAwzBZwezxLMAic3wVMMvL7+CR7rIqEDSiXYAAJC75fpoPjiSmb6L6oy7zxwxm/+oEuHU7ikJjZxVKUMAJObOyrnbd7INNrj6xEtnTW8X6PeSgbOdqF1Rtol0/vl2jsy+/LUPn+DxDTdtcgP4aYikbOLX+4N7iYGL7HK3N86poDqEmDz2VsBAK2FIA==");
		$iv = I("iv",'1dW7cnPveajhuzIad47ySQ==');
		$sessionKey = I("sessionKey",'40idpI3GdPa2FnJ5emAoWA==');
		$pc = new \WXBizDataCrypt($this->appid, $sessionKey);
		$errCode = $pc->decryptData($encryptedData, $iv, $data);
		$data1 = json_decode($data,ture);

		if ($errCode == 0) {
		    $ret = 1;
		} else {
		    $ret = -1;
		}
		$ret = $data1['unionId'];
		echo $ret;
	}
	//健康档案
	public function dangan()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$member_info = json_decode(post_json($url,$json),true);


		$url = C("PATH_URL")."/interface/yc_member/tumor_breath_getbirth.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$member_date = json_decode(post_json($url,$json),true);
		$this->assign("member_date",$member_date);
		$this->assign("member_info",$member_info);
		$this->display(); // 输出模板
	}

	//健康档案列表
	public function hx_numlist()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_member/tumor_breath_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		// var_dump($url,$json);
		$num_list = json_decode(post_json($url,$json),true);
		$this->assign('member_mobile',$member_mobile);
		$this->assign('num_list',$num_list);
		$this->display(); // 输出模板
	}

	//健康档案列表
	public function hxnum_list_append()
	{
		$member_mobile = I('get.member_mobile','');
		$page_num = I('get.page_num','2');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_member/tumor_breath_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"phone"=>"$member_mobile",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$num_list = json_decode(post_json($url,$json),true);
		$this->assign('num_list',$num_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//健康档案所有列表每一个详情
	public function hx_details()
	{
		$date = I('get.date','');
		$account = I('get.account','');
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_member/tumor_breath_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"create_date"=>"$date",
			"account"=>"$account"
		);
		$json=json_encode($data);
		$details = json_decode(post_json($url,$json),true);
		// dump($details);
		$this->assign('details',$details);
		$this->display(); // 输出模板
	}

	//健康档案所有列表每一个详情
	public function hx_explain()
	{
		$type = I('get.type');
		$arr['cvc'] = I('get.cvc','0');
		$arr['cmep'] = I('get.cmep','0');
		$arr['cpef'] = I('get.cpef','0');
		$arr['cmip'] = I('get.cmip','0');
		$arr['cfev1'] = I('get.cfev1','0');
		

		$test['hpkvol'] = I('get.hpkvol')?I('get.hpkvol'):'0';
		$test['hpksin'] = I('get.hpksin')?I('get.hpksin'):'0';
		$test['hpkflo'] = I('get.hpkflo')?I('get.hpkflo'):'0';
		$test['xpkvol'] = I('get.xpkvol')?I('get.xpkvol'):'0';
		$test['xpksin'] = I('get.xpksin')?I('get.xpksin'):'0';
		$test['fev1'] = I('get.fev1')?I('get.fev1'):'0';
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';


		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$member_info = json_decode(post_json($url,$json),true);

		// dump($member_info);
		$this->assign("member_info",$member_info);

		// dump($arr);
		// dump($test);
		$this->assign('test',$test);
		$this->assign('arr',$arr);
		$this->assign('type',$type);
		$this->display(); // 输出模板
	}

}