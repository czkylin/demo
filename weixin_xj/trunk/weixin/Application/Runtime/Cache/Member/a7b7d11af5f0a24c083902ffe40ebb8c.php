<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>药店列表</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<link rel="stylesheet" type="text/css" href="/weixin/Public/Member/css/yd/yd_list.css?time=<?php echo ($csstime); ?>.css">
<link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet">
<style>
body, html{height:auto;overflow:auto;}
section .list{height:auto;}
.loading{margin-bottom:0;}
.ui-jiazai{margin-bottom:0;}
</style>
<script type="text/javascript">
	document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.getBoundingClientRect().width / 15 + "px";
</script>
</head>
<body>
	<header>
		<div class="search-box clear">
			<input type="text" class="text" name="hos_name" id="hos_name" placeholder="请输入药店名称">
			<input type="button" onClick="search_list('',document.all.hos_name.value);"  value="搜索" class="btn">
		</div>
		<div class="search">
			<div class="search-content"><b>地区</b><span></span></div>
			<div class="tiaojian">
				<a href="javascript:;" onClick="search_list('quanbu',document.all.hos_name.value);">全部</a>
			 	<?php if(is_array($province_list)): $i = 0; $__LIST__ = $province_list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$province): $mod = ($i % 2 );++$i;?><a href="javascript:;"  onClick="search_list('<?php echo ($province['PROVINCE_ID']); ?>',document.all.hos_name.value);"><?php echo ($province['PROVINCE_NAME']); ?></a><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
			</div>
		</div>
	</header>
	<section>
		<?php if(empty($yd_list)): ?><div style=" text-align: center;">
		        <br/> 
		        <img src="/weixin/Public/Common/images/icon/icon1.png"><br>
		        <i style=" line-height: 30px;font-size:14px;font-style: normal;">暂无数据</i>
		    </div>
		<?php else: ?>
		<ul class="list" id="yd-list">
			<?php if(is_array($yd_list)): $i = 0; $__LIST__ = $yd_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yd): $mod = ($i % 2 );++$i;?><li class="clear">	
					<a href="<?php echo U('FjYd/yd_detail',array('hos_id'=>$yd['HOS_ID'],'hos_address'=>$yd['HOS_ADDRESS'],'hos_pic'=>$yd['HOS_PIC'],'hos_name'=>$yd['HOS_NAME']));?>">
						<?php if(!$yd['HOS_PIC']): ?><img src="/weixin/Public/Member/images/yd/yd.png" class="img">
						<?php else: ?>
							<img src="<?php echo ($yd["HOS_PIC"]); ?>" class="img"><?php endif; ?>
						<div class="list-info">
							<h2><?php echo ($yd["HOS_NAME"]); ?></h2>
							<p class="add"><?php echo ($yd["PROVINCE_NAME"]); ?> <?php echo ($yd["CITY_NAME"]); ?></p>

							<!-- <div class="xingji">
								<i>
									<b style="width:90%;">
										<img src="/weixin/Public/Member/images/icon/start.png">
									</b>
								</i>
							</div> -->
							
							<span class="distance"><?php echo ($yd["JL"]); ?>km</span>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul><?php endif; ?>
		<div class="ui-jiazai"><a href="javascript:void(0);" onClick="load_more('#yd-list');" >加载更多</a></div>
			<div id="emptyData"></div>
			<div id="current_pagenum" style="display:none">2</div>
			<div id="province_id" style="display:none"><?php echo ($province_id); ?></div>
			<div id="current_money_sort" style="display:none"><?php echo ($money_sort); ?></div>
			<div id="current_sale_sort" style="display:none"><?php echo ($sale_sort); ?></div>
     
	</section>
	<script type="text/javascript" src="/weixin/Public/Common/js/jquery.min.js"></script>
	<script src="/weixin/Public/Common/js/load.js" type="text/javascript"></script>
	<script type="text/javascript">
		//初始化
		(function(){
			var iTop = $('header').css('height');
			var iH = $(window).height() - parseFloat(iTop);
			$('section').css('margin-top',iTop);
			$('.tiaojian').css('height',iH);
		})();

		//筛选功能
		(function(){
			$('.search-content').on('click',function(){
				$('.tiaojian').slideToggle(function(){
					$('.tiaojian >a').on('click',function(){
						setTimeout(function(){
							$('.tiaojian').slideUp();
						},400)
						$('.search-content >b').html($(this).html());
					})
				});	
			})
		})()

		//加载更多
		var onOff = true;

		window.onload = function(){
		    window.onscroll();
		}
		window.onscroll = function(){
		    load_more('#yd-list');
		}

		function load_more(obj)
		{   
			// hos = hos? hos:'';
			// province = province? province:'';
		    if(!onOff) return;
		    if($(obj).height() <= $(document).scrollTop() + $(window).height()){
		    	console.log(1)
		        onOff = !onOff;
		        loadmore('#current_pagenum','/weixin/index.php?m=Member&c=FjYd&a=yd_list_append&sale_sort='+$('#current_sale_sort').text()+'&money_sort='+$('#current_money_sort').text()+'&hos_name='+ $('#hos_name').val() +$('#current_name').text()+'&province_id='+ $('#province_id').text() +$('#current_province').text()+'','#yd-list',function(){$('.empty_data').css('top',0);});
		    }
		}

		//搜索
		function search_list(province_id, hos_name) 
        {
        	onOff = true;
        	if(!province_id){
        		province_id = $('#province_id').text();
        	}
        	else if(province_id == 'quanbu')
        	{
        		province_id = '';
        		$('#province_id').text('');
        	}else
        	{
        		$('#province_id').text(province_id);
        	}
        	//console.log(hos_name)
            $('#current_pagenum').text('1');
            $('#yd-list').html('');
            $('.ui-jiazai').children('a').text('加载更多'); 
            /*loadmore('#current_pagenum','/weixin/index.php?m=Member&c=FjYd&a=yd_list_append&sale_sort='+$('#current_sale_sort').text()+'&money_sort='+$('#current_money_sort').text()+'&hos_name='+ $('#hos_name').text() +$('#current_name').text()+'&province_id='+ $('#province_id').text() +$('#current_province').text()+'','#yd-list',function(){$('.empty_data').css('top',0);});*/
			load_more('#yd-list');
        }		
	</script>
</body>
</html>