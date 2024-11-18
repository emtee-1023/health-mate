-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 18, 2024 at 11:15 AM
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
-- Database: `health_mate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `PhoneNum` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Pfp` varchar(255) DEFAULT NULL,
  `_2FAStatus` tinyint(1) DEFAULT 0,
  `_2FACode` int(11) DEFAULT NULL,
  `_2FAExpiry` datetime DEFAULT NULL,
  `PReset` varchar(255) DEFAULT NULL,
  `PResetExpiry` datetime DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `FName`, `LName`, `PhoneNum`, `Email`, `Password`, `Pfp`, `_2FAStatus`, `_2FACode`, `_2FAExpiry`, `PReset`, `PResetExpiry`, `CreatedAt`, `LastLogin`, `LastUpdate`) VALUES
(1, 'lawry', 'abuna', '079966758', 'lari@gmail.com', '12345672', 'profile.jpeng', 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppointmentID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `AppointmentDate` datetime DEFAULT NULL,
  `VirtualLink` varchar(255) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `VerificationStatus` tinyint(1) DEFAULT 0,
  `ConsultationFee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `BloodGroupID` int(11) NOT NULL,
  `BloodGroupName` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`BloodGroupID`, `BloodGroupName`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Sex` enum('male','female','intersex') DEFAULT NULL,
  `PhoneNum` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Pfp` varchar(255) DEFAULT NULL,
  `Bio` text DEFAULT NULL,
  `MedicCert` varchar(255) DEFAULT NULL,
  `QualiStatus` tinyint(1) DEFAULT 0,
  `_2FAStatus` tinyint(1) DEFAULT 0,
  `_2FACode` int(11) DEFAULT NULL,
  `_2FAExpiry` datetime DEFAULT NULL,
  `PReset` varchar(255) DEFAULT NULL,
  `PResetExpiry` datetime DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `QualifiedAt` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `DOB`, `FName`, `LName`, `Sex`, `PhoneNum`, `Email`, `Password`, `Pfp`, `Bio`, `MedicCert`, `QualiStatus`, `_2FAStatus`, `_2FACode`, `_2FAExpiry`, `PReset`, `PResetExpiry`, `CreatedAt`, `QualifiedAt`, `LastLogin`, `LastUpdate`) VALUES
(1, '2004-02-20', 'Lawrie', 'Abuna', 'male', '0706792790', 'lawrie.abuna@strathmore.edu', '$2y$10$cmWBGDi6qWSko/phEDuAje.N7Wpu0gVT76c76dESe/8bKLo90UJcW', 'defaultuser.png', 'I am a doctor', 'uploads/files/6729f458c9d21-', 0, 1, NULL, NULL, NULL, NULL, '2024-11-05 13:32:56', NULL, '2024-11-05 14:11:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MedicineID` int(11) NOT NULL,
  `MedicineName` varchar(255) NOT NULL,
  `MedicinePhoto` varchar(255) DEFAULT NULL,
  `UseCase` text NOT NULL,
  `MedicinePrice` decimal(10,2) NOT NULL,
  `AvailableStock` int(11) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MedicineID`, `MedicineName`, `MedicinePhoto`, `UseCase`, `MedicinePrice`, `AvailableStock`, `DateCreated`) VALUES
(1, 'Paracetamol', 'medicinePlaceholder.png', 'Common pain reliever & fever reducer', 200.00, 30, '2024-10-07 20:12:59'),
(2, 'Amoxicillin', 'medicinePlaceholder.png', 'Used to treat various bacterial infections', 500.00, 200, '2024-10-07 20:14:49'),
(3, 'Aspirin', 'medicinePlaceholder.png', 'Reduces pain, fever or inflammation ', 150.00, 500, '2024-10-07 21:11:12'),
(4, 'Cough Syrup', 'medicinePlaceholder.png', 'Relieves cough and throat irritation.', 300.00, 100, '2024-10-15 19:52:49'),
(5, 'Vitamin C Supplements', 'medicinePlaceholder.png', 'Boosts immune system and skin health.', 180.00, 399, '2024-10-15 19:53:28'),
(6, 'Antibiotic Ointment', 'medicinePlaceholder.png', 'Used for treating minor cuts and burns.', 250.00, 184, '2024-10-15 19:54:03'),
(7, 'Antihistamine', 'medicinePlaceholder.png', 'Relieves allergy symptoms.\r\n', 220.00, 724, '2024-10-15 19:57:45'),
(8, 'Anti Acids', 'medicinePlaceholder.png', 'Relieves heartburn and indigestion.', 270.00, 7842, '2024-10-15 19:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `NurseID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Sex` enum('male','female','intersex') DEFAULT NULL,
  `PhoneNum` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Pfp` varchar(255) DEFAULT NULL,
  `Bio` text DEFAULT NULL,
  `MedicCert` varchar(255) DEFAULT NULL,
  `QualiStatus` tinyint(1) DEFAULT 0,
  `_2FAStatus` tinyint(1) DEFAULT 0,
  `_2FACode` int(11) DEFAULT NULL,
  `_2FAExpiry` datetime DEFAULT NULL,
  `PReset` varchar(255) DEFAULT NULL,
  `PResetExpiry` datetime DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `QualifiedAt` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Sex` enum('male','female','intersex') DEFAULT NULL,
  `Pfp` varchar(255) DEFAULT NULL,
  `MedicalHistory` text DEFAULT NULL,
  `Weight` decimal(11,1) DEFAULT NULL,
  `Height` decimal(11,1) DEFAULT NULL,
  `BMI` double DEFAULT NULL,
  `BMIInterpretation` varchar(50) DEFAULT NULL,
  `BloodGroupID` int(11) DEFAULT NULL,
  `LastAppointment` datetime DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientID`, `DOB`, `FName`, `LName`, `Sex`, `Pfp`, `MedicalHistory`, `Weight`, `Height`, `BMI`, `BMIInterpretation`, `BloodGroupID`, `LastAppointment`, `CreatedAt`, `LastUpdate`, `UserID`) VALUES
(1, '2000-02-10', 'John', 'Doe', 'male', 'defaultpfp.png', NULL, 52.5, 162.5, 19.88, 'Normal weight', 3, NULL, '2024-11-11 19:11:28', '2024-11-11 19:40:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists`
--

CREATE TABLE `pharmacists` (
  `PharmacistID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Sex` enum('male','female','intersex') DEFAULT NULL,
  `PhoneNum` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Pfp` varchar(255) DEFAULT NULL,
  `Bio` text DEFAULT NULL,
  `MedicCert` varchar(255) DEFAULT NULL,
  `QualiStatus` tinyint(1) DEFAULT 0,
  `_2FAStatus` tinyint(1) DEFAULT 0,
  `_2FACode` int(11) DEFAULT NULL,
  `_2FAExpiry` datetime DEFAULT NULL,
  `PReset` varchar(255) DEFAULT NULL,
  `PResetExpiry` datetime DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `QualifiedAt` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_purchases`
--

CREATE TABLE `pharmacy_purchases` (
  `PurchaseID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MedicineID` int(11) DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalCost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PhoneNum` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Sex` enum('male','female','intersex') DEFAULT NULL,
  `Pfp` varchar(255) DEFAULT NULL,
  `_2FAStatus` tinyint(1) DEFAULT 0,
  `_2FACode` int(11) DEFAULT NULL,
  `_2FAExpiry` datetime DEFAULT NULL,
  `PReset` varchar(255) DEFAULT NULL,
  `PResetExpiry` datetime DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `DOB`, `FName`, `LName`, `Email`, `PhoneNum`, `Password`, `Sex`, `Pfp`, `_2FAStatus`, `_2FACode`, `_2FAExpiry`, `PReset`, `PResetExpiry`, `CreatedAt`, `LastLogin`, `LastUpdate`) VALUES
(1, '2005-04-10', 'Mark', 'Talamson', 'marktalamson@gmail.com', '0792314330', '$2y$10$EmluQsgZoQBvxxscF.wFo.TAqw1LdNY3CqH3TdD9dfpzYEUoH9MF2', 'male', 'defaultpfp.png', 1, NULL, NULL, NULL, NULL, '2024-11-05 12:52:29', '2024-11-05 12:52:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`BloodGroupID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MedicineID`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`NurseID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BloodGroupID` (`BloodGroupID`);

--
-- Indexes for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD PRIMARY KEY (`PharmacistID`);

--
-- Indexes for table `pharmacy_purchases`
--
ALTER TABLE `pharmacy_purchases`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `MedicineID` (`MedicineID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNum` (`PhoneNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `BloodGroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MedicineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `NurseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pharmacists`
--
ALTER TABLE `pharmacists`
  MODIFY `PharmacistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacy_purchases`
--
ALTER TABLE `pharmacy_purchases`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
