-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 10:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modi`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address_name` varchar(55) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(55) NOT NULL,
  `county` varchar(25) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address_name`, `address`, `city`, `county`, `postal_code`, `id_user`) VALUES
(1, 'Brasov', 'strada universitatii, brasov', 'brasov', 'Romania', '234567', 1),
(2, 'Brasov', 'strada universitatii, brasov', 'brasov', 'Romania', '234575', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_image` int(11) NOT NULL,
  `details` longtext NOT NULL,
  `date_time` datetime NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `id_image`, `details`, `date_time`, `id_category`) VALUES
(1, 'concert', 1, 'bla bla', '0000-00-00 00:00:00', 5),
(2, 'concert', 1, 'bla bla', '2003-03-02 10:00:00', 5),
(3, 'airfestival', 1, 'frumos', '2019-03-30 07:37:00', 4),
(4, 'teatrul sica alexandrescu', 1, 'comedie', '2019-03-28 12:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `slug`, `name`) VALUES
(1, 'film', 'Film'),
(2, 'teatru', 'Teatru'),
(3, 'opera', 'Opera'),
(4, 'festival', 'Festival'),
(5, 'concert', 'Concert');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date`, `id_user`, `details`) VALUES
(1, '2019-03-30 09:15:08', 1, 'ciocolata, banane, dulciuri');

-- --------------------------------------------------------

--
-- Table structure for table `order_event`
--

CREATE TABLE `order_event` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_event`
--

INSERT INTO `order_event` (`id`, `id_event`, `id_order`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `id_product`, `id_order`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `description` longtext NOT NULL,
  `id_image` int(11) DEFAULT NULL,
  `id_store` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `id_image`, `id_store`, `id_category`) VALUES
(1, 'ciocolata', 5, 'foarte buna', NULL, 1, 1),
(2, 'prajituri', 10, 'delicioase', NULL, 2, 2),
(4, 'nurofen', 25, 'sa nu iei niciodata', NULL, 5, 3),
(5, 'bla', 67, 'nu stiu', NULL, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `slug`, `name`) VALUES
(1, 'aliment', 'Alimente'),
(2, 'menaj', 'Articole de Menaj'),
(3, 'medicament', 'Medicamente');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `id_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `name`, `date_start`, `date_end`, `id_type`) VALUES
(1, 'reducere', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_product`
--

CREATE TABLE `promotion_product` (
  `id` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `new_price` float DEFAULT NULL,
  `percent_off` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_type`
--

CREATE TABLE `promotion_type` (
  `id` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion_type`
--

INSERT INTO `promotion_type` (`id`, `name`) VALUES
('fixed_price', 'Pret Fix'),
('percent_off', 'Procentaj Off');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `type`, `id_image`) VALUES
(1, 'lidl', 'aliimentar', 1),
(2, 'kaufland', 'alimentar', 1),
(5, 'catena', 'medicamente', 1),
(6, 'bla', 'menaj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `register_date`, `rights`, `phone`) VALUES
(1, 'Alin', 'Cirja', 'alin@alin.ro', '$2y$10$GSZW5Y8g3iuGRIZpRfnwZOKTAFAmkpU8S5/cs2sAI533YVpnX738C', '2019-03-29 16:36:14', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `USER` (`id_user`) USING BTREE;

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CATEGORY` (`id_category`) USING BTREE,
  ADD KEY `IMAGE` (`id_image`) USING BTREE;

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USER` (`id_user`);

--
-- Indexes for table `order_event`
--
ALTER TABLE `order_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EVENT` (`id_event`) USING BTREE,
  ADD KEY `ORDER` (`id_order`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PRODUCT` (`id_product`),
  ADD KEY `ORDER` (`id_order`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `STORE` (`id_store`),
  ADD KEY `IMAGE` (`id_image`),
  ADD KEY `CATEGORY` (`id_category`) USING BTREE;

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PRODUCT` (`id_product`),
  ADD KEY `IMAGE` (`id_image`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TYPE` (`id_type`);

--
-- Indexes for table `promotion_product`
--
ALTER TABLE `promotion_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PROMOTION` (`id_promotion`),
  ADD KEY `PRODUCT` (`id_product`);

--
-- Indexes for table `promotion_type`
--
ALTER TABLE `promotion_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IMAGE` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_event`
--
ALTER TABLE `order_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotion_product`
--
ALTER TABLE `promotion_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `event_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
