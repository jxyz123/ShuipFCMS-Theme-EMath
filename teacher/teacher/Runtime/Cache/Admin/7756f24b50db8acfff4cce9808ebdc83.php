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
		$(document).ready(function(){
			$(".detail").click(function(){
				var uid = $(this).attr("uid");
				window.open("<?php echo U(view_student);?>"+"&user="+uid);
			});
		});
		</script>
	
	</head>
	<body>
		
		
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="#">报名学生列表</a>
					<ul class="nav pull-right">
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
				<h3>所属教师：<?php echo ($teacher["id"]); ?>&nbsp&nbsp<?php echo ($teacher["name"]); ?></h3><hr>
				<table class="table">
					<thead>
						<tr>
							<th class="span3">Id</th>
							<th class="span2">姓名</th>
							<th class="span3">专业</th>
							<th class="span2">常用操作</th>
							<th class="span2">状态</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($students)): foreach($students as $key=>$student): ?><tr>
								<td><?php echo ($student["id"]); ?></td>
								<td><?php echo ($student["name"]); ?></td>
								<td><?php echo ($student["field"]); ?></td>
								<td>
									<button class="btn btn-primary detail" uid="<?php echo ($student["id"]); ?>">详细</button>
								</td>
								<td><p style="color: <?php echo ($student["color"]); ?>"><?php echo ($student["teacher_choose"]); ?></td>
							</tr><?php endforeach; endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		
	
		
	</body>
</html>