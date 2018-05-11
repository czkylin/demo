if(window.localStorage){
        if(!window.localStorage.a) window.localStorage.a = 1;
        if(window.localStorage.a != 2){
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
            window.localStorage.a = 2;
        }
    })
    
    var mySwiper = new Swiper('#line',{
        speed: 800,
        slideActiveClass : 'sActive',
        pagination: '.spa',
    }); 