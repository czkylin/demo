var data={
	"image":["../images/flower3.png","./love.png"]
},imgPath;

function draw(){
	var mycanvas=document.createElement('canvas');
	document.body.appendChild(mycanvas);
	var len=data.image.length;
	mycanvas.width=640;
	mycanvas.height=780;
  mycanvas.style.position = 'absolute';
  mycanvas.style.left = 0;
  mycanvas.style.top = 0;
	if(mycanvas.getContext){
		var context=mycanvas.getContext('2d');
		context.fillStyle='#fff';
		context.fillRect(0,0,mycanvas.width,mycanvas.height);
		var h=0;
		function drawing(num){
			if(num<len){
				var img=new Image;
				img.src=data.image[num];
        console.log(num);
				if(num==0){
					img.onerror=function(){
						context.fillStyle='#fff';
						context.stokeStyle='#dfdfdf';
						context.fillRect(20,20,100,100);
						context.strokeRect(20,20,100,100);
						context.font='24px 微软雅黑';
						context.textAlign='center';
						context.textBaseline='middle';
						context.fillStyle='#333';
						context.fillText('LOGO',70,70);
						drawing(num+1);
					}
					img.onload=function(){
						context.drawImage(img,20,20,100,100);
						drawing(num+1);
					}
				}else if(num==1){
					img.onerror=function(){
						h=140;
						drawing(num+1);
					}
					img.onload=function(){
						context.drawImage(img,0,140,mycanvas.width,300);
						h=440;
						drawing(num+1);
					}
				}else if(num==2){
					img.onload=function(){
						context.drawImage(img,55,h+20,240,240);
						drawing(num+1);
					}
				}
			}else{
				imgPath=mycanvas.toDataURL("image/jpeg");
				document.getElementsByTagName('img')[0].src=imgPath;
			}
		}
		drawing(0);
	}
  document.body.removeChild(mycanvas);
}
