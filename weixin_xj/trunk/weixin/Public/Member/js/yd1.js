if(window.localStorage){
        if(!window.localStorage.b) window.localStorage.b = 3;
        if(window.localStorage.b != 4){
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
            window.localStorage.b = 4;
        }
    })
    
    var mySwiper = new Swiper('#line',{
        speed: 800,
        slideActiveClass : 'sActive',
        pagination: '.spa',
    }); 