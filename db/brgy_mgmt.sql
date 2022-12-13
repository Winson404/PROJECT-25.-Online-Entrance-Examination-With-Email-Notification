-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 05:17 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brgy_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE IF NOT EXISTS `officials` (
`officialID` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `digital_signature` varchar(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`officialID`, `firstname`, `middlename`, `lastname`, `suffix`, `position`, `description`, `digital_signature`, `date_registered`) VALUES
(1, 'fd', 'df', 'df', '', 'fdgfgfgf', 'df', 'minimalism-1644666519306-6515.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE IF NOT EXISTS `residence` (
`residenceId` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `ageClassification` varchar(25) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `resident_status` varchar(100) NOT NULL,
  `voter_status` varchar(100) NOT NULL,
  `ID_status` varchar(100) NOT NULL,
  `QR_status` varchar(100) NOT NULL,
  `years_of_stay` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `digital_signature` varchar(255) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`residenceId`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `ageClassification`, `birthplace`, `gender`, `civilstatus`, `citizenship`, `occupation`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `sector`, `resident_status`, `voter_status`, `ID_status`, `QR_status`, `years_of_stay`, `image`, `digital_signature`, `date_registered`) VALUES
(66, 'dddsdds', 'd', 'd', '', '2022-11-10', '2 weeks old', 'Toddler', 'df', 'Female', 'Single', 'By Birth', 'fsd', 'fds', 'fds', 'fds', 'fds', 'fds', 'fds', 'fdsfsd', 'fdsf', 'PWD', 'Perma/Owned', 'Active', 'Active', 'None', '43', 'Screenshot (197).png', 'Screenshot (196).png', '2022-11-25'),
(67, 'dsd', 'd', 'd', '', '2016-03-09', '6 years old', 'Child', 'dsa', 'Male', 'Married', 'By Family', 'fdsf', 'fdsf', 'dsf', 'fdsf', 'fdsf', 'dsfsd', 'fdsf', 'fsdfsd', 'fds', 'Senior Citizen', 'Perma/Owned', 'Active', 'Active', 'Active', '43', 'Screenshot (185).png', 'Screenshot (186).png', '2022-11-25'),
(69, 'cbvc', 'bvcbvc', 'bvcb', '', '1997-10-15', '25 years old', 'Adult', 'bvcbcb', 'Female', 'Separated', 'Naturalization', 'bvcbc', 'bvc', 'bcvbcb', 'vcbcb', 'vcbcv', 'bcvbc', 'bcvbcvbcv', 'bvc', 'bvcbc', 'Solo Parents', 'Tempo/Rented', 'Active', 'None', 'Active', '343', 'Screenshot (193).png', 'Screenshot (188).png', '2022-11-25'),
(70, 'fsfsd', 'fsdfsf', 'sdfs', '', '1952-07-09', '70 years old', 'Senior', 'fsfs', 'Non-Binary', 'Widow/ER', 'By Marriage', 'gfdgd', 'gfd', 'gdf', 'gfd', 'gfdg', 'fdgdf', 'gfdg', 'fdg', 'gfd', 'PWD', 'Tempo/Rented', 'None', 'None', 'None', '2', 'Screenshot (184).png', 'Screenshot (186).png', '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_Id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'Resident',
  `verification_code` varchar(255) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `username`, `firstname`, `middlename`, `lastname`, `suffix`, `email`, `contact`, `password`, `image`, `user_type`, `verification_code`, `date_registered`) VALUES
(40, 'Admin', 'Erwin', 'Cabag', 'Son', '', 'admin@gmail.com', '9359428961', '0192023a7bbd73250516f069df18b500', 'wallpaperflare.com_wallpaper.jpg', 'Admin', '374025', '2022-09-10'),
(42, 'Winson404', 'Erwin', 'Cabag', 'Son', '', 'sonerwin12@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '636e2ff4b5ad2.png', 'Staff', '841930', '2022-10-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
 ADD PRIMARY KEY (`officialID`);

--
-- Indexes for table `residence`
--
ALTER TABLE `residence`
 ADD PRIMARY KEY (`residenceId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
MODIFY `officialID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `residence`
--
ALTER TABLE `residence`
MODIFY `residenceId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
