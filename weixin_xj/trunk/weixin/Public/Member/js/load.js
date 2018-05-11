function loadmore(page_num, url_str, list_id, fn) {
    current_page = $(page_num).text() - 1 + 1;
    if ($('.ui-jiazai').children('a').text() == "没有了") {
        return current_page;
    }
    $('.ui-jiazai').children('a').html('<div id="loading" class="loading"><i></i><i></i><i></i></div>');
    //$('.ui-jiazai').hide();
    //$('.loading').show();
    $.ajax({
        url: url_str
        , data: {
            "page_num": current_page
        }
        , type: "get"
        , async: true
        , dataType: "json"
        , success: function (data) {
            console.log(data);
            console.log(data.length);
            onOff = !onOff;
            $('.ui-jiazai').show();
            //数据大于0且第一个数据不为空
            if (data.length > 0 && data[0].trim() != "") {
                for (var i = 0; i < data.length; i++) {
                    $(list_id).append(data[i]);
                };
                current_page = current_page + 1;
                $(page_num).text(current_page);
                //数据长度大于4时
                if (data.length > 4) {
                    $('.ui-jiazai').show();
                    $('.empty_data').hide();
                    //$('.ui-jiazai').children('a').text('加载更多');
                }
                else {
                    //数据长度小于等于4时
                    $('.ui-jiazai').show();
                    $('.empty_data').hide();
                    $('.ui-jiazai').children('a').text('没有了');
                }
            }
            else {
                //$('#current_pagenum').html() == 1时直接出暂无数据的图片
                if (parseInt($('#current_pagenum').html()) == 1) {
                    $('#emptyData').show().html('<div class="empty_data" style="width: 100%;height: 100%;display: box;display: -webkit-box;-webkit-box-pack:center;-webkit-box-align: center; position:absolute;top:200px;left:0;right:0;bottom:0;"><div><div style="text-align:center; width:100px;height:100px; margin:0 auto;overflow:hidden;margin-bottom:10px;"><img src="/weixin/Public/Common/images/icon/empty.png" width="100%"  style="margin-top:-700px;"/></div><p style="text-align:center;font-size:12px;">暂无数据</p><br></div></div>');
                    $('.ui-jiazai').hide();
                }
                else {
                    //$('#current_pagenum').html() > 1 有数据自然滑动到末尾时
                    $('#emptyData').hide();
                    $('.ui-jiazai').children('a').text('没有了').show();
                }
                fn&&fn();
            }
            //alert($(page_num).text());
        }
        , cache: false
        , timeout: 5000
        , error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("数据加载失败，请重新加载，错误代码：" + XMLHttpRequest.readyState);
            $('.ui-jiazai').children('a').text('加载失败');
        }
    });
}