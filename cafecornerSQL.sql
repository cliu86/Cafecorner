-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 10:45 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafecorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(20) DEFAULT NULL,
  `food_price` float UNSIGNED DEFAULT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `user_id`, `food_name`, `food_price`, `note`) VALUES
  (270, 96, NULL, NULL, ''),
  (289, 105, NULL, NULL, ''),
  (332, 111, NULL, NULL, ''),
  (333, 112, NULL, NULL, ''),
  (334, 113, NULL, NULL, ''),
  (366, 114, NULL, NULL, ''),
  (367, 115, NULL, NULL, ''),
  (368, 116, NULL, NULL, ''),
  (369, 116, 'ROUGE ROYAL', 5, 'More water plz'),
  (370, 116, 'BLOODY MARY', 5, 'SUgaar'),
  (371, 116, 'CORNER GOURMAND', 2.5, 'www'),
  (372, 116, 'CROQUETTES DE CANARD', 6, 'Lol'),
  (373, 116, 'AUX CHOCOLAT BLANC', 6.5, ''),
  (374, 116, 'BLOODY MARY', 5, 'Order more'),
  (375, 116, 'BLOODY MARY', 5, ''),
  (376, 116, 'BLOODY MARY', 5, 'No sugar'),
  (433, 113, 'Pizza', 10, ''),
  (434, 113, 'Orange Juice', 3.5, ''),
  (435, 113, 'Wheat Bread', 5, ''),
  (436, 113, 'Chicken Teriyaki', 22, ''),
  (437, 113, 'Iced tea', 2.5, ''),
  (438, 113, 'ROUGE ROYAL', 5, ''),
  (439, 113, 'BLOODY MARY', 5, ''),
  (440, 113, 'CORNER GOURMAND', 2.5, ''),
  (441, 117, NULL, NULL, ''),
  (460, 96, 'ESPRESSO', 3, ''),
  (468, 96, 'fired Dumblings', 10, ''),
  (469, 118, NULL, NULL, ''),
  (470, 119, NULL, NULL, ''),
  (475, 121, NULL, NULL, ''),
  (476, 122, NULL, NULL, ''),
  (478, 122, 'Orange Juice', 3.5, ''),
  (480, 122, 'BLOODY MARY', 5, ''),
  (481, 122, 'BLANC BANANE', 6.5, ''),
  (482, 122, 'CR&Ecirc;PE CHOCOLAT', 6.5, ''),
  (483, 123, NULL, NULL, ''),
  (487, 123, 'Pizza', 10, ''),
  (488, 123, 'Orange Juice', 3.5, ''),
  (489, 123, 'Iced tea', 2.5, 'no sugar plz'),
  (490, 123, 'Iced tea', 2.5, 'no sugar plz');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` mediumint(9) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_desc`, `product_category`) VALUES
  (1002, 'Wheat Bread', 5, 'Whole food bread', 'upcoming_menu'),
  (1003, 'Hot dog', 5, 'hot dog with beef sausage', 'special_menu'),
  (1004, 'Chicken Teriyaki', 22, 'Sweet chicken with hot sause', 'upcoming_menu'),
  (1006, 'Sandwiches', 5.5, 'With beef', 'special_menu'),
  (1008, 'french Fries', 3.5, 'Fires', 'special_menu'),
  (1009, 'Orange Juice', 3.5, 'Regular orange juice with sugar', 'upcoming_menu'),
  (1010, 'Flatbread', 3.5, 'Whole wheat', 'special_menu'),
  (1012, 'Iced tea', 2.5, 'Green tea with iced', 'upcoming_menu'),
  (1015, 'Coke', 2, 'Battle of coke , 550ml', 'drink_menu'),
  (1016, 'Sprite', 2, 'Battle of Sprite , 550ml', 'drink_menu'),
  (1017, 'Grape', 2, 'Battle of Sprite , 550ml', 'drink_menu'),
  (1018, 'Pepsi', 2, 'Battle of Sprite , 550ml', 'drink_menu'),
  (1021, 'Hot WIngs', 12, '8 piece fried chicken wings', 'special_menu'),
  (1022, 'Pizza', 10, 'Dominos Pizza', 'upcoming_menu'),
  (1024, 'Soda', 3.5, 'Soda 2 L', 'drink_menu'),
  (1025, 'fired Dumblings', 10, 'fired Dumblings 10 pieces', 'special_menu');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `people` tinyint(20) UNSIGNED DEFAULT NULL,
  `reservation_date` varchar(20) DEFAULT NULL,
  `reservation_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_id`, `people`, `reservation_date`, `reservation_time`) VALUES
  (122, 113, 1, '04/28/2017', 'Dinner'),
  (124, 96, 1, '05/23/2017', 'Dinner'),
  (127, 96, 1, '05/25/2017', 'Breakfast'),
  (128, 96, 1, '05/25/2017', 'Dinner'),
  (129, 96, 1, '05/25/2017', 'Lunch'),
  (130, 96, 1, '05/25/2017', 'Lunch'),
  (131, 96, 1, '05/25/2017', 'Breakfast'),
  (132, 96, 1, '05/25/2017', 'Dinner'),
  (133, 96, 1, '05/25/2017', 'Breakfast'),
  (136, 119, 1, '05/11/2017', 'Dinner'),
  (137, 119, 1, '05/11/2017', 'Dinner'),
  (138, 119, 1, '05/25/2017', 'Dinner'),
  (139, 119, 1, '05/15/2017', 'Dinner'),
  (140, 119, 1, '05/11/2017', 'Dinner'),
  (141, 119, 1, '05/28/2017', 'Dinner'),
  (142, 96, 1, '05/04/2017', 'Dinner'),
  (143, 96, 1, '05/19/2017', 'Dinner'),
  (147, 96, 1, '05/25/2017', 'Lunch'),
  (148, 121, NULL, NULL, NULL),
  (149, 122, NULL, NULL, NULL),
  (150, 123, NULL, NULL, NULL),
  (151, 123, 1, '05/15/2017', 'Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_list`
--

CREATE TABLE `subscribe_list` (
  `subscribe_id` int(10) UNSIGNED NOT NULL,
  `email_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `receive_discount` varchar(10) DEFAULT NULL,
  `admin_level` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `receive_discount`, `admin_level`) VALUES
  (96, 'chang', 'liu', 'cliu86@bu.edu', '7418529630', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'no', 10),
  (105, 'Steven', 'Green', 'jhahahnd@coldmail.com', '2123341233', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'no', 0),
  (111, 'John', 'Smith', 'John@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'no', 0),
  (112, 'Will', 'Smith', 'will@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (113, 'Test', 'Test', 'test@test.com', '0123456789', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (114, 'Will', 'Tong', 'tong@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (115, 'Lee', 'Stephine', 'lee@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (116, 'Kobe', 'Bryant', 'kobe@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (117, 'Test1', 'Test', 'test1@test.com', '7234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (118, 'Test2', 'Test2', 'test2@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (119, 'Test3', 'Test3', 'test3@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (121, 'Test6', 'Test6', 'test6@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (122, 'Test7', 'Test7', 'test7@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0),
  (123, 'LEE', 'Ivy', 'test8@test.com', '1234567890', 'e8f1c5c22249cf6ed7c6c160429f11f8', 'yes', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscribe_list`
--
ALTER TABLE `subscribe_list`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `subscribe_list`
--
ALTER TABLE `subscribe_list`
  MODIFY `subscribe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
