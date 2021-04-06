<?php 
	if(!isset($sex)){
		redirectTo(urlFor('/admin/sex/index.php'));
	}
?>

<div>
	<input type="text" name="sex[sexName]" id="sexName"  placeHolder="Sex Abbreviation" value="<?php echo h($sex->sexName);?>">
</div>
<div>
	<input type="text" name="sex[sexDesc]" id="sexDesc" value="<?php echo h($sex->sexDesc);?>" placeHolder="Sex Long Name">
</div>