-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2022 at 01:18 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_list_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `googleEmail` varchar(250) NOT NULL,
  `userId` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`googleEmail`, `userId`) VALUES
('zakiahzulkefli91@gmail.com', 'user1'),
('aaa@gmail.com', 'user2'),
('bbbb@gmail.com', 'user3');

-- --------------------------------------------------------

--
-- Table structure for table `user_todo_db`
--

DROP TABLE IF EXISTS `user_todo_db`;
CREATE TABLE IF NOT EXISTS `user_todo_db` (
  `userId` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `task` varchar(250) NOT NULL,
  `isDone` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_todo_db`
--

INSERT INTO `user_todo_db` (`userId`, `date`, `task`, `isDone`) VALUES
('user1', '2022-06-11', 'Give Gidi food', 'NO'),
('user1', '2022-06-11', 'Take Gidi for a walk', 'NO'),
('user1', '2022-06-11', 'Play with Gidi', 'NO'),
('user1', '2022-06-11', 'Take Gidi for a walk', 'NO'),
('user1', '2022-06-24', 'Take Gidi to vet', 'NO'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-12', 'testing1', 'YES'),
('user1', '2022-06-14', 'Gidi up!', 'YES'),
('user1', '2022-06-17', 'gidi', 'YES');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
