<?php
require('ghl_fns.php');
session_start();

if(isset($_POST['mail']) &&  isset ($_POST['passwd'])){

	$mail = $_POST['mail'];
	$passwd = $_POST['passwd'];

	if(login($mail, $passwd)){
		
		$prenom = return_user_firstname($mail);
		$nom = return_user_lastname($mail);
		$type_user = return_type_user($mail);
		$type_civilite = return_type_civilite($mail);
		$_SESSION['mail'] = $mail;
		$_SESSION['user_firstname'] = $prenom;
		$_SESSION['user_lastname'] = $nom;
		switch($type_civilite){
			case 1 : $_SESSION['civ'] = $languages_var['monsieur']; break;
			case 2 : $_SESSION['civ'] = $languages_var['madame']; break;
			case 3 : $_SESSION['civ'] = $languages_var['mademoiselle']; break;
		}
		$_SESSION['civ'] = $type_civilite;
		$_SESSION['type_user'] = $type_user;
		if($type_user == 1){
			$_SESSION['admin'] = $mail;
		}
		header('Location: index.php');
	} else{
		do_html_header($languages_var);
		display_warning_message($languages_var['combinaison_incorrecte']);
		display_login_form($languages_var);
		do_html_footer();
	}
} else {
	do_html_header($languages_var);
	display_warning_message($languages_var['warning']);
	display_login_form();
	do_html_footer();
}