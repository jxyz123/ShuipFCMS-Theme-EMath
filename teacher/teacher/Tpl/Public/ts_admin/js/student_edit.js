$(document).ready(function(){
	//datapicker的js部分
	$("#brithday").datepicker({
		changeMonth: true,
		changeYear: true
	});

	//性别下拉列表的处理
	$("#sex_"+user_sex).attr("selected", "selected");

	//专业下拉列表的处理
	$("#field_"+user_field).attr("selected", "selected");

	console.log(user_sex);

	$("#save").click(function(){
		var save_con = confirm("是否确认修改");

		if(save_con){
			var val_name = $("#name").val();
			var val_sex = $("#sex").val();
			var val_brithday = $("#brithday").val();
			var val_tel = $("#tel").val();
			var val_email = $("#email").val();
			var val_field = $("#field").val();
			var val_introduce = $("#introduce").val();
			var val_advantage = $("#advantage").val();

			var data={
				name: 		val_name,
				sex: 		val_sex,
				brithday: 	val_brithday,
				tel: 		val_tel,
				email: 		val_email,
				field: 		val_field,
				introduce: 	val_introduce,
				advantage: 	val_advantage,
			}

			console.log(data);

			$.post(edit_save_url, data, function(callback_data){
				if(callback_data){
					alert("修改成功");
					window.location.href = current_page;
				}
				else{
					alert("数据未修改或修改失败，请刷新后操作");
				}
			});

		}
	});
});