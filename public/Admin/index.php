<?php 	require_once('../../private/initialize.php'); 

//Checking if logged in
if(!$session->isLoggedIn()){
	redirectTo(urlFor('admin/login.php'));
}
	$admin = Admin::findById($_SESSION['admin_id']);
?>
<?php  include(SHARED_PATH . '/publicHeader.php');
	
?>
<main class = "container mt-3">
	<div class="w-50 p-3 mx-auto shadow-lg rounded">
		<div class="row pt-10">
			<div class="col-3"></div>
			<div class="col-6 mx-auto ">
				<img class="w-100 rounded-circle" src="<?php echo urlFor('/images/CommandLogo.jpg');?>" width="1500" height="250"><hr>
			</div>
			<div class="col-3"></div>
		</div>
		<div class="row">
			<div class="col mx-auto">
				<h4>W e l c o m e !</h4>
				<p><?php 

				echo $admin->fullName(); ?></p>
			</div>
		</div>
		<div class="row">
			<div > <hr> </div>
		</div> 
		<div class="row pb-2">
			<div class="col-4">
				<a href="<?php echo urlFor('/admin/results/secondPage.php');?>" class="btn btn-primary btn-lg mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">Print Students Results</a>
			</div>
			<div class="col-4">
				<a href="viewStudent.php" class="btn btn-primary btn-lg mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">View All Students </a>
			</div>
			<div class="col-4">
				<a href="viewcomment.php" class="btn btn-primary btn-lg mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">View Comments</a>
			</div>
		</div>
		<div class="row pb-2">
			<div class="col-6">
				<a href="tobroadsheet.php" class="btn btn-primary btn-lg mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">Print Termly Broadsheet</a>
			</div>
			<div class="col-6">
				<a href="toannualBroadsheetReal.php" class="btn btn-primary btn-lg mr-2 btn-block option-button" style="white-space:normal !important; word-wrap:break-word; word-break:normal" role="button">Print Annual Broadsheet</a>
			</div>			
			
		</div>

		<div class="row">
			<div class="col-12">
			
				<a href="<?php echo urlFor('admin/logout.php');?>">Log out</a>

			</div>
		</div>
		<?php  include(SHARED_PATH . '/AdminFooter.php')?>
		</div>
			
	</div>
	</main>