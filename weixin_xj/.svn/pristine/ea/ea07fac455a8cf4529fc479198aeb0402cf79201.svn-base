function loadmore(page_num, url_str, list_id)
{
	current_page = $(page_num).text() - 1 + 1;
	if ($('.ui-jiazai').children('a').text() == "没有了")
	{
		return current_page;
	}
	
	$('.ui-jiazai').children('a').text('加载中');
	
	$.ajax({
	url : url_str,
	data:{"page_num":current_page},
	type: "get",
	async: true,
	dataType: "json",
	success:function(data)
	{  
        console.log(data[0]);
        //onOff = !onOff;
		if (data != "")
		{
			for (var i = 0; i<data.length; i++) 
			{
				$(list_id).append(data[i]).children(":last").fadeOut(0).delay(i*100).fadeIn(500);
			};
			current_page = current_page + 1;
			$(page_num).text(current_page);

			if (data.length > 4)
			{
				//$('.ui-jiazai').children('a').text('加载更多');
			}
			else
			{
				$('.ui-jiazai').children('a').text('没有了');
			}
		}
		else
		{
            $('.addm').hide();
			 //$('.ui-jiazai').children('a').text('没有了');
		}
		//alert($(page_num).text());
	},
	cache: false,
	timeout: 5000,
	error: function(XMLHttpRequest, textStatus, errorThrown) {
		alert("数据加载失败，请重新加载，错误代码：" + XMLHttpRequest.readyState);
		$('.ui-jiazai').children('a').text('加载失败');
	}
	});

}