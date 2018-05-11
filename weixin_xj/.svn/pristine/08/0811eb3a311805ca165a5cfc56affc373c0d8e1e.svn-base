function initCart(price,link,img,num){
    var h1 = '<div style="width: 100%;position: fixed;left: 0;bottom: 0;display:-webkit-box;"><span style="width:4rem;display:block;line-height:40px;font-size:14px;color:#666;background:#f1f1f1;text-align:center;">￥'+price+'元</span><a href="javascript:;" style="width:4rem;display:block;line-height:40px;font-size:14px;color:#fff;background:#efa34a;text-align:center;" onClick="fly()">加入购物车</a><a href="javascript:;" style="width:4rem;display:block;line-height:40px;font-size:14px;color:#fff;background:#ef4a65;text-align:center;">立即购买</a><img src="'+img+'" width="20px" id="img" class="fly" style="position:absolute;left:50%;bottom:10px;margin-left:-10px;z-index:-1;" /></div>';
    var h2 = '<a href="'+link+'" id="cart" style="position:fixed;bottom:60px;right:20px;background:url(/weixin/Public/Member/images/shoping/cart.png) no-repeat;background-size:cover;width:50px;height:50px;"><i style="position:absolute;top:-6px;right:0;width:16px;height:16px;background:#f30;border-radius:50%;text-align:center;color:#fff;line-height:16px;font-size:12px;font-style:normal;">'+num+'</i><input type="hidden" value="'+num+'" id="num" /></a>';
    $(document.body).append(h1);
    $(document.body).append(h2);
}

function fly(){
    var left = $('#cart').offset().left;
    if($('#img').hasClass('fly')){
        $('#img').animate({
            'left': left-20,
            'bottom': '150px',
        },function(){
            $(this).animate({
                'left': left+20,
                'bottom': '70px',
            },300,function(){
                $(this).css({
                    'left': '50%',
                    'bottom': '10px'
                }).addClass('fly');
                $('#num').val(parseInt($('#num').val())+1);
                $('#cart i').html(parseInt($('#num').val())>99?'···':$('#num').val())
            })
       });
    }
    $('#img').removeClass('fly');
}