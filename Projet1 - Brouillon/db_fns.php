<?php
function db_connect(){
	$result = new mysqli('localhost', 'root', 'root', 'ghl');
	
	if (mysqli_connect_errno()) {
 	 exit('Connect failed: '. mysqli_connect_error());
	}
	$result->autocommit(TRUE);
	return $result;
}

function db_result_to_array($result){
	$res_array = array();
	
	for($count=0; $row = $result->fetch_assoc(); $count++){
		$res_array[$count] = $row;
	}
	
	return $res_array;
}
?>