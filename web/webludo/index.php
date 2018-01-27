
<html>
<head>
 
 

    
</head>

<body>
    <h1> Page de test pour les jeux</h1>
  <script language="JavaScript">   
function calcHeight()
{
  //récupère la hauteur de la page
  var the_height=
    document.getElementById('the_iframe').contentWindow.
      document.body.scrollHeight;
  //change la hauteur de l'iframe
  document.getElementById('the_iframe').height= the_height + 10 ;
}
</script>      
<iframe width="100%" id="the_iframe"
	onLoad="calcHeight();"
	src="pages/jeux.php"
	scrolling="NO"
	frameborder="0"
	height="1">
</iframe>
    
    
    
</body>
</html>