-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2017 at 03:41 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bool-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `user_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `creationDate` varchar(45) DEFAULT NULL,
  `deadline` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `citycol` varchar(45) DEFAULT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_has_project`
--

CREATE TABLE `team_has_project` (
  `project_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `ocupation` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `adress` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `lastName`, `email`, `password`, `phone`, `ocupation`, `description`, `adress`) VALUES
(6, 'test', NULL, 'test@mail.com', '$2y$10$Qbb4.Uitt92A/h9o2iS/geIT53ee.mcAVCA/NgwsYQRKLX5bhU8ju', NULL, NULL, NULL, NULL),
(7, 'Belen Gebel', NULL, 'belengebel@gmail.com', '$2y$10$9hZjqcHBfs6UrGH7adf4X.mMHO52IKka8v8bwzA7E3fPrY6fRs7dK', NULL, NULL, NULL, NULL),
(10, 'test2', NULL, 'test@mail.com', '$2y$10$VISTOr.W3ii/c3xnm9WysOJFztgxBFnfpyjDjJa/VUJLNhDow3V6C', NULL, NULL, NULL, NULL),
(11, 'BELU', '', 'juansalvatore@live.com.ar', '$2y$10$ojqPTMxmX7dvn/AfrCsvYeFzeqK5vay/V46osFItuzX/toJiUJGby', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_team`
--

CREATE TABLE `user_has_team` (
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_owns_project`
--

CREATE TABLE `user_owns_project` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD KEY `fk_country_user1_idx` (`user_id`),
  ADD KEY `fk_country_city1_idx` (`city_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_state_city1_idx` (`city_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_has_project`
--
ALTER TABLE `team_has_project`
  ADD PRIMARY KEY (`project_id`,`team_id`),
  ADD KEY `fk_project_has_team_team1_idx` (`team_id`),
  ADD KEY `fk_project_has_team_project1_idx` (`project_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_team`
--
ALTER TABLE `user_has_team`
  ADD PRIMARY KEY (`user_id`,`team_id`),
  ADD KEY `fk_user_has_team_team1_idx` (`team_id`),
  ADD KEY `fk_user_has_team_user_idx` (`user_id`);

--
-- Indexes for table `user_owns_project`
--
ALTER TABLE `user_owns_project`
  ADD PRIMARY KEY (`user_id`,`project_id`),
  ADD KEY `fk_user_has_project_project1_idx` (`project_id`),
  ADD KEY `fk_user_has_project_user1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `fk_country_city1` FOREIGN KEY (`city_id`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_country_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `fk_state_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `team_has_project`
--
ALTER TABLE `team_has_project`
  ADD CONSTRAINT `fk_project_has_team_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_has_team_team1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_team`
--
ALTER TABLE `user_has_team`
  ADD CONSTRAINT `fk_user_has_team_team1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_team_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_owns_project`
--
ALTER TABLE `user_owns_project`
  ADD CONSTRAINT `fk_user_has_project_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_project_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
