$(function(){function c(){var a=0;document.documentElement&&document.documentElement.scrollTop?a=document.documentElement.scrollTop+150:document.body&&(a=document.body.scrollTop+150);$(".qust_contach").offset();var b=$(".qust_contach").height();80<a?(a=(document.documentElement.clientHeight-b)/2+a-80,$(".qust_contach").stop().animate({top:a},300,null,function(){$("#toTop").stop().animate({height:45})})):(a=(document.documentElement.clientHeight-b)/2-80,0>=a&&(a=100),$(".qust_contach").stop().animate({top:a},
300,null,function(){$("#toTop").stop().animate({height:0})}))}function d(){var a=0;document.documentElement&&document.documentElement.scrollTop?a=document.documentElement.scrollTop:document.body&&(a=document.body.scrollTop);$(".qust_show").offset();var b=$(".qust_show").height();80<a?a=(document.documentElement.clientHeight-b)/2+a-80:(a=(document.documentElement.clientHeight-b)/2-80,0>=a&&(a=100));$(".qust_show").stop().animate({top:a},300)}c();d();$(window).scroll(function(){c();d()});$(window).resize(function(){c();
d()});$(".qst_close").click(function(){$(".qust_contach").fadeOut(function(){$(".qust_show").fadeIn()})});$(".qust_show").click(function(){$(".qust_show").fadeOut(function(){$(".qust_contach").fadeIn()})});$("#toTop").click(function(){$(".qust_contach").stop().animate({top:100},300);jQuery("html, body").animate({scrollTop:0},300)})});