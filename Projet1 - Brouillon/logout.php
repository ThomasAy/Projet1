<?php
require_once('ghl_fns.php');
session_start();

$old_user = $_SESSION['mail']; // On stocke la variable de session pour voir si l'utilisateur était connecté
unset($_SESSION['mail']);
session_destroy();
if(!empty($old_user)){
	header('Location:index.php');
} else {
	header('Location:index.php');
}

	