<?php
include('ghl_fns.php');
//Le panier virtuel ayant besoin des sessions, on en lance une.
session_start();
do_html_header($languages_var,"Nom produit");

do_html_produit_fiche($languages_var);

do_html_footer();
?>