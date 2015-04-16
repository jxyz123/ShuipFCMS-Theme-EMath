<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!--顶部图片-->
<div class="header-img"> <img src="{$config_siteurl}statics/EMath/images/header_math.jpg" width="970" height="100"  alt=""/> </div>
<!--顶部导航-->
<div class="header-nav">
  <div class="navBar">
    <ul class="nav-nav clearfix">
      <li class="m">
        <h3><a href="{$config_siteurl}"><span>首页</span></a></h3>
      </li>
      <content action="category" catid="0"  order="listorder ASC" >
      <volist name="data" id="vo">
        <!--{$vo.catname}-->
        <li class="m">
          <h3><a href="{$vo.url}"><span>{$vo.catname}</span></a></h3>
        </volist>
        </content>
        <li class="nav-block" style="left: 250px;"></li>
      </ul>
  </div>
</div>
<!--nav end-->