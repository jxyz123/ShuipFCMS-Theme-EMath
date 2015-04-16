<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Update</title>

		<script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.js"></script>
		<style>
			img{
				height: 150px;
				width: 120px;
			}

			#image{
				width: 100%;
			}
		</style>

		<script>
			$(document).ready(function(){
				$("#image").change(function(){
					$(".btn").trigger("click");
				});
			});
		</script>
	</head>

	<body>
		<div>
			<img src="/teacher/Public/upload_img/teacher/<?php echo ($user["photo"]); ?>"></img>
			<form method="post" action="<?php echo U('update_save');?>" enctype="multipart/form-data" class="form-inline">
				<input id="image" name="image" type="file"></input>
				<input class="btn" type="submit" style="display:none"></inptut>
			</from>
		</div>
	</body>
</html>