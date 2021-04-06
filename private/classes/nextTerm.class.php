<?php

class Nextterm extends DatabaseObject{

	static protected $tableName = "nextterm";
	static protected $dbColumns = ['id','acadYr','vTerm','explanation'];

	public $id;
	public $acadYr;
	public $vTerm;
	public $explanation;
	
	public  function __construct($args=[]){
	
		$this->acadYr = $args['acadYr'] ?? '';
		$this->vTerm = $args['vTerm'] ?? '';
		$this->explanation = $args['explanation'] ?? '';
		
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

public static function findNextTerm($Session, $Term)	{
	$sql = "SELECT *  FROM " . static::$tableName. " ";
		$sql .= "WHERE vTerm =  '". static::$database->escape_string($Term)."' ";
		$sql .= "AND acadYr =  '". static::$database->escape_string($Session)."' ";
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