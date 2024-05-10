-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2024-05-10 08:35:07
-- 服务器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `mangola`
--

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`) VALUES
(91, 2, 33),
(88, 6, 18),
(98, 5, 45),
(89, 3, 18),
(96, 1, 46),
(102, 2, 41),
(101, 3, 41),
(104, 19, 19),
(107, 1, 19),
(106, 7, 41);

-- --------------------------------------------------------

--
-- 表的结构 `details`
--

CREATE TABLE `details` (
  `details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `quantity` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `details`
--

INSERT INTO `details` (`details_id`, `user_id`, `product_id`, `address`, `quantity`) VALUES
(23, 45, 4, 'Opposite of Remidy Medical, flat no. 5, Garia, Kolkata-700084', 2),
(21, 41, 2, 'Pratapgarh, Garia, Kolkata-700103', 7),
(22, 46, 6, 'Kamalgazi, Kolkata-700135', 5),
(19, 33, 6, '2/3 E Block, Surat, Gujrat-395002', 5),
(20, 40, 3, 'Mahamayatala, Garia, Kolkata-84', 3),
(24, 41, 3, 'macao', 20),
(25, 41, 8, 'macao', 5),
(26, 41, 1, 'macao', 2);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`) VALUES
(59, 45, 4),
(58, 46, 6),
(57, 41, 2),
(55, 33, 6),
(56, 40, 3),
(60, 41, 3),
(61, 48, 2),
(62, 41, 8),
(63, 41, 6),
(64, 41, 1);

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_discount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_discount`) VALUES
(1, 'Honeoye', 250, 'Honeoye strawberries are day-neutral June-bearing strawberries. They’re large berries that range in color from bright orange-red to red. They’re true to their name as they taste sweet, like honey. This type of strawberry produces a lot of berries, as it has a high yield and a long growing season.', 'Honeoye.jpg', 15),
(2, 'Earliglow', 200, 'Earliglow is a June-bearing strawberry that’s true to its name because it produces berries sooner than any other strawberry. Its berry size is medium to large, with a deep red color and a shape that’s symmetrical and conical. They have a sweet flavor that’s great for canning.', 'Earliglow.jpeg', 0),
(3, 'Allstar', 120, 'Allstar strawberries look most like the stereotypical strawberries you’d find in a grocery store. They feature a perfect strawberry shape and plump, red appearance. They’re large strawberries that ripen in late mid-season. They have a mild but sweet flavor and are resistant to disease.', 'Allstar.jpeg', 20),
(4, 'Ozark Beauty', 150, 'Ozark Beauty is extremely popular everbearing variety of strawberry. The strawberries produced are sweet, red, and rather large for an everbearing variety. They also feature several large yields several times a year – one in early spring and one later in the season, with a few berries produced in between.', 'OzarkBeauty.jpeg', 20),
(5, 'Chandler', 140, 'Chandler strawberries are June bearers that produce very large, firm, and exceptionally tasty strawberries. Their glossy, red color and flavor profile are extremely desirable. However, the drawback of Chandler berries is that they are not very resistant to disease.', 'Chandler.jpeg', 0),
(6, 'Jewel', 110, 'Jewel strawberries are the picture perfect strawberry. They’re large, red, and juicy. They have an excellent flavor and are high-quality and hearty. They also have longer season yields.', 'Jewel.jpeg', 0),
(7, 'Seascape', 200, 'Seascape is an everbearing strawberry variety that is resistant to disease and tolerant of a variety of growing conditions. Not only are they bright red on the outside, but they also feature a delectable red flesh on the inside.', 'Seascape.jpeg', 15),
(8, 'Tristar', 220, 'Its reddish color at the top has entitled this variety with the name of Sindoora. Extremely juicy and pulpy, this mango is one of the tastiest mangoes one can ever have.\r\nSeason: Mid-May to Mid-June', 'Tristar.jpeg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_heading` varchar(255) NOT NULL,
  `review_text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `user_id`, `review_heading`, `review_text`) VALUES
(34, 5, 34, 'This is so sweet!', 'Unique sweet and rich taste. They are moderately juicy and aromatic with a maize-yellow colour. Love it!'),
(33, 1, 34, 'Best of its all', 'Raw mango is a sweet-smelling fruit which is liked by al for its tart flavor. The colour varies in shades of greens and the inner flesh is white in colour. Its potent health benefits makes totapuri mango puree concentrate - an important food item.'),
(28, 8, 33, 'Never tried before', 'I tried it for the first time and oh boi its great! Must try this one'),
(37, 2, 40, 'Takes me back to childhood.', 'Whenever I have this it always reminds me of my childhood. This will always be my favorite.'),
(26, 1, 33, 'A bit expensive!', 'These are the best and a bit costly, but thanks to Mangola for selling me with a discount of 25%. #happy_shopping :D'),
(25, 4, 33, 'I love this variety!', 'One of the best mangoes compared to all its categories. I love this one.'),
(35, 4, 37, 'Great! This is my favourite.', 'I love this one. It tastes so great man!'),
(36, 4, 39, 'Its a bit over priced.', 'Mangola you are selling it a bit over priced. Otherwise its all good.'),
(38, 6, 40, 'No words can describe howmuch I love these.', 'This has always been my favorite. I always reccomend this variety ti others.'),
(39, 5, 41, 'Thanks to Mangola for the discount1', 'I bought like 8Kgs of these and got a discount of 40% on it. Thanks to mangola. Happy Shopping.'),
(40, 7, 43, 'So delicious!', 'Just one look at  the picture brings water to my mouth.'),
(41, 7, 40, 'Over priced.', 'Dude Mangola is selling this over-priced. I\'m not buying it. Sorry!'),
(42, 7, 44, 'This is love', 'My fav and will always be my fav. I love it more than Alponso'),
(43, 1, 36, 'This is the best!', 'Its suites my standards! This is the best!'),
(53, 2, 36, 'I was importing them from Canada', 'I love them so much that I decided to import them from Canada but then I came across Mangola.'),
(54, 8, 39, 'This variety is only for true mango lovers', 'Tastes good, smells good, and the company delivers good.'),
(55, 7, 46, 'Inshallah its great!', 'I am buying it for all my wives and children.'),
(56, 5, 45, 'I don\'t like this variety.', 'I don\'t know why but I kind of don\'t like this variety.'),
(57, 4, 44, 'Superb', 'Just amazing! And mangola delivered before expected time of delivery.'),
(58, 3, 42, 'Loved it!', 'It took a while for mangola to deliver but a wait for mangoes is worth a while.'),
(59, 3, 41, 'I can have this all day', 'I like these soo much that I can have it all day.'),
(60, 3, 40, 'I am returning home this Monday', 'I am returning home this Monday hope it gets delivered by then.'),
(61, 6, 39, 'Very Sweet', 'Its so sweet in test!'),
(62, 1, 39, 'Its so juicy', 'The best variety of mangoes.'),
(63, 6, 33, 'Great!', 'Its very nice!'),
(64, 8, 41, 'i like this', '');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_profile_image` varchar(255) DEFAULT 'images/user_profiles/default_user_profile.png',
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `user_profile_image`, `phone`, `address`) VALUES
(42, 'Dhvanil', 'dhvanilpatel@gmail.com', 'dhvanil', 'images/user_profiles/42.jpeg', '', ''),
(41, 'Chayan', 'chayanmaida@hotmail.com', 'chayan', 'images/user_profiles/41.jpeg', '1234567890', 'macau 110'),
(40, 'Bananta', 'banantabala@gmail.com', 'bananta', 'images/user_profiles/40.png', '', ''),
(38, 'Anindo', 'anindodas@yahoo.in', 'anindo', 'images/user_profiles/38.jpeg', '', ''),
(39, 'Vishal', 'vishalrc_1@gmail.com', 'vishal', 'images/user_profiles/default_user_profile.png', '', ''),
(37, 'Agnish', 'agnishgupta@gmail.com', 'agnish', 'images/user_profiles/default_user_profile.png', '', ''),
(36, 'Mamta', 'mamtabanarjee@tmc.com', 'mamta', 'images/user_profiles/default_user_profile.png', '', ''),
(19, 'Admin', 'admin@strawberryHeaven.com', '1234', 'images/user_profiles/default_user_profile.png', '', ''),
(35, 'Lalu', 'yadav_lalu@bihar.com', 'bihari', 'images/user_profiles/default_user_profile.png', '', ''),
(31, '', '', '', '', '', ''),
(34, 'Rahul', 'gandhi.rahul@congress.com', 'abcd', 'images/user_profiles/default_user_profile.png', '', ''),
(33, 'Modi', 'narendra_modi@bjp.com', 'namo', 'images/user_profiles/default_user_profile.png', '', ''),
(18, 'Anirban', 'anirban@anirban.com', '1234', 'images/user_profiles/default_user_profile.png', '', ''),
(43, 'Niloy', 'niloyburdhan@hotmail.com', 'niloy', 'images/user_profiles/default_user_profile.png', '', ''),
(44, 'Rana Pratap', 'ranapratap@hotmail.com', 'ranapratap', 'images/user_profiles/default_user_profile.png', '', ''),
(45, 'Sourav', 'souravnaskar@rediffmail.com', 'sourav', 'images/user_profiles/default_user_profile.png', '', ''),
(46, 'Subhradip', 'subhradiprustyroy@rediffmail.com', 'rusty', 'images/user_profiles/default_user_profile.png', '', ''),
(47, 'LLLL', 'leah@123.com', 'leahfldjflka', 'images/user_profiles/default_user_profile.png', '', ''),
(48, 'LLL', 'lll@gmail.com', 'jdlkfjdlskaj', 'images/user_profiles/default_user_profile.png', '', ''),
(49, 'LLL', 'leah@456.com', 'fadssadcsad', 'images/user_profiles/default_user_profile.png', '', ''),
(50, 'Lin', 'lin@gmail.com', '12345678', 'images/user_profiles/default_user_profile.png', '', ''),
(51, 'LLLLdaf', 'leah@123fads.com', 'fadsfasdfasd', 'images/user_profiles/default_user_profile.png', '321423443254', NULL),
(52, 'fdsafcad', 'leah@gsfgf123.com', 'fdsfdfa', 'images/user_profiles/default_user_profile.png', '32142344', NULL),
(53, 'fdsafcadfad', 'lefadsfah@123.com', '', 'images/user_profiles/default_user_profile.png', '321423443245', NULL),
(54, 'afgsfdafs', 'dadgsdfsa@fsda.com', 'fadsfsda', 'images/user_profiles/default_user_profile.png', '321423441234', NULL),
(55, 'LLLLdafafsd', 'dhvanilpfadsfatel@gmail.com', 'adsfdscad', NULL, '3214234423145', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `product_id`, `user_id`) VALUES
(54, 5, 36),
(53, 5, 33),
(56, 7, 39),
(55, 8, 40),
(50, 1, 18),
(52, 3, 33),
(51, 8, 18),
(58, 6, 42),
(59, 4, 42),
(61, 7, 46),
(62, 2, 46),
(63, 1, 45),
(64, 2, 45);

--
-- 转储表的索引
--

--
-- 表的索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- 表的索引 `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`details_id`);

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- 表的索引 `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 表的索引 `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id_2` (`product_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- 使用表AUTO_INCREMENT `details`
--
ALTER TABLE `details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- 使用表AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 使用表AUTO_INCREMENT `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
