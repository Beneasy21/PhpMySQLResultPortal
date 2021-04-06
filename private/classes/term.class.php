<?php

class Term extends DatabaseObject{

	static protected $tableName = "tblterm";
	static protected $dbColumns = ['id','termName','termDesc'];

	public $id;
	public $termName;
	public $termDesc;
	
	public  function __construct($args=[]){
	
		$this->termName = $args['termName'] ?? '';
		$this->termDesc = $args['termDesc'] ?? '';
		
	}

protected function validate() {
  $this->errors = [];

  if(is_blank($this->termName)) {
    $this->errors[] = "Term Abbreviation cannot be blank.";
  } 

  if(is_blank($this->termDesc)) {
    $this->errors[] = "Term Description cannot be blank.";
  } 

  return $this->errors;
}



}


//}
?>