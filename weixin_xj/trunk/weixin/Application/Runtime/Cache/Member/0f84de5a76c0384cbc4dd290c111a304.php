<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <title>注册</title>
        <!--<link rel="stylesheet" href="/weixin/Public/Member/css/mbase.min.css">-->
        <link rel="stylesheet" href="/weixin/Public/Common/css/common/basic.css">
        <link rel="stylesheet" href="/weixin/Public/Member/css/user/register.css">
        <script>
            document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12+ 'px';
        </script>
    </head>
    <body>
        <div class="login_logo">
            <span><!-- <a href="<?php echo U('Member/User/mywork_house');?>">随便逛逛</a> --></span>
        </div>
        <section class="login">
            <form action="<?php echo U('Member/User/band_phone_add');?>" method="post" id="form">
                <div class="box_login">
                    <div class="boxs">
                        <!-- <h3 class="text-center">请输入正确的手机号码，并点击继续</h3> -->
                        <div class="phone">
                            <!-- <span class="center">+86</span> -->
                            <input type="tel" maxlength="13" name="link_mobile" id="mobile" placeholder="输入手机号" />
                            <input type="hidden" id="relPhone" />
                        </div>
                        <a href="javascript:;" class="text-center goon" id="goon">继&nbsp;&nbsp;续</a>
                        <div class="yuedu"><p>我已阅读并同意<!-- <a href="<?php echo U('Member/User/agreement');?>">用户协议</a>及 --><a href="javascript:;">《知情告知书》</a></p></div>
                    </div>
                    <div class="br" id="sjhm"></div>
                    <div class="verify message boxs" style="display:none;">
                        <h3 class="text-center">验证码已通过短信发送至：<i>+86 00000000000</i></h3>
                            <a href="javascript:void(0)" onClick="sendMessage();" id="btnSendCode" class="btnSendCode text-center">获取验证码</a>
                        <div class="code_lst">
                            <label for="code">
                                <ul class="box">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </label>
                            <input type="tel" maxlength="4" name="sms_code" id="code" placeholder="" class="code" >
                        </div>
                        <!--短信验证码  code-->
                        <div class="text-right"><a href="javascript:;" on="1" class="say" id="say">语音验证码</a></div>
                        <!--<div class="hContent"><a href="javascript:void(0)" class="text-center goon" id="bangding">注&nbsp;&nbsp;册</a></div>-->
                        
                    </div>
                    <div class="br yfsdxm" id="yfsdxm"></div>
                    <div class="br ok" id="ok"></div>
                   <!--  <p class="text-center ts"><span>如长时间未收到短信验证码</span>，请发送手机号到微信号</p> -->
                </div>
                
            </form>
        </section>
        <article>
            <h2 class="text-center">知情告知书</h2>
            <div class="article">
                <p>1、本平台为信息中介服务平台，为您及相关服务方提供个人展示、信息服务、技术服务等平台服务。为了更好地为您服务，您需要确保向本平台提供的个人信息、资料等的真实性、合法性，并对其负全部责任。若相关服务方或任何第三方因信任该些信息而采取某些行为、提供有关咨询意见，还需要您作出恰当的判断，并自行负责采纳有关咨询意见的后果。本平台对此不承担任何保证、连带责任。</p>
                <P>2、本平台会在此提醒您，相关服务方依据您的提问及描述的症状而提供的建议性内容不能替代执业医师面对面的诊断，是否采纳该建议性内容由提问者自主决定，本平台不承担任何责任。</P>
                <P>3、您使用本平台在线服务所存在的风险将完全由您自己承担，因使用本平台在线服务而产生的一切后果也由您自己承担，本平台在线对您不承担任何责任。</P>
                <P>4、您有权选择是否遵从本平台的医师作出的疾病诊断、治疗方案、用药意见(包括电子处方)等。如果您在未与本平台开展合作的医疗机构获取药品、接受治疗的，即便您依据的处方或治疗方案来源于本平台和/或在线医生，本平台和/或医生亦不承担相应责任。</P>
                <P>5、本平台致力于提供正确、完整的健康资讯，但不保证信息的正确性和完整性，且不对因信息的不正确或遗漏导致的任何损失或损害承担责任。</P>
                <P>6、本平台在线不承诺网页上设置的外部链接的准确性和完整性，同时，对于该等外部链接指向的不由本平台在线实际控制的任何网页上的内容，本平台在线不承担任何责任。</P>
                <P>7、本平台电子处方所开具的药品，均来自于第三方药店，因药品质量问题所产生的风险与责任，与该医生无关，医生用户与本平台对此不承担责任。</P>
                <P>8、对于因不可抗力或本平台在线不能控制的原因造成的网络服务中断或其它缺陷，本平台在线不承担任何责任，但将尽力减少因此而给您造成的损失和影响。</P>
                <P>9、凡以任何方式登陆本平台或直接、间接使用本平台资料者，视为自愿接受本平台声明的约束。</P>
                <P>10、本平台在此提醒您，您在使用本平台的过程中，不得发布违法、违规、反动以及其他任何不适的言论、不得实施任何不适的行为，您需要审慎提供咨询意见，您的任何言论、行为不代表本平台意见，您需要为自己提供咨询意见的行为负责，本平台不承担由此引起的法律责任。</P>
                <P>11、上述事项需要特别告知您，无论您以任何方式登陆本平台或直接、间接使用本平台或其服务、信息等，视为您清楚无误明白、无保留同意前述事项，并接受本平台的有关协议、管理规则等。</P>
            </div>
            <a href="javascript:;" class="text-center">确定</a>  
        </article>
        <script type="text/javascript" src="/weixin/Public/Member/js/jquery.min.js"></script>
        <script language="javascript" type="text/javascript">

            var InterValObj; //timer变量，控制时间
            var type = 0;  //0 短信 1 语音
            var dealType;  //0 短信 1 语音
            var count; //间隔函数，1秒执行
            var curCount;//当前剩余秒数
            var onOff = true; //获取验证码控制开关，防止多次点击 
            
            function telFormat(tel){
                tel = String(tel).replace(/\s/ig, "");
                return tel.replace(/(\d{3})\s?(\d{4})\s?(\d{4})/,function (rs,$1,$2,$3){
                    return $1+" "+$2+" "+$3
                });
            }
            
            $("#mobile").keyup(function(){
                if($(this).val()){
                    var val = ($(this).val().match(/\d+/g)).join('');
                    $('#relPhone').val(val);
                    if(isMobile(val)){
                        $(this).parent().next().addClass('success');
                        var valShow = telFormat($(this).val());
                        $(this).val(valShow);
                    }else{
                        $(this).parent().next().removeClass('success');
                    }
                }
            });
            
            $('#code').keyup(function(){
                var val = $(this).val();
                $('.code_lst li').each(function(i){
                    if(!val.split('')[i]){
                        $(this).html('');
                    }else{
                        $(this).html(val.split('')[i]);
                    }
                });

                if(val.split('').length == 0){
                     $('.code_lst li').eq(0).html('<span class="cursor-blink"></span>')
                }
                if(val.split('').length == 1){
                     $('.code_lst li').eq(1).html('<span class="cursor-blink"></span>')
                }
                if(val.split('').length == 2){
                     $('.code_lst li').eq(2).html('<span class="cursor-blink"></span>')
                }
                if(val.split('').length == 3){
                     $('.code_lst li').eq(3).html('<span class="cursor-blink"></span>')
                }

                if(val.split('').length > 3){
                    //$('#bangding').addClass('success');
                    var sms_code = $("#code").val();
                    var link_mobile = $("#relPhone").val();
                    //if(!$(this).hasClass('success')){return;}
                    if(link_mobile!="")
                    {
                        if(isMobile(link_mobile))
                        {
                            if(sms_code!="")
                            {
                                $("#ok").html("加载中……").addClass('down');

                                $.ajax({
                                    type: "POST",
                                    url: "/weixin/index.php?m=Member&c=User&a=band_phone_add",
                                    async: true,
                                    data: {'link_mobile':link_mobile,'sms_code':sms_code},
                                    success: function(msg)
                                    {
                                        $("#ok").removeClass('down')
                                        switch (msg)
                                        {
                                            //绑定成功 获取信息
                                            case '1':
                                                 
                                                location.href="/weixin/index.php?m=Member&c=User&a=user_info&link_phone="+link_mobile;
                                                return;
                                                break; 
                                            case '0':
                                                location.href="/weixin/index.php?m=Member&c=User&a=user_info&link_phone="+link_mobile;
                                                return;
                                                break;
                                                //系统错误
                                            case '00001':
                                                location.href="/weixin/index.php?m=Member&c=User&a=band_fail";
                                                return;
                                                break;
                                            case '00014':
                                                $("#yfsdxm").html("短信验证码错误").addClass('down');
                                                setTimeout(function(){
                                                    $("#yfsdxm").removeClass('down')
                                                },2000); 
                                                return;
                                                break;
                                            case '00020':
                                                $("#yfsdxm").html("手机号不能为空").addClass('down');
                                                setTimeout(function(){
                                                    $("#yfsdxm").removeClass('down')
                                                },2000); 
                                                return;
                                                break;
                                            case '00007':
                                                $("#yfsdxm").html("请重新关注公众号！").addClass('down');
                                                setTimeout(function(){
                                                    $("#yfsdxm").removeClass('down')
                                                },2000); 
                                                return;
                                                break;
                                            default:
                                                 $("#yfsdxm").html("错误代码:"+msg).addClass('down');
                                                setTimeout(function(){
                                                    $("#yfsdxm").removeClass('down')
                                                },2000); 
                                                return;
                                                break;
                                        }
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                                    {
                                        alert("绑定失败，重新加载，错误代码：" + XMLHttpRequest.readyState);
                                    }
                                });
                            }
                            else
                            {
                                $("#sjhm").html("");
                                $("#yfsdxm").html("输入短信验证码").addClass('down');
                                setTimeout(function(){
                                    $("#yfsdxm").removeClass('down')
                                },2000);
                                $("#code").focus();
                            }
                        }
                        else
                        {
                            $("#sjhm").html("手机号格式错误！");
                            $("#mobile").focus();
                        }
                    }
                    else
                    {
                        $("#sjhm").html("输入手机号");
                        $("#mobile").focus();
                        return false;  
                    }
                }else{
                    //$('#bangding').removeClass('success');
                }
            });
            
            $('#goon').click(function(){
                if($(this).hasClass('success')){
                    $('.boxs').eq(0).hide();
                    $('.boxs').eq(1).fadeIn();
                    $('.boxs').eq(1).find('h3').html('验证码已通过短信发送至：<i>'+$("#mobile").val()+'</i>');
                    sendMessage();
                    $('#code').focus()
                    $('.code_lst li').eq(0).html('<span class="cursor-blink"></span>')
                }
            });
            
            $('.yuedu a').click(function(){
                $('article').fadeIn();
            })
            
            $('article a').click(function(){
                $(this).parent().fadeOut();
            });
            
            $('#say').click(function(){
                if($(this).attr('on') == 1){
                    $(this).attr('on',2);
                    $('#say').css('color','#ccc');
                    type = 1;
                    window.clearInterval(InterValObj);
                    onOff = true;
                    sendMessage();    
                }   
            });
            
            function sendMessage()
            {   
                if(onOff){
                    //关闭点击事件
                    onOff = false

                    //type = $("#btnSendCode").html();
                    if(type < 1)
                    {
                        count = 60;
                        dealType = 0;
                    }
                    else
                    {
                        count = 120;
                        dealType = 1;
                    }
                     //验证方式
                    curCount = count;
                    var link_mobile = $("#relPhone").val();
                    //判断手机号是否为空
                    if (link_mobile != "")
                    {
                        //判断手机号是否正确
                        if (isMobile(link_mobile))
                        {
                            //满足条件触发ajax
                            $.ajax({
                                type: "POST", //用POST方式传输
                                dataType: "text", //数据格式:JSON
                                url: '<?php echo U('Member/User/send_msm');?>', //目标地址
                                data: {"link_mobile":link_mobile,"type":dealType},
                                error: function (XMLHttpRequest, textStatus, errorThrown){},
                                success: function (msg)
                                {
                                    switch(msg)
                                    {
                                        case "0":
                                            $("#btnSendCode").html("("+curCount+"s)后重新获取");
                                            InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                                            $("#sjhm").html("");
                                            if(dealType==0)
                                            {
                                                $("#yfsdxm").html("验证码发送成功").addClass('down');
                                                setTimeout(function(){
                                                    $("#yfsdxm").removeClass('down')
                                                },2000);
                                            }
                                            else
                                            {
                                                $("#yfsdxm").html("验证码已发送，请注意接听电话").addClass('down');
                                                setTimeout(function(){
                                                    $("#yfsdxm").removeClass('down')
                                                },2000);
                                            }
                                            break;
                                        case "00020":
                                           $("#yfsdxm").html("请输入正确的手机号码！").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "10017":
                                           $("#yfsdxm").html("请输入正确的手机号码！").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "10091":
                                           $("#yfsdxm").html("您的IP异常，请联系客服").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "10001":
                                           $("#yfsdxm").html("当前网络繁忙，请切换4G或3G网络").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "10096":
                                           $("#yfsdxm").html("您的手机号异常，请联系客服").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "10097":
                                           $("#yfsdxm").html("未收到短信，可尝试语音验证").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;                                             
                                        case "10002":
                                           $("#yfsdxm").html("发送过于频繁，请联系客服人员").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "10092":
                                           $("#yfsdxm").html("手机号异常，请联系客服").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "10094":
                                           $("#yfsdxm").html("正在发送，请耐心等待").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "00016":
                                           $("#yfsdxm").html("您当前IP不合法，请切换网络重试！").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "00014":
                                            $("#yfsdxm").html("获取验证码失败").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "00003":
                                            $("#yfsdxm").html("正在发送，请耐心等待").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "00005":
                                            $("#yfsdxm").html("发送过于频繁，请稍后重试").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "00004":
                                            $("#yfsdxm").html("您当前IP不合法，请切换网络重试。").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        case "00006":
                                            $("#yfsdxm").html("异常错误，请重新打开页面").addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            break;
                                        default:
                                            $("#yfsdxm").html("获取验证码失败！错误代码:" + msg).addClass('down');
                                            setTimeout(function(){
                                                $("#yfsdxm").removeClass('down')
                                            },4000);
                                            onOff = true
                                            return;
                                            break;
                                    }
                                }
                            });
                        }
                        else
                        {
                            $("#sjhm").html("手机号格式错误！");
                            onOff = true
                            $("#mobile").focus();
                        }
                    
                    }//验证手机号是否为空
                    else
                    {
                        $("#sjhm").html("输入手机号");
                        onOff = true
                        $("#mobile").focus();
                    }
                }       
            }
            //timer处理函数
            function SetRemainTime()
            {
                if (curCount == 1)
                {
                    /*window.clearInterval(InterValObj);//停止计时器
                    $("#btnSendCode").attr("onclick","sendMessage()");
                    $("#btnSendCode").html("获取验证码");
                    onOff = true*/
                    if(count==60)
                    {
                        window.clearInterval(InterValObj);//停止计时器
                        $("#btnSendCode").attr("onclick","sendMessage()");
                        $("#btnSendCode").html("获取验证码");
                        onOff = true
                    // code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效    
                    }
                    else
                    {
                        window.clearInterval(InterValObj);//停止计时器
                        $("#btnSendCode").attr("onclick","sendMessage()");
                        $("#btnSendCode").html("获取验证码");
                        $('#say').attr('on',1);
                        $('#say').css('color','#e90000');
                        type = 0;
                        onOff = true
                    }
                    
                }
                else
                {
                    //window.clearInterval(InterValObj);//停止计时器
                    curCount--;
                    console.log(curCount)
                    $('#btnSendCode').removeAttr('onclick');
                    $("#btnSendCode").html("("+curCount+"s)后重新获取");
                    onOff = true
                }
            }

            //绑定提交
          //   $("#bangding").click(function()
          //   {
          //       var sms_code = $("#code").val();
          //       var link_mobile = $("#relPhone").val();
          //       if(!$(this).hasClass('success')){return;}
          //       if(link_mobile!="")
          //       {
          //           if(isMobile(link_mobile))
          //           {
          //               if(sms_code!="")
          //               {
          //                   var str_data = $("#form").serialize();
          //                   $.ajax({
          //                       type: "POST",
          //                       url: "/weixin/index.php?m=Member&c=User&a=band_phone_add",
          //                       async: true,
          //                       data: str_data,
          //                       success: function(msg)
          //                       {
          //                           switch (msg)
          //                           {
          //                               //绑定成功 获取信息
          //                               case '1':
          //                                   location.href="/weixin/index.php?m=Member&c=User&a=user_info&link_phone="+link_mobile;
          //                                   return;
          //                                   break; 
          //                               case '0':
          //                                   location.href="/weixin/index.php?m=Member&c=User&a=user_info&link_phone="+link_mobile;
          //                                   return;
          //                                   break;
          //                                   //系统错误
          //                               case '00001':
          //                                   location.href="/weixin/index.php?m=Member&c=User&a=band_fail";
          //                                   return;
          //                                   break;
          //                               case '00014':
          //                                   $("#yfsdxm").html("短信验证码错误").addClass('down');
          //                                   setTimeout(function(){
          //                                       $("#yfsdxm").removeClass('down')
          //                                   },2000); 
          //                                   return;
          //                                   break;
          //                               case '00020':
          //                                   $("#yfsdxm").html("手机号不能为空").addClass('down');
          //                                   setTimeout(function(){
          //                                       $("#yfsdxm").removeClass('down')
          //                                   },2000); 
          //                                   return;
          //                                   break;
										// case '00007':
          //                                   $("#yfsdxm").html("请重新关注公众号！").addClass('down');
          //                                   setTimeout(function(){
          //                                       $("#yfsdxm").removeClass('down')
          //                                   },2000); 
          //                                   return;
          //                                   break;
          //                               default:
          //                                    $("#yfsdxm").html("错误代码:"+msg).addClass('down');
          //                                   setTimeout(function(){
          //                                       $("#yfsdxm").removeClass('down')
          //                                   },2000); 
          //                                   return;
          //                                   break;
          //                           }
          //                       },
          //                       error: function(XMLHttpRequest, textStatus, errorThrown) 
          //                       {
          //                           alert("绑定失败，重新加载，错误代码：" + XMLHttpRequest.readyState);
          //                       }
          //                   });
          //               }
          //               else
          //               {
          //                   $("#sjhm").html("");
          //                   $("#yfsdxm").html("输入短信验证码").addClass('down');
          //                   setTimeout(function(){
          //                       $("#yfsdxm").removeClass('down')
          //                   },2000);
          //                   $("#code").focus();
          //               }
          //           }
          //           else
          //           {
          //               $("#sjhm").html("手机号格式错误！");
          //               $("#mobile").focus();
          //           }
          //       }
          //       else
          //       {
          //           $("#sjhm").html("输入手机号");
          //           $("#mobile").focus();
          //           return false;  
          //       }
          //   });

            //检查短信验证码是否匹配正则表达式
            function isCode (ssn) 
            {
                var re=/^[0-9]{6}$/;
                if(re.test(ssn))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

             //检验手机
            function isMobile(str)
            {   
                var reg=/^(0|86|17951)?(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[0-9])[0-9]{8}$/i;
                if(reg.test(str))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        </script>
    <!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
        <div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
     </body>
</html>