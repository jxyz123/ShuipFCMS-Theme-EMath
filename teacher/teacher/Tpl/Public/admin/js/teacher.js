$(document).ready(function(){
	//审核警告的添加
	$(".permission_1").append("<span class='badge badge-warning'>需要审核</span>");
	$(".permission_3").append("<span class='badge badge-warning'>审核未通过</span>");

	//实现添加按钮的功能
	$("#add").click(function(){
		var add_statue = $("#add_function").attr("sta");
		if(add_statue == "1"){
			var html_id = "<input type='text' id='val_id' class='span2'></input>";
			var html_name = "<input type='text' id='val_name' class='span2'></input>";
			var html_office = "<select class='span2' id='val_office'>"+
								"<option value='1'>教授</option>"+
								"<option value='2'>副教授</option>"+
								"<option value='3'>讲师</option>"+
							"</select>";
			var html_allow = "<input type='text' id='val_allow' class='span2'></input>";
			var html_function = "<a class='btn' id='cancel' href='"+ current_page +"'>取消</a>";

			$("#add_id").append(html_id);
			$("#add_name").append(html_name);
			$("#add_office").append(html_office);
			$("#add_allow").append(html_allow);
			$("#add_function").append(html_function);

			$("#add_function").attr("sta","2");
		}
		else if(add_statue=="2"){
			var val_id = $("#val_id");
			var val_name = $("#val_name");
			var val_allow = $("#val_allow");
			var val_office = $("#val_office");

			if(val_id.val() == "" || val_name.val() == ""){
				alert("id或姓名不能为空");
			}
			else{
				var data = {
					id: val_id.val(),
					name: val_name.val(),
					allow: val_allow.val(),
					office: val_office.val()
				};

				$.post(add_teacher, data, function(callback_data){
					if(callback_data==1){
						window.location.href = current_page;
					}
					else if(callback_data==0){
						alert("添加失败，请刷新后操作");
					}
					else if(callback_data==2){
						alert("ID重复");
					}
				});
			}
		}
	});

	//实现删除按钮的功能
	$(".t_del").click(function(){
		var del_con = confirm("是否删除该用户（注意：删除操作将清除该用户所有信息！！！）");

		if(del_con){
			var data = {
				id: $(this).attr("uid"),
			};
			$.post(del_teacher, data, function(callback_data){
				if(callback_data){
					alert("删除成功");
					window.location.href = current_page;
				}
				else{
					alert("删除失败，请刷新后再操作");
				}
			});
		}
	});

	//实现重置密码按钮的功能
	$(".t_res").click(function(){
		var res_con = confirm("是否重置密码（重置密码后，密码与用户的id相同）");

		if(res_con){
			var data = {
				id: $(this).attr("uid"),
			};
			$.post(res_teacher, data, function(callback_data){
				if(callback_data){
					alert("重置密码成功，新密码与用户的id相同");
				}
				else{
					alert("重置失败，请刷新后再操作");
				}
			});
		}
	});

	//实现编辑按钮的功能
	$(".t_edit").click(function(){
		var edit_statue = $(this).attr("sta");
		var edit_id = $(this).attr("uid");
		var edit_name = $("#name_"+edit_id).attr("val");
		var edit_allow = $("#allow_"+edit_id).attr("val");

		if(edit_statue == "1"){
			console.log("hahah");
			var html_id = "<input type='text' id='edit_val_id' class='span2' value='"+edit_id+"'></input>";
			var html_name = "<input type='text' id='edit_val_name' class='span2' value='"+edit_name+"'></input>";
			var html_office = "<select class='span2' id='edit_val_office'>"+
								"<option value='1'>教授</option>"+
								"<option value='2'>副教授</option>"+
								"<option value='3'>讲师</option>"+
							"</select>";
			var html_allow = "<input type='text' id='edit_val_allow' class='span2' value='"+edit_allow+"'></input>";
			var html_function = '<a class="btn btn-primary" id="edit_sure" href="#" uid="'+edit_id+'">确定</a>&nbsp'+
									'<a class="btn" id="cancel" href="'+current_page+'">取消</a>';

			$("#id_"+edit_id).html(html_id);
			$("#name_"+edit_id).html(html_name);
			$("#office_"+edit_id).html(html_office);
			$("#allow_"+edit_id).html(html_allow);
			$("#function_"+edit_id).html(html_function);

			$("#edit_sure").click(function(){
				var edit_val_id = $("#edit_val_id");
				var edit_val_name = $("#edit_val_name");
				var edit_val_office = $("#edit_val_office");
				var edit_val_allow = $("#edit_val_allow");

				var data = {
					old_id: edit_id,
					id: edit_val_id.val(),
					name: edit_val_name.val(),
					office: edit_val_office.val(),
					allow: edit_val_allow.val(),
				};

				console.log(data);

				$.post(edit_teacher, data, function(callback_data){
					if(callback_data==1){
						window.location.href = current_page;
					}
					else if(callback_data==0){
						alert("修改失败，请刷新后操作");
					}
					else if(callback_data==2){
						alert("ID与其他教师ID冲突");
					}
				});

			});
		}
	});

	//实现查看教师的详细信息
	$(".t_view").click(function(){
		var view_id = $(this).attr("uid");

		window.open(view_teacher+"&user="+view_id);
	});
});