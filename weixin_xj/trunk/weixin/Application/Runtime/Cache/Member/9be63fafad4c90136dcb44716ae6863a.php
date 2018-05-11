<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no" />
	<meta name="description" content="为您和您的家人获取最高10万元大病保障金">
	<title>
       <?php echo ($title); ?>
    </title>
    <link rel="stylesheet" href="http://wx-xjimg.oss-cn-beijing.aliyuncs.com/css/basic.css">
    <link rel="stylesheet" href="/weixin/Public/Member/css/100card.css">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '<?php echo $appId;?>',
            timestamp: '<?php echo $timestamp;?>', // 必填,生成签名的时间戳
            nonceStr:'<?php echo $NonceStr;?>', // 必填，生成签名的随机串
            signature: '<?php echo $signature;?>',// 必填，签名，见附录1
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

        var wx_share_title = '百倍爱心卡';
        var wx_share_desc = '护心大行动，爱心同传递。投入百元，保障10万！';
        var wx_share_imgUrl = "http://wx-heartorg.yk2020.com/weixin/Public/Member/images/baozhang/top_ban.jpg";

        wx.ready(function() {
            wx.onMenuShareTimeline({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_init&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('朋友圈');
                },
                cancel: function() {}
            });
            wx.onMenuShareAppMessage({
                title: wx_share_title,
                desc: wx_share_desc,
                link: 'http://wx-heartorg.yk2020.com/weixin/index.php?m=Member&c=Huzhu&a=share_init&user_id=<?php echo I("get.user_id","0");?>&link_mobile=<?php echo I("get.link_mobile","0");?>&user_name='+encodeURIComponent("<?php echo I('get.user_name','');?>"),
                imgUrl: wx_share_imgUrl,
                success: function() {
                    set_log('微信');
                },
                cancel: function() {}
            });
        });

        document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/12 + 'px';
    </script>
    <style>
        html{height: auto;}
        .waring{padding: 0.5rem 1rem 0;}
        .waring span,p{display: block; font-size: 14px; color: #333; line-height: 30px;}
        .waring span{color: red}

.qsc-modal{ position:fixed; left: 1em; bottom: 1em; right: 1em; top: 1em; z-index: 10; background-color: #fff; padding: 1em; display: none; }
.modal-dialog{ height: 100%; width: 100%;position:relative;}
.middleBox{ width: 100%; height: 100%; background-color: #000; opacity: 0.2;  z-index: 1; position: fixed; top: 0; left: 0;  display: none;}
.modal-body{padding-bottom:100px;}
.modal-content{ width: 100%; height:  100%; overflow-x: auto;}
.modal-header{ color: #ff7a8f; padding: 1em; }
.modal-footer{ text-align: center;position:absolute;bottom:0;left:0;width:100%;background:#fff;}
.modal-footer a{ width: 60%; height: 3em; background-color: #ef4a65; color: #fff; text-align: center; line-height: 3em; display: inline-block; border-radius: 6px; margin-top: 1em; -webkit-tap-highlight-color:rgba(0, 0, 0, 0);  tap-highlight-color:rgba(0, 0, 0, 0); }
.show{ display: block; }
body.blues{ background:#beeffc url(http://wx-xjimg.oss-cn-beijing.aliyuncs.com/share/cloud.jpg) left bottom no-repeat; background-size: 100%; height: auto; }
article{ padding-top: 0; }
p.cn{ padding-bottom: 1em; }
</style>
</head>
<body class="blues">
	<article>
        <div>
            <section class="text-center">
                <img src="http://wx-xjimg.oss-cn-beijing.aliyuncs.com/share/info.jpg" width="100%" />
            </section>
            <section class="forms ">
               <div class="infos">
                    用户信息安全保护声明：您提供的以下信息是获取您信息的重要凭证，仅供本次购买使用，我们不会泄露给任何第三方或作其他用途
                </div>
                <form action="<?php echo U('Huzhu/share_pay_again');?>" method="post">

		            <div class="label box">
                        <strong>*</strong>
		                <span></span>
		                <input type="tel" name="card_number" id="card_number" placeholder="输入二次销售的卡号" />
		            </div>
                    <div class="info text-right"><i></i></div>
                    <div class="label box shibai">
                        <strong>*</strong>
                        <span></span>
                        <input type="text" name="name" id="name" disabled="disabled" placeholder="输入被保障人姓名" />
                    </div>
		            <div class="info text-right"><i></i></div>
		            <div class="label box shibai">
                        <strong>*</strong>
		                <span></span>
		                <input type="tel" name="phone"  id="phone" maxlength='11' placeholder="输入被保障人手机号码" />
		            </div>
		            <div class="info text-right"><i></i></div>
		            <div class="label box shibai">
                        <strong style="color:#fff;">*</strong>
		                <span></span>
		                <input type="text" name="idCard" id="idCard" placeholder="输入被保障人身份证号" />
		            </div>
                    <div class="info" style="height:auto;line-height:16px;padding:5px 0;width:8rem;margin-left:0.2rem;"><i style="font-size:12px;">如忘记身份证号码，也可加入，后期工作人员会协助您补全信息。</i></div>
                    <div class="info text-right"><i></i></div>



                        <input type="hidden" name="member_mobile" id="member_mobile" value="<?php echo ($user_info[MEMBER_MOBILE]); ?>" />

		            <input type="hidden" id="jzr_date" name="jzr_date" value="0" />
		            <input type="hidden" id="sex" name="sex" value="0" />
                    <input type="hidden" id="age" name="age" value="0" />
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo I('get.user_id','0');?>" />
                    <input type="hidden" id="link_mobile" name="link_mobile" value="<?php echo I('get.link_mobile','0');?>" />
                    <input type="hidden" id="ys_id" name="ys_id" value="0" />
                    <input type="hidden" id="hos_id" name="hos_id" value="0" />
                    <input type="hidden" id="attach" name="attach" value="<?php echo I('get.attach','');?>" />
                    <input type="hidden" id="sale_type" name="sale_type"  value="<?php echo I('get.sale_type','1');?>" />
		        </form>
                <a href="javascript:;" class="text-center" id="join">立即加入</a>
            </section>
            <section class="text-center">
                <img src="http://wx-xjimg.oss-cn-beijing.aliyuncs.com/share/bottom.jpg" width="100%" />
            </section>
            <?php if(I('get.sale_type') == '23'): else: ?>
                <p class="text-center cn"><i></i>我同意<a href="#" class="btn_bai">《百倍爱心公约》</a>条款</p><?php endif; ?>

        </div>
    </article>

<div class="middleBox"></div>
<div class="qsc-modal" id="sick-convention" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog middle middle-max">
                <div class="modal-content clearfix">
                        <div class="modal-header text-center"> 百倍爱心卡行动公约 </div>
                        <div class="modal-body">
                                <h4 class="text-center">第一章 前言</h4>
                                <p>2015年的政府工作报告中，李克强总理提到了“加强重特大疾病医疗救助，全面实施临时救助制度，让遇到急难特困的群众求助有门、受助及时。”可见医疗救助在保障公民的生存权、健康公平权领域起着不可替代的作用。</p>
                                <p>本项目就是根据该社会背景设立的，我们希望可以缓解当前医疗救助事业存在的诸多问题，使病患获得医疗上的经济援助，获得救治机会，重拾生活信心。</p>
                                <h4 class="text-center">第二章 释义</h4>
                                <p>“百倍爱心卡行动”是三大基金会中关村精准医学基金会，北京远程光明公益基金会，北京新康公益基金会等发起的重大疾病援助项目（以下简称“本项目”）。</p>
                                <p>《百倍爱心卡行动公约》（以下简称“本公约”）为需参与本项目的全体会员（以下简称“您”）共同遵守的规则。</p>
                                <p>您在确认加入本项目前请仔细阅读本公约，在您确认参与后即默认您已充分理解本公约的全部内容，并同意认真遵守本公约的权利义务。</p>
                                <p>会员：是平台会员与行动会员的统称。</p>
                                <p>平台会员：是指具有完全民事权利能力和民事行为能力，在百倍爱心卡完成注册流程的个人和团体。</p>
                                <p>行动会员：是指符合本项目参与条件并确认参与本项目的平台会员。</p>
                                <p>援助申请人：是指发生本项目约定的救助情形，需要获得救助的行动会员本人。</p>
                                <h4 class="text-center">第三章 公约效力</h4>
                                <p>1、平台会员符合本项目参与条件，确认参与并完成支付后即成为行动会员，本公约对所有会员均有法律效力。</p>
                                <p>2、北京远程视界集团提供相关技术服务，行动会员同时默认接受旗下运营平台（以下简称“百倍爱心卡平台”）内其他协议规则的约束。</p>
                                <p>3、百倍爱心卡有权根据实际情况随时修订本公约，并通过百倍爱心卡运营平台进行公示。变更后的条款公示后，即发生法律效力。如您继续使用本项目提供的服务，则表示您同意并接受新条款的约束。</p>
                                <p>4、如您对本公约有任何疑问，应向百倍爱心卡咨询。您不应以未阅读或不接受本公约的内容为由，主张本公约无效或要求撤销本公约。</p>
                                <p>5、本项目属于创新型项目，可能会受到国家法律法规及政策的影响，导致本项目不能继续提供相应的服务，您成为行动会员时即表明您已充分了解本项目存在的风险，如因此使您遭受损失，您同意自行承担，百倍爱心卡不承担任何责任。</p>
                                <h4 class="text-center">第四章 参与标准</h4>
                                <p>6、行动会员加入条件：</p>
                                <p>（1）无条件向本项目支付200元；</p>
                                <p>（2）认同并承诺遵守本公约。</p>
                                <p>（3）凡成功购买百倍爱心卡者，不能退款且不能更改被援助人信息。
</p>
                                <p>7、行动会员退出条件</p>
                                <p>（1）受到一次救助的行动会员，自动退出；</p>
                                <p>（2）满期一年，未按时续费，自动退出；</p>
                                <p>（3）本公约所规定的其他情况。</p>
                                <h4 class="text-center">第五章 援助内容</h4>
                                <p>8、行动会员年龄为45周岁以下，加入本项目90天后发生并被医院的专科医生确诊为本项目约定的心脏血管相关手术，且必须是在与北京远程视界合作的基地医院进行手术；该确诊行动会员医保外的自费部分将获得最高10万元的援助金额。</p>
                                <p>9、行动会员年龄为45周岁以上，加入本项目180天后发生并被医院的专科医生确诊为本项目约定的心脏血管相关手术，且必须是在与北京远程视界合作的基地医院进行手术；该确诊行动会员医保外的自费部分将获得最高10万元的援助金额。</p>
                                <p>10、行动会员资格存续期间，如其罹患本项目约定的心脏血管疾病，需要进行本项目内的心脏血管相关手术项目，即可申请援助。</p>
                                <p>11、本项目中“心脏相关手术”是指冠心病支架介入手术、心脏搭桥手术、心律失常介入射频消融手术</p>
                                <h4 class="text-center">第六章 会员的权利义务</h4>
                                <p>12、您有权查阅本项目公布的援助事件及活动信息。</p>
                                <p>13、您有义务向百倍爱心卡提供真实准确的身份信息。</p>
                                <p>14、您有义务保证不在项目运行过程中发布包含诈骗、非法、色情、淫秽、暴力等违反国家法律法规、政策的内容，不发表含有攻击性、侮辱性的言论。</p>
                                <p>15、您对本项目有批评权、建议权和监督权。</p>
                                <p>16、您应确保您在参与本项目时留下的注册信息、联系方式、银行卡信息是真实准确的，否则您将无法获得帮助。</p>
                                <p>17、行动会员应及时关注本项目的援助事件信息，自行了解援助流程，认真履行义务；不能以未收到本项目的通知为由要求百倍爱心卡承担任何责任。</p>
                                <p>18、您应妥善保管在百倍爱心卡平台上注册的用户名和密码，凡使用您的用户名和密码登陆百倍爱心卡平台进行的一切操作，均视为您本人的行为，一切责任由您本人承担。</p>
                                <p>19、申请援助的行动会员有义务就援助事件提供真实完整的资料，否则将被取消获得援助的资格。</p>
                                <p>20、您同意百倍爱心卡可单方面判断并决定，如果您违反本公约或百倍爱心卡平台的规则，出现损害本项目和其他会员的行为，百倍爱心卡可随时终止您的密码、账号或某些服务的使用，并可将您在百倍爱心卡平台中留存的任何内容加以移除或删除，同时对您终止部分或全部服务。</p>
                                <p>21、您了解并同意百倍爱心卡在发现任何不适宜内容时，无需进行事先通知，可立即关闭或删除您的账户及其账户中所有相关信息及文件，并暂时或永久禁止您继续使用前述文件或账户。</p>
                                <p>22、您的账户因以上所述原因被终止使用或因停止运作等原因被关闭时，您无权要求百倍爱心卡退还加入费用。</p>

                                <h4 class="text-center">第七章 百倍爱心卡权利义务</h4>
                                <p>23、百倍爱心卡不保证任何行动会员都能获得援助。</p>
                                <p>24、百倍爱心卡有权制定各项援助条款并协助行动会员援助。</p>
                                <p>25、百倍爱心卡或其指定第三方有权对行动会员的援助申请进行审核，并最终决定申请会员是否可以获得援助。</p>
                                <p>26、在出现援助申请人通过提供虚假资料和信息而获得援助的情形时，百倍爱心卡有义务向援助申请人追偿。</p>
                                <p>27、百倍爱心卡因客观或政策原因无法继续运作本项目，有权终止本项目。</p>
                                <p>28、百倍爱心卡为本项目提供技术服务，该服务可能会受到各个环节不稳定因素的影响。因此服务存在不可抗力、计算机病毒或黑客攻击、系统不稳定、会员所在地点以及其他任何技术、互联网络、通信线路原因等造成的服务中断或不能满足行动会员要求的风险，百倍爱心卡不作任何担保。对因此导致会员损失，百倍爱心卡不承担任何责任。</p>
                                <p>29、如百倍爱心卡平台的系统发生故障影响服务的正常运行，百倍爱心卡会在第一时间进行修复处理。但会员因此而产生的间接损失，百倍爱心卡不承担责任。此外，百倍爱心卡保留不经事先通知为维修保养、升级或其他目的暂停服务任何部分的权利。</p>
                                <p>30、会员公然侮辱他人或者捏造事实诽谤他人或的，或者进行其他恶意攻击的，百倍爱心卡有权不为该会员提供服务并有权追偿会员给造成的损失。</p>
                                <h4 class="text-center">第八章 终止和退出</h4>
                                <p>31、以下情形出现，本项目即终止:</p>
                                <p>不可抗力、政策因素致本项目终止的。</p>
                                <p>32、以下任一情形出现，您即退出本项目:</p>
                                <p>（1）您违反了国家法律法规、政策、本公约或百倍爱心卡平台发布的各类规则，百倍爱心卡平台终止为您提供服务的；</p>
                                <p>（2）您本人不同意接受本公约约定或百倍爱心卡平台发布的各类规则的；</p>
                                <p>（3）您不符合本公约规定的参与资格的。</p>
                                <p>33、本公约终止或您退出本公约，不影响您受本公约约束时所做的行为应承担的义务和责任。</p>
                                <p>34、本公约的解释权归远程视界科技集团所有。</p>
                        </div>
                        <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-primary btn-lg" data-dismiss="modal">已阅读并同意</a> </div>
                </div>
        </div>
</div>
</body>
<script src="/weixin/Public/Common/js/jquery.min.js"></script>
<script>
    window.onload=function(){
        $('.forms').addClass('back-info');
        $('.shibai').find('input').attr("disabled",true);
        $('#join').click(null);

        $('#card_number').bind('input propertychange',function(){
            
            if($('#card_number').val().length == 7 || $('#card_number').val().length == 8) {
              var card_num =$('#card_number').val();
              $('#card_number').parent().next().find('i').html('');
              $.ajax(
                {
                  type:"post",
                  url:"<?php echo U('check_card');?>",
                  data:{'card_number':card_num},
                  success:function(msg)
                  {
                    if(msg.ys_id){
                      $('.forms').removeClass('back-info');
                      $('.shibai').find('input').attr("disabled",false);
                      $('#ys_id').val(msg.ys_id);
                      if(msg.hos_id){
                        $('#hos_id').val(msg.hos_id);
                      }
                      $('#card_number').parent().next().find('i').html('');
                      $('#join').click(on_click);
                    }else{
                      console.log(msg.error_code);
                      var msg_text='';
                      if(msg.error_code=='00046'){
                        msg_text = '卡号不存在';
                      }else if(msg.error_code=='00048'){
                        msg_text = '该卡已有人使用，您无权限绑定';
                      }else if(msg.error_code=='00060'){
                        msg_text = '该卡不符合二次销售规则';
                      }
                      $('#card_number').parent().next().find('i').html(msg_text);
                    }
                  }
                }
              )
            } else {
              var msg_text = '该卡不符合二次销售规则';
              $('#card_number').parent().next().find('i').html(msg_text)
            }
        })
        // $('#card_number').blur(function(){
        //     $('#card_number').parent().next().find('i').html('');
        //     var card_num =$('#card_number').val();
        //
        //     $.ajax(
        //             {
        //                 type:"post",
        //                 url:"<?php echo U('check_card');?>",
        //                 data:{'card_number':card_num},
        //                 success:function(msg)
        //                 {
        //                     if(msg.ys_id){
        //                         $('.forms').removeClass('back-info');
        //                         $('.shibai').find('input').attr("disabled",false);
        //                         $('#ys_id').val(msg.ys_id);
        //                         if(msg.hos_id){
        //                             $('#hos_id').val(msg.hos_id);
        //                         }
        //                         $('#join').click(on_click);
        //                     }else{
        //                         console.log(msg.error_code);
        //                         var msg_text='';
        //                         if(msg.error_code=='00046'){
        //                             msg_text = '卡号不存在';
        //                         }else if(msg.error_code=='00048'){
        //                             msg_text = '该卡已有人使用，您无权限绑定';
        //                         }else if(msg.error_code=='00060'){
        //                             msg_text = '该卡不符合二次销售规则';
        //                         }
        //                         $('#card_number').parent().next().find('i').html(msg_text);
        //                     }
        //                 }
        //             }
        //     )
        // })

    }
</script>
<script>
function set_log(act){
        var type = "<?php echo ($type); ?>"+"_share";
        var link_mobile = '<?php echo I("get.link_mobile","");?>';
        var openid = "<?php echo ($homeid); ?>";
        var path = "<?php echo ($path); ?>";
        $.ajax(
                {
                    type: "post",
                    url: "/weixin/index.php?m=Member&c=Index&a=set_log",
                    data: {'type':type,'openid':openid,'link_mobile':link_mobile,'url_path':path,'act':act},
                    dataType: "json",
                    success: function(data)
                    {
                        console.log('set_log:success');
                    }
            });
    }
   // var reg = /^[1-9]{1}[0-9]{14}$|^[1-9]{1}[0-9]{16}([0-9]|[xX])$/;
   //检验身份证
    function isNumber(str)
    {
        var reg15=/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/;
        var reg18=/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X|x)$/;
        if(reg15.test(str)||reg18.test(str))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

   function on_click(){
        if($('#name').val().trim() == ''){
            $('#name').parent().next().find('i').html('请输入姓名');
            return false;
        }else{
           $('#name').parent().next().find('i').html('');
        }

        if(!(/^1[34578]\d{9}$/.test($('#phone').val()))){
            $('#phone').parent().next().find('i').html('被保障人手机号码有误，请重填');
            $('#idCard').parent().next().find('i').html('');
            return false;
        }else{
            $('#phone').parent().next().find('i').html('');
        }

        if(!isNumber($('#idCard').val()) && $('#idCard').val().trim() != '')
        {
            $('#idCard').parent().next().find('i').html('身份证号有误，请重填');
            return false;
        }else{
            $('#idCard').parent().next().find('i').html('');
        }

        /*if(!(/^1[34578]\d{9}$/.test($('#member_mobile').val())) && $('#member_mobile').val().trim() != ''){
            $('#member_mobile').parent().next().find('i').html('本人手机号码有误，请重填');
            $('#idCard').parent().next().find('i').html('');
            $('#phone').parent().next().find('i').html('');
            return false;
        }else{
            $('#member_mobile').parent().next().find('i').html('');
        }*/

        var card = $.trim($('#idCard').val());
        console.log(card);
        if(isNumber(card))
        {
            if(card.length == 15)
            {
                var len15 = card.charAt(card.length - 1);
                if(!isLen(len15) || !len15)
                {
                    $("#sex").val("0");
                }
                else
                {
                    $("#sex").val("1");
                }

                // console.log(card);
                var age15 = card.substr(6,2),
                    m15 = card.substr(8,2),
                    d15 = card.substr(10,2);
                if(!age15)
                {
                    $("#age").val(0);
                }
                var myDate = new Date();
                var nowyear = myDate.getYear(); //获取当前年份(2位)

                $("#jzr_date").val("19"+age15+"-"+m15+"-"+d15);


                person_age = nowyear-age15;
                // console.log(person_age);
                $("#age").val(person_age);

            }

            if(card.length == 18)
            {
                var len18 = card.charAt(card.length - 2);
                if(!isLen(len18) || !len18)
                {
                    $("#sex").val("0");
                }
                else
                {
                    $("#sex").val("1");
                }

                // console.log(card);
                var age18 = card.substr(6,4),
                    m18 = card.substr(10,2),
                    d18 = card.substr(12,2);
                console.log(age18);
                if(!age18)
                {
                    $("#age").val(0);
                }
                var myDate = new Date();
                var nowyear = myDate.getFullYear(); //获取完整的年份(4位,1970-????)

                $("#jzr_date").val(age18+"-"+m18+"-"+d18);

                // console.log(nowyear);
                person_age = nowyear-age18;
                // console.log(person_age);
                $("#age").val(person_age);
            }


        }

        $('form').submit();
    }

    //检验偶数
    function isLen(str)
    {
        var reg=/^\d*[02468]$/;
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
<script type="text/javascript">
$('.btn_bai').click(function(){
    $('.qsc-modal').addClass('show');
    $('.middleBox').addClass('show');

});
$('.btn-primary').click(function(){
    $('#sick-convention').removeClass('show');
    $('.middleBox').removeClass('show');
});

</script>
<!-- CNZZ统计代码 -->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
<!-- 百倍爱心卡-提交信息单独统计 -->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260905715).'" width="0" height="0"/>';?></div>
</html>