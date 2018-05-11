if(window.localStorage){
        if(!window.localStorage.d) window.localStorage.d = 7;
        if(window.localStorage.d != 8){
            $('#line').show();
        }else{
            $('#line').hide();
        }
    }

    $('.experience').click(function(){
        $('#line').fadeOut();
    });

    /*$('.hide').click(function(){
        window.localStorage.a = 2;
        $('#line').fadeOut();
    })*/
    
    $('#noShow').change(function(){
        if($(this).is(':checked')){
            window.localStorage.d = 8;
        }
    })
    
    var mySwiper = new Swiper('#line',{
        speed: 800,
        slideActiveClass : 'sActive',
        pagination: '.spa',
    }); 