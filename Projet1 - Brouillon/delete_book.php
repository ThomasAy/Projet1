<?php
require_once('book_sc_fns.php');
session_start();
do_html_header("Deleting book");

if(check_admin_user()){
	if(isset($_POST['isbn'])){
		$isbn = $_POST['isbn'];
		if(delete_book($isbn)){
			echo "<p> Book ".$isbn." has been deleted.</p>";
		} else {
			echo "<p> Book ".$isbn." could not be deleted </p>";
		}
	} else {
		echo "An ISBN is needed in order to delete a book, please try again";
	}
	do_html_url("admin.php", "Back to administration menu");
} else {
	echo "Only admin user is authorized to view this page";
}
do_html_footer();
?>
