<?php
include('book_sc_fns.php');
//Le panier virtuel a besoin des sessions, donc nous en ouvrons une.
session_start();

$isbn = $_GET['isbn'];

//Récupère le livre dans la base de données

$book = get_book_details($isbn);
do_html_header($book['title']);
display_book_details($book);

//Définit l'URL associée au bouton Continuer.
$target = "index.php";
if($book['catid']){
	$target="show_cat.php?catid=".$book['catid'];
}

//En mode administration, affiche les liens de modification du livre
if(check_admin_user()){
	display_button("edit_book_form.php?isbn=".$isbn, "edit-item", "Edit Item");
	display_button("admin.php", "admin-menu", "Admin Menu");
	display_button($target, "continue", "Continue");
} else{
	display_button("show_cart.php?new=".$isbn, "add-to-cart", "Add ".$book['title']." To my Shopping Cart");
	display_button($target,"continue-shopping", "Continue Shopping");
}

do_html_footer();
?>