<?php
 require_once('ghl_fns.php');
 session_start();

 do_html_header($languages_var, "Liste des produits");

 display_list_of_products();

 do_html_footer();


?>
