-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 04:43 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `name_uz` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ru`, `name_uz`) VALUES
(1, 'catRu-1', 'catUz-1'),
(2, 'catRu-2', 'catUz-2'),
(3, 'catRu-3', 'catUz-3'),
(4, 'catRu-4', 'catUz-4');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `name_uz` varchar(255) NOT NULL,
  `description_ru` text NOT NULL,
  `description_uz` text NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ru`, `name_uz`, `description_ru`, `description_uz`, `price`, `category_id`, `image`, `active`) VALUES
(1, 'Ru DC Comics Women\'s Flash Distressed Logo Hoodie ', 'Uz DC Comics Women\'s Flash Distressed Logo Hoodie ', 'Ru Celebrate the Scarlet Speedster with this excellent piece of officially licensed Flash merchandise. This Flash hoodie features a distressed version of the iconic Flash logo and comes officially branded with woven neck label and swing tag to prove it\'s authenticity. ', 'Uz Celebrate the Scarlet Speedster with this excellent piece of officially licensed Flash merchandise. This Flash hoodie features a distressed version of the iconic Flash logo and comes officially branded with woven neck label and swing tag to prove it\'s authenticity. ', '122000.00', 1, '1577096858.jpg', 1),
(2, 'Ru Piko Women\'s Famous 3/4 Sleeve Bamboo Top Loose Fit ', 'Uz Piko Women\'s Famous 3/4 Sleeve Bamboo Top Loose Fit ', 'Ru You are going to love the versatility of this Piko Top. Its made from a Bamboo-Spandex blend which makes it the most comfortable top around with the perfect amount of stretch. This classic style has an oversized fit and tight fitting sleeves. Layer it, Tie it up, or wear it down. You are sure to love this top. 95%Bamboo/5% Spandex. Size small measures 24.5\" from shoulder to hem. Size medium measures 25\" from shoulder to hem. Size large measures 26\" from shoulder to hem. ', 'Uz You are going to love the versatility of this Piko Top. Its made from a Bamboo-Spandex blend which makes it the most comfortable top around with the perfect amount of stretch. This classic style has an oversized fit and tight fitting sleeves. Layer it, Tie it up, or wear it down. You are sure to love this top. 95%Bamboo/5% Spandex. Size small measures 24.5\" from shoulder to hem. Size medium measures 25\" from shoulder to hem. Size large measures 26\" from shoulder to hem. ', '99200.00', 1, '1577096918.jpg', 1),
(3, 'Ru CHAIRAY GOT7 Mark Cap Hoodie Cute Donut Unisex Sweatershirt ', 'Uz CHAIRAY GOT7 Mark Cap Hoodie Cute Donut Unisex Sweatershirt ', 'RU Warm Notice:\r\n1).It usually takes around 7-12 days for arrival, please ignore the time shown on Amazon\r\n2).You can check our store \"CHAIRAY\"for a full range of clothes of similar styles\r\n3). Because of the different measurement methods, Measurement difference from 1-3cm, Please check the size to confirm whether the clothes fits\r\n4).As different computers display colors differently, the color of the actual item may vary slightly from the above images\r\n5). Hope you can understand .And our quality is good. Please feel rest assured to buy. If you have any questions,please feel free to contact us,thanks!', 'Uz Warm Notice:\r\n1).It usually takes around 7-12 days for arrival, please ignore the time shown on Amazon\r\n2).You can check our store \"CHAIRAY\"for a full range of clothes of similar styles\r\n3). Because of the different measurement methods, Measurement difference from 1-3cm, Please check the size to confirm whether the clothes fits\r\n4).As different computers display colors differently, the color of the actual item may vary slightly from the above images\r\n5). Hope you can understand .And our quality is good. Please feel rest assured to buy. If you have any questions,please feel free to contact us,thanks!', '1000200.00', 1, '1577096987.jpg', 1),
(4, 'Ru Apparel. No. 5 Women\'s Sherpa Fleece Full Zip Warm Winter Jacket ', 'Uz Apparel. No. 5 Women\'s Sherpa Fleece Full Zip Warm Winter Jacket ', 'RU This jacket is very nice love the softness, only thing is if you have a long torso it is short. I have very long arms and usually all coats/jackets are short in the arms this coat is not. Would have thought with the arms being nice and long the torso would be a bit longer than what it is.', 'Uz This jacket is very nice love the softness, only thing is if you have a long torso it is short. I have very long arms and usually all coats/jackets are short in the arms this coat is not. Would have thought with the arms being nice and long the torso would be a bit longer than what it is.', '120400.00', 2, '1577097053.jpg', 1),
(5, 'Ru Apparel No. 5 Women\'s Fleece-Lined Zip Hoodie Sweatshirt ', 'Uz Apparel No. 5 Women\'s Fleece-Lined Zip Hoodie Sweatshirt ', 'Ru This is a nice quality hoodie, very thick and warm. However it was way too big. I ordered my normal size Womenâ€™s Large but itâ€™s more like an Oversized Menâ€™s Large. I gave it to my husband and he loves it.', 'Uz This is a nice quality hoodie, very thick and warm. However it was way too big. I ordered my normal size Womenâ€™s Large but itâ€™s more like an Oversized Menâ€™s Large. I gave it to my husband and he loves it.', '328900.00', 2, '1577097108.jpg', 1),
(6, 'Ru Duckworth Women\'s Merino Wool Powder High Neck Sweater Top ', 'Uz Duckworth Women\'s Merino Wool Powder High Neck Sweater Top ', 'Ru The Duckworth Womens Merino Wool Powder Turtleneck Sweater Top is a versatile, multi-functional fleece tunic sweater with a front pouch pocket. Classy and long in a relaxed fit, the Merino wool fleece is engineered for comfort, insulation, and wicking. The wool outer matrix is stealthy and light with a soft brushed inside against the skin. Great to wear alone on a warm summer\'s night or as a base layer for the winter\'s chill. With 5 beautiful colors to choose from, you have officially discovered your NEW go to gray turtleneck for women! This Merino wool blend consists of 50% Helle Rambouillet Merino wool, 30% Acrylic, and 20% Polyester. Duckworth wool is natural & single-sourced, and raised on a mountain pasture. Built 100% in the USA. Sheep to Shelf. Get \'em while they last! This sweater is intended to fit loosely. If you prefer a more true to size fit, please order a size down. Cold gentle machine wash. Wash with like colors. Dry flat or line dry. Do not tumble dry. ', 'Uz The Duckworth Womens Merino Wool Powder Turtleneck Sweater Top is a versatile, multi-functional fleece tunic sweater with a front pouch pocket. Classy and long in a relaxed fit, the Merino wool fleece is engineered for comfort, insulation, and wicking. The wool outer matrix is stealthy and light with a soft brushed inside against the skin. Great to wear alone on a warm summer\'s night or as a base layer for the winter\'s chill. With 5 beautiful colors to choose from, you have officially discovered your NEW go to gray turtleneck for women! This Merino wool blend consists of 50% Helle Rambouillet Merino wool, 30% Acrylic, and 20% Polyester. Duckworth wool is natural & single-sourced, and raised on a mountain pasture. Built 100% in the USA. Sheep to Shelf. Get \'em while they last! This sweater is intended to fit loosely. If you prefer a more true to size fit, please order a size down. Cold gentle machine wash. Wash with like colors. Dry flat or line dry. Do not tumble dry. ', '657000.00', 2, '1577097166.jpg', 1),
(7, 'Ru MV Sport Ladies\' Varsity Sweatshirt W2344 ', 'Uz MV Sport Ladies\' Varsity Sweatshirt W2344 ', 'RU Overall, I love this jacket. I think it is well worth the money and is as close to what I was looking for as I\'m going to find. I do have three complaints, but they\'re so minor, and that\'s why I only took off one star.\r\nThe lining isn\'t as soft as I expected. But it\'s still pretty soft. Just not like, I wish it were publicly acceptable to walk around shirtless under your jacket without being mistaken as a flasher, kind of soft.\r\nAnd the pockets are a little shallow. When my hands get cold, I like burying them in my pockets, and I think I just got used to having really deep pockets in my other jackets. But again, it\'s not that it\'s not deep, it\'s just that it\'s not as deep as I was expecting.\r\nAnd finally, I just kind of wish it were a bit more fitted. Which, well, I\'m impossible to please on this. Because I could have sized down and it would have been more fitted, but then it\'d be less cozy.\r\n\r\nSo, yes, I\'m picky. But I still love this. Sizing was spot on, I\'m usually between a medium and a large and the large was just a touch baggy, but in a cozy boyfriend\'s jacket kind of way.', 'Uz Overall, I love this jacket. I think it is well worth the money and is as close to what I was looking for as I\'m going to find. I do have three complaints, but they\'re so minor, and that\'s why I only took off one star.\r\nThe lining isn\'t as soft as I expected. But it\'s still pretty soft. Just not like, I wish it were publicly acceptable to walk around shirtless under your jacket without being mistaken as a flasher, kind of soft.\r\nAnd the pockets are a little shallow. When my hands get cold, I like burying them in my pockets, and I think I just got used to having really deep pockets in my other jackets. But again, it\'s not that it\'s not deep, it\'s just that it\'s not as deep as I was expecting.\r\nAnd finally, I just kind of wish it were a bit more fitted. Which, well, I\'m impossible to please on this. Because I could have sized down and it would have been more fitted, but then it\'d be less cozy.\r\n\r\nSo, yes, I\'m picky. But I still love this. Sizing was spot on, I\'m usually between a medium and a large and the large was just a touch baggy, but in a cozy boyfriend\'s jacket kind of way.', '2100000.00', 3, '1577097231.jpg', 1),
(8, 'Ru DC Comics Harley Quinn Bombshell Silky Satin Robe Black Apparel', 'Uz DC Comics Harley Quinn Bombshell Silky Satin Robe Black Apparel', 'RU Officially licensed Warner Brothers robe. Embroidered designs. Two front pockets. One size fits most. Dimensions: length: 46 inches, waist: up to 42 inches, sleeves: 32 inches. Machine washable. Material: Polyester Satin.', 'UZ Officially licensed Warner Brothers robe. Embroidered designs. Two front pockets. One size fits most. Dimensions: length: 46 inches, waist: up to 42 inches, sleeves: 32 inches. Machine washable. Material: Polyester Satin.', '219200.00', 3, '1577097284.jpg', 1),
(9, 'RU MILANO BRIDE Cocktail Dress For Women Lace Off-The- Swing Dress For Juniors ', 'UZ MILANO BRIDE Cocktail Dress For Women Lace Off-The- Swing Dress For Juniors ', 'RUWelcome to MILANO BRIDE!\r\nMilano Bride is a professional shop that focuses on high-end formal dresses. Please do not forget to recommend us to your friends and relatives if you are satisfied with our products!\r\n\r\nAbout the product\r\nAll of our dresses are handmade by experienced tailors.Our dress is above 98% similar with photo.\r\n\r\nFabric: 90% Nylon,10% Spandex\r\n\r\nLength: Short Length\r\n\r\nFeatures: Off The Shoulder Design, Concealed Zipper at Back, Full Floral Lace Pattern\r\n\r\nOccasions:Daily Casual, Formal Party, Dating, Dancing, Club Wear, Night Club, Going out, Cocktail Party, Banquet, Wedding, Prom, Special Occasion and So On.\r\n\r\nDetailed Size:\r\nS: Bust-31.9\" Waist-26.8\" Length-32.7\"\r\nM: Bust-33.9\" Waist-28.7\" Length-33.1\"\r\nL: Bust-35.8\" Waist-30.7\" Length-33.5\"\r\nXL: Bust-39.0\"Waist-33.1\" Length-34.3\"\r\nXXL: Bust-42.1\" Waist-35.4\" Length-35\"\r\n\r\nNotice:\r\nItems may slightly differ from photo in terms of color due to the lighting during photo shooting or the monitor\'s display.\r\nSmall measurement error may exist due to manual measurement.\r\nContact us when meeting difficulties on how to choose the most suitable sizes, colors or any other problems, and your email will be replied to within 24 hours.\r\n\r\n\r\nClick â€˜Add to Cartâ€™ above to get the beautiful dress for your special day!', 'UZ Welcome to MILANO BRIDE!\r\nMilano Bride is a professional shop that focuses on high-end formal dresses. Please do not forget to recommend us to your friends and relatives if you are satisfied with our products!\r\n\r\nAbout the product\r\nAll of our dresses are handmade by experienced tailors.Our dress is above 98% similar with photo.\r\n\r\nFabric: 90% Nylon,10% Spandex\r\n\r\nLength: Short Length\r\n\r\nFeatures: Off The Shoulder Design, Concealed Zipper at Back, Full Floral Lace Pattern\r\n\r\nOccasions:Daily Casual, Formal Party, Dating, Dancing, Club Wear, Night Club, Going out, Cocktail Party, Banquet, Wedding, Prom, Special Occasion and So On.\r\n\r\nDetailed Size:\r\nS: Bust-31.9\" Waist-26.8\" Length-32.7\"\r\nM: Bust-33.9\" Waist-28.7\" Length-33.1\"\r\nL: Bust-35.8\" Waist-30.7\" Length-33.5\"\r\nXL: Bust-39.0\"Waist-33.1\" Length-34.3\"\r\nXXL: Bust-42.1\" Waist-35.4\" Length-35\"\r\n\r\nNotice:\r\nItems may slightly differ from photo in terms of color due to the lighting during photo shooting or the monitor\'s display.\r\nSmall measurement error may exist due to manual measurement.\r\nContact us when meeting difficulties on how to choose the most suitable sizes, colors or any other problems, and your email will be replied to within 24 hours.\r\n\r\n\r\nClick â€˜Add to Cartâ€™ above to get the beautiful dress for your special day!', '436756.00', 3, '1577097340.jpg', 1),
(10, 'RU Weatherproof W1162 Ladies\' Burnout Hooded Pullover Blend Fleece - Caribean Wave - XL ', 'UZ Weatherproof W1162 Ladies\' Burnout Hooded Pullover Blend Fleece - Caribean Wave - XL ', 'RU Love the color a little big', 'UZ Love the color a little big', '41900.00', 4, '1577097416.jpg', 1),
(11, 'RU Weatherproof W1162 Ladies\' Burnout Hooded Pullover Blend Fleece - Caribean Wave - 2XL ', 'UZ Weatherproof W1162 Ladies\' Burnout Hooded Pullover Blend Fleece - Caribean Wave - 2XL ', 'RU One of my favorite hoodies - owned a few years now & wear often - super soft', 'UZ One of my favorite hoodies - owned a few years now & wear often - super soft', '65000.00', 4, '1577097510.jpg', 1),
(12, 'RU Coolibar UPF 50+ Women\'s Catalina Beach Cover-Up Dress - Sun Protective (2X- White) ', 'UZ Coolibar UPF 50+ Women\'s Catalina Beach Cover-Up Dress - Sun Protective (2X- White) ', 'RU Everything about our lightweight Catalina Beach Cover-Up Dress is relaxed and casual. Loose front pockets, a deep V-neck, a hood with a drawcord all combine to say: let\'s go to the beach! ZnO fabric features zinc oxide particles embedded into the fibers. Sun protection that won\'t wash or wear out! ', 'UZ Everything about our lightweight Catalina Beach Cover-Up Dress is relaxed and casual. Loose front pockets, a deep V-neck, a hood with a drawcord all combine to say: let\'s go to the beach! ZnO fabric features zinc oxide particles embedded into the fibers. Sun protection that won\'t wash or wear out! ', '569870.00', 4, '1577097563.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `catId` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
