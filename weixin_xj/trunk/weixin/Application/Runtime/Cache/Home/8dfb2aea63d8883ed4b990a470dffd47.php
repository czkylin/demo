<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>VIP卡服务</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="/weixin/Public/Home/css/zhengcejiedu/swiper.min.css">

    <!-- Demo styles -->
    <style>
html, body { position: relative; height: 100%; }
body { background: #eee; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 14px; color: #000; margin: 0; padding: 0; }
img{ width:100%; padding:0; margin:0; height:100%;}
.swiper-container { width: 100%; height: 100%; }
.swiper-slide { text-align: center; font-size: 18px; background: #fff; /* Center slide text vertically */
display: -webkit-box; display: -ms-flexbox; display: -webkit-flex; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; -webkit-justify-content: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; -webkit-align-items: center; align-items: center; }
</style>
    </head>
    <body>
<!-- Swiper -->
<div class="swiper-container">
        <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/weixin/Public/Home/images/shouce/caiye/cy01.jpg"></div>
        <div class="swiper-slide"><img src="/weixin/Public/Home/images/shouce/caiye/cy02.jpg"></div>
        <div class="swiper-slide"><img src="/weixin/Public/Home/images/shouce/caiye/cy03.jpg"></div>
        <div class="swiper-slide"><img src="/weixin/Public/Home/images/shouce/caiye/cy04.jpg"></div>
    </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

<!-- Swiper JS --> 
<script src="/weixin/Public/Home/js/swiper.min.js"></script> 

<!-- Initialize Swiper --> 
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true
    });
    </script>
</body>
</html>