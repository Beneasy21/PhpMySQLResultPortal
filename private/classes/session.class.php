<?php
	class Session {

		private $admin_id;

		public function __construct(){
			session_start();
			$this->checkStoredLogin();
		}

		public function login($admin){
			if($admin){
				session_regenerate_id();
				$_SESSION['admin_id'] = $admin->id;
				$this->admin_id = $admin->id;
			}
			return true;
		}

		public function loginStudent($student){
			if($student){
				session_regenerate_id();
				$_SESSION['studId'] = $student->studId;
				$this->studId = $student->studId;
			}
			return true;
		}

		public function isLoggedIn(){
			return isset($this->admin_id);
		}

		public function logout(){
			unset($_SESSION['admin_id']);
			unset($this->admin_id);
			return true;

		}

		public function logoutStudent(){
			unset($_SESSION['studId']);
			unset($this->studId);
			return true;

		}

		private function checkStoredLogin(){
			if(isset($_SESSION['admin_id'])){
				$this->admin_id = $_SESSION['admin_id'];
			}elseif(isset($_SESSION['studId'])){
				$this->studId = $_SESSION['studId'];
			}
		}
	}
?>