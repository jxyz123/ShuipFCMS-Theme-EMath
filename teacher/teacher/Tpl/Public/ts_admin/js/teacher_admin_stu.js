$(document).ready(function(){
	$(".detail").click(function(){
		var uid = $(this).attr("uid");
		window.open(admin_stu_view_url+"&user="+uid);
	});

	$(".cancel_choose").click(function(){
		var uid = $(this).attr("uid");
		var data = {
			"id": uid,
		};

		$.post(admin_stu_cancel_url, data, function(callback_data){
			if(callback_data){
				alert("修改成功！");
				window.location.href=current_page;
			}
			else{
				alert("修改失败！");
			}
		});
	});

	$(".sure_choose").click(function(){
		if(cur_choose<allow_choose){
			var uid = $(this).attr("uid");
			var data = {
				"id": uid,
			};

			$.post(admin_stu_choose_url, data, function(callback_data){
				if(callback_data){
					alert("修改成功！");
					window.location.href=current_page;
				}
				else{
					alert("修改失败！");
				}
			});
		}
		else{
			alert("录取人数已满！！！");
		}
	});

	
});