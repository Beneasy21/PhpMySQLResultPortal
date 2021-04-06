<?php

class Result extends DatabaseObject
{


	static protected $tableName = "results";
	static protected $dbColumns = ['id','studId','acadYr','term','resClass','arm',
	'combination','subjects','ca1','ca2','exam','examTotal','chm','clm','cam'];
	

	public $id;
	public $studId;
	public $acadYr;
	public $term;
	public $resClass;
	public $arm;
	public $combination;
	public $subjects;
	public $ca1;
	public $ca2;
	public $exam;
	public $examTotal;
	public $chm;
	public $clm;
	public $cam;
	public $total;
	public $average;
		
	public  function __construct($args=[]){
		$this->studId=$args['studId'] ?? '';
		$this->acadYr=$args['acadYr'] ?? '';
		$this->term=$args['term'] ?? '';
		$this->resClass=$args['resClass'] ?? '';
		$this->arm=$args['arm'] ?? '';
		$this->combination=$args['combination'] ?? '';
		$this->subjects=$args['subjects'] ?? '';
		$this->ca1=$args['ca1'] ?? '';
		$this->ca2=$args['ca2'] ?? '';
		$this->exam=$args['exam'] ?? '';
		$this->examTotal=$args['examTotal'] ?? '';
		$this->chm=$args['chm'] ?? '';
		$this->clm=$args['clm'] ?? '';
		$this->cam=$args['cam'] ?? '';
		$this->average = $args['average'] ?? '';
		$this->total = $args['total'] ?? '';
		
	}

	
/*protected function validate() {
  $this->errors = [];

  if(is_blank($this->first_name)) {
    $this->errors[] = "First name cannot be blank.";
  } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
    $this->errors[] = "First name must be between 2 and 255 characters.";
  }

  if(is_blank($this->last_name)) {
    $this->errors[] = "Last name cannot be blank.";
  } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255))) {
    $this->errors[] = "Last name must be between 2 and 255 characters.";
  }

  if(is_blank($this->email)) {
    $this->errors[] = "Email cannot be blank.";
  } elseif (!has_length($this->email, array('max' => 255))) {
    $this->errors[] = "Last name must be less than 255 characters.";
  } elseif (!has_valid_email_format($this->email)) {
    $this->errors[] = "Email must be a valid format.";
  }

  if(is_blank($this->username)) {
    $this->errors[] = "Username cannot be blank.";
  } elseif (!has_length($this->username, array('min' => 8, 'max' => 255))) {
    $this->errors[] = "Username must be between 8 and 255 characters.";
  }elseif(!has_unique_username($this->username, $this->id ?? 0)){
  	$this->errors[] = "This Username is in use.";
  }


  if($this->passwordRequired){
  if(is_blank($this->password)) {
    $this->errors[] = "Password cannot be blank.";
  } elseif (!has_length($this->password, array('min' => 12))) {
    $this->errors[] = "Password must contain 12 or more characters";
  } elseif (!preg_match('/[A-Z]/', $this->password)) {
    $this->errors[] = "Password must contain at least 1 uppercase letter";
  } elseif (!preg_match('/[a-z]/', $this->password)) {
    $this->errors[] = "Password must contain at least 1 lowercase letter";
  } elseif (!preg_match('/[0-9]/', $this->password)) {
    $this->errors[] = "Password must contain at least 1 number";
  } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
    $this->errors[] = "Password must contain at least 1 symbol";
  }

  if(is_blank($this->confirm_password)) {
    $this->errors[] = "Confirm password cannot be blank.";
  } elseif ($this->password !== $this->confirm_password) {
    $this->errors[] = "Password and confirm password must match.";
  }
}

  return $this->errors;
}
*/
public static function findByUsername($username){
	$sql = "SELECT * FROM " . static::$tableName. " ";
		$sql .= "WHERE username =  '". static::$database->escape_string($username)."' ";
		//echo $sql;
		$objArray =  static::findBySql($sql);
		if(!empty($objArray)){
			return array_shift($objArray);
		}else{
			return false;
		}

	}

public static function findBystudId($studId){
	$sql = "SELECT * FROM " . static::$tableName. " ";
		$sql .= "WHERE studId =  '". static::$database->escape_string($studId)."' ";
		//echo $sql;
		$objArray =  static::findBySql($sql);
		if(!empty($objArray)){
			return array_shift($objArray);
		}else{
			return false;
		}

	}


public static function findBySIAT($studId,$Session, $Term, $Armm){
	$sql = "SELECT r.*,ts.subName, t.termName FROM " . static::$tableName. " r ";
		$sql .="INNER JOIN tblsubjects ts ON r.subjects = ts.id ";
		$sql .="INNER Join tblterm t ON r.term = t.id ";
		$sql .= "WHERE studId =  '". static::$database->escape_string($studId)."' ";
		$sql .= "AND term =  '". static::$database->escape_string($Term)."' ";
		$sql .= "AND arm =  '". static::$database->escape_string($Armm)."' ";
		$sql .= "AND acadYr =  '". static::$database->escape_string($Session)."' ";
		$sql .= "ORDER BY r.resClass, ";
		$sql .= "CASE `subjects` ";
		$sql .=	"WHEN '19' THEN 1 ";
		$sql .= "WHEN '35' THEN 2 ";
		$sql .= "WHEN '13' THEN 3 ";
		$sql .= "ELSE 4 ";
		$sql .= "END";
		//echo $sql;
		$objArray =  static::findBySql($sql);
		if(!empty($objArray)){
			//return array_shift($objArray);
			return $objArray;
		}else{
			return false;
		}

	}

	public static function findSumAvgBySIAT($studId,$Session, $Term, $Armm)	{
	$sql = "SELECT SUM(examTotal) as total, AVG(examTotal) as average FROM " . static::$tableName. " ";
		$sql .= "WHERE studId =  '". static::$database->escape_string($studId)."' ";
		$sql .= "AND term =  '". static::$database->escape_string($Term)."' ";
		$sql .= "AND arm =  '". static::$database->escape_string($Armm)."' ";
		$sql .= "AND acadYr =  '". static::$database->escape_string($Session)."' ";
		$sql .= "LIMIT 1";
		//echo $sql;
		$objArray =  static::findBySql($sql);
		if(!empty($objArray)){
			return array_shift($objArray);
			//return $objArray;
		}else{
			return false;
		}

	}
	
}


?>