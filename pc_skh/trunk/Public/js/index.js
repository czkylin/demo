var mySwiper = new Swiper ('.swiper-container8', {
  loop: true,
  mode: 'horizontal',
  observer: true,
  observerParents: true,
  pagination: '.swiper-pagination',
  paginationType : 'custom',
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  autoplay : 3000,
  autoplayDisableOnInteraction : false,
  paginationCustomRender: function (swiper, current, total) {
    var str = '';
    for(var i=1; i<=total; i++) {
      str +='<span class="swb"><strong></strong></span>';
    }
    return str;
  },
  onSlideChangeEnd: function(swiper) {
    var index = swiper.activeIndex;
    if(index == swiper.slides.length-1){ index = 1};
    setTimeout(function(){
      $('.swb')[index-1].classList.add('active');
    },2)
  }
})
var mySwiper1 = new Swiper ('.swiper-container1', {
  pagination: '.swiper-pagination1',
  nextButton: '.swiper-button-next1',
  prevButton: '.swiper-button-prev1',
  mode: 'horizontal',
  observer: true,
  observerParents: true,
  onSlideChangeEnd: function(swiper) {
    swiper.update();
    mySwiper.startAutoplay();
    mySwiper.reLoop();
  }
})
var mySwiper2 = new Swiper ('.swiper-container2', {
  loop: true,
  pagination: '.swiper-pagination2',
  nextButton: '.swiper-button-next2',
  prevButton: '.swiper-button-prev2',
})
var mySwiper3 = new Swiper ('.swiper-container3', {
  loop: true,
  pagination: '.swiper-pagination3',
  nextButton: '.swiper-button-next3',
  prevButton: '.swiper-button-prev3',
})
var mySwiper4 = new Swiper ('.swiper-container4', {
  pagination: '.swiper-pagination4',
  nextButton: '.swiper-button-next4',
  prevButton: '.swiper-button-prev4',
})
var mySwiper5 = new Swiper ('.swiper-container5', {
  pagination: '.swiper-pagination5',
  nextButton: '.swiper-button-next5',
  prevButton: '.swiper-button-prev5',
})
var mySwiper6 = new Swiper ('.swiper-container6', {
  pagination: '.swiper-pagination6',
  nextButton: '.swiper-button-next6',
  prevButton: '.swiper-button-prev6',
})
var mySwiper7 = new Swiper ('.swiper-container7', {
  pagination: '.swiper-pagination7',
  nextButton: '.swiper-button-next7',
  prevButton: '.swiper-button-prev7',
})
$('.swiper-slide1').mouseover(function(event) {
  $('.swiper-button-prev8').css('display', 'block');
  $('.swiper-button-next8').css('display', 'block');
});
$('.swiper-slide1').mouseout(function(event) {
  $('.swiper-button-prev8').css('display', 'none');
  $('.swiper-button-next8').css('display', 'none');
});
$('.swiper-button-prev').mouseover(function(event) {
  $('.swiper-button-prev').css('display', 'block');
  $('.swiper-button-next').css('display', 'block');
});
$('.swiper-button-next').mouseover(function(event) {
  $('.swiper-button-prev').css('display', 'block');
  $('.swiper-button-next').css('display', 'block');
});

$('.tab').bind('click', function(e) {
  var index = e.target.getAttribute('index');
  for(var i=0; i<$('.tab').children().length; i++) {
    $('.swiper-container0')[i].classList.remove('active');
    $('.tab').children()[i].classList.remove('active');
  }
  setTimeout(function() {
    $('.swiper-container0')[index].classList.add('active');
    showAjax(index);
    // console.log(arr);
  },2)
  $('.tab').children()[index].classList.add('active');
})

$('.picContent').hover(function(e) {
  $(this).addClass('active');
}, function() {
  $(this).removeClass('active');
});

$('.swiper-pagination8').bind('click', function(e) {
  for(var i=0; i<$('.swiper-pagination8 span').length; i++){
    $('.swiper-pagination8 span')[i].index = i;
  }
  if(e.target.nodeName == 'SPAN') {
    var index = e.target.index;
    mySwiper.slideTo(index+1, 1000, false);
  }
})