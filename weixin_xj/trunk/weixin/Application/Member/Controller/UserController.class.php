<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class UserController extends Controller
{
	public function band_phone()
	{
		$token = A_token();
		//获取openid

		include MODULE_PATH.'/Common/open_id.php';
		//获取会员的头像及昵称
		$url = C("PATH_URL")."/interface/yc_member/wx_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		//dump($data);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		//print_r($user_info);die;
		$user['HEADIMGURL'] = $user_info['HEADIMGURL'];
		$user['NICKNAME'] = $user_info['NICKNAME'];
		$this->assign('user',$user);
		$this->display(); 
        // 输出模板
	}

	//绑定手机号
	public function band_phone_add()
	{
		$link_phone = I('post.link_mobile');//获取post变量
		$sms_code=I('post.sms_code');
		$token = A_token();

		$jiekou = C("PATH_URL");
		//提交手机号信息
		$url = $jiekou."/interface/yc_member/phone_band.aspx?Access_token=".$token;	
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		$data = array
		(
			"openid"=>"$openid",
			"link_phone"=>"$link_phone",
			"sms_number"=>"$sms_code"
		);
		$json=json_encode($data);
		$doc_info = json_decode(post_json($url,$json),true);

		if ($doc_info['info_flag'] != "")
		{

			echo $doc_info['info_flag'];
		}
		else
		{
			if($doc_info['error_code'])
            {
				echo $doc_info['error_code'];
			}
			else
			{
				echo "服务器错误";
			}
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
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
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
		$url = C("PATH_URL")."/interface/yc_member/name_edit.aspx?Access_token=".$token;
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
		$url = C("PATH_URL")."/interface/yc_member/wx_user_info.aspx?access_token=".$token;
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
		$url =  C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
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
		$this->assign('openid',"$openid");
		$this->assign('member_pic_encode',urlencode(passport_encrypt($data['MEMBER_PIC'], "123")));


		//判断是否是公司内部员工
		$url = C("PATH_URL")."/interface/yc_member/is_staff.aspx?access_token=".$token;;
		$data = array
	    (
			"openid"=>"$openid"
		);
	    $json=json_encode($data);
		$res = json_decode(post_json($url,$json),true);
		$this->assign('res',$res);
		
		$this->display(); // 输出模板
	}


	//个人账户详细页面
	public function isjtys()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//我的家庭医生先调用
		$url = C("PATH_URL")."/interface/yc_member/vip_flag.aspx?access_token=".$token;;
		$data = array
	    (
			"openid"=>"$openid"
		);
	    $json=json_encode($data);
		$vip_flag = json_decode(post_json($url,$json),true);
		// $vip_flag['error_code'] = "ok";
		switch ($vip_flag['error_code']) 
		{
			case 'ok':
				$flag = 'ok';
				redirect(U('Jtys/expert_list'));
				break;
			case '00025':
				$flag = '你好，你已经购买过vip卡并且已关联大专家但还未审核';
				break;
			case '00027':
				$flag = '你好，你购买了vip卡但是还未关联医生';
				break;
			case '00026':
				$flag = '你好，你购买了vip卡但是还未付款';
				break;
			case '00028':
				$flag = '你好，你的vip会员卡已经过期，请重新购买';
				break;
			case '00024':
				$flag = '你好，你还未购买vip卡,请先购买';
				break;
			case '00010':
				$flag = '你好，你未绑定手机';
				break;
			default:
				$flag ='系统错误';
				break;
		}

		$this->assign('flag',$flag);
		$this->assign('vip_flag',$vip_flag['error_code']);
		$this->display(); // 输出模板
	}

    //个人详情
    public function info_detail()
    {
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        //获取患者详细信息
        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $data = json_decode(post_json($url,$json),true);
        if($data['MEMBER_PIC']=="/weixin/Application/Member/View/images/member.png")
        {
            $data['MEMBER_PIC']="";
        }
        $user_array['member_sex'] = $data['MEMBER_SEX'];
        $user_array['member_age'] = $data['MEMBER_AGE'];
        $user_array['member_pic'] = $data['MEMBER_PIC'];
        $user_array['member_name'] = $data['MEMBER_NAME'];
        $user_array['phone'] = $data['MEMBER_MOBILE'];
        $user_array['time'] = $data['CREATE_DATE'];
        $user_array['member_id'] = $data['MEMBER_ID'];
        $user_array['MEMBER_CARD'] = $data['MEMBER_CARD'];

        $this->assign($user_array);
        $this->assign('openid',"$openid");
        $this->assign('member_pic_encode',urlencode(passport_encrypt($data['MEMBER_PIC'], "123")));
        $this->display();
    }


    //病历管理
	public function wd_bingli()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);		
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		
		$this->assign("data",$data);
		$this->assign("member_id",$member_id);
		$this->display();
	}

	//病历管理 加载更多
	public function wd_bingli_append()
	{
		$member_id = I("get.member_id",'');
		$page_num = I('get.page_num', '2');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		$this->assign("data",$data);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


    //我的病例
	public function wd_bingli_bak()
	{
		$token = A_token();
		//获取openid
		//
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/mycase_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);		
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		// var_dump($data);
		$this->assign('data',$data);
		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/my_personid.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);		
		$json=json_encode($data);
		$record_id = json_decode(post_json($url,$json),true);
		$this->assign("record_id",$record_id['record_id']);
		$this->assign("member_id",$member_id);
		$this->display();
	}


	//我的病例加载
	public function wd_bingli_bak_append()
	{
		$member_id = I("get.member_id",'');
		$page_num = I('get.page_num', '2');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/mycase_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		$this->assign("data",$data);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


	//我的就诊人
	public function my_bingli()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取病例列表
		$url = C("PATH_URL")."/interface/yc_member/case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);		
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		$this->assign("data",$data);
		$this->assign("member_id",$member_id);
		$this->display();
	}

	//我的病例 加载更多
	public function my_bingli_append()
	{
		$member_id = I("get.member_id",'');
		$page_num = I('get.page_num', '2');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取病例列表
		$url = C("PATH_URL")."/interface/yc_member/case_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		$this->assign("data",$data);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//添加就诊人
    public function jzr_add()
    {
    	$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

    	$this->display();
    }

	//添加就诊人
    public function jzr_add_ok()
    {
    	$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

        $jzr_name = I('post.jzr_name','');
        $jzr_sex = I('post.jzr_sex','');
        $jzr_date = I('post.jzr_date','');
        $jzr_code = I('post.jzr_code','');
        $jzr_phone = I('post.jzr_phone','');
        // $person_age = I('post.jzr_age','');
        $jzr_sex = $jzr_sex == '男'?0:1;
       	
        $person_age = date('Y', time()) - date('Y', strtotime($jzr_date)) - 1;  
		if (date('m', time()) == date('m', strtotime($jzr_date)))
		{  
		  
		    if (date('d', time()) > date('d', strtotime($jzr_date)))
		    {  
		    	$person_age++;  
		    }  
		}
		elseif (date('m', time()) > date('m', strtotime($jzr_date)))
		{  
		    $person_age++;  
		}  


        $ch = curl_init();

		$url = "http://apis.juhe.cn/idcard/index?key=3bc516dc2f242cedb72f4aa43834dc02&cardno=".$jzr_code;
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    // 执行HTTP请求
	    curl_setopt($ch , CURLOPT_URL , $url);
	    $res = curl_exec($ch);
	    $result = json_decode($res,true);
	    if($result['resultcode'] != 200)
	    {
	    	echo "5";
	    	return;
	    }

	    $jzr_code = strtoupper($jzr_code);
        //获取添加就诊人接口
		$url = C("PATH_URL")."/interface/yc_member/person_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "person_name"=>"$jzr_name",
            "person_sex" =>"$jzr_sex",
            "person_idcard" =>"$jzr_code",
            "person_mobile" =>"$jzr_phone",
            "person_birth" =>"$jzr_date",
            "person_age" =>"$person_age"
        );
        $json=json_encode($data);
        $tianjia_jzr = json_decode(post_json($url,$json),true);
        switch ($tianjia_jzr['error_code']) 
        {
            case 'ok':
                echo "1";
                break;
            case '00019':
                echo "2";
                break;
            case '00001':
                echo "3";
                break;
            default:
                echo "4";
                break;
        }
    }

    //修改就诊人信息页面
    public function jzr_update()
    {
        $record_id = I('get.record_id','');

        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

        //获取修改就诊人接口
        $url = C("PATH_URL")."/interface/yc_member/person_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "record_id"=>"$record_id"
        );
        $json=json_encode($data);
        $jzr = json_decode(post_json($url,$json),true);
        $this->assign('record_id',$record_id);
        $this->assign("jzr",$jzr);
        $this->display();
    }


    //修改就诊人信息
    public function jzr_update_ok()
    {
        $record_id = I('post.record_id','');
        $jzr_name = I('post.jzr_name','');
        $jzr_sex = I('post.jzr_sex','');
        $jzr_date = I('post.jzr_date','');
        $jzr_code = I('post.jzr_code','');
        $jzr_phone = I('post.jzr_phone','');
        // $person_age = I('post.jzr_age','');
        $jzr_sex = $jzr_sex == '男'?0:1;


        $person_age = date('Y', time()) - date('Y', strtotime($jzr_date)) - 1;  
		if (date('m', time()) == date('m', strtotime($jzr_date)))
		{  
		  
		    if (date('d', time()) > date('d', strtotime($jzr_date)))
		    {  
		    	$person_age++;  
		    }  
		}
		elseif (date('m', time()) > date('m', strtotime($jzr_date)))
		{  
		    $person_age++;  
		} 

		
        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$ch = curl_init();

		$url = "http://apis.juhe.cn/idcard/index?key=3bc516dc2f242cedb72f4aa43834dc02&cardno=".$jzr_code;
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    // 执行HTTP请求
	    curl_setopt($ch , CURLOPT_URL , $url);
	    $res = curl_exec($ch);
	    $result = json_decode($res,true);
	    if($result['resultcode'] != 200)
	    {
	    	echo "5";
	    	return;
	    }

        //获取修改就诊人接口
        $url = C("PATH_URL")."/interface/yc_member/update_person_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "record_id"=>"$record_id",
            "person_name"=>"$jzr_name",
            "person_sex"=>"$jzr_sex",
            "person_idcard"=>"$jzr_code",
            "person_mobile"=>"$jzr_phone",
            "person_birth"=>"$jzr_date",
            "person_age"=>"$person_age"
        );

        $json=json_encode($data);
        $jzr = json_decode(post_json($url,$json),true);

		switch ($jzr['error_code']) 
		{
			case 'ok':
				$code = '1';
				break;
			case '00046':
				$code = '2';
				break;
			case '00001':
				$code = '3';
				break;
			case '00019':
				$code = '4';
				break;
			default:
				$code = $jzr;
				break;
		}

		$this->ajaxReturn($code);
    }

    //删除就诊人
    public function jzr_del()
    {
        $record_id = I('post.record_id','');
        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


        //获取删除就诊人接口
        $url = C("PATH_URL")."/interface/yc_member/person_delete.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "record_id"=>"$record_id"
        );
        $json=json_encode($data);
        $jzr_list = json_decode(post_json($url,$json),true);
        if($jzr_list['error_code'] == 'ok')
        {
            echo "1";
        }
        if($jzr_list['error_code'] == 'no')
        {
            echo "2";
        }

    }


    //创建就诊记录
    public function bingli_add()
    {
    	$record_id = I('get.record_id','');
    	$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->assign('record_id',$record_id);
    	$this->display();
    }


    //创建就诊记录
    public function bingli_add_ok()
    {
        $record_id = I('post.record_id','');
        $case_title = I('post.bingli_name','');
        $case_desc = I('post.bingli_ms','');
        $imgbase64 = I('post.imgbase64','');
        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

        if(empty($imgbase64))
        {
            //上传错误提示错误信息
            $pic_path = "";
            //echo "空值";
        }
        else if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgbase64, $result))
        {
            //匹配出图片的格式
            $type = $result[2]; //图片类型
            $type = str_replace("jpeg","jpg", $type);
                
            $new_file = "./Public/Uploads/bingli/".date("Y-m-d")."/".time().".{$type}";//保存名称、文件名
                
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
                $image->thumb(1000, 1000)->save($new_file);
                $pic_path = "http://".$_SERVER['HTTP_HOST'].str_replace("./Public/","/weixin/Public/",$new_file);
            }
        }
        //获取创建就诊记录接口
        $url = C("PATH_URL")."/interface/yc_member/case_add.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "record_id"=>"$record_id",
            "case_title"=>"$case_title",
            "case_desc"=>"$case_desc",
            "case_pics"=>"$pic_path"
        );

        $json=json_encode($data);
        $bingli = json_decode(post_json($url,$json),true);
        if($bingli['error_code'] == 'ok')
        {
            echo "1";
        }
    }

    //修改就诊记录页
    public function bingli_info()
    {
        $case_id = I('get.case_id','');
        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

        //获取病例详情
        $url = C("PATH_URL")."/interface/yc_member/case_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "case_id"=>"$case_id"
        );
        $json=json_encode($data);
        $bingli_info = json_decode(post_json($url,$json),true);
        $this->assign('bingli_info',$bingli_info);
        $this->display();
    }

    //修改就诊记录页
    public function bingli_update()
    {
        $case_id = I('get.case_id','');
        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取病例详情
        $url = C("PATH_URL")."/interface/yc_member/case_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "case_id"=>"$case_id"
        );
        $json=json_encode($data);
        $bingli_info = json_decode(post_json($url,$json),true);
        $this->assign('bingli_info',$bingli_info);

        $this->display();
    }

    //修改就诊记录页
    public function bingli_update_ok()
    {
        $case_id = I('post.case_id','');
        $case_title = I('post.bingli_name','');
        $case_desc = I('post.bingli_ms','');
        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

        //获取修改就诊记录接口
        $url = C("PATH_URL")."/interface/yc_member/case_edit.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "case_id"=>"$case_id",
            "case_desc"=>"$case_desc",
            "case_title"=>"$case_title"
        );
        $json=json_encode($data);
        $jzjl = json_decode(post_json($url,$json),true);
        if($jzjl['error_code'] == 'ok')
        {
            echo "1";
        }

    }

    //删除就诊记录
    public function bingli_del()
    {
        $case_id = I('post.case_id','');
        //获取平台的access_token
        $token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
        //获取修改就诊人接口
        $url = C("PATH_URL")."/interface/yc_member/case_delete.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "case_id"=>"$case_id"
        );
        $json=json_encode($data);
        $blsc = json_decode(post_json($url,$json),true);
        if($blsc['error_code'] == 'ok')
        {
            echo "1";
        }
    }


	//修改会员密码
	public function pwd_edit()
	{
		/*$oldpwd = I('post.oldpwd', '');//获取post变量
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/pwd_info.aspx?access_token=".$token;
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
				$url = C("PATH_URL")."/interface/yc_member/face_edit.aspx?access_token=".$token;
				$data = array
				(
					"openid"=>"$openid",
					"user_pic"=>"$user_pic"
				);
				
				$json=json_encode($data);
				$case_add = json_decode(post_json($url,$json),true);
				if($case_add['error_code'] == "ok")
				{
					$this->redirect('?m=Member&c=User&a=info_detail');
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

	//绑定手机号发送验证码
	public function send_msm()
	{
		$link_mobile = I('post.link_mobile');
		$type = I('post.type', '1');

		if(!strstr($_SERVER['HTTP_REFERER'],"band_phone")){
			echo "00006";exit;
		}

		if (strlen($link_mobile) == "11") {
			if(preg_match("/^(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[0-9])[0-9]{8}$/", $link_mobile)){
				$error_code = post_code1($link_mobile,$type);
				echo $error_code;
			}else{
				echo "00020";
			}			
		}else{
			echo "00020";
		}
		exit;
	}
	
	//修改性别
	public function sex_update()
	{
		//获取平台的access_token
	    $token = A_token();
	
	    //获取openid
	    include MODULE_PATH.'/Common/open_id.php';	

	    //验证手机是否绑定
	    include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$member_info = json_decode(post_json($url,$json),true);
		//print_R($member_info);die;
	    $this->assign('sex',$member_info['MEMBER_SEX']);
	    $this->display();
	}

	//修改性别
	public function age_update()
	{
		//获取平台的access_token
	    $token = A_token();
	
	    //获取openid
	    include MODULE_PATH.'/Common/open_id.php';	

	    //验证手机是否绑定
	    include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$member_info = json_decode(post_json($url,$json),true);
		//print_R($member_info);die;
	    $this->assign('age',$member_info['MEMBER_AGE']);
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

	    $member_age = I('post.member_age', '');

	    //获取医生详细信息
	    $url = C("PATH_URL")."/interface/yc_member/update_info.aspx?access_token=".$token;
	    $data = array
	    (
	        "openid"=>"$openid",
	        "column_name"=>"$column_name",
	        "column_value"=>"$column_value"
	    );
	    $json=json_encode($data);
	    $update_info = json_decode(post_json($url,$json),true); 
	    //header("Location:/weixin/index.php?m=Member&c=User&a=user_info");
	    $this->redirect("?m=Member&c=User&a=info_detail");
	  
	}

	//我的阅片列表
	public  function yuepian_list(){

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Commoneck_band.php';
		//获取阅片列表
		$url = C("PATH_URL")."/interface/yc_member/member_yp_list.aspx?access_token=".$token;
		$data = array
	    (
			 "openid"=>"$openid",
			 "page_num"=>"1"
		);
	    $json=json_encode($data);
		$yuepian_list = json_decode(post_json($url,$json),true);
		$this->assign('yuepian_list',$yuepian_list);// 赋值数据集
		$this->display(); // 输出模板
	}

	//阅片加载更多
	public  function yuepian_list_append(){

		$page_num = I('get.page_num',"1");
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		//验证手机是否绑定
		include MODULE_PATH.'/Commoneck_band.php';
		//获取阅片列表
		$url = C("PATH_URL")."/interface/yc_member/member_yp_list.aspx?access_token=".$token;
		$data = array
	    (
			 "openid"=>"$openid",
			 "page_num"=>"$page_num"
		 );
	    $json=json_encode($data);
		$yuepian_list = json_decode(post_json($url,$json),true);

		$this->assign('yuepian_list',$yuepian_list);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//阅片详情
	public function yuepian_detail(){
		
		$yp_id=I('get.yp_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Commoneck_band.php';

		//获取阅片详情信息
		$url = C("PATH_URL")."/interface/yc_member/member_yp_mx.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"yp_id"=>"$yp_id"
		 );
	    $json=json_encode($data);
		$yuepian_info = json_decode(post_json($url,$json),true);
		// var_dump($yuepian_info);die;
		$this->assign('yuepian_info',$yuepian_info);// 赋值数据集
		$this->display(); // 输出模板
	}

	//积分明细
	public function jifen_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_jf_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$jifen_list = json_decode(post_json($url,$json),true);
		$this->assign('jifen_list',$jifen_list);
		$this->display(); // 输出模板
	}

	//积分明细加载更多
	public function jifen_list_append()
	{
		$page_num = I('get.page_num','2');

		//获取平台的access_token
		$token = A_token();                                                                  

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_jf_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
		$json=json_encode($data);
		$jifen_list = json_decode(post_json($url,$json),true);

		$this->assign('jifen_list',$jifen_list);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//我的档案
	public function dangan()
	{
		$member_id = I("get.member_id");

		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$member_info = json_decode(post_json($url,$json),true);

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_ytj_all.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$member_ytj = json_decode(post_json($url,$json),true);
		// var_dump($url,$json);
	
		$this->assign('member_ytj',$member_ytj);
		$this->assign('member_info',$member_info);
		$this->assign('member_id',$member_id);
		$this->display();
	}

	//一体机
	public function dangan_yitiji()
	{
		$member_mobile = I('get.member_mobile','');

		$token = A_token();
		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else{
			$openid=0;
		}
		

		//获取健康报告详情信息
		$url = C("PATH_URL")."/interface/yc_member/member_ytj_all_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		// var_dump($jk_info);
		$info = array();
		foreach ($jk_info[0] as $k1 => $v1) {
			if($k1=="MEMBER_ID" || $k1=="MEMBER_NAME" || $k1=="MEMBER_MOBILE"){
				continue;
			}
			if(!empty($v1)){
				foreach ($v1 as $key => $value) {

					foreach ($value as $k => $v) {
						if($k=="EXAMTIME" || $k=="CREATE_DATE"){
							if($k1!="BLOODOXYGEN"){
								continue;
							}
						}
						if($k1=="BLOODOXYGEN" && $k=="EXAMTIME"){
							$info["$k1"]["$k"] .= "'".Dtodiy("m月d日",$v)."',";
						}elseif($k1=="URINE"){
							$info["$k1"]["$k"] .= $v.",";
						}else{
							$info["$k1"]["$k"] .= round($v,1).",";
						}
					}
				}
				foreach ($info["$k1"] as $k2 => $v2) {
					$info["$k1"]["$k2"] = rtrim($v2,',');
				}
			}
		}
		// var_dump($info);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('info',$info);
		$this->assign('tj_type',$tj_type);
		$this->assign('member_mobile',$jk_info[0]['MEMBER_MOBILE']);
		$this->display(); // 输出模板
	}


	//血压管理
	public function dangan_xueyaguanli()
	{
		$member_mobile = I('get.member_mobile','');

		$token = A_token();
		
		if(!$member_mobile){
			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else{
			$openid=0;
		}
		

		//获取健康报告详情信息
		$url = C("PATH_URL")."/interface/yc_member/member_gxy_all_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		
		// var_dump(post_json($url,$json));
		$info = array();
		foreach ($jk_info[0] as $k1 => $v1) {
			if($k1=="MEMBER_ID" || $k1=="MEMBER_NAME" || $k1=="MEMBER_MOBILE"){
				continue;
			}
			if(!empty($v1)){
				foreach ($v1 as $key => $value) {

					foreach ($value as $k => $v) {
						if($k=="EXAMTIME" || $k=="CREATE_DATE"){
							continue;
						}
						
						if($k == 'MEASURE_DATE'){
							$info["$k1"]["MEASURE_DATE"] .= "'".Dtodiy("m-d",$v)."',";
							continue;
						}else{
							$info["$k1"]["$k"] .= "'".round($v,1)."',";
						}
						
					}
				}
				foreach ($info["$k1"] as $k2 => $v2) {
					$info["$k1"]["$k2"] = rtrim($v2,',');
				}
			}
		}
		$new_stepcount = '暂无';

		if(isset($jk_info[0]['STEPCOUNT'][0])){
			$new_stepcount = Dtodiy("m-d",$jk_info[0]['STEPCOUNT'][0]['MEASURE_DATE'])."共走了".$jk_info[0]['STEPCOUNT'][0]['STEPCOUNT']."步";

		}
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('info',$info);
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$jk_info[0]['MEMBER_ID']);
		$this->assign('member_mobile',$jk_info[0]['MEMBER_MOBILE']);
		$this->assign('new_stepcount',$new_stepcount);
		$this->display(); // 输出模板
	}


	//腕表档案
	public function dangan_expert()
	{
		$member_mobile = I('get.member_mobile','');

		$token = A_token();

		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else
		{
			$openid=0;
		}
		

		//获取健康报告详情信息
		$url = C("PATH_URL")."/interface/yc_member/member_wb_all_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		
		
		$info = array();
		foreach ($jk_info[0] as $k1 => $v1) {
			if($k1=="MEMBER_ID" || $k1=="MEMBER_NAME" || $k1=="MEMBER_MOBILE"){
				continue;
			}
			if(!empty($v1)){
				foreach ($v1 as $key => $value) {

					foreach ($value as $k => $v) {
						if($k=="EXAMTIME" || $k=="CREATE_DATE"){
							continue;
						}
						$info["$k1"]["$k"] .= round($v,1).",";
					}
				}
				foreach ($info["$k1"] as $k2 => $v2) {
					$info["$k1"]["$k2"] = rtrim($v2,',');
				}
			}
		}
		// var_dump($info);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('info',$info);
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$jk_info[0]['MEMBER_ID']);
		$this->assign('member_mobile',$jk_info[0]['MEMBER_MOBILE']);
		$this->display(); // 输出模板
	}

	//机器人健康套装
	public function dangan_jiqi()
	{
		$member_mobile = I('get.member_mobile','');

		$token = A_token();

		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else
		{
			$openid=0;
		}
		

		//获取健康报告详情信息
		$url = C("PATH_URL")."/interface/yc_member/member_jiqi_all_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
	
		// var_dump($jk_info);
		$info = array();
		foreach ($jk_info[0] as $k1 => $v1) {
			if($k1=="MEMBER_ID" || $k1=="MEMBER_NAME" || $k1=="MEMBER_MOBILE"){
				continue;
			}
			if(!empty($v1)){
				foreach ($v1 as $key => $value) {

					foreach ($value as $k => $v) {
						if($k=="EXAMTIME" || $k=="CREATE_DATE"){
							continue;
						}
						$info["$k1"]["$k"] .= round($v,1).",";
					}
				}
				foreach ($info["$k1"] as $k2 => $v2) {
					$info["$k1"]["$k2"] = rtrim($v2,',');
				}
			}
		}
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('info',$info);
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$jk_info[0]['MEMBER_ID']);
		$this->assign('member_mobile',$jk_info[0]['MEMBER_MOBILE']);
		$this->display(); // 输出模板
	}

	//大麦套装
	public function dangan_damai()
	{
		$member_mobile = I('get.member_mobile','');

		$token = A_token();

		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else
		{
			$openid=0;
		}
		

		//获取健康报告详情信息
		$url = C("PATH_URL")."/interface/yc_member/member_damai_all_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		
		$info = array();
		foreach ($jk_info[0] as $k1 => $v1) {
			if($k1=="MEMBER_ID" || $k1=="MEMBER_NAME" || $k1=="MEMBER_MOBILE"){
				continue;
			}
			if(!empty($v1)){
				foreach ($v1 as $key => $value) {

					foreach ($value as $k => $v) {
						if($k=="EXAMTIME" || $k=="CREATE_DATE"){
							continue;
						}
						
						if($k == 'MEASURE_DATE'){
							$info["$k1"]["MEASURE_DATE"] .= "'".Dtodiy("m-d",$v)."',";
							continue;
						}else{
							$info["$k1"]["$k"] .= "'".round($v,1)."',";
						}
						
					}
				}
				foreach ($info["$k1"] as $k2 => $v2) {
					$info["$k1"]["$k2"] = rtrim($v2,',');
				}
			}
		}
		$new_stepcount = '暂无';

		if(isset($jk_info[0]['STEPCOUNT'][0])){
			$new_stepcount = Dtodiy("m-d",$jk_info[0]['STEPCOUNT'][0]['MEASURE_DATE'])."共走了".$jk_info[0]['STEPCOUNT'][0]['STEPCOUNT']."步";

		}
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('info',$info);
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$jk_info[0]['MEMBER_ID']);
		$this->assign('member_mobile',$jk_info[0]['MEMBER_MOBILE']);
		$this->assign('new_stepcount',$new_stepcount);
		$this->display(); // 输出模板
	}

	//手机套装
	public function dangan_shouji()
	{
		$member_mobile = I('get.member_mobile','');

		$token = A_token();

		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else
		{
			$openid=0;
		}
		

		//获取健康报告详情信息
		$url = C("PATH_URL")."/interface/yc_member/member_shouji_all_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		// var_dump($jk_info);
		$info = array();
		foreach ($jk_info[0] as $k1 => $v1) {
			if($k1=="MEMBER_ID" || $k1=="MEMBER_NAME" || $k1=="MEMBER_MOBILE"){
				continue;
			}
			if(!empty($v1)){
				foreach ($v1 as $key => $value) {

					foreach ($value as $k => $v) {
						if($k=="EXAMTIME" || $k=="CREATE_DATE"){
							continue;
						}
						$info["$k1"]["$k"] .= round($v,1).",";
					}
				}
				foreach ($info["$k1"] as $k2 => $v2) {
					$info["$k1"]["$k2"] = rtrim($v2,',');
				}
			}
		}
		// var_dump($info);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('info',$info);
		$this->assign('tj_type',$tj_type);
		$this->assign('member_id',$jk_info[0]['MEMBER_ID']);
		$this->display(); // 输出模板
	}

	//健康档案详情 ytj wb
	public function dangan_detail()
	{
		$tj_type = I('get.tj_type','');
		$is_all = I('get.is_all','');
		$member_mobile = I('get.member_mobile','');
		$rownum = I('get.rownum',0);
		$imei_type = I('get.imei_type','');

		$token = A_token();
		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else{
			$openid=0;
		}

		if($tj_type===''){
			redirect(U('dangan'));
		}

		//获取健康报告详情信息
		
		if($is_all!=''){
			
			$url = C("PATH_URL")."/interface/yc_member/member_dangan_list.aspx?access_token=".$token;
		}else{
			//判断是腕表还是一体机
			if($imei_type!=''){
				$url = C("PATH_URL")."/interface/yc_member/member_wb_list.aspx?access_token=".$token;
			}else{
				$url = C("PATH_URL")."/interface/yc_member/member_ytj_list.aspx?access_token=".$token;
			}
		}
		

		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile",
			"page_num"=>"1",
			"tj_type"=>"$tj_type",
			"imei_type"=>"$imei_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
	
// var_dump(post_json($url,$json),$url,$json);
		$jk_real = array();
		if(!empty($jk_info) && $rownum==1)
		{
			$jk_real[0] = $jk_info[0];
		}
		else
		{
			$jk_real = $jk_info;
		}
		//模板赋值
		$temp = "";
		switch ($tj_type)
		{
			case 0:
				$temp = "dangan_yitiji_xt";
				break;
			case 1:
				$temp = "dangan_yitiji_xyang";
				break;
			case 2:
				$temp = "dangan_yitiji_xya";
				break;
			case 3:
				$temp = "dangan_yitiji_xl";
				break;
			case 4:
				$temp = "dangan_yitiji_sg";
				break;
			case 5:
				$temp = "dangan_yitiji_niao";
				break;
			case 6:
				$temp = "dangan_yitiji_tw";
				break;	
			case 7:
				$temp = "dangan_yitiji_xt";
				break;
			case 8:
				$temp = "dangan_yitiji_xya";
				break;
			case 10:
				$temp = "jibu_tongji";
				break;
			default:
				$temp = "dangan_yitiji_xt";
				break;								
		}
		
		// var_dump($url,$json,$jk_real);
		$this->assign('jk_info',$jk_real);// 赋值数据集
		$this->assign('tj_type',$tj_type);
		$this->assign('imei_type',$imei_type);
		$this->assign('member_mobile',$member_mobile);
		$this->assign('rownum',$rownum);
		$this->display($temp); // 输出模板	
		
	}

	//一体机详情
	public function dangan_detail_append()
	{
		$tj_type = I('get.tj_type','');
		$page_num = I('get.page_num','');
		$member_mobile = I('get.member_mobile','');
		$is_all = I('get.is_all','');
		$imei_type = I('get.imei_type','');

		$token = A_token();
		if(!$member_mobile){

			//获取openid
			include MODULE_PATH.'/Common/open_id.php';

			//验证手机是否绑定
			include MODULE_PATH.'/Common/check_band.php';
		}else{
			$openid=0;
		}
		if($tj_type===''){
			redirect(U('dangan'));
		}

		//获取健康报告详情信息
		
		if($is_all!=''){
			
			$url = C("PATH_URL")."/interface/yc_member/member_dangan_list.aspx?access_token=".$token;
		}else{
			//判断是腕表还是一体机
			if($imei_type!=''){
				$url = C("PATH_URL")."/interface/yc_member/member_wb_list.aspx?access_token=".$token;
			}else{
				$url = C("PATH_URL")."/interface/yc_member/member_ytj_list.aspx?access_token=".$token;
			}
		}
		
		$data = array
	    (
			"openid"=>"$openid",
			"member_mobile"=>"$member_mobile",
			"page_num"=>"$page_num",
			"tj_type"=>"$tj_type",
			"imei_type"=>"$imei_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);

		// var_dump($jk_info);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('tj_type',$tj_type);
		include COMMON_PATH.'/Common/load_more.php';
		
	}


	//计步统计

	public function jibu_tongji()
	{
		$page_num = I('get.page_num','1');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$token = A_token();

		$url= C("PATH_URL")."/interface/yc_member/wb_stepcounter_list.aspx?access_token=".$token;

		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
	    $json=json_encode($data);
	    // var_dump($url,$json,post_json($url,$json));
		$jb_info = json_decode(post_json($url,$json),true);
		//print_R($jb_info);
		$this->assign("jb_info",$jb_info);
		$this->display(); // 输出模板	

	}

	//jibu加载更多
	public  function jibu_tongji_append(){

		$page_num = I('get.page_num','1');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$token = A_token();

		$url= C("PATH_URL")."/interface/yc_member/wb_stepcounter_list.aspx?access_token=".$token;

		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
	    $json=json_encode($data);
	    
		$jb_info = json_decode(post_json($url,$json),true);
		$this->assign('jb_info',$jb_info);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//睡眠监测

	public function shuimian_jc()
	{
		$page_num = I('get.page_num','1');
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$token = A_token();

		$url= C("PATH_URL")."/interface/yc_member/wb_sleep_list.aspx?access_token=".$token;

		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);
	    $json=json_encode($data);
	    
		$sm_info = json_decode(post_json($url,$json),true);
		//print_R($sm_info);
		$this->assign("sm_info",$sm_info);
		$this->display(); // 输出模板	

	}



	//健康报告
	public function jiankang()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->display(); // 输出模板
	}

	//健康报告详情
	public function jk_info()
	{
		$tj_type = I('get.tj_type','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取健康报告详情信息
		//$url = "192.168.100.228:8080/interface/yc_member/member_ytj_list.aspx?access_token=".$token;
		
		$url = C("PATH_URL")."/interface/yc_member/member_ytj_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"1",
			"tj_type"=>"$tj_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('tj_type',$tj_type);
		$this->display(); // 输出模板
	}

	//健康报告详情
	public function jk_info_append()
	{
		$tj_type = I('get.tj_type','');
		$page_num = I('get.page_num','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取健康报告详情信息
		//
		// $url = "192.168.100.228:8080/interface/yc_member/member_ytj_list.aspx?access_token=".$token;
		
		$url = C("PATH_URL")."/interface/yc_member/member_ytj_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"tj_type"=>"$tj_type"
		 );
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		$this->assign('tj_type',$tj_type);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


	//健康报告
	public function wanbiao()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		$this->display(); // 输出模板
	}

	//健康报告详情
	public function wb_info()
	{
		$tj_type = I('get.tj_type','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取健康报告详情信息
		// $url = "http://192.168.100.228:8080/interface/yc_member/member_wb_list.aspx?access_token=".$token;

		$url = C("PATH_URL")."/interface/yc_member/member_wb_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"1",
			"tj_type"=>"$tj_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		$this->assign('tj_type',$tj_type);
		$this->display(); // 输出模板
	}


	//健康报告详情
	public function wb_info_append()
	{
		$tj_type = I('get.tj_type','');
		$page_num = I('get.page_num','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取健康报告详情信息
		

		// $url = "http://192.168.100.228:8080/interface/yc_member/member_wb_list.aspx?access_token=".$token;
		$url = C("PATH_URL")."/interface/yc_member/member_wb_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"tj_type"=>"$tj_type"
		);
	    $json=json_encode($data);
		$jk_info = json_decode(post_json($url,$json),true);
		$this->assign('tj_type',$tj_type);
		$this->assign('jk_info',$jk_info);// 赋值数据集
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}


	//服务列表
	public function fuwu()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$card_number = $user_info['VIP_CARD_NUMBER'];
		$this->assign('member_vip',$card_number);

		$this->display(); // 输出模板
	}


	//服务列表
	public function fuwu_list()
	{
		$expert_id = I('get.expert_id','');
		$serve_name = I('get.serve_name','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取家庭医生满足查询条件的
		$url = C("PATH_URL")."/interface/yc_member/home_expert_list.aspx?access_token=".$token;

		$data = array
		(
			"openid" => "$openid",
		);
		$json=json_encode($data);
		//print(post_json($url,$json));die;
		$expert_list = json_decode(post_json($url,$json),true);
		
		foreach ($expert_list as $key => $value) 
		{
			if($value['EXPERT_TYPE'] == '0')
			{
				$big = $value;
			}
			if($value['EXPERT_TYPE'] == '1')
			{
				$small = $value;
			}
		}
		$expert_id =$big['EXPERT_ID'];
		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$card_number = $user_info['VIP_CARD_NUMBER'];

		$this->assign('user_info',$user_info);
		//获取服务列表信息
		$url = C("PATH_URL")."/interface/yc_member/vip_serve_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"card_number"=>"$card_number"
		);
	    $json=json_encode($data);
		$fuwu_list = json_decode(post_json($url,$json),true);
		if(!$fuwu_list['error_code'])
		{
			$this->assign('fuwu_list',$fuwu_list);
		}
		$this->assign('card_number',$card_number);
		//$this->assign('fuwu_list',$fuwu_list);// 赋值数据集
		$this->assign('expert_id',$expert_id);
		$this->assign('serve_name',$serve_name);
		$this->display(); // 输出模板
	}


	//服务预约列表
	public function yuyue_list()
	{
		$card_number = I('get.card_number','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$card_number = $user_info['VIP_CARD_NUMBER'];

		$this->assign('user_info',$user_info);
		//获取服务列表信息
		$url = C("PATH_URL")."/interface/yc_member/vip_serve_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"card_number"=>"$card_number"
		);
	    $json=json_encode($data);
		$fuwu_list = json_decode(post_json($url,$json),true);

		if(!$fuwu_list['error_code'])
		{
			$this->assign('fuwu_list',$fuwu_list);
		}
		$this->assign('card_number',$card_number);
		//$this->assign('fuwu_list',$fuwu_list);// 赋值数据集
		$this->display(); // 输出模板
	}


	//提交后的页面
	public function submit()
	{
		$serve_name = I('get.serve_name','');
		$yuyue_date = I('get.yuyue_date','');

		$str =date("Y")."年".$yuyue_date;
		preg_match_all('/\d/',$str,$arr);
		$timer=implode('',$arr[0]);
		$timer=strtotime($timer);
		$yuyue_date = date("Y-m-d",$timer);
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->assign('serve_name',$serve_name);
		$this->assign('yuyue_date',$yuyue_date);
		$this->display(); // 输出模板
	}

	//提交成功页面
	public function success()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->display(); // 输出模板
	}

	//提交失败页面
	public function error()
	{
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->display(); // 输出模板
	}

	//取消后的页面
	public function quxiao()
	{
		$serve_name = I('get.serve_name','');
		$yuyue_date = I('get.serve_date','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$this->assign('serve_name',$serve_name);
		$this->assign('yuyue_date',$yuyue_date);
		$this->display(); // 输出模板
	}


	//服务详情
	public function fuwu_info()
	{	
		$serve_id = I('get.serve_id','');
		$expert_id = I('get.expert_id','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$card_number = $user_info['VIP_CARD_NUMBER'];


		//获取服务详细信息
		$url = C("PATH_URL")."/interface/yc_member/vip_serve_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"serve_id"=>"$serve_id"
		);
		$json=json_encode($data);
		$sever_info = json_decode(post_json($url,$json),true);
		$this->assign('sever_info',$sever_info);
		$this->assign('expert_id',$expert_id);
		$this->display(); // 输出模板
	}

	//服务预约
	public function fuwu_yuyue()
	{
		$serve_name = I('get.serve_name','');
		$expert_id = I('get.expert_id','');
		$serve_id = I('get.serve_id','');

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
			
		for($i=6; $i < 11; $i ++)
		{
			$str[$i] = date("m月d日",strtotime("+$i day"));
		}	
		$this->assign('date_list',$str);

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$this->assign('user_info',$user_info);
		$this->assign('serve_id',$serve_id);
		$this->assign('expert_id',$expert_id);
		$this->assign('serve_name',$serve_name);
		$this->display(); // 输出模板
	}


	//服务预约
	public function fuwu_yuyue_add()
	{
		$card_number = I('post.card_number','');
		$serve_id = I('post.serve_id','');
		$order_date = I('post.yuyue_date','');
		$expert_id = I('post.expert_id','');

		$str =date("Y")."年".$order_date;
		preg_match_all('/\d/',$str,$arr);
		$timer=implode('',$arr[0]);
		$timer=strtotime($timer);
		$order_date = date("Y-m-d",$timer);

		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);

		$card_number = $user_info['VIP_CARD_NUMBER'];

		//获取服务详细信息
		$url = C("PATH_URL")."/interface/yc_member/vip_serve_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"serve_id"=>"$serve_id"
		);
		$json=json_encode($data);
		$sever_info = json_decode(post_json($url,$json),true);
		$period_num = (int)$sever_info['PERIOD_NUM'];
		if($period_num > 0)
		{
			//服务预约添加
			$url = C("PATH_URL")."/interface/yc_member/vip_serve_add.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"serve_id"=>"$serve_id",
				"expert_id"=>"$expert_id",
				"order_date"=>"$order_date",
				"card_number"=>"$card_number"
			);
			$json=json_encode($data);
			$serve_add = json_decode(post_json($url,$json),true);
			$this->ajaxReturn($serve_add['error_code']);
		}
		else
		{
			$serve_add['error_code'] = 'no';
			$this->ajaxReturn($serve_add['error_code']);
		}

		
	}

	//服务记录
	public function fuwu_jilu()
	{
		$card_number = I('get.card_number','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取服务记录信息
		$url = C("PATH_URL")."/interface/yc_member/jz_info_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"page_num"=>"1"
		);
	    $json=json_encode($data);
		$fuwu_jilu = json_decode(post_json($url,$json),true);
		$this->assign('card_number',$card_number);
		$this->assign('fuwu_jilu',$fuwu_jilu);// 赋值数据集
		$this->display(); // 输出模板
	}

	//服务记录加载
	public function fuwu_jilu_append()
	{
		$page_num = I('get.page_num','');
		$card_number = I('get.card_number','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取服务记录信息
		$url = C("PATH_URL")."/interface/yc_member/jz_info_list.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"page_num"=>"$page_num"
		);
	    $json=json_encode($data);
		$fuwu_jilu = json_decode(post_json($url,$json),true);
		$this->assign('card_number',$card_number);
		$this->assign('fuwu_jilu',$fuwu_jilu);// 赋值数据集

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//服务取消
	public function fuwu_quxiao()
	{
		$jj_desc = I('post.jj_desc','');
		$jz_id = I('post.jz_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取服务记录信息
		$url = C("PATH_URL")."/interface/yc_member/vip_serve_order_delete.aspx?access_token=".$token;
		$data = array
	    (
			"openid"=>"$openid",
			"jz_id"=>"$jz_id",
			"jj_desc"=>"$jj_desc"
		);
	    $json=json_encode($data);
		$quxiao = json_decode(post_json($url,$json),true);
		$this->ajaxReturn($quxiao['error_code']);

	}

	//服务详情
	public function fuwu_detail()
	{
		$jz_id = I('get.jz_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);
		$card_number = $user_info['VIP_CARD_NUMBER'];

		//获取服务详细信息
		$url = C("PATH_URL")."/interface/yc_member/jz_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"jz_id"=>"$jz_id"
		);
		$json=json_encode($data);
		$jz_info = json_decode(post_json($url,$json),true);
		$this->assign('jz_info',$jz_info);
		$this->display();

	}

	//预约成功
	public function fw_success()
	{
		$jz_id = I('get.jz_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);
		$card_number = $user_info['VIP_CARD_NUMBER'];

		//获取服务详细信息
		$url = C("PATH_URL")."/interface/yc_member/jz_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"jz_id"=>"$jz_id"
		);
		$json=json_encode($data);
		$jz_info = json_decode(post_json($url,$json),true);
		$this->assign('jz_info',$jz_info);
		$this->display();

	}

	//预约失败
	public function fw_fail()
	{
		$jz_id = I('get.jz_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);
		$card_number = $user_info['VIP_CARD_NUMBER'];

		//获取服务详细信息
		$url = C("PATH_URL")."/interface/yc_member/jz_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"jz_id"=>"$jz_id"
		);
		$json=json_encode($data);
		$jz_info = json_decode(post_json($url,$json),true);
		$this->assign('jz_info',$jz_info);
		$this->display();

	}

	//处理中
	public function fw_do()
	{
		$jz_id = I('get.jz_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);
		$card_number = $user_info['VIP_CARD_NUMBER'];

		//获取服务详细信息
		$url = C("PATH_URL")."/interface/yc_member/jz_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"jz_id"=>"$jz_id"
		);
		$json=json_encode($data);
		$jz_info = json_decode(post_json($url,$json),true);
		$this->assign('jz_info',$jz_info);
		$this->display();

	}
	//待处理
	public function fw_wait()
	{
		$jz_id = I('get.jz_id','');
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取患者详细信息
		$url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$this->assign('user_info',$user_info);
		$card_number = $user_info['VIP_CARD_NUMBER'];

		//获取服务详细信息
		$url = C("PATH_URL")."/interface/yc_member/jz_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"card_number"=>"$card_number",
			"jz_id"=>"$jz_id"
		);
		$json=json_encode($data);
		$jz_info = json_decode(post_json($url,$json),true);
		$this->assign('jz_info',$jz_info);
		$this->display();

	}

	//个人的卡详情
	public function myAccount()
	{
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

        //获取当前用户信息
        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
		$this->assign('card_info',$user_info);// 赋值数据集

        $mobile = $user_info['MEMBER_MOBILE'];

		//获取卡余额
		$url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
		$data = array
	    (
			"mobile"=>"$mobile"
		 );
	    $json=json_encode($data);
		$card_yue = json_decode(post_json($url,$json),true);
		$this->assign('card_yue',$card_yue);// 赋值数据集		
		$this->display();
	}

	//卡余额
    public function myAccount_detail()
    {
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

         //获取当前用户 卡号 手机号 
        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        // var_dump($url,$json);

         //当前用户手机号

        $mobile = $user_info['MEMBER_MOBILE'];
        
        //获取卡余额
		$url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
		$data = array
	    (
			"mobile"=>"$mobile"
		 );
	    $json=json_encode($data);
		$card_yue = json_decode(post_json($url,$json),true);
// print_R($user_info);
		$this->assign('card_yue',$card_yue);// 赋值数据集
		$this->assign('user_info',$user_info);// 赋值数据集

        
        $this->display();
    }

    //卡充值页面
    public function myAccount_cz()
    {
        $token = A_token();

        $money = I("get.money","0.01");
        $order_id = I("get.order_id","");
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        $this->assign('money',$money);
        $this->assign('order_id',$order_id);
        $this->display();
    }

    //卡充值
    public function myAccount_cz_ok()
    {
    	$number = I('get.number','');
        $order_id = I("get.orderid");

        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        
        
        //获取当前用户 卡号 手机号 
        $url = C("PATH_URL")."/interface/yc_member/member_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid"
        );
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);

        $paydata = array
        (
            "out_trade_no"=>time(),
            "subject"=>"充值", 
            "total"=>$number,
            "order_id"=>$order_id,
            "card_number"=>$user_info['CARD_NUMBER'],
            "mobile"=>$user_info['MEMBER_MOBILE']

        );
        $json= json_encode($paydata);
        // echo $json;die;
        $json= urlencode(passport_encrypt($json, "123"));
        header("Location:/weixin/Application/Member/WxpayAPI/card_pay.php?json=$json");
       // 
    }

   

    //账单
    public function myAccount_list()
    {
        $token = A_token();
        $type = I('get.type', '1');
        
        if($type == "2")
        {
            $startdate = date("Ymd",strtotime("-30 day"));
            $enddate = date("Ymd",strtotime("-1 day"));
        }
        else
        {
            $startdate = date("Ymd");
            $enddate = date("Ymd");
        }
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

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

        //获取卡信息
        $url ="http://weixin.yk2020.com/include/xfb_tranquery.aspx";
        $data = array
        (
            "mobile"=>"$mobile",
            "startdate"=>"$startdate",
            "enddate"=>"$enddate",
            "page_num"=>"1",
            "tranquerytype"=>"0"
         );
        $json=json_encode($data);
        $info = json_decode(post_json($url,$json),true);
        //print_R($info);die;
        if(!$info['error_code'])
        {
            $this->assign('card_info',$info);
        }
        // 赋值数据集
        $this->assign('type',$type);
        $this->display();
    }

     //账单
    public function myAccount_list_append()
    {
        $token = A_token();
        $page_num = I('get.page_num', '2');
        $type = I('get.type', '');
        
        if($type == "2")
        {
            $startdate = date("Ymd",strtotime("-30 day"));
            $enddate = date("Ymd",strtotime("-1 day"));
        }
        else
        {
            $startdate = date("Ymd");
            $enddate = date("Ymd");
        }

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

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

        //获取卡账单信息
        $url ="http://weixin.yk2020.com/include/xfb_tranquery.aspx";
        $data = array
        (
            "mobile"=>"$mobile",
            "startdate"=>$startdate,
            "enddate"=>$enddate,
            "page_num"=>"$page_num",
            "tranquerytype"=>"0"//参数值0查询所有的交易流水  1查询充值流水记录  2查询消费流水记录
         );
        $json=json_encode($data);
        $info = json_decode(post_json($url,$json),true);
        //print_R($info);die;
        if(!$info['error_code'])
        {
            $this->assign('card_info',$info);// 赋值数据集
        }
        

        //输出更多列表
        include COMMON_PATH.'/Common/load_more.php';
    }

    //卡充值
    public function card_cz()
    {
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';
        
        $number = I('get.total','0.01');
        $out_trade_no = I('get.out_trade_no','');
        $order_id = I('get.order_id','');
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
        $myAccount = json_decode(post_json($url,$json),true);

        if($myAccount['error_code']=='ok')
        {
            if($order_id)
            {
                 $this->redirect('?m=Member&c=User&a=order_card_pay&order_id='.$order_id);
            }
            else
            {
                $this->redirect('?m=Member&c=User&a=myAccount_detail');
            }
           
        }
        
    }

    public function order_card_pay()
    {
        //根据订单编号查询订单信息
        $token = A_token();
        
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';
        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

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
        $card_number = $user_info['CARD_NUMBER'];

        if($card_number)
        {
            //获取卡余额
            $url = "http://weixin.yk2020.com/include/xfb_balancequery.aspx";
            $data = array
            (
                "mobile"=>"$mobile"
             );
            $json=json_encode($data);
            $card_yue = json_decode(post_json($url,$json),true);

        }

        //获取订单的详情页
        $order_id = I('get.order_id', '40158');
        $sj_type = I('get.sj_type', '1');
        $url = C("PATH_URL")."/interface/yc_member/order_info.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "order_id"=>"$order_id",
            "sj_type"=>"$sj_type"
        );
        $json=json_encode($data);
        $array =json_decode(post_json($url,$json),true);
        $order_id = $array[0]['ORDER_ID'];
        $price = $array[0]['ORDER_MONEY'];
        $data = array
        (
            "out_trade_no"=>$order_id,
            "subject"=>$array[0]['ORDER_NAME'],
            "total"=>$price,
            "card_number"=>$card_number,
            "card_money"=>$card_yue['cur_money']

        );
        $json= json_encode($data);
       // print_R($data);die;
        $json= urlencode(passport_encrypt($json, "123"));
        header("Location:/weixin/Application/Member/WxpayAPI/jsapi.php?json=$json");
    }


    //邀请我的专家
    public function myExpert()
    {
        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        //获取邀请我的专家列表 
        $url = C("PATH_URL")."/interface/yc_member/expert_yq_list.aspx?access_token=".$token;
        // echo $url;die;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"1"
        );
        $json=json_encode($data);
        $expert_list = json_decode(post_json($url,$json),true);
         // var_dump($url,$json,$expert_list);
		$this->assign('expert_list',$expert_list);// 赋值数据集
        $this->display();
    }

    //接受邀请 
	public function myExpert_ok()
	{
		
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$expert_id = I('post.expert_id','');

		$url = C("PATH_URL")."/interface/yc_member/expert_yq_ok.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>"$expert_id"
		);
		$json=json_encode($data);
		$myExpert_add =json_decode(post_json($url,$json),true);
		$this->ajaxReturn($myExpert_add['error_code']);
	}

    //邀请我的专家
    public function myExpert_append()
    {
    	$page_num = I('get.page_num', '2');

        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        //验证手机是否绑定
        include MODULE_PATH.'/Common/check_band.php';

        //获取邀请我的专家列表 
        $url = C("PATH_URL")."/interface/yc_member/expert_yq_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            "page_num"=>"$page_num"
        );
        $json=json_encode($data);
        $expert_list = json_decode(post_json($url,$json),true);
        // var_dump($expert_list);
		$this->assign('expert_list',$expert_list);// 赋值数据集

        //输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
    }

    //分享爱心卡

    public function expand()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

         //验证手机是否绑定
        // include MODULE_PATH.'/Common/check_band.php';
        

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}

        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name'])
        {
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}

        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);

        /*

		分享日志参数

		*/

		$path = I("get.path","栏目菜单我是代言人");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */
        

        $this->display(); 
    }

    //爱脑卡列表
	public function expand_anklist()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}


		//没有获取openid 走app  //获取会员的头像及昵称
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$url = C("PATH_URL")."/interface/app_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "member_id"=>"$member_id",
	            "bx_status"=>1,
	            "sx_id"=>C('SX_ID1')
	        );
		}
		else
		{
	        $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "bx_status"=>1,
	            "sx_id"=>C('SX_ID1')
	        );
    	}
		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		if(isset($bx_list1['error_code'])){
			$bx_list1 =array();
		}

        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);
        $this->assign("bx_list1",$bx_list1);

        /*

		分享日志参数

		*/

		$path = I("get.path");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

        $this->display(); 
    }
    
    public function expand_list()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}


		//没有获取openid 走app  //获取会员的头像及昵称
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$url = C("PATH_URL")."/interface/app_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "member_id"=>"$member_id",
	            "bx_status"=>1,
	            "sx_id"=>C('SX_ID')
	        );
		}
		else
		{
	        $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "bx_status"=>1,
	            "sx_id"=>C('SX_ID')
	        );
    	}
		//获取就诊人列表 bx_status==1 已生效 观察期
		// $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
  //       $data = array
  //       (
  //           "openid"=>"$openid",
  //           "bx_status"=>1
  //       );
		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		if(isset($bx_list1['error_code'])){
			$bx_list1 =array();
		}


        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);
        $this->assign("bx_list1",$bx_list1);

        /*

		分享日志参数

		*/

		$path = I("get.path");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

        $this->display(); 
    }

     public function expand_list_1880()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}


		//没有获取openid 走app  //获取会员的头像及昵称
		if($openid == "" || $openid == "0" || $openid == "1")
		{
			$url = C("PATH_URL")."/interface/app_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "member_id"=>"$member_id",
	            "bx_status"=>1
	        );
		}
		else
		{
	        $url = C("PATH_URL")."/interface/yc_member/person_bx_list.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	            "bx_status"=>1
	        );
    	}
		$json=json_encode($data);
		$bx_list1 = json_decode(post_json($url,$json),true);
		if(isset($bx_list1['error_code'])){
			$bx_list1 =array();
		}


        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);
        $this->assign("bx_list1",$bx_list1);

        /*

		分享日志参数

		*/

		$path = I("get.path");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

        $this->display(); 
    }

     public function expand_list_main()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}



        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);

        /*

		分享日志参数

		*/

		$path = I("get.path");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

        $this->display(); 
    }

    public function expand_list_baibei()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}


		


        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);

        /*

		分享日志参数

		*/

		$path = I("get.path");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

        $this->display(); 
    }

    public function expand_list_1280()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}


		


        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);

        /*

		分享日志参数

		*/

		$path = I("get.path");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

        $this->display(); 
    }

    public function expand_list_498()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}



        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);

        /*

		分享日志参数

		*/

		$path = I("get.path");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

        $this->display(); 
    }

    public function expand_list_880()
    {
        $token = A_token();
        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{

			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_info.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id"
			);
		}
		else
		{
			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

	        //获取会员的头像及昵称
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_info.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid"
	        );
    	}
        //dump($data);
        $json=json_encode($data);
        $user_info = json_decode(post_json($url,$json),true);
        if($user_info['user_name']){
			$user_info['real_name'] = $user_info['user_name'];
			$user_info['user_name'] = base64_encode($user_info['user_name']);
		}



        $appId=C('M_APPID');
		$secret=C('M_SECRET');

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url1 = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //获取ticket
		$url = C("PATH_URL")."/interface/yc_member/wx_jsapi_ticket.aspx?access_token=".$token;
		$data = array
		(
			"token_id"=>C('M_TOKEN_ID'),
		);
		$json=json_encode($data);
		$ticket = post_json($url,$json);

        
        $NonceStr = createNonceStr();
        $timestamp = time();
        $string = "jsapi_ticket=$ticket&noncestr=$NonceStr&timestamp=$timestamp&url=$url1";
        $signature = sha1($string);


        $this->assign("signature",$signature);
        $this->assign("NonceStr",$NonceStr);
        $this->assign("timestamp",$timestamp);
        $this->assign("user_info",$user_info);
        $this->assign("appId",$appId);

        /*

		分享日志参数

		*/

		$path = I("get.path");
		$homeid = I("get.homeid",$openid);
		$type = I("get.type","Member");
		$this->assign("path",$path);
		$this->assign("type",$type);
		$this->assign("homeid",$homeid);
		/* end */

        $this->display(); 
    }

    public function expand_result()
    {

        $token = A_token();

        //获取openid
        include MODULE_PATH.'/Common/open_id.php';

        $member_id = I('get.member_id','');

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{
			
			//获取首页三项
			$url = C("PATH_URL")."/interface/app_member/get_sale_money.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id",
				"yw_id"=>C('YW_ID')
			);
		}
		else
		{

			//验证手机是否绑定
        	include MODULE_PATH.'/Common/check_band.php';

			 //获取邀请我的专家列表 
	        $url = C("PATH_URL")."/interface/yc_member/get_sale_money.aspx?access_token=".$token;
	        $data = array
	        (
	            "openid"=>"$openid",
	        );
		}
       
        $json=json_encode($data);
        $info = json_decode(post_json($url,$json),true);
        $this->assign("info",$info);

        //没有获取openid 走app
		if(($openid == "" || $openid == "0" || $openid == "1") && !empty($member_id))
		{
			//获取积分详细信息
			$url = C("PATH_URL")."/interface/app_member/hz_order_list.aspx?access_token=".$token;
			$data = array
			(
				"member_id"=>"$member_id",
				"page_num"=>"1",
				"yw_id"=>C('YW_ID')
			);
		}else{
			//获取积分详细信息
			$url = C("PATH_URL")."/interface/yc_member/hz_order_list.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"page_num"=>"1"
			);
		}
        

		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);
		// var_dump($url,$json,$data);
		if($data['error_code']=="")
		{
			$this->assign('hz_order_list',$data);
		}

        $this->display(); 
    }

	//百倍爱心卡消费明细加载更多
	public function hz_order_list_append()
	{
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$page_num = I("get.page_num","2");

		//获取平台的access_token
		$token = A_token();

		//获取积分详细信息
		$url = C("PATH_URL")."/interface/yc_member/hz_order_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num"
		);

		$json=json_encode($data);
		$data = json_decode(post_json($url,$json),true);

		if($data['error_code']=="")
		{
			$this->assign('hz_order_list',$data);
		}
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//
	public function youku1()
	{
		$this->display();
	}

	//
	public function youku2()
	{
		$this->display();
	}

	//
	public function youku3()
	{
		$this->display();
	}

	//
	public function youku4()
	{
		$this->display();
	}

	//
	public function youku5()
	{
		$this->display();
	}

	//
	public function playVideo()
	{
		$this->display();
	}

}