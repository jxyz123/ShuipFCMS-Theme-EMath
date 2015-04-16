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
	<script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
	<script src="{$config_siteurl}statics/EMath/js/w3cer.js" type="text/javascript"></script>
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
					100);
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
					100);
				}
			});
		});
		<?php $parentid = getCategory($catid,'parentid'); ?>
		var ind = <if condition="$catid lt 8">{$catid}<elseif condition="$parentid lt 8"/>{$parentid}<else />{:getCategory($parentid,'parentid')}</if>;
	</script>
</head>

<body>
	<template file="Content/header.php"/>
	<div class="bgc1">
		<div class="bgc2">
			<!--map and search-->
			<div class="map mb-b-10"><span class="home-ico">当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a><if condition="($catid neq 9) AND ($catid neq 10)"> &gt; <navigate catid="$catid" space=" &gt; " /></if></span>
				<p style="float:right;padding-right:15px;"></p>
				<form  name="formsearch" class="form" action="{:U('Search/Index/index')}" method="post">
					<input type="text" name="q" size="24" class="search-keyword"  id="inputString" class="f-text" x-webkit-speech /><input type="submit" class="search-submit"  id="search-submit" value="搜 索" />
					<div class="suggestionsBox" id="suggestions" style="display: none;">
						<div class="suggestionList">
							<ul id="autoSuggestionsList">
							</ul>
						</div>
					</div>
				</form>
			</div>
			<!--map and search end-->
			<div class="list-col mg-b-10">
				<div class="list-col1 pull-left">
					<!--左侧导航-->
					<div class="menu menu-stacked mg-b-10">
						<ul>
							<li class="active"><a href="{:getCategory($catid,'url')}">{:getCategory($catid,'catname')}</a></li>
							<li><a href="{$Config_siteurl}index.php?a=lists&catid=24">新闻动态</a></li>
							<li><a href="{$Config_siteurl}index.php?a=lists&catid=25">通知公告</a></li>
							<li><a href="{$Config_siteurl}index.php?a=shows&catid=26&id=17">党总支委员会</a></li>
							<li><a href="{$Config_siteurl}index.php?a=shows&catid=27&id=18">工会委员会</a></li>
						</ul>
					</div>
					<!--左侧导航 end-->
					<div class="hot-tj pull-left mg-t-10">
						<h2><span class="h2-txt">热点关注</span></h2>
						<ul>
							<content action="hits" catid="$catid"  order="weekviews DESC" num="10">
								<volist name="data" id="vo">
									<li><a href="{$vo.url}" title="{$vo.title}">{$vo.title|str_cut=###,12}</a></li>
								</volist>
							</content>
						</ul>
					</div>
				</div>
				<!--右侧内容列表-->
				<div class="list-col2 pull-right">
					<div class="lanmu2 mg-t-10">
						<div class="lanmu2-top">
							<h2><span class="h2-text">{:getCategory($catid,'catname')}</span></h2>
						</div>
						<div class="lanmu2-bottom">
							<div class="lanmu-con">
								<div class="lanmu-txt">
									<ul>
										<content action="lists" catid="$catid"  order="updatetime DESC" num="18" page="$page" page_tpl="共{recordcount}条 {first}{prev}{liststart}{list}{listend}{next}{last}">
											<volist name="data" id="vo">
												<li><a href="{$vo.url}" title="{$vo.title}" target="_blank"><span>{$vo.updatetime|date="20y-m-d",###}</span>{$vo.title|str_cut=###,40}</a></li>
											</volist>
									</ul>
									<ul>
										<div class="pagination">
											<ul >
												{$pages}
											</ul>
										</content>
									</ul>
									</div>
									<div style="clear:both"></div>
								</div>
							</div>
						</div>
					</div>
					<!--右侧内容列表 end-->
					<div style="clear:both"></div>
				</div>
			</div>
		</div>
		<template file="Content/footer.php"/>
		<script type="text/javascript">$(function (){$(window).toTop({showHeight : 100,});});</script>
	</body>
	</html>