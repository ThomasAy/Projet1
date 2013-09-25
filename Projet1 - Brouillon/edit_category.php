<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Updating category");

if(check_admin_user()){
	if(filled_out($_POST)){
		$catid = $_POST['catid'];
		$catname = $_POST['catname'];
		if(update_category($catid, $catname)){
			echo "<p> Category <em> ".$catname." </em> has been updated.</p>";
		} else {
			echo "<p>Category <em> ".$catname." </em> couldn't be updated. Please try again.</p>";
		}
	} else {
		echo "<p> You have not filled out the form. Please try again </p>";
	}
	
	 do_html_url("admin.php", "Back to administration menu");
	
} else {
	echo "<p>You are not authorized to view this page</p>";
}
?>