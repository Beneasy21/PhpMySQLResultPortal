<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="stylesheet" type="text/css" href="<?php echo urlFor('/stylesheets/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php //echo urFor('/stylesheets/myStyles.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php //echo urFor('/stylesheets/custom.css'); ?>" />

    <title><?php //echo $pageTitle ?? '';?></title>
</head>
<body>
	<nav>
		<ul>
			<li><a href="<?php echo urlFor('/admin/sex/index.php');?>">Sex</a></li>
			<li><a href="<?php echo urlFor('/admin/classTeacher/index.php');?>">Class Teacher</a></li>
		</ul>
	</nav>
