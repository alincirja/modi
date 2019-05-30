-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 31, 2019 la 01:32 AM
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
(5, 'Marius', '0747382488', 'Str. Fara Nume, nr. 11', 'Sacele', 'Brasov', 1),
(7, 'Diana Cirja', '0747847484', 'Some Street, name, number 12', 'Aha', 'Toplita', 2),
(8, 'Nicu', '0749621399', 'Some Street, name, number 12', 'Sacele', 'Toplita', 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `id_category` int(11) NOT NULL,
  `description` longtext,
  `date_start` varchar(55) DEFAULT NULL,
  `date_end` varchar(55) DEFAULT NULL,
  `price` double NOT NULL,
  `measure` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `article`
--

INSERT INTO `article` (`id`, `name`, `id_category`, `description`, `date_start`, `date_end`, `price`, `measure`) VALUES
(1, 'Paine', 26, NULL, NULL, NULL, 1.2, 'buc'),
(2, 'Antonia', 32, 'Locatie: Sala Polivalenta<br>Pentru bilete VIP, sunati la: 0847394547', '2019-04-30 20:00:00', '2019-04-30 23:00:00', 25, 'bilet'),
(3, 'Test', 31, 'Test descriere', ' ', ' ', 45, 'buc');

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
(2, 1, 5, 0),
(3, 1, 4, 0),
(4, 1, 2, 0),
(5, 2, 6, 0),
(7, 1, 2, 0),
(9, 1, 2, 0),
(10, 1, 2, 0),
(11, 1, 2, 0),
(12, 1, 2, 0),
(13, 2, 6, 0),
(15, 5, 4, 0),
(20, 3, 8, 0);

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
-- Structură tabel pentru tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `subject` text NOT NULL,
  `title` text,
  `message` longtext NOT NULL,
  `occupation` text,
  `new` tinyint(1) NOT NULL DEFAULT '1',
  `public` tinyint(1) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `title`, `message`, `occupation`, `new`, `public`, `time`) VALUES
(2, 'Alin', 'alin@asd.com', '0784858343', 'contact', '', 'test', '', 0, 0, '2019-05-30 23:14:30'),
(3, 'Jon Snow', 'jon@snow.com', '0784858343', 'feedback', '', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum, este acela cÄƒ are o distribuÅ£ie a literelor mai mult sau mai puÅ£in normale, faÅ£Äƒ de utilizarea', 'Ranger', 0, 0, '2019-05-31 00:53:47'),
(4, 'Brandon Stark', 'bran@stark.com', '0784858343', 'complaint', '', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum, este acela cÄƒ are o distribuÅ£ie a literelor mai mult sau mai puÅ£in normale, faÅ£Äƒ de utilizarea', '', 1, 0, '2019-05-31 00:54:13'),
(5, 'Sansa Stark', 'sansa@stark.com', '0784858343', 'contact', '', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum, este acela cÄƒ are o distribuÅ£ie a literelor mai mult sau mai puÅ£in normale, faÅ£Äƒ de utilizarea', '', 1, 0, '2019-05-31 00:54:35'),
(6, 'Tywin Lanister', 'tywin@lanister.com', '0784858343', 'feedback', 'Lanisters send their regards', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum, este acela cÄƒ are o distribuÅ£ie a literelor mai mult sau mai puÅ£in normale, faÅ£Äƒ de utilizarea', 'Hand of the King', 0, 1, '2019-05-31 01:51:32'),
(7, 'Daenerys Targaryen', 'dany@drogon.com', '0784858343', 'feedback', 'Burn them all', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci', 'Mad Queen', 0, 1, '2019-05-31 02:02:35');

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
  `name` text NOT NULL,
  `title` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `image`
--

INSERT INTO `image` (`id`, `name`, `title`) VALUES
(2, 'baked-bakery-blur-209403.jpg', NULL),
(4, 'bake-baking-bread-209291.jpg', NULL),
(5, 'baguette-bakery-bread-5802.jpg', NULL),
(6, 'band-concert-dark-1699161.jpg', NULL),
(8, '5ce6e2486f4f73181back3.jpg', NULL);

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
(13, 21, 1, 1),
(14, 22, 1, 3),
(15, 22, 2, 1),
(16, 23, 1, 4),
(17, 23, 2, 3),
(18, 24, 2, 3),
(19, 25, 1, 2),
(20, 26, 3, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `id_address` int(11) NOT NULL,
  `details` longtext,
  `total_price` float NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'Comanda plasata'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `order_list`
--

INSERT INTO `order_list` (`id`, `date`, `id_user`, `id_address`, `details`, `total_price`, `status`) VALUES
(21, '2019-04-13 20:30:40', 1, 4, '', 1.2, 'Comanda plasata'),
(22, '2019-04-14 13:03:54', 1, 4, '', 28.6, 'Comanda anulata'),
(23, '2019-04-21 15:08:57', 1, 5, 'Test', 79.8, 'Comanda plasata'),
(24, '2019-04-21 15:16:10', 2, 7, 'Something that need to take attention and procced... ma rog...', 75, 'Comanda livrata'),
(25, '2019-05-01 14:30:22', 1, 4, '', 2.4, 'Comanda plasata'),
(26, '2019-05-30 18:58:23', 4, 8, '', 45, 'Comanda plasata');

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
  `phone` text NOT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `register_date`, `rights`, `phone`, `age`, `sex`) VALUES
(1, 'Alin', 'Cirja', 'alin@alin.ro', '$2y$10$aHrNoFlF32gprYdL2kC3zOLdahWNkwdl2We7dS1SsgTA4QpCSrD8C', '2019-03-29 16:36:14', 'admin', '0874937459', NULL, NULL),
(2, 'Diana', 'Didi', 'diana@didi.com', '$2y$10$4GcBgN3O9IOYklqcdBlZWet8.3haT8h94JQ0L81jeDwwlrMZeSA9e', '2019-04-21 15:13:56', '', '', NULL, NULL),
(3, 'Test', 'Test', 'test@test.com', '$2y$10$Lp7M5IHDa5BetF.YeWhruOMcOj1QZP6MaEXM4//jEH2xCD8VkdbtS', '2019-05-30 16:15:36', '', '', NULL, NULL),
(4, 'Test', 'Test', 'test1@test.com', '$2y$10$Yv.stxkf0XAhRaGnOtL1VeBQJWXKKQQEgog6wJlE8gljOM9VfpaD2', '2019-05-30 18:55:03', '', '', 13, 'masculin');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `article_image`
--
ALTER TABLE `article_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pentru tabele `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `favorite_store`
--
ALTER TABLE `favorite_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `order_article`
--
ALTER TABLE `order_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pentru tabele `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `favorite_store`
--
ALTER TABLE `favorite_store`
  ADD CONSTRAINT `favorite_store_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `favorite_store_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
