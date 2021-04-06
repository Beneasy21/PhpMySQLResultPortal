<?php
require_once('../../../private/initialize.php')	;

if(!isset($_GET['id'])){
	redirectTo(urlFor('admin/sex/index.php'));
}

$id = $_GET['id'];

$sex = Sex::findById($id);
if($sex == false){
	//
	redirectTo(urlFor('admin/sex/index.php'));
}

if(isPostRequest()){
	
	$args = $_POST['sex'];
	
	$sex->mergeAttributes($args);
	$result = $sex->save();

	//$result = $sex->create();
	if($result === true){
		$_SESSION['message'] = 'The sex was Updated succesfully.';
		redirectTo(urlFor('admin/sex/oneRecord.php?id='.$id));
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
		<?php echo display_errors($sex->errors);?>
		<form action = "<?php echo urlfor('/admin/sex/edit.php?id='  . h(u($id)));?>" method="POST">
			<?php include('formFields.php');?>
			<div>
				<input type="submit" value="Edit Sex" name="submit">
			</div>
		</form>
	</div>
</div>