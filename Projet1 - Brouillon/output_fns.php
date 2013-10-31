<?php

function do_html_header($languages_vars, $title=''){
	//affiche l'entête html	
	
	//on déclare les variables de session qu'on veut accéder dans la fonction

  // Changing page title
	if ($title != "")
    $title .= " - ";

  $title .= "Grind House Leather";



	if(!isset($_SESSION['items'])){
		$_SESSION['items'] = 0;
   
	}

   if($_SESSION['items'] > 10)
    {
      $_SESSION['imgPanier'] = 10;
    }
    else
    {
      $_SESSION['imgPanier'] = $_SESSION['items'];
    }
	
	if(!isset($_SESSION['total_price'])){
		$_SESSION['total_price'] = 0;
	}
?>
	<!doctype html>
	<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
      <link rel="icon" type="image/ico" href="medias/favicon.ico">

  <!-- begin CSS -->
    <link rel="stylesheet" type="text/css" href="TopBar.css">
    <link rel="icon" type="image/x-icon" href="medias/favicon.ico">
    <link href="polyglot-language-switcher.css" type="text/css" rel="stylesheet">
  <!-- end CSS -->
  
  <!-- begin JS -->
    <script src="jquery-1.7.min.js" type="text/javascript"></script>
    <script src="jquery.polyglot.language.switcher.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
                effect: 'fade',
                testMode: false,
               
            });
        });
    </script>

    <script src="scripts.js"  type="text/javascript"></script>
    <script src="tabulous.js" type="text/javascript"></script>
  <!-- end JS -->


      <title><?php echo $title; ?></title>
    </head>
    <body>
    
    <div class="Top_Bar">
        <div id="Reseaux_sociaux"> <p> &nbsp; <img src="medias/icons/twitter.png" alt="twitter"/> &nbsp; <img src="medias/icons/11.png" alt="twitter"/> &nbsp; </p></div>
<!-- begin container -->
        <div id="Pays">
<!-- begin language switcher -->
            <div id="polyglotLanguageSwitcher">
              <form method='get' action="#">

                <select id="polyglot-language-options">
                  <option id="en" value="en">En</option>
                  <option id="fr" value="fr" selected>Fr</option>
                </select>
              </form>
            </div>
<!-- end language switcher -->
        </div>
<!-- end container -->    
        
        <div id="Rechercher">
          <form action="search.php" method="post">
        <fieldset>
          <input type="text" value="Rechercher un produit..." name="search"  onFocus="javascript:this.value=''" ;/>
          <input type="submit" name="go" id="go" value="Go" />
        </fieldset>
      </form>

        </div>

        <div id="Texte_de_connexion">
          <p>
          <?php 
          if(isset($_SESSION['mail'])){
            echo $languages_vars['bonjour'].' ';
            echo $_SESSION['civ'];
            do_html_url("account.php", $_SESSION['user_lastname']);
            echo ' ';
            do_html_url("logout.php", $languages_vars['deconnexion']);
          } else {
            do_html_url("login.php", $languages_vars['connexion']); 
          }
          ?>
          </p>

        </div>
        <div id="Panier">
            <a href="cart.php">
                <span><img <?php echo 'src="medias/icons/Panier/Panier-' . $_SESSION["imgPanier"] . '.png"';?> alt="Votre panier" ></span>
            </a>
        </div>

    </div>
    <?php
	}

 function do_html_produit_fiche($languages_vars){
 ?>

 <div class="LogoTop">
    <div id="logoCat">
    <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
    <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
  </div>
 
   <div class="ariane">
     <h2>Accueil  &rsaquo;  Homme  &rsaquo;  Accessoires  &rsaquo;  <span style="text-decoration:underline;">Portefeuilles</span></h2>
   </div>
 
   <div class="ficheproduit">
     <div id="previews">
        <div class="previews1"><img src="medias/produits/Ceinture-1.jpg" alt="Gants"></div>
        <div class="previews2"><img  src="medias/produits/Ceinture-1.jpg" alt="Gants">
         <div class="ajout"><a href="#">Ajouter au panier</a></div>
         <div class ="prodfeat1"><img src="medias/produits/Ceinture-1.jpg" alt="Gants"></div>
         <div class="prodfeat2"><img src="medias/produits/Ceinture-1.jpg" alt="Gants"></div>
         </div> 
        <div class="previews3"><img src="medias/produits/Ceinture-1.jpg" alt="Gants"></div>
      </div>
 
 
    </div>
    
 <div id="wrapper">
 
                                 <div id="tabs">
                 <ul>
                         <li><a href="#tabs-1" title="">Description</a></li>
                         <li><a href="#tabs-2" title="">Conseils mode</a></li>
                         
                 </ul>
 
                 <div id="tabs_container">
                         
 
 
 
                 <div id="tabs-1">
                             <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus.</p>
                 </div>
 
                 <div id="tabs-2">
                             <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor.</p>
         
                 </div>
 
                 
 
                 </div><!--End tabs container-->
                 
         </div><!--End tabs-->
 
   
 </div>
 <?php
 }

  function do_html_homepage_body(){
  ?>

  <div class="Contenu">
    <div id="femme">
      <a href="category.php?id=1"><img src="medias/pictures/Parc-5-Homepage.jpg" alt="Collection Femme"></a>
    </div>
    <div id="femme" style="opacity:0; z-index:10; position:absolute;">
      <a href="category.php?id=1"><img src="medias/pictures/Parc-5-Homepage.jpg" alt="Collection Femme"></a>
    </div>
    <div id="homme">

     <a href="category.php?id=2"><img src="medias/pictures/Parc-6-Homepage.jpg" alt="Collection Homme"></a>
    </div>
    <div id="homme" style="opacity:0;  z-index:10; position:absolute; margin-left=600px;">

     <a href="category.php?id=2"><img src="medias/pictures/Parc-6-Homepage.jpg" alt="Collection Homme"></a>
    </div>
      <div id="logo">
        <img id="GLH" src="medias/BandeHomepage.png" alt="GHL Logo">
    </div>
  </div>
    <div class="ASavoir">
      <h1>À voir aussi...</h1>
        <div class="Montre">
          <img src="medias/pictures/Montre-2-Homepage.jpg" alt="Montre">
          <h1 class="Produit1">Produit #1</h1>
        </div>

        <div class="Gants">
          <img src="medias/pictures/Gants-1-Homepage.jpg" alt="Gants">
           <h1 class="Produit2">Produit #2</h1>
        </div>

        <div class="Portefeuille">
          <img src="medias/pictures/Portefeuille-3-Homepage.jpg" alt="Portefeuille">  
          <h1 class="Produit3">Produit #3</h1>
        </div>
      </div>
  <?php
}

function do_html_footer(){
	?>
  <div class="PreFooter">
    <TABLE> 
      <TR> 
         <TH><img src="medias/icons/livraison24.png" alt="valeur"/></TH> 
         <TH><img src="medias/icons/paiementsecurise.png" alt="valeur"/></TH> 
         <TH><img src="medias/icons/serviceclient.png" alt="valeur"/></TH> 
         <TH><img src="medias/icons/satisfaitrembourse.png" alt="valeur"/></TH>
         <TH><img src="medias/icons/madeinfrance.png" alt="valeur"/></TH> 
      </TR>  
    </TABLE> 
  </div>

  <div class="Footer">
    
    <div id="Ceinture"><img src="medias/pictures/ceinture.jpg" alt="Ceinture Vintage" /></div>
    <div id="text">
      <div id="APropos">
        <h1>À PROPOS</h1>
        <hr>
<p>Après 20 ans d'expérience dans la maroquinerie de luxe, GrindHouse Leather lance 
sa propre boutique en ligne. Répondant aux standards d'aujourd'hui, 
nous mettons un point d'honneur à vous proposer des produits faits 
main en France, de qualité supérieure et pensés pour vous.</p>
    </div>
    <div id="Contact">
      <h1>CONTACT</h1>
      <hr>
      <table>
        <tr>
          <th><img src="medias/icons/ico-mail.png" alt="mail icon" /></th>
          <th><img src="medias/icons/ico-facebook.png" alt="FB icon" /></th>
          <th><img src="medias/icons/ico-mail.png" alt="twitter icon" /></th>
        </tr>
      </table>
      <p><a href="">Conditions Générales</a> | &copy; GrindHouse Leather</p>
    </div>

  </div>
  </div>
</body>
</html>


  <?php

}

function do_html_heading($heading){
	?>
    <h2><?php echo $heading; ?></h2>
    <?php
}

function do_html_url($url, $name){
	//affiche un lien et <br/>
	?>
    <a href="<?php echo $url;?>"><?php echo $name;?></a>
    <?php
}

function display_categories($cat_array){
	if(!is_array($cat_array)){
		echo "<p>No categories currently available</p>";
		return;
	}
	echo "<ul>";
	foreach ($cat_array as $row){
		$url = "show_cat.php?catid=".($row['catid']);
		$title = $row['catname'];
		echo "<li>";
		do_html_url($url, $title);
		echo "</li>";
	}
	echo "</ul>";
	echo "<hr/>";
}


function display_button($target, $image, $alt){
	echo "<div align=\"center\">
		  <a href=\"".$target."\">
		 <img src=\"images/".$image.".gif\" alt=\"".$alt."\" border=\"0\" height=\"50\" width=\"135\"/>
		 </a>
		 </div>";
}

function display_book_details($book){
	//Affiche tous les détails du livre
	if(is_array($book)){
		echo "<table><tr>";
		if(@file_exists("images/".$book['isbn'].".jpg")){
			$size = getimagesize("images/".$book['isbn'].".jpg");
			if(($size[0]>0) && ($size[1]>0)){
				echo "<td><img src=\"images/".$book['isbn'].".jpg\"
              style=\"border: 1px solid black\"/></td>";
			}
		}
		echo "<td><ul>";
		echo "<li><strong>Author:</strong>";
		echo $book['author'];
		echo "</li><li><strong>ISBN:</strong>";
		echo $book['isbn'];
		echo "</li><li><strong>Our Price:</strong>";
		echo number_format($book['price'], 2);
		echo "</li><li><strong>Description:</strong>";
		echo $book['description'];
		echo "</li></ul></td></tr></table>";
	} else {
		echo "<p> The details of this book cannot be displayed at this time</p>";
	}
	echo "<hr/>";
}

function display_cart($cart, $change = true, $images=1){
	//Affiche les articles du panier virtuel
	//Permet éventuellement les modifications (true ou false)
	//Inclut éventuellement les images (1=oui 0=non)
	 echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\">
	 		<form action=\"show_cart.php\" method=\"post\">
			<tr><th colspan=\"".($images+1)."\" bgcolor=\"#cccccc\">Item</th>
				<th bgcolor=\"#CCCCCC\">Price</th>
				<th bgcolor=\"#CCCCCC\">Quantity</th>
				<th bgcolor=\"#CCCCCC\">Total</th>
			</tr>";
			
	//Affiche chaque article dans une ligne du tableau
	foreach($cart as $isbn => $qty){
		$book = get_book_details($isbn);
		echo "<tr>";
		if($images==true){
			echo "<td align=\"left\">";
			if(file_exists("images/".$isbn.".jpg")){
				$size = getimagesize("images/".$isbn.".jpg");
				if(($size[0] > 0) && ($size[1] > 0)){
					echo "<img src=\"images/".$isbn.".jpg\" style=\"border: 1px solid black\" width=\"".($size[0]/3)."\" height=\"".($size[1]/3)."\" />";
				}
			} else {
				echo "&nbsp";
			}
			echo "</td>";
		}
		
		echo "<td align=\"left\">
		<a href=\"show_book.php?isbn=".$isbn."\">".$book['title']."</a> by ".$book['author']."</td>
		<td align=\"center\">\$".number_format($book['price'], 2)."</td>
		<td align=\"center\">";
		
		//Si les modifications sont acceptées, on affiche les quantités dans des boites de texte
		if($change==true){
			echo "<input type=\"text\" name=\"".$isbn."\" value=\"".$qty."\" size=\"3\">";
		} else {
			echo $qty;
		}
		
		echo "</td>
			  <td align=\"center\">\$".number_format($book['price']*$qty, 2)."</td>
			  </tr>\n";
	}
	
	//Affiche la ligne des totaux
	echo "<tr>
		 <th colspan=\"".(2 + $images)."\" bgcolor=\"#CCCCCC\">&nbsp;</th>
		 <th align=\"center\" bgcolor=\"#CCCCCC\">".$_SESSION['items']."</th>
		 <th align=\"center\" bgcolor=\"#CCCCCC\">\$".number_format($_SESSION['total_price'],2)."</th>
		 </tr>";
		 
	//Affiche le bouton Save Changes
	if($change==true){
		echo"<tr>
			<td colspan=\"".($images + 2)."\">&nbsp;</td>
			<td align=\"center\">
				<input type=\"hidden\" name=\"save\" value=\"true\"/>
				<input type=\"image\" src=\"images/save-changes.gif\" border=\"0\" alt=\"Save Changes\"/>
			</td>
			<td>&nbsp;</td>
			</tr>";
	}
	echo "</form></table>";
}

function display_checkout_form(){
	 //display the form that asks for name and address
?>
  <br />
  <table border="0" width="100%" cellspacing="0">
  <form action="purchase.php" method="post">
  <tr><th colspan="2" bgcolor="#cccccc">Your Details</th></tr>
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" value="" maxlength="40" size="40"/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="address" value="" maxlength="40" size="40"/></td>
  </tr>
  <tr>
    <td>City/Suburb</td>
    <td><input type="text" name="city" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr>
    <td>State/Province</td>
    <td><input type="text" name="state" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr>
    <td>Postal Code or Zip Code</td>
    <td><input type="text" name="zip" value="" maxlength="10" size="40"/></td>
  </tr>
  <tr>
    <td>Country</td>
    <td><input type="text" name="country" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr><th colspan="2" bgcolor="#cccccc">Shipping Address (leave blank if as above)</th></tr>
  <tr>
    <td>Name</td>
    <td><input type="text" name="ship_name" value="" maxlength="40" size="40"/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="ship_address" value="" maxlength="40" size="40"/></td>
  </tr>
  <tr>
    <td>City/Suburb</td>
    <td><input type="text" name="ship_city" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr>
    <td>State/Province</td>
    <td><input type="text" name="ship_state" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr>
    <td>Postal Code or Zip Code</td>
    <td><input type="text" name="ship_zip" value="" maxlength="10" size="40"/></td>
  </tr>
  <tr>
    <td>Country</td>
    <td><input type="text" name="ship_country" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><p><strong>Please press Purchase to confirm
         your purchase, or Continue Shopping to add or remove items.</strong></p>
     <?php display_form_button("purchase", "Purchase These Items"); ?>
    </td>
  </tr>
  </form>
  </table><hr />
<?php
}

function display_form_button($image, $alt){
	echo "<div align=\"center\"><input type=\"image\"
           src=\"images/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"50\"
           width=\"135\"/></div>";			 
}

function display_shipping($shipping) {
  // display table row with shipping cost and total price including shipping
?>
  <table border="0" width="100%" cellspacing="0">
  <tr><td align="left">Shipping</td>
      <td align="right"> $<?php echo number_format($shipping, 2); ?></td></tr>
  <tr><th bgcolor="#cccccc" align="left">TOTAL INCLUDING SHIPPING</th>
      <th bgcolor="#cccccc" align="right">$ <?php echo number_format($shipping+$_SESSION['total_price'], 2); ?></th>
  </tr>
  </table><br />
<?php
}

function display_card_form($name) {
  //display form asking for credit card details
?>
  <table border="0" width="100%" cellspacing="0">
  <form action="process.php" method="post">
  <tr><th colspan="2" bgcolor="#cccccc">Credit Card Details</th></tr>
  <tr>
    <td>Type</td>
    <td><select name="card_type">
        <option value="VISA">VISA</option>
        <option value="MasterCard">MasterCard</option>
        <option value="American Express">American Express</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>Number</td>
    <td><input type="text" name="card_number" value="" maxlength="16" size="40"></td>
  </tr>
  <tr>
    <td>AMEX code (if required)</td>
    <td><input type="text" name="amex_code" value="" maxlength="4" size="4"></td>
  </tr>
  <tr>
    <td>Expiry Date</td>
    <td>Month
       <select name="card_month">
       <option value="01">01</option>
       <option value="02">02</option>
       <option value="03">03</option>
       <option value="04">04</option>
       <option value="05">05</option>
       <option value="06">06</option>
       <option value="07">07</option>
       <option value="08">08</option>
       <option value="09">09</option>
       <option value="10">10</option>
       <option value="11">11</option>
       <option value="12">12</option>
       </select>
       Year
       <select name="card_year">
       <?php
       for ($y = date("Y"); $y < date("Y") + 10; $y++) {
         echo "<option value=\"".$y."\">".$y."</option>";
       }
       ?>
       </select>
  </tr>
  <tr>
    <td>Name on Card</td>
    <td><input type="text" name="card_name" value = "<?php echo $name; ?>" maxlength="40" size="40"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <p><strong>Please press Purchase to confirm your purchase, or Continue Shopping to
      add or remove items</strong></p>
     <?php display_form_button('purchase', 'Purchase These Items'); ?>
    </td>
  </tr>
  </table>
<?php
}

function display_login_form($languages_vars){
?>
<center>
  <div id="login_form">
   <h1>Connexion à GrindHouse Leather</h1>
   <div  bgcolor="#cccccc">
   <table cellspacing="10">   
   <form method="post" action="connect.php">

     <tr>
       <td><?php echo $languages_vars['mail']; ?> :</td>
       <td><input type="text" name="mail"/></br></td>
     </tr>
     <tr>
       <td><?php echo $languages_vars['mdp']; ?> :</td>
       <td><input type="password" name="passwd"/></br></td>
     </tr>
     <tr>
       <td colspan="2" align="center">
       <input id="myButton" type="submit" value=<?php echo '"'.$languages_vars['connexion'].'"'; ?>/></form>
       <form method="post" action="signup.php">
       <input  id="myButton" type="submit" value=<?php echo '"'.$languages_vars['inscription'].'"'; ?>/></form>
      </td></tr>
    </table>
   </div>
  </div>
</center>

<?php
}

function display_admin_menu(){
?>
<center>
  <div id="menu">
    <a href="index.php">Go to main site</a><br />
    <a href="ajout.php">Ajouter un nouveau produit</a><br />
    <a href="list_produit.php">Lister les produits existants</a><br />
    <a href="insert_book_form.php">Add a new book</a><br />
    <a href="change_password_form.php">Change admin password</a><br />
  </div>
</center>
<?php
}

function do_man_category($languages_vars, $num_produits, $array_product){
?>
  <div class="LogoTop">
    <div id="logoCat">
    <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
    <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
    <div class="ImageCategroy">
      <img src="medias/pictures/Parc-6-Collection.jpg" alt="Collection Homme - Eté 2014">
    </div>
  </div>

  <div id="conteneur"> 
    <div class="Category">
      <div class="Sacs">  
        <h1><?php echo $languages_vars['sacs']; ?></h1>
        <div class="CategoryList1">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=1', $languages_vars['sac_main']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=2', $languages_vars['porte_documents']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=3', $languages_vars['sac_dos']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=4', $languages_vars['pochettes']); ?></li> 
          </ul>
        </div>
      </div>
      <div class="Accessoires">
        <h1><?php echo $languages_vars['accessoires']; ?></h1>
        <div class="CategoryList2">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=5', $languages_vars['montres']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=6', $languages_vars['portefeuille']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=7', $languages_vars['gants']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=8', $languages_vars['ceintures']); ?></li> 
          </ul>
        </div>
      </div>
    </div>

    <div class="ProduitsHommes">
      <div class="NomHomme">
          <h1><?php echo $languages_vars['homme']; ?> (<?php echo $num_produits; ?>)</h1>
      </div>
      <table border="1" cellspacing="20">
        <tr>
        <?php foreach ($array_product as $row) {
          $i = 1;
            $url = 'show_product.php?id_product='.$row['ID_PROD'];
            ?>
              <td>
                  <a href="<?php echo $url ; ?>"> <img src="medias/pictures/<?php echo $row['url']; ?>" alt="<?php echo $row['url']; ?>"></a>
                  <h1 class="Produit"><a href="<?php echo $url; ?>"><?php echo $row['NOM']; ?></a><br><?php echo $row['PRIX_HT']; ?> &euro;
              </td>
            <?php
              if($i % 2 == 0){?>
                  </tr>
              <?php }
            $i++;
          }
          
        ?>
      </table>
        <!--<tr>

        </tr>
        <tr>
          <td>
            <img src="medias/pictures/Gants-1-Homepage.jpg" alt="Gants">
            <h1 class="Produit">Gants<br>79€</h1>
          </td>
          <td>
            <img src="medias/pictures/Montre-2-Homepage.jpg" alt="Montre">
            <h1 class="Produit">Montre<br>299€</h1>
            <h1 class="Produit"></h1>
          </td>
        </tr>
        <tr>
          <td>
            <img src="medias/pictures/Portefeuille-3-Homepage.jpg" alt="Portefeuille">
            <h1 class="Produit">Portefeuille<br>199€</h1>
          </td>
          <td>
            <img src="medias/pictures/Smartphone-1-Homepage.jpg" alt="Housse smartphone">
            <h1 class="Produit">Housse<br>49€</h1>
          </td>
        </tr>-->
      
    </div>
  </div>

<?php
}

function no_produit_man($languages_vars){
  ?>
    <div class="LogoTop">
    <div id="logoCat">
    <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
    <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
    <div class="ImageCategroy">
      <img src="medias/pictures/Parc-6-Collection.jpg" alt="Collection Homme - Eté 2014">
    </div>
  </div>

  <div id="conteneur"> 
    <div class="Category">
      <div class="Sacs">  
        <h1><?php echo $languages_vars['sacs']; ?></h1>
        <div class="CategoryList1">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=1', $languages_vars['sac_main']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=2', $languages_vars['porte_documents']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=3', $languages_vars['sac_dos']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=4', $languages_vars['pochettes']); ?></li> 
          </ul>
        </div>
      </div>
      <div class="Accessoires">
        <h1><?php echo $languages_vars['accessoires']; ?></h1>
        <div class="CategoryList2">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=5', $languages_vars['montres']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=6', $languages_vars['portefeuille']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=7', $languages_vars['gants']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=8', $languages_vars['ceintures']); ?></li> 
          </ul>
        </div>
      </div>
    </div>

    <?php

    display_warning_message($languages_vars['no_product']);
}

function no_produit_woman($languages_vars){
?>
  <div class="LogoTop">
    <div id="logoCat">
    <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
    <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
    <div class="ImageCategroy">
      <img src="medias/pictures/Parc-6-Collection.jpg" alt="Collection Homme - Eté 2014">
    </div>
  </div>

  <div id="conteneur"> 
    <div class="Category">
      <div class="Sacs">  
        <h1><?php echo $languages_vars['sacs']; ?></h1>
        <div class="CategoryList1">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=1', $languages_vars['sac_main']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=2', $languages_vars['porte_documents']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=3', $languages_vars['sac_dos']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=4', $languages_vars['pochettes']); ?></li> 
          </ul>
        </div>
      </div>
      <div class="Accessoires">
        <h1><?php echo $languages_vars['accessoires']; ?></h1>
        <div class="CategoryList2">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=5', $languages_vars['montres']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=6', $languages_vars['portefeuille']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=7', $languages_vars['gants']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=8', $languages_vars['ceintures']); ?></li> 
          </ul>
        </div>
      </div>
    </div>
<?php
  display_warning_message($languages_vars['no_product']);
}


function do_woman_category($languages_vars, $num_produits, $array_product){
?>
  <div class="LogoTop">
    <div id="logoCat">
    <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
    <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
    <div class="ImageCategroy">
      <img src="medias/pictures/Parc-6-Collection.jpg" alt="Collection Homme - Eté 2014">
    </div>
  </div>

  <div id="conteneur"> 
    <div class="Category">
      <div class="Sacs">  
        <h1><?php echo $languages_vars['sacs']; ?></h1>
        <div class="CategoryList1">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=1', $languages_vars['sac_main']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=2', $languages_vars['porte_documents']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=3', $languages_vars['sac_dos']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=4', $languages_vars['pochettes']); ?></li> 
          </ul>
        </div>
      </div>
      <div class="Accessoires">
        <h1><?php echo $languages_vars['accessoires']; ?></h1>
        <div class="CategoryList2">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=5', $languages_vars['montres']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=6', $languages_vars['portefeuille']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=7', $languages_vars['gants']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=8', $languages_vars['ceintures']); ?></li> 
          </ul>
        </div>
      </div>
    </div>

    <div class="ProduitsHommes">
      <div class="NomHomme">
          <?php var_dump($num_produits); ?>
          <h1><?php echo $languages_vars['homme']; ?> (<?php echo $num_produits; ?>)</h1>
      </div>
      <table border="1" cellspacing="20">
        <tr>
        <?php foreach ($array_product as $row) {
          $i = 1;
            $url = 'show_product.php?id_product='.$row['ID_PROD'];
            ?>
              <td>
                  <a href="<?php echo $url ; ?>"> <img src="medias/pictures/<?php echo $row['url']; ?>" alt="<?php echo $row['url']; ?>"></a>
                  <h1 class="Produit"><a href="<?php echo $url; ?>"><?php echo $row['NOM']; ?></a><br><?php echo $row['PRIX_HT']; ?> &euro;
              </td>
            <?php
              if($i % 2 == 0){?>
                  </tr>
              <?php }
            $i++;
          }
          
        ?>
      </table>
        <!--<tr>

        </tr>
        <tr>
          <td>
            <img src="medias/pictures/Gants-1-Homepage.jpg" alt="Gants">
            <h1 class="Produit">Gants<br>79€</h1>
          </td>
          <td>
            <img src="medias/pictures/Montre-2-Homepage.jpg" alt="Montre">
            <h1 class="Produit">Montre<br>299€</h1>
            <h1 class="Produit"></h1>
          </td>
        </tr>
        <tr>
          <td>
            <img src="medias/pictures/Portefeuille-3-Homepage.jpg" alt="Portefeuille">
            <h1 class="Produit">Portefeuille<br>199€</h1>
          </td>
          <td>
            <img src="medias/pictures/Smartphone-1-Homepage.jpg" alt="Housse smartphone">
            <h1 class="Produit">Housse<br>49€</h1>
          </td>
        </tr>-->
      
    </div>
  </div>

<?php
}

function do_man_sub_category($languages_vars, $num_produits, $array_product){
?>
  <div class="LogoTop">
    <div id="logoCat">
    <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
    <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
    <div class="ImageCategroy">
      <img src="medias/pictures/Parc-6-Collection.jpg" alt="Collection Homme - Eté 2014">
    </div>
  </div>

  <div id="conteneur"> 
    <div class="Category">
      <div class="Sacs">  
        <h1><?php echo $languages_vars['sacs']; ?></h1>
        <div class="CategoryList1">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=1', $languages_vars['sac_main']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=2', $languages_vars['porte_documents']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=3', $languages_vars['sac_dos']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=4', $languages_vars['pochettes']); ?></li> 
          </ul>
        </div>
      </div>
      <div class="Accessoires">
        <h1><?php echo $languages_vars['accessoires']; ?></h1>
        <div class="CategoryList2">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=5', $languages_vars['montres']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=6', $languages_vars['portefeuille']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=7', $languages_vars['gants']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=2&id_sc=8', $languages_vars['ceintures']); ?></li> 
          </ul>
        </div>
      </div>
    </div>

    <div class="ProduitsHommes">
      <div class="NomHomme">
          <h1><?php echo $languages_vars['homme']; ?> (<?php echo $num_produits; ?>)</h1>
      </div>
      <table border="1" cellspacing="20">
        <tr>
        <?php foreach ($array_product as $row) {
          $i = 1;
            $url = 'show_product.php?id_product='.$row['ID_PROD'];
            ?>
              <td>
                  <a href="<?php echo $url ; ?>"> <img src="medias/pictures/<?php echo $row['url']; ?>" alt="<?php echo $row['url']; ?>"></a>
                  <h1 class="Produit"><a href="<?php echo $url; ?>"><?php echo $row['NOM']; ?></a><br><?php echo $row['PRIX_HT']; ?> &euro;
              </td>
            <?php
              if($i % 2 == 0){?>
                  </tr>
              <?php }
            $i++;
          }
          
        ?>
      </table>
        <!--<tr>

        </tr>
        <tr>
          <td>
            <img src="medias/pictures/Gants-1-Homepage.jpg" alt="Gants">
            <h1 class="Produit">Gants<br>79€</h1>
          </td>
          <td>
            <img src="medias/pictures/Montre-2-Homepage.jpg" alt="Montre">
            <h1 class="Produit">Montre<br>299€</h1>
            <h1 class="Produit"></h1>
          </td>
        </tr>
        <tr>
          <td>
            <img src="medias/pictures/Portefeuille-3-Homepage.jpg" alt="Portefeuille">
            <h1 class="Produit">Portefeuille<br>199€</h1>
          </td>
          <td>
            <img src="medias/pictures/Smartphone-1-Homepage.jpg" alt="Housse smartphone">
            <h1 class="Produit">Housse<br>49€</h1>
          </td>
        </tr>-->
      
    </div>
  </div>

<?php
}

function do_woman_sub_category($languages_vars, $num_produits, $array_product){
?>
  <div class="LogoTop">
    <div id="logoCat">
    <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
    <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
    <div class="ImageCategroy">
      <img src="medias/pictures/Parc-6-Collection.jpg" alt="Collection Homme - Eté 2014">
    </div>
  </div>

  <div id="conteneur"> 
    <div class="Category">
      <div class="Sacs">  
        <h1><?php echo $languages_vars['sacs']; ?></h1>
        <div class="CategoryList1">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=1', $languages_vars['sac_main']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=2', $languages_vars['porte_documents']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=3', $languages_vars['sac_dos']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=4', $languages_vars['pochettes']); ?></li> 
          </ul>
        </div>
      </div>
      <div class="Accessoires">
        <h1><?php echo $languages_vars['accessoires']; ?></h1>
        <div class="CategoryList2">
          <ul>
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=5', $languages_vars['montres']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=6', $languages_vars['portefeuille']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=7', $languages_vars['gants']); ?></li> 
          <li><?php do_html_url($_SERVER['PHP_SELF'].'?id=1&id_sc=8', $languages_vars['ceintures']); ?></li> 
          </ul>
        </div>
      </div>
    </div>

    <div class="ProduitsHommes">
      <div class="NomHomme">
          <h1><?php echo $languages_vars['homme']; ?> (<?php echo $num_produits; ?>)</h1>
      </div>
      <table border="1" cellspacing="20">
        <tr>
        <?php foreach ($array_product as $row) {
          $i = 1;
            $url = 'show_product.php?id_product='.$row['ID_PROD'];
            ?>
              <td>
                  <a href="<?php echo $url ; ?>"> <img src="medias/pictures/<?php echo $row['url']; ?>" alt="<?php echo $row['url']; ?>"></a>
                  <h1 class="Produit"><a href="<?php echo $url; ?>"><?php echo $row['NOM']; ?></a><br><?php echo $row['PRIX_HT']; ?> &euro;
              </td>
            <?php
              if($i % 2 == 0){?>
                  </tr>
              <?php }
            $i++;
          }
          
        ?>
      </table>
        <!--<tr>

        </tr>
        <tr>
          <td>
            <img src="medias/pictures/Gants-1-Homepage.jpg" alt="Gants">
            <h1 class="Produit">Gants<br>79€</h1>
          </td>
          <td>
            <img src="medias/pictures/Montre-2-Homepage.jpg" alt="Montre">
            <h1 class="Produit">Montre<br>299€</h1>
            <h1 class="Produit"></h1>
          </td>
        </tr>
        <tr>
          <td>
            <img src="medias/pictures/Portefeuille-3-Homepage.jpg" alt="Portefeuille">
            <h1 class="Produit">Portefeuille<br>199€</h1>
          </td>
          <td>
            <img src="medias/pictures/Smartphone-1-Homepage.jpg" alt="Housse smartphone">
            <h1 class="Produit">Housse<br>49€</h1>
          </td>
        </tr>-->
      
    </div>
  </div>

<?php
}
			
function display_signup_form($languages_vars){
  //display
?>
    <center>
     <div id="signup_form">
          <div id="new_client">
            <?php echo $languages_vars['new_client']; ?>
            <hr>
          </div>
          <br/>
          <table>
          <tr><td>
          <form method="post" action="register.php">
          <label for="civilite">* <?php echo $languages_vars['civilite']." :"; ?></label>
          <input type="radio" name="civilite" value="1" tabindex=checked><?php echo $languages_vars['monsieur']; ?>
          <input type="radio" name="civilite" value="2"><?php echo $languages_vars['madame']; ?>
          <input type="radio" name="civilite" value="3"><?php echo $languages_vars['mademoiselle']; ?>
          <br/>
          <label for="nom">* <?php echo $languages_vars['nom']." :";?></label>
          <input type="text" name="nom" required>
          <br/>
          <label for="prenom">* <?php echo $languages_vars['prenom']." :";?></label>
          <input type="text" name="prenom" required>
          <br/>
          <label for="adresse">* <?php echo $languages_vars['adresse']." :";?></label>
           <input type="text" name="adresse" required>
          <br/>
          <label for="adresse_2"><?php echo $languages_vars['adresse_2']." :"; ?></label>
           <input type="text" name="adresse_2">
          <br/>
          <label for="code_postal">* <?php echo $languages_vars['code_postal']." :"; ?></label>
           <input type="text" name="zipcode" required>
          <br/>
          <label for="ville">* <?php echo $languages_vars['ville']." :";?></label>
          <input  type="text" name="ville" required>
          <br/>
          <label for="pays">* <?php echo $languages_vars['pays']." :"; ?></label>
          <select name="pays">
          <label for="country"><?php
            foreach($languages_vars['country'] as $key => $value){ ?></label>
              <option value=<?php echo '"'.$value.'"'; ?>> <?php echo $value; ?> </option>
            <?php
            }
            ?>
          </select>
          <br/>
          <label for="phone"><?php echo $languages_vars['phone']." :"; ?></label>
          <input class="NomForm" type='text' name='phone'>
          <br>
          <br/>
          <input type="checkbox" name="newsletter" value="1">
          <?php echo $languages_vars['grindhouse']; ?>
          <br/>
          <br/>

          <hr>

          <br/>

          <label for="mail">* <?php echo $languages_vars['mail']." :"; ?></label>
          <input type="email" name="email" required>
          <br/>

          <label for="mdp">* <?php echo $languages_vars['mdp']." :"; ?></label>
          <input type="password" name="mdp" required>
          <br/>
          <label for="confirm_mdp">* <?php echo $languages_vars['confirm_mdp']." :"; ?></label>
          <input type="password" name="mdp2" required>
          <br/>
          <br/>
          </td>
          </table>
          
          <p><?php echo $languages_vars['champ_obligatoire']; ?></p>
          <br/>
          <input id="myButton" type="submit" name="submit" value=<?php echo '"'.$languages_vars['inscription'].'"'; ?>>
          </form>
          </br>
          <br/>
      </div>
    </center>

<?php
}
function display_signup_confirm($languages_vars){
?>
  <div id="signup_confirm">
      <?php echo $languages_vars['inscription_confirm'];?>
  </div>
<?php
}

function display_warning_message($message){  
?>
  <center>
    <div id="warning_message">
      <?php echo $message; ?>
    </div>
  </center>
<?php
}

function display_account_user($languages_vars){
?>
  <div class="LogoTop">
    <div id="logoCat">
      <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
      <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
  </div>

  <div id='account_home'>
   
    <h2><?php echo $languages_vars['bonjour'].' '.$_SESSION['civ'].' '. $_SESSION['user_lastname'].","; ?></h2>
      <div id="menu_account">
        <div class="ProfilUser">
          <h3><?php echo $languages_vars['profil']; ?></h3>
            <ul>
              <li><?php do_html_url('infos.php', $languages_vars['info']); ?></li>
              <li><?php do_html_url('change_password.php', $languages_vars['change_mdp']); ?></li>
              <li><?php do_html_url('newsletter.php', $languages_vars['newsletter']); ?></li>
            </ul>
        </div>
        <div class="CommandesUser">
            <h3><?php echo $languages_vars['commandes']; ?></h3>
            <ul>
              <li><?php do_html_url('orders.php', $languages_vars['commandes_en_cours']); ?></li>
              <li><?php do_html_url('history.php', $languages_vars['historique_facture']); ?></li>
            </ul>
        </div>
      </div>

      <div id="message_home">
          <?php echo $languages_vars['accueil_home']; ?>
      </div>
  </div>
<?php
}
function do_html_cart($languages_vars, $cart){
?>

<div class="panier">
  <div class="LogoTop">
  <?php  var_dump($_SESSION['cart']); ?>
    <div id="logoCat">
      <a href="index.php"><img src="medias/pictures/logo.png" alt="GHL Logo"></a>
    </div>
      <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
  </div>

  <div class="CartTop">
    <div class="Panier1">
      <div class="Panier1Nom">
        <p>1.MON PANIER</p>
      </div>
    </div>
    <div class="MesInformations1">
      <div class="MesInformations1Nom">
        <p>2.MES INFORMATIONS</p> 
      </div>
    </div>
    <div class="Livraison1">
      <div class="Livraison1Nom">
        <p>3.LIVRAISON</p>   
      </div>
    </div>
    <div class="Paiement1">
      <div class="Paiement1Nom">
        <p>4.PAIEMENT</p>  
      </div>
    </div>
  </div>

  <div class="PanierNom2">
    <p>MON PANIER</p>

    <div class="BarrePanier">
      <hr>
      <table>
      <?php
      foreach($cart as $id => $qty){
        $product = get_product_details($id);


        echo "<tr>";
     
      echo "<td align=\"left\">";
      echo "<a href=\"show_product.php?id_product=".$product['ID_PROD']."\">".$product['NOM']."</a>";
      echo "</td>";
      echo '<td align="center">'.number_format($product['PRIX_HT'], 2).'&euro;</td>';
      echo '<td align="center">';
    
      echo "<input type=\"text\" name=\"".$id."\" value=\"".$qty."\" size=\"3\">";
    
    
      echo "</td>
        <td align=\"center\">".number_format($product['PRIX_HT']*$qty, 2)." &euro;</td>
        </tr>\n";
  }
  
  //Affiche la ligne des totaux
  echo "<tr>
     <th colspan=\"2\" bgcolor=\"#CCCCCC\">&nbsp;</th>
     <th align=\"center\" bgcolor=\"#CCCCCC\">".$_SESSION['items']."</th>
     <th align=\"center\" bgcolor=\"#CCCCCC\">".number_format($_SESSION['total_price'],2)." &euro;</th>
     </tr>";
      
      ?>
    </table>
      <hr>

    </div>
  </div>
  </div>

<?php
}

function do_html_produit($languages_vars, $produit, $produit_before='', $produit_after=''){
?>
<div class="LogoTop">
    <div id="logoCat">
    <img src="medias/pictures/logo.png" alt="GHL Logo"> 
    </div>
    <h1><?php do_html_url('category.php?id=2', $languages_vars['collection_homme']); ?> | <?php do_html_url('category.php?id=1', $languages_vars['collection_femme']); ?></h1> 
  </div>


  

  <div class="ficheproduit">
    <div id="previews">
      <?php if(!empty($produit_before)){
        ?>
        <div class="previews1"><a href="show_product.php?id_product=<?php echo $produit_before['ID_PROD']; ?>"><img src="medias/pictures/<?php echo $produit_before['url']; ?>" alt="Gants"></a></div>
      <?php
      }
      ?>
       <div class="previews2"><img src="medias/pictures/<?php echo $produit['url']; ?>" alt="Gants">
        <div class="ajout"><a href="cart.php?new=<?php echo $produit['ID_PROD']; ?>">Ajouter au panier</a></div>
        <div class ="prodfeat1"><img src="medias/produits/Ceinture-1.jpg" alt="Gants"></div>
        <div class="prodfeat2"><img src="medias/produits/Ceinture-1.jpg" alt="Gants"></div>
        </div> 
       <?php if(!empty($produit_after)){
        ?>
        <div class="previews3"><a href="show_product.php?id_product=<?php echo $produit_after['ID_PROD']; ?>"><img src="medias/pictures/<?php echo $produit_after['url']; ?>" alt="Gants"></a></div>
        <?php } ?>
     </div>



   </div>
   
<div id="wrapper">

                                <div id="tabs">
                <ul>
                        <li><a href="#tabs-1" title="">Description</a></li>
                        <li><a href="#tabs-2" title="">Conseils mode</a></li>
                        
                </ul>

                <div id="tabs_container">
                        



                <div id="tabs-1">
                            <p><?php echo $produit['DESC_FR'];?></p>
                </div>

                <div id="tabs-2">
                            <p><?php echo $produit['CONSEIL_FR']; ?></p>
        
                </div>

                

                </div><!--End tabs container-->
                
        </div><!--End tabs-->

  
</div>

<?php
}





