-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 10, 2019 la 10:39 PM
-- Versiune server: 10.1.32-MariaDB
-- Versiune PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `modi`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(55) NOT NULL,
  `county` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `address`
--

INSERT INTO `address` (`id`, `name`, `phone`, `address`, `city`, `county`, `id_user`) VALUES
(4, 'Alin', '0749621399', 'Str. Fara Nume, nr. 11', 'Fagaras', 'Brasov', 1),
(5, 'Marius', '0747382488', 'Str. Fara Nume, nr. 11', 'Sacele', 'Brasov', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `id_category` int(11) NOT NULL,
  `description` longtext,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `article`
--

INSERT INTO `article` (`id`, `name`, `id_category`, `description`, `date_start`, `date_end`, `price`) VALUES
(1, 'Paine', 26, NULL, NULL, NULL, 1.2),
(2, 'Antonia', 32, 'Locatie: Sala Polivalenta<br>Pentru bilete VIP, sunati la: 0847394547', '2019-04-30 20:00:00', '2019-04-30 23:00:00', 25);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `article_image`
--

CREATE TABLE `article_image` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `article_image`
--

INSERT INTO `article_image` (`id`, `id_article`, `id_image`, `featured`) VALUES
(1, 1, 3, 1),
(2, 1, 5, 0),
(3, 1, 4, 0),
(4, 1, 2, 0),
(5, 2, 6, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `name_plural` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `category`
--

INSERT INTO `category` (`id`, `id_parent`, `slug`, `name`, `name_plural`) VALUES
(1, 0, 'produs', 'Produs', 'Produse'),
(2, 0, 'eveniment', 'Eveniment', 'Evenimente'),
(26, 1, 'aliment', 'Aliment', 'Alimente'),
(29, 2, 'film', 'Film', 'Filme'),
(30, 1, 'menaj', 'Menaj', 'Articole de Menaj'),
(31, 1, 'medicament', 'Medicament', 'Medicamente'),
(32, 2, 'concert', 'Concert', 'Concerte'),
(33, 2, 'opera', 'Opera', NULL),
(34, 2, 'teatru', 'Teatru', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `favorite_store`
--

CREATE TABLE `favorite_store` (
  `id` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `image`
--

INSERT INTO `image` (`id`, `name`) VALUES
(1, 'blank.png'),
(2, 'baked-bakery-blur-209403.jpg'),
(3, 'baked-baker-ball-shaped-745988.jpg'),
(4, 'bake-baking-bread-209291.jpg'),
(5, 'baguette-bakery-bread-5802.jpg'),
(6, 'band-concert-dark-1699161.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `order_article`
--

CREATE TABLE `order_article` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `order_article`
--

INSERT INTO `order_article` (`id`, `id_order`, `id_article`, `quantity`) VALUES
(3, 9, 1, 3),
(4, 9, 2, 1),
(5, 10, 1, 1),
(6, 14, 2, 1),
(7, 15, 1, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `id_address` int(11) NOT NULL,
  `details` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `order_list`
--

INSERT INTO `order_list` (`id`, `date`, `id_user`, `id_address`, `details`) VALUES
(9, '2019-04-09 20:28:24', 1, 5, 'Some teste'),
(10, '2019-04-09 20:30:37', 1, 4, ''),
(14, '2019-04-09 20:33:29', 1, 4, ''),
(15, '2019-04-10 17:52:06', 1, 5, 'test');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `store`
--

INSERT INTO `store` (`id`, `name`) VALUES
(1, 'lidl'),
(2, 'kaufland'),
(5, 'catena'),
(6, 'bla');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rights` varchar(5) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `register_date`, `rights`, `phone`) VALUES
(1, 'Alin', 'Cirja', 'alin@alin.ro', '$2y$10$H.gzfhUjlJ3lsyhZeXmjze.4Z05TNldT4bz3.ljYyLmyDUcIzNuC6', '2019-03-29 16:36:14', '', '');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexuri pentru tabele `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexuri pentru tabele `article_image`
--
ALTER TABLE `article_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_image` (`id_image`);

--
-- Indexuri pentru tabele `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexuri pentru tabele `favorite_store`
--
ALTER TABLE `favorite_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_store` (`id_store`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexuri pentru tabele `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `order_article`
--
ALTER TABLE `order_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_article` (`id_article`);

--
-- Indexuri pentru tabele `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_address` (`id_address`);

--
-- Indexuri pentru tabele `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `article_image`
--
ALTER TABLE `article_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pentru tabele `favorite_store`
--
ALTER TABLE `favorite_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `order_article`
--
ALTER TABLE `order_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pentru tabele `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `article_image`
--
ALTER TABLE `article_image`
  ADD CONSTRAINT `article_image_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `article_image_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `image` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `favorite_store`
--
ALTER TABLE `favorite_store`
  ADD CONSTRAINT `favorite_store_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `favorite_store_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `order_article`
--
ALTER TABLE `order_article`
  ADD CONSTRAINT `order_article_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_article_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_list` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`id_address`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
