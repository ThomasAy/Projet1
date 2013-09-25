<?php

require_once("book_sc_fns.php");
session_start();

do_html_header("Add a book");
if(check_admin_user()){
	display_book_form();
	do_html_url("admin.php", "Back to administration menu");
} else {
	echo "<p>Only admin is authorized to wiew this page.</p>";
}
do_html_footer();

?>