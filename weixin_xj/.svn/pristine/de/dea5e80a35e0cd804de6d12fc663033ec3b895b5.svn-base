<?php
namespace Home\Controller;
use Think\Controller;
class DocController extends Controller
{
	//经营主任排行榜列表 
	public function phb_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$token_id = I("get.token_id",C('H_TOKEN_ID'));
		$m_token_id = I("get.m_token_id",C('M_TOKEN_ID'));
		$d_token_id = I("get.d_token_id",C('D_TOKEN_ID'));
		$jifen_date =I('get.jifen_date');
		if(!$jifen_date)
		{
			$jifen_date = date("Y-m");
		}
		else
		{
			$jifen_date=1;
		}
		
		//经营主任排行榜列表
		$url = C("PATH_URL")."/interface/yc_hos/jyzr_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"jifen_date"=>"$jifen_date",
			"m_token_id"=>"$m_token_id",
			"d_token_id"=>"$d_token_id"
		);

		$json=json_encode($data);
		$phb_list =json_decode(post_json($url,$json),true);
		$url = C("PATH_URL")."/interface/yc_hos/yjzr_jf_total.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"token_id"=>"$d_token_id",
			"jifen_date"=>"$jifen_date"
		);
		$json=json_encode($data);
		$mylist =json_decode(post_json($url,$json),true);
		$mylist['JIFEN_RANK'] = $mylist['JIFEN_RANK'] ? $mylist['JIFEN_RANK'] : 0 ;
		$mylist['JIFEN_NUM'] = $mylist['JIFEN_NUM'] ? $mylist['JIFEN_NUM'].'分' : '暂未参加' ;
		if($mylist)
		{
			$this->assign('user',$mylist);// 自己信息
		}
		else
		{
			$mylist['error_code']="00010";
			$this->assign('user',$mylist);
		}

		if($jifen_date==1)
		{

			$jifen_date ="半年度";
		}
		else
		{
			$jifen_date = date("n");
		}
		$cur_date = date("Y-m");
		$this->assign('cur_date',$cur_date);
		$this->assign('jifendate',$jifen_date);
		$this->assign('doc_list',$phb_list);// 医生列表
		$this->display(); // 输出模板
	}
	
	//经营主任排行榜列表-加载更多
	public function phb_list_append()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		$page_num = I('get.page_num','2');
		$jifen_date =I('get.jifen_date',date("Y-m"));
		if($jifen_date!=1)
		{
			if(strlen($jifen_date)==1 )
			{
				$jifen_date =date("Y-$jifen_date");
			}
		}

		$token_id = I("get.token_id",C('H_TOKEN_ID'));
		$m_token_id = I("get.m_token_id",C('M_TOKEN_ID'));
		$d_token_id = I("get.d_token_id",C('D_TOKEN_ID'));

		//经营主任排行榜列表
		$url = C("PATH_URL")."/interface/yc_hos/jyzr_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"jifen_date"=>"$jifen_date",
			"m_token_id"=>"$m_token_id",
			"d_token_id"=>"$d_token_id"
		);
		$json=json_encode($data);
		$phb_list =json_decode(post_json($url,$json),true);
		$this->assign('doc_list',$phb_list);// 医生列表

		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//根据月份
	public function phb_list_month()
	{
		$page_num = I('post.page_num','2');
		$jifen_date =I('post.jifen_date');
		$date_arr = array("1","2","3","4","5","6","7","8","9");
		
		if ($jifen_date == "zongpai") 
		{
			$pic_number = "half";
			$href = "zthalf";
		}
		else
		{
			$pic_number = "12";
			$href = "zt20170104";
		}

		if(!$jifen_date)
		{
			$jifen_date =I('get.jifen_date');
		}
		else if($jifen_date == "zongpai")
		{
			$jifen_date = "";
		}
		else if(in_array($jifen_date, $date_arr))
		{
			$jifen_date = date("Y-$jifen_date");
			// $jifen_date =I('post.jifen_date');

		}
		else{

			$jifen_date = I('post.jifen_date');
			$y = date("Y")-1;
			$jifen_date = date("$y-$jifen_date");
		}

		//获取平台的access_token
		$token = A_token();
		$token_id = I("post.token_id",C('H_TOKEN_ID'));
		$m_token_id = I("post.m_token_id",C('M_TOKEN_ID'));
		$d_token_id = I("post.d_token_id",C('D_TOKEN_ID'));

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_hos/jyzr_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"jifen_date"=>"$jifen_date",
			"m_token_id"=>"$m_token_id",
			"d_token_id"=>"$d_token_id"
		);
		$json=json_encode($data);
		$phb_list =json_decode(post_json($url,$json),true);
		// var_dump($url,$json,post_json($url,$json));exit;

		$url = C("PATH_URL")."/interface/yc_hos/yjzr_jf_total.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"token_id"=>"$d_token_id",
			"jifen_date"=>"$jifen_date"
		);
		$json=json_encode($data);
		$mylist =json_decode(post_json($url,$json),true);
		$mylist['JIFEN_RANK'] = $mylist['JIFEN_RANK'] ? $mylist['JIFEN_RANK'] : '0' ;
		$mylist['JIFEN_NUM'] = $mylist['JIFEN_NUM'] ? $mylist['JIFEN_NUM'].'分' : '暂未参加' ;

		$str = '<div class="PaiHang"><div class="headPaiHang clearfix"><div class="champion">';

		if($mylist['HEADIMGURL'])
		{
			$str .='<a href="/weixin/index.php?m=Home&c=User&a=jifen_list"><img src="'.$mylist['HEADIMGURL'].'" alt=""></a>';
		}
		else
		{
			$str .='<a href="/weixin/index.php?m=Home&c=User&a=jifen_list><img src="/weixin/Application/Home/View/images/dtdoctor.png" alt=""></a>';
		}
		if($mylist)
		{
			$str .='</div><div class="name_bot"><a href="/weixin/index.php?m=Home&c=User&a=jifen_list"><div class="userinfo clearfix"><p class="xingming">'.$mylist['REAL_NAME'].'</p><p class="bumen">'.$mylist['CENTER_NAME'].'</p></div><div class="jifen clearfix"><p>'.$mylist['JIFEN_NUM'].'</p><p>第'.$mylist['JIFEN_RANK'].'名</p></div></a>';
		}
		else
		{
			$str .='</div><div class="name_bot"><p class="xingming">暂未上榜！!</p>';
		}

		$str.='</div><a href="/weixin/Application/Home/View/zhuangti/'.$href.'.html" class="zhixing"><img src="/weixin/Public/Home/images/icon/'.$pic_number.'.png" alt=""></a></div></div><div class="hot" id="doc-list"><ul class="doc-list" >';

		foreach ($phb_list as $key => $value){
			$str .= '<li><div class="ww pos_a">';
			if($key<3)
			{
				$str .= '<img src="/weixin/Public/Home/images/icon/jiangbei.png" alt="">';
			}
			else
			{
				$str .= $value['JIFEN_RANK'];
			}

			$str .= '</div><div class="touxiang pos_a"><a href="#">';

			if($value['HEADIMGURL'])
			{
				$str .= '<img src="'.$value['HEADIMGURL'].'" />';
			}
			else
			{
				$str .= '<img src="/weixin/Application/Home/View/images/dtdoctor.png" />';
			}

			$str .= '</a></div><div class="huoyuedu"><div class="title"><div class="fl title-des"><span>'.$value['REAL_NAME'].'</span><span class="huadong_hos">'.$value['CENTER_NAME'].'</span></div><span class="fr">'.$value['JIFEN_NUM'].'</span><div class="clear"></div></div></div><div class="clear"></div></li><input type="hidden" id="date" value="'.$jifen_date.'">';
		}
		$str .= '</ul></div>';
		echo $str;
	}

	//医生排行榜列表
	public function doc_list()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取疾病列表
        $url = C("PATH_URL")."/interface/yc_member/ill_list.aspx?access_token=".$token;
        $data = array
        (
            "openid"=>"$openid",
            
        );
        $json=json_encode($data);
        $ill_list =json_decode(post_json($url,$json),true);
        $this->assign('ill_list',$ill_list);// 赋值数据集
		
		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			'ill_id'=>'',
			"page_num"=>"1",
			"sortflag" =>"new",
			"leader_flag"=>"",
			"tj_flag"=>"",
			"page_rows"=>"10"
		);
		$json=json_encode($data);
		$doc_list =json_decode(post_json($url,$json),true);

		$this->assign('doc_list',$doc_list);// 医生列表
		$this->display(); // 输出模板
	}
	
	//医生排行榜列表-加载更多
	public function doc_list_append()
	{
		$page_num = I('get.page_num', '2');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_doc/expert_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			'ill_id'=>'',
			"page_num"=>"$page_num",
			"sortflag" =>"new",
			"leader_flag"=>"",
			"tj_flag"=>"",
			"page_rows"=>"10"
		);

		$json=json_encode($data);
		$doc_list = json_decode(post_json($url,$json),true);
		$this->assign('doc_list',$doc_list);
		$num = ($page_num-1)*10;
		$this->assign('num',$num);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//获取gps
	public function get_gps()
	{
		$url_str = "m=Expert&c=Doc&a=phb_list";
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

	public function doc_info()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';

		//获取订单列表满足查询条件的
		$url = C("PATH_URL")."/interface/yc_hos/get_tj_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid"
		);
		$json=json_encode($data);

		$user_info = json_decode(post_json($url,$json),true);
		$this->assign("name",$user_info['real_name']);
		$this->assign("phone",$user_info['link_mobile']);
		$this->display();
	}

	public function docinfo_add()
	{
		header("Content-type:text/html;charset=utf-8");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$tj_name = I('post.tj_name','');
		$tj_mobile = I('post.tj_mobile','');
		$expert_name = I('post.expert_name','');
		$birth_date = I('post.birth_date','');
		$hos_name= I('post.hos_name','');
		$dep_name= I('post.hos_keshi','');
		$expert_role= I('post.expert_role','');
		$expert_skill= I('post.expert_skill','');
		$link_mobile = I('post.link_mobile','');

		$doc_img = I('post.doc_img','');
		$ys_img = I('post.ys_img','');
		
		$doc_img= $this->getimgbase64($doc_img); //医生照片
		$CERTIFICATEID_PIC= $this->getimgbase64($ys_img);//医师执业资格证图片
		$WORK_PIC= $this->getimgbase64(I('post.gz_img',''));//工作证图片
		$DOC_SIGNATURE = $this->getimgbase64(I('post.qm_img',''));//签名
		$CERTIFICATEID=I('post.expert_code','');//医师资格证书号

		
		$tj_name = replace_specialChar($tj_name);
		$expert_name = replace_specialChar($expert_name);
		$url = C("PATH_URL")."/interface/yc_hos/doc_info_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"tj_name"=>$tj_name,
			"tj_mobile"=>$tj_mobile,
			"expert_name"=>$expert_name,
			"birth_date"=>$birth_date,
			"hos_name"=>$hos_name,
			"dep_name" =>$dep_name,
			"expert_role"=>$expert_role,
			"expert_skill"=>$expert_skill,
			"link_mobile"=>$link_mobile,
			"link_cz"=>$link_cz,
			"link_email"=>$link_email,
			"link_address"=>$link_address,
			"sq_name"=>$sq_name,
			"sq_date"=>date("Y-m-d",time()),
			"small_pic"=>$doc_img,
			"certificateid_pic"=>$CERTIFICATEID_PIC,
			"work_pic"=>$WORK_PIC,
			"doc_signature"=>$DOC_SIGNATURE,
			"expert_certificateid"=>$CERTIFICATEID
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		if($user_info['error_code']=="ok")
		{
			echo "<script> alert('提交成功！'); location.href='/weixin/index.php?m=Home&c=User&a=mydoc_list'</script>";

		}
		else if($user_info['error_code']=="00019")
		{
			echo "<script> alert('医生手机号已存在！');location.href='/weixin/index.php?m=Home&c=Doc&a=doc_info' </script>";
		}
		else if($user_info['error_code']=="00010")
		{
			echo "<script> alert('请先绑定手机号'); location.href='/weixin/index.php?m=Home&c=User&a=band_phone'</script>";
		}
		else
		{
			echo "<script> alert('数据错误'); location.href='/weixin/index.php?m=Home&c=Doc&a=doc_info'</script>";
		}

	}

	public function getimgbase64($imgbase64)
	{
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
				
			$new_file = "./Public/Uploads/zixun/".date("Y-m-d")."/".time().rand(99,9999).".{$type}";//保存名称、文件名
				
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

		return $pic_path;
	}
}