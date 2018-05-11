<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<title>百倍爱心卡集锦</title>
</head>
<link href="/weixin/Public/Home/css/kalist.css" type="text/css" rel="stylesheet" >
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="/weixin/Public/Member/js/jquery.min.js"></script>
<script>
    function set_log(act)
    {
        var type = "Home_bb_list";
        var link_mobile = "<?php echo ($user_info['link_mobile']); ?>";
        var openid = "<?php echo ($openid); ?>";
        var path = "百倍爱心卡集锦";
        $.ajax(
                {
                    type: "post",
                    url: "/weixin/index.php?m=Member&c=Index&a=set_log",
                    data: {'type':type,'openid':openid,'link_mobile':link_mobile,'url_path':path,'act':act},
                    dataType: "json",
                    success: function(data)
                    {
                        console.log('set_log:success');
                    }
            });
    }

    wx.config({
        debug: false,
        appId: '<?php echo $appId;?>',
        timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
        nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
        signature: '<?php echo $signature;?>',// 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    var wx_share_title = '百倍爱心卡集锦';
    var wx_share_desc = '百倍爱心卡贴近老百姓需求，一经问世，就受到老百姓的热烈欢迎!';
    var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Home/images/kalist/1206.jpg";

    wx.ready(function() {
        wx.onMenuShareTimeline({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Home&c=Baibei&a=bb_list',
            imgUrl: wx_share_imgUrl,
            success: function() {
                set_log('朋友圈');
            },
            cancel: function() {}
        });
        wx.onMenuShareAppMessage({
            title: wx_share_title,
            desc: wx_share_desc,
            link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Home&c=Baibei&a=bb_list',
            imgUrl: wx_share_imgUrl,
            success: function() {
                set_log('朋友圈');
            },
            cancel: function() {}
        });
    });

</script>
<body>
<ul class="list">
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_314',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/314/f.jpg"></div>
        	
            <div class="con">
            	<h2>山东威海高寿堂医药连锁有限公司公益筛查活动火热进行中</h2>
                <p>春风送暖，迎着春风，我们的健康万里行公益筛查活动势头益胜。山东威海高寿堂医药连锁有限公司公益筛查活动现场，前来参加此次活动的当地居民早早的就来到了现场。</p>
                <span>2017-03-14</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_227',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/227/f.jpg"></div>
        	
            <div class="con">
            	<h2>2月20日-26日 山东各地健康筛查公益活动集锦</h2>
                <p>山东各地健康筛查公益活动持续升温中，吸引了大量当地居民积极参与</p>
                <span>2017-02-27</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_217',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/217/f.jpg"></div>
        	
            <div class="con">
            	<h2>2017年2月17日 山东省各地健康社区万里行公益活动火热进行中</h2>
                <p>2017年，山东省各地健康社区万里行公益活动又拉开了帷幕，吸引了当地居民广泛参与</p>
                <span>2017-02-17</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_109',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/109/f.jpg"></div>
        	
            <div class="con">
            	<h2>1月8日 山东济宁老年保健医院健康活动进行中</h2>
                <p>山东济宁老年保健医院健康活动进行中，参加活动人数众多</p>
                <span>2017-01-09</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_106',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/106/f.jpg"></div>
        	
            <div class="con">
            	<h2>1月6日 各地药店筛查活动持续升温中</h2>
                <p>各地药店筛查活动持续升温中，参与筛查的群众越来越多，且此活动备受好评</p>
                <span>2017-01-06</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_105',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/105/f.jpg"></div>
        	
            <div class="con">
            	<h2>1月4、5日 河北邯郸魏县天安药店健康查体活动进行中</h2>
                <p>河北邯郸魏县天安药店健康查体活动火热进行中</p>
                <span>2017-01-05</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_102',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/102/f.jpg"></div>
        	
            <div class="con">
            	<h2>元旦小长假 各地药店筛查活动集锦</h2>
                <p>12月31日-1月2日元旦小长假期间，各地药店筛查活动开展的热火朝天</p>
                <span>2017-01-02</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_31',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/31/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月30日 武汉健康大讲堂活动顺利举办</h2>
                <p>今日，中国健康促进基金会健康大讲堂湖北启动仪式暨心脑血管防治讲座在武汉梅园宾馆顺利召开！</p>
                <span>2016-12-30</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_30',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/30/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月30日 各地健康筛查活动火热进行中</h2>
                <p>2016年即将接近尾声，但各地健康筛查活动仍进行的如火如荼</p>
                <span>2016-12-30</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_29',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/29/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月29日 健康万里行公益活动火热进行中</h2>
                <p>今日，山东多地开展的健康万里行公益活动热闹非凡，活动备受当地居民的好评</p>
                <span>2016-12-29</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_28',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/28/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月28日 山东各地健康行活动火热进行中</h2>
                <p>今日山东各地健康行活动仍然火热进行中，活动吸引了大量市民参与</p>
                <span>2016-12-28</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_27',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/27/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月27日 山东枣庄幸福人医药连锁公司健康筛查进行中</h2>
                <p>今日，山东枣庄幸福人医药连锁公司健康筛查火热进行中，当地市民纷纷踊跃参加</p>
                <span>2016-12-27</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_26',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/26/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月26日 各地健康筛查活动进行时</h2>
                <p>各地健康筛查活动持续升温中，活动举办之处，深受当地居民的好评</p>
                <span>2016-12-26</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_25',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/25/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月24、25日 山东、河北各地药店筛查活动火爆进行中</h2>
                <p>刚刚过去的周末恰逢圣诞节，各地药店筛查活动伴随着节日的喜悦，开展的热热闹闹</p>
                <span>2016-12-25</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_22',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/22/f.jpg"></div>
        	
            <div class="con">
            	<h2>12.22日山东药店筛查活动进行中</h2>
                <p>12.22日，山东泰安肥城市科达平民大药房活动进行中，吸引大批当地居民前来筛查</p>
                <span>2016-12-22</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_21',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/21/f.jpg"></div>
        	
            <div class="con">
            	<h2>12.21日山东药店筛查活动进行中 </h2>
                <p>12.21日，山东省泰安新泰市人民药业有限公司黄崖人民医药商场活动正在进行，吸引大批当地居民前来筛查</p>
                <span>2016-12-21</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_20',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/20/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月20日 山东、河北药店筛查活动备受好评</h2>
                <p>今日，山东、河北多地药店筛查活动如期进行，备受当地居民好评</p>
                <span>2016-12-20</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_19',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/19/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月17、18日 周末各地药店筛查活动现场集锦</h2>
                <p>刚刚过去的周末，山东、河北多地药店筛查活动举办的如火如荼，吸引了大批当地居民的参与，并获得好评</p>
                <span>2016-12-19</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_16',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/16/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月16日 山东多地药店公益筛查活动持续升温，备受好评</h2>
                <p>山东多地药店公益筛查活动热度不减，深受当地居民好评</p>
                <span>2016-12-16</span>
            </div>
        </a>
    </li>
    <li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_15',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/15/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月15日 健康大讲堂活动惠及山东百姓</h2>
                <p>12月15日，山东青岛城阳街道正阳路社区卫生服务中心健康大讲堂活动深受当地居民好评</p>
                <span>2016-12-15</span>
            </div>
        </a>
    </li>
    <li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_14',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/14/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月14日 多地药店筛查活动进行中</h2>
                <p>12月14日，多地药店筛查活动进行中，这样利民的公益活动受到当地居民的一致好评</p>
                <span>2016-12-14</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_13',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/13/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月13日 山东省临朐泰和堂大药房筛查活动进行中</h2>
                <p>山东省临朐泰和堂大药房筛查活动正在火热进行中，也吸引了越来越多的当地居民</p>
                <span>2016-12-13</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_11',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/11/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月10、11日 周末多地药店筛查活动火热进行中</h2>
                <p>刚刚过去的周六日，山东、河北多地的药店筛查活动仍然火热进行中，各地居民参与热情高涨</p>
                <span>2016-12-12</span>
            </div>
        </a>
    </li>
<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_09',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/09/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月9日 山东、河北多地药店筛查活动现场集锦</h2>
                <p>今日，多地药店公益筛查活动仍在火热进行中，场面热烈</p>
                <span>2016-12-09</span>
            </div>
        </a>
    </li>
	<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_08',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/08/f.jpg"></div>
        	
            <div class="con">
            	<h2>12月8日 山东、河北多地药店筛查活动深受当地居民好评</h2>
                <p>12月8日，山东、河北多地药店筛查活动进行的如火如荼，并深受当地居民好评</p>
                <span>2016-12-08</span>
            </div>
        </a>
    </li>
	<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail_07',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/1207.jpg"></div>
        	
            <div class="con">
            	<h2>12月7日 菏泽市区枫叶正红老年养护服务中心活动现场</h2>
                <p>菏泽市区枫叶正红老年养护服务中心活动预热中</p>
                <span>2016-12-07</span>
            </div>
        </a>
    </li>
	<li>
    	<a href="<?php echo U('Home/Baibei/bb_detail',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/1206.jpg"></div>
        	
            <div class="con">
            	<h2>12月6日 山东、安徽多地药店筛查活动火热进行中</h2>
                <p>山东漱玉平民大药房董家镇店筛查活动火热进行中</p>
                <span>2016-12-06</span>
            </div>
        </a>
    </li>
    <li> 
       <a href="<?php echo U('Member/Huzhu/fenxiang',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'type'=>'Home','homeid'=>$openid,'path'=>'集锦'));?>">
        <div class="img"><img src="/weixin/Public/Home/images/kalist/01.jpg"></div>    
            <div class="con">
                <h2>百倍爱心卡 火热传递中 </h2>
                <p>百倍爱心卡,火热售卖中
                </p>
                <span>2016-11-27</span>
            </div>
        </a>    
    </li>   
</ul>
</body>
</html>