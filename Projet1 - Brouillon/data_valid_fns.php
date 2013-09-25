<?php

function filled_out($form_vars){
	//Teste que chaque champ du formulaire est bien rempli et a une valeur
	foreach($form_vars as $key=>$value){
		if(!isset($key) || $value =''){
			return false;
		}
	}
	return true;
}

 ?>