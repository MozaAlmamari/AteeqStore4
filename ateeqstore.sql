-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 02:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ateeqstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FullName`, `Email`, `PhoneNumber`, `Address`) VALUES
(1, 'John Doe', 'johndoe@example.com', '1234567890', '123 Maple Street'),
(2, 'Jane Smith', 'janesmith@example.com', '0987654321', '456 Oak Avenue'),
(3, 'Ali Khan', 'alikhan@example.com', '1122334455', '789 Pine Road'),
(4, 'Sara Lee', 'saralee@example.com', '2233445566', '101 Elm Drive'),
(5, 'Omar Fahad', 'omar@example.com', '3344556677', '202 Cedar Lane'),
(6, 'Linda Brown', 'lindab@example.com', '4455667788', '303 Spruce Street'),
(7, 'Ahmed Zayed', 'ahmed@example.com', '5566778899', '404 Willow Court');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(10) UNSIGNED NOT NULL,
  `ProductID` int(10) UNSIGNED NOT NULL,
  `OrderDate` date NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `ProductID`, `OrderDate`, `Quantity`, `TotalPrice`) VALUES
(1, 1, 1, '2024-12-01', 1, 150.00),
(2, 2, 2, '2024-12-02', 2, 150.00),
(3, 3, 3, '2024-12-03', 1, 300.00),
(4, 4, 4, '2024-12-04', 1, 200.00),
(5, 5, 5, '2024-12-05', 1, 250.00),
(6, 6, 6, '2024-12-06', 1, 400.00),
(7, 7, 7, '2024-12-07', 3, 360.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Description` text NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Category`, `Price`, `Description`, `Quantity`) VALUES
(1, 'Vintage Clock', 'Decor', 150.00, 'Antique wooden clock from the 19th century.', 5),
(2, 'Porcelain Vase', 'Decor', 75.00, 'Hand-painted vase with floral patterns.', 10),
(3, 'Bronze Statue', 'Sculpture', 300.00, 'Ancient bronze statue of a horse.', 3),
(4, 'Vintage Lamp', 'Lighting', 200.00, 'Classic lamp with stained glass shade.', 4),
(5, 'Antique Mirror', 'Decor', 250.00, 'Ornate gilded mirror from the early 20th century.', 2),
(6, 'Wooden Chest', 'Furniture', 400.00, 'Handcrafted chest with intricate carvings.', 1),
(7, 'Old Books Set', 'Books', 120.00, 'Collection of rare historical books.', 7);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
