<?php
//过滤特殊符号
function replace_specialChar($strParam)
{
    $regex = "/\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|\￥|\\￥|\…|\……/";
    return preg_replace($regex,"",$strParam);
}
//以post方式请求获取平台的接口数据
function post_json($url,$data)
{
	$SMSPost = curl_init($url);
	// $aHeader[] = "Content-Type:text/xml;charset=utf-8";
	// curl_setopt($SMSPost,CURLOPT_HTTPHEADER, $aHeader);
	curl_setopt($SMSPost,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($SMSPost,CURLOPT_TIMEOUT,300);
	curl_setopt($SMSPost,CURLOPT_POST,1);
	curl_setopt($SMSPost,CURLOPT_POSTFIELDS,$data);
	curl_setopt($SMSPost,CURLOPT_RETURNTRANSFER,1);
	// $ReturnSMS = curl_exec($SMSPost); 注释
	$data  = curl_exec($SMSPost);
	return $data; 
}

//获取平台的access_token
function A_token()
{
	//导入json文件
	$json_string = file_get_contents(COMMON_PATH.'/Common/A_token.json');
	if($json_string == "")
	{
		//json文件为空时，从服务器获取数据
		$access_token = get_A_token();
	}
	else
	{
		//json文件不为空时，直接读配置文件
		$token_info = json_decode($json_string, true);
		$access_token = $token_info[0]["ACCESS_TOKEN"];
		$expires_in = $token_info[0]["EXPIRES_IN"];
		$access_second = $token_info[0]["ACCESS_SECOND"];
		if ((int)$access_second > (int)$expires_in - 1000)
		{   
			$access_token = get_A_token();
		}
	}
	return $access_token;
}
//从配置文件读取access_token文件
function get_A_token()
{
	$Appid = "Q5dxyZO8Bt";
	$Appsecret = "320a49222435177cd7fbafa466cfb83d";
	$url = C("PATH_URL")."/interface/access_token.aspx?Appid=".$Appid."&Appsecret=".$Appsecret;
	$token = json_decode(post_json($url,""),true);
	file_put_contents(COMMON_PATH.'/Common/A_token.json', post_json($url,""));
	$access_token = $token[0]["ACCESS_TOKEN"];
	return $access_token;
}


function get_hostip()
{
	if ($_SERVER['REMOTE_ADDR'])
	{
		$cip = $_SERVER['REMOTE_ADDR'];
		} elseif (getenv("REMOTE_ADDR")) {
		$cip = getenv("REMOTE_ADDR");
		} elseif (getenv("HTTP_CLIENT_IP")) {
		$cip = getenv("HTTP_CLIENT_IP");
		} else {
		$cip = "unknown";
		}
		return $cip;
}
//加密函数
function passport_encrypt($str,$key)
{
	srand((double)microtime() * 1000000);
	$encrypt_key=md5(rand(0, 32000));
	$ctr=0;
	$tmp='';
	for ($i=0; $i<strlen($str); $i++)
	{
		$ctr=$ctr==strlen($encrypt_key)?0:$ctr;
		$tmp.=$encrypt_key[$ctr].($str[$i] ^ $encrypt_key[$ctr++]);
	}

	return base64_encode(passport_key($tmp,$key));
}


//解密函数
function passport_decrypt($str,$key)
{
	$str=passport_key(base64_decode($str),$key);
	$tmp='';
	for ($i=0; $i<strlen($str); $i++)
	{
		$md5=$str[$i];
		$tmp.=$str[++$i] ^ $md5;
	}

	return $tmp;
}


//辅助加解密函数
function passport_key($str,$encrypt_key)
{
	$encrypt_key=md5($encrypt_key);
	$ctr=0;
	$tmp='';
	for ($i=0; $i<strlen($str); $i++)
	{
		$ctr=$ctr==strlen($encrypt_key)?0:$ctr;
		$tmp.=$str[$i] ^ $encrypt_key[$ctr++];
	}

	return $tmp;
}

function delhtml($str){
  $str = strip_tags($str);
  $str = trim($str);
  $str=str_replace(array("\n\r","\n","\r"," ","\t","\r\n","&nbsp;"), "", $str);
  return $str;
}

//过滤截取字符串1
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{  
  	if(function_exists("mb_substr"))
  	{  

        if($suffix)  
        	return mb_substr($str, $start, $length, $charset)."...";  
        else
            return mb_substr($str, $start, $length, $charset);  
    }  
    elseif(function_exists('iconv_substr')) 
    {  
        if($suffix)  
            return iconv_substr($str,$start,$length,$charset)."...";  
        else
            return iconv_substr($str,$start,$length,$charset);  

    } 

    $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";  
    $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";  
    $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";  
    $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";  
    preg_match_all($re[$charset], $str, $match);  
    $slice = join("",array_slice($match[0], $start, $length));  
    if($suffix) return $slice."…";  
    return $slice;
}
//过滤字符串2
function DeleteHtml($str) 
{ 
	$str = strip_tags(html_entity_decode($str));
	return trim($str); //返回字符串
}

function str($str)
{

	$c=ereg('[a-zA-Z]', strtoupper(substr( $str, 0, 1 )));
	$d=ereg('[0-9]{1}', strtoupper(substr( $str, 0, 1 )));
    if($c){
        return strtoupper(substr( $str, 0, 1 )) ;
    }else if($d){
        return null ;
    }else{ 
	    $s1  = iconv('UTF-8','gb2312',$str);
	    $s2  = iconv('gb2312','UTF-8',$s1);
	    $s   = $s2 == $str ? $s1 : $str;
	    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
	    if($asc >= -20319 && $asc <= -20284) return 'A';
	    if($asc >= -20283 && $asc <= -19776) return 'B';
	    if($asc >= -19775 && $asc <= -19219) return 'C';
	    if($asc >= -19218 && $asc <= -18711) return 'D';
	    if($asc >= -18710 && $asc <= -18527) return 'E';
	    if($asc >= -18526 && $asc <= -18240) return 'F';
	    if($asc >= -18239 && $asc <= -17923) return 'G';
	    if($asc >= -17922 && $asc <= -17418) return 'H';
	    if($asc >= -17417 && $asc <= -16475) return 'J';
	    if($asc >= -16474 && $asc <= -16213) return 'K';
	    if($asc >= -16212 && $asc <= -15641) return 'L';
	    if($asc >= -15640 && $asc <= -15166) return 'M';
	    if($asc >= -15165 && $asc <= -14923) return 'N';
	    if($asc >= -14922 && $asc <= -14915) return 'P';
	    if($asc >= -14914 && $asc <= -14631) return 'P';
	    if($asc >= -14630 && $asc <= -14150) return 'Q';
	    if($asc >= -14149 && $asc <= -14091) return 'R';
	    if($asc >= -14090 && $asc <= -13319) return 'S';
	    if($asc >= -13318 && $asc <= -12839) return 'T';
	    if($asc >= -12838 && $asc <= -12557) return 'W';
	    if($asc >= -12556 && $asc <= -11848) return 'X';
	    if($asc >= -11847 && $asc <= -11056) return 'Y';
	    if($asc >= -11055 && $asc <= -10247) return 'Z';
	    return null;
    }
}
		

//给内容图片添加绝对地址
function Strimgurl($search,$replace,$contents)
{
	$str = str_replace($search,$replace,$contents);
	return $str; 
}
 
//转换日期格式
function Dtodiy($style,$date)
{
	$str = date($style,strtotime($date));
	return $str;
}

//强制下载pdf

function forceDownload($filename) 
{ 

   
    
    // http headers 
    header('Content-Type: application-x/force-download'); 
    header('Content-Disposition: attachment; filename="' . basename($filename) .'"'); 
    header('Content-length: ' . filesize($filename)); 
 
    // for IE6 
    if (false === strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) { 
        header('Cache-Control: no-cache, must-revalidate'); 
    } 
    header('Pragma: no-cache'); 
        
    // read file content and output 
    return readfile($filename);
} 

//新版判断用户状态
function band_phone_code()
{
	$zt = band_doc_status();
	switch ($zt) 
	{
		case 'false':		//没有绑定成功
			$code = '6';
			break;
		default:		//成功
			$code = '1';
			break;
	}
	return $code;
}

//申请状态
function phone_status()
{
	//获取平台的access_token
		$token = A_token();
		//获取openid
		include MODULE_PATH.'/Common/open_id.php';
	//申请状态
			//①获取申请信息
		$url = C("PATH_URL")."/interface/yc_doc/test_user_info.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"expert_id"=>""
		);
		$json=json_encode($data);
		$user_info = json_decode(post_json($url,$json),true);
		$link_phone = $user_info['LINK_MOBILE'];
			//②获取申请信息
		$url = C("PATH_URL")."/interface/yc_doc/doc_info_add_flag.aspx?access_token=".$token;
		$data = array
		(
			"openid"=>"$openid",
			"link_mobile"=>"$link_phone"
		);
		$json = json_encode($data);
		$user_zt = json_decode(post_json($url,$json),true);
		switch ($user_zt['error_code'])
		{
			case 0:
				$code ='0';
			  	break;
			case 1:
				$code ='1';
				break;
			case 3:
				$code ='3';
				break;
			default:
				break;
		}
	return $code;
}

//发送短信消息
function sed_mstext($phone,$text)
{
	
	$username = C('MSG_USERNAME');
	$password = C('MSG_PASSWORD');
	$yzmString= $text;
	$message =urlencode($yzmString) ;//内容解码

	$url="http://114.215.202.188:8081/SmsAndMms/mt?";
	$curlPost = 'Sn='.$username.'&Pwd='.$password.'&mobile='.$phone.'&content='.$message.'';

	$ch = curl_init();//初始化curl
	curl_setopt($ch,CURLOPT_URL,$url);//抓取指定网页
	curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  //允许curl提交后,网页重定向  
	curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
	$data = curl_exec($ch);//运行curl
	curl_close($ch);
}

//发送短信消息
function tostrstr($string,$search,$before_search)
{
	
	if($before_search)
	{
		$string = strstr($string,$search,$before_search);
	}
	else
	{
		$string = strstr($string,$search,$before_search);
		$string = str_replace('#','',$string);
	}
	

	return $string;
}


//分割字符串
function tostrstr1($string,$before_search)
{
	
	if($before_search)
	{
		$len = strlen($string);
		$string = substr($string, 0,($len-3));
	}
	else
	{
		$string = mb_substr($string,-1,1,"UTF-8");
	}
	

	return $string;
}


 

/**
     * 
     * 产生随机字符串，不长于16位
     * @param int $length
     * @return 产生的随机字符串
     */
    function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }

/**
 * 
 * 产生随机字符串，不长于32位
 * @param int $length
 * @return 产生的随机字符串
 */
function getNonceStr($length = 32) 
{
	$chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
	$str ="";
	for ( $i = 0; $i < $length; $i++ )  {  
		$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
	} 
	return $str;
}

	