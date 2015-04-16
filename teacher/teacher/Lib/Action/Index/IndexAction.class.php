<?php
	class IndexAction extends Action{
		public function index(){
			$this->show();
		}

		public function teacher_view(){
			$query = array(
				"id" => $_GET["user"],
				);

			$user = M("teacher_show")->where($query)->find();

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

			$this->display("teacher_view");
		}
	}
?>