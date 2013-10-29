<?php
include('ghl_fns.php');
//Le panier virtuel ayant besoin des sessions, on en lance une.
session_start();
do_html_header($languages_var, $languages_var['Bienvenue']);

display_category();

do_html_footer($languages_var);
?>