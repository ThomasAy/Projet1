<?php
 require_once('ghl_fns.php');
 session_start();
 if(isset($_SESSION['mail'])){
 	header('Location: index.php');
 } else{
 do_html_header($languages_var, "Liste des produits");

 display_list_of_products();

 do_html_footer();
}

?>
