<?php
include('ghl_fns.php');
session_start();

if(isset($_GET['id_product'])){
	$id_product = $_GET['id_product'];
} else {
	echo "coco";
}

$product = get_product_details($id_product);

$product_cat = return_id_cat_by_id_prod($product['ID_PROD']);
$product_subcat = return_id_subcat_by_id_prod($product['ID_PROD']);


$num_products = count_products_by_subcat($product_cat, $product_subcat);
if($num_products >= 3){
	$product_before = return_product_by_cat_and_subcat($product_cat, $product_subcat, $product['ID_PROD']);
	$product_after = return_product_by_cat_and_subcat($product_cat, $product_subcat, $product['ID_PROD'], $product_before['ID_PROD']);	
}
if(is_array($product)){

	do_html_header($languages_var, $product['NOM']);
	if(isset($product_before) && isset($product_after)){

		do_html_produit($languages_var, $product, $product_before, $product_after);

	} else {
		do_html_produit($languages_var, $product);
	}
} else {
	echo "caca";
}

do_html_footer();

?>
