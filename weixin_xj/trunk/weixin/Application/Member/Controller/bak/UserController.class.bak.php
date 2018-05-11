<?php
namespace Member\Controller;
use Think\Controller;
class UserController extends Controller
{
	public function band_phone()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$token = A_token();
		//获取会员的头像及昵称
		$url = "http://weixin.yk2020.com/interface/yc_member/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		//dump($data);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		//dump($user_info);die;
		$user['HEADIMGURL'] = $user_info['HEADIMGURL'];
		$user['NICKNAME'] = $user_info['NICKNAME'];
		$this->assign('user',$user);
		$this->display(); // 输出模板
	}

	//绑定手机号
	public function band_phone_add()
	{
		$link_phone = I('post.mobile');//获取post变量
		$sendcode = I('post.sendcode');
		$code = I('post.code');

		if($sendcode != $code)
		{
			$this->redirect('?m=Member&c=User&a=band_phone');
		}
		$token = A_token();
		//提交手机号信息
		$url = "http://weixin.yk2020.com/interface/yc_member/phone_band.aspx?Access_token=".$token;
		
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$data = array
		(
			"openid"=>"$openid",
			"link_phone"=>"$link_phone"
		);
		$json=json_encode($data);
		$member_info = json_decode(post_json($url,$json),true);
		if($member_info['member_id'] != "")
		{
			if($member_info['info_flag'] == "1")
			{
				$this->redirect('?m=Member&c=User&a=band_success');
			}
			else
			{
				$this->redirect('?m=Member&c=User&a=band_name');
			}
		}
		else
		{
			$this->redirect('?m=Member&c=User&a=band_phone');
		}
	}

	public function band_name()
	{
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取患者信息
		$url = "http://weixin.yk2020.com/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign('phone',$data['MEMBER_MOBILE']);// 赋值
		$this->assign('member_name',$data['MEMBER_NAME']);
		$this->assign('member_card',$data['MEMBER_CARD']);
		$this->display(); // 输出模板
	}

	//补全用户信息、用户名、省份证号
	public function band_name_add()
	{
		$username = I('get.username', '');//获取get变量
		$idcard = I('get.idcard', '');
		$token = A_token();
		//获取患者姓名、身份证信息
		$url = "http://weixin.yk2020.com/interface/yc_member/name_edit.aspx?Access_token=".$token;
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$data = array
		(
			"openid"=>"$openid",
			"member_name"=>"$username",
			"member_card"=>"$idcard"
		);

		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		if($user_info['error_code']!="ok")
		{
			echo 'fail';
			die;
		}
		else
		{
			echo 'ok';
		}
	}

	//判断会员手机是否绑定成功
	public function band_success()
	{
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->display(); // 输出模板
	}

	//会员个人空间
	public function member_index()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者端个人空间信息
		$url = "http://weixin.yk2020.com/interface/yc_member/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$nickname = $data['NICKNAME'];
		$headimgurl = $data['HEADIMGURL'];
		$this->assign('nickname',$nickname);
		$this->assign('headimgurl',$headimgurl);
		$this->display(); // 输出模板
	}

	//个人账户详细页面
	public function user_info()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = "http://weixin.yk2020.com/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$user_array['member_sex'] = $data['MEMBER_SEX'];
		$user_array['member_pic'] = $data['MEMBER_PIC'];
		$user_array['name'] = $data['MEMBER_NAME'];
		$user_array['phone'] = $data['MEMBER_MOBILE'];
		$user_array['time'] = $data['CREATE_DATE'];
		$this->assign($user_array);
		$this->assign('member_pic_encode',urlencode(passport_encrypt($data['MEMBER_PIC'], "123")));
		$this->display(); // 输出模板
	}

	//修改会员密码
	public function pwd_edit()
	{
		/*$oldpwd = I('post.oldpwd', '');//获取post变量
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取患者详细信息
		$url = "http://weixin.yk2020.com/interface/yc_member/pwd_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"pwd"=>"$oldpwd"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);*/

		$this->display();
	}

	//修改会员头像
	public function edit_face()
	{
		$user_pic = I('get.user_pic', '');
		$this->assign('user_pic',passport_decrypt($user_pic, "123"));
		$this->display();
	}


	//修改会员头像
	public function edit_face_ok()
	{
		//新方法
		$imgbase64 = $_POST['imgbase64'];//获取base64图片字符串
		if(empty($imgbase64))
		{
			//上传错误提示错误信息
			$this->redirect('?m=Member&c=User&a=user_info');
		}

		//匹配出图片的格式 
		if (preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
		{
			$type = $result[2]; //图片类型
			$type = str_replace("jpeg","jpg", $type);
			
			$new_file = "./Public/Uploads/member_face/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
			
			if (is_dir(dirname($new_file)) == false)
			{
				mkdir(dirname($new_file), 0777, true);
			}

			$base64 = base64_decode(str_replace($result[1],"",$imgbase64));//去除头部无用信息

			if (file_put_contents($new_file, $base64))
			{
				$x1 = I('post.x1', '');
				if ($x1 != "")
				{
					$y1 = I('post.y1', '');
					$rec_width = I('post.rec_width', '');
					$rec_height = I('post.rec_height', '');
					$prepic_width = I('post.prepic_width', '');

					//处理图片
					$image = new \Think\Image(); 
					$image->open($new_file);

					$real_width = $image->width();

					$scale_ratio = $real_width / $prepic_width;

					//按照坐标裁剪图并保存
					$image->crop($rec_width * $scale_ratio, $rec_height * $scale_ratio, $x1 * $scale_ratio, $y1 * $scale_ratio, $rec_width * $scale_ratio, $rec_height * $scale_ratio)->save($new_file);
				}

				//平台access_token
				$token = A_token();


				//获取openid
				include MODULE_PATH.'/Common/open_id.php';

				//验证手机是否绑定
				include MODULE_PATH.'/Common/check_band.php';

				$user_pic = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);

				//获取订单列表满足查询条件的
				$url = "http://weixin.yk2020.com/interface/yc_member/face_edit.aspx?access_token=".$token;
				$data = array
				(
					"openid"=>"$openid",
					"user_pic"=>"$user_pic"
				);
				
				$json=json_encode($data);
				$case_add = json_decode(post_json($url,$json),true);
				if($case_add['error_code'] == "ok")
				{
					$this->redirect('?m=Member&c=User&a=user_info');
				}
				else
				{
					$this->redirect('?m=Member&c=User&a=user_info');
				}
			}
			else
			{
				$this->redirect('?m=Member&c=User&a=user_info');
			}
		}
		else
		{
			$this->redirect('?m=Member&c=User&a=user_info');
		}
	}

	//关于我们
	public function about_us()
	{
		$this->display();
	}



public function post_code2()
{
	$token = A_token();
	//echo $token;
	//获取openid
	include MODULE_PATH.'/Common/open_id.php';
	$hostip = get_hostip();
	$url = "http://weixin.yk2020.com/interface/yc_member/update_info.aspx?access_token=".$token;
	$data = array
	(
		"openid"=>"$openid",
	        "column_name"=>"$column_name",
	        "column_value"=>"$column_value"
	);

	//link_phone  post_ip

	$json=json_encode($data);
	echo $json;
	$yzm_info = json_decode(post_json($url,$json),true);
	return $yzm_info;

}












	//绑定手机号发送验证码
	public function send_msm()
	{
		$phone = I('post.mobile', '15353652351');
		$sendto = "y".substr($phone,4);
		$hostip = get_hostip();

		$str = post_code2($phone,$hostip);
		echo $str;
		die;


		if(!empty($sendto))
		{
			post_code($phone,$hostip);
			print_r($curlPost."data=".$data);
		}
		session_start();
		$lifeTime = 300;
		session_set_cookie_params($lifeTime);
		$_SESSION[$sendto] = time();
		$sendcode = $sendto.'code';
		$_SESSION['code']=$code;//将content的值保存在session中
		echo 'ok';
		exit;
	}


	
	//修改性别
	public function sex_update()
	{
	    $sex = I('get.sex', '');
	    $this->assign('sex',$sex);
	    $this->display();
	}
	
	//修改信息
	public function update_sex_ok()
	{
	    //获取平台的access_token
	    $token = A_token();
	
	    //获取openid
	    include MODULE_PATH.'/Common/open_id.php';
	
	    //验证手机是否绑定
	    include MODULE_PATH.'/Common/check_band.php';
	
	    $column_value = I('post.column_value', '');
	    $column_name = I('post.column_name', '');
	
	    //获取医生详细信息
	    $url = "http://weixin.yk2020.com/interface/yc_member/update_info.aspx?access_token=".$token;
	    $data = array
	    (
	        "openid"=>"$openid",
	        "column_name"=>"$column_name",
	        "column_value"=>"$column_value"
	    );
	    $json=json_encode($data);
	    $update_info = json_decode(post_json($url,$json),true); 
	    //header("Location:/weixin/index.php?m=Member&c=User&a=user_info");
	    $this->redirect("?m=Member&c=User&a=user_info");
	  
	}
}