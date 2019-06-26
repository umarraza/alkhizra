-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 03:52 PM
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
  `title` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time_from` varchar(100) NOT NULL,
  `time_to` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `teacher_description` varchar(500) NOT NULL,
  `teacher_email` varchar(50) DEFAULT NULL,
  `room_token` varchar(50) NOT NULL,
  `course_Id` int(10) NOT NULL,
  `teacherId` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `date`, `time_from`, `time_to`, `description`, `teacher_description`, `teacher_email`, `room_token`, `course_Id`, `teacherId`, `createdAt`, `updatedAt`) VALUES
(27, 'History of C++', '2019-03-07 16:18:29', '06:00:00 pm', '08:00:00 pm', 'Lorem Ipsum is simply dummy', 'Umar Raza will be the instructor of this class.', 'umarraza2200@gmail.com', '5d13542532ac1', 24, 63, '2019-06-26 12:23:57', '2019-06-26 06:16:53'),
(28, 'History of Java', '2019-03-07 16:18:29', '06:00:00 pm', '08:00:00 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza will be the instructor of this class.', 'umarraza2200@gmail.com', '5d1355652c549', 26, 63, '2019-06-26 06:22:13', '2019-06-26 06:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `about_instructor` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `teacherId` int(10) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`, `about_instructor`, `category`, `type`, `teacherId`, `createdAt`, `updatedAt`) VALUES
(24, 'Introduction to C++', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza is the instructor of this course.', 'Programming', 'Free', 3, '2019-06-24 23:25:37', '2019-06-24 23:25:37'),
(26, 'Introduction to Java', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza is the instructor of this course.', 'Programming', 'Free', 3, '2019-06-26 06:22:02', '2019-06-26 06:22:02');

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
  `gender` varchar(10) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `course_id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `gender`, `grade`, `email`, `course_id`, `userId`, `createdAt`, `updatedAt`) VALUES
(22, 'Ali', 'Raza', 'Male', 'A+', 'aliraza@gmail.com', 24, 64, '2019-06-25 04:26:35', '2019-06-25 04:26:35'),
(23, 'Usman', 'Munir', 'Male', 'A+', 'usman@gmail.com', 24, 65, '2019-06-25 04:28:15', '2019-06-25 04:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `address`, `description`, `email`, `userId`, `createdAt`, `updatedAt`) VALUES
(3, 'Umar', 'Raza', 'Lahore, Pakistan', 'Some description', 'umarraza2200@gmail.com', 63, '2019-06-25 04:24:13', '2019-06-25 04:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `password`, `accessCode`, `roleId`, `remember_token`, `verified`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 1, 'qpBWn6G34F3IaSkk4GtMw276oow5uEgY2dSjYH1unMvvRZMOCjticM15al2U', NULL, '2019-06-16 19:00:00', '2019-06-16 19:00:00'),
(63, 'Umar Raza', 'umarraza2200@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 2, 'OLRxPlMOsEVbZWSynRAwNRwk2L7diXOnFxkbJDl3mMeFXKnwOs3O5cr0qH5z', NULL, NULL, NULL),
(64, 'Ali Raza', 'aliraza@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 3, NULL, NULL, NULL, NULL),
(65, 'Usman Munir', 'usman@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 3, 'DzR3wVA45SDgnrLNtGWTpBfEFMXxIrqaMo6ylvuWXyQNbla0C32OExWDzfwH', NULL, NULL, NULL);

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
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`id`, `userId`, `token`, `createdAt`, `updatedAt`) VALUES
(1, 47, 'BGGxjjEpAjuvzDm6VO3nJCqjRSs57bofecKsr47U', '2019-06-20 01:21:40', '2019-06-20 01:21:40'),
(2, 48, '54uknRMHnhg5gD2gwWUwnFulIsZ2ToIRZtuCaORK', '2019-06-20 01:22:22', '2019-06-20 01:22:22'),
(3, 49, 'nlvmcMiBlEDfyWpVzSXtS9Cmmm39VWJi6lQbVv3R', '2019-06-20 01:23:24', '2019-06-20 01:23:24'),
(4, 50, 'FbEsGDxF3ootC0lgxQkyT1wtemu6R2JbXNnFGEy0', '2019-06-20 01:24:47', '2019-06-20 01:24:47'),
(5, 51, 'w3QKswetjdmbY9Q0aPWPbZxwgV9qJLrnTPMuBweg', '2019-06-20 01:25:20', '2019-06-20 01:25:20'),
(6, 52, '3i0rMTrb7Y5vJMaT9L9InUQZKxVOclnEZLgneKNN', '2019-06-20 01:27:29', '2019-06-20 01:27:29'),
(7, 53, 'xFugQqrI1Vst22hWtpjTECZ0NfeLGKlhua3CN0H9', '2019-06-20 01:28:52', '2019-06-20 01:28:52'),
(8, 54, 'jg11YDspGz6S0aiBzx2zVZezeha11Rm6kpYxJxNU', '2019-06-20 01:29:28', '2019-06-20 01:29:28'),
(9, 55, 'lIKC11wkmJXGTHw8wLU7KviFgd4xdBBgTbVOqGGz', '2019-06-20 01:30:53', '2019-06-20 01:30:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
