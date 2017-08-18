var oUl = document.getElementById('list');
var aLi = oUl.getElementsByTagName('li');
var count = document.getElementById('count');
var priceCount = document.getElementById('priceCount');
var expensive = document.getElementById('expensive');

var jsonArray = [];
// fnCount ( aLi[0] );
for ( var i=0; i<aLi.length; i++ ) {
  fnCount ( aLi[i] );
}

// console.log(jsonArray);


function fnCount ( li ) {
  var aBtn = li.getElementsByTagName ('input');
  var oStrong = li.getElementsByTagName ('strong')[0];
  var oEm = li.getElementsByTagName ('em')[0];
  var oSpan = li.getElementsByTagName ('span')[0];
  var n = oStrong.innerHTML;			// '0'
  var price = parseFloat(oEm.innerHTML);			// 12.5

  aBtn[0].onclick = function () {
    var json = {};
    var countArray = parseFloat(count.innerHTML);
    var initNumber = 0;
    var initPriceCount = 0;
    var initExpensive = 0;
    var max = 0;
    if ( n > 0 ) {
      n--;
    }
    oStrong.innerHTML = n;
    oSpan.innerHTML = n*price + '元';
    json = {
      number: n,
      price: price,
      count: n*price
    }
    jsonArray.forEach(function(item, index) {
      if(item.price == json.price) {
        jsonArray[index] = json;
        if(item.number == 1) {
          jsonArray.splice(index, 1);
        }
      }
    })
    jsonArray.forEach(function(item, index) {
      initNumber += item.number;
      count.innerHTML = initNumber;
      initPriceCount += item.count;
      priceCount.innerHTML = initPriceCount;
      if(max < item.price) {
        max = item.price;
      }
      expensive.innerHTML = max;
    })
    if(jsonArray.length == 0) {
      count.innerHTML = 0;
      priceCount.innerHTML = 0;
      expensive.innerHTML = 0;
    }
    console.log(jsonArray);
  };
  aBtn[1].onclick = function () {
    var json = {};
    var countArray = parseFloat(count.innerHTML);
    var initNumber = 0;
    var initPriceCount = 0;
    var initExpensive = 0;
    var max = 0;
    n++;
    oStrong.innerHTML = n;
    oSpan.innerHTML = n*price + '元';
    json = {
      number: n,
      price: price,
      count: n*price
    }
    if(n == 1) {
      jsonArray.push(json);
    } else {
      jsonArray.forEach(function(item, index) {
        if(item.price == json.price) {
          jsonArray[index] = json;
        }
      })
    }
    jsonArray.forEach(function(item, index) {
      initNumber += item.number;
      count.innerHTML = initNumber;
      initPriceCount += item.count;
      priceCount.innerHTML = initPriceCount;
      if(max < item.price) {
        max = item.price;
      }
      expensive.innerHTML = max;
    })

    console.log(jsonArray);
  };
}
