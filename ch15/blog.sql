-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 12:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpsols`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`article_id`, `title`, `article`, `created`, `updated`) VALUES
(1, 'Spectacular View of Mount Fuji from the Bullet Train', 'One of the best-known tourist images of Japan is of the bullet train crossing a bridge at the foot of a snow-topped Mount Fuji. However, when you take the bullet train from Tokyo to Kyoto, more often than not Mount Fuji comes over all shy - and hides behind the cloud. That\'s what happened on my latest visit to Japan. There was little or nothing to see on the journey in either direction.\r\n\r\nHowever, a week later, I headed west out of Tokyo on a trip that would take me to northern Japan. As the bullet train sped along, there was Mount Fuji in all its glory: brilliant sunshine, a little dusting of snow on the peak, and just a wisp of cloud on the northern side, forming a perfect backdrop. The proof is in the photo that graces every page of this site. It\'s not a stock photo, but all my own work - and Mother Nature\'s, of course.', '2019-03-29 11:56:11', '2019-03-29 11:56:11'),
(2, 'Trainee Geishas Go Shopping', 'Although Kyoto attracts large numbers of foreign tourists, keen to see its centuries-old temples and shrines, it\'s actually a thoroughly modern city. The first view from the bullet train comes as a shock. Instead of pagodas and temple roofs, all you see is a jumble of concrete blocks and neon signs. Dominating the skyline just outside Kyoto station is the hideous Kyoto Tower, yet more concrete sprouting from the roof of a department store.\r\n\r\nThe real joys of Kyoto lie in unexpected encounters. Shijo-dori is one of the main shopping streets, packed with local people and visitors. Just as I started to cross the road, I heard a little clatter behind me, and looked around. There were two young women in exquisite kimonos, their faces painted white, and with cupid-bow, red lips. The clatter came from the geta, the high wooden sandals they had on their feet. Just like everyone else, it seemed, they were out enjoying a morning\'s window shopping.\r\n\r\nThis is a sight that you\'ll rarely see anywhere else in Japan, except Kyoto. The young women were maiko, trainee geishas, who spend years studying traditional song and dance. It\'s an unusual profession to have survived in a country that\'s now so modern, but geisha are respected for preserving traditional arts - and in a most attractive way.', '2019-03-29 11:56:11', '2019-03-29 11:56:11'),
(3, 'Tiny Restaurants Crowded Together', 'Every city has narrow alleyways that are best avoided, even by the locals. But Kyoto has one alleyway that\'s well worth a visit. Pontocho is a long, narrow street only a couple of metres wide that\'s crammed with restaurants and bars. There are dozens, if not hundreds of them; and if you\'re adventurous enough to wander into even narrower side-alleys, you\'ll find a few more.\r\n\r\nSome of the restaurants are very modern, but others seem as though they haven\'t changed since time immemorial. The best way to enjoy an evening\'s meal in Kyoto is to perch yourself on a tiny stool at the counter of a restaurant serving o-banzai. It\'s hard to describe o-banzai other than as exotic, high-class, home cooking. The ingredients depend on what\'s in season, but include a lot of fish, vegetables, tofu, and pork. It doesn\'t matter if you can\'t read the menu, because most food is laid out in small dishes on the counter, and served in tiny portions. A delicious, traditional night out.', '2019-03-29 11:56:11', '2019-03-29 11:56:11'),
(4, 'Basin of Contentment', 'Most visitors to Ryoanji Temple go to see just one thing - the rock garden. It\'s probably the most famous dry landscape (karesansui) garden - 15 irregularly shaped rocks in a bed of gravel that\'s raked every day. It\'s been there since the 15th century, and is certainly remarkable. But Ryoanji has much more to offer. For me, the water basin just behind the main building is exquisite.\r\n\r\nThe basin is carved out of a circular piece of stone, but water trickles from a bamboo spout into a square cavity. Carved around the edge are four partial Chinese characters, which are completed by the square. Read together, they mean \"I learn only to be contented\" - knowledge for its own sake is sufficient. In other words, someone who learns to be contented is rich in spirit and character, whereas someone who may be materially wealthy is spiritually poor if they do not learn contentment.', '2019-03-29 11:56:11', '2019-03-29 11:56:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
