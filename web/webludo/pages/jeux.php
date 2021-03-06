<!doctype html>
<?php

include_once '../config.php';
include_once '../functions.php';
$recherche = $_GET['SAI_recherche']; 
$fiche = urldecode($_GET["fiche"]);
$p=$_GET['p'];


?>

<html lang="fr">
    <head>
	 <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="all"/>
    </head>
<body>

<?php


if($fiche==""){
    
// -- afichage de la liste des jeux -- 

if($recherche !=""){
    $filtre=""; 
}else{
    $filtre = "";
}

// -- nombre total des jeux ---
$sql = $connection->prepare("SELECT COUNT(*)AS Total_Jeux FROM jeux WHERE Nom_jeu LIKE :recherche OR Numero_jeu = :numero "); 
$sql->execute(array(':recherche' => "%".$recherche."%", ':numero' => $recherche));
$sql->setFetchMode(PDO::FETCH_OBJ);

$maxJeux = $sql->fetch();
$totalJeux = $maxJeux->Total_Jeux;
$epp = 15; // nombre de jeux  à afficher par page (entries per page)
$nbPages = ceil($totalJeux/$epp); // calcul du nombre de pages $nbPages (on arrondit à l'entier supérieur avec la fonction ceil())



// Récupération du numéro de la page courante depuis l'URL avec la méthode GET
// S'il s'agit d'un nombre on traite, sinon on garde la valeur par défaut : 1
$current = 1;
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
    $page = intval($_GET['p']);
    if ($page >= 1 && $page <= $nbPages) {
	// cas normal
	$current=$page;
    } else if ($page < 1) {
	// cas où le numéro de page est inférieure 1 : on affecte 1 à la page courante
	$current=1;
    } else {
	//cas où le numéro de page est supérieur au nombre total de pages : on affecte le numéro de la dernière page à la page courante
	$current = $nbPages;
    }
}

// $start est la valeur de départ du LIMIT dans notre requête SQL (dépend de la page courante)
$start = ($current * $epp - $epp);

$sql = $connection->prepare("SELECT Numero_jeu, Nom_jeu,Categorie FROM jeux WHERE Nom_jeu LIKE :recherche OR Numero_jeu = :numero ORDER BY Numero_jeu LIMIT $start, $epp"); 
$sql->execute(array(':recherche' => "%".$recherche."%", ':numero' => $recherche));
$sql->setFetchMode(PDO::FETCH_OBJ);

$pagination =  paginate('jeux.php', '?p=', $nbPages, $current,$recherche); 

echo $pagination."</br>"; 
// Nous traitons les résultats en boucle
?>

<table id="jeux" width='100%'>
    <thead>
	<tr>
	    <th>Numéro</th>
	    <th>Nom du jeu</th>
	    <th>Catégorie</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <td colspan="3">
		<form name="FORM_recherche" action="jeux.php">
		    Filtrer par nom ou numéro de jeu : 
		    <input type="text" name="SAI_recherche" value="<?php echo $recherche ?>" />
		    <input type="submit" value="Rechercher " name="BTN_recherche" />
		       &nbsp; &nbsp;&nbsp; <a href='jeux.php'>Annuler le filtre</a>
	        </form>
	    </td>
	</tr>
<?php
while( $enregistrement = $sql->fetch() )
{
  // Affichage des jeux en table  : numero / nom / editeur / prix location 
    
    echo "<tr>"; 
	echo ("<td width='45px'><a href='jeux.php?fiche=".urlencode($enregistrement->Numero_jeu)."&p=$p&SAI_recherche=".urlencode($recherche)."'>".$enregistrement->Numero_jeu."</a></td>");
	echo ("<td align='left'>".$enregistrement->Nom_jeu."</td>");
	echo ("<td align='left' width='20%'>".$enregistrement->Categorie."</td>\n");
    
    echo "</tr>"; 

}

?>
    </tbody>
</table>
<?php

echo $pagination."</br>"; 

}else{

    // -- afficher la fiche du  jeu --
 
    $sql = $connection->prepare("SELECT * FROM jeux WHERE Numero_jeu=:num_jeu"); 
    $sql->execute(array(':num_jeu' => $fiche));
    $sql->setFetchMode(PDO::FETCH_OBJ);
    $enregistrement = $sql->fetch() ;
  
    $lienRetour = "[ <a href='jeux.php?p=".$p."&SAI_recherche=".$recherche."'>retour à la liste des jeux</a> ]"; 
    
    
?>
    </br>
    
    <table width='99%'>
	    
    <thead>
	<tr>
	    <th colspan="2">
		<?php echo ($enregistrement->Nom_jeu); ?>  
	    </th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <td colspan='2'id="table_centree">
		<?php
		   echo  $lienRetour;
		?>
	    </td>
	</tr>	
	<tr>
	    <td width="15%">
		Numéro  : 
	    </td>
	    <td align="left">
		<strong><?php echo ($enregistrement->Numero_jeu); ?></strong>
	    </td>
	</tr>
	<tr>
	    <td>
		Nom  : 
	    </td>
	    <td align="left">
		<strong><?php echo ($enregistrement->Nom_jeu); ?></strong>
	    </td>
	</tr>	
	
	<tr>
	    <td>
		Editeur  : 
	    </td>
	    <td align="left">
		<?php echo ($enregistrement->Editeur);  ?>
	    </td>
	</tr>
	
	
	<tr>
	    <td>
		Prix de location  : 
	    </td>
	    <td align="left">
		<?php echo $enregistrement->Prix_location." ".$devise; ?>
	    </td>
	</tr>

	<tr>
	    <td>
		Prix caution  : 
	    </td>
	    <td align="left">
		<?php echo $enregistrement->Prix_caution." ".$devise; ?>
	    </td>
	</tr>
	
	<tr>
	    <td>
		Catégorie  : 
	    </td>
	    <td align="left">
		<?php echo ($enregistrement->Categorie); ?>
	    </td>
	</tr>
	
	<tr>
	    <td>
		Age conseillé  : 
	    </td>
	    <td align="left">
		<?php echo "de ".$enregistrement->Age_min." à ".$enregistrement->Age_max." ans"; ?>
	    </td>
	</tr>
	
		<tr>
	    <td valign='top'>
		Résumé : 
	    </td>
	    <td align="left">
		<?php echo nl2br(wordwrap($enregistrement->Resume, 125)); ?>
	    </td>
	</tr>	
	<tr>
	    <td valign='top'>
		Contenu : 
	    </td>
	    <td align="left">
		<?php echo nl2br(wordwrap($enregistrement->Contenu, 125)); ?>
	    </td>
	</tr>	
	
	
	<tr>
	    <td valign='top'>
		Image : 
	    </td>    
            <td align='center' >
	
		
		<?php
		$image = "../".$dossierImages."/".trim($enregistrement->Numero_jeu).".jpg"; 
		if(file_exists($image)) {
                    echo "<img style='max-width: 100%' src='$image'>"; 
		}else{
                    echo "<img src='../img_non_dispo.jpg'>";
                }
		?>

	    </td>

	</tr>	
	
	<?php
	    
        $sql = $connection->prepare("SELECT Date_retour FROM locations WHERE Numero_jeu=:num_jeu"); 
        $sql->execute(array(':num_jeu' => $enregistrement->Numero_jeu));
        $sql->setFetchMode(PDO::FETCH_OBJ);

	$locations = $sql->fetch() ;
	$date_retour = explode("-",$locations->Date_retour);
	?>
	<tr>
	    <td>
		Location  : 
	    </td>
	    <td align="left">
		<?php 
		    if($locations->Date_retour==""){
			echo "Ce jeu est disponible à la ludothèque";
		    }else{
			 echo "Retour prévu le ".$date_retour[2]."/".$date_retour[1]."/".$date_retour[0];
		    }
		    
			    
		?>
	    </td>
	</tr>		
	
	<tr>
	    <td colspan='2'id="table_centree">
		<?php
		   echo  $lienRetour;
		?>
	    </td>
	</tr>
	
    </tbody>
    
    
    </table>
</br>
</br>

    
<?php

}

?>

</body>
</html>

