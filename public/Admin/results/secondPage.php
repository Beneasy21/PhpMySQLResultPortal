<?php 	require_once('../../../private/initialize.php'); 

//Checking if logged in
if(!$session->isLoggedIn()){
	redirectTo(urlFor('admin/login.php'));
}
	$admin = Admin::findById($_SESSION['admin_id']);
?>
<?php  include(SHARED_PATH . '/publicHeader.php'); ?>

<main class="container mt-5">
	<div class="row">
		<!-- Start Div for Hyperlinks and details -->
		<div class="col-4">
			<div class="row">
			<div class="col mx-auto">
				<h4>W e l c o m e !</h4>
				<p><?php 

				echo $admin->fullName(); ?></p>
			</div>
		</div>
		</div>	
		<!-- End Div for Hyperlinks and details -->
		<!-- Start of Div for the other part -->			
		<div class="col-8">
			<div class="row p-5">
				
			</div>
			<div class="row pb-2">
				<div class="col-6">
					<p><h3>Termly Results</h3></p>
					<a href="<?php echo urlFor('/admin/results/getResult.php');?>" class="btn btn-primary btn-lg mr-2 p-3 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">Individually</a>
					<a href="<?php echo urlFor('/admin/results/getResultAll.php');?>" class="btn btn-primary btn-lg mr-2 p-3 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">In batches</a>
				</div>
			</div>
			<div>
				<div class="col-6">
					<p class="text-right"><h3>Annual Summary</h3></p>
					<a href="viewStudent.php" class="btn btn-primary btn-lg mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">View All Students </a>
					<a href="viewStudent.php" class="btn btn-primary btn-lg mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">View Students </a>
				</div>
			</div>
				
			
			</div>
		</div>	
		<!-- End of Div for the other part -->			
	</div>

</main>
</body>
</html>