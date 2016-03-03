<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$name} - {$special.title}</title>
</head>
<body>
专题分类模板<br/>
当前分类ID：{$typeid}<br/>
当前分类名称：{$name}<br/>
当前分类地址：{$url}<br/>
当前专题ID：{$specialid}<br/>
当前专题名称：{$special.title}<br/>
当前专题地址：{$special.url}<br/>
该分类信息：
<hr />
<spf module="Special" action="content_list" specialid="$specialid"  typeid="$typeid" page="$page" num="2">
	<ul>
    <volist name="data" id="r">
    <li>标题：<a href="{$r.url}" target="_blank">{$r.title}</a>，地址：{$r.url}</li>
    </volist>
    </ul>
</spf>
<hr/>
{$pages}
</body>
</html>