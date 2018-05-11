<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no" />
<meta name="description" content="为您和您的家人获取最高30万元大病保障金">
<title>百倍爱心卡-护心大行动</title>
<link rel="stylesheet" href="/weixin/Public/Member/css/baozhang/qscui.css">
<link rel="stylesheet" href="/weixin/Public/Member/css/baozhang/insurance.min.css">
<style>
  .tab{width: 100%; height: 40px; line-height: 40px; text-align: center;}
  .tab1{width: 50%; height: 38px; float: left; border-bottom: 2px solid #ef4a65; color: #ef4a65;}
  .tab2{width: 50%; height: 38px; float: left; border-bottom: 2px solid #cccccc;}
</style>

</head>
<body ontouchstart="" style=" background:#fff;">
<div class="content top bottom mod-insurance-apply">
    <div class="tab">
      <a href="<?php echo U('Member/Huzhu/jiaruxingdong');?>"><div class="tab1">百倍爱心卡</div></a>
      <a href="<?php echo U('Member/Huzhu/jiaruxingdong2');?>"><div class="tab2">百倍爱脑卡</div></a>
    </div>
    <div class="qsc-list-group info-center">
        <div class="insurance-item" style="border-bottom:1px solid #e7e7e7;"> <strong>总资金</strong> <span> <span><?php echo ((isset($bx_info["all_money"]) && ($bx_info["all_money"] !== ""))?($bx_info["all_money"]):"0"); ?>元</span> </span> </div>
        <div class="insurance-item" style="border-bottom:1px solid #e7e7e7;"> <strong>已加入会员</strong> <span> <span><?php echo ((isset($bx_info["hy_num"]) && ($bx_info["hy_num"] !== ""))?($bx_info["hy_num"]):"0"); ?>人</span> </span> </div>
        <div class="insurance-item" style="border-bottom:1px solid #e7e7e7;"> <strong>我已参与</strong> <span> <span><?php echo ((isset($bx_info["consume_money"]) && ($bx_info["consume_money"] !== ""))?($bx_info["consume_money"]):"0"); ?>人</span> </span> </div>
    </div>

    <?php if(empty($bx_list1)): else: ?>
	    <div class="info-block ">
	        已加入被援助人信息
	        <!-- <a href="<?php echo U('Huzhu/wodebaozhang');?>">查看更多保障<i class="list-arrow"></i></a> -->
	    </div><?php endif; ?>

    <div class="qsc-list-group observed-members ">
        <?php if(is_array($bx_list1)): $i = 0; $__LIST__ = $bx_list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bx): $mod = ($i % 2 );++$i;?><div class="insurance-item">
                <a href="<?php echo U('Huzhu/huiyuanxinxi',array('person_id'=>$bx['RECORD_ID']));?>" class="link-member">
                    <div class="observed-card">
                        <div><?php echo ($bx["PERSON_NAME"]); ?></div>
                        <span class="pull-right"> <small>金额:<?php echo ($bx["TOTAL_MONEY"]); ?>元</small> <span> <?php echo ($bx["BX_STATUS"]); ?> <i class="list-arrow"></i> </span> </span>
                    </div>
                </a>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="info-block"> 添加被援助人信息</div>

    <div class="qsc-list-group add-observed-members">
        <div class="insurance-item insurance-item-bottom">
        <a href="<?php echo U('User/jzr_add','huzhu=1');?>" class="btn btn-add " id="add_aided_person" style=" margin-bottom:20px;"><i class="icon icon-add tianjia_icon"></i><em>添加一名被援助人</em></a>
            <div class="scroll">
                <?php if(is_array($bx_list0)): $key = 0; $__LIST__ = $bx_list0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$case): $mod = ($key % 2 );++$key;?><div class="box_table">
                        <a href="<?php echo U('User/jzr_update',array('record_id'=>$case['RECORD_ID'],'huzhu'=>1));?>">
                            <table class="add-observed-card" data-hash="">
                                <tbody>
                                        <tr>
                                                <td>姓名</td>
                                                <td class="weak"><?php echo ($case["PERSON_NAME"]); ?></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>身份证</td>
                                                <td class="weak"><?php echo ($case["PERSON_IDCARD"]); ?></td>
                                                <td></td>
                                        </tr>
                                </tbody>
                            </table>
                        </a>

                        <div class="wait-for-pay">
                            <a href="javascript:void(0);" class="jzr_add">加入援助<!-- <i class="list-arrow"></i> --></a>
                            <input type="hidden" name="person_idcard" id="person_idcard" value="<?php echo ($case["PERSON_IDCARD"]); ?>">
                            <input type="hidden" name="person_id" id="person_id" value="<?php echo ($case["RECORD_ID"]); ?>">
                        </div>
                        <input type="hidden" id="person_id" value="<?php echo ($case["RECORD_ID"]); ?>">
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>


        </div>
    </div>
    <!--<footer class="qsc-bar bar-fixed bar-support ">
            <p class="user-agreement"> <i class="icon icon-checkbox-sm"></i> <span>我承诺加入会员身体健康,无癌症或其他重大疾病史,并同意<span class="text-success convention">《保障公约》</span>条款 及<span class="text-success" id="link-health">《健康承诺》</spa</span> </p>
            <!-- <button class="btn btn-block btn-success" id="wechat-charge">微信充值 <span id="fee">100</span> 元</button> -->
           <!--  <button class="btn btn-block btn-success" id="wechat-charge">加入保障  --> <!--<span id="fee">100</span> 元 --><!-- </button> -->
            <!-- <a href="<?php echo U('Huzhu/huzhu_pay',array('person_id'=>586423,'price'=>100));?>">微信充值</a>
    </footer>-->
</div>
<div class="qsc-modal" id="add_aided_person_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog middle middle-max">
        <div class="modal-content clearfix">
            <form action="" class="horizontal">
                <div class="modal-header"> <a href="javascript:void(0);" class="close-modal" data-dismiss="modal"><i class="icon-close_modal"></i></a> <small>以下信息是您获取保障的重要凭证,一旦填写将不能修改</small> </div>
                <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="请输入真实姓名">
                        <input type="text" name="id" class="form-control" placeholder="请输入身份证号码">
                </div>
                <div class="modal-footer"> <a href="" class="btn btn-primary btn-lg" id="save_aided_person">保存信息</a> </div>
            </form>
        </div>
    </div>
</div>
<div class="qsc-modal dialog" id="modalPayStatus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog middle">
        <div class="modal-content">
            <div class="modal-header"> 支付结果 </div>
            <div class="modal-body"> 您的支付是否成功? </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">支付失败</button>
                <a href="" class="btn btn-primary btn-lg active" id="payStatusSuccess">支付成功</a> </div>
        </div>
    </div>
</div>
<div class="qsc-modal" id="modal-health" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog middle middle-max">
        <div class="modal-content clearfix">
            <div class="modal-header text-center"> 加入微爱大病互助行动健康承诺 </div>
            <div class="modal-body">
                <p>本人自愿参加由北京轻松筹网络科技有限公司发起的“微爱大病互助行动”项目，在此向轻松筹及参与本项目的会员就本人在加入本项目时的健康状况作如下承诺：</p>
                <p>一、本人已确认未曾或者现在正患有下列症状或疾病，如有，本人放弃申请互助保障金。</p>
                <p>1.  咯血、 肺结核、肺部肿瘤</p>
                <p>2.  先天性心脏病、风湿性心脏病、冠心病、心绞痛、其它严重心脏血管疾病</p>
                <p>3.  肝硬化、腹水、</p>
                <p>4.  尿毒症、肾功衰竭、</p>
                <p>5.  瘫痪、中风、癫痫</p>
                <p>6.  先天缺陷</p>
                <p>7.  恶性肿瘤、血液病</p>
                <p>8.  视力、听力、言语严重失常</p>
                <p>9.  任何与艾滋病有关的疾病</p>
                <p>二、本人已确认 2 年内未曾或者现在正患有下列症状或疾病，如有，本人自愿将观察期变更为 2 周年。</p>
                <p>1.  咯痰（一年中超过三个月）、呼吸困难、胸腔积液、气胸、其它呼吸系统疾病；</p>
                <p>2.  呼吸困难、心肌炎、高血压、高血脂症、动脉硬化或其它严重心脏血管</p>
                <p>3.  吞咽困难、肝脾肿大或严重消化系统疾病</p>
                <p>4.  尿路畸形；</p>
                <p>5.  意识障碍、晕厥、感觉及运动异常、其它脑部疾病；</p>
                <p>6.  性格异常、定向力障碍、精神抑郁、精神状态异常或其它精神疾病</p>
                <p>7.  先天缺陷、四肢残缺、</p>
                <p>8.  脓肿、囊肿或不明原因的肿块；</p>
                <p>9.  不明原因的皮下出血点、鼻衄</p>
                <p>10. 性病</p>
                <p>三、本人已确认 5 年内未曾/正患有下列症状或疾病，如果曾有，自本人自愿将观察期变更为 2 周年。</p>
                <p>1.  严重异常检查结果，如验血、验便、心电图、X 光、穿刺、造影、核磁共振、CT、B 超等；</p>
                <p>2.  曾为制止酗酒或因酒精中毒而接受医生治疗或者使用成瘾药物、过量尼古丁或曾接受戒毒治疗。</p>
                <p>四、下列条目仅适用于女性行动会员，如果目前正有下列症状或疾病，本人自愿将观察期变更为 2 周年。</p>
                <p>1.  正在怀孕，有乳房肿块、溃疡、疼痛、血性溢乳或乳房周围淋巴结肿大、疼痛等不适感觉或异常发现；</p>
                <p>2.  阴道不规则流血、白带异常、下腹痛等不适感觉或异常发现。</p>
                <p>如本人违反本承诺，则自愿放弃获得帮助；如造成北京轻松筹网络科技有限公司及其他行动会员损失的，本人自愿承担赔偿责任。</p>
            </div>
                <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-primary btn-lg" data-dismiss="modal">已阅读并同意</a> </div>
        </div>
    </div>
</div>
<div class="qsc-modal" id="convention" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog middle middle-max">
        <div class="modal-content clearfix">
            <div class="modal-header text-center"> 百倍爱心卡行动公约 </div>
                        <div class="modal-body">
                                <h4 class="text-center">第一章 前言</h4>
                                <p>2015年的政府工作报告中，李克强总理提到了“加强重特大疾病医疗救助，全面实施临时救助制度，让遇到急难特困的群众求助有门、受助及时。”可见医疗救助在保障公民的生存权、健康公平权领域起着不可替代的作用。</p>
                                <p>本项目就是根据该社会背景设立的，我们希望可以缓解当前医疗救助事业存在的诸多问题，使病患获得医疗上的经济援助，获得救治机会，重拾生活信心。</p>
                                <h4 class="text-center">第二章 释义</h4>
                                <p>“百倍爱心卡行动”是十大基金会中关村精准医学基金会，北京远程光明公益基金会，北京新康公益基金会等发起的重大疾病保障项目（以下简称“本项目”）。</p>
                                <p>《百倍爱心卡行动公约》（以下简称“本公约”）为需参与本项目的全体会员（以下简称“您”）共同遵守的规则。</p>
                                <p>您在确认加入本项目前请仔细阅读本公约，在您确认参与后即默认您已充分理解本公约的全部内容，并同意认真遵守本公约的权利义务。</p>
                                <p>会员：是平台会员与行动会员的统称。</p>
                                <p>平台会员：是指具有完全民事权利能力和民事行为能力，在百倍爱心卡完成注册流程的个人和团体。</p>
                                <p>行动会员：是指符合本项目参与条件并确认参与本项目的平台会员。</p>
                                <p>保障申请人：是指发生本项目约定的救助情形，需要获得其他会员救助的行动会员本人或其法定继承人。</p>
                                <p>保障金账户：行动会员向百倍爱心卡定向充值资金所存放的其在本项目的个人账户，充值后行动会员仅享有查看和继续续费的权利。</p>
                                <h4 class="text-center">第三章 公约效力</h4>
                                <p>1、平台会员符合本项目参与条件，确认参与并完成支付后即成为行动会员，本公约对所有会员均有法律效力。</p>
                                <p>2、北京远程视界集团提供相关技术服务，行动会员同时默认接受旗下运营平台（以下简称“百倍爱心卡平台”）内其他协议规则的约束。</p>
                                <p>3、百倍爱心卡有权根据实际情况随时修订本公约，并通过百倍爱心卡运营平台进行公示。变更后的条款公示后，即发生法律效力。您若对变更后的条款有任何异议，请及时退出该项目。如您继续使用本项目提供的服务，则表示您同意并接受新条款的约束。</p>
                                <p>4、 如您对本公约有任何疑问，应向百倍爱心卡咨询。您不应以未阅读或不接受本公约的内容为由，主张本公约无效或要求撤销本公约。</p>
                                <p>5、本项目属于创新型项目，可能会受到国家法律法规及政策的影响，导致本项目不能继续提供相应的服务，您成为行动会员时即表明您已充分了解本项目存在的风险，如因此使您遭受损失，您同意自行承担，百倍爱心卡不承担任何责任。</p>
                                <h4 class="text-center">第四章 参与标准</h4>
                                <p>6、行动会员加入条件：</p>
                                <p>（1）无条件向本项目支付200元；</p>
                                <p>（2）认同并承诺遵守本公约。</p>
                                <p>7、行动会员退出条件</p>
                                <p>（1）受到一次救助的行动会员，自动退出；</p>
                                <p>（2）满期一年，未按时续费，自动退出；</p>
                                <p>（3）本公约所规定的其他情况。</p>
                                <h4 class="text-center">第五章 保障内容</h4>
                                <p>8、行动会员年龄为45周岁以下，加入本项目90天后发生并被医院的专科医生确诊为本项目约定的心脏血管相关手术，且必须是在与北京远程视界合作的基地医院进行手术；该确诊行动会员将获得最高保障金额为10万元。</p>
                                <p>9、行动会员年龄为45周岁以上，加入本项目180天后发生并被医院的专科医生确诊为本项目约定的心脏血管相关手术，且必须是在与北京远程视界合作的基地医院进行手术；该确诊行动会员将获得最高保障金额为10万元。</p>
                                <p>10、本项目中“心脏相关手术”是指冠心病支架介入手术、心脏搭桥手术、心律失常介入射频消融手术</p>
                                <h4 class="text-center">第六章 会员的权利义务</h4>
                                <p>11、您有权查阅本项目公布的保障事件及活动信息。</p>
                                <p>12、您有权参与本项目存续过程中发生的各种保障事件或活动。</p>
                                <p>13、您有义务向百倍爱心卡提供真实准确的身份信息。 </p>
                                <p>14、您有义务保证不在项目运行过程中发布包含诈骗、非法、色情、淫秽、暴力等违反国家法律法规、政策的内容，不发表含有攻击性、侮辱性的言论。 </p>
                                <p>15、一旦出现保障申请人通过提供虚假资料和信息而获得保障的情形，您有权委托百倍爱心卡向保障申请人进行追偿。</p>
                                <p>16、您对本项目有批评权、建议权和监督权。</p>
                                <p>17、您应确保您在参与本项目时留下的注册信息、联系方式、银行卡信息是真实准确的，否则您将无法获得帮助。</p>
                                <p>18、行动会员应及时关注本项目的保障事件信息，自行了解保障流程，认真履行义务；不能以未收到本项目的通知为由要求百倍爱心卡承担任何责任。</p>
                                <p>19、一旦加入本项目，即视为您授权百倍爱心卡在相关行动会员符合保障条件时，向其提供相应的金额以用于保障事宜。</p>
                                <p>20、您应妥善保管在百倍爱心卡平台上注册的用户名和密码，凡使用您的用户名和密码登陆百倍爱心卡平台进行的一切操作，均视为您本人的行为，一切责任由您本人承担。</p>
                                <p>21、申请保障的行动会员有义务就保障事件提供真实完整的资料，否则将被取消获得保障的资格。</p>
                                <p>22、您同意百倍爱心卡可单方面判断并决定，如果您违反本公约或百倍爱心卡平台的规则，出现损害本项目和其他会员的行为，百倍爱心卡可随时终止您的密码、账号或某些服务的使用，并可将您在百倍爱心卡平台中留存的任何内容加以移除或删除，同时对您终止部分或全部服务。</p>
                                <p>23、您了解并同意百倍爱心卡在发现任何不适宜内容时，无需进行事先通知，可立即关闭或删除您的账户及其账户中所有相关信息及文件，并暂时或永久禁止您继续使用前述文件或账户。</p>
                                <p>24、您的账户因以上所述原因被终止使用或因停止运作等原因被关闭时，您无权要求百倍爱心卡退回个人保障金账户中金额。 </p>

                                <h4 class="text-center">第七章 百倍爱心卡权利义务</h4>
                                <p>25、百倍爱心卡不保证任何行动会员都能获得保障。 </p>
                                <p>26、百倍爱心卡有权制定各项保障条款并协助行动会员保障。</p>
                                <p>27、百倍爱心卡或其指定第三方有权对行动会员的保障申请进行审核，并最终决定申请会员是否可以获得保障。</p>
                                <p>28、百倍爱心卡对行动会员充值的资金进行管理。</p>
                                <p>29、在出现保障申请人通过提供虚假资料和信息而获得保障的情形时，百倍爱心卡有义务代全体行动会员向保障申请人追偿；但若未能全额追偿，百倍爱心卡无出资垫付的义务。</p>
                                <p>30、百倍爱心卡因客观或政策原因无法继续运作本项目，有权终止本项目。</p>
                                <p>31、百倍爱心卡为本项目提供技术服务，该服务可能会受到各个环节不稳定因素的影响。因此服务存在不可抗力、计算机病毒或黑客攻击、系统不稳定、会员所在地点以及其他任何技术、互联网络、通信线路原因等造成的服务中断或不能满足行动会员要求的风险，百倍爱心卡不作任何担保。对因此导致会员损失，百倍爱心卡不承担任何责任。</p>
                                <p>32、如百倍爱心卡平台的系统发生故障影响服务的正常运行，百倍爱心卡会在第一时间进行修复处理。但会员因此而产生的间接损失，百倍爱心卡不承担责任。此外，百倍爱心卡保留不经事先通知为维修保养、升级或其他目的暂停服务任何部分的权利。</p>
                                <p>33、会员公然侮辱他人或者捏造事实诽谤他人或的，或者进行其他恶意攻击的，百倍爱心卡有权不为该会员提供服务并有权追偿会员给造成的损失。</p>
                                <h4 class="text-center">第八章 终止和退出</h4>
                                <p>34、以下情形出现，本项目即终止:</p>
                                <p>不可抗力、政策因素致本项目终止的。</p>
                                <p>35、以下任一情形出现，您即退出本项目:</p>
                                <p>（1）您违反了国家法律法规、政策、本公约或百倍爱心卡平台发布的各类规则，百倍爱心卡平台终止为您提供服务的；</p>
                                <p>（2）您本人不同意接受本公约约定或百倍爱心卡平台发布的各类规则的；</p>
                                <p>（3）您不符合本公约规定的参与资格的。</p>
                                <p>36、本公约终止或您退出本公约，不影响您受本公约约束时所做的行为应承担的义务和责任。</p>
                                <p>37、 本公约的解释权归百倍爱心卡所有。</p>
                        </div>
            <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-primary btn-lg" data-dismiss="modal">已阅读并同意</a> </div>
        </div>
    </div>
</div>
<div id="payjson" style="display: none;"><?php echo ($payjson); ?></div>
<script type="text/template" id="J_observed_card_tpl">
    <table class="add-observed-card active" data-hash="" >
        <tbody>
        <tr>
            <td>姓名</td>
            <td class="weak">${Name}</td>
            <td class="wait-for-pay">待支付</td>
        </tr>
        <tr>
            <td>身份证</td>
            <td class="weak">${CertNo}</td>
            <td></td>
        </tr>
        </tbody>
    </table>
</script>
<script src="/weixin/Public/Member/js/huzhu/jquery.min.js"></script>
<script src="/weixin/Public/Member/js/huzhu/jweixin-1.0.0.js"></script>
<script>
    var redirect = function(url) {
        var dom = window.document.createElement('form');

        var parts = url.split('?');
        var action = parts[0];
        var query = parts[1];

        var paramArray = [];
        if (query) {
            paramArray = query.split('&');
        }

        dom.setAttribute('method', 'get');
        dom.setAttribute('action', action);
        dom.style.display = 'none';
        dom.style.visibility = 'hidden';

        var e, kv, k, v;
        for (var i = 0; i < paramArray.length; i++) {
            kv = paramArray[i].split('=');
            k = kv[0];
            v = kv[1] || '';
            e = window.document.createElement('input');

            e.setAttribute('type', 'hidden');
            e.setAttribute('name', decodeURIComponent(k));
            e.setAttribute('value', decodeURIComponent(v));

            dom.appendChild(e);
        }

        window.document.body.appendChild(dom);
        dom.submit();
    };

    $(function(){

        var isAPP = navigator.userAgent.indexOf('qsc_custom') !== -1
        $('.link-member').on('click',function(){
            var member = $(this).attr('data-member');
            if(!isAPP) {
                window.location = GlobalObj.host+'/member/'+member+'?insurance_uuid=9494537c-69e7-4008-8ee8-d87fb25302c5';
            } else {
                if (GlobalObj.isNewAppPolicy) {
                    window.location = 'qsc://qsc.policy/do/jump?url='+
                        encodeURIComponent(GlobalObj.host+'/member/'+member+'?insurance_uuid=9494537c-69e7-4008-8ee8-d87fb25302c5');
                } else {
                    window.location = 'qsc-social://qsc.policy/jump?url='+
                        encodeURIComponent(GlobalObj.host+'/member/'+member+'?insurance_uuid=9494537c-69e7-4008-8ee8-d87fb25302c5');
                }
            }
        });
		$('.convention').on('click', function(){
            $('#convention').show();
        });
		$('.modal-footer').on('click', function(){
            $('#convention').hide();
        });

		$('#link-health').on('click', function(){
            $('#modal-health').show();
        });
		$('.modal-footer').on('click', function(){
            $('#modal-health').hide();
        });

        $(".jzr_add").click(function(){
            var idcard = $(this).siblings('#person_idcard').val();
            var person_id = $(this).siblings('#person_id').val();
            var trueurl = "<?php echo U('Huzhu/huiyuanxinxi');?>&person_id="+person_id;
            var falseurl = "<?php echo U('User/jzr_update');?>&record_id="+person_id+"&huzhu=1";



            if(!isNumber(idcard))
            {
                if (confirm("身份证号码有误,请先去修改！") == true)
                {
                    window.location.href = falseurl;
                    return false;
                }

            }else{
                window.location.href = trueurl;
            }

        })
    });

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

    //保障人信息点击交互和总价的计算
    // (function(){
    //     //初始化
    //     //设置默认选中的长度
    //     var num = $('.add-observed-card').length;
    //     //设置单价
    //     var price = parseFloat($('#fee').html());
    //     //初始，全部选中，计算出总价
    //     $('#fee').html(num * price);

    //     $('.add-observed-card').each(function(){
    //         //开始每个都加上选中状态
    //         $(this).addClass('active');
    //         $(this).attr('onOff','true');
    //         $(".btn-block").addClass('btn-success');

    //         $(this).on('click',function(){
    //             if($(this).attr('onOff') != 'true'){
    //                 $(this).addClass('active');
    //                 $(this).attr('onOff','true');
    //                 num ++;
    //             }else{
    //                 $(this).removeClass('active');
    //                 $(this).attr('onOff','false');
    //                 num --;
    //             }

    //             $('.add-observed-card').each(function(){
    //                 if( $(this).attr('onOff') == 'true' ){
    //                     $(".btn-block").addClass('btn-success');
    //                     return false;
    //                 }else{
    //                     $(".btn-block").removeClass('btn-success');
    //                 }
    //             })
    //             //计算出每次的总价
    //             $('#fee').html(num * price);

    //         })
    //     })
    // })()

    (function(){
        //初始化
            var personId = 0;
            //第一个选中状态
        //     $('.add-observed-card').removeClass('active');
        //     $('.add-observed-card').eq(0).addClass('active');
        //     personId = $('.add-observed-card').eq(0).siblings('input').val();
        //     //判断被保障人是否为空
        //     if( $('.box_table').length !=0 ){
        //         $('#wechat-charge').addClass('btn-success');
        //     }else{
        //         $('#wechat-charge').addClass('btn-grey');
        //     }
        // //点击，每次只能选中一个
        // $('.add-observed-card').each(function(){
        //         $(this).on('click',function(){
        //                 $('.add-observed-card').each(function(){
        //                         $(this).removeClass('active');
        //                 });

        //                 $(this).addClass('active');
        //                 personId = $(this).siblings('input').val();
        //         })

        // });

        //点击支付按钮
        $('#wechat-charge').on('click',function(){
                var payjson = $("#payjson").text();
                if($(this).hasClass('btn-grey')) return;
                location.href="<?php echo U('Huzhu/huzhu_pay');?>&person_id="+personId+"&payjson="+payjson;
        })
    })()
</script>
<!-- CNZZ统计代码 -->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1259145768).'" width="0" height="0"/>';?></div>
</body>
</html>