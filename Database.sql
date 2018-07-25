-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 25, 2018 at 10:23 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `testAPI`
--

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `id` int(11) NOT NULL,
  `name` char(255) DEFAULT NULL,
  `key` char(25) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`id`, `name`, `key`, `created_at`, `updated_at`) VALUES
(12, 'pavel', 'key', '2018-07-25 17:48:29', '2018-07-25 17:48:29'),
(26, 'name', 'key', '2018-07-25 22:03:43', '2018-07-25 22:06:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;