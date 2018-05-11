<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>我的工作室</title>
    <link rel="stylesheet" href="/weixin/Public/Expert/css/zhengcejiedu/mbase.min.css">
    <link rel="stylesheet" href="/weixin/Public/Expert/css/zhengcejiedu/icon.css">
    <link rel="stylesheet" href="/weixin/Public/Expert/css/zhengcejiedu/icons.css">
    <link rel="stylesheet" href="/weixin/Public/Expert/css/zhengcejiedu/sweetalert.css">
    <link href="/weixin/Public/Common/css/commonIcon/icon.css" type="text/css" rel="stylesheet" >
    <link href="/weixin/Public/Common/css/commonFooter/footer.css" type="text/css" rel="stylesheet">
    <style>
        header { border-width: 0px; }
        .head_top ol li a{font-size:0.12rem;}
    </style>
    <script>
        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/3 + 'px';
    </script>
    </head>
    <body class="mine">
    <header id="header" class="myPic">
            <div class="headImg">
                <?php if($bandCode == 6): ?><!--关注未注册  女孩头像  链接 去注册 begin--> 
                            <a href="/weixin/index.php?m=Expert&c=User&a=band_phone"><img src="/weixin/Public/Expert/images/yonghu/girl.png" /></a> 
                            <!--关注未注册  女孩头像  end--> 
                            
                            <!--判断出男女 未认证  链接是去认证-->
                            <?php elseif(($data['EXPERT_SEX'] == '未填写') && ($data['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?>
                            <a href="/weixin/index.php?m=Expert&c=User&a=zhuce">
                            <img src="/weixin/Public/Expert/images/yonghu/girl.png" />
                            </a>
                            <?php elseif(($data['EXPERT_SEX'] == '男') && ($data['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?>
                            <a href="/weixin/index.php?m=Expert&c=User&a=zhuce">
                            <img src="/weixin/Public/Expert/images/yonghu/boy.png" />
                            </a>
                            <?php elseif(($data['EXPERT_SEX'] == '女') && ($data['SMALL_PIC'] == '/weixin/Application/Expert/View/images/dtdoctor.png')): ?>
                            <a href="/weixin/index.php?m=Expert&c=User&a=zhuce">
                            <img src="/weixin/Public/Expert/images/yonghu/girl.png" />
                            </a> 
                            <!--判断出 认证且通过审核  自己的头像  需要后台审核后头像采用  链接为个人设置-->
                            <?php else: ?>
                            <a href="<?php echo U('Expert/User/setting','flag=1');?>"><img src="<?php echo ($data["SMALL_PIC"]); ?>" /></a><?php endif; ?>
                <!--<?php if($code == 1): ?><i class="icon sus">&#xf604;</i><?php endif; ?>

        <?php if($code == 0): ?><i class="ino">未认证</i><?php endif; ?>
        
        <?php if($bandCode == 6): ?><i class="ino">未注册</i><?php endif; ?>--> 
                
        </div>
            <h2 class="text-center">hi,
                <?php if($data['EXPERT_NAME'] == ''): ?>您好
                            <?php elseif($data['EXPERT_NAME'] == '000000000'): ?>
                            游客
                            <?php else: ?>
                            <?php echo ($data["EXPERT_NAME"]); endif; ?>
                <br>
                <span><?php echo ($data["LINK_MOBILE"]); ?></span> </h2>
            <nav class="head_top">
                <ol>
                            <li> <a href="#">学习:<?php echo ($total); ?>h</a> <strong></strong> </li>
                            <li> <a href="#">经验:<?php echo ($jy_total); ?>分</a> <strong></strong> </li>
                            <li> <a href="<?php echo U('Expert/User/jifen_list');?>" class="ques">积分:
                                        <?php echo ($jifen['JIFEN_NUM']); ?>
                                    </a> <strong> </strong> </li>
                    </ol>
        </nav>
            <?php if($code == 1): ?><a href="<?php echo U('Expert/User/setting','flag=1');?>" class="setting icon">&#xf634;</a><?php endif; ?>
            <?php if($code != 1): ?><a href="<?php echo U('Expert/User/setting','flag=0');?>" class="setting icon">&#xf634;</a><?php endif; ?>
    </header>
<article id="page" class="order">
            <section class="iList">
                <ul>
                    <li> <a href="<?php echo U('Expert/Consult/consult_list');?>" data-level="2"> <em> <i class="ui-icon-comment"></i> <span>我的咨询</span> </em> </a> </li>
                    <li> <a href="index.php?m=Expert&c=Member&a=member_list" data-level="2"> <em> <i class="ui-icon-patient"></i> <span>我的患者</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Expert/Order/order_list');?>" data-level="2"> <em> <i class="ui-icon-dd"></i> <span>我的订单</span> </em> </a> </li>
                </ul>
                <ul>
        			<li> <a href="<?php echo U('Expert/Payment/mypayment');?>" data-level="2"> <em> <i class="ui-icon-shouru"></i> <span>我的收入</span> </em> </a> </li>
                    
                    <?php if($cf_kt_zt["CF_KT_FLAG"] == 1): ?><li > <a href="<?php echo U('User/sfcf');?>" data-level="2"> <em> <i class="ui-icon-recipe"></i> <span>电子处方</span> </em> </a> </li>
                        <li > <a href="<?php echo U('Cf/cf_list');?>" data-level="2"> <em> <i class="ui-icon-dd"></i> <span>处方列表</span> </em> </a> </li>
                    <?php else: ?>   
                        <li > <a href="javascript:alert('您暂无权限！')" data-level="2"> <em> <i class="ui-icon-recipe"></i> <span>电子处方</span> </em> </a> </li> 
                        <li > <a href="javascript:alert('您暂无权限！')" data-level="2"> <em> <i class="ui-icon-dd"></i> <span>处方列表</span> </em> </a> </li><?php endif; ?>
                </ul>
                <ul>
                    <li> <a href="<?php echo U('Expert/Doc/phb_list');?>" data-level="2"> <em> <i class="ui-icon-rank"></i> <span>积分排行</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Expert/User/expand');?>" data-level="2"> <em> <i class="ui-icon-code"></i> <span>推荐医生</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Expert/User/doc_yard');?>" data-level="2"> <em> <i class="ui-icon-code"></i> <span>推荐患者</span> </em> </a> </li>
                </ul>
                <ul>
                    <li> <a href="<?php echo U('Expert/User/zhuce',array('flag'=>1,"openid"=>$openid));?>" data-level="2"> <em> <i class="ui-icon-zhengshu" ></i> <span>我的证书</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Expert/Share/share_list');?>" data-level="2"> <em> <i class="ui-icon-fx"></i> <span>医生分享</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Expert/Unexp/lect_list');?>" data-level="2"> <em> <i class="ui-icon-plan"></i> <span>千县万医</span> </em> </a> </li>
                </ul>
                <ul>
                    <li> <a href="<?php echo U('Jd/jd_list?type_id=88');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>联盟头条</span> </em> </a> </li>
                    <!-- <?php echo U('Doc/doc_team');?> -->
                    <li> <a href="<?php echo U('Jd/jd_list?type_id=82');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>病例展示</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Expert/User/download');?>" data-level="2"> <em> <i class="ui-icon-comment"></i> <span>加入联盟</span> </em> </a> </li>
                </ul>
                <ul>
                    <li> <a href="<?php echo U('Jd/hdyg_list');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>活动会议</span> </em> </a> </li>
                    <!-- <?php echo U('Doc/doc_team');?> -->
                    <li> <a href="<?php echo U('Doc/doc_team');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>医生集团</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Expert/Jtys/member_list');?>" data-level="2"> <em> <i class="ui-icon-comment"></i> <span>家庭医生</span> </em> </a> </li>
                </ul>
                <ul>
                    <li> <a href="<?php echo U('Declare/apply_list');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>申请手术</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Declare/myapply_list');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>申请记录</span> </em> </a> </li>
                    <li><a href="<?php echo U('Expert/User/yd_list');?>" data-level="2"> <em> <i class="ui-icon-comment"></i> <span>我的药店</span> </em></a></li>
                </ul>
                <ul>
                    <li> <a href="<?php echo U('Fuwu/fuwu_list');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>我的预约</span> </em> </a> </li>
                    <li> <a href="<?php echo U('Baibei/share_init');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>百倍爱心卡宣传</span> </em> </a> </li>
                    <li> <a href="http://weixin.yk2020.com/appdown/xj/expert/download.aspx" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>APP下载</span> </em> </a> </li>
                    <!-- <li> <a href="<?php echo U('Baibei/money_list');?>" data-level="2"> <em> <i class="ui-icon-meet"></i> <span>我的营业额</span> </em> </a> </li> -->
                </ul>
                <ul>
                    <li>
                        <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=<?php echo C('M_APPID');?>&redirect_uri=http%3a%2f%2fwx-heartorg.yk2020.com%2fweixin%2findex.php%3fm%3dMember%26c%3dOrder%26a%3dxdyp%26d_openid%3d<?php echo ($openid); ?>&response_type=code&scope=snsapi_base&state=1" data-level="2">
                            <em> <i class="ui-icon-yue"></i> <span>心电阅片</span> </em>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Order/xdyp_list');?>" data-level="2">
                            <em> <i class="ui-icon-details"></i> <span>阅片包月</span> </em>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Referral/referral');?>" data-level="2">
                            <em> <i class="ui-icon-details"></i> <span>转诊申请</span> </em>
                        </a>
                    </li>
                    
                </ul>
                <ul>
                    <li  onClick="referral_dlist('<?php echo ($referral_aut['REFE_FLAG']); ?>')">
                        <a href="javascript:;" data-level="2">
                            <em> <i class="ui-icon-details"></i> <span>转诊申请审核</span> </em>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Referral/referral_list');?>" data-level="2">
                            <em> <i class="ui-icon-details"></i> <span>转诊申请列表</span> </em>
                        </a>
                    </li>
                </ul>
               
        </section>
    </article>
<!-- 传值 -->
<input type="hidden" id="data_code" value="<?php echo ($code); ?>" />
<input type="hidden" id="data_bandCode" value="<?php echo ($bandCode); ?>" />
<div class="clear"></div>
<div style="height:80px;"></div>
<!--底部 开始-->
<div class="footer"> 
    <a href="<?php echo U('Unexp/lect_list');?>"><span class="ui-icon-home2"></span><h2>千县万医</h2></a>
    <a href="<?php echo U('Jd/hdyg_list');?>"><span class="ui-icon-horn"></span><h2>活动预告</h2></a>
    <a href="<?php echo U('Jd/wjhd_list');?>"><span class="ui-icon-unscramble"></span><h2>活动会议</h2></a>
    <a href="<?php echo U('Expert/User/mywork_house');?>"><span class="ui-icon-book"></span><h2>我的工作室</h2></a>
</div>
<!--底部 结束--> 
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script> 
<script>
	var shouye = $("#over_footer .over_footer_shouye"), 
		zixun = $("#over_footer .over_footer_huanzhe"),
		yuepian = $("#over_footer .over_footer_pengyou"), 
		dingdan_dd = $("#over_footer .over_footer_dingdan_dd"), 
		geren = $("#over_footer .over_footer_geren");
	$(function(){
		if(over_footer==1){
			shouye.removeClass("over_footer_shouye").addClass("over_footer_shouye_on");
		};
		if(over_footer==2){
			zixun.removeClass("over_footer_huanzhe").addClass("over_footer_huanzhe_on");
		};
		if(over_footer==3){
			yuepian.removeClass("over_footer_pengyou").addClass("over_footer_pengyou_on");
		};
		if(over_footer==4){
			dingdan_dd.removeClass("over_footer_dingdan_dd").addClass("over_footer_dingdan_dd_on");
		};
		if(over_footer==5){
			geren.removeClass("over_footer_geren").addClass("over_footer_geren_on");
		}
	}) 
</script>
<script>
    function showmsg(){
        $('#msg').show();
        $('#msg').html('栏目正在建设中，给您带来的不便敬请谅解！');
        setTimeout(function(){fail();},2000);
        return false;
    }
    function fail(){
        $('#msg').hide()
    }
</script>
<div  style=" width: 100%; position:fixed; top: 35%; left: 0; z-index: 999;">
    <p style=" background:#666; color:#fff; line-height:25px;width:200px; height: auto; text-align:center; margin: 0 auto; padding: 10px;display: none;" id="msg"></p>
</div>
 <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145622).'" width="0" height="0"/>';?></div>
</body>
    <script src="/weixin/Public/Expert/js/sweetalert.min.js"></script>
    <script>
    var $li = document.querySelectorAll('.iList li');
    var $code = document.getElementById('data_code').value;
    var $bandCode = document.getElementById('data_bandCode').value;
    var arr = [];
    var iX = 0, iY = 0;
    
    for(var i=0;i<$li.length;i++){
        arr.push($li[i]);
    }
    arr.forEach(function(value,index){
        value.addEventListener('touchstart',function(ev){
            iX = ev.changedTouches[0].pageX;
            iY = ev.changedTouches[0].pageY;
            if(this.className != 'current'){
                this.getElementsByTagName('i')[0].style.color = '#d62c77';
                this.getElementsByTagName('span')[0].style.color = '#d62c77';
            }
        });
        value.addEventListener('touchmove',function(ev){
            //ev.preventDefault();
            var iDisX = ev.changedTouches[0].pageX,
                iDisY = ev.changedTouches[0].pageY;
            
            if((iDisX != 0 || iDisY != 0) && this.className != 'current'){
                this.getElementsByTagName('i')[0].style.color = 'rgba(0, 0, 0, 0.5)';
                this.getElementsByTagName('span')[0].style.color = '#666';
            }
        });
        value.addEventListener('touchend',function(){
            if(this.className != 'current'){
                this.getElementsByTagName('i')[0].style.color = 'rgba(0, 0, 0, 0.5)';
                this.getElementsByTagName('span')[0].style.color = '#666';
            }
            if($bandCode == 6){
                //ev.preventDefault();
            }
        });
        
        value.getElementsByTagName('a')[0].onclick = function(){
            //alert(this.dataset.level)
            if($bandCode == 6 && this.dataset.level > 0){
                swal({   
                    title: "未注册",   
                    text: "",  
                    type: "warning",   
                    showCancelButton: true,   
                    cancelButtonText: "取消",   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "去注册",   
                    closeOnConfirm: false 
                }, 
                function(){  
                    window.location = '/weixin/index.php?m=Expert&c=User&a=band_phone'
                });
                return false;
            }

            if($bandCode == 1 && $code == 0 && this.dataset.level > 0){
                window.location = '/weixin/index.php?m=Expert&c=User&a=zhuce'
                return false;
            }

            if($bandCode == 1 && ($code == 0 || $code ==3) && this.dataset.level > 1){
                swal({   
                    title: "未认证",   
                    text: "",  
                    type: "warning",   
                    showCancelButton: true,   
                    cancelButtonText: "确定",   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "去认证",   
                    closeOnConfirm: false 
                }, 
                function(){  
                    window.location = '/weixin/index.php?m=Expert&c=User&a=zhuce'
                });
                return false;
            }
        }
    });


    function referral_dlist(str)
    {
        if(str == 1)
        {
            window.location = '/weixin/index.php?m=Expert&c=Referral&a=referral_dlist';
        }
        else
        {
            alert('你还没有转诊审核权限');
            return false;
        }

    }
</script>
</html>