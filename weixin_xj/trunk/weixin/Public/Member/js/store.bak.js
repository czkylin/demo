$(function(){
	/*点击智能排序到地区到筛选*/
	$('.sear').children('span').click(function(){ 
		
		$('.box').show();
		$(this).children('i').addClass('top_bg');
		$(this).siblings('.tiaojian').slideToggle('slow');
		$(this).siblings('.diqu').slideToggle('slow');
		$(this).parents('.sear').siblings().children('.tiaojian').slideUp('slow');
		})

	
	$('.tiaojian').children('a').click(function(){
		var a_val=$(this).html();
		$(this).parent().siblings('span').children('b').text(a_val);
		
		$(this).addClass('red_bot').siblings().removeClass('red_bot');
		$('.tiaojian').delay(3000).hide();
		$('.sear').children('span').children('i').removeClass('top_bg');
		})
	$('.diqu').children('div').children('a').click(function(){
		var a_val=$(this).html();
		$(this).parent().parent().siblings('span').children('b').text(a_val);
		
		$(this).addClass('red_bot').siblings().removeClass('red_bot');
		$('.diqu').delay(3000).hide();
		$('.sear').children('span').children('i').removeClass('top_bg');
	
		})

	
	
	$('.sear').click(function(){
		$('.sear').children('span').children('i').removeClass('top_bg');
	    $(this).children('span').children('i').addClass('top_bg');
		})	
	
	
	$('.box').click(function(){
		$('.sear').children('.tiaojian').hide();
		})
		
		
		
/*搜索店铺或宝贝*/		
	$('.baobei').children('span').click(function(){

		$(this).siblings('.two').show();
		$(this).parents('.baobei').siblings().children('.tiaojian').hide();
		})

	$('.two').children('a').click(function(){
		var a_val=$(this).html();
		$(this).parent().siblings('span').children('b').text(a_val);
		
		$('.two').delay(3000).hide();
		$('.baobei').children('span').children('i').removeClass('top_bg');
		})

/*选择分类*/			
	$('.xuanze').children('a.fenlei').click(function(){
		$(this).siblings('.fenlei_con').toggle();
		})
		
	$('.fenlei_con li').children('a').click(function(){
		$(this).parents('.fenlei_con').hide();
		})	
		
/*三个参数TAB*/
$('.three_canshu li').click(function(){
		$(this).addClass('curr').siblings().removeClass('curr');
		var ww=$(this).index();
		$('.qiehuan>div').eq(ww).addClass('xianshi').siblings().removeClass('xianshi');
	});	
	
/*选择颜色*/	
$('.index_list_img label').click(function(){
		$(this).addClass('curr');
		$(this).siblings().removeClass('curr');
				})	
				

/*点击购物车编辑*/				
//$('.bianji').click(function(){
//		$(this).parents().parents().siblings().children().children('.yin').toggleClass('curr');
//		 if($(this).text()=='编辑'){
//					$(this).text('完成');
//				}else{
//				   $(this).text('编辑');
//				}                            
//	});	
//						
		
})





 $(function(){
	 
	 
	 

				//遍历循环购物车商品数量
				
				$('.ul_car li').each(function(){
					
                    $(this).find('.btn-reduce').click(function(){
						
					var $val= $(this).siblings('input.text').val();
					
						if($val<=1){
							
							$(this).siblings('input.text').val('1');
					
							}else{
								
							$val--;
							
							$(this).siblings('input.text').val($val);
								
								}
						})
						
					$(this).find('.btn-add').click(function(){
						var $val= $(this).siblings('input.text').val();
						        $val++;
							$(this).siblings('input.text').val($val);	
								
						})
                });
			
				//选择商品添加类
				$('.ul_car li.yaodian .xuan label').click(function(){
			
					if($(this).hasClass('curr')){   
					 //如果药店已经被选中，则商品全部不选
						
					var $curr_all=$('.experts').find('.curr').length;
					var $li_all=$('.experts').find('li').length;
					
					if($curr_all==$li_all){
						$('.quanxuan label').removeClass('curr');
					
					}
					
					$(this).removeClass('curr');
					$(this).parent('.xuan').parent('.yaodian').siblings('li').children('.xuan').children('label').removeClass('curr');

					}else{   
					 //如果药店没有被选中，则商品全部选中
					$(this).addClass('curr');
					$(this).parent('.xuan').parent('.yaodian').siblings('li').children('.xuan').children('label').addClass('curr');
					
					var $curr_all=$('.experts').find('.curr').length;
					var $li_all=$('.experts').find('li').length;
					
					if($curr_all==$li_all){
					$('.quanxuan label').addClass('curr');
					}	
					}
					
						
				})	
					
				$('.ul_car li.yaodian').siblings('li').children('.xuan').children('label').click(function(){
					//点击商品的时候
	
						if($(this).hasClass('curr')){//如果此商品被选中
							
						var $curr_all=$('.experts').find('.curr').length;
						var $li_all=$('.experts').find('li').length;
						
						if($curr_all==$li_all){
						$('.quanxuan label').removeClass('curr');
						}							
						
							var $len2=$(this).parent('.xuan').parent('li').parent('ul').find('.curr').length;
							var $len3=$(this).parent('.xuan').parent('li').parent('ul').children('li').length;
							
							if($len2==$len3){//所有商品被选中，药店不选，商品也全部不选

								$(this).removeClass('curr');
								$(this).parent('.xuan').parent('li').siblings('li.yaodian').children('.xuan').children('label').removeClass('curr');

								}else{
								$(this).removeClass('curr');
									}

						}else{//如果此商品没有被选中

							var $len2=$(this).parent('.xuan').parent('li').parent('ul').find('.curr').length;
							var $len3=$(this).parent('.xuan').parent('li').parent('ul').children('li').length-2;
							
							if($len2==$len3){//点击的此商品之外的所有商品都选中，则此商品被选中，药店也选中
								$(this).addClass('curr');
								$(this).parent('.xuan').parent('li').siblings('li.yaodian').children('.xuan').children('label').addClass('curr');
								
															
								var $curr_all=$('.experts').find('.curr').length;
								var $li_all=$('.experts').find('li').length;
								
								if($curr_all==$li_all){
								$('.quanxuan label').addClass('curr');
								}	
								
								
								}else{
								$(this).addClass('curr');
									}
							}
						})
						

	
	
	$('.quanxuan label').click(function(){
	
		if($(this).hasClass('curr')){
			$(this).removeClass('curr');
			
			$('.ul_car li label').removeClass('curr');
			
			}else{
			$(this).addClass('curr');	
			$('.ul_car li label').addClass('curr');
				}
});

			
					
})