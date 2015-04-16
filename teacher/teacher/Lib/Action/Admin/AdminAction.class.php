<?php
	class AdminAction extends AdminCommonAction{
		//管理操作的页面（默认从老师开始）
		public function teacher(){
			$admin_id = session("uid");
			$model = new Model();
			$users =  $model->query("select num,id,name,office,allow,show_permission from ts_teacher order by num");

			$this->assign("user_type", 1);
			$this->assign("users", $users);
			$this->assign("admin_id", $admin_id);

			$this->assign("menu_index", "menu_1");
			$this->display("teacher");
		}

		//学生的管理页面
		public function student(){
			$admin_id = session("uid");
			$model = new Model();
			$users = $model->query("select num,id,name from ts_student order by num");

			$this->assign("user_type", 2);
			$this->assign("users", $users);
			$this->assign("admin_id", $admin_id);
			$this->assign("menu_index", "menu_2");
			$this->display("student");
		}

		//登出函数（两者公用）
		public function logout(){
			session_unset();
			session_destroy();
			$this->redirect(C("a_index"));
		}

		//添加用户（老师）
		public function add_teacher(){
			if(!IS_AJAX) halt('page ont found!');

			$office_form = array(
				'1' => "教授",
				'2' => "副教授",
				'3' => "讲师",
				);

			$office = $office_form[I("office")];

			$data = array(
				'sex' => "0",
				'id' => I("id"),
				'name' => I("name"),
				'password' => I("id", "", "md5"),
				'allow' => I("allow"),
				'office' => $office,
				);

			//检验是否有重复的id
			$check = array("id" => I("id"));
			if(M("teacher")->where($check)->select()){
				$this->ajaxReturn(2,"json");
			}
			else{
				if($result = M("teacher")->data($data)->add()&&M("teacher_show")->data($data)->add())
					$this->ajaxReturn(1, 'json');
				else
					$this->ajaxReturn(0, 'json');
			}
		}

		//添加用户（学生）
		public function add_student(){
			if(!IS_AJAX) halt('page ont found!');

			$data = array(
				'sex' => "0",
				'field' => "0",
				'id' => I("id"),
				'name' => I("name"),
				'password' => I("id", "", "md5")
				);

			//检验是否有重复的id
			$check = array("id" => I("id"));
			if(M("student")->where($check)->select()){
				$this->ajaxReturn(2,"json");
			}
			else{
				if($result = M("student")->data($data)->add())
					$this->ajaxReturn(1, 'json');
				else
					$this->ajaxReturn(0, 'json');
			}
		}

		//编辑用户，使用ajax实现配和弹出框，避免异域
		//编辑用户（老师）
		public function edit_teacher(){
			if(!IS_AJAX) halt('page ont found!');

			$office_form = array(
				'1' => "教授",
				'2' => "副教授",
				'3' => "讲师",
				);

			$office = $office_form[I("office")];

			$query = array(
				'id' => I("old_id"),
				);

			$data = array(
				'id' => I("id"),
				'name' => I("name"),
				'office' => $office,
				'allow' => I("allow"),
				);

			//检验是否有重复的id
			if(I("id")==I("old_id")){
				$result = M("teacher")->where($query)->save($data);
				if($result = M("teacher")->where($data))
					$this->ajaxReturn(1, 'json');
				else
					$this->ajaxReturn(0, 'json');
			}
			else{
				$check = array(
					"id" => I("id"),
				);

				if(M("teacher")->where($check)->select()){
					$this->ajaxReturn(2,"json");
				}
				else{
					$result = M("teacher")->where($query)->save($data);

					if($result = M("teacher")->where($data))
						$this->ajaxReturn(1, 'json');
					else
						$this->ajaxReturn(0, 'json');
				}

			}
		}

		//编辑用户（学生）
		public function edit_student(){
			if(!IS_AJAX) halt('page ont found!');

			$query = array(
				'id' => I("old_id"),
				);

			$data = array(
				'id' => I("id"),
				'name' => I("name")
				);

			//检验是否有重复的id
			if(I("id")==I("old_id")){
				$result = M("student")->where($query)->save($data);
				if($result = M("student")->where($data))
					$this->ajaxReturn(1, 'json');
				else
					$this->ajaxReturn(0, 'json');
			}
			else{
				$check = array(
					"id" => I("id"),
				);

				if(M("student")->where($check)->select()){
					$this->ajaxReturn(2,"json");
				}
				else{
					$result = M("student")->where($query)->save($data);

					if($result = M("student")->where($data))
						$this->ajaxReturn(1, 'json');
					else
						$this->ajaxReturn(0, 'json');
				}

			}
		}

		//删除用户（老师）
		public function del_teacher(){
			if(!IS_AJAX) halt('page ont found!');
			$data = array(
				'id' => I("id"),
				);

			$result = M("teacher")->where($data)->delete();

			$this->ajaxReturn($result, 'json');
		}

		//删除用户（学生）
		public function del_student(){
			if(!IS_AJAX) halt('page ont found!');
			$data = array(
				'id' => I("id"),
				);

			$result = M("student")->where($data)->delete();

			$this->ajaxReturn($result, 'json');
		}

		//批量删除学生
		public function del_students(){
			if(!IS_AJAX) halt('page ont found!');
			$model = new Model();
			$result = $model->execute("truncate table ts_student");

			if($result !== false){
				$result = 1;
			}
			else $result = 0;

			$this->ajaxReturn($result, 'json');
		}

		//重置用户密码（老师）
		public function reset_teacher(){
			$data = array(
				'id' => I("id"),
				);

			$new_data['password'] = I("id","","md5");

			M("teacher")->where($data)->save($new_data);

			$data['password'] = I("id","","md5");
			$result = M("teacher")->where($data);

			$this->ajaxReturn($result, 'json');
		}

		//重置用户密码（学生）
		public function reset_student(){
			$data = array(
				'id' => I("id"),
				);

			$new_data['password'] = I("id","","md5");

			M("student")->where($data)->save($new_data);

			$data['password'] = I("id","","md5");
			$result = M("student")->where($data);

			$this->ajaxReturn($result, 'json');
		}

		//查看教师详细信息页面
		public function view_teacher(){
			$query = array(
				"id" => $_GET["user"],
				);

			$user = M("teacher")->where($query)->find();

			if($user["sex"] == 0){
				$user["sex"] = "未填写";
			}
			else if($user["sex"] == 1){
				$user["sex"] = "男";
			}
			else if($user["sex"] == 2){
				$user["sex"] = "女";
			}

			$this->assign("user", $user);
			$this->display("view_teacher");
		}

		//审核教师信息
		public function teacher_show_permission(){
			if(!IS_AJAX) halt('page ont found!');
			$data = array(
				"id" => I("id")
				);

			$new_data["show_permission"] = I("permission");
			M("teacher")->where($data)->save($new_data);

			if(I("permission")==2){
				$result = M("teacher")->where($data)->find();
				M("teacher_show")->where($data)->save($result);
			}
			//$data["show_permission"] = I("permission");
			$result = M("teacher")->where($data);

			$this->ajaxReturn($result, 'json');
		}

		//查询学生详细信息页面
		public function view_student(){
			$query = array(
				"id" => $_GET["user"],
				);

			$user = M("student")->where($query)->find();

			if($user["sex"] == 0){
				$user["sex"] = "未填写";
			}
			else if($user["sex"] == 1){
				$user["sex"] = "男";
			}
			else if($user["sex"] == 2){
				$user["sex"] = "女";
			}

			//专业映射的改变
			if($user["field"] == 0){
				$user["field"] = "未填写";
			}
			else if($user["field"] == 1){
				$user["field"] = "信息与计算科学";
			}
			else if($user["field"] == 2){
				$user["field"] = "统计学";
			}
			else if($user["field"] == 3){
				$user["field"] = "数学与应用数学";
			}

			$this->assign("user", $user);
			$this->display("view_student");
		}

		//研究生管理界面（总）
		public function ts_admin(){
			$query_admin = array(
				"id" => session("uid"),
				);

			$query_sta = array(
				"id" => "teacher_admin",
				);

			//admins数据部分
			$admin = M("admin")->where($query_admin)->find();
			$admin_id = $admin["id"];
			$sta = M("statue")->where($query_sta)->find();
			$admin["statue"] = $sta["statue"];
			$statue = array(
				"0" => "学生报名未开始",
				"1" => "学生报名开始",
				"2" => "导师选择学生",
				"3" => "录取结果发布",
				);
			$admin["statue_h"] = $statue[$admin["statue"]];
			$admin["statue_w"] = ($admin["statue"]+1)/4*100;

			$this->assign("admin", $admin);
			$this->assign("admin_id", $admin_id);
			$this->assign("menu_index", "menu_3");

			if($sta["statue"] == 3){
				$model = new Model();
				$stu_choose_zero = $model->query("select id,name,teacher_id from ts_student where teacher_choose=0 order by teacher_id");
				$stu_choose_one = $model->query("select id,name,teacher_id from ts_student where teacher_choose=1 order by teacher_id");
				$stu_choose_two = $model->query("select id,name,teacher_id from ts_student where teacher_choose=2 order by teacher_id");

				while(list($key,$val)=each($stu_choose_zero)){
					$query_teacher = array(
						"id" => $val["teacher_id"],
						);
					$teacher = M("teacher")->where($query_teacher)->find();
					$stu_choose_zero[$key]["teacher_name"] = $teacher["name"];
				}

				while(list($key,$val)=each($stu_choose_one)){
					$query_teacher = array(
						"id" => $val["teacher_id"],
						);
					$teacher = M("teacher")->where($query_teacher)->find();
					$stu_choose_one[$key]["teacher_name"] = $teacher["name"];
				}

				while(list($key,$val)=each($stu_choose_two)){
					$query_teacher = array(
						"id" => $val["teacher_id"],
						);
					$teacher = M("teacher")->where($query_teacher)->find();
					$stu_choose_two[$key]["teacher_name"] = $teacher["name"];
				}

				$this->assign("student_choose_zero", $stu_choose_zero);
				$this->assign("student_choose_one", $stu_choose_one);
				$this->assign("student_choose_two", $stu_choose_two);
	//			dump($query_stu_choose_0);
				$this->display("ts_admin_end");
			}
			else{
				//teacher数据部分
				$model = new Model();
				$teachers = $model->query("select id,name,allow from ts_teacher order by num");

				//student数目统计部分
				while(list($key,$val)=each($teachers)){
					$query_student = array(
						"teacher_id" => $teachers[$key]["id"],
						);

					$stu_num = M("student")->where($query_student)->count();
					$teachers[$key]["cur"] = $stu_num;
				}
					$this->assign("teachers", $teachers);
					$this->display("ts_admin");
			}

		}

		//研究生管理页面（详细）
		public function ts_admin_stus(){
			$query_teacher = array(
				"id" => $_GET["user"],
				);

			$teacher = M("teacher")->where($query_teacher)->find();
			$model = new Model();
			$students = $model->query("select id,name,field,teacher_choose from ts_student where teacher_id='".$_GET["user"]."' order by teacher_choose");
//			$students = M("student")->where($query_students)->find();
			while(list($key,$val)=each($students)){
				if($val["field"] == 0){
					$students[$key]["field"] = "未填写";
				}
				else if($val["field"] == 1){
					$students[$key]["field"] = "信息与计算科学";
				}
				else if($val["field"] == 2){
					$students[$key]["field"] = "统计学";
				}
				else if($val["field"] == 3){
					$students[$key]["field"] = "数学与应用数学";
				}

				if($val["teacher_choose"] == 0){
					$students[$key]["teacher_choose"] = "没选中";
					$students[$key]["color"] = "red";
				}
				else if($val["teacher_choose"] == 1){
					$students[$key]["teacher_choose"] = "正选";
					$students[$key]["color"] = "blue";
				}
				else if($val["teacher_choose"] == 2){
					$students[$key]["teacher_choose"] = "调剂";
					$students[$key]["color"] = "green";
				}
			}

			$this->assign("teacher", $teacher);
			$this->assign("students", $students);
			$this->display("ts_admin_stus");
		}

		//研究生报考状态的改变
		public function ts_admin_change_sta(){
			if(!IS_AJAX) halt('page ont found!');

			if(I("change")=="sure"){
				//状态的改变
				$query = array(
					"id" => "teacher_admin",
					);

				$statue = M("statue")->where($query)->find();

				$data = array(
					"statue" => ($statue["statue"]+1)%4,
					);

				$result = M("statue")->where($query)->save($data);

				//调剂的实现，之后把状态的改变的实现的部分放在调剂的实现的后面以实现对安全的控制
				if($data["statue"] == 3){
					$model = new Model();
					$teachers = $model->query("select id,allow from ts_teacher order by num");
					$students = $model->query("select id,teacher_id from ts_student where teacher_id<>'0' and teacher_choose<>1");
					$left_stu_num = count($students);

					while(list($key,$val)=each($teachers)){
						$stu_num_query = array(
							"teacher_id" => $val["id"],
							"teacher_choose" => 1,
							);

						$stu_num_choose = count(M("student")->where($stu_num_query)->find());
						$left_allow_num = $val["allow"] - $stu_num_choose;

						if($left_stu_num == 0) break;

						else{
							for($i=0;$i<$left_allow_num;$i++){
								$stu_query = array(
									"id" => $students[$left_stu_num-1]["id"],
									);
								$stu_data = array(
									"teacher_id" => $val["id"],
									"teacher_choose" => 2,
									"teacher_id_old" => $students[$left_stu_num-1]["teacher_id"],
									);

								//这里要加上一个安全的控制
								M("student")->where($stu_query)->save($stu_data);

								$left_stu_num = $left_stu_num - 1;
								if($left_stu_num == 0) break;
							}
						}
					}

					for($i=0;$i<$left_stu_num;$i++){
						$stu_query = array(
							"id" => $students[$i]["id"],
							);

						$stu_data = array(
							"teacher_choose" => 0,
							);

						M("student")->where($stu_query)->save($stu_data);
					}
				}


				$this->ajaxReturn($result, "json");
			}
		}

		public function change_password(){
			$uid = session("uid");

			$this->assign("admin_id",$uid);
			$this->assign("menu_index", "menu_4");
			$this->display("change_password");
		}

		public function change_password_exe(){
			if(!IS_AJAX) halt('page ont found!');

			$uid = session("uid");
			$query = array(
				"id" => $uid,
				);

			$user = M("admin")->where($query)->find();
			$old_password = $user["password"];
			$old_password_sure = md5(I("old"));
			$new_password = I("new");
			$new_password_sure = I("new_sure");

			if($old_password != $old_password_sure)
				$callback = "原始密码输入不正确";
			elseif($new_password_sure != $new_password)
				$callback = "两次输入的新密码不一致，请检查后再输入";
			else{
				$data = array(
					"password" => md5($new_password),
					);
				$callback = M("admin")->where($query)->save($data);
			}

			$this->ajaxReturn($callback, "json");
		}
	}
?>