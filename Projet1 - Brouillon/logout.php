<?php
require_once('ghl_fns.php');
session_start();

$old_user = $_SESSION['admin_user']; // On stocke la variable de session pour voir si l'utilisateur était connecté
unset($_SESSION['admin_user']);
session_destroy();

do_html_header("Logging out");

if(!empty($old_user)){
	echo "<p>You are now logged out. </p>";
	do_html_url("login.php", "Login");
} else {
	echo "<p> You were not logged in, and so have not logged out. </p>";
	do_html_url("login.php", "Login");
}

do_html_footer();
	