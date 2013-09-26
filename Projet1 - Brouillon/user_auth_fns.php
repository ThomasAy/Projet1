<?php
require_once('db_fns.php');

function login($mail, $passwd){
	$conn = db_connect();
	if(!$conn){
		return false;
	}
	$passwd = md5($mail.$passwd);

	$result = $conn->query("select * from user where mail = '".$mail."' and password = '".$passwd."'");
	
	if(!$result){
		return false;
	}

	
	if($result->num_rows>0){
		return true;
	} else {
		return false;
	}
}

function is_admin($mail){
	$conn = db_connect();
	if(!$conn){
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