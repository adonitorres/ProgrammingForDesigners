-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 04:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lets_play`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment` varchar(500) NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `post_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` mediumint(9) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `post_id` mediumint(9) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` mediumint(9) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_pic` varchar(60) NOT NULL,
  `type_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `first_session_date` datetime NOT NULL,
  `players_needed` mediumint(2) NOT NULL,
  `title` varchar(60) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_date`, `post_pic`, `type_id`, `user_id`, `first_session_date`, `players_needed`, `title`, `details`, `is_published`, `location`) VALUES
(1, '2022-06-20 16:24:33', 'https://picsum.photos/id/1/544/544', 1, 1, '0000-00-00 00:00:00', 5, 'Test Post One', 'Board Game description.', 1, '6250 El Cajon Blvd, San Diego, CA 92115'),
(2, '2022-06-20 16:24:33', 'https://picsum.photos/id/2/544/544', 2, 1, '0000-00-00 00:00:00', 5, 'Test Post Two', 'Card Game description', 1, '6250 El Cajon Blvd, San Diego, CA 92115'),
(3, '2022-06-20 16:24:33', 'https://picsum.photos/id/3/544/544', 3, 2, '0000-00-00 00:00:00', 5, 'Test Post Three', 'Dice Game description', 1, '6250 El Cajon Blvd, San Diego, CA 92115'),
(4, '2022-06-20 16:24:33', 'https://picsum.photos/id/4/544/544', 4, 2, '0000-00-00 00:00:00', 5, 'Test Post Four', 'Paper and Pencil Game description', 0, '6250 El Cajon Blvd, San Diego, CA 92115'),
(5, '2022-06-20 16:24:33', 'https://picsum.photos/id/5/544/544', 5, 2, '0000-00-00 00:00:00', 5, 'Test Post Five', 'Role-playing Game description', 1, '6250 El Cajon Blvd, San Diego, CA 92115'),
(6, '2022-06-20 16:24:33', 'https://picsum.photos/id/6/544/544', 6, 1, '0000-00-00 00:00:00', 5, 'Test Post Six', 'Strategy Game description', 0, '6250 El Cajon Blvd, San Diego, CA 92115'),
(7, '2022-06-20 16:24:33', 'https://picsum.photos/id/7/544/544', 7, 2, '0000-00-00 00:00:00', 5, 'Test Post Seven', 'Tile-based Game description', 1, '6250 El Cajon Blvd, San Diego, CA 92115');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratinig_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `rater_id` mediumint(9) NOT NULL,
  `rating` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` mediumint(9) NOT NULL,
  `description` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `description`) VALUES
(1, 'Board Games'),
(2, 'Card Games'),
(3, 'Dice Games'),
(4, 'Paper and Pencil Games'),
(5, 'Role-playing Games'),
(6, 'Strategy Games'),
(7, 'Tile-based Games');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(9) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `profile_pic` varchar(60) DEFAULT NULL,
  `cover_pic` varchar(60) DEFAULT NULL,
  `user_type_id` tinyint(2) NOT NULL,
  `dob` date DEFAULT NULL,
  `details` varchar(2000) DEFAULT NULL,
  `join_date` datetime NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `access_token`, `profile_pic`, `cover_pic`, `user_type_id`, `dob`, `details`, `join_date`, `is_admin`) VALUES
(1, 'Adoni', '', '', 'adonitorres1104@platt.edu', '$2y$10$3b3UcFSzWz1A2T4ZdaVAmeQkHhNQmwjWk4XiEjh85C3PgS.H74tpy', '', NULL, NULL, 0, NULL, NULL, '2022-06-20 12:46:55', 0),
(2, 'Gabe', '', '', 'gabe@gmail.com', '$2y$10$o5v03ci.7tUjHYPB6b2O0eaSOWCk8AdmRbMuWMoLdlZXraLC9TQnW', '', NULL, NULL, 0, '0000-00-00', NULL, '2022-06-20 15:18:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_games`
--

CREATE TABLE `user_games` (
  `ug_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `game_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratinig_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`ug_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratinig_id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_games`
--
ALTER TABLE `user_games`
  MODIFY `ug_id` mediumint(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
