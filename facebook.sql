-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2020 at 10:09 AM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_name` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `event_descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `user_id`, `created_at`, `event_name`, `event_descr`) VALUES
(396812057, 2, '2020-11-17 06:42:44', 'BBQ Night', 'I am inviting all of my friends to BBQ night on Tuesday!'),
(2105941099, 3, '2020-11-17 06:54:00', 'Big Plan', 'I am planing to colonize Virginia, lets do it together.'),
(2147483647, 1, '2020-11-17 06:48:55', 'Movie Night', 'I am planning to watch The Lord of the Rings extended edition on friday evening. Anyone who wants to join me?');

-- --------------------------------------------------------

--
-- Table structure for table `events_join`
--

CREATE TABLE `events_join` (
  `event_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events_join`
--

INSERT INTO `events_join` (`event_id`, `user_id`) VALUES
(396812057, 2),
(2147483647, 1),
(2105941099, 3);

-- --------------------------------------------------------

--
-- Table structure for table `friends_join`
--

CREATE TABLE `friends_join` (
  `user_id` int NOT NULL,
  `friend_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `friends_join`
--

INSERT INTO `friends_join` (`user_id`, `friend_id`) VALUES
(1, 2),
(2, 3),
(3, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `fullname`, `content`, `created_at`, `img`) VALUES
(24, 2, 'John Lark', 'Hello world, i am John Lark!', '2020-11-17 06:41:40', 'johnlark2.jpeg'),
(25, 2, 'John Lark', 'Traffic sucks!', '2020-11-17 06:43:00', 'johnlark2.jpeg'),
(26, 1, 'John Doe', 'John Doe reports from Hamburg. The weather is cloudy, it is about to rain.', '2020-11-17 06:45:17', 'johndoe.jpeg'),
(27, 1, 'John Doe', 'Can you recommend me some nice pubs in Hamburg?', '2020-11-17 06:45:48', 'johndoe.jpeg'),
(28, 3, 'John Smith', 'God save the queen.', '2020-11-17 06:52:42', 'johnsmith.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `image`) VALUES
(1, 'John', 'Doe', 'johndoe@test.com', '25f9e794323b453885f5181f1b624d0b', 'johndoe.jpeg'),
(2, 'John', 'Lark', 'johnlark@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'johnlark2.jpeg'),
(3, 'john', 'Smith', 'jsmith@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'johnsmith.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
