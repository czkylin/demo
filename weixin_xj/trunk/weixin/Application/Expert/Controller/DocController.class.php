<?php
namespace Expert\Controller;
use Think\Controller;
class DocController extends Controller
{
	//医生排行榜列表
	public function phb_list()
	{
		$jifen_date = date("Y-m");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';
		
		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_pm_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"page_rows"=>"10",
			"jifen_date"=>"$jifen_date"
		);
		$json=json_encode($data);
		$phb_list =json_decode(post_json($url,$json),true);
		
		//获取自己排名
		$url = C("PATH_URL")."/interface/yc_doc/expert_pm.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"jifen_date"=>"$jifen_date"
		);
		$json=json_encode($data);
		$mylist =json_decode(post_json($url,$json),true);
		// var_dump($mylist);
		if(empty($mylist))
		{
			$this->assign("empty","未上榜");
		}

		//如果用户名是手机号，只截取前六位
		foreach ($phb_list as $k => $v) 
		{	
		    if(preg_match("/^1[0123456789]\d{9}$/", $v['EXPERT_NAME']))
		    {
				$phb_list[$k]['EXPERT_NAME'] = substr($v['EXPERT_NAME'], 0, 6);			 	
		    }
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
		$this->assign('mylist',$mylist);// 医生列表
		$this->assign('doc_list',$phb_list);// 医生列表
		$this->display(); // 输出模板
	}
	
	//医生排行榜列表-加载更多
	public function phb_list_append()
	{
		$page_num = I('get.page_num','2');

		$jifen_date =I('get.jifen_date',date("Y-m"));
		if($jifen_date!=1)
		{
			if(strlen($jifen_date)==1 )
			{
				$jifen_date =date("Y-$jifen_date");
			}
		}
		$jifen_date =I('get.jifen_date');

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取医生列表
		$url = C("PATH_URL")."/interface/yc_doc/expert_pm_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"$page_num",
			"page_rows"=>"10",
			"jifen_date"=>"$jifen_date"
		);
		$json=json_encode($data);
		$phb_list = json_decode(post_json($url,$json),true);

		//如果用户名是手机号，只截取前六位
		foreach ($phb_list as $k => $v) 
		{	
		    if(preg_match("/^1[0123456789]\d{9}$/", $v['EXPERT_NAME']))
		    {
				$phb_list[$k]['EXPERT_NAME'] = substr($v['EXPERT_NAME'], 0, 6);			 	
		    }
		}

		$this->assign('doc_list',$phb_list);
		$num = ($page_num-1)*10;
		$this->assign('num',$num);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
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
			"page_rows"=>"20"
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
			"page_rows"=>"20"
		);
		$json=json_encode($data);
		$doc_list = json_decode(post_json($url,$json),true);

		$this->assign('doc_list',$doc_list);
		$num = ($page_num-1)*10;
		$this->assign('num',$num);
		//输出更多列表
		include COMMON_PATH.'/Common/load_more.php';
	}

	//根据月份获取医生排行榜
	public function phb_list_month(){

		$page_num = I('post.page_num','2');
		$jifen_date =I('post.jifen_date');
		if(!$jifen_date)
		{
			$jifen_date =I('get.jifen_date');
		}
		else if($jifen_date=="zongpai")
		{
			$jifen_date = '';
		}
		else if($jifen_date == "1")
		{
			$jifen_date = date("Y-$jifen_date");
		}
		else
		{

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
		$url = C("PATH_URL")."/interface/yc_doc/expert_pm_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"page_num"=>"1",
			"page_rows"=>"10",
			"jifen_date"=>"$jifen_date"
		);
		$json=json_encode($data);	
		$phb_list =json_decode(post_json($url,$json),true);

		//获取自己排名
		$url = C("PATH_URL")."/interface/yc_doc/expert_pm.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"jifen_date"=>"$jifen_date"
		);
		$json=json_encode($data);
		$mylist =json_decode(post_json($url,$json),true);
		// var_dump($mylist,$phb_list);
		$str = '<div class="PaiHang"><div class="headPaiHang clearfix"><div class="champion">';

		if($mylist['SMALL_PIC'])
		{
			if($mylist['EXPERT_SEX'] == "男" && $mylist['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png'){
				$str .='<a href="/weixin/index.php?m=Expert&c=User&a=jifen_list"><img src="/weixin/Public/Expert/images/yonghu/boy.png" alt=""></a>';
			}elseif($mylist['EXPERT_SEX'] == "女" && $mylist['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png'){
				$str .='<a href="/weixin/index.php?m=Expert&c=User&a=jifen_list"><img src="/weixin/Public/Expert/images/yonghu/girl.png" alt=""></a>';
			}elseif($mylist['EXPERT_SEX'] == "未填写" && $mylist['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png'){
				$str .='<a href="/weixin/index.php?m=Expert&c=User&a=jifen_list"><img src="/weixin/Public/Expert/images/yonghu/girl.png" alt=""></a>';
			}else{
				$str .= '<a href="/weixin/index.php?m=Expert&c=User&a=jifen_list"><img src="'.$mylist['SMALL_PIC'].'" /></a>';
			}
		}
		else
		{
			$str .='<a href="/weixin/index.php?m=Expert&c=User&a=jifen_list"><img src="/weixin/Public/Expert/images/yonghu/girl.png" alt=""></a>';
		}
		if($phb_list)
		{
			$str .='</div><div class="name_bot"><a href="/weixin/index.php?m=Expert&c=User&a=jifen_list">';
			if($mylist){
				$str .='<div class="userinfo clearfix"><p class="xingming">'.$mylist['EXPERT_NAME'].'</p><p class="bumen">'.$mylist['HOS_NAME'].'</p></div><div class="jifen clearfix"><p>'.$mylist['JIFEN_NUM'].'分</p><p>第'.$mylist['JIFEN_RANK'].'名</p></div>';
			}else{
				$str.='<div class="userinfo clearfix"><p class="xingming">暂无数据</p></div><div class="jifen clearfix"><p>0分</p><p>暂无排名</p></div>';
			}
			


		$str.='</a></div></div></div><div class="hot" id="doc-list"><ul class="doc-list" >';

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

			
			if($value['EXPERT_SEX'] == "未填写" && $value['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')
			{
				$str .= '<img src="/weixin/Public/Expert/images/yonghu/girl.png" />';
			}
			elseif($value['EXPERT_SEX'] == "男" && $value['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')
			{
				$str .= '<img src="/weixin/Public/Expert/images/yonghu/boy.png" />';
			}
			elseif($value['EXPERT_SEX'] == "女" && $value['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')
			{
				$str .= '<img src="/weixin/Public/Expert/images/yonghu/girl.png" />';
			}
			else
			{
				$str .= '<img src="'.$value['SMALL_PIC'].'" />';
			}
			
			$str .= '</a></div><div class="huoyuedu"><div class="title"><div class="fl title-des"><span>'.$value['EXPERT_NAME'].'</span><span class="huadong_hos">'.$value['HOS_NAME'].'</span></div><span class="fr">'.$value['JIFEN_NUM'].'</span><div class="clear"></div></div></div><div class="clear"></div></li><input type="hidden" id="date" value="'.$jifen_date.'">';
		}

		$str .= '</ul></div>';
		echo $str;
	}
}

	//获取gps
	public function get_gps()
	{
		$url_str = "m=Expert&c=Doc&a=phb_list";
		$this->assign('url_str',$url_str);
		$this->display(COMMON_PATH.'/Common/gps.html');
	}

	//医生团对列表
	public function doc_team()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';


		$url = C("PATH_URL")."/interface/yc_doc/expert_union_list.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"union_type"=>"0",
			"page_num"=>"1"
		);
		$json=json_encode($data);
		$doc_list = json_decode(post_json($url,$json),true);
		$this->assign('doc_list',$doc_list);
		$this->display();
	}

	//医生团队详细
	public function doc_union(){

		$union_id = I("get.id","");

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$url = C("PATH_URL")."/interface/yc_doc/expert_union_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"union_id"=>"$union_id"
		);
		$json=json_encode($data);
		$doc_detail = json_decode(post_json($url,$json),true);

		//获取当前医生id
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json = json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$expert_id = $user_info['EXPERT_ID'];
		$union_id =$user_info['UNION_ID'];
		if($union_id)
		{

			$status = 1;

		}
		else
		{
			//print_r($doc_detail['EXPERT_INFO']);
			foreach ($doc_detail['EXPERT_INFO'] as $key => $value)
			{

				 if(in_array($expert_id,$value))
				 {
				 	$status = 1;break;
				 }
			}

		}
		if($status)
		{

			$this->assign("status",$status);
		}
		$this->assign('doc_detail',$doc_detail);
		$this->assign('expert_id',$expert_id);
		$this->assign('expert_info',$doc_detail['EXPERT_INFO']);
		$this->display();
	}

	//专家团队审核

	public function doc_tdsh()
	{

		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
		
		$check_desc = I("post.check_desc");
		$check_flag = I("post.check_flag",'1');
		$expert_id = I("post.expert_id");
		$union_id = I("post.union_id");
		$url = C("PATH_URL")."/interface/yc_doc/union_expert_check.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"union_id"=>"$union_id",
			"expert_id"=>"$expert_id",
			"check_flag"=>"$check_flag",
			"check_desc"=>"$check_desc"
		);
		$json = json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		echo json_encode($user_info['error_code']);
	}

	//医生团队申请加入
	public function doc_tdsq()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$union_id  = I("get.id");

		$url = C("PATH_URL")."/interface/yc_doc/union_expert_add.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			'union_id'=>"$union_id"
		);
		$json=json_encode($data);

		$doc_list = json_decode(post_json($url,$json),true);
		header("Content-Type:text/html;charset=utf-8");

		if($doc_list['error_code']=="ok")
		{

			$this->redirect('?m=Expert&c=Doc&a=mydoc_team');

		}
		else if($doc_list['error_code']=="1")
		{

			echo "<script> alert('已申请加入！');history.go(-1) </script>";
		}
		else if($doc_list['error_code']=="2")
		{

			echo "<script> alert('您是大专家！不能申请加入！');history.go(-1) </script>";
		}
	}

	//我的医生团对列表
	public function mydoc_team()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//获取当前医生信息
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json = json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$leader_flag = $user_info['LEADER_FLAG'];
		$union_id =$user_info['UNION_ID'];

		//判断是否是大专家
		if($leader_flag)
		{
			//获取大专家团队信息
			$url = C("PATH_URL")."/interface/yc_doc/expert_union_detail.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"union_id"=>"$union_id"
			);
			$html="mydoc_group";
			$json=json_encode($data);
			//echo $html;
			$doc_detail = json_decode(post_json($url,$json),true);
			//print_r($doc_detail);die;
			$this->assign('doc_detail',$doc_detail);
			$this->assign('expert_info',$doc_detail['EXPERT_INFO']);

		}
		else
		{
			//小医生
			$url = C("PATH_URL")."/interface/yc_doc/expert_union_list.aspx?access_token=".$token;
			$data = array
			(
				"openid"=>"$openid",
				"union_type"=>"1",
				"page_num"=>"1"
			);
			$html="mydoc_team";
			$json=json_encode($data);
			$doc_list = json_decode(post_json($url,$json),true);
			$this->assign('doc_list',$doc_list);

		}
		$this->display($html);
	}

	//医生申请详情
	public function doc_detail()
	{
		//获取平台的access_token
		$token = A_token();

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		$expert_id = I("get.expert_id");
		$union_id = I("get.union_id");

		//获取大专家团队信息
		$url = C("PATH_URL")."/interface/yc_doc/expert_union_detail.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"union_id"=>"$union_id"
		);
		$html="mydoc_group";
		$json=json_encode($data);
		$doc_detail = json_decode(post_json($url,$json),true);
		foreach ($doc_detail['EXPERT_INFO'] as $key => $value)
		{
			if($value['EXPERT_ID']==$expert_id)
			{
				$info = $value;
			}
		}
		$this->assign('info',$info);
		$this->assign("union_id",$union_id);
		$this->display();
	}
}