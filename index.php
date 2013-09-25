<?php
	include 'functions.php';
	include 'Projet1 - Brouillon/order_fns.php';
?>
<?php
	title("Accueil");
?>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=GHL', 'admin', 'caluire et cuire');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT U.Nom, U.Prenom, U.Num_Tel, U.Mail, TU.NOM_TYPE "type", C.NOM_CIVI "Civ" 
						from user U, CIVILITE C, TYPE_USER TU 
						WHERE U.ID_CIVI = C.ID_CIVI
						AND U.ID_TYPE = TU.ID_TYPE_USER');
?>
<p>
	Il y a <?php echo mysql_num_rows($reponse);?> utilisateur(s), et vous êtes connecté sur l'adresse <?php echo $_SERVER['REMOTE_ADDR']; ?>
</p>
<?php
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Utilisateur</strong> : <?php echo $donnees['Civ'] . " " . $donnees['Nom'] . " " . $donnees['Prenom']; ?><br />
    Il est joignable au : "<?php echo $donnees['Num_Tel']; ?>", ou par mail &agrave; : <?php echo $donnees['Mail']; ?>  !<br />
    D'ailleurs c'est un utilisateur de type : <?php echo $donnees['type']; ?> <br />
   </p>
<?php
}
 
$reponse->closeCursor();

?>

<!-- pour calculer les numéros de commande -->
<?php echo cmd_num();?>



	
	
<body>

	

	
</body>
</html>