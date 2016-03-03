<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$title}</title>
</head>
<body>
专题首页模板，下面是各种标签测试：<br/>
当前专题名称：{$title}<br/>
当前专题地址：{$url}<br/>
当前专题横幅：{$banner}<br/>
当前专题分类获取：<br/>
<spf module="Special" action="get_type" specialid="$specialid" >
<div>
    <ul>
    <volist name="data" id="vo">
    <li>分类ID：{$vo.typeid}，分类名称：<a href="{$vo.url}" target="_blank">{$vo.name}</a>，分类地址：{$vo.url}</li>
    </volist>
    </ul>
</div>
</spf>
当前专题某个分类信息列表获取：<br/>
<spf module="Special" action="get_type" specialid="$specialid" >
<volist name="data" id="vo">
分类名称：{$vo.name}<hr />
<spf module="Special" action="content_list" specialid="$specialid"  typeid="$vo['typeid']" return="list">
	<ul>
    <volist name="list" id="r">
    <li>标题：<a href="{$r.url}" target="_blank">{$r.title}</a>，地址：{$r.url}</li>
    </volist>
    </ul>
</spf>
</volist>
</spf>
</body>
</html>