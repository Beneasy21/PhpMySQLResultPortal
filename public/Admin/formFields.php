<?php 
	if(!isset($admin)){
		redirectTo(urlFor('/admin/index.php'));
	}
?>

<div class="form-group">
	<input class="form-control" type="text" name="admin[first_name]" id="first_name"  placeHolder="Enter First Name" value="<?php echo h($admin->first_name);?>">
</div>
<div class="form-group">
	<input  class="form-control" type="text" name="admin[last_name]" id="last_name"  placeHolder="Enter Last Name" value="<?php echo h($admin->last_name);?>">
</div>
<div class="form-group">
	<input  class="form-control" type="text" name="admin[email]" id="email"  placeHolder="Enter email" value="<?php echo h($admin->email);?>">
</div>
<div class="form-group">
	<input  class="form-control" type="text" name="admin[username]" id="username"  placeHolder="Enter username" value="<?php echo h($admin->username);?>">
</div>
<div class="form-group">
	<input class="form-control"  type="password" name="admin[password]" id="password"  placeHolder="Enter password" value="">
</div>
<div class="form-group">
	<input class="form-control" type="password" name="admin[confirm_password]" id="comfirm_password"  placeHolder="Repeat password" value="">
</div>	

