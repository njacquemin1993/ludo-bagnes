<?php

/*
 * fichier de mise a jour / installation des données
 */


include_once 'config.php';
include_once 'functions.php';


$pass = $_GET['pass'];


// -- controle du mot de passe --
if($pass!=$password){
    // mauvais mot de passe 
    echo "mot de passe incorrect !";
    die();
}

// -- vérification du fichier zip --
if(file_exists($dossierTransfert."/".$fichierZip)==false){
    // pas de fichier zip 
    echo "impossible de trouver le fichier de transfert !";
    die(); 
}

// -- extraire le fichier dans le répertoire temporaire --
if(unzip_file($dossierTransfert."/".$fichierZip, $dossierTemp)==false){
    // extraction des fichier dans le $dossierTemp 
    echo "Impossible d'extraire les fichiers !";
    die();
}

// -- utilisation du fichier delete.sql
if(file_exists($dossierTemp."/delete.sql")){
    // faire les suppressions en premier
    $SQL_delete = file_get_contents($dossierTemp."/delete.sql");
    $connection->query($SQL_delete);
    echo "Execution delete.sql ==> OK</BR>";
}

// -- utilisation du fichier upadate.sql
if(file_exists($dossierTemp."/update.sql")==true){

    $SQL_update = file_get_contents($dossierTemp."/update.sql");
   // echo $SQL_update;    
    $nb = $connection->query($SQL_update);
    echo "Execution update.sql ==> OK</BR>";
}

// -- utilisation du fichier locations.sql
if(file_exists($dossierTemp."/locations.sql")!=false){
    $SQL_locations = file_get_contents($dossierTemp."/locations.sql");
   // echo $SQL_update;    
    $nb = $connection->query($SQL_locations);
    echo "Execution locations.sql ==> OK</BR>";
}



// -- déplacer les images vers le rep des images --
$dir = opendir($dossierTemp); 
while($file = readdir($dir)) {
    // uniquement les images jpg
    $extension=strrchr($file,'.');
    if($extension ==".jpg"){
	// copier dans le répertoire des images des jeux
	copy($dossierTemp."/".$file, $dossierImages."/".$file);
    }
}
closedir($dir); 
     echo "Deplacement des images eventuelles ==> OK</BR>";

// --- vider le répertoire temporaire --
clearFolder($dossierTemp) ; 
echo "Supression des fichiers temporaires ==> OK</br>"; 
// -- effacer le fichier zip des données --

unlink($dossierTransfert."/".$fichierZip);
echo "Supression du fichier de transfert ==> OK</br>"; 
?>
