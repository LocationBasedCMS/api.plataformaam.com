-- phpMyAdmin SQL Dump
-- version 4.3.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 29-Maio-2015 às 22:27
-- Versão do servidor: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_central`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `OnlineUser`
--

DROP TABLE IF EXISTS `OnlineUser`;
CREATE TABLE IF NOT EXISTS `OnlineUser` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text,
  `composite` int(11) DEFAULT NULL,
  `composite_name` varchar(500) DEFAULT NULL,
  `base` int(11) DEFAULT NULL,
  `base_name` varchar(500) DEFAULT NULL,
  `upi` int(11) DEFAULT NULL,
  `upi_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `OnlineUser`
--

TRUNCATE TABLE `OnlineUser`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `OnlineUser`
--
ALTER TABLE `OnlineUser`
  ADD PRIMARY KEY (`id`);
