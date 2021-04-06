<?php
	require_once('../../../private/initialize.php');

	if(!isset($_GET['id'])){
		redirectTo(urlFor('/admin/sex/index.php'));
	}

	$id = $_GET['id'];
	$sex = Sex::findById($id);
	if($sex == false){
		redirectTo(urlfor('/admin/sex/index.php'));
	}

	if(isPostRequest()){
		//Delete Sex
		$result = $sex->delete($id);

		$_SESSION['message'] = 'The sex was deleted successfully';
		redirectTo(urlFor('/admin/sex/index.php'));
	}else{
		//Display Form
	}

include(SHARED_PATH. '/publicHeader.php');
?>
<div>
	<h1>Are you sure you want to delete this Sex</h1>
	<p><?php echo h($sex->sexDesc);?></p>
	<div>
		<form action="<?php echo urlFor('/admin/sex/delete.php?id=' . h(u($id)));?>" method="POST">
			<div>
				<input type="submit" name="submit" value = "Delete Sex">				
			</div>
		</form>	
	</div>
	
</div>
