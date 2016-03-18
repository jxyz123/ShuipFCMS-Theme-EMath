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
var ind = <if condition="$catid lt 8">{$catid}<elseif condition="$parentid lt 8"/>{$parentid}<else />{:getCategory($parentid,'parentid')}</if>;
</script>
</head>

<body>
<template file="Content/header.php"/>
<div class="bgc1">
<div class="bgc2">
<!--map and search-->
<div class="map mb-b-10"><span class="home-ico">当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a><if condition="($catid neq 9) AND ($catid neq 10) AND ($catid neq 74)"> &gt; <navigate catid="$catid" space=" &gt; " /></if></span>
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
				<if condition="($catid neq 9) AND ($catid neq 10) AND ($catid neq 74)">
						<li class="active"><a href="{:getCategory(getCategory($catid,'parentid'),'url')}">{:getCategory(getCategory($catid,'parentid'),'catname')}</a></li>
						<content action="category" catid="$parentid"  order="listorder ASC" >
						<volist name="data" id="vo">
						<li><a href="{$vo.url}">{$vo.catname}</a></li>
						</volist>
						</content>
						<else />
						<li class="active"><a href="{:getCategory($catid,'url')}">{:getCategory($catid,'catname')}</a></li>
						</if>
				</ul>
		</div>
		<!--左侧导航 end-->
		<div class="hot-tj pull-left mg-t-10">
			<h2><span class="h2-txt">热点关注</span></h2>
			<ul>
			<content action="hits" catid="$parentid"  order="weekviews DESC" num="10">
			<volist name="data" id="vo">
				<li><a href="{$vo.url}" title="{$vo.title}">{$vo.title|str_cut=###,12}</a></li>
			</volist>
			</content>
			</ul>
		</div>
	</div>
	<!--右侧内容列表-->
	<div class="list-col2 pull-right">
			<div class="article_article_left pull-left">
			<div class="article_con">
				<h1 title="{$title}">{$title}</h1>
				<p class="info">{$updatetime}&nbsp;&nbsp;&nbsp;   浏览次数:<span id="hits">0</span> </p>
				<div class="tool_con">
					<div id="put_layer2" class="tools" style="display:block;">
						<script src="{$config_siteurl}statics/EMath/js/tools.js" language="javascript" type="text/javascript"></script>
					</div>
					<div style="clear:both;"></div>
				</div>
				<div class="article_txt" id="a_fontsize">
					{$content}
					<if condition=" $voteid ">
						<script language="javascript" src="{$Config.siteurl}index.php?g=Vote&m=Index&a=show&action=js&subjectid={$voteid}&type=2"></script>
					</if>
					<if condition=" !empty($download) ">
						<ul class="tow-columns clearfix">
							<volist name="download" id="vo">
								<li class="l"><a href="{$vo.fileurl}" target="_blank" class="btn-download" title="下载文件{$vo.filename}">{$vo.filename}</a></li>
							</volist>
						</ul>
					</if>
					<div class="fanye" style="border: 0px solid #CCC;">
				<ul>
					{$pages}
				</ul>
				<div style="clear:both"></div>
			</div>
				</div>
				<div class="contentpage">
					<ul>
					</ul>
					<div style="clear:both"></div>
				</div>
				<!--分享到-->
				<div class="share">
					<!-- 百度分享 -->
					<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
					<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
					<!-- 百度分享 end -->
				</div>
				<!--end-->
				<div class="related">
					<div class="xiangguan">
						<h2>相关文章推荐</h2>
						<ul>
						<content action="relation" relation="$relation" catid="$catid"  order="id DESC" num="4" keywords="$keywords" nid="$id">
							<volist name="data" id="vo">
							<li><a href='{$vo.url}' target="_blank">{$vo.title}</a></li>
							</volist>
						</content>
						</ul>
					</div>
					<div class="like_article_ad"> </div>
					<div style="clear:both"></div>
				</div>
				<div class="page">
					<p>上一篇：<pre target="1" msg="已经没有了" /> </p>
					<p>下一篇：<next target="1" msg="已经没有了" /> </p>
				</div>
			</div>
		</div>
		<!--article_list_left end-->
	</div>
	<!--右侧内容列表 end-->
	<div style="clear:both"></div>
</div>
</div>
</div>
<template file="Content/footer.php"/>
<script type="text/javascript">
$(function (){
	$(window).toTop({showHeight : 100});
	//点击
	$.get("{$config_siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
			$("#hits").html(data.views);
	}, "json");
});
</script>
</body>
</html>