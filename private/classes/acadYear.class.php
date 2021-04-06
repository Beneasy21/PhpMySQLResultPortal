<?php

class AcadYear extends DatabaseObject{

	static protected $tableName = "tblacadyr";
	static protected $dbColumns = ['id','acadYrName','acadYrDesc'];

	public $id;
	public $acadYrName;
	public $acadYrDesc;
	
	public  function __construct($args=[]){
	
		$this->acadYrName = $args['acadYrName'] ?? '';
		$this->acadYrDesc = $args['acadYrDesc'] ?? '';
		
	}

protected function validate() {
  $this->errors = [];

  if(is_blank($this->acadYrName)) {
    $this->errors[] = "AcadYear Abbreviation cannot be blank.";
  } 

  if(is_blank($this->acadYrDesc)) {
    $this->errors[] = "AcadYear Description cannot be blank.";
  } 

  return $this->errors;
}
}

?>