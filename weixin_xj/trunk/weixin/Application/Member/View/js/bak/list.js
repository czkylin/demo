$('.biaoti li').click(function(){
			var n2=$(this).index();
			$(this).addClass('current').siblings().removeClass('current')
			$('.switch_con ul').eq(n2).show().siblings().hide();
			})
				
			
	$(function(){
		$('.sear').children('span').click(function(){
			$(this).children('i').addClass('top_bg');
			$(this).siblings('.tiaojian').toggle();
		 
			$(this).parents('.sear').siblings().children('.tiaojian').hide();
			})
		$('.no_tab').click(function(){
		 
			})
		$('.tiaojian').children('a').click(function(){
			var a_val=$(this).html();
			$(this).parent().siblings('span').children('b').text(a_val);
			$(this).addClass('red_bot').siblings().removeClass('red_bot');
			$('.tiaojian').delay(3000).hide();
		 
			$('.sear').children('span').children('i').removeClass('top_bg');
			})
		$('.sear').click(function(){
			$('.sear').children('span').children('i').removeClass('top_bg');
			$(this).children('span').children('i').addClass('top_bg');
			})
			
			
	})


			

	
	
	/*预约时间选择*/
	
	$(function(){
	$('.index_list_img label').click(function(){
		$(this).addClass('curr');
		$(this).siblings().removeClass('curr');
				})
		
	})