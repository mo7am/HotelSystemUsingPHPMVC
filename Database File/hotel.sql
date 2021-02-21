-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2018 at 05:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `ID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`ID`, `date`) VALUES
(5, '2017-06-30'),
(6, '2017-07-02'),
(7, '2017-06-29'),
(8, '2017-07-01'),
(9, '2017-07-03'),
(10, '2017-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `guist`
--

CREATE TABLE `guist` (
  `ID` int(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `roomtype_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guist`
--

INSERT INTO `guist` (`ID`, `checkindate`, `checkoutdate`, `city`, `nationality`, `roomtype_id`, `user_id`) VALUES
(1, '2017-06-29', '2017-07-04', 'Egypt', 'Egyptian', 1, 4),
(2, '2017-06-29', '2017-07-04', 'America', 'English', 2, 8),
(4, '2017-06-29', '2017-07-04', 'America', 'English', 1, 10),
(5, '2017-06-29', '2017-07-04', 'Egypt', 'Egyptian', 2, 11),
(6, '2017-06-29', '2017-07-04', 'America', 'English', 3, 12),
(7, '2017-06-29', '2017-07-02', 'cairo', 'Egyptian', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text,
  `date_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `sender_id`, `receiver_id`, `content`, `date_id`, `state_id`, `time`) VALUES
(1, 2, 4, 'hi', 7, 3, '20:00:37'),
(2, 2, 4, 'mohamedmohamedmohamedmohamed', 7, 3, '20:17:19'),
(3, 4, 2, 'hi too', 6, 3, '20:48:54'),
(4, 4, 2, 'me', 6, 3, '21:28:02'),
(5, 2, 6, 'hi sally', 7, 3, '23:41:35'),
(6, 2, 6, 'hi', 7, 3, '23:41:42'),
(7, 2, 4, 'hi', 7, 3, '23:41:48'),
(8, 2, 4, 'hi', 7, 3, '23:41:53'),
(9, 2, 4, 'hi', 7, 0, '23:42:00'),
(10, 2, 1, 'hahahaha', 8, 3, '12:00:10'),
(11, 1, 2, 'hohoh', 9, 3, '01:59:52'),
(12, 1, 2, 'hello emad', 10, 3, '10:03:27'),
(13, 1, 6, 'hihihihihihi', 10, 3, '10:11:39'),
(14, 6, 1, 'hihihihihihihihi', 10, 4, '10:13:13'),
(15, 1, 2, 'hih', 10, 4, '10:14:59'),
(16, 2, 1, 'mmmmmmmmmmmmmm', 10, 4, '10:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(11) NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `roomnum` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `state_clean_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `roomtype_id`, `state_id`, `roomnum`, `price`, `state_clean_id`) VALUES
(1, 1, 2, 200, 500, 6),
(2, 1, 2, 201, 500, 6),
(3, 1, 1, 202, 500, 5),
(4, 1, 1, 202, 500, 5),
(5, 2, 2, 203, 1000, 6),
(6, 2, 2, 204, 1000, 6),
(7, 2, 1, 205, 1000, 5),
(8, 2, 1, 206, 1000, 5),
(9, 3, 1, 207, 1500, 5),
(10, 3, 1, 208, 1500, 5),
(11, 3, 1, 209, 1500, 5),
(12, 3, 1, 210, 1500, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `ID` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`ID`, `type`) VALUES
(1, 'Single'),
(2, 'Double'),
(3, 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(11) NOT NULL,
  `ssn` varchar(20) DEFAULT NULL,
  `salary` float NOT NULL,
  `age` int(11) NOT NULL,
  `bitrhdate` date NOT NULL,
  `workhours` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `ssn`, `salary`, `age`, `bitrhdate`, `workhours`, `user_id`) VALUES
(1, '12345678912345', 2000, 20, '2017-07-11', 5, 1),
(2, '78945612378945', 1000, 20, '2017-07-19', 5, 2),
(3, '14785236985214', 2000, 20, '2017-07-04', 6, 5),
(4, '12365478965412', 2000, 25, '1996-12-11', 6, 6),
(5, '1478523698745', 2000, 20, '2017-07-19', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `ID` int(11) NOT NULL,
  `state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`ID`, `state`) VALUES
(1, 'Empty'),
(2, 'Full'),
(3, 'Seen'),
(4, 'Not Seen'),
(5, 'Clean'),
(6, 'Unclean');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Fname`, `Lname`, `username`, `password`, `type_id`, `balance`) VALUES
(1, 'mohamed', 'salah', 'mohamed123@yahoo.com', 'aA123456', 1, 2000),
(2, 'emad', 'sayed', 'emad@yahoo.com', 'aA123456', 2, 20),
(4, 'kareem', 'alaa', 'kareem@yahoo.com', '123456', 6, 0),
(5, 'mohamed', 'ramadan', 'ramadan@yahoo.com', '123456', 2, 2000),
(6, 'Sandy', 'Ahmed', 'sandy@yahoo.com', 'aA123456', 4, 20000),
(7, 'Fatma', 'Sayed', 'fatma@yahoo.com', '123456', 4, 2000),
(8, 'Abdalla', 'tarek', 'abdalla@yahoo.com', '2016Qwee', 7, 0),
(10, 'Abdo', 'Salah', 'abdo@yahoo.com', 'aA123456', 7, 0),
(11, 'maged', 'salah', 'maged@yahoo.com', 'aA123456', 6, 0),
(12, 'ahmed', 'saad', 'ahmed@yahoo.com', 'aA123456', 2, 0),
(13, 'mohamed', NULL, 'eng.mohamed161996@gmail.com', 'ibhbhbjuhb', 0, 0),
(14, 'soso', 'salah', 'salah@yahoo.com', '2016Qwee', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userroom`
--

CREATE TABLE `userroom` (
  `ID` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroom`
--

INSERT INTO `userroom` (`ID`, `room_id`, `user_id`) VALUES
(2, 1, 4),
(3, 5, 8),
(6, 6, 11),
(7, 9, 12),
(8, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `ID` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`ID`, `type`) VALUES
(1, 'Manager'),
(2, 'Receptionist'),
(3, 'Cashier'),
(4, 'Housekeaping'),
(5, 'Cheif'),
(6, 'localguest'),
(7, 'foreignguist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guist`
--
ALTER TABLE `guist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userroom`
--
ALTER TABLE `userroom`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `guist`
--
ALTER TABLE `guist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `userroom`
--
ALTER TABLE `userroom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
