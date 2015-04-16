<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang='en'>
	<head>
		<title>教师信息</title>
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

		
		<style>
			#image{
				height: 180px;
				width: 135px;
			}

			#image_td{
				text-align: center;
			}
		</style>
	
	</head>
	<body>
		
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="#">用户信息预览</a>
					<ul class="nav">
						<li><a href="#">当前用户：<?php echo ($user["id"]); ?></a></li>
					</ul>

					<ul class="nav pull-right">
						<li><a href="<?php echo C(home_page);?>">学院主页</a></li>
					</ul>

				</div>
			</div>
		</div>
	
		
		<div class="row-fluid">
			 <div class='span1'>&nbsp</div>
				<div class='span9'>
					<div class='alert'>
					<a class='close' data-dismiss='alert'>×</a>
					<strong>该用户信息正在审核中</strong>
				</div>
			</div>
		</div>
	
		
	</body>
</html>