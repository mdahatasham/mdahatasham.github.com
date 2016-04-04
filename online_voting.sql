-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 at 01:32 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` varchar(30) NOT NULL,
  `last_logout` varchar(30) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `last_login`, `last_logout`, `active`) VALUES
(1, 'admin', 'admin', '12:04:20am 01.11.15', '12:04:24am 01.11.15', 0),
(2, 'sham', '12345', '09:11:27am 02.11.15', '09:45:19am 02.11.15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `candidate_id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `candidate_photo` varchar(100) NOT NULL,
  `symbol` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `vote` int(11) NOT NULL,
  `voted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_application`
--

CREATE TABLE IF NOT EXISTS `candidate_application` (
  `id` int(11) NOT NULL,
  `candidate_photo` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `paddress` varchar(200) NOT NULL,
  `db` varchar(200) NOT NULL,
  `sex` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_schedule`
--

CREATE TABLE IF NOT EXISTS `event_schedule` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `ap_deadline` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_schedule`
--

INSERT INTO `event_schedule` (`event_id`, `event_name`, `start_time`, `end_time`, `ap_deadline`) VALUES
(0, 'testing time', '1985/09/10 03:00', '2015/11/01 05:00', '2015/11/08 04:00');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE IF NOT EXISTS `gallary` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `latest_article`
--

CREATE TABLE IF NOT EXISTS `latest_article` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_article`
--

INSERT INTO `latest_article` (`id`, `title`, `picture`, `description`) VALUES
(3, 'Why online voting ?', '', 'Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. The Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state \r\n\r\nDigital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. '),
(4, 'What is election commission ?', '03-05-12-21-01.jpg', 'Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. The Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. \r\n\r\nDigital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. The Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. \r\n'),
(18, 'Members Of The Election Commiitee', 'zong.jpg', 'The Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more\r\nThe Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more\r\nThe Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more\r\nThe Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more'),
(19, 'Benifit of online voting.', '3D Wallpaper (8).jpg', 'The Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more\r\nThe Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more\r\nThe Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more\r\nThe Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more\r\nThe Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more\r\nThe Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state geological surveys. read more'),
(20, 'Benifit of online voting.', 'zong (2).jpg', 'Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. The Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. The Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. \r\nDigital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UTEP) Magnetic Anomaly Map of North America. Data file must be viewed with NetCDF compatible modeling software. Files available for download (below) in a zipped folder. Bouguer Gravity map also available as a .tif image. The Arizona Geological Survey collates and serves geological information for Arizona and other states through its partnership with other state Digital Bouger Gravity Grid of Oklahoma from University of Texas at El Paso (UT');

-- --------------------------------------------------------

--
-- Table structure for table `luck`
--

CREATE TABLE IF NOT EXISTS `luck` (
  `id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `symbol` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `vote` varchar(100) NOT NULL,
  `voted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=520 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `designation`, `name`, `vote`) VALUES
(502, 'General_Secretary', 'alim', 17),
(503, 'Vice_President', 'hammad', 8),
(504, 'President', 'istiuk', 10),
(505, 'Secretary', 'hashem', 16),
(506, 'Vice_President', 'mukit', 6),
(507, 'Vice_President', 'sagor', 25),
(508, 'President', 'salam', 15),
(509, 'Vice_President', 'salam', 11),
(510, 'President', 'asgor', 18),
(511, 'General_Secretary', 'alim', 13),
(512, 'Vice_President', 'hammad', 8),
(513, 'President', 'istiuk', 10),
(514, 'Secretary', 'hashem', 13),
(515, 'Vice_President', 'mukit', 6),
(516, 'Vice_President', 'sagor', 22),
(517, 'President', 'salam', 15),
(518, 'Vice_President', 'salam', 11),
(519, 'President', 'asgor', 16);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `published` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `published`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE IF NOT EXISTS `voter` (
  `voter_id` int(11) NOT NULL,
  `voter_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `voter_profession` varchar(100) NOT NULL,
  `about_voter` varchar(500) NOT NULL,
  `voter_address` varchar(200) NOT NULL,
  `voter_birthdate` varchar(50) NOT NULL,
  `voter_image` varchar(100) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `voted` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`voter_id`, `voter_name`, `email`, `voter_profession`, `about_voter`, `voter_address`, `voter_birthdate`, `voter_image`, `identity`, `voted`) VALUES
(5, 'md.abdul ', 'md@localhost.com', 'office accountant', 'good man. 2 children and wife.', 'chittagong university colony', '09/10/2015', 'image.PNG', '9c2cc80894bbd442867697b3e4a4656f', 0),
(6, 'shetu', 'md@localhost.com', 'office attendent', 'gd man', 'cu', '2015/09/08 02:00', 'url.jpg', '9c2cc80894bbd442867697b3e4a4656f', 0),
(7, 'Md.Ahatasham', 'md@localhost.com', 'office attendent', 'gd man', 'cu', '2015/09/08 02:00', 'url.jpg', '9c2cc80894bbd442867697b3e4a4656f', 0),
(8, 'kalam', 'sham@localhost.com', 'farmer', 'ejdee', 'cu', '2015/09/10 00:00', 'classi.PNG', '9c2cc80894bbd442867697b3e4a4656f', 0),
(20, 'sham', 'shetu@localhost.com', 'farmer', 'good man', 'cu', '1985/09/03 00:00', 'zong (2).jpg', '', 0),
(21, 'karim', 'shetu@localhost.com', 'teacher', 'jhbh', 'cu', '1985/09/05 00:00', 'anime_151.jpg', '9c2cc80894bbd442867697b3e4a4656f', 0),
(22, 'rajib', 'demo@localhost.com', 'teacher', 'bcvb', 'cu', '1985/09/03 00:00', 'anime_151.jpg', 'aba0c5e198ba4415182457b5eafa655b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `candidate_application`
--
ALTER TABLE `candidate_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_schedule`
--
ALTER TABLE `event_schedule`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_article`
--
ALTER TABLE `latest_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `luck`
--
ALTER TABLE `luck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `candidate_application`
--
ALTER TABLE `candidate_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_schedule`
--
ALTER TABLE `event_schedule`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `latest_article`
--
ALTER TABLE `latest_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=520;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `voter_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
