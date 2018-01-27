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
			<h2 id="Horaires"> Les Horaires <img src="images/horloge.png" id="icones"> </h2>
			<p>Ouverture durant l'année scolaire :<br />
				mercredi de 16h00 à 18h30<br />
				vendredi de 16h00 à 18h30<br />
			  samedi matin de 9h à 11h30 <br/>
			  <strong>Fermé</strong> pendant les congés et les vacances scolaires, 
			  selon calendrier ci-dessous!<p/>
		  
		 
			  <p> Durant les vacances d'été ,<br/>
			   <strong>ouverture le mercredi après-midi de 16h à 18h30</strong><br/>
			  
			</p>
		  <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=500&amp;wkst=2&amp;hl=fr&amp;bgcolor=%23cccccc&amp;src=p89aqqad171n5n66c6qfulr2ds%40group.calendar.google.com&amp;color=%23711616&amp;ctz=Europe%2FZurich" style="border-width:0" width="100%" height="500" frameborder="0" scrolling="no"></iframe>
		</div>
		
		<?php include("footer.php"); ?>
		
	</body>
</html>