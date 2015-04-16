$(document).ready(function(){
	var permission;
	if(show_permission == "0"){
		permission = "用户为新建用户，尚未进行更新";
	}
	else if(show_permission == "1"){
		permission = "用户已更新信息，等待审核";
	}
	else if(show_permission == "2"){
		permission = "用户更新通过审核";
	}
	else if(show_permission == "3"){
		permission = "用户审核未通过，等待其更新后重新审核";
	}
	var html_permission = "<div class='span1'>&nbsp</div>"+
		"<div class='span9'>"+
			"<div class='alert'>"+
				"<a class='close' data-dismiss='alert'>×</a>"+
				"<strong>"+permission+"</strong>"+
			"</div>"+
		"</div>";
	$("#permission_info").append(html_permission);

	$("#pass").click(function(){
		var data = {
			id: teacher_id,
			permission: 2,
		};
		$.post(show_permission_url, data, function(callback_data){
			if(callback_data){
				alert("审核已确认通过");
				window.location.reload();
			}
			else{
				alert("数据库更新失败，请刷新后操作");
			}
		});
	});

	$("#unpass").click(function(){
		var data = {
			id: teacher_id,
			permission: 3,
		};
		$.post(show_permission_url, data, function(callback_data){
			if(callback_data){
				alert("审核不通过，信息已反馈给用户");
				window.location.reload();
			}
			else{
				alert("数据库更新失败，请刷新后操作");
			}
		});
	});
});