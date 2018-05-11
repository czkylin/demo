    $(function(){
        //1.楼梯什么时候显示，500px scroll--->scrollTop
        $(window).on('scroll',function(){
            var $scroll=$(this).scrollTop();
            if($scroll>=600){
                $('#loutinav').show();
            }else{
                $('#loutinav').hide();
            }

            if($scroll>=1){
                $('#top').show();
            }else{
                $('#top').hide();
            }

            //4.拖动滚轮，对应的楼梯样式进行匹配
            $('.louti').each(function(){
                var $loutitop=$('.louti').eq($(this).index()).offset().top+100;
                // console.log($loutitop);
                if($loutitop>$scroll){//楼层的top大于滚动条的距离
                    $('#loutinav li').removeClass('active');
                    $('#loutinav li').eq($(this).index()-2).addClass('active');
                    return false;//中断循环
                }
            });
        });

        //2.获取每个楼梯的offset().top,点击楼梯让对应的内容模块移动到对应的位置  offset().left
        var $loutili=$('#loutinav li').not('.last');
        $loutili.on('click',function(){
            $(this).addClass('active').siblings('li').removeClass('active');
            var $loutitop=$('.louti').eq($(this).index()+2).offset().top; //获取每个楼梯的offsetTop值
            $('html,body').animate({//$('html,body')兼容问题body属于chrome
                scrollTop:$loutitop
            })
        });

        //3.回到顶部
        $('#top').on('click',function(){
            $('html,body').animate({//$('html,body')兼容问题body属于chrome
                scrollTop:0
            });
        });
    })