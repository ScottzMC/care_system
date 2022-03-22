-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2022 at 05:54 AM
-- Server version: 10.3.34-MariaDB-log-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scottjpq_harold`
--

-- --------------------------------------------------------

--
-- Table structure for table `achieve_target`
--

CREATE TABLE `achieve_target` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achieve_target`
--

INSERT INTO `achieve_target` (`id`, `title`) VALUES
(1, 'Commute to school'),
(2, 'Fill their college form'),
(3, 'Reading a book'),
(4, 'Cleaning their room'),
(5, 'Using the Public transport');

-- --------------------------------------------------------

--
-- Table structure for table `appraisal`
--

CREATE TABLE `appraisal` (
  `id` int(11) NOT NULL,
  `title` int(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area_of_support`
--

CREATE TABLE `area_of_support` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_of_support`
--

INSERT INTO `area_of_support` (`id`, `title`) VALUES
(1, ' Budgeting & Managing Finance'),
(2, ' Fire Drill'),
(3, 'Emergency and on call services'),
(4, ' Home Security'),
(5, ' Reporting fault/issues regarding her house'),
(6, ' Maintaining tenancy'),
(7, 'Self Medication/Medical and Appointment'),
(8, 'Areas of need'),
(9, ' Food shopping'),
(10, ' Laundry and Re-sheeting of my bed'),
(11, 'Cooking meals'),
(12, ' Personal Care'),
(14, ' Travelling outside the local community');

-- --------------------------------------------------------

--
-- Table structure for table `area_of_support_comment`
--

CREATE TABLE `area_of_support_comment` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `house_code` varchar(50) NOT NULL,
  `house` varchar(200) NOT NULL,
  `area_support_id` text NOT NULL,
  `title` varchar(200) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_of_support_comment`
--

INSERT INTO `area_of_support_comment` (`id`, `code`, `house_code`, `house`, `area_support_id`, `title`, `comment`) VALUES
(39, 'UYCVXDABT7', 'abcdefghzxcqwe881', 'Collin C', '4', ' Home Security', ''),
(37, 'UYCVXDABT7', 'abcdefghzxcqwe881', 'Collin C', '2', ' Fire Drill', ''),
(38, 'UYCVXDABT7', 'abcdefghzxcqwe881', 'Collin C', '9', ' Food shopping', ''),
(36, 'UYCVXDABT7', 'abcdefghzxcqwe881', 'Collin C', '1', ' Budgeting & Managing Finance', ''),
(35, 'ABXSO123', 'csdf897fks', 'Collin A', '2', ' Fire Drill', 'comment'),
(34, 'ABXSO123', 'csdf897fks', 'Collin A', '1', ' Budgeting & Managing Finance', 'Budgeting'),
(40, 'UYCVXDABT7', 'abcdefghzxcqwe881', 'Collin C', '10', ' Laundry and Re-sheeting of my bed', ''),
(41, 'UYCVXDABT7', 'abcdefghzxcqwe881', 'Collin C', '6', ' Maintaining tenancy', ''),
(42, 'DUYBVCXAT1', 'csdf897fks', 'Collin A', '1', ' Budgeting & Managing Finance', ''),
(43, 'DUYBVCXAT1', 'csdf897fks', 'Collin A', '2', ' Fire Drill', ''),
(44, 'DUYBVCXAT1', 'csdf897fks', 'Collin A', '9', ' Food shopping', ''),
(45, 'DUYBVCXAT1', 'csdf897fks', 'Collin A', '4', ' Home Security', ''),
(46, 'DUYBVCXAT1', 'csdf897fks', 'Collin A', '6', ' Maintaining tenancy', '');

-- --------------------------------------------------------

--
-- Table structure for table `audit_reviews`
--

CREATE TABLE `audit_reviews` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `performed_by` varchar(100) NOT NULL,
  `audit_date` date NOT NULL,
  `improvement_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_reviews`
--

INSERT INTO `audit_reviews` (`id`, `title`, `body`, `performed_by`, `audit_date`, `improvement_date`) VALUES
(1, 'Spiela', 'This is it', 'Admin', '2022-02-08', '2022-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` text NOT NULL,
  `address` longtext NOT NULL,
  `young_person` varchar(100) NOT NULL,
  `house_name` varchar(200) NOT NULL,
  `support` text NOT NULL,
  `time` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`id`, `title`, `type`, `address`, `young_person`, `house_name`, `support`, `time`, `date`) VALUES
(2, 'Looking at an initiative', '', '', '', '', '', 0, '2022-02-02'),
(6, 'Finding a new calendar', '', '', '', '', '', 0, '2022-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `age` int(5) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(10) NOT NULL,
  `ethnic` text NOT NULL,
  `address` longtext NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `child_status` varchar(50) NOT NULL,
  `support_hours` varchar(50) NOT NULL,
  `admission_date` date NOT NULL,
  `exit_date` date NOT NULL,
  `guardian` varchar(20) NOT NULL,
  `nin` varchar(50) NOT NULL,
  `house_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `guardian_fullname` varchar(100) NOT NULL,
  `guardian_email` varchar(100) NOT NULL,
  `guardian_address` longtext NOT NULL,
  `guardian_telephone` varchar(22) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `code`, `fullname`, `email`, `description`, `age`, `dob`, `gender`, `ethnic`, `address`, `telephone`, `child_status`, `support_hours`, `admission_date`, `exit_date`, `guardian`, `nin`, `house_name`, `image`, `guardian_fullname`, `guardian_email`, `guardian_address`, `guardian_telephone`, `created_date`) VALUES
(1, 'ABXSO123', 'Tommy Oxbridge', 'mikaela@email.com', '', 6, '2001-01-01 05:00:00', 'Male', 'Black', 'Test house, Coventry Road', '07445847194', 'Semi-Independent', '10 hours', '2022-03-21', '2022-02-01', 'S20', '', 'House A', 'pexels-food-diets.jpg', 'Mikaela Oxbridge', 'mikaela@email.com', 'Test house, Coventry Avenue', '07445847194', '2022-03-21 00:00:00'),
(4, 'UYCVXDABT7', 'Mike Mikaela', 'tigerphenix24@gmail.com', '', 10, '2011-01-18 05:00:00', 'Male', 'Black', '42 Manser Road\r\n', '07448457194', 'Fostered', '9am-5pm', '0000-00-00', '0000-00-00', 'Father', '', 'House A', 'banner1.jpg', 'Steve Mikaela', 'tigerphenix24@gmail.com', '42 Manser Road\r\n', '07448457194', '2021-09-20 00:00:00'),
(10, 'DUYBVCXAT1', 'Tom Brady', 'brady@email.com', 'This is a young child', 12, '2010-05-18 04:00:00', 'Male', 'Black', '2 Manser Road', '07448457194', 'Fostered', '9am-5pm', '2022-03-17', '0000-00-00', 'Mother', 'SF9903KO', 'Collin B', 'banner3.jpg', 'Stacy', 'stacy@worker.com', '89 Jolly Tol, London', '0998987800', '2022-03-18 00:00:00'),
(11, 'UBATVYCDX2', 'JK', 'JK@jkjkjk', 'Young', 1, '2021-05-05 04:00:00', 'Female', 'Black British', 'Bowes Road\r\n', '0202020202', 'S20', '6', '2022-01-04', '2022-03-15', 'Asylum seeker', '', 'Collin A', '', '', 'HE@hehehe', '02020202', '02020202', '2022-03-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_abilities_evaluation`
--

CREATE TABLE `children_abilities_evaluation` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_abilities_evaluation`
--

INSERT INTO `children_abilities_evaluation` (`id`, `code`, `child_name`, `title`, `body`, `document`, `created_date`) VALUES
(7, 'ABXSO123', 'Tommy Oxbridge', 'New record', '<p>This is a record that has been added.</p>', 'installation.pdf', '2022-01-31 00:00:00'),
(8, 'DUYBVCXAT1', 'Tom Brady', 'All Evaluation', '<p><span style=\"color: rgb(67, 74, 84);\">Comments and further actions when needed</span><br></p>', '476188270.pdf', '2022-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_absences`
--

CREATE TABLE `children_absences` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `borough` varchar(200) NOT NULL,
  `edt_number` varchar(100) NOT NULL,
  `staff1` varchar(200) NOT NULL,
  `staff2` varchar(200) NOT NULL,
  `return_date` date NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_absences`
--

INSERT INTO `children_absences` (`id`, `code`, `child_name`, `title`, `body`, `borough`, `edt_number`, `staff1`, `staff2`, `return_date`, `document`, `created_date`) VALUES
(9, 'ABXSO123', 'Tommy Oxbridge', 'New record', '<p>This is a new record&nbsp;</p>', '', '', '', '', '0000-00-00', 'installation.pdf', '2022-01-31 00:00:00'),
(10, 'DUYBVCXAT1', 'Tom Brady', 'All EDT', '<p><span style=\"color: rgb(67, 74, 84);\">Comments and further actions when needed</span><br></p>', 'Newham', '11290284', 'James', 'Arnold', '2022-03-18', '476188270.pdf', '2022-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_activity`
--

CREATE TABLE `children_activity` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `body` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `hour_time` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_activity`
--

INSERT INTO `children_activity` (`id`, `firstname`, `lastname`, `body`, `status`, `hour_time`, `created_date`) VALUES
(1, 'Dele', 'Tolly', 'The child was taken to various locations.', 'Ingoing', '11:30am', '2021-09-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_case_recording`
--

CREATE TABLE `children_case_recording` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_case_recording`
--

INSERT INTO `children_case_recording` (`id`, `code`, `child_name`, `title`, `body`, `document`, `created_date`) VALUES
(7, 'ABXSO123', 'Tommy Oxbridge', 'New record', '<p>This is a new record that has been added.</p>', 'installation.pdf', '2022-01-31 00:00:00'),
(8, 'DUYBVCXAT1', 'Tom Brady', 'All Case recording', '<p><span style=\"color: rgb(67, 74, 84);\">Comments and further actions when needed</span><br></p>', '476188270.pdf', '2022-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_finance_information`
--

CREATE TABLE `children_finance_information` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_finance_information`
--

INSERT INTO `children_finance_information` (`id`, `code`, `child_name`, `title`, `body`, `document`, `created_date`) VALUES
(7, 'ABXSO123', 'Tommy Oxbridge', 'New Information', '<p>This is a new record that has been added</p>', 'installation.pdf', '2022-01-30 00:00:00'),
(8, 'DUYBVCXAT1', 'Tom Brady', 'All Finance', '<p><label>Comments and further actions are needed</label></p>', '476188270.pdf', '2022-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_foster_care`
--

CREATE TABLE `children_foster_care` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(70) NOT NULL,
  `body` longtext NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_foster_care`
--

INSERT INTO `children_foster_care` (`id`, `code`, `child_name`, `title`, `body`, `document`, `created_date`) VALUES
(5, 'ABXSO123', 'Tommy Oxbridge', 'New record', '<p>I\'m speaking with myself, number one, because I have a very good brain and I\'ve said a lot of things. I write the best placeholder text, and I\'m the biggest developer on the web card she has is the Lorem card.</p>', 'installation.pdf', '2022-01-31 00:00:00'),
(6, 'DUYBVCXAT1', 'Tom Brady', 'All Foster', '<p><span style=\"color: rgb(67, 74, 84);\">Comments and further actions</span><br></p>', '476188270.pdf', '2022-03-18 00:00:00'),
(3, 'UYCVXDABT7', 'Mike Mikaela', 'New fostering', '<p>This is a new care that has been added.</p>', '', '2021-12-22 00:00:00'),
(4, 'DAYVTXUCB8', 'Steve Gatsby', 'Foster', '<p>This is a new foster information</p>', '', '2021-12-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_incidents`
--

CREATE TABLE `children_incidents` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_incidents`
--

INSERT INTO `children_incidents` (`id`, `code`, `child_name`, `title`, `body`, `document`, `created_date`) VALUES
(12, 'DUYBVCXAT1', 'Tom Brady', 'All Incidents', '<p><span style=\"color: rgb(67, 74, 84);\">Comments and further actions and is needed</span><br></p>', '476188270.pdf', '2022-03-18 00:00:00'),
(11, 'ABXSO123', 'Tommy Oxbridge', 'New record', '<p>There was an issue that needed addressing in regards to their walking.</p>\r\n', 'installation.pdf', '2022-01-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_keywork_session`
--

CREATE TABLE `children_keywork_session` (
  `id` int(11) NOT NULL,
  `house_code` varchar(50) NOT NULL,
  `house` varchar(200) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `date_title` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` longtext NOT NULL,
  `independent_living` longtext NOT NULL,
  `staff_initial` varchar(50) NOT NULL,
  `hours_spent` varchar(20) NOT NULL,
  `length_time` varchar(20) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `image4` varchar(100) NOT NULL,
  `image5` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_keywork_session`
--

INSERT INTO `children_keywork_session` (`id`, `house_code`, `house`, `code`, `child_name`, `date_title`, `title`, `summary`, `independent_living`, `staff_initial`, `hours_spent`, `length_time`, `image1`, `image2`, `image3`, `image4`, `image5`, `created_date`) VALUES
(14, 'CSDF897FKS', 'Collin A', 'ABXSO123', 'Tommy Oxbridge', '12/03/2022', 'New keywork', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Filling a form,Freedom', 'SMD', '16', '', 'featured-image-21.jpg', 'featured-image-22.jpg', 'featured-image-23.jpg', 'featured-image-24.jpg', 'featured-image-23.jpg', '2022-03-12 00:00:00'),
(15, 'csdf897fks', 'Collin A', 'ABXSO123', 'Tommy Oxbridge', '12/03/2022', 'Eriks', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a gallery of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ', 'Bathing,Eating a meal,Filling a form,Freedom', 'SMD', '16', '3 weeks', 'featured-image-21.jpg', 'featured-image-23.jpg', 'featured-image-22.jpg', 'featured-image-21.jpg', 'featured-image-23.jpg', '2022-03-19 00:00:00'),
(16, 'abcdefghzxcqwe881', 'Collin C', 'UYCVXDABT7', 'Mike Mikaela', '18/03/2022', 'A new keywork session', 'Comments and further actions', 'Bathing,Eating a meal,Filling a form,Freedom', 'SMD', '16', '3 weeks', 'featured-image-24.jpg', 'featured-image-22.jpg', 'featured-image-21.jpg', 'featured-image-22.jpg', 'featured-image-24.jpg', '2022-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_medical_history`
--

CREATE TABLE `children_medical_history` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_medical_history`
--

INSERT INTO `children_medical_history` (`id`, `code`, `child_name`, `title`, `body`, `document`, `created_date`) VALUES
(19, 'DUYBVCXAT1', 'Tom Brady', 'All medical', '<p><span style=\"color: rgb(67, 74, 84);\">Comments and further actions are needed</span><br></p>', '476188270.pdf', '2022-03-18 00:00:00'),
(18, 'ABXSO123', 'Tommy Oxbridge', 'New record', '<p>This is a medical history that has been added into the system</p>', 'installation.pdf', '2022-01-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_personal_education`
--

CREATE TABLE `children_personal_education` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_personal_education`
--

INSERT INTO `children_personal_education` (`id`, `code`, `child_name`, `title`, `body`, `document`, `created_date`) VALUES
(9, 'ABXSO123', 'Tommy Oxbridge', 'new record', '<p>This is a record</p>', 'installation.pdf', '2022-01-30 00:00:00'),
(10, 'DUYBVCXAT1', 'Tom Brady', 'All Education', '<p><label>Comments and further actions are needed</label></p>', '476188270.pdf', '2022-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_sanction_rewards`
--

CREATE TABLE `children_sanction_rewards` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `document` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_sanction_rewards`
--

INSERT INTO `children_sanction_rewards` (`id`, `code`, `child_name`, `title`, `body`, `document`, `created_date`) VALUES
(8, 'ABXSO123', 'Tommy Oxbridge', 'New record', '<p>This is a new record that has been done.</p>', 'installation.pdf', '2022-01-31 00:00:00'),
(9, 'DUYBVCXAT1', 'Tom Brady', 'All Sanction', '<p><span style=\"color: rgb(67, 74, 84);\">Comments and further actions when needed</span><br></p>', '476188270.pdf', '2022-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `children_supervision_action`
--

CREATE TABLE `children_supervision_action` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_supervision_action`
--

INSERT INTO `children_supervision_action` (`id`, `code`, `child_name`, `title`, `body`, `created_date`) VALUES
(1, 'ABXSO123', 'Tommy Oxbridge', 'Supervision 1', 'This is a test to know if you can be supervised.', '2021-12-13 00:00:00'),
(4, 'ABXSO123', 'Tommy Oxbridge', 'Supervision 2', '<p>This is a new role.</p>', '2021-12-14 00:00:00'),
(5, 'UYCVXDABT7', 'Mike Mikaela', 'Supervision', '<p>This is a new supervision</p>', '2021-12-23 00:00:00'),
(6, 'DAYVTXUCB8', 'Steve Gatsby', 'New aform', '<p>This is new&nbsp;</p>', '2021-12-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `daily_log`
--

CREATE TABLE `daily_log` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `house` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` longtext NOT NULL,
  `staff_initial` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_log`
--

INSERT INTO `daily_log` (`id`, `code`, `house`, `title`, `summary`, `staff_initial`, `time`, `created_date`) VALUES
(8, 'CSDF897FKS', 'Collin A', '08/03/2022', '<p>We started the meeting </p>', 'SMD', '12:25pm', '2022-03-08 05:00:00'),
(9, 'AV98DNA9D9', 'Collin B', '08/03/2022', 'We drank tea', 'SMD', '12:28pm', '2022-03-08 05:00:00'),
(10, 'CSDF897FKS', 'Collin A', '08/03/2022', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.&nbsp;<span style=\"background-color: rgb(231, 99, 99); color: rgb(0, 0, 0);\">Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,&nbsp;</span>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'SMD', '12:50pm', '2022-03-08 05:00:00'),
(12, 'csdf897fks', 'Collin A', '12/03/2022', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'SMD', '9am', '2022-03-19 04:00:00'),
(14, 'csdf897fks', 'Collin A', '16/03/2022', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'SMD', '9am', '2022-03-19 04:00:00'),
(16, 'abcdefghzxcqwe881', 'Collin C', '18/03/2022', 'Comments and further actions which is needed', 'SMD', '9am', '2022-03-18 04:00:00'),
(17, 'csdf897fks', 'Collin A', '19/03/2022', '<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like PageMaker including versions of Lorem Ipsum.</p>', 'SMD', '10am', '2022-03-19 04:00:00'),
(18, 'av98dna9d9', 'Collin B', 'DB', '<p>DB Onsite</p>', 'JK', '11.16', '2022-03-21 04:00:00'),
(19, 'abcdefghzxcqwe881', 'Collin C', '', '<p>JK Onsite&nbsp;</p>', 'JK', '11.16', '2022-03-21 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dbs_certificate`
--

CREATE TABLE `dbs_certificate` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `document` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbs_certificate`
--

INSERT INTO `dbs_certificate` (`id`, `title`, `body`, `document`, `created_time`, `created_date`) VALUES
(2, 'Ghost DBS', 'This is a dbs certificate', 'Scott_Nnaghor_CV-converted.pdf', 1635435920, '2021-10-29 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `disciplinaries`
--

CREATE TABLE `disciplinaries` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `explode_communication`
--

CREATE TABLE `explode_communication` (
  `id` int(11) NOT NULL,
  `staffcom_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `explode_communication`
--

INSERT INTO `explode_communication` (`id`, `staffcom_id`, `email`) VALUES
(1, 1, 'staff@email.com'),
(2, 9, 'staff@email.com'),
(3, 9, 'mike275@gmail.com'),
(16, 2, 'staff@harold.com'),
(14, 2, 'staff@harold.com'),
(15, 1, 'staff@harold.com'),
(17, 21, 'staff@email.com'),
(18, 21, 'mike275@gmail.com'),
(19, 21, 'staff@harold.com'),
(20, 21, 'steve@harold.com');

-- --------------------------------------------------------

--
-- Table structure for table `guest_ban`
--

CREATE TABLE `guest_ban` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `child_name` varchar(200) NOT NULL,
  `house_code` varchar(20) NOT NULL,
  `house` varchar(200) NOT NULL,
  `room_number` varchar(20) NOT NULL,
  `guest_name` varchar(200) NOT NULL,
  `reason_for_ban` longtext NOT NULL,
  `additional_info` longtext NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_ban`
--

INSERT INTO `guest_ban` (`id`, `code`, `child_name`, `house_code`, `house`, `room_number`, `guest_name`, `reason_for_ban`, `additional_info`, `start_date`, `end_date`) VALUES
(3, 'UYCVXDABT7', 'Mike Mikaela', 'csdf897fks', 'Collin A', '102', 'Andrew ', '<p>The guest was rude</p>', 'Very annoying', '2022-03-11', '2022-03-12'),
(2, 'ABXSO123', 'Tommy Oxbridge', 'csdf897fks', 'Collin A', '101', 'Andrew ', '<p>The guest is rude</p>', 'none', '2022-03-09', '2022-03-11'),
(4, 'UYCVXDABT7', 'Mike Mikaela', 'abcdefghzxcqwe881', 'Collin C', '101', 'Andrew ', '<p><span style=\"color: rgb(67, 74, 84);\">Reason for ban</span><br></p>', 'Additional Info', '2022-03-16', '2022-03-18'),
(5, 'DUYBVCXAT1', 'Tom Brady', 'csdf897fks', 'Collin A', '103', 'Andrew ', '<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br></p>', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2022-03-14', '2022-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `handover`
--

CREATE TABLE `handover` (
  `id` int(11) NOT NULL,
  `handover_id` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `house_code` varchar(100) NOT NULL,
  `housename` varchar(255) NOT NULL,
  `ingoing_staff` varchar(255) NOT NULL,
  `outgoing_staff` varchar(255) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `handover`
--

INSERT INTO `handover` (`id`, `handover_id`, `title`, `house_code`, `housename`, `ingoing_staff`, `outgoing_staff`, `time`, `date`) VALUES
(3, 'YCUBXVDA19', '22/03/2022', 'csdf897fks', 'Collin A', 'staff@harold.com', 'staff@harold.com', '10am', '2022-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `health_safety`
--

CREATE TABLE `health_safety` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `house_code` varchar(50) NOT NULL,
  `house_name` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `additional_info` longtext NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `safety_check` text NOT NULL,
  `recorded_by` varchar(200) NOT NULL,
  `due_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `image4` varchar(100) NOT NULL,
  `image5` varchar(100) NOT NULL,
  `document` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_safety`
--

INSERT INTO `health_safety` (`id`, `code`, `child_name`, `house_code`, `house_name`, `title`, `additional_info`, `room_number`, `safety_check`, `recorded_by`, `due_date`, `image1`, `image2`, `image3`, `image4`, `image5`, `document`, `created_date`) VALUES
(7, 'DUYBVCXAT1', 'Tom Brady', '', '', 'Heath for Brady', 'Comments and further actions', '102', 'none', 'Matthew', '2022-03-19 04:00:00', 'featured-image-21.jpg', 'featured-image-22.jpg', 'featured-image-23.jpg', 'featured-image-24.jpg', 'featured-image-21.jpg', '5_6233106464102154839.pdf', '2022-03-19 04:00:00'),
(5, 'ABXSO123', 'Tommy Oxbridge', '', '', 'New health record', 'This is a new comment', '101', 'none', 'Matthew', '2022-03-19 04:00:00', 'featured-image-21.jpg', 'featured-image-22.jpg', 'featured-image-23.jpg', 'featured-image-21.jpg', 'featured-image-24.jpg', 'installation.pdf', '2022-03-19 04:00:00'),
(10, 'DUYBVCXAT1', 'Tom Brady', 'csdf897fks', 'Collin A', 'Collin Health', 'Comments and further actions', '103', 'none', 'Matthew', '2022-03-20 04:00:00', 'featured-image-21.jpg', 'featured-image-23.jpg', 'featured-image-24.jpg', 'featured-image-22.jpg', 'featured-image-24.jpg', 'S-34_E_079.pdf', '2022-03-21 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `independent_living`
--

CREATE TABLE `independent_living` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `independent_living`
--

INSERT INTO `independent_living` (`id`, `title`) VALUES
(1, 'Independent'),
(2, 'Freedom'),
(4, 'Laundry'),
(7, 'Filling a form'),
(5, 'Bathing'),
(6, 'Eating a meal');

-- --------------------------------------------------------

--
-- Table structure for table `ingoing`
--

CREATE TABLE `ingoing` (
  `id` int(11) NOT NULL,
  `handover_id` varchar(50) NOT NULL,
  `house_code` varchar(100) NOT NULL,
  `housename` varchar(255) NOT NULL,
  `actions` varchar(10) NOT NULL,
  `gaming` varchar(10) NOT NULL,
  `keys_pettycash` varchar(10) NOT NULL,
  `keys_pettycash_comment` text NOT NULL,
  `cleanliness` longtext NOT NULL,
  `occupancy` longtext NOT NULL,
  `edt_police_comment` longtext NOT NULL,
  `safeguarding` longtext NOT NULL,
  `appointments_diary` varchar(10) NOT NULL,
  `appointments_diary_support` varchar(10) NOT NULL,
  `appointments_diary_remind` varchar(10) NOT NULL,
  `service_user` longtext NOT NULL,
  `maintenance` longtext NOT NULL,
  `outstanding_task` longtext NOT NULL,
  `health_wellbeing` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingoing`
--

INSERT INTO `ingoing` (`id`, `handover_id`, `house_code`, `housename`, `actions`, `gaming`, `keys_pettycash`, `keys_pettycash_comment`, `cleanliness`, `occupancy`, `edt_police_comment`, `safeguarding`, `appointments_diary`, `appointments_diary_support`, `appointments_diary_remind`, `service_user`, `maintenance`, `outstanding_task`, `health_wellbeing`, `time`, `date`) VALUES
(13, 'YCUBXVDA19', 'csdf897fks', 'Collin A', 'Yes', 'Yes', 'Yes', '1000', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Yes', 'Yes', 'Yes', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Yes', '10am', '2022-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE `leave_application` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `shift_start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `shift_end_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`id`, `fullname`, `email`, `body`, `category`, `status`, `shift_start_time`, `shift_end_time`) VALUES
(1, 'FirstName LastName', 'staff@email.com', 'This is a test', 'Coronavirus', 'Pending', '2021-11-10 05:00:00', '2021-11-19 05:00:00'),
(2, 'James Arnold', 'staff@email.com', 'Lol', 'Coronavirus', 'Pending', '2021-11-17 05:00:00', '2021-11-19 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `legal_document`
--

CREATE TABLE `legal_document` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `document` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legal_document`
--

INSERT INTO `legal_document` (`id`, `title`, `body`, `document`, `created_time`, `created_date`) VALUES
(1, 'Tedt', 'This is a test', 'Scott_Nnaghor_CV-converted.pdf', 1635433910, '2021-10-23 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `outgoing`
--

CREATE TABLE `outgoing` (
  `id` int(11) NOT NULL,
  `handover_id` varchar(50) NOT NULL,
  `house_code` varchar(100) NOT NULL,
  `housename` varchar(255) NOT NULL,
  `actions` varchar(10) NOT NULL,
  `gaming` varchar(10) NOT NULL,
  `keys_pettycash` varchar(10) NOT NULL,
  `keys_pettycash_comment` text NOT NULL,
  `cleanliness` longtext NOT NULL,
  `occupancy` longtext NOT NULL,
  `edt_police_comment` longtext NOT NULL,
  `safeguarding` longtext NOT NULL,
  `appointments_diary` varchar(10) NOT NULL,
  `appointments_diary_support` varchar(10) NOT NULL,
  `appointments_diary_remind` varchar(10) NOT NULL,
  `service_user` longtext NOT NULL,
  `maintenance` longtext NOT NULL,
  `additional_info` longtext NOT NULL,
  `outstanding_task` longtext NOT NULL,
  `health_wellbeing` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`id`, `handover_id`, `house_code`, `housename`, `actions`, `gaming`, `keys_pettycash`, `keys_pettycash_comment`, `cleanliness`, `occupancy`, `edt_police_comment`, `safeguarding`, `appointments_diary`, `appointments_diary_support`, `appointments_diary_remind`, `service_user`, `maintenance`, `additional_info`, `outstanding_task`, `health_wellbeing`, `time`, `date`) VALUES
(17, 'YCUBXVDA19', 'csdf897fks', 'Collin A', 'Yes', 'Yes', 'Yes', '1000', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Yes', 'Yes', 'Yes', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', '', 'Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? *', 'Yes', '10am', '2022-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `procedure_pol`
--

CREATE TABLE `procedure_pol` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `doc` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_pol`
--

INSERT INTO `procedure_pol` (`id`, `title`, `body`, `doc`, `created_time`, `created_date`) VALUES
(8, 'New Procedure', 'Additional information has been added', 'installation.pdf', 1644283897, '2022-02-08 00:00:00'),
(5, 'A record', 'This is a description', 'Scott_Nnaghor_CV.pdf', 1644283914, '2022-02-08 00:00:00'),
(9, 'All Procedure', 'Comments and further actions', '476188270.pdf', 1647644450, '2022-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `housename` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `mobile` varchar(22) NOT NULL,
  `address` longtext NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `code`, `housename`, `body`, `telephone`, `mobile`, `address`, `postcode`, `city`, `state`, `created_date`) VALUES
(2, 'CSDF897FKS', 'Collin A', 'This is a new house that needs to be done in regards to the properties that was created.', '02023429481', '073423428247', '33 Test Road, Collins Avenue.', 'IG1 9EE', 'Ilford', 'London', '2021-09-21 00:00:00'),
(5, 'AV98DNA9D9', 'Collin B', 'This is a new house that needs to be done in regards to the properties that was created.	', '02023429481', '074458755164', '32 Bakers Street', 'EC1 2RY', 'London', 'London', '2022-02-08 00:00:00'),
(7, 'ABCDEFGHZXCQWE881', 'Collin C', 'This is a comment', '0766958985', '0766958985', '35 Ghost town, Ilford', 'IG1 9RR', 'Ilford', 'London', '2022-03-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `propety_file`
--

CREATE TABLE `propety_file` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `insurance` text NOT NULL,
  `electrical` text NOT NULL,
  `gas_safety` text NOT NULL,
  `fire_alarm` text NOT NULL,
  `emergency_light` text NOT NULL,
  `pat_testing` text NOT NULL,
  `area_risk_assessment` text NOT NULL,
  `health_safety` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propety_file`
--

INSERT INTO `propety_file` (`id`, `code`, `insurance`, `electrical`, `gas_safety`, `fire_alarm`, `emergency_light`, `pat_testing`, `area_risk_assessment`, `health_safety`) VALUES
(1, 'CSDF897FKS', 'installation.pdf', 'installation.pdf', 'installation.pdf', 'installation.pdf', 'installation.pdf', 'installation.pdf', 'installation.pdf', 'installation.pdf'),
(2, 'AV98DNA9D9', '', '', '', '', '', '', '', ''),
(3, 'ABCDEFGHZXCQWE686', '', '', '', '', '', '', '', ''),
(4, 'ABCDEFGHZXCQWE881', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `document` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `title`, `body`, `document`, `created_time`, `created_date`) VALUES
(3, 'Certificate', 'This is a certificate', 'Scott_Nnaghor_CV-converted.pdf', 1635419166, '2021-10-29 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `title`, `body`, `created_time`, `created_date`) VALUES
(1, 'This is a form', 'This is a cost', 1635437327, '2021-10-29 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `reminder_time` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `title`, `body`, `status`, `reminder_time`, `created_date`) VALUES
(8, 'New Remind', 'This is an additional information that has been added.', 'Upcoming', '9:30am', '2021-12-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reporting`
--

CREATE TABLE `reporting` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `house_code` varchar(20) NOT NULL,
  `house` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` longtext NOT NULL,
  `area_of_risk` longtext NOT NULL,
  `keywork_session` longtext NOT NULL,
  `self_care` longtext NOT NULL,
  `education` longtext NOT NULL,
  `independent_skills` longtext NOT NULL,
  `family` longtext NOT NULL,
  `missing` longtext NOT NULL,
  `area_of_progress` longtext NOT NULL,
  `staff` varchar(100) NOT NULL,
  `social_worker` varchar(200) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reporting`
--

INSERT INTO `reporting` (`id`, `code`, `child_name`, `house_code`, `house`, `title`, `summary`, `area_of_risk`, `keywork_session`, `self_care`, `education`, `independent_skills`, `family`, `missing`, `area_of_progress`, `staff`, `social_worker`, `duration`, `created_date`) VALUES
(1, 'ABXSO123', 'Tommy Oxbridge', 'CSDF897FKS', 'Collin A', 'New Information', 'More information should be provided especially when it comes to the child.', 'There has been no concern. This is a test for the Areas of Risk for this user.', 'There has been no concern. This is a test for the Keywork session for this user.', 'There has been no concern. This is a test for the Self care for this user.', 'There has been no concern. This is a test for the Education for this user.', 'There has been no concern. This is a test for the Independent Living for this user.', 'There has been no concern. This is a test for the Family or Friends for this user.', 'There has been no concern. This is a test for the UNAUTHORISED ABSENCES for this user.', 'There has been no concern. This is a test for the Area of progress for this user.', 'Oscar Piastri', 'Stacy', '01/03/2022-12/03/2022', '2021-12-08 05:00:00'),
(3, 'UYCVXDABT7', 'Mike Mikaela', 'CSDF897FKS', 'Collin A', 'New event made', 'This is a new report that has been added', 'This is a new report that has been added', 'This is a new report that has been added', 'This is a new report that has been added', 'This is a new report that has been added', 'This is a new report that has been added', 'This is a new report that has been added', 'This is a new report that has been added', 'This is a new report that has been added', 'Oscar Piastri', 'Stacy', '01/03/2022-12/03/2022', '2022-01-03 05:00:00'),
(6, 'ABXSO123', 'Tommy Oxbridge', 'csdf897fks', 'Collin A', 'New risk of reporting', 'Comments and further actions', 'Areas of Risk/Concern', 'Key Work Sessions', 'Health/Self-Care', 'Education/Employment/Training', 'Independent Living Skills', 'Family/Friends Contact', 'Unauthorised Absences/Missing/Legal', 'Areas of Progress', 'Mike Mikaela', 'Stacy', '01/03/2022-12/03/2022', '2022-03-12 05:00:00'),
(7, 'UYCVXDABT7', 'Mike Mikaela', 'abcdefghzxcqwe881', 'Collin C', 'New report on Mike', 'Comments and further actions', 'Areas of Risk/Concern', 'Key Work Sessions', 'Health/Self-Care', 'Education/Employment/Training', 'Independent Living Skills', 'Family/Friends Contact', 'Unauthorised Absences/Missing/Legal', 'Areas of Progress', 'Steven Hockendon', 'Stacy', '01/03/2022-12/03/2022', '2022-03-18 04:00:00'),
(8, 'DUYBVCXAT1', 'Tom Brady', 'csdf897fks', 'Collin A', 'Brady reporting', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'It has survived not only five centuries', 'It has survived not only five centuries, but also the leap into electronic typesetting', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'It has survived not only five centuries, but also the leap into electronic', 'It has survived not only five centuries', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'It has survived not only five centuries, but also the leap', 'Steven Hockendon', 'Stacy', '01/03/2022-12/03/2022', '2022-03-19 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `risk_assessment`
--

CREATE TABLE `risk_assessment` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `house_code` varchar(20) NOT NULL,
  `house` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `criminal_risk_level` longtext NOT NULL,
  `criminal_level` varchar(200) NOT NULL,
  `violent_risk_level` longtext NOT NULL,
  `violent_level` varchar(200) NOT NULL,
  `weapon_risk_level` longtext NOT NULL,
  `weapon_level` varchar(200) NOT NULL,
  `behaviour_community_risk_level` longtext NOT NULL,
  `behaviour_community_level` varchar(200) NOT NULL,
  `bully_risk_level` longtext NOT NULL,
  `bully_level` varchar(200) NOT NULL,
  `discrimination_risk_level` longtext NOT NULL,
  `discrimination_level` varchar(200) NOT NULL,
  `damage_property_risk_level` longtext NOT NULL,
  `damage_property_level` varchar(200) NOT NULL,
  `arson_risk_level` longtext NOT NULL,
  `arson_level` varchar(200) NOT NULL,
  `missue_illegal_risk_level` longtext NOT NULL,
  `missue_illegal_level` varchar(200) NOT NULL,
  `missing_risk_level` longtext NOT NULL,
  `missing_level` varchar(200) NOT NULL,
  `self_harm_risk_level` longtext NOT NULL,
  `self_harm_level` varchar(200) NOT NULL,
  `sexual_risk_level` longtext NOT NULL,
  `sexual_level` varchar(200) NOT NULL,
  `medication_risk_level` longtext NOT NULL,
  `medication_level` varchar(200) NOT NULL,
  `family_risk_level` longtext NOT NULL,
  `family_level` varchar(200) NOT NULL,
  `allegation_risk_level` longtext NOT NULL,
  `allegation_level` varchar(200) NOT NULL,
  `travel_risk_level` longtext NOT NULL,
  `travel_level` varchar(200) NOT NULL,
  `additional_info` longtext NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_assessment`
--

INSERT INTO `risk_assessment` (`id`, `code`, `child_name`, `house_code`, `house`, `title`, `criminal_risk_level`, `criminal_level`, `violent_risk_level`, `violent_level`, `weapon_risk_level`, `weapon_level`, `behaviour_community_risk_level`, `behaviour_community_level`, `bully_risk_level`, `bully_level`, `discrimination_risk_level`, `discrimination_level`, `damage_property_risk_level`, `damage_property_level`, `arson_risk_level`, `arson_level`, `missue_illegal_risk_level`, `missue_illegal_level`, `missing_risk_level`, `missing_level`, `self_harm_risk_level`, `self_harm_level`, `sexual_risk_level`, `sexual_level`, `medication_risk_level`, `medication_level`, `family_risk_level`, `family_level`, `allegation_risk_level`, `allegation_level`, `travel_risk_level`, `travel_level`, `additional_info`, `created_time`, `created_date`) VALUES
(8, 'ABXSO123', 'Tommy Oxbridge', 'CSDF897FKS', 'Collin A', 'New plan', 'Risk', 'Medium', 'Risk', 'Medium', 'Risk', 'High', 'Risk', 'Medium', 'Risk', 'High', 'Risk', 'Medium', 'Risk', 'High', 'Risk', 'Medium', 'Risk', 'High', 'Risk', 'Medium', 'Risk', 'Medium', 'Risk', 'Low', 'Risk', 'High', 'Risk', 'Medium', 'Risk', 'High', 'Risk', 'Low', 'Risk', 1643619592, '2022-01-31 00:00:00'),
(10, 'ABXSO123', 'Tommy Oxbridge', 'csdf897fks', 'Collin A', 'New risk Assessment', 'risky factors that affect criminals', 'Low', 'risky factors that affect violence', 'Low', 'risky factors for weapons', 'Low', 'risky factors of behaviour in the community', 'Low', 'risky factors of being bullies', 'Low', 'risky factors of discrimination', 'Medium', 'risk factors to damage to property', 'High', 'risk factors to Arson', 'Low', 'risk factors for Misuse of illegal substances', 'Low', 'risk factors to going missing.', 'Low', 'risk factors for emotional wellbeing & self harm', 'Low', 'risk factors for sexual health.', 'Low', 'risk factors for health & medication', 'Low', 'risk factors for Family & friends', 'Low', 'risk factors of Allegations', 'Medium', 'risk factors of travelling in vehicle', 'Low', 'risky factor that has been added', 1647076659, '2022-03-12 00:00:00'),
(11, 'UYCVXDABT7', 'Mike Mikaela', 'abcdefghzxcqwe881', 'Collin C', 'Mike Assessment', 'Criminal/Offending Behaviour', 'Medium', 'Violent toward others', 'High', 'Use of weapons', 'Low', 'Behaviour in the community', 'High', 'Bully', 'High', 'Discrimination', 'High', 'Damage to property', 'Medium', 'Arson', 'Medium', 'Misuse of illegal substances/alcohol/smoking', 'Medium', 'Going missing', 'High', 'Emotional wellbeing & self-harm', 'Low', 'Sexual health', 'Medium', 'Health & Medication', 'Medium', 'Family & Friend Contacts', 'Medium', 'Allegations', 'Medium', 'Travel in vehicle', 'Low', 'Additional Info', 1647633164, '2022-03-18 00:00:00'),
(12, 'DUYBVCXAT1', 'Tom Brady', 'csdf897fks', 'Collin A', 'Brady risk', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Medium', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Low', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'High', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Medium', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Medium', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Medium', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'High', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'High', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Low', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Low', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Low', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Medium', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Medium', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'High', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Medium', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Medium', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1647718748, '2022-03-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shift_management`
--

CREATE TABLE `shift_management` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `house_name` longtext NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift_management`
--

INSERT INTO `shift_management` (`id`, `title`, `email`, `house_name`, `start_time`, `end_time`, `start_date`, `end_date`) VALUES
(27, 'Richard Ricky', 'staff@harold.com', 'Collin A', '2am', '9am', '2022-03-18', '2022-03-18'),
(25, 'Steven Hockendon', 'steve@harold.com', 'Collin A', '12am', '4:am', '2022-02-08', '2022-02-08'),
(23, 'Richard Ricky', 'staff@harold.com', 'Collin A', '12am', '8am', '2022-02-08', '2022-02-08'),
(26, 'James Arnold', 'staff@email.com', 'Collin A', '12am', '12:15am', '2022-03-16', '2022-03-16'),
(24, 'James Arnold', 'staff@email.com', 'Collin A', '1am', '9:45am', '2022-02-08', '2022-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `social_worker`
--

CREATE TABLE `social_worker` (
  `id` int(11) NOT NULL,
  `children_code` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(22) NOT NULL,
  `address` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_worker`
--

INSERT INTO `social_worker` (`id`, `children_code`, `fullname`, `email`, `mobile`, `address`, `created_date`) VALUES
(1, 'ABXSO123', 'Steven Smith', '', '', '', '2021-09-23 15:15:34'),
(2, 'UYCVXDABT7', 'Steve Gatsby', 'steve_gats@email.com', '07448457194', '93 Wilmington Gardens', '2021-09-29 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_communication`
--

CREATE TABLE `staff_communication` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `request` longtext NOT NULL,
  `time` varchar(10) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_communication`
--

INSERT INTO `staff_communication` (`id`, `title`, `request`, `time`, `created_date`) VALUES
(1, 'New communication', 'Please be aware that the cleaner will attend the unit on Wednesday 04.08.21 and not on Friday. This is due to her unavailability for friday. Thanks', '12 pm', '2021-12-07'),
(2, 'New freya', 'Please be aware that the cleaner will attend the unit on Wednesday 04.08.21 and not on Friday. This is due to her unavailability for friday. ', '3 am', '2022-02-08'),
(9, 'Company holiday', 'There needs to be more pizzazz', '5 am', '2022-02-02'),
(21, 'Holiday very soon', 'Comments and further actions', '11 pm', '2022-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `staff_file`
--

CREATE TABLE `staff_file` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `passport` longtext NOT NULL,
  `driving_license` longtext NOT NULL,
  `nin` longtext NOT NULL,
  `address1` longtext NOT NULL,
  `address2` longtext NOT NULL,
  `dbs_certificate` longtext NOT NULL,
  `qualification` longtext NOT NULL,
  `reference1` text NOT NULL,
  `reference2` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_file`
--

INSERT INTO `staff_file` (`id`, `code`, `passport`, `driving_license`, `nin`, `address1`, `address2`, `dbs_certificate`, `qualification`, `reference1`, `reference2`) VALUES
(1, 'AXVKBEOMLSO789', '', '', '', '', '', '', '', '', ''),
(2, 'AJJOKBEMLSO749', '', '', '', '', '', '', '', '', ''),
(3, 'AXVKBEOMCXZ234', '1.png', 'bookmark-regular.png', 'SF9903KO', '1.png', 'installation.pdf', '1.png', 'installation.pdf', 'Sky', 'BET'),
(4, 'AXZCDWEKNIA343', '', '', '', '', '', '', '', '', ''),
(5, 'AZZ2EOMALOD223', '', '', '', '', '', '', '', '', ''),
(6, 'ABCDEFGHZXCQWE237', '', '', '', '', '', '', '', '', ''),
(7, 'ABCDEFGHZXCQWE964', '', '', '', '', '', '', '', '', ''),
(8, 'ABCDEFGHZXCQWE501', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `support_plan`
--

CREATE TABLE `support_plan` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `house_code` varchar(20) NOT NULL,
  `house` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `plan_of_action` text NOT NULL,
  `support_me` varchar(200) NOT NULL,
  `area_of_support` longtext NOT NULL,
  `often_will_support` varchar(200) NOT NULL,
  `hours_spent_task` varchar(100) NOT NULL,
  `additional_info` longtext NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_plan`
--

INSERT INTO `support_plan` (`id`, `code`, `child_name`, `house_code`, `house`, `title`, `plan_of_action`, `support_me`, `area_of_support`, `often_will_support`, `hours_spent_task`, `additional_info`, `created_time`, `created_date`) VALUES
(10, 'ABXSO123', 'Tommy Oxbridge', 'CSDF897FKS', 'Collin A', 'New record', '<p>Additional information needs to be added</p>', 'James Arnold', '', 'Everyday', '10', 'none', 1644282821, '2022-02-08 00:00:00'),
(43, 'ABXSO123', 'Tommy Oxbridge', 'csdf897fks', 'Collin A', 'New plan on Brady', '<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'James Arnold', ' Budgeting & Managing Finance, Fire Drill, Food shopping, Home Security', 'Everyday', '10', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1647719553, '2022-03-19 00:00:00'),
(49, 'UYCVXDABT7', 'Mike Mikaela', 'abcdefghzxcqwe881', 'Collin C', 'This is a support', '<p><span style=\"color: rgb(67, 74, 84);\">Comments and further actions</span><br></p>', 'Steven Hockendon', '1,2,9,4,10,6', 'Everyday', '10', 'Additional Information', 1647633480, '2022-03-18 00:00:00'),
(50, 'DUYBVCXAT1', 'Tom Brady', 'csdf897fks', 'Collin A', 'Support Brady', '<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br></p>', 'Oscar Piastri', '1,2,9,4,6', 'Everyday', '10', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1647719511, '2022-03-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `support_work`
--

CREATE TABLE `support_work` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `child_name` varchar(200) NOT NULL,
  `title` varchar(70) NOT NULL,
  `body` longtext NOT NULL,
  `house_code` varchar(50) NOT NULL,
  `house_name` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `review_period` text NOT NULL,
  `task` longtext NOT NULL,
  `start_date` date NOT NULL,
  `target_date` date NOT NULL,
  `completed_date` date NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_work`
--

INSERT INTO `support_work` (`id`, `code`, `child_name`, `title`, `body`, `house_code`, `house_name`, `image`, `review_period`, `task`, `start_date`, `target_date`, `completed_date`, `created_date`) VALUES
(35, 'UYCVXDABT7', 'Mike Mikaela', 'New work', 'This is a new work that has been added', 'csdf897fks', 'Collin A', 'banner1.jpg', '1 month', '1,3', '2022-03-07', '2022-03-12', '2022-03-14', '2022-03-15 00:00:00'),
(40, 'DUYBVCXAT1', 'Tom Brady', 'Brady own target', 'Comments and further actions', 'AV98DNA9D9', 'Collin B', 'banner1.jpg', '1 month', '3,4', '2022-03-14', '2022-03-17', '2022-03-19', '2022-03-19 00:00:00'),
(42, 'DUYBVCXAT1', 'DUYBVCXAT1', 'Disney gold', 'Comments', 'AV98DNA9D9', 'Collin B', 'banner1.jpg', '', '4', '2022-03-14', '2022-03-17', '2022-03-18', '2022-03-19 00:00:00'),
(43, 'DUYBVCXAT1', 'Tom Brady', 'Support act', 'Comments and further actions', 'csdf897fks', 'Collin A', 'featured-image-21.jpg', '1 month', '1', '2022-03-14', '2022-03-21', '2022-03-21', '2022-03-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `support_work_subtask`
--

CREATE TABLE `support_work_subtask` (
  `id` int(11) NOT NULL,
  `task_id` int(10) NOT NULL,
  `subtitle` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_work_subtask`
--

INSERT INTO `support_work_subtask` (`id`, `task_id`, `subtitle`) VALUES
(1, 1, 'Doing Mathematics'),
(2, 1, 'Doing English'),
(3, 4, 'Seating with friends'),
(4, 1, 'Do Science'),
(5, 1, 'Do Arts'),
(6, 3, 'Watch Marvel with my friends'),
(7, 3, 'Watch Supersonic'),
(8, 3, 'Seeing a bunch with friends'),
(9, 5, 'Fried eggs ');

-- --------------------------------------------------------

--
-- Table structure for table `support_work_task`
--

CREATE TABLE `support_work_task` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_work_task`
--

INSERT INTO `support_work_task` (`id`, `title`) VALUES
(1, 'Complete your homework'),
(4, 'Going to dinner'),
(3, 'Going to the movies'),
(5, 'Prepare breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `training_calendar`
--

CREATE TABLE `training_calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_calendar`
--

INSERT INTO `training_calendar` (`id`, `title`, `body`, `start_date`, `end_date`) VALUES
(2, 'New Training', 'This is a new training.', '2022-02-04 05:00:00', '2022-02-04 09:00:00'),
(4, 'Youth Training', 'This is needed', '2022-02-07 05:00:00', '2022-02-02 23:29:12'),
(5, 'Hosting', 'This is a new celebration', '2022-02-09 05:00:00', '2022-02-09 07:00:00'),
(6, 'Test Train', 'Comments and further actions', '2022-03-17 04:00:00', '2022-03-18 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `address1` longtext NOT NULL,
  `address2` longtext NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `logged_in_time` int(100) NOT NULL,
  `logged_in_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `firstname`, `lastname`, `email`, `password`, `role`, `telephone`, `address1`, `address2`, `postcode`, `city`, `state`, `photo`, `logged_in_time`, `logged_in_date`, `created_time`, `created_date`) VALUES
(1, 'AXVKBEOMLSO789', 'Scott', 'Nnaghor', 'scottphenix24@gmail.com', '$2a$08$hOKXiDR3/phlWyFNo2ioY.bmXiMZfVW.QtQ8JaZIRcWOkGPeDJob.', 'Admin', '07368660611', '93 Wilmington Gardens', 'none', 'IG11 9TR', 'Barking', 'London', '116-1168169_pictures-of-dragon-ying-yang-wallpapers-data-src.jpg', 1644269291, '2022-02-07 21:28:11', 1630515388, '2021-09-01 16:56:28'),
(6, 'AJJOKBEMLSO749', 'Tommy', 'Harden', 'hr@email.com', '$2a$08$VClqZ.XQ.IvdeiokzGVwQ.gasbjJWIrUfVNyn3SqfReh.pjKq7wki', 'HR', '07448457194', '54 Test Avenue, London', 'none', 'TR12 9ML', 'Coventry', 'London', 'banner1.jpg', 1647609226, '2022-03-18 13:13:46', 1635363009, '2021-10-27 19:30:09'),
(8, 'AXVKBEOMCXZ234', 'James', 'Arnold', 'staff@email.com', '$2a$08$qDmZ.EFdkkLzvz6j/tE7IOaCf9kMjR39MHzQH41lur2aF4X4RRHf.', 'Staff', '', '', '', '', '', '', 'banner1.jpg', 1647856172, '2022-03-21 09:49:32', 1636391984, '2021-11-08 17:19:44'),
(9, 'AXZCDWEKNIA343', 'Steve', 'Terry', 'admin@harold.com', '$2a$08$g69CZNb.dusxrtc0pBTcXeq7qfyp/nfGHEBDeDdc.8DbO97uz7XKK', 'Admin', '', '', '', '', '', '', 'banner3.jpg', 1647856192, '2022-03-21 09:49:52', 1637228399, '2021-11-18 09:39:59'),
(12, 'AZZ2EOMALOD223', 'Mike', 'Mikaela', 'mike275@gmail.com', '$2a$08$c4R8fLMWnTugGxxs/ORRA.u63P.U9jI65wpEi/jLyDkvBrRGz2mWC', 'Staff', '07448457194', '42 Manser Road', 'none', 'RM13 8N', 'London', 'London', 'banner1.jpg', 0, '2021-11-26 10:45:41', 1637923541, '2021-11-26 10:45:41'),
(13, 'ABCDEFGHZXCQWE237', 'Richard', 'Ricky', 'staff@harold.com', '$2a$08$z4XknsfuJrK5Zh.SMYNNHeNM2bk9eYjZQ1hwCkTE.oMuxR8nloB.i', 'Staff', '02023429481', '32 Great baker street, London', '', 'EC1 2RY', 'London', 'London', 'banner3.jpg', 1647875059, '2022-03-21 15:04:19', 1644281398, '2022-02-08 00:49:58'),
(14, 'ABCDEFGHZXCQWE964', 'Steven', 'Hockendon', 'steve@harold.com', '$2a$08$jxbVYdX0xpGZJcXRTUtCOeQ75KowElnWGYAwxLCUv2iLzgW5HybUe', 'Staff', '02023429481', '32 Baker Street, London', '', 'EC1 2RY', 'London', 'London', '1.png', 0, '2022-02-08 12:59:37', 1644325177, '2022-02-08 12:59:37'),
(15, 'ABCDEFGHZXCQWE501', 'Oscar', 'Piastri', 'oscar@harold.com', '$2a$08$SyCcSu/HjfQjD7O121jCMuhPMdCasQYV8Zg3zH7M9EqVbKyqUjFZm', 'Staff', '074458457194', 'Ghost town, Illford', 'none', 'IG1 8TT', 'London', 'London', 'banner1.jpg', 0, '2022-03-15 20:07:47', 1647374867, '2022-03-15 20:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(11) NOT NULL,
  `vehicle_owner` varchar(100) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `insurance` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achieve_target`
--
ALTER TABLE `achieve_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appraisal`
--
ALTER TABLE `appraisal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_of_support`
--
ALTER TABLE `area_of_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_of_support_comment`
--
ALTER TABLE `area_of_support_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_reviews`
--
ALTER TABLE `audit_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_abilities_evaluation`
--
ALTER TABLE `children_abilities_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_absences`
--
ALTER TABLE `children_absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_activity`
--
ALTER TABLE `children_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_case_recording`
--
ALTER TABLE `children_case_recording`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_finance_information`
--
ALTER TABLE `children_finance_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_foster_care`
--
ALTER TABLE `children_foster_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_incidents`
--
ALTER TABLE `children_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_keywork_session`
--
ALTER TABLE `children_keywork_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_medical_history`
--
ALTER TABLE `children_medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_personal_education`
--
ALTER TABLE `children_personal_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_sanction_rewards`
--
ALTER TABLE `children_sanction_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children_supervision_action`
--
ALTER TABLE `children_supervision_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_log`
--
ALTER TABLE `daily_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbs_certificate`
--
ALTER TABLE `dbs_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplinaries`
--
ALTER TABLE `disciplinaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `explode_communication`
--
ALTER TABLE `explode_communication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_ban`
--
ALTER TABLE `guest_ban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `handover`
--
ALTER TABLE `handover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_safety`
--
ALTER TABLE `health_safety`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `independent_living`
--
ALTER TABLE `independent_living`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingoing`
--
ALTER TABLE `ingoing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legal_document`
--
ALTER TABLE `legal_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outgoing`
--
ALTER TABLE `outgoing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedure_pol`
--
ALTER TABLE `procedure_pol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propety_file`
--
ALTER TABLE `propety_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporting`
--
ALTER TABLE `reporting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_assessment`
--
ALTER TABLE `risk_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift_management`
--
ALTER TABLE `shift_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_worker`
--
ALTER TABLE `social_worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_communication`
--
ALTER TABLE `staff_communication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_file`
--
ALTER TABLE `staff_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_plan`
--
ALTER TABLE `support_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_work`
--
ALTER TABLE `support_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_work_subtask`
--
ALTER TABLE `support_work_subtask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_work_task`
--
ALTER TABLE `support_work_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_calendar`
--
ALTER TABLE `training_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achieve_target`
--
ALTER TABLE `achieve_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appraisal`
--
ALTER TABLE `appraisal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area_of_support`
--
ALTER TABLE `area_of_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `area_of_support_comment`
--
ALTER TABLE `area_of_support_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `audit_reviews`
--
ALTER TABLE `audit_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `children_abilities_evaluation`
--
ALTER TABLE `children_abilities_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `children_absences`
--
ALTER TABLE `children_absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `children_activity`
--
ALTER TABLE `children_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children_case_recording`
--
ALTER TABLE `children_case_recording`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `children_finance_information`
--
ALTER TABLE `children_finance_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `children_foster_care`
--
ALTER TABLE `children_foster_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `children_incidents`
--
ALTER TABLE `children_incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `children_keywork_session`
--
ALTER TABLE `children_keywork_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `children_medical_history`
--
ALTER TABLE `children_medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `children_personal_education`
--
ALTER TABLE `children_personal_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `children_sanction_rewards`
--
ALTER TABLE `children_sanction_rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `children_supervision_action`
--
ALTER TABLE `children_supervision_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daily_log`
--
ALTER TABLE `daily_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dbs_certificate`
--
ALTER TABLE `dbs_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disciplinaries`
--
ALTER TABLE `disciplinaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `explode_communication`
--
ALTER TABLE `explode_communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `guest_ban`
--
ALTER TABLE `guest_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `handover`
--
ALTER TABLE `handover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `health_safety`
--
ALTER TABLE `health_safety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `independent_living`
--
ALTER TABLE `independent_living`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ingoing`
--
ALTER TABLE `ingoing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `legal_document`
--
ALTER TABLE `legal_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outgoing`
--
ALTER TABLE `outgoing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `procedure_pol`
--
ALTER TABLE `procedure_pol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `propety_file`
--
ALTER TABLE `propety_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reporting`
--
ALTER TABLE `reporting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `risk_assessment`
--
ALTER TABLE `risk_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shift_management`
--
ALTER TABLE `shift_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `social_worker`
--
ALTER TABLE `social_worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_communication`
--
ALTER TABLE `staff_communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `staff_file`
--
ALTER TABLE `staff_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `support_plan`
--
ALTER TABLE `support_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `support_work`
--
ALTER TABLE `support_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `support_work_subtask`
--
ALTER TABLE `support_work_subtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `support_work_task`
--
ALTER TABLE `support_work_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `training_calendar`
--
ALTER TABLE `training_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
