<?php  
	require_once('../../../private/initialize.php'); 
?>
<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- Stylesheets-->
	<link rel="stylesheet" href="<?php echo urlFor('stylesheets/bootstrap.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="style.css" />

	<title><?php echo $page_title ?? 'Command::Result checker';?></title>

</head>
<body background = 'Page-BgTexture.jpg'>
<table size="700" border = 5 align = center>
<tr>
<td> <img width ="700" height = "150" src="<?php echo urlFor('images/Headpix.png');?>"></td>
</tr>
<tr>
<td><marquee behavior=alternate><font size=6 color=red>Welcome to the result checking portal</font></marquee>	</td>
</tr>
<tr>
<td>

<div id="containt" align="center">
<form action="<?php echo urlFor('Admin/Results/result.php');?>" method="post">
<table border=1 bgcolor=cream>
<tr>
	<td>
<div id="header"><h2 class="sansserif" align="center">Enter your Details</h2></div>
	</td>
</tr>
 <tr>
	<td> 
		<table>
			<tr>
				<td>Reg No:</td>
				<td> <input type="text" name="RegNo" size="20"></td>
			</tr>
			<?php 
				include(SHARED_PATH . '/acadYear.php');
				include(SHARED_PATH . '/term.php');
				include(SHARED_PATH . '/studClass.php');
				include(SHARED_PATH . '/schArms.php');
			?>
			<tr>
				 <td ><input type="submit" value="Continue"></td>
				 <td align="center"><input type="reset" value="Reset"></td>
			</tr>
			
			</form>
			
		</table>
	</td>
	</tr>
 </table>
 </td>
 </tr>
 
 </table>
</div>
</body>
</html>