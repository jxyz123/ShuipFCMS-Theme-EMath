<?php
	class TeacherAction extends TeacherCommonAction{
		public function index(){
			//指定参数并显示模板
			$uid = session("uid");
			$query = array(
				"id" => $uid,
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
			$this->assign("menu_index", "menu_1");
			$this->display("teacher_view");
		}

		public function edit(){
			$uid = session("uid");
			$query = array(
				"id" => $uid,
				);
			$user = M("teacher")->where($query)->find();

			$this->assign("user", $user);
			$this->assign("menu_index", "menu_2");
			$this->display("teacher_edit");
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
					"home_page" => I("home_page"),
					"base_information"=> I("bas"),
					"education" => I("edu"),
					"experience"=> I("exp"),
					"research"	=> I("res"),
					"advantage" => I("adv"),
					"other_information" => I("oth"),
				);

			$teacher = M("teacher");
			$callback_data =  $teacher->where($query)->save($data);
			if($callback_data){
				$permission = array(
						"show_permission" => 1,
					);
				$teacher->where($query)->save($permission);
			}

			$this->ajaxReturn($callback_data, "json");
		}

		public function update_show(){
			$uid = session("uid");
			$query = array(
				"id" => $uid,
				);
			$user = M("teacher")->where($query)->find();

			$this->assign("user", $user);
			$this->display("teacher_update_file");
		}

		public function update_save(){
			import("ORG.Net.UploadFile");
			$upload = new UploadFile();
			$upload->maxSize = 3145728;
			$upload->allowExts = array("jpg", "png", "jpeg");
			$upload->savePath = "./Public/upload_img/teacher/";

			if(!$upload->upload()){
				$this->error($upload->getErrorMsg());
			}
			else{
				$query = array(
					"id" => session("uid"),
					);
				$old_user = M("teacher")->where($query)->find();
				$old_photo = "./Public/upload_img/teacher/".$old_user['photo'];
				unlink($old_photo);

				$info = $upload->getUploadFileInfo();
				$teacher = M("teacher");
				$data['photo'] = $info[0]['savename'];
				$teacher->where($query)->save($data);

				$this->redirect(U("update_show"));
//				$this->success("save successful");
			}
		}

		public function admin_stu(){
			$uid = session("uid");
			$query = array(
				"id" => $uid,
				);
			$user = M("teacher")->where($query)->find();

			$query_sta = array(
				"id" => "teacher_admin",
				);

			$sta = M("statue")->where($query_sta)->find();

			$statue = $sta["statue"];

			if($statue == 2){
				$model = new Model();
				$students_choose = $model->query("select id,name,field from ts_student where teacher_id='".$uid."' and teacher_choose='1'");
				$students_unchoose = $model->query("select id,name,field from ts_student where teacher_id='".$uid."' and teacher_choose='0'");

				//专业映射的转换
				while(list($key,$val)=each($students_choose)){
					if($val["field"] == 0){
						$students_choose[$key]["field"] = "未填写";
					}
					else if($val["field"] == 1){
						$students_choose[$key]["field"] = "信息与计算科学";
					}
					else if($val["field"] == 2){
						$students_choose[$key]["field"] = "统计学";
					}
					else if($val["field"] == 3){
						$students_choose[$key]["field"] = "数学与应用数学";
					}
				}

				while(list($key,$val)=each($students_unchoose)){
					if($val["field"] == 0){
						$students_unchoose[$key]["field"] = "未填写";
					}
					else if($val["field"] == 1){
						$students_unchoose[$key]["field"] = "信息与计算科学";
					}
					else if($val["field"] == 2){
						$students_unchoose[$key]["field"] = "统计学";
					}
					else if($val["field"] == 3){
						$students_unchoose[$key]["field"] = "数学与应用数学";
					}
				}

				$user["cur_choose"] = count($students_choose);

				$statue_h = array(
					"0" => "学生报名未开始",
					"1" => "学生报名开始",
					"2" => "导师选择学生",
					"3" => "录取结果发布",
				);

				$this->assign("statue_h", $statue_h[$statue]);
				$this->assign("statue_w", ($statue+1)/4*100);

				$this->assign("students_choose", $students_choose);
				$this->assign("students_unchoose", $students_unchoose);
				$this->assign("user", $user);
				$this->assign("menu_index", "menu_3");
				$this->display("teacher_admin_stu");
			}

			else if($statue == 3){
				$model = new Model();
				$students_choose = $model->query("select id,name,field,teacher_choose from ts_student where teacher_id='".$uid."' and teacher_choose<>'0'");

				//专业映射的转换
				while(list($key,$val)=each($students_choose)){
					if($val["field"] == 0){
						$students_choose[$key]["field"] = "未填写";
					}
					else if($val["field"] == 1){
						$students_choose[$key]["field"] = "信息与计算科学";
					}
					else if($val["field"] == 2){
						$students_choose[$key]["field"] = "统计学";
					}
					else if($val["field"] == 3){
						$students_choose[$key]["field"] = "数学与应用数学";
					}

					if($val["teacher_choose"] == 1){
						$students_choose[$key]["teacher_choose"] = "正选";
					}
					else if($val["teacher_choose"] == 2){
						$students_choose[$key]["teacher_choose"] = "调剂";
					}
				}

				$statue_h = array(
					"0" => "学生报名未开始",
					"1" => "学生报名开始",
					"2" => "导师选择学生",
					"3" => "录取结果发布",
				);


				$this->assign("students_choose", $students_choose);
				$this->assign("statue_h", $statue_h[$statue]);
				$this->assign("statue_w", ($statue+1)/4*100);
				$this->assign("user", $user);
				$this->assign("menu_index", "menu_3");
				$this->display("teacher_message_end");
			}

			else{
				$message = array(
					"0" => "学生报名还未开始，请关注学院关于报名时间的通知",
					"1" => "学生报名中，请耐心等待报名结果",
					);

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
				$this->display("teacher_message");
			}
		}

		public function admin_stu_view(){
			$query = array(
				"id" => $_GET["user"],
				);

			$user = M("student")->where($query)->find();

			//性别映射的改变
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
			$this->display("admin_stu_view");
		}

		public function admin_stu_cancel(){
			$query_sta = array(
				"id" => "teacher_admin",
				);

			$sta = M("statue")->where($query_sta)->find();

			$statue = $sta["statue"];

			if(!IS_AJAX or $statue != 2) halt("page not found!");

			$query = array(
				"id" => I("id"),
				);

			$data = array(
				"teacher_choose" => 0,
				);

			$result = M("student")->where($query)->save($data);

			$this->ajaxReturn($result, "json");
		}

		public function admin_stu_choose(){
			$query_sta = array(
				"id" => "teacher_admin",
				);

			$sta = M("statue")->where($query_sta)->find();

			$statue = $sta["statue"];

			if(!IS_AJAX or $statue != 2) halt("page not found!");

			$query = array(
				"id" => I("id"),
				);

			$data = array(
				"teacher_choose" => 1,
				);

			$result = M("student")->where($query)->save($data);

			$this->ajaxReturn($result, "json");
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

			$user = M("teacher")->where($query)->find();

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

			$user = M("teacher")->where($query)->find();
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
				$callback = M("teacher")->where($query)->save($data);
			}

			$this->ajaxReturn($callback, "json");
		}
	}
?>