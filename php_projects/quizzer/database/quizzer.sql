-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2019 at 04:17 PM
-- Server version: 10.1.38-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzer`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `is_correct`, `text`) VALUES
(1, 1, 1, 'Hypertext Preprocessor'),
(2, 1, 0, 'PHP: Private Home Page'),
(3, 1, 0, 'PHP: Personal Hypertext Preprocessor'),
(4, 1, 0, 'PHP: Preprocessor Hypertext Page'),
(5, 2, 0, '&lt;?php&gt;....&lt;/?&gt;'),
(6, 2, 0, '&lt;script&gt;...&lt;/script&gt;'),
(7, 2, 1, '&lt;?php ... ?&gt;'),
(8, 2, 0, '&lt;&&gt; ... &lt;/&&gt;'),
(9, 2, 0, '<% ... %>'),
(10, 3, 0, 'echo Hello World;'),
(11, 3, 0, 'document.write(\"Hello World\");'),
(12, 3, 1, 'echo \"Hello World\";'),
(13, 3, 0, 'print \"Hello World\";'),
(14, 4, 1, '$'),
(15, 4, 0, '&'),
(16, 4, 0, '!');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `question_text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `question_text`) VALUES
(1, 'What does PHP stand for?'),
(2, 'PHP server scripts are surrounded by delimiters, which?'),
(3, 'How do you write \"Hello World\" in PHP ?'),
(4, 'All variables in PHP start with which symbol?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
