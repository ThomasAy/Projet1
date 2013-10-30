<?php
include('ghl_fns.php');

//Le panier virtuel ayant besoin des sessions, on en lance une.
session_start();

@$new = $_GET['new'];

if($new){
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
		$_SESSION['items'] = 0;
		$_SESSION['total_price'] = '0.00';
	}

	if(isset($_SESSION['cart'][$new])){
		$_SESSION['cart'][$new]++;
	} else {
		$_SESSION['cart'][$new] = 1;
	}

	$_SESSION['total_price'] = calculate_price($_SESSION['cart']);
	$_SESSION['items'] = calculate_items($_SESSION['cart']);
}

do_html_header($languages_var, $languages_var['panier']);

if(isset($_SESSION['cart']) && (@array_count_values($_SESSION['cart']))){
	do_html_cart($languages_var, $_SESSION['cart']);
} else {
	display_warning_message($languages_var['panier_vide']);
}

do_html_footer();

?>