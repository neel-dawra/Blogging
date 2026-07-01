-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2026 at 09:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogging`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `text` mediumtext NOT NULL,
  `image` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`user_id`, `blog_id`, `subject`, `category`, `text`, `image`, `status`) VALUES
(23, 33, 'hii', 'Technology', 'dszv', 'demo_1782894635.', 'deactivated'),
(23, 34, 'hee', 'Sports', 'aszfdxgh', 'demo_1782894711.', 'activated');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `bio` text NOT NULL,
  `date` date NOT NULL,
  `role` varchar(10) NOT NULL,
  `user_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `contact`, `email`, `password`, `bio`, `date`, `role`, `user_status`) VALUES
(21, 'neel', 1234567891, 'neel@gmail.com', 'eac22cf37128b00063a8b2be2589d933', 'creator', '2026-06-11', 'admin', 'activated'),
(22, 'shreya', 9096400411, 'shreya@gmail.com', '4a3232c59ecda21ac71bebe3b329bf36', 'shreya', '2026-07-01', 'author', 'deactivated'),
(23, 'Aarti Ramesh Chougule ', 9096400411, 'aarti@gmail.com', '4542e4c233f26b4faf6b5f3fed24280c', 'aarti', '2026-07-01', 'author', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `ID` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
