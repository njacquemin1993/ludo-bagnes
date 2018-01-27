<?php

/*
 * ========================
 * configuration de webludo
 * ========================
 */
// -- sur seveur --
//--------------------------------------------------------------------------
$password = "export_webludo"; // mot de passe pour la connexion a la mise a jour des données
$serveurDonnees = "nkdz.myd.infomaniak.com"; // adresse du serveur de base de donnees
$baseDonnees = "nkdz_webludo"; // nom de la base de données
$baseUtilisateur = "nkdz_joellej"; // utilisateur de la base de données
$baseMotpasse="nicolas93"; // mot de passe de la base de données
$devise ="Frs";
$emailLudo ="ludotheque@bagnes.ch";
//


//******************************************************************************
// -- ne pas modifier ! --
$fichierZip = "web.zip";
$dossierTemp = "tmp";
$dossierImages ="img_jeux"; 
$dossierTransfert = "transfert";

//-- connexion MySQL --
try{
$dns = "mysql:host=".$serveurDonnees.";dbname=".$baseDonnees;
$utilisateur = $baseUtilisateur;
$motDePasse = $baseMotpasse;
$connection = new PDO( $dns, $utilisateur, $motDePasse );
} catch ( Exception $e ) {
    // erreur de connexion a la base de données 
  echo "Connection à MySQL impossible : ", $e->getMessage();
  die();
}
?>
