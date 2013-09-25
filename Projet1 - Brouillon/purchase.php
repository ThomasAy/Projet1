<?php
include('book_sc_fns.php');

//Le panier virtuel a besoin des sessions, donc nous en ouvrons une.
session_start();
do_html_header("Checkout");
//création des variables abregées

$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];

//Si le formulaire est rempli
if(($_SESSION['cart']) && ($name) && ($address) && ($city) && ($zip) && ($country)){
	//On peut l'insérer dans la base de données
	if(insert_order($_POST) != false){
		//Affiche le panier sans permettre de modification et sans images
		display_cart($_SESSION['cart'], false, 0);
		
		display_shipping(calculate_shipping_cost());
		
		//Obtient les détails sur la carte de crédit
		display_card_form($name);
		display_button("show_cart.php", "continue-shopping", "Continue Shopping");
	}else{
		echo "<p>Could not store data, please try again</p>";
	}
}else{
	echo "<p> You did not fill in all the fields, please try again.</p><hr/>";
	display_button("checkout.php", "back", "Back");
}

do_html_footer();
?>