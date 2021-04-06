<?php 	require_once('../../../private/initialize.php'); ?>
<?php  include(SHARED_PATH . '/publicHeader.php')?>

	<!-- Go to Login page if not logged in-->
	<h3>Name</h3>



	<ul>
	<li> <a href="<?php echo urlFor('houseMaster/index.php') ?>">House Parent</a></li>	

	</ul>
	<table border="1">
				<tr>
					<th>Sex Detail</th>
					<th>Sex Abb</th>
					<th>View</th>
					<th>Edit</th>	
					<th>Delete</th>
				</tr>	
	<?php
		
		$sexs = Sex::findAll();//Calling as a class method
		
			
		foreach($sexs as $sex){?>
			
				<tr>
					<td><?php echo $sex->sexDesc ?></td>
					<td><?php echo $sex->sexName ?></td>
					<td><a href="<?php echo urlFor('admin/sex/oneRecord.php?id='.$sex->id) ?>">View</a></td>
					<td><a href="<?php echo urlFor('admin/sex/edit.php?id='.$sex->id) ?>">Edit</a></td>
					<td><a href="<?php echo urlFor('admin/sex/delete.php?id='.$sex->id) ?>">Delete</a></td>
				</tr>
						
		<?php } ?>
		</table>

	


<?php  include(SHARED_PATH . '/publicFooter.php')?>