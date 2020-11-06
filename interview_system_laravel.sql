-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 09:18 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_system_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selectEducation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applyFor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalExperience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentCTC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expectedCTC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noticePeriod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interviewDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selectStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_to_leave_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `selectEducation`, `applyFor`, `totalExperience`, `currentCTC`, `expectedCTC`, `noticePeriod`, `interviewDate`, `selectStatus`, `reason_to_leave_job`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jigar', 'rajeshbhai', 'Methaniya', 'jigar123@yopmail.com', 'MCA', 'Java', '1', '15000', '19560', '2', '2020-10-06', 'Reviewed', '', '2020-10-06 06:24:50', '2020-10-16 01:00:00', NULL),
(2, 'Mayur', 'zz', 'Patel', 'mayu123@yopmail.com', 'B.Tech', 'Android', '4', '8500', '26000', '3', '2020-10-15', 'Hired', '', '2020-10-06 06:26:45', '2020-10-16 01:00:40', NULL),
(5, 'Paresh', 'jhi jone', 'panchal', 'paresh123@yopmail.com', 'MCA', 'PHP', '2', '23560', '18220', '1', '2020-10-17', 'Rejected', 'Due to distance issue', '2020-10-06 07:10:26', '2020-10-16 00:58:11', NULL),
(8, 'Sanjay', 'name', 'dervadidya', 'sanjay123@yopmail.com', 'M.sc(IT)', 'Android', '2', '7100', '9600', '2', '2020-10-07', 'Rejected', 'reject job', '2020-10-06 08:42:57', '2020-10-16 01:00:59', NULL),
(9, 'employee', 'najdf', 'last name', NULL, 'B.Tech', 'Java', '1', '1200', '9900', '6', '2020-09-27', 'Reviewed', '', '2020-10-06 09:03:16', '2020-10-14 00:32:57', NULL),
(11, 'New cadidate', 'ksad', 'Surmane', NULL, 'MCA', 'Java', '3', '13250', '19550', '2', '2020-10-12', 'Reviewed', '', '2020-10-08 02:57:27', '2020-10-08 04:17:14', '2020-10-08 04:17:14'),
(12, 'Mehul', 'ea', 'Shah', NULL, 'M.sc(IT)', 'Android', '2', '13450', '19780', '2', '2020-10-27', 'Rejected', 'reject for the job', '2020-10-08 03:51:13', '2020-10-14 00:33:06', NULL),
(13, 'Mahesh', 'nax name', 'zamariya', NULL, 'BCA', 'Java', '7', '1250', '1680', '3', '2020-10-05', 'Reviewed', '', '2020-10-08 04:15:25', '2020-10-14 00:33:17', NULL),
(14, 'Test', 'su', 'suthar', NULL, 'BCA', 'Android', '5', '6500', '7560', '2', '2020-10-22', 'Hired', '', '2020-10-08 04:17:39', '2020-10-08 04:17:48', '2020-10-08 04:17:48'),
(15, 'Rajani', 'ksd', 'Dave', NULL, 'MCA', 'Android', '4', '13520', '16580', '1', '2020-10-13', 'Hired', '', '2020-10-08 07:55:29', '2020-10-14 00:33:30', NULL),
(16, 'Dixit', 'kumar', 'Patel', NULL, 'MCA', 'PHP', '1', '13690', '19780', '2', '2020-09-28', 'Hired', '', '2020-10-09 01:19:05', '2020-10-14 00:33:42', NULL),
(17, 'Dharmesh', 'kjia', 'Shah', NULL, 'M.sc(IT)', 'Android', '2', '23456', '26887', '1', '2020-10-19', 'Rejected', 'rease leave jonb', '2020-10-10 00:34:50', '2020-10-14 00:33:52', NULL),
(21, 'NAyan', 'kjak', 'Zapda', NULL, 'BCA', 'PHP', '5', '12365', '48950', '2', '2020-10-26', 'Reviewed', '', '2020-10-10 00:44:55', '2020-10-14 00:34:25', NULL),
(22, 'Ramesh', 'kdkj', 'Jalaariya', NULL, 'B.sc(IT)', 'Java', '3', '6000', '8000', '3', '2020-10-02', 'Rejected', 'asdf', '2020-10-10 00:46:00', '2020-10-14 00:34:36', NULL),
(23, 'Abhishek', 'kumar', 'Bhut', NULL, 'B.Tech', 'PHP', '1', '19780', '26580', '3', '2020-10-01', 'Reviewed', '', '2020-10-10 01:07:57', '2020-10-14 00:34:49', NULL),
(24, 'Raj', 'ksjd', 'Bhuva', 'raj2343@yopmail.com', 'B.sc(IT)', 'PHP', '2', '6590', '9541', '3', '2020-10-24', 'Hired', '', '2020-10-10 01:34:03', '2020-10-16 02:01:12', NULL),
(25, 'Kishan', 'kamlesh', 'Patadiya', 'kishan123@yopmail.com', 'MCA', 'Android', '3', '16892', '12860', '1', '2020-10-20', 'Reviewed', '', '2020-10-12 05:00:41', '2020-10-19 10:21:03', NULL),
(28, 'Ramesh', 'middle', 'PAtel', 'ramesh123@yopmail.com', 'M.sc(IT)', 'Android', '3', '15878', '26540', '2', '2020-10-14', 'Reviewed', '', '2020-10-27 05:54:16', '2020-10-27 05:54:16', NULL),
(33, 'Uttam', 's', 'Patel', 'uttam123@gmail.com', 'B.Tech', 'PHP', '3', '13650', '22450', '2', '2020-11-05', 'Reviewed', '', '2020-11-02 06:46:20', '2020-11-02 06:46:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

CREATE TABLE `cruds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`id`, `first_name`, `last_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mitesh', 'Kadivar', '370525038.jpg', '2020-10-22 03:51:59', '2020-10-22 04:00:54'),
(3, 'Jatin', 'Patel', '1160834707.jpg', '2020-10-22 04:02:24', '2020-10-22 04:03:53'),
(5, 'Jigar', 'dave', '1321553899.jpg', '2020-10-22 04:10:31', '2020-10-22 04:10:31'),
(6, 'Ravi', 'Patel', '123750713.jpg', '2020-10-22 04:11:44', '2020-10-22 04:11:44'),
(7, 'Dinesh', 'Bhuva', '1848553544.jpg', '2020-10-22 04:11:58', '2020-10-22 04:11:58'),
(8, 'Vivek', 'Patel', '961551811.jpg', '2020-10-22 04:12:14', '2020-11-05 04:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `salary` decimal(8,2) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `gender`, `age`, `salary`, `birth_date`, `hobbies`, `address`, `city`, `image`, `created_at`, `updated_at`) VALUES
(1, 'mitesh', 'mitesh123@gmail.com', 'mitesh', 'male', 21, NULL, '1997-12-20', 'photography,learning,drawing', NULL, 'Surat', 'profiles/profile_511.jpg', '2020-11-03 09:03:52', '2020-11-03 09:03:52'),
(2, 'Dharmesh', 'dharmesh1222@gmail.com', 'dharmesh', 'male', 26, '21540.00', '1995-05-28', 'playing,learning,drawing', NULL, 'Rajkot', 'profiles/dummy.jpg', '2020-11-03 09:06:05', '2020-11-03 09:06:05'),
(3, 'Dekdis', 'deskis2@gmail.com', 'deksh', 'female', 18, '13652.00', '1998-06-30', 'travelling,learning', 'bhuj', 'Jamnagar', 'profiles/profile_605.jpg', '2020-11-03 09:08:58', '2020-11-03 09:08:58'),
(5, 'test User', 'test13@yopmail.com', '$2y$10$/YYtdl.LLmDKbK95bFU3SeMFRZE67HAFqQD6NPACDZ8p4Bmvot9d2', 'female', 20, '15650.00', '1999-08-16', 'drawing', 'test dades', 'Jamnagar', 'profiles/dummy.jpg', '2020-11-03 10:29:07', '2020-11-03 11:57:53'),
(6, 'Vishal Patel', 'visham232@yopmail.com', '$2y$10$kL.7nKyR8CbYCMi.eaarJuMieYj7kLlmR8XCy9wFJDfA9nGd4zHDy', 'male', 20, '7000.00', '2017-06-20', 'travelling', 'ahmedabad', 'Surat', 'profiles/profile_80.jpg', '2020-11-03 12:00:26', '2020-11-03 12:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'database', 'default', '{\"uuid\":\"dd803b94-008a-4283-94d6-29406b27b5a1\",\"displayName\":\"App\\\\Jobs\\\\NewUserRegisterEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\NewUserRegisterEmail\",\"command\":\"O:29:\\\"App\\\\Jobs\\\\NewUserRegisterEmail\\\":9:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-11-04 16:41:33.424323\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:12:\\\"Asia\\/Kolkata\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Database\\Eloquent\\ModelNotFoundException: No query results for model [App\\User]. in E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php:480\nStack trace:\n#0 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(102): Illuminate\\Database\\Eloquent\\Builder->firstOrFail()\n#1 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php(57): App\\Jobs\\NewUserRegisterEmail->restoreModel(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#2 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesModels.php(45): App\\Jobs\\NewUserRegisterEmail->getRestoredPropertyValue(Object(Illuminate\\Contracts\\Database\\ModelIdentifier))\n#3 [internal function]: App\\Jobs\\NewUserRegisterEmail->__wakeup()\n#4 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(53): unserialize(\'O:29:\"App\\\\Jobs\\\\...\')\n#5 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#6 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#7 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#8 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#9 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#10 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#11 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#12 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): call_user_func_array(Array, Array)\n#13 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(39): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#18 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#19 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#20 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\symfony\\console\\Application.php(920): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#21 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\symfony\\console\\Application.php(266): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#22 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\symfony\\console\\Application.php(142): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 E:\\xampp\\htdocs\\Laravel\\interview_system_laravel\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 {main}', '2020-11-04 12:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2020_10_06_085654_create_candidates_table', 2),
(6, '2020_10_08_101241_create_posts_table', 3),
(7, '2020_10_16_061807_add_email_to_candidates_table', 4),
(9, '2020_10_19_134948_create_jobs_table', 5),
(10, '2020_10_19_135151_create_failed_jobs_table', 5),
(11, '2020_10_22_090953_create_cruds_table', 6),
(13, '2020_10_30_094437_add_google_id_to_users_table', 7),
(14, '2020_10_30_124224_add_facebook_id_to_users_table', 8),
(16, '2020_11_03_133711_create_employees_table', 9),
(17, '2020_11_05_100910_create_students_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `candidate_id`, `created_at`, `updated_at`) VALUES
(1, 'Andriod title', 'descrionsdfadsf daf', 5, '2020-10-09 02:06:42', '2020-10-14 00:52:05'),
(2, 'Post tile', 'descoindf', 1, '2020-10-09 02:09:03', '2020-10-09 02:09:03'),
(4, 'Andriod mobile title', 'update', 9, '2020-10-09 02:10:22', '2020-10-09 23:15:45'),
(5, 'Iphone x uodate', 'test descotp update', 2, '2020-10-09 02:12:26', '2020-10-09 23:18:02'),
(7, 'Dixit title', 'Description dixit posts', 16, '2020-10-09 22:48:46', '2020-10-09 23:17:34'),
(9, 'dave rajani post title', 'post descp', 15, '2020-10-09 23:00:02', '2020-10-09 23:00:02'),
(11, 'sdfjn', 'kjasd', 5, '2020-10-09 23:03:29', '2020-10-09 23:03:29'),
(12, 'post title', 'post description', 9, '2020-10-09 23:04:30', '2020-10-09 23:04:30'),
(13, 'shah', 'shsh descpotp', 12, '2020-10-09 23:05:57', '2020-10-09 23:05:57'),
(14, 'new post title', 'new post description', 16, '2020-10-09 23:06:20', '2020-10-09 23:06:20'),
(16, 'newe information title', 'new details of post', 2, '2020-10-09 23:08:03', '2020-10-09 23:18:13'),
(17, 'apotor titile', 'apfro desciption', 5, '2020-10-09 23:12:19', '2020-10-09 23:15:04'),
(18, 'sony ttitle', 'sony descriotion', 16, '2020-10-09 23:14:19', '2020-10-09 23:14:38'),
(19, 'mehul post added 1010', 'desiron 1010', 12, '2020-10-09 23:42:07', '2020-10-09 23:42:07'),
(20, 'Post titles', 'post description ata', 9, '2020-10-10 02:54:15', '2020-10-10 02:54:15'),
(21, 'Kishan New tiitle post', 'new kishan post description', 25, '2020-10-12 05:04:21', '2020-10-12 05:04:21'),
(24, 'New 28 Post ttitle', '28 ocober post description', 13, '2020-10-28 05:41:55', '2020-10-28 05:42:13'),
(26, 'New posted jigatny', 'new post desrp 28', 1, '2020-10-28 05:49:35', '2020-10-28 05:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `gender`, `age`, `phone_number`, `birth_date`, `hobbies`, `address`, `cource`, `image`, `created_at`, `updated_at`) VALUES
(2, 'sanju', 'sanjhu212@gmail.com', '$2y$10$QX1gKrIyVZJ9fW0ueAdUCOF6wktEFHkHIPXYQ.g3.gfmHJGKxjmBS', 'male', 85, '963021457', '1998-10-02', 'playing,photography,learning', 'baroda', 'BCA', '1618549972.jpg', '2020-11-05 12:48:37', '2020-11-05 12:48:37'),
(3, 'Deepak', 'depak12@gmail.com', '$2y$10$UxN56B7PYjXiIIlVx0J9x.uOaMN32HDS9.EJMm4hTJQwWdbJ6JMA2', 'female', 58, '7458745874', '2002-06-05', 'playing,photography', 'rajkot', 'M.Sc(CA&IT)', 'dummy.jpg', '2020-11-05 12:54:42', '2020-11-06 06:07:11'),
(4, 'Ravi DCS', 'ravi13@gmail.com', '$2y$10$pMww1UvhQvV4LYR/0b.lBOye2geSI7Z3eLJgdLeqxhd28uVj.fC8O', 'male', 36, '9630214587', '1995-07-12', 'playing,travelling,photography,learning,drawing', 'address valsad', 'B.Tech', '2064909147.jpg', '2020-11-05 13:06:49', '2020-11-06 06:30:00'),
(5, 'Jaymin S Patel', 'jaymin132@yopmail.com', '$2y$10$EWYoxlUXQ5BvioNV3kqC1Ou6mzbJ6PItbkk2iuyXxsV3brFUJmjuS', 'male', 29, '9662338754', '2020-06-02', 'travelling,learning', 'palanpur bk', 'MCA', '1085752037.jpg', '2020-11-05 13:11:17', '2020-11-06 06:36:58'),
(6, 'Rajni', 'rajani1232@gmail.com', '$2y$10$jtDf0L9XdXfHzmEHCBxWkuDBcs5r/QzHx/LKdNuut7ZWvBiZgvPXu', 'female', 26, '6355191953', '2018-06-13', 'photography,learning,drawing', 'abu', 'BCA', '1020287938.jpg', '2020-11-05 13:22:09', '2020-11-06 07:14:26'),
(8, 'Dixit', 'dixit23@gmail.com', '$2y$10$rOTy8B5v67Q4T5z4jkA85uTImGS33DMY9pDIkGeYT5Opvb28xonR.', 'male', 19, '6351241542', '2016-06-07', 'playing,photography,drawing', 'morbi', 'B.Tech', '152724736.jpg', '2020-11-06 07:13:53', '2020-11-06 07:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `facebook_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mitesh Patel', 'mitesh123@yopmail.com', NULL, '$2y$10$I/7TVve9LPZ9PnNJ1NTpruNhgZfOk0/fR7Z77MKv5aJ.butCKT.cC', NULL, NULL, 'gBKs6ddWmeEqzWtX1vFPdxIs00AmlFSIXVWAKvmmUzgLOdKs8VCmA3CspRUa', '2020-10-06 03:19:41', '2020-11-04 11:08:42'),
(2, 'Test user', 'test123@yopmail.com', NULL, '$2y$10$lsaP57Lw9kZ26BGeV6PqDOL2VTQQgH19xx/jH1RZemmu7KFogjgEu', NULL, NULL, NULL, '2020-10-14 04:20:27', '2020-10-14 04:20:27'),
(3, 'Vivek', 'vivek123@yopmail.com', NULL, '$2y$10$hrCS9U/bEKyoYV7Sh7uYt.FlMCzAsTPcKvocxfkadAppxmNgqVOSS', NULL, NULL, NULL, '2020-10-19 09:33:25', '2020-10-19 09:33:25'),
(4, 'Tanay', 'tanay123@yopmail.com', NULL, '$2y$10$K8egPainQSu6BMnH5lfyfeGAr3eGHPgBhCx75QDhgh8jG8t/Ski2G', NULL, NULL, NULL, '2020-10-19 09:54:55', '2020-10-19 09:54:55'),
(5, 'Ashish', 'ashish123@yopmail.com', NULL, '$2y$10$4Fxk4pl7Fz189i5nP7ysGu1Q/tStkXLG62rwVPnSKrJssR6F.h51G', NULL, NULL, NULL, '2020-10-19 09:58:23', '2020-10-19 09:58:23'),
(6, 'Ankur Patel', 'ankur123@yopmail.com', NULL, '$2y$10$04o30kvyO6/26FaTeg4UeeWRWJZ5rRBP2zTzxJyNm9B92KmqZT/OG', NULL, NULL, NULL, '2020-10-19 10:42:27', '2020-10-19 10:42:27'),
(8, 'Arpan', 'arpan123@yopmail.com', NULL, '$2y$10$0WOxh80Il7mFFDyGDZus2eq7c8EX9tcqB3chCyz8gHmTEI7fqf3eO', NULL, NULL, NULL, '2020-10-27 06:09:30', '2020-10-27 06:09:30'),
(9, 'Akash Shah', 'akash123@yopmail.com', NULL, '$2y$10$w8rMdn4.7ixGZPTiHh1gweTnggDiYK5KxLTL5SzDzPRK9352aBaKS', NULL, NULL, NULL, '2020-10-27 06:30:58', '2020-10-27 06:30:58'),
(10, 'Social Developer', 'socialdevp786@gmail.com', NULL, '$2y$10$QA9vlprKJTlBRxQk6hiNjeHKco2/UNIC/ADGfGkYpYtOdA9RnbKKq', '114473062908341067710', NULL, NULL, '2020-10-31 04:12:01', '2020-10-31 04:12:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cruds`
--
ALTER TABLE `cruds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_candidate_id_foreign` (`candidate_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cruds`
--
ALTER TABLE `cruds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
