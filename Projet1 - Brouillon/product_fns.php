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
	$query = "select id_cate, nom_cate from categories";
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

function get_category_name($catid){
	//Récupère le nom de la catégorie correspondant à l'id catégorie passé en paramètre
	
	$conn = db_connect();
	$query = "select catname from categories where catid = '".$catid."'";
	$result = @$conn->query($query);
	if(!$result){
		return false;
	}
	$num_cats = $result->num_rows;
	if($num_cats == 0){
		return false;
	}
	$row = $result->fetch_object();
	return $row->catname;
}

function get_books($catid){
	//Récupère les livres dans la catégorie correspondante dont l'ID est passé en paramètres
	if((!$catid) || $catid==''){
		return false;
	}
	
	$conn = db_connect();
	$query = "select * from books where catid = ".$catid;
	$result = @$conn->query($query);
	if(!$result){
		return false;
	}
	$num_books = $result->num_rows;
	if($num_books == 0){
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}

function get_book_details($isbn){
	//requête qui récupère les détails du livre dont l'isbn passé en paramètres correspond
	if((!$isbn) || $isbn==''){
		return false;
	}
	
	
	$conn=db_connect();
	$query="select * from books where isbn='".$isbn."'";
	$result=@$conn->query($query);
	if(!$result){
		return false;
	}
	
	$result = @$result->fetch_assoc();
	return $result;
}

function calculate_price($cart){
	//Calcule la somme de tous les articles du panier
	$price = 0;
	if(is_array($cart)){
		$conn = db_connect();
		foreach($cart as $isbn => $qty){
			$query = "select price from books where isbn = '".$isbn."'";
			$result = $conn->query($query);
			if($result){
				$item = $result->fetch_array();
				$item_price = $item['price'];
				$price += $item_price*$qty;
			}
		}
	}
	
	return $price;
}

function calculate_items($cart){
	//Calule le nombre total d'articles dans le panier
	$items = 0;
	if(is_array($cart)){
		foreach ($cart as $isbn => $qty){
			$items += $qty;
		}
	}
	return $items;
}
	
	

?>