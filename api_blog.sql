-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 02:24 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `created_at`) VALUES
(1, 'books code', '2020-07-21 00:47:24'),
(2, 'cooking', '2020-07-21 00:47:24'),
(3, 'fashion', '2021-07-20 20:27:16'),
(4, 'sporting', '2021-07-20 20:27:16'),
(5, 'memes', '2021-07-20 20:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(55) NOT NULL,
  `post_desc` text NOT NULL,
  `author` varchar(55) NOT NULL,
  `post_cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_desc`, `author`, `post_cate_id`) VALUES
(1, 'clean code ', 'Clean code should be easy to read and easy to understand. We often hear people saying that code is more often read than written. If that\'s so, and it is, then we must expect that clean code is easy to understand. It should read like well-written prose', 'uncle bob', 1),
(2, 'Clean architecture', 'Clean architecture is a software design philosophy that separates the elements of a design into ring levels. An important goal of clean architecture is to provide developers with a way to organize code in such a way that it encapsulates the business logic but keeps it separate from the delivery mechanism.', 'uncle bob', 1),
(3, 'Pizza', 'Pizza, dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil, oregano, tomato, olives, mozzarella or other cheese, and many other ingredients, baked quickly—usually, in a commercial setting, using a wood-fired oven heated to a very high temperature—and served hot ..', 'mahmoud Khairy', 2),
(4, 'Kebda Eskandarani', 'Kebda Eskandarani or Alexandrian liver is the Alexandrine specialty consisting of fried beef liver with spicy seasonings such as cumin, garlic, cardamom, and chili peppers. It is usually served in sandwiches along with tahini dip, or on its own, accompanied by warm rice, lime wedges, or pita bread on the side', 'طوخي', 2),
(5, 'FC Barcelona', 'Futbol Club Barcelona commonly referred to as Barcelona and colloquially known as Barça ... Further information: List of FC Barcelona records and statistics', 'leo messi ', 4),
(6, 'memes meaning ', 'A meme is a virally transmitted image embellished with text, usually sharing pointed commentary on cultural symbols, social ideas, or current events. A meme is typically a photo or video, although sometimes it can be a block of text.', 'mahomoud khairy', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_title` (`post_title`),
  ADD KEY `post_cate_id` (`post_cate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_cate_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
