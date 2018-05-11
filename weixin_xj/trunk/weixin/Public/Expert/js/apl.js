$('.ops li').click(function(){
    var name = $(this).data('name');
    
    switch(name){
        case 'hosiptal': 
            $('#opacity').addClass('show');
            $('#hosiptal').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;
        case 'type':
            $('#opacity').addClass('show');
            $('#type').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;
        case 'province':
            $('#opacity').addClass('show');
            $('#province').addClass('return');
            break;
        case 'city':
            $('#opacity').addClass('show');
            $('#city').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;
    }
});

$('#opacity').click(function(){
    $(this).removeClass('show');
    switch($('.return').data('name')){
        case 'hosiptal':
            $('.ops li[data-name="hosiptal"]').find('strong').html($('#hosiptal .slideActive').html()).attr('value',$('#s6 .slideActive').attr('value'));
            break;
        case 'type':
            $('.ops li[data-name="type"]').find('strong').html($('#type .slideActive').html()).attr('value',$('#s4 .slideActive').attr('value'));
            break;
        case 'province':
            $('.ops li[data-name="province"]').find('strong').html($('#province .slideActive').html()).attr('value',$('#s0 .slideActive').attr('value'));
            //获取市
            $.ajax({
                type: "POST", 
                url: "/weixin/index.php?m=Expert&c=Declare&a=city_list", 
                data: "province_id="+$('#s0 .slideActive').attr('value'),
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                },
                success: function (msg){
                    $('.ops li[data-name="city"],.ops li[data-name="hosiptal"]').find('strong').html('');
                    $('#s5 .swiper-wrapper').html('');//追加市内容
                    $('#s5 .swiper-wrapper').append(msg);//追加市内容
                }
            });
            break;
        case 'city':
            $('.ops li[data-name="city"]').find('strong').html($('#city .slideActive').html());
            //获取医院
            $.ajax({
                type: "POST", 
                url: "/weixin/index.php?m=Expert&c=declare&a=hos_list", 
                data: "city_id="+$('#s5 .slideActive').attr('value'),
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                },
                success: function (msg){
                    $('.ops li[data-name="hosiptal"]').find('strong').html('');
                    $('#s6 .swiper-wrapper').html('');//追加市内容
                    $('#s6 .swiper-wrapper').append(msg);//追加市内容
                }
            });
            break;
        case 'date':
            $('.ops li[data-name="date"]').find('strong').html($('#s1 .slideActive').html()+$('#s2 .slideActive').html()+$('#s3 .slideActive').html()).attr('value',parseInt($('#s1 .slideActive').html())+'-'+parseInt($('#s2 .slideActive').html())+'-'+parseInt($('#s3 .slideActive').html()));
            break;
    }
    $('html,body').css('overflow','');
    $('.return').removeClass('return');
});

$('#explain i,#explain a').click(function(){
    $('html,body').css('overflow','');
    $('#opacity').removeClass('show');
    $('.return').removeClass('return');
});

$('.agreement span').click(function(){
    $('#opacity').addClass('show');
    $('#explain').addClass('return');
    $('html,body').height('100%');
    $('html,body').css('overflow','hidden');
});

$('#num').click(function(){
    $('body,html').animate({scrollTop:'500px'});
});
