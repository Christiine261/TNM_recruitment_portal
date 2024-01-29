-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 06:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnm_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `certification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cvform_id` int(11) DEFAULT NULL,
  `certification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`certification_id`, `user_id`, `cvform_id`, `certification`) VALUES
(8, 1, 6, 'CCN'),
(9, 7, 7, 'CCNA'),
(10, 8, 8, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` int(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cvform`
--

CREATE TABLE `cvform` (
  `cvform_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cv_file_name` varchar(255) NOT NULL,
  `cover_letter_file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cvform`
--

INSERT INTO `cvform` (`cvform_id`, `user_id`, `full_name`, `address`, `phone_number`, `email`, `cv_file_name`, `cover_letter_file_name`) VALUES
(6, 1, 'christine chagomerana', 'luwinga', '0996032230', 'christiechagoe@gmail.com', 'uploads/portfolios/cv_1.pdf', 'uploads/portfolios/cover letter_1.pdf'),
(7, 7, 'Mary Banda', 'mzuzu', '0880042412', 'marybanda@gmail.com', 'uploads/portfolios/cv 6.pdf', 'uploads/portfolios/cover letter 1 (5).pdf'),
(8, 8, 'Donald', 'Mzuni', '0993213456', 'dmp@gmail.com', 'uploads/portfolios/cv 4.pdf', 'uploads/portfolios/cover letter 1 (4).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cvform_id` int(11) DEFAULT NULL,
  `degree` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `graduation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `user_id`, `cvform_id`, `degree`, `institution`, `graduation_date`) VALUES
(9, 1, 6, 'bachelor&#039;s ICT', 'Mzuni', '2021-12-12'),
(10, 1, 6, 'diploma ICT', 'Mzuni', '2016-11-11'),
(11, 7, 7, 'first degree', 'mzuni', '2023-08-07'),
(12, 7, 7, 'masters', 'mubas', '2022-02-08'),
(13, 8, 8, 'Bsc in IT', 'Mzuni', '2023-12-19'),
(14, 8, 8, 'Bsc in IT', 'Mzuni', '2023-12-19'),
(15, 8, 8, 'CCNA', 'CISCO', '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `hr_details`
--

CREATE TABLE `hr_details` (
  `HR_id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_picture` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_details`
--

INSERT INTO `hr_details` (`HR_id`, `fullname`, `email`, `password`, `profile_picture`) VALUES
(1, 'stanley phiri', 'logahstankey@gmail.com', 'logah11', 0x494d472d32303233303931342d5741303031372e6a7067),
(2, 'logah', 'logahstanley@yahoo.com', '123456', ''),
(3, 'christine', 'christiechagoe@gmail.com', 'chagoe@162001', 0x536e6170636861742d34313930303235322e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `intervier_scheduling`
--

CREATE TABLE `intervier_scheduling` (
  `scheduling_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `interview_date` datetime NOT NULL,
  `interview_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interviewers`
--

CREATE TABLE `interviewers` (
  `interviewer_id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `qualifications` text NOT NULL,
  `responsibilities` text NOT NULL,
  `deadline_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_code`, `job_title`, `job_description`, `qualifications`, `responsibilities`, `deadline_date`, `status`) VALUES
(3, '', 'developer7', 'we are hiring a web app developer', 'qualification\r\nqualification', 'develop', '2024-01-23 00:00:00', 'closed'),
(6, '', 'Corporate Network Administrator', 'the successfull candidate shall be expected to plan, implement, and manage TNM\'s computer network and ensure efficiency, security , and reliability the candidate will work with various network technologies, hardare, and software to maintain seamless communication and data exchange within TNM and with partner organizations.', 'bachelors degree in computer science, infirmation technology, electronic enegineering, or related field\r\nCisco Certified Network Associate (CCNA)\r\nCisco Certified Network Professional (CCNP)\r\nminimum of 2 years work experience in a related field.', 'designs and plans network infrastructure to meet TNM\'s current and future connectivity needs, including LANs (Local Area Networks) and WANs (Wide Area Networks).\r\nPlans and executes network upgrades, expansions, and hardware replacements to accommodate business frowth and changing requirements.\r\nProvides input in designing and development of business continuity and disaster recovery plans.\r\nDevelops disaster recovery procedures to recover from network failures or disasters \r\nConducts systems backups and DR tests for the Corporate Network according to approved policies.\r\nMonitors network performance (availability, utilization, throughput, and latency) and test for weakness.\r\ncoordinates with the helpdesk for corporate network support services and incident management.\r\nUpdates and maintains corporate network IP addressing schemed and VLANs.\r\nEnsures LAN maintainance in TNM business and service centres.\r\nMaintains up-to-datte high-level and low-level diagrams.\r\nUpdates and maintains corporate network inventory. ', '2024-01-23 00:00:00', 'closed'),
(8, '', 'Customer service director', 'The customer services director is responsible for shaping the customer service strategy, driving customer engagement and satisfaction, and ensuring operational excellence in our services delivery. The role is crucial in achieving  TNM Plc strategic objectives and enhancing the customer experience. this is a leadership role that reports to the Chief Commercial Officer ', 'Minimum of Master\'s degree in Business Administration, Business management, Financial Management or any related field\r\nMinimum 8 years working experience in customer services at a senior managerial level.\r\nExperience in the telecommunication industry is an added advantage.\r\nKey skills - strategic planning, customer and results orientation, negotiation, leadership, excellent communication and business acumen.', 'Develop a customer service strategy to dive customer acquisition, satisfaction, retention, interaction, and profitability.\r\nDevelop the customer demand management roadmap to meet defined targets.\r\nDevelop and review customer service survey tools to gather valuable customer insights.\r\nMonitor trends and KPIs to ensure the highest quality of services.\r\nEnsure seamless on boarding process for new customers.\r\nUtilize customer insights to design personalized propositions and support  digital adoption.\r\nDevelop and implement Call Centre Service performance standards to ensure compliance with regulatory requirements.\r\nDevelop and monitor Quality Assurance (QA) programs.\r\nEnsure business continuity for Call Centre Services.\r\nEstablish new retail outlets based on strategic business direction.\r\nMaintain uniform service standards across all retail shops.\r\nNegotiate SLA contracts and define  technology  requirements for operational efficiency.\r\nLead, mentor, motivate and manage the customer services team  for productivity, excellence  and career advancement.', '2024-02-10 00:00:00', 'closed'),
(9, '', 'Monitoring and Evaluation Officer1', 'The Monitoring and Evaluation Officerwill supportclinical department, community health department, research, data collection, analysis, visualization, and reporting. This will include ongoing data collection activities with different platforms (CommCare, Tovuti LMS, DHIS2, electronic medical records (EMR), Microsoft Excel, and paper-based data collection).\r\n\r\nThis position focuses on designing the data collection mechanisms, ensuring appropriate implementation, reviewing data collected for quality assurance and quality improvement purposes, and training/overseeing data collection among program teams', 'Minimum of a Bachelor’s Degree of Science in Statistics/Information Technology,or any other related field.\r\nMinimum of two years’ experience working with tablet-based data collection systems such as CommCare or ODK.\r\nMinimum of three years’ experience organizing, analysing, and presenting data in Microsoft Excel.\r\nPrior experience managing other members of data collection teams and executing quality assurance and quality improvement protocols.\r\nExpertise in survey design, quantitative data analysis, and program management.\r\nExperience with Stata, R, Power BI, Python, SAS, or other analytic software a plus.\r\nExperience with Microsoft Power BI, Tableau, or other data visualization software a plus.\r\nNative of Malawi, fluent in Chichewa and English, with written proficiency in English.\r\nAbility to work well in a dynamic team environment alongside health workers, support staff, and health personnel from various backgrounds.\r\nAble to work under minimum supervision.', 'Support M&E for all departments (clinical, community, operations) and trainings.\r\nCreate comprehensive monitoring and evaluation plans focusing on measuring the impact of programs from all departmentssuch as WDF, cervical cancer, GAIN, Teen Club,non-communicable disease (NCD), HIV, POSER, CHW, CP, SHARC, mental health.\r\nReview and maintain dashboards that highlight programmatic performance, including Organisation high-level indicators and Organization Strategic Plan.\r\nDevelop routine data collection tools and digitalize using CommCare, DHIS2, Tovuti LMS for Takeda Grant, EMR, Sharepoint, PowerBI, and any digital device to track programmatic indicators.\r\nAnalyse data and generate reports/presentations to support decision-making and ensure reports are submitted on time and of good quality.\r\nMentor chronic disease and primary health care facility clinical teams, Community teams (Site supervisors, officers, and coordinators), and data technicians in data interpretation, review, utilization, and presentation.\r\nWork with HMIS Officers in Neno and other districts as well as Clinical and Community teams on data collected during emergency response and training them on the data collection tools used for the exercises, developed by the PIH team (Commcare, PowerBI, etc.) or other implementing partners, including Malawi Government.', '2024-02-10 00:00:00', 'open'),
(23, '', 'test1', 'sdhmhbvnh', 'hgnbgchngh', 'yhghnvbngh', '2024-01-26 00:00:00', 'open'),
(25, 'KA290516', 'kgukh', 'jugjg', 'hghjgj', 'kljhk,j', '2024-01-26 00:00:00', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `application_code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cv_file_path` varchar(255) NOT NULL,
  `cover_letter_file_path` varchar(255) NOT NULL,
  `score` int(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `application_code`, `user_id`, `job_id`, `fullname`, `email`, `cv_file_path`, `cover_letter_file_path`, `score`, `status`) VALUES
(44, '', 1, 3, 'christina chago', 'christiechagoe@gmail.com', '', '', 98, 'pending'),
(45, '', 2, 6, 'stanley phiri', 'logah@gmail.com', '/uploadscv.pdf', 'uploads/cover_letter.pdf', 100, 'shortlisted'),
(46, '', 2, 8, 'stanley phiri', 'logah@gmail.com', '/uploadscv.pdf', 'uploads/cover_letter.pdf', 80, 'shortlisted'),
(47, '', 2, 3, 'christina chago', 'logah@gmail.com', '/uploadscv.pdf', 'uploads/cover_letter.pdf', 100, 'pending'),
(48, '', 1, 6, 'christina chago', 'christiechagoe@gmail.com', '/uploadscv.pdf', 'uploads/cover_letter.pdf', 95, 'shortlisted'),
(49, '', 1, 8, 'christina chago', 'christiechagoe@gmail.com', '/uploadscv.pdf', 'uploads/cover_letter.pdf', 80, 'shortlisted'),
(50, '', 4, 3, 'Donald Phiri', 'donald@gmail.com', '/uploadscv 4.pdf', 'uploads/cover_letter.pdf', 80, 'pending'),
(51, '', 4, 6, 'Donald Phiri', 'donald@gmail.com', '/uploadscv 2.pdf', 'uploads/cover_letter.pdf', 75, 'shortlisted'),
(52, '', 6, 6, 'Maria Ngomba', 'maria@gmail.com', '/uploadscv1.pdf', 'uploads/cover_letter.pdf', 80, 'shortlisted'),
(53, '', 7, 6, 'Mary Banda', 'marybanda@gmail.com', '/uploadscv 4.pdf', 'uploads/cover_letter.pdf', 80, 'shortlisted');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(10) NOT NULL,
  `shortlisted_id` int(20) NOT NULL,
  `message` text NOT NULL,
  `job_title` text NOT NULL,
  `job_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `shortlisted_id`, `message`, `job_title`, `job_id`, `created_at`) VALUES
(3, 8, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-20 01:31:58'),
(4, 9, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-20 01:31:58'),
(5, 10, 'Congratulations! You have been shortlisted for the position of developer.', 'developer', 0, '2024-01-21 02:10:15'),
(6, 11, 'Congratulations! You have been shortlisted for the position of developer.', 'developer', 0, '2024-01-21 02:10:15'),
(7, 12, 'Congratulations! You have been shortlisted for the position of Executive search: Customer service director.', 'Executive search: Customer service director', 0, '2024-01-21 05:41:58'),
(8, 13, 'Congratulations! You have been shortlisted for the position of Executive search: Customer service director.', 'Executive search: Customer service director', 0, '2024-01-21 05:41:58'),
(9, 14, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-21 05:42:35'),
(10, 15, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-21 05:42:35'),
(11, 16, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-21 05:42:35'),
(12, 17, 'Congratulations! You have been shortlisted for the position of developer.', 'developer', 0, '2024-01-21 05:43:22'),
(13, 18, 'Congratulations! You have been shortlisted for the position of developer.', 'developer', 0, '2024-01-21 05:43:22'),
(14, 19, 'Congratulations! You have been shortlisted for the position of developer.', 'developer', 0, '2024-01-21 05:43:22'),
(15, 20, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-21 05:43:46'),
(16, 21, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-21 05:43:46'),
(17, 22, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-21 05:43:46'),
(18, 23, 'Congratulations! You have been shortlisted for the position of Corporate Network Administrator-(Tenable in Blantyre).', 'Corporate Network Administrator-(Tenable in Blantyre)', 0, '2024-01-21 05:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `offer_details`
--

CREATE TABLE `offer_details` (
  `offer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `offer_status` enum('accepted','declined') NOT NULL,
  `offer_expiration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professional_experience`
--

CREATE TABLE `professional_experience` (
  `experience_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cvform_id` int(11) DEFAULT NULL,
  `job_title` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `employment_dates` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional_experience`
--

INSERT INTO `professional_experience` (`experience_id`, `user_id`, `cvform_id`, `job_title`, `company_name`, `employment_dates`) VALUES
(6, 1, 6, 'network Adminstrator', 'mzuni', '2'),
(7, 7, 7, 'lecturer', 'airtel', '4'),
(8, 7, 7, 'administrator', 'tnm', '3'),
(9, 8, 8, 'MANAGER', 'UNILIA', '6');

-- --------------------------------------------------------

--
-- Table structure for table `shortlisted`
--

CREATE TABLE `shortlisted` (
  `shortlisted_id` int(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `job_title` varchar(500) NOT NULL,
  `job_id` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortlisted`
--

INSERT INTO `shortlisted` (`shortlisted_id`, `fullname`, `email`, `job_title`, `job_id`, `status`, `date_created`) VALUES
(12, '', '', 'developer7', 0, '', '2024-01-25 10:25:15'),
(13, '', '', 'developer7', 0, '', '2024-01-25 10:25:27'),
(14, '', '', 'developer7', 0, '', '2024-01-25 10:27:18'),
(15, '', '', 'developer7', 0, '', '2024-01-25 10:27:18'),
(16, '', '', 'Corporate Network Administrator', 0, '', '2024-01-25 10:28:08'),
(17, 'stanley phiri', 'logah@gmail.com', 'Corporate Network Administrator', 6, '', '2024-01-25 10:56:53'),
(18, 'stanley phiri', 'logah@gmail.com', 'Customer service director', 8, '', '2024-01-25 10:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cvform_id` int(11) DEFAULT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `user_id`, `cvform_id`, `skill`) VALUES
(8, 1, 6, 'Java'),
(9, 1, 6, 'cisco'),
(10, 7, 7, 'java programming'),
(11, 7, 7, 'graphic design'),
(12, 8, 8, 'CODING'),
(13, 8, 8, 'LEADERSHIP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `activation_status` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_code`, `full_name`, `email`, `password`, `role`, `activation_code`, `activation_status`, `status`, `date_created`) VALUES
(1, '', 'christine', 'christiechagoe@gmail.com', '$2y$10$P1OFHhO9bwQvgOYkvLLcP.E8xYolu0x5saPNB0GoRi7vYAh3lZtKm', 1, '0', 'Verified', 'inactive', ''),
(2, '', 'stanley phiri', 'logah@gmail.com', '$2y$10$XwRId2Iol2pr.DS6VYrKy.qTruySlOQPC8q63/lNKuHfJJp4.slFG', 2, '', 'Not Verified', 'inactive', ''),
(4, '', 'donald Phiri', 'donald@gmail.com', '$2y$10$bax//ioCsdn5FfQJAEVkf.5JfR6we3m1QclGkoJQ8f8hxkuvhAfH.', 2, '', 'Not Verified', 'inactive', ''),
(5, '', 'Christine Chagomerana', 'admin@tnm.co.mw', '$2y$10$du8uKDlwvhV3.E8kG6VG/OUYaUYcYnjlHhzOBIMu5gzJJvNnemu7W', 1, '0', 'Verified', 'Active', ''),
(6, '', 'Maria Ngomba', 'maria@gmail.com', '$2y$10$rGAxvMTnOSEFS4hy2oYQQ.V0XSGZ.huDmJ7Ybpliwa7z9dOa0rvMe', 2, '0000000', 'Not Verified', 'inactive', ''),
(7, '', 'Mary Banda', 'marybanda@gmail.com', '$2y$10$4TiklNNLd46A20W41g5rHeEY191oLZXXhmR2QCZyoUkwWr5eQuCUe', 2, '0', 'Verified', 'Active', ''),
(8, '', 'Chisomo Chadza', 'chisomochadza@gmail.com', '$2y$10$/uHagmOa.4uKQX.AaXro0uGKnaxF/EHtmqLR6pDewFLU9d6cnYr2.', 2, '0', 'Verified', 'Active', ''),
(9, '', 'chikondi chsadza', 'chiccochadza@gmail.com', '$2y$10$RrW5JcRsrIg1acjP8bGZr.CDFlVXK/WwGTGJfl/cxZdZZuhtdApiS', 2, '0', 'Verified', 'Active', ''),
(10, 'DR87643NG63007', 'stanley phiri', 'logahstanley@yahoo.com', '$2y$10$No/u9GUMOJLMcXeQnuuvo.i/9hdQE/OnRfet8sLb40qXUR4F6mKjW', 2, '0', 'Verified', 'Active', '2024-01-24 03:04:23'),
(11, 'EU10116QA70234', 'wezzie p', 'wezzi@gmail.com', '$2y$10$wQPTKqUTdYggrCGsBttZ3eCpM5xCWeUk653KnN3aLB8V4IVYMzYiq', 1, '0', 'Verified', 'Active', '2024-01-24 03:09:05'),
(19, 'XQ01201PL70113', 'logah phiri', 'logahstankey@gmail.com', '$2y$10$DJEN4F6gMpZGwuKWYbKHq.rYiRqcs0pdmvGIdOcfpH7rR.Qv9iedO', 1, '0', 'Verified', 'Active', '2024-01-24 14:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolio`
--

CREATE TABLE `user_portfolio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `graduation_date` date NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `employment_dates` varchar(50) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `certifications` varchar(255) DEFAULT NULL,
  `certifications_file_path` varchar(255) DEFAULT NULL,
  `cv_document_path` varchar(255) NOT NULL,
  `project_links` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_portfolio`
--

INSERT INTO `user_portfolio` (`id`, `user_id`, `full_name`, `address`, `phone_number`, `email`, `degree`, `institution`, `graduation_date`, `job_title`, `company_name`, `employment_dates`, `skills`, `certifications`, `certifications_file_path`, `cv_document_path`, `project_links`, `created_at`) VALUES
(8, 9, 'chikondi chadza', 'Luwinga', '0996032230', 'chiccochadza@gmail.com', 'BICT, DICT', 'mzuni, mzuni', '2024-01-02', 'Developer', 'MZUNI', '3', 'php, python', '', '', 'uploads/cv_documents/cv 3.pdf', '', '2024-01-21 20:59:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`certification_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cvform_id` (`cvform_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `cvform`
--
ALTER TABLE `cvform`
  ADD PRIMARY KEY (`cvform_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cvform_id` (`cvform_id`);

--
-- Indexes for table `hr_details`
--
ALTER TABLE `hr_details`
  ADD PRIMARY KEY (`HR_id`);

--
-- Indexes for table `intervier_scheduling`
--
ALTER TABLE `intervier_scheduling`
  ADD PRIMARY KEY (`scheduling_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `interviewers`
--
ALTER TABLE `interviewers`
  ADD PRIMARY KEY (`interviewer_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `offer_details`
--
ALTER TABLE `offer_details`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `professional_experience`
--
ALTER TABLE `professional_experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cvform_id` (`cvform_id`);

--
-- Indexes for table `shortlisted`
--
ALTER TABLE `shortlisted`
  ADD PRIMARY KEY (`shortlisted_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cvform_id` (`cvform_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `certification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cvform`
--
ALTER TABLE `cvform`
  MODIFY `cvform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hr_details`
--
ALTER TABLE `hr_details`
  MODIFY `HR_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intervier_scheduling`
--
ALTER TABLE `intervier_scheduling`
  MODIFY `scheduling_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interviewers`
--
ALTER TABLE `interviewers`
  MODIFY `interviewer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `offer_details`
--
ALTER TABLE `offer_details`
  MODIFY `offer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional_experience`
--
ALTER TABLE `professional_experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shortlisted`
--
ALTER TABLE `shortlisted`
  MODIFY `shortlisted_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `certifications_ibfk_2` FOREIGN KEY (`cvform_id`) REFERENCES `cvform` (`cvform_id`);

--
-- Constraints for table `cvform`
--
ALTER TABLE `cvform`
  ADD CONSTRAINT `cvform_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `education_ibfk_2` FOREIGN KEY (`cvform_id`) REFERENCES `cvform` (`cvform_id`);

--
-- Constraints for table `intervier_scheduling`
--
ALTER TABLE `intervier_scheduling`
  ADD CONSTRAINT `intervier_scheduling_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `intervier_scheduling_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_details`
--
ALTER TABLE `offer_details`
  ADD CONSTRAINT `offer_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `offer_details_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `professional_experience`
--
ALTER TABLE `professional_experience`
  ADD CONSTRAINT `professional_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `professional_experience_ibfk_2` FOREIGN KEY (`cvform_id`) REFERENCES `cvform` (`cvform_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `skills_ibfk_2` FOREIGN KEY (`cvform_id`) REFERENCES `cvform` (`cvform_id`);

--
-- Constraints for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD CONSTRAINT `user_portfolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
