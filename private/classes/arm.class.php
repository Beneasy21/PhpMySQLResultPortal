<?php

class Arm extends DatabaseObject{

	static protected $tableName = "tblarm";
	static protected $dbColumns = ['id','armName','armDesc'];

	public $id;
	public $armName;
	public $armDesc;
	
	public  function __construct($args=[]){
	
		$this->armName = $args['armName'] ?? '';
		$this->armDesc = $args['armDesc'] ?? '';
		
	}

protected function validate() {
  $this->errors = [];

  if(is_blank($this->armName)) {
    $this->errors[] = "armAbbreviation cannot be blank.";
  } 

  if(is_blank($this->armDesc)) {
    $this->errors[] = "arm Description cannot be blank.";
  } 

  return $this->errors;
}

}


//}
?>