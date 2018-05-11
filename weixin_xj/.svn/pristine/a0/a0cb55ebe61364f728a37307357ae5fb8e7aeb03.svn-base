if(window.localStorage){
        if(!window.localStorage.c) window.localStorage.c = 5;
        if(window.localStorage.c != 6){
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
            window.localStorage.c = 6;
        }
    })
    
    var mySwiper = new Swiper('#line',{
        speed: 800,
        slideActiveClass : 'sActive',
        pagination: '.spa',
    }); 