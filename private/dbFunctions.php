<?php


function dbConnect(){
	$connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	confirmDbConnect($connection);
	return $connection;
}

function confirmDbConnect($connection){
	if($connection->connect_errno){
		$msg = "Database Connection Failed";
		$msg .= $connection->error;
		$msg .= "[" . $connection->errno . "]";
		exit($msg);
	}
}

function dbDisconnect($connection){
	if(isset($connection)){
		$connection->close();
	}
}

?>