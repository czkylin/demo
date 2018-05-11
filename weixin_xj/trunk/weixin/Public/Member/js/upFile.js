/* 上传图片 */ 
    window.onload = function(){ 
        //上传图片
        (function(){
           var input = document.getElementById("fileInput");   
            var result,div;
            if(typeof FileReader==='undefined'){   
                result.innerHTML = "抱歉，你的浏览器不支持 FileReader";   
                input.setAttribute('disabled','disabled');   
            }else{   
                input.addEventListener('change',readFile,false);   
            }
            function readFile(){   
                for(var i=0;i<this.files.length;i++){   
                    if (!input['value'].match(/.jpg|.gif|.png|.bmp/i)){　　//判断上传文件格式   
                        return alert("上传的图片格式不正确，请重新选择")　　　　　　　　　
                      }   
                    var reader = new FileReader();   
                    reader.readAsDataURL(this.files[i]);   
                    reader.onload = function(e){
                        result = '<img src="'+this.result+'" alt=""/>';   
                        em = document.getElementById('myImg');   
                        em.innerHTML = result;
                    }   
                }   
            }  
        })(); 
    }