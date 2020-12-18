-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 01:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vers`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us Information', '\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,<br><br>\r\n\r\n', '\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` varchar(255) NOT NULL,
  `admin_job` text NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'Bereket Eyasu', 'bek@gmail.com', 'bek123', 'unnamed.jpg', '38723', 'Ethiopia', 'Student', ' A missionary under construction');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_records`
--

CREATE TABLE `adoption_records` (
  `aid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `gfname` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `mother_full_name` varchar(255) NOT NULL,
  `mother_n` varchar(255) NOT NULL,
  `father_full_name` int(11) NOT NULL,
  `father_n` int(11) NOT NULL,
  `doar` date NOT NULL,
  `doc` date NOT NULL,
  `registrar_full_name` varchar(255) NOT NULL,
  `registrar_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `birth_records`
--

CREATE TABLE `birth_records` (
  `bid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `grand_father_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `woreda` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `mother_bid` int(10) NOT NULL,
  `father_bid` int(10) NOT NULL,
  `mother_full_name` varchar(255) NOT NULL,
  `mother_nationality` varchar(255) NOT NULL,
  `father_full_name` varchar(255) NOT NULL,
  `father_nationality` varchar(255) NOT NULL,
  `registrar_full_name` varchar(255) NOT NULL,
  `registrar_id` int(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth_records`
--

INSERT INTO `birth_records` (`bid`, `name`, `father_name`, `grand_father_name`, `gender`, `date_of_birth`, `place_of_birth`, `region`, `zone`, `woreda`, `nationality`, `mother_bid`, `father_bid`, `mother_full_name`, `mother_nationality`, `father_full_name`, `father_nationality`, `registrar_full_name`, `registrar_id`, `image`) VALUES
(3, 'Bethelehem', 'Biruk', 'Kebede', 'female', '2020-09-02', 'Dilla', 'South', 'Gedeo', 'Dilla', 'Ethiopian', 2, 2, 'Abebech Worku Tadesse', 'Ethiopian', 'Biruk Kebede Woldemariam', 'Ethiopian', 'Dawit Ayele', 1, 'jesus.jpg'),
(6, 'Bizunesh', 'Worasso', 'Boko', 'Female', '2020-09-02', 'sede', 'South', 'Gedeo', 'yirgacheffe', 'Ethiopian', 1, 2, 'Mamite Woraso', 'Ethiopian', 'Worasso Boko', 'Ethiopian', 'Kefiyalew Ayele', 0, 'Is43.jpg'),
(7, 'Kebede', 'Zerfu', 'Tayew', 'Male', '2020-09-02', 'Sede', 'South', 'Gedeo', 'YIrgacheffe', 'Ethiopian', 1, 1, 'Belayinesh Bekele Abera', 'Ethiopian', 'Zerfu Tayew Kekebo', 'Ethiopian', 'Kefiyalew Ayele', 1, 'Ambitions.jpg'),
(8, 'Ayele', 'Feyissa', 'Beralko', 'Male', '2020-11-06', 'Sede', 'South', 'Gedeo', 'Dilla', 'Ethiopian', 0, 0, 'Aayo Tini', 'Ethiopian', 'Feyissa Berako Welle', 'Ethiopian', 'Abreham Ayele Feyissa', 0, 'images (5).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `box_content` text NOT NULL,
  `box_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`box_content`, `box_image`) VALUES
('\r\n                                \r\n                                \r\n    <br/><br/>                            \r\n         MANY AFRICANS ARE BORN\r\nAND DIE WITHOUT LEAVING A\r\nTRACE IN ANY OFFICIAL LEGAL\r\nRECORDS OR STATISTICS.<br/><br/>\r\nTHIS IS BECAUSE THE MAJORITY OF\r\nAFRICAN COUNTRIES DO NOT HAVE\r\nFUNCTIONING CIVIL REGISTRATION AND\r\nVITAL STATISTICS SYSTEMS THAT CAN\r\nADEQUATELY ACCOUNT FOR THE BIRTHS,\r\nDEATHS AND OTHER VITAL EVENTS THAT\r\nHAPPEN IN THEIR TERRITORIES. THIS HAS\r\nBEEN REFERRED TO AS THE “SCANDAL\r\nOF INVISIBILITY”.\r\n\r\n                            \r\n                            \r\n                            ', 'Screenshot (73).png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'dawitayele6875@gmail.com', 'Contact  To Us', 'If you have any questions, please feel free to contact us, our service center is working for you 24/7.');

-- --------------------------------------------------------

--
-- Table structure for table `death_records`
--

CREATE TABLE `death_records` (
  `did` int(10) NOT NULL,
  `d_bid` int(10) NOT NULL,
  `title` text NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `dod` date NOT NULL,
  `d_o_dr` int(11) NOT NULL,
  `doc` int(11) NOT NULL,
  `registrar_full_name` varchar(255) NOT NULL,
  `registrar_id` int(10) NOT NULL,
  `d_cause` text NOT NULL,
  `region` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `woreda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `death_records`
--

INSERT INTO `death_records` (`did`, `d_bid`, `title`, `sex`, `dob`, `dod`, `d_o_dr`, `doc`, `registrar_full_name`, `registrar_id`, `d_cause`, `region`, `zone`, `woreda`) VALUES
(9, 8, 'Farmer', '', '0000-00-00', '2020-12-08', 2020, 0, 'Abreham Ayele Feyissa', 8, 'Age\r\n\r\n                                        ', 'South', 'Gedeo', 'Dilla');

-- --------------------------------------------------------

--
-- Table structure for table `divorce_records`
--

CREATE TABLE `divorce_records` (
  `divorce_id` int(10) NOT NULL,
  `mid` int(10) NOT NULL,
  `dod` date NOT NULL,
  `dodr` date NOT NULL,
  `doc` date NOT NULL,
  `registrar_full_name` int(11) NOT NULL,
  `registrar_id` int(10) NOT NULL,
  `d_cause` text NOT NULL,
  `region` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `woreda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divorce_records`
--

INSERT INTO `divorce_records` (`divorce_id`, `mid`, `dod`, `dodr`, `doc`, `registrar_full_name`, `registrar_id`, `d_cause`, `region`, `zone`, `woreda`) VALUES
(5, 9, '2020-12-11', '2020-12-03', '0000-00-00', 0, 8, '', 'South', 'Gedeo', 'Dilla'),
(6, 11, '2020-12-09', '2020-12-03', '0000-00-00', 0, 8, '', 'South', 'Gedeo', 'Dilla'),
(7, 12, '2020-12-02', '2020-12-04', '0000-00-00', 0, 8, '', 'South', 'Gedeo', 'Dilla');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `lang` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `grand_father_name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `woreda` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `father_full_name` varchar(255) NOT NULL,
  `father_nationality` varchar(255) NOT NULL,
  `father_bid` varchar(255) NOT NULL,
  `mother_full_name` varchar(255) NOT NULL,
  `mother_nationality` varchar(255) NOT NULL,
  `mother_bid` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `death` varchar(255) NOT NULL,
  `divorce` varchar(255) NOT NULL,
  `marriage` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `deceased_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `place_of_death` varchar(255) NOT NULL,
  `bid` varchar(255) NOT NULL,
  `death_cause` varchar(255) NOT NULL,
  `wife_name` varchar(255) NOT NULL,
  `husband_name` varchar(255) NOT NULL,
  `wife_bid` varchar(255) NOT NULL,
  `husband_bid` varchar(255) NOT NULL,
  `date_o_m` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mid` varchar(255) NOT NULL,
  `divorcee_name` varchar(255) NOT NULL,
  `divorce_name` varchar(255) NOT NULL,
  `date_of_divorce` varchar(255) NOT NULL,
  `pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`lang`, `name`, `father_name`, `grand_father_name`, `sex`, `date_of_birth`, `place_of_birth`, `region`, `zone`, `woreda`, `nationality`, `father_full_name`, `father_nationality`, `father_bid`, `mother_full_name`, `mother_nationality`, `mother_bid`, `image`, `birth`, `death`, `divorce`, `marriage`, `about`, `deceased_name`, `title`, `place_of_death`, `bid`, `death_cause`, `wife_name`, `husband_name`, `wife_bid`, `husband_bid`, `date_o_m`, `city`, `mid`, `divorcee_name`, `divorce_name`, `date_of_divorce`, `pdd`) VALUES
('amh', 'ስም', 'የአባት ስም', 'የአያት ስም', 'ፆታ', 'የትውልድ ቀን', 'የትውልድ ቦታ', 'ክልል /ከተማ አስተዳደር/', 'ዞን /ከተማ አስተዳደር/', 'ወረዳ /ልዩ ወረዳ/', 'ዜግነት', 'የአባት ሙሉ ስም', 'የአባት ዜግነት', 'የአባት የልደት ምዝገባ መለያ ቁጥር', 'የእናት ሙሉ ስም', 'የእናት ዜግነት', 'የእናት የልደት ምዝገባ መለያ ቁጥር', 'ፎቶ', 'ልደት', 'ሞት', 'ፍች', 'ጋብቻ', 'ስለ', 'የሟች ስም', 'ማዕረግ', 'ሞቱ የተከሰተበት ቦታ', 'የልደት ምዝገባ መለያ ቁጥር', 'የሞቱ መንሳዔ', 'የሚስት ስም', 'የባል ስም', 'የሚስት ል.ም.መ.ቁ', 'የባል ል.ም.መ.ቁ', 'ጋብቻ የተፈጸመበት ቀን', 'ከተማ', 'የጋብቻ ምዝገባ መለያ ቁጥር', 'የተፋችዋ ስም', 'የተፋችው ስም', 'ፍችው የተፈጸመበት ቀን', 'ፍችው የተፈጸመበት ቦታ'),
('eng', 'Name', 'Father name', 'Grand father name', 'Sex', 'Date of birth', 'Place of birth', 'Region', 'Zone', 'Woreda', 'Nationality', 'Father full name', 'Father nationality', 'Father bid', 'Mother full name', 'Mother nationality', 'Mother bid', 'Image', 'Birth', 'Death', 'Divorce', 'Marriage', 'About', 'Deceased\'s name', 'Title', 'Place of death', 'Birth Identification no.', 'Cause of death', 'Wife\'s name', 'Husband\'s name', 'Wife\'s BID', 'Husband\'s BID', 'Date of marriage', 'City', 'Marriage Identification no.', 'Divorcee name', 'Divorce name', 'Date of Divorce', 'Place of divorce dissolved');

-- --------------------------------------------------------

--
-- Table structure for table `marriage_records`
--

CREATE TABLE `marriage_records` (
  `mid` int(10) NOT NULL,
  `w_bid` int(10) NOT NULL,
  `h_bid` int(10) NOT NULL,
  `dom` date NOT NULL,
  `mr_region` varchar(255) NOT NULL,
  `mr_zone` varchar(255) NOT NULL,
  `mr_city` varchar(255) NOT NULL,
  `mr_subcity` varchar(255) NOT NULL,
  `mr_woreda` varchar(255) NOT NULL,
  `mr_kebele` varchar(255) NOT NULL,
  `d_o_mr` date NOT NULL,
  `doc` date NOT NULL,
  `registrar_full_name` varchar(255) NOT NULL,
  `registrar_id` int(10) NOT NULL,
  `h_image` text NOT NULL,
  `w_image` text NOT NULL,
  `divorced` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marriage_records`
--

INSERT INTO `marriage_records` (`mid`, `w_bid`, `h_bid`, `dom`, `mr_region`, `mr_zone`, `mr_city`, `mr_subcity`, `mr_woreda`, `mr_kebele`, `d_o_mr`, `doc`, `registrar_full_name`, `registrar_id`, `h_image`, `w_image`, `divorced`) VALUES
(9, 6, 8, '2020-11-10', 'South', 'Gedeo', '', '', 'Dilla', '', '0000-00-00', '0000-00-00', 'Abreham Ayele Feyissa', 8, 'images (5).jpeg', 'Is43.jpg', 'y'),
(11, 3, 7, '2020-12-09', 'South', 'Gedeo', '', '', 'Dilla', '', '0000-00-00', '0000-00-00', 'Abreham Ayele Feyissa', 8, 'Ambitions.jpg', 'jesus.jpg', 'y'),
(12, 6, 7, '2020-12-02', 'South', 'Gedeo', '', '', 'Dilla', '', '0000-00-00', '0000-00-00', 'Abreham Ayele Feyissa', 8, 'Is43.jpg', 'Ambitions.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_title` text NOT NULL,
  `news_url` text NOT NULL,
  `news_img` text NOT NULL,
  `news_img2` text NOT NULL,
  `news_content` text NOT NULL,
  `news_img3` text NOT NULL,
  `news_reporter` text NOT NULL,
  `news_date` datetime NOT NULL,
  `news_short` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_url`, `news_img`, `news_img2`, `news_content`, `news_img3`, `news_reporter`, `news_date`, `news_short`) VALUES
(1, 'Bereket', 'bek', 'Engdeathfinal.jpg', 'EngDivorcefinal.jpg', '\r\n\r\n\r\n\r\nInteger tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.mperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi.iquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.mperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Inte sdfsdgk ry.', 'EngBirthfinal.jpg', 'Dawit', '2020-10-15 00:00:00', 'Bereket is a designer with almost 10 years of digital design experience.\r\n\r\n\r\n\r\n'),
(2, 'Theodore', 'Theo', 'download (4).jpg', 'download.png', '\r\n\r\n\r\n\r\nInteger tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.', 'vitalEvents.png', 'Dawit', '2020-10-12 00:00:00', 'Theo is a designer with almost 10 years of digital design experience.\r\n\r\n\r\n\r\n'),
(3, 'Marry Jo', 'marry-jo', 'images (3).jpeg', 'images (5).jpeg', '\r\nInteger tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.', 'images (4).jpeg', 'Dawit', '2020-10-09 00:00:00', 'Marry is a designer with almost 10 years of digital design experience.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

CREATE TABLE `orgs` (
  `oid` int(10) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_email` varchar(255) NOT NULL,
  `org_pass` varchar(255) NOT NULL,
  `prev1` varchar(255) NOT NULL,
  `prev2` varchar(255) NOT NULL,
  `prev3` varchar(255) NOT NULL,
  `org_address` varchar(255) NOT NULL,
  `org_image` text NOT NULL,
  `org_about` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`oid`, `org_name`, `org_email`, `org_pass`, `prev1`, `prev2`, `prev3`, `org_address`, `org_image`, `org_about`, `user_id`, `admin_name`, `admin_id`) VALUES
(6, 'NISS', 'niss@gmail.com', 'niss@gmail.com', 'yes', 'yes', 'no', 'Addis Ababa,Ethiopia', '28060f5836f28aff0257663561809e18.jpg', 'National information security service\r\n\r\n', 12, 'Bereket Eyasu', 1),
(7, 'Insa', 'insa@gmail.com', 'insa123', 'no', 'yes', 'yes', 'Addis Ababa,Ethiopia', 'il_fullxfull.1880294973_ibja.jpg', 'Information network security agency\r\n\r\n', 13, 'Bereket Eyasu', 1),
(8, 'Immigration', 'img@gmail.com', 'img123', 'yes', 'yes', 'yes', 'Addis Ababa,Ethiopia', 'images (31).jpg', '\r\nFederal Immigration agency\r\n', 14, 'Bereket Eyasu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` int(3) NOT NULL,
  `region_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`) VALUES
(1, 'Afar'),
(2, 'Tigray'),
(3, 'somale'),
(4, 'South'),
(5, 'oromia'),
(6, 'gambella');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`) VALUES
(2, 'Slide Number 2', 'images (5).jpeg', '	events'),
(5, 'Slide number 1', 'images (3).jpeg', 'image1'),
(6, 'Slide number 3', 'images (4).jpeg', 'image1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_address` text NOT NULL,
  `user_bid` int(11) NOT NULL,
  `user_position` text NOT NULL,
  `user_confrim_code` text NOT NULL,
  `user_contact` text NOT NULL,
  `user_job` text NOT NULL,
  `user_manager_id` int(11) NOT NULL,
  `user_role` text NOT NULL,
  `user_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_image`, `user_address`, `user_bid`, `user_position`, `user_confrim_code`, `user_contact`, `user_job`, `user_manager_id`, `user_role`, `user_about`) VALUES
(2, 'Kefiyalew Ayele', 'kefe@gmail.com', 'kefe123', 'images (4).jpeg', 'YIrgachefe,Gedeo,South', 0, 'zone', '251', '', 'Accountant', 0, 'manager', '    t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters    '),
(8, 'Abreham Ayele Feyissa', 'aberham@gmail.com', 'abr', 'CYIRPT2VAAA310p.png', 'YIrgachefe,Gedeo,South', 0, '', '', '+251916079003', 'Health officer', 0, 'Registrar', ' Life is good'),
(12, 'NISS', 'niss@gmail.com', 'niss@gmail.com', '28060f5836f28aff0257663561809e18.jpg', 'Addis Ababa,Ethiopia', 0, '', '', '', '', 0, 'org', 'National information security service\r\n\r\n'),
(13, 'Insa', 'insa@gmail.com', 'insa123', 'il_fullxfull.1880294973_ibja.jpg', 'Addis Ababa,Ethiopia', 0, '', '', '', '', 0, 'org', 'Information network security agency\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `vision`
--

CREATE TABLE `vision` (
  `header` text NOT NULL,
  `statement` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vision`
--

INSERT INTO `vision` (`header`, `statement`, `image`) VALUES
(' Vision Statement', '\r\n                                \r\n                                We know that the greatness in a disruptive era requires bold ambition, curious talent and a culture that believes we\'re smarter together. We approach every challenge holistically, with best-in-class expertise in data creativity, media technology, Search and social and more. We call this Alchemy. It has the power to build our clients brands and transform their business and while it may seem like magic, we have got it down to a science.\r\n                            \r\n                            ', 'images (4).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `woreda`
--

CREATE TABLE `woreda` (
  `woreda_id` int(6) NOT NULL,
  `woreda_name` varchar(255) NOT NULL,
  `zone_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `woreda`
--

INSERT INTO `woreda` (`woreda_id`, `woreda_name`, `zone_id`) VALUES
(1, 'Dilla', 1),
(2, 'Wonago', 1),
(3, 'Yirga cheffe', 1),
(4, 'Hawassa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(4) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `region_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `zone_name`, `region_id`) VALUES
(1, 'Gedeo', 4),
(2, 'sidama', 4),
(3, 'Guji', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `adoption_records`
--
ALTER TABLE `adoption_records`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `birth_records`
--
ALTER TABLE `birth_records`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `death_records`
--
ALTER TABLE `death_records`
  ADD PRIMARY KEY (`did`),
  ADD KEY `bid` (`d_bid`);

--
-- Indexes for table `divorce_records`
--
ALTER TABLE `divorce_records`
  ADD PRIMARY KEY (`divorce_id`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`lang`);

--
-- Indexes for table `marriage_records`
--
ALTER TABLE `marriage_records`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `mh_bid` (`h_bid`),
  ADD KEY `mw_bid` (`w_bid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orgs`
--
ALTER TABLE `orgs`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `woreda`
--
ALTER TABLE `woreda`
  ADD PRIMARY KEY (`woreda_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adoption_records`
--
ALTER TABLE `adoption_records`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `birth_records`
--
ALTER TABLE `birth_records`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `death_records`
--
ALTER TABLE `death_records`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divorce_records`
--
ALTER TABLE `divorce_records`
  MODIFY `divorce_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marriage_records`
--
ALTER TABLE `marriage_records`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orgs`
--
ALTER TABLE `orgs`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `woreda`
--
ALTER TABLE `woreda`
  MODIFY `woreda_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `death_records`
--
ALTER TABLE `death_records`
  ADD CONSTRAINT `bid` FOREIGN KEY (`d_bid`) REFERENCES `birth_records` (`bid`);

--
-- Constraints for table `divorce_records`
--
ALTER TABLE `divorce_records`
  ADD CONSTRAINT `mid` FOREIGN KEY (`mid`) REFERENCES `marriage_records` (`mid`);

--
-- Constraints for table `marriage_records`
--
ALTER TABLE `marriage_records`
  ADD CONSTRAINT `mh_bid` FOREIGN KEY (`h_bid`) REFERENCES `birth_records` (`bid`),
  ADD CONSTRAINT `mw_bid` FOREIGN KEY (`w_bid`) REFERENCES `birth_records` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
