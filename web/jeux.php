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
				<iframe src="/webludo/pages/locations.php" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="100%" height="200"></iframe>
				<iframe src="/webludo/pages/jeux.php" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="100%" height="1100"></iframe>
		</div>
		<?php include("footer.php"); ?>
		
	</body>
</html>