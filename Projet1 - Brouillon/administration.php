<?php
include('ghl_fns.php');
//Le panier virtuel ayant besoin des sessions, on en lance une.
session_start();
do_html_header($languages_var,"Administration");

do_html_admin();

do_html_footer();

?>