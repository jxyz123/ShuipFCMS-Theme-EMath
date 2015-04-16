<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang='en'>
	<head>
		<title>后台管理</title>
		<meta charset="utf-8">

		<!--基本样式与js文件的导入-->
		<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
		<script>
			var menu_index = "<?php echo ($menu_index); ?>";

			$(document).ready(function(){
				$("#"+menu_index).addClass("active");
			});
		</script>

		<!--datapicker样式实现的导入-->
		<link href="__PUBLIC__/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
		<script src="__PUBLIC__/js/jquery-ui-1.10.4.custom.js"></script>

		
	
	</head>
	<body>
				<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="#">个人信息管理</a>
					<ul class="nav" id="menu">
						<li id="menu_1"><a href="<?php echo U(index);?>">预览</a></li>
						<li id="menu_2"><a href="<?php echo U(edit);?>">编辑</a></li>
						<li id="menu_3"><a href="<?php echo U(admin_stu);?>">导师选择系统</a></li>
						<li id="menu_4"><a href="<?php echo U(change_password);?>">修改密码</a></li>
					</ul>
					<ul class="nav pull-right">
						<li><a href="#">当前登录：<?php echo ($user["id"]); ?></a></li>
						<li><a href="<?php echo U(logout);?>">退出</a></li>
						<li class="divider-vertical"></li>
						<li class="divider-vertical"></li>
						<li><a href="<?php echo C(home_page);?>">学院主页</a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span1">
				&nbsp
			</div>

			<div class="span10">
				<hr>
				<div class="row-fluid">
					<div class="span9">
						<div class="row-fluid">
							<span class="span3">学生报名未开始</span>
							<span class="span3">学生报名开始</span>
							<span class="span3">导师选择学生</span>
							<span class="span3">录取结果发布</span>
						</div>
						<div class="row-fluid">
							<div class="span11">
								<div class="progress">
									<div class="bar" style="width: <?php echo ($statue_w); ?>%"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="span3">
						<br>
						<h4>当前状态：<?php echo ($statue_h); ?></h4>
					</div>
				</div>
				<hr>

				<div class="alert">
  					<a class="close" data-dismiss="alert">×</a>
  					<strong><?php echo ($message); ?></strong>
				</div>
			</div>
		<div>
	
	</body>
<html>