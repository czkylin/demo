var loadImg = function(pics, callback){
    var index = 0;
    var len = pics.length;
    var img = new Image();
    var progress = function(w){
      $('.loading-progress').animate({height:w}, 100, 'linear', function(){
            $(".loading-num span").html(w);
        });
    }
    var load = function(){
        img.src = pics[index];
        img.onload = function() {
            progress(Math.floor(((index + 1) / len) * 100) + "%");
            index ++ ;
            if (index < len) {
                load();
            }else{
                callback()
            }
        }
        return img;
    }
    if(len > 0){
        load();
    }else{
        progress("100%");
    }
    return {
        pics: pics,
        load: load,
        progress: progress
    };
};

