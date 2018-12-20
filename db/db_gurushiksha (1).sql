-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2018 at 10:40 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gurushiksha`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_followers`
--

DROP TABLE IF EXISTS `tbl_followers`;
CREATE TABLE IF NOT EXISTS `tbl_followers` (
  `follower_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `updated_time` varchar(255) NOT NULL,
  PRIMARY KEY (`follower_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_followers`
--

INSERT INTO `tbl_followers` (`follower_id`, `mentor_id`, `user_id`, `user_type`, `status`, `created_time`, `created_date`, `updated_date`, `updated_time`) VALUES
(1, 1, 1, 'S', 1, '11:03:44 am', '2018-12-11', '', ''),
(2, 2, 1, 'S', 1, '11:04:43 am', '2018-12-11', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opinions`
--

DROP TABLE IF EXISTS `tbl_opinions`;
CREATE TABLE IF NOT EXISTS `tbl_opinions` (
  `opinion_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `opinion` text NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`opinion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_name` varchar(50) NOT NULL,
  `admin_pwd` varchar(255) NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_user_name`, `admin_pwd`, `active`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'admin', 'WVdSdGFXND0=', 'Y', '2018-03-16', '05:26:22', '2018-05-22', '07:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_assesments_opt`
--

DROP TABLE IF EXISTS `tb_assesments_opt`;
CREATE TABLE IF NOT EXISTS `tb_assesments_opt` (
  `opt_id` int(11) NOT NULL AUTO_INCREMENT,
  `assmnt_q_id` int(11) NOT NULL,
  `options` varchar(255) NOT NULL,
  `assmnt_id` int(11) NOT NULL,
  PRIMARY KEY (`opt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_assesments_opt`
--

INSERT INTO `tb_assesments_opt` (`opt_id`, `assmnt_q_id`, `options`, `assmnt_id`) VALUES
(64, 22, 'A', 5),
(63, 21, 'B', 5),
(62, 21, 'A', 5),
(61, 20, 'E', 5),
(60, 20, 'D', 5),
(59, 20, 'C', 5),
(58, 20, 'B', 5),
(57, 20, 'A', 5),
(56, 19, 'E', 5),
(55, 19, 'D', 5),
(54, 19, 'C', 5),
(53, 19, 'B', 5),
(52, 19, 'A', 5),
(48, 18, 'A', 5),
(49, 18, 'B', 5),
(50, 18, 'C', 5),
(51, 18, 'D', 5),
(65, 22, 'B', 5),
(66, 22, 'C', 5),
(67, 22, 'D', 5),
(68, 23, 'A', 5),
(69, 23, 'B', 5),
(70, 23, 'C', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_assignments`
--

DROP TABLE IF EXISTS `tb_assignments`;
CREATE TABLE IF NOT EXISTS `tb_assignments` (
  `ass_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `post_status` int(11) NOT NULL,
  PRIMARY KEY (`ass_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_assignments`
--

INSERT INTO `tb_assignments` (`ass_id`, `student_id`, `mentor_id`, `sub_id`, `post_image`, `created_date`, `created_time`, `post_status`) VALUES
(2, 1, 1, 6, 'M1543919391.jpeg', 'Tuesday', '18:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_chapter`
--

DROP TABLE IF EXISTS `tb_chapter`;
CREATE TABLE IF NOT EXISTS `tb_chapter` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`chapter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_chapter`
--

INSERT INTO `tb_chapter` (`chapter_id`, `subject_id`, `chapter`, `status`, `created_date`, `created_time`) VALUES
(1, 3, 'Calculas', 1, '2018-10-30', '06:09:52'),
(2, 3, 'Integration', 1, '2018-10-30', '13:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_class`
--

DROP TABLE IF EXISTS `tb_class`;
CREATE TABLE IF NOT EXISTS `tb_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_class`
--

INSERT INTO `tb_class` (`class_id`, `class`, `status`, `created_time`, `created_date`) VALUES
(2, 'x', '1', '05:45:18', '2018-10-29'),
(3, 'ii', '1', '05:45:57', '2018-10-29'),
(4, 'i', '1', '05:27:08', '2018-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_current_course`
--

DROP TABLE IF EXISTS `tb_current_course`;
CREATE TABLE IF NOT EXISTS `tb_current_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `mentor` int(11) NOT NULL,
  `class_status` int(11) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_current_course`
--

INSERT INTO `tb_current_course` (`course_id`, `user_id`, `subject`, `time`, `mentor`, `class_status`, `created_date`, `created_time`) VALUES
(1, 1, 6, 2, 1, 1, '2018-12-04', '04:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_doc_charge`
--

DROP TABLE IF EXISTS `tb_doc_charge`;
CREATE TABLE IF NOT EXISTS `tb_doc_charge` (
  `charge_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` varchar(255) NOT NULL,
  `fee` int(11) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`charge_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_doc_charge`
--

INSERT INTO `tb_doc_charge` (`charge_id`, `doc_type`, `fee`, `created_time`, `created_date`) VALUES
(1, 'Audio', 1000, '12:52:34', '2018-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fees`
--

DROP TABLE IF EXISTS `tb_fees`;
CREATE TABLE IF NOT EXISTS `tb_fees` (
  `fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`fee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fees`
--

INSERT INTO `tb_fees` (`fee_id`, `subject_id`, `chapter_id`, `fee`, `created_date`, `created_time`) VALUES
(6, 3, 2, 500, '2018-10-31', '05:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guardian`
--

DROP TABLE IF EXISTS `tb_guardian`;
CREATE TABLE IF NOT EXISTS `tb_guardian` (
  `guardian_id` int(11) NOT NULL AUTO_INCREMENT,
  `guardian_name` varchar(255) NOT NULL,
  `guardian_gender` varchar(255) NOT NULL,
  `guardian_email` varchar(255) NOT NULL,
  `guardian_mobile` varchar(255) NOT NULL,
  `guardian_address` text NOT NULL,
  `guardian_pin` varchar(255) NOT NULL,
  `rel_with_stud` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`guardian_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guardian`
--

INSERT INTO `tb_guardian` (`guardian_id`, `guardian_name`, `guardian_gender`, `guardian_email`, `guardian_mobile`, `guardian_address`, `guardian_pin`, `rel_with_stud`, `photo`, `status`, `created_date`, `created_time`) VALUES
(1, 'John Doe', 'Female', 'john@gmail.cm', '9004616202', '123 Demo Street', '789654', 'Father', '', 1, '2018-12-11', '14:56:15'),
(2, 'Max', 'Male', 'max@gmail.cm', '9004616202', '123 Demo Street', '789654', 'Father', '', 1, '2018-12-11', '14:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_language`
--

DROP TABLE IF EXISTS `tb_language`;
CREATE TABLE IF NOT EXISTS `tb_language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_language`
--

INSERT INTO `tb_language` (`language_id`, `language_name`, `status`, `created_time`, `created_date`) VALUES
(2, 'English', '1', '05:40:06', '2018-10-29'),
(3, 'Bengali', '1', '06:19:55', '2018-10-29'),
(4, 'Hindi', '1', '05:24:22', '2018-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mentors`
--

DROP TABLE IF EXISTS `tb_mentors`;
CREATE TABLE IF NOT EXISTS `tb_mentors` (
  `mentor_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_name` varchar(255) NOT NULL,
  `mentor_dob` varchar(255) NOT NULL,
  `mentor_gender` varchar(255) NOT NULL,
  `mentor_email` varchar(255) NOT NULL,
  `mentor_mobile` varchar(255) NOT NULL,
  `mentor_address` text NOT NULL,
  `mentor_pin` varchar(255) NOT NULL,
  `associated_school` text NOT NULL,
  `about` text NOT NULL,
  `achievements` text NOT NULL,
  `mentor_subjects` varchar(255) NOT NULL,
  `mentor_preferred_day` varchar(255) NOT NULL,
  `mentor_preferred_time` varchar(255) NOT NULL,
  `mentor_language` varchar(255) NOT NULL,
  `mentor_qualification` varchar(255) NOT NULL,
  `mentor_experience` varchar(255) NOT NULL,
  `mentor_fee` int(11) NOT NULL,
  `photo` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  PRIMARY KEY (`mentor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mentors`
--

INSERT INTO `tb_mentors` (`mentor_id`, `mentor_name`, `mentor_dob`, `mentor_gender`, `mentor_email`, `mentor_mobile`, `mentor_address`, `mentor_pin`, `associated_school`, `about`, `achievements`, `mentor_subjects`, `mentor_preferred_day`, `mentor_preferred_time`, `mentor_language`, `mentor_qualification`, `mentor_experience`, `mentor_fee`, `photo`, `status`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'Saikat Bhadury', '1995-06-16', 'Male', 'saikat.projukti@gmail.com', '9547763998', '123 Demo Street, Unknown-76', '9874563', 'Kaliyaganj Parbati Sundari High School', 'I am a programmer', 'PUBG pro player', '', '', '', 'Bengali', 'BCA', '6 years', 0, '1544084322.png', 1, '2018-12-03', '15:45:09', '0000-00-00', '00:00:00'),
(2, 'Sourav Samanta', '1988-08-14', 'Male', 'mail.sourav51@gmail.com', '8335887999', '42 Boral Main Road', '700084', 'Boral high school', 'I am a new mentor', 'Lots of experience', '', '', '', 'Bengali', 'B. Tech', '6 years', 0, '1544084322.png', 1, '2018-12-06', '13:46:51', '0000-00-00', '00:00:00'),
(3, 'Subhomoy Samanta', '1989-02-21', 'Male', 'subhomoy.projukti@gmail.com', '8981374267', 'Howrah', '711112', 'School', 'Biodata', 'Kichuna', '', '', '', 'Bengali', 'B.tech', '4 years', 0, '', 1, '2018-12-06', '13:48:57', '0000-00-00', '00:00:00'),
(4, 'Guparna', '1221-12-12', 'Female', 'su@gmail.com', '6321456987', '123 Demo Street', '123456', 'KPSHS', 'Hello There', 'All Data', '', '', '', 'Bengali', 'MCA', 'EXP', 0, '', 1, '2018-12-11', '14:44:11', '0000-00-00', '00:00:00'),
(5, 'SS SS', '2018-12-01', 'Male', 'dsada@gmail.com', '23213123123123', '123 Demo Street', '987456', 'Demo ', 'Bio', 'Demo', '', '', '', 'Bengali', 'Demo', 'Demo', 0, '', 1, '2018-12-11', '14:49:36', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mentors_subject`
--

DROP TABLE IF EXISTS `tb_mentors_subject`;
CREATE TABLE IF NOT EXISTS `tb_mentors_subject` (
  `men_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`men_sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mentors_subject`
--

INSERT INTO `tb_mentors_subject` (`men_sub_id`, `mentor_id`, `subject_id`, `created_time`, `created_date`) VALUES
(1, 1, 6, '15:45:09', '2018-12-03'),
(2, 1, 4, '15:45:09', '2018-12-03'),
(3, 1, 3, '15:45:09', '2018-12-03'),
(4, 2, 5, '13:46:51', '2018-12-06'),
(5, 2, 7, '13:46:51', '2018-12-06'),
(6, 2, 4, '13:46:51', '2018-12-06'),
(7, 3, 3, '13:48:57', '2018-12-06'),
(8, 3, 5, '13:48:57', '2018-12-06'),
(9, 3, 7, '13:48:57', '2018-12-06'),
(10, 4, 6, '14:44:11', '2018-12-11'),
(11, 4, 6, '14:44:11', '2018-12-11'),
(12, 4, 6, '14:44:11', '2018-12-11'),
(13, 5, 6, '14:49:36', '2018-12-11'),
(14, 5, 6, '14:49:36', '2018-12-11'),
(15, 5, 6, '14:49:36', '2018-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mentor_tech_time`
--

DROP TABLE IF EXISTS `tb_mentor_tech_time`;
CREATE TABLE IF NOT EXISTS `tb_mentor_tech_time` (
  `tech_time_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `pf_day_id` int(11) NOT NULL,
  `pf_time_id` int(11) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  PRIMARY KEY (`tech_time_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mentor_tech_time`
--

INSERT INTO `tb_mentor_tech_time` (`tech_time_id`, `user_id`, `subject_id`, `pf_day_id`, `pf_time_id`, `created_time`, `created_date`) VALUES
(1, 1, 6, 2, 2, '16:36:27', '2018-12-03'),
(2, 2, 4, 2, 3, '13:52:04', '2018-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

DROP TABLE IF EXISTS `tb_posts`;
CREATE TABLE IF NOT EXISTS `tb_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'posted_by',
  `user_type` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` text,
  `post_status` int(11) NOT NULL,
  `is_own_liked` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` varchar(255) NOT NULL,
  `create_date_full` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `updated_time` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_posts`
--

INSERT INTO `tb_posts` (`post_id`, `user_id`, `user_type`, `post_content`, `post_image`, `post_status`, `is_own_liked`, `created_date`, `create_date_full`, `created_time`, `updated_time`, `updated_date`) VALUES
(1, 1, 'M', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, 0, 'Monday', '03-12-2018 04:35:27', '16:35', '', ''),
(2, 1, 'S', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 1, 0, 'Monday', '03-12-2018 04:57:53', '16:57', '', ''),
(3, 1, 'S', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 1, 0, 'Monday', '03-12-2018 05:32:06', '17:32', '', ''),
(4, 2, 'M', 'Hello there', '21544084420.jpeg', 1, 1, 'Thursday', '06-12-2018 01:50:20', '13:50', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_comments`
--

DROP TABLE IF EXISTS `tb_post_comments`;
CREATE TABLE IF NOT EXISTS `tb_post_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'commented_by',
  `user_type` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` int(11) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_report`
--

DROP TABLE IF EXISTS `tb_post_report`;
CREATE TABLE IF NOT EXISTS `tb_post_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_save`
--

DROP TABLE IF EXISTS `tb_post_save`;
CREATE TABLE IF NOT EXISTS `tb_post_save` (
  `save_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'saved_by',
  `created_time` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  PRIMARY KEY (`save_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_post_save`
--

INSERT INTO `tb_post_save` (`save_id`, `post_id`, `user_id`, `created_time`, `created_date`, `user_type`) VALUES
(18, 4, 1, '11:41:19', '2018-12-11', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_view`
--

DROP TABLE IF EXISTS `tb_post_view`;
CREATE TABLE IF NOT EXISTS `tb_post_view` (
  `postv_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `updated_time` varchar(255) NOT NULL,
  PRIMARY KEY (`postv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_self_assesment`
--

DROP TABLE IF EXISTS `tb_self_assesment`;
CREATE TABLE IF NOT EXISTS `tb_self_assesment` (
  `assmnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_type` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`assmnt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_self_assesment`
--

INSERT INTO `tb_self_assesment` (`assmnt_id`, `assessment_type`, `class_id`, `subject_id`, `chapter_id`, `created_date`, `created_time`) VALUES
(5, 'm', 3, 3, 1, '2018-12-05', '17:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_self_assesment_q`
--

DROP TABLE IF EXISTS `tb_self_assesment_q`;
CREATE TABLE IF NOT EXISTS `tb_self_assesment_q` (
  `assmnt_q_id` int(11) NOT NULL AUTO_INCREMENT,
  `assmnt_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `is_complete` int(11) NOT NULL,
  PRIMARY KEY (`assmnt_q_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_self_assesment_q`
--

INSERT INTO `tb_self_assesment_q` (`assmnt_q_id`, `assmnt_id`, `question`, `answer`, `created_date`, `created_time`, `is_complete`) VALUES
(19, 5, 'How Many Girls Work in PROJUKTI<br/>\r\nA) 1.5  B) 2  C) 3  D) 4  E) 3.5', 'B', '2018-12-05', '17:32:54', 0),
(18, 5, '1) What is value of this multiplication\r\n3*2 = ?\r\nA) 1\r\nB) 2\r\nC) 3\r\nD ) 6', 'D', '2018-12-05', '17:29:20', 0),
(20, 5, 'Who Freaks Out All The Time\r\nA) Suparna  B) Saikat  C) Sreejit D) Subhomoy E) Debanjan\r\n', 'E', '2018-12-05', '17:39:08', 0),
(21, 5, 'How to get rid off your credit amount\r\nA) Bathroom e dhuke dorja bodho kore rakha\r\nB) Chaad theke jhap deoa', 'A', '2018-12-05', '17:43:25', 0),
(22, 5, 'Chulkani hole ki korben\r\nA) Ring Guard  B) B Tex  C) Parachute Uttam Narkel Tel  D) Thanda Baraf Kuchi ghosben', 'A', '2018-12-05', '17:49:12', 0),
(23, 5, 'How to eat more in a party\r\nA) poti clear kore\r\nB) bomi kore\r\nC) jor kore', 'C', '2018-12-05', '18:26:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sms`
--

DROP TABLE IF EXISTS `tb_sms`;
CREATE TABLE IF NOT EXISTS `tb_sms` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_title` varchar(255) NOT NULL,
  `sms_description` text NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sms`
--

INSERT INTO `tb_sms` (`sms_id`, `sms_title`, `sms_description`, `created_date`, `created_time`) VALUES
(9, 'Hello1', 'Test sms1', '2018-12-13', '13:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sms_send`
--

DROP TABLE IF EXISTS `tb_sms_send`;
CREATE TABLE IF NOT EXISTS `tb_sms_send` (
  `sms_send_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `sms_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`sms_send_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sms_send`
--

INSERT INTO `tb_sms_send` (`sms_send_id`, `subject_id`, `sms_id`, `user_type`, `user_id`, `created_date`, `created_time`) VALUES
(1, 6, 9, 'M', 1, '2018-12-14', '10:24:05'),
(3, 6, 9, 'S', 1, '2018-12-14', '10:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_students`
--

DROP TABLE IF EXISTS `tb_students`;
CREATE TABLE IF NOT EXISTS `tb_students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `pin` varchar(255) NOT NULL,
  `school` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `board_name` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `preferred_day` varchar(255) NOT NULL,
  `preferred_time` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `guardian_phone` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `is_verified_email` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_students`
--

INSERT INTO `tb_students` (`student_id`, `name`, `dob`, `gender`, `email`, `mobile`, `address`, `pin`, `school`, `class`, `board_name`, `subjects`, `preferred_day`, `preferred_time`, `language`, `guardian_name`, `guardian_phone`, `photo`, `is_verified_email`, `status`, `created_date`, `created_time`) VALUES
(1, 'Subhomoy Samanta', '1996-12-12', 'Female', 'info2programmer@gmail.com', '9800261032', '123 Demo Street, Demo', '896547', 'Howrah School', 'i', 'WB', '', 'Monday', '05:06 AM', 'Bengali', 'Baba Samanta', '987456365', '1543824827.png', 0, 1, '2018-12-03', '16:41:24'),
(2, 'Sourav Samanta', '1996-12-12', 'male', 'samanta@gmail.com', '9874563210', '123 Demo Street, Demo', '896547', 'Boral School', 'i', 'WB', '', 'Monday', '05:06 AM', 'Bengali', 'Baba Samanta', '987456365', '1544084322.png', 0, 1, '2018-12-03', '16:41:24'),
(3, 'Debanjan Dey', '1996-12-12', 'male', 'dey@gmail.com', '9874563210', '123 Demo Street, Demo', '896547', 'Boral School', 'i', 'WB', '', 'Monday', '05:06 AM', 'Bengali', 'Baba Samanta', '987456365', '111542788699.png', 0, 1, '2018-12-03', '16:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_students_subject`
--

DROP TABLE IF EXISTS `tb_students_subject`;
CREATE TABLE IF NOT EXISTS `tb_students_subject` (
  `stu_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`stu_sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_students_subject`
--

INSERT INTO `tb_students_subject` (`stu_sub_id`, `student_id`, `subject_id`, `created_time`, `created_date`) VALUES
(1, 1, 6, '16:41:24', '2018-12-03'),
(2, 1, 4, '16:41:24', '2018-12-03'),
(3, 1, 7, '16:41:24', '2018-12-03'),
(4, 1, 3, '16:41:24', '2018-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_studymaterial`
--

DROP TABLE IF EXISTS `tb_studymaterial`;
CREATE TABLE IF NOT EXISTS `tb_studymaterial` (
  `studymaterial_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` text NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`studymaterial_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_studymaterial`
--

INSERT INTO `tb_studymaterial` (`studymaterial_id`, `mentor_id`, `class_id`, `subject_id`, `chapter_id`, `document_type`, `file_name`, `file_path`, `created_date`, `created_time`) VALUES
(1, 2, 3, 3, 1, 'PDF', 'BLOCK 2.pdf', '1541405595.pdf', '2018-11-05', '08:13:15'),
(2, 2, 2, 3, 1, 'Audio', '', '1541397649.mp3', '2018-11-05', '06:00:49'),
(7, 3, 2, 3, 1, 'Video', 'mov_bbb.mp4', '1541404587.mp4', '2018-11-05', '07:56:27'),
(5, 2, 3, 3, 1, 'Image', 'z.jpg', '1541404467.jpg', '2018-11-05', '07:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subject`
--

DROP TABLE IF EXISTS `tb_subject`;
CREATE TABLE IF NOT EXISTS `tb_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subject`
--

INSERT INTO `tb_subject` (`subject_id`, `subject`, `status`, `created_time`, `created_date`) VALUES
(3, 'Math', '1', '05:43:13', '2018-10-29'),
(4, 'Chem', '1', '07:38:09', '2018-10-29'),
(5, 'Phy', '1', '07:38:14', '2018-10-29'),
(6, 'Bio', '1', '07:38:18', '2018-10-29'),
(7, 'Geography', '1', '05:26:05', '2018-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teaching_days`
--

DROP TABLE IF EXISTS `tb_teaching_days`;
CREATE TABLE IF NOT EXISTS `tb_teaching_days` (
  `day_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_teaching_days`
--

INSERT INTO `tb_teaching_days` (`day_id`, `day`, `status`, `created_time`, `created_date`) VALUES
(2, 'Monday', '1', '05:57:21', '2018-10-29'),
(3, 'Tuesday', '1', '05:57:52', '2018-10-29'),
(4, 'Thursday', '1', '06:37:08', '2018-10-29'),
(5, 'Saturday', '1', '05:41:09', '2018-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teaching_time`
--

DROP TABLE IF EXISTS `tb_teaching_time`;
CREATE TABLE IF NOT EXISTS `tb_teaching_time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_teaching_time`
--

INSERT INTO `tb_teaching_time` (`time_id`, `time`, `status`, `created_time`, `created_date`) VALUES
(4, '10:20', '1', '05:40:58', '2018-11-14'),
(2, '05:06', '1', '05:48:49', '2018-10-29'),
(3, '10:04', '1', '05:54:38', '2018-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload`
--

DROP TABLE IF EXISTS `tb_upload`;
CREATE TABLE IF NOT EXISTS `tb_upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `created_time` time NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_uploaded_assignment`
--

DROP TABLE IF EXISTS `tb_uploaded_assignment`;
CREATE TABLE IF NOT EXISTS `tb_uploaded_assignment` (
  `assgn_id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`assgn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_chat`
--

DROP TABLE IF EXISTS `td_chat`;
CREATE TABLE IF NOT EXISTS `td_chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `to_id` int(11) NOT NULL,
  `to_user_type` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `is_read` int(11) NOT NULL,
  `chat_date` date NOT NULL,
  `chat_time` varchar(255) NOT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_chat`
--

INSERT INTO `td_chat` (`chat_id`, `from_id`, `user_type`, `to_id`, `to_user_type`, `msg`, `is_read`, `chat_date`, `chat_time`) VALUES
(1, 1, 'S', 0, 'A', 'Hello There Saikat Here', 1, '2018-12-04', '06:08:38 pm'),
(2, 1, 'S', 0, 'A', 'Iron Man VS Captain America ', 1, '2018-12-04', '06:09:01 pm'),
(3, 0, 'A', 1, 'S', 'Kiska hai ye tumko intezer main hu na', 1, '2018-12-04', '06:11:01 pm'),
(4, 1, 'S', 0, 'A', 'Thank you', 1, '2018-12-04', '06:55:46 pm'),
(9, 2, 'S', 0, 'A', 'How are you', 1, '2018-12-04', '06:55:46 pm'),
(8, 2, 'S', 0, 'A', 'Test by me', 1, '2018-12-04', '06:55:46 pm'),
(10, 0, 'A', 2, 'S', 'to kya hoga?', 1, '2018-12-04', '06:11:01 pm'),
(11, 0, 'A', 3, 'S', 'Hello sir..', 1, '2018-12-04', '06:11:01 pm'),
(49, 0, 'A', 3, 'M', 'Hello sir..', 1, '2018-12-04', '06:11:01 pm'),
(48, 0, 'A', 2, 'M', 'to kya hoga?', 1, '2018-12-04', '06:11:01 pm'),
(47, 2, 'M', 0, 'A', 'Test by me', 1, '2018-12-04', '06:55:46 pm'),
(46, 2, 'M', 0, 'A', 'How are you', 1, '2018-12-04', '06:55:46 pm'),
(45, 1, 'M', 0, 'A', 'Thank you', 1, '2018-12-04', '06:55:46 pm'),
(44, 0, 'A', 1, 'M', 'Kiska hai ye tumko intezer main hu na', 1, '2018-12-04', '06:11:01 pm'),
(43, 1, 'M', 0, 'A', 'Iron Man VS Captain America ', 1, '2018-12-04', '06:09:01 pm'),
(42, 1, 'M', 0, 'A', 'Hello There Saikat Here', 1, '2018-12-04', '06:08:38 pm');

-- --------------------------------------------------------

--
-- Table structure for table `td_contact`
--

DROP TABLE IF EXISTS `td_contact`;
CREATE TABLE IF NOT EXISTS `td_contact` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_contact`
--

INSERT INTO `td_contact` (`cid`, `name`, `email`, `msg`, `phone`, `created_date`, `created_time`) VALUES
(1, 'Sourav Samanta', 'sourav.projukti@gmail.com', 'Hye There Sourav Here.. ', '9547763998', '2018-12-04', '13:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `td_enquery`
--

DROP TABLE IF EXISTS `td_enquery`;
CREATE TABLE IF NOT EXISTS `td_enquery` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_enquery`
--

INSERT INTO `td_enquery` (`cid`, `name`, `email`, `msg`, `phone`, `created_date`, `created_time`) VALUES
(1, 'Subhomoy Samanta', 'info2programmer@gmail.com', 'Iron Man Is the best super hero in marvel universe ', '9800261032', '2018-12-04', '14:14:19'),
(2, 'Subhomoy Samanta', 'info2programmer@gmail.com', 'Iron Man Is the best super hero in marvel universe ', '9800261032', '2018-12-04', '14:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `td_exam`
--

DROP TABLE IF EXISTS `td_exam`;
CREATE TABLE IF NOT EXISTS `td_exam` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `assesment_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `opt_val` varchar(255) NOT NULL,
  `curr_val` varchar(255) NOT NULL,
  `rest` varchar(25) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` varchar(255) NOT NULL,
  `is_complete` int(11) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_exam`
--

INSERT INTO `td_exam` (`exam_id`, `user_id`, `assesment_id`, `question_id`, `opt_val`, `curr_val`, `rest`, `exam_date`, `exam_time`, `is_complete`) VALUES
(1, 1, 5, 19, 'E', 'B', 'N', '2018-12-05', '05:14:41 pm', 1),
(2, 1, 5, 18, 'A', 'D', 'N', '2018-12-05', '05:14:41 pm', 1),
(3, 1, 5, 20, 'E', 'E', 'y', '2018-12-05', '05:14:41 pm', 1),
(4, 1, 5, 21, 'B', 'A', 'N', '2018-12-05', '05:14:41 pm', 1),
(5, 1, 5, 22, 'A', 'A', 'y', '2018-12-05', '05:14:41 pm', 1),
(6, 1, 5, 23, 'A', 'C', 'N', '2018-12-05', '05:14:41 pm', 1),
(7, 1, 5, 19, 'E', 'B', 'N', '2018-12-04', '06:13:47 pm', 1),
(8, 1, 5, 18, 'A', 'D', 'N', '2018-12-04', '06:13:47 pm', 1),
(9, 1, 5, 20, 'E', 'E', 'y', '2018-12-04', '06:13:47 pm', 1),
(10, 1, 5, 21, 'B', 'A', 'N', '2018-12-04', '06:13:47 pm', 1),
(11, 1, 5, 22, 'A', 'A', 'N', '2018-12-04', '06:13:47 pm', 1),
(12, 1, 5, 23, 'A', 'C', 'N', '2018-12-04', '06:13:47 pm', 1),
(13, 1, 5, 19, 'A', 'B', 'N', '2018-12-06', '10:35:16 am', 1),
(14, 1, 5, 18, 'D', 'D', 'y', '2018-12-06', '10:35:16 am', 1),
(15, 1, 5, 20, 'A', 'E', 'N', '2018-12-06', '10:35:16 am', 1),
(16, 1, 5, 21, 'B', 'A', 'N', '2018-12-06', '10:35:16 am', 1),
(17, 1, 5, 22, 'C', 'A', 'N', '2018-12-06', '10:35:16 am', 1),
(18, 1, 5, 23, 'A', 'C', 'N', '2018-12-06', '10:35:16 am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_special_query`
--

DROP TABLE IF EXISTS `td_special_query`;
CREATE TABLE IF NOT EXISTS `td_special_query` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `q_date` date NOT NULL,
  `q_time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `reply` text NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_special_query`
--

INSERT INTO `td_special_query` (`qid`, `user_id`, `mentor_id`, `message`, `q_date`, `q_time`, `status`, `reply`) VALUES
(1, 1, 1, 'What is lorem ipsum? can you tell me?', '2018-12-06', '11:06:54 am', 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
