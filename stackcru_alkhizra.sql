-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2019 at 06:09 PM
-- Server version: 5.7.27
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stackcru_alkhizra`
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
(1, 'History of C++', '2019-06-17', '06:00:00 pm', '08:00:00 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza will be the instructor of this class.', 'umarraza2200@gmail.com', '5d25b525862d1', 1, 1, '2019-07-10 12:07:08', '2019-07-10 07:07:08'),
(3, 'History of Java', '2019-03-07 16:18:29', '06:00:00 pm', '08:00:00 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza will be the instructor of this class.', 'umarraza2200@gmail.com', '5d317831e09ff', 3, 3, '2019-07-19 09:55:32', '2019-07-19 02:58:41');

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
(1, 'Introduction to C++', 'C++ is a statically-typed, free-form, (usually) compiled, multi-paradigm, intermediate-level general-purpose middle-level programming language.', 'Umar Raza is the instructor of this course.', 'Programming', 'Free', 1, '2019-07-10 04:46:04', '2019-07-10 04:47:01'),
(3, 'Introduction to Java', 'History of Java', 'Malik Aftab is the instructor of this course.', 'Programming', 'Free', 1, '2019-07-19 02:58:29', '2019-07-19 02:58:29'),
(4, 'History of Islam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza is the instructor of this course.', 'Programming', 'Free', 1, '2019-07-31 11:06:33', '2019-07-31 11:06:33'),
(5, 'Introduction to C+', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza is the instructor of this course.', 'Programming', 'Free', 1, '2019-07-31 11:06:44', '2019-07-31 11:06:44');

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
  `teacher_id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `gender`, `grade`, `email`, `course_id`, `teacher_id`, `userId`, `createdAt`, `updatedAt`) VALUES
(3, 'Nosheen', 'Fatima', 'Female', 'A+', 'nosheenfatima@gmail.com', 1, 1, 10, '2019-07-10 04:50:53', '2019-07-10 04:50:53'),
(4, 'Malik', 'Aftab', 'Male', 'A+', 'alexa@gmail.com', 1, 1, 11, '2019-07-18 23:24:36', '2019-07-18 23:24:36'),
(5, 'Numan', 'Hashmi', 'Male', 'A+', 'numan@gmail.com', 3, 1, 13, '2019-07-19 04:53:31', '2019-07-19 04:53:31');

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
(1, 'Umar', 'Raza', 'Lahore, Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'umarraza2200@gmail.com', 6, '2019-07-10 04:36:47', '2019-07-10 04:43:49'),
(3, 'Malik', 'Aftab', 'Lahore, Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'malikaftab@gmail.com', 12, '2019-07-19 02:57:34', '2019-07-19 02:57:34');

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
(1, 'Admin', 'admin@admin.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 1, '6gbcNqzgdFatDOPgZHuphi0eE5lmBVIDi0f8uWd1e2KAXfT7SErvIbt0Q1Cm', 1, '2019-07-08 19:00:00', '2019-07-08 19:00:00'),
(6, 'Umar Raza', 'umarraza2200@gmail.com', '$2y$10$wl.u3qGx12y7irqtzOPE2eA07FaAyF6knsscAvS243qDTFWkRl2mu', 280489293, 2, 'PC1sP4gAJX5ki1ZaOO7XPMggSqHP7h1932K5wWoNoZxR5shyavdkUqx38SRo', NULL, '2019-07-10 04:36:47', '2019-07-10 04:43:49'),
(10, 'Nosheen Fatima', 'nosheenfatima@gmail.com', '$2y$10$wl.u3qGx12y7irqtzOPE2eA07FaAyF6knsscAvS243qDTFWkRl2mu', 1490225865, 3, 'Ocy3G9b52bAkkMCnKxvhDyoyoxOnt1XQL7E1mkOf2FEyK0PEaDV9DS6Q6X0O', NULL, '2019-07-10 04:50:53', '2019-07-10 04:50:53'),
(11, 'Malik Aftab', 'alexa@gmail.com', '$2y$10$wl.u3qGx12y7irqtzOPE2eA07FaAyF6knsscAvS243qDTFWkRl2mu', 1286839424, 3, '6jgNkPzd5AwRCnUisEzfRpiNGELDBZD7ihqHRaKH2ZHNEnky5pV5e3w7bHRY', NULL, '2019-07-18 23:24:36', '2019-07-18 23:24:36'),
(12, 'Malik Aftab', 'malikaftab@gmail.com', '$2y$10$wl.u3qGx12y7irqtzOPE2eA07FaAyF6knsscAvS243qDTFWkRl2mu', 1067106809, 2, 'QALhvAyY9PUPWTAIdHzCxykuKS5uKyt71qO1zpSSakmstrDwWmXhSIIOwven', NULL, '2019-07-19 02:57:34', '2019-07-19 02:57:34'),
(13, 'Numan Hashmi', 'numan@gmail.com', '$2y$10$wl.u3qGx12y7irqtzOPE2eA07FaAyF6knsscAvS243qDTFWkRl2mu', 1450625600, 3, NULL, NULL, '2019-07-19 04:53:31', '2019-07-19 04:53:31');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
