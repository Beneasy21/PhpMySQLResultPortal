<?php
//session_start();
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
	<link rel="stylesheet" type="text/css" href="<?php //echo urlFor('stylesheets/style.css');?>" />
    <title>Command Sec Sch:: Check your Results </title>
</head>
<body>
	<div class="container">
	<table width="800" align=center height="1000">
		<tr class="pb-4">
			<td height="150"><img width="800" Height="150"src="<?php echo urlFor('/images/Headpix.png');?>"></td>
		</tr>
		<?php 
			$RegNo = h($_POST['RegNo']) ?? ''; //Storing Reg Numberin $regNo variable.
			$Session = h($_POST["acadYr"]) ?? '';//Storing Acad Year in $Session variable
			$Term = h($_POST["Term"]) ?? ''; //Storing Term in $Term variable.
			$Class = h($_POST["studClass"]) ?? ''; //Storing Class in $Class variable.
			$Armm = h($_POST["Arm"]) ?? ''; //Storing Arm in $Arm variable.
			$errors = [];
			//$results = fetch_one_student($RegNo, $Session);
			$student = Student::findBystudId($RegNo);
			$classs = Classs::findById($Class);
			$arm = Arm::findById($Armm);
			$acadYr = AcadYear::findById($Session);
			$house = House::findById($student->house);
		?>
		<tr>
			<td height="120">
				<table align=center border="1" width="90%" height="120" class="table w-80 table-bordered mt-4">
					<tr>
						<td width = "14%" align="right" class="table-info"><strong><i>Full Name:</i></td><td bgcolor="#B8DEE9" class="style3" colspan=3 width="42%"><div align="left" class="style9 style6"><strong><?php echo $student->studName;?></strong></div></td>
						<td width = "10%" align="right" class="table-info"><Strong><i>Sex:</i></strong></td><td bgcolor="#B8DEE9" class="style3"width = "12%"><div align="left" class="style9 style6"><strong><?php echo $student->sex;?></strong></div></td>
						<td width = "16%" align="Center" rowspan="3"><img src ="PassPort"></td>
					</tr>
					<tr>
						<td width = "14%"" align="right" class="table-info"><strong><i>Admin No:</i></td><td bgcolor="#B8DEE9" class="style3" width="18"><div align="left" class="style9 style6"><strong><?php  echo $student->studId;?></strong></div></td>
						<td width = "14%" align="right" class="table-info"><strong><i>Class:</i></strong></td><td bgcolor="#B8DEE9" class="style3"width="18"><div align="left" class="style9 style6" ><strong><?php  echo $classs->classsName;?></strong></div></td>
						<td width = "10%" align="right" class="table-info"><strong><i>Arm:</i></strong></td><td bgcolor="#B8DEE9" class="style3" width="12"><div align="left" class="style9 style6"><strong><?php  echo $arm->armName;?></strong></div></td>
					</tr>
					<tr>
						<td width = "14%" align="right" class="table-info"><strong><i>House: </i></strong></td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $house->houseName ?? '';?></strong></div></td>
						<td width = "14%" align="right" class="table-info"><strong><i>Session:</i></strong></td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $acadYr->acadYrName;?></strong></div></td>
						<td width = "10%" align="right" class="table-info"><strong><i>Term:</i></strong></td><td bgcolor="#B8DEE9"  width="12%"><div align="left" ><strong><?php echo $Term ??'';?></strong></div></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="1" bordercolor="#85A157" align=center class="table table-bordered">
					<tr bgcolor="#B8DEE9" class="style3">
						<th ><strong></strong></th>
						<th colspan =2 >1st Summary</th>
						<th colspan =2 >2nd Summary</th>
						<th colspan =2 >Term's Work</th>
						<th colspan =6 >Summary of Term's Work</th>
					</tr>
					<tr bgcolor="#B8DEE9" class="style3">
						<th>Subject</th>
						<th>Marks Obt</th>
						<th>1st Test</th>
						<th>Marks Obt</th>
						<th>2nd Test</th>
						<th>Marks Obt</th>
						<th>Exam</th>
						<th>Marks Obt</th>
						<th>Total Score</th>
						<th>CHM</th>
						<th>CLM</th>
						<th>CAM</th>
						<th>Grade</th>
					</tr>
					<?php
						$FirstSummaryObt = 15;
						$SecondSummaryObt = 15;
						$ExamObt = 70;
						$TotalObt = $FirstSummaryObt + $SecondSummaryObt + $ExamObt;
						
						$results = Result::findBySIAT($RegNo,$Session, $Term, $Armm);
					
					foreach ($results as $result){ 
						$subjects = Subjects::findById($result->subjects);
						?>

					<tr>
						<td ><strong><?php echo $subjects->subName;?></strong></td>
						<td ><?php echo $FirstSummaryObt;?></td>
						<td ><?php echo $result->ca1;?></td>
						<td ><?php echo $SecondSummaryObt;?></td>
						<td ><?php echo $result->ca2;?></td>
						<td ><?php echo $ExamObt;?></strong></td>
						<td ><?php echo $result->exam;?></strong></td>
						<td ><?php echo $TotalObt;?></strong></td>
						<td ><?php echo $result->examTotal;?></strong></td>
						<td ><?php echo $result->chm;?></strong></td>
						<td ><?php echo $result->clm;?></strong></td>
						<td ><?php echo $result->cam;?></strong></td>
						<td ><?php require('../../../private/grades.php');?></td>
					</tr>
						
					<?php } ?>
				</table>
				<p class="p-2">
					<i>* CHM = Class Highest Marks, CLM = Class Lowest Marks, CAM = Class Average Marks			</i>
				</p>
			</td>
		</tr>
		<!-- Extra Space-->
		
		
		<!-- Result Comments area-->
		<tr>
			<td>
			<?php
				$avgs = Result::findSumAvgBySIAT($RegNo, $Session, $Term, $Armm);
				$AverageScore = round($avgs->average,2);
				$TotalScore = $avgs->total;	
			?>
				<!--   ====================     Comment Table  ==============    -->
				<table border = "1" width = "70%" align="center">
					<tr valign = "Top">
						<td><strong> Total Score:</strong></td> <td><strong> <?php echo $TotalScore;?></strong></td><td align="Right"><strong> Average :</strong></td> <td><strong> <?php echo $AverageScore;?></strong></td>
					</tr>
					<tr >
						<td colspan = "2" align="right"><strong> Next term begins:</strong></td> 
						<td  Colspan="2"><strong>
						<?php 
							$nextTerm = Nextterm::findNextTerm($Session, $Term);
								echo $nextTerm->explanation ?? '';?></strong>
						</td>
					</tr>
					</table>
					<table border="1" width="100%"bordercolor="#85A157" align=center>	
					<?php 
						$comments = Comments::findTermlyComment($RegNo, $Session, $Term);

					 ?>
					<tr bgcolor="#B8DEE9" class="style3">	
						<td><strong>Class Teacher's Remarks</strong></td><td><strong><?php echo $comments->classTeacher; ?> </strong></td>
					</tr>
					<tr bgcolor="#B8DEE9" class="style3">	
						<td><strong>House Parent's Remarks</strong></td><td><strong><?php echo $comments->houseParent ?></strong></td>
					</tr>
					<tr bgcolor="#B8DEE9" class="style3">
						<td><strong>Commandant's Remarks</strong></td><td> <strong>
							
							<?php 
								 if($comments->commandant != NULL){//Checking for commandant's comment
								 	echo $comments->commandant;
								 }
								 //no comment, Use average to automate
								 include(SHARED_PATH .'/commandantAuto.php');
							
						?></strong></td>
					</tr>

					<tr>
						<td colspan="8" class="style3"><div align="left" class="style12"> </div></td>
					</tr>
			</td>
		</tr>
		
		
		</td>
		</tr>
		
</table>
	</div>
		</body>
		</html>
	            