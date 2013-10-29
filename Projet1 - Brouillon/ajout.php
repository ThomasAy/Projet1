<?php
 require_once('ghl_fns.php');
 session_start();
 if(isset($_SESSION['mail'])){
 	header('Location: index.php');
 } else{
 do_html_header($languages_var, "Ajouter un nouveau produit");

 display_form_Product();

 do_html_footer();
}

?>
