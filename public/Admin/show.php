<?php 	require_once('../../private/initialize.php'); 

		$id = $_GET['id'] ?? false;

		if(!$id){
			redirectTo('/admin/index.php');
		}
?>

<?php  include(SHARED_PATH . '/publicHeader.php')?>

	<!-- Go to Login page if not logged in-->
	<h3>Name</h3>

	<ul>
		<li><a href="<?php echo urlFor('houseMaster/index.php') ?>">House Parent</a></li>	
	</ul>
	<?php

	$admin = Admin::findById($id);//Calling as a class method
		
		
			echo $admin->first_name . "</br>";	
		

	?>


<?php  include(SHARED_PATH . '/publicFooter.php')?>