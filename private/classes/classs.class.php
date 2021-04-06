<?php

class Classs extends DatabaseObject{

	static protected $tableName = "tblclass";
	static protected $dbColumns = ['id','classsName','classsDesc'];

	public $id;
	public $classsName;
	public $classsDesc;
	
	public  function __construct($args=[]){
	
		$this->classsName = $args['classsName'] ?? '';
		$this->classsDesc = $args['classsDesc'] ?? '';
		
	}

protected function validate() {
  $this->errors = [];

  if(is_blank($this->classsName)) {
    $this->errors[] = "Class Abbreviation cannot be blank.";
  } 

  if(is_blank($this->classsDesc)) {
    $this->errors[] = "Class Description cannot be blank.";
  } 

  return $this->errors;
}



}


//}
?>