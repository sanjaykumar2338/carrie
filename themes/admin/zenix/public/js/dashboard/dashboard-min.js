!function(e){"use strict";var o=function(){e(window).width();return{init:function(){},load:function(){var e;e={series:catagory_counts,chart:{height:315,type:"radialBar"},plotOptions:{radialBar:{startAngle:-90,endAngle:90,dataLabels:{name:{fontSize:"22px"},value:{fontSize:"16px"}}}},stroke:{lineCap:"round"},labels:catagory_labels,colors:["#ec8153","#70b944","#498bd9","#6647bf"]},new ApexCharts(document.querySelector("#currentChart"),e).render(),function(){var e={series:[{name:"Users",data:users_count}],chart:{type:"line",height:300,toolbar:{show:!1}},plotOptions:{bar:{horizontal:!1,columnWidth:"70%",endingShape:"rounded"}},colors:["#886CC0"],dataLabels:{enabled:!1},markers:{shape:"circle"},legend:{show:!1},stroke:{show:!0,width:5,curve:"smooth",colors:["var(--primary)"]},grid:{borderColor:"#eee",show:!0,xaxis:{lines:{show:!0}},yaxis:{lines:{show:!1}}},xaxis:{categories:users_monthyear,labels:{style:{colors:"#7E7F80",fontSize:"13px",fontFamily:"Poppins",fontWeight:100,cssClass:"apexcharts-xaxis-label"}},crosshairs:{show:!1}},yaxis:{show:!0,forceNiceScale:!0,min:1,max:max_user_count,labels:{offsetX:-1,style:{colors:"#7E7F80",fontSize:"14px",fontFamily:"Poppins",fontWeight:100},formatter:function(e){return Math.round(e)}}},fill:{opacity:1,colors:"#FAC7B6"},tooltip:{y:{formatter:function(e){return e+" Users Added"}}}};new ApexCharts(document.querySelector("#revenueMap"),e).render()}()},resize:function(){}}}();jQuery(window).on("load",(function(){setTimeout((function(){o.load()}),1e3)}))}(jQuery);