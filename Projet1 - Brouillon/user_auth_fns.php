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


function check_mail($mail){
	$conn = db_connect();


	$query = "select `mail` from `user` where mail = '$mail'";

	$result = $conn->prepare($query);

	$result->execute();
	$result->store_result();
	$rows = $result->num_rows;

	return $rows;



}
function return_user_firstname($mail){
	$conn = db_connect();

	if(!$conn){
		return false;
	}

	$query = "select prenom from user where mail = ?";

	$result = $conn->prepare($query);
	$result->bind_param("s", $mail);
	$result->execute();
	$result->bind_result($firstname);
	$result->fetch();

	$result->close();

	return $firstname;
}

function return_user_lastname($mail){
	$conn = db_connect();

	if(!$conn){
		return false;
	}

	$query = "select nom from user where mail = ?";

	$result = $conn->prepare($query);
	$result->bind_param("s", $mail);
	$result->execute();
	$result->bind_result($lastname);
	$result->fetch();

	$result->close();

	return $lastname;
}

function return_type_user($mail){
	$conn = db_connect();

	if(!$conn){
		return false;
	}

	$query = "select id_type from user where mail = ?";
	$result = $conn->prepare($query);
	$result->bind_param("s", $mail);
	$result->execute();
	$result->bind_result($id_type);
	$result->fetch();

	$result->close();

	return $id_type;
}

function return_type_civilite($mail){
	$conn = db_connect();
	$query = "select id_civi from user where mail = ?";
	$result = $conn->prepare($query);
	$result->bind_param("s", $mail);
	$result->execute();
	$result->bind_result($id_civi);
	$result->fetch();

	$result->close();

	return $id_civi;
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

function insert_user($mail, $password, $civ, $firstname, $lastname, $address, $address2, $zipcode, $city, $country, $phone='', $newsletter= '0', $type_user = 3){
	
    $conn = db_connect();
	
	
	//Vérifie si l'utilisateur existe 

	$query = "select `mail` from `user` where mail = '$mail'";

	$result = $conn->prepare($query);

	$result->execute();
	$result->store_result();
	$rows = $result->num_rows;

	if(!$result || $rows != 0){
		return false;
	}
		


	//Insertion du nouvel utilisateur
	$id = '';

	$passwd = md5($mail.$password);
	$query = "insert into user values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$instr = $conn->prepare($query);
	$instr->bind_param("issiisssi", $id, $lastname, $firstname, $civ, $type_user, $phone, $mail, $passwd, $newsletter);
	$instr->execute();
	$instr->close();

	if(!$instr){
		return false;
	}

	$query = "select id_user from user where mail = '".$mail."'";

	$result = $conn->query($query);

	if(!$result){
		return false;
	}

	if($result->num_rows == 0){
		return false;
	}

	$row = $result->fetch_object();
	$id_user = $row->id_user;

	echo $id_user;
	//Par défaut, au moment de la création de l'utilisateur dans la base de données
	// C'est l'adresse de facturation qui est insérée dans la table user, l'ID d'une adresse de facturation est 1
	$type_address = 1;
	$query = "insert into address values (?, ?, ?, ?, ?, ?, ?, ?)";

	$instr = $conn->prepare($query);
	$instr->bind_param("iisssssi", $id, $id_user, $address, $address2, $city, $zipcode, $country, $type_address);
	$instr->execute();
	$instr->close();

	return true;

}

?>