-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 24, 2019 at 05:52 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iant`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `bid` int(6) NOT NULL AUTO_INCREMENT,
  `bname` varchar(50) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`bid`, `bname`) VALUES
(1, '11 to 1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `cid` int(2) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`) VALUES
(1, 'CCNA'),
(2, 'MCSA');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `qid` int(6) NOT NULL AUTO_INCREMENT,
  `que` text NOT NULL,
  `o1` text NOT NULL,
  `o2` text NOT NULL,
  `o3` text NOT NULL,
  `o4` text NOT NULL,
  `ans` int(2) NOT NULL,
  `pset` int(2) NOT NULL,
  `cid` int(2) NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `que`, `o1`, `o2`, `o3`, `o4`, `ans`, `pset`, `cid`) VALUES
(1, 'What is Computer?', 'Alien', 'Human', 'Machine', 'None Of The Above', 3, 1, 1),
(2, 'Fullform of IANT', 'Indian Academy of Network Tecnology', 'International Academy Of Network Tecnology', 'Institute of Advance Network Telecommunication', 'Institute of Advance Network Technology', 4, 3, 2),
(3, 'What is Computer?', 'Alien', 'Human', 'Machine', 'None Of The Above', 3, 1, 2),
(4, 'What is Computer?', 'Alien', 'Human', 'Machine', 'None Of The Above', 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `rid` int(6) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `urname` varchar(50) NOT NULL,
  `tot` varchar(50) NOT NULL,
  `nota` varchar(50) NOT NULL,
  `atq` varchar(50) NOT NULL,
  `ra` varchar(50) NOT NULL,
  `wa` varchar(50) NOT NULL,
  `mark` float NOT NULL,
  `time` float NOT NULL,
  `cid` int(2) NOT NULL,
  `pset` int(11) NOT NULL,
  `date` date NOT NULL,
  `id` int(6) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `cid` (`cid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rid`, `fname`, `mname`, `lname`, `urname`, `tot`, `nota`, `atq`, `ra`, `wa`, `mark`, `time`, `cid`, `pset`, `date`, `id`) VALUES
(1, 'Pradip', 'S', 'Karmakar', 'Pradip', '1', '0', '1', '1', '0', 2, 6.91, 1, 1, '2019-07-23', 1),
(2, 'Pradip', 'S', 'Karmakar', 'Pradip', '1', '0', '1', '1', '0', 12.8571, 8.34, 1, 1, '2019-07-23', 1),
(3, 'Pradip', 'S', 'Karmakar', 'Pradip', '2', '0', '2', '2', '0', 25.7143, 5.29, 2, 1, '2019-07-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `urname` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `st` varchar(10) DEFAULT NULL,
  `pset` int(2) NOT NULL,
  `type` int(2) NOT NULL,
  `cid` int(2) DEFAULT NULL,
  `active` int(2) DEFAULT NULL,
  `bid` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `bid` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `mname`, `lname`, `urname`, `pass`, `st`, `pset`, `type`, `cid`, `active`, `bid`) VALUES
(1, 'Pradip', 'S', 'Karmakar', 'Pradip', 'Pradip', NULL, 1, 1, 2, 0, 1),
(2, 'Pradip', 'S', 'Karmakar', 'Xtreme', 'Xtreme', NULL, 0, 0, NULL, 1, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `batch` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
