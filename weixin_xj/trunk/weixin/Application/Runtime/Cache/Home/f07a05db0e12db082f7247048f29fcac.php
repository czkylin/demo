<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta name="share-title" content="">
<link rel="stylesheet" href="/weixin/Public/Home/css/return/assistant.css">
<title>经营回款助手</title>
<script>
	document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth / 15 + 'px';
</script>
</head>
<body>
	<form action="/weixin/index.php?m=Home&c=Return&a=hk_do" method="post" onsubmit=" return check()">
		<section class="assistant">
		
			<ul class="list">
				<li class="hos_select">
					<span>医院：</span>
					<div>
						<input type="text" placeholder="请输入内容" id="text">
						<ol class="pos_list" id="hos">
							
						</ol>
					</div>
					<i></i>
				</li>
				<li class="return">
					<span>手术回款额：</span>
					<input type="tel" placeholder="请输入内容" name="yl_money" id="yl_money">
					<i>元</i>
				</li>
				<li class="return">
					<span>耗材回款额：</span>
					<input type="tel" placeholder="请输入内容" name="hc_money" id="hc_money">
					<i>元</i>
				</li>
				<li class="time">
					<span>申请时间：</span>
					<div></div>
				</li>
				<input type="hidden" id="hos_id" value="" name="hos_id">
				<input type="hidden" id="text_hide">
			</ul>
		</section>
		<section class="foot">
			<a href="/weixin/index.php?m=Home&c=Return&a=hk_list" class="see">查看经营回款助手成果</a>
			<input type="submit" value="提交" class="sub">
		</section>

	</form>

	<script src="/weixin/Public/Home/js/jquery.min.js"></script>
	<script>
		//自动填写申请时间
		(function(){
			var iTime = new Date();
			var iYear = iTime.getFullYear();
			var iMon = iTime.getMonth() + 1;
			var iDate = iTime.getDate();
			$('.time > div').html(iYear + "-" + iMon + "-" + iDate);
		})();

		(function(){
			$('#text').on('input',function(){
				var val = $('#text').val();
				//console.log(val);
				$.ajax({
					type:"post",
					url:'/weixin/index.php?m=Home&c=Return&a=hos_list',
					data: {"val":val},
					success:function(data){
						console.log(data);
						if(data){
							if(data.length){
								var str = '';
								for( var i=0;i<data.length;i++ ){
									str += "<li hos_id='"+ data[i].HOS_ID +"'>"+ data[i].HOS_NAME +"</li>";
								}
							}else{
								if(data.HOS_NAME){
									var str = '';
									str += "<li hos_id='"+ data.HOS_ID +"'>"+ data.HOS_NAME +"</li>";
								}		
							}
							$('#hos').html(str).show();
							selecHos();
						}	
					},
					error:function(){
						alert('数据加载出错！')
					}
				})
			});

			$('.hos_select > i').on('click',function(){
				$.ajax({
					type:'post',
					url:'/weixin/index.php?m=Home&c=Return&a=hos_list',
					data:{},
					success:function(data){
						/*$('#hos').html(data).slideToggle();
						selecHos();*/
						if(data){
							var str = '';
							for( var i=0;i<data.length;i++ ){
								str += "<li hos_id='"+ data[i].HOS_ID +"'>"+ data[i].HOS_NAME +"</li>";
							}
							$('#hos').html(str).slideToggle();
							selecHos();
						}
					},
					error:function(){
						alert('数据加载出错！')
					}
				})
			});

			function selecHos(){
				$('#hos > li').each(function(){
					$(this).click(function(){
						var val = $(this).html();
						$('#hos_id').val($(this).attr('hos_id'));
						$('#text').val(val);
						$('#text_hide').val(val);
						$('#hos').hide();
					})
				})
			}	
		})();

		function check()
		{
			var reg1=/^(\d\.[0])?$/i;
        	var reg2=/^(\d\.[0]{2})?$/i;


			var hos_id = $('#text').val();
			var text_hide = $('#text_hide').val();
			var yl_money = $('#yl_money').val();
			var hc_money = $('#hc_money').val();
			if(!hos_id)
			{
				alert("请选择医院");
				return false;
			}
			else if( text_hide !== hos_id )
			{	
				alert("请填写正确的医院");
				return false;
			}

			else if(!isMoney(yl_money) || yl_money==0 || reg1.test(yl_money) || reg2.test(yl_money))
	        {
	            alert('手术回款额请输入数字');
	            $("#yl_money").focus();
	            return false; 
	        }

	        else if(!isMoney(hc_money) || hc_money==0 || reg1.test(hc_money) || reg2.test(hc_money))
	        {
	            alert('耗材回款额请输入数字');
	            $("#hc_money").focus();
	            return false; 
	        }
			else if(yl_money ||hc_money)
			{
				return true;
			}
			
			else
			{
				alert("请填写回款金额");
				return false;
			}

			
		}


		//检验金额
	    function isMoney(str)
	    {   
	        var reg=/^([1-9]\d*|0)(\.\d{1,2})?$/i;
	        if(reg.test(str))
	        {
	            return true;
	        }
	        else
	        {
	            return false;
	        }
	    }
	</script>	
</body>
</html>