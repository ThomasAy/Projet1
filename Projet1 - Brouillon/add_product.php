<?php
require_once('ghl_fns.php');
 session_start();
 if(isset($_SESSION['mail'])){
 	header('Location: index.php');
 } else{

 	$conn = db_connect();

	do_html_header($languages_var, "Ajouter un nouveau produit");

	$VP = 0;
	if(isset($_POST["VP"]))
	{
		$VP = $_POST["VP"];
	}

	$query = "INSERT INTO produit (ID_PROD, NOM, PRIX_HT, DESC_FR, DESC_EN, CONSEIL_FR, CONSEIL_EN, STOCK, ALERT, PRIVATE, ID_CATE, ID_SUBCAT) VALUES (
		\"\", 
		'" . $_POST["nom"] . "',
		'" . $_POST["PRIX_HT"]. "',
		'" . $_POST["description"] . "',
		'" . $_POST["description"]. "',
		'".  $_POST["conseils"] ."',
		'".  $_POST["conseils"] ."',
		'".  $_POST["stock"] ."',
		'".  $_POST["alert"] ."',
		'".  $VP ."',
		'".  $_POST["Catégorie"] ."',
		'".  $_POST["SC_cat"] ."'
		)";
	
	$conn->query($query);

	$registerMSG = "";
	$errorMSG = "";
	$errorMSG = $errorMSG . mysql_error();

	if ($_FILES['photo']['error']) {     
		switch ($_FILES['photo']['error']){     
		case 1: // UPLOAD_ERR_INI_SIZE     
			$errorMSG = $errorMSG . "Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
			break;     
		case 2: // UPLOAD_ERR_FORM_SIZE     
			$errorMSG = $errorMSG .  "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
			break;     
		case 3: // UPLOAD_ERR_PARTIAL     
			$errorMSG = $errorMSG .  "L'envoi du fichier a été interrompu pendant le transfert !";     
			break;     
		case 4: // UPLOAD_ERR_NO_FILE     
			$errorMSG = $errorMSG .  "Le fichier que vous avez envoyé a une taille nulle !"; 
			break; 
		default:
			$errorMSG = $errorMSG . "Erreur inconue";    
		}         
	}

	  
	
		$query2 = "SELECT ID_PROD FROM produit Where NOM = '" . $_POST['nom'] . "'";
		$sql1 = $conn->query($query2);

		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		//1. strrchr renvoie l'extension avec le point (« . »).
		//2. substr(chaine,1) ignore le premier caractère de chaine.
		//3. strtolower met l'extension en minuscules.
		$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
		$errorMSG = $errorMSG . $_FILES['photo']['name'];

		if (in_array($extension_upload,$extensions_valides) ) {
			$num = "";
			while($row = $sql1->fetch_array(MYSQLI_BOTH)) 
			{
            	$num = $row['ID_PROD'];
        	}
        	$url = "";
			$url = "medias/pictures/". $_POST['nom'] . $num . "." . $extension_upload ;
			$resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $url);

			if ($resultat) $registerMSG =  "Transfert réussi du fichier : " . $url;

		$query2 ="";
		$query2 = "INSERT INTO picture (ID_PICT, ID_PROD, URL, carousel) VALUES(
			'',
			'".$num."',
			'".$url."',
			'0')";

		$conn->query($query2);
		 }

		else { $errorMSG = $errorMSG . "L'extension n'est pas valide" . $extension_upload;}
	
		echo '<center><div style="margin-top:70px;"> Votre produit "'.$_POST['nom'].'" a bien été ajouté. <br> <br> <img style="width:30%;" src="'.$url.'" alt="'.$_POST['nom'].'"></div></center>';

	}



 do_html_footer();
?>
