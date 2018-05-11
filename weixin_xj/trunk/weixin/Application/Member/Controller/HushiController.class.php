<?php
namespace Member\Controller;
use Think\Controller;
use Think\Log;
class HushiController extends Controller
{
	//护士 获取定位
	public function index()
	{
		$lat = I('get.lat', '');
		$lng = I('get.lng', '');

		//获取openid
		include MODULE_PATH.'/Common/open_id.php';

		//验证手机是否绑定
		include MODULE_PATH.'/Common/check_band.php';


		if($lat == "")
		{
			$this->redirect('?m=Member&c=Hushi&a=get_gps3&type=index');
			$x_pi = 3.14159265358979324 * 3000.0 / 180.0;
	        $x = $lng;
	        $y = $lat;
	        $z =sqrt($x * $x + $y * $y) + 0.00002 * sin($y * $x_pi);
	        $theta = atan2($y, $x) + 0.000003 * cos($x * $x_pi);
	        $lng = $z * cos($theta) + 0.0065;
	        $lat = $z * sin($theta) + 0.006;
		}
		    
		$this->assign('lat',$lat);
		$this->assign('lng',$lng);

		$this->display();

	}


	//获取gps
	public function get_gps3($type)
	{
		$type = I('get.type', 'index');
		$url_str = "m=Member&c=Hushi&a=".$type;
		$this->assign('url_str', $url_str);
		$this->display(COMMON_PATH.'/Common/gps3.html');
	}


}
?>