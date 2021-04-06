<?php
require_once('../../private/initialize.php')	;
//Checking if logged in
if(!$session->isLoggedIn()){
	redirectTo(urlFor('admin/login.php'));
}

if(isPostRequest()){
	
	$args = $_POST['admin'];
	$admin = new Admin($args);
	$result = $admin->save();

	if($result === true){
		$newId = $admin->id;
		$_SESSION['message'] = 'The Admin was created succesfully.';
		redirectTo(urlFor('admin/show.php?id='.$newId));
	} else{
		//Show errors
	}
}else{
	//Display the form
	$admin = new Admin;
}
?>

<?php 
	include(SHARED_PATH . '/publicHeader.php')
?>
<div class="container">
	<div class="row shadow">
	<div class="col-md-5 mx-auto shadow">
		<h3 class="p-2">Add an Admin</h3>
		<?php echo display_errors($admin->errors);?>
		<form action = "<?php echo urlfor('/admin/new.php');?>" method="POST">
			<?php include('formFields.php')?>
			<div class="form-group p-2">
				<input class="btn btn-primary form-control" type="submit" value="Create Admin" name="submit">
			</div>
		</form>
	</div>
</div>
</div>