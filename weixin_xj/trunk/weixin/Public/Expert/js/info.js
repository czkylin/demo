$('.dataList li').click(function(){
    var name = $(this).data('name');
    
    switch(name){
        case 'sex': 
            $('#opacity').addClass('show');
            $('#ns').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;
        /*case 'bir':
            $('#opacity').addClass('show');
            $('#bir').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;*/
        /*case 'position':
            $('#opacity').addClass('show');
            $('#zc').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;*/
        /*case 'city':
            $('#opacity').addClass('show');
            $('#city').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;*/
        case 'start':
            $('#opacity').addClass('show');
            $('#w1').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;
        case 'end':
            $('#opacity').addClass('show');
            $('#w2').addClass('return');
            $('html,body').height('100%');
            $('html,body').css('overflow','hidden');
            break;
        case 'talk':
            window.location = '/weixin/Application/Expert/View/htm/talk.htm';
            break;
        default: 
            $(this).find('input').focus();
            break;
    }
});

$('#opacity').click(function(){
    $(this).removeClass('show');
    $('html,body').css('overflow','');
    $('.return').removeClass('return');
});

$('.confirm').each(function(){
    var name = $(this).parent().data('name');
    $(this).find('a').click(function(){
        $('#opacity').removeClass('show');
        switch(name){
            case 'nn':
                var val = $('#s7 .slideActive').html();
                $('#sex').html(val).attr('value',val);
                break;
            /*case 'zc':
                var val = $('#s8 .slideActive').html();
                $('#pos').html(val).attr('value',val);
                break;*/
            case 'w1':
                var val = $('#s9 .slideActive').html()+':'+$('#s10 .slideActive').html();
                $('#start').html(val).attr('value',val);
                break;
            case 'w2':
                var val = $('#s11 .slideActive').html()+':'+$('#s12 .slideActive').html();
                $('#end').html(val).attr('value',val);
                break;
        }
        $('html,body').css('overflow','');
        $('.return').removeClass('return');
    })
})