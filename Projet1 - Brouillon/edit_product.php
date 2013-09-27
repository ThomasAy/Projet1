<?php
require_once("ghl_fns.php");
session_start();

do_html_header("Mettre à jour un produit");
if(check_admin_user()){
	if(filled_out($_POST)){
		//$oldisbn = $_POST['isbn'];
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$catid = $_POST['catid'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		
		if(update_book($oldisbn, $isbn, $title, $author, $catid, $price, $descritpion)){
			echo "<p> Book was updated.</p>";
		} else {
			echo "<p> Book could not be updated.</p>";
		}
	} else {
		echo "<p> You have not filled out the form. Please try again</p>";
	}
	
	 do_html_url("admin.php", "Back to administration menu");
	 
} else {
	echo "<p> You are not authorized to view this page </p>";
}

do_html_footer();
?>
