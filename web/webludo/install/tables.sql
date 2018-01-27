

--
-- Structure de la table `jeux`
--

CREATE TABLE IF NOT EXISTS `jeux` (
  `jeux_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_jeu` varchar(125) NOT NULL,
  `Nom_jeu` varchar(75) NOT NULL,
  `Editeur` varchar(50) NOT NULL,
  `Prix` decimal(10,2) NOT NULL,
  `Prix_location` decimal(10,2) NOT NULL,
  `Prix_caution` decimal(10,2) NOT NULL,
  `Etat` varchar(10) NOT NULL,
  `Categorie` varchar(75) NOT NULL,
  `Age_min` varchar(2) NOT NULL,
  `Age_max` varchar(2) NOT NULL,
  `Jeux_perso` varchar(25) NOT NULL,
  `ESAR_principale` varchar(50) NOT NULL,
  `ESAR_secondaire` varchar(50) NOT NULL,
  `Abo_plus` varchar(1) NOT NULL,
  `Date_achat` date NOT NULL,
  `Contenu` longtext NOT NULL,
  `Resume` text NOT NULL,
  `Liens` varchar(256) NOT NULL,
  `Terme` varchar(256) NOT NULL,
  `Langue` varchar(20) NOT NULL,
  `Nbre_joueurs` varchar(20) NOT NULL,
  `Duree` varchar(20) NOT NULL,
  `Valeur_Specifique` tinyint(1) NOT NULL,
  PRIMARY KEY (`jeux_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1210 ;

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `Locations_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_jeu` varchar(10) NOT NULL,
  `IDMembres` int(11) NOT NULL,
  `Date_location` date NOT NULL,
  `Date_retour` date NOT NULL,
  `Date_rendu` date NOT NULL,
  `Nom_jeu` varchar(125) NOT NULL,
  `Nom` varchar(125) NOT NULL,
  `Prenom` varchar(125) NOT NULL,
  `Email` varchar(125) NOT NULL,
  PRIMARY KEY (`Locations_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=814 ;
