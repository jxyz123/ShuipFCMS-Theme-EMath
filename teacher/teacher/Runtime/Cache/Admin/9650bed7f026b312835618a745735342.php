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

		
		<script type="text/javascript" src="__PUBLIC__/admin/js/ts_admin.js"></script>

		<script>
			var ts_admin_stus_url = "<?php echo U(ts_admin_stus);?>";
			var ts_admin_change_sta = "<?php echo U(ts_admin_change_sta);?>";
			var current_page = "<?php echo U();?>";
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
				<hr>
				<div class="row-fluid">
					<div class="span7">
						<div class="row-fluid">
							<span class="span3">学生报名未开始</span>
							<span class="span3">学生报名开始</span>
							<span class="span3">导师选择学生</span>
							<span class="span3">录取结果发布</span>
						</div>
						<div class="row-fluid">
							<div class="span11">
								<div class="progress">
									<div class="bar" style="width: <?php echo ($admin["statue_w"]); ?>%"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="span3">
						<br>
						<h4>当前状态：<?php echo ($admin["statue_h"]); ?></h4>
					</div>
					<div class="span2">
						<br>
						<button class="btn btn-warning" id="change_statue">变更至下一状态</button>
					</div>
				</div>
				<hr>

				<table class="table">
					<thead>
						<tr>
							<th class="span3">Id</th>
							<th class="span3">姓名</th>
							<th class="span3">当前报名人数/可录取人数</th>
							<th class="span3">常用操作</th> 
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($teachers)): foreach($teachers as $key=>$teacher): ?><tr>
								<td><?php echo ($teacher["id"]); ?></td>
								<td><?php echo ($teacher["name"]); ?></td>
								<td><?php echo ($teacher["cur"]); ?>/<?php echo ($teacher["allow"]); ?></td>
								<td>
									<button class="btn btn-primary stu_detail" uid="<?php echo ($teacher["id"]); ?>">详细</button>
								</td>
							</tr><?php endforeach; endif; ?>
					</tbody>
				</table>
			</div>
	
		
	</body>
</html>