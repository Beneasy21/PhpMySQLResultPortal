<?php
require_once('../../private/initialize.php');

// Log out the admin
$session->logout();

redirectTo(urlFor('/admin/login.php'));

?>
