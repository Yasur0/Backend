-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 juin 2022 à 16:36
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `menuiz`
--
CREATE DATABASE IF NOT EXISTS `menuiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `menuiz`;

-- --------------------------------------------------------

--
-- Structure de la table `t_d_address_adr`
--

DROP TABLE IF EXISTS `t_d_address_adr`;
CREATE TABLE `t_d_address_adr` (
  `ADR_ID` int(11) NOT NULL,
  `ADR_FIRSTNAME` varchar(1024) NOT NULL,
  `ADR_LASTNAME` varchar(1024) NOT NULL,
  `ADR_LINE1` varchar(1024) NOT NULL,
  `ADR_LINE2` varchar(1024) DEFAULT NULL,
  `ADR_LINE3` varchar(1024) DEFAULT NULL,
  `ADR_ZIPCODE` varchar(1024) NOT NULL,
  `ADR_CITY` varchar(1024) NOT NULL,
  `ADR_COUNTRY` varchar(1024) NOT NULL,
  `ADR_MAIL` varchar(1024) NOT NULL,
  `ADR_PHONE` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_address_adr`
--

INSERT INTO `t_d_address_adr` (`ADR_ID`, `ADR_FIRSTNAME`, `ADR_LASTNAME`, `ADR_LINE1`, `ADR_LINE2`, `ADR_LINE3`, `ADR_ZIPCODE`, `ADR_CITY`, `ADR_COUNTRY`, `ADR_MAIL`, `ADR_PHONE`) VALUES
(1, '', '', '3 route des coquelicots', NULL, NULL, '27400', 'Louviers', 'Haute-Normandie', 'adressemail@fictive.com', ''),
(2, 'Non renseigné', 'Non renseigné', 'Non renseigné', NULL, NULL, '00000', 'Non renseigné', 'Non renseigné', 'Non renseigné', ''),
(3, '', '', '43 rue des souches', NULL, NULL, '76540', 'ROUEN', 'Seine-maritime', 'vieilleadresse@msn.com', ''),
(4, '', '', '2bis rue de l\'eglise', NULL, NULL, '27110', 'Ecquetot', 'Haite-normandie', 'paysan27@hotmail.com', ''),
(5, '', '', '3 chemin de l\'escalier', NULL, NULL, '27100', 'Epegard', 'Haute-normandie', 'mailfictif@hotmail.com', ''),
(6, '', '', '1 rue du centre bourg', NULL, NULL, '27400', 'Louviers', 'Haute-normandie', 'mailinventer@hotmail.com', ''),
(7, '', '', '4 chemin de la maison', NULL, NULL, '13540', 'Marseille', ' Provence-Alpes-Côte d\'Azur', 'marseille13@hotmail.com', ''),
(15, 'Guillaume', 'Delacroix', '202 IMPASSE DU GEVAUDAN', '202 IMPASSE DU GEVAUDAN', '202 IMPASSE DU GEVAUDAN', '27190', 'LA BONNEVILLE SUR ITON', 'France', 'gdelacroix@hotmail.fr', '+33624543413'),
(16, 'toto', 'toto', 'toto', '24540', '', '24540', 'toto', 'fr', 'toto', '02'),
(17, 'tot', 'tot', 't', '', '', '24568', 'ger', 'fr', 'to', '02'),
(18, 'titi', 'titi', 'titi', '', '', 'titi', 'titi', 'titi', 'titi', 'titi'),
(19, 'ta', 'mere', '53 rue de la vallée', '', '', '29550', 'jsp', 'france', 'lapute@gmail.com', '04654535238525'),
(20, 'n', 'n', 'nn', 'n', 'nn', 'n', 'n', 'n', 'n', 'nn'),
(21, 'n', 'n', 'N', 'N', 'N', 'n', 'n', 'n', 'n', 'n');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_expeditiontype_ety`
--

DROP TABLE IF EXISTS `t_d_expeditiontype_ety`;
CREATE TABLE `t_d_expeditiontype_ety` (
  `ETY_ID` int(11) NOT NULL,
  `ETY_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_expeditiontype_ety`
--

INSERT INTO `t_d_expeditiontype_ety` (`ETY_ID`, `ETY_WORDING`) VALUES
(1, 'COLISSIMO'),
(2, 'CHRONOPOST'),
(3, 'TRANSPORTEUR INTERNE');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_expedition_exp`
--

DROP TABLE IF EXISTS `t_d_expedition_exp`;
CREATE TABLE `t_d_expedition_exp` (
  `EXP_ID` int(11) NOT NULL,
  `EXP_WEIGTH` decimal(8,2) DEFAULT NULL,
  `EXP_TRACKINGNUMBER` varchar(1024) DEFAULT NULL,
  `EXP_SENTDATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_expedition_exp`
--

INSERT INTO `t_d_expedition_exp` (`EXP_ID`, `EXP_WEIGTH`, `EXP_TRACKINGNUMBER`, `EXP_SENTDATE`) VALUES
(1, '0.00', 'NaN', '2022-06-07 14:09:15'),
(2, '0.00', 'NaN', '2022-06-07 14:09:15'),
(3, '0.00', 'NaN', '2022-06-07 14:09:15'),
(4, '0.00', 'NaN', '2022-06-07 14:09:15'),
(5, '0.00', 'NaN', '2022-06-07 14:09:15'),
(6, '0.00', 'NaN', '2022-06-07 14:09:15'),
(8, '0.00', '', '2022-06-22 11:21:39'),
(9, '0.00', '', '2022-06-22 12:54:49'),
(10, '0.00', '', '2022-06-22 13:06:29'),
(11, '0.00', '', '2022-06-27 07:44:38'),
(12, '0.00', '', '2022-06-30 12:12:58'),
(13, '0.00', '', '2022-06-30 12:15:20');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderdetails_odt`
--

DROP TABLE IF EXISTS `t_d_orderdetails_odt`;
CREATE TABLE `t_d_orderdetails_odt` (
  `OHR_ID` int(11) NOT NULL,
  `PRD_ID` int(11) NOT NULL,
  `EXP_ID` int(11) NOT NULL,
  `ODT_QUANTITY` int(11) NOT NULL,
  `ODT_ISCANCELED` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderdetails_odt`
--

INSERT INTO `t_d_orderdetails_odt` (`OHR_ID`, `PRD_ID`, `EXP_ID`, `ODT_QUANTITY`, `ODT_ISCANCELED`) VALUES
(1, 2, 1, 5, 0),
(1, 5, 1, 2, 0),
(2, 7, 2, 1, 0),
(2, 8, 2, 3, 0),
(3, 6, 3, 5, 0),
(3, 11, 3, 1, 0),
(4, 2, 4, 10, 0),
(4, 16, 4, 3, 0),
(5, 1, 5, 1, 0),
(5, 3, 5, 1, 0),
(5, 4, 5, 2, 0),
(5, 10, 5, 1, 0),
(6, 9, 6, 3, 0),
(6, 17, 6, 1, 0),
(10, 1, 8, 2, 0),
(11, 2, 9, 1, 0),
(11, 4, 9, 2, 0),
(12, 1, 10, 2, 0),
(13, 1, 11, 1, 0),
(14, 1, 12, 1, 0),
(15, 1, 13, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderheader_ohr`
--

DROP TABLE IF EXISTS `t_d_orderheader_ohr`;
CREATE TABLE `t_d_orderheader_ohr` (
  `OHR_ID` int(11) NOT NULL,
  `ADR_ID_LIV` int(11) NOT NULL,
  `ADR_ID_FAC` int(11) NOT NULL,
  `PMT_ID` int(11) NOT NULL,
  `OSS_ID` int(11) NOT NULL,
  `ETY_ID` int(11) NOT NULL,
  `USR_ID` int(11) NOT NULL,
  `OHR_NUMBER` varchar(1024) NOT NULL,
  `OHR_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderheader_ohr`
--

INSERT INTO `t_d_orderheader_ohr` (`OHR_ID`, `ADR_ID_LIV`, `ADR_ID_FAC`, `PMT_ID`, `OSS_ID`, `ETY_ID`, `USR_ID`, `OHR_NUMBER`, `OHR_DATE`) VALUES
(1, 1, 1, 3, 2, 1, 1, '1', '2022-06-07 13:18:55'),
(2, 2, 1, 1, 3, 3, 2, '2', '2022-06-07 13:22:24'),
(3, 2, 2, 1, 2, 2, 3, '3', '2022-06-07 13:22:46'),
(4, 1, 1, 2, 1, 3, 1, '4', '2022-06-07 13:55:23'),
(5, 1, 1, 2, 2, 3, 2, '5', '2022-06-07 13:55:23'),
(6, 1, 1, 2, 4, 3, 3, '6', '2022-06-07 13:55:23'),
(10, 15, 15, 1, 1, 1, 4, 'ORDER10', '2022-06-22 11:21:39'),
(11, 17, 16, 1, 1, 1, 10, 'ORDER11', '2022-06-22 12:54:49'),
(12, 18, 18, 1, 1, 1, 11, 'ORDER12', '2022-06-22 13:06:29'),
(13, 19, 19, 1, 1, 1, 15, 'ORDER13', '2022-06-27 07:44:38'),
(14, 19, 19, 1, 1, 2, 15, 'ORDER14', '2022-06-30 12:12:58'),
(15, 21, 20, 1, 1, 1, 16, 'ORDER15', '2022-06-30 12:15:20');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderstatus_oss`
--

DROP TABLE IF EXISTS `t_d_orderstatus_oss`;
CREATE TABLE `t_d_orderstatus_oss` (
  `OSS_ID` int(11) NOT NULL,
  `OSS_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderstatus_oss`
--

INSERT INTO `t_d_orderstatus_oss` (`OSS_ID`, `OSS_WORDING`) VALUES
(1, 'En cours'),
(2, 'Annulé'),
(3, 'Livré totalement'),
(4, 'Livré partiellement');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_paymenttype_pmt`
--

DROP TABLE IF EXISTS `t_d_paymenttype_pmt`;
CREATE TABLE `t_d_paymenttype_pmt` (
  `PMT_ID` int(11) NOT NULL,
  `PMT_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_paymenttype_pmt`
--

INSERT INTO `t_d_paymenttype_pmt` (`PMT_ID`, `PMT_WORDING`) VALUES
(1, 'CB'),
(2, 'ESPECE'),
(3, 'CHEQUE'),
(4, 'VIREMENT');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_productkit_kit`
--

DROP TABLE IF EXISTS `t_d_productkit_kit`;
CREATE TABLE `t_d_productkit_kit` (
  `PRD_ID_KIT` int(11) NOT NULL,
  `PRD_ID_COMPONENT` int(11) NOT NULL,
  `KIT_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_productkit_kit`
--

INSERT INTO `t_d_productkit_kit` (`PRD_ID_KIT`, `PRD_ID_COMPONENT`, `KIT_QUANTITY`) VALUES
(8, 1, 5),
(8, 2, 4),
(9, 1, 3),
(9, 3, 3),
(10, 4, 3),
(10, 5, 5),
(11, 6, 2),
(11, 7, 1),
(12, 4, 3),
(12, 7, 2),
(13, 2, 10),
(13, 6, 3),
(16, 1, 5),
(16, 5, 2),
(17, 1, 2),
(17, 3, 5),
(18, 2, 2),
(18, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_d_producttype_pty`
--

DROP TABLE IF EXISTS `t_d_producttype_pty`;
CREATE TABLE `t_d_producttype_pty` (
  `PTY_ID` int(11) NOT NULL,
  `PTY_DESCRIPTION` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_producttype_pty`
--

INSERT INTO `t_d_producttype_pty` (`PTY_ID`, `PTY_DESCRIPTION`) VALUES
(1, 'UNITAIRE'),
(2, 'KIT');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_product_prd`
--

DROP TABLE IF EXISTS `t_d_product_prd`;
CREATE TABLE `t_d_product_prd` (
  `PRD_ID` int(11) NOT NULL,
  `SPL_ID` int(11) NOT NULL,
  `PTY_ID` int(11) NOT NULL,
  `PRD_DESCRIPTION` varchar(1024) NOT NULL,
  `PRD_GUARANTEE` smallint(6) NOT NULL,
  `PRD_PICTURE` longtext DEFAULT NULL,
  `PRD_PRICE` decimal(8,2) DEFAULT NULL,
  `PRD_CODE` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_product_prd`
--

INSERT INTO `t_d_product_prd` (`PRD_ID`, `SPL_ID`, `PTY_ID`, `PRD_DESCRIPTION`, `PRD_GUARANTEE`, `PRD_PICTURE`, `PRD_PRICE`, `PRD_CODE`) VALUES
(1, 1, 1, 'PRODUIT_1', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '19.99', 'PRODUIT_1'),
(2, 2, 1, 'PRODUIT_2', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '14.99', 'PRODUIT_2'),
(3, 3, 1, 'PRODUIT_3', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '16.99', 'PRODUIT_3'),
(4, 1, 1, 'PRODUIT_4', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '29.99', 'PRODUIT_4'),
(5, 2, 1, 'PRODUIT_5', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '34.99', 'PRODUIT_5'),
(6, 4, 1, 'PRODUIT_6', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '99.99', 'PRODUIT_6'),
(7, 5, 1, 'PRODUIT_7', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '9.99', 'PRODUIT_7'),
(8, 1, 2, 'KIT_1', 24, NULL, '149.99', 'KIT_1'),
(9, 1, 2, 'KIT_2', 24, NULL, '89.99', 'KIT_2'),
(10, 2, 2, 'KIT_3', 24, NULL, '289.99', 'KIT_3'),
(11, 2, 2, 'KIT_4', 24, NULL, '199.99', 'KIT_4'),
(12, 1, 2, 'KIT_5', 24, NULL, '99.99', 'KIT_5'),
(13, 3, 2, 'KIT_6', 24, NULL, '399.99', 'KIT_6'),
(16, 6, 2, 'KIT_7', 24, NULL, '259.99', 'KIT_7'),
(17, 6, 2, 'KIT_8', 24, NULL, '109.99', 'KIT_8'),
(18, 6, 2, 'KIT_9', 24, NULL, '219.99', 'KIT_9');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_supplier_spl`
--

DROP TABLE IF EXISTS `t_d_supplier_spl`;
CREATE TABLE `t_d_supplier_spl` (
  `SPL_ID` int(11) NOT NULL,
  `SPL_NAME` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_supplier_spl`
--

INSERT INTO `t_d_supplier_spl` (`SPL_ID`, `SPL_NAME`) VALUES
(1, 'FOURNISSEUR1'),
(2, 'FOURNISSEUR2'),
(3, 'FOURNISSEUR3'),
(4, 'FOURNISSEUR4'),
(5, 'FOURNISSEUR5'),
(6, 'Non renseigné');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_user_usr`
--

DROP TABLE IF EXISTS `t_d_user_usr`;
CREATE TABLE `t_d_user_usr` (
  `USR_ID` int(11) NOT NULL,
  `ADR_ID` int(11) DEFAULT NULL,
  `USR_MAIL` varchar(1024) NOT NULL,
  `USR_PASSWORD` varchar(1024) NOT NULL,
  `USR_FIRSTNAME` varchar(1024) NOT NULL,
  `USR_LASTNAME` varchar(1024) NOT NULL,
  `UTY_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_user_usr`
--

INSERT INTO `t_d_user_usr` (`USR_ID`, `ADR_ID`, `USR_MAIL`, `USR_PASSWORD`, `USR_FIRSTNAME`, `USR_LASTNAME`, `UTY_ID`) VALUES
(1, 1, 'efzefz@zfefze.com', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'Paul', 'Marchand', 1),
(2, 3, 'sefqBZN@sfq.com', '2aa60a8ff7fcd473d321e0146afd9e26df395147', 'Bruno', 'Laporte', 1),
(3, 4, 'drgfagra@aerga.com', '1119cfd37ee247357e034a08d844eea25f6fd20f', 'Benoit', 'Gras', 1),
(4, NULL, 'gdelacroix@hotmail.fr', 'b70f7d0e2acef2e0fa1c6f117e3c11e0d7082232', 'Delacroix', 'Guillaume', 2),
(10, NULL, 'toto@gmail.com', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 'toto', 'toto', 1),
(11, NULL, 'titi@gmail.com', 'f7e79ca8eb0b31ee4d5d6c181416667ffee528ed', 'titi', 'titi', 1),
(12, NULL, 'jc@gmail.com', 'f9ae8604de015e6fc12a1ebdbe72f262b981a2f6', 'jean', 'cule', 1),
(13, NULL, 'bt@gmail.com', '403926033d001b5279df37cbbe5287b7c7c267fa', 'b', 't', 1),
(14, NULL, 't', '8efd86fb78a56a5145ed7739dcb00c78581c5375', 't', 't', 1),
(15, NULL, 'r', '4dc7c9ec434ed06502767136789763ec11d2c4b7', 'r', 'r', 2),
(16, 21, 'n', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'n', 'n', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_d_address_adr`
--
ALTER TABLE `t_d_address_adr`
  ADD PRIMARY KEY (`ADR_ID`);

--
-- Index pour la table `t_d_expeditiontype_ety`
--
ALTER TABLE `t_d_expeditiontype_ety`
  ADD PRIMARY KEY (`ETY_ID`);

--
-- Index pour la table `t_d_expedition_exp`
--
ALTER TABLE `t_d_expedition_exp`
  ADD PRIMARY KEY (`EXP_ID`);

--
-- Index pour la table `t_d_orderdetails_odt`
--
ALTER TABLE `t_d_orderdetails_odt`
  ADD PRIMARY KEY (`OHR_ID`,`PRD_ID`,`EXP_ID`),
  ADD KEY `FK_CONCERNE2` (`PRD_ID`),
  ADD KEY `FK_CONCERNE3` (`EXP_ID`);

--
-- Index pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  ADD PRIMARY KEY (`OHR_ID`),
  ADD KEY `FK_A_POUR_PAIEMENT` (`PMT_ID`),
  ADD KEY `FK_A_POUR_STATUT` (`OSS_ID`),
  ADD KEY `FK_A_POUR_TYPE_EXPEDITION` (`ETY_ID`),
  ADD KEY `FK_COMMANDE` (`USR_ID`),
  ADD KEY `FK_EST_FACTURE` (`ADR_ID_FAC`),
  ADD KEY `FK_EST_LIVRE` (`ADR_ID_LIV`);

--
-- Index pour la table `t_d_orderstatus_oss`
--
ALTER TABLE `t_d_orderstatus_oss`
  ADD PRIMARY KEY (`OSS_ID`);

--
-- Index pour la table `t_d_paymenttype_pmt`
--
ALTER TABLE `t_d_paymenttype_pmt`
  ADD PRIMARY KEY (`PMT_ID`);

--
-- Index pour la table `t_d_productkit_kit`
--
ALTER TABLE `t_d_productkit_kit`
  ADD PRIMARY KEY (`PRD_ID_KIT`,`PRD_ID_COMPONENT`),
  ADD KEY `FK_T_D_PROD_SE_COMPOS_T_D_PROD2` (`PRD_ID_COMPONENT`);

--
-- Index pour la table `t_d_producttype_pty`
--
ALTER TABLE `t_d_producttype_pty`
  ADD PRIMARY KEY (`PTY_ID`);

--
-- Index pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  ADD PRIMARY KEY (`PRD_ID`),
  ADD KEY `FK_EST_DE_TYPE` (`PTY_ID`),
  ADD KEY `FK_PROVIENT_DE` (`SPL_ID`);

--
-- Index pour la table `t_d_supplier_spl`
--
ALTER TABLE `t_d_supplier_spl`
  ADD PRIMARY KEY (`SPL_ID`);

--
-- Index pour la table `t_d_user_usr`
--
ALTER TABLE `t_d_user_usr`
  ADD PRIMARY KEY (`USR_ID`),
  ADD KEY `FK_T_D_USER_A_COMME_I_T_D_ADDR3` (`ADR_ID`),
  ADD KEY `FK_UserType` (`UTY_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_d_address_adr`
--
ALTER TABLE `t_d_address_adr`
  MODIFY `ADR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `t_d_expeditiontype_ety`
--
ALTER TABLE `t_d_expeditiontype_ety`
  MODIFY `ETY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_d_expedition_exp`
--
ALTER TABLE `t_d_expedition_exp`
  MODIFY `EXP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_d_orderdetails_odt`
--
ALTER TABLE `t_d_orderdetails_odt`
  MODIFY `OHR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  MODIFY `OHR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `t_d_orderstatus_oss`
--
ALTER TABLE `t_d_orderstatus_oss`
  MODIFY `OSS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_d_paymenttype_pmt`
--
ALTER TABLE `t_d_paymenttype_pmt`
  MODIFY `PMT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_d_productkit_kit`
--
ALTER TABLE `t_d_productkit_kit`
  MODIFY `PRD_ID_KIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `t_d_producttype_pty`
--
ALTER TABLE `t_d_producttype_pty`
  MODIFY `PTY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  MODIFY `PRD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `t_d_supplier_spl`
--
ALTER TABLE `t_d_supplier_spl`
  MODIFY `SPL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_d_user_usr`
--
ALTER TABLE `t_d_user_usr`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_d_orderdetails_odt`
--
ALTER TABLE `t_d_orderdetails_odt`
  ADD CONSTRAINT `FK_CONCERNE1` FOREIGN KEY (`OHR_ID`) REFERENCES `t_d_orderheader_ohr` (`OHR_ID`),
  ADD CONSTRAINT `FK_CONCERNE2` FOREIGN KEY (`PRD_ID`) REFERENCES `t_d_product_prd` (`PRD_ID`),
  ADD CONSTRAINT `FK_CONCERNE3` FOREIGN KEY (`EXP_ID`) REFERENCES `t_d_expedition_exp` (`EXP_ID`);

--
-- Contraintes pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  ADD CONSTRAINT `FK_A_POUR_PAIEMENT` FOREIGN KEY (`PMT_ID`) REFERENCES `t_d_paymenttype_pmt` (`PMT_ID`),
  ADD CONSTRAINT `FK_A_POUR_STATUT` FOREIGN KEY (`OSS_ID`) REFERENCES `t_d_orderstatus_oss` (`OSS_ID`),
  ADD CONSTRAINT `FK_A_POUR_TYPE_EXPEDITION` FOREIGN KEY (`ETY_ID`) REFERENCES `t_d_expeditiontype_ety` (`ETY_ID`),
  ADD CONSTRAINT `FK_COMMANDE` FOREIGN KEY (`USR_ID`) REFERENCES `t_d_user_usr` (`USR_ID`),
  ADD CONSTRAINT `FK_EST_FACTURE` FOREIGN KEY (`ADR_ID_FAC`) REFERENCES `t_d_address_adr` (`ADR_ID`),
  ADD CONSTRAINT `FK_EST_LIVRE` FOREIGN KEY (`ADR_ID_LIV`) REFERENCES `t_d_address_adr` (`ADR_ID`);

--
-- Contraintes pour la table `t_d_productkit_kit`
--
ALTER TABLE `t_d_productkit_kit`
  ADD CONSTRAINT `FK_SE_COMPOSE` FOREIGN KEY (`PRD_ID_KIT`) REFERENCES `t_d_product_prd` (`PRD_ID`),
  ADD CONSTRAINT `FK_T_D_PROD_SE_COMPOS_T_D_PROD2` FOREIGN KEY (`PRD_ID_COMPONENT`) REFERENCES `t_d_product_prd` (`PRD_ID`);

--
-- Contraintes pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  ADD CONSTRAINT `FK_EST_DE_TYPE` FOREIGN KEY (`PTY_ID`) REFERENCES `t_d_producttype_pty` (`PTY_ID`),
  ADD CONSTRAINT `FK_PROVIENT_DE` FOREIGN KEY (`SPL_ID`) REFERENCES `t_d_supplier_spl` (`SPL_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
