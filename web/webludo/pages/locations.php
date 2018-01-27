<!doctype html>
<?php
include_once '../config.php';
include_once '../functions.php';
$email = $_POST['SAI_email'];

?>
<script>
    function valider(){
	var adresse = document.FORM_locations.SAI_email.value;
	if(adresse==""){
	    alert("Vous devez entrer une adresse !");
	    return false;
	    
	}
	if(isEmail(adresse)==false){
	    alert("L'adresse semble incorrecte !");
	    return false;	    
	}
	
    }
</script>    
<html lang="fr">
    <head>
	 <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="all"/>
    </head>

    
<body>
    <?php
	if($email==""){
    ?>
    <table width="500">
    <thead>
	<tr>
	    <th>Récupérer la liste de ses locations en cours</th>

	</tr>
    </thead>
    <tbody>
    <tr>	
	  <td>
		Entrez ci-dessous votre adresse e-mail, vous recevrez ainsi la liste
		de vos locations en cours par retour de courrier électronique.</br>
		</br>
		
		<form name="FORM_locations" action="locations.php" method="POST" onSubmit="return valider();">
		    <input type="text" name="SAI_email" value="" size="50" />
		    <input type="submit" value="Envoyer" name="BTN_envoi" />
		</form>
	      
	  </td>

    </tr>
    </table>
    
    <?php
    
	}else{
	    
    //-- création et envoi du courrier avec les locations en cours --
	    
	$sql="SELECT  * FROM locations WHERE Email LIKE'%".$email."%' ORDER BY Numero_jeu";
	
	$sth = $connection->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	if(empty($result)){
	    // -- pas de jeux en location --
	    
	    $msg="Aucun jeu n'est lié à cette adresse e-mail ou 'e-mail incorrect "; 
	    
	}else{
	    // -- envoyer le mail pour le membre --
	    
	    
	    foreach($result as $ligne){
		
		$d = explode("-",$ligne['Date_retour']);
		$dateretour = $d[2]."/".$d[1]."/".$d[0];
		
		$liste.= "N° : ".$ligne['Numero_jeu']." -- ".utf8_encode($ligne['Nom_jeu'])." -- ";
		$liste.="retour prévu le ".$dateretour."\n";
	    }
	    
	    
	     $txt.="Bonjour,\n\nVoici la liste de vos jeux à rendre à la ludothèque :\n\n\n";
	
	    
	    $txt.="Compte utilisateur n° : ".$ligne["IDMembres"]."\n";
	    $txt.="Membre : ".$ligne["Nom"]." ".$ligne["Prenom"]."\n";
	    
	   
	    $txt.="==========================================================\n";
	    $txt.=$liste."";
	    $txt.="==========================================================\n\n";
	    $txt.="Cette liste est fournie à titre informatif et ne peut être utilisée en cas de litige\n\n";
	    $txt.="Vous trouverez toutes les informations concernant nos horaires d'ouverture sur notre site Internet\n\n";
	    $txt.="Amitiés ludiques\n\n";
	    $txt.="Votre ludothèque\n";
	    
	    
	   // echo nl2br($txt);
	    
	    
	    // -- envoi du mail --
	    $headers ='From: "Votre ludotheque"<'.$emailLudo.'>'."\n"; 
	    if(mail($email,"Liste de vos jeux à rendre", $txt, $headers)){
		
		    $msg = "Un e-mail à été envoyé à l'adresse ".$email." avec la liste de vos jeux.";
	    }else{
		
		    $msg="Erreur - impossible d'envoyer l'e-mail, merci de contacter la ludothèque";
	    }
	       
	}
	
?>
    
    </br>
    </br>
    
	    <table width="500">
    <thead>
	<tr>
	    <th>Récupérer la liste de ses locations en cours</th>

	</tr>
    </thead>
    <tbody>
    <tr>	
	  <td>
	      </br>
		<?php echo $msg; ?>
		</br>
		</br>
		
		
	
	      
	  </td>

    </tr>
    </table>
	
<?php
 
}
	
?>
    
	

</body>
</html>
