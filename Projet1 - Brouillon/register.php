<?php
require('ghl_fns.php');
session_start();
//On teste si les champs obligatoires ont été remplis, c'est-à-dire qu'il existe une variable $_POST['*champ obligatoire']
if(isset($_POST['civilite']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['zipcode']) && isset($_POST['ville']) && isset($_POST['pays']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['mdp2'])){

	$mail = $_POST['email'];
	$civ = $_POST['civilite'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	if(isset($_POST['adresse_2'])){
		$adresse_2 = $_POST['adresse_2'];
	} else {
		$adresse_2 = '';
	}
	$zipcode = $_POST['zipcode'];
	$ville = $_POST['ville'];
	$pays = $_POST['pays'];
	$password = $_POST['mdp'];
	$password2 = $_POST['mdp2'];
	if(isset($_POST['newsletter'])){
		$newsletter = $_POST['newsletter'];
	} else{
		$newsletter = 0;
	}

	if(isset($_POST['phone'])){
		$phone = $_POST['phone']; 
	} else {
		$phone = '';
	}
	
	if($password == $password2){
			if(insert_user($mail, $password, $civ, $prenom, $nom, $adresse, $adresse_2, $zipcode, $ville, $pays, $phone, $newsletter)){
				do_html_header($languages_var);
				display_signup_confirm($languages_var);
				do_html_footer($languages_var);
			} else {
				do_html_header($languages_var);
				display_warning_message($languages_var['mail_existant']);
				display_signup_form($languages_var);
				do_html_footer($languages_var);
			}
	} else {
			do_html_header($languages_var);
			display_warning_message($languages_var['mdp_wrong']);
			display_signup_form($languages_var);
			do_html_footer($languages_var);
	}
}
 else {
	do_html_header($languages_var);
	display_warning_message($languages_var['warning']);
	display_signup_form($languages_var);
	do_html_footer($languages_var);
}



?>