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
			<h2 id="Equipe">L'équipe <img src="images/equipe.png" id="icones"> </h2>
			<p>Christine, Christelle, Séverine, Joëlle J., Joëlle D., Margot, Isabelle et Maud vous accueilleront avec plaisir et se réjouissent de votre prochaine visite.<br />
			Si vous désirez participer à la vie de la ludothèque avec nos bénévoles, soyez les BIENVENUS et faites-le nous <a href="contacts.html">savoir</a>!</p>
		
	  
	 	 <div id ="images"> <!-- ajout de figures avec la légende correspondante -->
				<figure>
					<img src="images/La_responsable.jpg" width="128" height="192" alt="La responsable" title="La responsable"><br />
					<figcaption>La responsable,<br /> Christelle Giroud</figcaption>
				</figure>
				<figure>
					<img src="images/Les_aides.jpg" width="500" height="282.8" alt="Les aides" title="Les aides">
					<figcaption>Les aides de la ludo</figcaption>
				</figure>
		  		 <figure>
					<img src="images/Christine.jpg" width="90" height="154.3" alt="Christine" title="Christine"><br />
				   <figcaption>Christine</figcaption>
				</figure>
		 </div>
		 </div>
		
		<?php include("footer.php"); ?>
		
	</body>
</html>
