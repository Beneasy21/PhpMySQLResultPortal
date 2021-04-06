<?php
require_once('../../private/initialize.php')	;

if(!isset($_GET['id'])){
	redirectTo(urlFor('admin/index.php'));
}

$id = $_GET['id'];

$admin = Admin::findById($id);
if($admin == false){
	//
	redirectTo(urlFor('admin/index.php'));
}

if(isPostRequest()){
	
	$args = $_POST['admin'];
	
	$admin->mergeAttributes($args);
	$result = $admin->save();

	//$result = $sex->create();
	if($result === true){
		$_SESSION['message'] = 'The Admin was Updated succesfully.';
		redirectTo(urlFor('admin/show.php?id='.$id));
	} else{
		//Show errors
		echo "Error updating the record";
	}
}else{

	//Display the form
	
}

?>

<div>
	<div>
		<?php echo display_errors($admin->errors);?>
		<form action = "<?php echo urlfor('/admin/edit.php?id='  . h(u($id)));?>" method="POST">
			<?php include('formFields.php');?>
			<div>
				<input type="submit" value="Edit Admin" name="submit">
			</div>
		</form>
	</div>
</div>