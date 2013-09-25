<?php
include('book_sc_fns.php');
//Le panier virtuel a besoin des sessions, nous en ouvrons donc une
session_start();

$catid = $_GET['catid'];
$name = get_category_name($catid);

do_html_header($name);

//Récupère les informations sur les livres dans la base de données
$book_array = get_books($catid);
display_books($book_array);
//Si on est connecté en tant qu'admin, on rajoute des liens pour modifier les catégories

include('affiche_variables.php');

if(isset($_SESSION['admin_user'])){
	display_button("index.php", "continue", "Continue Shopping");
	display_button("admin.php", "admin-menu", "Admin Menu");
	display_button("edit_category_form.php?catid=".$catid, "edit-category", "Edit Category");
} else{
	display_button("index.php", "continue", "Continue Shopping");
}

do_html_footer();
?>