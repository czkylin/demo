<?php if (!defined('THINK_PATH')) exit();?><html class="ui-mobile">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<meta name="share-title" content="">
<link rel="apple-touch-icon-precomposed" href="http://weixin-yanke.yk2020.com/images/touch-icon.png" >
<!--CSS库文件-->
<link href="/weixin/Public/Common/css/commonIcon/icon.css" type="text/css" rel="stylesheet" />
<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link href="/weixin/Public/Common/css/commonLoadMore/loadMore.css" type="text/css" rel="stylesheet">

<!--CSS当前页面文件-->
<link href="/weixin/Public/Home/css/peixun/peixun.css" type="text/css" rel="stylesheet"/>
<!-- title -->
<title>培训</title>
<!--meta-->
</head>
<body>
<div class="main">
  <div class="cont_left">
     <div class="demo">
      <ul class="nav">
      <?php if(is_array($wk_level_list)): $i = 0; $__LIST__ = $wk_level_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="#" onclick="level1(<?php echo ($vo["RECORD1_ID"]); ?>)"><?php echo ($vo["LEVEL1_NAME"]); ?></a>
                <ul>
                    <?php if(is_array($vo["LEVEL2_INFO"])): $i = 0; $__LIST__ = $vo["LEVEL2_INFO"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="#" onclick="level2(<?php echo ($vo["RECORD1_ID"]); ?>,<?php echo ($v["RECORD2_ID"]); ?>)"><?php echo ($v["LEVEL2_NAME"]); ?></a>
                          <ul>
                             <?php if(is_array($v["LEVEL3_INFO"])): $i = 0; $__LIST__ = $v["LEVEL3_INFO"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li><a href="#" onclick="level3(<?php echo ($vo["RECORD1_ID"]); ?>,<?php echo ($v["RECORD2_ID"]); ?>,<?php echo ($data["RECORD3_ID"]); ?>)"><?php echo ($data["LEVEL3_NAME"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                          </ul>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
  <div class="con_right">
    <div class="tabCon xianshi" id="list">
        <ul id="wk-list">
            <?php if(is_array($wk_list)): $i = 0; $__LIST__ = $wk_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="show_con">
                <a href="/weixin/index.php?m=Home&c=Train&a=info&wk_id=<?php echo ($vo['WK_ID']); ?>">
                <img src="<?php echo ($vo["WK_IMG"]); ?>">
                <div class="show_right">
                  <h2><?php echo ($vo["WK_NAME"]); ?>&nbsp;&nbsp;(<?php echo ($vo["LEVEL1_NAME"]); ?>)</h2>
                  <div class="con_miaoshu">
                      <span class="name"><?php echo ($vo["CREATE_NAME"]); ?></span><span class="tuijian"><i class="ui-icon-voice"></i><b>推荐语音</b></span><span class="guanli"><?php echo ($vo['CREATE_DATE']); ?></span>
                  </div>
                  <table>
                    <tbody>
                      <tr>
                        <td><i class="ui-icon-like"></i><?php echo ($vo["DZ_NUM"]); ?> 赞 </td>
                        <td><i class="ui-icon-comment"></i><?php echo ($vo["REPLY_NUM"]); ?> 评论 </td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php if($num < 15): ?><div class="ui-jiazai"><a href="javascript:void(0);">暂无更多</a></div>
        <?php else: ?>
            <div class="ui-jiazai"><a href="javascript:void(0);" onclick="load_more('','','');">加载更多</a></div><?php endif; ?>
    </div>
    
    <div id="current_pagenum" style="display:none">2</div>
  </div>
</div>
<!--微信全国心脑远程联盟  cnzz统计代码，修改日期2016.07.29郑洁-->
<div style="height:0px;overflow:hidden;"><?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1260047007).'" width="0" height="0"/>';?></div>
</body>
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<script src="/weixin/Public/Common/js/load_more.js" type="text/javascript"></script>
<script type="text/javascript" src="/weixin/Public/Home/js/peixun/accordion.js"></script>
<script>


$(function(){
   $(".nav").accordion({
        //accordion: true,
        speed: 500,
      closedSign: '[+]',
    openedSign: '[-]'
  });
}); 

function load_more(level1,level2,level3)
{
    loadmore('#current_pagenum','/weixin/index.php?m=Home&c=Train&a=index_append&level1='+level1+'&level2='+level2+'&level3='+level3,'#wk-list');
}

//等级一
function level1(level1) 
{
    $.ajax({
        url : "/weixin/index.php?m=Home&c=Train&a=index_list",
        data:{"level1":level1},
        type: "get",
        async: true,
        success:function(data)
        {   
            $("#list").html('');
            $(".ui-jiazai").html('');
            $("#current_pagenum").text("2");
            var h = '';
            h += '<ul id="wk-list">';
            var len = data.length;
            for(var i=0;i<len;i++)
            {
                h += '<li class="show_con">';
                h += '<a href="/weixin/index.php?m=Home&c=Train&a=info&wk_id='+data[i].WK_ID+'">';
                h += '<img src="'+data[i].WK_IMG+'">';
                h += '<div class="show_right">';
                h += '<h2>'+data[i].WK_NAME+'&nbsp;&nbsp;('+data[i].LEVEL2_NAME+')</h2>';
                h += '<div class="con_miaoshu">';
                h += '<span class="name">'+data[i].CREATE_NAME+'</span><span class="tuijian"><i class="ui-icon-voice"></i><b>推荐语音</b></span><span class="guanli">'+data[i].CREATE_DATE+'</span>';
                h += '</div>';
                h += '<table>';
                h += '<tbody>';
                h += '<tr>';
                if(!data[i].DZ_NUM)
                {
                    h += '<td><i class="ui-icon-like"></i>赞 </td>';
                }
                else
                {
                    h += '<td><i class="ui-icon-like"></i>'+data[i].DZ_NUM+'赞 </td>';
                }
                
                if(!data[i].REPLY_NUM)
                {
                    h += '<td><i class="ui-icon-comment"></i>评论 </td>';
                }
                else
                {
                    h += '<td><i class="ui-icon-comment"></i>'+data[i].REPLY_NUM+'评论 </td>';
                }
                
                h += '</tr>';
                h += '</tbody>';
                h += '</table>';
                h += '</div>';
                h += '</a>';
                h += '</li> ';
                
            }
            h += '</ul>';
            if(len <= 20)
            {
                h += '<div class="ui-jiazai"><a href="javascript:void(0);">暂无更多</a></div>';
            }
            else
            {
                h += '<div class="ui-jiazai"><a href="javascript:void(0);" onclick="load_more('+level1+',0,0);">加载更多</a></div>';
            }
            $("#list").append(h);
        }
    });
}

//级别二
function level2 (level1,level2) 
{
    $.ajax({
        url : "/weixin/index.php?m=Home&c=Train&a=index_list",
        data:{"level1":level1,"level2":level2},
        type: "get",
        async: true,
        success:function(data)
        {
            $("#list").html('');
            $(".ui-jiazai").html('');
            $("#current_pagenum").text("2");
            var h = '';
            h += '<ul id="wk-list">';
            var len = data.length;
            for(var i=0;i<len;i++)
            {
                h += '<li class="show_con">';
                h += '<a href="/weixin/index.php?m=Home&c=Train&a=info&wk_id='+data[i].WK_ID+'">';
                h += '<img src="'+data[i].WK_IMG+'">';
                h += '<div class="show_right">';
                if(!data[i].LEVEL3_NAME)
                {
                    h += '<h2>'+data[i].WK_NAME+'</h2>';
                }else{

                    h += '<h2>'+data[i].WK_NAME+'&nbsp;&nbsp;('+data[i].LEVEL3_NAME+')</h2>';
                }
                h += '<div class="con_miaoshu">';
                h += '<span class="name">'+data[i].CREATE_NAME+'</span><span class="tuijian"><i class="ui-icon-voice"></i><b>推荐语音</b></span><span class="guanli">'+data[i].CREATE_DATE+'</span>';
                h += '</div>';
                h += '<table>';
                h += '<tbody>';
                h += '<tr>';
                if(!data[i].DZ_NUM)
                {
                    h += '<td><i class="ui-icon-like"></i>赞 </td>';
                }
                else
                {
                    h += '<td><i class="ui-icon-like"></i>'+data[i].DZ_NUM+'赞 </td>';
                }
                
                if(!data[i].REPLY_NUM)
                {
                    h += '<td><i class="ui-icon-comment"></i>评论 </td>';
                }
                else
                {
                    h += '<td><i class="ui-icon-comment"></i>'+data[i].REPLY_NUM+'评论 </td>';
                }
                h += '</tr>';
                h += '</tbody>';
                h += '</table>';
                h += '</div>';
                h += '</a>';
                h += '</li> ';
                
            }
            
            h += '</ul>';
            if(len <= 20)
            {
                h += '<div class="ui-jiazai"><a href="javascript:void(0);">暂无更多</a></div>';
            }
            else
            {
                h += '<div class="ui-jiazai"><a href="javascript:void(0);" onclick="load_more('+level1+','+level2+',0);">加载更多</a></div>';
            }
            $("#list").append(h);
        }
    });
}
//级别三
function level3 (level1,level2,level3) 
{
    $.ajax({
        url : "/weixin/index.php?m=Home&c=Train&a=index_list",
        data:{"level1":level1,"level2":level2,"level3":level3},
        type: "get",
        async: true,
        success:function(data)
        {
            $("#list").html('');
            $(".ui-jiazai").html('');
            $("#current_pagenum").text("2");
            var h = '';
            h += '<ul id="wk-list">';
            var len = data.length;
            for(var i=0;i<len;i++)
            {
                h += '<li class="show_con">';
                h += '<a href="/weixin/index.php?m=Home&c=Train&a=info&wk_id='+data[i].WK_ID+'">';
                h += '<img src="'+data[i].WK_IMG+'">';
                h += '<div class="show_right">';
                h += '<h2>'+data[i].WK_NAME+'</h2>';
                h += '<div class="con_miaoshu">';
                h += '<span class="name">'+data[i].CREATE_NAME+'</span><span class="tuijian"><i class="ui-icon-voice"></i><b>推荐语音</b></span><span class="guanli">'+data[i].CREATE_DATE+'</span>';
                h += '</div>';
                h += '<table>';
                h += '<tbody>';
                h += '<tr>';
                if(!data[i].DZ_NUM)
                {
                    h += '<td><i class="ui-icon-like"></i>赞 </td>';
                }
                else
                {
                    h += '<td><i class="ui-icon-like"></i>'+data[i].DZ_NUM+'赞 </td>';
                }
                
                if(!data[i].REPLY_NUM)
                {
                    h += '<td><i class="ui-icon-comment"></i>评论 </td>';
                }
                else
                {
                    h += '<td><i class="ui-icon-comment"></i>'+data[i].REPLY_NUM+'评论 </td>';
                }
                h += '</tr>';
                h += '</tbody>';
                h += '</table>';
                h += '</div>';
                h += '</a>';
                h += '</li> ';
                
            }

            h += '</ul>';
            if( len <= 20)
            {
                h += '<div class="ui-jiazai"><a href="javascript:void(0);">暂无更多</a></div>';
            }
            else
            {
                h += '<div class="ui-jiazai"><a href="javascript:void(0);" onclick="load_more('+level1+','+level2+','+level3+');">加载更多</a></div>';
            }
            
            $("#list").append(h);
        }
    });
}


</script>
</html>