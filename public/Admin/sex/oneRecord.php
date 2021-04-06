<?php 	require_once('../../../private/initialize.php'); 
		$id = $_GET['id'] ?? false;

		if(!$id){
			redirectTo('index.php');
		}
?>



<?php  include(SHARED_PATH . '/publicHeader.php')?>

	<!-- Go to Login page if not logged in-->
	<h3>Name</h3>



	<ul>
	<li> <a href="<?php echo urlFor('houseMaster/index.php') ?>">House Parent</a></li>	

	</ul>
	
	<?php
		
		$sex = Sex::findById($id);//Calling as a class method
		
		
			echo $sex->sexDesc . "</br>";	
		

	?>


<?php  include(SHARED_PATH . '/publicFooter.php')?>