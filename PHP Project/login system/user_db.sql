-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 09:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `pnum` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `course`, `year`, `pnum`, `password`, `user_type`) VALUES
(1, 'Admin', 'Admin@gmail.com', 'Admin1', 'Admin', 'Admin', '1341215dbe9acab4361fd6417b2b11bc', 'admin'),
(2, 'Kim Alfred A. Molina', 'kimmolina22@gmail.com', 'Computer Science', '2nd', '129324523', '6a372cdc08f45d375dab8a0eaa09e6d3', 'user'),
(3, 'Kendrick Molina', 'kenmolina@gmail.com', 'High School', '7', '2313123', '6c821bd09e1cdbcc85326800e94927f8', 'user'),
(13, 'Karl Molina', 'karlmolina@gmail.com', 'ABM', '12', '2313123', 'b4fad06dd383d1cce59027408fd19cb0', 'user'),
(17, 'Kenneth Porras', 'kenneth@gmail.com', 'Computer Science', '3rd ', '12312312312312', '7ca955bd92ca8b00548ddf36d2e79217', 'user'),
(19, 'Ken Villaruel', 'kenvillaruel@gmail.com', 'Computer Science', '2nd', '12312312', '655801fc6d6f263ee14810250311d19e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
