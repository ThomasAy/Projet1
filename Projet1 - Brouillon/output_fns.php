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

<<<<<<< HEAD
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
      <link rel="icon" type="image/ico" href="medias/favicon.ico">

     
      <script>
        $(function() {
          $( "#datepicker" ).datepicker();
        });
      </script>

      <style>
          #datepicker{
            font-size: 10px !important;
          };
      </style>
=======
>>>>>>> a28142c1f892e709f01d97855e7fd14026c302a9
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
                testMode: true,
                onChange: function(evt){
                    alert("The selected language is: "+evt.selectedItem);
                }
            });
        });
    </script>
<<<<<<< HEAD

    <script src="scripts.js"  type="text/javascript"></script>
  <!-- end JS -->


      <title><?php echo $title; ?></title>
    </head>
    <body>
    <br><br><br> <br><br><br> <?php var_dump($_SESSION); ?>


=======
  <!-- end JS -->

      <title><?php echo $title; ?></title>
    </head>
    <body>
      <script src="scripts.js"  type="text/javascript"></script>
>>>>>>> a28142c1f892e709f01d97855e7fd14026c302a9
    <div class="Top_Bar">
        <div id="Reseaux_sociaux"> <p> &nbsp; <img src="medias/icons/twitter.png" alt="twitter"/> &nbsp; <img src="medias/icons/twitter.png" alt="twitter"/> &nbsp; <img src="medias/icons/twitter.png" alt="twitter"/></p></div>
<!-- begin container -->
        <div id="Pays">
<!-- begin language switcher -->
            <div id="polyglotLanguageSwitcher">
<<<<<<< HEAD
              <form method='get' action="#">

=======
              <form action="#">
>>>>>>> a28142c1f892e709f01d97855e7fd14026c302a9
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
          <form method="post" action="#">
            <input id="inputSearch" type="text" name="keyWord"/>
            <input id="btnValider" type="submit" value="<?php echo $languages_vars['recherche']; ?>"/>
          </form>
        </div>

        <div id="Texte_de_connexion">
<<<<<<< HEAD
          <p>
          <?php 
          if(isset($_SESSION['mail'])){
            echo $languages_vars['bonjour'].' ';
            switch ($_SESSION['civ']){
              case 1 : echo $languages_vars['monsieur']; break;
              case 2 : echo $languages_vars['mademoiselle']; break;
              case 3 : echo $languages_vars['madame']; break;
            }
            echo ' '.$_SESSION['user_lastname'].' ';
            do_html_url("logout.php", $languages_vars['deconnexion']);
          } else {
            do_html_url("login.php", $languages_vars['connexion']); 
          }
          ?>
          </p>

=======
          <p><?php do_html_url("login.php", $languages_vars['connexion']);?></p>
>>>>>>> a28142c1f892e709f01d97855e7fd14026c302a9
        </div>
        <div id="Panier">
            <a href="#">
                <span><img <?php echo 'src="medias/icons/Panier/Panier-' . $_SESSION["imgPanier"] . '.png"';?> alt="Votre panier" ></span>
            </a>
        </div>

    </div>
    <?php
	}

  function do_html_homepage_body(){ 

  ?>

  <div class="Contenu">
    <div id="femme">
      <img src="medias/pictures/Parc-5-Homepage.jpg" alt="Collection Femme">
    </div>
    <div id="homme">
     <img src="medias/pictures/Parc-6-Homepage.jpg" alt="Collection Homme">
    </div>
    <div class="BandeGenre"> 
      <div id="logo">
          <img src="medias/pictures/logo.png" alt="GHL Logo">
      </div>
        
    <div class="Nom"> 
      <h1 id="femmeNom">FEMME</h1>

      <h1 id="hommeNom">HOMME</h1>
    </div>
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
  <div style="height: 0px;"></div>
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
<<<<<<< HEAD

    
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

    
=======
    
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

    
>>>>>>> a28142c1f892e709f01d97855e7fd14026c302a9

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



function display_books($book_array) {
  //display all books in the array passed in
  if (!is_array($book_array)) {
    echo "<p>No books currently available in this category</p>";
  } else {
    //create table
    echo "<table width=\"100%\" border=\"0\">";

    //create a table row for each book
    foreach ($book_array as $row) {
      $url = "show_book.php?isbn=".$row['isbn'];
      echo "<tr><td>";
      if (@file_exists("images/".$row['isbn'].".jpg")) {
        $title = "<img src=\"images/".$row['isbn'].".jpg\"
                  style=\"border: 1px solid black\"/>";
        do_html_url($url, $title);
      } else {
        echo "&nbsp;";
      }
      echo "</td><td>";
      $title = $row['title']." by ".$row['author'];
      do_html_url($url, $title);
      echo "</td></tr>";
    }

    echo "</table>";
  }

  echo "<hr />";
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
  // dispaly form asking for name and password
  if (isset($_POST['mail']) &&  isset ($_POST['passwd'])){
    echo "Vous avez essayé de vous connecter, voici le md5(".substr(md5($_POST['mail'] . $_POST['passwd']),12) . ")";
  }
?>
 <form method="post" action="connect.php">
 <div id="login_form" bgcolor="#cccccc">
   <tr>
     <td><?php echo $languages_vars['mail']; ?></td>
     <td><input type="text" name="mail"/></td></tr>
   <tr>
     <td><?php echo $languages_vars['mdp']; ?></td>
     <td><input type="password" name="passwd"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="<?php echo $languages_vars['connexion']; ?>"/></td></tr>
   <tr>
 </div></form>

<?php
}

function display_admin_menu(){
?>
<br />
<a href="index.php">Go to main site</a><br />
<a href="insert_category_form.php">Add a new category</a><br />
<a href="insert_book_form.php">Add a new book</a><br />
<a href="change_password_form.php">Change admin password</a><br />
<?php
}

function display_signup_form($languages_vars){
  //display
?>
      <div id="signup_form">
          <div id="new_client">
              <?php echo $languages_vars['new_client']; ?>
          </div>

          <form method="post" action="register.php">
          * <?php echo $languages_vars['civilite']; ?>
          <input type="radio" name="civilite" value="1"><?php echo $languages_vars['monsieur']; ?>
          <input type="radio" name="civilite" value="2"><?php echo $languages_vars['madame']; ?>
          <input type="radio" name="civilite" value="3"><?php echo $languages_vars['mademoiselle']; ?>
          <br/>
          * <?php echo $languages_vars['nom'];?>
          <input type="text" name="nom">
          <br/>
          * <?php echo $languages_vars['prenom'];?>
          <input type="text" name="prenom">
          <br/>
          * <?php echo $languages_vars['adresse'];?>
          <input type="text" name="adresse">
          <br/>
          <?php echo $languages_vars['adresse_2']; ?>
          <input type="text" name="adresse_2">
          <br/>
          * <?php echo $languages_vars['code_postal']; ?>
          <input type="text" name="zipcode">
          <br/>
          * <?php echo $languages_vars['ville'];?>
          <input type="text" name="ville">
          <br/>
          * <?php echo $languages_vars['pays']; ?>
          <select name="pays">
            <?php
            foreach($languages_vars['country'] as $key => $value){ ?>
              <option value=<?php echo '"'.$value.'"'; ?>> <?php echo $value; ?> </option>
            <?php
            }
            ?>
          </select>
          <br/>
          <?php echo $languages_vars['phone']; ?>
          <input type='text' name='phone'>
          <br>
          <input type="checkbox" name="newsletter" value="1">
          <?php echo $languages_vars['grindhouse']; ?>
          <br/>

          <hr>

          <br/>

          * <?php echo $languages_vars['mail']; ?>
          <input type="email" name="email">
          <br/>

          * <?php echo $languages_vars['mdp']; ?>
          <input type="password" name="mdp">
          <br/>
          * <?php echo $languages_vars['confirm_mdp']; ?>
          <input type="password" name="mdp2">
          <br/>
          <br/>

          <p><?php echo $languages_vars['champ_obligatoire']; ?></p>

          <input type="submit" name="submit" value=<?php echo '"'.$languages_vars['inscription'].'"'; ?>>
          </form>
    </div>
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
  <div id="warning_message">
    <?php echo $message; ?>
  </div>
<?php
}
