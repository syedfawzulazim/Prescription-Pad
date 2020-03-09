-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 07:34 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prescriptionpad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `password`) VALUES
('#cumillaCMH2020', '$2y$10$RCfSvc2.5.qFIcFjrwdnVOeAe0TclIBQ8fvSVNg68JrvBB1p4RtOK'),
('#cumillaCMH2021', '$2y$10$YsAkyV/USKdKVLpkKyoDAOejA2HUcEACn0goqJWvEo/oeo5DuFxvG');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslist`
--

CREATE TABLE `doctorslist` (
  `DoctorName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `DoctorID` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Age` int(3) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Qualification` varchar(500) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctorslist`
--

INSERT INTO `doctorslist` (`DoctorName`, `PhoneNumber`, `DoctorID`, `Password`, `Gender`, `Age`, `Email`, `Qualification`, `Image`) VALUES
('Kazi Hasinur Rahman', '01683200510', '016832005100012', '$2y$10$QGXaWSVCHSBs58k8hQZ6.uDBP1I/F/X062isSB7oB2NVOkpw5fKRG', 'Male', 45, 'KaziHasinurRahman@gmail.com', 'BDS, MS\r\nDental Surgeon', 'upimg/5c9ba20986fbe1.80409314.jpg'),
('Sania Ahsan', '01683200521', '016832005210015', '$2y$10$5yBs3eudW8V8nGtBh7x.QO6oWWU8cmrFJNY7DCBA/XMmxZ1T3FbSW', 'Female', 33, 'SaniaAhsan@gmail.com', 'MBBS, M.Phil, FCPS (Radiology),Fellowship Neuroradiology( University of Toronto)\r\nConsultant â€“ Diagnostic Radiology', 'upimg/5c9ba3e0ae8d85.49435121.jpg'),
('Mrinal Kumar Sarker', '01683200599', '016832005990011', '$2y$10$NgofpWLIZkQ4R6HbAcrruOf8ucE2fI7q98N67VwUgta1mrf4Yo.AK', 'Male', 58, 'MrinalKumarSarker@gmail.com', 'MBBS, FCPS, BCPS\r\nObstetrics and Gynaecology', 'upimg/5c9ba11b2156d3.06640947.jpg'),
('Md. Moarraf Hossen ', '01717208712', '017172087120001', '$2y$10$l8XxUWsRBL3QTeksKsNsM.pp7N6VzGBal.GHFvs9Ts4BF62dihjp2', 'Male', 55, 'Md.MoarrafHossen@gmail.com', 'MBBS,DMRT\r\nConsultant (Oncology)', 'upimg/5c9b764a4a1319.97506208.jpg'),
('Farzana Islam', '01717208713', '017172087130002', '$2y$10$HpQeyUh4hDrzaJGLGR95KOCUEbU4sNv/4qk/1SeNhZ3O9TAOhftQC', 'Female', 34, 'FarzanaIslam@gmail.com', 'MBBS (DMC), DCH (BICH), MCPS\r\nSpecialist and Head-Child Development Center', 'upimg/5c9b76f5adf0a3.03082276.jpg'),
('Biswajit Bhattacharjee ', '01717208714', '017172087140003', '$2y$10$laahfPCOz/liACSAomZS6ee.h1yWhVsB0NiFAZ8e2DHZiY3Ur9xYW', 'Male', 53, 'BiswajitBhattacharjee@gmail.com', 'MBBS,M.Phil (Medical Science) in Radiotherapy.\r\nConsultant (Radiation and clinical Oncology)', 'upimg/5c9b77c1b88f50.36149601.jpg'),
('Narendra Kumar', '01717208715', '017172087150004', '$2y$10$d48q66dyUm7gBBDCvMVmiugenS7LZayRaKWqhnCdlkx1XjeI1Nygi', 'Male', 46, 'NarendraKumar@gmail.com', 'MD-Radiation Oncology from (SGPGIMS) \r\nConsultant (Consultant - Radiation oncology)', 'upimg/5c9b794d647042.09125988.jpg'),
('Ajay Abrol', '01717208716', '017172087160005', '$2y$10$HqosSLXIZi.NFpNi.HoJBukKTmzH72g2nbdnK9riST5SnybqPZjUS', 'Male', 43, 'AjayAbrol@gmail.com', 'MBBS and MS in General Surgery\r\nCoordinator & Senior Consultant \r\nPlastic, Reconstructive & Cosmetic Surgery.', 'upimg/5c9b79e10c5757.24432093.jpg'),
('Jojo. V. Joseph ', '01717208717', '017172087170006', '$2y$10$8je1kgaTLZLEtZ8ESxFIGOvkJBxszTukSV.n.bhKj2o7i.Dp0uqOu', 'Male', 66, 'JojoV.Joseph@gmail.com', 'MBBS, MS General Surgery degree  MCh Post-Doctoral degree.\r\nSenior Consultant (Surgical Oncology )', 'upimg/5c9b7ac8787449.86079594.jpg'),
('Alim Akhtar Bhuiyan', '01717208718', '017172087180007', '$2y$10$hH5vQUjNS3gbt8fJAaKoK.11qBRgfNgrGPKxK7nJEdWFVr9yE.Kxu', 'Male', 53, 'Dr.AlimAkhtarBhuiyan@gmail.com', 'American Board Certified Neurologist and Epilepsy Specialist.\r\nCoordinator & Senior Consultant ', 'upimg/5c9b7b9ee579a4.61326591.jpg'),
('Gulshan Ara', '01717208718', '017172087180008', '$2y$10$jc8CrjOw4ArKlpmtf5G6DucfmjpfRlFfnk0nSNIXJErp8e.C15Q1.', 'Female', 42, 'GulshanAra@gmail.com', 'MS in Obstetrics/Gynaecology,FCPS.\r\nObstetrics and Gynaecology', 'upimg/5c9b82d8ade8a0.65913623.jpg'),
('Monowara Begum', '01717208719', '017172087190009', '$2y$10$9MiWQvML3RWRkZsVqqa9Z.HsilnPNtweaJHyTL5s36J6LPEjKZWk.', 'Female', 38, 'MonowaraBegum@gmail.com', 'MBBS, FCPS, IPGMR\r\nObstetrics and Gynaecology', 'upimg/5c9b9f6cc004b3.71227939.jpg'),
('Nilufar Sultana', '01717208719', '017172087210010', '$2y$10$N3uUaPECroVstMqzHIPuD.zw/toWAwKwvvOrBlHwavlwP68hHjnnG', 'Female', 48, 'NilufarSultana@gmail.com', 'MBBS, FCPS\r\nObstetrics and Gynaecology', 'upimg/5c9ba06f16ef75.66950486.jpg'),
('Motiur Rahman Molla', '01717208721', '017172087210013', '$2y$10$pMH8UpXJgbQt1VdoL9KwH.skrR/PhpnlMjizUncMU4/kSt4i55QgK', 'Male', 63, 'MotiurRahmanMolla@gmail.com', 'FCPS in Oral and Maxillofacial Surgery from BCPS.\r\nDental & Maxillofacial Surgery', 'upimg/5c9ba292aeb8d2.43057799.jpg'),
('Manphool Singhal', '01717208722', '017172087220014', '$2y$10$b8KVUE.DNgGiNSpdlz1ERuQaL9dieq6SxfvI0RSBP//L6oYAfdG9i', 'Male', 54, 'ManphoolSinghal@gmail.com', 'MBBS, MD, DNB (Radiodiagnosis),Cardiac MRI fellowship (Barts, London)\r\nSenior Consultant â€“ Diagnostic Radiology', 'upimg/5c9ba350f05136.11150697.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `old_prescription`
--

CREATE TABLE `old_prescription` (
  `PatientID` varchar(50) NOT NULL,
  `OldPrescriptionID` int(255) NOT NULL,
  `DoctorName` varchar(255) NOT NULL,
  `ImageP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `old_prescription`
--

INSERT INTO `old_prescription` (`PatientID`, `OldPrescriptionID`, `DoctorName`, `ImageP`) VALUES
('01683200516111111', 5, 'Kazi Hasinur Rahman', 'presimg/5cab8444d2f931.97818019.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `PharmacyName` varchar(50) NOT NULL,
  `PharmacyPhone` varchar(11) NOT NULL,
  `PharmacyID` varchar(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`PharmacyName`, `PharmacyPhone`, `PharmacyID`, `Password`) VALUES
('CMH Pharmacy', '01717208750', '01717208750', '$2y$10$qUy8y62MxXJaJg9Xs4Gk1eRXxDoLdnMy.qWQDWYMkRlqDs.rbj47O'),
('Central Pharmacy', '01717208751', '01717208751', '$2y$10$Im0blR4u3UwDwfSzdQ0WLeNTL67Z0gktpoPsOc/s4VC5D2Yg9GkRy');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `DoctorName` varchar(50) NOT NULL,
  `DoctorID` varchar(15) NOT NULL,
  `PatientID` varchar(50) NOT NULL,
  `PrescriptionID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Disease` varchar(800) NOT NULL,
  `Test` varchar(800) NOT NULL,
  `Medicine` varchar(800) NOT NULL,
  `Advice` varchar(800) NOT NULL,
  `Validity` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`DoctorName`, `DoctorID`, `PatientID`, `PrescriptionID`, `Date`, `Disease`, `Test`, `Medicine`, `Advice`, `Validity`) VALUES
('Jojo. V. Joseph ', '017172087170006', '01683200510111111', 8, '2019-04-05', 'Heart', 'Blood Test', '1. NapaExtra\r\n2. Amodis \r\n3. Off Coff', 'Sleep Early', '2019-04-17'),
('Jojo. V. Joseph ', '017172087170006', '01683200510111111', 9, '2019-04-15', 'jj', 'jj', 'jj', 'jj', '2019-04-07'),
('Jojo. V. Joseph ', '017172087170006', '01683200510111111', 10, '2019-04-11', 'jjjjjj', 'jjjjjjj', 'jjjjj', 'jjjjj', '2019-04-20'),
('Jojo. V. Joseph ', '017172087170006', '01683200510111111', 11, '2019-04-17', 'j', 'j', 'j', 'j', '2019-04-03'),
('Jojo. V. Joseph ', '017172087170006', '01683200510111111', 12, '2019-04-26', 'j', 'j', 'j', 'j', '2019-04-18'),
('Jojo. V. Joseph ', '017172087170006', '01683200516111111', 13, '2019-04-05', '1. Heart disease\r\n2. High pressure\r\n3. High cholesterol', '1. Blood test\r\n2. Diabetes test\r\n3. Cholesterol test', '1. Napa Extra [0+0+1]\r\n2. Napa Extended [1+0+0]\r\n3. Ecosprin [1+0+1]', '1. Sleep early\r\n2. Do not tension\r\n3. Morning walk must.\r\n4. Avoid junk foods.', '2019-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `p_profile`
--

CREATE TABLE `p_profile` (
  `PatientID` varchar(50) NOT NULL,
  `ID` int(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Blood` varchar(2) NOT NULL,
  `Age` varchar(3) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_profile`
--

INSERT INTO `p_profile` (`PatientID`, `ID`, `Gender`, `Blood`, `Age`, `Occupation`, `Phone`, `Address`, `Picture`) VALUES
('01683200510111111', 13, 'Male', 'B+', '24', 'Student', '', '22 No. Gate, Cumilla Cantoment, Cumilla.', 'pimg/5c9ba5e673a990.84463399.jpg'),
('01683200511111111', 14, 'Male', 'B-', '22', 'Engg.', '', 'Ammtoli, Cumilla Cantonment,Cumilla.', 'pimg/5c9ba6650e0068.91519284.jpg'),
('01683200513111111', 15, 'Male', 'B+', '36', 'Govt. Job', '', 'Jhawtola, Cumilla.', 'pimg/5c9ba6d487b9a9.64479116.jpg'),
('01683200514111111', 16, 'Male', 'O-', '44', 'Business', '', 'Kandirpar, Cumilla', 'pimg/5c9ba70cea1dd4.93979946.jpg'),
('01683200515111111', 17, 'Female', 'A+', '22', 'Student', '', 'Cumilla', 'pimg/5c9ba77d151f29.23796556.jpg'),
('01683200516111111', 18, 'Female', 'A+', '33', 'Student', '', 'Cumilla', 'pimg/5c9ba8e2040f56.33565345.jpg'),
('01683200517111111', 19, 'Female', 'A+', '22', 'Engg.', '', 'Cumilla', 'pimg/5c9ba985a9cda2.21703587.jpg'),
('01683200518111111', 20, 'Female', 'B+', '25', 'Student', '', 'Cumilla ', 'pimg/5c9ba9465c55c1.41341042.jpg'),
('11111111111111111', 26, 'Male', 'A+', '22', 'Engg.', '10101010101', 'gg', 'pimg/5ca4f3980006a5.50194926.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(10) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `Phone`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
(17, '01683200510111111', 'Adnan', 'Sparrow', 'adnansyed27@gmail.com', '$2y$10$R1dyP69smSGDPR7o0NsvKOcihe1tXa0o.NWXgRnJFU6HmVSpvpROq'),
(18, '01683200511111111', 'Nasif', 'khan', 'nasifkhan27@gmail.com', '$2y$10$6apc9ZGuw9oJbz4Uoz0B7eJml7eo1fcKiKfjsH9yvlFrrnTzrn9FS'),
(19, '01683200513111111', 'Adnan', 'khan', 'adnankhan27@gmail.com', '$2y$10$D7xYw5S2oO/PueaX9RVyFu3Pmou9QqFEd7vEI5VFI1.RN3CWuTWAq'),
(20, '01683200514111111', 'MD', 'Ahmed', 'mdahmed22@gmail.com', '$2y$10$4fdhyDf2C6SzAjbD5Xk6U.Lfe.FfZdQDY7Pq87KLq2Zwg21h8IAse'),
(21, '01683200515111111', 'Fariha', 'Khan', 'farihakhan@gmail.com', '$2y$10$sU0jVS5KAOhxzaKz7sWo0.62knSaWep.xK8Dz5jVnc9ETY8Szz0GG'),
(22, '01683200516111111', 'Sayma', 'Ahmed', 'saymaahmed@gmail.com', '$2y$10$73nFn7WhVA9Ccfw2E12gR.HGrs4DncJrsJU8cWhXwVDaJRVCSsA16'),
(23, '01683200517111111', 'Israt', 'Khabir', 'maisha@gmail.com', '$2y$10$qqoQUZjTV0ntukN8auuAL.zwfYOiLmsXkTcZUxqNVw6NgSPy9svBe'),
(24, '01683200518111111', 'Sharmily ', 'Chaitee', 'sharmilychaitee@gmail.com', '$2y$10$3U8.x0nH2/Ur0n7JXHKLher0vE/7FfxjVQkU.O2WuP4Z4wXkq/DRi');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `PatientID` varchar(50) NOT NULL,
  `PrescriptionID` int(10) NOT NULL,
  `ReportID` int(10) NOT NULL,
  `ImageR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `doctorslist`
--
ALTER TABLE `doctorslist`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `old_prescription`
--
ALTER TABLE `old_prescription`
  ADD PRIMARY KEY (`OldPrescriptionID`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`PharmacyID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`PrescriptionID`);

--
-- Indexes for table `p_profile`
--
ALTER TABLE `p_profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Phone`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `old_prescription`
--
ALTER TABLE `old_prescription`
  MODIFY `OldPrescriptionID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `PrescriptionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `p_profile`
--
ALTER TABLE `p_profile`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
