-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 08:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missskin`
--

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `ID` int(11) NOT NULL,
  `home_image` varchar(255) NOT NULL,
  `home_emri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Emri` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Cmimi` varchar(255) NOT NULL,
  `Pershkrimi` varchar(255) NOT NULL,
  `Lloji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Emri`, `Foto`, `Cmimi`, `Pershkrimi`, `Lloji`) VALUES
(14, 'Waterlight Gel Moisturizer 72 Hour Hydration 50 ml', './Fotot/Oferta1f1.webp', '8.50', 'Instantly Hydrates Skin | LightWeight & Non-Sticky', 'face'),
(15, 'Clearing & Calming Acne Face Wash 72 Hour Hydration 100 ml', './Fotot/Oferta1f2.webp', '6.25', 'Speeds Up Healing Of Acne | Gentle Cleansing | Acne', 'face'),
(16, 'Acne Care & Healing Gel Moisturiser With Tea Tree', './Fotot/Oferta1f3.webp', '6.99', 'Healing Of Acne | Gently Hydrates |Treats & Prevents', 'face'),
(17, 'Overnight Acne Spot Corrector,Fast-Acting Spot Treatment: & Cica 50 ml', './Fotot/Oferta1f4.webp', '9.70', 'Reduces & Shrinks | Works on Active Acne, Blackheads', 'face'),
(18, 'Dark Spot & Hyperpigmentation Correcting Power Serum', './Fotot/Oferta1f5.webp', '12.00', 'Fades Dark Spots | Reduces Hyperpigmentation', 'face'),
(19, 'Super Clarifying 12% Niacinamide Face Serum for All Skin Types', './Fotot/Oferta1f6.webp', '11.50', 'Controls Oil | Refines Pores | Evens out Rough Texture', 'face'),
(20, 'Dark Spot & Hyperpigmentation Correcting Power Serum', './Fotot/Serum1.webp', '16.99', 'Fades Dark Spots | Reduces Hyperpigmentation', 'serum'),
(21, 'Super Clarifying 12% Niacinamide Face Serum for All', './Fotot/Serum2.webp', '19.70', 'Controls Oil | Refines Pores | Evens out Rough Texture', 'serum'),
(22, 'Vitamin C Antioxidant Radiance Serum 30 ml', './Fotot/Serum3.webp', '12.55', 'Reduces Pigmentation | Energizes Skin', 'serum'),
(23, 'Anti Acne Serum 30 ml + Pigmentation Relief Duo', './Fotot/Serum4.webp', '22.50', 'Prevents Breakouts & Whiteheads', 'serum'),
(25, 'Overnight Acne Spot Corrector 72 Hour Hydration 30 ml', './Fotot/Acne1.webp', '18.50', 'Reduces & Shrinks Acne | Works on active Blackheads', 'faceP'),
(26, 'Overnight Exfoliating AHA BHA Radiance Mask 72 Hour Hydration 100 ml', './Fotot/Mask1.webp', '6.25', 'Double Exfoliates | Reduces Pigmentation | Evens Out Skin', 'faceP'),
(27, 'Daily Moisturiser With Blue Light Protection and Reduces Pigmentation', './Fotot/Moisturiser1.webp', '16.99', 'Hydrates Skin | Improves Dullness | All Skin types', 'faceP'),
(28, 'Hydrating Toner and Overnight Acne Spot Corrector 100 ml', './Fotot/Toner1.webp', '9.70', 'Reduces & Shrinks | Works on Active Acne, Blackheads', 'faceP'),
(29, 'Oil Free Matte Moisturiser with Blue Light Protection 30ml', './Fotot/Oil1.webp', '14.00', 'Fades Dark Spots | Reduces Hyperpigmentation| All Skin', 'faceP'),
(30, 'Mineral Matte Tinted Sunscreen for All Skin Types 50 g', './Fotot/Sunscreen.webp', '11.20', 'Shields skin from Broad Spectrum UVA and UVB rays', 'faceP'),
(31, 'Body Cream Pigmentation Glow', './Fotot/body1.webp', '16.99', 'Reduces Hyperpigmentation and pimples', 'bodycream'),
(32, 'Body Cream 12% Niacinamide', './Fotot/body2.webp', '19.70', 'Evens out Rough Texture | Energizes Skin', 'bodycream'),
(33, 'Body Cream with Vitamin C', './Fotot/body3.webp', '12.55', 'Reduces Pigmentation | Vitamin C', 'bodycream'),
(34, 'Body Cream With Extra Glow', './Fotot/body4.webp', '22.50', 'Prevents Breakouts & Whiteheads', 'bodycream'),
(35, 'Celestial Serenity Bath Bomb', './Fotot/bathbomb1.webp', '6.99', 'Pampers Skin | Lightweight & Refreshing', 'body'),
(36, 'Lustrous Luxe Velvet-Touch Exfoliating Glove', './Fotot/bodyLoofa1.webp', '4.75', 'Exfoliating Ingredients | Gentle Cleansing', 'body'),
(37, 'Velvet Glow Renewal Elixir Exfoliating Body Scrub', './Fotot/BodyScrub1.webp', '10.99', 'Exfoliate Skin | Nourish | Renew & Hydrate', 'body'),
(38, 'Enchanting Orchid Bloom Hydrating Mist', './Fotot/BodySpray1.webp', '12.50', 'Energizing Botanical Extracts | Moisturize', 'body'),
(39, 'Strawberry Hair Mask', './Fotot/HairMask1.webp', '8.50', 'Relaxation and Self-Care | Adding Volume | Reducing Frizz', 'hair'),
(40, 'Dark Berry Hair Mask', './Fotot/HairMask2.webp', '8.50', 'Relaxation and Self-Care | Adding Volume | Reducing Frizz', 'hair'),
(41, 'Banana Hair Mask', './Fotot/HairMask3.webp', '10.99', 'Relaxation and Self-Care | Adding Volume | Reducing Frizz', 'hair'),
(43, 'Orange Infused Hair Mask', './Fotot/hairproduct-4.png', '10.99', 'Relaxation and Self-Care | Adding Volume | Reducing Frizz', 'hairP'),
(44, 'MissSkin Hair Shampoo', './Fotot/hairWasher1.png', '14.00', 'Optimal pH Balance | Reduces Hyperpigmentation | All Skin', 'hairP'),
(45, 'MissSkin Hair Oil', './Fotot/HairProduct6.png', '11.20', 'Improved Scalp Health | Prevention of Hair Loss | Shine', 'hairP');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userpassword` varbinary(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `email`, `userpassword`, `role`) VALUES
(44, 'ritashkodra', 'ritashkodra@gmail.com', 0x243279243130246a6a4a6a335348767838724b38716356554568686675757448756c564e694e316742466c65326c48693144556a70325254564f6447, 1),
(45, 'gerta', 'gertaahma@gmail.com', 0x24327924313024647a7555684f70743859624b30666c7969524f31462e666750776f666a63446d7a707433684a636b654c4f526c4e364d65746f7461, 1),
(46, 'user', 'user@gmail.com', 0x243279243130244b735749572f69737542454367366f64633268665375495636416f4e466e6e385737347055416172704f4a63336f706c6339627632, 0),
(47, 'userr', 'userr@gmail.com', 0x24327924313024446d6a4f6a454e4535774541615838707443774d5a2e772f56304a713743414f786f6971696c426b4b494b596241645a3536597143, 0),
(48, 'userrr', 'userrr@gmail.com', 0x243279243130246963636a6c6e652f486e48567073526a7848527a32654d746958354c4d644b6470326f5a467736456454444277385a31357a505979, 0);

-- --------------------------------------------------------

--
-- Table structure for table `veprimet`
--

CREATE TABLE `veprimet` (
  `id` int(11) NOT NULL,
  `Veprimi` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `Koha` timestamp NOT NULL DEFAULT current_timestamp(),
  `Detajet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `veprimet`
--

INSERT INTO `veprimet` (`id`, `Veprimi`, `userID`, `Koha`, `Detajet`) VALUES
(97, 'Delete Product', 44, '2024-02-02 18:56:12', ' ProduktID: 57'),
(98, 'Delete Product', 44, '2024-02-02 18:56:17', ' ProduktID: 58'),
(99, 'Delete Product', 44, '2024-02-02 18:56:27', ' ProduktID: 59'),
(100, 'Delete Product', 44, '2024-02-02 18:56:33', ' ProduktID: 60'),
(101, 'Delete Product', 44, '2024-02-02 18:56:36', ' ProduktID: 61');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `veprimet`
--
ALTER TABLE `veprimet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `veprimet`
--
ALTER TABLE `veprimet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
