SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  EbayECE
--

-- --------------------------------------------------------

--
-- Structure de la table Acheteur
--

CREATE TABLE Acheteur (
  ID int(11) NOT NULL,
  Nom varchar(255) NOT NULL,
  Prenom varchar(255) NOT NULL,
  Email varchar(255) NOT NULL,
  Adresse1 varchar(255) NOT NULL,
  Adresse2 varchar(255) NOT NULL,
  CodePostal int(11) NOT NULL,
  Pay varchar(255) NOT NULL,
  Tel int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table Items
--

CREATE TABLE Items (
  Ref int(11) NOT NULL,
  Nom varchar(255) NOT NULL,
  Description text NOT NULL,
  Images varchar(255) NOT NULL,
  Categorie varchar(255) NOT NULL,
  TypedeVente int(11) NOT NULL,
  IDVendeur int(11) NOT NULL,
  Prix int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table Payement
--

CREATE TABLE Payement (
  IDclient int(11) NOT NULL,
  Typecart varchar(255) NOT NULL,
  Numero int(16) NOT NULL,
  Nom int(255) NOT NULL,
  Date varchar(255) NOT NULL,
  Crypto int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table Vendeur
--

CREATE TABLE Vendeur (
  ID int(11) NOT NULL,
  Nom varchar(255) NOT NULL,
  Prenom varchar(255) NOT NULL,
  Email varchar(255) NOT NULL,
  MdP varchar(255) NOT NULL,
  Adresse varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;