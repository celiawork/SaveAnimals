-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 avr. 2021 à 09:48
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saveanimals`
--

-- --------------------------------------------------------

--
-- Structure de la table `actuality`
--

CREATE TABLE `actuality` (
  `id_actuality` int(11) NOT NULL,
  `wording_actuality` varchar(45) NOT NULL,
  `content_actuality` longtext NOT NULL,
  `id_type_actuality` int(50) DEFAULT NULL,
  `date_publication_actuality` date NOT NULL,
  `id_image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actuality`
--

INSERT INTO `actuality` (`id_actuality`, `wording_actuality`, `content_actuality`, `id_type_actuality`, `date_publication_actuality`, `id_image`) VALUES
(77, 'Tous ensemble', 'Donec ut libero quam. Praesent convallis scelerisque tortor, sed viverra sem. Quisque ut velit at massa consectetur posuere id nec urna. In facilisis rutrum lobortis. Aenean tristique tristique lorem, sit amet scelerisque nulla dapibus a. Mauris posuere convallis velit. Duis sed odio lacus. Vestibulum et sollicitudin metus, eget commodo sem. Nullam varius sodales metus, vitae elementum ante porta ac. In eu odio at odio hendrerit aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras iaculis posuere lorem eget malesuada. Suspendisse id pulvinar ex. Duis et sapien dui. Donec accumsan, dui eget tristique dignissim, magna quam posuere mauris, id ultrices risus dui in elit. Fusce viverra elit sit amet magna lobortis, a varius purus molestie.', 3, '2021-02-02', 56),
(78, 'Nouvelle famille ', 'Donec ut libero quam. Praesent convallis scelerisque tortor, sed viverra sem. Quisque ut velit at massa consectetur posuere id nec urna. In facilisis rutrum lobortis. Aenean tristique tristique lorem, sit amet scelerisque nulla dapibus a. Mauris posuere convallis velit. Duis sed odio lacus. Vestibulum et sollicitudin metus, eget commodo sem. Nullam varius sodales metus, vitae elementum ante porta ac. In eu odio at odio hendrerit aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras iaculis posuere lorem eget malesuada. Suspendisse id pulvinar ex. Duis et sapien dui. Donec accumsan, dui eget tristique dignissim, magna quam posuere mauris, id ultrices risus dui in elit. Fusce viverra elit sit amet magna lobortis, a varius purus molestie.', 1, '2021-02-02', 57);

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

CREATE TABLE `administrator` (
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`login`, `password`) VALUES
('admin', '$2y$10$5MY.zn3rfUfVDwtlbmJK6OsaIivl/pzE83vj3oAhtea9WtAc.J4k6');

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `name_animal` varchar(45) NOT NULL,
  `type_animal` enum('Chien','Chat','Lapin','Hamster') NOT NULL,
  `gender` enum('Femelle','Mâle') NOT NULL,
  `birth` date DEFAULT NULL,
  `friend_dog` enum('oui','non','N/A') DEFAULT NULL,
  `friend_cat` enum('oui','non','N/A') DEFAULT NULL,
  `friend_child` enum('oui','non','N/A') DEFAULT NULL,
  `description_animal` longtext DEFAULT NULL,
  `adoption_description_animal` longtext DEFAULT NULL,
  `engagement_description_animal` longtext DEFAULT NULL,
  `localisation` varchar(45) DEFAULT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id_animal`, `name_animal`, `type_animal`, `gender`, `birth`, `friend_dog`, `friend_cat`, `friend_child`, `description_animal`, `adoption_description_animal`, `engagement_description_animal`, `localisation`, `id_status`) VALUES
(50, 'Cerise', 'Chien', 'Femelle', '2020-01-20', 'oui', 'non', 'oui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut placerat turpis. Nunc nisi ipsum, aliquam sed venenatis quis, tincidunt ac tellus. Fusce ornare dolor at vulputate cursus. Nunc varius elit ligula, vel dictum dolor vestibulum sed. Pellentesque nec auctor felis. Maecenas varius velit sem, et vulputate tortor tincidunt quis. Vestibulum sed posuere enim. Duis semper vel nisi ac aliquet. Nulla porta lectus mauris, quis blandit quam interdum quis. Nullam eu ornare dolor.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut placerat turpis. Nunc nisi ipsum, aliquam sed venenatis quis, tincidunt ac tellus. Fusce ornare dolor at vulputate cursus. Nunc varius elit ligula, vel dictum dolor vestibulum sed. Pellentesque nec auctor felis. Maecenas varius velit sem, et vulputate tortor tincidunt quis. Vestibulum sed posuere enim. Duis semper vel nisi ac aliquet. Nulla porta lectus mauris, quis blandit quam interdum quis. Nullam eu ornare dolor.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut placerat turpis. Nunc nisi ipsum, aliquam sed venenatis quis, tincidunt ac tellus. Fusce ornare dolor at vulputate cursus. Nunc varius elit ligula, vel dictum dolor vestibulum sed. Pellentesque nec auctor felis. Maecenas varius velit sem, et vulputate tortor tincidunt quis. Vestibulum sed posuere enim. Duis semper vel nisi ac aliquet. Nulla porta lectus mauris, quis blandit quam interdum quis. Nullam eu ornare dolor.', 'Montpellier', 1),
(51, 'Gathou', 'Chat', '', '2020-06-05', 'non', 'non', 'oui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut placerat turpis. Nunc nisi ipsum, aliquam sed venenatis quis, tincidunt ac tellus. Fusce ornare dolor at vulputate cursus. Nunc varius elit ligula, vel dictum dolor vestibulum sed. Pellentesque nec auctor felis. Maecenas varius velit sem, et vulputate tortor tincidunt quis. Vestibulum sed posuere enim. Duis semper vel nisi ac aliquet. Nulla porta lectus mauris, quis blandit quam interdum quis. Nullam eu ornare dolor.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut placerat turpis. Nunc nisi ipsum, aliquam sed venenatis quis, tincidunt ac tellus. Fusce ornare dolor at vulputate cursus. Nunc varius elit ligula, vel dictum dolor vestibulum sed. Pellentesque nec auctor felis. Maecenas varius velit sem, et vulputate tortor tincidunt quis. Vestibulum sed posuere enim. Duis semper vel nisi ac aliquet. Nulla porta lectus mauris, quis blandit quam interdum quis. Nullam eu ornare dolor.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut placerat turpis. Nunc nisi ipsum, aliquam sed venenatis quis, tincidunt ac tellus. Fusce ornare dolor at vulputate cursus. Nunc varius elit ligula, vel dictum dolor vestibulum sed. Pellentesque nec auctor felis. Maecenas varius velit sem, et vulputate tortor tincidunt quis. Vestibulum sed posuere enim. Duis semper vel nisi ac aliquet. Nulla porta lectus mauris, quis blandit quam interdum quis. Nullam eu ornare dolor.', 'Lorem ipsum dolor sit amet, consectetur adipi', 2),
(56, 'Gizmo', 'Lapin', 'Mâle', '2014-01-10', 'non', 'non', 'non', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales turpis massa. Vivamus bibendum scelerisque sapien pellentesque pellentesque. Maecenas eu turpis porttitor ex congue ornare sit amet consectetur dolor. Maecenas pretium interdum mi, ut imperdiet purus ultricies vitae. Pellentesque cursus, eros et consectetur imperdiet, nisi diam malesuada nulla, non scelerisque sapien metus sed lorem. Aenean sodales nisl vel risus luctus, eu condimentum lacus dignissim. Mauris quis varius metus. Donec quam massa, viverra at ipsum ac, egestas rutrum massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales turpis massa. Vivamus bibendum scelerisque sapien pellentesque pellentesque. Maecenas eu turpis porttitor ex congue ornare sit amet consectetur dolor. Maecenas pretium interdum mi, ut imperdiet purus ultricies vitae. Pellentesque cursus, eros et consectetur imperdiet, nisi diam malesuada nulla, non scelerisque sapien metus sed lorem. Aenean sodales nisl vel risus luctus, eu condimentum lacus dignissim. Mauris quis varius metus. Donec quam massa, viverra at ipsum ac, egestas rutrum massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales turpis massa. Vivamus bibendum scelerisque sapien pellentesque pellentesque. Maecenas eu turpis porttitor ex congue ornare sit amet consectetur dolor. Maecenas pretium interdum mi, ut imperdiet purus ultricies vitae. Pellentesque cursus, eros et consectetur imperdiet, nisi diam malesuada nulla, non scelerisque sapien metus sed lorem. Aenean sodales nisl vel risus luctus, eu condimentum lacus dignissim. Mauris quis varius metus. Donec quam massa, viverra at ipsum ac, egestas rutrum massa.', 'Lorem ipsum dolor sit amet, consectetur adipi', 1),
(57, 'Melli', 'Chien', 'Femelle', '2013-05-05', 'oui', 'oui', 'oui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales turpis massa. Vivamus bibendum scelerisque sapien pellentesque pellentesque. Maecenas eu turpis porttitor ex congue ornare sit amet consectetur dolor. Maecenas pretium interdum mi, ut imperdiet purus ultricies vitae. Pellentesque cursus, eros et consectetur imperdiet, nisi diam malesuada nulla, non scelerisque sapien metus sed lorem. Aenean sodales nisl vel risus luctus, eu condimentum lacus dignissim. Mauris quis varius metus. Donec quam massa, viverra at ipsum ac, egestas rutrum massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales turpis massa. Vivamus bibendum scelerisque sapien pellentesque pellentesque. Maecenas eu turpis porttitor ex congue ornare sit amet consectetur dolor. Maecenas pretium interdum mi, ut imperdiet purus ultricies vitae. Pellentesque cursus, eros et consectetur imperdiet, nisi diam malesuada nulla, non scelerisque sapien metus sed lorem. Aenean sodales nisl vel risus luctus, eu condimentum lacus dignissim. Mauris quis varius metus. Donec quam massa, viverra at ipsum ac, egestas rutrum massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales turpis massa. Vivamus bibendum scelerisque sapien pellentesque pellentesque. Maecenas eu turpis porttitor ex congue ornare sit amet consectetur dolor. Maecenas pretium interdum mi, ut imperdiet purus ultricies vitae. Pellentesque cursus, eros et consectetur imperdiet, nisi diam malesuada nulla, non scelerisque sapien metus sed lorem. Aenean sodales nisl vel risus luctus, eu condimentum lacus dignissim. Mauris quis varius metus. Donec quam massa, viverra at ipsum ac, egestas rutrum massa.', 'Lorem ipsum dolor sit amet, consectetur adipi', 1),
(58, 'Capucine', 'Chat', 'Femelle', '2018-01-28', 'non', 'non', 'oui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget metus leo. Nunc lectus leo, faucibus sit amet efficitur ut, convallis non felis. Praesent placerat sem ut neque aliquam volutpat. Aliquam facilisis et augue et lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec finibus, metus laoreet euismod imperdiet, ipsum nunc dictum libero, ac rhoncus ex diam in orci. Mauris id nibh et nibh mattis mollis et quis lacus. Curabitur aliquam nibh nec magna mollis, quis vulputate augue ullamcorper. In id tellus a leo tempus laoreet.\r\n\r\nSed turpis ligula, lacinia eu consequat a, tempor nec nisl. Morbi dolor massa, aliquam eget placerat eu, faucibus ac augue. Integer fermentum sem id mauris dignissim ornare. Cras dictum tempus venenatis. Vestibulum laoreet aliquam vehicula. Nullam id aliquam odio. Fusce vel accumsan ante. Aliquam sit amet ligula et lacus consequat finibus. Aenean suscipit, orci vel hendrerit consequat, velit metus varius neque, ut egestas ligula tellus eu tortor.\r\n\r\nIn suscipit mattis risus a blandit. Sed lobortis congue velit nec vestibulum. Nam posuere leo eget purus ullamcorper congue. Cras vitae orci ut enim fringilla pellentesque. Praesent molestie nunc vel dui pellentesque vulputate eu id enim. Nullam at lectus vel felis dictum feugiat. Integer eu turpis massa. Ut fringilla faucibus sem. Aliquam convallis magna orci, et sollicitudin eros pretium ut. Praesent varius lacus a quam viverra, sit amet congue lectus bibendum. Sed lobortis turpis nec odio iaculis ultricies. Vestibulum ac aliquet enim. Pellentesque nec nibh sed quam dictum feugiat nec sed augue.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget metus leo. Nunc lectus leo, faucibus sit amet efficitur ut, convallis non felis. Praesent placerat sem ut neque aliquam volutpat. Aliquam facilisis et augue et lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec finibus, metus laoreet euismod imperdiet, ipsum nunc dictum libero, ac rhoncus ex diam in orci. Mauris id nibh et nibh mattis mollis et quis lacus. Curabitur aliquam nibh nec magna mollis, quis vulputate augue ullamcorper. In id tellus a leo tempus laoreet.\r\n\r\nSed turpis ligula, lacinia eu consequat a, tempor nec nisl. Morbi dolor massa, aliquam eget placerat eu, faucibus ac augue. Integer fermentum sem id mauris dignissim ornare. Cras dictum tempus venenatis. Vestibulum laoreet aliquam vehicula. Nullam id aliquam odio. Fusce vel accumsan ante. Aliquam sit amet ligula et lacus consequat finibus. Aenean suscipit, orci vel hendrerit consequat, velit metus varius neque, ut egestas ligula tellus eu tortor.\r\n\r\nIn suscipit mattis risus a blandit. Sed lobortis congue velit nec vestibulum. Nam posuere leo eget purus ullamcorper congue. Cras vitae orci ut enim fringilla pellentesque. Praesent molestie nunc vel dui pellentesque vulputate eu id enim. Nullam at lectus vel felis dictum feugiat. Integer eu turpis massa. Ut fringilla faucibus sem. Aliquam convallis magna orci, et sollicitudin eros pretium ut. Praesent varius lacus a quam viverra, sit amet congue lectus bibendum. Sed lobortis turpis nec odio iaculis ultricies. Vestibulum ac aliquet enim. Pellentesque nec nibh sed quam dictum feugiat nec sed augue.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget metus leo. Nunc lectus leo, faucibus sit amet efficitur ut, convallis non felis. Praesent placerat sem ut neque aliquam volutpat. Aliquam facilisis et augue et lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec finibus, metus laoreet euismod imperdiet, ipsum nunc dictum libero, ac rhoncus ex diam in orci. Mauris id nibh et nibh mattis mollis et quis lacus. Curabitur aliquam nibh nec magna mollis, quis vulputate augue ullamcorper. In id tellus a leo tempus laoreet.\r\n\r\nSed turpis ligula, lacinia eu consequat a, tempor nec nisl. Morbi dolor massa, aliquam eget placerat eu, faucibus ac augue. Integer fermentum sem id mauris dignissim ornare. Cras dictum tempus venenatis. Vestibulum laoreet aliquam vehicula. Nullam id aliquam odio. Fusce vel accumsan ante. Aliquam sit amet ligula et lacus consequat finibus. Aenean suscipit, orci vel hendrerit consequat, velit metus varius neque, ut egestas ligula tellus eu tortor.\r\n\r\nIn suscipit mattis risus a blandit. Sed lobortis congue velit nec vestibulum. Nam posuere leo eget purus ullamcorper congue. Cras vitae orci ut enim fringilla pellentesque. Praesent molestie nunc vel dui pellentesque vulputate eu id enim. Nullam at lectus vel felis dictum feugiat. Integer eu turpis massa. Ut fringilla faucibus sem. Aliquam convallis magna orci, et sollicitudin eros pretium ut. Praesent varius lacus a quam viverra, sit amet congue lectus bibendum. Sed lobortis turpis nec odio iaculis ultricies. Vestibulum ac aliquet enim. Pellentesque nec nibh sed quam dictum feugiat nec sed augue.', 'Lorem ipsum dolor sit amet, consectetur adipi', 5);

-- --------------------------------------------------------

--
-- Structure de la table `animal_actuality`
--

CREATE TABLE `animal_actuality` (
  `id_animal` int(11) NOT NULL,
  `id_actuality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `animal_character`
--

CREATE TABLE `animal_character` (
  `id_character` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animal_character`
--

INSERT INTO `animal_character` (`id_character`, `id_animal`) VALUES
(1, 58),
(2, 50),
(2, 51),
(3, 50),
(3, 56),
(3, 57),
(4, 51),
(4, 57),
(4, 58),
(5, 50),
(5, 56),
(6, 51),
(6, 56),
(6, 57),
(6, 58);

-- --------------------------------------------------------

--
-- Structure de la table `animal_image`
--

CREATE TABLE `animal_image` (
  `id_animal` int(11) NOT NULL,
  `id_images` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animal_image`
--

INSERT INTO `animal_image` (`id_animal`, `id_images`) VALUES
(50, 50),
(51, 51),
(56, 62),
(57, 63),
(58, 65);

-- --------------------------------------------------------

--
-- Structure de la table `character`
--

CREATE TABLE `character` (
  `id_character` int(11) NOT NULL,
  `wording_character_m` varchar(45) NOT NULL,
  `wording_character_f` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `character`
--

INSERT INTO `character` (`id_character`, `wording_character_m`, `wording_character_f`) VALUES
(1, 'Calme', 'Calme'),
(2, 'Doux', 'Douce'),
(3, 'Gentil', 'Gentille'),
(4, 'Joueur', 'Joueuse'),
(5, 'Dormeur', 'Dormeuse'),
(6, 'Câlin', 'Câline');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `wording_image` varchar(45) NOT NULL,
  `url_image` varchar(100) NOT NULL,
  `description_image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_image`, `wording_image`, `url_image`, `description_image`) VALUES
(50, 'Cerise', 'animals/Cerise_cerise.jpg', 'Cerise'),
(51, 'Gathou', 'animals/Gathou_Gathou.jpg', 'Gathou'),
(56, 'Tous ensemble_amis.jpg', 'news/Tous ensemble_amis.jpg', 'Tous ensemble_amis.jpg'),
(57, 'Nouvelle famille _Marley.jpg', 'news/Nouvelle famille _Melli.jpg', 'Nouvelle famille _Melli.jpg'),
(62, 'Gizmo', 'animals/Gizmo_gizmo.jpg', 'Gizmo'),
(63, 'Melli', 'animals/Melli_Melli.jpg', 'Melli'),
(65, 'Capucine', 'animals/Capucine_capucine.jpg', 'Capucine');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `wording_status` varchar(45) NOT NULL,
  `description_status` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id_status`, `wording_status`, `description_status`) VALUES
(1, 'A l\'adoption', 'Venez adopter un animal'),
(2, 'Adopté', 'Animal adopté'),
(5, 'FALD', 'Famille d\'accueil longue durée'),
(6, 'A rejoind les étoiles', 'Les animaux nous qui nous on quittés');

-- --------------------------------------------------------

--
-- Structure de la table `type_actuality`
--

CREATE TABLE `type_actuality` (
  `id_type_actuality` int(11) NOT NULL,
  `wording_type_actuality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_actuality`
--

INSERT INTO `type_actuality` (`id_type_actuality`, `wording_type_actuality`) VALUES
(1, 'News'),
(2, 'Actions'),
(3, 'Events');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actuality`
--
ALTER TABLE `actuality`
  ADD PRIMARY KEY (`id_actuality`),
  ADD KEY `FK_Actuality_type` (`id_type_actuality`),
  ADD KEY `FK_Actuality_images` (`id_image`);

--
-- Index pour la table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `fk_Animal_Status` (`id_status`);

--
-- Index pour la table `animal_actuality`
--
ALTER TABLE `animal_actuality`
  ADD PRIMARY KEY (`id_animal`,`id_actuality`),
  ADD KEY `fk_Animal_has_Actuality_Actuality1` (`id_actuality`);

--
-- Index pour la table `animal_character`
--
ALTER TABLE `animal_character`
  ADD PRIMARY KEY (`id_character`,`id_animal`),
  ADD KEY `FK_animal_character` (`id_animal`);

--
-- Index pour la table `animal_image`
--
ALTER TABLE `animal_image`
  ADD PRIMARY KEY (`id_animal`,`id_images`),
  ADD KEY `FK_images_animal` (`id_images`);

--
-- Index pour la table `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`id_character`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Index pour la table `type_actuality`
--
ALTER TABLE `type_actuality`
  ADD PRIMARY KEY (`id_type_actuality`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actuality`
--
ALTER TABLE `actuality`
  MODIFY `id_actuality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `character`
--
ALTER TABLE `character`
  MODIFY `id_character` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `type_actuality`
--
ALTER TABLE `type_actuality`
  MODIFY `id_type_actuality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actuality`
--
ALTER TABLE `actuality`
  ADD CONSTRAINT `FK_Actuality_images` FOREIGN KEY (`id_image`) REFERENCES `images` (`id_image`),
  ADD CONSTRAINT `FK_Actuality_type` FOREIGN KEY (`id_type_actuality`) REFERENCES `type_actuality` (`id_type_actuality`);

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_Animal_Status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `animal_actuality`
--
ALTER TABLE `animal_actuality`
  ADD CONSTRAINT `fk_Animal_has_Actuality_Actuality1` FOREIGN KEY (`id_actuality`) REFERENCES `actuality` (`id_actuality`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Animal_has_Actuality_Animal1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `animal_character`
--
ALTER TABLE `animal_character`
  ADD CONSTRAINT `FK_animal_character` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_character_animal` FOREIGN KEY (`id_character`) REFERENCES `character` (`id_character`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `animal_image`
--
ALTER TABLE `animal_image`
  ADD CONSTRAINT `FK_animal_images` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_images_animal` FOREIGN KEY (`id_images`) REFERENCES `images` (`id_image`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
