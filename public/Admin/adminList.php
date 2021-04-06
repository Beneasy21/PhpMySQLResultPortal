<?php 	require_once('../../private/initialize.php'); 

//Checking if logged in
if(!$session->isLoggedIn()){
	redirectTo(urlFor('admin/login.php'));
}

?>
<?php  //include(SHARED_PATH . '/publicHeader.php')?>

	<!-- Go to Login page if not logged in-->
	<h3>Name</h3>



	
	<table border="1">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Username</th>
					<th>View</th>
					<th>Edit</th>	
					<th>Delete</th>
				</tr>	
	<?php
		
		$admins = Admin::findAll();//Calling as a class method
			
		foreach($admins as $admin){?>
			
				<tr>
					<td><?php echo $admin->first_name; ?></td>
					<td><?php echo $admin->last_name; ?></td>
					<td><?php echo $admin->email; ?></td>
					<td><?php echo $admin->username; ?></td>
					<td><a href="<?php echo urlFor('admin/show.php?id='.$admin->id) ?>">View</a></td>
					<td><a href="<?php echo urlFor('admin/edit.php?id='.$admin->id); ?>">Edit</a></td>
					<td><a href="<?php echo urlFor('admin/delete.php?id='.$admin->id); ?>">Delete</a></td>
				</tr>
						
		<?php } ?>
		</table>

	


<?php  include(SHARED_PATH . '/publicFooter.php')?>