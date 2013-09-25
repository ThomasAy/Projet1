<?php
function db_connect(){
	//$result = new mysqli('mysql.hostinger.fr', 'u190431703_booko', 'russoa17101991', 'u190431703_boko');
	
	$result = new mysqli('localhost', 'admin', 'caluire et cuire', 'ghl');
	
	if(!$result){
		return false;
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
	
	