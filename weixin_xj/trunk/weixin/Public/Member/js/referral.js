window.onload = function(){ 
    (function(){
        $('img').click(function(){ 
            $('.bigImg').show();
            $('.bigImg').append('<img src="'+$(this)[0].src+'" alt=""/>');
        });
        $('.bigImg').click(function(){
            $(this).hide();
        });
    })();
}