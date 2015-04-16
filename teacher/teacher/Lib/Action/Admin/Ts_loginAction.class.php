<?php
	class Ts_loginAction extends Action{
		public function index(){
			$this->display("login");
		}

		public function verify(){
			import("ORG.Util.Image");
			ob_end_clean();
			$test = Image::buildImageVerify(4,1,'png');
		}

		public function login(){
			if(!IS_AJAX) halt("页面不存在");

			$user_type = I("user_type");
			$id = I("id");
			$password = I("password", "", "md5");
			$verify_id = I("verify_id", "", "md5");

			$query = array(
				"id" => $id,
			);

			if($user_type == "1"){
				$admin = M("teacher")->where($query)->find();

				if($verify_id != session("verify")){
					$this->ajaxReturn(array("statue" => 1), 'json');
				}
				else if(!$admin || $admin['password'] != $password){
					$this->ajaxReturn(array("statue" => 2), 'json');
				}
				else{
					session("uid", $admin['id']);
					session("user_type", "teacher");
					$this->ajaxReturn(array("statue" => 3), 'json');
				}
			}

			if($user_type == "2"){
				$admin = M("student")->where($query)->find();

				if($verify_id != session("verify")){
					$this->ajaxReturn(array("statue" => 1), 'json');
				}
				else if(!$admin || $admin['password'] != $password){
					$this->ajaxReturn(array("statue" => 2), 'json');
				}
				else{
					session("uid", $admin['id']);
					session("user_type", "student");
					$this->ajaxReturn(array("statue" => 3), 'json');
				}
			}
		}
	}
?>