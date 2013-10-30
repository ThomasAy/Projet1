<?php
include('ghl_fns.php');
session_start();

if(isset($_GET['id_product'])){
	$id_product = $_GET['id_product'];
} else {
	Location('index.php');
}

$product = get_product_details($id_product);

do_html_header($languages_var, $product['NOM']);
if(is_array($product)){
	do_html_produit($languages_var, $product);
} else {
	echo 'pas de produit';
}

do_html_footer();

?>
