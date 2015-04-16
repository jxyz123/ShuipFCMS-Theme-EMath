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

		
		<link href="__PUBLIC__/ts_admin/css/teacher_edit.css" rel="stylesheet"/>
		<script type="text/javascript" src="__PUBLIC__/ts_admin/js/teacher_edit.js"></script>
		<script>
			var current_page = "<?php echo U();?>";
			var edit_save_url = "<?php echo U(edit_save);?>";
			var user_id = "<?php echo ($user["id"]); ?>";
			var user_sex = "<?php echo ($user["sex"]); ?>";
			var show_permission = "<?php echo ($user["show_permission"]); ?>";
		</script>
		<script type="text/javascript" src="__PUBLIC__/ts_admin/js/teacher_permission_info.js"></script>
	
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
		
		<div class="row-fluid" id="permission_info"></div>
		
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
							<br><br>

							<label for="sex"><strong>性别：</strong></label>
							<select id="sex" class="input-medium">
								<option id="sex_1" value="1">男</option>
								<option id="sex_2" value="2">女</option>
								<option id="sex_0" value="0">未填写</option>
							</select>
							<br><br>

							<label for="brithday"><strong>出生日期：</strong></label>
							<input id="brithday" name="brithday" type="text" value="<?php echo ($user["brithday"]); ?>" class="input-medium"></input>
						</form>
					</div>
					<div class="span4">
						<form class="form-inline">
							<label for="tel"><strong>电话：</strong></label>
							<input id="tel" name="tel" type="text" value="<?php echo ($user["tel"]); ?>" class="input-medium"></input>
							<br><br>

							<label for="email"><strong>Email：</strong></label>
							<input id="email" name="email" type="text" value="<?php echo ($user["email"]); ?>" class="input-medium"></input>
							<br><br>

							<label for="home_page"><strong>个人主页：</strong></label>
							<input id="home_page" name="home_page" type="text" value="<?php echo ($user["home_page"]); ?>" class="input-medium"></input>
						</form>
					</div>

					<div class="span3">
						<iframe height="200px" width="160px" src="<?php echo U(update_show);?>" align="right"></iframe>
					</div>
				</div>

				<hr>
				<div>
					<label for="bas"><h3>基本情况：</h3></label>
					<textarea id="bas" name="bas" class="span12" rows="10"><?php echo ($user["base_information"]); ?></textarea>
				</div>

				<hr>
				<div>
					<label for="edu"><h3>教育背景：</h3></label>
					<textarea id="edu" name="edu" class="span12" rows="10"><?php echo ($user["education"]); ?></textarea>
				</div>

				<hr>
				<div>
					<label for="exp"><h3>工作经历：</h3></label>
					<textarea id="exp" name="exp" class="span12" rows="10"><?php echo ($user["experience"]); ?></textarea>
				</div>

				<hr>
				<div>
					<label for="res"><h3>研究方向：</h3></label>
					<textarea id="res" name="res" class="span12" rows="10"><?php echo ($user["research"]); ?></textarea>
				</div>

				<hr>
				<div>
					<label for="adv"><h3>科研成果：</h3></label>
					<textarea id="adv" name="adv" class="span12" rows="10"><?php echo ($user["advantage"]); ?></textarea>
				</div>
				<br>

				<hr>
				<div>
					<label for="oth"><h3>其它：</h3></label>
					<textarea id="oth" name="oth" class="span12" rows="10"><?php echo ($user["other_information"]); ?></textarea>
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
<html>