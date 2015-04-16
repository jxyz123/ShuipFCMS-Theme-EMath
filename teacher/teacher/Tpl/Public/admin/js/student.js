$(document).ready(function(){
	//实现添加按钮的功能
	$("#add").click(function(){
		var add_statue = $("#add_function").attr("sta");
		if(add_statue == "1"){
			var html_id = "<input type='text' id='val_id' class='span2'></input>";
			var html_name = "<input type='text' id='val_name' class='span2'></input>";
			var html_function = "<a class='btn' id='cancel' href='"+ current_page +"'>取消</a>";

			$("#add_id").append(html_id);
			$("#add_name").append(html_name);
			$("#add_function").append(html_function);
			$("#del_all").remove();

			$("#add_function").attr("sta","2");
		}
		else if(add_statue=="2"){
			var val_id = $("#val_id");
			var val_name = $("#val_name");

			if(val_id.val() == "" || val_name.val() == ""){
				alert("id或姓名不能为空");
			}
			else{
				var data = {
					id: val_id.val(),
					name: val_name.val()
				};

				$.post(add_student, data, function(callback_data){
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
			$.post(del_student, data, function(callback_data){
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
			$.post(res_student, data, function(callback_data){
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
	$(".t_edit").on("click",function(){
		var edit_statue = $(this).attr("sta");
		var edit_id = $(this).attr("uid");
		var edit_name = $("#name_"+edit_id).attr("val");

		if(edit_statue == "1"){
			var html_id = "<input type='text' id='edit_val_id' class='span2' value='"+edit_id+"'></input>";
			var html_name = "<input type='text' id='edit_val_name' class='span2' value='"+edit_name+"'></input>";
			var html_function = '<a class="btn btn-primary" id="edit_sure" href="#" uid="'+edit_id+'">确定</a>&nbsp'+
									'<a class="btn" id="cancel" href="'+current_page+'">取消</a>';
			
			$("#id_"+edit_id).html(html_id);
			$("#name_"+edit_id).html(html_name);
			$("#function_"+edit_id).html(html_function);

			$("#edit_sure").click(function(){
				var edit_val_id = $("#edit_val_id");
				var edit_val_name = $("#edit_val_name");

				var data = {
					old_id: edit_id,
					id: edit_val_id.val(),
					name: edit_val_name.val()
				};

				$.post(edit_student, data, function(callback_data){
					if(callback_data==1){
						window.location.href = current_page;
					}
					else if(callback_data==0){
						alert("修改失败，请刷新后操作");
					}
					else if(callback_data==2){
						alert("ID与其他学生ID冲突");
					}
				});

			});
		}
	});

	//实现查看学生的详细信息
	$(".t_view").click(function(){
		var view_id = $(this).attr("uid");

		window.open(view_student+"&user="+view_id);
	});

	//批量删除学生
	$("#del_all").click(function(){
		var del_all_con = confirm("是否批量删除（该操作将删除所有学生）");

		if(del_all_con){
			var data = {};

			$.post(del_students, data, function(callback_data){
				if(callback_data){
					alert("删除成功，点击确定刷新页面");
					window.location.href = current_page;
				}
				else{
					alert("删除失败，请刷新后再操作");
				}
			});
		}
	});

});