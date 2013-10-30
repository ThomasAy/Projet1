<?php
require_once('ghl_fns.php');
session_start();
do_html_header($languages_var, $languages_var['mon_compte']);
display_account_user($languages_var);
do_html_footer($languages_var);

?>