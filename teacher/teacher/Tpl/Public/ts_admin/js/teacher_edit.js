$(document).ready(function(){
	//datapicker的js部分
	$("#brithday").datepicker({
		changeMonth: true,
		changeYear: true
	});

	//性别下拉列表的处理
	if(user_sex == "0") $("#sex_0").attr("selected", "selected");
	if(user_sex == "1") $("#sex_1").attr("selected", "selected");
	if(user_sex == "2") $("#sex_2").attr("selected", "selected");

	$("#save").click(function(){
		var save_con = confirm("是否确认修改，点击确认后您的信息将由管理员进行审核");

		if(save_con){
			var val_name = $("#name").val();
			var val_sex = $("#sex").val();
			var val_brithday = $("#brithday").val();
			var val_tel = $("#tel").val();
			var val_email = $("#email").val();
			var val_home_page = $("#home_page").val();
			var val_bas = $("#bas").val();
			var val_edu = $("#edu").val();
			var val_exp = $("#exp").val();
			var val_res = $("#res").val();
			var val_adv = $("#adv").val();
			var val_oth = $("#oth").val();

			var data={
				name: 		val_name,
				sex: 		val_sex,
				brithday: 	val_brithday,
				tel: 		val_tel,
				email: 		val_email,
				home_page: 	val_home_page,
				bas: 		val_bas,
				edu: 		val_edu,
				exp: 		val_exp,
				res: 		val_res,
				adv: 		val_adv,
				oth: 		val_oth,
			};

			console.log(data);

			$.post(edit_save_url, data, function(callback_data){
				if(callback_data){
					alert("修改成功，请等待管理员审核");
					window.location.href = current_page;
				}
				else{
					alert("您的信息并未做出改动，请刷新后操作");
				}
			});
		}
	});
});