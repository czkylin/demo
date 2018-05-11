var onoff = document.getElementsByClassName('onOff');
var ll = document.getElementsByClassName('sList');
var arr1 = [];
var arr2 = [];
var index = 0;

for(var i=0;i<onoff.length;i++){
    arr1.push(onoff[i]);
}
for(var i=0;i<ll.length;i++){
    arr2.push(ll[i].getElementsByTagName('a')[0]);
}
arr1.forEach(function(v,i){
    v.onclick = function(){
        if(this.className == 'onOff active'){
            this.className = 'onOff';
            this.dataset.on = false;
            switch(this.dataset.index){
                case 'serve':
                    this.parentElement.nextElementSibling.className = 'slider other';
                    return false;
                    break;
                case 'price': this.parentElement.previousElementSibling.getElementsByTagName('a')[0].className = '';
                    break;
            }
        }else{
            this.className = 'onOff active';
            this.dataset.on = true;
            switch(this.dataset.index){
                case 'serve':
                    this.parentElement.nextElementSibling.className = 'slider other slidedown';
                    return false;
                case 'price': this.parentElement.previousElementSibling.getElementsByTagName('a')[0].className = 'active';
                    break;
            }
        }
    }
});

arr2.forEach(function(v,i){
    v.onclick = function(){
        if(this.className == 'active'){
            index = this.dataset.p;
            document.getElementById('opacity').className = 'opacity show';
            document.querySelector('.dWrap').className = 'dWrap return';
        }
    }
});

document.querySelector('.confirm a').onclick = function(){
    
    switch(index){
        case '0':
            document.getElementById('v1').value = document.getElementById('p1').innerHTML = parseFloat(document.querySelector('#s11 .slideActive').innerHTML+document.querySelector('#s12 .slideActive').innerHTML+document.querySelector('#s13 .slideActive').innerHTML);
            break;
        case '1':
            document.getElementById('v2').value = document.getElementById('p2').innerHTML = parseFloat(document.querySelector('#s11 .slideActive').innerHTML+document.querySelector('#s12 .slideActive').innerHTML+document.querySelector('#s13 .slideActive').innerHTML);
            break;
        case '2':
            document.getElementById('v3').value = document.getElementById('p3').innerHTML = parseFloat(document.querySelector('#s11 .slideActive').innerHTML+document.querySelector('#s12 .slideActive').innerHTML+document.querySelector('#s13 .slideActive').innerHTML);
            break;
    }
    document.getElementById('opacity').className = 'opacity';
    document.querySelector('.dWrap').className = 'dWrap';
}

document.getElementById('opacity').onclick = function(){
    document.getElementById('opacity').className = 'opacity';
    document.querySelector('.dWrap').className = 'dWrap';
}