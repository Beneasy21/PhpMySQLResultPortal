<?php

class Sex extends DatabaseObject{


	//*****************Start of Active Records
	static protected $tableName = 'tblSex';
	static protected $dbColumns = ['id','sexName', 'sexDesc'];
	

	
	public $id;
	public $sexName;
	public $sexDesc;

	public function __construct($args=[]){
		$this->sexName = $args['sexName'] ?? '';
		$this->sexDesc = $args['sexDesc'] ?? '';
	}

	protected function validate(){
		$this->errors=[];

		if(is_blank($this->sexName)){
			$this->errors[] = "Abbreviation cannot be blank";
		}
		if(is_blank($this->sexDesc)){
			$this->errors[] = "Sex Name cannot be blank";
		}
		return $this->errors;
	}

}
?>