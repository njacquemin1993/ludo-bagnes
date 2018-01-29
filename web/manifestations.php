<!DOCTYPE html>
<html>

	<head>
        <meta charset="utf-8" />
		<link rel="icon" type="png" href="images/favicon.png"> <!-- ajout d'une icône sur l'onglet -->
        <link rel="stylesheet" href="style.css" />
        <title>Ludothèque Bagnes</title> <!-- ce qui sera écrit sur l'onglet -->
	</head>
	<body>
	      
		<?php include("header.php"); ?>
		
		<div id="bloc_page"> <!-- ensemble de la page -->
			<h2>Nos Manifestations</h2>
		
		  <p/>
		  <p>A l'occasion de Carnaval, vous pouvez venir louer des costumes pour vos enfants!<br/>
			Tarifs: <ol> 
		  <li>gratuit pour les membres ayant un abonnement à 80.-</li>
		  <li> 5.- pour les membres ayant un abonnement à 25.-</li>
		  <li>10.- pour les non-membres</li>
				</ol>
		  
		  <div id ="images"> <!-- ajout de figures avec la légende correspondante -->
				<figure>
					<img src="images/Princesses.jpg" width="384" height="256" alt="Princesses" title="Princesses"><br />
					<figcaption> Les princesses</figcaption>
				</figure>
				<figure>
					<img src="images/Animaux.jpg" width="384" height="256" alt="Animaux" title="Animaux">
					<figcaption>Les Animaux</figcaption>
				</figure>
		  		 <figure>
					<img src="images/Heros.jpg" width="384" height="256" alt="Heros" title="Heros"><br />
				   <figcaption>Les super héros</figcaption>
				</figure>
			    <figure>
					<img src="images/Adulte.jpg" width="384" height="256" alt="Adulte" title="Adulte"><br />
				   <figcaption>Pour les plus grands</figcaption>
				</figure>
		 </div>
		  
		  <p> Notre ludothèque fêtera ses 10 ans le Samedi 28 Avril 2018 à l'Ecole de Villette<br/>
			Plus d'infos à venir... Réservez déjà la date!
			<p/>
		  
		  
		  
		</div>
		
		<?php include("footer.php"); ?>
		
	</body>
</html>