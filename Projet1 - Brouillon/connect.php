<?php
require('ghl_fns.php');
session_start();

if(isset($_POST['mail']) &&  isset ($_POST['passwd'])){
	//Essai de connexion
	$mail = $_POST['mail'];
	$passwd = $_POST['passwd'];

	if(login($mail, $passwd)){
		
		$_SESSION['mail'] = $mail;
		if(is_admin($_SESSION['mail'])){
				$_SESSION['admin_user'] = $mail;
		}
	else{
		header('location : login.php');
	}


	}
}