<?php

	  require_once('../../private/initialize.php');
	  $session->logoutStudent();

	  //log_out_student();
	  redirectTo(urlFor('students/login.php'));
?>