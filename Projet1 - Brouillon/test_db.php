<?php
include('db_fns.php');
function get_books($catid){
	//Récupère les livres dans la catégorie correspondante dont l'ID est passé en paramètres
	if((!$catid) || $catid=''){
		return false;
	}
	
	$conn = db_connect();
	$query = "select * from books where catid = '".$catid."'";
	$result = @$conn->query($query);
	if(!$result){
		return false;
	}
	$num_books = $result->num_rows;
	echo $num_books;
	if($num_books == 0){
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}

function display_books($book_array){
	if(!is_array($book_array)){
		echo "No books currently available in this category";
	} else {
		//Create table
		echo "<table width=\"100%\" border=\"0\">";
		
		//crée une ligne de tableau pour chaque livre
		foreach($book_array as $row){
			$url = "show_book.php?isbn=".$row['isbn'];
			echo "<tr><td>";
			if(@file_exists("images/".$row['isbn'].".jpg")){
				$title = "<img src=\"images/".$row['isbn'].".jpg\" style=\"border: 1px solid black\" />";
				do_html_url($url, $title);
			}
			else{
				echo "&nbsp;";
			}
			echo "</td></tr>";
		}
		
		echo "</table>";
	}
	echo "<hr/>";
}
$books = get_books(1);
display_books($books);
