-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-alexandre-oncino.alwaysdata.net
-- Generation Time: Nov 08, 2024 at 08:12 PM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexandre-oncino_apero_party`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1, 'login', '$2y$10$x6mTTU7.N9Zjy7pAPa9oT.8wwrEhYtyWgx5BGShl07Iuz26AJZ.we');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id` int(6) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id`, `nom`, `prenom`, `message`, `date`) VALUES
(1, 'Oncino', 'Alexandre', 'tfr', '2024-10-15 07:04:28'),
(2, 'Oncino', 'Alexandre', 'fdfgbdfhbdf', '2024-10-15 07:33:33'),
(3, 'Oncino', 'Alexandre', 'refdgfds', '2024-10-15 07:37:38'),
(4, 'Oncino', 'Alexandre', 'vevevev', '2024-10-15 07:59:39'),
(5, 'Oncino', 'Alexandre', 'Je trouve que vos petits fours sont vraiment délicieux.', '2024-10-15 09:05:05'),
(6, 'Oncino', 'Alexandre', 'feve', '2024-10-21 12:08:58'),
(7, '', '', 'a', '2024-10-21 13:25:37'),
(8, 'L\'equipe est toca', 'ICH ICH', 'ICH ICH', '2024-10-25 13:47:10'),
(9, 'Oncino', 'Alexandre', 'Superbe dégustation.', '2024-10-27 11:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `image_url`) VALUES
(1, 'Plateaux Charcuterie', 'Mortadelle, Jambon blanc, Saucisson, Salami, Chorizo', 16.00, 'IMGViewer/Plateau-charcut.jpg'),
(3, 'Box Saumon', 'Club sandwich saumon, Verrine saumon', 20.00, 'IMGViewer/Box_saumon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `texte_de_presentation`
--

CREATE TABLE `texte_de_presentation` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `texte_de_presentation`
--

INSERT INTO `texte_de_presentation` (`id`, `content`) VALUES
(1, 'Apéro party c’est un Traiteur salé et sucré pour vos apéros entre amis, vos anniversaires,  vos baptêmes,  vos communions, vos réceptions en tout genre, vos repas d’entreprise ou même vos soirées solo. Vous avez une demande particulière, contactez nous par mail, par téléphone ou via notre formulaire directement sur notre page Contact. Vous souhaitez une informations sur nos produits, sur les allergènes ou mêmes effectuer un devis, remplissez le formulaire de la page Contact.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texte_de_presentation`
--
ALTER TABLE `texte_de_presentation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `texte_de_presentation`
--
ALTER TABLE `texte_de_presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
