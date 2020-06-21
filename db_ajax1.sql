-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 12:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ajax1`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_details`
--

CREATE TABLE `address_details` (
  `addr_id` int(11) NOT NULL,
  `country` varchar(10) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `street` varchar(500) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_details`
--

INSERT INTO `address_details` (`addr_id`, `country`, `state`, `city`, `place`, `street`, `pincode`) VALUES
(1, 'IN', 'Telangana', 'Hyderabad', 'JJ Nagar Colony', 'H.NO.5-9-232/1/1, Employees Colony, Yapral', 500087),
(2, 'IN', 'Delhi', 'Central Delhi', 'Connaught Place', 'mitayi banddar', 110001),
(3, 'IN', 'Maharashtra', 'Mumbai', 'Bazargate', 'mum nagar colony', 400001),
(4, 'IN', 'Tamil Nadu', 'Chennai', 'Flower Bazaar', 'h.no.3-5-234/5/1, sagar colony, rampet', 600001),
(5, 'IN', 'Karnataka', 'Bengaluru', 'Basavanagudi H.O', 'Flat no. 501, Br Hills, Ram Nagar.', 560004),
(6, 'IN', 'Madhya Pradesh', 'Indore', 'Indore CGO Complex', 'street no.10, ram colony, bharat nagar.', 452001);

-- --------------------------------------------------------

--
-- Table structure for table `friends_details`
--

CREATE TABLE `friends_details` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `friend_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_details`
--

INSERT INTO `friends_details` (`id`, `username`, `friend_name`) VALUES
(21, 'kousthubha', 'sairaj'),
(22, 'sairaj', 'kousthubha'),
(23, 'rohith', 'sairaj'),
(24, 'sairaj', 'rohith'),
(25, 'rohith', 'kousthubha'),
(26, 'kousthubha', 'rohith'),
(27, 'supreet', 'sairaj'),
(28, 'sairaj', 'supreet'),
(29, 'sairaj', 'priyatam'),
(30, 'priyatam', 'sairaj'),
(31, 'sairaj', 'rahul'),
(32, 'rahul', 'sairaj'),
(33, 'kousthubha', 'priyatam'),
(34, 'priyatam', 'kousthubha'),
(35, 'supreet', 'kousthubha'),
(36, 'kousthubha', 'supreet');

-- --------------------------------------------------------

--
-- Table structure for table `posts_details`
--

CREATE TABLE `posts_details` (
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `cur_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_details`
--

INSERT INTO `posts_details` (`post_id`, `content`, `author`, `cur_time`) VALUES
(15, 'hi ro,kk,su', 'sairaj', '2020-06-05 10:45:46'),
(16, 'hey sai,ro,su', 'kousthubha', '2020-06-05 10:46:32'),
(17, 'hey sai,kk,su', 'rohith', '2020-06-05 10:47:31'),
(18, 'hey ro', 'sairaj', '2020-06-05 11:59:13'),
(19, 'hi kousthubha and rohith', 'sairaj', '2020-06-05 13:28:52'),
(20, 'hey sairaj', 'kousthubha', '2020-06-05 13:29:32'),
(21, 'hey prabhas', 'supreet', '2020-06-05 14:23:58'),
(22, 'hi kk ,supreet and rohith', 'sairaj', '2020-06-06 03:03:50'),
(23, 'hi mahesh', 'kousthubha', '2020-06-06 03:04:23'),
(24, 'gai ballaya', 'rohith', '2020-06-06 03:05:01'),
(25, 'prabhas trend today 6pm', 'supreet', '2020-06-06 03:05:37'),
(26, 'hi read novels', 'priyatam', '2020-06-06 03:09:47'),
(27, 'hi avengers', 'rahul', '2020-06-06 03:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `request_id` int(11) NOT NULL,
  `requester` varchar(200) NOT NULL,
  `requestee` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_details`
--

INSERT INTO `request_details` (`request_id`, `requester`, `requestee`) VALUES
(8, 'kousthubha', 'rahul');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`username`, `password`) VALUES
('kousthubha', '123'),
('priyatam', '123'),
('rahul', '123'),
('rohith', '123'),
('sairaj', '123'),
('supreet', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_details`
--
ALTER TABLE `address_details`
  ADD PRIMARY KEY (`addr_id`);

--
-- Indexes for table `friends_details`
--
ALTER TABLE `friends_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_details`
--
ALTER TABLE `posts_details`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `request_details`
--
ALTER TABLE `request_details`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_details`
--
ALTER TABLE `address_details`
  MODIFY `addr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `friends_details`
--
ALTER TABLE `friends_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts_details`
--
ALTER TABLE `posts_details`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `request_details`
--
ALTER TABLE `request_details`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
