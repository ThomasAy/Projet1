<?php
function process_card($card_details){
	//Connexion à la passerelle de paiement ou utilisation de gpg pour chiffrer et envoyer par mail, ou stockage dans la BDD
	return true;
}

function cmd_num(){
	return substr(md5(microtime()), 25);
}

function insert_order($order_details){
	//Extraction de order_details dans les variables
	extract($order_details);
	
	//Initialise l'adresse de livraison avec l'adresse du client?
	if((!$ship_name) && (!$ship_address) && (!$ship_city) && (!$ship_state)  && (!$ship_zip) && (!$ship_country)){
		$ship_name = $name;
		$ship_address = $address;
		$ship_city = $city;
		$ship_state = $state;
		$ship_zip = $zip;
		$ship_country = $country;
	}
	
	$conn = db_connect();
	
	//On veut insérer la commande dans une transaction. On en lance une en désactivant autocommit
	
	$conn->autocommit(FALSE);
	
	//Insertion de l'addresse du client
	$query = "select customerid from customers where name = '".$name."' and address = '".$address."' and city = '".$city."' and state = '".$state."' and zip ='".$zip."' and country = '".$country."'";
	
	$result = $conn->query($query);
	
	if($result->num_rows>0){
		$customer = $result->fetch_object();
		$customerid = $customer->customerid;
	} else {
		$query = "insert into customers values ('', '".$name."', '".$address."', '".$city."', '".$state."', '".$zip."', '".$country."')";
		$result = $conn->query($query);
		
		if(!$result){
			return false;
		}
	}

	$customerid = $conn->insert_id;
	
	$date=date("Y-m-d");
	
	$query = "insert into orders values('', '".$customerid."', '".$_SESSION['total_price']."', '".$date."', 'PARTIAL', '".$ship_name."', '".$ship_address."', '".$ship_city."', '".$ship_state."', '".$ship_zip."', '".$ship_country."')";
	
	$result = $conn->query($query);
	if(!$result){
		return false;
	}
	
	$query = "select orderid from orders where
				customerid = '".$customerid."' and
				amount > (".$_SESSION['total_price']."-.001) and
				amount < (".$_SESSION['total_price']."+.001) and
				date = '".$date."' and
				order_status = 'PARTIAL' and
				ship_name = '".$ship_name."' and
				ship_address = '".$ship_address."' and
				ship_city = '".$ship_city."' and
				ship_state = '".$ship_state."' and
				ship_zip = '".$ship_zip."' and
				ship_country = '".$ship_country."'";
	
	$result = $conn->query($query);
	
	if($result->num_rows>0){
		$order = $result->fetch_object();
		$orderid = $order->orderid;
	} else {
		return false;
	}
	
	//Insertion de chaque livre
	foreach($_SESSION['cart'] as $isbn=>$qty){
		$detail = get_book_details($isbn);
		$query = "delete from order_items where orderid = '".$orderid."' and isbn = '".$isbn."'";
		$result= $conn->query($query);
		if(!$result){
			return false;
		}
		$query = "insert into order_items values (?,?,?,?)";
		$instr = $conn->prepare($query);
		$instr->bind_param("isdi", $orderid, $isbn, $detail['price'], $qty);
		$instr->execute();
		if($instr->affected_rows == 0 || (!$instr)){
			return false;
		}
	}
	
	//Fin de la transaction
	$conn->commit();
	$conn->autocommit(TRUE);
	
	return $orderid;
}
?>