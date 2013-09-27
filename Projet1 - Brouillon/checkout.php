<?php
include('ghl_fns.php');

//Le panier virtuel a besoin des sessions, on en ouvre donc une
session_start();

do_html_header("Checkout");

if(($_SESSION['cart']) && (@array_count_values($_SESSION['cart']))){
	display_cart($_SESSION['cart'], false, 0);
	display_checkout_form();
} else{
	echo "<p> There are no item in your cart </p>";
}

display_button("show_cart.php", "continue-shopping", "Continue Shopping");

do_html_footer();
?>