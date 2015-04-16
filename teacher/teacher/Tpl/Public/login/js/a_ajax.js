//对应的页面为A_login中的login文件，login文件中有三个通过模板生成的变量
$(document).ready(function(){
	$("#save_ajax").click(function(){
		var id = $('input[name=id]');
		var password = $('input[name=password]');
		var verify_id = $('input[name=verify_id]');

		if(id.val() == '' || password.val() == ''){
			alert('用户名和密码不能为空！');
		}
		else{
			var data = {
				id: id.val(),
				password: password.val(),
				verify_id: verify_id.val(),
			};

			$.post(login_url, data, function(callback_data){
				if(callback_data){
					if(callback_data.statue ==  1) alert("验证码错误！");
					else if(callback_data.statue == 2) alert("用户名或密码错误！");
					else if(callback_data.statue == 3) window.location.href = admin_url;
				}
			});
		}
	});
});