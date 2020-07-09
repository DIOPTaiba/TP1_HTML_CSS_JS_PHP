-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 10 juil. 2020 à 01:34
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `banque_peuple`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_embauche` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `login`, `mot_de_passe`, `nom`, `prenom`, `adresse`, `telephone`, `email`, `date_embauche`) VALUES
(1, 'login_admin', 'passeradmin', 'SECK', 'Ngor', 'Dakar', '771234567', 'nseck.ext@simplon.co', '2020-06-27 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `numero_agence` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`numero_agence`, `adresse`, `date_creation`, `id_admin`) VALUES
(1, 'Dakar', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `caissiere`
--

CREATE TABLE `caissiere` (
  `id_caissiere` int(11) NOT NULL,
  `id_employes` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_clients` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `date_inscription` datetime NOT NULL,
  `type_client` varchar(20) NOT NULL,
  `id_responsable_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client_moral`
--

CREATE TABLE `client_moral` (
  `id_client_moral` int(11) NOT NULL,
  `nom_entreprise` varchar(50) NOT NULL,
  `identifiant_entreprise` varchar(30) NOT NULL,
  `raison_social` varchar(50) NOT NULL,
  `id_clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client_non_salarie`
--

CREATE TABLE `client_non_salarie` (
  `id_client_non_salarie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `carte_identite` varchar(15) NOT NULL,
  `id_clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client_salarie`
--

CREATE TABLE `client_salarie` (
  `id_client_salarie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `carte_identite` varchar(15) NOT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `salaire` double NOT NULL,
  `nom_employeur` varchar(30) NOT NULL,
  `adresse_entreprise` varchar(50) NOT NULL,
  `raison_social` varchar(50) NOT NULL,
  `identifiant_entreprise` varchar(50) NOT NULL,
  `id_clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id_comptes` int(11) NOT NULL,
  `numero_compte` varchar(30) NOT NULL,
  `cle_rib` int(11) NOT NULL,
  `solde` double DEFAULT NULL,
  `date_ouverture` datetime NOT NULL,
  `numero_agence` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compte_bloque`
--

CREATE TABLE `compte_bloque` (
  `id_compte_bloque` int(11) NOT NULL,
  `frais_ouverture` double NOT NULL,
  `montant_remuneration` double NOT NULL,
  `duree_blocage` int(11) NOT NULL,
  `id_comptes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compte_courant`
--

CREATE TABLE `compte_courant` (
  `id_compte_courant` int(11) NOT NULL,
  `agios` double NOT NULL,
  `id_comptes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compte_epargne`
--

CREATE TABLE `compte_epargne` (
  `id_compte_epargne` int(11) NOT NULL,
  `frais_ouverture` double NOT NULL,
  `montant_remuneration` double NOT NULL,
  `id_comptes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id_employes` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_embauche` datetime NOT NULL,
  `numero_agence` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id_employes`, `nom`, `prenom`, `adresse`, `telephone`, `email`, `date_embauche`, `numero_agence`, `id_admin`) VALUES
(1, 'DIOP', 'Mor', 'Grand Yoff', '773511003', 'mordioptaiba@gmail.com', '2020-06-27 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etat_compte`
--

CREATE TABLE `etat_compte` (
  `id_etat_compte` int(11) NOT NULL,
  `etat_compte` varchar(10) NOT NULL,
  `date_changement_etat` datetime NOT NULL,
  `id_comptes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `operation_compte`
--

CREATE TABLE `operation_compte` (
  `id_operation_compte` int(11) NOT NULL,
  `type_operation` varchar(15) NOT NULL,
  `montant_operation` double NOT NULL,
  `date_operation` datetime NOT NULL,
  `id_compte_destinataire` int(11) DEFAULT NULL,
  `id_comptes` int(11) NOT NULL,
  `id_employes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `profil_employes`
--

CREATE TABLE `profil_employes` (
  `id_profil` int(11) NOT NULL,
  `profil` varchar(20) NOT NULL,
  `date_debut_poste` datetime NOT NULL,
  `id_employes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil_employes`
--

INSERT INTO `profil_employes` (`id_profil`, `profil`, `date_debut_poste`, `id_employes`) VALUES
(1, 'responsable compte', '2020-06-27 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `responsable_compte`
--

CREATE TABLE `responsable_compte` (
  `id_responsable_compte` int(11) NOT NULL,
  `id_employes` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `responsable_compte`
--

INSERT INTO `responsable_compte` (`id_responsable_compte`, `id_employes`, `login`, `mot_de_passe`) VALUES
(1, 1, '123', 'passer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`numero_agence`),
  ADD KEY `fk_admin_agence` (`id_admin`);

--
-- Index pour la table `caissiere`
--
ALTER TABLE `caissiere`
  ADD PRIMARY KEY (`id_caissiere`),
  ADD KEY `fk_employes_caissiere` (`id_employes`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_clients`),
  ADD KEY `fk_responsable_compte_clients` (`id_responsable_compte`);

--
-- Index pour la table `client_moral`
--
ALTER TABLE `client_moral`
  ADD PRIMARY KEY (`id_client_moral`),
  ADD KEY `fk_clients_client_moral` (`id_clients`);

--
-- Index pour la table `client_non_salarie`
--
ALTER TABLE `client_non_salarie`
  ADD PRIMARY KEY (`id_client_non_salarie`),
  ADD KEY `fk_clients_client_non_salarie` (`id_clients`);

--
-- Index pour la table `client_salarie`
--
ALTER TABLE `client_salarie`
  ADD PRIMARY KEY (`id_client_salarie`),
  ADD KEY `fk_clients_client_salarie` (`id_clients`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id_comptes`),
  ADD KEY `fk_agence_comptes` (`numero_agence`),
  ADD KEY `fk_clients_comptes` (`id_clients`);

--
-- Index pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  ADD PRIMARY KEY (`id_compte_bloque`),
  ADD KEY `fk_comptes_compte_bloque` (`id_comptes`);

--
-- Index pour la table `compte_courant`
--
ALTER TABLE `compte_courant`
  ADD PRIMARY KEY (`id_compte_courant`),
  ADD KEY `fk_comptes_compte_courant` (`id_comptes`);

--
-- Index pour la table `compte_epargne`
--
ALTER TABLE `compte_epargne`
  ADD PRIMARY KEY (`id_compte_epargne`),
  ADD KEY `fk_comptes_compte_epargne` (`id_comptes`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id_employes`),
  ADD KEY `fk_agence_employes` (`numero_agence`),
  ADD KEY `fk_admin_employes` (`id_admin`);

--
-- Index pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  ADD PRIMARY KEY (`id_etat_compte`),
  ADD KEY `fk_comptes_etat_compte` (`id_comptes`);

--
-- Index pour la table `operation_compte`
--
ALTER TABLE `operation_compte`
  ADD PRIMARY KEY (`id_operation_compte`),
  ADD KEY `fk_comptes_operation_compte` (`id_comptes`),
  ADD KEY `fk_employes_operation_compte` (`id_employes`);

--
-- Index pour la table `profil_employes`
--
ALTER TABLE `profil_employes`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `fk_employes_profil_employes` (`id_employes`);

--
-- Index pour la table `responsable_compte`
--
ALTER TABLE `responsable_compte`
  ADD PRIMARY KEY (`id_responsable_compte`),
  ADD KEY `fk_employes_responsable_copmte` (`id_employes`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `numero_agence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `caissiere`
--
ALTER TABLE `caissiere`
  MODIFY `id_caissiere` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_clients` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client_moral`
--
ALTER TABLE `client_moral`
  MODIFY `id_client_moral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client_non_salarie`
--
ALTER TABLE `client_non_salarie`
  MODIFY `id_client_non_salarie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client_salarie`
--
ALTER TABLE `client_salarie`
  MODIFY `id_client_salarie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id_comptes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  MODIFY `id_compte_bloque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_courant`
--
ALTER TABLE `compte_courant`
  MODIFY `id_compte_courant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_epargne`
--
ALTER TABLE `compte_epargne`
  MODIFY `id_compte_epargne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id_employes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  MODIFY `id_etat_compte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `operation_compte`
--
ALTER TABLE `operation_compte`
  MODIFY `id_operation_compte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil_employes`
--
ALTER TABLE `profil_employes`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `responsable_compte`
--
ALTER TABLE `responsable_compte`
  MODIFY `id_responsable_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `fk_admin_agence` FOREIGN KEY (`id_admin`) REFERENCES `administrateur` (`id_admin`);

--
-- Contraintes pour la table `caissiere`
--
ALTER TABLE `caissiere`
  ADD CONSTRAINT `fk_employes_caissiere` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id_employes`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_responsable_compte_clients` FOREIGN KEY (`id_responsable_compte`) REFERENCES `responsable_compte` (`id_responsable_compte`);

--
-- Contraintes pour la table `client_moral`
--
ALTER TABLE `client_moral`
  ADD CONSTRAINT `fk_clients_client_moral` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id_clients`);

--
-- Contraintes pour la table `client_non_salarie`
--
ALTER TABLE `client_non_salarie`
  ADD CONSTRAINT `fk_clients_client_non_salarie` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id_clients`);

--
-- Contraintes pour la table `client_salarie`
--
ALTER TABLE `client_salarie`
  ADD CONSTRAINT `fk_clients_client_salarie` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id_clients`);

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `fk_agence_comptes` FOREIGN KEY (`numero_agence`) REFERENCES `agence` (`numero_agence`),
  ADD CONSTRAINT `fk_clients_comptes` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id_clients`);

--
-- Contraintes pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  ADD CONSTRAINT `fk_comptes_compte_bloque` FOREIGN KEY (`id_comptes`) REFERENCES `comptes` (`id_comptes`);

--
-- Contraintes pour la table `compte_courant`
--
ALTER TABLE `compte_courant`
  ADD CONSTRAINT `fk_comptes_compte_courant` FOREIGN KEY (`id_comptes`) REFERENCES `comptes` (`id_comptes`);

--
-- Contraintes pour la table `compte_epargne`
--
ALTER TABLE `compte_epargne`
  ADD CONSTRAINT `fk_comptes_compte_epargne` FOREIGN KEY (`id_comptes`) REFERENCES `comptes` (`id_comptes`);

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `fk_admin_employes` FOREIGN KEY (`id_admin`) REFERENCES `administrateur` (`id_admin`),
  ADD CONSTRAINT `fk_agence_employes` FOREIGN KEY (`numero_agence`) REFERENCES `agence` (`numero_agence`);

--
-- Contraintes pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  ADD CONSTRAINT `fk_comptes_etat_compte` FOREIGN KEY (`id_comptes`) REFERENCES `comptes` (`id_comptes`);

--
-- Contraintes pour la table `operation_compte`
--
ALTER TABLE `operation_compte`
  ADD CONSTRAINT `fk_comptes_operation_compte` FOREIGN KEY (`id_comptes`) REFERENCES `comptes` (`id_comptes`),
  ADD CONSTRAINT `fk_employes_operation_compte` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id_employes`);

--
-- Contraintes pour la table `profil_employes`
--
ALTER TABLE `profil_employes`
  ADD CONSTRAINT `fk_employes_profil_employes` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id_employes`);

--
-- Contraintes pour la table `responsable_compte`
--
ALTER TABLE `responsable_compte`
  ADD CONSTRAINT `fk_employes_responsable_copmte` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id_employes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
