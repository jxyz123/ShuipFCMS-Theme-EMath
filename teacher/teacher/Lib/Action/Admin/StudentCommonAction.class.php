<?php
	class StudentCommonAction extends Action{
		
		//检验session是否存在从而进行授权
		public function _initialize(){
			$query = array(
				"id" => session("uid")
				);

			if(!isset($_SESSION["uid"]) or !isset($_SESSION["user_type"])){
				$this->redirect(C("home_page"));
			}

			else if(!M("student")->where($query)->find()) $this->redirect(C("home_page"));
		}
	}
?>