<?php
	class StudentAction extends StudentCommonAction{
		public function index(){
			$uid = session("uid");
			$query = array(
				"id" => $uid,
				);

			$user = M("student")->where($query)->find();

			//sex参数的映射处理
			if($user["sex"] == 0){
				$user["sex"] = "未填写";
			}
			else if($user["sex"] == 1){
				$user["sex"] = "男";
			}
			else if($user["sex"] == 2){
				$user["sex"] = "女";
			}

			//field参数的映射处理
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
			$this->assign("menu_index", "menu_1");
			$this->display("student_view");
		}

		public function edit(){
			$uid = session("uid");
			$query = array(
				"id" => $uid,
				);

			$user = M("student")->where($query)->find();

			$this->assign("user", $user);
			$this->assign("menu_index", "menu_2");
			$this->display("student_edit");
		}

		public function edit_save(){
			if(!IS_AJAX) halt('page ont found!');

			$query = array(
				"id" => session("uid"),
				);

			$data = array(
					"name"		=> I("name"),
					"sex"		=> I("sex"),
					"brithday" 	=> I("brithday"),
					"tel"		=> I("tel"),
					"email"		=> I("email"),
					"field" 	=> I("field"),
					"introduce" => I("introduce"),
					"advantage" => I("advantage"),
				);

			$student = M("student");
			$callback_data =  $student->where($query)->save($data);

			$this->ajaxReturn($callback_data, "json");
		}

		public function admin_teacher(){
			$uid = session("uid");
			$query_user = array(
				"id" => $uid,
				);

			$user = M("student")->where($query_user)->find();

			$query_sta = array(
				"id" => "teacher_admin",
				);

			$sta = M("statue")->where($query_sta)->find();

			$statue = $sta["statue"];

			if($statue == 1){
				$query_teacher = array(
					"id" => $user["teacher_id"],
					);
				$ch_teacher = M("teacher")->where($query_teacher)->find();
				$user["teacher_name"] = $ch_teacher["name"];

				$model = new Model();
				$teachers = $model->query("select num,id,name,allow from ts_teacher order by num");

				//student数目统计部分
				while(list($key,$val)=each($teachers)){
					$query_student = array(
						"teacher_id" => $teachers[$key]["id"],
						);

					$stu_num = M("student")->where($query_student)->count();
					$teachers[$key]["cur"] = $stu_num;
				}

				$statue_h = array(
					"0" => "学生报名未开始",
					"1" => "学生报名开始",
					"2" => "导师选择学生",
					"3" => "录取结果发布",
				);

				$this->assign("statue_h", $statue_h[$statue]);
				$this->assign("statue_w", ($statue+1)/4*100);

				$this->assign("user", $user);
				$this->assign("teachers", $teachers);
				$this->assign("menu_index", "menu_3");
				$this->display("student_admin_teacher");
			}
			else{
				$message = array(
					"0" => "学生报名还未开始，请关注学院关于报名时间的通知",
					"2" => "导师正在选择学生，请耐心等待录取结果",
					);

				$query_user = array(
					"id" => session("uid"),
					);

				$user = M("student")->where($query_user)->find();

				$query_teacher = array(
					"id" => $user["teacher_id"],
					);

				$teacher = M("teacher")->where($query_teacher)->find();

				if($user["teacher_choose"] == 1){
					$message["3"] = "恭喜您已被".$teacher["id"]."   ".$teacher["name"]."录取！！！";
				}
				else if($user["teacher_choose"] == 2){
					$message["3"] = "由于录取名额有限，你已被调剂到".$teacher["id"]."   ".$teacher["name"];
				}
				else if($user["teacher_choose"] == 0){
					$message["3"] = "很抱歉您未能被录取，但人生路漫漫选择何其多，古人云：此处不留爷，自有留爷处";
				}

				$statue_h = array(
					"0" => "学生报名未开始",
					"1" => "学生报名开始",
					"2" => "导师选择学生",
					"3" => "录取结果发布",
				);

				$this->assign("statue_h", $statue_h[$statue]);
				$this->assign("statue_w", ($statue+1)/4*100);
				$this->assign("message", $message[$statue]);
				$this->assign("user", $user);
				$this->assign("menu_index", "menu_3");
				$this->display("student_message");
			}

		}

		public function admin_teacher_view(){
			$query = array(
				"id" => $_GET["teacher"],
				);

			$user = M("teacher")->where($query)->find();

			$this->assign("user", $user);
			if($user["show_permission"] == 2){
				$this->display("admin_teacher_view");
			}
			else{
				$this->display("admin_teacher_view_deny");
			}
		}

		public function admin_teacher_choose(){
			$query_sta = array(
				"id" => "teacher_admin",
				);

			$sta = M("statue")->where($query_sta)->find();

			$statue = $sta["statue"];

			if(!IS_AJAX or $statue != 1) halt('page ont found!');

			$query = array(
				"id" => I("user_id"),
				);

			$user = M("student")->where($query)->find();

			if($user["teacher_id"]==I("choose_id")) $this->ajaxReturn(1, "json");
			else{
				$data = array(
					"teacher_id" => I("choose_id"),
				);

				$result = M("student")->where($query)->save($data);
				$this->ajaxReturn($result, "json");
			}
		}

		public function logout(){
			session_unset();
			session_destroy();
			$this->redirect(C("ts_index"));
		}

		public function change_password(){
			$uid = session("uid");
			$query = array(
				"id" => $uid,
				);

			$user = M("student")->where($query)->find();

			$this->assign("user",$user);
			$this->assign("menu_index", "menu_4");
			$this->display("change_password");
		}

		public function change_password_exe(){
			if(!IS_AJAX) halt('page ont found!');

			$uid = session("uid");
			$query = array(
				"id" => $uid,
				);

			$user = M("student")->where($query)->find();
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
				$callback = M("student")->where($query)->save($data);
			}

			$this->ajaxReturn($callback, "json");
		}
	}
?>