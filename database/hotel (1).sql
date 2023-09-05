-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 06:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `phone` int(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `address`, `phone`, `comment`) VALUES
(73, 'shubham', 'shubhambhor1999@gmail.com', 'Best chs plot no 39 room no 101 sec 14', 2147483647, 'hello'),
(74, 'shubham', 'shubhambhor1999@gmail.com', 'Best chs plot no 39 room no 101 sec 14', 2147483647, 'hello'),
(77, 'shubham', 'ganeshlandge09@gmail.com', 'Best chs plot no 39 room no 101 sec 14', 2147483647, 'Please accept my room');

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` int(30) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `dob` date NOT NULL,
  `adhar` text NOT NULL,
  `zip` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`id`, `name`, `email`, `password`, `mobile`, `address`, `gender`, `country`, `state`, `dob`, `adhar`, `zip`) VALUES
(25, 'shubham', 'bhorshuba17ce@student.mes.ac.in', '123456789', 2147483647, 'Best chs plot no 39 room no 101 sec 14', 'Northern Territory', 'Australia', 'La Pampa', '1999-12-02', '123451234512', 400709),
(26, 'shubham', 'hindishorts391@gmail.com', '123456789', 2147483647, 'Best chs plot no 39 room no 101 sec 14', 'Lorri', 'Armenia', 'La Pampa', '1999-12-02', '123451234512', 400709),
(30, 'shubham', 'shubhambhor1999@gmail.com', '123456789', 2147483647, 'Best chs plot no 39 room no 101 sec 14', 'Male', 'Antigua and Barbuda', 'Saint John', '2019-10-09', '123451234512', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_no` int(30) NOT NULL,
  `Type` varchar(40) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `price` bigint(20) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_no`, `Type`, `Name`, `price`, `details`, `image`) VALUES
(36, 101, 'Indian', 'Masala dosa', 40, 'A crispy, rice-batter crepe encases a spicy mix of mashed potato, which is then dipped in coconut chutney, pickles, tomato-and-lentil-based sauces and other condiments.', '101 masala-dosa.jpg'),
(42, 201, 'Spanish', 'Seafood paella', 500, 'The sea is lapping just by your feet, a warm breeze whips the tablecloth around your legs and a steamy pan of paella sits in front of you. Shrimp, lobster, mussels and cuttlefish combine with white rice and various herbs, oil and salt in this Valencian dish to send you immediately into holiday mode. Though if you have it in Spain, you are probably there already.', 'seafoodspanish201.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `otp_expiry`
--

CREATE TABLE `otp_expiry` (
  `id` int(10) NOT NULL,
  `otp` int(10) NOT NULL,
  `is_expired` int(10) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_expiry`
--

INSERT INTO `otp_expiry` (`id`, `otp`, `is_expired`, `create_at`) VALUES
(159, 758921, 1, '2019-10-06 19:32:46'),
(160, 362985, 1, '2019-10-06 19:33:25'),
(161, 987821, 1, '2019-10-06 19:35:17'),
(162, 513394, 1, '2019-10-06 19:37:12'),
(163, 239536, 1, '2019-10-06 19:38:17'),
(164, 293762, 1, '2019-10-06 19:57:32'),
(165, 618925, 1, '2019-10-06 20:01:09'),
(166, 894040, 1, '2019-10-06 20:05:37'),
(167, 108126, 1, '2019-10-06 20:06:14'),
(168, 984959, 1, '2019-10-06 20:07:03'),
(169, 860188, 1, '2019-10-06 20:07:43'),
(170, 430141, 1, '2019-10-06 20:08:19'),
(171, 991640, 1, '2019-10-06 20:08:47'),
(172, 973660, 1, '2019-10-06 20:09:33'),
(173, 340184, 1, '2019-10-06 20:10:18'),
(174, 624962, 1, '2019-10-06 20:12:00'),
(175, 808294, 1, '2019-10-06 20:13:19'),
(176, 583245, 1, '2019-10-06 20:14:42'),
(177, 720531, 1, '2019-10-06 20:16:08'),
(178, 819775, 1, '2019-10-06 20:17:00'),
(179, 624261, 1, '2019-10-06 20:18:20'),
(180, 802429, 1, '2019-10-06 20:20:26'),
(181, 976403, 1, '2019-10-06 20:22:41'),
(182, 339450, 1, '2019-10-06 20:23:57'),
(183, 729765, 1, '2019-10-06 20:26:17'),
(184, 319826, 1, '2019-10-06 20:27:18'),
(185, 939768, 1, '2019-10-06 20:29:28'),
(186, 174946, 1, '2019-10-06 20:30:49'),
(187, 902977, 1, '2019-10-06 20:33:12'),
(188, 593845, 1, '2019-10-06 20:34:07'),
(189, 417193, 0, '2019-10-06 20:35:31'),
(190, 222957, 1, '2019-10-06 20:36:05'),
(191, 276730, 1, '2019-10-06 20:37:32'),
(192, 956903, 1, '2019-10-06 20:40:51'),
(193, 107533, 1, '2019-10-06 20:44:14'),
(194, 243019, 1, '2019-10-06 20:46:48'),
(195, 484279, 0, '2019-10-06 20:47:28'),
(196, 947358, 0, '2019-10-06 20:49:08'),
(197, 276508, 1, '2019-10-06 20:52:45'),
(198, 834430, 1, '2019-10-06 20:54:13'),
(199, 122661, 1, '2019-10-06 20:57:03'),
(200, 265403, 1, '2019-10-06 20:57:57'),
(201, 968634, 1, '2019-10-06 22:38:03'),
(202, 821147, 1, '2019-10-06 22:39:28'),
(203, 782971, 1, '2019-10-06 22:42:40'),
(204, 697825, 1, '2019-10-06 22:43:46'),
(205, 372507, 1, '2019-10-06 22:46:22'),
(206, 706222, 0, '2019-10-06 22:50:30'),
(207, 522210, 0, '2019-10-06 22:50:58'),
(208, 877288, 1, '2019-10-06 22:52:23'),
(209, 192204, 1, '2019-10-06 22:54:59'),
(210, 998412, 1, '2019-10-06 22:56:04'),
(211, 239509, 1, '2019-10-06 22:58:39'),
(212, 774686, 1, '2019-10-06 22:59:28'),
(213, 263547, 1, '2019-10-06 23:10:26'),
(214, 249300, 1, '2019-10-06 23:13:54'),
(215, 987168, 1, '2019-10-06 23:15:16'),
(216, 694550, 1, '2019-10-06 23:18:10'),
(217, 360537, 1, '2019-10-06 23:19:29'),
(218, 638868, 1, '2019-10-07 19:50:14'),
(219, 516091, 1, '2019-10-07 19:52:29'),
(220, 837210, 1, '2019-10-07 19:54:03'),
(221, 445734, 1, '2019-10-07 20:00:11'),
(222, 256019, 1, '2019-10-07 20:01:14'),
(223, 624865, 1, '2019-10-07 20:06:08'),
(224, 317993, 1, '2019-10-07 20:15:59'),
(225, 797264, 0, '2019-10-07 20:18:46'),
(226, 785522, 1, '2019-10-07 20:20:16'),
(227, 562108, 1, '2019-10-07 20:21:49'),
(228, 818027, 1, '2019-10-07 20:26:23'),
(229, 468082, 1, '2019-10-07 20:35:22'),
(230, 404729, 1, '2019-10-07 20:38:24'),
(231, 487769, 1, '2019-10-07 20:39:04'),
(232, 246837, 1, '2019-10-07 21:00:05'),
(233, 534512, 0, '2019-10-07 21:23:38'),
(234, 967871, 0, '2019-10-07 21:23:42'),
(235, 809023, 0, '2019-10-07 21:24:52'),
(236, 506328, 1, '2019-10-07 21:25:29'),
(237, 725328, 1, '2019-10-07 21:33:16'),
(238, 480474, 0, '2019-10-07 21:38:00'),
(239, 404004, 0, '2019-10-07 21:38:48'),
(240, 828085, 0, '2019-10-07 21:39:36'),
(241, 446398, 0, '2019-10-07 21:40:54'),
(242, 793697, 0, '2019-10-07 21:41:36'),
(243, 165273, 0, '2019-10-07 21:42:06'),
(244, 801074, 0, '2019-10-07 21:43:46'),
(245, 860934, 0, '2019-10-07 21:45:51'),
(246, 323806, 0, '2019-10-07 21:46:49'),
(247, 269162, 0, '2019-10-07 21:47:10'),
(248, 617003, 0, '2019-10-07 21:47:27'),
(249, 336408, 1, '2019-10-07 21:52:15'),
(250, 306521, 0, '2019-10-07 21:55:15'),
(251, 638493, 0, '2019-10-07 21:56:35'),
(252, 486642, 0, '2019-10-07 21:57:29'),
(253, 508132, 0, '2019-10-07 21:59:23'),
(254, 951884, 1, '2019-10-07 22:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `room_type` text NOT NULL,
  `check_in_date` varchar(20) NOT NULL,
  `check_out_date` varchar(20) NOT NULL,
  `person` int(10) NOT NULL,
  `nodays` int(10) NOT NULL,
  `Meal` text NOT NULL,
  `Meal amount` int(10) NOT NULL,
  `Bed rent` int(10) NOT NULL,
  `Room rent` int(10) NOT NULL,
  `Gr.Total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `email`, `phone`, `room_type`, `check_in_date`, `check_out_date`, `person`, `nodays`, `Meal`, `Meal amount`, `Bed rent`, `Room rent`, `Gr.Total`) VALUES
(17, 'shubham', 'shubhambhor1999@gmail.com', 2147483647, 'Twin Deluxe Room', '2019-10-18', '2019-10-19', 3, 1, 'Room only', 0, 600, 20000, 20600);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` int(30) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` bigint(20) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'FRE',
  `csid` int(30) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `type`, `price`, `details`, `status`, `csid`, `image`) VALUES
(28, 101, 'Deluxe Room', 15000, 'The Contemporary yet simple designed King bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'FREE', NULL, 'delux_img1.jpg'),
(35, 102, 'Deluxe Room', 15000, 'The Contemporary yet simple designed King bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'FREE', NULL, 'delux_img1.jpg'),
(36, 103, 'Deluxe Room', 15000, 'The Contemporary yet simple designed King bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'FREE', NULL, 'delux_img1.jpg'),
(37, 104, 'Deluxe Room', 15000, 'The Contemporary yet simple designed King bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'FREE', NULL, 'delux_img1.jpg'),
(38, 201, 'Luxurious Suite', 16000, 'Engulf yourself in the plush luxury of our premier rooms. An upgraded version of the Suite room, these rooms offer an elegant design with larger room space.', 'NOT FREE', NULL, 'Luxury_img10.jpg'),
(39, 202, 'Luxurious Suite', 16000, 'Engulf yourself in the plush luxury of our premier rooms. An upgraded version of the Suite room, these rooms offer an elegant design with larger room space.', 'FREE', NULL, 'Luxury_img10.jpg'),
(40, 203, 'Luxurious Suite', 16000, 'Engulf yourself in the plush luxury of our premier rooms. An upgraded version of the Suite room, these rooms offer an elegant design with larger room space.', 'FREE', NULL, 'Luxury_img10.jpg'),
(41, 204, 'Luxurious Suite', 16000, 'Engulf yourself in the plush luxury of our premier rooms. An upgraded version of the Suite room, these rooms offer an elegant design with larger room space.', 'FREE', NULL, 'Luxury_img10.jpg'),
(42, 301, 'Standard Room', 14000, 'Simple design king bedded room are well equipped with modern amenities.', 'FREE', NULL, 'Standard _img16.jpg'),
(43, 302, 'Standard Room', 14000, 'Simple design king bedded room are well equipped with modern amenities.', 'FREE', NULL, 'Standard _img16.jpg'),
(44, 303, 'Standard Room', 14000, 'Simple design king bedded room are well equipped with modern amenities.', 'FREE', NULL, 'Standard _img16.jpg'),
(45, 304, 'Standard Room', 14000, 'Simple design king bedded room are well equipped with modern amenities.', 'FREE', NULL, 'Standard _img16.jpg'),
(46, 401, 'Suite', 13000, 'Enjoy the view of Anand from attach sitting area, An upgraded version of the Deluxe room, these rooms offer an elegant design with larger room space.', 'FREE', NULL, 'Suit_img22.jpg'),
(47, 402, 'Suite', 13000, 'Enjoy the view of Anand from attach sitting area, An upgraded version of the Deluxe room, these rooms offer an elegant design with larger room space.', 'FREE', NULL, 'Suit_img22.jpg'),
(48, 403, 'Suite', 13000, 'Enjoy the view of Anand from attach sitting area, An upgraded version of the Deluxe room, these rooms offer an elegant design with larger room space.', 'FREE', NULL, 'Suit_img22.jpg'),
(49, 404, 'Suite', 13000, 'Enjoy the view of Anand from attach sitting area, An upgraded version of the Deluxe room, these rooms offer an elegant design with larger room space.', 'FREE', NULL, 'Suit_img22.jpg'),
(50, 501, 'Twin Deluxe Room', 20000, 'The Contemporary yet simple designed twin bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'NOT FREE', NULL, 'Twin_img24.jpg'),
(51, 502, 'Twin Deluxe Room', 20000, 'The Contemporary yet simple designed twin bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'FREE', NULL, 'Twin_img24.jpg'),
(52, 503, 'Twin Deluxe Room', 20000, 'The Contemporary yet simple designed twin bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'FREE', NULL, 'Twin_img24.jpg'),
(53, 504, 'Twin Deluxe Room', 20000, 'The Contemporary yet simple designed twin bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'FREE', NULL, 'Twin_img24.jpg'),
(54, 0, 'Parking Area', 0, 'ON-SITE PARKING Comfort Hotel Perth City provides 33 secure car parking spaces, free-of-charge for house guests which are subject to availability and on a ...\r\n', ' FREE', NULL, 'parking.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_details`
--

CREATE TABLE `room_booking_details` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` int(20) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_in_time` varchar(6) NOT NULL,
  `check_out_date` date NOT NULL,
  `nodays` int(10) NOT NULL,
  `adhar` text NOT NULL,
  `adult` int(10) NOT NULL,
  `children` int(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `room_no` int(30) NOT NULL,
  `Meal` text NOT NULL DEFAULT 'Room only'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room_booking_details`
--

INSERT INTO `room_booking_details` (`id`, `name`, `email`, `phone`, `address`, `zip`, `room_type`, `check_in_date`, `check_in_time`, `check_out_date`, `nodays`, `adhar`, `adult`, `children`, `status`, `room_no`, `Meal`) VALUES
(69, 'shubham', 'shubhambhor1999@gmail.com', 7039620341, 'Best', 123456, 'Luxurious Suite', '2019-10-01', '00:59', '2019-10-12', 0, '123456789012', 1, 3, 'Confirm', 201, 'Breakfast'),
(70, 'shubham', 'shubhambhor1999@gmail.com', 9970455954, 'Best', 123456, 'Twin Deluxe Room', '2019-10-18', '03:05', '2019-10-19', 1, '123123123123', 2, 1, 'Confirm', 501, 'Breakfast');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_account`
--
ALTER TABLE `create_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `create_account`
--
ALTER TABLE `create_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
