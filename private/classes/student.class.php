<?php

class Student extends DatabaseObject{

	static protected $tableName = "students";
	static protected $dbColumns = ['id','studId','studName','sex','currentClass','arm','house','studImage','acadYr','studStatus','studDOB','studIdYr','studPass	'];

	public $id;
	public $studId;
	public $studName;
	public $sex;
	public $currentClass;
	public $arm;
	public $house;
	public $studImage;
	public $acadYr;
	public $studStatus;
	public $studDOB;
	public $studIdYr;
	protected $studPass;
	public $password;

	
	public  function __construct($args=[]){
		
		$this->studId=$args['studId'] ?? '';
		$this->studName=$args['studName'] ?? '';
		$this->sex=$args['sex'] ?? '';
		$this->currentClass=$args['currentClass'] ?? '';
		$this->arm=$args['arm'] ?? '';
		$this->house=$args['house'] ?? '';
		$this->studImage=$args['studImage'] ?? '';
		$this->acadYr=$args['acadYr'] ?? '';
		$this->studStatus=$args['studStatus'] ?? '';
		$this->studDOB=$args['studDOB'] ?? '';
		$this->studIdYr=$args['studIdYr'] ?? '';
		$this->studPass=$args['studPass'] ?? '';
		$this->password=$args['password'] ?? '';
		
	}

	
	protected function setHashedPassword(){
		$this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
	}

	public function verifyPassword($password){
		return password_verify($password, $this->studPass);
	}

	protected function create(){
		$this->setHashedPassword();
		return parent::create();
	}

	protected function update(){
		if($this->password != ''){
			$this->setHashedPassword();
		//Then validate password	
		}else{
			//No password supplied, skip hashing and validation.
			$this->passwordRequired = false;// changing password required
		}
		return parent::update();
	}
/*
protected function validate() {
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

}


//}
?>