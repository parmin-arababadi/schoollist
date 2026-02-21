-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2025 at 10:31 AM
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
-- Database: `schoollist`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_day` int(11) NOT NULL,
  `class_start` time NOT NULL,
  `class_end` time NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `lesson_id`, `teacher_id`, `class_day`, `class_start`, `class_end`, `start_date`, `finish_date`) VALUES
(1, 1, 4, 6, '11:30:00', '13:00:00', '2025-08-02', NULL),
(2, 2, 2, 5, '18:00:00', '20:00:00', '2025-08-06', NULL),
(3, 3, 3, 2, '09:00:00', '11:00:00', '2025-08-03', NULL),
(4, 7, 3, 1, '10:00:00', '11:30:00', '2025-08-06', NULL),
(5, 1, 4, 3, '08:30:00', '10:30:00', '2025-08-04', NULL),
(6, 6, 1, 4, '16:00:00', '19:00:00', '2025-11-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `lesson` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson`) VALUES
(1, 'physics'),
(2, 'biology'),
(3, 'math'),
(4, 'arabic_language'),
(5, 'persian_literature'),
(6, 'english_language'),
(7, 'chemistry'),
(8, 'geometry'),
(9, 'history');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(100) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `national_code` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `birth_date` date NOT NULL,
  `father_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `national_code`, `password`, `birth_date`, `father_name`) VALUES
(1, 'homa', 'hosseini', '2997844915', '$2y$10$dlP.JCcudXY4iRxNAVPiaOCT8IZLcc.9drY2/TQI553ks0ni7Bd2i', '2002-03-13', 'alireza'),
(2, 'parmin', 'hashemi', '2982389896', '$2y$10$CBxfcwadshAw5qr5eem7CuHwvnoa3Ev7m9QRTJ/6NcVLAu3yLu7By', '1998-06-25', 'mohamad'),
(3, 'diana', 'namdar', '2994718304', '$2y$10$pK6YxNfK1FwdPoKANduc9uJKS3Az/vh5Eb.Xtb2szwoKEo1XM2O6O', '1995-03-26', 'reza'),
(4, 'elham', 'namazi', '2994677028', '$2y$10$V2H757yxisaMaMr2PPMykuiDks1G1ip/Zoq3hNJzlPdz5yacqwzae', '2005-09-30', 'ali'),
(5, 'minoo', 'ebrahimi', '2999823470', '$2y$10$mRa/qzEEMLSsY51F9/jbzOT5G9ZRonEs0bTEJlqTQcoacViiP37OS', '2008-01-29', 'alireza'),
(6, 'reza', 'namdar', '2994503510', '$2y$10$nG6KHOsBUPtJwk7ZY2oCt.B.//q4TSNuk7J9OX.6xR3DvVdbQCBS6', '1990-06-08', 'abas');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `student_id`, `class_id`) VALUES
(1, 3, 5),
(2, 3, 2),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_mark`
--

CREATE TABLE `student_mark` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_class_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_mark`
--

INSERT INTO `student_mark` (`id`, `student_id`, `student_class_id`, `mark`) VALUES
(1, 3, 3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `national_code` varchar(10) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `education` varchar(20) NOT NULL,
  `membership_date` date NOT NULL,
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `national_code`, `father_name`, `birth_date`, `education`, `membership_date`, `phone_number`) VALUES
(1, 'parmin', 'arababadi', '2982389894', 'amin', '2000-02-12', 'fogh lisanse', '2025-11-12', '09916936013'),
(2, 'parsa', 'arababadi', '2982389895', 'amin', '1990-05-17', 'doctora', '2025-11-12', '09130479961'),
(3, 'sanaz', 'namazi', '2995618951', 'reza', '1985-12-04', 'doctora', '2025-11-12', '09128873927'),
(4, 'armin', 'hashemi', '2985764919', 'mobin', '1993-11-09', 'karshenasi arshad', '2025-11-12', '09136027490');

-- --------------------------------------------------------

--
-- Table structure for table `week_day`
--

CREATE TABLE `week_day` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `week_day`
--

INSERT INTO `week_day` (`id`, `title`) VALUES
(1, 'saturday'),
(2, 'sunday'),
(3, 'monday'),
(4, 'tuesday'),
(5, 'Wednesday'),
(6, 'thursday'),
(7, 'friday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `class_day` (`class_day`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `student_mark`
--
ALTER TABLE `student_mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `student_class_id` (`student_class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `week_day`
--
ALTER TABLE `week_day`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_mark`
--
ALTER TABLE `student_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `week_day`
--
ALTER TABLE `week_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`),
  ADD CONSTRAINT `classes_ibfk_3` FOREIGN KEY (`class_day`) REFERENCES `week_day` (`id`);

--
-- Constraints for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD CONSTRAINT `student_classes_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_classes_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `student_mark`
--
ALTER TABLE `student_mark`
  ADD CONSTRAINT `student_mark_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_mark_ibfk_2` FOREIGN KEY (`student_class_id`) REFERENCES `student_classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
