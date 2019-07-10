-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 12:12 PM
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
(1, 'History of C++', '2019-06-17', '06:00:00 pm', '08:00:00 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza will be the instructor of this class.', 'umarraza2200@gmail.com', '5d25b525862d1', 1, 1, '2019-07-10 10:11:48', '2019-07-10 05:11:48');

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
(2, 'Introduction to Java', 'Java is a general-purpose programming language that is class-based, object-oriented and designed to have as few implementation dependencies as possible.', 'Malik Aftab is the instructor of this course.', 'Programming', 'Free', 2, '2019-07-10 04:47:42', '2019-07-10 04:47:42');

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
(1, 'Numan', 'Khaliq', 'Male', 'A+', 'numankhaliq@gmail.com', 2, 1, 8, '2019-07-10 04:48:15', '2019-07-10 04:49:59'),
(2, 'Usman', 'Amir', 'Male', 'B', 'usman@gmail.com', 2, 2, 9, '2019-07-10 04:48:44', '2019-07-10 04:48:44'),
(3, 'Nosheen', 'Fatima', 'Female', 'A+', 'nosheenfatima@gmail.com', 1, 1, 10, '2019-07-10 04:50:53', '2019-07-10 04:50:53');

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
(2, 'Malik', 'Aftab', 'Lahore, Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'malikaftab@gmail.com', 7, '2019-07-10 04:47:20', '2019-07-10 04:47:20');

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
(1, 'Admin', 'admin@admin.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 1, 'WgxXQHkhbkjBoFprTyMxK1K9iOts7CwZCAQaB3Ief3lOplT2QcMfBQtQCUPb', 1, '2019-07-08 19:00:00', '2019-07-08 19:00:00'),
(6, 'Umar Raza', 'umarraza2200@gmail.com', '$2y$10$wl.u3qGx12y7irqtzOPE2eA07FaAyF6knsscAvS243qDTFWkRl2mu', 280489293, 2, NULL, NULL, '2019-07-10 04:36:47', '2019-07-10 04:43:49'),
(7, 'Malik Aftab', 'malikaftab@gmail.com', NULL, 328330896, 2, NULL, NULL, '2019-07-10 04:47:20', '2019-07-10 04:47:20'),
(8, 'Numan Hashmi', 'numankhaliq@gmail.com', NULL, 1411453381, 3, NULL, NULL, '2019-07-10 04:48:15', '2019-07-10 04:48:15'),
(9, 'Usman Amir', 'usman@gmail.com', NULL, 1882110925, 3, NULL, NULL, '2019-07-10 04:48:44', '2019-07-10 04:48:44'),
(10, 'Nosheen Fatima', 'nosheenfatima@gmail.com', NULL, 1490225865, 3, NULL, NULL, '2019-07-10 04:50:53', '2019-07-10 04:50:53');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
