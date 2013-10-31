<?php
function display_book_form($book = '') {
// This displays the book form.
// It is very similar to the category form.
// This form can be used for inserting or editing books.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_book.php.
// To update, pass an array containing a book.  The
// form will be displayed with the old data and point to update_book.php.
// It will also add a "Delete book" button.


  // if passed an existing book, proceed in "edit mode"
  $edit = is_array($book);

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>
  <form method="post"
        action="<?php echo $edit ? 'edit_book.php' : 'insert_book.php';?>">
  <table border="0">
  <tr>
    <td>ISBN:</td>
    <td><input type="text" name="isbn"
         value="<?php echo $edit ? $book['isbn'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Book Title:</td>
    <td><input type="text" name="title"
         value="<?php echo $edit ? $book['title'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Book Author:</td>
    <td><input type="text" name="author"
         value="<?php echo $edit ? $book['author'] : ''; ?>" /></td>
   </tr>
   <tr>
      <td>Category:</td>
      <td><select name="catid">
      <?php
          // list of possible categories comes from database
          $cat_array=get_categories();
          foreach ($cat_array as $thiscat) {
               echo "<option value=\"".$thiscat['catid']."\"";
               // if existing book, put in current catgory
               if (($edit) && ($thiscat['catid'] == $book['catid'])) {
                   echo " selected";
               }
               echo ">".$thiscat['catname']."</option>";
          }
          ?>
          </select>
        </td>
   </tr>
   <tr>
    <td>Price:</td>
    <td><input type="text" name="price"
               value="<?php echo $edit ? $book['price'] : ''; ?>" /></td>
   </tr>
   <tr>
     <td>Description:</td>
     <td><textarea rows="3" cols="50"
          name="description"><?php echo $edit ? $book['description'] : ''; ?></textarea></td>
    </tr>
    <tr>
      <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"oldisbn\"
                    value=\"".$book['isbn']."\" />";
         ?>
        <input type="submit"
               value="<?php echo $edit ? 'Update' : 'Add'; ?> Book" />
        </form></td>
        <?php
           if ($edit) {
             echo "<td>
                   <form method=\"post\" action=\"delete_book.php\">
                   <input type=\"hidden\" name=\"isbn\"
                    value=\"".$book['isbn']."\" />
                   <input type=\"submit\" value=\"Delete book\"/>
                   </form></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>
<?php
}

function insert_book($isbn, $title, $author, $catid, $price, $description){
	$conn = db_connect();
	
	//Vérifie si le livre existe déjà
	$query = "select * from books where isbn = '".$isbn."'";
	$result = $conn->query($query);
	
	if((!$result) && ($result->num_rows != 0 )){
		return false;
	}
	
	//Insertion du nouveau livre
	
	$query = "insert into books values(?,?,?,?,?,?)";
	$instr = $conn->prepare($query);
	$instr->bind_param("sssids", $isbn, $title, $author, $catid, $price, $description);
	$instr->execute();
	$instr->close();
	if(!$instr){
		return false;
	} else {
		return true;
	}
}

function delete_book($isbn){
	$conn = db_connect();
	
	$query = "delete from books where isbn = '".$isbn."'"; 
	
	$result = $conn->query($query);
	
	if(!$result){
		return false;
	} else {
		return true;
	}
}

function update_book($oldisbn, $isbn, $title, $author, $catid, $price, $description){
	$conn = db_connect();
	
	$query = "update books set isbn = '".$isbn."', title = '".$title."', author = '".$author."', catid = '".$catid."', price = '".$price."', description = '".$description."' where isbn = '".$oldisbn."'";
	
	$result = $conn->query($query);
	
	if(!$result){
		return false;
	} else {
		return true;
	}
}

function display_category_form($category = ''){
	//Ce formulaire peut être utilisé pour insérer, modifier ou supprimer une catégorie. Pour insérer, ne pas passer de paramètres, la variable $edit sera false et le formulaire pointera sur insert_category.php. Pour modifier la catégorie, passer un tableau contenant une catégorie, un bouton "delete category" sera aussi ajouté
	
	//Si un tableau est passé en paramètres, on initialise $edit à true
	
	$edit = is_array($category);
	
?>
	<form method="post" action="<?php echo $edit ? 'edit_category.php' : 'insert_category.php';?>">
    <table border="0">
    <tr>
    	<td> Category Name: </td>
        <td> <input type="text" name="catname" size="40" maxlength="40" value="<?php echo $edit ? $category['catname'] : '';?>"/></td>
    </tr>
    
    <tr>
    	<td <?php if(!$edit) { echo "colspan=2"; }?> align="center">
        	<?php
			if($edit){
				echo "<input type=\"hidden\" name=\"catid\" value=\"".$category['catid']."\" />";
			}
			?>
            
            <input type="submit" value="<?php echo $edit ? 'Update Category' : 'Insert Category'; ?>" />
            </form>
            </td>
           <?php
		   if($edit){
			   //permet la suppression si un tableau est passé en paramètres
			?>
            <td>
            <form method="post" action="delete_category.php">
            <input type="hidden" name="catid" value="<?php echo $category['catid'];?>" />
            <input type="submit" value="Delete category"/>
            </form>
            </td>
            <?php
		   }
		   ?>
           </tr>
           </table>
<?php
}
            
function insert_category($catname){
	$conn = db_connect();
	
	//On recherche si la catégorie existe déjà
	$query = "select * from categories where catname = '".$catname."'";
	
	$result = $conn->query($query);
	
	if(!$result || $result->num_rows!=0){
		return false;
	}
	
	//Insere la nouvelle cattégorie
	$query = "Insert into categories values ('', '".$catname."')";
	
	$result = $conn->query($query);
	
	if(!$result){
		return false;
	} else {
		return true;
	}
}
	
function update_category($catid, $catname){
	$conn = db_connect();
	
	$query = "update categories
			  set catname = '".$catname."'
			  where catid = '".$catid."'";
	$result = $conn->query($query);
	
	if(!$result){
		return false;
	} else {
		return true;
	}
}


function display_list_of_products(){

  $conn = db_connect();
  
  $query = "select * from produit";
  $result = $conn->query($query);
  
  if(!$result){
    ?>
    <center>
      <div id="menu">
        <p>Erreur dans la requete, veuillez contacter votre administrateur</p> 
      </div>
    </center> 
  <?php
  } else {
    ?>
    <center>
      <div id="menu">
        <p>Il y a <?php echo $result->num_rows; ?> produits</p>
      </div>
    </center>
      <?php

      $query = "SELECT produit.ID_PROD, NOM, PRIX_HT, DESC_FR, STOCK, URL 
                FROM produit, picture
                WHERE produit.ID_PROD = picture.ID_PROD
                ORDER BY ID_PROD ASC";

      $sql = $conn->query($query);


        //Pour la MAP du tableau
        $ListeProd = "
        <center>
        <div>
        <table>
            <tr>
                <th> <center> <u>Nom et Prix</u> </center> </th>
                <th> <center>Image</center> </th>
                <th> <center> <b> <u>Description</u> </b></center> </th> 
                <th> <center>Quantité </center></th>
            </tr>";
        while($row = $sql->fetch_array(MYSQLI_BOTH)) {
            $ListeProd = $ListeProd .
            "<tr> 
                <td>   <i>". $row['NOM'] . "</i> pour  : " . $row['PRIX_HT'] . "€ </td>
                <td>    <img style=\"width:150px;\"SRC=\"". $row['URL'] ."\" ALT=\"" . $row['NOM'] . "\" width=\"200px\"> </td>
                <td> <center> ".$row['DESC_FR']." </center> </td>
                <td> <center> ".$row['STOCK']." </center> </td>
            </tr>";
        }

        $ListeProd = $ListeProd . 
        "</table>
        </div>
        </center>";

        echo $ListeProd;

      }
  } 


function  display_form_Product($languages_vars)
{
 echo '
  <center>
     <div id="add_form">
          <div id="new_product">'
            .$languages_vars['ajout_produit'].
            '<hr>
          </div>
          <br/>
          <table>
          <tr>
          <form method="post" action="add_product.php" enctype="multipart/form-data">

          <label for="nom">* '. $languages_vars['nom'].' :</label>
          <input type="text" name="nom" autofocus required>
          <br/>
          <br/>
          <label for="PRIX_HT">* '. $languages_vars['prix_ht'].' :</label>
          <input type="number" name="PRIX_HT" required>
          <br/>
          <br/>
          <label for="photo">* '. $languages_vars['photo'].' :</label>
           <input type="file" name="photo" id="photo" />
           <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />

          <br/>
          <br/>
          <label for="description">* '. $languages_vars['description'].' :</label>
          <textarea rows="2" cols="40" class="NomForm" type="text" name="description" maxlength="1000" required> </textarea>
          <br />
          <br />
          <label for="conseil">* '. $languages_vars['conseils'].' :</label>
          <textarea rows="3" cols="40" class="NomForm" type="text" name="conseils" maxlength="1000" required> </textarea>
          <br />
          <br />
          <label for="VP">Mettre en vente privée</label>
          <input style="margin: auto;" type="checkbox" name="VP" value="1">
          <br />
          <br />
          <label for="stock">* '. $languages_vars['quantite'].' :</label>
          <input type="number" name="stock" value="100" pattern="[0-9]" title="Please just type numbers." required>
          <br/>
          <br/>
          <label for="alert">* Niveau d\'alerte (stock):</label>
          <input type="number" name="alert" value="10" pattern="[0-9]" title="Please just type numbers." required>
          <br/>
          <br/>
          <label for="Catégorie">* Catégorie :</label>
          <select name="Catégorie" size="';
          $conn = db_connect();

          $sql2 = $conn->query("SELECT ID_CATE, NOM from categorie");
          echo $sql2->num_rows. ' "> ';

          $sql2 = $conn->query("SELECT ID_CATE, NOM from categorie");


          while ($row = $sql2->fetch_array(MYSQLI_BOTH)) {
            echo '<option value="'.$row["ID_CATE"].'">'.$row["NOM"].'</option>';
          }
          echo 
          '
          </select>
          <br><br>
          <label for="SC_cat">* Sous-Catégorie :</label>
          <select name="SC_cat" size="4">
          ';

          $sql = $conn->query("SELECT ID_SC, NOM_SC from sous_categorie");


          while ($row = $sql->fetch_array(MYSQLI_BOTH)) {
            echo '<option value="'.$row["ID_SC"].'">'.$row["NOM_SC"].'</option>';
          }

          echo '
          </select>
          <br />
          <hr>

          <br/>
          </tr>
          </table>
          
          <input id="myButton" type="submit" name="submit" value='.$languages_vars['ajouter'].'>
          </form>
          </br>
          <br/>
      </div>
    </center>
';
  }

