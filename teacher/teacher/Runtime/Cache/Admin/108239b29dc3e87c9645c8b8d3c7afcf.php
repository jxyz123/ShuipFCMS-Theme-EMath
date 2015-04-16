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

		
		<script type="text/javascript" src="__PUBLIC__/ts_admin/js/student_edit.js"></script>
		<style>
			select,input{
				float: right;
			}
		</style>

		<script>
			var current_page = "<?php echo U();?>";
			var edit_save_url = "<?php echo U(edit_save);?>"
			var user_sex = "<?php echo ($user["sex"]); ?>";
			var user_field = "<?php echo ($user["field"]); ?>";
		</script>
	
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
				<hr>
				<div class="row-fluid">
					<div class="span4">
						<form class="form-inline">
							<label for="name"><strong>姓名：</strong></label>
							<input id="name" name="name" type="text" value="<?php echo ($user["name"]); ?>" class="input-medium"></input>
							<br></br>

							<label for="sex"><strong>性别：</strong></label>
							<select id="sex" class="input-medium">
								<option id="sex_1" value="1">男</option>
								<option id="sex_2" value="2">女</option>
								<option id="sex_0" value="0">未确定</option>
							</select>
							<br><br>

							<label for="brithday"><strong>出生日期：</strong></label>
							<input id="brithday" name="brithday" type="text" value="<?php echo ($user["brithday"]); ?>" class="input-medium"></input>
						</form>
					</div>

					<div class="span4">
						<form class="form-inline">
							<label for="field"><strong>专业：</strong></label>
							<select id="field" class="input-medium">
								<option id="field_1" value="1">信息与计算科学</option>
								<option id="field_2" value="2">统计学</option>
								<option id="field_3" value="3">数学与应用数学</option>
								<option id="field_0" value="0">未确定</option>
							</select>
							<br><br>

							<label for="tel"><strong>电话：</strong></label>
							<input id="tel" name="tel" type="text" value="<?php echo ($user["tel"]); ?>" class="input-medium"></input>
							<br><br>

							<label for="email"><strong>Email：</strong></label>
							<input id="email" name="email" type="text" value="<?php echo ($user["email"]); ?>" class="input-medium"></input>
						</form>
					</div>

					<div class="span3">
						&nbsp
					</div>
				</div>

				<hr>
				<div>
					<label for="introduce"><h3>自我介绍：</h3></label>
					<textarea id="introduce" name="introduce" class="span12" rows="10"><?php echo ($user["introduce"]); ?></textarea>
				</div>

				<hr>
				<div>
					<label for="advantage"><h3>所获奖项：</h3></label>
					<textarea id="advantage" name="advantage" class="span12" rows="10"><?php echo ($user["advantage"]); ?></textarea>
				</div>

				<br>
				<div>
					<table class="table">
						<tbody>
							<tr>
								<td class="span3">&nbsp</td>
								<td class="span3"><button class="btn btn-primary input-small" id="save">确定修改</button></td>
								<td class="span3"><a class="btn input-small" id="cancel" href="<?php echo U();?>">取消</a></td>
								<td class="span3">&nbsp</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	
		
	</body>
</html>