<?php
require_once('db_fns.php');

function login($mail, $passwd){
	$conn = db_connect();
	if(!$conn){
		return false;
	}
	
	$result = $conn->query("select * from admin where username = '".$username."' and password = sha1('".$passwd."')");
	
	if(!$result){
		return false;
	}
	
	if($result->num_rows>0){
		return true;
	} else {
		return false;
	}
}

function check_admin_user(){
	if(isset($_SESSION['admin_user'])){
		return true;
	} else {
		return false;
	}
}


?>