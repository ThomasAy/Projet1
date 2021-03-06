<?php
include('ghl_fns.php');
//Le panier virtuel ayant besoin des sessions, on en lance une.
session_start();
if (isset($_GET['id']) && count($_GET) == 1){
	$id_cate = $_GET['id'];

	$num_produits = count_products_by_cat($id_cate);
	$array_produits = get_products($id_cate);

	


		switch($id_cate){
			case 1 : do_html_header($languages_var, $languages_var['collection_femme']);
					 if(is_array($array_produits)){
					 	do_woman_category($languages_var, $num_produits, $array_produits);
					 } else {
					 	no_produit_woman($languages_var);
					 }
					 break;
			case 2 : do_html_header($languages_var, $languages_var['collection_homme']);
					 if(is_array($array_produits)){
					 	do_man_category($languages_var, $num_produits, $array_produits);
					 } else {
					 	no_produit_man($languages_var);
					 }
					 break;
			default : header('Location: index.php');
		}
			do_html_footer();
} else if(isset($_GET['id']) && isset($_GET['id_sc']) && count($_GET) == 2 ) {
	$id_cate = $_GET['id'];
	$id_subcat = $_GET['id_sc'];

	$num_produits = count_products_by_subcat($id_cate, $id_subcat);
	$array_produits = get_products_by_subcat($id_cate, $id_subcat);

	do_html_header($languages_var);

	switch ($id_cate) {
		case 1:
		if(is_array($array_produits)){
			do_woman_sub_category($languages_var, $num_produits, $array_produits);
		} else {
			no_produit_woman($languages_var);
		}
		break;

				case 2:
		if(is_array($array_produits)){
			do_man_sub_category($languages_var, $num_produits, $array_produits);
		} else {
			no_produit_man($languages_var);
		}
		break;


	}

	do_html_footer();
} else {
	header('Location: index.php');
}

?>