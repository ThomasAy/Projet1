<?php
include('ghl_fns.php');
//Le panier virtuel ayant besoin des sessions, on en lance une.
session_start();
do_html_header("Bienvenue sur GrindHouse Leather", $languages_var);
echo "<h1>PAGE D'ACCUEIL</h1>";

do_html_footer();
?>