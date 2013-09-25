<?php
include('book_sc_fns.php');
session_start();

do_html_header("Add a category");
if(check_admin_user()){
	display_category_form();
	do_html_url("admin.php", 'Back to administration menu');
} else {
	echo "<p> You are not authorized to view this page</p>";
}

do_html_footer();
?>