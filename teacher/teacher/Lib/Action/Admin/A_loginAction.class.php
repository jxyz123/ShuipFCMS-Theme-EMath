<?php
	class A_loginAction extends Action{
		public function index(){
			$this->display("login");
		}

//buildImageVerify的三个参数依次为验证码长度，验证码类型，以及验证码图片的格式
		public function verify(){
			import("ORG.Util.Image");
			ob_end_clean();
			$test = Image::buildImageVerify(4,1,'png');
		}

		//采用ajax来进行表单的提交以获得更好的用户体验
		public function login(){
			if(!IS_AJAX) halt("页面不存在");

			$id = I("id");
			$password = I("password", "", "md5");
			$verify_id = I("verify_id", "", "md5");

			$query = array(
				"id" => $id,
			);

			$admin = M('admin')->where($query)->find();

			if($verify_id != session("verify")){
				$this->ajaxReturn(array("statue" => 1), 'json');
			}
			else if(!$admin || $admin['password'] != $password){
				$this->ajaxReturn(array("statue" => 2), 'json');
			}
			else{
				session("uid", $admin['id']);
				session("user_type", "admin");
				$this->ajaxReturn(array("statue" => 3), 'json');
			}
		}
	}
?>