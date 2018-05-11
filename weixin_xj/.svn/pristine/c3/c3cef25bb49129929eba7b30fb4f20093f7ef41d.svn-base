<?php
namespace Member\Controller;
use Think\Controller;
class IllController extends Controller 
{
	//疾病问答
	public function answer()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$answer_id = I('get.answer_id');
		$url = C("PATH_URL")."/interface/yc_member/answer_info.aspx?access_token=".$token;
		$data = array
		(
			"answer_id"=>$answer_id,
			"openid"=>"$openid"
		);
		$json = json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$answer['ANSWER_TITLE'] = $data[ANSWER_TITLE];
		$answer['ANSWER_CONTENT'] = html_entity_decode($data[ANSWER_CONTENT]);
		$this->assign($answer);
		$this->display();
	}

	//疾病知识
	public function ill()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$ill_id = I('get.ill_id');
		$url = C("PATH_URL")."/interface/yc_member/ill_info.aspx?access_token=".$token;
		$data = array
		(
			"ill_id"=>$ill_id,
			"openid"=>"$openid"
		);
		$json = json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$ill['ILL_NAME'] = $data[ILL_NAME];
		$ill['ILL_CONTENT'] = html_entity_decode($data[ILL_CONTENT]);
		$this->assign($ill);
		$this->display();
	}
}