//cookie js操作 
function SetCookie(name,value)//两个参数，一个是cookie的名子，一个是值
{
    var exp  = new Date();    //new Date("December 31, 9998");
    exp.setTime(exp.getTime() + 60*1000*60*24*30);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
 
function getCookie(name)//取cookies函数        
{
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return null;

}
function delCookie(name)//删除cookie
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}
//搜索记录-插入
function keyinsert(key){
    if(getCookie('keykey')==null){
        var keykey = new Array();
    }else{
        var keykey = getCookie('keykey').split('!!');
    }
    if(keykey.indexOf(key)=='-1'){
        keykey.unshift(key);
    }
    if(keykey.length>20){
        keykey.pop();
    }
    SetCookie('keykey',keykey);
}
//获取
function keyread(){
    if(getCookie('keykey')==null){
        return false;
    }else{
        var keykey = getCookie('keykey').split('!!');
    }
    return keykey;
}