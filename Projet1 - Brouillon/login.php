<?php
 require_once('ghl_fns.php');
 session_start();
 if(isset($_SESSION['mail'])){
 	header('Location: index.php');
 } else{
 do_html_header($languages_var, $languages_var['connexion']);

 display_login_form($languages_var);

 do_html_footer();
}
?>

