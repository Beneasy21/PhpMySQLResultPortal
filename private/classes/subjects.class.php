<?php

class Subjects extends DatabaseObject{

	static protected $tableName = "tblsubjects";
	static protected $dbColumns = ['id','subName','subDesc'];

	public $id;
	public $subName;
	public $subDesc;
	
	public  function __construct($args=[]){
	
		$this->subName = $args['subName'] ?? '';
		$this->subDesc = $args['subDesc'] ?? '';
		
	}

protected function validate() {
  $this->errors = [];

  if(is_blank($this->subName)) {
    $this->errors[] = "Subject Abbreviation cannot be blank.";
  } 

  if(is_blank($this->subDesc)) {
    $this->errors[] = "Subject Description cannot be blank.";
  } 

  return $this->errors;
}

}


//}
?>