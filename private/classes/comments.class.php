<?php

class Comments extends DatabaseObject{

	static protected $tableName = "comments";
	static protected $dbColumns = ['id','studId','acadYr','term','classTeacher','houseParent', 'commandant'];

	public $id;
	public $studId;
	public $acadYr;
	public $term;
	public $classTeacher;
	public $houseParent;
	public $commandant;
	
	public  function __construct($args=[]){
	
		$this->studId = $args['studId'] ?? '';
		$this->acadYr = $args['acadYr'] ?? '';
		$this->term = $args['term'] ?? '';
		$this->classTeacher = $args['classTeacher'] ?? '';
		$this->houseParent = $args['houseParent'] ?? '';
		$this->commandant = $args['commandant'] ?? '';
		
		
	}

	protected function validate() {
	  $this->errors = [];

	  if(is_blank($this->studId)) {
	    $this->errors[] = "Reg No cannot be blank.";
	  } 

	  if(is_blank($this->acadYr)) {
	    $this->errors[] = "Session cannot be blank.";
	  } 

	  if(is_blank($this->term)) {
	    $this->errors[] = "Term cannot be blank.";
	  } 
	  return $this->errors;
	}

	public static function findTermlyComment($studId, $Session, $Term){
		$sql = "SELECT *  FROM " . static::$tableName. " ";
		$sql .= "WHERE term =  '". static::$database->escape_string($Term)."' ";
		$sql .= "AND acadYr =  '". static::$database->escape_string($Session)."' ";
		$sql .= "AND studId =  '". static::$database->escape_string($studId)."' ";
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


//}
?>