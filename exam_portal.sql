-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 07:07 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `sl` int(11) NOT NULL,
  `test_id` varchar(200) DEFAULT NULL,
  `course_id` varchar(200) DEFAULT NULL,
  `subject_id` varchar(200) DEFAULT NULL,
  `sem` varchar(200) DEFAULT NULL,
  `question_id` varchar(200) DEFAULT NULL,
  `student_id` varchar(200) DEFAULT NULL,
  `student_answer` varchar(200) DEFAULT NULL,
  `right_answer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`sl`, `test_id`, `course_id`, `subject_id`, `sem`, `question_id`, `student_id`, `student_answer`, `right_answer`) VALUES
(6, 'TEST0001', '2', '1', '2', '1', 'STUD0001', '1', '1'),
(7, 'TEST0001', '2', '1', '2', '5', 'STUD0001', '2', '1'),
(8, 'TEST0001', '2', '1', '2', '8', 'STUD0001', '4', '4'),
(9, 'TEST0001', '2', '1', '2', '3', 'STUD0001', '3', '2'),
(10, 'TEST0001', '2', '1', '2', '4', 'STUD0001', '2', '4'),
(17, 'TEST0005', '1', '4', '1', '18', 'STUD0003', '4', '1'),
(18, 'TEST0005', '1', '4', '1', '16', 'STUD0003', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject`
--

CREATE TABLE `assign_subject` (
  `sl` int(11) NOT NULL,
  `course_id` varchar(250) DEFAULT NULL,
  `semester_id` varchar(250) DEFAULT NULL,
  `subject_id` varchar(250) DEFAULT NULL,
  `teacher_id` varchar(250) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_subject`
--

INSERT INTO `assign_subject` (`sl`, `course_id`, `semester_id`, `subject_id`, `teacher_id`, `stat`) VALUES
(1, '1', '1', '1', '588567', 1),
(2, '2', '2', '1', '588567', 1),
(3, '3', '3', '1', '588567', 1),
(4, '1', '4', '4', '041223', 1),
(5, '1', '5', '5', '041223', 1),
(7, '2', '1', '5', '588567', 1),
(8, '1', '1', '4', '821043', 1),
(9, '1', '1', '5', '821043', 1),
(10, '1', '1', '6', '821043', 1),
(11, '7', '2', '8', '736367', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_dtls`
--

CREATE TABLE `course_dtls` (
  `course_id` int(11) NOT NULL,
  `course_nm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_dtls`
--

INSERT INTO `course_dtls` (`course_id`, `course_nm`) VALUES
(1, 'BSC-IT'),
(2, 'MSC-IT'),
(3, 'BTECH'),
(4, 'MTECH'),
(5, 'BSC-AG'),
(6, 'BCOM'),
(7, 'B-ARTS');

-- --------------------------------------------------------

--
-- Table structure for table `create_test`
--

CREATE TABLE `create_test` (
  `sl` int(11) NOT NULL,
  `test_id` varchar(200) DEFAULT NULL,
  `test_nm` varchar(200) DEFAULT NULL,
  `question_submission_last_dt` varchar(400) DEFAULT NULL,
  `total_no_questions` int(20) DEFAULT NULL,
  `test_type` varchar(200) DEFAULT NULL,
  `test_course` varchar(250) DEFAULT NULL,
  `test_sem` varchar(200) DEFAULT NULL,
  `test_subjects` varchar(250) DEFAULT NULL,
  `test_stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_test`
--

INSERT INTO `create_test` (`sl`, `test_id`, `test_nm`, `question_submission_last_dt`, `total_no_questions`, `test_type`, `test_course`, `test_sem`, `test_subjects`, `test_stat`) VALUES
(1, 'TEST0001', 'MSC_TEST_1', '11-05-2017', 5, '1', '2', '2', '1,2,3', 2),
(3, 'TEST0002', 'BS-IT_TEST_1', '31-03-2017', 2, '1', '1', '2', '4,5', 2),
(5, 'TEST0003', 'BSC-AG_TEST_1', '15-04-2017', 5, '1', '5', '2', '1,4,5', 1),
(6, 'TEST0004', 'MSC-IT_TEST_2', '11-05-2017', 2, '1', '2', '2', '1,2,3', 1),
(7, 'TEST0005', 'BSC-IT_TEST_2', '31-05-2017', 5, '1', '1', '1', '4,5,6', 2),
(8, 'TEST0006', 'BSC-IT_TEST_3', '31-05-2017', 5, '1', '1', '1', '4,5,6', 1),
(9, 'TEST0007', 'B-ARTS', '27-05-2017', 5, '1', '7', '3', '7,8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `final_questions`
--

CREATE TABLE `final_questions` (
  `sl` int(11) NOT NULL,
  `test_id` varchar(200) DEFAULT NULL,
  `course_id` varchar(200) DEFAULT NULL,
  `subject_id` varchar(200) DEFAULT NULL,
  `question` varchar(350) DEFAULT NULL,
  `option_1` varchar(200) DEFAULT NULL,
  `option_2` varchar(200) DEFAULT NULL,
  `option_3` varchar(200) DEFAULT NULL,
  `option_4` varchar(200) DEFAULT NULL,
  `right_answer` varchar(200) DEFAULT NULL,
  `q_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_questions`
--

INSERT INTO `final_questions` (`sl`, `test_id`, `course_id`, `subject_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `right_answer`, `q_status`) VALUES
(1, 'TEST0001', '2', '1', 'how are you?', 'i am good', 'doing okay', 'not good', 'it''s okay', '1', 1),
(2, 'TEST0001', '2', '1', 'k', 'k', 'k', 'k', 'k', '2', 1),
(3, 'TEST0001', '2', '1', 'p', 'p', 'p', 'p', 'p', '2', 1),
(4, 'TEST0001', '2', '1', 'gg', 'gg', 'g', 'g', 'g', '4', 1),
(5, 'TEST0001', '2', '1', 'q', 'q', 'q', 'q', 'q', '1', 1),
(6, 'TEST0001', '2', '1', 's', 's', 's', 's', 's', '2', 1),
(7, 'TEST0001', '2', '1', 'l', 'l', 'l', 'l', 'l', '3', 1),
(8, 'TEST0001', '2', '1', 'm', 'm', 'm', 'm', 'm', '4', 1),
(14, 'TEST0005', '1', '4', 'qw', 'qw', 'qw', 'qw', 'qw', '3', 1),
(15, 'TEST0005', '1', '4', 'ed', 'e', 'd', 'e', 'e', '4', 1),
(16, 'TEST0005', '1', '4', 'question', 'op1', 'op2', 'op3', 'op4', '1', 1),
(17, 'TEST0005', '1', '4', 'ws', 'ws', 'qw', 'er', 'tg', '4', 1),
(18, 'TEST0005', '1', '4', 'question', 'op1', 'op2', 'op3', 'op4', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `sl` int(11) NOT NULL,
  `u_id` varchar(200) DEFAULT NULL,
  `full_nm` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `verification` int(20) DEFAULT NULL,
  `joining` varchar(200) DEFAULT NULL,
  `llg_in` varchar(200) DEFAULT NULL,
  `llg_in_time` varchar(200) DEFAULT NULL,
  `llg_out` varchar(200) DEFAULT NULL,
  `stat` int(5) DEFAULT NULL,
  `lvl` int(5) DEFAULT NULL,
  `very_stat` int(11) DEFAULT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`sl`, `u_id`, `full_nm`, `pass`, `verification`, `joining`, `llg_in`, `llg_in_time`, `llg_out`, `stat`, `lvl`, `very_stat`, `image`) VALUES
(1, 'admin', 'Administrator', '123', 658747, '', '11-05-2017 10:12:29 am', '11-05-2017 10:12:29 am', '11-05-2017 10:13:56 am', 1, -10, 1, 0x75736572),
(16, 'STUD0001', 'Student', 'kgi0zhqe', 0, '', '10-05-2017 11:13:03 am', '10-05-2017 11:13:03 am', '10-05-2017 11:13:08 am', 1, 5, 1, 0x77617465725f776174657266616c6c5f6e61747572655f3231343735312e6a7067),
(17, '588567', 'Teacher', 'QzvBYbhK', 0, '', '10-05-2017 11:00:18 pm', '10-05-2017 11:00:18 pm', '10-05-2017 11:15:43 pm', 1, 3, 1, 0x75736572),
(18, '708370', 'Moderator', 'UsaSz9Ji', 0, '', '11-05-2017 01:50:44 am', '11-05-2017 01:50:18 am', '11-05-2017 01:50:43 am', 1, 1, 1, 0x75736572),
(19, '577907', 'azx', 'fdzb@7Qq', 0, '', '', '', '', 0, 1, 1, 0x75736572),
(20, '041223', 'm', '@pgS*C9t', 0, '', '10-05-2017 08:45:23 am', '10-05-2017 08:45:23 am', '10-05-2017 08:45:49 am', 1, 3, 1, 0x75736572),
(21, '838556', 'a', 'bHWc9$wV', 0, '', '', '', '', 1, 1, 1, 0x75736572),
(22, '423249', 'qaz', 'ZeuDK@q4', 0, '', '', '', '', 1, 1, 1, 0x75736572),
(23, '327577', 'h', 'Y1K2bEck', 0, '', '', '', '', 1, 1, 1, 0x75736572),
(24, '971881', 'a', 'HAyMp*Px', 0, '', '', '', '', 0, 1, 1, 0x75736572),
(25, '369885', 's', 'F*JjkWV8', 0, '', '', '', '', 1, 3, 1, 0x75736572),
(26, '187314', 'f', '*ynZUfYE', 0, '', '', '', '', 0, 1, 1, 0x75736572),
(27, '969002', 'as', 'u4BKL21i', 0, '', '', '', '', 0, 1, 1, 0x75736572),
(28, '996804', 'fff', 'LRwVguSA', 0, '', '', '', '', 0, 3, 1, 0x75736572),
(29, '956387', 'arnab', 'YjcP8Zrs', 0, '', '', '', '', 0, 1, 1, 0x75736572),
(30, '481591', 'hello', 'P2btgmw8', 0, '', '10-05-2017 08:03:45 am', '10-05-2017 08:03:45 am', '10-05-2017 08:03:48 am', 1, 3, 1, 0x75736572),
(31, '100895', 'h', 'e$0bxB6G', 0, '', '', '', '', 0, 3, 1, 0x75736572),
(32, 'STUD0002', 'debjyoti', '3@EZ$V8t', 0, '', '10-05-2017 11:13:32 am', '10-05-2017 11:13:32 am', '10-05-2017 11:13:41 am', 1, 5, 1, 0x75736572),
(33, '352348', 'Ashok', '5eMy3L1s', 0, '', '10-05-2017 08:46:03 am', '10-05-2017 08:46:03 am', '10-05-2017 08:46:59 am', 1, 3, 1, 0x75736572),
(34, '144962', 'Arnab Debnath', 'c8y&V2Sr', NULL, NULL, '11-05-2017 10:07:58 am', '11-05-2017 10:07:58 am', '11-05-2017 10:08:10 am', 1, 1, 1, 0x75736572),
(35, '821043', 'Abhishek Debnath', 'y1c45snC', NULL, NULL, '11-05-2017 10:10:27 am', '11-05-2017 10:10:27 am', '11-05-2017 10:11:57 am', 1, 3, 1, 0x75736572),
(36, 'STUD0003', 'Naren Chakraborty', 'P2p*50ni', NULL, NULL, '11-05-2017 10:12:08 am', '11-05-2017 10:12:08 am', '11-05-2017 10:12:22 am', 1, 5, 1, 0x77617465725f776174657266616c6c5f6e61747572655f3231343735312e6a7067),
(37, '935502', 'priyanka ghadai', 'tlHz$Qfy', NULL, NULL, '11-05-2017 10:14:40 am', '11-05-2017 10:14:40 am', '11-05-2017 10:21:16 am', 1, 1, 1, 0x75736572),
(38, '736367', 'arnab', 'eB7U0z*D', NULL, NULL, '11-05-2017 10:21:33 am', '11-05-2017 10:21:33 am', '11-05-2017 10:28:52 am', 1, 3, 1, 0x75736572),
(39, 'STUD0004', 'vinay', 'zUAy$qhf', NULL, NULL, NULL, NULL, NULL, 1, 5, 1, 0x75736572);

-- --------------------------------------------------------

--
-- Table structure for table `question_setup`
--

CREATE TABLE `question_setup` (
  `sl` int(11) NOT NULL,
  `test_id` varchar(200) DEFAULT NULL,
  `teacher_id` varchar(200) DEFAULT NULL,
  `course_id` varchar(200) DEFAULT NULL,
  `subject_id` varchar(200) DEFAULT NULL,
  `question` varchar(350) DEFAULT NULL,
  `option_1` varchar(200) DEFAULT NULL,
  `option_2` varchar(200) DEFAULT NULL,
  `option_3` varchar(200) DEFAULT NULL,
  `option_4` varchar(200) DEFAULT NULL,
  `right_answer` varchar(200) DEFAULT NULL,
  `q_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_setup`
--

INSERT INTO `question_setup` (`sl`, `test_id`, `teacher_id`, `course_id`, `subject_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `right_answer`, `q_status`) VALUES
(1, 'TEST0001', '588567', '2', '1', 'q', 'q', 'q', 'q', 'q', '1', 1),
(2, 'TEST0001', '588567', '2', '1', 's', 's', 's', 's', 's', '2', 1),
(4, 'TEST0002', '041223', '1', '4', 'g', 'g', 'g', 'g', 'g', '2', 1),
(5, 'TEST0001', '588567', '2', '1', 's', 's', 's', 's', 's', '2', 1),
(6, 'TEST0001', '588567', '2', '1', 'r', 'r', 'rr', 'r', 'r', '3', 1),
(7, 'TEST0001', '588567', '2', '1', 'gg', 'gg', 'g', 'g', 'g', '4', 1),
(8, 'TEST0001', '588567', '2', '1', 'l', 'l', 'l', 'l', 'l', '3', 1),
(9, 'TEST0001', '588567', '2', '1', 'e', 'e', 'e', 'e', 'e', '1', 1),
(10, 'TEST0005', '821043', '1', '4', 'question', 'op1', 'op2', 'op3', 'op4', '1', 1),
(11, 'TEST0005', '821043', '1', '4', 'question', 'op1', 'op2', 'op3', 'op4', '1', 1),
(12, 'TEST0005', '821043', '1', '4', 'ed', 'e', 'd', 'e', 'e', '4', 1),
(13, 'TEST0005', '821043', '1', '4', 'qw', 'qw', 'qw', 'qw', 'qw', '3', 1),
(15, 'TEST0005', '821043', '1', '4', 'ws', 'ws', 'qw', 'er', 'tg', '4', 1),
(16, 'TEST0007', '736367', '7', '8', 'dhdnch', 'fvv', 'qzz', 'eff', 'qaa', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `q_temp`
--

CREATE TABLE `q_temp` (
  `sl` int(11) NOT NULL,
  `test_id` varchar(200) NOT NULL,
  `teacher_id` varchar(200) NOT NULL,
  `course_id` varchar(200) NOT NULL,
  `subject_id` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_temp`
--

INSERT INTO `q_temp` (`sl`, `test_id`, `teacher_id`, `course_id`, `subject_id`, `status`) VALUES
(4, 'TEST0002', '041223', '1', '4', 1),
(8, 'TEST0001', '588567', '2', '1', 0),
(10, 'TEST0004', '588567', '2', '1', 1),
(19, 'TEST0004', '588567', '2', '1', -1),
(20, 'TEST0005', '821043', '1', '4', 0),
(22, 'TEST0006', '821043', '1', '4', 1),
(23, 'TEST0007', '736367', '7', '8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_setup`
--

CREATE TABLE `student_setup` (
  `sl` int(11) NOT NULL,
  `course_id` varchar(200) DEFAULT NULL,
  `sem` varchar(200) DEFAULT NULL,
  `subjects` varchar(200) DEFAULT NULL,
  `student_id` varchar(200) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_setup`
--

INSERT INTO `student_setup` (`sl`, `course_id`, `sem`, `subjects`, `student_id`, `stat`) VALUES
(3, '2', '3', '1,2,3,4,5', 'STUD0001', 1),
(4, '1', '1', '4,5,6', 'STUD0002', 1),
(5, '1', '1', '4,5,6', 'STUD0003', 1),
(6, '7', '3', '7,8', 'STUD0004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_dtls`
--

CREATE TABLE `subject_dtls` (
  `subject_id` int(11) NOT NULL,
  `subject_nm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_dtls`
--

INSERT INTO `subject_dtls` (`subject_id`, `subject_nm`) VALUES
(1, 'WEB TECHNOLOGIES'),
(2, 'MOBILE APPLICATION'),
(3, 'INTRODUCTION TO ERP'),
(4, 'C++'),
(5, 'JAVA'),
(6, 'MATHS'),
(7, 'PHILOSOPHY'),
(8, 'HISTORY');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `sl` int(11) NOT NULL,
  `test_id` varchar(200) DEFAULT NULL,
  `question_id` varchar(200) DEFAULT NULL,
  `course_id` varchar(200) DEFAULT NULL,
  `sem_id` varchar(200) DEFAULT NULL,
  `subject_id` varchar(200) DEFAULT NULL,
  `student_id` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`sl`, `test_id`, `question_id`, `course_id`, `sem_id`, `subject_id`, `student_id`, `status`) VALUES
(6, 'TEST0001', '1', '2', '2', '1', 'STUD0001', 3),
(7, 'TEST0001', '5', '2', '2', '1', 'STUD0001', 3),
(8, 'TEST0001', '8', '2', '2', '1', 'STUD0001', 3),
(9, 'TEST0001', '3', '2', '2', '1', 'STUD0001', 3),
(10, 'TEST0001', '4', '2', '2', '1', 'STUD0001', 3),
(21, 'TEST0005', '17', '1', '1', '4', 'STUD0003', 1),
(22, 'TEST0005', '14', '1', '1', '4', 'STUD0003', 1),
(23, 'TEST0005', '18', '1', '1', '4', 'STUD0003', 3),
(24, 'TEST0005', '16', '1', '1', '4', 'STUD0003', 3),
(25, 'TEST0005', '15', '1', '1', '4', 'STUD0003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_dtls`
--

CREATE TABLE `test_dtls` (
  `sl` int(11) NOT NULL,
  `test_id` varchar(200) DEFAULT NULL,
  `test_course` varchar(200) DEFAULT NULL,
  `test_semester` varchar(200) DEFAULT NULL,
  `test_subject` varchar(200) DEFAULT NULL,
  `test_date` varchar(200) DEFAULT NULL,
  `test_start_time` varchar(200) DEFAULT NULL,
  `test_end_time` varchar(200) DEFAULT NULL,
  `test_stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_dtls`
--

INSERT INTO `test_dtls` (`sl`, `test_id`, `test_course`, `test_semester`, `test_subject`, `test_date`, `test_start_time`, `test_end_time`, `test_stat`) VALUES
(2, 'TEST0001', '2', '2', '1', '9-05-2017', '17:50', '23:59', 1),
(4, 'TEST0005', '1', '1', '4', '10-05-2017', '11:25', '23:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_dtls`
--

CREATE TABLE `user_dtls` (
  `sl` int(11) NOT NULL,
  `user_type` varchar(250) DEFAULT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `user_pass` varchar(250) DEFAULT NULL,
  `user_nm` varchar(250) DEFAULT NULL,
  `user_add` varchar(250) DEFAULT NULL,
  `user_gender` varchar(100) DEFAULT NULL,
  `user_ph` varchar(250) DEFAULT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `lvl` int(5) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_dtls`
--

INSERT INTO `user_dtls` (`sl`, `user_type`, `user_id`, `user_pass`, `user_nm`, `user_add`, `user_gender`, `user_ph`, `user_email`, `lvl`, `stat`) VALUES
(1, '3', 'STUD0001', 'kgi0zhqe', 'Student', 'Ranaghat', '1', '9046148131', 's@d.qaa', 5, 1),
(2, '2', '588567', 'QzvBYbhK', 'Teacher', 'n', '1', '3333333333', '33@h.cm', 3, 1),
(3, '1', '708370', 'UsaSz9Ji', 'Moderator', 'dcf', '1', '4444444444', 'as@g.com', 1, 1),
(4, '1', '577907', 'fdzb@7Qq', 'azx', 'qaz', '1', '3333333377', 'q@g.con', 1, 0),
(5, '2', '041223', '@pgS*C9t', 'm', 'j', '1', '5555555588', '7@f.cv', 3, 1),
(9, '1', '971881', 'HAyMp*Px', 'a', 's', '1', '1234444444', 'a@c.vb', 1, 0),
(11, '1', '187314', '*ynZUfYE', 'f', 's', '1', '1234567897', 'h@f.vb', 1, 0),
(12, '1', '969002', 'u4BKL21i', 'as', 'as', '1', '1111111555', 'g@f.cv', 1, 0),
(13, '2', '996804', 'LRwVguSA', 'fff', 'ff', '1', '1111555555', 'a@f.df', 3, 0),
(14, '1', '956387', 'YjcP8Zrs', 'arnab', 'pune', '1', '7894561230', 'asd@gmail.com', 1, 0),
(15, '2', '481591', 'P2btgmw8', 'hello', 'hello', '1', '7894561023', 'qwe@gmail.com', 3, 1),
(16, '2', '100895', 'e$0bxB6G', 'h', 'h', '1', '7148515555', 'd@n.bn', 3, 0),
(17, '3', 'STUD0002', '3@EZ$V8t', 'debjyoti', 'biswas', '1', '7466666666', 'debjyotib4@gmail.com', 5, 1),
(18, '2', '352348', '5eMy3L1s', 'Ashok', 'asd', '1', '5555555554', 'asd2@gmail.com', 3, 1),
(20, '1', '144962', 'c8y&V2Sr', 'Arnab Debnath', 'Ranaghat', '1', '7908299700', 'arnabkdebnath@gmail.com', 1, 1),
(21, '2', '821043', 'y1c45snC', 'Abhishek Debnath', 'Ranaghat', '1', '9999999999', 'ad@gmail.com', 3, 1),
(22, '3', 'STUD0003', 'P2p*50ni', 'Naren Chakraborty', 'Pune', '1', '9333333333', 'hd@gmail.com', 5, 1),
(23, '1', '935502', 'tlHz$Qfy', 'priyanka ghadai', 'pune', '1', '7236941563', 'priyanka.ghadai4@gmail.com', 1, 1),
(24, '2', '736367', 'eB7U0z*D', 'arnab', 'wb', '1', '7012589314', 'arnabkdebnath@asd.com', 3, 1),
(25, '3', 'STUD0004', 'zUAy$qhf', 'vinay', 'gujrat', '1', '9624444444', 'vinay@gmail.com', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `assign_subject`
--
ALTER TABLE `assign_subject`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `course_dtls`
--
ALTER TABLE `course_dtls`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `create_test`
--
ALTER TABLE `create_test`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `final_questions`
--
ALTER TABLE `final_questions`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `question_setup`
--
ALTER TABLE `question_setup`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `q_temp`
--
ALTER TABLE `q_temp`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `student_setup`
--
ALTER TABLE `student_setup`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `subject_dtls`
--
ALTER TABLE `subject_dtls`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `test_dtls`
--
ALTER TABLE `test_dtls`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `user_dtls`
--
ALTER TABLE `user_dtls`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `assign_subject`
--
ALTER TABLE `assign_subject`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `course_dtls`
--
ALTER TABLE `course_dtls`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `create_test`
--
ALTER TABLE `create_test`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `final_questions`
--
ALTER TABLE `final_questions`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `question_setup`
--
ALTER TABLE `question_setup`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `q_temp`
--
ALTER TABLE `q_temp`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `student_setup`
--
ALTER TABLE `student_setup`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subject_dtls`
--
ALTER TABLE `subject_dtls`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `test_dtls`
--
ALTER TABLE `test_dtls`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_dtls`
--
ALTER TABLE `user_dtls`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
