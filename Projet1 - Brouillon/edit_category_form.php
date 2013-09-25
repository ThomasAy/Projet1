<?php
require_once('book_sc_fns.php');
session_start();

do_html_header("Updating book details");
if(check_admin_user()){
	if($catname = get_category_name($_GET['catid'])){
		$catid = $_GET['catid'];
		$cat = compact('catid', 'catname');
		display_category_form($cat);
	} else {
		echo "<p> Could not retrieve book details </p>";
	}
	do_html_url('admin.php', 'Back to administration menu');
} else {
	echo "<p> You are not authorized to view this page </p>";
}

do_html_footer();