<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="favicon.ico" rel="shortcut icon" />
<link rel="canonical" href="{$config_siteurl}" />
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<link href="{$config_siteurl}statics/EMath/css/normalize.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/EMath/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//全局变量
var GV = {
		DIMAUB: "{$config_siteurl}",
		JS_ROOT: "statics/js/"
};
</script>
<script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
<script src="{$config_siteurl}statics/EMath/js/w3cer.js" type="text/javascript"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/ajaxForm.js"></script>
<script src="{$config_siteurl}statics/EMath/js/SuperSlide.2.1.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		var nav = $(".nav-nav");
		var init = $(".nav-nav .m").eq(ind);
		var block = $(".nav-nav .nav-block");
		block.css({
			"left": init.position().left - 3
		});
		nav.hover(function() {},
			function() {
				block.stop().animate({
					"left": init.position().left - 3
				},
				500);
			});
		$(".nav-nav").slide({
			type: "menu",
			titCell: ".m",
			targetCell: ".sub",
			delayTime: 300,
			triggerTime: 0,
			returnDefault: true,
			defaultIndex: ind,
			startFun: function(i, c, s, tit) {
				block.stop().animate({
					"left": tit.eq(i).position().left - 3
				},
				500);
			}
		});
	});
	<?php $parentid = getCategory($catid,'parentid'); ?>
	var ind = 0;
</script>
</head>

<body>
<template file="Content/header.php"/>
<div class="bgc1">
<div class="bgc2">
<script language="javascript" src="http://maths.hust.edu.cn/index.php?a=index&m=Index&g=Formguide&formid=6&action=js"></script>
</div>
</div>
</body>
</html>