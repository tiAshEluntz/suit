-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 07:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suitgarcon`
--
CREATE DATABASE IF NOT EXISTS `suitgarcon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `suitgarcon`;

-- --------------------------------------------------------

--
-- Table structure for table `billing_info`
--

CREATE TABLE `billing_info` (
  `billing_info_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `address2` varchar(40) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billing_info`
--

INSERT INTO `billing_info` (`billing_info_id`, `email`, `address`, `address2`, `city`, `zip`, `customer_id`) VALUES
(1, 'alo@gmail.com', '101 rue des plaines d\'abraHAM', 'I\'m broke bruh. Can\'t afford address 1.', 'England', 'H1N1A5', 20);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `next_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `username`, `company_name`, `address`, `rate_id`, `next_order`) VALUES
(22, 'Company', 'Rebirth', 'Rue Sainte croix', 2, '2018-12-11'),
(23, 'firstCompany', 'My Nice Company', 'SomewhereInCanada', 0, '0000-00-00'),
(24, 'secondCompany', 'My Second Nice Company', 'FarFarAway', 0, '0000-00-00'),
(25, 'thirdCompany', 'My Third Nice Company', 'CloserThanEver', 0, '0000-00-00'),
(26, 'fourthCompany', 'My Fourth Nice Company', 'Here,There,Everywhere', 0, '0000-00-00'),
(27, 'fifthCompany', 'My Fifth Nice Company', 'AlmostTheEnd', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `company_username` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `company_username`, `username`, `first_name`, `last_name`) VALUES
(14, 'Company', 'myCustomer', 'First', 'Customer'),
(15, 'Company', 'firstCustomer', 'First', 'Customer'),
(16, 'Company', 'secondCustomer', 'Second', 'Customer'),
(17, 'Company', 'thirdCustomer', 'Third', 'Customer'),
(18, 'Company', 'fourthCustomer', 'Fourth', 'Customer'),
(19, 'Company', 'fifthCustomer', 'Fifth', 'Customer'),
(20, 'Company', 'Jean', 'Jean', 'Paul');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `username`, `first_name`, `last_name`, `type`) VALUES
(1, 'Employee', 'Jean', 'Paul', 'Ship'),
(2, 'firstEmployee', 'firstEmployee', 'First', 'Admin'),
(3, 'jeanpaul1234', 'jean', 'paul', 'Employee T'),
(5, 'jeanpaul123sgd', 'jean', 'paul', 'Employee T'),
(9, 'jeanpaul12311', 'jean', 'paul', 'Employee T');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `price_id`, `transaction_id`, `status`) VALUES
(11, 9, 11, 'Cleaned'),
(12, 4, 11, 'In Process'),
(13, 17, 11, 'In Process'),
(14, 6, 11, 'In Process'),
(15, 4, 12, 'In Process'),
(16, 8, 13, 'In Process'),
(17, 13, 13, 'In Process'),
(18, 1, 13, 'In Process'),
(19, 14, 13, 'In Process'),
(20, 9, 14, 'In Process'),
(21, 6, 14, 'In Process'),
(22, 6, 14, 'In Process'),
(23, 15, 14, 'In Process'),
(24, 9, 15, 'In Process'),
(25, 6, 15, 'In Process'),
(26, 6, 15, 'In Process'),
(27, 15, 15, 'In Process'),
(28, 9, 16, 'In Process'),
(29, 6, 16, 'In Process'),
(30, 6, 16, 'In Process'),
(31, 15, 16, 'In Process'),
(32, 9, 17, 'In Process'),
(33, 6, 17, 'In Process'),
(34, 6, 17, 'In Process'),
(35, 15, 17, 'In Process'),
(36, 9, 18, 'In Process'),
(37, 6, 18, 'In Process'),
(38, 6, 18, 'In Process'),
(39, 15, 18, 'In Process'),
(40, 9, 19, 'In Process'),
(41, 6, 19, 'In Process'),
(42, 6, 19, 'In Process'),
(43, 15, 19, 'In Process'),
(44, 9, 20, 'In Process'),
(45, 6, 20, 'In Process'),
(46, 6, 20, 'In Process'),
(47, 15, 20, 'In Process'),
(48, 9, 21, 'In Process'),
(49, 6, 21, 'In Process'),
(50, 6, 21, 'In Process'),
(51, 15, 21, 'In Process'),
(52, 9, 22, 'In Process'),
(53, 6, 22, 'In Process'),
(54, 6, 22, 'In Process'),
(55, 15, 22, 'In Process'),
(56, 9, 23, 'In Process'),
(57, 6, 23, 'In Process'),
(58, 6, 23, 'In Process'),
(59, 15, 23, 'In Process'),
(60, 9, 24, 'In Process'),
(61, 6, 24, 'In Process'),
(62, 6, 24, 'In Process'),
(63, 15, 24, 'In Process');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `username`, `ticket_id`, `message`, `read_status`) VALUES
(1, 'Jean', 6, 'Hi jean paul', 1),
(2, 'Jean', 6, 'Concerning your questions about things ', 1),
(3, 'Jean', 6, 'Just TEsting to see if it works', 1),
(4, 'Jean', 5, 'Trying this new Feature', 1),
(5, 'Jean', 4, 'Retrying because ca bug beaucoups', 1),
(6, 'Admin', 1, 'dsadsas', 1),
(7, 'Jean', 3, 'Testing Again', 1),
(8, 'Admin', 2, 'This is from the admin you are lucky', 1),
(9, 'Jean', 6, 'Hi this is my nice answer', 0),
(10, 'Jean', 6, 'Admin checking', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `location` varchar(35) NOT NULL,
  `pickup` date DEFAULT '0000-00-00',
  `delivery` date DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `company_id`, `employee_id`, `status`, `location`, `pickup`, `delivery`) VALUES
(22, 22, 1, 'Delivering', 'Rue Sainte croix', '0000-00-00', NULL),
(23, 22, 1, ' In Proces', ' Rue Sainte croix', '2018-12-27', NULL),
(24, 22, 1, ' In Proces', ' Rue Sainte croix', '2018-12-14', NULL),
(25, 22, 1, ' In Proces', ' Rue Sainte croix', '2018-12-12', NULL),
(26, 22, 1, ' In Proces', ' Rue Sainte croix', '2018-12-28', NULL),
(28, 22, 1, 'In Process', 'Rue Sainte croix', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `txnid`, `payment_amount`, `payment_status`, `createdtime`) VALUES
(1, 'ghrgetye45', '21.00', 'approuved', '2018-11-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `item_name`, `price`) VALUES
(1, '2 Piece Suite', 13.99),
(4, 'Jacket / Blazer', 7.99),
(6, 'Skirt', 5.99),
(7, 'Blouse', 5.99),
(8, 'Scarf', 4.99),
(9, 'Shorts', 5.99),
(10, 'Rain Coat', 11.99),
(11, 'Trouser', 5.99),
(12, 'Pleated Skirt', 6.99),
(13, 'Linen Skirt', 7.99),
(14, 'Jumper', 8.99),
(15, 'Dress (Short)', 7.99),
(16, 'Dress (Long)', 8.99),
(17, 'Coat', 9.99);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `cleanings_per_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`rate_id`, `name`, `cleanings_per_month`) VALUES
(0, 'None', 0),
(1, 'Classic', 1),
(2, 'Elegant', 2),
(3, 'Luxurious', 4),
(4, 'Prestige', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `order_id`, `customer_id`, `rating`) VALUES
(4, 22, 15, 4),
(5, 23, 15, 4),
(6, 24, 15, 4),
(7, 25, 15, 5),
(8, 26, 15, 5),
(9, 22, 15, 2),
(10, 23, 20, 3),
(11, 25, 20, 1),
(12, 25, 20, 5),
(13, 22, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `flagged` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `customer_id`, `comment`, `flagged`) VALUES
(1, 15, 'Nice Job suitgarcon You guyz are the bests', 1),
(2, 15, 'Really good, My wife loves it', 0),
(6, 19, 'Really good idea, We needed That', 1),
(7, 14, 'Boff, Im a hater and I don\'t like it.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `customer_id`, `subject`, `read_status`, `create_date`) VALUES
(1, 14, 'HelpME', 1, '2018-12-05'),
(2, 20, 'This is my ticket', 1, '2018-12-06'),
(3, 20, 'This is my ticket', 1, '2018-12-06'),
(4, 20, 'This is my ticket', 1, '2018-12-06'),
(5, 20, 'test', 1, '2018-12-06'),
(6, 20, 'This is the real test', 1, '2018-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `customer_id`, `order_id`, `payment_id`, `order_date`) VALUES
(11, 15, 22, 1, '2018-12-12'),
(12, 15, 22, 1, '2018-12-12'),
(13, 20, 22, NULL, '2018-12-11'),
(14, 20, 22, NULL, '2018-12-11'),
(15, 20, 22, NULL, '2018-12-11'),
(16, 20, 22, NULL, '2018-12-11'),
(17, 20, 22, NULL, '2018-12-11'),
(18, 20, 22, NULL, '2018-12-11'),
(19, 20, 22, NULL, '2018-12-11'),
(20, 20, 22, NULL, '2018-12-11'),
(21, 20, 22, NULL, '2018-12-11'),
(22, 20, 22, NULL, '2018-12-11'),
(23, 20, 22, NULL, '2018-12-11'),
(24, 20, 22, NULL, '2018-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `hash_pass` varchar(60) NOT NULL,
  `type` varchar(10) NOT NULL,
  `account_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `hash_pass`, `type`, `account_status`) VALUES
('Admin', '$2y$10$GAvKgP0dBWFz.EP4gSnY0uwdJfSvM/44UR.fc5OOm33MOAceuszZq', 'Admin', 1),
('Company', '$2y$10$g7sMv3VrIYfTDrpS9mHB6..KfbhrFCvZlKJAGFXap2Bo8/72AKnAG', 'Company', 1),
('dele', '$2y$10$1ZgvuwtN0tLuPGnEZFwMFedo1ttKfigGSFVbpr3kM77y3WoswoBge', 'Employee', 1),
('Employee', '$2y$10$j/ibVRWMowny8IM6ulgFnO5nrKSJmQT2Xyxc4WNk1noiWI/QUkbce', 'Employee', 1),
('fifthCompany', '$2y$10$H8pcnSjrtaRKQ9UaMpWaque.ztRK6ZekpOc1q8rLMhAa4j4bQs9kq', 'Company', 1),
('fifthCustomer', '$2y$10$jy2Hsl.kIZ3IaKuifXfsP.jf4p0v79o3voO684.hJsleGwYVDRaY2', 'Customer', 1),
('firstCompany', '$2y$10$31Wj5oHUk4IjRRi5vGOByO7onaS24XzOgWfEbYDQ6D8roTVd2T2by', 'Company', 0),
('firstCustomer', '$2y$10$Lhr1qjue7JHDy9BLPEScYOP212PX2NqzhRPhNB4.DPOv.YDNUZz2C', 'Customer', 1),
('firstEmployee', '$2y$10$296ogE992mEfrixkffdbKuDGssfLOvEiqXilyQw/gRScuW3G907ru', 'Employee', 1),
('fourthCompany', '$2y$10$SpJReKiF.CSj4gdKEwXlxu4q/aAMgXnkycyY2le0yGyD47JcgDA7i', 'Company', 1),
('fourthCustomer', '$2y$10$1j6Ee6NTXs/O4eu.LdGDNercPNk4bneOXdsSWwxJpuXBJtP7VX5MS', 'Customer', 1),
('Jean', '$2y$10$f/1YQorBhS0BzKwho5grvu9xQYKJmlAS52VBeEpuX7LB/2c2/RuSq', 'Customer', 1),
('jeanpaul123', '$2y$10$FUtJri21SkqOpzfazT6wbebV0DMiV5zTKAx0KZ32cIwhhVmJ21p.K', 'Employee', 1),
('jeanpaul12311', '$2y$10$dF/IPeiv/Yg3oscaYsCmf.74IEJlyGRcW6bYrGNwk5lP5TodYIQU.', 'Employee', 1),
('jeanpaul123345', '$2y$10$ObgTRojbap/J9Pq.rrV/2eZnxoFdktkubsIl3ctMy3eIlojslfJiG', 'Employee', 1),
('jeanpaul1234', '$2y$10$ZC.srvGYrnJOJYZ82KjEuuR4sCmybIoR3k7HBvwHcWpmTuMGR6ZnS', 'Employee', 1),
('jeanpaul123sgd', '$2y$10$058UXLIpMxmUVkEHJK5Tnuy4W/JJCHpQpd9OiYaHoiwhvnL8ob9tC', 'Employee', 1),
('myCustomer', '$2y$10$jtGsy9VdKlOy05UPMRRW..a8xZnt7S4nNDVQZP5KAL1ZGGTlxgg9y', 'Customer', 1),
('secondCompany', '$2y$10$G5JGYbIlW.c82XhuNy2ux.BV1QxQKAU2A69k9e3zkdYweXImDibt2', 'Company', 0),
('secondCustomer', '$2y$10$fiOxRWVa9U.20Pwt6GsGou2v.aCwzNFUJ0BfgqFAmQP5O1MLQHX9q', 'Customer', 1),
('thirdCompany', '$2y$10$CnY94czSNDyHScgWwEQ0kuD3TNCVnX38Ii6riZKF1LFLeQtjWs2nS', 'Company', 0),
('thirdCustomer', '$2y$10$qFwg5xCTuTLvBtnzFXUwtORwCgzyBy9iBuV6McYWI7V9OBuWKCEv.', 'Customer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_info`
--
ALTER TABLE `billing_info`
  ADD PRIMARY KEY (`billing_info_id`),
  ADD KEY `fk_billing_to_customer` (`customer_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `company-to_user` (`username`),
  ADD KEY `company-to-rate` (`rate_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_to_user` (`username`),
  ADD KEY `pk_customer_to_company` (`company_username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee_to_user` (`username`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `PK_Item_to_transaction` (`transaction_id`),
  ADD KEY `PK_Item_to_price` (`price_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `fk_message_to_ticket` (`ticket_id`),
  ADD KEY `message_to_user` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_to_company` (`company_id`),
  ADD KEY `fk_order_to_employee` (`employee_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `fk_rate_to_order` (`order_id`),
  ADD KEY `fk_rate_to_customer` (`customer_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_reviews_to_customer` (`customer_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `fk_ticket_to_customer` (`customer_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_transaction_to_customer` (`customer_id`),
  ADD KEY `fk_transaction_to_payment` (`payment_id`),
  ADD KEY `fk_transaction_to_order` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_info`
--
ALTER TABLE `billing_info`
  MODIFY `billing_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_info`
--
ALTER TABLE `billing_info`
  ADD CONSTRAINT `fk_billing_to_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `company-to-rate` FOREIGN KEY (`rate_id`) REFERENCES `rates` (`rate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `company-to_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customer_to_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_customer_to_company` FOREIGN KEY (`company_username`) REFERENCES `companies` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employee_to_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `PK_Item_to_price` FOREIGN KEY (`price_id`) REFERENCES `prices` (`price_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PK_Item_to_transaction` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_message_to_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_to_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_to_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_to_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_rate_to_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rate_to_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_to_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_ticket_to_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transaction_to_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_to_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_to_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
