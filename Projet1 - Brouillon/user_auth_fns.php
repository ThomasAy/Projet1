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

	$result = $conn->query("select type_user.nom, type_user.id_type_user, user.id_type
							where type_user.id_type_user=user.type_id
							and where mail='".$mail."'");


}

function check_admin_user(){
	if(isset($_SESSION['admin_user'])){
		return true;
	} else {
		return false;
	}
}

function get_username(){
	$conn = db_connect();
}

function insert_user($mail, $password, $civ, $firstname, $lastname, $adress, $address2, $zipcode, $city, $country, $phone='', $birthday='', $newsletter= '0', $type_user = 1){
	$mysqli = new mysqli('localhost', 'admin', 'caluire et cuire', 'ghl');
	
	//Vérifie si l'utilisateur existe 

	$query = $mysqli->prepare("select from user");
	var_dump($query);
	$query->bind_param('s', $mail);
	$query->execute();
	$query->store_result();

	$rows = $query->num_rows;


	if($rows != 0){
		return false;
	}

	//Insertion du nouvel utilisateur

	$passwd = md5($mail.$password);
	$query = "insert into user values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$instr = $conn->prepare($query);
	$instr->bind_param("issiissssi", '', $name, $firstname, $civ, $type_user, $phone, $mail, $passwd, $birthday, $newsletter);
	$instr->execute();
	$instr->close();

	if(!$instr){
		return false;
	}

	$query = "select id_user from user where mail = '".$mail."'";

	$result = $conen->query($query);

	if(!$result){
		return false;
	}

	if($result->num_rows == 0){
		return false;
	}

	$row = $result->fetch_object();
	$id_user = $row->id_user;

	$query = "insert into address values (?, ?, ?, ?, ?, ?, ?)";
	$instr = $conn->prepare($query);
	$instr->bind_param("iisssssi", '', $id_user, $address, $address2, $city, $zipcode, $country, 1);
	$instr->execute();
	$instr->close();

	return true;

}

?>