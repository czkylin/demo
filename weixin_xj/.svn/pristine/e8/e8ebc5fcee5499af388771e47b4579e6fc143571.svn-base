if(window.localStorage){
        if(!window.localStorage.e) window.localStorage.e = 9;
        if(window.localStorage.e != 10){
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
            window.localStorage.e = 10;
        }
    })
    
    var mySwiper = new Swiper('#line',{
        speed: 800,
        slideActiveClass : 'sActive',
        pagination: '.spa',
    }); 