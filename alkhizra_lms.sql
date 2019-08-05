-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 03:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alkhizra_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) NOT NULL,
  `classTitle` varchar(100) NOT NULL,
  `classDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `classTime` varchar(100) NOT NULL,
  `timeZone` varchar(30) NOT NULL,
  `room_token` varchar(50) NOT NULL,
  `courseId` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classTitle`, `classDate`, `classTime`, `timeZone`, `room_token`, `courseId`, `teacher_id`, `createdAt`, `updatedAt`) VALUES
(7, 'History of Java 2', '2019-03-08 00:18:29', 'Tuesday, August 27, 2019 07:00 PM - 09:00 PM (60 Min)', 'GMT Standard Time', '5d47b2bdddc22', 6, 5, '2019-08-05 11:17:30', '2019-08-05 06:17:30'),
(8, 'History of C++l', '2019-08-02 03:19:40', 'Tuesday, August 27, 2019 07:00 PM - 09:00 PM (60 Min)', 'GMT Standard Time', '5d4811efbfcad', 9, 11, '2019-08-05 06:24:31', '2019-08-05 06:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` int(10) NOT NULL,
  `conferenceName` varchar(50) NOT NULL,
  `conferenceDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conferenceTime` varchar(100) NOT NULL,
  `timeZone` varchar(50) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `conferenceName`, `conferenceDate`, `conferenceTime`, `timeZone`, `teacher_id`, `createdAt`, `updatedAt`) VALUES
(3, 'Ubiquitous Technology', '2019-08-02 12:43:45', 'Tuesday, August 27, 2019 07:00 PM - 09:00 PM (60 Min)', 'GMT Standard Time', 5, '2019-08-05 11:27:32', '2019-08-05 11:27:32'),
(4, 'AI Conferenece', '2019-08-02 03:24:31', 'Tuesday, August 27, 2019 07:00 PM - 09:00 PM (60 Min)', 'GMT Standard Time', 11, '2019-08-05 06:36:02', '2019-08-05 06:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `courseType` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `teacher_id` int(10) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `courseType`, `description`, `teacher_id`, `createdAt`, `updatedAt`) VALUES
(6, 'Introduction to Python', 'Free', 'This is a description about the course, which allows the user to show any king of description about the course.', 5, '2019-08-05 11:36:29', '2019-08-05 05:56:12'),
(9, 'Introduction to Islam', 'MOOC', 'dsds', 11, '2019-08-05 06:14:37', '2019-08-05 06:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
  `id` int(10) NOT NULL,
  `imageName` varchar(50) NOT NULL,
  `teacher_id` int(10) DEFAULT NULL,
  `student_id` int(10) DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_images`
--

INSERT INTO `profile_images` (`id`, `imageName`, `teacher_id`, `student_id`, `admin_id`, `createdAt`, `updatedAt`) VALUES
(2, '1565001316.jpg', 5, NULL, NULL, '2019-08-05 10:35:16', '2019-08-05 05:35:16'),
(3, '1564997678.jpg', 10, NULL, NULL, '2019-08-05 04:34:38', '2019-08-05 04:34:38'),
(4, '1565001769.png', NULL, NULL, 1, '2019-08-05 10:42:49', '2019-08-05 05:42:49'),
(5, '1565003149.jpg', NULL, 8, NULL, '2019-08-05 11:05:49', '2019-08-05 06:05:49'),
(6, '1565002172.png', 7, NULL, NULL, '2019-08-05 10:49:32', '2019-08-05 05:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', 'A user with Admin Privilege', '2019-06-13 07:00:00', '2019-06-13 07:00:00'),
(2, 'Teacher', 'A user with Teacher Privilege', '2019-06-13 07:00:00', '2019-06-13 07:00:00'),
(3, 'Student', 'A user with Student Privilege', '2019-06-13 07:00:00', '2019-06-13 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dateOfBirth` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `course_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `dateOfBirth`, `phoneNumber`, `email`, `course_id`, `teacher_id`, `user_id`, `createdAt`, `updatedAt`) VALUES
(8, 'Mian', 'Amir', '15-0-1995', '03034969407', 'alexa@gmail.com', 6, 5, 46, '2019-08-05 11:36:57', '2019-08-05 11:36:57'),
(9, 'Malik', 'Hamza', '15-03-1995', '03034969407', 'malikhamza@gmail.com', 6, 5, 53, '2019-08-05 06:00:45', '2019-08-05 06:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `phoneNumber` bigint(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `specialization`, `phoneNumber`, `email`, `user_id`, `createdAt`, `updatedAt`) VALUES
(5, 'Umar', 'Raza', 'BSSC', 3034969407, 'umarraza2200@gmail.com', 44, '2019-08-05 11:26:35', '2019-08-05 11:26:35'),
(7, 'Hassan', 'Amir', 'BSSC', 3034969407, 'haseeb@gmail.com', 48, '2019-08-05 12:38:58', '2019-08-05 12:38:58'),
(10, 'Numan', 'Hashmi', 'BSSC', 3034969407, 'numan@gmail.com', 51, '2019-08-05 01:41:50', '2019-08-05 01:41:50'),
(11, 'Numan', 'Aftab', 'BSSC', 3034969407, 'umarraza@stackcru.com', 54, '2019-08-05 06:07:33', '2019-08-05 06:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) NOT NULL,
  `testName` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `totalMarks` varchar(50) NOT NULL,
  `passingMarks` varchar(50) NOT NULL,
  `totalTime` varchar(20) NOT NULL,
  `instructions` varchar(500) NOT NULL,
  `course_id` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `testName`, `description`, `totalMarks`, `passingMarks`, `totalTime`, `instructions`, `course_id`, `createdAt`, `updatedAt`) VALUES
(9, 'fdfd', 'fdfd', '50', '25', 'fdfd', 'fdfd', 6, '2019-08-05 08:15:39', '2019-08-05 08:15:39'),
(10, 'fssf', 'sfsfs', '50', '25', 'sffsf', 'fsfsfs', 6, '2019-08-05 08:16:59', '2019-08-05 08:16:59'),
(11, 'dsdasd', 'dsdsds', '50', '25', 'sdsdds', 'dsdsds', 6, '2019-08-05 08:17:59', '2019-08-05 08:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `test_images`
--

CREATE TABLE `test_images` (
  `id` int(10) NOT NULL,
  `imageName` varchar(50) NOT NULL,
  `test_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accessCode` int(10) DEFAULT NULL,
  `roleId` int(10) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `accessCode`, `roleId`, `remember_token`, `verified`, `createdAt`, `updatedAt`) VALUES
(1, 'Super', 'Admin', 'admin@admin.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 1, 'rjGa88znxqDmHWAaN7wHUXKb9Xx0DwoucAXfs8LiqNCZ10hcXGOAvEOWacvp', 1, '2019-07-08 19:00:00', '2019-07-08 19:00:00'),
(44, 'Umar ', 'Raza', 'umarraza2200@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', 1121952115, 2, 'btqefrcdOGzpIsLLk1a6B9fBP3U0qaq1CUrOm2iZzMqpRIa2uQ8I0I2u0cbb', NULL, '2019-08-05 11:26:35', '2019-08-05 11:26:35'),
(46, 'Mian ', 'Amir', 'alexa@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', 317669759, 3, 'QOaJcJRczZ7NiIPuU2EadjePzLTgWEDtUCASHOHzKAbvRNV1SNeCAwv0dbiJ', NULL, '2019-08-05 11:36:57', '2019-08-05 11:36:57'),
(48, 'Hassan', 'Amir', 'haseeb@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', 813499318, 2, 'K2RfXTCWF17zRkCOgmAg551LKceS6OOBCaQu1PXKqcPA6iZU2HaAndT7WX5l', NULL, '2019-08-05 12:38:58', '2019-08-05 12:38:58'),
(51, 'Numan', 'Hashmi', 'numan@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', 353109931, 2, 'hx0Gqx5HWpVXkFJ0QMReRiPmORSuJqtw5qNMRtvwlZ9VBrwYvC9asFybainA', NULL, '2019-08-05 01:41:50', '2019-08-05 01:41:50'),
(53, 'Malik', 'Hamza', 'malikhamza@gmail.com', NULL, 96274071, 3, NULL, NULL, '2019-08-05 06:00:45', '2019-08-05 06:00:45'),
(54, 'Numan', 'Aftab', 'umarraza@stackcru.com', NULL, 1609090929, 2, NULL, NULL, '2019-08-05 06:07:33', '2019-08-05 06:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `token` varchar(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_images`
--
ALTER TABLE `test_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test_images`
--
ALTER TABLE `test_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
