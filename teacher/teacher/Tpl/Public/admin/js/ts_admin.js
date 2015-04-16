$(document).ready(function(){
	$(".stu_detail").click(function(){
		var uid = $(this).attr("uid");
		window.open(ts_admin_stus_url+"&user="+uid);
		});

	$("#change_statue").click(function(){
		var change_con = confirm("是否变更到下一状态，单击确定为变更到下一状态，单击取消则不做任何改变"+
			"（注意：请确定当前状态的工作已经完成后再变更！！！）");

		if(change_con){
			var data = {
				"change": "sure",
			};

			$.post(ts_admin_change_sta, data, function(callback_data){
				console.log(callback_data);
				if(callback_data){
					alert("状态变更成功，单击确定刷新页面");
					window.location.href=current_page;
				}
			});		
		}
	});
});