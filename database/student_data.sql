-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 06:20 AM
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
-- Database: `student_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `s_no` int(7) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`s_no`, `title`, `description`, `image`, `userid`) VALUES
(1, 'world most famous picture is a golden egg', 'a hidden surprise or extra feature that is included in something such as a computer game, a piece of software, or a film, for the person using or watching it to find and enjoy: How can I find out whether any Easter eggs are hidden in my software?', 'download (1).jpg', 1),
(2, 'Ai is dangerous', 'There are a myriad of risks to do with AI that we deal with in our lives today. Not every AI risk is as big and worrisome as killer robots or sentient AI. Some of the biggest risks today include things like consumer privacy, biased programming, danger to humans, and unclear legal regulation.', 'download (2).jpg', 2),
(3, 'india is the largest producer', 'India is the world&#39;s largest producer of milk, pulses and Jute. India ranks as the second-largest producer of rice, wheat, sugarcane, groundnut, vegetables, fruit and cotton. It is also one of the leading producers of spices, fish, poultry, livestock and plantation crops.2', 'download (1).jpg', 2),
(4, 'ipl is biggest  cricket league', 'If one were to look at sporting leagues, the IPL is right up there. The Indian cricket league has gone from strength to strength since it started in 2009. The biggest sports league in India in terms of valuation and earnings, it&#39;s also perhaps the only global sporting event held annually in India.', 'download (3).jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `roll_number` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `name`, `email`, `roll_number`, `password`) VALUES
(1, 'mukesh', 'mukesh@mail.com', '200111', '09911191'),
(2, 'Somendra Singh', 'prata@mail.com', '221022', '56685011'),
(3, 'Akshay Aksj', 'aks@gmail.com', '12315456', '09420917'),
(4, 'Aman Singh', 'asd@mail.com', '25488444', '76608767'),
(5, 'Aman Singh', 'akshay@gmail.com', '2000', '78765674');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`s_no`),
  ADD KEY `foriegn_key` (`userid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `s_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `foriegn_key` FOREIGN KEY (`userid`) REFERENCES `students` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
