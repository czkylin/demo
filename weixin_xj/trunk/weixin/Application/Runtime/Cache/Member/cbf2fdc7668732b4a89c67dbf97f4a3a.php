<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="/weixin/Public/Member/css/zhengcejiedu/expand_list2.css">
<title>我要代言</title>
<script>
	document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/15 + 'px';
	/*750的psd 1rem = 50px*/
</script>
</head>

<body>
	<section style="display:none">
		<img src="http://weixin.yk2020.com/include/get_share_code.aspx?a=wxlogin&user_id=<?php echo ($user_info["user_id"]); ?>&link_mobile=<?php echo ($user_info["link_mobile"]); ?>&attach=<?php echo urlencode(base64_encode('m='.$type.'&c=User&a=expand_list'));?>&user_name=<?php echo rawurlencode($user_info[user_name]); ?>" alt="">
		<p>扫一扫，即刻购买</p>
	</section>
	<section class="nav">
	    <ul class="btn-list">
            <li>
                <a href="<?php echo U('Member/User/expand_list');?>">
                    <span>全部</span>
                </a>
            </li>
            <li class="active">
                <a href="javascript:;">
                    <span>百倍爱心卡</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Member/User/expand_list_main');?>">
                    <span>重疾保障</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Member/User/expand_list_1280');?>">
                    <span>健康管理套装</span>
                </a>
            </li>
            <!-- <li>
                <a href="<?php echo U('Member/User/expand_list_498');?>">
                    <span>百倍爱心卡健康保健套装</span>
                </a>
            </li> -->
            <li>
                <a href="<?php echo U('Member/User/expand_list_880');?>">
                    <span>高血压套装</span>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Member/User/expand_list_1880');?>">
                    <span>手机套装</span>
                </a>
            </li>
        </ul>
        <div class="hr"></div>
	</section>
	<article style="margin-bottom: 3rem;">
		<ul class="list">
		<?php if(is_array($bx_list1)): $i = 0; $__LIST__ = $bx_list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bx): $mod = ($i % 2 );++$i;?><li class="clear">
				<div class="selector clear">
					<span></span>
					<img src="/weixin/Public/Member/images/huzhu/share_icon/member_card.png" alt="">
					<p><a href="<?php echo U('Member/Huzhu/share_card',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'person_id'=>$bx['RECORD_ID'],'path'=>$path));?>"><?php echo ($user_info['real_name']); ?>为<?php if($user_info['real_name'] == $bx[PERSON_NAME]): ?>自己<?php else: ?>家人<?php echo ($bx["PERSON_NAME"]); endif; ?>购买百倍爱心卡，我为爱心卡代言！</a></p>
				</div>
				<div class="code" data-code="share_card">
					<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
					<input type="hidden" id="person_id" value="<?php echo ($bx['RECORD_ID']); ?>" />
				</div>

			</li><?php endforeach; endif; else: echo "" ;endif; ?>

            <!-- <li class="clear">
                    <div class="selector clear">
                        <span></span>
                        <img src="/weixin/Public/Member/images/huzhu/father/icon.jpg" alt="">
                        <p><a href="<?php echo U('Member/Huzhu/father',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">父亲节百倍爱心卡不仅买一送一，留下父亲电话和想要和父亲说的话，满满的爱意我们来替您传达！</a></p>
                    </div>
                    <div class="code" data-code="father">
                        <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
                        <input type="hidden" id="person_id" value="<?php echo ($bx['RECORD_ID']); ?>" />
                    </div>

                </li>
				<li class="clear">
					<div class="selector clear">
							<span></span>
							<img src="/weixin/Public/Member/Lott/images/lott.png" alt="">
							<p><a href="/weixin/index.php?m=Member&c=Lott&a=index">端午大作战，避开炸弹抢粽子了。</a></p>
					</div>
					<div class="code" data-code="duanwujie">
							<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
					</div>
				</li> -->

				<!-- <li class="clear">
						<div class="selector clear">
								<span></span>
								<img src="/weixin/Public/Member/images/huzhu/share_icon/duanwujie.png" alt="">
								<p><a href="<?php echo U('Member/Huzhu/duanwujie',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">今年端午，送给父母一份特别的礼物，百倍爱心卡（百倍爱心粽），给父母一份健康的祝福！</a></p>
						</div>
						<div class="code" data-code="duanwujie">
								<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
						</div>
				</li> -->
                <li class="clear">
                    <div class="selector clear">
                        <span></span>
                        <img src="/weixin/Public/Member/images/art/200.jpg" alt="">
                        <p><a href="<?php echo U('Member/Huzhu/art',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">百倍爱心卡让爱延续……</a></p>
                    </div>
                    <div class="code" data-code="art">
                        <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡让爱延续……">
                    </div>
                 </li>
                <li class="clear">
                    <div class="selector clear">
                        <span></span>
                        <img src="/weixin/Public/Member/images/huzhu/share_icon/chuandi.png" alt="">
                        <p><a href="<?php echo U('Member/Huzhu/fenxiang',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">百倍爱心卡 火热传递中</a></p>
                    </div>
                    <div class="code" data-code="fenxiang">
                        <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
                    </div>
                </li>
                    
                <!-- 医联体入口 -->
                <!-- <li class="clear">
                    <div class="selector clear">
                        <span></span>
                        <img src="/weixin/Public/Member/images/yilianti/icon.jpg" alt="">
                        <p><a href="<?php echo U('Member/Huzhu/yilianti',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">
                        远程视界科技集团小远带您乘坐医联体特快专列</a></p>
                    </div>
                    <div class="code" data-code="yilianti">
                        <img src="/weixin/Public/Member/images/huzhu/code.png" alt="远程视界科技集团小远带您乘坐医联体特快专列">
                    </div>
                </li> -->


				<li class="clear">
						<div class="selector clear">
								<span></span>
								<img src="/weixin/Public/Member/images/aid_neimeng/share.png" alt="">
								<p><a href="<?php echo U('Member/Huzhu/aid_neimeng',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">有爱就有未来，百倍爱心卡之巴彦淖尔市首例爱心援助</a></p>
						</div>
						<div class="code" data-code="aid_neimeng">
								<img src="/weixin/Public/Member/images/huzhu/code.png" alt="有爱就有未来，百倍爱心卡之巴彦淖尔市首例爱心援助">
						</div>
				</li>

				<li class="clear">
						<div class="selector clear">
								<span></span>
								<img src="/weixin/Public/Member/images/aid/200.jpg" alt="">
								<p><a href="<?php echo U('Member/Huzhu/aid',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">百元投入 倾情援助</a></p>
						</div>
						<div class="code" data-code="aid">
								<img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
						</div>
				</li>
                <!--<li class="clear">
                    <div class="selector clear">
                        <span></span>
                        <img class="" src="/weixin/Public/Member/images/huzhu/share_icon/icon.jpg" alt="">
                        <p><a href="<?php echo U('Member/Huzhu/bbaxk_gwsn',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">开启高温"桑拿"模式，您想好如何应对三伏天了吗？</a></p>
                    </div>
                    <div class="code" data-code="bbaxk_gwsn">
                        <img src="/weixin/Public/Member/images/huzhu/code.png" alt='开启高温"桑拿"模式，您想好如何应对三伏天了吗？'>
                        <input type="hidden" id="person_id" value="<?php echo ($bx['RECORD_ID']); ?>" />
                    </div>
                </li>-->

        <li class="clear">
            <div class="selector clear">
                <span></span>
                <img src="/weixin/Public/Member/images/huzhu/share_qi/tu.jpg" alt="">
                <p><a href="<?php echo U('Member/Huzhu/share_7',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">2000万援助金，只为护住你的心</a></p>
            </div>
            <div class="code" data-code="share_7">
                <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
        </li>
        <!-- <li class="clear">
            <div class="selector clear">
                <span></span>
                <img src="/weixin/Public/Member/images/huzhu/qingming/fx.png" alt="">
                <p><a href="<?php echo U('Member/Huzhu/share_qingming',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">清明节之际，那些离你而去的亲人不为人知的秘密</a></p>
            </div>
            <div class="code" data-code="share_qingming">
                <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
        </li> -->
        <li class="clear">
            <div class="selector clear">
                <span></span>
                <img src="/weixin/Public/Member/images/huzhu/share_icon/parent.png" alt="">
                <p><a href="<?php echo U('Member/Huzhu/share_parent',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>"><?php echo ($user_info["real_name"]); ?>告诉您，百元送父母10万健康援助</a></p>
            </div>
            <div class="code" data-code="share_parent">
                <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
        </li>
        <li class="clear">
            <div class="selector clear">
                <span></span>
                <img src="/weixin/Public/Member/images/huzhu/share_icon/share.png" alt="">
                <p><a href="<?php echo U('Member/Huzhu/share_yf',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">好友<?php echo ($user_info["real_name"]); ?>喊你一起开始慢病管理啦！！</a></p>
            </div>
            <div class="code" data-code="share_yf">
                <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
        </li>
        <li class="clear">
            <div class="selector clear">
                <span></span>
                <img src="/weixin/Public/Member/images/huzhu/share_icon/fenxiang.png" alt="">
                <p><a href="<?php echo U('Member/Huzhu/share_init',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">关爱身边人，<?php echo ($user_info["real_name"]); ?>送您10万健康援助</a></p>
            </div>
            <div class="code" data-code="share_init">
                <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
        </li>
        <li class="clear" >
            <div class="selector">
                <span></span>
                <img src="/weixin/Public/Member/images/huzhu/share_icon/share_des.png" alt="">
                <p><a href="<?php echo U('Member/Huzhu/share_des',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">号外号外！！好友<?php echo ($user_info["real_name"]); ?>喊你快来领取十万援助！</a></p>
            </div>
            <div class="code" data-code="share_des">
                <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
        </li>
        <li class="clear" >
            <div class="selector">
                <span></span>
                <img src="/weixin/Public/Member/images/parent/pic01.jpg" alt="">
                <p><a href="<?php echo U('Member/Huzhu/share_5',array('user_id'=>$user_info['user_id'],'link_mobile'=>$user_info['link_mobile'],'user_name'=>$user_info['user_name'],'path'=>$path));?>">好友<?php echo ($user_info["real_name"]); ?>送您的亲人一份十万援助！</a></p>
            </div>
            <div class="code" data-code="share_5">
                <img src="/weixin/Public/Member/images/huzhu/code.png" alt="百倍爱心卡 火热传递中">
            </div>
        </li>
    </ul>
	</article>
	<div class="fenxiang_con">
        <div class="fenxiang">
        	<img src="/weixin/Public/Member/images/zhengcejiedu/fenxiang.png">
        </div>
    </div>
    <!--二维码-->
    <div id="pop" style="display: none;">
	    <div class="mask"></div>
	    <div class="pop-content">
	        <div class="close"></div>
	        <div class="pop-main">
	            <img src="" alt="">
	            <p>扫一扫，即刻加入慢病管理</p>
	        </div>
	        <p class="pop-des">百倍爱心卡</p>
	    </div>
	</div>
	<a href="javascript:;" class="share">分享</a>
	<script type="text/javascript" src="/weixin/Public/Expert/js/jquery.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
        //share
        $('article').css('padding-top',$('.nav').height());
		$('.list li').eq(0).find('.selector').addClass('active');
        $('.selector').each(function(){
			$(this).click(function(){
				$('.selector').each(function(){
					$(this).removeClass('active')
				})
				$(this).addClass('active');

				var _this = this;

				//PHP传值，微信调用
				getMes(this);

				//APP IOS传值
				if(window.webkit){
					getIOS(this);
				}


				//APP Android 传值
				if(window.AndroidWebView){
					getAndroid(this);
				}

			})
		})
		$('.share').click(function(){
			$('.fenxiang_con').show();
			setTimeout(function(){
				$('.fenxiang_con').hide();
			},3000)
		})

		$('.code').click(function(){
    		var a = $(this).data('code');
    		var person_id = $(this).find('#person_id').val();
    		var username = encodeURIComponent("<?php echo ($user_info['user_name']); ?>");
            var path = encodeURIComponent("<?php echo ($type); ?>"+"_expand_list : {2weima} :"+a);
    		var code = "http://weixin.yk2020.com/include/get_share_code.aspx?user_id=<?php echo ($user_info['user_id']); ?>&link_mobile=<?php echo ($user_info['link_mobile']); ?>&user_name="+username+"&a="+a+"&url_path="+path;
    		if(a == "share_card"){
    			code +="&person_id="+person_id;
    		}
   			 console.log(code);

    		$('#pop').show();
    		$('.pop-main img').attr('src',code);
   			return false;
		});
		$('.close').click(function(){
            $('#pop').hide();
        });
		/*var btn_onoff = true;
		$('.btn-list').click(function(){
			if(btn_onoff){
				$(this).css('height','auto');
			}else{
				$(this).css('height','2rem');
			}
			btn_onoff = !btn_onoff;

		})*/
        function set_log(act)
        {
            var type = "<?php echo ($type); ?>"+"_expand_list";
            var link_mobile = '<?php echo ($user_info["link_mobile"]); ?>';
            var openid = "<?php echo ($homeid); ?>";
            var path = "<?php echo ($path); ?>";
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
		//tab
		wx.config({
            debug: false,
            appId: '<?php echo $appId;?>',
            timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
            nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
            signature: '<?php echo $signature;?>',// 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

		var jsonMes =
			{
				imgSrc : $('.selector').eq(0).find('img').attr('src'),
				title : $('.selector').eq(0).find('p>a').html(),
				link : $('.selector').eq(0).find('p>a').attr('href')
			};




			var wx_share_title = jsonMes.title;
        	var wx_share_desc = '百倍爱心卡，老年人专属心血管保障。我觉得很适合您，抽空看看呗？';
        	var wx_share_imgUrl = "http://wx-heartorg.yk2020.com"+jsonMes.imgSrc;
	        wx.ready(function() {
	            wx.onMenuShareTimeline({
	                title: wx_share_title,
	                desc: wx_share_desc,
	                link: 'http://wx-heartorg.yk2020.com/'+jsonMes.link+'',
	                imgUrl: wx_share_imgUrl,
	                success: function() {
	                	set_log('朋友圈');
	                },
	                cancel: function() {}
	            });
	            wx.onMenuShareAppMessage({
	                title: wx_share_title,
	                desc: wx_share_desc,
	                link: 'http://wx-heartorg.yk2020.com/'+jsonMes.link+'',
	                imgUrl: wx_share_imgUrl,
	                success: function() {
	                    set_log('微信');
	                },
	                cancel: function() {}
	            });
	        });



		function getIOS( obj ){
			window.webkit.messageHandlers.pgy.postMessage({
				imgSrc : $(obj).find('img').attr('src'),
				title : $(obj).find('p>a').html(),
				link : $(obj).find('p>a').attr('href')
			})
		}

		function getAndroid( obj ){
			var strMes = $(obj).find('img').attr('src') + "+" + $(obj).find('p>a').html()+ "+" + $(obj).find('p>a').attr('href');
			window.AndroidWebView.showInfoFromJs(strMes)
		}

		function getMes(obj){
			jsonMes.imgSrc = $(obj).find('img').attr('src');
			jsonMes.title = $(obj).find('p>a').html();
			jsonMes.link = $(obj).find('p>a').attr('href');
			var wx_share_title = jsonMes.title;
        	var wx_share_desc = '百倍爱心卡，老年人专属心血管保障。我觉得很适合您，抽空看看呗？';
        	var wx_share_imgUrl = "http://wx-heartorg.yk2020.com"+jsonMes.imgSrc;
	        wx.ready(function() {
	            wx.onMenuShareTimeline({
	                title: wx_share_title,
	                desc: wx_share_desc,
	                link: 'http://wx-heartorg.yk2020.com/'+jsonMes.link+'',
	                imgUrl: wx_share_imgUrl,
	                success: function() {
	                	set_log('朋友圈');
	                },
	                cancel: function() {}
	            });
	            wx.onMenuShareAppMessage({
	                title: wx_share_title,
	                desc: wx_share_desc,
	                link: 'http://wx-heartorg.yk2020.com/'+jsonMes.link+'',
	                imgUrl: wx_share_imgUrl,
	                success: function() {
	                    set_log('微信');
	                },
	                cancel: function() {}
	            });
	        });
		}

//IOS，默认选中项
        if(window.webkit){
            window.webkit.messageHandlers.pgy.postMessage({
                imgSrc : $('.selector').eq(0).find('img').attr('src'),
                title : $('.selector').eq(0).find('p>a').html(),
                link : $('.selector').eq(0).find('p>a').attr('href')
            })
        }

        //Android,默认选中项
        if(window.AndroidWebView){
            var strMes = $('.selector').eq(0).find('img').attr('src') + "+" +$('.selector').eq(0).find('p>a').html() + "+" +$('.selector').eq(0).find('p>a').attr('href');
            window.AndroidWebView.showInfoFromJs(strMes);
        }

	</script>
</body>
</html>