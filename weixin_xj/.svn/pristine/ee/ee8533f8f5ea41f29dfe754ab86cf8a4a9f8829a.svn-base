$('.biaoti li').click(function(){
			var n2=$(this).index();
			$(this).addClass('current').siblings().removeClass('current')
			$('.switch_con ul').eq(n2).show().siblings().hide();
			})
	$(function(){
		$('.sear').children('span').click(function(){
			var iH = $('body').height() - $(".ui-search").height() -$(".hos_search").height();	
			$(this).siblings('.tiaojian').toggle();
			$(this).siblings(".sear-bg").css('height',iH).toggle();		 
			$(this).parents('.sear').siblings().children('.tiaojian').slideUp();
			$(this).parents('.sear').siblings().children('.sear-bg').hide();
		})

		$('.tiaojian').children('a').click(function(){
			var a_val=$(this).html();
			$(this).parent().siblings('span').children('b').text(a_val);
			$(this).addClass('red_bot').siblings().removeClass('red_bot');
			$('.tiaojian').delay(3000).hide();
			$(".sear-bg").hide();
			$('.sear').children('span').children('i').removeClass('top_bg');
			})
	})	
	/*预约时间选择*/
	$('.index_list_img label').eq(0).addClass('curr');

	$(function(){
		$('.index_list_img label').click(function(){
			$(this).addClass('curr');
			$(this).siblings().removeClass('curr');
		})
	})