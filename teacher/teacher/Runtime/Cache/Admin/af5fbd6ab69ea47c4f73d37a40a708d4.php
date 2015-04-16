<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>系统登录</title>
	<link href="__PUBLIC__/login/css/login.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="__PUBLIC__/login/js/verify.js"></script>
	<script type="text/javascript" src="__PUBLIC__/login/js/a_ajax.js"></script>
	<script type="text/javascript">
		var verify_url = "<?php echo U(verify);?>&rand=";
		var login_url = "<?php echo U(login);?>";
		var admin_url = "<?php echo C(a_login);?>";
	</script>

</head>

<body>

	<div class="header">
  		<h1 class="headerLogo">&nbsp&nbsp&nbsp<a title="后台管理系统" target="_blank" href="#"><img alt="logo" src="__PUBLIC__/login/img/logo.png"></a></h1>
	</div>

	<div class="banner">
		<div class="login-aside">
 			<div id="o-box-up"></div>

			<div id="o-box-down"  style="table-layout:fixed;">
   				<form>
   					<div>
   						<h3>教师/学生信息管理系统</h3>
   					</div>

   					<div>
	   					<label for="id" class="form-label">账号</label>
	   					<input type="text" id="id" name="id" class="i-text">
  					</div>

  					<div>
	   					<label for="password" class="form-label">密码</label>
	   					<input type="password" id="password" name="password" class="i-text">
  					</div>

  					<div class="pos-r">
	   					<label for="verify_id" class="form-label">验证码</label>
	   					<input type="text" id="verify_id" name="verify_id" class="i-text yzm">
       					<div class="ui-form-explain">
       						<a id="clear" href="#"><img id="verify_img" src="<?php echo U(verify);?>" class="yzm-img"/></a>
       					</div>
  					</div>
  					</br>

  				</form>

  					<div>
	   					<button id="save_ajax" class="btn-login"></button>
  					</div>

  			</div>

		</div>

		<div class="bd">
			<ul>
				<li style="background:url(__PUBLIC__/login/img/theme.jpg) #CCE1F3 center 0 no-repeat;"></li>
			</ul>
		</div>
	</div>

	<div class="banner-shadow"></div>

	<div class="footer">
   		<p><span style="font-family:arial;">CopyRight &copy;  2014 </span><a target="_blank" href="http://maths.hust.edu.cn/">华中科技大学数学与统计学院</a></p>
	</div>

</body>
</html>