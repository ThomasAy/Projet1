<?php 
require_once('ghl_fns.php');
session_start();


 do_html_header($languages_var, "Liste des produits");


$conn = db_connect();
$query = "SELECT ID_PROD, NOM FROM produit";

$result = $conn->query($query);


$words = explode(" ",$_POST["search"]);

$j=0;
while($row = $result->fetch_array(MYSQLI_BOTH)) 
{
	foreach ($words as $word) {
		similar_text($word, $row['NOM'], $sim);
		if(round($sim) > 60){
			$ids[$j] = $row['ID_PROD']; // "0"
			$j++;
		}
	}
}

$ids = array_unique($ids);

$query = "	SELECT produit.ID_PROD, NOM, PRIX_HT, DESC_FR, STOCK, URL FROM produit, picture 
			WHERE (";
			foreach ($ids as $value) {
				$query = $query . "produit.ID_PROD = " . $value . " OR ";
			}
			$query = $query . " produit.ID_PROD = -1) AND produit.ID_PROD = picture.ID_PROD";

$result2 = $conn->query($query);


// foreach ($id as $value) {
// 	echo $value ."<br>";
// }

	if ($result2->num_rows > 0){

		$ListeProd = "
		<center>
      		<div id=\"menu\">
      		<hr>
        		<p>Il y a ". $result2->num_rows ." produit(s) correspondant à votre recherche : </p>
      		</div>
    	</center>
      
        <center>
        <div>
        <table>
            <tr>
                <th> <center> <u>Nom et Prix</u> </center> </th>
                <th> <center>Image</center> </th>
                <th> <center> <b> <u>Description</u> </b></center> </th> 
            </tr>";
        while($row = $result2->fetch_array(MYSQLI_BOTH)) {
            $ListeProd = $ListeProd .
            "<tr> 
                <td>   <b>". $row['NOM'] . "</b>  : " . $row['PRIX_HT'] . "€ </td>
                <td>    <img style=\"width:150px;\" SRC=\"". $row['URL'] ."\" ALT=\"" . $row['NOM'] . "\" width=\"200px\"> </td>
                <td> <center> ".$row['DESC_FR']." </center> </td>
            </tr>";
        }

        $ListeProd = $ListeProd . 
        "</table>
        </div>
        </center>";

    }
    else{
    	$ListeProd = "
        <center>
      		<div id=\"menu\">
      		<hr>
        	<p>Il n'y a pas de produit correspondant à la recherche \"" . $_POST['search']. "\"</p>
        </div>
        </center>";


    }

    echo '<div class="LogoTop">
    <div id="logoCat">
    <a href="index.php"><img src="medias/pictures/logo.png" alt="GHL Logo"> </a>
    </div>    
  </div>';
    echo $ListeProd;

 do_html_footer();



?>