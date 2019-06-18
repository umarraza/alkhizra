-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 03:12 PM
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
-- Database: `alkhizra`
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
  `course_Id` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `date`, `time_from`, `time_to`, `description`, `teacher_description`, `course_Id`, `createdAt`, `updatedAt`) VALUES
(1, 'History of C++', '2019-06-17', '06:00:00 pm', '08:00:00 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza will be the instructor of this class.', 1, '2019-06-17 05:10:33', '2019-06-17 05:10:33'),
(2, 'History of Arab', '2019-06-17', '06:00:00 pm', '08:00:00 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Malik Aftab will be the instructor of this class.', 2, '2019-06-17 05:11:08', '2019-06-17 05:11:08'),
(3, 'History of Java', '2019-06-17', '06:00:00 pm', '08:00:00 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza will be the instructor of this class.', 3, '2019-06-17 05:50:18', '2019-06-17 05:50:18');

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
(1, 'Introduction to C++', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza is the instructor of this course.', 'Programming', 'Free', 1, '2019-06-17 05:08:13', '2019-06-17 05:08:13'),
(2, 'History of Islam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Malik Aftab is the instructor of this course.', 'Programming', 'Paid', 2, '2019-06-17 05:08:56', '2019-06-17 05:08:56'),
(3, 'Introduction to Java', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Umar Raza is the instructor of this course.', 'Programming', 'Paid', 1, '2019-06-17 05:35:48', '2019-06-17 05:35:48'),
(4, 'Introduction to Python', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Sohaib Khaliq is the instructor of this course.', 'Programming', 'Paid', 3, '2019-06-17 05:52:10', '2019-06-17 05:52:10');

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
(1, 'Ali', 'Raza', 'Male', 'A+', 'ali@gmail.com', 1, 4, '2019-06-17 05:09:30', '2019-06-17 05:09:30'),
(2, 'Numan', 'Hashmi', 'Male', 'B', 'numan@gmail.com', 2, 5, '2019-06-17 05:09:47', '2019-06-17 05:09:47'),
(3, 'Nimra', 'Musthaq', 'Female', 'A+', 'nimra@gmail.com', 3, 6, '2019-06-17 05:36:49', '2019-06-17 05:36:49');

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
(1, 'Umar', 'Raza', 'Lahore, Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'umarraza2200@gmail.com', 2, '2019-06-17 05:04:49', '2019-06-17 05:04:49'),
(2, 'Malik', 'Aftab', 'Lahore, Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'malikaftab@gmail.com', 3, '2019-06-17 05:06:10', '2019-06-17 05:06:10'),
(3, 'Sohaib', 'Khaliq', 'Lahore, Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'sohaib@gmail.com', 7, '2019-06-17 05:50:53', '2019-06-17 05:50:53');

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
  `createdAt` timestamp NULL DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `accessCode`, `roleId`, `remember_token`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 1, 'lXVworeKDt3va2Bp3fI53LIkXTP6zn9y0zWsaMpVtSJe4VgSiRlQ7KavywWR', '2019-06-16 19:00:00', '2019-06-16 19:00:00'),
(2, 'Umar Raza', 'umarraza2200@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', 662591614, 2, 'ZKvrZtAIVclyREH1Lc5uhR4vPUV2f5LgPAJ3LlhLo3OKoFHtM2rVyeXB5pED', '2019-06-17 05:04:49', '2019-06-17 05:04:49'),
(3, 'Malik Aftab', 'malikaftab@gmail.com', NULL, 2041650994, 2, NULL, '2019-06-17 05:06:10', '2019-06-17 05:06:10'),
(4, 'Ali Raza', 'ali@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 3, NULL, '2019-06-17 05:09:30', '2019-06-17 05:09:30'),
(5, 'Numan Hashmi', 'numan@gmail.com', NULL, NULL, 3, NULL, '2019-06-17 05:09:47', '2019-06-17 05:09:47'),
(6, 'Nimra Musthaq', 'nimra@gmail.com', '$2y$10$VwROsyn0bDr5gTh/rnCCG.5JN3kZTAWEEUZPJLHfiZf.84ZLdPtwq', NULL, 3, NULL, '2019-06-17 05:36:49', '2019-06-17 05:36:49'),
(7, 'Sohaib Khaliq', 'sohaib@gmail.com', NULL, 31660929, 2, NULL, '2019-06-17 05:50:53', '2019-06-17 05:50:53');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
