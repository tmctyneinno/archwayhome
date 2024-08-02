-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2024 at 01:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archwayhome_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `header_image` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `image`, `header_image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'titl', 'aboutUsImages/1719588254.jpg', 'aboutUsImages/1719586575.jpg', '<p>At Archway Homes and Investment Limited, we are more than just a real estate company&mdash;we are visionaries, innovators, and community builders dedicated to shaping the future of Nigeria&#39;s property market. Established with a commitment to excellence and integrity, we specialize in a comprehensive range of real estate services, including marketing, development, brokerage, investment, and construction.</p>\r\n\r\n<p>With a deep understanding of Nigeria&#39;s unique real estate landscape, we leverage our expertise and industry insights to create exceptional value for our clients and stakeholders. Our team of seasoned professionals brings together a wealth of experience and a passion for excellence, ensuring that every project we undertake is executed with precision and care.</p>\r\n\r\n<p>Driven by a mission to redefine the standards of real estate in Nigeria, we prioritize innovation, sustainability, and customer satisfaction in everything we do. From crafting strategic marketing campaigns to meticulously designing and constructing residential and commercial developments, we strive to exceed expectations at every turn.</p>\r\n\r\n<p>At Archway Homes and Investment Limited, we believe in the power of collaboration and transparency. We forge strong partnerships with our clients, investors, and communities, fostering trust and mutual respect every step of the way. Our goal is not only to deliver exceptional real estate solutions but also to create lasting value and impact for generations to come.</p>\r\n\r\n<p>Whether you are looking for your dream home, seeking lucrative investment opportunities, or in need of expert real estate advice, trust Archway Homes and Investment Limited to be your partner of choice. Join us on our journey to transform Nigeria&#39;s real estate landscape and unlock the potential of every property. Welcome to Archway Homes and Investment Limited&mdash;where your vision becomes reality.</p>\r\n\r\n<p>&nbsp;</p>', '2024-06-21 10:56:01', '2024-06-28 14:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `last_login`, `login_ip`, `otp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$SDWpI4m9YUWunhV9hP/spuxDlU25RYtkN52ts4CzC5fZjnHxv.Zwq', '080909', '', '', '', NULL, NULL, '2024-07-26 12:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` text DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `referralCode` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `user_id`, `fullname`, `phone`, `email`, `date_of_birth`, `gender`, `city`, `country`, `state`, `address`, `account_name`, `account_number`, `bank`, `referralCode`, `password`, `created_at`, `updated_at`) VALUES
(6, 'LYN-7723', 'Lynn Myers', '+1 (549) 247-7607', 'vvvilewa8327@digdy.com', '1999-03-13', 'Female', 'Labore ut molestiae', 'Pariatur Aut nihil', 'Sunt dolor eum facer', 'Architecto eius dolo', 'Dorian Whitfield', '651', 'FIRST ROYAL MICROFINANCE BANK', '36AD8E00', '$2y$10$sKHHaEDv8iblZXoUKJC3HuGz/UFvYN1vBbBYymWsLXF9BBeU/AJ9q', '2024-07-29 13:13:01', '2024-07-29 13:13:01'),
(7, 'MIC-9610', 'Michelle Rowland', '+1 (786) 203-5414', 'ilewa8327@digdy.com', '1982-02-11', 'Female', 'Provident voluptate', 'Sunt cupidatat mini', 'Tempore nobis facil', 'Corporis voluptate r', 'Craig Blair', '904', 'Goldman MFB', '92094439', '$2y$10$1CrzTwZPUxJC1kxnySWc1uxizNdsVOYF3kx7CF6BgA7VWIc7.OKQS', '2024-07-29 13:26:14', '2024-07-29 13:26:14'),
(10, 'AUR-1516', 'Aurelia Farrell', '+1 (301) 559-8517', 'vilewa8327@digdy.com', '1974-03-26', 'Female', 'In deserunt perferen', 'Sit dolorem dignissi', 'Repellendus Est rep', 'Soluta aliquip quia', 'Reuben Mckenzie', '973', 'MAINSTREET MICROFINANCE BANK', 'C7AD029C', '$2y$10$eSFbcdA0vAVU0vx2HAYF3uLpm0k5WhBN6xd5MHXAs7dNFWw2HVeH2', '2024-07-29 13:43:59', '2024-07-29 13:43:59'),
(12, 'SLA-6651', 'Slade Richardson', '+1 (166) 514-7499', 'bigebik137@hostlace.com', '2016-10-13', 'Female', 'Dolor ratione Nam qu', 'Sint cum excepturi e', 'Aliquip incididunt d', 'Voluptatem unde aut', 'Raphael Dalton', '479', 'PFI FINANCE COMPANY LIMITED', '4105AD87', '$2y$10$pK/JAIMHJQY1jS.YewmimuCT4MCsRM2lGOpZW2Wv4pKZaTth0Xnc6', '2024-07-30 11:40:28', '2024-07-30 11:40:28'),
(14, 'LAR-7415', 'Lara Dunn', '+1 (506) 296-6849', 'covib87230@mfunza.com', '1998-11-29', 'Male', 'Sed nostrud ratione', 'Veritatis voluptas i', 'Omnis aliquam conseq', 'Labore aperiam quod', 'Vladimir Cochran', '795', 'United Bank For Africa', '6912C942', '$2y$10$zy60GDl7IYzCTHkyAomV0uXA.YmTozhAp9lCKtLmCPIz59cZARBQG', '2024-07-30 13:06:32', '2024-07-30 13:06:32'),
(15, 'FIN-6881', 'Finn Boyd', '+1 (294) 161-4357', 'rapomer453@maxturns.com', '1985-02-27', 'Female', 'Ut quis incidunt fa', 'Autem nisi unde et e', 'Et voluptas perferen', 'Impedit impedit ap', 'Tara Morgan', '72', 'PATHFINDER MICROFINANCE BANK LIMITED', 'DBB25AA1', '$2y$10$ByMEnFArOs3N1f.QlcNDuuz9iFjqXm/IohvWSToHl8UxqVm5NhwFS', '2024-07-30 13:11:40', '2024-07-30 13:11:40'),
(17, 'PRI-5659', 'Price Barnes', '+1 (657) 964-7332', 'kipomo4321@digdy.com', '2009-03-06', 'Male', 'Est quia et nihil ve', 'Ullam ad repellendus', 'In quam reprehenderi', 'Irure temporibus dic', 'Cynthia Gibbs', '390', 'Rubies MFB', '0832BE19', '$2y$10$2H7ZUadkCriZ2YrhpRiZdOGfuG5IyHqruFtQujdKidKOJTvU8aZdS', '2024-07-31 12:01:46', '2024-07-31 12:01:46'),
(18, 'SHA-2429', 'Shafira Whitehead', '+1 (331) 979-6819', 'vefono4167@digdy.com', '1981-02-21', 'Female', 'Dolorem eiusmod inve', 'Ex sunt laborum ea', 'Voluptate ea delenit', 'Porro adipisicing no', 'Whoopi May', '616', 'ASO Savings and Loans', '3D0FB81A', '$2y$10$XQsaU1E9x5I8MAEUXwSxeuPqz9HrTr0ddEuLRlaDqr/nB6MJKfjUK', '2024-07-31 12:06:01', '2024-07-31 12:06:01'),
(28, 'LIO-7056', 'Lionel Mccray', '+1 (184) 762-1449', 'jahoxybib@mailinator.com', '1981-06-01', 'Male', 'Inventore et nulla v', 'Necessitatibus aut o', 'Eligendi alias culpa', 'Culpa voluptatibus v', 'Jonas Dalton', '580', 'Personal Trust MFB', 'E387068B', '$2y$10$knuGxk9FZa/dVyPHqriRH.qnWjpkYZA/9qBlyPw6du.FGP7PTL7I.', '2024-08-02 08:42:54', '2024-08-02 08:42:54'),
(40, 'BLO-4932', 'Blossom Zimmerman', '+1 (233) 987-7224', 'sarav87334@fuzitea.com', '2001-11-18', 'Female', 'Natus vel rerum sint', 'Laboris mollit dolor', 'Cupidatat dolor aut', 'Odio aliquam tempor', 'Fallon Fitzpatrick', '822', 'PremiumTrust Bank', '5B919257', '$2y$10$QcUHSo7DJprg3L/qOQiDgeziLtmdQylGY/a1Ng2vcb3TQXuPCEkzK', '2024-08-02 09:23:36', '2024-08-02 09:23:36'),
(44, 'KAN-5847', 'Kane Hampton', '+1 (622) 732-5363', 'xoxebot164@fuzitea.com', '1976-10-29', 'Female', 'Exercitationem ut qu', 'Et totam officia inv', 'Atque exercitationem', 'Aut ea fugiat ea qu', 'Benjamin Lyons', '35', 'Aella MFB', '9DAEF0AA', '$2y$10$htRM9I9XkRKi/p7/OkVBlOJaYIrLhbjUpawVSHGIFKpoGN1zWKtGe', '2024-08-02 10:52:54', '2024-08-02 10:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `comments`, `created_at`, `updated_at`) VALUES
(2, 'Ojo', 'Toyin', 'toyin@gmail.com', '08139267960', 'Message', '2024-07-10 13:51:59', '2024-07-10 13:51:59'),
(3, 'Eshanokpe', 'Daniel', 'eshanokpe@gmail.com', '08139267960', 'Message', '2024-07-10 14:56:30', '2024-07-10 14:56:30'),
(4, 'Tatiana', 'Dickerson', 'jazijapeta@mailinator.com', '+1 (882) 652-9541', 'Est est enim nihil i', '2024-07-11 06:43:43', '2024-07-11 06:43:43'),
(5, 'Solomon', 'Preston', 'xizo@mailinator.com', '+1 (551) 882-9785', 'Eum dolor est minim', '2024-07-11 06:46:37', '2024-07-11 06:46:37'),
(6, 'Frances', 'Dyer', 'wune@mailinator.com', '+1 (878) 215-3042', 'Libero tempora quo a', '2024-07-11 06:54:53', '2024-07-11 06:54:53'),
(7, 'Brody', 'Garza', 'gizi@mailinator.com', '+1 (145) 877-8359', 'Obcaecati ut magnam', '2024-07-11 07:34:11', '2024-07-11 07:34:11'),
(8, 'Bell', 'Hammond', 'kepun@mailinator.com', '+1 (137) 334-7726', 'Quis aut doloribus a', '2024-07-11 07:42:21', '2024-07-11 07:42:21'),
(9, 'Jesse', 'Gilbert', 'serisemum@mailinator.com', '+1 (498) 723-1286', 'Aut esse consectetur', '2024-07-11 07:46:26', '2024-07-11 07:46:26'),
(10, 'Erich', 'Brown', 'vujolyvej@mailinator.com', '+1 (979) 276-7321', 'Quo adipisci ducimus', '2024-07-11 07:48:05', '2024-07-11 07:48:05'),
(11, 'Melinda', 'Pace', 'xanipofimo@mailinator.com', '+1 (322) 188-2023', 'Velit culpa irure el', '2024-07-11 07:54:02', '2024-07-11 07:54:02'),
(12, 'Tamara', 'Franklin', 'gewyxixiv@mailinator.com', '+1 (685) 885-8619', 'Enim eveniet ea cup', '2024-07-11 07:55:40', '2024-07-11 07:55:40'),
(13, 'Jack', 'Frederick', 'renidigic@mailinator.com', '+1 (249) 835-8764', 'Ea est rerum velit', '2024-07-11 07:56:54', '2024-07-11 07:56:54'),
(14, 'Samuel', 'Osborn', 'ciry@mailinator.com', '+1 (488) 478-2288', 'Labore ut quia dolor', '2024-07-11 08:30:17', '2024-07-11 08:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` text DEFAULT NULL,
  `first_phone` varchar(255) DEFAULT NULL,
  `second_phone` varchar(255) DEFAULT NULL,
  `first_email` varchar(255) DEFAULT NULL,
  `second_email` varchar(255) DEFAULT NULL,
  `first_address` text DEFAULT NULL,
  `second_address` text DEFAULT NULL,
  `website_link` text DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `company_name`, `first_phone`, `second_phone`, `first_email`, `second_email`, `first_address`, `second_address`, `website_link`, `site_logo`, `created_at`, `updated_at`) VALUES
(1, 'Archway Homes', '+234 8037412674', NULL, 'info@archwayhomes.com', NULL, 'House 5, Angel Court, Metro Homes, General Paint.', NULL, 'www.archwayhomesng.com.ng', 'contactUsImages/1722187479.jpg', '2024-06-21 18:41:37', '2024-08-01 19:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_items`
--

CREATE TABLE `dropdown_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropdown_items`
--

INSERT INTO `dropdown_items` (`id`, `menu_item_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(8, 3, 'Currently selling', 'currently-selling', '2024-06-19 06:52:22', '2024-06-19 06:52:22'),
(9, 3, 'Closed sales', 'closed-sales', '2024-06-19 06:52:22', '2024-06-19 06:52:22'),
(10, 3, 'Sold out', 'sold-out', '2024-06-19 06:52:22', '2024-06-19 06:52:22'),
(11, 3, 'Upcoming projects', 'upcoming-projects', '2024-06-19 06:52:22', '2024-06-19 06:52:22'),
(12, 3, 'FAQs', 'faqs', '2024-06-19 06:52:22', '2024-06-19 06:52:22'),
(13, 4, 'Events', 'events', '2024-06-19 06:53:38', '2024-06-19 06:53:38'),
(14, 4, 'Projects status', 'project-status', '2024-06-19 06:53:38', '2024-06-19 06:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `executive_summaries`
--

CREATE TABLE `executive_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `executive_summaries`
--

INSERT INTO `executive_summaries` (`id`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, '<p>Archway Homes and Investment Limited is a dynamic and innovative real estate startup poised to revolutionize the Nigerian property market. Specializing in real estate marketing, development, brokerage, investment, and construction, we aim to address the evolving needs of Nigeria&#39;s housing sector with a comprehensive and client-centric approach. Founded on the principles of innovation, transparency, and customer satisfaction, Archway Homes and Investment Limited stands out in the competitive real estate landscape. We prioritize building long-term relationships with our clients, partners, and stakeholders, offering tailored solutions that meet their unique needs and aspirations.</p>', 'executiveSummaryImage/1722188034.jpg', '2024-07-09 09:20:32', '2024-07-28 16:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(3, 'What Other Payment Do I Make After Completing Payment For The Land?', '<p>Development fee represents the cost used to develop and provide infrastructures within the estate such as road construction with street lights and drainage, perimeter fence with gate house, recreational facilities amongst others.</p>', '2024-07-13 15:30:11', '2024-07-13 15:30:11'),
(4, 'When Can I Make Payment For My Development Fee?', '<p>Development fee should be paid not later than Twelve (12) months after physical allocation. Failure to do this will atract price increment as development fee is reviewed annually with prevailing cost of building materials.</p>', '2024-07-13 15:30:45', '2024-07-13 15:30:45'),
(5, 'What Document Would Be Issued To Me Upon Making Initial Deposit?', '<p>Receipt of payment Invoice. Letter of acknowledgement. Contract of Sales. Deed of Assignment. Survey plan in your name.</p>', '2024-07-13 15:31:15', '2024-07-13 15:31:15'),
(6, 'What Document Would Be Issued To Me Upon Making Initial Deposit?', '<p>Receipt of payment Invoice. Letter of acknowledgement. Contract of Sales. Deed of Assignment. Survey plan in your name.</p>', '2024-07-13 15:31:16', '2024-07-13 15:31:16'),
(7, 'What Infrastructures Will Be Provided Within The Estate?', '<p>Electricity Green areas - Perimeter fence with gate house Access roads with street lights and drainages CCTV cameras Recreation facilities</p>', '2024-07-13 15:31:37', '2024-07-13 15:31:37'),
(8, 'When Will Infrastructures Be Put In Place Within The Estate?', '<p>Infrastructural development begins immediately after the estate is launched and will be completed within Thirty six (36) months. However, subscribers can commence construction on their plot while infrastructure is being put in place within the estate.</p>', '2024-07-13 15:33:52', '2024-07-13 15:33:52'),
(9, 'Can I Create A Profile Page For Business', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, inventore cumque veniam, praesentium velit incidunt rem quas a, quos eos ipsum, reprehenderit voluptatem.</p>', '2024-07-13 15:35:12', '2024-07-13 15:35:12'),
(10, 'When Can I Begin Construction On My Land?', '<p>Building can commence immediately after physical allocation.</p>', '2024-07-13 15:35:32', '2024-07-13 15:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `faqs_submit_forms`
--

CREATE TABLE `faqs_submit_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs_submit_forms`
--

INSERT INTO `faqs_submit_forms` (`id`, `full_name`, `phone_no`, `property_type`, `location`, `message`, `created_at`, `updated_at`) VALUES
(4, 'Warren Andrews', '+1 (234) 916-5509', '4', 'Lagos state', 'Doloribus quia ab cu', '2024-07-13 17:17:56', '2024-07-13 17:17:56'),
(5, 'Orlando Lopez', '+1 (688) 271-7088', '4', 'Ogun state', 'Tenetur nulla elit', '2024-07-13 17:19:09', '2024-07-13 17:19:09'),
(6, 'Risa West', '+1 (416) 273-5368', '4', 'Lagos state', 'Ipsum tempore venia', '2024-07-13 17:21:39', '2024-07-13 17:21:39'),
(7, 'Zelenia Snider', '+1 (136) 414-2604', '3', 'Lagos state', 'Eu sit quia iure dol', '2024-07-13 17:44:08', '2024-07-13 17:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_link` text NOT NULL,
  `images` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `inspection_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`id`, `full_name`, `email`, `phone`, `project`, `inspection_date`, `created_at`, `updated_at`) VALUES
(3, 'Josephine Butler', 'fawoli@mailinator.com', '+1 (756) 293-3849', 'Sunstone City', '2013-12-20', '2024-07-11 09:19:07', '2024-07-11 09:19:07'),
(4, 'Jennifer Cox', 'nacitad@mailinator.com', '+1 (317) 562-2058', 'MKH City', '2000-04-15', '2024-07-11 09:20:22', '2024-07-11 09:20:22'),
(5, 'Cecilia Peterson', 'wuqomybawa@mailinator.com', '+1 (111) 513-6284', 'The Wealthy Islet', '1983-06-29', '2024-07-11 09:39:31', '2024-07-11 09:39:31'),
(6, 'Hiram Byrd', 'hitila@mailinator.com', '+1 (311) 275-9681', 'Sunstone City', '1982-10-01', '2024-07-11 09:50:29', '2024-07-11 09:50:29'),
(7, 'Kylie Stephenson', 'juxadapix@mailinator.com', '+1 (598) 436-3836', 'Sunstone City', '2002-05-23', '2024-07-15 11:05:52', '2024-07-15 11:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', '2024-06-19 06:47:56', '2024-06-19 06:51:49'),
(2, 'About us', 'about-us', '2024-06-19 06:48:08', '2024-06-19 06:52:07'),
(3, 'Projects', 'projects', '2024-06-19 06:48:49', '2024-06-19 06:52:22'),
(4, 'Gallery', 'project-status', '2024-06-19 06:53:38', '2024-06-19 06:53:38'),
(5, 'Blog', 'blog', '2024-06-19 06:56:20', '2024-06-19 06:56:20'),
(6, 'Contact', 'contact', '2024-06-19 06:57:55', '2024-06-19 06:57:55'),
(7, 'Consultant Form', 'consultant-form', '2024-06-19 06:58:09', '2024-06-19 06:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_17_123813_create_admins_table', 1),
(6, '2024_06_19_015356_create_menu_items_table', 2),
(7, '2024_06_19_015854_create_dropdown_items_table', 3),
(8, '2024_06_19_081535_create_sliders_table', 4),
(9, '2024_06_21_035149_create_why_choose_us_table', 5),
(10, '2024_06_21_052457_create_about_us_table', 6),
(11, '2024_06_21_145413_create_contact_us_table', 7),
(12, '2024_06_22_101025_create_sociallinks_table', 8),
(13, '2024_06_22_143909_create_projects_table', 9),
(14, '2024_06_24_133855_create_comments_table', 10),
(15, '2024_06_25_090523_create_comments_table', 11),
(16, '2024_06_25_120636_create_project_menus_table', 12),
(17, '2024_06_27_071252_create_teams_table', 13),
(18, '2024_06_27_083329_create_privacy_policies_table', 14),
(19, '2024_06_27_094246_create_terms_conditions_table', 15),
(20, '2024_06_27_101128_create_galleries_table', 16),
(21, '2024_06_28_110734_create_quick_links_table', 17),
(22, '2024_07_01_024714_create_contacts_table', 18),
(23, '2024_07_01_032824_create_inspections_table', 19),
(24, '2024_07_01_123650_create_services_table', 20),
(25, '2024_07_01_125848_create_services_table', 21),
(26, '2024_07_09_085418_create_executive_summaries_table', 22),
(27, '2024_07_09_105814_create_office_hours_table', 23),
(28, '2024_07_09_144554_create_consultants_table', 24),
(29, '2024_07_13_153802_create_faqs_table', 25),
(30, '2024_07_13_175329_create_faqs_submit_forms_table', 26),
(31, '2024_07_14_123352_create_events_table', 27),
(32, '2024_07_30_133536_create_referral_logs_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `office_hours`
--

CREATE TABLE `office_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_hours`
--

INSERT INTO `office_hours` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Mon-Fri: 10 AM – 5 PM', '2024-07-10 13:10:44', '2024-07-10 13:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>Privacy Policy for ARCHWAY HOMES AND INVESTMENT LTD&nbsp;</strong></p><p>At Archway Homes and Investment Limited, we are committed to protecting your privacy and safeguarding the personal information you provide to us. This Privacy Policy outlines how we collect, use, and protect your personal information when you visit our website or interact with us online. By using our website and providing your information, you consent to the practices described in this policy.</p><p>&nbsp;</p><p><strong>Information Collection:</strong></p><p>When you visit our website, we may collect personal information such as your name, email address, phone number, and any other details you voluntarily provide. We also gather non-personal information, including your IP address, browser type, and device information, which helps us improve our website and services.</p><p>&nbsp;</p><p><strong>Use of Information:</strong></p><p>We use the information we collect to provide you with a personalised experience and to communicate with you about our products, services, and promotions. We may also use your information to process transactions, respond to inquiries, and improve our website’s functionality and security.</p><p>&nbsp;</p><p><strong>Information Sharing:</strong></p><p>We understand the importance of keeping your personal information confidential. We do not sell, rent, or trade your information to third parties without your consent, except as required by law or to fulfil our contractual obligations. However, we may share your information with trusted third-party service providers who assist us in operating our website and conducting our business.</p><p>&nbsp;</p><p><strong>Data Security:</strong></p><p>We employ industry-standard security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. We regularly review and update our security practices to ensure the ongoing integrity and confidentiality of your information.</p><p>&nbsp;</p><p><strong>Your Choices:</strong></p><p>You have the right to review, update, or delete your personal information at any time. You can also opt-out of receiving promotional communications from us by following the unsubscribe instructions provided in our emails.</p><p>&nbsp;</p><p><strong>Cookies:</strong></p><p>Our website uses cookies to enhance your browsing experience. Cookies are small text files stored on your device that help us understand how you use our site. You can adjust your browser settings to refuse cookies, but some features of our website may not function properly.</p><p>&nbsp;</p><p><strong>Changes to the Privacy Policy:</strong></p><p>We reserve the right to update and revise this Privacy Policy from time to time. Any changes will be effective immediately upon posting the revised policy on our website.</p><p>&nbsp;</p><p>If you have any questions or concerns about our Privacy Policy or the way we handle your personal information, please contact us at <strong>archwayhomesltd@gmail.com</strong></p><p>&nbsp;</p>', '2024-06-27 08:11:26', '2024-08-01 18:19:44'),
(2, '<p>Privacy Policy</p>', '2024-06-27 08:30:46', '2024-06-27 08:30:46'),
(3, '<p>Privacy Policy</p>', '2024-06-27 08:31:11', '2024-06-27 08:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `land_size` text NOT NULL,
  `project_menu_id` varchar(250) DEFAULT NULL,
  `content` text NOT NULL,
  `brochure` varchar(255) DEFAULT NULL,
  `land_payment_plan` varchar(255) DEFAULT NULL,
  `subscription_form` varchar(255) DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_menus`
--

CREATE TABLE `project_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_menus`
--

INSERT INTO `project_menus` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Currently selling', 'currently-selling', 'projectType/484691842M-1712408702045.jpg', '2024-06-25 11:10:27', '2024-07-02 09:04:54'),
(2, 'Closed sales', 'closed-sales', 'projectType/474E1249-30FB-4CEB-99A9-E7FC16C09856.jpeg', '2024-06-25 11:11:41', '2024-07-02 09:03:13'),
(3, 'Sold out', 'sold-out', 'projectType/33567a46512d03df771ef73a63ff4e5al-m1978264600rd-w480_h360.jpg', '2024-06-25 11:12:23', '2024-07-02 09:02:33'),
(4, 'Upcoming projects', 'upcoming-projects', 'projectType/MVI_0019.00_06_47_28.Still009.jpg', '2024-06-25 11:12:35', '2024-07-02 08:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `quick_links`
--

CREATE TABLE `quick_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quick_links`
--

INSERT INTO `quick_links` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Privacy Policy', 'privacy-policy', '2024-06-28 10:16:57', '2024-06-28 10:16:57'),
(3, 'About Us', 'about-us', '2024-06-28 10:19:48', '2024-06-28 10:19:48'),
(4, 'Terms & Conditions', 'terms-conditions', '2024-06-28 10:20:03', '2024-06-28 10:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `referral_logs`
--

CREATE TABLE `referral_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `referrer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_logs`
--

INSERT INTO `referral_logs` (`id`, `consultant_id`, `referrer_id`, `created_at`, `updated_at`) VALUES
(1, 14, 12, '2024-07-30 13:06:37', '2024-07-30 13:06:37'),
(2, 15, 12, '2024-07-30 13:11:44', '2024-07-30 13:11:44'),
(3, 18, 17, '2024-07-31 12:06:10', '2024-07-31 12:06:10'),
(6, 44, 40, '2024-08-02 10:52:58', '2024-08-02 10:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `icon_class` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon_class`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Real Estate Marketing', 'flaticon-global', '<p>We develop and execute robust marketing strategies to promote properties and attract potential buyers and investors, utilizing a mix of digital and traditional channels to maximize visibility and reach.</p><p>&nbsp;</p>', 'services/1721992574.jpg', '2024-07-01 12:11:21', '2024-07-26 10:16:14'),
(2, 'Real Estate Development', 'flaticon-building', '<p>At ARCHWAY HOMES AND INVESTMENT LTD, our Development solutions are designed to transform visions into tangible realities. We specialize in creating both residential and commercial properties that seamlessly blend aesthetic appeal with functional design. Our team comprises seasoned architects, engineers, and project managers who ensure that every project is executed to perfection, from the initial concept through to the final construction phase. We prioritize sustainability and innovation in our projects, incorporating eco-friendly materials and cutting-edge technologies to build properties that are not only visually stunning but also built to last.</p><p><br>&nbsp;</p><p>Our comprehensive approach includes site acquisition, feasibility studies, design, construction management, and post-construction support. This ensures that every aspect of the development process is meticulously planned and executed. We engage in extensive market research to understand the specific needs and preferences of the target market, ensuring that our developments are well-received and highly sought after. Our commitment to quality and attention to detail have earned us a reputation for excellence in the real estate industry. Trust ARCHWAY HOMES AND INVESTMENT LTD to develop spaces that not only meet but exceed your expectations, creating lasting value for communities and investors alike.</p><p><br>&nbsp;</p>', 'services/1721991045.jpg', '2024-07-01 13:08:01', '2024-07-26 09:50:45'),
(3, 'Real Estate Brokerage', 'flaticon-building', '<p>ARCHWAY HOMES AND INVESTMENT LTD\'s Brokerage services offer expert guidance and support throughout the property buying and selling process. We possess deep market knowledge and negotiation skills, ensuring clients achieve the best possible outcomes. We provide a personalized approach, understanding your unique needs and preferences to match you with the ideal property or buyer. Our services include market analysis, property valuation, listing services, and transaction management.<br>&nbsp;</p><p>Our extensive network and commitment to excellence enable us to streamline the brokerage process, making it efficient, transparent, and successful. We leverage our market insights and professional relationships to ensure that our clients receive top-tier service and achieve their real estate goals. Whether you are buying or selling, our brokers are dedicated to providing you with the support and expertise needed to navigate the complex real estate market successfully.</p>', 'services/1721991406.jpg', '2024-07-01 13:08:43', '2024-07-26 09:56:46'),
(4, 'Real Estate Investment', 'flaticon-location-pin', '<p>ARCHWAY HOMES AND INVESTMENT LTD offers tailored Real Estate Investment solutions designed to maximize returns while minimizing risks. We provide investors with a diverse range of opportunities, from residential properties to commercial real estate ventures. Our expert team conducts thorough market analysis and due diligence to identify high-potential investment options. By understanding market trends and economic indicators, we offer strategic advice and portfolio management services that ensure your investments are aligned with your financial goals.</p><p>&nbsp;</p><p>Our investment solutions are designed for both seasoned investors and newcomers to the real estate market. We offer comprehensive support, including risk assessment, investment planning, and performance tracking. Our personalized approach and in-depth knowledge of the real estate sector ensure that your investments grow steadily and securely. By partnering with ARCHWAY HOMES AND INVESTMENT LTD, you gain access to exclusive investment opportunities and expert guidance, empowering you to make informed decisions and achieve substantial returns.</p><p>&nbsp;</p>', 'services/1721990304.jpg', '2024-07-01 13:09:11', '2024-07-26 11:17:37'),
(5, 'Construction of Housing Units', 'flaticon-building', '<p>We deliver top-quality construction services for residential and commercial properties, employing modern techniques and high-grade materials to ensure durability, functionality, and aesthetic appeal.</p><p>&nbsp;</p>', 'services/1721994489.jpg', '2024-07-01 13:09:37', '2024-07-26 10:48:09'),
(8, 'Real Estate Sales', 'flaticon-location-pin', '<p>ARCHWAY HOMES AND INVESTMENT LTD\'s Sales solutions are designed to provide a seamless and successful property transaction experience. Our sales team is equipped with in-depth market knowledge and exceptional negotiation skills, ensuring that both buyers and sellers achieve their desired outcomes. We offer comprehensive sales services, including property listings, market analysis, pricing strategy, and buyer engagement.</p>', 'services/1721995619.jpg', '2024-07-26 11:06:59', '2024-07-26 11:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `additional_text` text DEFAULT NULL,
  `button_url` text DEFAULT NULL,
  `button_text` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `caption`, `additional_text`, `button_url`, `button_text`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Archway Home', 'Changing the Narrative and Breaking New Grounds in Real Estate', 'We are redefining perspectives of real estate', 'projects', 'View Projects', 'sliderImages/1718802213.jpg', '2024-06-19 08:48:26', '2024-06-19 12:03:33'),
(3, 'Archway Home', 'Shaping the Future of Real Estate through Innovation', 'We provide unmatched expertise', 'about-us', 'About us', 'sliderImages/1718802256.jpg', '2024-06-19 08:58:10', '2024-06-19 12:04:16'),
(5, 'Archway Home', 'Providing Excellent Real Estate Services as it should be', 'With MKH Properties, quality is a non-negotiable factor in all that we offer.', 'services', 'Services', 'sliderImages/1718802283.jpg', '2024-06-19 10:46:15', '2024-06-19 12:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `facebook`, `twitter`, `whatsapp`, `instagram`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'http://facebook.com/archwayhomes', 'http://twitter.com/archwayhomes', NULL, NULL, 'http://linkedin.com/company/archwayhomes', NULL, '2024-06-22 09:31:17', '2024-08-01 18:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `position`, `content`, `image`, `created_at`, `updated_at`) VALUES
(4, 'DR AISHA ARIJE', 'CHIEF EXECUVTIVE OFFICER', '<p>Dr Arije Aisha is a life/business coach, with over 8 years in the real estate and agricultural industry, she has a diploma in Social Administration, she has bachelor of art at the University of Ilorin she is a Certified Digital &amp; Social media Marketer (AIDMC) at international digital marketing college UK. She also bagged a doctorate degree in Public Administration at Stratford University UK. She currently holds certificate in business management at European business University of Luxembourg.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Having 2 awards in the same year in 2020 as the most innovative female real estate entrepreneurs of the year at City pride achiever Award CPAA 2020 and as the outstanding women entrepreneurs in real estate in recognition of her outstanding contribution to helping women have shelter. And in</p>\r\n\r\n<p>2021 she received an award as the pacesetter in real estate business at Africa International women pacesetter award.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dr. Arije Aisha is the CEO of Archway Homes and Investment Limited, She currently runs a mentoring session named OWN YOUR SEASON on discovering and recovering yourself, personal development, and mind transformation.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dr. Arije Aisha is the founder of Womenfold Empowerment Initiative (WEI), A Non-governmental Organisation (NGO) focused on young and old women Empowerment through entrepreneurship training and skills acquisition.</p>\r\n\r\n<p>&nbsp;</p>', 'teams/1721652706.png', '2024-06-28 15:00:18', '2024-07-22 11:51:46'),
(5, 'ARIJE AFOLABI A', 'HEAD, OPERATIONS', '<p>Arije Afolabi is an experienced Real Estate, Financial, and Leadership Consultant, Driven by Passion, he takes pride in providing the best Real Estate and Financial services possible. As a Leadership Coach, his goals include Capacity building, National Transformation, Individual and company Growth. In addition to his primary job functions, Afolabi has been recognised by lots reputable companies and partners for his extraordinary commitment to Human Development.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Afolabi has worked in the Real Estate &amp; Financial industry for 10 years, gaining experience in Financial Analysis, Project Management, and Leadership. As a seasoned Leadership Consultant, he is passionate about advancing Human Capacity and Mentorship. In addition to his passion, he has also chaired numerous Youth Empowerment Programmes and Capacity Building activities.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Afolabi is currently serving as the Head of Operations at Archway Homes &amp; Investment Limited, where he oversees the development and implementation of operational strategies, optimizes business processes for efficiency, and leads the operations team. Driven by a mission to Lead, Afolabi is best known for inspiring and nurturing young minds to harness their potentials.</p>\r\n\r\n<p>&nbsp;</p>', 'teams/1719590705.jpg', '2024-06-28 15:05:05', '2024-06-28 15:32:20'),
(6, 'DR. EJIRO OKPU', 'Director of Business Development & Strategy', '<p>Ejiro Okpu is a highly accomplished and innovative Business Development Strategist with over 10 years of experience in driving growth and fostering strategic partnerships. As the Director of Business Development at ARCHWAY HOMES AND INVESTMENT LTD, he plays a pivotal role in shaping the company&rsquo;s growth strategy and expanding its market presence.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>He began his career at Ocado Retail Ltd- UK, where he worked as a Business Analyst. A few years later, he joined DHL Supply Chain, a division of Deutsche DHL- UK. He worked as a Project Team Member for the Implementation of Locus Robotic, he was involved in the full implementation from initiation to successful deployment. His tenure at DHL was marked by a 30% increase in revenue and the successful launch of a high-profile project- Locus Robots.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>He holds a Bachelor&rsquo;s degree in Banking and Finance from Prestigious University and a Master&#39;s Degree in Business Research and Marketing from the University of Hertfordshire, Business School- UK and later pursued a PhD in Global Economy at the same University.</p>\r\n\r\n<p>&nbsp;</p>', 'teams/1719592277.jpg', '2024-06-28 15:31:17', '2024-07-29 10:39:46'),
(7, 'MORUF SOWUNMI', 'director of legal', '<p>Moruf Sowunmi, ACArb is a lawyer by profession. He has over a decade of extensive legal expertise having worked with some of the foremost commercial law firms in Lagos, Nigeria. Moruf is an Alumnus of the Obafemi Awolowo University where he obtained his law degree before proceeding to the University of Lagos for his Master of Law. He is also an alumnus of the prestigious Lagos Business School of the Pan Atlantic University, Lagos, Nigeria.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>During his over a decade experience as a lawyer, Moruf handled many real estate transactions for clients ranging from acquisition of landed properties worth billions of naira, perfection of properties, drafting of various agreements and defending clients at both court of first instance and appellate courts. He has also advised companies on regulatory and statutory compliance issues.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Moruf&rsquo;s broad skill set comprises not only the complexities of legal compliance but also extends to business development and high-quality client services. His strategic insights and legal expertise have consistently contributed to the success and growth of the institutions he has worked with.</p>\r\n\r\n<p>&nbsp;</p>', 'teams/1719592584.jpg', '2024-06-28 15:36:24', '2024-07-31 09:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '', '2024-06-27 09:05:18', '2024-06-27 09:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Graphic', 'eshanokpe@gmail.com', NULL, '$2y$10$g8iIlhPF5QbN337Vx30qgOKqNT.ATmYU/VAR4B5RhG3suWGcLGSnq', NULL, '2024-06-27 18:29:47', '2024-06-27 18:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `why_choose_us_statements` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `core_values` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `why_choose_us_statements`, `image`, `core_values`, `mission`, `vision`, `created_at`, `updated_at`) VALUES
(1, '<p>At ARCHWAY HOMES AND INVESTMENT LTD, we understand that choosing the right partner for your real estate endeavors is crucial. Our commitment to excellence, comprehensive service offerings, client-centric approach, and ethical practices set us apart in the industry, making us the preferred choice for our clients.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>One of the primary reasons to choose ARCHWAY HOMES AND INVESTMENT LTD is our ability to offer a full suite of real estate services under one roof. This integrated approach ensures seamless coordination and efficiency, saving our clients valuable time and effort. Whether you are looking to develop a new property, invest in real estate, market a property, broker a deal, or facilitate a sale, we have the expertise and resources to meet your needs. Our comprehensive solutions are designed to provide maximum value, covering all aspects of the real estate process.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our clients are at the heart of everything we do. We take pride in our client-centric approach, which involves understanding the unique needs, preferences, and goals of each client. By tailoring our services to meet these specific requirements, we ensure that our clients receive personalized attention and support throughout their real estate journey. This dedication to client satisfaction has earned us a reputation for building strong, long-term relationships based on trust and mutual respect.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Innovation and sustainability are cornerstones of our philosophy at ARCHWAY HOMES AND INVESTMENT LTD. We are committed to incorporating the latest technologies and sustainable practices into all our projects. From using eco-friendly materials to integrating smart home technologies, we strive to create properties that are not only aesthetically pleasing and functional but also environmentally responsible. Our focus on innovation ensures that our clients benefit from cutting-edge solutions and practices that enhance the value and longevity of their investments.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our extensive network and strong market presence enable us to access exclusive opportunities and provide valuable insights into market trends. This comprehensive market knowledge allows us to deliver exceptional results, whether you are buying, selling, or investing in real estate. We leverage our connections and industry expertise to offer our clients unparalleled advantages in the competitive real estate market.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In summary, choosing ARCHWAY HOMES AND INVESTMENT LTD means partnering with a company dedicated to your success. Our expertise, comprehensive service offerings, client-centric approach, commitment to innovation and sustainability, strong market presence, and ethical practices make us the ideal choice for all your real estate needs. Let us help you achieve your real estate goals with confidence and ease, knowing that you have a trusted partner by your side every step of the way.</p>\r\n\r\n<p>&nbsp;</p>\r\n<scribe-shadow id=\"crxjs-ext\" style=\"position: fixed; width: 0px; height: 0px; top: 0px; left: 0px; z-index: 2147483647; overflow: visible; visibility: visible;\"></scribe-shadow>', 'whyChooseUsImage/1722005606.jpg', '<ul>\r\n	<li><strong>Accountability</strong>: We take ownership of our actions and decisions, holding ourselves to the highest standards of integrity and transparency.</li>\r\n	<li><strong>Respect: </strong>We value diversity, treat everyone with dignity and respect, and foster an inclusive environment where all voices are heard and valued.</li>\r\n	<li><strong>Customer-Centric: </strong>We are committed to understanding and exceeding the needs of our clients, delivering exceptional service and tailored solutions that inspire trust and loyalty.</li>\r\n	<li><strong>Hard Work: </strong>We are dedicated to achieving excellence through perseverance, determination, and a relentless pursuit of our goals.</li>\r\n	<li><strong>Win-Win Mentality: </strong>We believe in creating mutually beneficial relationships with our clients, partners, and stakeholders, where success is shared and celebrated.</li>\r\n	<li><strong>Adaptability: </strong>We embrace change, remain agile, and adapt quickly to evolving market dynamics and customer preferences.</li>\r\n	<li><strong>Yield to Excellence: </strong>We are committed to excellence in everything we do, striving to deliver the highest quality outcomes and exceed expectations at every opportunity.</li>\r\n</ul>\r\n<scribe-shadow id=\"crxjs-ext\" style=\"position: fixed; width: 0px; height: 0px; top: 0px; left: 0px; z-index: 2147483647; overflow: visible; visibility: visible;\"></scribe-shadow>', '\"Our mission at Archway Homes and Investment Limited is to revolutionize the Nigerian real estate industry by providing superior marketing, development, brokerage, and construction services. We aim to deliver unparalleled value and sustainable housing solutions, fostering trust and long-term relationships with our clients and partners.\"', '\"To become the leading real estate company in Nigeria, by providing accessible housing solutions and enabling seamless property investment for all.\"', '2024-06-21 03:31:26', '2024-07-26 13:53:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `consultants_email_unique` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropdown_items_menu_item_id_foreign` (`menu_item_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `executive_summaries`
--
ALTER TABLE `executive_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs_submit_forms`
--
ALTER TABLE `faqs_submit_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_hours`
--
ALTER TABLE `office_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_menus`
--
ALTER TABLE `project_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_links`
--
ALTER TABLE `quick_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_logs`
--
ALTER TABLE `referral_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral_logs_consultant_id_foreign` (`consultant_id`),
  ADD KEY `referral_logs_referrer_id_foreign` (`referrer_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociallinks`
--
ALTER TABLE `sociallinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `executive_summaries`
--
ALTER TABLE `executive_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faqs_submit_forms`
--
ALTER TABLE `faqs_submit_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `office_hours`
--
ALTER TABLE `office_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_menus`
--
ALTER TABLE `project_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quick_links`
--
ALTER TABLE `quick_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral_logs`
--
ALTER TABLE `referral_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sociallinks`
--
ALTER TABLE `sociallinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  ADD CONSTRAINT `dropdown_items_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referral_logs`
--
ALTER TABLE `referral_logs`
  ADD CONSTRAINT `referral_logs_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `consultants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `referral_logs_referrer_id_foreign` FOREIGN KEY (`referrer_id`) REFERENCES `consultants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
