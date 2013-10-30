<?php 
require('ghl_fns.php');
session_start();
do_html_header($languages_var);
display_signup_form($languages_var);
display_account_user($languages_vars);
do_html_footer();
?>