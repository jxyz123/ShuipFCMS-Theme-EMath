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

		
		<script type="text/javascript" src="__PUBLIC__/admin/js/student.js"></script>
		<script type="text/javascript">
			var user_type = "<?php echo ($user_type); ?>";
			var current_page = "<?php echo U();?>";
			var add_student = "<?php echo U(add_student);?>";
			var del_student = "<?php echo U(del_student);?>";
			var res_student = "<?php echo U(reset_student);?>";
			var edit_student = "<?php echo U(edit_student);?>";
			var view_student = "<?php echo U(view_student);?>";
			var del_students = "<?php echo U(del_students);?>";
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
				<table class="table">
					<thead>
						<tr>
							<th class="span2">Id</th>
							<th class="span2">姓名</th>
							<th class="span4">常用操作</th>
						</tr>
					</thead>
					<tbody id="list">
						<?php if(is_array($users)): foreach($users as $key=>$user): ?><tr uid="<?php echo ($user["id"]); ?>">
								<td id="id_<?php echo ($user["id"]); ?>" val="<?php echo ($user["id"]); ?>"><?php echo ($user["id"]); ?></td>
								<td id="name_<?php echo ($user["id"]); ?>" val="<?php echo ($user["name"]); ?>"><?php echo ($user["name"]); ?></td>
								<td id="function_<?php echo ($user["id"]); ?>">
									<a class="btn btn-primary t_edit" href="#" uid="<?php echo ($user["id"]); ?>" sta="1">编辑</a>&nbsp
									<a class="btn t_view" href="#" uid="<?php echo ($user["id"]); ?>">查看</a>&nbsp
									<a class="btn btn-danger t_del" href="#" uid="<?php echo ($user["id"]); ?>">删除</a>&nbsp
									<a class="btn btn-danger t_res" href="#" uid="<?php echo ($user["id"]); ?>">重置密码</a>
								</td>
							</tr><?php endforeach; endif; ?>
							<tr id="add_form">
								<td id="add_id"></td>
								<td id="add_name"></td>
								<td id="add_function" sta="1">
									<a class="btn btn-primary" id="add">添加</a>
									<a class="btn btn-warning" id="del_all">批量删除</a>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	
		
	</body>
</html>