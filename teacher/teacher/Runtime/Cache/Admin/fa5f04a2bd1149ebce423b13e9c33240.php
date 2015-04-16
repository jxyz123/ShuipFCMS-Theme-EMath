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
		<link href="__PUBLIC__/ts_admin/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
		<script src="__PUBLIC__/ts_admin/js/jquery-ui-1.10.4.custom.js"></script>

		
	</head>
	<body>
				<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="#">个人信息管理</a>
					<ul class="nav" id="menu">
						<li id="menu_1"><a href="<?php echo U(index);?>">预览</a></li>
						<li id="menu_2"><a href="<?php echo U(edit);?>">编辑</a></li>
						<li id="menu_3"><a href="<?php echo U(admin_teacher);?>">导师选择系统</a></li>
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

			<div class="span9">
				<table class="table">
					<tr>
						<td class="span4">
							<br>
							<p><strong>ID：</strong> <span class="s_right"><?php echo ($user["id"]); ?></span></p>
							<p><strong>姓名：</strong> <span class="s_right"><?php echo ($user["name"]); ?></span></p>
							<p><strong>性别：</strong> <span class="s_right"><?php echo ($user["sex"]); ?></span></p>
							<p><strong>出生日期：</strong><span class="s_right"><?php echo ($user["brithday"]); ?></span></p>
						</td>

						<td class="span3">
							<br>
							<p><strong>专业：</strong> <span class="s_right"><?php echo ($user["field"]); ?></span></p>
							<p><strong>电话：</strong> <span class="s_right"><?php echo ($user["tel"]); ?></span></p>
							<p><strong>邮箱：</strong> <span class="s_right"><?php echo ($user["email"]); ?></span></p>
						</td>

						<td class="span3">
							&nbsp
						</td>
					</tr>
				</table><hr>

				<div>
					<h3>自我介绍：</h3>
					<pre><?php echo ($user["introduce"]); ?></pre>
				</div><hr>

				<div>
					<h3>所获奖项：</h3>
					<pre><?php echo ($user["advantage"]); ?></pre>
				</div><hr>
			</div>
		</div>
	
		
	</body>
</html>