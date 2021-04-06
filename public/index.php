<?php 	require_once('../private/initialize.php'); ?>
<?php  include(SHARED_PATH . '/publicHeader.php')?>

	<!-- Go to Login page if not logged in-->
	<h3>Name</h3>

	<div>
		<button>House Master Login</button>
	</div>	
	<div>
		<button>Class Teacher Login</button>
	</div>	
	<div>
		<button>House Master</button>
	</div>	

	<ul>
	<li> <a href="<?php echo urlFor('houseMaster/index.php') ?>">House Parent</a></li>	

	</ul>
	
	<?php
		
		$sexs = Sex::findAll();//Calling as a class method
		
		foreach($sexs as $sex){?>

			 <?php echo $sex->longName ?> <a href="<?php echo urlFor('oneRecord.php?id='.$sex->sexId) ?>">Edit</br></a>	
		
		<?php } ?>
		

	?>


<?php  include(SHARED_PATH . '/publicFooter.php')?>