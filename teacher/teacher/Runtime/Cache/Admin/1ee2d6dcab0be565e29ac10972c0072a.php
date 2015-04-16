<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
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

		
		<script>
			var change_url = "<?php echo U(change_password_exe);?>";
			var logout_url = "<?php echo U(logout);?>";
		</script>

		<script>
			$(document).ready(function(){
				$("#change").click(function(){
					var data = {
						"old": $("#old").val(),
						"new": $("#new").val(),
						"new_sure": $("#new_sure").val()
					};

					$.post(change_url, data, function(callback_data){
						console.log(callback_data);
						if(callback_data == 1){
							alert("密码修改成功，请重新登录");
							window.location.href = logout_url;
						}
						else if(callback_data == 0){
							alert("密码未修改");
						}
						else{
							alert(callback_data);
						}
					});
				});
			});
		</script>
	
	</head>
	<body>
		<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="#">后台管理</a>
			<ul class="nav">
				<li id="menu_1"><a href="<?php echo U(teacher);?>">教师管理</a></li>
				<li id="menu_2"><a href="<?php echo U(student);?>">学生管理</a></li>
				<li id="menu_3"><a href="<?php echo U(ts_admin);?>">导师选择系统</a></li>
				<li id="menu_4"><a href="<?php echo U(change_password);?>">修改密码</a></li>
			</ul>
			<ul class="nav pull-right">
				<li><a href="#">当前登录: <?php echo ($admin_id); ?></a></li>
				<li><a href="<?php echo U(logout);?>">退出</a></li>
				<li class="divider-vertical"></li>
				<li class="divider-vertical"></li>
				<li><a href="<?php echo C(home_page);?>">回到主页</a></li>
			</ul>
		</div>
	</div>
</div>
		
		<div class="row-fluid">
			<div class="span1">
				&nbsp
			</div>

			<div class="span10">
				<form class="form-horizontal">
					<fieldset>
						<legend>修改密码</legend>
						<div class="control-group">
							<label class="control-label" for="old">旧密码</label>
							<div class="controls">
								<input type="password" class="input-xlarge" id="old"></input>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="new">新密码</label>
							<div class="controls">
								<input type="password" class="input-xlarge" id="new"></input>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="new_sure">确认新密码</label>
							<div class="controls">
								<input type="password" class="input-xlarge" id="new_sure"></input>
							</div>
						</div>
					</fieldset>
				</form>
				<div class="row-fluid">
					<div class="span4">
						&nbsp
					</div>
					<button class="btn btn-primary" id="change">确认修改</button>
				</div>
			</div>
		</div>
	
		
	</body>
</html>