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
			<h2>L'intérieur de la ludothèque</h2>
			<p>A l'entrée, une petite étagère vous propose les nouveaux jeux de la ludothèque.<br />
			Vous pouvez louer des jeux de société pour tous les âges, dès 2 ans jusqu'à l'âge de
			  nos aînés mais aussi des jeux d'éveil pour les tout petits dès la naissance. Des jeux 
			  d'imitation (cuisinière, dînette, ferme, bâteau, et d'autres encore), des jeux de
			  construction et techniques, des jeux de patience, de stratégie, des puzzles, 
			  des jeux éducatifs, des jeux pour l'extérieur ainsi que des jeux géants 
			  sont disponible chez nous. </p>

			<h2>Un petit aperçu de la ludothèque</h2>
			<iframe src="/galerie.php?galery=Ludo" frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)"></iframe>

			<h2>Quelques jeux</h2>
			<iframe src="/galerie.php?galery=Jeux" frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)"></iframe>

		</div>
		
		<?php include("footer.php"); ?>
		
	</body>
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
</html>
