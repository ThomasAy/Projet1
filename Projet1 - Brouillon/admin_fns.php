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
  ?>
    <center>
      <div id="menu">
        <p>Il y a <?php echo $result.num_rows; ?> produits</p> 
      </div>
    </center> 
  <?php
  

}

