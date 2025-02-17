-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 12:15 PM
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
-- Database: `shopndto_certigoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE `agreements` (
  `id` int(11) NOT NULL,
  `client_id` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `parties` text DEFAULT NULL,
  `contacts` text DEFAULT NULL,
  `addresses` text DEFAULT NULL,
  `emails` text DEFAULT NULL,
  `delivery_methods` text DEFAULT NULL,
  `deemed_deliveries` text DEFAULT NULL,
  `service_descriptions` text DEFAULT NULL,
  `quantities` text DEFAULT NULL,
  `fees` text DEFAULT NULL,
  `term_rates` text DEFAULT NULL,
  `service` text DEFAULT NULL,
  `signed_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agreements`
--

INSERT INTO `agreements` (`id`, `client_id`, `date`, `company_name`, `company_address`, `terms`, `state`, `parties`, `contacts`, `addresses`, `emails`, `delivery_methods`, `deemed_deliveries`, `service_descriptions`, `quantities`, `fees`, `term_rates`, `service`, `signed_by`, `created_at`, `updated_at`) VALUES
(4, '48', '2025-02-08', 'fgbfgbkmjnhvfcfdbgfd', 'hn dbndf', 'fgbfdbgf||dfbdbgdfbg', 'Maharashtra', 'fgbfgb||fbgfbfd', 'fgbfgbfd||bfdbgfntmn', 'bdfbgdf||yntrntnt', 'indiaglobal0@gmail.com||indiaglobal0@gmail.com', 'tyntybnt||ntyntyn', 'rtntnthn||tyntyntyn', 'dfvbdsbryner||rehetyjyujyu', 'rnrtynet ntent||jrtujrtjruj', '5000||500000', 'rtntyntentyntryntyty||rtherjyuymtntyn', NULL, 'rbrbrtbrtbrt', '2025-02-07 10:58:21', '2025-02-07 10:58:21'),
(5, '49', '2025-02-15', 'efrgthy', 'nynyn', 'sfasfsf||k78k75', 'Karnataka', 'rbrtb||rgweg', 'tbrtb||35g435g', 'reberrb||4gwergweg', 'indiaglobal0@gmail.com||indiaglobal0@gmail.commm', 'grqgqergerg||ergegwg', 'egewgeg||dsfgfsg', 'egwegwr||dgbdsbfdsfb', 'egerg34||ergewhwehwerth', '343||34534', 'rgegewrghwegwegerg||eghwthrthwrhrth', NULL, 'hbegergerg', '2025-02-07 13:16:18', '2025-02-07 13:16:18'),
(6, '50', '2025-02-15', 'qwertyuiopqwertyuiop', 'hjuv envnqeoivnqe viejkvok evlkeorvekr vekrvo3vjer', 'wrtnheryhjetymetymtmt||tyjtrjt4yjtj||yjtryjtryjtr', 'Karnataka', 'erywryw||mail', '8521479630||7412589630', 'drwarka||Gurgao', 'indiaglobal0@gmail.com||indiaglobal0@gmail.commm', 'by mail||by post', 'qwertyui||ku,mthjmnrth trntynt', 'gbrgnr||rbretnr', 'rbrbrb||tntenmtym', '1000||5000', '15000', 'ifvbjerm ojekrboemb jwbviv || ojwhevijwe weijwmefokwjoifwoeefwe || woijkvowrjvw kowvjwvwejovkwvikwr wmv iwekowekiowkvlmnwlkvjwopkv0opewjow bwjrbwr bwr9gikw9j || iowj0wji0gbje9bwrer gwrrjg9owrkgwnogijds0vigsjfdsd fiorrg || iweegj3jgiwrhguiwnhgojkwdg', 'Aniket', '2025-02-15 12:53:45', '2025-02-17 06:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_letters`
--

CREATE TABLE `appointment_letters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `employee_address` text DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `ctc_digits` int(11) DEFAULT NULL,
  `ctc_words` varchar(255) DEFAULT NULL,
  `probation_periods` int(11) DEFAULT NULL,
  `signing_authority` varchar(255) DEFAULT NULL,
  `authority_name` varchar(255) DEFAULT NULL,
  `authority_designation` varchar(255) DEFAULT NULL,
  `date_of_appointment` varchar(255) DEFAULT NULL,
  `reporting_authority` varchar(255) DEFAULT NULL,
  `reporting_name` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `basic` text DEFAULT NULL,
  `hra` text DEFAULT NULL,
  `conveyance` text DEFAULT NULL,
  `special_allowance` text DEFAULT NULL,
  `medical` text DEFAULT NULL,
  `lta` text DEFAULT NULL,
  `monthly_gross_salary` text DEFAULT NULL,
  `annual_variable_ctc` text DEFAULT NULL,
  `annual_fixed_ctc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_letters`
--

INSERT INTO `appointment_letters` (`id`, `name`, `employee_code`, `employee_address`, `designation`, `ctc_digits`, `ctc_words`, `probation_periods`, `signing_authority`, `authority_name`, `authority_designation`, `date_of_appointment`, `reporting_authority`, `reporting_name`, `salary`, `basic`, `hra`, `conveyance`, `special_allowance`, `medical`, `lta`, `monthly_gross_salary`, `annual_variable_ctc`, `annual_fixed_ctc`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Shiv Kumar G', '547FHRT5GYH', 'H. No. 23, Sector - 9, Gurgaon, Haryana, 122001', 'Operations-Business Development Manager', 300000, 'Three Lakh Only', 6, 'Signing Authority Here', 'Dr. Sheela Bethapudi', 'Director', '15-03-2024', 'Visakhapatnam', 'Human Resources', '25000', '12500', '6000', '1600', '1400', '1000', '2500', '25000', '30000', '300000', '2024-02-12 17:56:19', '2024-02-12 18:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `contact` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `fname`, `lname`, `email`, `designation`, `contact`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ravish', 'kaul', 'ravish@gmail.comqqq', 'Manager', '8956234512', '2023-10-25 05:53:13', '2023-10-25 05:53:13', NULL),
(2, 'Bhuvan', 'Bum', 'bhuvan@gmail.com', 'Actor', '5646568956', '2023-10-27 16:17:36', '2023-10-27 16:17:36', NULL),
(3, 'Naveen', 'Kaul', 'naveen@gmail.com', 'Employee', '8956230012', '2023-10-30 09:56:14', '2023-10-30 09:56:14', NULL),
(4, 'hssbndvijn fwfwe', 'jjnwjvwjvwo', 'aniket@gmail.com', 'ghfuiwnh', '6393141893', '2025-02-15 13:08:19', '2025-02-17 09:53:31', '2025-02-17 09:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `auditors`
--

CREATE TABLE `auditors` (
  `id` int(11) NOT NULL,
  `auditor` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` int(11) NOT NULL,
  `audit_index` text DEFAULT NULL,
  `audit_name` text DEFAULT NULL,
  `start` text DEFAULT NULL,
  `end` text DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `audit_type` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `checklists` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `auditors` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `auditing_for` int(5) DEFAULT 0 COMMENT '0-hygiene,1-industrial',
  `doc_ref` varchar(100) DEFAULT NULL,
  `personal_responsible` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:Upcoming,1:In-progress,2:Completed',
  `auditor_sign` varchar(255) DEFAULT NULL,
  `auditee_sign` varchar(255) DEFAULT NULL,
  `completion` float DEFAULT 0 COMMENT 'Completion bar',
  `multi_select` int(11) DEFAULT 0,
  `deadline_time` timestamp NULL DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `director_email` varchar(100) DEFAULT NULL,
  `director_mobile` varchar(20) DEFAULT NULL,
  `fstl` varchar(100) DEFAULT NULL,
  `food_email` varchar(100) DEFAULT NULL,
  `food_mobile` varchar(20) DEFAULT NULL,
  `final_score` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL COMMENT 'Month from which audit started',
  `year` int(11) DEFAULT NULL COMMENT 'year in which audit start',
  `audit_number` text NOT NULL,
  `questions` text NOT NULL,
  `report_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `audit_index`, `audit_name`, `start`, `end`, `end_time`, `audit_type`, `location`, `checklists`, `auditors`, `amount`, `auditing_for`, `doc_ref`, `personal_responsible`, `created_at`, `updated_at`, `deleted_at`, `client_id`, `status`, `auditor_sign`, `auditee_sign`, `completion`, `multi_select`, `deadline_time`, `director`, `director_email`, `director_mobile`, `fstl`, `food_email`, `food_mobile`, `final_score`, `month`, `year`, `audit_number`, `questions`, `report_path`) VALUES
(47, 'TAJ- FSMS-CQAS-001', 'HYGIENE INSPECTION', '2023-07-09', '09/07/2023', '11:57 AM', 'FSMS-COMPLIANCE', 'Queen\'s NRI Hospital,D.No, 50-53-14, Gurudwara Rd, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India', '[\"22\",\"23\"]', '1', '1000', 0, NULL, NULL, '2023-07-09 06:16:07', '2023-10-25 08:15:03', NULL, 37, 0, '20230909115811signature.webp', '6538ce87ec0d9.png', 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 70, 7, 2023, '', '', NULL),
(48, 'TAJ- FSMS-CQAS-002', 'HYGIENE INSPECTION', '2023-08-09', '09/08/2023', '02:57 PM', 'FSMS-COMPLIANCE', 'Queen\'s NRI Hospital,D.No, 50-53-14, Gurudwara Rd, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India', '[\"22\",\"23\"]', '1', '1000', 0, NULL, NULL, '2023-08-09 06:16:07', '2023-09-09 07:15:46', NULL, 37, 0, '20230909115811signature.webp', '20230909115811sample-signature.png', 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 78, 8, 2023, '', '', NULL),
(49, 'TAJ- FSMS-CQAS-003', 'HYGIENE INSPECTION', '2023-09-09', '09/09/2023', '01:35 PM', 'FSMS-COMPLIANCE', 'Queen\'s NRI Hospital,D.No, 50-53-14, Gurudwara Rd, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India', '[\"22\",\"23\"]', '1', '1000', 0, NULL, NULL, '2023-09-09 06:16:07', '2023-09-09 07:13:33', NULL, 37, 0, '20230909115811signature.webp', '20230909115811sample-signature.png', 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 9, 2023, '', '', NULL),
(50, '2', 'ISO 14001:2015+ISO 9001:2015+FSSC 22000 v 5.1  GAP', '2023-09-11', NULL, NULL, 'Industrial Audit', 'BISWESWAR FOODS PVT. LTD. SHED NO. – C/17, PLOT NO. C/17A INDUSTRIAL ESTATE, KHAPURIA CUTTACK-10, ODISHA, INDIA.', '[\"23\"]', '1', '5000', 1, NULL, NULL, '2023-09-11 04:58:58', '2023-09-11 05:03:25', '2023-09-11 05:03:25', 37, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 2023, '', '', NULL),
(51, '2', 'ISO 14001:2015+ISO 9001:2015+FSSC 22000 v 5.1  GAP', '2023-09-11', NULL, NULL, 'Industrial Audit', 'BISWESWAR FOODS PVT. LTD. SHED NO. – C/17, PLOT NO. C/17A INDUSTRIAL ESTATE, KHAPURIA CUTTACK-10, ODISHA, INDIA.', '[\"23\"]', '1', '5000', 1, NULL, NULL, '2023-09-11 04:59:04', '2023-09-11 05:03:38', '2023-09-11 05:03:38', 37, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 2023, '', '', NULL),
(52, '2', 'ISO 14001:2015+ISO 9001:2015+FSSC 22000 v 5.1  GAP', '2023-09-11', NULL, NULL, 'Industrial Audit', 'BISWESWAR FOODS PVT. LTD. SHED NO. – C/17, PLOT NO. C/17A INDUSTRIAL ESTATE, KHAPURIA CUTTACK-10, ODISHA, INDIA.', '[\"23\"]', '1', '5000', 1, NULL, NULL, '2023-09-11 04:59:13', '2023-09-11 05:03:30', '2023-09-11 05:03:30', 37, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 2023, '', '', NULL),
(53, '2', 'ISO 14001:2015+ISO 9001:2015+FSSC 22000 v 5.1  GAP', '2023-09-11', NULL, NULL, 'Industrial Audit', 'BISWESWAR FOODS PVT. LTD. SHED NO. – C/17, PLOT NO. C/17A INDUSTRIAL ESTATE, KHAPURIA CUTTACK-10, ODISHA, INDIA.', '[\"23\"]', '1', '4000', 1, NULL, NULL, '2023-09-11 05:05:31', '2023-09-11 05:10:30', '2023-09-11 05:10:30', 37, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 2023, '', '', NULL),
(54, '2', 'ISO 14001:2015+ISO 9001:2015+FSSC 22000 v 5.1  GAP', '2023-09-11', NULL, NULL, 'Industrial Audit', 'BISWESWAR FOODS PVT. LTD. SHED NO. – C/17, PLOT NO. C/17A INDUSTRIAL ESTATE, KHAPURIA CUTTACK-10, ODISHA, INDIA.', '[\"23\"]', '1', '4000', 1, NULL, NULL, '2023-09-11 05:06:47', '2023-09-11 05:10:34', '2023-09-11 05:10:34', 37, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 2023, '', '', NULL),
(55, 'EQFSMS', 'ISO 14001:2015+ISO 9001:2015+FSSC 22000 v 5.1  GAP', '2023-09-11', '15/09/2023', '10:46 AM', 'Industrial Audit', 'BISWESWAR FOODS PVT. LTD. SHED NO. – C/17, PLOT NO. C/17A INDUSTRIAL ESTATE, KHAPURIA CUTTACK-10, ODISHA, INDIA.', '[\"23\"]', '1', '4000', 1, NULL, NULL, '2023-09-11 05:09:53', '2023-09-16 04:29:34', '2023-09-16 04:29:34', 37, 0, NULL, NULL, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 9, 2023, '', '', NULL),
(56, 'EQFSMS', 'ISO 14001:2015+ISO 9001:2015+FSSC 22000 v 5.1  GAP', '2023-09-11', NULL, NULL, 'Industrial Audit', 'BISWESWAR FOODS PVT. LTD. SHED NO. – C/17, PLOT NO. C/17A INDUSTRIAL ESTATE, KHAPURIA CUTTACK-10, ODISHA, INDIA.', '[\"23\"]', '1', '4000', 1, NULL, NULL, '2023-09-11 05:10:24', '2023-09-11 05:15:27', '2023-09-11 05:15:27', 37, 0, NULL, NULL, 25, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 2023, '', '', NULL),
(57, 'FSMS-QDCB1694237168-12', 'ISO 14001:2015+ISO 9001:2015+FSSC 22000 v 5.1 GAP', '2023-09-16', '16/09/2023', '10:23 AM', 'FSMS', 'Queen\'s NRI Hospital,D.No, 50-53-14, Gurudwara Rd, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India', '[\"22\"]', '1', '1800', 1, 'F-BFPL-OP-02', 'Operational head/ Incharge', '2023-09-16 04:29:24', '2023-10-27 06:07:52', NULL, 37, 0, '20230916102253signature.webp', '20230916102253sample-signature.png', 100, 0, NULL, 'MRS. RASHMI SAHOO, DR. S. K. SAHOO', 'RASHMI@RUCHIFOODLINE.IN', '9437966874', 'MR. SUCHINTAK ROUT', 'QC.FROZIT@TUCHIFOODLINE.IN', '8328879681', 83, 9, 2023, '', '', NULL),
(58, 'FSMS-FE6H1698418386-2', 'Hygiene Audit', '2023-10-27', '27/10/2023', '21:14 PM', 'Hygiene', 'Deoli, Delhi, India', '[\"24\"]', '1', '1500', 0, NULL, NULL, '2023-10-27 14:54:13', '2023-11-02 06:36:53', '2023-11-02 06:36:53', 38, 2, '653bdabd29f36.png', '653bdace93999.png', 100, 0, '2023-10-27 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 75, 10, 2023, '', '', NULL),
(59, 'FSMS-RICY1698648485-2', 'FSMS', '2023-10-30', '30/10/2023', '12:36 PM', 'FSMS', 'Deoli, Delhi, India', '[\"24\"]', '1', '16000', 0, NULL, NULL, '2023-10-30 07:01:49', '2023-10-30 07:10:58', NULL, 39, 0, '653f56e0f1a86.png', '653f5702c2cb3.png', 100, 0, '2023-10-30 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 50, 10, 2023, '', '', NULL),
(60, 'EQFSMS-RICY1698648485-2', 'FSMS', '2023-10-30', '30/10/2023', '12:50 PM', 'FSMS', 'Deoli, Delhi, India', '[\"24\"]', '1', '6000', 1, NULL, NULL, '2023-10-30 07:18:46', '2023-10-30 07:20:27', NULL, 39, 0, NULL, NULL, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 10, 2023, '', '', NULL),
(61, 'FSMS-2IK81698649039-2', 'FSMS', '2023-10-30', '31/10/2023', '18:26 PM', 'FSMS', 'Deoli, Delhi, India', '[\"24\"]', '7', '6000', 1, NULL, NULL, '2023-10-30 07:26:59', '2023-10-31 12:56:42', NULL, 40, 0, NULL, NULL, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 10, 2023, '', '', NULL),
(62, 'EQFSMS-2IK81698649039-2', 'FSMS', '2023-10-30', NULL, NULL, 'FSMS', 'Deoli, Delhi, India', '[\"24\"]', '2', '2000', 1, NULL, NULL, '2023-10-30 07:28:08', '2023-10-30 07:28:08', NULL, 40, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 2023, '', '', NULL),
(63, 'EQFSMS-FE6H1698418386-2', 'Hygiene Multiple Sections', '2023-11-02', '02/11/2023', '12:07 PM', 'Hygiene', 'Deoli, Delhi, India', '[\"24\",\"25\"]', '1', '15000', 0, NULL, NULL, '2023-11-02 06:26:28', '2024-01-05 11:56:05', NULL, 38, 0, '6543435157a4a.png', '6543436330782.png', 100, 0, '2023-11-02 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 67, 11, 2023, '', '', NULL),
(64, 'EQFSMS-FE6H1698418386-2', 'Industrial', '2023-11-03', '03/11/2023', '11:14 AM', 'Industrial report', 'Deoli, Delhi, India', '[\"24\"]', '1', '12000', 1, 'VDEHTS324325436Y', 'Mr. Responsible personal', '2023-11-03 05:42:12', '2023-12-06 06:01:50', '2023-12-06 06:01:50', 38, 0, '6567817c05804.png', '6567818b401a7.png', 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 11, 2023, '', '', NULL),
(65, 'FSMS-FE6H1698418386-4', 'Hygiene Report qo', '2023-11-06', '06/11/2023', '16:11 PM', 'Hygiene', 'Deoli, Delhi, India', '[\"24\",\"25\"]', '1', '12000', 0, 'QWERT3456FTYG', 'Personel responsible', '2023-11-06 10:39:27', '2024-02-02 08:14:27', NULL, 38, 0, '6548c2b64582c.png', '6548c2c1c7c59.png', 100, 0, '2023-11-06 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 83, 11, 2023, '', '', NULL),
(66, 'EQFSMS-FE6H1698418386-1', 'Hygiene Multiple Sections', '2023-09-02', '02/09/2023', '12:07 PM', 'Hygiene', 'Deoli, Delhi, India', '[\"24\",\"25\"]', '1', '15000', 0, NULL, NULL, '2023-09-02 06:26:28', '2023-11-30 12:26:50', '2023-11-30 12:26:50', 38, 2, '6543435157a4a.png', '6543436330782.png', 100, 0, '2023-09-02 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 50, 9, 2023, '', '', NULL),
(67, 'EQFSMS-FE6H1698418386-3', 'Hygiene Multiple Sections', '2023-09-10', '10/09/2023', '12:07 PM', 'Hygiene', 'Deoli, Delhi, India', '[\"24\",\"25\"]', '1', '15000', 0, NULL, NULL, '2023-09-10 06:26:28', '2023-11-30 12:26:44', '2023-11-30 12:26:44', 38, 0, '6543435157a4a.png', '6543436330782.png', 100, 0, '2023-09-09 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 67, 9, 2023, '', '', NULL),
(68, 'EQFSMS-FE6H1698418386-5', 'Hygiene Multiple Sections', '2023-10-10', '10/10/2023', '12:07 PM', 'Hygiene', 'Deoli, Delhi, India', '[\"24\",\"25\"]', '1', '15000', 0, NULL, NULL, '2023-10-10 06:26:28', '2023-11-30 12:26:42', NULL, 38, 0, '6543435157a4a.png', '6543436330782.png', 100, 0, '2023-10-09 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 67, 10, 2023, '', '', NULL),
(69, 'EQFSMS-FE6H1698418386-6', 'Hygiene Multiple Sections', '2023-12-10', '10/12/2023', '12:07 PM', 'Hygiene', 'Deoli, Delhi, India', '[\"24\",\"25\"]', '1', '15000', 0, NULL, NULL, '2023-12-10 06:26:28', '2024-01-05 12:10:51', NULL, 38, 0, '6543435157a4a.png', '6543436330782.png', 100, 0, '2023-12-09 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 67, 12, 2023, '', '', NULL),
(70, 'FSMS-R9PX1699449776-1', 'HYGIENE AUDIT', '2023-10-08', '19/12/2023', '19:17 PM', 'HYGIENE', 'Deoli, Delhi, India', '[\"26\",\"27\"]', '1', '4000', 0, NULL, NULL, '2023-11-08 13:24:49', '2025-01-25 12:34:10', NULL, 42, 0, '65819ec9d76f0.png', '65819ed7aad72.png', 100, 0, '2023-11-08 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 89, 11, 2023, '', '', NULL),
(71, 'FSMS-R9PX1699449776-2', 'HYGIENE AUDIT', '2023-10-18', '19/12/2023', '19:21 PM', 'HYGIENE', 'Deoli, Delhi, India', '[\"26\",\"27\"]', '1', '4000', 0, NULL, NULL, '2023-11-08 13:30:10', '2023-12-19 13:51:54', NULL, 42, 0, '65819fea973e4.png', '65819ff561a10.png', 100, 0, '2023-11-08 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 100, 10, 2023, '', '', NULL),
(72, 'FSMS-R9PX1699449776-3', 'HYGIENE AUDIT', '2023-11-08', '20/12/2023', '16:34 PM', 'HYGIENE', 'Deoli, Delhi, India', '[\"26\",\"27\"]', '1', '4000', 0, NULL, NULL, '2023-11-08 13:31:40', '2023-12-20 11:04:25', NULL, 42, 0, '6581a079aa4d2.png', '6581a0845c457.png', 100, 0, '2023-11-08 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 100, 11, 2023, '', '', NULL),
(73, 'FSMS-FS631700291464-1', 'Compliance', '2023-11-18', '18/11/2023', '22:07 PM', 'Fsms', 'Deoli, Delhi, India', '[\"24\"]', '1', '182739', 0, NULL, NULL, '2023-11-18 07:12:43', '2023-11-18 16:37:53', NULL, 43, 0, NULL, NULL, 100, 0, '2023-11-18 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 75, 11, 2023, '', '', NULL),
(74, 'FSMS-FS631700291464-2', 'FSMS', '2023-11-25', NULL, NULL, 'FSMS', 'Deoli, Delhi, India', '[\"26\"]', '1', '1200', 0, NULL, NULL, '2023-11-25 15:49:53', '2023-11-25 15:49:53', NULL, 43, 0, NULL, NULL, 0, 0, '2023-11-25 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 2023, '', '', NULL),
(80, 'FSMS-FS631700291464-4', 'FSMS', '2023-11-29', NULL, NULL, 'FSMS', 'Deoli, Delhi, India', '[\"26\",\"25\",\"27\"]', '1', '0', 0, NULL, NULL, '2023-11-29 18:10:20', '2023-11-29 18:15:38', NULL, 43, 0, '65677fb7a5c1b.png', '65677fca4bbde.png', 100, 0, '2023-11-29 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 2023, '', '', NULL),
(81, 'FSMS-FE6H1698418386-8', 'gerqgqerg', '2023-11-30', NULL, NULL, 'gergerg', 'Deoli, Delhi, India', '[\"27\"]', '1', '343214', 0, 'doc ref', 'responsible', '2023-11-30 11:16:57', '2023-11-30 11:41:10', '2023-11-30 11:41:10', 38, 0, NULL, NULL, 100, 0, '2023-11-30 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 2023, '', '', NULL),
(82, 'FSMS-FE6H1698418386-8', 'fsms', '2023-11-30', '30/11/2023', '17:57 PM', 'fsms fsms', 'Deoli, Delhi, India', '[\"26\"]', '1', '12345', 0, 'doc ref doc fe', 'responsible person', '2023-11-30 11:42:15', '2023-12-05 11:59:18', NULL, 38, 0, '656f101dec307.png', '656f109671143.png', 100, 0, '2023-11-30 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 80, 11, 2023, '', '', NULL),
(83, 'EQFSMS-FE6H1698418386-2', 'EQFSMS AUDIT', '2023-12-06', '08/12/2023', '12:31 PM', 'EQFSMS AUDIT', 'Deoli, Delhi, India', '[\"27\"]', '1', '15005', 1, NULL, NULL, '2023-12-06 06:02:31', '2023-12-08 07:01:18', NULL, 38, 0, '6572bf282e56d.png', '6572bf353d0a8.png', 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 12, 2023, '', '', NULL),
(84, 'FSMS-14TH1701261261-1', 'FSMS', '2023-12-08', NULL, NULL, 'FSMS', 'Deoli, Delhi, India', '[\"24\",\"25\",\"26\",\"27\"]', '1', '1200', 0, NULL, NULL, '2023-12-08 12:39:15', '2023-12-09 16:18:58', NULL, 44, 0, NULL, NULL, 38.89, 0, '2023-12-08 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 2023, '', '', NULL),
(85, 'EMS-R9PX1699449776-4', 'GAP', '2023-12-19', '19/12/2023', '19:55 PM', 'GAP', 'Deoli, Delhi, India', '[\"24\",\"25\",\"26\"]', '1', '2000', 1, NULL, NULL, '2023-12-19 14:23:18', '2023-12-20 07:26:06', NULL, 42, 0, '6581a7e342dda.png', '6581a7d89d2be.png', 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 91, 12, 2023, '', '', NULL),
(86, 'FSMS-FE6H1698418386-7', 'FSMS', '2023-12-22', '20/12/2023', '12:03 PM', 'FSMS', 'Deoli, Delhi, India', '[\"24\"]', '1', '1500', 0, NULL, NULL, '2023-12-20 04:56:01', '2023-12-20 06:33:33', NULL, 38, 0, NULL, NULL, 100, 0, '2023-12-20 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 100, 12, 2023, '', '', NULL),
(87, 'FSMS-R9PX1699449776-5', 'FSMS', '2023-12-20', NULL, NULL, 'FSMS', 'Deoli, Delhi, India', '[\"24\",\"25\"]', '1', '16000', 0, NULL, NULL, '2023-12-20 07:28:02', '2023-12-20 07:31:08', NULL, 42, 0, '6582982eea184.png', '6582983837a42.png', 100, 0, '2023-12-20 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 50, 12, 2023, '', '', NULL),
(88, 'EMS-1L901704280186-1', 'GAP', '2024-01-03', '03/01/2024', '16:45 PM', 'Compliance', 'Goa', '[\"26\",\"27\"]', '1', '2000', 0, NULL, NULL, '2024-01-03 11:11:53', '2025-02-13 13:33:49', NULL, 47, 0, '659541c05df9f.png', '659541cbd9ca3.png', 100, 0, '2024-01-03 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 78, 1, 2024, '', '', 'storage/completed_reports/audit-report-88-2025-02-13_19-03-49.pdf'),
(89, 'EMS-1L901704280186-2', 'FSMS', '2024-01-03', '03/01/2024', '16:54 PM', 'Compliance', 'GOA', '[\"26\",\"27\"]', '1', '12000', 0, NULL, NULL, '2024-01-03 11:20:28', '2025-01-25 12:45:22', NULL, 47, 0, '659543b8752fc.png', '659543c9a8c4e.png', 100, 0, '2024-01-03 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 78, 1, 2024, '', '', NULL),
(90, 'FSMS-0BDT1736942115-1', 'Test Audit', '2025-01-16', '2025-01-17T14:55', '12:47 PM', 'Testing', 'Gurugram, Haryana, India', '[\"24\",\"25\"]', '11', '1000', 0, NULL, NULL, '2025-01-15 12:07:06', '2025-02-15 13:44:13', NULL, 48, 0, NULL, NULL, 100, 0, '2025-01-15 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 83, 1, 2025, '1', '{\"24\":[98,99,100,101],\"25\":[108,109]}', 'storage/completed_reports/audit-report-90-2025-02-15_19-14-13.pdf'),
(91, 'EMS-0BDT1736942115-INDUS-2', 'Test 22', '2025-01-16', '16/01/2025', '15:43 PM', 'Dummy', 'Gurugram, Haryana, India', '[\"24\"]', '1', '10000', 1, NULL, NULL, '2025-01-16 07:10:16', '2025-02-13 13:21:00', NULL, 48, 0, NULL, NULL, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 1, 2025, '2', '{\"24\":[98,99,100,101]}', 'storage/completed_reports/audit-report-91-2025-02-13_18-51-00.pdf'),
(92, 'FSMS-0BDT1736942115-INDUS-3', 'Test 33', '2025-01-17', NULL, NULL, 'Dummy 3', 'Gurugram, Haryana, India', '[\"26\"]', '11', '1000', 1, NULL, NULL, '2025-01-16 10:54:50', '2025-01-17 10:09:49', NULL, 48, 0, NULL, NULL, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 1, 2025, '3', '{\"26\":[110,111,112,113,114]}', NULL),
(93, 'FSMS-ZB3U1739622709-1', 'testing', '2025-02-15', '15/02/2025', '18:07 PM', '11', 'Gurugram, Haryana, India', '[\"24\",\"25\"]', '11', '500', 0, NULL, NULL, '2025-02-15 12:34:51', '2025-02-15 13:38:59', '2025-02-15 13:38:59', 50, 0, NULL, NULL, 100, 0, '2025-02-15 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 67, 2, 2025, '1', '{\"24\":[98,99,100,101],\"25\":[108,109]}', 'storage/completed_reports/audit-report-93-2025-02-15_18-12-53.pdf'),
(94, 'FSMS-ZB3U1739622709-test2', 'test22', '2025-02-15', '15/02/2025', '18:16 PM', '12', 'Gurugram, Haryana, India', '[\"24\",\"25\"]', '11', '500', 0, NULL, NULL, '2025-02-15 12:43:46', '2025-02-15 13:40:23', '2025-02-15 13:40:23', 50, 0, NULL, NULL, 100, 0, '2025-02-15 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 67, 2, 2025, 'test2', '{\"24\":[98,99,100,101],\"25\":[108,109]}', 'storage/completed_reports/audit-report-94-2025-02-15_19-09-53.pdf'),
(95, 'FSMS-ZB3U1739622709-QWERTYTYU', 'LKWNJDFJOW', '2025-02-15', '15/02/2025', '19:10 PM', 'UOHV', 'Gurugram, Haryana, India', '[\"39\"]', '11', '100', 0, NULL, NULL, '2025-02-15 13:36:41', '2025-02-17 10:25:26', NULL, 50, 0, NULL, NULL, 100, 0, '2025-02-15 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, 33, 2, 2025, 'QWERTYTYU', '{\"39\":[522,524]}', 'public/storage/completed_reports/audit-report-95-2025-02-17_15-55-26.pdf'),
(96, 'FSMS-0BDT1736942115-35434', 'bfggbfdgb', '2025-02-15', NULL, NULL, 'fdsgdfg', 'Gurugram, Haryana, India', '[\"24\"]', '11', '100', 0, NULL, NULL, '2025-02-15 13:54:05', '2025-02-15 13:54:32', NULL, 48, 0, NULL, NULL, 100, 0, '2025-02-15 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2025, '35434', '{\"24\":[98,99,100,101]}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_details`
--

CREATE TABLE `audit_details` (
  `id` int(11) NOT NULL,
  `audit_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `response_score` varchar(100) DEFAULT NULL,
  `response_id` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `template_name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `objective_evidences` text DEFAULT NULL,
  `suggestions` text DEFAULT NULL,
  `doc_ref` varchar(255) DEFAULT NULL,
  `person_responsible` varchar(255) DEFAULT NULL,
  `timeline` varchar(255) DEFAULT NULL,
  `evidences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `report_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_details`
--

INSERT INTO `audit_details` (`id`, `audit_id`, `question_id`, `response_score`, `response_id`, `start_time`, `template_id`, `template_name`, `created_at`, `updated_at`, `deleted_at`, `objective_evidences`, `suggestions`, `doc_ref`, `person_responsible`, `timeline`, `evidences`, `report_path`) VALUES
(77, 47, 87, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 06:18:42', '2023-09-09 06:18:42', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(78, 47, 88, '0', '55', NULL, 22, 'RECEIVING AREA', '2023-09-09 06:18:53', '2023-09-09 06:24:04', NULL, 'The service area had several issues with cleanliness and maintenance. The exhaust hood and the tube light were greasy and oily, and the pipeline attached to the exhaust hood was filled with grease that dripped on the pan in the live kitchen counter, making it even greasy. The mesh of the coffee machine and the buffet dish chafer had visible stains and grease marks, and the chafer was also a bit rusted on its surface. The ceiling above the service table had some oil stains, and the cabinet next to the live kitchen counter, where the stove and other utensils and equipment were stored, had rust formation and dust accumulation.', 'Grease and oil accumulation on the exhaust hood and tube light can pose a physical risk of contaminating or igniting food, as they can drip or fall into the food, making it unfit for consumption. They can also catch fire easily if exposed to heat or sparks, causing damage to equipment and the kitchen. To avoid this, use a degreaser and a cloth to clean them regularly and inspect them for leaks or cracks. Keep a fire extinguisher near the exhaust hood and train staff on how to operate it in case of fire. Grease dripping from the pipeline attached to the exhaust hood onto the live kitchen counter pan can create a chemical and biological risk of affecting food quality and safety with harmful substances or microorganisms. Grease can contain chemicals that can alter the taste, color, or texture of the food, providing a favorable environment for bacteria and other organisms to grow and multiply, causing food poisoning or spoilage. To avoid this, use a degreaser and a brush to scrub the pipeline clean regularly and replace it if worn out or damaged. Protect the pan with a lid or foil when not in use, and wash it thoroughly before using it again. Stains, grease marks, and rust on the coffee machine and buffet dish chafer mesh can cause a physical and biological risk of contaminating the coffee or food with foreign particles or microorganisms. Stains can make the coffee look dirty, grease marks can make the food look oily, and rust can make both taste metallic. They can also harbor bacteria and other microorganisms that can cause food poisoning or spoilage. For example, stains can contain coffee grounds, grease marks can contain animal fats, and rust can contain iron oxide which can all support bacterial growth. To avoid this, use a detergent and a sponge to clean them regularly and rinse them well with hot water. Additionally, replace the chafer if it is too rusted or damaged. Oil stains on the ceiling above the service table can cause physical and chemical hazards, affecting food quality and safety. These stains can drip or fall into food, containing harmful chemicals that can alter the taste, color, or smell of the food. To prevent contamination, clean the ceiling regularly with a degreaser and cloth, repaint it if necessary, and cover the food with a lid or foil when not in use. Check for signs of contamination before serving. Rust and dust accumulation in the cabinet next to the live kitchen counter can also cause contamination. This cabinet stores the stove and other cooking utensils and equipment, attracting pests like rodents, insects, or molds. To prevent contamination, clean the cabinet regularly with a detergent and cloth, wipe off any dust or dirt, replace rusted or damaged utensils, store them in a dry and clean place, and seal any gaps or cracks that may allow pests to enter.', NULL, NULL, NULL, '[\"storage\\/evidences\\/8f91c9c261bfa0650898a921928d0950.jpg\"]', NULL),
(79, 47, 89, '1', '56', NULL, 22, 'RECEIVING AREA', '2023-09-09 06:19:00', '2023-09-09 06:19:00', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(80, 47, 90, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 06:19:06', '2023-09-09 06:19:06', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(81, 47, 92, '0', '55', NULL, 23, 'STORAGE AREA', '2023-09-09 06:19:16', '2023-09-09 06:24:34', NULL, 'In the service area, a small cockroach was found on top of the extension switchboard in the corner, located at the food pick-up area. Another small cockroach was observed on the surface of the metal cabinet that houses the dustbin, located next to the live kitchen counter.', 'The presence of cockroaches in the service and preparation areas of a food establishment poses a serious threat to the health and safety of the food and customers. Cockroaches are known to carry and transmit various pathogens, such as bacteria, viruses, fungi, and parasites, that can cause food poisoning, diarrhea, dysentery, typhoid fever, cholera, and other diseases. They can contaminate food with feces, saliva, eggs, and shed skins. Furthermore, cockroaches can cause allergic reactions and asthma attacks in some people who are sensitive to their allergens. To prevent pest infestation and its associated hazards, it is essential to maintain good hygiene and sanitation practices in the food establishment. This includes- Cleaning and disinfecting all surfaces, equipment, utensils, and storage areas regularly and thoroughly. Sealing any cracks, crevices, holes, or gaps that can provide entry points or hiding places for cockroaches. Storing food in sealed containers or refrigerators and promptly disposing of any spoiled or leftover food. Using pest control methods such as traps, baits, insecticides, or professional exterminators to eliminate existing cockroach populations and prevent future ones. Monitoring and inspecting the premises regularly for signs of cockroach activity, such as droppings, egg cases, or live or dead insects', NULL, NULL, NULL, '[\"storage\\/evidences\\/bd0cc810b580b35884bd9df37c0e8b0f.jpg\",\"storage\\/evidences\\/cfdea3ada9e5646068d4288f9b9ad0de.jpg\"]', NULL),
(82, 47, 93, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-09 06:19:23', '2023-09-09 06:19:23', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(83, 47, 91, '1', '56', NULL, 22, 'RECEIVING AREA', '2023-09-09 06:19:33', '2023-09-09 06:19:33', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(84, 47, 94, '0', '55', NULL, 23, 'STORAGE AREA', '2023-09-09 06:19:41', '2023-09-09 06:25:16', NULL, 'The Buffet temperature record was observed to be incomplete since the 26th of June and had missing entries for several items.', 'The buffet temperature record is crucial for ensuring food safety and quality by recording the food temperature at various preparation, holding, and serving stages. Incomplete records can lead to biological, legal, and reputational hazards. The food may be exposed to the temperature danger zone (41–135°F) for too long, allowing harmful bacteria to grow, leading to foodborne illness or spoilage. Incomplete records may also result in fines, penalties, or closure of the establishment if inspections reveal the record. To prevent these consequences, it is essential to use a calibrated thermometer to measure and record the temperature of each buffet item at least every two hours or more frequently if required by regulations or standards. Additionally, check the temperature of hot holding units, cold holding units, and refrigerators where buffet items are stored or displayed. Proper procedures for cooking, cooling, reheating, and holding buffet items should be followed to keep them out of the temperature danger zone. Also make sure to discard any food that has been in the temperature danger zone for more than four hours. Keep the buffet temperature record visible and accessible, updating it regularly with accurate information. Review it periodically to identify gaps, errors, or trends and take corrective actions if needed. As per regulations or standards, retain the record for at least six months.', NULL, NULL, NULL, '[\"storage\\/evidences\\/b265ce60fe4c5384e622b09eb829b8df.jpg\"]', NULL),
(85, 47, 95, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-09 06:19:51', '2023-09-09 06:19:51', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(86, 48, 87, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:00:01', '2023-09-09 07:00:01', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(87, 48, 88, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:00:07', '2023-09-09 07:00:07', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(88, 48, 89, '1', '56', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:00:16', '2023-09-09 07:00:16', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(89, 48, 90, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:00:20', '2023-09-09 07:00:20', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(90, 48, 91, '1', '56', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:00:24', '2023-09-09 07:00:24', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(91, 48, 92, '0', '55', NULL, 23, 'STORAGE AREA', '2023-09-09 07:00:52', '2025-01-28 07:29:56', NULL, 'In the service area, a small cockroach was found on top of the extension switchboard in the corner, located at the food pick-up area. Another small cockroach was observed on the surface of the metal cabinet that houses the dustbin, located next to the live kitchen counter.', 'The presence of cockroaches in the service and preparation areas of a food establishment poses a serious threat to the health and safety of the food and customers. Cockroaches are known to carry and transmit various pathogens, such as bacteria, viruses, fungi, and parasites, that can cause food poisoning, diarrhea, dysentery, typhoid fever, cholera, and other diseases. They can contaminate food with feces, saliva, eggs, and shed skins. Furthermore, cockroaches can cause allergic reactions and asthma attacks in some people who are sensitive to their allergens. To prevent pest infestation and its associated hazards, it is essential to maintain good hygiene and sanitation practices in the food establishment. This includes- Cleaning and disinfecting all surfaces, equipment, utensils, and storage areas regularly and thoroughly. Sealing any cracks, crevices, holes, or gaps that can provide entry points or hiding places for cockroaches. Storing food in sealed containers or refrigerators and promptly disposing of any spoiled or leftover food. Using pest control methods such as traps, baits, insecticides, or professional exterminators to eliminate existing cockroach populations and prevent future ones. Monitoring and inspecting the premises regularly for signs of cockroach activity, such as droppings, egg cases, or live or dead insects', NULL, NULL, NULL, '[\"storage\\/evidences\\/fec87a37cdeec1c6ecf8181c0aa2d3bf.jpg\"]', 'C:\\xampp\\htdocs\\certigo\\public\\storage/completed_reports/audit-report-91-2025-01-28_12-59-56.pdf'),
(92, 48, 93, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-09 07:00:56', '2023-09-09 07:00:56', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(93, 48, 94, '0', '55', NULL, 23, 'STORAGE AREA', '2023-09-09 07:01:08', '2023-09-09 07:02:53', NULL, 'The Buffet temperature record was observed to be incomplete since the 26th of June and had missing entries for several items.', 'The buffet temperature record is crucial for ensuring food safety and quality by recording the food temperature at various preparation, holding, and serving stages. Incomplete records can lead to biological, legal, and reputational hazards. The food may be exposed to the temperature danger zone (41–135°F) for too long, allowing harmful bacteria to grow, leading to foodborne illness or spoilage. Incomplete records may also result in fines, penalties, or closure of the establishment if inspections reveal the record. To prevent these consequences, it is essential to use a calibrated thermometer to measure and record the temperature of each buffet item at least every two hours or more frequently if required by regulations or standards. Additionally, check the temperature of hot holding units, cold holding units, and refrigerators where buffet items are stored or displayed. Proper procedures for cooking, cooling, reheating, and holding buffet items should be followed to keep them out of the temperature danger zone. Also make sure to discard any food that has been in the temperature danger zone for more than four hours. Keep the buffet temperature record visible and accessible, updating it regularly with accurate information. Review it periodically to identify gaps, errors, or trends and take corrective actions if needed. As per regulations or standards, retain the record for at least six months.', NULL, NULL, NULL, '[\"storage\\/evidences\\/41ab1b1d6bf108f388dfb5cd282fb76c.jpg\",\"storage\\/evidences\\/c54bc2ded4480856dc9f39bdcf35a3e7.jpg\"]', NULL),
(94, 48, 95, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-09 07:01:23', '2023-09-09 07:01:23', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(95, 49, 87, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:09:58', '2023-09-09 07:09:58', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(96, 49, 88, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:10:09', '2023-09-09 07:10:09', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(97, 49, 89, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:10:11', '2023-09-09 07:13:06', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(98, 49, 90, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:10:14', '2023-09-09 07:13:16', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(99, 49, 91, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-09 07:10:17', '2023-09-09 07:13:21', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(100, 49, 92, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-09 07:12:21', '2023-09-09 07:12:21', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(101, 49, 93, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-09 07:12:25', '2023-09-09 07:12:25', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(102, 49, 94, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-09 07:12:37', '2023-09-09 07:12:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(103, 49, 95, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-09 07:12:43', '2023-09-09 07:12:43', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(104, 56, 92, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-11 05:15:08', '2023-09-11 05:15:08', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(105, 55, 92, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-15 05:16:06', '2023-09-15 05:16:06', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(106, 55, 93, '1', '56', NULL, 23, 'STORAGE AREA', '2023-09-15 05:16:11', '2023-09-15 05:16:11', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(107, 55, 94, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-15 05:16:17', '2023-09-15 05:16:17', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(108, 55, 95, '1', '54', NULL, 23, 'STORAGE AREA', '2023-09-15 05:16:23', '2023-09-15 05:16:23', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(109, 57, 87, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-16 04:49:52', '2023-09-16 04:49:52', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(110, 57, 88, '1', '56', NULL, 22, 'RECEIVING AREA', '2023-09-16 04:50:49', '2023-09-16 04:50:49', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(111, 57, 89, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-16 04:50:53', '2023-09-16 04:50:53', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(112, 57, 90, '0', '55', NULL, 22, 'RECEIVING AREA', '2023-09-16 04:52:03', '2023-09-16 04:52:03', NULL, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"The quick brown fox jumps over the lazy dog. Carpe diem - seize the day! In vino veritas - in wine, there is truth. Serendipity: finding something good without looking for it. Eureka! The aha moment when everything makes sense. Wanderlust: a strong desire to travel and explore the world.\"', NULL, NULL, NULL, '[\"storage\\/evidences\\/5faf461eff3099671ad63c6f3f094f7f.jpg\",\"storage\\/evidences\\/fb6c4e0b4b90ebfb5a35ca7a9cbf1d16.jpg\"]', NULL),
(113, 57, 91, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-16 04:52:11', '2023-09-16 04:52:11', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(114, 57, 97, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-16 05:22:57', '2023-09-16 05:22:57', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(115, 47, 97, '1', '54', NULL, 22, 'RECEIVING AREA', '2023-09-18 18:08:44', '2023-09-18 18:08:44', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(116, 58, 98, '1', '57', NULL, 24, 'Template One', '2023-10-27 14:58:25', '2023-10-27 14:58:25', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(117, 58, 99, '0', '58', NULL, 24, 'Template One', '2023-10-27 14:58:33', '2023-10-27 15:21:42', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheetsrem Ipsum.', '<p><span style=\"color: rgb(22, 145, 121);\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the <span style=\"background-color: rgb(194, 224, 244);\"><strong>1500s, when an unknown printer took a galley of type </strong></span>and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br><span style=\"color: rgb(22, 145, 121);\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/76d4110e944e83212bafa4b11ebf2b7e.jpg\",\"storage\\/evidences\\/2668a7105966cae6e23901495176b8f9.webp\",\"storage\\/evidences\\/ab49ef78e2877bfd2c2bfa738e459bf0.webp\"]', NULL),
(118, 58, 100, '1', '59', NULL, 24, 'Template One', '2023-10-27 14:58:39', '2023-10-27 14:58:39', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(119, 58, 101, '1', '57', NULL, 24, 'Template One', '2023-10-27 14:58:46', '2023-10-27 14:58:46', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(120, 59, 98, '0', '58', NULL, 24, 'Template One', '2023-10-30 07:04:28', '2023-10-30 07:04:28', NULL, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '<p><span style=\"background-color: rgb(251, 238, 184);\">The thing is more of a important than usual</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/fa733611ef13bd333ebfbab7eed14b63.jpeg\"]', NULL),
(121, 59, 99, '1', '57', NULL, 24, 'Template One', '2023-10-30 07:05:00', '2023-10-30 07:05:37', NULL, NULL, NULL, NULL, NULL, NULL, '[\"storage\\/evidences\\/19f01591b6ca3ba03f1aedc8db12cdb9.jpeg\",\"storage\\/evidences\\/47a5feca4ce02883a5643e295c7ce6cd.jpeg\"]', NULL),
(122, 59, 100, '1', '57', NULL, 24, 'Template One', '2023-10-30 07:05:05', '2023-10-30 07:05:47', NULL, NULL, NULL, NULL, NULL, NULL, '[\"storage\\/evidences\\/56584778d5a8ab88d6393cc4cd11e090.jpeg\"]', NULL),
(123, 59, 101, '0', '58', NULL, 24, 'Template One', '2023-10-30 07:05:11', '2023-10-30 07:06:08', NULL, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '<p>hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/e62111f5d7b0c67958f9acbdc0288154.jpeg\"]', NULL),
(124, 60, 98, '1', '57', NULL, 24, 'Template One', '2023-10-30 07:19:12', '2025-01-25 12:32:08', NULL, NULL, NULL, NULL, NULL, NULL, '[\"storage\\/evidences\\/0e087ec55dcbe7b2d7992d6b69b519fb.jpeg\",\"storage\\/evidences\\/33805671920f0d02e6d18f630985aace.jpeg\",\"storage\\/evidences\\/99b410aa504a6f67da128d333896ecd4.png\"]', NULL),
(125, 60, 99, '1', '57', NULL, 24, 'Template One', '2023-10-30 07:19:37', '2025-01-25 12:31:33', NULL, 'wrvgretgtreg', '<p>tbe4tbvetrbvetbvetvg</p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/37588c655ca22f7ca1664a2b211188ff.jpeg\",\"storage\\/evidences\\/800de15c79c8d840f4e78d3af937d4d4.jpeg\"]', NULL),
(126, 60, 100, '0', '58', NULL, 24, 'Template One', '2023-10-30 07:19:46', '2025-01-25 12:30:47', NULL, NULL, NULL, NULL, NULL, NULL, '[\"storage\\/evidences\\/6ffad86b9a8dd4a3e98df1b0830d1c8c.jpeg\"]', NULL),
(127, 60, 101, '0', '58', NULL, 24, 'Template One', '2023-10-30 07:19:55', '2025-01-25 12:31:46', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(128, 61, 98, '1', '57', NULL, 24, 'Template One', '2023-10-31 12:55:04', '2023-10-31 12:55:04', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(129, 61, 99, '0', '58', NULL, 24, 'Template One', '2023-10-31 12:55:10', '2023-10-31 12:56:34', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '<p><span style=\"color: rgb(22, 145, 121);\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</span><br><span style=\"color: rgb(22, 145, 121);\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/dc727151e5d55dde1e950767cf861ca5.jpg\",\"storage\\/evidences\\/a6ea8471c120fe8cc35a2954c9b9c595.webp\"]', NULL),
(130, 61, 100, '1', '59', NULL, 24, 'Template One', '2023-10-31 12:55:17', '2023-10-31 12:55:17', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(131, 61, 101, '1', '57', NULL, 24, 'Template One', '2023-10-31 12:55:23', '2023-10-31 12:55:23', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(132, 63, 98, '1', '57', NULL, 24, 'Template One', '2023-11-02 06:26:37', '2023-11-02 06:26:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(133, 63, 99, '1', '57', NULL, 24, 'Template One', '2023-11-02 06:26:43', '2023-11-02 06:26:43', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(134, 63, 100, '0', '58', NULL, 24, 'Template One', '2023-11-02 06:26:53', '2023-11-02 06:34:28', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cice</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/995665640dc319973d3173a74a03860c.jpg\",\"storage\\/evidences\\/d91caca74114d81fdfc578fca82f8d72.png\",\"storage\\/evidences\\/7993e11204b215b27694b6f139e34ce8.webp\"]', NULL),
(135, 63, 101, '1', '59', NULL, 24, 'Template One', '2023-11-02 06:26:59', '2023-11-02 06:26:59', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(136, 63, 108, '1', '57', NULL, 25, 'Template two', '2023-11-02 06:33:36', '2023-11-02 06:33:36', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(137, 63, 109, '0', '58', NULL, 25, 'Template two', '2023-11-02 06:33:43', '2023-11-02 06:35:46', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by i<strong>njected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of pass</strong>ages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/36ae77db7915835abc105f631f0391f8.jpg\",\"storage\\/evidences\\/c4ede56bbd98819ae6112b20ac6bf145.webp\",\"storage\\/evidences\\/fd1d83de2517a02d4e221ede9a681432.jpg\"]', NULL),
(138, 64, 98, '1', '57', NULL, 24, 'Template One', '2023-11-03 05:42:37', '2023-11-03 05:42:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(139, 64, 99, '1', '57', NULL, 24, 'Template One', '2023-11-03 05:43:36', '2023-11-29 18:22:24', NULL, NULL, NULL, NULL, NULL, NULL, '[\"storage\\/evidences\\/7eab47bf3a57db8e440e5a788467c37f.jpg\"]', NULL),
(140, 64, 100, '1', '57', NULL, 24, 'Template One', '2023-11-03 05:43:40', '2023-11-03 05:43:40', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(141, 64, 101, '1', '59', NULL, 24, 'Template One', '2023-11-03 05:43:45', '2023-11-03 05:43:45', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(142, 65, 98, '1', '57', NULL, 24, 'Template One', '2023-11-06 10:39:42', '2023-11-06 10:39:42', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(143, 65, 99, '0', '58', NULL, 24, 'Template One', '2023-11-06 10:40:12', '2023-11-06 10:40:12', NULL, 'wertyui', '<p><span style=\"color: rgb(22, 145, 121);\">hewuif FHUIR UIH</span></p>\r\n<p><span style=\"color: rgb(22, 145, 121);\">hewuif FHUIR UIH</span></p>\r\n<p><span style=\"color: rgb(22, 145, 121);\">hewuif FHUIR UIH</span></p>\r\n<p><span style=\"color: rgb(22, 145, 121);\">hewuif FHUIR UIH</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/dc16622ddc767e6bc1200fe5df2fbdfb.jpg\"]', NULL),
(144, 65, 100, '1', '59', NULL, 24, 'Template One', '2023-11-06 10:40:20', '2023-11-06 10:40:20', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(145, 65, 101, '1', '57', NULL, 24, 'Template One', '2023-11-06 10:40:26', '2023-11-06 10:40:26', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(146, 66, 98, '1', '57', NULL, 24, 'Template One', '2023-09-02 06:26:37', '2023-09-02 06:26:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(147, 66, 99, '1', '57', NULL, 24, 'Template One', '2023-09-02 06:26:43', '2023-09-02 06:26:43', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(148, 66, 100, '0', '58', NULL, 24, 'Template One', '2023-09-02 06:26:53', '2023-09-02 06:34:28', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cice</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/995665640dc319973d3173a74a03860c.jpg\",\"storage\\/evidences\\/d91caca74114d81fdfc578fca82f8d72.png\",\"storage\\/evidences\\/7993e11204b215b27694b6f139e34ce8.webp\"]', NULL),
(149, 66, 101, '0', '58', NULL, 24, 'Template One', '2023-09-02 06:26:59', '2023-11-07 12:02:19', NULL, 'wgeyhetjrshrth jjsy jyajur jayrujjuyrjhry jhyfajyutjhgbng kiuoigoihjk jdgjh ys', 'wgeyhetjrshrth jjsy jyajur jayrujjuyrjhry jhyfajyutjhgbng kiuoigoihjk jdgjh yswgeyhetjrshrth jjsy jyajur jayrujjuyrjhry jhyfajyutjhgbng kiuoigoihjk jdgjh yswgeyhetjrshrth jjsy jyajur jayrujjuyrjhry jhyfajyutjhgbng kiuoigoihjk jdgjh yswgeyhetjrshrth jjsy jyajur jayrujjuyrjhry jhyfajyutjhgbng kiuoigoihjk jdgjh yswgeyhetjrshrth jjsy jyajur jayrujjuyrjhry jhyfajyutjhgbng kiuoigoihjk jdgjh yswgeyhetjrshrth jjsy jyajur jayrujjuyrjhry jhyfajyutjhgbng kiuoigoihjk jdgjh yswgeyhetjrshrth jjsy jyajur jayrujjuyrjhry jhyfajyutjhgbng kiuoigoihjk jdgjh ys', NULL, NULL, NULL, '[\"storage\\/evidences\\/8289889263db4a40463e3f358bb7c7a1.jpg\"]', NULL),
(150, 66, 108, '1', '57', NULL, 25, 'Template two', '2023-09-02 06:33:36', '2023-09-02 06:33:36', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(151, 66, 109, '0', '58', NULL, 25, 'Template two', '2023-09-02 06:33:43', '2023-09-02 06:35:46', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by i<strong>njected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of pass</strong>ages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/36ae77db7915835abc105f631f0391f8.jpg\",\"storage\\/evidences\\/c4ede56bbd98819ae6112b20ac6bf145.webp\",\"storage\\/evidences\\/fd1d83de2517a02d4e221ede9a681432.jpg\"]', NULL),
(152, 67, 98, '1', '57', NULL, 24, 'Template One', '2023-09-10 06:26:37', '2023-09-10 06:26:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(153, 67, 99, '1', '57', NULL, 24, 'Template One', '2023-09-10 06:26:43', '2023-09-10 06:26:43', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(154, 67, 100, '0', '58', NULL, 24, 'Template One', '2023-09-10 06:26:53', '2023-09-10 06:34:28', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cice</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/995665640dc319973d3173a74a03860c.jpg\",\"storage\\/evidences\\/d91caca74114d81fdfc578fca82f8d72.png\",\"storage\\/evidences\\/7993e11204b215b27694b6f139e34ce8.webp\"]', NULL),
(155, 67, 101, '1', '59', NULL, 24, 'Template One', '2023-09-10 06:26:59', '2023-09-10 06:26:59', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(156, 67, 108, '1', '57', NULL, 25, 'Template two', '2023-09-10 06:33:36', '2023-09-10 06:33:36', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(157, 67, 109, '0', '58', NULL, 25, 'Template two', '2023-09-10 06:33:43', '2023-11-07 12:45:59', NULL, 'variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by i<strong>njected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of pass</strong>ages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/36ae77db7915835abc105f631f0391f8.jpg\",\"storage\\/evidences\\/c4ede56bbd98819ae6112b20ac6bf145.webp\",\"storage\\/evidences\\/fd1d83de2517a02d4e221ede9a681432.jpg\"]', NULL),
(158, 68, 98, '1', '57', NULL, 24, 'Template One', '2023-10-10 06:26:37', '2023-10-10 06:26:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(159, 68, 99, '1', '57', NULL, 24, 'Template One', '2023-10-10 06:26:43', '2023-10-10 06:26:43', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(160, 68, 100, '0', '58', NULL, 24, 'Template One', '2023-10-10 06:26:53', '2023-10-10 06:34:28', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cice</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/995665640dc319973d3173a74a03860c.jpg\",\"storage\\/evidences\\/d91caca74114d81fdfc578fca82f8d72.png\",\"storage\\/evidences\\/7993e11204b215b27694b6f139e34ce8.webp\"]', NULL),
(161, 68, 101, '1', '59', NULL, 24, 'Template One', '2023-10-10 06:26:59', '2023-10-10 06:26:59', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(162, 68, 108, '1', '57', NULL, 25, 'Template two', '2023-10-10 06:33:36', '2023-10-10 06:33:36', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(163, 68, 109, '0', '58', NULL, 25, 'Template two', '2023-10-10 06:33:43', '2023-10-10 06:35:46', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by i<strong>njected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of pass</strong>ages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/36ae77db7915835abc105f631f0391f8.jpg\",\"storage\\/evidences\\/c4ede56bbd98819ae6112b20ac6bf145.webp\",\"storage\\/evidences\\/fd1d83de2517a02d4e221ede9a681432.jpg\"]', NULL),
(164, 69, 98, '1', '57', NULL, 24, 'Template One', '2023-12-10 06:26:37', '2023-10-12 06:26:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(165, 69, 99, '1', '57', NULL, 24, 'Template One', '2023-12-10 06:26:43', '2023-12-10 06:26:43', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(166, 69, 100, '0', '58', NULL, 24, 'Template One', '2023-12-10 06:26:53', '2023-12-10 06:34:28', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cice</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/995665640dc319973d3173a74a03860c.jpg\",\"storage\\/evidences\\/d91caca74114d81fdfc578fca82f8d72.png\",\"storage\\/evidences\\/7993e11204b215b27694b6f139e34ce8.webp\"]', NULL),
(167, 69, 101, '1', '59', NULL, 24, 'Template One', '2023-12-10 06:26:59', '2023-12-10 06:26:59', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(168, 69, 108, '1', '57', NULL, 25, 'Template two', '2023-12-10 06:33:36', '2023-12-10 06:33:36', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(169, 69, 109, '0', '58', NULL, 25, 'Template two', '2023-12-10 06:33:43', '2023-12-10 06:35:46', NULL, 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig', '<p><span style=\"color: rgb(22, 145, 121);\">here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by i<strong>njected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of pass</strong>ages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slighere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slig</span></p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/36ae77db7915835abc105f631f0391f8.jpg\",\"storage\\/evidences\\/c4ede56bbd98819ae6112b20ac6bf145.webp\",\"storage\\/evidences\\/fd1d83de2517a02d4e221ede9a681432.jpg\"]', NULL),
(170, 65, 108, '1', '57', NULL, 25, 'Template two', '2023-11-08 12:53:09', '2023-11-08 12:53:09', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(171, 65, 109, '1', '57', NULL, 25, 'Template two', '2023-11-08 12:53:18', '2023-11-08 12:53:18', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(172, 73, 98, '1', '57', NULL, 24, 'Template One', '2023-11-18 07:13:24', '2023-11-18 07:13:24', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(173, 73, 99, '1', '57', NULL, 24, 'Template One', '2023-11-18 16:35:53', '2023-11-18 16:35:53', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(174, 73, 100, '1', '57', NULL, 24, 'Template One', '2023-11-18 16:36:03', '2023-11-18 16:36:03', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(175, 73, 101, '0', '58', NULL, 24, 'Template One', '2023-11-18 16:37:44', '2023-11-18 16:37:44', NULL, 'VUHKGJ,BJ', '<p>NKJGJKH<strong>,JNM</strong></p>', NULL, NULL, NULL, '[]', NULL),
(180, 80, 113, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-29 18:11:16', '2023-11-29 18:11:16', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(181, 80, 112, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-29 18:11:25', '2023-11-29 18:11:25', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(182, 80, 111, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-29 18:11:34', '2023-11-29 18:11:34', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(183, 80, 110, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-29 18:11:42', '2023-11-29 18:11:42', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(184, 80, 114, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-29 18:11:51', '2023-11-29 18:11:51', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(185, 80, 108, '1', '57', NULL, 25, 'Template two', '2023-11-29 18:13:33', '2023-11-29 18:13:33', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(186, 80, 109, '1', '57', NULL, 25, 'Template two', '2023-11-29 18:13:47', '2023-11-29 18:13:47', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(187, 80, 115, '1', '60', NULL, 27, 'Section 1.10.33', '2023-11-29 18:14:01', '2023-11-29 18:14:01', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(188, 80, 116, '1', '60', NULL, 27, 'Section 1.10.33', '2023-11-29 18:14:14', '2023-11-29 18:14:14', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(189, 80, 117, '1', '60', NULL, 27, 'Section 1.10.33', '2023-11-29 18:14:36', '2023-11-29 18:14:36', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(190, 80, 118, '1', '60', NULL, 27, 'Section 1.10.33', '2023-11-29 18:14:47', '2023-11-29 18:14:47', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(191, 81, 115, '1', '60', NULL, 27, 'Section 1.10.33', '2023-11-30 11:17:07', '2023-11-30 11:17:07', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(192, 81, 116, '1', '60', NULL, 27, 'Section 1.10.33', '2023-11-30 11:17:12', '2023-11-30 11:17:12', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(193, 81, 117, '1', '62', NULL, 27, 'Section 1.10.33', '2023-11-30 11:17:35', '2023-11-30 11:17:35', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(194, 81, 118, '0', '61', NULL, 27, 'Section 1.10.33', '2023-11-30 11:17:41', '2023-11-30 11:19:18', NULL, 'greaqhte htrh qrtqh trh fghnhkbo lk hc njtshrts', '<p>rtjyjsytjrys hrtht gnjyjy&nbsp; jytjyt jytj nhgmjh&nbsp; yt j</p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/174f8f613332b27e9e8a5138adb7e920.jpg\"]', NULL),
(195, 82, 110, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-30 11:42:24', '2023-11-30 11:42:24', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(196, 82, 111, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-30 11:42:27', '2023-11-30 11:42:39', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(197, 82, 112, '1', '62', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-30 11:42:46', '2023-11-30 11:42:46', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL);
INSERT INTO `audit_details` (`id`, `audit_id`, `question_id`, `response_score`, `response_id`, `start_time`, `template_id`, `template_name`, `created_at`, `updated_at`, `deleted_at`, `objective_evidences`, `suggestions`, `doc_ref`, `person_responsible`, `timeline`, `evidences`, `report_path`) VALUES
(198, 82, 113, '0', '61', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-30 11:42:58', '2023-11-30 12:21:36', NULL, 'gtahbrthbartrtatra hary', '<p>thbartbtrabtrah htr hrt hrts hrat hhayr hary&nbsp;</p>', NULL, NULL, NULL, '[\"storage\\/evidences\\/f09696910bdd874a99cd74c8f05b5c44.jpg\"]', NULL),
(199, 82, 114, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-11-30 11:43:02', '2023-11-30 11:43:02', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(200, 83, 115, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-06 06:03:37', '2023-12-06 06:03:37', NULL, NULL, NULL, 'VYD23FRVRF', 'Responsible Kumar', '2023-12-10T13:35', '[]', NULL),
(201, 83, 116, '0', '61', NULL, 27, 'Section 1.10.33', '2023-12-06 06:08:54', '2023-12-06 06:08:54', NULL, 'dweha yjiysjhrt jrayyfjf jf xcbdfj kjeohg rejk vbjkdflabvkjb vldrjK GKJDFP;V', '<p><span style=\"color: rgb(22, 145, 121);\">hfuf fui jnbdskpf n huiohfhj hjiofphfn phfi fiophnj iofhhj rgph r uh uh ui hfuf fui jnbdskpf n huiohfhj hjiofphfn phfi fiophnj iofhhj rgph r uh uh ui hfuf fui jnbdskpf n huiohfhj hji<strong>ofphfn phfi fiophnj iofhhj rgph r uh uh ui hfuf fui jnbdskpf n huiohfhj hjiofphfn phfi fiophnj iofhhj rgph r uh uh ui hfuf fui jnbdskpf n huiohfhj hjiofphfn phfi fiophnj iofhhj rgph r uh uh ui hfuf fui jnbdsk</strong>pf n huiohfhj hjiofphfn phfi fiophnj iofhhj rgph r uh uh ui hfuf fui jnbdskpf n huiohfhj hjiofphfn phfi fiophnj iofhhj rgph r uh uh ui hfuf fui jnbdskpf n huiohfhj hjiofphfn phfi fiophnj iofhhj rgph r uh uh ui hfuf fui jnbdskpf n huiohfhj hjiofphfn phfi fiophnj iofhhj rgph r uh uh ui&nbsp;</span></p>', 'CY8TBVT3YBVT87YB5V', 'Kumar Responsible', '2023-12-14T14:41', '[\"storage\\/evidences\\/7d2b92b6726c241134dae6cd3fb8c182.jpg\"]', NULL),
(202, 83, 117, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-08 07:00:07', '2023-12-08 07:00:07', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(203, 83, 118, '1', '62', NULL, 27, 'Section 1.10.33', '2023-12-08 07:00:36', '2023-12-08 07:00:36', NULL, NULL, NULL, 'GFDE2TFR72F2F', 'Avinash Kumar', '2023-12-20T12:30', '[]', NULL),
(204, 84, 125, NULL, NULL, NULL, 24, 'Template One', '2023-12-09 16:17:51', '2023-12-09 16:17:51', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(205, 84, 98, '1', '57', NULL, 24, 'Template One', '2023-12-09 16:17:59', '2023-12-09 16:17:59', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(206, 84, 99, '1', '57', NULL, 24, 'Template One', '2023-12-09 16:18:08', '2023-12-09 16:18:08', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(207, 84, 100, '1', '57', NULL, 24, 'Template One', '2023-12-09 16:18:15', '2023-12-09 16:18:15', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(208, 84, 101, '1', '57', NULL, 24, 'Template One', '2023-12-09 16:18:25', '2023-12-09 16:18:25', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(209, 84, 126, '4', '66', NULL, 24, 'Template One', '2023-12-09 16:18:48', '2023-12-09 16:18:48', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(210, 84, 127, '4', '66', NULL, 24, 'Template One', '2023-12-09 16:18:58', '2023-12-09 16:18:58', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(211, 70, 110, '0', '61', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:45:01', '2025-01-25 12:34:06', NULL, 'ymj', '<p>ynty</p>', 'jnythty', '5rj5rh5rh', '2025-01-24T18:04', '[\"storage\\/evidences\\/18de4beb01f6a17b6e1dfb9813ba6045.jpg\"]', NULL),
(212, 70, 111, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:45:11', '2023-12-19 13:45:11', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(213, 70, 112, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:45:20', '2023-12-19 13:45:20', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(214, 70, 113, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:45:30', '2023-12-19 13:45:30', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(215, 70, 114, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:45:39', '2023-12-19 13:45:39', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(216, 70, 115, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:45:49', '2023-12-19 13:45:49', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(217, 70, 116, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:45:59', '2023-12-19 13:46:11', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(218, 70, 117, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:46:22', '2023-12-19 13:46:22', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(219, 70, 118, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:46:33', '2023-12-19 13:46:33', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(220, 71, 110, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:50:05', '2023-12-19 13:50:05', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(221, 71, 111, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:50:11', '2023-12-19 13:50:19', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(222, 71, 112, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:50:27', '2023-12-19 13:50:27', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(223, 71, 113, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:50:35', '2023-12-19 13:50:35', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(224, 71, 114, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:50:43', '2023-12-19 13:50:43', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(225, 71, 115, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:50:52', '2023-12-19 13:50:52', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(226, 71, 116, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:51:02', '2023-12-19 13:51:02', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(227, 71, 117, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:51:13', '2023-12-19 13:51:13', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(228, 71, 118, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:51:25', '2023-12-19 13:51:25', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(229, 72, 110, '1', '62', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:52:15', '2023-12-20 11:04:11', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(230, 72, 111, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:52:34', '2023-12-19 13:52:34', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(231, 72, 112, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:52:42', '2023-12-19 13:52:42', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(232, 72, 113, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:52:50', '2023-12-19 13:52:50', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(233, 72, 114, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 13:52:57', '2023-12-19 13:52:57', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(234, 72, 115, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:53:12', '2023-12-19 13:53:12', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(235, 72, 116, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:53:32', '2023-12-19 13:53:32', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(236, 72, 117, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:53:41', '2023-12-19 13:53:41', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(237, 72, 118, '1', '60', NULL, 27, 'Section 1.10.33', '2023-12-19 13:53:52', '2023-12-19 13:53:52', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(238, 85, 98, '1', '57', NULL, 24, 'Template One', '2023-12-19 14:23:38', '2023-12-19 14:23:38', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(239, 85, 99, '1', '57', NULL, 24, 'Template One', '2023-12-19 14:23:46', '2023-12-19 14:23:46', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(240, 85, 100, '1', '57', NULL, 24, 'Template One', '2023-12-19 14:23:53', '2023-12-19 14:23:53', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(241, 85, 101, '1', '57', NULL, 24, 'Template One', '2023-12-19 14:24:03', '2023-12-19 14:24:03', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(242, 85, 108, '1', '57', NULL, 25, 'Template two', '2023-12-19 14:24:11', '2023-12-19 14:24:11', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(243, 85, 109, '1', '57', NULL, 25, 'Template two', '2023-12-19 14:24:22', '2023-12-19 14:24:22', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(244, 85, 110, '0', '61', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 14:24:29', '2023-12-19 14:29:04', NULL, 'gaps on the conveyor belt with high pressure steam', '<p>VHJJHMUUGJ&nbsp;</p>', 'FSMS-06', 'PRASAD', '2023-12-19T19:57', '[\"storage\\/evidences\\/e1e1f667ce4596e5644be6fab627c226.jpg\"]', NULL),
(245, 85, 111, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 14:24:37', '2023-12-19 14:24:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(246, 85, 112, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 14:24:46', '2023-12-19 14:24:46', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(247, 85, 113, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 14:24:55', '2023-12-19 14:24:55', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(248, 85, 114, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2023-12-19 14:25:04', '2023-12-19 14:25:04', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(249, 86, 98, '1', '57', NULL, 24, 'Template One', '2023-12-20 04:56:58', '2023-12-20 04:56:58', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(250, 86, 99, '1', '57', NULL, 24, 'Template One', '2023-12-20 04:57:02', '2023-12-20 04:58:41', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(251, 86, 100, '1', '57', NULL, 24, 'Template One', '2023-12-20 04:59:06', '2023-12-20 04:59:06', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(252, 86, 101, '1', '57', NULL, 24, 'Template One', '2023-12-20 05:09:30', '2023-12-20 05:09:30', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(253, 87, 98, '0', '58', NULL, 24, 'Template One', '2023-12-20 07:28:58', '2023-12-20 07:28:58', NULL, 'gaps on the conveyor belt with high pressure steam', '<p>fhmjk,hoijlkl,niuc ghbjk,jokplmkj ghb&nbsp;</p>', 'FSMS-07', 'ravinder', '2023-12-20T12:58', '[\"storage\\/evidences\\/65a99bb7a3115fdede20da98b08a370f.jpeg\"]', NULL),
(254, 87, 99, '1', '57', NULL, 24, 'Template One', '2023-12-20 07:29:06', '2023-12-20 07:29:06', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(255, 87, 100, '0', '58', NULL, 24, 'Template One', '2023-12-20 07:29:46', '2023-12-20 07:29:46', NULL, 'gaps on the conveyor belt with high pressure steam', '<p>m,hguykjbjh9puioh uij&nbsp;</p>', 'FSMS-05', 'PRASAD', '2023-12-20T12:59', '[\"storage\\/evidences\\/f5f96025b4aa949ad6d1b20e207c66c9.jpeg\"]', NULL),
(256, 87, 101, '0', '58', NULL, 24, 'Template One', '2023-12-20 07:30:26', '2023-12-20 07:30:26', NULL, 'fjekbfjkbq', '<p>m,bjhfygkhjvkgm</p>', 'FSMS-07', 'PRASAD', '2023-12-20T13:00', '[\"storage\\/evidences\\/b49fdab097253cac48e3dc628a49da5e.jpeg\"]', NULL),
(257, 87, 108, '1', '57', NULL, 25, 'Template two', '2023-12-20 07:30:37', '2023-12-20 07:30:37', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(258, 87, 109, '1', '57', NULL, 25, 'Template two', '2023-12-20 07:30:46', '2023-12-20 07:30:46', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(259, 88, 110, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:12:20', '2024-01-03 11:12:20', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(260, 88, 111, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:12:27', '2024-01-03 11:12:27', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(261, 88, 112, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:12:35', '2024-01-03 11:12:35', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(262, 88, 113, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:12:44', '2024-01-03 11:12:44', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(263, 88, 114, '0', '61', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:13:20', '2024-01-03 11:13:20', NULL, 'fjekbfjkbq', '<p>kaigeohajvkdniofeiafjjdnc</p>', 'FSMS-06', 'klhafasnfjkdsanfjk', '2024-01-03T16:43', '[]', NULL),
(264, 88, 115, '1', '62', NULL, 27, 'Section 1.10.33', '2024-01-03 11:13:33', '2024-01-03 11:13:33', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(265, 88, 116, '1', '60', NULL, 27, 'Section 1.10.33', '2024-01-03 11:13:44', '2024-01-03 11:13:44', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(266, 88, 117, '1', '60', NULL, 27, 'Section 1.10.33', '2024-01-03 11:13:55', '2024-01-03 11:13:55', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(267, 88, 118, '0', '61', NULL, 27, 'Section 1.10.33', '2024-01-03 11:14:52', '2024-01-03 11:14:52', NULL, 'hilhfailhfkjfa,', '<p>oywriehafjkhdiafhiensa</p>', 'FSMS-09', 'a;hiealfk.ndasm', '2024-01-03T16:44', '[\"storage\\/evidences\\/aa108f56a10e75c1f20f27723ecac85f.png\"]', NULL),
(268, 89, 110, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:20:44', '2024-01-03 11:20:44', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(269, 89, 111, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:20:58', '2024-01-03 11:20:58', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(270, 89, 112, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:21:06', '2024-01-03 11:21:06', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(271, 89, 113, '0', '61', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:21:48', '2024-01-03 11:21:48', NULL, 'LAILEALJFLKEHA8Fhlfjkec', '<p>jfklsnfjknejafjkldanfkcmndz</p>', 'DNVG-8', 'hfilhadslias', '2024-01-03T16:51', '[\"storage\\/evidences\\/e721a54a8cf18c8543d44782d9ef681f.png\"]', NULL),
(272, 89, 114, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2024-01-03 11:21:57', '2024-01-03 11:21:57', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(273, 89, 115, '1', '60', NULL, 27, 'Section 1.10.33', '2024-01-03 11:22:04', '2024-01-03 11:22:04', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(274, 89, 116, '1', '60', NULL, 27, 'Section 1.10.33', '2024-01-03 11:22:17', '2024-01-03 11:22:17', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(275, 89, 117, '1', '60', NULL, 27, 'Section 1.10.33', '2024-01-03 11:22:27', '2024-01-03 11:22:27', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(276, 89, 118, '0', '61', NULL, 27, 'Section 1.10.33', '2024-01-03 11:23:21', '2024-01-03 11:23:21', NULL, 'khfjkhjkhjskh<C', '<p>hLfjkbJC&lt;jN&lt;C</p>', 'hfhjfjksj', 'kcHChshjkh', '2024-01-03T16:53', '[\"storage\\/evidences\\/30dd22174d06b0cd2e50c352a8a8a49e.png\"]', NULL),
(277, 90, 98, '1', '57', NULL, 24, 'Template One', '2025-01-15 12:07:39', '2025-01-15 12:07:39', NULL, 'dwgwgwgw', '<p>wfwfwfwf</p>', 'wefwefwe', 'wverrverrv', '2025-01-17T21:42', '[\"storage\\/evidences\\/9808ae38758804501ca3fc0697050e03.jpg\"]', NULL),
(278, 90, 99, '0', '58', NULL, 24, 'Template One', '2025-01-15 12:09:25', '2025-01-17 08:06:05', NULL, 'vcsdvsd', '<p>sfsdfsdfsd</p>', 'gergerg', 'wrgewrger', '2025-01-15T20:42', '[\"storage\\/evidences\\/995665640dc319973d3173a74a03860c.jpg\"]', NULL),
(279, 90, 100, '1', '57', NULL, 24, 'Template One', '2025-01-15 12:09:48', '2025-01-15 12:09:48', NULL, 'rgereger', '<p>egferger</p>', 'ergerger', 'jyuu', '2025-01-16T21:43', '[\"storage\\/evidences\\/c2839bed26321da8b466c80a032e4714.jpg\"]', NULL),
(280, 90, 101, '1', '57', NULL, 24, 'Template One', '2025-01-15 12:10:10', '2025-01-15 12:10:10', NULL, 'dfbytjytj', '<p>dth5ku</p>', 'dfbrynjty', 'fbgteh', '2025-01-15T22:45', '[\"storage\\/evidences\\/582967e09f1b30ca2539968da0a174fa.jpg\"]', NULL),
(281, 90, 109, '1', '57', NULL, 25, 'Template two', '2025-01-16 07:16:58', '2025-01-16 07:16:58', NULL, 'fbrethe', 'ergegergeg', 'dfbdb', 'sfvetrhrth', '2025-01-16T16:50', '[\"storage\\/evidences\\/8710ef761bbb29a6f9d12e4ef8e4379c.webp\"]', NULL),
(282, 90, 108, '1', '57', NULL, 25, 'Template two', '2025-01-16 07:17:27', '2025-01-16 07:17:27', NULL, 'fgrteb', 'ebetbreb', 'etbryjtj', '4h5yhyh', '2025-01-16T17:52', '[\"storage\\/evidences\\/9fdb62f932adf55af2c0e09e55861964.jpg\"]', NULL),
(283, 91, 98, '0', '58', NULL, 24, 'Template One', '2025-01-16 10:09:17', '2025-01-16 10:09:17', NULL, 'sfbrfntnty', '<p>brnbrnt</p>', 'ethukiuolo', 'ethjk', '2025-01-16T15:39', '[\"storage\\/evidences\\/f15eda31a2da646eea513b0f81a5414d.jpg\",\"storage\\/evidences\\/08048a9c5630ccb67789a198f35d30ec.webp\"]', NULL),
(284, 91, 99, '1', '57', NULL, 24, 'Template One', '2025-01-16 10:10:30', '2025-01-16 10:10:30', NULL, 'lkmunjhvfctuk mjk', '<p>hjmymnryjnryjnry</p>', 'jihbgvfc', 'yn4tbetr', '2025-01-17T15:40', '[\"storage\\/evidences\\/fcdf25d6e191893e705819b177cddea0.png\",\"storage\\/evidences\\/24ec8468b67314c2013d215b77034476.png\",\"storage\\/evidences\\/243f6a5292350cc163601aac9ad3e854.png\"]', NULL),
(285, 91, 100, '1', '59', NULL, 24, 'Template One', '2025-01-16 10:11:41', '2025-01-16 10:11:41', NULL, 'rymtjn5yhyr', '<p>etbryj64kj46j</p>', 'thyjuik', 'm46n46yy5n6b', '2025-01-16T15:41', '[\"storage\\/evidences\\/c28e5b0c9841b5ef396f9f519bf6c217.jpg\",\"storage\\/evidences\\/b0b07fecb2354efcdfc9671484b6eaa9.jpg\",\"storage\\/evidences\\/445e24b5f22cacb9d51a837c10e91a3f.jpeg\",\"storage\\/evidences\\/70d85f35a1fdc0ab701ff78779306407.webp\",\"storage\\/evidences\\/feade1d2047977cd0cefdafc40175a99.jpg\"]', NULL),
(286, 91, 101, '1', '57', NULL, 24, 'Template One', '2025-01-16 10:12:51', '2025-01-16 10:12:51', NULL, 'egh5j6u4', 'h65h56h5h', 'rhyjui7k', 'umnhbg', '2025-01-16T15:42', '[\"storage\\/evidences\\/b742027da6f65c2b92a85d76e41464e4.png\"]', NULL),
(287, 92, 110, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2025-01-17 10:05:24', '2025-01-17 10:10:08', NULL, 'sfvbrmy', '<p>brbert</p>', NULL, NULL, NULL, '[]', NULL),
(288, 92, 111, '0', '61', NULL, 26, 'Section 1.10.32 Hygiene', '2025-01-17 10:06:13', '2025-01-17 10:10:20', NULL, 'ynry4yujnuy', '<p>55j53h</p>', NULL, NULL, NULL, '[]', NULL),
(289, 92, 112, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2025-01-17 10:08:05', '2025-01-17 10:10:33', NULL, 'tyhtyhtgh', '<p>5jh6tjt6hu76t</p>', NULL, NULL, NULL, '[]', NULL),
(290, 92, 113, '0', '61', NULL, 26, 'Section 1.10.32 Hygiene', '2025-01-17 10:08:12', '2025-01-17 10:10:42', NULL, 'tynhjytgr', '<p>het5hgetg6y4</p>', NULL, NULL, NULL, '[]', NULL),
(291, 92, 114, '1', '60', NULL, 26, 'Section 1.10.32 Hygiene', '2025-01-17 10:08:18', '2025-01-17 10:10:53', NULL, 'mnhtbgrtfve', 'yrmbg', NULL, NULL, NULL, '[]', NULL),
(292, 93, 98, '1', '57', NULL, 24, 'Template One', '2025-02-15 12:35:25', '2025-02-15 12:35:25', NULL, 'qwerty', '<p>IEHVHE NEIVK</p>', 'qwerty', 'qwerty', '2025-02-15T18:05', '[\"storage\\/evidences\\/b05851605ad0a7613af514cd321a63e3.jpg\"]', NULL),
(293, 93, 99, '1', '57', NULL, 24, 'Template One', '2025-02-15 12:35:49', '2025-02-15 12:35:49', NULL, 'dggb', '<p>eetber</p>', 'rbgds', 'rgbwgb', '2025-02-15T20:05', '[\"storage\\/evidences\\/503e7dbbd6217b9a591f3322f39b5a6c.png\"]', NULL),
(294, 93, 100, '1', '57', NULL, 24, 'Template One', '2025-02-15 12:36:14', '2025-02-15 12:36:14', NULL, 'rnwbt', '<p>twetbhe</p>', 'rwujntey55', '5yh35yh', '2025-02-15T21:06', '[\"storage\\/evidences\\/ced556cd9f9c0c8315cfbe0744a3baf0.jpg\"]', NULL),
(295, 93, 101, '0', '58', NULL, 24, 'Template One', '2025-02-15 12:36:44', '2025-02-15 12:36:44', NULL, 'yrntn', '<table style=\"border-collapse: collapse; width: 99.9741%; height: 95.2px;\" border=\"1\"><colgroup><col style=\"width: 49.9353%;\"><col style=\"width: 49.9353%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 47.6px;\">\r\n<td style=\"height: 47.6px;\">rrrthwr</td>\r\n<td style=\"height: 47.6px;\">wrhwrb</td>\r\n</tr>\r\n<tr style=\"height: 47.6px;\">\r\n<td style=\"height: 47.6px;\">wbeew</td>\r\n<td style=\"height: 47.6px;\">rthw</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'tyer', 'tnte', '2025-02-15T19:06', '[\"storage\\/evidences\\/8d8f733a7c2a2ea60df6439a28a2b9a3.png\"]', NULL),
(296, 93, 108, '1', '57', NULL, 25, 'Template two', '2025-02-15 12:37:07', '2025-02-15 12:42:41', NULL, NULL, NULL, NULL, NULL, NULL, '[\"storage\\/evidences\\/894b77f805bd94d292574c38c5d628d5.jpg\",\"storage\\/evidences\\/cd3bbc2d7ca1bbdc055acf58609e6c24.jpg\",\"storage\\/evidences\\/62da8c91ce7b10846231921795d6059e.jpg\",\"storage\\/evidences\\/a19883fca95d0e5ec7ee6c94c6c32028.png\"]', NULL),
(297, 93, 109, '0', '58', NULL, 25, 'Template two', '2025-02-15 12:37:29', '2025-02-15 12:37:29', NULL, 'jyutbtr', '<p>wrnrnrw</p>', 'tnetnber', 'drgbnwrt', '2025-02-14T21:07', '[\"storage\\/evidences\\/6b5754d737784b51ec5075c0dc437bf0.jpg\"]', NULL),
(298, 94, 108, '1', '57', NULL, 25, 'Template two', '2025-02-15 12:44:18', '2025-02-15 12:44:18', NULL, 'rynbhrg', '<p>rbrwnbwtr</p>', 'fgbfg', 'rgqegeqg', '2025-02-15T18:14', '[\"storage\\/evidences\\/46f76a4bda9a9579eab38a8f6eabcda1.jpg\",\"storage\\/evidences\\/e6c2dc3dee4a51dcec3a876aa2339a78.jpg\",\"storage\\/evidences\\/a7c9585703d275249f30a088cebba0ad.png\"]', NULL),
(299, 94, 109, '1', '57', NULL, 25, 'Template two', '2025-02-15 12:44:46', '2025-02-15 12:44:46', NULL, 'rtnrnn', '<p>rgnfgnsf</p>', 'fgndfgn', 'fgndfgn', '2025-02-15T18:14', '[\"storage\\/evidences\\/a0046ad4c1bafc4ef04e41e755f28368.jpg\"]', NULL),
(300, 94, 98, '0', '58', NULL, 24, 'Template One', '2025-02-15 12:45:04', '2025-02-15 12:45:04', NULL, 'rtnrtntrn', '<p>rnrnrn</p>', 'rtnern', 'rnrentr', '2025-02-15T18:15', '[\"storage\\/evidences\\/81e3225c6ad49623167a4309eb4b2e75.jpg\"]', NULL),
(301, 94, 99, '1', '57', NULL, 24, 'Template One', '2025-02-15 12:45:23', '2025-02-15 12:45:23', NULL, 'rtnertntn', '<p>fnfggnghm</p>', 'etyjetyj', 'rtertyr', '2025-02-15T19:15', '[\"storage\\/evidences\\/cff02a74da64d145a4aed3a577a106ab.jpg\",\"storage\\/evidences\\/ab013ca67cf2d50796b0c11d1b8bc95d.jpg\",\"storage\\/evidences\\/fcfe9c770eb9372e6961a17f7eaffd5f.png\"]', NULL),
(302, 94, 100, '0', '58', NULL, 24, 'Template One', '2025-02-15 12:45:49', '2025-02-15 12:45:49', NULL, 'rtjrejter', '<p>erjrjjher</p>', 'rejrj', 'rhdf', '2025-02-15T18:15', '[\"storage\\/evidences\\/7fb8ceb3bd59c7956b1df66729296a4c.jpg\"]', NULL),
(303, 94, 101, '1', '57', NULL, 24, 'Template One', '2025-02-15 12:46:06', '2025-02-15 12:46:06', NULL, 'yjertjj', '<p>gfhdfgh</p>', 'rthreth', 'fdghdfh', '2025-02-15T19:17', '[]', NULL),
(304, 95, 522, '2', '68', NULL, 39, 'dummy test 1', '2025-02-15 13:37:22', '2025-02-15 13:37:22', NULL, 'MNJJH', '<p>RGJEIGJE GIQERGNQ3JG Q3GKOQ3 GJ35NGKG</p>', 'JKSOAIRJG GQOIRGKOQ3RNG', 'IPSHGUIENV OIERJGJER', '2025-02-15T19:07', '[\"storage\\/evidences\\/a3a8381281635a1926bd3ea09f29f4d9.jpg\"]', NULL),
(305, 95, 524, '0', '67', NULL, 39, 'dummy test 1', '2025-02-15 13:37:52', '2025-02-15 13:37:52', NULL, 'KJKV JSKVKSVN', 'IKJWVJ WJEKFQE FOWEFME W', 'LKOWEGF WMGKWGWNKV', 'IWJGOINWF NWOFJWEF', '2025-02-15T19:07', '[\"storage\\/evidences\\/dc2885225cbcb517bfea1ae528f56428.jpg\"]', NULL),
(306, 96, 98, '1', '57', NULL, 24, 'Template One', '2025-02-15 13:54:15', '2025-02-15 13:54:15', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(307, 96, 99, '1', '57', NULL, 24, 'Template One', '2025-02-15 13:54:21', '2025-02-15 13:54:21', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(308, 96, 100, '0', '58', NULL, 24, 'Template One', '2025-02-15 13:54:26', '2025-02-15 13:54:26', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL),
(309, 96, 101, '0', '58', NULL, 24, 'Template One', '2025-02-15 13:54:32', '2025-02-15 13:54:32', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `designation` text NOT NULL,
  `organisation_name` text NOT NULL,
  `organisation_location` text DEFAULT NULL,
  `fssai_no` text DEFAULT NULL,
  `pincode` text NOT NULL,
  `company_emailid` text NOT NULL,
  `company_website` text NOT NULL,
  `comp_cont_no` text NOT NULL,
  `comp_partners` text DEFAULT NULL,
  `comp_part_email` text DEFAULT NULL,
  `no_audit_conduct` text DEFAULT NULL,
  `no_trainings_conduct` text DEFAULT NULL,
  `no_samples_collect` text DEFAULT NULL,
  `contract_amount` text DEFAULT NULL,
  `client_logo` text DEFAULT NULL,
  `client_signature` text DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `doc_ref` varchar(100) DEFAULT NULL,
  `food_mobile` varchar(100) DEFAULT NULL,
  `food_email` varchar(100) DEFAULT NULL,
  `director_mobile` varchar(100) DEFAULT NULL,
  `director_email` varchar(100) DEFAULT NULL,
  `personal_responsible` varchar(100) DEFAULT NULL,
  `fstl` varchar(100) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'delete = 0, active = 1, inactive = 2',
  `signature` varchar(300) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 8
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `fname`, `lname`, `designation`, `organisation_name`, `organisation_location`, `fssai_no`, `pincode`, `company_emailid`, `company_website`, `comp_cont_no`, `comp_partners`, `comp_part_email`, `no_audit_conduct`, `no_trainings_conduct`, `no_samples_collect`, `contract_amount`, `client_logo`, `client_signature`, `director`, `doc_ref`, `food_mobile`, `food_email`, `director_mobile`, `director_email`, `personal_responsible`, `fstl`, `client_id`, `status`, `signature`, `password`, `created_at`, `updated_at`, `deleted_at`, `role`) VALUES
(37, 'Mr', 'MURLI', 'KUMAR', 'CANTEEN INCHARGE', 'QUEENS NRI HOSPITAL', 'Queen\'s NRI Hospital,D.No, 50-53-14, Gurudwara Rd, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India', NULL, '122001', 'sandeep.meh28@gmail.com', 'www.queensnri.com', '7017781221', NULL, NULL, '12', '3', '3', '15000', '20230909052608toyota-logo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'QDCB1694237168', 1, NULL, '$2y$10$VDKEw5CbKJlYh/YV7Qkg..fxASjajZ6OAujIFWTWYzFhq5QxOEInK', '2023-09-08 23:56:09', '2023-10-27 09:37:48', '2023-10-27 09:37:48', 8),
(38, 'Mr', 'Vishal', 'Yadav', 'Sr. Manager', 'NIIT', 'Gurgaon', 'XDFDGF23CG43F2GH4', '122001', 'smsunnythefunny@gmail.com', 'www.company.com', '8989898989', 'Deepak, Dipak', 'deepak@gmail.com, dipak@gmail.com', '10', '2', '2', '10000', '20231027202306boy2.png', NULL, 'Nisha', 'GEYUG235HG34H5', '8956895689', 'sachin@gmail.com', '2323232323', 'nisah@gmil.com', 'Rahul Yadav', 'Sachin', 'FE6H1698418386', 1, NULL, '$2y$10$1RI/affu7bu2wdcd.cEuKeiGWL8C3h9A9rOcNWKeuQDPNzxZlX8rG', '2023-10-27 14:53:06', '2023-12-01 12:56:19', NULL, 8),
(39, 'Mr', 'Varun', 'Kumar', 'Senior Manager', 'Bishop Hotel', 'Gurgaon', 'DEWF3454TGTW45YG', '122001', 'bishop@gmail.com', 'www.bishop.com', '5656464656', NULL, NULL, '2', '2', '2', '15000', '20231030121805facebook-logo.png', NULL, 'Director Yadav', 'DWEQE32R34', '5646562313', 'fstl@gmail.com', '8956235656', 'director@gmail.com', 'Herbinder Kumar', 'FSTL Kumar', 'RICY1698648485', 1, NULL, '$2y$10$4rdhpCU5QiYU54BJr1UXzOnRKGfmnpVUFtOS0qKDCjP2k9VRl7PB.', '2023-10-30 06:48:05', '2023-10-30 06:48:05', NULL, 8),
(40, 'Mr', 'RAHUL', 'KUMAR', 'GM', 'RAHUL ENTERPRISES', 'VIZAG', '1011200101001', '530002', 'RAHULKUMAR@ENTERPRISES.COM', 'ENT', '8919191919', NULL, NULL, '2', '4', '2', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2IK81698649039', 1, NULL, '$2y$10$iFEDjoyCLKKLwy8JAaZ.QOnndr36NCsuqqzavsySEK49UtHyMpd2e', '2023-10-30 06:57:19', '2023-10-30 07:46:30', NULL, 8),
(41, 'Mr', 'Ravinder', 'Kumar', 'National Professor Officer', 'WHO', 'United Nations', '234TGTHBSR5646UJYHFG', '122002', 'smsunnythefunny@gmail.com', 'www.who.com', '8923568923', NULL, NULL, '6', '1', '1', '25000', '20231108185136mcdonalds-logo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EWO51699449696', 1, NULL, '$2y$10$9fdxeEmevGsT3db6/4.zZu/t6Bkw2TZmjyLdZqLgD0s5hqKocQzD2', '2023-11-08 13:21:39', '2023-11-08 13:23:05', '2023-11-08 13:23:05', 8),
(42, 'Mr', 'Ravinder', 'Kumar', 'National Professor Officer', 'WHO', 'United Nations', '234TGTHBSR5646UJYHFG', '122002', 'smsunnythefunny@gmail.com', 'www.who.com', '8923568923', NULL, NULL, '6', '1', '1', '25000', '20231108185257mcdonalds-logo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R9PX1699449776', 1, NULL, '$2y$10$SREFvbUH23bKl58lcSZ1tu/0K8nuiybvdbYNgDZLw85EM0CE/jXtO', '2023-11-08 13:22:57', '2023-11-08 13:22:57', NULL, 8),
(43, 'Mr', 'GJHJBJMN', 'Ch ikkk', 'Fikkiybm', 'St ji kkn mm ll', 'Fghjuik', '122333344888', '5376789', 'sheela@certigoqas.com', 'Jjjtgjkklllk.com', '122387383893', 'Fsjjeukmk', 'Sgdhirm', '4', '2', '20', '12000', NULL, NULL, 'Dndjdndns', NULL, '12345467890', 'shelemdj@gmail.com', '1213454876779', 'endkdle@gmail.com', NULL, 'Sbdjdjkd', 'FS631700291464', 1, NULL, '$2y$10$u.8Mx.zspL1/0FujtpGoVOvcPq44wpEG1raqwm0nSEWQmrWzl3kxS', '2023-11-18 07:11:04', '2023-12-19 07:22:29', '2023-12-19 07:22:29', 8),
(44, 'Mrs', 'DIVYA', 'MEDAR', 'GM', 'VISHAL FOODS', 'TRIVENDRUM', '1011200101003', '682002', 'gm@vishalfoods.com', 'www.vishalfoods.com', '123456789', 'kavitha', 'Kavitha@vishalfoods.com', '3', '1', '10', '35000', '20231129180421IMG_20230702_111134 NC-M1-09.jpg', NULL, 'Sharma', NULL, '123456789', 'Kavitha@vishalfoods.com', '123456789', 'sharma@vishalfoods.com', NULL, 'Kavitha', '14TH1701261261', 1, NULL, '$2y$10$xHdiMshYzP5nP3u41kzZL.suL4bPiSC9KnCvXESb4bUEUwND6UrOG', '2023-11-29 12:34:21', '2023-12-12 13:27:01', '2023-12-12 13:27:01', 8),
(45, 'Mr', 'RAKESH', 'ANAND', 'GM', 'KALPAK', 'GOA', '1920292I02919', '456001', 'G@kalpak.com', 'www.kalpak.com', '1234567891', 'G Meera', 'Meera@kalpak.com', '1', '1', '0', '12000', '20240103163946Logo_ background Vertical _PNG.png', NULL, 'Hassan', NULL, '1234567891', 'S@kalpak.com', '6074937006', 'H@kalpak.com', NULL, 'Sabitha K', 'AYCP1704280186', 1, NULL, '$2y$10$TS5C0mQ6.xnPgI5xWXK4C.0BmpYILpyGyQmWbgb5dBl6mMQzMoKbu', '2024-01-03 11:09:46', '2024-01-03 11:09:46', NULL, 8),
(46, 'Mr', 'RAKESH', 'ANAND', 'GM', 'KALPAK', 'GOA', '1920292I02919', '456001', 'G@kalpak.com', 'www.kalpak.com', '1234567891', 'G Meera', 'Meera@kalpak.com', '1', '1', '0', '12000', '20240103163946Logo_ background Vertical _PNG.png', NULL, 'Hassan', NULL, '1234567891', 'S@kalpak.com', '6074937006', 'H@kalpak.com', NULL, 'Sabitha K', 'U2PW1704280186', 1, NULL, '$2y$10$U5fwzwTfPfukuJAg9Pi5Ye/Ai5typWM3ushj.4hGWJxUEsCcLvzmC', '2024-01-03 11:09:46', '2024-01-03 11:09:46', NULL, 8),
(47, 'Mr', 'RAKESH', 'ANAND', 'GM', 'KALPAK', 'GOA', '1920292I02919', '456001', 'G@kalpak.com', 'www.kalpak.com', '1234567891', 'G Meera', 'Meera@kalpak.com', '5', '1', '0', '12000', '20240103163947Logo_ background Vertical _PNG.png', NULL, 'Hassan', NULL, '1234567891', 'S@kalpak.com', '6074937006', 'H@kalpak.com', NULL, 'Sabitha K', '1L901704280186', 1, NULL, '$2y$10$VeEj0GcGLbu9mwcY8oohTuIWUoUOj7eUcJPz2YIVsk9rI5L8gskta', '2024-01-03 11:09:47', '2025-01-14 09:24:24', NULL, 8),
(48, 'Mr', 'Aniket', 'Rathaur', 'Developer', 'Techninza', 'Gurugram, Haryana, India', '123456789', '110076', 'aniketniet@gmail.com', 'techninza.in', '6393141893', 'Aniket', 'jsaniket0@gmail.com', '5', '5', '5', '10000', '20250115172515demoimage.png', NULL, 'Ravi', NULL, '9876543219', 'rathaur@gmail.com', '6362669310', 'ravipoddar0187@gmail.com', NULL, 'Rathod', '0BDT1736942115', 1, 'images/6793420ee066b_6afbc9cc.jpg', '$2y$10$gfGc4Te/lacjYnxwJ3HN1.dvSOOzwsc5NqZdfk5Svpmo.ZWmMrdku', '2025-01-15 11:55:15', '2025-01-24 07:32:30', NULL, 8),
(49, 'Mr', 'Test 1', 'Test 2', 'Dev', 'xyz', 'Gurugram, Haryana, India', '123456789', '110076', 'test1@gmail.com', 'test.com', '63931412586', NULL, NULL, '4', '3', '4', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '59271737030710', 1, NULL, '$2y$10$VktW4VKiygAsgdjOTiyWfOcFsFflm7WrQLZP3BJzufMQkHtDZtxsy', '2025-01-16 12:31:50', '2025-01-16 12:31:50', NULL, 8),
(50, 'Mr', 'Dummy', 'Dummy', 'DEV', 'techninza', 'Gurugram, Haryana, India', '12345678', '121212', 'tech@gmail.com', 'techninza.in', '6393141852', NULL, NULL, '2', '2', '2', '1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ZB3U1739622709', 1, 'images/67b08f9ab484b_dummy (1) (1).png', '$2y$10$cg4ptJZ48eEIltJ92jIng.jcKpvODquajziqPuwu7ElXoY5nYujK6', '2025-02-15 12:31:49', '2025-02-15 12:59:06', NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `completed_reports`
--

CREATE TABLE `completed_reports` (
  `id` int(11) NOT NULL,
  `audit_id` varchar(255) DEFAULT NULL,
  `audit_index` varchar(255) DEFAULT NULL,
  `report` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consolidated_reports`
--

CREATE TABLE `consolidated_reports` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `audit_ids` text NOT NULL,
  `quarter` int(11) NOT NULL COMMENT '1(jan,feb,mar),2(apr, may,jun), 3(jul,aug,sep),4(oct,nov,dec)',
  `file` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consolidated_reports`
--

INSERT INTO `consolidated_reports` (`id`, `title`, `client_id`, `audit_ids`, `quarter`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(133, 'Consolidated Report for quarter - 4', 38, '68,63,65,69', 4, NULL, '2023-11-27 11:26:00', '2023-11-27 11:26:00', NULL),
(134, 'Consolidated Report for quarter - 4', 40, '', 4, NULL, '2023-12-19 13:28:33', '2023-12-19 13:28:33', NULL),
(135, 'Consolidated Report for quarter - 4', 39, '59', 4, NULL, '2023-12-19 13:29:23', '2023-12-19 13:29:23', NULL),
(136, 'Consolidated Report for quarter - 4', 42, '71,70,72', 4, NULL, '2023-12-20 07:13:36', '2023-12-20 07:13:36', NULL),
(137, 'Consolidated Report for quarter - 1', 47, '88,89', 1, NULL, '2024-01-17 17:34:09', '2024-01-17 17:34:09', NULL),
(138, 'Consolidated Report for quarter - 1', 45, '', 1, NULL, '2025-01-13 17:30:07', '2025-01-13 17:30:07', NULL),
(139, 'Consolidated Report for quarter - 1', 48, '90', 1, NULL, '2025-01-16 09:25:10', '2025-01-16 09:25:10', NULL),
(140, 'Consolidated Report for quarter - 1', 49, '', 1, NULL, '2025-02-07 12:48:47', '2025-02-07 12:48:47', NULL),
(141, 'Consolidated Report for quarter - 1', 50, '95', 1, NULL, '2025-02-15 13:52:57', '2025-02-15 13:52:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_scores`
--

CREATE TABLE `department_scores` (
  `id` int(11) NOT NULL,
  `audit_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_scores`
--

INSERT INTO `department_scores` (`id`, `audit_id`, `template_id`, `score`, `created_at`, `updated_at`) VALUES
(5, 47, 22, 80, '2023-09-09 06:27:09', '2023-09-09 06:27:09'),
(6, 47, 23, 50, '2023-09-09 06:27:09', '2023-09-09 06:27:09'),
(7, 48, 22, 100, '2023-09-09 07:03:04', '2023-09-09 07:03:04'),
(8, 48, 23, 50, '2023-09-09 07:03:04', '2023-09-09 07:03:04'),
(9, 49, 22, 100, '2023-09-09 07:13:33', '2023-09-09 07:13:33'),
(10, 49, 23, 100, '2023-09-09 07:13:33', '2023-09-09 07:13:33'),
(11, 55, 23, 100, '2023-09-15 05:16:27', '2023-09-15 05:16:27'),
(12, 57, 22, 80, '2023-09-16 04:53:13', '2023-09-16 04:53:13'),
(13, 58, 24, 75, '2023-10-27 15:44:21', '2023-10-27 15:44:21'),
(14, 59, 24, 50, '2023-10-30 07:06:17', '2023-10-30 07:06:17'),
(15, 60, 24, 100, '2023-10-30 07:20:27', '2023-10-30 07:20:27'),
(16, 61, 24, 75, '2023-10-31 12:56:42', '2023-10-31 12:56:42'),
(17, 63, 24, 75, '2023-11-02 06:36:25', '2023-11-02 06:36:25'),
(18, 63, 25, 50, '2023-11-02 06:37:02', '2023-11-02 06:37:02'),
(19, 64, 24, 75, '2023-11-03 05:44:03', '2023-11-03 05:44:03'),
(20, 65, 24, 75, '2023-11-06 10:41:11', '2023-11-06 10:41:11'),
(21, 66, 24, 50, '2023-09-02 06:36:25', '2023-09-02 06:36:25'),
(22, 66, 25, 50, '2023-09-02 06:37:02', '2023-09-02 06:37:02'),
(23, 67, 24, 75, '2023-09-10 06:36:25', '2023-09-10 06:36:25'),
(24, 67, 25, 50, '2023-09-10 06:37:02', '2023-09-10 06:37:02'),
(25, 68, 24, 75, '2023-10-10 06:36:25', '2023-10-10 06:36:25'),
(26, 68, 25, 50, '2023-10-10 06:37:02', '2023-10-10 06:37:02'),
(27, 69, 24, 75, '2023-12-10 06:36:25', '2023-12-10 06:36:25'),
(28, 69, 25, 50, '2023-12-10 06:37:02', '2023-12-10 06:37:02'),
(29, 65, 25, 100, '2023-11-06 10:41:11', '2023-11-06 10:41:11'),
(30, 73, 24, 75, '2023-11-18 16:37:53', '2023-11-18 16:37:53'),
(31, 76, 29, 50, '2023-11-29 12:19:19', '2023-11-29 12:19:19'),
(32, 77, 29, 50, '2023-11-29 12:46:48', '2023-11-29 12:46:48'),
(33, 82, 26, 80, '2023-11-30 12:27:20', '2023-11-30 12:27:20'),
(34, 83, 27, 75, '2023-12-08 07:01:18', '2023-12-08 07:01:18'),
(35, 70, 26, 100, '2023-12-19 13:47:10', '2023-12-19 13:47:10'),
(36, 70, 27, 100, '2023-12-19 13:47:10', '2023-12-19 13:47:10'),
(37, 71, 26, 100, '2023-12-19 13:51:54', '2023-12-19 13:51:54'),
(38, 71, 27, 100, '2023-12-19 13:51:54', '2023-12-19 13:51:54'),
(39, 85, 24, 100, '2023-12-19 14:25:43', '2023-12-19 14:25:43'),
(40, 85, 25, 100, '2023-12-19 14:25:43', '2023-12-19 14:25:43'),
(41, 85, 26, 100, '2023-12-19 14:25:43', '2023-12-19 14:25:43'),
(42, 86, 24, 100, '2023-12-20 06:32:31', '2023-12-20 06:32:31'),
(43, 72, 26, 100, '2023-12-20 07:13:35', '2023-12-20 07:13:35'),
(44, 72, 27, 100, '2023-12-20 07:13:35', '2023-12-20 07:13:35'),
(45, 87, 24, 25, '2023-12-20 07:31:08', '2023-12-20 07:31:08'),
(46, 87, 25, 100, '2023-12-20 07:31:08', '2023-12-20 07:31:08'),
(47, 88, 26, 80, '2024-01-03 11:15:31', '2024-01-03 11:15:31'),
(48, 88, 27, 75, '2024-01-03 11:15:31', '2024-01-03 11:15:31'),
(49, 89, 26, 80, '2024-01-03 11:24:01', '2024-01-03 11:24:01'),
(50, 89, 27, 75, '2024-01-03 11:24:01', '2024-01-03 11:24:01'),
(51, 90, 24, 100, '2025-01-16 07:17:45', '2025-01-16 07:17:45'),
(52, 90, 25, 100, '2025-01-16 07:17:45', '2025-01-16 07:17:45'),
(53, 91, 24, 75, '2025-01-16 10:13:05', '2025-01-16 10:13:05'),
(54, 92, 26, 60, '2025-01-17 10:09:49', '2025-01-17 10:09:49'),
(55, 93, 24, 75, '2025-02-15 12:37:38', '2025-02-15 12:37:38'),
(56, 93, 25, 50, '2025-02-15 12:37:38', '2025-02-15 12:37:38'),
(57, 94, 24, 50, '2025-02-15 12:46:13', '2025-02-15 12:46:13'),
(58, 94, 25, 100, '2025-02-15 12:46:13', '2025-02-15 12:46:13'),
(59, 95, 39, 33, '2025-02-15 13:40:30', '2025-02-15 13:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `graph_types`
--

CREATE TABLE `graph_types` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT 0 COMMENT '0-horizontal,1-vertical',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graph_types`
--

INSERT INTO `graph_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-26 11:29:43', '2025-02-15 13:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `objective_responses`
--

CREATE TABLE `objective_responses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `score` text DEFAULT NULL,
  `color` text NOT NULL,
  `is_base` int(5) NOT NULL DEFAULT 0 COMMENT '1 - yes, 0 - No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `objective_responses`
--

INSERT INTO `objective_responses` (`id`, `name`, `score`, `color`, `is_base`, `created_at`, `updated_at`, `group_id`) VALUES
(57, 'YES', '1', 'GREEN', 1, '2023-10-27 14:14:49', '2023-10-27 14:14:49', 'ID_1698416089'),
(58, 'NO', '0', 'RED', 0, '2023-10-27 14:14:49', '2023-10-27 14:14:49', 'ID_1698416089'),
(59, 'N/A', '1', 'GREY', 0, '2023-10-27 14:14:49', '2023-10-27 14:14:49', 'ID_1698416089'),
(60, 'Compliance', '1', 'Green', 1, '2023-11-08 13:13:57', '2023-11-08 13:13:57', 'ID_1699449237'),
(61, 'Non-Compliance', '0', 'Red', 0, '2023-11-08 13:13:57', '2023-11-08 13:13:57', 'ID_1699449237'),
(62, 'N/A', '1', 'Grery', 0, '2023-11-08 13:13:57', '2023-11-08 13:13:57', 'ID_1699449237'),
(63, 'COMPLIANCE', '4', 'GREEN', 1, '2023-11-29 15:18:42', '2023-11-29 15:18:42', 'ID_1701271122'),
(64, 'NON COMPLIANCE', '0', 'RED', 0, '2023-11-29 15:18:42', '2023-11-29 15:18:42', 'ID_1701271122'),
(65, 'PARTIAL COMPLIANCE', '2', 'YELLOW', 0, '2023-11-29 15:18:42', '2023-11-29 15:18:42', 'ID_1701271122'),
(66, 'COMPLIANCE', '4', 'GREEN', 1, '2023-11-29 15:19:09', '2023-11-29 15:19:09', 'ID_1701271149'),
(67, 'NON COMPLIANCE', '0', 'RED', 0, '2023-11-29 15:19:09', '2023-11-29 15:19:09', 'ID_1701271149'),
(68, 'PARTIAL COMPLIANCE', '2', 'YELLOW', 0, '2023-11-29 15:19:09', '2023-11-29 15:19:09', 'ID_1701271149'),
(69, 'NOT APPLICABLE', '4', 'GREEN', 0, '2023-11-29 15:19:09', '2023-11-29 15:19:09', 'ID_1701271149');

-- --------------------------------------------------------

--
-- Table structure for table `offer_letters`
--

CREATE TABLE `offer_letters` (
  `id` int(11) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `starting_date` text DEFAULT NULL,
  `report_to_name` varchar(255) DEFAULT NULL,
  `report_to_dept` varchar(255) DEFAULT NULL,
  `ctc_digits` text DEFAULT NULL,
  `ctc_words` text DEFAULT NULL,
  `travel_allowance` text DEFAULT NULL,
  `probation_period` text DEFAULT NULL,
  `confirmation` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer_letters`
--

INSERT INTO `offer_letters` (`id`, `title`, `name`, `designation`, `starting_date`, `report_to_name`, `report_to_dept`, `ctc_digits`, `ctc_words`, `travel_allowance`, `probation_period`, `confirmation`, `created_at`, `updated_at`) VALUES
(1, 'Sir', 'Aman', 'Digital Marketer', '2024-02-10', 'Anurag', 'Human Resources Manager', '300000', 'Rupees Three Lakhs only', '3000', '5', '2024-02-05', '2024-02-03 06:07:47', '2025-01-24 12:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'parameter 1', '2023-10-28 00:42:36', '2023-10-28 00:42:36', NULL),
(2, 'MICROBE', '2023-11-29 18:05:25', '2023-11-29 18:05:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('smsunnythefunny@gmail.com', '$2y$10$pD85VOCMQAUM6lNUN8lCquk1E..9jExCAgBoi6aEd9WlYCLHyJhLe', '2023-06-28 03:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `pay_slips`
--

CREATE TABLE `pay_slips` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `month` text DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `employee_name` text DEFAULT NULL,
  `employee_number` varchar(255) DEFAULT NULL,
  `joined_date` text DEFAULT NULL,
  `esi_no` varchar(255) DEFAULT NULL,
  `loan_recovery` decimal(10,2) DEFAULT NULL,
  `esi_value` decimal(10,2) DEFAULT NULL,
  `conveyance_allowance` decimal(10,2) DEFAULT NULL,
  `gross_salary` int(11) DEFAULT NULL,
  `department` text DEFAULT NULL,
  `sub_department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `payment_mode` text DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `ifsc` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `uan` varchar(255) DEFAULT NULL,
  `pf_number` varchar(255) DEFAULT NULL,
  `apd` decimal(11,2) DEFAULT NULL,
  `twd` decimal(11,2) DEFAULT NULL,
  `lpd` decimal(11,2) DEFAULT NULL,
  `dp` decimal(11,2) DEFAULT NULL,
  `basic` decimal(50,2) DEFAULT NULL,
  `hra` decimal(50,2) DEFAULT NULL,
  `medical_allowance` decimal(50,2) DEFAULT NULL,
  `adhoc_allowance` decimal(50,2) DEFAULT NULL,
  `pf_value` decimal(50,2) DEFAULT NULL,
  `professional_tax` decimal(50,2) DEFAULT NULL,
  `company_logo` text DEFAULT NULL,
  `net_salary_in_words` varchar(255) DEFAULT NULL,
  `net_salary` decimal(10,2) DEFAULT NULL,
  `total_deductions` decimal(10,2) DEFAULT NULL,
  `total_earnings` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `loss_of_pay_days` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_slips`
--

INSERT INTO `pay_slips` (`id`, `user_id`, `company_name`, `image`, `company_address`, `month`, `year`, `employee_name`, `employee_number`, `joined_date`, `esi_no`, `loan_recovery`, `esi_value`, `conveyance_allowance`, `gross_salary`, `department`, `sub_department`, `designation`, `payment_mode`, `bank`, `ifsc`, `bank_account`, `pan`, `uan`, `pf_number`, `apd`, `twd`, `lpd`, `dp`, `basic`, `hra`, `medical_allowance`, `adhoc_allowance`, `pf_value`, `professional_tax`, `company_logo`, `net_salary_in_words`, `net_salary`, `total_deductions`, `total_earnings`, `created_at`, `updated_at`, `loss_of_pay_days`) VALUES
(1, NULL, 'FIPOLA RETAIL INDIA PRIVATE LIMITED', NULL, '2ND FLOOR,SRINIVAS TOWER  NO.5 CENOTAPH ROAD,TEYNAMPET  CHENNAI TAMIL NADU 600018', 'December', 2023, 'ShivKumar G', 'CHN0549', '2021-02-03', NULL, NULL, NULL, NULL, NULL, 'HUMAN RESOURCES', 'N/A', 'ASST.GENERAL MANAGER HUMAN RESOURCES', 'Bank Transfer', 'ICICI', 'ICIC0000329', '154301503802', 'N/A', '100357250147', 'TNAMB16065070000010167', 30.00, 30.00, 0.00, 30.00, 37500.00, 18750.00, 1250.00, 17500.00, 1800.00, 208.00, '20240204170129Screenshot 2024-02-04 164248.png', 'Seventy Two Thousand Nine Hundred and Ninety Two Only', NULL, NULL, NULL, '2024-02-04 11:31:29', '2024-02-05 12:22:35', ''),
(2, NULL, 'XYZ Company', NULL, 'ABC, PLot-254, Gurgaon, Haryana, 122001', 'December', 2023, 'Vishal', 'CHDY23344', '2022-02-01', NULL, NULL, NULL, NULL, NULL, 'H.RESOURCES', 'N/A', 'TRAINEE', 'BANK TRANSFER', 'SBI', 'ASDFG45678', '87005462774', 'SDFG456G78Y', 'N/A', 'DRDSRWS34567890', 30.00, 30.00, 0.00, 30.00, 37500.12, 2540.00, 18542.00, 1250.00, 1200.00, 205.00, '20240205181448forgot-password.jpg', 'SEVENTY TWO THOUSAND NINETY HUNDRED NINETY ONLY', NULL, NULL, NULL, '2024-02-05 12:44:48', '2024-02-05 12:50:42', ''),
(3, NULL, NULL, NULL, NULL, 'July', 2023, 'Aman', '123456QWERTY', '2021-02-10', '7896795CFTYSRTDR', 0.00, 150.00, 1600.00, 20000, 'Human Resources', NULL, 'Asst. General Manager', NULL, 'SBI', NULL, '74185296378562', NULL, 'N/A', '123456QWERTYU', 31.00, 31.00, 0.00, 0.00, 9000.00, 3600.00, 1250.00, 4550.00, 0.00, 0.00, NULL, NULL, 19850.00, 150.00, 20000.00, '2024-02-07 10:24:24', '2024-02-07 10:24:24', ''),
(5, NULL, NULL, NULL, NULL, '1', 1, 'Ravi', 'fsfsfsdf', '2025-01-15', '11', 22.00, 11.00, 1600.00, 1111111, 'qewdwefw', NULL, 'wefwef', NULL, 'wefewfwef', NULL, '22323', NULL, '11', '11', 0.00, 11.00, 11.00, 11.00, 500000.00, 200000.00, 1250.00, 408261.00, 1800.00, 1.00, NULL, NULL, -1834.00, 1112945.00, 1111111.00, '2025-01-28 11:40:09', '2025-01-28 11:40:09', '1111111'),
(7, 11, NULL, NULL, NULL, '11', 2025, 'aniket', 'ferfgdfg', '2025-01-28', '33', 33.00, 34.00, 1600.00, 300000, 'rgeger', NULL, 'ergerg', NULL, 'rgergegg', NULL, '34453', NULL, '33', '33', 23.00, 33.00, 10.00, 3.00, 135000.00, 54000.00, 1250.00, 108150.00, 1800.00, 2.00, NULL, NULL, 207221.00, 92779.00, 300000.00, '2025-01-28 12:36:56', '2025-01-28 12:36:56', '90910'),
(8, 11, NULL, NULL, NULL, 'january', 2025, 'aniket', '1', '2025-02-15', '234234', 100.00, 100.00, 1600.00, 20000, 'DEV', NULL, 'DEV', NULL, 'KOtak', NULL, '1234567890', NULL, '324234', '2342', 20.00, 25.00, 5.00, 5.00, 9000.00, 3600.00, 1250.00, 4550.00, 1080.00, 100.00, NULL, NULL, 15700.00, 4300.00, 20000.00, '2025-02-15 13:50:20', '2025-02-15 13:50:20', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_colors`
--

CREATE TABLE `report_colors` (
  `id` int(11) NOT NULL,
  `color` varchar(50) DEFAULT '#588377',
  `type` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report_colors`
--

INSERT INTO `report_colors` (`id`, `color`, `type`, `created_at`, `updated_at`) VALUES
(1, '#0e116c', 1, '2023-10-26 11:07:09', '2023-11-29 14:08:09'),
(2, '#e06b0b', 2, '2023-10-26 11:08:58', '2023-11-29 14:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `permissions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '0,6,9,12', '2025-01-25 07:29:37', '2025-02-17 10:08:06', NULL),
(2, 1, '0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15', '2025-01-25 07:29:58', '2025-01-25 11:36:17', NULL),
(3, 2, '0,1,3,4,5,6,7,8,9,12', '2025-01-25 07:29:58', '2025-02-17 05:55:21', NULL),
(5, 3, '12', '2025-01-28 07:17:10', '2025-01-28 07:21:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

CREATE TABLE `samples` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `location` text NOT NULL,
  `type` text NOT NULL,
  `temperature` text DEFAULT NULL,
  `weight` text DEFAULT NULL,
  `quantity` text DEFAULT NULL,
  `amount` text NOT NULL,
  `evidences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `key_points` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `client` text NOT NULL,
  `members` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `parameters` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `completed_date` text DEFAULT NULL,
  `sample_by_sign` varchar(255) DEFAULT NULL,
  `sample_to_sign` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `samples`
--

INSERT INTO `samples` (`id`, `name`, `date`, `location`, `type`, `temperature`, `weight`, `quantity`, `amount`, `evidences`, `key_points`, `client`, `members`, `parameters`, `created_at`, `updated_at`, `status`, `deleted_at`, `completed_date`, `sample_by_sign`, `sample_to_sign`) VALUES
(1, 'sample one', '2023-10-28T06:12', 'gurgaon', '3', '45', '500', '2', '546', '[\"storage\\/sample\\/e7e69cdf28f8ce6b69b4e1853ee21bab.jpeg\"]', '[\"Key poin sample one\",\"key point sample two\"]', '38', '[\"3\"]', '[\"1\"]', '2023-10-28 00:43:24', '2023-10-28 00:45:59', 2, NULL, '2023-10-28 06:14:51', '653c59bc6dc38.png', '653c59c74fd02.png'),
(2, 'qwerty', '2023-12-05T17:39', 'qwert re tter', '1', '23', '45', '2', '1234r', '[\"storage\\/sample\\/2ff385c6e75c56b7a5a93d9fcd0c82ee.jpg\"]', '[\"qwertyh\",\"qwerty ertyui\"]', '38', '[\"3\"]', '[\"1\",\"2\"]', '2023-12-05 12:10:15', '2023-12-05 12:14:48', 2, NULL, '2023-12-05 17:44:48', '656f1422b0b71.png', '656f143842f7b.png'),
(3, 'REPUBLIC DAY', '2023-12-20T13:43', 'BISWESWAR', '3', '43', '10 g', '1', '250', NULL, NULL, '39', '[\"1\"]', '[\"2\"]', '2023-12-20 08:14:02', '2023-12-20 11:02:20', 2, NULL, '2023-12-20 16:32:20', '6582a2737b645.png', '6582a27d274d7.png');

-- --------------------------------------------------------

--
-- Table structure for table `service_codes`
--

CREATE TABLE `service_codes` (
  `id` int(11) NOT NULL,
  `service_code` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_codes`
--

INSERT INTO `service_codes` (`id`, `service_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FSMS', '2023-09-08 07:12:26', '2025-01-24 11:36:03', NULL),
(2, 'EQFSMS', '2023-09-11 04:28:41', '2023-09-11 04:28:41', NULL),
(3, 'EMS', '2023-11-29 00:44:08', '2023-11-29 00:44:08', NULL),
(4, 'test1', '2025-01-24 11:12:24', '2025-01-24 11:12:24', NULL),
(5, 'test111', '2025-01-24 11:29:10', '2025-01-24 11:29:10', NULL),
(6, 'test11111', '2025-01-24 11:30:12', '2025-01-24 12:08:12', '2025-01-24 12:08:12'),
(7, 'test1111133', '2025-01-24 11:34:09', '2025-01-24 12:08:08', '2025-01-24 12:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `temp_folder_id` int(11) NOT NULL,
  `template_type` text DEFAULT NULL,
  `template_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `multi_select` varchar(10) DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `temp_folder_id`, `template_type`, `template_name`, `description`, `created_at`, `updated_at`, `deleted_at`, `multi_select`) VALUES
(22, 17, '1', 'RECEIVING AREA', 'FSMS INSPECTION', '2023-09-09 00:08:27', '2023-10-27 09:37:53', '2023-10-27 09:37:53', '0'),
(23, 17, '1', 'STORAGE AREA', 'FSMS INSPECTION', '2023-09-09 00:28:08', '2023-10-27 09:37:53', '2023-10-27 09:37:53', '0'),
(24, 18, '1', 'Template One', 'Hygiene temp one', '2023-10-27 14:14:08', '2023-10-27 14:14:08', NULL, '0'),
(25, 18, '1', 'Template two', 'qwertyuio', '2023-11-02 06:22:32', '2023-11-02 06:22:32', NULL, '0'),
(26, 18, '1', 'Section 1.10.32 Hygiene', 'Hygiene Template', '2023-11-08 13:12:10', '2023-11-08 13:12:10', NULL, '0'),
(27, 18, '1', 'Section 1.10.33', 'Hygiene Section 1.10.33', '2023-11-08 13:16:51', '2023-11-08 13:16:51', NULL, '0'),
(28, 19, '1', 'ISO 9001', 'QMS CHECKLIST', '2023-11-19 12:58:19', '2023-11-27 07:20:27', '2023-11-27 07:20:27', '0'),
(30, 18, '1', 'dwegtehhrhbtrhyh hry jyr wyr tu jtuj jytw jtwyuj w', 'k wutyk utwk utwk utw ku tykujhgjh,oilihgfjms gsrehgfnydjytjyt jnhgnyujk tu uyk yu ek', '2023-12-01 06:29:03', '2023-12-08 08:22:05', '2023-12-08 08:22:05', '0'),
(31, 19, '1', 'RECEIVING AREA', 'RECEIVING AREA', '2025-01-14 09:18:56', '2025-01-14 09:21:56', NULL, '0'),
(32, 20, '1', 'RECEIVING AREA', 'RECEIVING AREA', '2025-01-14 10:50:55', '2025-01-14 11:40:26', '2025-01-14 11:40:26', '0'),
(33, 19, '1', 'STORAGE AREA', 'FSMS INSPECTION', '2025-01-14 11:41:07', '2025-01-14 11:41:07', NULL, '0'),
(34, 19, '1', 'PRE-PREPARTION AREA', 'FSMS INSPECTION', '2025-01-14 12:01:41', '2025-01-14 12:01:41', NULL, '0'),
(35, 21, '1', 'RECEIVING AREA (copy)', 'RECEIVING AREA', '2025-01-15 07:13:56', '2025-01-15 07:13:56', NULL, '0'),
(36, 21, '1', 'STORAGE AREA (copy)', 'FSMS INSPECTION', '2025-01-15 07:13:56', '2025-01-15 07:13:56', NULL, '0'),
(37, 21, '1', 'PRE-PREPARTION AREA (copy)', 'FSMS INSPECTION', '2025-01-15 07:13:56', '2025-01-15 07:13:56', NULL, '0'),
(38, 19, '1', 'dummy 2', 'this is template', '2025-02-15 13:31:29', '2025-02-15 13:31:29', NULL, '0'),
(39, 18, '1', 'dummy test 1', 'THIS IS DEMO', '2025-02-15 13:32:36', '2025-02-15 13:32:36', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `template_details`
--

CREATE TABLE `template_details` (
  `id` int(11) NOT NULL,
  `template_id` int(11) DEFAULT NULL,
  `template_name` text DEFAULT NULL,
  `question` text DEFAULT NULL,
  `question_name` varchar(10000) DEFAULT NULL,
  `sdg` text DEFAULT NULL,
  `nc` int(11) DEFAULT NULL COMMENT '2=critical, 1=major, 0=minor',
  `response` text DEFAULT NULL,
  `response_group` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `suggestions` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template_details`
--

INSERT INTO `template_details` (`id`, `template_id`, `template_name`, `question`, `question_name`, `sdg`, `nc`, `response`, `response_group`, `remarks`, `suggestions`, `created_at`, `updated_at`) VALUES
(98, 24, 'Template One', 'Internal / External audit of the system is done periodically. Check for  records.', NULL, '8', 2, NULL, 'ID_1698416089', NULL, NULL, '2023-10-27 14:16:19', '2023-11-29 15:29:22'),
(99, 24, 'Template One', 'Food Business has an effective consumer complaints redressal mechanism.', NULL, '14', 2, NULL, 'ID_1698416089', NULL, NULL, '2023-10-27 14:16:47', '2023-11-06 10:41:41'),
(100, 24, 'Template One', 'Food handlers have the necessary knowledge and skills & trained to handle  food safely. Check for training records.', NULL, '14', 2, NULL, 'ID_1698416089', NULL, NULL, '2023-10-27 14:17:05', '2023-11-06 10:41:49'),
(101, 24, 'Template One', 'Appropriate documentation & records are available and retained for a  period of one year, whichever is more', NULL, '8', 2, NULL, 'ID_1698416089', NULL, NULL, '2023-10-27 14:17:38', '2023-11-03 06:49:56'),
(108, 25, 'Template two', 'Morbi sollicitudin ex eu ipsum varius commodo.', '5.1', '2', 0, NULL, 'ID_1698416089', NULL, NULL, '2023-11-02 06:32:09', '2023-11-02 06:33:12'),
(109, 25, 'Template two', 'Donec blandit justo eu lorem rutrum, et lacinia mauris pellentesque.', '5.2', '4', 1, NULL, 'ID_1698416089', NULL, NULL, '2023-11-02 06:32:24', '2023-11-02 06:33:20'),
(110, 26, 'Section 1.10.32 Hygiene', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:14:12', '2023-11-08 13:14:12'),
(111, 26, 'Section 1.10.32 Hygiene', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', NULL, '2', 0, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:14:33', '2023-11-08 13:14:42'),
(112, 26, 'Section 1.10.32 Hygiene', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, '3', 1, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:14:58', '2023-11-08 13:15:10'),
(113, 26, 'Section 1.10.32 Hygiene', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '4', 1, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:15:28', '2023-11-08 13:15:37'),
(114, 26, 'Section 1.10.32 Hygiene', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', NULL, '5', 2, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:15:55', '2023-11-08 13:16:12'),
(115, 27, 'Section 1.10.33', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.', NULL, '1', 2, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:17:19', '2023-12-20 06:40:39'),
(116, 27, 'Section 1.10.33', 'similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.', NULL, '2', 0, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:17:33', '2023-11-08 13:17:47'),
(117, 27, 'Section 1.10.33', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est,', NULL, '6', 0, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:18:03', '2023-11-08 13:18:11'),
(118, 27, 'Section 1.10.33', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', NULL, '8', 0, NULL, 'ID_1699449237', NULL, NULL, '2023-11-08 13:18:27', '2023-11-08 13:18:36'),
(120, 31, 'RECEIVING AREA', 'Receiving area floor wall celing are smooth, non absorbant, damage free', '1', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 09:20:41', '2025-01-14 18:21:31'),
(121, 31, 'RECEIVING AREA', 'Light fixtures are shatter proof and lux intensity is appropriate for area', '2', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 09:21:32', '2025-01-14 17:53:34'),
(147, 31, 'RECEIVING AREA', 'Are the receiving monitoring equipment, such as contact or IR thermometers and weighing balances, calibrated? Is there documentation available for calibration reports?', '3', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:24:08', '2025-01-14 17:53:56'),
(148, 31, 'RECEIVING AREA', 'Is the vendor\'s hygiene considered satisfactory during the receiving process?', '4', '12', 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:25:16', '2025-01-14 18:21:46'),
(149, 31, 'RECEIVING AREA', 'Is pest control implemented and adequately maintained?', '5', '12', 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:30:57', '2025-01-14 18:22:01'),
(150, 31, 'RECEIVING AREA', 'Is there a record available that indicates that frozen food is received at -18°C?', '6', '9', 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:31:34', '2025-01-14 18:22:12'),
(151, 31, 'RECEIVING AREA', 'Is there a record available to verify that chilled food was received at a temperature below 5°C?', '7', '9', 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:31:35', '2025-01-14 18:22:24'),
(152, 31, 'RECEIVING AREA', 'Is the personal hygiene of staff satisfactory when receiving food', '8', '12', 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:33:03', '2025-01-14 18:22:35'),
(153, 31, 'RECEIVING AREA', 'How often are receiving thermometers calibrated, both internally (every 3 months) and externally (once a year)?', '9', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:33:35', '2025-01-14 18:22:44'),
(154, 31, 'RECEIVING AREA', 'Is the cleaning and sanitization of the receiving area satisfactory?', '10', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:34:38', '2025-01-14 18:22:57'),
(155, 31, 'RECEIVING AREA', 'Is equipment maintenance performed regularly according to a preventive maintenance (PM) schedule?', '11', '9', 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:35:07', '2025-01-14 18:23:08'),
(156, 31, 'RECEIVING AREA', 'Are the appropriate signages in place as per the process requirements?', '12', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:35:47', '2025-01-14 18:23:19'),
(157, 31, 'RECEIVING AREA', 'Is the floor marking in the receiving area provided with a distance of 10-12 feet?', '13', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:36:15', '2025-01-14 18:23:30'),
(158, 31, 'RECEIVING AREA', 'Is there a provision for a hygiene station for vendors during the receiving time?', '14', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:37:12', '2025-01-14 18:23:43'),
(159, 31, 'RECEIVING AREA', 'Is the receiving area equipped to receive the product schedule? Is the product receipt aligned with the provided schedule?', '15', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:38:01', '2025-01-14 18:23:55'),
(160, 31, 'RECEIVING AREA', 'Are there separate product inspections conducted for the vegetarian and non-vegetarian sections? Are any measures implemented to prevent cross-contamination between the two sections?', '16', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:38:31', '2025-01-14 18:24:06'),
(161, 33, 'STORAGE AREA', 'Floor wall ceiling are smooth, non absorbant, damage free and mold and mildew free', '1', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:42:20', '2025-01-14 18:24:30'),
(162, 33, 'STORAGE AREA', 'Storage area is sufficient to store food products', '2', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:42:49', '2025-01-14 18:24:40'),
(166, 33, 'STORAGE AREA', 'Racks are 1 ft away from wall and 6\" inches height from ground level', '3', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:44:39', '2025-01-14 18:24:52'),
(167, 33, 'STORAGE AREA', 'Products are labelled and FIFO/FEFO is being followed?', '4', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:46:37', '2025-01-14 18:25:04'),
(168, 33, 'STORAGE AREA', 'Light fixtures are shatter proof and lux intensity is appropriate', '5', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:47:09', '2025-01-14 18:25:12'),
(169, 33, 'STORAGE AREA', 'Pest control measures are adequate in place?', '6', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:47:37', '2025-01-14 18:25:23'),
(170, 33, 'STORAGE AREA', 'Person Hygiene of staff found satisfactory?', '7', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:47:57', '2025-01-14 18:25:37'),
(172, 33, 'STORAGE AREA', 'Appropriate documents and records available ?', '8', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:48:33', '2025-01-14 18:25:48'),
(173, 33, 'STORAGE AREA', 'Time and temperature control is monitored and documented on regular basis', '9', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:49:01', '2025-01-14 18:25:59'),
(174, 33, 'STORAGE AREA', 'Rejected material has designed place and well marked on rack', '10', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:53:11', '2025-01-14 18:26:09'),
(175, 33, 'STORAGE AREA', 'Frozen food stored at -18°C', '11', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:53:34', '2025-01-14 18:26:19'),
(176, 33, 'STORAGE AREA', 'Chilled food stored at <5°C', '12', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:53:57', '2025-01-14 18:26:29'),
(177, 33, 'STORAGE AREA', 'Room temperature for dry store is at 10°C -24°C', '13', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:54:17', '2025-01-14 18:26:42'),
(178, 33, 'STORAGE AREA', 'Bulk material is stored on pallets (SS, Plastic). Wooden pallets are not acceptable', '14', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:54:36', '2025-01-14 18:26:52'),
(179, 33, 'STORAGE AREA', 'Food products are packed and sealed in food graded material', '15', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:55:18', '2025-01-14 18:27:04'),
(180, 33, 'STORAGE AREA', 'Cleaning and sanitisation is sufficient and as per the schedules?', '16', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:55:56', '2025-01-14 18:27:14'),
(181, 33, 'STORAGE AREA', 'Store shall be free from dust, dirt and cobwebs', '17', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:56:17', '2025-01-14 18:27:26'),
(182, 33, 'STORAGE AREA', 'Storage practices are satisfactory and safe?', '18', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:56:17', '2025-01-14 18:27:38'),
(183, 33, 'STORAGE AREA', 'Allergen protocol is the in place.', '19', '9', 1, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 11:57:08', '2025-01-14 18:53:05'),
(184, 34, 'PRE-PREPARTION AREA', 'Is the personal hygiene of the staff found to be satisfactory?', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:02:17', '2025-01-14 12:02:17'),
(186, 34, 'PRE-PREPARTION AREA', 'Is the cleaning and sanitization carried out according to the established schedules?', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:03:14', '2025-01-14 12:03:14'),
(187, 34, 'PRE-PREPARTION AREA', 'Are the light fixtures shatterproof, and is the lux intensity appropriate?', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:03:33', '2025-01-14 12:03:33'),
(188, 34, 'PRE-PREPARTION AREA', 'Are chopping boards and knives sanitized?', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:03:51', '2025-01-14 12:03:51'),
(189, 34, 'PRE-PREPARTION AREA', 'Are the food handling practices of the food handlers satisfactory?', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:04:11', '2025-01-14 12:04:11'),
(190, 34, 'PRE-PREPARTION AREA', 'Are the floor, walls, and ceiling smooth, non-absorbent, free from damage, mold, and mildew?', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:04:29', '2025-01-14 12:04:29'),
(191, 34, 'PRE-PREPARTION AREA', 'Is the thawing process conducted at a temperature below 5°C in accordance with the thawing protocol?', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:07:02', '2025-01-14 12:07:02'),
(192, 34, 'PRE-PREPARTION AREA', 'Water used for cleaning and washing purposes should be potable. Shall comply with IS 10500 standard.', '8', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:07:24', '2025-01-14 12:07:24'),
(193, 34, 'PRE-PREPARTION AREA', 'Food handlers shall have their knowledge and practices regarding glove usage and discarding procedures.', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:07:48', '2025-01-14 12:07:48'),
(194, 34, 'PRE-PREPARTION AREA', 'Waste management be implemented in accordance with the guidelines set by the local municipality?', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:08:12', '2025-01-14 12:08:12'),
(195, 34, 'PRE-PREPARTION AREA', 'Is color coding implemented for chopping boards and knives to prevent cross-contamination?', '11', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:08:33', '2025-01-14 12:08:33'),
(196, 34, 'PRE-PREPARTION AREA', 'Is the hot water supply labeled and is the temperature set above 45°C?', '12', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:09:01', '2025-01-14 12:09:01'),
(197, 34, 'PRE-PREPARTION AREA', 'Does the design of the drainage system ensure prevention of backflow, entry of pests, and eliminate water stagnation during operations?', '13', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:09:35', '2025-01-14 12:09:35'),
(198, 34, 'PRE-PREPARTION AREA', 'Is there a provision for a hygiene station for the working staff?', '14', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:09:56', '2025-01-14 12:09:56'),
(199, 34, 'PRE-PREPARTION AREA', 'Is there any pest control measures taken at the pre-preparation area to ensure pest control measures are in place?', '15', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:11:25', '2025-01-14 12:11:25'),
(200, 34, 'PRE-PREPARTION AREA', 'Provide the state of a specific piece of equipment within this zone, including its code, sanitation status, and visual condition.', '16', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:11:49', '2025-01-14 12:11:49'),
(201, 35, 'PRODUCTION AREA', '1', 'Are the personal hygiene practices of food handlers satisfactory?', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:12:56', '2025-01-14 18:03:39'),
(202, 35, 'PRODUCTION AREA', '2', 'Are the cleaning and sanitization protocols in place and satisfactory?', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:13:17', '2025-01-14 18:03:51'),
(203, 35, 'PRODUCTION AREA', '3', 'Are the pest control measures sufficient and suitable?', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:13:37', '2025-01-14 18:04:03'),
(204, 35, 'PRODUCTION AREA', '4', 'Cooking temperatures and time for hot food (veg), specifically above 60°C for 10 minutes and 65°C for 2 minutes? Check temperatures.', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:13:58', '2025-01-14 18:04:20'),
(205, 35, 'PRODUCTION AREA', '5', 'Cooking temperatures and time for hot food (non-veg), specifically above 65°C for 10 minutes/70°C for 2 minutes/75°C for 15 seconds? Check temperatures.', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:15:49', '2025-01-14 18:04:33'),
(206, 35, 'PRODUCTION AREA', '6', 'Is the food handling practices of food handlers satisfactory?', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:18:02', '2025-01-14 18:04:49'),
(207, 35, 'PRODUCTION AREA', '7', 'Are all utensils and equipment in a condition free from damage, rust, corrosion, and sound?', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:18:43', '2025-01-14 18:05:01'),
(208, 35, 'PRODUCTION AREA', '8', 'Is the temperature control of food storage equipment monitored? Is its maintenance carried out according to the annual preventive maintenance schedule?  Verify the document with the engineering department.', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:19:10', '2025-01-14 18:05:16'),
(209, 35, 'PRODUCTION AREA', 'Stored food shall be labelled following FIFO and covered with lids wherever applicable to avoid contamination', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:19:35', '2025-01-14 12:19:35'),
(210, 35, 'PRODUCTION AREA', 'Light fixtures shall be of shatter proof and lux intensity is appropriate', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:20:16', '2025-01-14 12:20:16'),
(211, 35, 'PRODUCTION AREA', 'Exhaust hood should be free from grease, dirt and oil drips', '11', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-14 12:20:40', '2025-01-14 12:20:40'),
(212, 35, 'PRODUCTION AREA', 'Waste management shall be in place and follow Local municipal guidelines to discard', '12', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:21:07', '2025-01-14 12:21:07'),
(213, 35, 'PRODUCTION AREA', 'Water used for cooking and processing shall be of potable', '13', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:21:37', '2025-01-14 12:21:37'),
(214, 35, 'PRODUCTION AREA', 'Reused cooking oil shall be discarded according to regulatory compliance', '14', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:22:20', '2025-01-14 12:22:20'),
(215, 35, 'PRODUCTION AREA', 'Temperature of hot water supply for cleaning process shall comply with standards', '15', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:22:39', '2025-01-14 12:22:39'),
(216, 35, 'PRODUCTION AREA', 'Wherever applicable, CIP is fixed for cleaning process', '16', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:22:59', '2025-01-14 12:22:59'),
(217, 35, 'PRODUCTION AREA', 'Design of the drainage system should prevent back flow, pest entry and there shall be no stagnation of water during operations ?', '17', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:23:27', '2025-01-14 12:23:27'),
(219, 35, 'PRODUCTION AREA', 'Is there any provision of hygiene station for working staff?', '18', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:24:01', '2025-01-14 12:24:01'),
(220, 35, 'PRODUCTION AREA', 'Provide the state of a specific piece of equipment within this zone, including its code, sanitation status, and visual condition.', '19', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:24:23', '2025-01-14 12:24:23'),
(221, 36, 'SERVICE AREA', 'Staff person Hygiene is satisfactory', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:40:39', '2025-01-14 12:40:39'),
(222, 36, 'SERVICE AREA', 'Cleaning and sanitation is satisfactory', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:41:02', '2025-01-14 12:41:02'),
(223, 36, 'SERVICE AREA', 'All light fixtures are shatter proof and lux intensity is appropriate', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:41:25', '2025-01-14 12:41:25'),
(224, 36, 'SERVICE AREA', 'Pest control measures are adequate', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:42:01', '2025-01-14 12:42:01'),
(225, 36, 'SERVICE AREA', 'Food handlers handling practices are satisfactory', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:42:27', '2025-01-14 12:42:27'),
(226, 36, 'SERVICE AREA', 'Holding temperature of hot food is <65°C', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:42:50', '2025-01-14 12:42:50'),
(227, 36, 'SERVICE AREA', 'Holding temperature of cold food is >5°C', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:43:07', '2025-01-14 12:43:07'),
(228, 36, 'SERVICE AREA', 'Food without holding temperatures is discarded within 2 hrs.', '8', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:43:36', '2025-01-14 12:43:36'),
(229, 36, 'SERVICE AREA', 'Area shall be free from dust, dirt and cobwebs to avoid contamination of food of', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:43:59', '2025-01-14 12:43:59'),
(230, 36, 'SERVICE AREA', 'Food allergen protocol is followed', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:44:27', '2025-01-14 12:44:27'),
(231, 36, 'SERVICE AREA', 'Waste disposal shall be followed according to local municipal guidelines', '11', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:44:52', '2025-01-14 12:44:52'),
(232, 36, 'SERVICE AREA', 'Adequate measures are in place to avoid cross contamination of food in service area', '12', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:45:18', '2025-01-14 12:45:18'),
(233, 36, 'SERVICE AREA', 'Declaration of 14 digit FSSAI License or Registration number on cash reciepts / purchase invoices/cash memo/bills on sale of products shall be made available.', '13', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:45:47', '2025-01-14 12:45:47'),
(234, 37, 'STAFF LOCKERS', 'Staff lockers are clean and hygienic, free from bad odor, dust, dirt, cobwebs', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:46:49', '2025-01-14 12:46:49'),
(235, 37, 'STAFF LOCKERS', 'Hygiene station facility shall be in place.', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:47:05', '2025-01-14 12:47:05'),
(236, 37, 'STAFF LOCKERS', 'Light fixtures shall be of shatter proof and lux intensity is appropriate', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:47:26', '2025-01-14 12:47:26'),
(237, 37, 'STAFF LOCKERS', 'Floor, wall, and ceiling shall be damage-free, mold and mildew free', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:47:45', '2025-01-14 12:47:45'),
(238, 37, 'STAFF LOCKERS', 'Do\'s and don\'ts signages\'s are placed in lockers for staff', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:48:17', '2025-01-14 12:48:17'),
(239, 37, 'STAFF LOCKERS', 'Are there sufficient toilet facilities available for both female and male staff members?', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:48:39', '2025-01-14 12:48:39'),
(240, 37, 'STAFF LOCKERS', 'Is the regular schedule for cleaning and sanitation of toilet facilities available?', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:49:07', '2025-01-14 12:49:07'),
(241, 37, 'STAFF LOCKERS', 'Are there any signs of pest infestations or pest entry points in the staff lockers?', '8', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:49:27', '2025-01-14 12:49:27'),
(242, 38, 'GARBAGE (WET & DRY)', 'Floor, wall and ceiling should be clean and hygiene, free from damage and free from mold and mildew growth', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:50:27', '2025-01-14 12:50:27'),
(243, 38, 'GARBAGE (WET & DRY)', 'Garbage disposal area shall have adequate measures to avoid contamination during storage and disposal', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:51:01', '2025-01-14 12:51:01'),
(245, 38, 'GARBAGE (WET & DRY)', 'Temperature of wet garbage area shall be monitored and documented', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:51:27', '2025-01-14 12:51:27'),
(246, 38, 'GARBAGE (WET & DRY)', 'Cleaning and sanitation shall be appropriate and documented on regular basis', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:51:49', '2025-01-14 12:51:49'),
(247, 38, 'GARBAGE (WET & DRY)', 'Garbage disposal shall comply with local municipal guidelines', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:52:15', '2025-01-14 12:52:15'),
(248, 40, 'RECORDS & DOCUMENTS', 'Staff shall be trained on food hygiene and Safety measures periodically and documents and records are available for next 1 year', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:53:17', '2025-01-14 12:53:17'),
(249, 40, 'RECORDS & DOCUMENTS', 'Appropriate documents an records related to food hygiene and safety shall be documented and available for next 1 year', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:53:34', '2025-01-14 12:53:34'),
(250, 40, 'RECORDS & DOCUMENTS', 'Internal audit reports for department wise shall be available', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:54:05', '2025-01-14 12:54:05'),
(251, 40, 'RECORDS & DOCUMENTS', 'All food handlers shall be vaccinated for enteric vaccine and form D shall be available for next 1 year.', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:54:30', '2025-01-14 12:54:30'),
(252, 40, 'RECORDS & DOCUMENTS', 'Documentation related to pest control activities shall be available for compliance', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:54:52', '2025-01-14 12:54:52'),
(253, 40, 'RECORDS & DOCUMENTS', 'IS Food and water testing reports from NABL accredited laboratories shall be available for every 6 months once', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:55:12', '2025-01-14 12:55:12'),
(254, 40, 'RECORDS & DOCUMENTS', 'Purchase department documents related to vendor selection criteria, Supplier audit and verification, product specifications, vendor agreements, form E, COA for products are available with department?', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:55:33', '2025-01-14 12:55:33'),
(255, 40, 'RECORDS & DOCUMENTS', 'Food microbial reports for Hygiene criteria of the food handling areas are available?', '8', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:55:57', '2025-01-14 12:55:57'),
(256, 40, 'RECORDS & DOCUMENTS', 'Used Oil reports shall be available for Total Polar Compounds.', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:56:21', '2025-01-14 12:56:21'),
(257, 40, 'RECORDS & DOCUMENTS', 'Does the PCO possess a valid and up-to-date pest control license issued by the regulatory authority?', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:58:23', '2025-01-14 12:58:23'),
(258, 41, 'HOUSE KEEPING DEPT', 'Pest control operations are carried out through contract', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:59:31', '2025-01-14 12:59:31'),
(259, 41, 'HOUSE KEEPING DEPT', 'Does the pest control operator is well trained by organization to carryout effective pest chemical application.', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 12:59:50', '2025-01-14 12:59:50'),
(260, 41, 'HOUSE KEEPING DEPT', 'List of chemicals are available with MSDS updated?', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:00:12', '2025-01-14 13:00:12'),
(261, 41, 'HOUSE KEEPING DEPT', 'Pest chemical storage is kept under lock and key to ensure safety?', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:00:30', '2025-01-14 13:00:30'),
(262, 41, 'HOUSE KEEPING DEPT', 'Pest activities are monitored on regular basis', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:00:49', '2025-01-14 13:00:49'),
(263, 41, 'HOUSE KEEPING DEPT', 'Check lists for pest Control operations are available', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:01:12', '2025-01-14 13:01:12'),
(264, 41, 'HOUSE KEEPING DEPT', 'Bait map for entire premises is available?', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:01:42', '2025-01-14 13:01:42'),
(265, 41, 'HOUSE KEEPING DEPT', 'Premises should be free from pest activities (pest infestation, droppings, pest eggs, nesting)?', '8', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:02:06', '2025-01-14 13:02:06'),
(266, 41, 'HOUSE KEEPING DEPT', 'Snag reports are available for every 3 months once and updated for effective monitoring and eradication of pests?', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:02:25', '2025-01-14 13:02:25'),
(267, 41, 'HOUSE KEEPING DEPT', 'Is the bait condition good and as per the bait map it is placed? Check bait map for location identification with number on it.', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:02:47', '2025-01-14 13:02:47'),
(268, 41, 'HOUSE KEEPING DEPT', 'Cleaning chemicals are diluted as per the manufacturer instructions?', '11', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:03:05', '2025-01-14 13:03:05'),
(269, 41, 'HOUSE KEEPING DEPT', 'All cleaning materials are stored in their designated areas?', '12', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:03:25', '2025-01-14 13:03:25'),
(270, 41, 'HOUSE KEEPING DEPT', 'Cleaning materials are colour coded according to their purpose of usage', '13', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:03:44', '2025-01-14 13:03:44'),
(271, 41, 'HOUSE KEEPING DEPT', 'Laundry materials are handled with care? Staff uniforms are being regularly updated in register for issue and reciept of soiled material?', '14', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:04:10', '2025-01-14 13:04:10'),
(272, 41, 'HOUSE KEEPING DEPT', 'Premises cleaning at backyard is clean and maintained Hygienic ? No signs of pest?', '15', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:04:32', '2025-01-14 13:04:32'),
(273, 41, 'HOUSE KEEPING DEPT', 'Guest room minibar is followed for FIFO?', '16', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:04:49', '2025-01-14 13:04:49'),
(274, 41, 'HOUSE KEEPING DEPT', 'Is guest room cleaning is satisfactory?', '17', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:05:07', '2025-01-14 13:05:07'),
(275, 41, 'HOUSE KEEPING DEPT', 'Does the PCO possess a valid and up-to-date pest control license issued by the regulatory authority?', '18', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:05:42', '2025-01-14 13:05:42'),
(276, 42, 'BAR AREA', 'Personal hygiene of food handlers are satisfactory', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:06:50', '2025-01-14 13:06:50'),
(277, 42, 'BAR AREA', 'Hygiene facilities are available', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:07:07', '2025-01-14 13:07:07'),
(278, 42, 'BAR AREA', 'Pest management practices are satisfactory', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:07:23', '2025-01-14 13:07:23'),
(279, 42, 'BAR AREA', 'Serving utensils are maintained properly? Does sanitization is carried out properly?', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:07:41', '2025-01-14 13:07:41'),
(280, 42, 'BAR AREA', 'Cleaning and Sanitation processes are properly carried for service area   Yes', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:07:59', '2025-01-14 13:07:59'),
(281, 42, 'BAR AREA', 'Light fixtures are shatter proof and lux intensity is sufficient?', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:08:16', '2025-01-14 13:08:16'),
(282, 42, 'BAR AREA', 'Is liquor license available and updated?', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:08:37', '2025-01-14 13:08:37'),
(283, 43, 'CAFETERIA', 'Floor, wall, ceiling are in sound condition without cracks, damages', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:09:28', '2025-01-14 13:09:28'),
(284, 43, 'CAFETERIA', 'There should not be any stagnation of water, mould formation due to leakage over floor, wall, ceiling.', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:09:45', '2025-01-14 13:09:45'),
(285, 43, 'CAFETERIA', 'Provision of facilities to avoid cross contamination was given by organization', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:10:01', '2025-01-14 13:10:01'),
(286, 43, 'CAFETERIA', 'Staff engaged in serving food are maintaining good hygiene practices', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:10:32', '2025-01-14 13:10:32'),
(287, 43, 'CAFETERIA', 'Check visually for dust, dirt over the serving area on equipment and utensils', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:10:56', '2025-01-14 13:10:56'),
(288, 43, 'CAFETERIA', 'There should not be any signs of pest infestation', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:11:13', '2025-01-14 13:11:13'),
(289, 43, 'CAFETERIA', 'Food temperatures are monitored with calibrated thermometers and periodic monitoring of holding temperature. Check for food temperatures records', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:11:32', '2025-01-14 13:11:32'),
(290, 43, 'CAFETERIA', 'Hot food holding temperature should be >65°C', '8', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:11:50', '2025-01-14 13:11:50'),
(291, 43, 'CAFETERIA', 'Cold food holding temperature should be <5°C', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:12:09', '2025-01-14 13:12:09'),
(292, 43, 'CAFETERIA', 'Hygiene station shall have provision of hot and cold water facility with soap liquid, non hand operable tap.', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:12:29', '2025-01-14 13:12:29'),
(293, 44, 'SOCIAL DISTANCING', 'Is there any provision on clear guidance on social distancing eg; signages\'s and visual aids to create awareness in employee/ visitors/ guests.', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:13:44', '2025-01-14 13:13:44'),
(294, 44, 'SOCIAL DISTANCING', 'Area has been marked for floor stickers keeping a distance of 1.5 to 2 metres from guest entry till service', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:14:05', '2025-01-14 13:14:05'),
(295, 44, 'SOCIAL DISTANCING', 'Is there any token and numbering system to follow social distancing at staff canteens to avoid crowd.', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:14:23', '2025-01-14 13:14:23'),
(296, 44, 'SOCIAL DISTANCING', 'Staff training was effective in maintaining social distancing', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:14:41', '2025-01-14 13:14:41'),
(297, 46, 'Design & facilities', '1', 'The food establishment has an updated FSSAI license and is displayed at a prominent location.', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:32:14', '2025-01-14 18:04:30'),
(298, 47, '1. LEGAL REQUIREMENTS', 'Food establishment has an updated FSSAI license and is displayed at a prominent location.', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:35:20', '2025-01-14 13:35:20'),
(299, 47, '1. LEGAL REQUIREMENTS', 'Do you have a FOSTAC trained and certified food safety supervisor for every 25 food handler', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 13:36:01', '2025-01-14 13:36:01'),
(306, 48, '2.DESIGN AND PREMISES', 'The design of food premises provides adequate working space; permit maintenance & cleaning to prevent the entry of dirt, dust & pests.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:40:27', '2025-01-14 13:40:27'),
(307, 48, '2.DESIGN AND PREMISES', 'The internal structure & fittings are made of non-toxic and impermeable material.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:40:46', '2025-01-14 13:40:46'),
(308, 48, '2.DESIGN AND PREMISES', 'Walls, ceilings & doors are free from flaking paint or plaster, condensation & shedding particles.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:41:07', '2025-01-14 13:41:07'),
(309, 48, '2.DESIGN AND PREMISES', 'Floors are non-absorbent, non-slippery & sloped appropriately.', '4', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:41:26', '2025-01-14 13:41:26'),
(310, 48, '2.DESIGN AND PREMISES', 'Windows are kept closed & fitted with insect proof screen when opening to external environment.', '5', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:41:41', '2025-01-14 13:41:41'),
(311, 48, '2.DESIGN AND PREMISES', 'Doors are smooth & non-absorbent. Suitable precautions have been taken prevent entry of pests.', '6', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:41:56', '2025-01-14 13:41:56'),
(312, 48, '2.DESIGN AND PREMISES', 'Potable water (meeting standards of IS:10500 & tested semi-annually with records maintained thereof) is used as product ingredient or in contact with food or food contact surface.', '7', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:42:12', '2025-01-14 13:42:12'),
(313, 48, '2.DESIGN AND PREMISES', 'Equipment and containers are made of non-toxic, impervious, non- corrosive material which is easy to clean & disinfect.', '8', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:42:30', '2025-01-14 13:42:30'),
(314, 48, '2.DESIGN AND PREMISES', 'Adequate facilities for heating, cooling, refrigeration and freezing food & facilitate monitoring of temperature.', '9', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:42:45', '2025-01-14 13:42:45'),
(315, 48, '2.DESIGN AND PREMISES', 'Premise has sufficient lighting. Lighting fixtures are protected to prevent contamination on breakage', '10', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:43:08', '2025-01-14 13:43:08'),
(316, 48, '2.DESIGN AND PREMISES', 'Adequate ventilation is provided within the premises.', '11', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:43:51', '2025-01-14 13:43:51'),
(317, 48, '2.DESIGN AND PREMISES', 'An adequate storage facility for food, packaging materials, chemicals, personnel items etc is available.', '12', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:44:08', '2025-01-14 13:44:08'),
(318, 48, '2.DESIGN AND PREMISES', 'Personnel hygiene facilities are available including adequate number of hand washing facilities, toilets, change rooms for employees.', '13', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:44:25', '2025-01-14 13:44:25'),
(319, 48, '2.DESIGN AND PREMISES', 'Food material is tested either through internal laboratory or through an accredited lab. Check for records.', '14', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:44:42', '2025-01-14 13:44:42'),
(320, 50, '3.MAINTENANCE AND SANITATION', 'Cleaning of equipment, food premises is done as per cleaning schedule & cleaning programme. There should be no stagnation of water in food zones.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:47:02', '2025-01-14 13:47:02'),
(321, 50, '3.MAINTENANCE AND SANITATION', 'Preventive maintenance of equipment and machinery are carried out regularly as per the instructions of the manufacturer. Check for records.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:47:31', '2025-01-14 13:47:31'),
(322, 50, '3.MAINTENANCE AND SANITATION', 'Measuring & monitoring devices are calibrated periodically', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:47:47', '2025-01-14 13:47:47'),
(323, 50, '3.MAINTENANCE AND SANITATION', 'Pest control program is available & pest control activities are carried out by trained and experienced personnel. Check for records', '4', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:48:04', '2025-01-14 13:48:04'),
(325, 50, '3.MAINTENANCE AND SANITATION', 'No signs of pest activity or infestation in premises (eggs, larvae, faeces etc.)', '5', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:48:32', '2025-01-14 13:48:32'),
(326, 50, '3.MAINTENANCE AND SANITATION', 'Drains are designed to meet expected flow loads and equipped with grease and cockroach traps to capture contaminants and pests.', '6', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:48:54', '2025-01-14 13:48:54'),
(327, 50, '3.MAINTENANCE AND SANITATION', 'Food waste and other refuse are removed periodically from food handling areas to avoid accumulation.', '7', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-14 13:49:20', '2025-01-14 13:49:20'),
(328, 51, '5.PERSONAL HYGIENE', '\"Annual medical examination & inoculation of food handlers against the enteric group of of diseases as per recommended schedule of the vaccine is done. Check for records.\"', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:50:20', '2025-01-14 13:50:20'),
(329, 51, '5.PERSONAL HYGIENE', 'No person suffering from a disease or illness or with open wounds or burns is involved in handling of food or materials which come in contact with food.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:50:46', '2025-01-14 13:50:46'),
(330, 51, '5.PERSONAL HYGIENE', 'Food handlers maintain personal cleanliness (clean clothes, trimmed nails &water proof bandage etc.) and personal behaviour (hand washing, no loose jewellery, no smoking, no spitting etc.)', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:51:04', '2025-01-14 13:51:04'),
(331, 51, '5.PERSONAL HYGIENE', 'Food handlers are equipped with suitable aprons, gloves, headgear, etc.; wherever necessary.', '4', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:51:21', '2025-01-14 13:51:21'),
(335, 52, '6.TRAINING AND RECORD KEEPING', 'Food handlers have the necessary knowledge and skills & trained to handle food safely. Check for training records.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:54:33', '2025-01-14 13:54:33'),
(336, 52, '6.TRAINING AND RECORD KEEPING', 'Appropriate documentation & records are available and retained for a period of one year, whichever is more', '4', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:54:48', '2025-01-14 13:54:48'),
(337, 52, '6.TRAINING AND RECORD KEEPING', 'Food Business has an effective consumer complaints redressal mechanism.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:55:25', '2025-01-14 13:55:25'),
(338, 52, '6.TRAINING AND RECORD KEEPING', 'Internal / External audit of the system is done periodically. Check for records.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 13:56:01', '2025-01-14 13:56:01'),
(339, 49, '3.CONTROL OF OPERATIONS', 'Incoming material is procured as per internally laid down specification from approved vendors.Check for records (like certificate of analysis, Form E, specifications, name and address of the supplier, batch no., mfg., use by/expiry date, quantity procured etc.)', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:54:10', '2025-01-14 14:54:10'),
(340, 49, '3.CONTROL OF OPERATIONS', 'Raw materials are inspected at the time of receiving for food safety hazards. (Farm produce like vegetables, fruits, eggs etc. must be checked for spoilage & accepted only in good condition)', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:55:09', '2025-01-14 14:55:09'),
(341, 49, '3.CONTROL OF OPERATIONS', 'Incoming material, semi or final products are stored according to their temperature requirement in a hygienic environment to avoid deterioration and protect from is practised. (Foods of animal origin are stored at a temperature less than or equal to 4oC )contamination. FIFO & FEFO', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:55:41', '2025-01-14 14:55:41'),
(342, 49, '3.CONTROL OF OPERATIONS', 'All raw materials is cleaned thoroughly before food preparation.', '4', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:56:05', '2025-01-14 14:56:05'),
(343, 49, '3.CONTROL OF OPERATIONS', 'Proper segregation of raw, cooked; vegetarian and non-vegetarian food is done.', '5', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:56:25', '2025-01-14 14:56:25'),
(344, 49, '3.CONTROL OF OPERATIONS', 'All the equipment is adequately sanitized before and after food preparation.', '6', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:56:43', '2025-01-14 14:56:43'),
(345, 49, '3.CONTROL OF OPERATIONS', 'Frozen food is thawed hygienically. No thawed food is stored for later use. (Meat, Fish and poultry is thawed in refrigerator at 5°C or below or in microwave. Shellfish/seafood is thawed in cold potable running water at 15°C or below within 90 minutes.', '7', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:57:09', '2025-01-14 14:57:09'),
(346, 49, '3.CONTROL OF OPERATIONS', 'Vegetarian items are cooked to a minimum of 60°C for 10 minutes or 65°C for 2 minutes core food temperature. Non vegetarian items are cooked for a minimum of 65°C for 10 minutes or 70°C for 2 minutes or 75°C for 15 seconds core food temperature.', '8', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:57:28', '2025-01-14 14:57:28'),
(347, 49, '3.CONTROL OF OPERATIONS', 'Cooked food intended for refrigeration is cooled appropriately. (High risk food is cooled from 60°C to 21°C within 2 hours or less & further cooled to 5°C within two hours or less.)', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 14:57:55', '2025-01-14 14:57:55'),
(348, 49, '3.CONTROL OF OPERATIONS', 'Food portioning is done in hygienic conditions. High risk food is portioned in a refrigerated area or portioned and refrigerated within 30 minutes. Large amount of food is portioned below 15°C.', '10', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:58:15', '2025-01-14 14:58:15'),
(349, 49, '3.CONTROL OF OPERATIONS', 'Hot food intended for consumption is held at 65°C and non-vegetarian food intended for consumption is held at 70°C. Cold foods are maintained at 5°C or below and frozen products are held at - 18°C or below.', '11', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 14:58:38', '2025-01-14 14:58:38'),
(350, 49, '3.CONTROL OF OPERATIONS', 'Reheating is done appropriately and no indirect of reheating such as adding hot water or reheating under bain maire or reheating under lamp are being used. (The core temperature of food reaches 75°C and is reheated for at least 2 minutes at this temperature.)', '12', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:59:00', '2025-01-14 14:59:00'),
(351, 49, '3.CONTROL OF OPERATIONS', 'Oil being used is suitable for cooking purposes is being used. Periodic verification of fat and oil by checking the color, the flavour and floated elements is being done.', '13', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:59:27', '2025-01-14 14:59:27'),
(352, 49, '3.CONTROL OF OPERATIONS', 'Vehicle intended for food transportation are kept clean and maintained in good repair & are maintain required temperature. (Hot foods are held at 65°C, cold foods at 5°C and frozen item -18°C during transportation or transported within 2 hours of food preparation).', '14', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 14:59:45', '2025-01-14 14:59:45'),
(353, 49, '3.CONTROL OF OPERATIONS', 'Food and non-food products transported at same time in the same vehicle is separated adequately to avoid any risk to food.', '15', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 15:00:03', '2025-01-14 15:00:03'),
(354, 49, '3.CONTROL OF OPERATIONS', 'Cutlery, crockery used for serving and dinner accompaniments at dining service are clean and sanitized free form unhygienic matters.', '16', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 15:00:26', '2025-01-14 15:00:26'),
(355, 49, '3.CONTROL OF OPERATIONS', 'Packaging and wrapping material coming in contact with food is clean and of food grade quality.', '17', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 15:00:54', '2025-01-14 15:00:54'),
(356, 45, 'CONTEXT OF THE ORGANIZATION', '1', 'Understanding the organization and its context  a. Has the organization determined the external and internal issues that are relevant to its purpose and its strategic direction and that affect its ability to achieve the intended result(s) of its quality management system?  b.  Has the organization monitored and reviewed information about these external and internal issues?', NULL, 2, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 15:02:19', '2025-01-14 18:03:49'),
(357, 45, 'CONTEXT OF THE ORGANIZATION', '2', 'Understanding the needs and expectations of interested parties 4.2.1 Due to their effect or potential effect on the organization’s ability to consistently provide products   and services that meet customer and applicable statutory and regulatory requirements,   has the organization determined the following?  a. the interested parties that are relevant to the quality management system.  b. the requirements of these interested parties that are relevant to the quality management system.   4.2.2 Has the organization monitored and reviewed information about these interested parties and their relevant requirements?', NULL, 2, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 15:02:50', '2025-01-14 18:04:02'),
(358, 53, 'LEGAL REQUIREMENTS', 'Food establishment has an updated FSSAI license and is displayed at a prominent location.', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 15:44:12', '2025-01-14 15:44:12'),
(360, 53, 'LEGAL REQUIREMENTS', 'Do you have a FOSTAC trained and certified food safety supervisor for every 25 food handler', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:05:47', '2025-01-14 16:05:47'),
(361, 56, 'DESIGN AND PREMISES', 'The design of food premises provides adequate working space; permit maintenance & cleaning to prevent the entry of dirt, dust & pests.', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:06:53', '2025-01-14 16:06:53'),
(362, 56, 'DESIGN AND PREMISES', 'The internal structure & fittings are made of non-toxic and impermeable material.', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:07:09', '2025-01-14 16:07:09'),
(363, 56, 'DESIGN AND PREMISES', 'Walls, ceilings & doors are free from flaking paint or plaster, condensation & shedding particles.', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:07:29', '2025-01-14 16:07:29');
INSERT INTO `template_details` (`id`, `template_id`, `template_name`, `question`, `question_name`, `sdg`, `nc`, `response`, `response_group`, `remarks`, `suggestions`, `created_at`, `updated_at`) VALUES
(364, 56, 'DESIGN AND PREMISES', 'Floors are non-absorbent, non-slippery & sloped appropriately.', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:07:54', '2025-01-14 16:07:54'),
(365, 56, 'DESIGN AND PREMISES', 'Windows are kept closed & fitted with insect proof screen when opening to external environment.', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:08:15', '2025-01-14 16:08:15'),
(366, 56, 'DESIGN AND PREMISES', 'Doors are smooth & non-absorbent. Suitable precautions have been taken prevent entry of pests.', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:08:37', '2025-01-14 16:08:37'),
(367, 56, 'DESIGN AND PREMISES', 'Potable water (meeting standards of IS:10500 & tested semi-annually with records maintained thereof) is used as product ingredient or in contact with food or food contact surface.', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:09:14', '2025-01-14 16:09:14'),
(368, 56, 'DESIGN AND PREMISES', 'Equipment and containers are made of non-toxic, impervious, non- corrosive material which is easy to clean & disinfect.', '8', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:09:35', '2025-01-14 16:09:35'),
(369, 56, 'DESIGN AND PREMISES', 'Adequate facilities for heating, cooling, refrigeration and freezing food & facilitate monitoring of temperature.', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:09:55', '2025-01-14 16:09:55'),
(370, 56, 'DESIGN AND PREMISES', 'Premise has sufficient lighting. Lighting fixtures are protected to prevent contamination on breakage', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:10:13', '2025-01-14 16:10:13'),
(371, 56, 'DESIGN AND PREMISES', 'Adequate ventilation is provided within the premises.', '11', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:10:29', '2025-01-14 16:10:29'),
(372, 56, 'DESIGN AND PREMISES', 'An adequate storage facility for food, packaging materials, chemicals, personnel items etc is available.', '12', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:10:49', '2025-01-14 16:10:49'),
(373, 56, 'DESIGN AND PREMISES', 'Personnel hygiene facilities are available including adequate number of hand washing facilities, toilets, change rooms for employees.', '13', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:11:12', '2025-01-14 16:11:12'),
(374, 56, 'DESIGN AND PREMISES', 'Food material is tested either through internal laboratory or through an accredited lab. Check for records.', '14', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:11:32', '2025-01-14 16:11:32'),
(375, 57, 'CONTROL OF OPERATIONS', 'Incoming material is procured as per internally laid down specification from approved vendors.Check for records (like certificate of analysis, Form E, specifications, name and address of the supplier, batch no., mfg., use by/expiry date, quantity procured etc.)', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:13:04', '2025-01-14 16:13:04'),
(376, 57, 'CONTROL OF OPERATIONS', 'Raw materials are inspected at the time of receiving for food safety hazards. (Farm produce like vegetables, fruits, eggs etc. must be checked for spoilage & accepted only in good condition)', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:13:20', '2025-01-14 16:13:20'),
(377, 57, 'CONTROL OF OPERATIONS', 'Incoming material, semi or final products are stored according to their temperature requirement in a hygienic environment to avoid deterioration and protect from is practised. (Foods of animal origin are stored at a temperature less than or equal to 4oC )contamination. FIFO & FEFO', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:13:39', '2025-01-14 16:13:39'),
(378, 57, 'CONTROL OF OPERATIONS', 'All raw materials is cleaned thoroughly before food preparation.', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:13:56', '2025-01-14 16:13:56'),
(379, 57, 'CONTROL OF OPERATIONS', 'Proper segregation of raw, cooked; vegetarian and non-vegetarian food is done.', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:14:20', '2025-01-14 16:14:20'),
(380, 57, 'CONTROL OF OPERATIONS', 'All the equipment is adequately sanitized before and after food preparation', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:14:42', '2025-01-14 16:14:42'),
(381, 57, 'CONTROL OF OPERATIONS', 'Frozen food is thawed hygienically. No thawed food is stored for later use. (Meat, Fish and poultry is thawed in refrigerator at 5°C or below or in microwave. Shellfish/seafood is thawed in cold potable running water at 15°C or below within 90 minutes.', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:14:59', '2025-01-14 16:14:59'),
(382, 57, 'CONTROL OF OPERATIONS', 'Vegetarian items are cooked to a minimum of 60°C for 10 minutes or 65°C for 2 minutes core food temperature. Non vegetarian items are cooked for a minimum of 65°C for 10 minutes or 70°C for 2 minutes or 75°C for 15 seconds core food temperature', '7', NULL, 2, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:14:59', '2025-01-14 16:15:24'),
(383, 57, 'CONTROL OF OPERATIONS', 'Cooked food intended for refrigeration is cooled appropriately. (High risk food is cooled from 60°C to 21°C within 2 hours or less & further cooled to 5°C within two hours or less.)', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:15:49', '2025-01-14 16:15:49'),
(384, 57, 'CONTROL OF OPERATIONS', 'Food portioning is done in hygienic conditions. High risk food is portioned in a refrigerated area or portioned and refrigerated within 30 minutes. Large amount of food is portioned below 15°C.', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:16:08', '2025-01-14 16:16:08'),
(385, 57, 'CONTROL OF OPERATIONS', 'Hot food intended for consumption is held at 65°C and non-vegetarian food intended for consumption is held at 70°C. Cold foods are maintained at 5°C or below and frozen products are held at - 18°C or below.', '11', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:16:29', '2025-01-14 16:16:29'),
(386, 57, 'CONTROL OF OPERATIONS', 'Reheating is done appropriately and no indirect of reheating such as adding hot water or reheating under bain maire or reheating under lamp are being used. (The core temperature of food reaches 75°C and is reheated for at least 2 minutes at this temperature.)', '12', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:16:49', '2025-01-14 16:16:49'),
(387, 57, 'CONTROL OF OPERATIONS', 'Oil being used is suitable for cooking purposes is being used. Periodic verification of fat and oil by checking the color, the flavour and floated elements is being done.', '13', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:17:08', '2025-01-14 16:17:08'),
(388, 57, 'CONTROL OF OPERATIONS', 'Vehicle intended for food transportation are kept clean and maintained in good repair & are maintain required temperature. (Hot foods are held at 65°C, cold foods at 5°C and frozen item -18°C during transportation or transported within 2 hours of food preparation).', '14', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:17:27', '2025-01-14 16:17:27'),
(389, 57, 'CONTROL OF OPERATIONS', 'Food and non-food products transported at same time in the same vehicle is separated adequately to avoid any risk to food.', '15', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:17:43', '2025-01-14 16:17:43'),
(390, 57, 'CONTROL OF OPERATIONS', 'Cutlery, crockery used for serving and dinner accompaniments at dining service are clean and sanitized free form unhygienic matters.', '16', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:17:59', '2025-01-14 16:17:59'),
(391, 57, 'CONTROL OF OPERATIONS', 'Packaging and wrapping material coming in contact with food is clean and of food grade quality.', '17', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:18:16', '2025-01-14 16:18:16'),
(392, 58, 'MAINTENANCE AND SANITATION', 'Cleaning of equipment, food premises is done as per cleaning schedule & cleaning programme. There should be no stagnation of water in food zones.', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:19:01', '2025-01-14 16:19:01'),
(394, 58, 'MAINTENANCE AND SANITATION', 'Preventive maintenance of equipment and machinery are carried out regularly as per the instructions of the manufacturer. Check for records.', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:19:24', '2025-01-14 16:19:24'),
(395, 58, 'MAINTENANCE AND SANITATION', 'Measuring & monitoring devices are calibrated periodically.', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:19:40', '2025-01-14 16:19:40'),
(396, 58, 'MAINTENANCE AND SANITATION', 'Pest control program is available & pest control activities are carried out by trained and experienced personnel. Check for records.', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:19:57', '2025-01-14 16:19:57'),
(397, 58, 'MAINTENANCE AND SANITATION', 'No signs of pest activity or infestation in premises (eggs, larvae, faeces etc.)', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:20:14', '2025-01-14 16:20:14'),
(398, 58, 'MAINTENANCE AND SANITATION', 'Drains are designed to meet expected flow loads and equipped with grease and cockroach traps to capture contaminants and pests.', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:20:30', '2025-01-14 16:20:30'),
(399, 58, 'MAINTENANCE AND SANITATION', 'Food waste and other refuse are removed periodically from food handling areas to avoid accumulation.', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:20:46', '2025-01-14 16:20:46'),
(400, 59, 'PERSONAL HYGIENE', 'Annual medical examination & inoculation of food handlers against the enteric group of of diseases as per recommended schedule of the vaccine is done. Check for records.', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:22:03', '2025-01-14 16:22:03'),
(401, 59, 'PERSONAL HYGIENE', 'No person suffering from a disease or illness or with open wounds or burns is involved in handling of food or materials which come in contact with food.', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:22:18', '2025-01-14 16:22:18'),
(402, 59, 'PERSONAL HYGIENE', 'Food handlers maintain personal cleanliness (clean clothes, trimmed nails &water proof bandage etc.) and personal behaviour (hand washing, no loose jewellery, no smoking, no spitting etc.)', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:22:37', '2025-01-14 16:22:37'),
(403, 59, 'PERSONAL HYGIENE', 'Food handlers are equipped with suitable aprons, gloves, headgear, etc.; wherever necessary.', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:22:54', '2025-01-14 16:22:54'),
(404, 60, 'TRAINING AND RECORD KEEPING', 'Internal / External audit of the system is done periodically. Check for records.', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:23:41', '2025-01-14 16:23:41'),
(405, 60, 'TRAINING AND RECORD KEEPING', 'Food Business has an effective consumer complaints redressal mechanism.', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:23:58', '2025-01-14 16:23:58'),
(406, 60, 'TRAINING AND RECORD KEEPING', 'Food handlers have the necessary knowledge and skills & trained to handle food safely. Check for training records.', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:24:14', '2025-01-14 16:24:14'),
(407, 60, 'TRAINING AND RECORD KEEPING', 'Appropriate documentation & records are available and retained for a period of one year, whichever is more', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:24:31', '2025-01-14 16:24:31'),
(408, 61, 'CONTEXT OF THE ORGANIZATION', 'Understanding the organization and its context  External and internal issues are identified, reviewed and up to date. They are relevant to the purpose of the food safety management system it’s in place.', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-14 16:25:47', '2025-01-14 18:05:30'),
(409, 61, 'CONTEXT OF THE ORGANIZATION', 'Understanding the needs and expectations of interested parties  The organization can consistently provide products and service that meet applicable statutory/regulatory and customer requirements with regard of food safety, the organization shall determine and the interested parties that are relevant to the food safety management system.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:26:10', '2025-01-14 18:05:30'),
(410, 61, 'CONTEXT OF THE ORGANIZATION', 'Determining the scope of the food safety management system  The organization had determined the boundaries and applicability of the food safety management system to establish its scope the scope shall specify the products and services. processes and production sites that are addressed by the food management systems and shall include the activities, processes product or service that can have an influence on the food safety of the end products.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:26:27', '2025-01-14 18:05:30'),
(411, 61, 'CONTEXT OF THE ORGANIZATION', 'Food safety management system  The organization had established implemented, maintained, updated, and continually improve a food safety management system including the processes needed and their interactions, in accordance with the requirements of document.', '4', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:26:43', '2025-01-14 18:05:30'),
(412, 62, 'LEADERSHIP', 'Leadership and commitment  Top management has demonstrated leadership and commitment with respect the food safety management system by ensuring that the integration of food safety management system requirements into the organization’s business process and the resource needed for the food safety management system are available etc.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:27:35', '2025-01-14 18:07:21'),
(413, 62, 'LEADERSHIP', 'Policy  Top management had established, implemented, and maintained a food safety policy that Is appropriate to the purpose and context of organization and provides a framework for setting n reviewing the objectives of food safety management system.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:27:57', '2025-01-14 18:07:21'),
(414, 62, 'LEADERSHIP', 'Organizational roles, responsibilities  Top management has ensured that the responsibilities and authorities for relevant roles are assigned, communicated, and understood within the organization. Top management shall the responsibility and authority for ensuring that the food safety management system conforms to the requirements of this document and reporting on the performance of the food safety management system to top management including appointing the food safety team and the food safety team leaders.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:28:17', '2025-01-14 18:07:21'),
(415, 63, 'PLANNING', 'Actions to address risks and opportunities  There are actions to address these risks and opportunities How to integrate and implement the actions into its food safety management system processes and evaluate the effectiveness of these actions taken by the organization to address risks and opportunities shall be proportionate, and the potential impact on food safety requirements.', '1', NULL, 2, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:29:20', '2025-01-14 18:08:23'),
(416, 63, 'PLANNING', 'Objectives of the food safety management system and planning to achieve them  The organization has established objectives of the food safety management system at relevant functions and levels.  The objectives of the food safety management shall be consistent with food safety policy; authorization of results and it is measurable.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:29:36', '2025-01-14 18:07:53'),
(417, 63, 'PLANNING', 'Planning of changes  The organization has determined the need for change to the food safety management system, including personnel changes, the changes shall be carried out and communicated in planned manner. The organization shall consider the purpose of the changes and their potential consequence for supply and maintenance of safe food production, the integrity of the food safety management system, and the availability resources to effectively implement the change including the allocation or re-allocation of responsibilities and authorities.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:29:56', '2025-01-14 18:07:53'),
(418, 64, 'SUPPORT', 'Resources  The organization had provided the resources needed for the establishment, implementation, maintenance, updating and continual improvement of the food safety management system. The capability of and any constraints on existing internal resources and Resources required from external source are considered.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:30:36', '2025-01-14 18:35:53'),
(419, 64, 'SUPPORT', 'Competence  There’s necessary competence of person(s) including external providers doing work under its control that affects its food safety performance and effectiveness of food safety management system, ensure that these persons, including the food safety and those responsible for operation of the hazards control plan, are competent based on appropriate education, training, or experience.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:30:51', '2025-01-14 18:35:53'),
(420, 64, 'SUPPORT', 'Awareness  The organization had ensured that all relevant persons doing work under the organization control shall be aware of the food safety policy, the objective of the food safety management system relevant to their task(s) and the individual contribution to the effectiveness of the food safety management system, including the benefits of improved food safety performance.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:31:06', '2025-01-14 18:35:53'),
(421, 64, 'SUPPORT', 'Communication  The organisation had established sufficient information is communicated externally and is available for interested parties of the food chain. the organization shall establish implement and maintain effective communications with: External providers and contractors, Customers and/or consumers in relation to, Product information to enable the safe handling display, storage, preparations, distribution and use of product within the food chain or by the consumer and Identified foods safety hazards that need to be controlled by the other organizations in the food chain, and/or consumers.', '4', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:31:19', '2025-01-14 18:35:53'),
(422, 64, 'SUPPORT', 'Documented information  The organization food safety management had included documented information required by this document, document information determined by the organization as being necessary for the effectiveness of the food safety management system and documented information and food safety requirements required by statutory/regulatory authorities and customer.  Have created a documented information, the organization shall ensure appropriate to identification  and description (e.g., a title, date, author, or reference number), format (e.g. language, software version, graphics) and media (e.g. paper, electronic), and review and approval for suitability and adequacy.  The documented information of external origin determined by the organization to be necessary for the planning and operation of the food safety management system shall be identified as appropriate and controlled.', '5', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:31:36', '2025-01-14 18:35:53'),
(423, 65, 'OPERATION', 'Operation planning and control', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:32:18', '2025-01-14 18:36:18'),
(424, 65, 'OPERATION', 'Prerequisite programs (PRPs)  There’s establishment of the hazard control plan, the organization shall update the following information, if necessary, characteristics of raw materials, ingredients, and product – contact materials, characteristics of end product intended use and flow diagrams and description of processes and process environment.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:32:32', '2025-01-14 18:36:18'),
(425, 65, 'OPERATION', 'raceability system  The traceability system shall be able to identify incoming raw materials from suppliers and the first stage of the distribution route of the end product. when establishing and implementing the traceability system, the following shall be considered at minimum-  a) Link material received Lot numbers, ingredients, and intermediate products to end products.  b) Address Reworking of materials/products.  c) Manage the distribution of the end product.  Ensure the statutory, regulatory, and customer requirements. Retain documented information as evidence of the traceability system for at least the product\'s shelf life. Verify and test the system\'s effectiveness.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:32:49', '2025-01-14 18:36:18'),
(426, 65, 'OPERATION', 'Emergency preparedness and response  Top management has prepared and planned to identify preventive actions that deal with potential emergency situation and incidents that may impact on food safety and which are relevant to the role of the organization in the food chain.', '4', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-14 16:33:04', '2025-01-14 18:36:18'),
(427, 65, 'OPERATION', 'Hazard control  The hazard analysis preliminary information had been collected, updated, and maintained by the food safety team. This shall include but not be limited to the organization products, processes, customers’ requirements, equipment, and food safety hazards relevant to the food safety management system.', '5', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:33:18', '2025-01-14 18:36:18'),
(428, 65, 'OPERATION', 'Updating the information specifying the PRPs and the hazard control plan  There’s establishment of the hazard control plan, the organization shall update the following information, if necessary, characteristics of raw materials, ingredients, and product – contact materials, characteristics of product intended use and flow diagrams and description of processes and process environment.  When required, the hazard control plan and/or the PRP(s) shall be updated.', '6', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:33:33', '2025-01-14 18:36:18'),
(429, 65, 'OPERATION', 'Control of monitoring and measuring  The organization had provided evidence that the specified monitoring and measuring methods and equipment is in use is adequate for the monitoring and measuring activities related to the PRP(s) and the hazard control plan.  The monitoring and measuring the equipment used shall be calibrate or verified at specified intervals prior to use, adjusted or re-adjusted as necessary, identify to enable the calibration status to be determined.  Safeguard from adjustments that would invalidate the measurement result; and protect from damage and deterioration.  The results of calibration and verification shall be retained as documented information. The calibration of equipment shall be traceable to international measurements standards.', '7', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:33:49', '2025-01-14 18:36:18'),
(430, 65, 'OPERATION', 'Verification related to PRPs and the hazard control plan  The organization had ensured that data derived from monitoring of OPRPs and CCPs are evaluated by designated persons with sufficient competence and authority to initiate corrective actions and corrections.  Corrective action  The need for corrective action shall be evaluated when critical limits at CCPs and/or action criteria for OPRPs are not met.  The organization shall establish and maintain document information that specify appropriate action to identify and eliminate the cause of detected nonconformities, to prevent recurrence, and to return the process to control after a nonconformity is identified. This action shall include reviewing nonconformities identified by customer and/or consumer complaints/regulatory inspection reports, reviewing trends in monitoring results that may indicate loss of control and determining the cause (s) of nonconformities, documenting the results of corrective action taken; and reviewing corrective action taken to ensure that they are effective.', '8', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:34:05', '2025-01-14 18:36:18'),
(431, 65, 'OPERATION', 'Control of product and process nonconformities The organization shall ensure that data derived from the monitoring of OPRPs and at CCPs are evaluated by designated persons who are competent and have the authority to initiate corrections and corrective actions.', '9', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:34:21', '2025-01-14 18:36:18'),
(432, 66, 'PERFORMANCE EVALUATION', 'Monitoring, measuring, analysis and evaluation  The organization had determined what need to be monitored and measured, the method for monitoring the measurements, analysis, and evaluation, as applicable, to ensure valid results, when the monitoring shall be performed.  The organization had retained appropriate    documented information as evidence of the results. The organization had evaluated performance and the effectiveness of the food safety management system.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:35:09', '2025-01-14 18:36:44'),
(433, 66, 'PERFORMANCE EVALUATION', 'Internal audit  The organization had planned, established, implemented, and maintained and audit programme(s) including the frequency, methods, responsibilities, planning requirements and reporting, which shall take into consideration   the importance of the process concerned changes in the food safety management system, and a results of monitoring measurements and previous audits', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:35:36', '2025-01-14 18:36:44'),
(434, 66, 'PERFORMANCE EVALUATION', 'Management review  Top management had reviewed the organization food safety management system, at planned intervals, to ensure its continuing suitability, adequacy, and effectiveness.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:35:50', '2025-01-14 18:36:44'),
(435, 67, 'IMPROVEMENT', 'Nonconformity and corrective action  The organization shall retain documented information as evidence of the nature nonconformities and any subsequent action taken.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:36:32', '2025-01-14 18:37:06'),
(436, 67, 'IMPROVEMENT', 'Continual improvement  Top management shall ensure that is continually updated. To achieve this, the food safety team shall evaluate the food safety management system at planned intervals. The team shall then consider whether it necessary to review the hazard analysis (see8.5.2), the establish hazard control plan (see 8.5.4). the establish PRPs (see 8.2). the updating activities shall be based on input form communication external as well as internal', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:36:46', '2025-01-14 18:37:06'),
(437, 67, 'IMPROVEMENT', 'Update of the food safety management system  The organizational had continually improved the suitability, adequacy, and effectiveness of the food safety management system to enhance the operation of the organization.  Top management shall ensure that the organization continually improve the effectiveness of the food safety management system through the use of communication (see 7.4), management system through the use of communication (see9.3), and internal audit (see 9.2), analysis of result of verification activities, validation of control measure(s) and combination (s)  of control measure(s) (, corrective actions (see 8.9.2) and food safety management system updating (see 10.2).', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:37:03', '2025-01-14 18:37:06'),
(438, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'The establishment and its facilities shall be of solid construction and maintained in good condition. All materials shall be such that they do not transmit any undesirable substances to the food.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:50:25', '2025-01-14 18:38:17'),
(439, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Water supply at adequate pressure and temperature shall be provided, as well as suitable facilities for its storage. The water storage facilities shall be cleaned and periodically monitored. When private well water or private source water is used to make potable water, disinfection devices and/or water-purifying devices shall be established. Only potable water shall be used. Records of controls performed shall be retained and only water of potable quality shall be used in the food business.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:50:45', '2025-01-14 18:38:17'),
(440, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Equipment and utensils shall be made of impervious and corrosion resistant materials, that does not transfer toxic substances, odour or flavour to food. The equipment and utensils shall be capable of withstanding frequent cleaning and disinfection operations, and shall be smooth and free from holes, crevices or cracks.', '3', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:51:04', '2025-01-14 18:38:17'),
(441, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Responsibility for ensuring compliance by all personnel with all requirements of 4.4 should be specifically allocated to competent supervisory personnel. Visitors, e.g. regulatory inspectors, clients, and maintenance personnel, shall be given access to the food-handling areas on a restricted basis. These visitors shall use protective clothing and comply with the food safety requirements of the catering business. Adequate, relevant, and continuing training shall be given to all personnel of the catering establishment in personal hygiene. Training should include relevant parts of this part of ISO/TS 22002. Records of training shall be retained. The management of the food establishment shall ensure that the health of the personnel engaged in the activity does not have an adverse effect on the food. Any individual affected by a contagious illness or exposed wounds shall not be allowed to work in food-handling areas where there may be a risk of contamination of food.', '4', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:51:19', '2025-01-14 18:38:17'),
(442, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'The catering establishment should set criteria for the evaluation of suppliers and keep records on their compliance with the established criteria. The degree of control an organization exerts on their suppliers depends on the nature and the intended use of each material. Components contacting food shall undergo stricter controls than those that are unconnected with food production, e.g. office furniture. Specifications for raw materials to be purchased should take into account the variability inherent to those products and the requirements for specific controls.', '5', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:51:39', '2025-01-14 18:38:17'),
(443, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Frozen raw materials not to be used immediately shall be kept or stored at −18 °C or below. Catering establishments shall be provided with cooling and/or freezing equipment of sufficient capacity to keep food at the adequate temperature, in accordance with the requirements of this subclause, 5.1 The refrigeration equipment shall have devices for measuring and monitoring the temperature of the air or products being cooled and the devices shall be calibrated at regular intervals. Records of temperature monitoring shall be maintained. Dry supplies store shall be kept under adequate temperature and humidity conditions. Food packaging materials and food contact materials should be protected from dust and from any other type of contamination.  Vehicles and containers intended for the transportation of cooked and/or cooled food shall be capable of maintaining the required temperatures and if required be approved by a competent authority. Food-transporting vehicles and containers shall be designed to maintain the required temperature. Records to demonstrate correct transport should be available. Where regional or national time or temperature regulations apply, these shall be used. If not, the temperatures stated in 5.5 to 5.9 can be used to ensure food safety. Hygienic requirements shall be applied to vehicles transporting finished, ready-to-eat products. During transport, food shall be protected from dust and from any other type of contamination.', '6', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:52:05', '2025-01-14 18:38:17'),
(444, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Equipment and utensils shall be cleaned as frequently as needed and disinfected if necessary by using products and methodologies ensuring their hygiene. Appropriate measures shall be taken when rooms, equipment, and utensils are being cleaned or disinfected in order to prevent contamination of the food e.g. by water, washing-up liquids, or disinfecting agents. Products used for cleaning operations, cleaning products, and disinfecting agents, shall be suitable for their intended use and used in accordance with the manufacturer’s instructions, properly identified, stored away from processing areas and used in a manner that does not cause food contamination and not be stored in food packages and containers.', '7', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:52:24', '2025-01-14 18:38:17'),
(445, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'The establishment shall have collecting bins in adequate numbers and capacity to contain waste. Where it is not possible to have distinct areas for food entry and waste exit of waste, different times for the such entry and exit shall be determined. The collecting bins used for waste disposal in preparation and storage areas of food should be provided with hands free covers. In kitchens or rooms where food is prepared, waste shall be placed in detachable, impervious and resistant rubbish bags within properly identified containers. Those containers shall be kept covered with a lid and removed from the work area as soon as they are filled or after each work shift and disposed into covered containers which shall not be stored in the processing area.', '8', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:52:39', '2025-01-14 18:38:17'),
(446, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'continuous and effective pest control programme shall be implemented and documented. The programme shall include a set of effective and continuous actions to control the vectors and pests, to prevent their attraction, access, shelter, and/or proliferation. The establishment and surrounding areas shall be inspected periodically to ensure there is no infestation. Where pests invade the building, eradication measures shall be adopted and verified for effectiveness, and the results shall be recorded. Buildings shall be well maintained to prevent ingress by pests and all pest entry points shall be sealed.', '9', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:52:56', '2025-01-14 18:38:17'),
(447, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'The top management of the catering establishment shall ensure that good manufacturing practices for food processing are being implemented effectively in the catering facility. The top management shall also ensure that the potential hazards are correctly assessed and ensure the effective supervision of catering operations. All supervision should be carried out by a competent person', '10', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:53:18', '2025-01-14 18:38:17'),
(448, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'The catering organization shall keep adequate records. Records that shall be kept for the appropriate time on procedures relating to: a) hygiene of water tanks; b) hygiene of facilities, equipment, furniture and utensils, including cleaning and disinfection operations; c) integrated controls of transmission vectors and pests; d) hygiene, health and training of food handlers; e) temperature control according to law and establishment procedures (food and equipment); f) others as needed or required. All documented procedures shall contain the sequential operations and their frequency, specifying the name, position and/or role of those responsible for the activities, monitoring, verifying, and correcting procedures. They shall be approved, dated and signed by the personnel responsible for the establishment and be available whenever needed.', '11', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:53:35', '2025-01-14 18:38:17'),
(449, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Product Recall Procedures', '12', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:53:50', '2025-01-14 18:38:17'),
(450, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'The pre-prepared products shall be kept under refrigeration or frozen conditions, properly protected and identified in an appropriate manner before it is used or prepared. When the raw materials and ingredients are not used entirely, these shall be properly packaged and identified (e.g. product description, date of fractioning, date of validity after opening or withdrawal of the original packaging depending on the raw materials and ingredients). Food shall be thawed in conditions that ensure that no part of the food reaches a temperature above 4 °C. For ready-to-use products, food should be checked to ensure that thawing is complete and no ice crystals remain throughout the products prior to service.', '13', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:54:12', '2025-01-14 18:38:17'),
(451, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'The preparation shall be performed under suitable conditions in a well illuminated area. The pre-prepared products shall be kept under suitable conditions (e.g. refrigeration), and adequately labelled where appropriate. Depending on the product and its intended use, selected, pre-washed, and, if necessary, pre-cut fruits and vegetables should be: a) washed with potable water, with added disinfectant where appropriate and legally permitted; b) rinsed with potable water (where appropriate and legally required).', '14', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:54:29', '2025-01-14 18:38:17'),
(452, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Where there are no regional or national time/temperature regulations, the following can be used to ensure food safety. Cooking time and temperature shall be of adequate duration at specified minimum temperature to ensure the destruction of vegetative cells of pathogenic microorganism that may be present in food.  Fat and oil quality shall be verified periodically by checking the odour, the colour, the flavour, and floated elements. Other quality characteristics to be considered are, for example, the smoke point, free fatty acid contents, amount of polar compounds.', '15', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:54:45', '2025-01-14 18:38:17'),
(453, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Strict hygiene conditions shall be in place when portioning food. When portioning refrigerated products, the product should be portioned in a refrigerated area or if not, should be held out of refrigeration for less than 30 min. Food portions shall be placed in single-use or reusable packages of suitable materials that have been properly washed and disinfected. Portioned food shall be covered with suitable food contact materials.', '16', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:55:04', '2025-01-14 18:38:17'),
(454, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Immediately after preparation, food shall be cooled as quickly and effectively as possible. The core temperature of the product should be lowered to 10 °C within 2 h. After this period, the product should be stored immediately at 4 °C or below.', '17', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:55:23', '2025-01-14 18:38:17'),
(455, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Immediately after cooling, the product shall be frozen as rapidly as possible. Cooked frozen food shall be stored at −18 °C or below. The temperature of stored food shall be verified frequently. Cooked frozen food shall be thawed at 4 °C or below and shall not be refrozen.', '18', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 16:55:43', '2025-01-14 18:38:17'),
(456, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'During transportation, food shall be protected from dust and from any other types of contamination. The temperature for hot food should be maintained at 63 °C or above. Food should be kept hot during transport at 63 °C or above. The temperature for food requiring refrigeration shall be maintained at 4 °C or below. Food should be transferred to the transporting vehicle already cooled to the temperature at which it is to be transported. Vehicles and containers intended for transporting cooked frozen food shall be suitable for that purpose. Cooked frozen food temperature should be maintained at −18 °C or below. During transportation, control measures shall be set up to ensure that the food safety is maintained, e.g. the transfer time between the transportation means (e.g. truck) and the storage facility should be less than 20 min if there are no methods to control temperature.', '19', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:41:00', '2025-01-14 18:38:17'),
(457, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Food reheating shall be carried out rapidly. The reheating process shall be adequate, and the core temperature of the product shall reach 75 °C within 1 h after removal from the refrigerator. Lower temperatures may be used for reheating; suitable time and temperature combinations shall be used. Heated food temperature shall be monitored at regular intervals. Reheated products shall reach consumers as soon as possible, at a temperature 63 °C or above. The quick reheating process raises the food rapidly through the interval of temperatures between 4 °C', '20', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:41:25', '2025-01-14 18:38:17'),
(458, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'Food that is not to be consumed shall be discarded; therefore it shall be neither reheated nor returned to cooling units (refrigerator or freezer). In self-service establishments, the distribution system shall be such that the products offered are protected from direct contamination that may derive from the proximity or actions of the individual who serves and who is served. The food temperature shall be 4 °C or below (for cool-stored food) or 63 °C or above for heated food.  In hot food display, equipment such as water-baths, thermal balconies such as electric or gas, stoves and other forms may be used. All alternatives shall be adjusted so that the food is maintained at the temperature required in this part of ISO/TS 22002, i.e. above 63 °C for up to 2 h, discounting the time that food remains in hot maintenance, prior to exposure. For food whose temperature may be difficult to maintain, e.g. during frying and grilling, among others, the control of time (for up to 3 h or, in accordance with local laws, discounting the time that food remains in hot maintenance before exposure) can be used as an alternative provided it is proven safe.  The equipment shall be adjusted in order to keep the food cold at temperatures up to 4 °C and shall be of appropriate size and state of hygiene, maintenance and operation. If the temperature exceeds 4 °C but is below 10 °C, ensure that the maximum time of exposure is 2 h. The areas where food is consumed shall be kept organized and in proper hygienic conditions. The change or cleaning and disinfection of utensils shall be performed at least every 4 h if necessary. New food shall not be mixed with that which is already exposed, unless both are at a temperature of 63 °C or above or 4 °C or below and there is no food safety risk.', '21', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:41:48', '2025-01-14 18:38:17'),
(459, 68, 'Prerequisite Programmes on Food  Safety-Catering', 'A label indicating preparation date, food type, manufacturing establishment name, instructions for use, conservation, and “consume before” date should be present. Hygiene control procedures shall be carried out by technically competent personnel who possess an understanding of the principles and practice of food hygiene. Samples of meals should be kept available for further investigation if there is a suspicion of a food-borne outbreak associated with their consumption. When it is not possible to keep samples for all meals, the establishment shall select meals to be sampled according to specific or potential hazards of each meal.   Food prepared in the establishment should be subjected to a microbiological sampling system for quality control and/or investigation purposes if there is suspicion of food-borne illnesses. Where appropriate for safety, samples should be kept in a sterile container at 4 °C or below until at least 3 days after that whole lot has been consumed.', '22', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:42:10', '2025-01-14 18:38:17'),
(460, 69, '4', '1', 'GENERAL REQUIREMENTS    Buildings shall be designed, constructed, and maintained in a manner appropriate to the nature of the processing operations to be carried out, the food safety hazards associated with those operations, and the potential sources of contamination from the plant environs. Buildings shall be of durable construction which presents no hazard to the product.  NOTE For example, roofs should be self-draining and not leak.', NULL, 2, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:44:57', '2025-01-14 18:04:54'),
(461, 69, '4', '2', 'ENVIRONMENT  Consideration shall be given to potential sources of contamination from the local environment  Food production should not be carried out in areas where potentially harmful substances could enter the product.  The effectiveness of measures taken to protect against', NULL, 2, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:45:19', '2025-01-14 18:05:05'),
(462, 69, '4', '3', 'LOCATIONS OF ESTABLISHMENTS  The site boundaries shall be clearly identified  Access to the site shall be controlled.  The site shall be maintained in good order. Vegetation shall be tended or removed. Roads, yards, and parking areas shall be drained to prevent standing water and shall be maintained.', NULL, 2, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:45:37', '2025-01-14 18:05:23'),
(463, 70, '5', 'GENERAL REQUIREMENTS  Internal layouts shall be designed, constructed and maintained to facilitate good hygiene and manufacturing practices. The movement patterns of materials, products and people, and the layout of equipment, shall be designed to protect against potential contamination sources.', '1', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:46:28', '2025-01-14 17:46:28'),
(464, 70, '5', 'INTERNAL DESIGN, LAYOUT AND TRAFFIC PATTERNS  The building shall provide adequate space, with a logical flow of materials, products and personnel, and physical separation of raw from processed areas.  NOTE Examples of physical separation may include walls, barriers or partitions, or sufficient distance to minimize risk.  Openings intended for transfer of materials shall be designed to minimize entry of foreign matter and pests.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:48:02', '2025-01-14 17:48:02'),
(465, 70, '5', 'INTERNAL DESIGN, LAYOUT AND TRAFFIC PATTERNS  The building shall provide adequate space, with a logical flow of materials, products and personnel, and physical separation of raw from processed areas.  NOTE Examples of physical separation may include walls, barriers or partitions, or sufficient distance to minimize risk.  Openings intended for transfer of materials shall be designed to minimize entry of foreign matter and pests.', '2', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:48:02', '2025-01-14 17:48:02'),
(466, 70, '5', 'LOCATION OF EQUIPMENT  Equipment shall be designed and located so as to facilitate good hygiene practices and monitoring.  Equipment shall be located to permit access for operation, cleaning, and maintenance.', '5', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:51:28', '2025-01-14 17:51:28');
INSERT INTO `template_details` (`id`, `template_id`, `template_name`, `question`, `question_name`, `sdg`, `nc`, `response`, `response_group`, `remarks`, `suggestions`, `created_at`, `updated_at`) VALUES
(467, 70, '5', 'LABORATORY FACILITIES  In-line and online test facilities shall be controlled to minimize the risk of product contamination.  Microbiology laboratories shall be designed, located, and operated so as to prevent contamination of people, plants,s, and products. They shall not open directly onto a production area.', '5', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:51:43', '2025-01-14 17:51:43'),
(468, 70, '5', 'Floors are non-absorbent, non-slippery & sloped appropriately.', '6', NULL, NULL, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:53:01', '2025-01-14 17:53:01'),
(469, 71, 'Template name', '1', 'Allergen protocol is the in place.', NULL, 2, NULL, 'ID_1701271149', NULL, NULL, '2025-01-14 17:55:06', '2025-01-14 18:28:20'),
(471, 35, 'RECEIVING AREA', 'Receiving area floor wall celing are smooth, non absorbant, damage free', '1', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(472, 35, 'RECEIVING AREA', 'Light fixtures are shatter proof and lux intensity is appropriate for area', '2', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(473, 35, 'RECEIVING AREA', 'Are the receiving monitoring equipment, such as contact or IR thermometers and weighing balances, calibrated? Is there documentation available for calibration reports?', '3', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(474, 35, 'RECEIVING AREA', 'Is the vendor\'s hygiene considered satisfactory during the receiving process?', '4', '12', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(475, 35, 'RECEIVING AREA', 'Is pest control implemented and adequately maintained?', '5', '12', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(476, 35, 'RECEIVING AREA', 'Is there a record available that indicates that frozen food is received at -18°C?', '6', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(477, 35, 'RECEIVING AREA', 'Is there a record available to verify that chilled food was received at a temperature below 5°C?', '7', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(478, 35, 'RECEIVING AREA', 'Is the personal hygiene of staff satisfactory when receiving food', '8', '12', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(479, 35, 'RECEIVING AREA', 'How often are receiving thermometers calibrated, both internally (every 3 months) and externally (once a year)?', '9', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(480, 35, 'RECEIVING AREA', 'Is the cleaning and sanitization of the receiving area satisfactory?', '10', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(481, 35, 'RECEIVING AREA', 'Is equipment maintenance performed regularly according to a preventive maintenance (PM) schedule?', '11', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(482, 35, 'RECEIVING AREA', 'Are the appropriate signages in place as per the process requirements?', '12', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(483, 35, 'RECEIVING AREA', 'Is the floor marking in the receiving area provided with a distance of 10-12 feet?', '13', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(484, 35, 'RECEIVING AREA', 'Is there a provision for a hygiene station for vendors during the receiving time?', '14', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(485, 35, 'RECEIVING AREA', 'Is the receiving area equipped to receive the product schedule? Is the product receipt aligned with the provided schedule?', '15', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(486, 35, 'RECEIVING AREA', 'Are there separate product inspections conducted for the vegetarian and non-vegetarian sections? Are any measures implemented to prevent cross-contamination between the two sections?', '16', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(487, 36, 'STORAGE AREA', 'Floor wall ceiling are smooth, non absorbant, damage free and mold and mildew free', '1', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(488, 36, 'STORAGE AREA', 'Storage area is sufficient to store food products', '2', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(489, 36, 'STORAGE AREA', 'Racks are 1 ft away from wall and 6\" inches height from ground level', '3', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(490, 36, 'STORAGE AREA', 'Products are labelled and FIFO/FEFO is being followed?', '4', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(491, 36, 'STORAGE AREA', 'Light fixtures are shatter proof and lux intensity is appropriate', '5', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(492, 36, 'STORAGE AREA', 'Pest control measures are adequate in place?', '6', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(493, 36, 'STORAGE AREA', 'Person Hygiene of staff found satisfactory?', '7', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(494, 36, 'STORAGE AREA', 'Appropriate documents and records available ?', '8', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(495, 36, 'STORAGE AREA', 'Time and temperature control is monitored and documented on regular basis', '9', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(496, 36, 'STORAGE AREA', 'Rejected material has designed place and well marked on rack', '10', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(497, 36, 'STORAGE AREA', 'Frozen food stored at -18°C', '11', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(498, 36, 'STORAGE AREA', 'Chilled food stored at <5°C', '12', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(499, 36, 'STORAGE AREA', 'Room temperature for dry store is at 10°C -24°C', '13', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(500, 36, 'STORAGE AREA', 'Bulk material is stored on pallets (SS, Plastic). Wooden pallets are not acceptable', '14', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(501, 36, 'STORAGE AREA', 'Food products are packed and sealed in food graded material', '15', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(502, 36, 'STORAGE AREA', 'Cleaning and sanitisation is sufficient and as per the schedules?', '16', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(503, 36, 'STORAGE AREA', 'Store shall be free from dust, dirt and cobwebs', '17', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(504, 36, 'STORAGE AREA', 'Storage practices are satisfactory and safe?', '18', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(505, 36, 'STORAGE AREA', 'Allergen protocol is the in place.', '19', '9', NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(506, 37, 'PRE-PREPARTION AREA', 'Is the personal hygiene of the staff found to be satisfactory?', '1', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(507, 37, 'PRE-PREPARTION AREA', 'Is the cleaning and sanitization carried out according to the established schedules?', '2', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(508, 37, 'PRE-PREPARTION AREA', 'Are the light fixtures shatterproof, and is the lux intensity appropriate?', '3', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(509, 37, 'PRE-PREPARTION AREA', 'Are chopping boards and knives sanitized?', '4', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(510, 37, 'PRE-PREPARTION AREA', 'Are the food handling practices of the food handlers satisfactory?', '5', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(511, 37, 'PRE-PREPARTION AREA', 'Are the floor, walls, and ceiling smooth, non-absorbent, free from damage, mold, and mildew?', '6', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(512, 37, 'PRE-PREPARTION AREA', 'Is the thawing process conducted at a temperature below 5°C in accordance with the thawing protocol?', '7', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(513, 37, 'PRE-PREPARTION AREA', 'Water used for cleaning and washing purposes should be potable. Shall comply with IS 10500 standard.', '8', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(514, 37, 'PRE-PREPARTION AREA', 'Food handlers shall have their knowledge and practices regarding glove usage and discarding procedures.', '9', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(515, 37, 'PRE-PREPARTION AREA', 'Waste management be implemented in accordance with the guidelines set by the local municipality?', '10', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(516, 37, 'PRE-PREPARTION AREA', 'Is color coding implemented for chopping boards and knives to prevent cross-contamination?', '11', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(517, 37, 'PRE-PREPARTION AREA', 'Is the hot water supply labeled and is the temperature set above 45°C?', '12', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(518, 37, 'PRE-PREPARTION AREA', 'Does the design of the drainage system ensure prevention of backflow, entry of pests, and eliminate water stagnation during operations?', '13', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(519, 37, 'PRE-PREPARTION AREA', 'Is there a provision for a hygiene station for the working staff?', '14', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(520, 37, 'PRE-PREPARTION AREA', 'Is there any pest control measures taken at the pre-preparation area to ensure pest control measures are in place?', '15', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(521, 37, 'PRE-PREPARTION AREA', 'Provide the state of a specific piece of equipment within this zone, including its code, sanitation status, and visual condition.', '16', NULL, NULL, NULL, 'ID_1699449237', NULL, NULL, '2025-01-15 07:13:56', '2025-01-15 07:13:56'),
(522, 39, 'dummy test 1', 'HHWHJIHJIHWJE WOKVNW VOMWEMV', '1', '3', 1, NULL, 'ID_1701271149', NULL, NULL, '2025-02-15 13:33:32', '2025-02-15 13:36:03'),
(524, 39, 'dummy test 1', 'THIS IS DUMMY', 'DUMM 6', '4', 1, NULL, 'ID_1701271149', NULL, NULL, '2025-02-15 13:34:29', '2025-02-15 13:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `temp_folders`
--

CREATE TABLE `temp_folders` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_folders`
--

INSERT INTO `temp_folders` (`id`, `title`, `created_at`, `updated_at`) VALUES
(18, 'FSMS', '2023-10-27 14:13:42', '2023-11-29 15:09:42'),
(19, 'fssai schedule iv catering', '2025-01-14 09:18:00', '2025-01-14 11:40:15'),
(21, 'fssai schedule iv catering (copy)', '2025-01-15 07:13:56', '2025-01-15 07:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `audit_start_date` text NOT NULL,
  `location` text NOT NULL,
  `amount` text NOT NULL,
  `evidences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `key_points` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `client` text NOT NULL,
  `members` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'mambers are auditors/employees',
  `attendees` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `trainer_sign` varchar(255) DEFAULT NULL,
  `trainee_sign` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT 'upcoming=0,inprogress=1,completed=2',
  `completed_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `topic`, `audit_start_date`, `location`, `amount`, `evidences`, `key_points`, `client`, `members`, `attendees`, `trainer_sign`, `trainee_sign`, `created_at`, `updated_at`, `deleted_at`, `status`, `completed_at`) VALUES
(1, 'training live', '2023-10-25T15:25', 'gurgaon', '1000', NULL, NULL, '37', '[\"1\"]', '[\"1\"]', NULL, NULL, '2023-10-25 05:53:39', '2023-10-27 09:38:08', '2023-10-27 09:38:08', 2, '2023-10-25 11:26:30'),
(2, 'training live 2', '2023-10-25T14:54', 'gurgaon', '1252', '[\"storage\\/training\\/2bb0502c80b7432eee4c5847a5fd077b.jpg\",\"storage\\/training\\/b6f76d7dbb84020faf70b18a13d73a27.webp\"]', '[\"key point 1.\",\"key point 2.\"]', '37', '[\"1\"]', '[\"1\"]', NULL, NULL, '2023-10-25 07:24:34', '2023-10-25 08:16:27', '2023-10-25 08:16:27', 2, '2023-10-25 13:25:01'),
(3, 'training live 44', '2023-10-25T14:27', 'haryanja', '2727', NULL, NULL, '37', '[\"\"]', '[\"1\"]', NULL, NULL, '2023-10-25 07:57:33', '2023-10-25 08:16:23', '2023-10-25 08:16:23', 2, '2023-10-25 13:28:34'),
(4, 'live training 3', '2023-10-25T14:47', 'qwertyujhb vrhg,j', '27827', '[]', '[\"gbgent hytnhtenhet\",\"mjmukit kuikui\"]', '37', '[\"1\"]', '[\"1\"]', '6538cf54682ab.png', '6538cf9b51671.png', '2023-10-25 08:16:50', '2023-10-27 09:38:03', '2023-10-27 09:38:03', 2, '2023-10-25 13:58:11'),
(5, 'Training One', '2023-10-27T21:47', 'Gurgaon 122002', '500', '[\"storage\\/training\\/255ea887b8bca36797426dfb35a809cc.jpg\",\"storage\\/training\\/3d41a69d87004164011ccde965b0a18f.jpg\"]', '[\"Key point one\",\"key point two\"]', '38', '[\"1\"]', '[\"1\",\"2\"]', NULL, NULL, '2023-10-27 16:18:26', '2023-10-28 00:48:38', '2023-10-28 00:48:38', 2, '2023-10-27 22:56:14'),
(6, 'Training two', '2023-10-27T22:56', 'Gurgaon haryana 122001', '500', '[\"storage\\/training\\/96a93ba89a5b5c6c226e49b88973f46e.jpg\",\"storage\\/training\\/fb09f481d40c4d3c0861a46bd2dc52c0.webp\"]', '[\"wertyui\",\"zxcvbnm\",\"asdfghjkl\"]', '38', '[\"3\"]', '[\"2\"]', NULL, NULL, '2023-10-27 17:27:57', '2023-10-28 04:55:29', '2023-10-28 04:55:29', 2, '2023-10-27 23:06:43'),
(7, 'training five', '2023-10-28T06:18', 'gurgaon', '456', '[\"storage\\/training\\/0aca829c00e4fe15c9523e665f681643.jpg\"]', '[\"qwerttyyuioop\"]', '38', '[\"1\"]', '[\"2\"]', NULL, NULL, '2023-10-28 00:49:11', '2023-10-28 04:55:31', '2023-10-28 04:55:31', 2, '2023-10-28 06:19:49'),
(8, 'Training six', '2023-10-28T10:25', 'Gurtgaon', '545', '[\"storage\\/training\\/b71f5aaf3371c2cdfb7a7c0497f569d4.jpg\",\"storage\\/training\\/24917db15c4e37e421866448c9ab23d8.webp\"]', '[\"training key point one.\",\"training key point two.\"]', '38', '[\"2\"]', '[\"1\",\"2\"]', '653c948de16c3.png', '653c949b3000c.png', '2023-10-28 04:55:52', '2023-10-28 04:56:59', NULL, 2, '2023-10-28 10:26:28'),
(9, 'IMPORTANCE BRC IN FOOD INDUSTRIES CERTIGO QAS PRIVATE LIMITED', '2023-10-30T17:48', 'BISWESWAR', '16000', NULL, NULL, '39', '[\"7\"]', '[\"1\",\"2\"]', NULL, NULL, '2023-10-30 07:13:54', '2023-10-30 07:28:07', NULL, 2, '2023-10-30 12:58:07'),
(10, 'IMPORTANCE BRC IN FOOD INDUSTRIES CERTIGO QAS PRIVATE LTD>', '2023-10-30T15:51', 'Biseswar', '656744', '[\"storage\\/training\\/341cd40532980c4909c8c647f2138c03.jpeg\",\"storage\\/training\\/b166b57d195370cd41f80dd29ed523d9.jpg\"]', '[\"bafkheauilfh\",\"df ebkafhijaf\",\"dshehrt\",\"trhrth\",\"rtherthreth\"]', '38', '7', '[\"1\",\"2\"]', '653f5ce3e1002.png', '653f5d761fd9f.png', '2023-10-30 07:34:14', '2025-02-15 13:13:08', NULL, 2, '2025-02-15 18:43:08'),
(11, 'Trainig progress', '2023-10-30T16:00', 'Gurgaon', '1600', NULL, NULL, '38', '7,1', '[\"2\"]', '656f12418ffe0.png', '656f127b1f53c.png', '2023-10-30 07:56:13', '2023-12-05 12:07:23', NULL, 2, '2023-12-05 17:37:23'),
(12, 'Training 55', '2023-10-30T15:04', 'Gurgaon haryana', '1422', '[]', '[\"Cross contamination\",\"hand to hand\",\"contact to contact\",\"surface to surface\",\"equipment to surface\",\"Equipement to equipment\"]', '40', '[\"7\"]', '[\"1\",\"2\"]', '65829cf7c744e.png', '65829d010e219.png', '2023-10-30 09:37:33', '2023-12-20 08:12:26', NULL, 2, '2023-12-20 13:42:26'),
(13, 'Certigo Training', '2023-12-30T18:09', 'Sector-39, Gurgaon, Haryana, India', '2000', '[\"storage\\/training\\/322f62469c5e3c7dc3e58f5a4d1ea399.jpg\",\"storage\\/training\\/5cb22b6ada9b860235e5e20975f23de3.jpg\",\"storage\\/training\\/0ebb145bdffd37c6947bd60c251df1ba.jpg\"]', '[\"Training key point one.\",\"Training key point two.\",\"Training key point three. Training key point three. Training key point three. Training key point three. Training key point three\"]', '38', '7', '[\"1\",\"2\",\"3\"]', '6584322b4f1b3.png', '658432367c14e.png', '2023-12-21 12:18:01', '2023-12-21 12:40:23', NULL, 2, '2023-12-21 18:10:23'),
(14, 'IMPORTANCE BRC IN FOOD INDUSTRIES CERTIGO QAS PRIVATE LIMITED', '2024-01-27T14:42', 'BISWESWAR', '0', '[]', '[\"Cross Contamination\",\"Contamination\",\"Hand Contamination\",\"Equipment contamination\",null]', '42', '[\"1\"]', '[\"1\"]', '65b4ca637514e.png', '65b4ca72ae58b.png', '2024-01-27 09:13:00', '2024-01-27 09:18:43', NULL, 2, '2024-01-27 14:48:43'),
(15, 'lkmjnhbgv', '2025-01-24T18:56', 'gurgao', '10', '[\"storage\\/training\\/4f6312fa44a894eab0d022fce42592bf.jpg\"]', '[\"In the client audit view report, show previous responses if the same template is selected, including scores.\",\"In the client audit view report, show previous responses if the same template is selected, including scores.\",\"In the client audit view report, show previous responses if the same template is selected, including scores.\"]', '39', '[\"1\",\"2\",\"3\"]', '[\"2\",\"3\"]', '67947d1935e6a.png', '67947d242efb3.png', '2025-01-24 13:26:19', '2025-01-25 05:56:52', NULL, 2, '2025-01-25 11:26:52'),
(16, 'ukiyujhvfcd', '2025-01-26T11:40', 'gbrvberv', '1000', NULL, NULL, '48', '1', '[\"1\"]', NULL, NULL, '2025-01-25 06:07:10', '2025-01-25 06:10:24', NULL, 1, NULL),
(17, 'qwerty', '2025-02-15T21:35', 'qwerty', '1000', NULL, NULL, '50', '[\"1\",\"2\",\"11\"]', '[\"1\",\"2\"]', NULL, NULL, '2025-02-15 13:06:29', '2025-02-15 13:06:29', NULL, 0, NULL),
(18, 'test123', '2025-02-17T13:59', 'gurugram', '100', NULL, NULL, '38', '1', '[\"1\",\"2\"]', NULL, NULL, '2025-02-17 08:11:23', '2025-02-17 08:29:35', NULL, 1, NULL),
(19, 'Test 12345', '2025-02-17T14:51', 'guru', '200', NULL, NULL, '50', '11', '[\"1\",\"2\",\"3\"]', NULL, NULL, '2025-02-17 09:21:55', '2025-02-17 09:21:55', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=active, 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `designation`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'Sandeep', 'smsunnythefunny@gmail.com', 'Top Level Executive', NULL, '$2y$10$DZND/4wD218Fy7buZJIxa.OwSFVuBpAh55aKloz0Bx0tpTOnv6N4m', NULL, 1, '2023-06-21 06:03:59', '2023-12-01 11:26:44', NULL, 1),
(2, 'Anurag', 'sanurag0022@gmail.com', NULL, NULL, '$2y$10$z1BycyNcO2VNP0llqXRooerCEdC/uUb1KMwzz.vYZ8y2hgnI81S9y', NULL, 0, '2023-07-01 00:35:34', '2023-07-17 23:43:26', NULL, 1),
(3, 'Deepak', 'sandeep.meh28@gmail.com', 'Sub-Admin level', NULL, '$2y$10$1ZpONwaeBhEIQDBkqnzIZuPs7cqZHibYzv2v2HFAsw5M.zDaw3goe', NULL, 2, '2023-07-15 01:19:28', '2023-12-01 12:55:31', NULL, 1),
(5, 'qwerty', 'sandeep.meh2@gmail.com', NULL, NULL, '$2y$10$kZbZx9wwYwKnBKfvL26hCuKe/SPictQ6OA90kDFFTF4fWIrI5gpdO', NULL, 0, '2023-07-17 06:39:30', '2023-07-17 06:56:03', '2023-07-17 06:56:03', 1),
(6, 'Saransh Dubey', 'sandeep.me28@gmail.com', NULL, NULL, '$2y$10$CIiLUsnuqPU60RONbJwML.1ZUPGDnGJCQpax2VoR/c94E95d5DvES', NULL, 0, '2023-07-17 07:14:38', '2025-01-14 09:06:12', NULL, 1),
(7, 'T KAVYA', 'kavya.t@certigoqas.com', 'Mid Level Executive', NULL, '$2y$10$tvHDqbTJIErIbETVTw4Pjeqni2NFjn/igNIyEnT/qfLyClvjYo1Oa', NULL, 2, '2023-10-27 05:15:42', '2025-01-14 09:06:03', '2025-01-14 09:06:03', 1),
(8, 'Sheela', 'sheela@certigoqas.com', 'admin', NULL, '$2y$10$caEs4GlrEMbgapl/cLblc.vk0Kw0Nb6aHhh.4TZNPv7loBEoL3vAK', NULL, 1, '2025-01-13 17:29:04', '2025-01-13 17:29:04', NULL, 1),
(9, 'G SAI MOUNIKA', 'sai.mounika@certigoqas.com', 'OPERTATIONS MANAGER', NULL, '$2y$10$68nYZq6u3U0TP8lPkUrxo.lnSROZn67hEbbdvg.IeeC10EJPR8C8C', NULL, 2, '2025-01-14 09:07:35', '2025-01-14 09:07:35', NULL, 1),
(10, 'Ravi', 'ravi@gmail.com', 'sub admin', NULL, '$2y$10$/NNz5hCqWtMzJXzyd.90We5ohpn1RIrPX.sk.KVFHfj0SvWXTxH3i', NULL, 2, '2025-01-14 07:13:49', '2025-01-14 07:13:49', NULL, 1),
(11, 'aniket', 'aniket@gmail.com', 'dev', NULL, '$2y$10$prK.bLNNNmapzfyHRX7RROzWIficxxITXuDuZYEvK4h.hEe49zmHC', NULL, 0, '2025-01-14 07:32:24', '2025-01-14 07:32:24', NULL, 1),
(12, 'Ravi', 'racvi@gmail.com', 'HR', NULL, '$2y$10$Sj2zyN1KJuAeb.xW6aATre1WeAVfTOlTIjbH1FfqpgrPiNncKGYY.', NULL, 3, '2025-01-28 07:19:25', '2025-01-28 07:19:25', NULL, 1),
(13, 'Test Subadmin', 'testsubadmin@gmail.com', 'Sub', NULL, '$2y$10$azqxFIJMenLt/1ejgWnQBOxCXUqhE8knITPzmcQzvew.rPPmkgvoS', NULL, 2, '2025-02-15 13:14:51', '2025-02-15 13:14:51', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_letters`
--
ALTER TABLE `appointment_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditors`
--
ALTER TABLE `auditors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_details`
--
ALTER TABLE `audit_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_reports`
--
ALTER TABLE `completed_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consolidated_reports`
--
ALTER TABLE `consolidated_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_scores`
--
ALTER TABLE `department_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `graph_types`
--
ALTER TABLE `graph_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objective_responses`
--
ALTER TABLE `objective_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_letters`
--
ALTER TABLE `offer_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pay_slips`
--
ALTER TABLE `pay_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `report_colors`
--
ALTER TABLE `report_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_codes`
--
ALTER TABLE `service_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_details`
--
ALTER TABLE `template_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_folders`
--
ALTER TABLE `temp_folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
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
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appointment_letters`
--
ALTER TABLE `appointment_letters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auditors`
--
ALTER TABLE `auditors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `audit_details`
--
ALTER TABLE `audit_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `completed_reports`
--
ALTER TABLE `completed_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consolidated_reports`
--
ALTER TABLE `consolidated_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `department_scores`
--
ALTER TABLE `department_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `graph_types`
--
ALTER TABLE `graph_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `objective_responses`
--
ALTER TABLE `objective_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `offer_letters`
--
ALTER TABLE `offer_letters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pay_slips`
--
ALTER TABLE `pay_slips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_colors`
--
ALTER TABLE `report_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_codes`
--
ALTER TABLE `service_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `template_details`
--
ALTER TABLE `template_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;

--
-- AUTO_INCREMENT for table `temp_folders`
--
ALTER TABLE `temp_folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
