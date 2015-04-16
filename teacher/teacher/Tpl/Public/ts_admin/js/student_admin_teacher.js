$(document).ready(function(){
	$(".detail").click(function(){
		var uid = $(this).attr("uid");
		window.open(admin_teacher_view_url+"&teacher="+uid);
	});

	$(".choose").click(function(){
		var uid = $(this).attr("uid");

		var data = {
			"choose_id": uid,
			"user_id": user_id, 
		};

		$.post(admin_teacher_choose_url, data, function(callback_data){
			if(callback_data){
				alert("选择成功");
				window.location.href = current_page;
			}
			else{
				alert("选择失败，请刷新后操作");
			}
		});
	});
});