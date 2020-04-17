-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 avr. 2020 à 10:11
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eceebay`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Adresse1` varchar(255) NOT NULL,
  `Adresse2` varchar(255) NOT NULL,
  `CodePostal` int(11) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Tel` int(11) NOT NULL,
  `MdP` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`ID`, `Nom`, `Prenom`, `Email`, `Adresse1`, `Adresse2`, `CodePostal`, `Pays`, `Tel`, `MdP`) VALUES
(1, 'hamon', 'yjtf', 'hamon', '97 AVENUE CHARLES DE GAULLE', 'gh', 92200, 'UGUG', 262452, 'hamon'),
(2, 'valentin', 'pierre', 'guisnet.valou@free.fr!', '125 rue de Longchamps', 'chez moi', 75116, 'france', 123456, ''),
(3, 'fgf', 'yjtf', 'jtyj', '97 AVENUE CHARLES DE GAULLE', 'fgh', 92200, 'UGUG', 131431, ''),
(4, 'valentin', 'valentin', 'valentin', 'azeda', 'azedaze', 75210, 'france', 6546564, 'valentin');

-- --------------------------------------------------------

--
-- Structure de la table `encheres`
--

DROP TABLE IF EXISTS `encheres`;
CREATE TABLE IF NOT EXISTS `encheres` (
  `IDenchere` int(11) NOT NULL AUTO_INCREMENT,
  `IDvendeur` int(11) NOT NULL,
  `ddebut` datetime DEFAULT NULL,
  `dfin` datetime DEFAULT NULL,
  `IDitem` int(11) NOT NULL,
  `Prixmin` int(11) NOT NULL,
  `Prixactuel` int(11) NOT NULL,
  PRIMARY KEY (`IDenchere`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `encheres`
--

INSERT INTO `encheres` (`IDenchere`, `IDvendeur`, `ddebut`, `dfin`, `IDitem`, `Prixmin`, `Prixactuel`) VALUES
(1, 2, '2020-04-01 00:00:00', '2020-04-29 00:00:00', 5, 7, 0),
(5, 5, '2020-04-15 05:21:21', '2020-04-30 08:24:31', 5, 100, 500);

-- --------------------------------------------------------

--
-- Structure de la table `encherisseur`
--

DROP TABLE IF EXISTS `encherisseur`;
CREATE TABLE IF NOT EXISTS `encherisseur` (
  `IDenchere` int(11) NOT NULL,
  `IDachteur` int(11) NOT NULL,
  `Encheremax` int(11) NOT NULL,
  `enchereactuelle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `encherisseur`
--

INSERT INTO `encherisseur` (`IDenchere`, `IDachteur`, `Encheremax`, `enchereactuelle`) VALUES
(1, 1, 200, 7);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `Ref` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Images` varchar(255) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `TypedeVente` varchar(255) NOT NULL,
  `IDVendeur` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  PRIMARY KEY (`Ref`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`Ref`, `Nom`, `Description`, `Images`, `Categorie`, `TypedeVente`, `IDVendeur`, `Prix`) VALUES
(1, 'azedadez', 'addez', 'caca', 'Ferraille ou Tresor', 'Enchere', 1, 500),
(2, 'daezdaez', 'dezdaezdaezdaez', 'caca', 'Ferraille ou Tresor', 'Achat immediat', 1, 125),
(3, 'azdeadze', 'dezdazaz', 'caca', 'Ferraille ou Tresor', 'Achat immediat', 0, 120),
(4, 'azde', 'dazaezd', 'caca', 'Ferraille ou Tresor', 'Achat immediat', 0, 100),
(5, 'azdeadz', 'zdaeazdedaez', 'caca', 'Ferraille ou Tresor', 'Enchere', 0, 100),
(6, 'adzezed', 'dezadez', 'caca', 'Bon pour le musee', 'Enchere', 0, 100),
(7, 'adez', 'ezdadez', 'caca', 'Ferraille ou Tresor', 'Enchere', 0, 100),
(8, 'addaze', 'dzeadeza', '1.jpeg', 'Bon pour le musee', '3', 0, 100),
(9, 'addaze', 'dzeadeza', '1.jpeg', 'Bon pour le musee', '3', 0, 100),
(10, 'addaze', 'dzeadeza', '10.jpeg', 'Bon pour le musee', '3', 0, 100),
(11, 'addaze', 'dzeadeza', '10.jpeg', 'Bon pour le musee', '3', 0, 100),
(12, 'azeadazdeazdead', 'adze', '12.jpeg', 'Ferraille ou Tresor', '2', 0, 201),
(13, 'azeadazdeazdead', 'adze', '12.jpeg', 'Ferraille ou Tresor', '2', 0, 201),
(14, 'nfhhn', 'nhgfn', '14.jpeg', 'Accessoire VIP', '3', 0, 1999),
(15, 'nfhhn', 'nhgfn', '15.jpeg', 'Accessoire VIP', '3', 0, 1999),
(16, 'nfhhn', 'nhgfn', '16.jpeg', 'Accessoire VIP', '3', 0, 1999),
(17, 'azd', 'daezdez', '17.jpeg', 'Ferraille ou Tresor', '3', 0, 100),
(18, 'daez', 'daez', '18.jpeg', 'Ferraille ou Tresor', '3', 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

DROP TABLE IF EXISTS `payement`;
CREATE TABLE IF NOT EXISTS `payement` (
  `IDclient` int(11) NOT NULL,
  `Typecart` varchar(255) NOT NULL,
  `Numero` int(16) NOT NULL,
  `Nom` int(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Crypto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `payement`
--

INSERT INTO `payement` (`IDclient`, `Typecart`, `Numero`, `Nom`, `Date`, `Crypto`) VALUES
(4, 'visa', 65465, 213, '08/1999', 789);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MdP` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID`, `Nom`, `Prenom`, `Email`, `MdP`, `Adresse`) VALUES
(1, 'valentin', 'valentin1', 'valentin', 'valentin', 'valentinadresse');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
