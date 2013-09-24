<?php
	include 'functions.php';
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

$reponse = $bdd->query('SELECT U.Nom, U.Prenom, U.Num_Tel, U.Mail, TU.NOM_TYPE, C.NOM_CIVI 
						from user U, CIVILITE C, TYPE_USER TU 
						WHERE U.ID_CIVI = C.ID_CIVI
						AND U.ID_TYPE = TU.ID_TYPE_USER');
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Taxe numéro</strong> : <?php echo $donnees['ID_TAXE']; ?><br />
    Pour le pays suivant : "<?php echo $donnees['PAYS']; ?>", la taxe applicable est à <?php echo $donnees['RATE']; ?> % !<br />
   </p>
<?php
}
 
$reponse->closeCursor();

?>



	
	
<body>

	<article>
	
	<span id="sl_play" class="sl_command">&nbsp;</span>
	<span id="sl_pause" class="sl_command">&nbsp;</span>
	<span id="sl_i1" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i2" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i3" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i4" class="sl_command sl_i">&nbsp;</span>
	
	
	<section id="slideshow">
	
		
		<a class="play_commands pause" href="#sl_pause" title="Maintain paused">Pause</a>
		<a class="play_commands play" href="#sl_play" title="Play the animation">Play</a>
		
		<div class="container">
			<div class="c_slider"></div>
			<div class="slider">
				<figure>
					<img src="img/dummy-640x310-1.jpg" alt="" width="640" height="310" />
					<figcaption>Le gugus !</figcaption>
				</figure><!--
				--><figure>
					<img src="img/dummy-640x310-2.jpg" alt="" width="640" height="310" />
					<figcaption>Vous propose</figcaption>
				</figure><!--
				--><figure>
					<img src="img/dummy-640x310-3.jpg" alt="" width="640" height="310" />
					<figcaption>Cette solution </figcaption>
				</figure><!--
				--><figure>
					<img src="img/dummy-640x310-4.jpg" alt="" width="640" height="310" />
					<figcaption> Pour mettre les titres des articles</figcaption>
				</figure>
			</div>
		</div>
		
		<span id="timeline"></span>
		
		<ul class="dots_commands"><!--
			--><li><a title="Show slide 1" href="#sl_i1">Slide 1</a></li><!--
			--><li><a title="Show slide 2" href="#sl_i2">Slide 2</a></li><!--
			--><li><a title="Show slide 3" href="#sl_i3">Slide 3</a></li><!--
			--><li><a title="Show slide 4" href="#sl_i4">Slide 4</a></li>
		</ul>
		
	</section>
	

	
	</article>

	
</body>
</html>