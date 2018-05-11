<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="cache-control" content="public">
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<script src="/weixin/Public/Member/js/echarts.min.js"></script>
<script src="/weixin/Public/Common/js/jquery.min.js" type="text/javascript"></script>
<link href="/weixin/Public/Common/css/common/base.css" type="text/css" rel="stylesheet" >
<link rel="stylesheet" href="/weixin/Public/Member/css/user/dangan_yitiji.css">
<title>一体机健康报告</title>
</head>
<body>
	<div class="header">
		<img src="/weixin/Public/Member/images/user/yitiji.jpg" alt="">
	</div>
	<!--血糖-->
	<div class="con">
		<h2 class="tit1">血糖<a href="<?php echo U('dangan_detail',array('tj_type'=>0,member_mobile=>$member_mobile));?>">详情</a></h2>
		<p>餐前血糖在3.9~6.1是正常，餐后小于7.8是正常</p>
		<div class="chart" id="chart0">
			<div id="main1" style="height:240px"></div>
			<ul class="biaozhu">
		    	<li><span></span><i>偏高</i></li>
		    	<li><span></span><i>正常</i></li>
		    	<li><span></span><i>偏低</i></li>
		    </ul>
			<script>
				// 基于准备好的dom，初始化echarts图表
		        var myChart1 = echarts.init(document.getElementById('main1'));

		        //设置参数
		        var option1 = {
				    title : {
				        text: '',
				        subtext: ''
				    },
				    dataRange:{
				    	splitList:[
				    		{start:6.1,color:'#eb4645'},
				    		{statr:3.9,end:6.1,color:'#2ec6ae'},
				    		{end:3.9,color:'#f9b573'}
				    	],
				    	show:false
				    },
				    xAxis : [
				        {	
				        	show:false,
				            type : 'category',
				            boundaryGap : false,
				            //横坐标数据
				            data : [1,2,3,4,5,6],
				            //分割线
				            splitLine:{
				            	show:false
				            }
				        }
				    ],
				    yAxis : [
				        {	
				        	name:'',
				            type : 'value',
				            axisLine:{
				            	show:false
				            },
				            //分割线
				            splitLine:{
				            	show:true,
				            	lineStyle:{
				            		color: ['#d9d9d9'],
								    width: 1,
								    type: 'dashed'
				            	}
				            },
				            //分割段数
				            splitNumber:2
				        }
				    ],
				    series : [
				        {
				            name:'',
				            type:'line',
				            symbol:'emptyCircle',
				            symbolSize:10,
				            smooth:true,
				            //需要动态传入的数据
				            data:[<?php echo ($info["GLUCOSE"]["GLUCOSE"]); ?>],
				            markPoint:{},
				            markLine : {
				                data : [
				                    /*{type : 'average', name: '平均值'}*/
				                ]
				            },
				            //图形样式，可设置图表内图形的默认样式和强调样式
				            itemStyle:{
				            	normal:{
				            		lineStyle:{
						            	color: '#9fe2d9'
						            },
						            areaStyle:{
						            	type : 'default',
						            	color : 'rgba(245,253,252,0.5)'
						            },
						            label : {
						            	show:true
						            }	
				            	}  	
				            }	
				           
				        }
				    ]
				};

		        // 为echarts对象加载数据 
		        myChart1.setOption(option1); 
			</script>
		</div>
	</div>
	<!--血氧-->
	<div class="con">
		<h2 class="tit2">血氧<a href="<?php echo U('dangan_detail',array('tj_type'=>1,member_mobile=>$member_mobile));?>">详情</a></h2>
		<p>正常人体动脉血的血氧饱和度为98% 静脉血为75%</p>
		<div class="chart" id="chart1">
			<div id="main2" style="height:240px"></div>
			<script>
				// 基于准备好的dom，初始化echarts图表
		        var myChart2 = echarts.init(document.getElementById('main2'));

		        //设置参数
		        var option2 = {
				    title : {
				        text: '',
				        subtext: ''
				    },
				    legend: {
				        data:['血氧饱和度','静脉血']
				    },
				    xAxis : [
				        {
				            type : 'category',
				            data : [],
				            // data:getDate()
				        }
				    ],
				    yAxis : [
				        {
				            type : 'value'
				        }
				    ],
				    series : [
				        {
				            name:'血氧饱和度',
				            type:'bar',
				            data:[<?php echo ($info["BLOODOXYGEN"]["OXYGEN"]); ?>],
				            markPoint : {
				                
				            },
				            markLine : {
				              
				            },
				            itemStyle: {
							    normal: {
							       color:'#8f82bc'
							    }
							},
							barGap:0
				        },
				        {
				            name:'静脉血',
				            type:'bar',
				            data:[<?php echo ($info["BLOODOXYGEN"]["PULSERATE"]); ?>],
				            markPoint : {

				            },
				            markLine : {
				              
				            },
				            itemStyle: {
							    normal: {
							       color:'#f19149'
							    }
							},
							barGap:0
				        }
				    ]
				};
		                    
		        // 为echarts对象加载数据 
		        myChart2.setOption(option2);

		        //获取最近6天的数据
		        function getDate(){
		        	//设置日期，当前日期的前6天
					var myDate = new Date(); //获取今天日期
					myDate.setDate(myDate.getDate() - 5);
					var dateArray = []; 
					var dateTemp; 
					var flag = 1; 
					for (var i = 0; i < 6; i++) {
					    dateTemp = (myDate.getMonth()+1)+"月"+myDate.getDate() + "日";
					    dateArray.push(dateTemp);
					    myDate.setDate(myDate.getDate() + flag);
					}
					dateArray.reverse();
					return dateArray;
		        }
			</script>
		</div>
	</div>
	<!--血压-->
	<div class="con">
		<h2 class="tit3">血压<a href="<?php echo U('dangan_detail',array('tj_type'=>2,member_mobile=>$member_mobile));?>">详情</a></h2>
		<p style="height:auto;">舒张压<85mmHg <br>收缩压<139mmHg</p>
		<div class="chart"  id="chart2">
			<div id="main3" style="height:300px"></div>
    		<ul class="biaozhu">
		    	<li><span></span><i>偏高</i></li>
		    	<li><span></span><i>正常</i></li>
		    	<li><span></span><i>偏低</i></li>
		    </ul>
    		<ul class="biaozhu">
		    	<li><em></em><i>舒张压</i></li>
		    	<li><em></em><i>收缩压</i></li>
		    </ul>
    		<script>
    			// 基于准备好的dom，初始化echarts图表
    			//收缩压范围
		        var myChart3 = echarts.init(document.getElementById('main3'));

		        //设置参数
		        var option3 = {
				    title : {
				        text: '',
				        subtext: ''
				    },
				    //X轴
				    xAxis : [
				        {	
				        	show:false,
				            type : 'category',
				            boundaryGap : false,
				            data : [1,2,3,4,5,6],
				            //分割线
				            splitLine:{
				            	show:false
				            }
				        }
				    ],
				    //Y轴
				    yAxis : [
				        {	
				        	name:'',
				            type : 'value',
				            // axisLabel : {
				            //     formatter: '{value} mmol/L'
				            // },
				            axisLine:{
				            	show:false
				            },
				            //分割线
				            splitLine:{
				            	show:true,
				            	lineStyle:{
				            		color: ['#d9d9d9'],
								    width: 1,
								    type: 'dashed'
				            	}
				            },
				            min:0,
				            max:150,
				            //分割段数
				            splitNumber:3
				        }
				    ],
				    //数据
				    series : [
				    	//收缩压范围
				        {
				            name:'收缩压范围',
				            type:'line',
				            symbol:'emptyCircle',
				            symbolSize:10,
				            smooth:true,
				            data:[<?php echo ($info["BLOODPRESSURE"]["SYSTOLIC"]); ?>],
				            markPoint:{},
				            markLine : {
				                data : [
				                    /*{type : 'average', name: '平均值'}*/
				                ]
				            },
				            //图形样式，可设置图表内图形的默认样式和强调样式
				            itemStyle:{
				            	normal:{
				            		lineStyle:{
						            	color: '#0c943f'
						            },
						            label : {
						            	show:true
						            },
						            color:function( value ){
						            	if(parseFloat(value.data) <= 90){
		                                    return '#fab875';
		                                }else if(parseFloat(value.data) <= 140 && parseFloat(value.data) >= 90){
		                                    return '#11bca2';
		                                }else{
		                                    return '#ea4847';
		                                }
						            }		
				            	}  	
				            }
				        },
				        //舒张压范围
				        {
				            name:'舒张压范围',
				            type:'line',
				            symbol:'emptyCircle',
				            symbolSize:10,
				            smooth:true,
				            data:[<?php echo ($info["BLOODPRESSURE"]["DIASTOLIC"]); ?>],
				            markPoint 	: {
				                
				            },
				            markLine : {
				               
				            },
				            //图形样式，可设置图表内图形的默认样式和强调样式
				            itemStyle:{
				            	normal:{
				            		lineStyle:{
						            	color: '#edc900'
						            },
						            label : {
						            	show:true
						            },
						            color:function( value ){
						            	if(parseFloat(value.data) <= 60){
		                                    return '#fab875';
		                                }else if(parseFloat(value.data) <= 90 && parseFloat(value.data) >= 60){
		                                    return '#11bca2';
		                                }else{
		                                    return '#ea4847';
		                                }
						            }	
				            	}  	
				            }	
				        }
				    ]
				};

		        // 为echarts对象加载数据 
		        myChart3.setOption(option3);
    		</script>
		</div>
	</div>
	<!--心率-->
	<div class="con">
		<h2 class="tit4">心率<?php echo ($jk_info["0"]["ECG"]["0"]["HR"]); ?>次/分<a href="<?php echo U('dangan_detail',array('tj_type'=>3,member_mobile=>$member_mobile));?>">详情</a></h2>
		<p><?php if($jk_info[0]['ECG'][0]['EXAMTIME'] != '' ): echo (Dtodiy("m月d日 H:i",$jk_info["0"]["ECG"]["0"]["EXAMTIME"])); endif; ?></p>
		<div class="chart"  id="chart3">
			<img src="/weixin/Public/Member/images/user/xinlv.jpg" style="width:100%; margin:20px auto;">
		</div>
	</div>
	<!--身高体重-->
	<div class="con">
		<h2 class="tit5">身高<?php echo ($jk_info["0"]["HEIGHTWEIGHT"]["0"]["HEIGHT"]); ?>厘米、体重<?php echo ($jk_info["0"]["HEIGHTWEIGHT"]["0"]["WEIGHT"]); ?>公斤<a href="<?php echo U('dangan_detail',array('tj_type'=>4,member_mobile=>$member_mobile));?>">详情</a></h2>
		<p><?php if($jk_info[0]['HEIGHTWEIGHT'][0]['EXAMTIME'] != '' ): echo (Dtodiy("m月d日 H:i",$jk_info["0"]["HEIGHTWEIGHT"]["0"]["EXAMTIME"])); endif; ?>
			</p>
		<div class="chart"  id="chart4">
			<p>身高</p>
		    <div id="main4-1" style="height:100px;"></div>
		    <p>体重</p>
		    <div id="main4-2" style="height:100px;"></div>
		</div>
		<script>
			//身高
			var myChart4_1 = echarts.init(document.getElementById('main4-1'));
			var option4_1 = {
	            title: {
	                text: '',
	                subtext: ''
	            },
	            legend: {
	                data:['']
	            },
	            xAxis:  {
	                type: 'category',
	                show: false, 
	                axisLine: {
	                  show: false  
	                },
	                data:["", "", "", "", "", ""],
	                boundaryGap: false
	            },
	            yAxis: {
	                show: false,
	                type: 'value',
	                axisLine: {
	                  show: false  
	                },
	                axisLabel: {
	                    formatter: '{value} cm'
	                },
	                splitLine:{
	                    show:true,
	                    lineStyle:{
	                        color: ['#d9d9d9'],
	                        type: 'dashed'
	                    }
	                },
	                splitNumber:1
	            },
	            textStyle: {
	                color: '#333'
	            },
	            series: [
	                {
	                    name:'',
	                    type:'line',
	                    symbol:'circle',
	                    symbolSize:10,
	                    //smooth:true,
	                    data:[<?php echo ($info["HEIGHTWEIGHT"]["HEIGHT"]); ?>],
	                    color: 'red',
	                    itemStyle: {
	                        normal: {
	                            color: function (value){
	                               return '#11bca2';
	                            },
	                            lineStyle: {
	                                color: '#17b56c',
	                            }
	                        }
	                    },
	                    markPoint: {
	                    },
	                    markLine: {
	                        data: [
	                            
	                        ]
	                    }
	                }
	            ]
	        };
	        myChart4_1.setOption(option4_1);
	        //体重
	        var myChart4_2 = echarts.init(document.getElementById('main4-2'));
	        var option4_2 = {
	            title: {
	                text: '',
	                subtext: ''
	            },
	            legend: {
	                data:['']
	            },
	            xAxis:  {
	                type: 'category',
	                show: false, 
	                axisLine: {
	                  show: false  
	                },
	                data:["", "", "", "", "", ""],
	                boundaryGap: false
	            },
	            yAxis: {
	                show: false,
	                type: 'value',
	                axisLine: {
	                  show: false  
	                },
	                axisLabel: {
	                    formatter: '{value} cm'
	                },
	                splitLine:{
	                    show:true,
	                    lineStyle:{
	                        color: ['#d9d9d9'],
	                        type: 'dashed'
	                    }
	                },
	                splitNumber:1
	            },
	            textStyle: {
	                color: '#333'
	            },
	            series: [
	                {
	                    name:'',
	                    type:'line',
	                    symbol:'circle',
	                    symbolSize:10,
	                    //smooth:true,
	                    data:[<?php echo ($info["HEIGHTWEIGHT"]["WEIGHT"]); ?>],
	                    color: 'red',
	                    itemStyle: {
	                        normal: {
	                            color: function (value){
	                               return '#11bca2';
	                            },
	                            lineStyle: {
	                                color: '#17b56c',
	                            }
	                        }
	                    },
	                    markPoint: {
	                    },
	                    markLine: {
	                        data: [
	                            
	                        ]
	                    }
	                }
	            ]
	        };
	        myChart4_2.setOption(option4_2);
		</script>
	</div>
	<!--尿常规-->
	<div class="con">
		<h2 class="tit6">尿常规<a href="<?php echo U('dangan_detail',array('tj_type'=>5,member_mobile=>$member_mobile));?>">详情</a></h2>
		<p style="margin-bottom:10px;">
			<?php if($jk_info[0]['URINE'][0]['EXAMTIME'] != '' ): echo (Dtodiy("m月d日 H:i",$jk_info["0"]["URINE"]["0"]["EXAMTIME"])); endif; ?></p>
		<div class="chart"  id="chart5">
			<ul class="niao clear">
				<li class="ndy">
					<span>尿胆原</span>
					<i><?php echo ($info["URINE"]["URO"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="qx">
					<span>潜血</span>
					<i><?php echo ($info["URINE"]["BLD"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="dhs">
					<span>胆红素</span>
					<i><?php echo ($info["URINE"]["BIL"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="tt">
					<span>酮体</span>
					<i><?php echo ($info["URINE"]["KET"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="ptt">
					<span>葡萄糖</span>
					<i><?php echo ($info["URINE"]["GLU"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="dbz">
					<span>蛋白质</span>
					<i><?php echo ($info["URINE"]["PRO"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="ph">
					<span>PH</span>
					<i><?php echo ($info["URINE"]["PH"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="xsy">
					<span>亚硝酸盐</span>
					<i><?php echo ($info["URINE"]["NIT"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="bxb">
					<span>白细胞</span>
					<i><?php echo ($info["URINE"]["WBC"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="bz">
					<span>比重</span>
					<i><?php echo ($info["URINE"]["SG"]); ?></i>
					<i></i>
					<i></i>
				</li>
				<li class="wss">
					<span>维生素C</span>
					<i><?php echo ($info["URINE"]["VC"]); ?></i>
					<i></i>
					<i></i>
				</li>
			</ul>
		</div>
		<script>
			//尿胆原取值
			$(".ndy").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== 'Normal'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}
					
			});
			//潜血
			$(".qx").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '-'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}
					
			});
			//胆红素
			$(".dhs").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '-'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}
					
			});
			//酮体
			$(".tt").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '-'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}
					
			});
			//葡萄糖
			$(".ptt").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '-'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}	
			});
			//蛋白质
			$(".dbz").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '-'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}
					
			});
			//PH
			$(".ph").each(function(){
				var shuzhi = parseFloat($(this).find('i').eq(0).html());
				if(shuzhi){
					if(shuzhi <4.6){
						$(this).addClass("color_jg");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('偏酸');
					}else if( shuzhi > 8.0){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('偏碱');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}	
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}
					
			})
			//亚硝酸盐
			$(".xsy").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '-'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}
					
			});
			//白细胞
			$(".bxb").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '-'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}
					
			});
			//比重
			$(".bz").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '&gt;=1.030'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}	
			});
			//维生素
			$(".wss").each(function(){
				var shuzhi = $(this).find('i').eq(0).html();
				if(shuzhi){
					if(shuzhi !== '-'){
						$(this).addClass("color_ts");
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('异常');
					}else{
						$(this).find('i').eq(1).html(shuzhi);
						$(this).find('i').eq(2).html('正常');
					}
				}else{
					$(this).find('i').eq(2).html('暂无数据');
				}	
			});
		</script>
	</div>
	<!--体温-->
	<div class="con">
		<h2 class="tit7">体温<a href="<?php echo U('dangan_detail',array('tj_type'=>6,member_mobile=>$member_mobile));?>">详情</a></h2>
		<p>
			<?php if($jk_info[0]['TEMPERATURE'][0]['EXAMTIME'] != '' ): echo (Dtodiy("m月d日 H:i",$jk_info["0"]["TEMPERATURE"]["0"]["EXAMTIME"])); endif; ?>
		</p>
		<div class="chart"  id="chart6">
			<div id="main5" style="height:250px;"></div>
			<script>
				// 基于准备好的dom，初始化echarts实例
		        var myChart5 = echarts.init(document.getElementById('main5'));
		        // 指定图表的配置项和数据
		        var option5 = {
		            title: {
		                text: '',
		                subtext: ''
		            },
		            legend: {
		                data:['']
		            },
		            xAxis:  {
		                type: 'category',
		                show: false, 
		                axisLine: {
		                  show: false  
		                },
		                data:[<?php echo ($info["TEMPERATURE"]["TEMPERATURE"]); ?>],
		                boundaryGap: false
		            },
		            yAxis: {
		                //show: false,
		                type: 'value',
		                axisLine: {
		                  show: false  
		                },
		                axisLabel: {
		                    formatter: '{value} °C'
		                },
		                splitLine:{
		                    show:true,
		                    lineStyle:{
		                        color: ['#d9d9d9'],
		                        type: 'dashed'
		                    }
		                },
		                splitNumber:1
		            },
		            textStyle: {
		                color: '#333'
		            },
		            series: [
		                {
		                    name:'',
		                    type:'line',
		                    symbol:'circle',
		                    symbolSize:10,
		                    //smooth:true,
		                    data:[<?php echo ($info["TEMPERATURE"]["TEMPERATURE"]); ?>],
		                    color: 'red',
		                    itemStyle: {
		                        normal: {
		                            color: function (value){
		                               //console.log(parseFloat(value.data));
		                                if(parseFloat(value.data) >= 37.3 && parseFloat(value.data)<38.5){
		                                    return '#ea4847';
		                                }else if(parseFloat(value.data) >=38.5){
		                                    return '#a10050';
		                                }else if(parseFloat(value.data)>36 && parseFloat(value.data)<37.3 ){
		                                	return '#11bca2';
		                                }else{
		                                	return '#ff8f20';
		                                }
		                            },
		                            lineStyle: {
		                                color: '#17b56c',
		                            },
		                            label : {
						            	show:true
						            }
		                        }
		                    },
		                    markPoint: {
		                    },
		                    markLine: {
		                        data: [
		                            
		                        ]
		                    }
		                }
		            ]
		        };


		        // 使用刚指定的配置项和数据显示图表。
		        myChart5.setOption(option5);
		        $('#main5').find('canvas').css('margin-left','10px');
			</script>
		</div>
	</div>
</body>
</html>