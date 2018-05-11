//计算元素到顶点的距离
function toTop(obj){
    var h = 0;
    while(obj){
        h += obj.offsetTop;
        obj = obj.offsetParent;
    }
    return h;
}
//创建img标签
function createImg(obj){
    var src = '';
    if(obj.dataset.src){
        src = obj.dataset.src;
    }else{
        src = obj.getAttribute('data-src');
    }
    
    if(obj.children.length <= 1){
        obj.children[0].setAttribute('src',src);
    }
}
//透明度变化
function opacity(obj){
    obj.style.opacity = '1';
}

function lazy(obj,time){
    var t = document.documentElement.clientHeight + (document.body.scrollTop || document.documentElement.scrollTop);
    for(var i=0;i<obj.length;i++){
        if(t > toTop(obj[i])){
            setTimeout(opacity(obj[i]),time);
        }
    }
}

