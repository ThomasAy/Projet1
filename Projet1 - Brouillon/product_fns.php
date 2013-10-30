<?php
require_once('db_fns.php');

function calculate_shipping_cost() {
  // as we are shipping products all over the world
  // via teleportation, shipping is fixed
  return 20.00;
}


function get_categories(){
	//Cherche dans la base de données une liste de catégories
	
	$conn = db_connect();
	$query = "select id_cate, nom from categorie";
	$result = @$conn->query($query);
	if(!$result){
		return false;
	}
	
	$num_cats = @$result->num_rows;
	if($num_cats == 0){
		return false;
	}
	
	$result = db_result_to_array($result);
	return $result;
}

// function get_category_name($catid){
// 	//Récupère le nom de la catégorie correspondant à l'id catégorie passé en paramètre
	
// 	$conn = db_connect();
// 	$query = "select nom from categories where id_cate = '".$catid."'";
// 	$result = @$conn->query($query);
// 	if(!$result){
// 		return false;
// 	}
// 	$num_cats = $result->num_rows;
// 	if($num_cats == 0){
// 		return false;
// 	}
// 	$row = $result->fetch_object();
// 	return $row->catname;
// }

function get_category_name($id_cate){
	$conn = db_connect();
	$query = "select nom from categorie where id_cate = ?";

	$result = $conn->prepare($query);
	$result->bind_param("i", $id_cate);
	$result->execute();
	$result->bind_result($nom_cate);
	$result->fetch();

	$result->close();

	return $nom_cate;

}

function get_product($catid){
	//Récupère les livres dans la catégorie correspondante dont l'ID est passé en paramètres
	if((!$catid) || $catid==''){
		return false;
	}
	
	$conn = db_connect();
	$query = "select * from books where id_cate = ".$catid;
	$result = @$conn->query($query);
	if(!$result){
		return false;
	}
	$num_products = $result->num_rows;
	if($num_products == 0){
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}

function get_products($catid){
	//Récupère les produits dans la catégorie correspondante dont l'ID est passé en paramètres
	if((!$catid) || $catid==''){
		return false;
	}
	
	$conn = db_connect();
	$query = "select produit.*, picture.url from produit, picture where id_cate = ".$catid." and produit.id_prod = picture.id_prod";
	$result = @$conn->query($query);
	if(!$result){
		return false;
	}
	$num_products = $result->num_rows;
	if($num_products == 0){
		return false;
	}
	
	$result = db_result_to_array($result);
	return $result;
}

function get_products_images($array_product){

}

function get_product_details($id_prod){
	//requête qui récupère les détails du livre dont l'isbn passé en paramètres correspond
	if((!$isbn) || $isbn == ''){
		return false;
	}
	
	
	$conn=db_connect();
	$query="select * from produits where id_prod='".$id_prod."'";
	$result=@$conn->query($query);
	if(!$result){
		return false;
	}
	
	$result = @$result->fetch_assoc();
	return $result;
}

function count_products_by_cat($id_cate){

	if((!$id_cate) || $id_cate ==''){
		return false;
	}

	$conn = db_connect();

	$query = "select * from `produit`,  where produit.id_cate = $id_cate";
	$result = $conn->prepare($query);
	if(!$result){
		return false;
	}

	$result->execute();
	$result->store_result();

	$num_products = $result->num_rows;

	return $num_products;


}

function calculate_price($cart){
	//Calcule la somme de tous les articles du panier
	$price = 0;
	if(is_array($cart)){
		$conn = db_connect();
		foreach($cart as $id_prod => $qty){
			$query = "select prix_ht from products where id_prod = '".$id_prod."'";
			$result = $conn->query($query);
			if($result){
				$produit = $result->fetch_array();
				$prix_produit = $produit['prix_ht'];
				$price += $item_price*$qty;
			}
		}
	}
	
	return $price;
}

function calculate_items($cart){
	//Calule le nombre total d'articles dans le panier
	$produits = 0;
	if(is_array($cart)){
		foreach ($cart as $isbn => $qty){
			$items += $qty;
		}
	}
	return $items;
}
	
	

?>