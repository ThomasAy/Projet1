<?php
require('ghl_fns.php');
session_start();
//On teste si les champs obligatoires ont été remplis, c'est-à-dire qu'il existe une variable $_POST['*champ obligatoire']
if(isset($_POST['civilite']) && isset($_POST['date_naissance']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['zipcode']) && isset($_POST['ville']) && isset($_POST['pays']) && isset($_POST['email']) && isset($_POST['mdp'])){
	$mail = $_POST['email'];
	$mdp = $_POST['mdp'];
	$civ = $_POST['civilite'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	if(isset($_POST['adresse_2'])){
		$adresse_2 = $_POST['adresse_2'];
	}
	$adresse_2 = $_POST['adresse_2'];
	$zipcode = $_POST['zipcode'];
	$ville = $_POST['ville'];
	$pays = $_POST['pays'];
	$password = $_POST['mdp'];
	$birthday = $_POST['date_naissance'];
	if(isset($_POST['newsletter'])){
		$newsletter = $_POST['newsletter'];
	}
	else
		$newsletter = 0;

	if(insert_user($mail, $password, $civ, $prenom, $nom, $adresse, $adresse_2, $zipcode, $ville, $pays, $birthday, $newsletter)){
		header('Location : signup.php');
	} else {
		header('Location : index.php');
	}
}



?>