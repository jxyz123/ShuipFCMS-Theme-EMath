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
<script src="{$config_siteurl}statics/EMath/js/sliderengine/amazingslider.js"></script>
<script src="{$config_siteurl}statics/EMath/js/sliderengine/initslider-0.js"></script>
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
var ind = 0;
</script>
<!--<base target="_blank" />-->
</head>
<body>
<template file="Content/header.php"/>
<div class="bgc1">
<div class="bgc2">
<!--map and search-->
<div class="map mg-b-10"><span class="home-ico">当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a></span>
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
<!--上方新闻-->
<div class="top-news1">
    <div class="col-slide mg-r-10 pull-left">
        <!-- Insert to your webpage where you want to display the slider -->
        <div id="amazingslider-0" style="display:block;position:relative;">
        <position action="position" posid="1">
            <ul class="amazingslider-slides" style="display:none;">
            <volist name="data" id="vo">
                <li><a href="{$vo.data.url}" title="{$vo.data.title}"><img src="{$vo.data.thumb}" alt="{$vo.data.title}" /></a></li>
            </volist>
            </ul>
        </position>
        </div>
        <!-- End of body section HTML codes -->
    </div>
    <!--slide end-->
    <div class="news1 mg-b-10 pull-left">
    <div class="news1-ribben"><img src="{$config_siteurl}statics/EMath/images/ribben_news.png"></div>
    <div class="news1-box-top">
        <h2><span class="more pull-right"><a href="{:getCategory(9,'url')}">更多 >></a></span><span class="h2_txt">学院新闻</span></h2>
    </div>
    <div class="news1-box-bottom">
        <ul>
            <content action="lists" catid="9"  order="listorder DESC,updatetime DESC" num="4">
            <volist name="data" id="vo">
            <li><a href="{$vo.url}"  title="{$vo.title}"><span class="pull-right"> {$vo.updatetime|date="m-d",###}</span>{$vo.title|str_cut=###,28}</a></li>
            </volist>
            </content>
         </ul>
    </div>
    </div>
    <!--学院新闻 end-->
    <div class="news1 pull-left">
    <div class="news1-ribben"><img src="{$config_siteurl}statics/EMath/images/ribben_notice.png"></div>
    <div class="news1-box-top">
        <h2><span class="more pull-right"><a href="{:getCategory(10,'url')}">更多 >></a></span><span class="h2_txt">通知公告</span></h2>
    </div>
    <div class="news1-box-bottom">
        <ul>
            <content action="lists" catid="10"  order="listorder DESC,updatetime DESC" num="4">
            <volist name="data" id="vo">
            <li><a href="{$vo.url}"  title="{$vo.title}"><span class="pull-right"> {$vo.updatetime|date="m-d",###}</span>{$vo.title|str_cut=###,28}</a></li>
            </volist>
            </content>
        </ul>
    </div>
    </div>
    <!--通知公告 end-->
</div>
<!--top part end-->
<!--下方新闻-->
<div class="bottom-news1">
    <div class="news1 mg-r-10 pull-left">
    <div class="news1-ribben"><img src="{$config_siteurl}statics/EMath/images/ribben_academic.png"></div>
    <div class="news1-box2-top">
        <h2><span class="more pull-right"><a href="{:getCategory(16,'url')}">更多 >></a></span><span class="h2_txt">学术活动</span></h2>
    </div>
    <div class="news1-box2-bottom">
        <ul>
            <content action="lists" catid="16"  order="listorder DESC,updatetime DESC" num="6">
            <volist name="data" id="vo">
            <li><a href="{$vo.url}"  title="{$vo.title}"><span class="pull-right"> {$vo.updatetime|date="m-d",###}</span>{$vo.title|str_cut=###,18}</a></li>
            </volist>
            </content>
       </ul>
    </div>
    </div>
    <!--学术活动 end-->
    <div class="news1 mg-r-10 pull-left">
    <div class="news1-ribben"><img src="{$config_siteurl}statics/EMath/images/ribben_research.png"></div>
    <div class="news1-box2-top">
        <h2><span class="more pull-right"><a href="{:getCategory(15,'url')}">更多 >></a></span><span class="h2_txt">科研动态</span></h2>
    </div>
    <div class="news1-box2-bottom">
        <ul>
            <content action="lists" catid="15"  order="listorder DESC,updatetime DESC" num="6">
            <volist name="data" id="vo">
            <li><a href="{$vo.url}"  title="{$vo.title}"><span class="pull-right"> {$vo.updatetime|date="m-d",###}</span>{$vo.title|str_cut=###,19}</a></li>
            </volist>
            </content>
        </ul>
    </div>
    </div>
    <!--科研动态 end-->
<template file="Content/links.php"/>
</div>
<!--bottom part end-->
</div>
</div>
<template file="Content/footer.php"/>
</body>
</html>