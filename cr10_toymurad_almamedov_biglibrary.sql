-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2018 at 01:49 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_toymurad_almamedov_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `PK_author_id` int(11) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`PK_author_id`, `first_name`, `last_name`) VALUES
(1, 'Fyodor', 'Dostoyevsky'),
(2, 'Charles', 'Bukowski'),
(3, 'Alexandre', 'Dumas'),
(4, 'George', 'Orwell'),
(5, 'Peter', 'Jackson'),
(6, 'Steven', 'Spielberg'),
(7, 'Nasir bin Olu Dara', 'Jones'),
(8, 'Kanye', 'West');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `PK_isbn` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `publish_date` date NOT NULL,
  `type` set('book','dvd','cd') NOT NULL,
  `status` tinyint(1) NOT NULL,
  `FK_author_id` int(11) NOT NULL,
  `FK_publisher_id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`PK_isbn`, `image`, `short_desc`, `publish_date`, `type`, `status`, `FK_author_id`, `FK_publisher_id`, `title`) VALUES
(1, 'https://images-na.ssl-images-amazon.com/images/I/51zZH9paouL.jpg', 'One of the supreme masterpieces of world literature, Crime and Punishment catapulted Fyodor Dostoyevsky to the forefront of Russian writers and into the ranks of the world\'s greatest novelists. Drawing upon experiences from his own prison days, the author recounts in feverish, compelling tones the story of Raskolnikov, an impoverished student tormented by his own nihilism, and the struggle between good and evil. Believing that he is above the law, and convinced that humanitarian ends justify vile means, he brutally murders an old woman--a pawnbroker whom he regards as \"stupid, ailing, greedy...good for nothing.\" Overwhelmed afterwards by feelings of guilt and terror, Raskolnikov confesses to the crime and goes to prison. There he realizes that happiness and redemption can only be achieved through suffering. Infused with forceful religious, social, and philosophical elements, the novel was an immediate success. This extraordinary, unforgettable work is reprinted here in the authoritative Constance Garnett translation.', '2001-01-01', 'book', 0, 1, 1, 'Crime and Punishment'),
(2, 'https://images-na.ssl-images-amazon.com/images/I/81r-e2Yx%2BuL.jpg', 'After his great portrayal of a guilty man in Crime and Punishment,\" Dostoevsky set out in The Idiot to portray a man of pure innocence. The twenty-six-year-old Prince Myshkin, following a stay of several years in a Swiss sanatorium, returns to Russia to collect an inheritance and \"be among people.\" Even before he reaches home he meets the dark Rogozhin, a rich merchant\'s son whose obsession with the beautiful Nastasya Filippovna eventually draws all three of them into a tragic denouement. In Petersburg the prince finds himself a stranger in a society obsessed with money, power, and manipulation. Scandal escalates to murder as Dostoevsky traces the surprising effect of this \"positively beautiful man\" on the people around him, leading to a final scene that is one of the most powerful in all of world literature.', '2003-01-01', 'book', 0, 1, 2, 'The Idiot'),
(3, 'https://images-na.ssl-images-amazon.com/images/I/81ATullP9rL.jpg', '\"It began as a mistake.\" By middle age, Henry Chinaski has lost more than twelve years of his life to the U.S. Postal Service. In a world where his three true, bitter pleasures are women, booze, and racetrack betting, he somehow drags his hangover out of bed every dawn to lug waterlogged mailbags up mud-soaked mountains, outsmart vicious guard dogs, and pray to survive the day-to-day trials of sadistic bosses and certifiable coworkers. This classic 1971 novel-the one that catapulted its author to national fame-is the perfect introduction to the grimly hysterical world of legendary writer, poet, and Dirty Old Man Charles Bukowski and his fictional alter ego, Chinaski.', '2002-01-01', 'book', 1, 2, 3, 'Post Office'),
(4, 'https://images-na.ssl-images-amazon.com/images/I/71-qZ2Z754L.jpg', 'In the novel, Great Britain (\"Airstrip One\") has become a province of a superstate named Oceania. Oceania is ruled by the \"Party\", who employ the \"Thought Police\" to persecute individualism and independent thinking.The Party\'s leader is Big Brother, who enjoys an intense cult of personality but may not even exist. The protagonist of the novel, Winston Smith, is a rank-and-file Party member. Smith is an outwardly diligent and skillful worker, but he secretly hates the Party and dreams of rebellion against Big Brother. Smith rebels by entering a forbidden relationship with fellow employee Julia.', '1950-01-01', 'book', 0, 4, 4, '1984'),
(5, 'https://images-na.ssl-images-amazon.com/images/I/512LsEphB0L.jpg', 'Set in Middle-earth, the story tells of the Dark Lord Sauron (Sala Baker), who is seeking the One Ring. The Ring has found its way to the young hobbit Frodo Baggins (Elijah Wood). The fate of Middle-earth hangs in the balance as Frodo and eight companions who form the Fellowship of the Ring begin their journey to Mount Doom in the land of Mordor, the only place where the Ring can be destroyed.', '2001-01-01', 'dvd', 1, 5, 5, 'The Lord of the Rings: The Fellowship of the ring'),
(6, 'https://images-na.ssl-images-amazon.com/images/I/51AvTm3MfmL.jpg', 'In Krakow during World War II, the Germans have forced local Polish Jews into the overcrowded Krakow Ghetto. Oskar Schindler, an ethnic German, arrives in the city hoping to make his fortune. A member of the Nazi Party, Schindler lavishes bribes on Wehrmacht (German armed forces) and SS officials and acquires a factory to produce enamelware. To help him run the business, Schindler enlists the aid of Itzhak Stern, a local Jewish official who has contacts with black marketeers and the Jewish business community. Stern helps Schindler arrange financing for the factory. Schindler maintains friendly relations with the Nazis and enjoys wealth and status as \"Herr Direktor\", and Stern handles administration. Schindler hires Jewish workers because they cost less, while Stern ensures that as many people as possible are deemed essential to the German war effort, which saves them from being transported to concentration camps or killed.', '1993-01-01', 'dvd', 0, 6, 6, 'Schindler\'s List'),
(7, 'https://images-na.ssl-images-amazon.com/images/I/51uMZF3lG5L._SS500.jpg', 'My Beautiful Dark Twisted Fantasy\'s music has been noted by writers for incorporating elements from West\'s previous four albums.Entertainment Weekly\'s Simon Vozick-Levinson perceives that such elements \"all recur at various points\", namely \"the luxurious soul of 2004\'s The College Dropout, the symphonic pomp of Late Registration, the gloss of 2007\'s Graduation, and the emotionally exhausted electro of 2008\'s 808s & Heartbreak\". Sean Fennessey of The Village Voice writes that West \"absorb[ed] the gifts of his handpicked collaborators, and occasionally elevated them\" on previous studio albums, noting collaborators and elements as Jon Brion for Late Registration (\"arranging orchestral majesty\"), DJ Toomp for Graduation (\"adapted DJ Toomp\'s oozing menace\"), and Kid Cudi for 808s & Heartbreak (\"Cudi\'s moaning melodies became elemental\").', '2010-01-01', 'cd', 0, 8, 7, 'My Beautiful Dark Twisted Fantasy'),
(8, 'https://images-na.ssl-images-amazon.com/images/I/31eTI8k4H7L._SS500.jpg', 'Conceived in the wake of several distressing personal events, 808s & Heartbreak marked a major musical departure from West\'s previous rap records, instead featuring a sparse, electronic sound and West singing through an Auto-Tune vocal processor. His lyrics explore themes of loss, alienated fame, and heartache, while the album\'s production abandons conventional hip hop sounds in favor of a minimalist sonic palette, which includes prominent use of the titular Roland TR-808 drum machine.', '2008-01-01', 'cd', 0, 8, 7, '808\'s & Heartbreak');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `PK_publisher_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `size` set('big','medium','small') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`PK_publisher_id`, `name`, `address`, `size`) VALUES
(1, 'Dover publications', '31 2nd St, Mineola, NY 11501', 'medium'),
(2, 'Vintage books', '745 Broadway\r\nNew York, NY 10019', 'small'),
(3, 'Harper Collins', '10 East 53rd Street, New York,NY 10022', 'big'),
(4, 'New American library', '375 Hudson street, New York, NY 10014', 'big'),
(5, 'New line cinema', '4000 Warner Blvd, Burbank, California', 'medium'),
(6, 'Amblin Entertainment', '10 Universal City Plaza[1], Universal City, California', 'medium'),
(7, 'Roc-A-Fella Records', '182 Broadway, New York, NY 10022', 'small');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `PK_user_id` int(11) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`PK_user_id`, `user_name`, `email`, `pwd`, `first_name`, `last_name`) VALUES
(5, 'tim1234', 'timuridov@yandex.ru', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'oijagfoiadfjg', 'oadjfgoiajg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`PK_author_id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`PK_isbn`),
  ADD KEY `FK_author_id` (`FK_author_id`),
  ADD KEY `FK_publisher_id` (`FK_publisher_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`PK_publisher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`PK_user_id`),
  ADD UNIQUE KEY `user_cred` (`user_name`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `PK_author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `PK_publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `PK_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
