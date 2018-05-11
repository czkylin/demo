<?php
namespace Home\Controller;
use Think\Controller;
class ConsultController extends Controller
{
	//咨询对话详情
	public function consult_details()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$consult_id = $_GET['consult_id'];
		//咨询内容列表
		$url = C("PATH_URL")."/interface/yc_hos/consult_info.aspx?access_token=".$token;
		//咨询标题
		$title_url = C("PATH_URL")."/interface/yc_hos/consult_title.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id"
		);
		$json=json_encode($data);
		$cosult_list =json_decode(post_json($url,$json),true);

		$title =json_decode(post_json($title_url,$json),true);
		$this->assign("cosult_list",$cosult_list);
		$this->assign("title",$title);
		$this->assign("consult_id",$consult_id);
		$this->display(); 
	}
	//咨询回复
	public function consult_response()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$consult_id=I('post.consult_id');
		$reply_content=urlencode(I('post.consultContent'));
		$create_date=date('Y-m-d H:i:s',time());
		$imgbase64 = I('post.imgbase64');//获取base64图片字符串 
		if($reply_content==""&&$imgbase64=="")
		{
			die("不能提交空数据！");
		}
		if(empty($imgbase64))
		{
			$pic_path = "";
		}
		else if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
		{
			//匹配出图片的格式
			$type = $result[2]; //图片类型
			$type = str_replace("jpeg","jpg", $type);
			$new_file = "./Public/Uploads/zixun/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
			if (is_dir(dirname($new_file)) == false)
			{
				mkdir(dirname($new_file), 0777, true);
			}
			$base64 = base64_decode(str_replace($result[1],"",$imgbase64));//去除头部无用信息
			if (file_put_contents($new_file, $base64))
			{
				//处理图片
				$image = new \Think\Image();
				$image->open($new_file);
				// 按照原图的比例生成一个最大为1000*1000的缩略图并保存
				$image->thumb(200, 200)->save($new_file);
				$pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
			}
		}
		$url = C("PATH_URL")."/interface/yc_hos/consult_reply_info_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"consult_id"=>"$consult_id",
			"reply_content"=>"$reply_content",
			"create_date"=>"$create_date",
			"reply_img"=>"$pic_path"
		);
		$json=urldecode(json_encode($data));
		$data = post_json($url,$json);
		$data = json_decode($data,true);
		if($data['error_code']!='ok')
		{
			$this->redirect("?m=Home&c=Consult&a=consult_details&consult_id=".$consult_id);

		}
		else
		{
			redirect("?m=Home&c=Consult&a=consult_details&consult_id=".$consult_id);
		}
	}
}