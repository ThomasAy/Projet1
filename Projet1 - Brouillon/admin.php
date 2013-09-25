<?php
//Inclut le fichier de fonctions pour cette application
require('book_sc_fns.php');
session_start();

if(isset($_POST['username']) && isset($_POST['passwd'])){
	//Essai de connexion
	
	$username = $_POST['username'];
	$passwd = $_POST['passwd'];
	
	if(login($username, $passwd)){
		//Si cet utilisateur est dans la base on enregistre son id
		$_SESSION['admin_user'] = $username;
	} else {
		//Echec de la connexion
		do_html_header("Problem");
		echo "<p> You must be logged in to view this page</p>";
		do_html_url('login.php', 'Login');
		do_html_footer();
		exit;
	}
}
	
	do_html_header("Administration");
	if(check_admin_user()){
		display_admin_menu();
	} else {
		echo "<p> You are not authorized to enter the administration area</p>";
	}
	do_html_footer();
?>
	