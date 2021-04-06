<?php
    require_once('../../private/initialize.php');
    //session_start();
    //require_login();
    //$studId = h(u($_SESSION['stud_id'])) ?? '1000000';
    //$studId = h($_SESSION['studId']);

    //$student = '';//fetch_student_by_id($studId);
    //$studClass = '';//find_className($student['currentClass']);

    include(SHARED_PATH . '/publicHeader.php');
?>

Be a good boy


<!--	<div class="container tea">
		<header class="text-center header rounded">
			<div class="p-2">
				<img class="img rounded" src="<?php echo urlFor('images/Header.png');?>" alt="header pix" >	
			</div>
		</header>
		<div class="row p-2">
			<div class="col-md-3 ash rounded">
				<div class="text-center p-3">
					<img class="img rounded-circle" src="<?php echo urlFor('images/Logo.png');?>" alt="Logo pix" style="height: 120px; width:120px;">		
				</div>
				<p>Welcome, <?= $student['studName'] ?? '';?></p>			
				<ul>
					<li><a href="<?php echo urlFor('students/myResults.php?studId='.$studId.'&arm='.$student['arm']); ?>">Results</a></li>
					
					<li><a href="">Payments</a></li>
					<li><a href="">Profile</a></li>
					<li><a href="">Assignments</a></li>
					<li><a href="<?php echo urlFor('students/logout.php');?>">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-9 blue rounded">
				<!-- Begining of the Result column -->

						<?php

/*	if(!isPostRequest()){
		$StudId = h($_GET['studId']) ?? ''; //Storing Reg Numberin $regNo variable.
		$Session = '3';//Storing Acad Year in $Session variable
		$Term = '2'; //Storing Term in $Term variable.
		$Armm = h($_GET["arm"]) ?? ''; //Storing Arm in $Arm variable.	
	?>
	<div class="row p-5">
		<div class="col-2"></div>
		<div class="col-8 tea text-center shadow m-5">	
		<table width="400" align="center" border="1" class="text-center p-3">
			<form method="POST" action = "<?php echo url_for('students/myresults.php');?>">
				<input type="hidden" name="studId" value="<?php echo $StudId;?>">
				<input type="hidden" name="acadYr" value="<?php echo $Session;?>">
				<input type="hidden" name="arm" value="<?php echo $Armm;?>">
				<tr><?php include(SHARED_PATH .'/acadYear.php'); ?></tr>
				<tr><?php include(SHARED_PATH .'/term.php'); ?></tr>
				<tr><td colspan="2"><input type="submit" value="View Result" name="submit"></td></tr>
			</form>					
		</table>
		</div>		
		<div class="col-2"></div>
	</div>


	<?php } ?>
	<!-- End of get method -->


	<!-- Begin of post method -->
	
	<?php 
		@$RegNo = h($_POST['studId']) ?? ''; //Storing Reg Numberin $regNo variable.
		@$Session = h($_POST["acadYr"]) ?? '3';//Storing Acad Year in $Session variable
		@$Term = h($_POST["Term"]) ?? '1'; //Storing Term in $Term variable.
		@$Armm = h($_POST["arm"]) ?? ''; //Storing Arm in $Arm variable.
		
		$results = fetch_one_student_by_id($RegNo);
		// Loop through each records 
		while($row = mysqli_fetch_assoc($results))
		{
			$Name=$row['studName'];
			$Sex=$row['sex'];
			$AdmNo = $row["studId"];			
			$Class = $row["classsName"];
			$Arm = $row["armName"];
			$AcadYr = $row["acadYrName"];
			$Armm = $row["arm"];//For the next query
			$House = $row["house"];
		}

		//echo $Name, $Class, $AcadYr, $House, $Armm;
	?>
		<!-- End of get method -->
		<div class="container text-center">
		<table width="90%" align=center >
			<tr>
				<td height="150" style="display:none;" class="text-center"><img width="600" Height="150"src="<?php echo url_for('/images/Header.png');?>"></td>
			</tr>
			<tr>	
			<td height="120" class="text-center p-5">
				<table align=center border="1" width="90%" height="120">
					<tr>
						<td width = "14%" align="right"><strong><i>Full Name:</i></td><td bgcolor="#B8DEE9" class="style3" colspan=3 width="42%"><div align="left" class="style9 style6"><strong><?php echo $Name;?></strong></div></td>
						<td width = "10%" align="right"><Strong><i>Sex:</i></strong></td><td bgcolor="#B8DEE9" class="style3"width = "12%"><div align="left" class="style9 style6"><strong><?php echo $Sex;?></strong></div></td>
						<td width = "16%" align="Center" rowspan="3"><img src ="PassPort"></td>
					</tr>
					<tr>
						<td width = "14%"" align="right"><strong><i>Admin No:</i></td><td bgcolor="#B8DEE9" class="style3" width="18"><div align="left" class="style9 style6"><strong><?php  echo $AdmNo;?></strong></div></td>
						<td width = "14%" align="right"><strong><i>Class:</i></strong></td><td bgcolor="#B8DEE9" class="style3"width="18"><div align="left" class="style9 style6" ><strong><?php  echo $Class;?></strong></div></td>
						<td width = "10%" align="right"><strong><i>Arm:</i></strong></td><td bgcolor="#B8DEE9" class="style3" width="12"><div align="left" class="style9 style6"><strong><?php  echo $Arm;?></strong></div></td>
					</tr>
					<tr>
						<td width = "14%" align="right"><strong><i>House: </i></strong></td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $House;?></strong></div></td>
						<td width = "14%" align="right"><strong><i>Session:</i></strong></td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $AcadYr;?></strong></div></td>
						<td width = "10%" align="right"><strong><i>Term:</i></strong></td><td bgcolor="#B8DEE9" class="style3" width="12%"><div align="left" class="style9 style6"><strong><?php echo $Term ??'';?></strong></div></td>
					</tr>
				</table>
			</td>
			</tr>
			<tr>
			<td>
				<table width="100%" border="1" bordercolor="#85A157">
					<tr bgcolor="#B8DEE9" class="style3">
						<th width = "32%"><strong></strong></th>
						<th colspan =2 width = "11%">1st Summary</th>
						<th colspan =2 width = "11%">2nd Summary</th>
						<th colspan =2 width = "13%">Term's Work</th>
						<th colspan =6 width = "33%">Summary of Term's Work</th>
					</tr>
					<tr bgcolor="#B8DEE9" class="style3">
						<th width = "32%">Subject</th>
						<th width = "5%">Marks Obt</th>
						<th width = "6%">1st Test</th>
						<th width = "5%">Marks Obt</th>
						<th width = "6%">2nd Test</th>
						<th width = "7%">Marks Obt</th>
						<th width = "6%">Exam</th>
						<th width = "7%">Marks Obt</th>
						<th width = "6%">Total Score</th>
						<th width = "6%">CHM</th>
						<th width = "6%">CLM</th>
						<th width = "6%">CAM</th>
						<th width = "6%">Grade</th>
					</tr>
					<tr>
					<?php
				
						$result = fetch_individual_result($RegNo,$Session, $Term, $Armm);
						while($row = mysqli_fetch_array($result))
						{
						$Subject = $row['subName'];
						$CA1=$row['ca1'];
						$CA2=$row['ca2'];
						
						$Exams=$row['exam'];
						$Total= $CA1 + $CA2 +$Exams;
						$HIC=$row['chm'];
						$LIC=$row['clm'];
						$AIC=$row['cam'];
						
						$FirstSummaryObt = 15;
						$SecondSummaryObt = 15;
						$ExamObt = 70;
						$TotalObt = $FirstSummaryObt + $SecondSummaryObt + $ExamObt;
					?>
						<td width = "28%" class="text-left"><strong><?php echo $Subject;?></strong></td>
						<td width = "5%"><strong><?php echo $FirstSummaryObt;?></strong></td>
						<td width = "6%"><strong><?php echo $CA1;?></strong></td>
						<td width = "5%"><strong><?php echo $SecondSummaryObt;?></strong></td>
						<td width = "6%"><strong><?php echo $CA2;?></strong></td>
						<td width = "7%"><strong><?php echo $ExamObt;?></strong></td>
						<td width = "6%"><strong><?php echo $Exams;?></strong></td>
						<td width = "7%"><strong><?php echo $TotalObt;?></strong></td>
						<td width = "6%"><strong><?php echo $Total;?></strong></td>
						<td width = "6%"><strong><?php echo $HIC;?></strong></td>
						<td width = "6%"><strong><?php echo $LIC;?></strong></td>
						<td width = "6%"><strong><?php echo $AIC;?></strong></td>
						<td width = "6%"><strong><?php require('../../private/grades.php');?></strong></td>
					</tr>
					<?php } ?>
				</table>				
				<p class="p-2">
					<i>* CHM = Class Highest Marks, CLM = Class Lowest Marks, CAM = Class Average Marks			</i><td>
				</p>
			</td>
		</tr>
		<!-- Extra Space-->
		<tr>
			<td height = 30></td>
		</tr>
		
		<!-- Result Comments area-->
		<tr>
			<td>
				<?php
					$result = fetch_termly_avg_n_sum($RegNo,$Session, $Term, $Armm);

					while($row = mysqli_fetch_array($result))
					{
						$AverageScore = round($row['AVG(examTotal)'],2);
						$TotalScore = $row['SUM(examTotal)'];
					?>
					<!--   ====================     Comment Table  ==============    -->
					<table border = "1" width = "70%"  class="text-center p-5">
						<tr valign = "Top">
							<td><strong> Total Score:</strong></td> <td><strong> <?php echo $TotalScore;?></strong></td><td align="Right"><strong> Average :</strong></td> <td><strong> <?php echo $AverageScore;?></strong></td>
						</tr>
						<tr >
							<td colspan = "2" align="right"><strong> Next term begins:</strong>
							<td  Colspan="2"><strong><?php require_once(SHARED_PATH . '/comment2.php');?></strong></td>
						</tr>
					</table>
					
					<?php require_once(SHARED_PATH . '/comment3.php');?></strong>
					<?php    }	?>
					<tr>
						<td colspan="8" class="style3"><div align="left" class="style12"> </div></td>
					</tr>
			</td>
		</tr>
		
		
		</td>
		</tr>
		</table>
		
  </div>
				<!-- End of the result Column -->
			</div>
		</div>
		<footer class="text-center header rounded">
			<div class="p-2">
				&copy; <?php echo date("Y"). " ";?>   All rights reserved
			</div>
		</footer>
	</div>
	
	    
</body>
</html>
