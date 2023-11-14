-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2021 at 01:20 AM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-47+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_gestion_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat`
--

CREATE TABLE `achat` (
  `id_achat` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `code_achat` varchar(200) NOT NULL,
  `num_facture` varchar(200) DEFAULT NULL,
  `date_achat` date NOT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `tva` double NOT NULL DEFAULT '20',
  `frais` double NOT NULL DEFAULT '0',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `achat`
--
DELIMITER $$
CREATE TRIGGER `TRI_ACHAT` BEFORE INSERT ON `achat` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_ACHAT` BEFORE UPDATE ON `achat` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `achat_details`
--

CREATE TABLE `achat_details` (
  `id_achat_details` int(11) NOT NULL,
  `id_achat` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `prix_achat` double NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `achat_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_ACHAT_DETAILS` BEFORE INSERT ON `achat_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_ACHAT_DETAILS` BEFORE UPDATE ON `achat_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `id_achat` int(11) DEFAULT NULL,
  `id_client_cmd` int(11) DEFAULT NULL,
  `id_devis` int(11) DEFAULT NULL,
  `id_vente` int(11) DEFAULT NULL,
  `id_avoir` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `ice` varchar(200) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `ville` varchar(200) DEFAULT NULL,
  `pays` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `adresse`
--
DELIMITER $$
CREATE TRIGGER `TRI_ADRESSE` BEFORE INSERT ON `adresse` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_ADRESSE` BEFORE UPDATE ON `adresse` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `auto_code`
--

CREATE TABLE `auto_code` (
  `reference` varchar(200) NOT NULL,
  `year` int(11) NOT NULL DEFAULT '2000',
  `next_value` int(11) NOT NULL DEFAULT '1',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto_code`
--

INSERT INTO `auto_code` (`reference`, `year`, `next_value`) VALUES
('A', 2021, 1),
('BA', 2021, 1),
('BL', 2021, 1),
('C', 2021, 2),
('CC', 2021, 1),
('CF', 2021, 1),
('D', 2021, 1),
('DM', 2021, 1),
('F', 2021, 1),
('INVOICE', 2021, 1),
('IV', 2021, 1),
('PD', 2021, 1);

--
-- Triggers `auto_code`
--
DELIMITER $$
CREATE TRIGGER `TRI_AUTO_CODE` BEFORE INSERT ON `auto_code` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_AUTO_CODE` BEFORE UPDATE ON `auto_code` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `avance`
--

CREATE TABLE `avance` (
  `id_avance` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_avance` date NOT NULL,
  `montant` double NOT NULL,
  `methode` int(11) NOT NULL COMMENT '1=Espece, 2=Cheque, 3=Effet, 4=Virement',
  `description` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `avance`
--
DELIMITER $$
CREATE TRIGGER `TRI_AVANCE` BEFORE INSERT ON `avance` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_AVANCE` BEFORE UPDATE ON `avance` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `avance_retour`
--

CREATE TABLE `avance_retour` (
  `id_avance_retour` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_retour` date NOT NULL,
  `montant` double NOT NULL,
  `methode` int(11) NOT NULL COMMENT '1=Espece, 2=Cheque, 3=Effet, 4=Virement, 5=From Avance',
  `type_avance` tinyint(4) DEFAULT NULL COMMENT '1=Espece, 2=Cheque/Effet, 3=Virement',
  `description` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `avance_retour`
--
DELIMITER $$
CREATE TRIGGER `TRI_AVANCE_RETOUR` BEFORE INSERT ON `avance_retour` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_AVANCE_RETOUR` BEFORE UPDATE ON `avance_retour` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `avoir`
--

CREATE TABLE `avoir` (
  `id_avoir` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_vente` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `code_avoir` varchar(200) NOT NULL,
  `date_avoir` date NOT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `tva` double NOT NULL DEFAULT '20',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `avoir`
--
DELIMITER $$
CREATE TRIGGER `TRI_AVOIR` BEFORE INSERT ON `avoir` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_AVOIR` BEFORE UPDATE ON `avoir` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `avoir_details_in`
--

CREATE TABLE `avoir_details_in` (
  `id_avoir_details_in` int(11) NOT NULL,
  `id_avoir` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `prix_vente` double NOT NULL DEFAULT '0',
  `remise` double NOT NULL DEFAULT '0',
  `remise_dh` double NOT NULL DEFAULT '0',
  `etat` int(11) NOT NULL COMMENT '1=GOOD, 0=BROKEN',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `avoir_details_in`
--
DELIMITER $$
CREATE TRIGGER `TRI_AVOIR_DETAILS_IN` BEFORE INSERT ON `avoir_details_in` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_AVOIR_DETAILS_IN` BEFORE UPDATE ON `avoir_details_in` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `avoir_details_out`
--

CREATE TABLE `avoir_details_out` (
  `id_avoir_details_out` int(11) NOT NULL,
  `id_avoir` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `prix_vente` double NOT NULL DEFAULT '0',
  `remise` double NOT NULL DEFAULT '0',
  `remise_dh` double NOT NULL DEFAULT '0',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `avoir_details_out`
--
DELIMITER $$
CREATE TRIGGER `TRI_AVOIR_DETAILS_OUT` BEFORE INSERT ON `avoir_details_out` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_AVOIR_DETAILS_OUT` BEFORE UPDATE ON `avoir_details_out` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `caisse_entree`
--

CREATE TABLE `caisse_entree` (
  `id_caisse_entree` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `montant` double NOT NULL,
  `date_entree` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `caisse_entree`
--
DELIMITER $$
CREATE TRIGGER `TRI_CAISSE_ENTREE` BEFORE INSERT ON `caisse_entree` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_CAISSE_ENTREE` BEFORE UPDATE ON `caisse_entree` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `caisse_sortie`
--

CREATE TABLE `caisse_sortie` (
  `id_caisse_sortie` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `montant` double NOT NULL,
  `date_sortie` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `caisse_sortie`
--
DELIMITER $$
CREATE TRIGGER `TRI_CAISSE_SORTIE` BEFORE INSERT ON `caisse_sortie` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_CAISSE_SORTIE` BEFORE UPDATE ON `caisse_sortie` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Show, 0=Hide',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `categorie`
--
DELIMITER $$
CREATE TRIGGER `TRI_CATEGORIE` BEFORE INSERT ON `categorie` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_CATEGORIE` BEFORE UPDATE ON `categorie` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `charge`
--

CREATE TABLE `charge` (
  `id_charge` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_charge` date NOT NULL,
  `montant` double NOT NULL,
  `methode` int(11) NOT NULL COMMENT '1=Espece, 2=Cheque, 3=Effet, 4=Virement',
  `description` varchar(200) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `charge`
--
DELIMITER $$
CREATE TRIGGER `TRI_CHARGE` BEFORE INSERT ON `charge` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_CHARGE` BEFORE UPDATE ON `charge` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `id_cheque` int(11) NOT NULL,
  `id_paiement` int(11) DEFAULT NULL,
  `id_charge` int(11) DEFAULT NULL,
  `id_avance` int(11) DEFAULT NULL,
  `id_avance_retour` int(11) DEFAULT NULL,
  `date_cheque` date NOT NULL,
  `montant` double NOT NULL,
  `reference` varchar(200) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Vente, 2=Achat, 3=Reglement, 4=Charge, 5=Avance, 6=Retour d''Avance',
  `methode` tinyint(4) NOT NULL COMMENT '2=Cheque, 3=Effet',
  `remarque` varchar(200) DEFAULT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0' COMMENT ' 0=Not Yet, 1=Paid, 2=Unpaid',
  `caisse` tinyint(4) DEFAULT NULL COMMENT '0=Bank, 1=Caisse',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `cheque`
--
DELIMITER $$
CREATE TRIGGER `TRI_CHEQUE` BEFORE INSERT ON `cheque` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_CHEQUE` BEFORE UPDATE ON `cheque` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `code_client` varchar(200) NOT NULL,
  `ice` varchar(200) DEFAULT NULL,
  `full_name` varchar(200) NOT NULL,
  `responsable` varchar(200) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `ville` varchar(200) NOT NULL,
  `pays` varchar(200) NOT NULL,
  `remise` double NOT NULL DEFAULT '0',
  `telephone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Show, 0=Hide',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `id_user`, `code_client`, `ice`, `full_name`, `responsable`, `adresse`, `ville`, `pays`, `remise`, `telephone`, `email`, `description`, `display`) VALUES
(1, 2, 'C/21/0001', '', 'CLIENT COMPTOIRE', '', '', 'Fes', 'Maroc', 0, '', '', '', 1);
--
-- Triggers `client`
--
DELIMITER $$
CREATE TRIGGER `TRI_CLIENT` BEFORE INSERT ON `client` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_CLIENT` BEFORE UPDATE ON `client` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `client_cmd`
--

CREATE TABLE `client_cmd` (
  `id_client_cmd` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `code_client_cmd` varchar(200) NOT NULL,
  `date_client_cmd` date NOT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `client_cmd`
--
DELIMITER $$
CREATE TRIGGER `TRI_CLIENT_CMD` BEFORE INSERT ON `client_cmd` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_CLIENT_CMD` BEFORE UPDATE ON `client_cmd` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `client_cmd_details`
--

CREATE TABLE `client_cmd_details` (
  `id_client_cmd_details` int(11) NOT NULL,
  `id_client_cmd` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `client_cmd_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_CLIENT_CMD_DETAILS` BEFORE INSERT ON `client_cmd_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_CLIENT_CMD_DETAILS` BEFORE UPDATE ON `client_cmd_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `code_commande` varchar(200) NOT NULL,
  `date_commande` date NOT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `commande`
--
DELIMITER $$
CREATE TRIGGER `TRI_COMMANDE` BEFORE INSERT ON `commande` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_COMMANDE` BEFORE UPDATE ON `commande` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `commande_details`
--

CREATE TABLE `commande_details` (
  `id_commande_details` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `prix_achat` double NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `commande_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_COMMANDE_DETAILS` BEFORE INSERT ON `commande_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_COMMANDE_DETAILS` BEFORE UPDATE ON `commande_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `demontage`
--

CREATE TABLE `demontage` (
  `id_demontage` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `code_demontage` varchar(200) NOT NULL,
  `quantite` double NOT NULL,
  `frais` double NOT NULL DEFAULT '0',
  `date_demontage` date NOT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `demontage`
--
DELIMITER $$
CREATE TRIGGER `TRI_DEMONTAGE` BEFORE INSERT ON `demontage` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_DEMONTAGE` BEFORE UPDATE ON `demontage` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `demontage_details`
--

CREATE TABLE `demontage_details` (
  `id_demontage_details` int(11) NOT NULL,
  `id_demontage` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `demontage_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_DEMONTAGE_D` BEFORE INSERT ON `demontage_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_DEMONTAGE_D` BEFORE UPDATE ON `demontage_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `id_devis` int(11) NOT NULL,
  `code_devis` varchar(200) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `tva` double NOT NULL DEFAULT '20',
  `date_devis` date NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `devis`
--
DELIMITER $$
CREATE TRIGGER `TRI_DEVIS` BEFORE INSERT ON `devis` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_DEVIS` BEFORE UPDATE ON `devis` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `devis_details`
--

CREATE TABLE `devis_details` (
  `id_devis_details` int(11) NOT NULL,
  `id_devis` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `prix_vente` double NOT NULL DEFAULT '1',
  `remise` double NOT NULL DEFAULT '0',
  `remise_dh` double NOT NULL DEFAULT '0',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `devis_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_DEVIS_DETAILS` BEFORE INSERT ON `devis_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_DEVIS_DETAILS` BEFORE UPDATE ON `devis_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `exoneration_reste`
--

CREATE TABLE `exoneration_reste` (
  `id_exoneration_reste` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_achat` int(11) DEFAULT NULL,
  `id_vente` int(11) DEFAULT NULL,
  `montant` double NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Vente, 2=Achat, 3=Reglement',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `exoneration_reste`
--
DELIMITER $$
CREATE TRIGGER `TRI_PAIEMENT_RESTE` BEFORE INSERT ON `exoneration_reste` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_PAIEMENT_RESTE` BEFORE UPDATE ON `exoneration_reste` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `code_fournisseur` varchar(200) NOT NULL,
  `ice` varchar(200) DEFAULT NULL,
  `full_name` varchar(200) NOT NULL,
  `responsable` varchar(200) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `ville` varchar(200) NOT NULL,
  `pays` varchar(200) NOT NULL,
  `telephone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Show, 0=Hide',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `fournisseur`
--
DELIMITER $$
CREATE TRIGGER `TRI_FOURNISSEUR` BEFORE INSERT ON `fournisseur` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_FOURNISSEUR` BEFORE UPDATE ON `fournisseur` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id_information` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `ville` varchar(200) NOT NULL,
  `pays` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `fix` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `web` varchar(200) DEFAULT NULL,
  `num_rc` varchar(200) DEFAULT NULL,
  `num_patente` varchar(200) DEFAULT NULL,
  `num_if` varchar(200) DEFAULT NULL,
  `num_cnss` varchar(200) DEFAULT NULL,
  `num_ice` varchar(200) DEFAULT NULL,
  `num_rib` varchar(200) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `print_message` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id_information`, `full_name`, `adresse`, `ville`, `pays`, `telephone`, `fix`, `email`, `web`, `num_rc`, `num_patente`, `num_if`, `num_cnss`, `num_ice`, `num_rib`, `bank`, `print_message`) VALUES
(1, 'FES MARKETING SERVICE', 'Bureau 206 – 2éme étage Bureaux NOUR Angle AV. Slaoui', 'FES', 'Maroc', '+212 6 61 52 57 40', '+212 5 35 64 51 03', 'commercial@fes-marketing.net', 'www.fes-marketing.net', '150', '13230000', '40043427', '8850000', '201540002500000', '127 270 21212 00000000000 00', 'Al Barid Bank', '');

--
-- Triggers `information`
--
DELIMITER $$
CREATE TRIGGER `TRI_INFO` BEFORE INSERT ON `information` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_INFO` BEFORE UPDATE ON `information` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventaire`
--

CREATE TABLE `inventaire` (
  `id_inventaire` int(11) NOT NULL,
  `code_inventaire` varchar(200) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_inventaire` date NOT NULL,
  `valide` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=Valide, 0=Not',
  `remarque` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `inventaire`
--
DELIMITER $$
CREATE TRIGGER `TRI_INVENTAIRE` BEFORE INSERT ON `inventaire` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_INVENTAIRE` BEFORE UPDATE ON `inventaire` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventaire_details`
--

CREATE TABLE `inventaire_details` (
  `id_inventaire_details` int(11) NOT NULL,
  `id_inventaire` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1=Entree, 2=Srotie',
  `quantite` int(11) NOT NULL,
  `prix` double NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `inventaire_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_INVENTAIRE_DETAILS` BEFORE INSERT ON `inventaire_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_INVENTAIRE_DETAILS` BEFORE UPDATE ON `inventaire_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `id_vente` int(11) DEFAULT NULL,
  `id_avoir` int(44) DEFAULT NULL,
  `id_achat` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `montant` double NOT NULL,
  `date_paiement` date NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Vente, 2=Achat, 3=Reglement',
  `methode` int(11) NOT NULL COMMENT '1=Espece, 2=Cheque, 3=Effet, 4=Virement, 5=From Avance',
  `type_avance` tinyint(4) DEFAULT NULL COMMENT '1=Espece, 2=Cheque/Effet, 3=Virement',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `paiement`
--
DELIMITER $$
CREATE TRIGGER `TRI_PAIEMENT` BEFORE INSERT ON `paiement` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_PAIEMENT` BEFORE UPDATE ON `paiement` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id_production` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `code_production` varchar(200) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `frais` double NOT NULL DEFAULT '0',
  `date_production` date NOT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `production`
--
DELIMITER $$
CREATE TRIGGER `TRI_PRODUCTION` BEFORE INSERT ON `production` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_PRODUCTION` BEFORE UPDATE ON `production` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `production_details`
--

CREATE TABLE `production_details` (
  `id_production_details` int(11) NOT NULL,
  `id_production` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `production_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_PRODUCTION_D` BEFORE INSERT ON `production_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_PRODUCTION_D` BEFORE UPDATE ON `production_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_sub_categorie` int(11) DEFAULT NULL,
  `code_produit` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `prix_achat` double NOT NULL,
  `prix_vente` double NOT NULL DEFAULT '1',
  `alert` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Normal, 1=Composé',
  `display` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Show, 0=Hide',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `produit`
--
DELIMITER $$
CREATE TRIGGER `TRI_PRODUIT` BEFORE INSERT ON `produit` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_PRODUIT` BEFORE UPDATE ON `produit` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produit_details`
--

CREATE TABLE `produit_details` (
  `id_produit_details` int(11) NOT NULL,
  `id_produit_compose` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `produit_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_PRODUIT_D` BEFORE INSERT ON `produit_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_PRODUIT_D` BEFORE UPDATE ON `produit_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produit_end`
--

CREATE TABLE `produit_end` (
  `id_produit_end` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `quantite` double NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `produit_end`
--
DELIMITER $$
CREATE TRIGGER `TRI_PROFUIT_END` BEFORE INSERT ON `produit_end` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_PROFUIT_END` BEFORE UPDATE ON `produit_end` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categorie`
--

CREATE TABLE `sub_categorie` (
  `id_sub_categorie` int(11) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `full_name` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Show, 0=Hide',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `sub_categorie`
--
DELIMITER $$
CREATE TRIGGER `TRI_SUB_CATEGORIE` BEFORE INSERT ON `sub_categorie` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_SUB_CATEGORIE` BEFORE UPDATE ON `sub_categorie` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0=MANAGER, 1=ADMIN',
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `full_name`, `username`, `password`, `role`) VALUES
(1, 'FMS', 'fms', '$2y$10$hI7i0ybFH/zw67v2JspaYeDtgIAG37rAY56jjUvWVqHq1ycQhUzUK', 1),
(2, 'Demo Access', 'demo', '$2y$10$XOC5b.r4IqKySXGl4qlf5.F6DrS.gtIB1VjvRla7ZyH12zEJU5fOK', 1);
--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `TRI_USER` BEFORE INSERT ON `user` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_USER` BEFORE UPDATE ON `user` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id_user_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `systeme` tinyint(4) NOT NULL DEFAULT '0',
  `ip_address` varchar(100) NOT NULL,
  `date_log` datetime NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `id_vente` int(11) NOT NULL,
  `id_client_cmd` int(11) DEFAULT NULL,
  `id_devis` int(11) DEFAULT NULL,
  `code_vente` varchar(200) NOT NULL,
  `num_facture` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `tva` double NOT NULL DEFAULT '20',
  `date_vente` date NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `vente`
--
DELIMITER $$
CREATE TRIGGER `TRI_VENTE` BEFORE INSERT ON `vente` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_VENTE` BEFORE UPDATE ON `vente` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vente_details`
--

CREATE TABLE `vente_details` (
  `id_vente_details` int(11) NOT NULL,
  `id_vente` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` double NOT NULL,
  `prix_vente` double NOT NULL DEFAULT '1',
  `remise` double NOT NULL DEFAULT '0',
  `remise_dh` double NOT NULL DEFAULT '0',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `vente_details`
--
DELIMITER $$
CREATE TRIGGER `TRI_VENTE_DETAILS` BEFORE INSERT ON `vente_details` FOR EACH ROW SET NEW.date_create = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRU_VENTE_DETAILS` BEFORE UPDATE ON `vente_details` FOR EACH ROW SET NEW.date_update = NOW()
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_achat`),
  ADD UNIQUE KEY `code_achat` (`code_achat`),
  ADD KEY `id_fournisseur` (`id_fournisseur`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Indexes for table `achat_details`
--
ALTER TABLE `achat_details`
  ADD PRIMARY KEY (`id_achat_details`),
  ADD KEY `id_achat` (`id_achat`),
  ADD KEY `achat_details_ibfk_1` (`id_produit`);

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_achat` (`id_achat`),
  ADD KEY `id_vente` (`id_vente`),
  ADD KEY `id_avoir` (`id_avoir`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_fournisseur` (`id_fournisseur`),
  ADD KEY `id_client_cmd` (`id_client_cmd`),
  ADD KEY `id_devis` (`id_devis`);

--
-- Indexes for table `auto_code`
--
ALTER TABLE `auto_code`
  ADD PRIMARY KEY (`reference`);

--
-- Indexes for table `avance`
--
ALTER TABLE `avance`
  ADD PRIMARY KEY (`id_avance`),
  ADD KEY `id_client` (`id_client`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `avance_retour`
--
ALTER TABLE `avance_retour`
  ADD PRIMARY KEY (`id_avance_retour`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`id_avoir`),
  ADD UNIQUE KEY `code_avoir` (`code_avoir`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `avoir_ibfk_3` (`id_vente`);

--
-- Indexes for table `avoir_details_in`
--
ALTER TABLE `avoir_details_in`
  ADD PRIMARY KEY (`id_avoir_details_in`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_avoir` (`id_avoir`);

--
-- Indexes for table `avoir_details_out`
--
ALTER TABLE `avoir_details_out`
  ADD PRIMARY KEY (`id_avoir_details_out`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_avoir` (`id_avoir`);

--
-- Indexes for table `caisse_entree`
--
ALTER TABLE `caisse_entree`
  ADD PRIMARY KEY (`id_caisse_entree`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `caisse_sortie`
--
ALTER TABLE `caisse_sortie`
  ADD PRIMARY KEY (`id_caisse_sortie`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `charge`
--
ALTER TABLE `charge`
  ADD PRIMARY KEY (`id_charge`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id_cheque`),
  ADD KEY `id_paiement` (`id_paiement`),
  ADD KEY `id_charge` (`id_charge`),
  ADD KEY `id_avance` (`id_avance`),
  ADD KEY `id_avance_retour` (`id_avance_retour`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `code_client` (`code_client`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `client_cmd`
--
ALTER TABLE `client_cmd`
  ADD PRIMARY KEY (`id_client_cmd`),
  ADD UNIQUE KEY `code_client_cmd` (`code_client_cmd`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `client_cmd_details`
--
ALTER TABLE `client_cmd_details`
  ADD PRIMARY KEY (`id_client_cmd_details`),
  ADD KEY `id_client_cmd` (`id_client_cmd`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD UNIQUE KEY `code_commande` (`code_commande`),
  ADD KEY `id_fournisseur` (`id_fournisseur`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `commande_details`
--
ALTER TABLE `commande_details`
  ADD PRIMARY KEY (`id_commande_details`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `commande_details_ibfk_1` (`id_commande`);

--
-- Indexes for table `demontage`
--
ALTER TABLE `demontage`
  ADD PRIMARY KEY (`id_demontage`),
  ADD UNIQUE KEY `code_demontage` (`code_demontage`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `demontage_details`
--
ALTER TABLE `demontage_details`
  ADD PRIMARY KEY (`id_demontage_details`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_demontage` (`id_demontage`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id_devis`),
  ADD UNIQUE KEY `code_devis` (`code_devis`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `devis_details`
--
ALTER TABLE `devis_details`
  ADD PRIMARY KEY (`id_devis_details`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_devis` (`id_devis`);

--
-- Indexes for table `exoneration_reste`
--
ALTER TABLE `exoneration_reste`
  ADD PRIMARY KEY (`id_exoneration_reste`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_achat` (`id_achat`),
  ADD KEY `id_vente` (`id_vente`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`),
  ADD UNIQUE KEY `code_fournisseur` (`code_fournisseur`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_information`);

--
-- Indexes for table `inventaire`
--
ALTER TABLE `inventaire`
  ADD PRIMARY KEY (`id_inventaire`),
  ADD UNIQUE KEY `code_inventaire` (`code_inventaire`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `inventaire_details`
--
ALTER TABLE `inventaire_details`
  ADD PRIMARY KEY (`id_inventaire_details`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_inventaire` (`id_inventaire`) USING BTREE;

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_vente` (`id_vente`) USING BTREE,
  ADD KEY `id_achat` (`id_achat`),
  ADD KEY `id_avoir` (`id_avoir`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id_production`),
  ADD UNIQUE KEY `code_production` (`code_production`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `production_details`
--
ALTER TABLE `production_details`
  ADD PRIMARY KEY (`id_production_details`),
  ADD KEY `id_production` (`id_production`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `code_produit` (`code_produit`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_sub_categorie` (`id_sub_categorie`);

--
-- Indexes for table `produit_details`
--
ALTER TABLE `produit_details`
  ADD PRIMARY KEY (`id_produit_details`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_produit_compose` (`id_produit_compose`);

--
-- Indexes for table `produit_end`
--
ALTER TABLE `produit_end`
  ADD PRIMARY KEY (`id_produit_end`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sub_categorie`
--
ALTER TABLE `sub_categorie`
  ADD PRIMARY KEY (`id_sub_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id_user_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_vente`),
  ADD UNIQUE KEY `code_vente` (`code_vente`),
  ADD UNIQUE KEY `num_facture` (`num_facture`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_client_cmd` (`id_client_cmd`),
  ADD KEY `id_devis` (`id_devis`);

--
-- Indexes for table `vente_details`
--
ALTER TABLE `vente_details`
  ADD PRIMARY KEY (`id_vente_details`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_vente` (`id_vente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achat`
--
ALTER TABLE `achat`
  MODIFY `id_achat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `achat_details`
--
ALTER TABLE `achat_details`
  MODIFY `id_achat_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avance`
--
ALTER TABLE `avance`
  MODIFY `id_avance` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avance_retour`
--
ALTER TABLE `avance_retour`
  MODIFY `id_avance_retour` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avoir`
--
ALTER TABLE `avoir`
  MODIFY `id_avoir` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avoir_details_in`
--
ALTER TABLE `avoir_details_in`
  MODIFY `id_avoir_details_in` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avoir_details_out`
--
ALTER TABLE `avoir_details_out`
  MODIFY `id_avoir_details_out` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `caisse_entree`
--
ALTER TABLE `caisse_entree`
  MODIFY `id_caisse_entree` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `caisse_sortie`
--
ALTER TABLE `caisse_sortie`
  MODIFY `id_caisse_sortie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `charge`
--
ALTER TABLE `charge`
  MODIFY `id_charge` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id_cheque` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `client_cmd`
--
ALTER TABLE `client_cmd`
  MODIFY `id_client_cmd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client_cmd_details`
--
ALTER TABLE `client_cmd_details`
  MODIFY `id_client_cmd_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commande_details`
--
ALTER TABLE `commande_details`
  MODIFY `id_commande_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `demontage`
--
ALTER TABLE `demontage`
  MODIFY `id_demontage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `demontage_details`
--
ALTER TABLE `demontage_details`
  MODIFY `id_demontage_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `id_devis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devis_details`
--
ALTER TABLE `devis_details`
  MODIFY `id_devis_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exoneration_reste`
--
ALTER TABLE `exoneration_reste`
  MODIFY `id_exoneration_reste` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventaire`
--
ALTER TABLE `inventaire`
  MODIFY `id_inventaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventaire_details`
--
ALTER TABLE `inventaire_details`
  MODIFY `id_inventaire_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id_production` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production_details`
--
ALTER TABLE `production_details`
  MODIFY `id_production_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produit_details`
--
ALTER TABLE `produit_details`
  MODIFY `id_produit_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produit_end`
--
ALTER TABLE `produit_end`
  MODIFY `id_produit_end` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_categorie`
--
ALTER TABLE `sub_categorie`
  MODIFY `id_sub_categorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id_user_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vente_details`
--
ALTER TABLE `vente_details`
  MODIFY `id_vente_details` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `achat_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `achat_ibfk_3` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `achat_details`
--
ALTER TABLE `achat_details`
  ADD CONSTRAINT `achat_details_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `achat_details_ibfk_2` FOREIGN KEY (`id_achat`) REFERENCES `achat` (`id_achat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adresse_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adresse_ibfk_3` FOREIGN KEY (`id_achat`) REFERENCES `achat` (`id_achat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adresse_ibfk_4` FOREIGN KEY (`id_vente`) REFERENCES `vente` (`id_vente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adresse_ibfk_5` FOREIGN KEY (`id_avoir`) REFERENCES `avoir` (`id_avoir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adresse_ibfk_6` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adresse_ibfk_7` FOREIGN KEY (`id_client_cmd`) REFERENCES `client_cmd` (`id_client_cmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adresse_ibfk_8` FOREIGN KEY (`id_devis`) REFERENCES `devis` (`id_devis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `avance`
--
ALTER TABLE `avance`
  ADD CONSTRAINT `avance_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `avance_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `avance_retour`
--
ALTER TABLE `avance_retour`
  ADD CONSTRAINT `avance_retour_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `avance_retour_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `avoir_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `avoir_ibfk_3` FOREIGN KEY (`id_vente`) REFERENCES `vente` (`id_vente`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `avoir_details_in`
--
ALTER TABLE `avoir_details_in`
  ADD CONSTRAINT `avoir_details_in_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `avoir_details_in_ibfk_2` FOREIGN KEY (`id_avoir`) REFERENCES `avoir` (`id_avoir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `avoir_details_out`
--
ALTER TABLE `avoir_details_out`
  ADD CONSTRAINT `avoir_details_out_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `avoir_details_out_ibfk_2` FOREIGN KEY (`id_avoir`) REFERENCES `avoir` (`id_avoir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `caisse_entree`
--
ALTER TABLE `caisse_entree`
  ADD CONSTRAINT `caisse_entree_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `caisse_sortie`
--
ALTER TABLE `caisse_sortie`
  ADD CONSTRAINT `caisse_sortie_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `charge`
--
ALTER TABLE `charge`
  ADD CONSTRAINT `charge_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `cheque_ibfk_1` FOREIGN KEY (`id_paiement`) REFERENCES `paiement` (`id_paiement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cheque_ibfk_2` FOREIGN KEY (`id_charge`) REFERENCES `charge` (`id_charge`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cheque_ibfk_3` FOREIGN KEY (`id_avance`) REFERENCES `avance` (`id_avance`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cheque_ibfk_4` FOREIGN KEY (`id_avance_retour`) REFERENCES `avance_retour` (`id_avance_retour`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `client_cmd`
--
ALTER TABLE `client_cmd`
  ADD CONSTRAINT `client_cmd_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `client_cmd_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `client_cmd_details`
--
ALTER TABLE `client_cmd_details`
  ADD CONSTRAINT `client_cmd_details_ibfk_1` FOREIGN KEY (`id_client_cmd`) REFERENCES `client_cmd` (`id_client_cmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_cmd_details_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `commande_details`
--
ALTER TABLE `commande_details`
  ADD CONSTRAINT `commande_details_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_details_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `demontage`
--
ALTER TABLE `demontage`
  ADD CONSTRAINT `demontage_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `demontage_details`
--
ALTER TABLE `demontage_details`
  ADD CONSTRAINT `demontage_details_ibfk_1` FOREIGN KEY (`id_demontage`) REFERENCES `demontage` (`id_demontage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demontage_details_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `devis_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `devis_details`
--
ALTER TABLE `devis_details`
  ADD CONSTRAINT `devis_details_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `devis_details_ibfk_2` FOREIGN KEY (`id_devis`) REFERENCES `devis` (`id_devis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exoneration_reste`
--
ALTER TABLE `exoneration_reste`
  ADD CONSTRAINT `exoneration_reste_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `exoneration_reste_ibfk_2` FOREIGN KEY (`id_achat`) REFERENCES `achat` (`id_achat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exoneration_reste_ibfk_3` FOREIGN KEY (`id_vente`) REFERENCES `vente` (`id_vente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventaire`
--
ALTER TABLE `inventaire`
  ADD CONSTRAINT `inventaire_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `inventaire_details`
--
ALTER TABLE `inventaire_details`
  ADD CONSTRAINT `inventaire_details_ibfk_1` FOREIGN KEY (`id_inventaire`) REFERENCES `inventaire` (`id_inventaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventaire_details_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_vente`) REFERENCES `vente` (`id_vente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paiement_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `paiement_ibfk_3` FOREIGN KEY (`id_achat`) REFERENCES `achat` (`id_achat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paiement_ibfk_4` FOREIGN KEY (`id_avoir`) REFERENCES `avoir` (`id_avoir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `production_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `production_details`
--
ALTER TABLE `production_details`
  ADD CONSTRAINT `production_details_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `production_details_ibfk_2` FOREIGN KEY (`id_production`) REFERENCES `production` (`id_production`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_sub_categorie`) REFERENCES `sub_categorie` (`id_sub_categorie`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `produit_details`
--
ALTER TABLE `produit_details`
  ADD CONSTRAINT `produit_details_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `produit_details_ibfk_2` FOREIGN KEY (`id_produit_compose`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit_end`
--
ALTER TABLE `produit_end`
  ADD CONSTRAINT `produit_end_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `produit_end_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `sub_categorie`
--
ALTER TABLE `sub_categorie`
  ADD CONSTRAINT `sub_categorie_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `vente_ibfk_3` FOREIGN KEY (`id_client_cmd`) REFERENCES `client_cmd` (`id_client_cmd`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `vente_ibfk_4` FOREIGN KEY (`id_devis`) REFERENCES `devis` (`id_devis`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `vente_details`
--
ALTER TABLE `vente_details`
  ADD CONSTRAINT `vente_details_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `vente_details_ibfk_2` FOREIGN KEY (`id_vente`) REFERENCES `vente` (`id_vente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
