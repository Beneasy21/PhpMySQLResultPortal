<?php

class House extends DatabaseObject{

	static protected $tableName = "tblhouse";
	static protected $dbColumns = ['id','houseName','houseDesc'];

	public $id;
	public $houseName;
	public $houseDesc;
	
	public  function __construct($args=[]){
	
		$this->houseName = $args['houseName'] ?? '';
		$this->houseDesc = $args['houseDesc'] ?? '';
		
	}

protected function validate() {
  $this->errors = [];

  if(is_blank($this->houseName)) {
    $this->errors[] = "house Abbreviation cannot be blank.";
  } 

  if(is_blank($this->houseDesc)) {
    $this->errors[] = "house Description cannot be blank.";
  } 

  return $this->errors;
}
}

?>