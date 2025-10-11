-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2025 at 03:59 PM
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
-- Database: `chats`
--
CREATE DATABASE IF NOT EXISTS `chats` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chats`;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `NAME` varchar(25) NOT NULL,
  `LAST_NAME` varchar(30) DEFAULT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `NAME`, `LAST_NAME`, `number`, `email`) VALUES
(1, 'parmin', 'arababadi', '09916936013', NULL),
(2, 'parsa', NULL, '09130479961', 'parsaarababadi@gmail.com'),
(3, 'rana', NULL, '', 'rana@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `contacts`
--
CREATE DATABASE IF NOT EXISTS `contacts` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `contacts`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `create_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `last_name`, `number`, `email`, `create_date`) VALUES
(1, 'parmin', 'arababadi', '09916936013', NULL, '2025-04-12'),
(2, 'narges', NULL, '09194847704', 'test@gmail.com', '2025-04-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number unique` (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `number`, `genre`) VALUES
(1, 'melat_eshgh', 5, 'historical_romance'),
(2, 'anne_sherlie', 8, 'coming_of_age_fiction'),
(3, 'the_5am _club', 3, 'self_help'),
(4, 'everybody_lies', 3, 'social_science'),
(5, 'make_your_bed', 4, 'motivational'),
(6, 'the_shark_and_goldfish', 2, 'self_help'),
(7, 'ping ', 1, 'self_help'),
(8, 'asar_morakab', 3, 'self_help'),
(9, 'dont_fuck_yourself', 5, 'self_help'),
(10, 'present', 3, 'self_help'),
(11, 'eat_the_frog', 0, 'self_help'),
(12, 'two_centuries_of_silence', 2, 'historical'),
(13, 'eat the frog', 2, 'selfhelp');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `borrowing_date` date NOT NULL,
  `giving_back_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `book_id`, `member_id`, `borrowing_date`, `giving_back_date`) VALUES
(1, 1, 1, '2025-06-01', NULL),
(2, 1, 5, '2025-06-18', NULL),
(3, 3, 3, '2025-05-01', '2025-06-17'),
(4, 2, 4, '2025-05-30', '2025-06-18'),
(5, 4, 4, '2025-05-01', '2025-06-18'),
(6, 2, 2, '2025-04-01', '2025-06-01'),
(7, 1, 4, '2025-03-05', '2025-05-28'),
(8, 6, 3, '2025-06-18', NULL),
(9, 11, 2, '2025-05-01', '2025-06-27'),
(10, 6, 3, '2025-06-01', '2025-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `national_code` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `birth_date` date NOT NULL,
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `national_code`, `create_date`, `birth_date`, `phone_number`) VALUES
(1, 'parmin', 'arababadi', '2982389894', '2025-06-18 01:08:15', '2011-05-12', '09916936013'),
(2, 'sanaz', 'namazi', '2985618951', '2025-06-18 01:09:23', '1996-06-01', '09126719403'),
(3, 'homa', 'Hashemi', '2986302783', '2025-06-18 01:00:00', '1990-03-27', '09137306712'),
(4, 'diana', 'namdar', '2984563917', '2025-06-18 01:25:20', '2007-02-25', '09337844557'),
(5, 'mania', 'hosseini', '2983496201', '2025-06-18 01:57:35', '2000-10-07', '09125619720');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"angular_direct\":\"direct\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"schoollist\",\"table\":\"student_mark\"},{\"db\":\"schoollist\",\"table\":\"student_classes\"},{\"db\":\"schoollist\",\"table\":\"teachers\"},{\"db\":\"schoollist\",\"table\":\"classes\"},{\"db\":\"schoollist\",\"table\":\"students\"},{\"db\":\"schoollist\",\"table\":\"week_day\"},{\"db\":\"schoollist\",\"table\":\"lessons\"},{\"db\":\"school_list\",\"table\":\"student_classes\"},{\"db\":\"school_list\",\"table\":\"student_marks\"},{\"db\":\"schoollist\",\"table\":\"days\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'school list', 'students', '{\"CREATE_TIME\":\"2025-04-20 10:00:26\"}', '2025-04-20 17:29:18'),
('root', 'school list', 'students_classes', '{\"sorted_col\":\"`lesson` ASC\"}', '2025-04-24 08:44:41'),
('root', 'schoollist', 'student_mark', '{\"sorted_col\":\"`student_mark`.`student_id` ASC\",\"CREATE_TIME\":\"2025-09-04 08:25:25\",\"col_order\":[0,1,2,3],\"col_visib\":[1,1,1,1]}', '2025-09-22 16:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-10-11 13:58:13', '{\"Console\\/Mode\":\"collapse\",\"Console\\/Height\":-11.008466999999996}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `school list`
--
CREATE DATABASE IF NOT EXISTS `school list` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `school list`;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `LESSON` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `LESSON`) VALUES
(1, 'Math'),
(2, 'physics'),
(3, 'biology'),
(4, 'history'),
(5, 'persian literature'),
(6, 'Arabic language');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `last_name`, `phone_number`, `create_date`) VALUES
(1, 'parmin', 'arababadi', '0', '2025-04-20 00:00:00'),
(2, 'parisa', '', '0', '2025-04-20 00:00:00'),
(3, 'parsa', '', '09130479961', '2025-04-20 00:00:00'),
(4, 'neusha', 'ghasemi', '09xxxxxxxxx', '2025-04-20 00:00:00'),
(5, 'ali', '', '09xxxxxxxxx', '2025-04-20 00:00:00'),
(6, 'narges', '', '09xxxxxxxxx', '2025-04-20 00:00:00'),
(7, 'neda', 'Hashemi', '09xxxxxxxxx', '2025-04-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students_classes`
--

CREATE TABLE `students_classes` (
  `students_id` int(11) NOT NULL,
  `lesson` varchar(30) NOT NULL,
  `class_time` time NOT NULL,
  `class_start_date` date DEFAULT NULL,
  `midterm_mark` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_classes`
--

INSERT INTO `students_classes` (`students_id`, `lesson`, `class_time`, `class_start_date`, `midterm_mark`) VALUES
(1, 'Math', '07:00:00', '2025-04-01', NULL),
(1, 'physics', '10:00:00', '2025-04-01', NULL),
(2, 'physics', '10:00:00', '2025-04-01', NULL),
(3, 'biology', '06:30:00', '2025-04-08', NULL),
(7, 'biology', '06:30:00', '2025-04-08', NULL),
(2, 'Math', '07:00:00', '2025-04-01', NULL),
(7, 'Math', '07:00:00', '2025-04-01', NULL),
(5, 'History', '13:00:00', NULL, NULL),
(4, 'History', '13:00:00', '2025-04-06', NULL),
(5, 'Persian literature', '16:00:00', '2025-04-06', NULL),
(2, 'arabic ', '13:00:00', '2025-04-06', NULL),
(2, 'Arabic language', '08:00:00', '2025-04-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Last_name` varchar(40) NOT NULL,
  `work_history` varchar(30) NOT NULL,
  `Date_of_membership` datetime NOT NULL DEFAULT current_timestamp(),
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`Id`, `Name`, `Last_name`, `work_history`, `Date_of_membership`, `phone_number`) VALUES
(1, 'parmin', '', '2', '2025-04-21 10:21:03', '09916936013'),
(2, 'parmin', 'arababadi', '10years', '2025-04-21 10:24:44', '0913xxxxxxx'),
(3, 'sahar', 'nasiri', '20years', '2025-04-21 10:29:44', '0921xxxxxxx'),
(4, 'parisa', 'Hashemi', '14yaers', '2025-04-21 10:30:57', '09130479961'),
(5, 'parsa', 'Hoseini', '3years', '2025-04-21 10:34:10', '09135489014'),
(6, 'saghar', 'nasiri', '1year', '2025-04-21 10:36:28', '09910913428');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_classes`
--

CREATE TABLE `teachers_classes` (
  `Teachers_id` int(11) NOT NULL,
  `lesson` varchar(30) NOT NULL,
  `class_time` time NOT NULL,
  `class_start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers_classes`
--

INSERT INTO `teachers_classes` (`Teachers_id`, `lesson`, `class_time`, `class_start_date`) VALUES
(3, 'History', '13:00:00', '2025-04-06'),
(1, 'Math', '07:00:00', '2025-04-01'),
(4, 'physics', '10:00:00', '2025-04-01'),
(5, 'biology', '07:00:00', '2025-04-08'),
(6, 'Persian literature', '16:00:00', '2025-04-06'),
(2, 'Arabic language', '08:00:00', '2025-04-06'),
(2, 'Arabic language', '13:00:00', '2025-04-06');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `students_classes`
--
ALTER TABLE `students_classes`
  ADD KEY `students_id` (`students_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`,`Date_of_membership`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students_classes`
--
ALTER TABLE `students_classes`
  ADD CONSTRAINT `students_classes_ibfk_1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`);
--
-- Database: `schoollist`
--
CREATE DATABASE IF NOT EXISTS `schoollist` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `schoollist`;

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
(2, 2, 7, 5, '18:00:00', '20:00:00', '2025-08-06', NULL),
(3, 3, 6, 2, '09:00:00', '11:00:00', '2025-08-03', NULL),
(4, 7, 3, 1, '10:00:00', '11:30:00', '2025-08-06', NULL),
(5, 1, 4, 3, '08:30:00', '10:30:00', '2025-08-04', NULL);

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
(1, 'parmin', 'Hashemi', '2982389894', 'par2982389894', '2001-12-26', 'amin'),
(2, 'sanaz', 'namazi', '2995572991', '$2y$10$AGkwlWl4ofrzwMVK0vCb5.k37iztcw7i66il2QLo36iIxtHON.WAG', '2005-06-21', 'ali'),
(3, 'homa', 'hosseini', '2997844915', '$2y$10$qHvvRkIXoSo5/vPva211ieDd2icm.SAtegW30QbkSn.6mhqqyI00q', '1995-07-10', 'mohsen'),
(4, 'diana', 'namdar', '2994718304', '$2y$10$cdgYxUIZR.4m73.8ZpuC0eijijBNRbL7fvCQCoYkfKw.0ZuQ.bSXq', '2000-04-03', 'reza'),
(5, 'elham', 'nazari', '2994677028', '$2y$10$uNnYhBBtaTvCJ2xkMXM1QuFgH.QeYk6uEoT4T8fPAMQURjB7yscWe', '1990-04-12', 'alireza');

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
(1, 2, 5),
(2, 1, 1),
(3, 3, 1),
(4, 4, 2),
(5, 1, 5),
(6, 2, 3),
(7, 4, 5),
(8, 4, 1),
(9, 4, 5),
(10, 4, 5);

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
(1, 1, 2, 12),
(2, 1, 5, 20),
(3, 4, 7, 20),
(4, 4, 4, 16),
(5, 3, 3, 17),
(9, 4, 9, 18);

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
(1, 'parmin', 'arababadi', '2982389894', 'amin', '1996-06-01', 'karshenasi arshad', '2025-08-20', '09916936013'),
(2, 'parsa', 'arababadi', '2982389895', 'amin', '2000-11-22', 'karshenasi arshad', '2020-08-22', '09130479961'),
(3, 'sanaz', 'namazi', '2995572991', 'reza', '2000-09-30', 'fogh lisanse', '2018-03-09', '09136027490'),
(4, 'armin', 'hashemi', '2997844915', 'akbar', '1990-12-01', 'doctora', '1999-10-03', '09124035829');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_mark`
--
ALTER TABLE `student_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
--
-- Database: `school_list`
--
CREATE DATABASE IF NOT EXISTS `school_list` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `school_list`;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `class_start` time NOT NULL,
  `class_end` time NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date DEFAULT NULL,
  `class_day` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `teacher_id`, `lesson_id`, `class_start`, `class_end`, `start_date`, `finish_date`, `class_day`) VALUES
(1, 3, 8, '10:00:00', '12:00:00', '2024-12-06', NULL, 3),
(2, 2, 2, '08:00:00', '09:30:00', '2025-05-01', NULL, 2),
(3, 4, 4, '13:00:00', '15:00:00', '2025-03-01', NULL, 6),
(4, 1, 4, '12:00:00', '13:30:00', '2025-02-01', NULL, 5),
(5, 6, 5, '10:00:00', '12:00:00', '2025-05-01', NULL, 4),
(6, 5, 6, '09:00:00', '10:30:00', '2025-05-01', NULL, 4),
(7, 7, 9, '16:00:00', '19:00:00', '2024-07-20', NULL, 1),
(8, 7, 3, '08:00:00', '10:00:00', '2025-05-01', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `title` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `title`) VALUES
(1, 'saturday'),
(2, 'sunday'),
(3, 'monday'),
(4, 'tuesday'),
(5, 'wednesday'),
(6, 'thursday'),
(7, 'friday');

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
(1, 'biology'),
(2, 'physics'),
(3, 'math'),
(4, 'history'),
(5, 'persian_literature'),
(6, 'arabic_language'),
(7, 'english_language'),
(8, 'chemistry'),
(9, 'geometry');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `national_code` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `father_name`, `national_code`, `birth_date`, `phone_number`, `address`) VALUES
(1, 'parmin', 'arababadi', 'amin', '2982389894', '2011-05-12', '09916936013', 'danesh street, kerman, iran'),
(2, 'atrin', 'jahanshahi', 'iman', '2989067331', '2013-04-02', '09137719014', 'komeyl street, kerman, iran'),
(3, 'helia', 'ghasemi', 'saman', '2987612048', '2011-04-01', '09126784109', 'jomhuri blvd, kerman, iran'),
(4, 'homa', 'Hashemi', 'hosein', '2985618951', '2011-01-09', '09137306712', 'alley 7, 24 azar, kerman, iran'),
(5, 'parham', 'masedeghi', 'reza', '2986509341', '2013-05-16', '09137813926', 'alley 9, jomhuri blvd, kerman, iran'),
(6, 'saba', 'salajeghe', 'ahmad', '2986530948', '2010-09-23', '09136942045', 'alley 5, jomhuri blvd, kerman, iran'),
(7, 'nazanin', 'khaleghi', 'mobin', '2987053706', '2015-05-13', '09137208716', 'alley 11, jomhuri blvd, kerman, iran'),
(8, 'sofia', 'hashemi', 'reza', '2986520596', '2010-05-12', '09125604815', 'alley22, hamze street, kerman, iran'),
(9, 'hasti', 'ghasemi', 'reza', '2983748902', '2008-02-11', '09126784092', 'alley 9, esteghlal street, kerman, iran\r\n'),
(11, 'sanaz', 'namazi', 'sina', '2985618951', '2001-10-06', '09138953059', 'alley19, bahonar street, kerman, iran'),
(12, 'parmiiin', 'arababadi', 'ammin', '2982389894', '2011-05-12', '09916936013', 'kerman'),
(13, 'nargesss', 'arababadi', 'ammin', '2982389894', '2011-05-12', '09916936013', 'kerman');

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
(1, 1, 3),
(2, 3, 4),
(3, 4, 8),
(4, 1, 7),
(5, 5, 4),
(6, 4, 2),
(7, 3, 1),
(8, 4, 5),
(9, 2, 6),
(10, 3, 6),
(11, 6, 2),
(12, 4, 7),
(13, 8, 2),
(14, 7, 6),
(15, 7, 7),
(16, 8, 2),
(17, 1, 5),
(18, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `classes_id` int(11) NOT NULL,
  `student_classes_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `classes_id`, `student_classes_id`, `mark`) VALUES
(1, 1, 3, 1, 20),
(2, 3, 4, 2, 18),
(3, 7, 7, 15, 17),
(4, 6, 2, 11, 20),
(5, 3, 1, 7, 13),
(6, 5, 4, 5, 15),
(7, 1, 6, 18, 20),
(8, 3, 6, 10, 18),
(9, 2, 6, 9, 16),
(10, 8, 2, 16, 20),
(11, 4, 2, 6, 13),
(12, 4, 7, 12, 19);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `national_code` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `education` varchar(30) NOT NULL,
  `membership_date` date NOT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `father_name`, `national_code`, `birth_date`, `phone_number`, `education`, `membership_date`, `start_date`) VALUES
(1, 'parsa', 'arababadi', 'amin', '2982467130', '2007-12-21', '09130479961', 'lisanse', '2025-04-29', '2016-04-01'),
(2, 'narges', 'fakour', 'ali', '2982467130', '2000-03-01', '09194847704', 'fogh_lisanse', '2025-04-30', '2017-04-01'),
(3, 'mobin', 'Hashemi', 'mostafa', '2985618350', '1995-05-10', '09127302857', 'karshenasi arshad', '2025-05-01', '2015-06-06'),
(4, 'parya', 'moradi', 'ali', '2981492710', '1977-05-01', '09139278042', 'doctora', '2025-05-01', '2000-07-15'),
(5, 'bita', 'bakhshoodeh', 'mohsen', '2986590147', '2010-12-11', '09338252804', 'lisanse', '2025-05-07', '2000-07-15'),
(6, 'sarina', 'amiri ', 'ali', '2987654906', '1980-05-01', '09125289012', 'doctora', '2015-05-08', '2005-05-12'),
(7, 'parmin', 'arababadi', 'amin', '2987654906', '1980-05-01', '09125289012', 'fogh_lisanse', '2015-05-08', '2005-05-12'),
(8, 'yasna', 'mohebi ', 'akbar', '2984519524', '1980-02-01', '09013492740', 'doctora', '2015-03-23', '2015-03-23');

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
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `classes_id` (`classes_id`),
  ADD KEY `student_classes_id` (`student_classes_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`),
  ADD CONSTRAINT `classes_ibfk_3` FOREIGN KEY (`class_day`) REFERENCES `days` (`id`);

--
-- Constraints for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD CONSTRAINT `student_classes_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_classes_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD CONSTRAINT `student_marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_marks_ibfk_2` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `student_marks_ibfk_3` FOREIGN KEY (`student_classes_id`) REFERENCES `student_classes` (`id`);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
