 <!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
	<link rel="icon" type="png" href="images/favicon.png"> <!-- ajout d'une icône sur l'onglet -->
<link rel="stylesheet" href="style.css" />
<title>Ludothèque Bagnes</title> <!-- ce qui sera écrit sur l'onglet -->
</head>
<body>
	
	<?php if (isset($_GET['galery'])) : ?>
		<div id="bloc_page"> <!-- ensemble de la page -->
			<div class="modal-content">
			<?php
			$path = "images/" .  $_GET['galery'] . "/*{jpg, png}";
			$files = glob($path, GLOB_BRACE);
			$i = 0;
			$total = count($files);
			foreach($files as $file) {
			?>
				<?php $i++; ?>
				<div class="mySlides">
					<div class="numbertext"><?php echo $i?> / <?php echo $total ?></div>
					<img class=demo src=<?php echo $file ?> style="width:100%; margin=auto" alt=<?php echo '"' . strtr(pathinfo($file)['filename'], '_', ' ') . '"' ?>>
				</div>
			<?php
			}
			?>
			    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			    <a class="next" onclick="plusSlides(1)">&#10095;</a>

			    <div class="caption-container">
			      <p id="caption"></p>
			    </div>
		</div>
	    <?php endif; ?>
	
</body>
<script>
document.onkeydown = keyPress;
function keyPress(e) {

    e = e || window.event;

    if (e.keyCode == '37') {
       plusSlides(-1)
       // left arrow
    }
    else if (e.keyCode == '39') {
       plusSlides(1)
       // right arrow
    }

}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</html>
