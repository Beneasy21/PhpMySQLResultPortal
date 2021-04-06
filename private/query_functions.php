<?php

//Get a stud Login 
//For one login per student
function fetch_studentLogin_by_id($id){
	global $db;

	$sql = "SELECT * FROM students ";
	$sql .= "WHERE studId='".$id."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);

	$student = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $student;
}



//Get a student
function fetch_student_by_id($id){
	global $db;

	$sql = "SELECT * FROM students ";
	$sql .= "WHERE studId='".$id."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);

	$student = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $student;
}


//Get Term Name
function find_termName($Term){
	global $db;

	$sql = "SELECT termName FROM tblTerm ";
	$sql .= "WHERE termId='".$Term."'";
	$result = mysqli_query($db,$sql);
	echo $sql;
	confirm_result_set($result);

	$term = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $term;
}

//Get Subject Name
function find_subjectName($subject){
	global $db;

	$sql = "SELECT * FROM tblsubjects ";
	$sql .= "WHERE subId='".$subject."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);
	$subject = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $subject;
}

//Get Class Name
function find_className($class){
	global $db;

	$sql = "SELECT * FROM tblclass ";
	$sql .= "WHERE classsId='".$class."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);
	$Class = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Class;
}

//Get Arm Name
function find_armName($arm){
	global $db;

	$sql = "SELECT * FROM tblarm ";
	$sql .= "WHERE armId='".$arm."'";
	$result = mysqli_query($db,$sql);
	//echo $sql;
	confirm_result_set($result);
	$Arm = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Arm;
}


//Getting names from ids Termly
function convert_id_to_name($Term, $Arm, $academicYear, $CurrentClass){
	global $db;

	$sql = "SELECT resClass, termName, classsName, armName,acadYrName
	FROM results r
	INNER JOIN tblClass tc ON r.resclass = tc.classsId
	INNER JOIN tblTerm tt ON r.term = tt.termId
	INNER JOIN tblArm ta ON r.arm = ta.armId
	INNER JOIN tblacadYr tay ON r.acadYr = tay.acadYrId
	WHERE r.resClass = '".$CurrentClass."' AND r.term = '".$Term."' AND r.arm = '".$Arm."' 
	AND r.acadYr = '".$academicYear."'
	LIMIT 1";	

	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
	
}

//Getting names from ids Annual
function convert_id_to_name_annual($Arm, $academicYear, $CurrentClass){
	global $db;

	$sql = "SELECT resClass, termName, classsName, armName,acadYrName
	FROM results r
	INNER JOIN tblClass tc ON r.resclass = tc.classsId
	INNER JOIN tblTerm tt ON r.term = tt.termId
	INNER JOIN tblArm ta ON r.arm = ta.armId
	INNER JOIN tblacadYr tay ON r.acadYr = tay.acadYrId
	WHERE r.resClass = '".$CurrentClass."' AND r.arm = '".$Arm."' 
	AND r.acadYr = '".$academicYear."'
	LIMIT 1";	

	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
	
}


//Insert results
function insert_result($ca1, $ca2,$exam,$resId,$academicYear,$Term,$Arm,$CurrentClass,$Subject,$HIC,$LIC,$AIC,$examTotal,$Combination){
	global $db;

	$sql = "insert into results(ca1, ca2, exam, studId, acadYr, term, arm, resClass, subjects, chm, clm, cam, examTotal, combination) 
		Values($ca1, $ca2, $exam, '$resId', '$academicYear', '$Term', '$Arm', '$CurrentClass','$Subject',$HIC,$LIC,$AIC,$examTotal,'$Combination')";

	$result = mysqli_query($db,$sql);

	if($result){
		echo $sql;
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

function insert_student($AdmNo,$Name,$Class,$Sex,$Arm,$House,$AcadYear,$Studentstatus,$StudDOB){
	global $db;

	$sql = "INSERT INTO students (studId,studName,sex,currentClass,arm,house,acadYr,studStatus,studDOB) 
	values('".$AdmNo."','".$Name."','".$Sex."','".$Class."','".$Arm."','".$House."','".$AcadYear."','".$StudentStatus."','".$StudDOB."')";
	
	$result = mysqli_query($db,$sql);

	if($result){
		echo $sql;
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}

//insert subjects
function insert_subject($subject){
	global $db;

	$errors = validate_subject($subject);
	if(!empty($errors)){
		return $errors;
	}        

	$sql = "INSERT INTO subjects ";
	$sql .= "(menu_name, position, visible) ";
	$sql .= "VALUES (";
	$sql .= "'". $subject['menu_name']. "', ";
	$sql .= "'" .$subject['position']. "', ";
	$sql .= "'" .$subject['visible']. "'";
	$sql .= ")";
	$result = mysqli_query($db,$sql);

	if($result){
		echo $sql;
		return true;
	}else{
	   echo  mysqli_error($db);
	   db_disconnect($db);
	   exit;
	}
}


//Comments
function find_all_comments(){
	global $db;

	$sql = "SELECT * FROM comments";
	$commentSet = mysqli_query($db, $sql);
	confirm_result_set($commentSet);
	return $commentSet;
}

//student Status
function find_status(){
	global $db;

	$sql = "SELECT * FROM tblsstatus";
	$sstatus = mysqli_query($db, $sql);
	confirm_result_set($sstatus);
	return $sstatus;
}

function find_comments_by_id($id){
	global $db;

	$sql = "SELECT * FROM comments ";
	$sql .= "WHERE commId='".$id."'";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	$comment = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $comment;
}

function find_comments_by_id_and_term($id,$term){
	global $db;

	$sql = "SELECT * FROM comments ";
	$sql .= "WHERE commId='".$id."' AND term='".$term."' ";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	$comment = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $comment;
}

//Students
//All Students in a particular class and arm
function fetch_All_students_by_class_and_arm($studClass, $arm){
	global $db;

	$sql = "SELECT * FROM students ";
	$sql .= "WHERE currentClass='".$studClass."' AND arm='".$arm."'";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

//inividual student for result page
function fetch_one_student_by_id($RegNo){
	global $db;

	$sql = "SELECT s.id,s.studId,s.studName,s.sex,tc.classsName,ta.armName,s.house,tay.acadYrName,s.arm   FROM students s
			INNER JOIN tblClass tc ON s.currentClass = tc.classsId 
			INNER JOIN tblarm ta ON s.arm = ta.armId 
			INNER JOIN tblacadYr tay ON s.acadYr = tay.AcadYrId
			where studId = '".$RegNo."' LIMIT 1";
			$result = mysqli_query($db,$sql);
			confirm_result_set($result);
			check_empty_record($result);
			return $result;

}

function fetch_one_student($RegNo, $Session){
	global $db;

	$sql = "SELECT s.id,s.studId,s.studName,s.sex,tc.classsName,ta.armName,s.house,tay.acadYrName,s.arm   FROM students s
			INNER JOIN tblClass tc ON s.currentClass = tc.classsId 
			INNER JOIN tblarm ta ON s.arm = ta.armId 
			INNER JOIN tblacadYr tay ON s.acadYr = tay.AcadYrId
			where studId = '".$RegNo."' AND AcadYr = '".$Session."'";
			$result = mysqli_query($db,$sql);
			confirm_result_set($result);
			check_empty_record($result);
			return $result;

}

function fetch_a_student_for_batch($RegNo, $Session){
	global $db;
	
	$sql = "SELECT s.id,s.studId,s.studName,s.house,s.sex,tc.classsName,ta.armName,tay.acadYrName,s.arm   
	FROM students s
	INNER JOIN tblClass tc ON s.currentClass = tc.classsId 
	INNER JOIN tblarm ta ON s.arm = ta.armId 
	INNER JOIN tblacadYr tay ON s.acadYr = tay.AcadYrId
	where s.studId = '".$RegNo."' AND s.AcadYr = '".$Session."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

function fetch_student_for_batch($Session, $Term, $Class, $Armm){
	global $db;

	$sql = "SELECT DISTINCT r.studId, s.studName,s.sex, tc.classsName,ta.armName,s.house,tay.acadYrName
		FROM results r
		INNER JOIN students s ON s.studId = r.studId
		INNER JOIN tblClass tc ON s.currentClass = tc.classsId 
		INNER JOIN tblarm ta ON s.arm = ta.armId 
		INNER JOIN tblacadYr tay ON s.acadYr = tay.AcadYrId
		where s.AcadYr = '$Session' and r.term = '$Term' and s.currentClass = '$Class' AND s.arm = '$Armm'";
		//echo $sql;
		$result = mysqli_query($db,$sql);
		confirm_result_set($result);
		check_empty_record($result);
		return $result;
}

function fetch_a_studid_from_result($Session, $Class, $Arm){
	global $db;

	$sql = "Select distinct studId 
			FROM results 
			WHERE AcadYr = '$Session'  AND resclass = '$Class' AND arm = '$Arm'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}
//Result
//Termly result
function fetch_individual_result($RegNo,$Session, $Term, $Armm){
	global $db;

	$sql = "select r.*,ts.subName, t.termName from results  r
					INNER JOIN tblsubjects ts ON r.subjects = ts.subId
					INNER Join tblterm t ON r.term = t.termId
					where studId = '".$RegNo."' AND acadYr = '".$Session."' AND term = '".$Term."' 
					AND arm = '".$Armm."'ORDER BY r.resClass,
					 CASE `subjects`
					 WHEN '19' THEN 1
					 WHEN '35' THEN 2
					 WHEN '13' THEN 3
					 ELSE 4
					 END";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}


//Subjects
function fetch_all_subjects(){
	global $db;

	$sql = "SELECT *  FROM tblsubjects";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}

//Getting student classes
function fetch_all_studClass(){
	global $db;

	$sql = "SELECT *  FROM tblclass";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}

//Getting student Arms
function fetch_all_arms(){
	global $db;

	$sql = "SELECT *  FROM tblarm";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}

//Getting term Arms
function fetch_all_terms(){
	global $db;

	$sql = "SELECT *  FROM tblterm";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}

//Getting student AcadYear
function fetch_all_acadYr(){
	global $db;

	$sql = "SELECT *  FROM tblacadyr";
	echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;

}


function fetch_annual_result($RegNo, $Session){
	global $db;

	$sql = "SELECT r1.`subjects`,ts.subName,
			MAX(CASE WHEN r1.`term` = '1' THEN r1.`examTotal` END) 'First',
			MAX(CASE WHEN r1.`term` = '2' THEN r1.`examTotal` END) 'Second',
			MAX(CASE WHEN r1.`term` = '3' THEN r1.`examTotal` END) 'Third',
			MIN(CASE WHEN r2.`examTotal` != 0 THEN r2.`examTotal` END) as lowest,
			MAX(r2.`examTotal`) as highest,
			AVG(r2.`examTotal`) as Avgr
			FROM `results` r1
			LEFT OUTER JOIN `results` r2 ON r2.`subjects` = r1.`subjects`
			INNER JOIN tblsubjects ts ON r1.subjects = ts.subId
			WHERE r1.`studId` = '".$RegNo."' AND r2.`resClass` = r1.`resClass` AND r1.acadYr = '".$Session."'
			GROUP BY r1.`subjects`
			ORDER BY r1.`subjects` ASC";
			//echo $sql;
		$result = mysqli_query($db,$sql);
		confirm_result_set($result);
		check_empty_record($result);
		return $result;
}


//Termly average and Sum
function fetch_termly_avg_n_sum($RegNo,$Session, $Term, $Armm){
	global $db;

	$sql = "select SUM(examTotal), AVG(examTotal) 
	FROM results WHERE studId = '".$RegNo."' AND acadYr = '".$Session."' AND 
	term = '".$Term."' AND arm = '".$Armm."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

//Annual Average and Sum
function fetch_annual_avg_n_sum($RegNo,$Session, $Armm){
	global $db;

	$sql = "select SUM(examTotal), AVG(examTotal) 
	FROM results 
	WHERE studId = '".$RegNo."' AND acadYr = '".$Session."' AND arm = '".$Armm."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

//Next term resumption date
function fetch_next_term($Session, $Term){
	global $db;

	$sql = "select * FROM nextterm WHERE  acadYr = '".$Session."' AND vterm = '".$Term."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;
}

function get_session_name($Session){
	global $db;

	$sql = "select acadYrName FROM tblacadyr WHERE  AcadYrId = '".$Session."'";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	check_empty_record($result);
	return $result;	
}


//Get Broadsheets Termly
function get_broadsheet_name($Term, $Arm, $academicYear, $CurrentClass, $subjects){
	global $db;

	$sql = "SELECT s.studName `Student Name`, $subjects, sum(examTotal) Total, Round(avg(examTotal),2) Average 
			FROM results r 
			inner join students s on r.studId = s.studId 
			WHERE r.resClass = '".$CurrentClass."' AND r.arm = '".$Arm."' AND r.term = '".$Term."' AND r.acadYr = '".$academicYear."'
			group by r.resClass,  r.arm, r.acadYr,s.studName
			";

			$result = mysqli_query($db,$sql);
			confirm_result_set($result);
			check_empty_record($result);
			return $result;
}



function get_broadsheet($Term, $Arm, $academicYear, $CurrentClass){
	global $db;

	$sql = "SEt @@group_concat_max_len = 1024*300";
	mysqli_query($db,$sql);
	$sql = "SELECT GROUP_CONCAT(DISTINCT CONCAT('Sum(if(r.subjects = ''',`subjects`,''',r.ca1 + r.ca2,0)) as `',`subName`,'-CA`,
	     			Sum(if(r.subjects = ''',`subjects`,''',(r.exam),0)) as `',`subName`,'-Exam`,
					Sum(if(r.subjects = ''',`subjects`,''',(r.examTotal),0)) as `',`subName`,'-Total`')) subjects 
			FROM results 
			INNER JOIN tblsubjects tbs ON results.subjects = tbs.subId
			WHERE results.resClass ='".$CurrentClass."' AND results.arm = '".$Arm."' AND results.term = '".$Term."'  AND results.acadYr = '".$academicYear."'";
	
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
	
}

//Get Broadsheets Termly
function get_annual_broadsheet_name($Arm, $academicYear, $CurrentClass, $subjects){
	global $db;

	$sql = "SELECT s.studName `Student Name`, $subjects, sum(examTotal) Total, Round(avg(examTotal),2) Average 
			FROM results r 
			inner join students s on r.studId = s.studId 
			WHERE r.resClass = '".$CurrentClass."' AND r.arm = '".$Arm."' AND r.acadYr = '".$academicYear."'
			group by r.resClass,  r.arm, r.acadYr,s.studName
			";

			$result = mysqli_query($db,$sql);
			confirm_result_set($result);
			check_empty_record($result);
			return $result;
}



function get_annual_broadsheet($Arm, $academicYear, $CurrentClass){
	global $db;

	$sql = "SEt @@group_concat_max_len = 1024*300";
	mysqli_query($db,$sql);
	$sql = "SELECT GROUP_CONCAT(DISTINCT CONCAT('Sum(if(r.subjects = ''',`subjects`,''',r.ca1 + r.ca2,0)) as `',`subName`,'-CA`,
	     			Sum(if(r.subjects = ''',`subjects`,''',(r.exam),0)) as `',`subName`,'-Exam`,
					Sum(if(r.subjects = ''',`subjects`,''',(r.examTotal),0)) as `',`subName`,'-Total`')) subjects 
			FROM results 
			INNER JOIN tblsubjects tbs ON results.subjects = tbs.subId
			WHERE results.resClass ='".$CurrentClass."' AND results.arm = '".$Arm."' AND results.acadYr = '".$academicYear."'";
	
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
	
}