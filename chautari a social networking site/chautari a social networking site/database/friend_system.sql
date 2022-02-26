-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2016 at 01:56 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `friend_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend_list`
--

CREATE TABLE IF NOT EXISTS `friend_list` (
`id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `friend_list`
--

INSERT INTO `friend_list` (`id`, `user_one`, `user_two`) VALUES
(1, 99, 98),
(2, 98, 100),
(3, 98, 101),
(4, 98, 102);

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE IF NOT EXISTS `friend_request` (
`id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `homestatus`
--

CREATE TABLE IF NOT EXISTS `homestatus` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(500) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `likes` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `homestatus`
--

INSERT INTO `homestatus` (`id`, `user_id`, `status`, `photo`, `likes`, `comment`) VALUES
(2, 98, 'hello', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messagecheck`
--

CREATE TABLE IF NOT EXISTS `messagecheck` (
`id` int(11) NOT NULL,
  `sender_id` int(200) NOT NULL,
  `receiver_id` int(200) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `receiver` int(20) NOT NULL,
  `sender` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `receiver`, `sender`) VALUES
(3, 'hello', 98, 99),
(4, 'hiii', 98, 99),
(5, 'hello', 99, 98),
(6, 'hiii', 98, 99),
(7, 'hello', 100, 98),
(8, 'oe', 101, 98),
(9, 'hi', 102, 98);

-- --------------------------------------------------------

--
-- Table structure for table `profileinfo`
--

CREATE TABLE IF NOT EXISTS `profileinfo` (
`id` int(11) NOT NULL,
  `userid` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `job` varchar(250) NOT NULL,
  `education` varchar(250) NOT NULL,
  `graduation` varchar(250) NOT NULL,
  `hometown` varchar(250) NOT NULL,
  `currentcity` varchar(250) NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `website` varchar(250) NOT NULL,
  `emailid` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `profileinfo`
--

INSERT INTO `profileinfo` (`id`, `userid`, `username`, `job`, `education`, `graduation`, `hometown`, `currentcity`, `dateofbirth`, `gender`, `phonenumber`, `website`, `emailid`) VALUES
(72, 98, '', 'Student', 'Kathmandu University', 'computer science', 'Dhankuta', 'Dhulikhel', '1995-01-01', '', '', 'ankit.acharya.com.np', 'acharya.ankit417@gmail.com'),
(73, 99, '', 'student', 'Kathmandu university', 'computer science', 'Kathmandu', 'Dhulikhel', '1997-12-10', '', '', 'sumiksha.com.np', 'sumiksha@gmail.com'),
(74, 100, '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(75, 101, '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(76, 102, '', '', '', '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `photo`, `fname`, `lname`, `email`) VALUES
(98, 'ankit', 'asd', 'photo/12243326_1516537121990640_7642529457850660346_n.jpg', 'ankit', 'acharya', 'ankit@gmail.com'),
(99, 'sumiksha', 'asd', 'photo/hero-bg.jpg', 'sumiksha', 'bhatta', 'sumikha@gmail.com'),
(100, 'sanjika', 'asd', 'photo/success.jpg', 'sanjika', 'rai', 'sanjika@gmail.com'),
(101, 'ashin', 'ashin', 'photo/success.jpg', 'ashin', 'pote', 'ashinpote@gmail.com'),
(102, 'bpn', 'asd', 'photo/4.jpg', 'bipin', 'upreti', 'bpn@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend_list`
--
ALTER TABLE `friend_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homestatus`
--
ALTER TABLE `homestatus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messagecheck`
--
ALTER TABLE `messagecheck`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileinfo`
--
ALTER TABLE `profileinfo`
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
-- AUTO_INCREMENT for table `friend_list`
--
ALTER TABLE `friend_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `homestatus`
--
ALTER TABLE `homestatus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messagecheck`
--
ALTER TABLE `messagecheck`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profileinfo`
--
ALTER TABLE `profileinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
