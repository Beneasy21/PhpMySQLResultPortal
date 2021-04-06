<?php
require_once('../../../private/initialize.php')	;

if(isPostRequest()){
	
	$args = $_POST['sex'];

	//$args = [];
	//$args['sexName'] = $_POST['sexName'] ?? NULL;
	//$args['sexDesc'] = $_POST['sexDesc'] ?? NULL;

	$sex = new Sex($args);
	$result = $sex->save();
	if($result === true){
		$newId = $sex->id;
		$_SESSION['message'] = 'The sex was created succesfully.';
		redirectTo(urlFor('admin/sex/oneRecord.php?id='.$newId));
	} else{
		//Show errors
	}
}else{
	//Display the form
	$sex = new Sex;
}
?>

<?php 

?>
<div>
	<div>
		<?php echo display_errors($sex->errors);?>
		<form action = "<?php echo urlfor('/admin/sex/new.php');?>" method="POST">
			<?php include('formFields.php')?>
			<div>
				<input type="submit" value="Create Sex" name="submit">
			</div>
		</form>
	</div>
</div>