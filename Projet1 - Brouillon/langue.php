<?php
header("Cache-Control: no-cache"); //vider le cache
$default_lang = 'fr'; //langue par défaut
$dir_lang = 'langues/'; // répertoire des fichiers langues
$extension = '.php'; //extension des fichiers langue

//liste des fichiers langue disponibles
$langues = array('fr', 'en');
$lang = '';

/*si le paramètre "lang" est défini dans l'url et s'il existe dans la liste $lang
 $laang prend la valeur de $_GET['lang']
*/

if (isset($_GET['lang']) && in_array($_GET['lang'], $langues)) {
	$lang = $_GET['lang'];
}

/*sinon vérifier et prendre la valeur du cookie $_COOKIE['lang'] (s'il est défini)
*/

elseif (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], $langues)){
	$lang = $_COOKIE['lang'];
}

//Sauver la valeur de $lang dans le cookie $_COOKIE['lang']

if(!empty($lang)){
	setcookie('lang', $lang);
}

/*quelque soit la langue d'affichage sélectionnée
* inclure le fichier langue par défaut pour ne manquer
*aucune variable
*/

include($dir_lang.$default_lang.$extension);

//vérifier seulement après que le fichier langue existe défini dans $lang existe et l'inclure

if(!empty($lang) && $lang != $default_lang && is_file($dir_lang.$lang.$extension)){
	include($dir_lang.$lang.$extension);
}