-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2015 at 04:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kijcert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE IF NOT EXISTS `admin_account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cert`
--

CREATE TABLE IF NOT EXISTS `cert` (
`id_cert` int(11) NOT NULL,
  `cert` varchar(1024) NOT NULL,
  `id_request` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cert`
--

INSERT INTO `cert` (`id_cert`, `cert`, `id_request`) VALUES
(13, '-----BEGIN CERTIFICATE-----\r\nMIICFjCCAYGgAwIBAgIBADALBgkqhkiG9w0BAQUwITEfMB0GA1UECgwWS0lKX0U5\r\nIFN1cmFiYXlhIEtJSl9FOTAeFw0xNTA1MDUxNDUxMDZaFw0xNjA1MDUxNDUxMDZa\r\nMIGGMQswCQYDVQQFDAJGRjEdMBsGA1UEAwwUd3d3LnV0YWt1dGlra2F5dS5jb20x\r\nFTATBgNVBAoMDHV0YWt1dGlra2F5dTERMA8GA1UECQwIU3VyYWJheWExETAPBgNV\r\nBAcMCFN1cmFiYXlhMQ4wDAYDVQQRDAU2NDEyMjELMAkGA1UEBgwCSUQwgZ0wCwYJ\r\nKoZIhvcNAQEBA4GNADCBiQKBgQCujDXgNQAiqmAXfKE/HBT/uW0bkCe749FaES91\r\nf/YU0YioDegZBEo/CiiifKs0I4k933igqdeUOFK4oVqJzenCqDkIfJXZ/cafeOOx\r\nipvpbcZEOCYb2wiPEdz+ko4Ech42tRpFCb85H7Cz7jVr3bHB7RWrIc/I/5Tj1IVO\r\nii8INQIDAQABMAsGCSqGSIb3DQEBBQOBgQAhPO7cPysdZuZIDIv8ItESN1CoT4Bx\r\nJnwuNTdFkfx/X9FCqa3EpmDwPl6nkvB/DbiVjz2364QSOZ3VvBFTfvqnAXmdGyv6\r\nqnottLbfCYjFUv17ObVrVwCgzQHXSXx/lAA/Jsso2UZ+jmu9LwTV+kwHwKjqBTo+\r\nxhirya/bnjsUag==\r\n-----END CERTIFICATE-----', 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id_country` varchar(2) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id_country`, `country_name`) VALUES
('ID', 'Indonesia'),
('US', 'United States of America');

-- --------------------------------------------------------

--
-- Table structure for table `csr`
--

CREATE TABLE IF NOT EXISTS `csr` (
`id_csr` int(11) NOT NULL,
  `csr` varchar(1024) NOT NULL,
  `id_request` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csr`
--

INSERT INTO `csr` (`id_csr`, `csr`, `id_request`) VALUES
(1, '-----BEGIN CERTIFICATE REQUEST-----\r\nMIIBwTCCASwCAQAwgYYxCzAJBgNVBAUMAkZGMR0wGwYDVQQDDBR3d3cudXRha3V0\r\naWtrYXl1LmNvbTEVMBMGA1UECgwMdXRha3V0aWtrYXl1MREwDwYDVQQJDAhTdXJh\r\nYmF5YTERMA8GA1UEBwwIU3VyYWJheWExDjAMBgNVBBEMBTY0MTIyMQswCQYDVQQG\r\nDAJJRDCBnTALBgkqhkiG9w0BAQEDgY0AMIGJAoGBAK6MNeA1ACKqYBd8oT8cFP+5\r\nbRuQJ7vj0VoRL3V/9hTRiKgN6BkESj8KKKJ8qzQjiT3feKCp15Q4UrihWonN6cKo\r\nOQh8ldn9xp9447GKm+ltxkQ4JhvbCI8R3P6SjgRyHja1GkUJvzkfsLPuNWvdscHt\r\nFashz8j/lOPUhU6KLwg1AgMBAAEwCwYJKoZIhvcNAQEFA4GBAHy5KzTGaxTsB+4G\r\nYZQvTZ2MCdjX2ER3JwGiuHeqk4mKOR9W1pw4JLzFVZLxvfYvrjl/tngeCaUyxNB0\r\nLpVOsnBTjYaRhnoicLIueqeU0KD2mNtPBZ8XMl2LN7R/ePC87I396fbf3jaV3jAp\r\nOclxf+nHOlhDmDnOE9oFgo4Z8LKn\r\n-----END CERTIFICATE REQUEST-----', 2);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
`id_request` int(11) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `common_name` varchar(50) NOT NULL,
  `organization_name` varchar(50) NOT NULL,
  `address` varchar(128) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_country` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `serial_number`, `common_name`, `organization_name`, `address`, `city`, `postal_code`, `status`, `username`, `id_country`) VALUES
(2, 'FF', 'www.utakutikkayu.com', 'utakutikkayu', 'Surabaya', 'Surabaya', '64122', 1, 'user', 'ID');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`username`, `password`) VALUES
('user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cert`
--
ALTER TABLE `cert`
 ADD PRIMARY KEY (`id_cert`), ADD KEY `fk_cert_req` (`id_request`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `csr`
--
ALTER TABLE `csr`
 ADD PRIMARY KEY (`id_csr`), ADD KEY `fk_csr_req` (`id_request`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
 ADD PRIMARY KEY (`id_request`), ADD KEY `fk_req_user` (`username`), ADD KEY `fk_request_country` (`id_country`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cert`
--
ALTER TABLE `cert`
MODIFY `id_cert` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `csr`
--
ALTER TABLE `csr`
MODIFY `id_csr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cert`
--
ALTER TABLE `cert`
ADD CONSTRAINT `fk_cert_req` FOREIGN KEY (`id_request`) REFERENCES `request` (`id_request`);

--
-- Constraints for table `csr`
--
ALTER TABLE `csr`
ADD CONSTRAINT `fk_csr_req` FOREIGN KEY (`id_request`) REFERENCES `request` (`id_request`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
ADD CONSTRAINT `fk_req_user` FOREIGN KEY (`username`) REFERENCES `user_account` (`username`),
ADD CONSTRAINT `fk_request_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
