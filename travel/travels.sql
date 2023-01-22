-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 11:19 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryId` int(11) NOT NULL,
  `countryName` varchar(150) NOT NULL,
  `capital` varchar(150) NOT NULL,
  `continent` varchar(150) NOT NULL,
  `area` varchar(100) NOT NULL,
  `population` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `language` varchar(150) NOT NULL,
  `code` varchar(100) NOT NULL,
  `neighbour` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `countryFlag` varchar(250) NOT NULL,
  `submitted_by` varchar(100) NOT NULL,
  `type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryId`, `countryName`, `capital`, `continent`, `area`, `population`, `currency`, `language`, `code`, `neighbour`, `description`, `image`, `countryFlag`, `submitted_by`, `type`) VALUES
(9, 'China', 'Beijing', 'Asia', '9.597 million kmÂ²', '1.398 billion', 'Renminbi', 'Mandarin', '+86', 'Afghanistan, Bhutan, India, Kazakhstan, Kyrgyzstan, Laos, Myanmar, Mongolia, Nepal, North Korea, Pak', 'China, officially the People\'s Republic of China, is a country in East Asia. It is the world\'s most populous country, with a population of more than 1.4 billion.', '79417.jpg', '81107.png', '5', 'Nature'),
(10, 'Japan', 'Tokyo', 'Asia', '377,975 kmÂ²', '126.3 million', 'Japanese yen', 'Japaneseja', '+81', 'Korea, Russia and China.', 'Japan is an island country in East Asia, located in the northwest Pacific Ocean. It is bordered on the west by the Sea of Japan, and extends from the Sea of Okhotsk in the north toward the East China Sea and Taiwan in the south.', '41921.webp', '76697.png', '5', 'Ocean'),
(11, 'South Korea', 'Seoul', 'Asia', '100,210 kmÂ²', '51.71 million', 'South Korean won', 'Korean', '+82', 'North Korea, Japan, China', 'South Korea, an East Asian nation on the southern half of the Korean Peninsula, shares one of the worldâ€™s most heavily militarized borders with North Korea. Itâ€™s equally known for its green, hilly countryside dotted with cherry trees and centurie', '27664.jpg', '2736.png', '5', 'Culture'),
(12, 'Australia', 'Canberra', 'Australia', '7.692 million kmÂ²', '25.36 million', 'Australian dollar', 'Official and national Languages', '+61', 'Papua New Guinea and New Zealand', 'ustralia, officially the Commonwealth of Australia, is a sovereign country comprising the mainland of the Australian continent, the island of Tasmania, and numerous smaller islands. ', '28158.jpg', '33130.png', '5', 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `locationId` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `locationId`, `uid`, `timestamp`) VALUES
(18, 5, 5, '0000-00-00 00:00:00'),
(21, 12, 6, '0000-00-00 00:00:00'),
(22, 9, 5, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationId` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `details` varchar(250) NOT NULL,
  `images` varchar(150) NOT NULL,
  `submitted_by` varchar(100) NOT NULL,
  `type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationId`, `name`, `country`, `details`, `images`, `submitted_by`, `type`) VALUES
(4, 'The Great Wall of China', '9', 'The Great Wall of China is a series of fortifications that were built across the historical northern borders of ancient Chinese states and Imperial China as protection against various nomadic groups from the Eurasian Steppe.', '56728.jpg', '5', 'Nature'),
(5, 'The Summer Palace, Beijing', '9', 'The Summer Palace is a vast ensemble of lakes, gardens and palaces in Beijing. It was an imperial garden in the Qing dynasty. Mainly dominated by Longevity Hill and Kunming Lake', '404.jpg', '5', 'Culture'),
(6, 'Haeundae', '11', 'Haeundae-gu is a modern district known for seaside beaches like Haeundae, on a wide, sandy bay, and Songjeong, popular for surfing. Sharks and turtles live at Sea Life Busan Aquarium, while the Busan Museum of Art shows contemporary Korean and intern', '94918.jpg', '5', 'Ocean'),
(8, 'Imperial Tokyo', '10', 'Just a 10-minute walk from Tokyo Station and the high-rise Marunouchi financial district, this calm green oasis covers an impressive 1.15 square kilometres in the central Chiyoda Ward. Built on the site of the former Edo Castle, the palace became the', '58254.jpg', '5', 'Culture'),
(9, 'Mount Fuji', '10', 'Japanâ€™s Mt. Fuji is an active volcano about 100 kilometers southwest of Tokyo. Commonly called â€œFuji-san,â€ itâ€™s the countryâ€™s tallest peak, at 3,776 meters. A pilgrimage site for centuries, itâ€™s considered one of Japanâ€™s 3 sacred mounta', '31245.jpg', '5', 'Nature'),
(10, 'Okinawa Beaches', '10', 'Okinawa is a Japanese prefecture comprising more than 150 islands in the East China Sea between Taiwan and Japan\'s mainland. It\'s known for its tropical climate, broad beaches and coral reefs, as well as World War II sites. On the largest island (als', '25192.jpg', '5', 'Ocean'),
(11, 'Great Barrier Reef Marine Park', '12', 'The Great Barrier Reef Marine Park protects a large part of Australia\'s Great Barrier Reef from damaging activities.', '76453.jpg', '5', 'Ocean'),
(12, 'Blue Mountains National Park', '12', 'Blue Mountains National Park is a vast region west of Sydney, Australia, and part of the Great Dividing Range. The Echo Point lookout, near the town of Katoomba, has panoramic views of Jamison Valley and the Three Sisters, a towering sandstone format', '85183.jpg', '5', 'Nature'),
(15, 'Changdeokgung Palace', '11', 'Changdeokgung, also known as Changdeokgung Palace or Changdeok Palace, is set within a large park in Jongno-gu, Seoul, South Korea. It is one of the \"Five Grand Palaces\" built by the kings of the Joseon Dynasty. ', '97721.jpg', '6', 'Culture');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `postal` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstname`, `surname`, `email`, `address`, `contact`, `city`, `region`, `postal`, `username`, `password`) VALUES
(5, 'pobejim', 'quboda', 'user@gmail.com', 'hatafypydy', '81', 'josikuboc', 'wiryqedema', 57, 'user', '$2y$10$o5ClOUIkYgrW1Z52Gs8xuOrjeLNNpTU.KDpt.Auncw.CIDHmcvhpe'),
(6, 'penuj', 'casen', 'kevin123@gmail.com', 'beresizoj', '10', 'lalyqizok', 'tirahaq', 65, 'bytuq', '$2y$10$qKrOwBCqWmIauUkPcHAAZeUgF4A4GXqVxVqSLoOzbOlNRumzoJ7xC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
