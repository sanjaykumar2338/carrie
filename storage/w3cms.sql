-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 09:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w3cms_main_package`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `comment` tinyint(4) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => Published, 2 => Draft, 3 => Trash, 4 => Private, 5 => Pending',
  `post_type` varchar(255) NOT NULL DEFAULT 'blog',
  `visibility` enum('Pu','PP','Pr') NOT NULL COMMENT 'Pu => Public, PP => Password Protected, Pr => Private',
  `publish_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `slug`, `content`, `excerpt`, `comment`, `password`, `status`, `post_type`, `visibility`, `publish_on`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mistakes To Avoid While Writing A Blog Post', 'mistakes-to-avoid-while-writing-a-blog-post', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 05:47:18', '2024-01-20 05:47:18'),
(2, 1, 'The Best Ways to Do Market Research For Your Business Plan', 'the-best-ways-to-do-market-research-for-your-business-plan', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 05:53:36', '2024-01-20 05:53:36'),
(3, 1, 'Why Successful People Wear The Same Thing Every Day', 'why-successful-people-wear-the-same-thing-every-day', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 06:08:31', '2024-01-20 06:08:31'),
(4, 1, 'What You Can Learn From Mistakes', 'what-you-can-learn-from-mistakes', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 06:31:09', '2024-01-20 06:31:09'),
(5, 1, 'Why Successful People Plan Their Days Before', 'why-successful-people-plan-their-days-before', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 06:33:14', '2024-01-20 06:33:14'),
(6, 1, 'Everything You Need To Know About SEO', 'everything-you-need-to-know-about-seo', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 06:42:21', '2024-01-31 12:17:17'),
(7, 1, 'Why Everyone Loves Competition For today Business', 'why-everyone-loves-competition-for-today-business', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 06:47:35', '2024-01-20 06:47:35'),
(8, 1, 'Photographic Tools That Made My Job Easier', 'photographic-tools-that-made-my-job-easier', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 07:27:02', '2024-01-20 07:27:02'),
(9, 1, '9 Resume Mistakes That Might Cost You a Job', '9-resume-mistakes-that-might-cost-you-a-job', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-20 00:00:00', '2024-01-20 07:29:50', '2024-01-20 07:29:50'),
(10, 1, 'The Best Ways to grow More in Less Time', 'the-best-ways-to-grow-more-in-less-time', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-24 00:00:00', '2024-01-24 10:45:19', '2024-01-24 10:45:19'),
(11, 1, 'Let Me List Them Out For You', 'let-me-list-them-out-for-you', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-24 00:00:00', '2024-01-24 10:49:43', '2024-01-24 10:49:43'),
(12, 1, 'The Experience Has Taught Me Well', 'the-experience-has-taught-me-well', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-24 00:00:00', '2024-01-24 11:04:30', '2024-01-24 11:04:30'),
(13, 1, 'What No One Will Tell You But You Need To Hear About this', 'what-no-one-will-tell-you-but-you-need-to-hear-about-this', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-24 00:00:00', '2024-01-24 11:11:57', '2024-01-24 11:11:57'),
(14, 1, 'How To Create The Perfect Thank You Page', 'how-to-create-the-perfect-thank-you-page', '<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy</p>\r\n\r\n<p>For the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into.</p>\r\n\r\n<blockquote>\r\n<p>&ldquo; A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm. &rdquo;.</p>\r\nWilliam Son</blockquote>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>\r\n\r\n<ul>\r\n	<li>A wonderful serenity has taken possession.</li>\r\n	<li>Of my entire soul, like these sweet mornings of spring which.</li>\r\n	<li>I enjoy with my whole heart.</li>\r\n	<li>This spot, which was created For the bliss of souls like mine.</li>\r\n</ul>\r\n\r\n<p>The inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1, NULL, 1, 'blog', 'Pu', '2024-01-24 00:00:00', '2024-01-24 11:15:07', '2024-01-24 11:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_blog_categories`
--

CREATE TABLE `blog_blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_blog_categories`
--

INSERT INTO `blog_blog_categories` (`id`, `blog_id`, `blog_category_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 6),
(4, 2, 2),
(5, 2, 4),
(6, 2, 6),
(7, 3, 1),
(8, 3, 2),
(9, 3, 6),
(10, 4, 2),
(11, 4, 4),
(12, 5, 2),
(13, 5, 3),
(14, 5, 5),
(15, 5, 6),
(16, 6, 1),
(17, 6, 3),
(18, 6, 4),
(19, 6, 6),
(20, 7, 1),
(21, 7, 3),
(22, 7, 5),
(23, 7, 6),
(24, 8, 2),
(25, 8, 4),
(26, 8, 5),
(27, 8, 6),
(28, 9, 1),
(29, 9, 3),
(30, 9, 5),
(31, 9, 6),
(32, 10, 1),
(33, 10, 2),
(34, 10, 4),
(35, 10, 6),
(36, 11, 2),
(37, 11, 3),
(38, 11, 4),
(39, 11, 5),
(40, 11, 6),
(41, 12, 1),
(42, 12, 2),
(43, 12, 3),
(44, 12, 6),
(45, 13, 1),
(46, 13, 5),
(47, 13, 6),
(48, 14, 1),
(49, 14, 2),
(50, 14, 5),
(51, 14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `blog_blog_tags`
--

CREATE TABLE `blog_blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `blog_tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_blog_tags`
--

INSERT INTO `blog_blog_tags` (`id`, `blog_id`, `blog_tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 5),
(8, 2, 6),
(9, 3, 6),
(10, 3, 2),
(11, 3, 4),
(12, 3, 7),
(13, 4, 1),
(14, 4, 8),
(15, 4, 9),
(16, 4, 3),
(17, 5, 9),
(18, 5, 8),
(19, 5, 4),
(20, 5, 2),
(21, 6, 7),
(22, 6, 5),
(23, 6, 8),
(24, 6, 3),
(25, 6, 9),
(26, 7, 4),
(27, 7, 6),
(28, 7, 7),
(29, 7, 9),
(30, 7, 1),
(31, 7, 2),
(32, 8, 1),
(33, 8, 2),
(34, 8, 5),
(35, 8, 6),
(36, 8, 8),
(37, 9, 9),
(38, 9, 7),
(39, 9, 4),
(40, 9, 6),
(41, 10, 2),
(42, 10, 3),
(43, 10, 8),
(44, 10, 7),
(45, 10, 6),
(46, 11, 2),
(47, 11, 3),
(48, 11, 5),
(49, 11, 7),
(50, 11, 9),
(51, 12, 8),
(52, 12, 5),
(53, 12, 4),
(54, 12, 2),
(55, 12, 1),
(56, 13, 5),
(57, 13, 3),
(58, 13, 4),
(59, 13, 9),
(60, 14, 2),
(61, 14, 1),
(62, 14, 6),
(63, 14, 7);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `order` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `parent_id`, `user_id`, `title`, `slug`, `image`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Nature', 'nature', NULL, 'Nature', 1, '2024-01-20 05:40:29', '2024-01-20 05:40:29'),
(2, NULL, 1, 'Place', 'place', NULL, NULL, 2, '2024-01-20 05:40:44', '2024-01-20 05:40:44'),
(3, NULL, 1, 'Sports', 'sports', NULL, NULL, 3, '2024-01-20 05:41:25', '2024-01-20 05:41:25'),
(4, NULL, 1, 'Beauty', 'beauty', NULL, NULL, 4, '2024-01-20 05:41:33', '2024-01-20 05:41:33'),
(5, NULL, 1, 'Lifestyle', 'lifestyle', NULL, NULL, 5, '2024-01-20 05:41:40', '2024-01-20 05:41:40'),
(6, NULL, 1, 'Food', 'food', NULL, NULL, 6, '2024-01-20 05:44:02', '2024-01-20 05:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `blog_metas`
--

CREATE TABLE `blog_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_metas`
--

INSERT INTO `blog_metas` (`id`, `blog_id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'ximage', 'demo_pic1.jpg', '2024-01-20 05:47:18', '2024-01-20 05:47:18'),
(2, 1, 'xvideo', NULL, '2024-01-20 05:47:18', '2024-01-20 05:47:18'),
(3, 2, 'ximage', 'demo_pic2.jpg', '2024-01-20 05:53:36', '2024-01-20 05:53:36'),
(4, 2, 'xvideo', NULL, '2024-01-20 05:53:36', '2024-01-20 05:53:36'),
(5, 3, 'ximage', 'demo_pic3.jpg', '2024-01-20 06:08:31', '2024-01-20 06:08:31'),
(6, 3, 'xvideo', NULL, '2024-01-20 06:08:31', '2024-01-20 06:08:31'),
(7, 4, 'ximage', 'demo_pic4.jpg', '2024-01-20 06:31:09', '2024-01-20 06:31:09'),
(8, 4, 'xvideo', NULL, '2024-01-20 06:31:09', '2024-01-20 06:31:09'),
(13, 7, 'ximage', 'demo_pic6.jpg', '2024-01-20 06:47:35', '2024-01-20 06:47:35'),
(14, 7, 'xvideo', NULL, '2024-01-20 06:47:35', '2024-01-20 06:47:35'),
(17, 8, 'ximage', 'demo_pic7.jpg', '2024-01-20 07:27:29', '2024-01-20 07:27:29'),
(18, 8, 'xvideo', NULL, '2024-01-20 07:27:29', '2024-01-20 07:27:29'),
(19, 9, 'ximage', 'demo_pic8.jpg', '2024-01-20 07:29:50', '2024-01-20 07:29:50'),
(20, 9, 'xvideo', NULL, '2024-01-20 07:29:50', '2024-01-20 07:29:50'),
(21, 10, 'ximage', 'demo_pic9.jpg', '2024-01-24 10:45:19', '2024-01-24 10:45:19'),
(22, 10, 'xvideo', NULL, '2024-01-24 10:45:19', '2024-01-24 10:45:19'),
(23, 11, 'ximage', 'demo_pic10.jpg', '2024-01-24 10:49:43', '2024-01-24 10:49:43'),
(24, 11, 'xvideo', NULL, '2024-01-24 10:49:43', '2024-01-24 10:49:43'),
(25, 5, 'ximage', 'demo_pic11.jpg', '2024-01-24 10:55:39', '2024-01-24 10:55:39'),
(26, 5, 'xvideo', NULL, '2024-01-24 10:55:39', '2024-01-24 10:55:39'),
(27, 12, 'ximage', 'demo_pic12.jpg', '2024-01-24 11:04:30', '2024-01-24 11:04:30'),
(28, 12, 'xvideo', NULL, '2024-01-24 11:04:30', '2024-01-24 11:04:30'),
(29, 13, 'ximage', 'demo_pic13.jpg', '2024-01-24 11:11:57', '2024-01-24 11:11:57'),
(30, 13, 'xvideo', NULL, '2024-01-24 11:11:57', '2024-01-24 11:11:57'),
(31, 14, 'ximage', 'demo_pic14.jpg', '2024-01-24 11:15:07', '2024-01-24 11:15:07'),
(32, 14, 'xvideo', NULL, '2024-01-24 11:15:07', '2024-01-24 11:15:07'),
(37, 6, 'ximage', 'demo_pic5.jpg', '2024-01-31 12:22:17', '2024-01-31 12:22:17'),
(38, 6, 'xvideo', NULL, '2024-01-31 12:22:17', '2024-01-31 12:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `blog_seos`
--

CREATE TABLE `blog_seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_descriptions` longtext DEFAULT NULL,
  `blog_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_seos`
--

INSERT INTO `blog_seos` (`id`, `blog_id`, `page_title`, `meta_keywords`, `meta_descriptions`, `blog_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mistakes To Avoid While Writing A Blog Post', 'Mistakes To Avoid While Writing A Blog Post', 'Mistakes To Avoid While Writing A Blog Post', NULL, '2024-01-20 05:47:18', '2024-01-20 05:47:18'),
(2, 2, 'The Best Ways to Do Market Research For Your Business Plan', 'The Best Ways to Do Market Research For Your Business Plan', 'The Best Ways to Do Market Research For Your Business Plan', NULL, '2024-01-20 05:53:36', '2024-01-20 05:53:36'),
(3, 3, 'Why Successful People Wear The Same Thing Every Day', 'Why Successful People Wear The Same Thing Every Day', 'Why Successful People Wear The Same Thing Every Day', NULL, '2024-01-20 06:08:31', '2024-01-20 06:08:31'),
(4, 4, 'What You Can Learn From Mistakes', 'What You Can Learn From Mistakes', 'What You Can Learn From Mistakes', NULL, '2024-01-20 06:31:09', '2024-01-20 06:31:09'),
(5, 5, 'Why Successful People Plan Their Days Before', 'Why Successful People Plan Their Days Before', 'Why Successful People Plan Their Days Before', NULL, '2024-01-20 06:33:14', '2024-01-20 06:33:14'),
(6, 6, 'Everything You Need To Know About SEO', 'Everything You Need To Know About SEO', 'Everything You Need To Know About SEO', NULL, '2024-01-20 06:42:21', '2024-01-20 06:42:21'),
(7, 7, 'Why Everyone Loves Competition For today Business', 'Why Everyone Loves Competition For today Business', 'Why Everyone Loves Competition For today Business', NULL, '2024-01-20 06:47:35', '2024-01-20 06:47:35'),
(8, 8, 'Photographic Tools That Made My Job Easier', 'Photographic Tools That Made My Job Easier', 'Photographic Tools That Made My Job Easier', NULL, '2024-01-20 07:27:02', '2024-01-20 07:27:02'),
(9, 9, '9 Resume Mistakes That Might Cost You a Job', '9 Resume Mistakes That Might Cost You a Job', '9 Resume Mistakes That Might Cost You a Job', NULL, '2024-01-20 07:29:50', '2024-01-20 07:29:50'),
(10, 10, 'The Best Ways to grow More in Less Time', 'The Best Ways to grow More in Less Time', 'The Best Ways to grow More in Less Time', NULL, '2024-01-24 10:45:19', '2024-01-24 10:45:19'),
(11, 11, 'Let Me List Them Out For You', 'Let Me List Them Out For You', 'Let Me List Them Out For You', NULL, '2024-01-24 10:49:43', '2024-01-24 10:49:43'),
(12, 12, 'The Experience Has Taught Me Well', 'The Experience Has Taught Me Well', 'The Experience Has Taught Me Well', NULL, '2024-01-24 11:04:30', '2024-01-24 11:04:30'),
(13, 13, 'What No One Will Tell You But You Need To Hear About this', 'What No One Will Tell You But You Need To Hear About this', 'What No One Will Tell You But You Need To Hear About this', NULL, '2024-01-24 11:11:57', '2024-01-24 11:11:57'),
(14, 14, 'How To Create The Perfect Thank You Page', 'How To Create The Perfect Thank You Page', 'How To Create The Perfect Thank You Page', NULL, '2024-01-24 11:15:07', '2024-01-24 11:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `user_id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Education', 'education', '2024-01-20 05:47:18', '2024-01-20 05:47:18'),
(2, 1, 'Business', 'business', '2024-01-20 05:47:18', '2024-01-20 05:47:18'),
(3, 1, 'Mindset', 'mindset', '2024-01-20 05:47:18', '2024-01-20 05:47:18'),
(4, 1, 'Ecommerce', 'ecommerce', '2024-01-20 05:47:18', '2024-01-20 05:47:18'),
(5, 1, 'Latest', 'latest', '2024-01-20 05:53:36', '2024-01-20 05:53:36'),
(6, 1, 'Corporate', 'corporate', '2024-01-20 05:53:36', '2024-01-20 05:53:36'),
(7, 1, 'Employees', 'employees', '2024-01-20 06:08:31', '2024-01-20 06:08:31'),
(8, 1, 'Company', 'company', '2024-01-20 06:31:09', '2024-01-20 06:31:09'),
(9, 1, 'Jobs', 'jobs', '2024-01-20 06:31:09', '2024-01-20 06:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT 0,
  `object_id` bigint(20) UNSIGNED DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT 0,
  `object_type` enum('1','2') NOT NULL COMMENT '1 => ''Blog'', 2 => ''Page''',
  `commenter` varchar(255) DEFAULT NULL,
  `profile_url` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `approve` enum('0','1','2','3') NOT NULL COMMENT '0 => moderation / pending, 1 => approved, 2 => spam, 3 => trash',
  `browser_agent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `value` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `input_type` varchar(255) DEFAULT NULL,
  `editable` tinyint(4) NOT NULL DEFAULT 1,
  `weight` int(11) DEFAULT NULL,
  `params` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `name`, `value`, `title`, `description`, `input_type`, `editable`, `weight`, `params`, `order`) VALUES
(1, 'Site.title', 'W3CMS Laravel', NULL, NULL, 'text', 1, 1, NULL, 0),
(2, 'Site.tagline', 'W3CMS Laravel System', NULL, NULL, 'textarea', 1, 2, NULL, 2),
(3, 'Site.email', 'admin@gmail.com', NULL, NULL, 'text', 1, 3, NULL, 3),
(4, 'Site.status', '1', NULL, NULL, 'checkbox', 1, 4, NULL, 11),
(5, 'Site.copyright', 'Crafted with <span class=\"heart\"></span> by <a href=\"https://www.w3itexperts.com/\\\" target=\\\"_blank\\\">W3ITEXPERTS</a>', 'Copyright Text', NULL, 'text', 1, 5, NULL, 5),
(6, 'Site.footer_text', 'Developed by <a href=\"https://www.w3itexperts.com/\\\" target=\\\"_blank\\\">W3itexperts</a>', 'Footer text', NULL, 'textarea', 1, 6, NULL, 6),
(7, 'Site.coming_soon', '0', NULL, NULL, 'checkbox', 1, 7, NULL, 12),
(8, 'Site.contact', '', NULL, NULL, 'text', 1, 8, NULL, 7),
(9, 'Site.logo', 'site_logo.png', 'Logo', 'Site Logo', 'file', 1, 9, NULL, 8),
(10, 'Site.favicon', 'favicon.png', 'Site Favicon', 'Site Favicon', 'file', 1, 10, NULL, 9),
(11, 'Site.maintenance_message', 'Site Down For Maintenance\r\nPLEASE SORRY FOR THE <span class=\"text-primary\">DISTURBANCES</span>', 'Maintenance Message', 'Site down for maintenance Message will show on maintenance page', 'textarea', 1, 11, NULL, 11),
(12, 'Site.comingsoon_message', 'We Are Coming Soon !', 'Coming Soon Message', 'Coming soon message will show on coming soon page', 'textarea', 1, 12, NULL, 13),
(13, 'Site.text_logo', 'logo-text.png', 'Text Logo', NULL, 'file', 1, 13, NULL, 10),
(14, 'Writing.editable', '1', 'Enable WYSIWYG editor', NULL, 'checkbox', 1, 14, NULL, 14),
(15, 'Reading.nodes_per_page', '10', NULL, NULL, 'text', 1, 15, NULL, 15),
(16, 'Reading.date_time_format', 'M. d, Y, g:i A', NULL, 'Formates :- <br>\r\nF j, Y, g:i a (November 23, 2022, 5:45 am), <br>\r\nY-m-d , H:i (2022-11-23, 05:45), <br>\r\nm/d/Y (11/23/2022), <br>\r\nd/m/Y(23/11/2022)', 'text', 1, 16, NULL, 16),
(17, 'Social.instagram', 'https://www.instagram.com/', 'Instagram Url', NULL, 'text', 1, 17, NULL, 17),
(18, 'Social.linkedin', 'https://www.in.linkedin.com/', 'Linkedin Url', NULL, 'text', 1, 17, NULL, 18),
(19, 'Social.facebook', 'http://www.facebook.com', 'Facebook Url', NULL, 'text', 1, 18, NULL, 19),
(20, 'Social.twitter', 'http://www.twitter.com', 'Twitter Url', NULL, 'text', 1, 19, NULL, 20),
(21, 'Site.menu_location', 'a:5:{s:7:\"primary\";a:2:{s:5:\"title\";s:23:\"Desktop Horizontal Menu\";s:4:\"menu\";i:1;}s:8:\"expanded\";a:2:{s:5:\"title\";s:21:\"Desktop Expanded Menu\";s:4:\"menu\";i:3;}s:6:\"mobile\";a:2:{s:5:\"title\";s:11:\"Mobile Menu\";s:4:\"menu\";s:0:\"\";}s:6:\"footer\";a:3:{s:5:\"title\";s:11:\"Footer Menu\";s:4:\"menu\";s:1:\"2\";s:5:\"hindi\";s:15:\"हिंदी\";}s:6:\"social\";a:2:{s:5:\"title\";s:11:\"Social Menu\";s:4:\"menu\";s:0:\"\";}}', NULL, NULL, 'text', 0, 20, NULL, 24),
(22, 'Permalink.settings', '/%slug%/', '', NULL, 'text', 1, 21, NULL, 21),
(23, 'Reading.show_on_front', 'Page', NULL, '(Home Page)', 'radio', 1, 22, 'Post,Page', 22),
(24, 'Widget.show_sidebar', '1', NULL, NULL, 'checkbox', 1, NULL, '1', 25),
(25, 'Widget.show_recent_post_widget', '1', NULL, NULL, 'checkbox', 1, NULL, '1', 26),
(26, 'Widget.show_category_widget', '1', NULL, '', 'checkbox', 1, NULL, '1', 27),
(27, 'Widget.show_archives_widget', '1', NULL, '', 'checkbox', 1, NULL, '1', 28),
(28, 'Widget.show_search_widget', '1', NULL, NULL, 'checkbox', 1, NULL, '1', 29),
(29, 'Widget.show_tags_widget', '1', NULL, '', 'checkbox', 1, NULL, '1', 30),
(30, 'Site.comingsoon_date', '2023-01-05', NULL, '', 'date', 1, NULL, '', 14),
(31, 'Site.biography', 'A Wonderful Serenity Has Taken Possession Of My Entire Soul, Like These.', NULL, '', 'text', 1, NULL, '', 32),
(32, 'Site.location', '832  Thompson Drive, San Fransisco CA 94107, United States', NULL, '', 'text', 1, NULL, '', 33),
(33, 'Site.office_time', 'Time 09:00 AM To 07:00 PM', NULL, 'Ex. : \"Time 06:00 AM To 08:00 PM\'', 'text', 1, NULL, '', 34),
(34, 'Site.icon_logo', 'logo.png', NULL, '', 'file', 1, NULL, '', 35),
(36, 'Site.w3cms_locale', 'en', 'Select Language', '', 'select', 1, NULL, 'en,hi,fr,ru', 4),
(37, 'Reading.home_page', 'home', NULL, NULL, NULL, 1, NULL, NULL, 37),
(38, 'Theme.select_theme', 'frontend/lemars', NULL, NULL, NULL, 0, NULL, NULL, 38),
(43, 'Environment.menu', NULL, NULL, '', NULL, 0, NULL, '', 0),
(44, 'Site.default_role', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(45, 'Site.date_format', 'F j, Y', NULL, NULL, NULL, 1, NULL, NULL, 0),
(46, 'Site.custom_date_format', 'F j, Y', NULL, NULL, NULL, 1, NULL, NULL, 0),
(47, 'Site.time_format', 'g:i A', NULL, NULL, NULL, 1, NULL, NULL, 0),
(48, 'Site.custom_time_format', 'g:i A', NULL, NULL, NULL, 1, NULL, NULL, 0),
(49, 'Discussion.menu', NULL, NULL, '', NULL, 1, NULL, '', 0),
(50, 'Discussion.name_email_require', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(51, 'Discussion.close_comments_days_old', '14', NULL, NULL, NULL, 1, NULL, NULL, 0),
(52, 'Discussion.thread_comments_depth', '4', NULL, NULL, NULL, 1, NULL, NULL, 0),
(53, 'Discussion.default_comments_page', 'newest', NULL, NULL, NULL, 1, NULL, NULL, 0),
(54, 'Discussion.comment_order', 'desc', NULL, NULL, NULL, 1, NULL, NULL, 0),
(55, 'Discussion.comment_max_links', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0),
(56, 'Discussion.moderation_keys', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0),
(57, 'Discussion.disallowed_comment_keys', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0),
(58, 'Discussion.pingback_flag', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(59, 'Discussion.pingback_status', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(60, 'Discussion.comment_status', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(61, 'Discussion.registration_comment', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(62, 'Discussion.old_posts_comment_close', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(63, 'Discussion.show_comments_cookies_opt_in', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(64, 'Discussion.thread_comments', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(65, 'Discussion.page_comments', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(66, 'Discussion.comments_notify', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(67, 'Discussion.moderation_notify', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(68, 'Discussion.comment_moderation', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(69, 'Discussion.comment_previously_approved', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(70, 'Discussion.comments_per_page', '2', NULL, NULL, NULL, 1, NULL, NULL, 0),
(71, 'Discussion.save_comments_cookie', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(72, 'Site.logo_white', 'site-logo-white.png', 'Logo White', 'Site Logo White', 'file', 1, NULL, NULL, 0),
(73, 'Reading.public_blog_search', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(74, 'Site.direction', 'ltr', NULL, NULL, NULL, 1, NULL, NULL, 0),
(75, 'Settings.admin_layout', '0', NULL, NULL, NULL, 1, NULL, NULL, 0),
(77, 'Settings.admin_layout_options', '{\"typography\":\"poppins\",\"version\":\"light\",\"layout\":\"vertical\",\"headerBg\":\"color_1\",\"primary\":\"color_1\",\"navheaderBg\":\"color_1\",\"sidebarBg\":\"color_1\",\"sidebarStyle\":\"full\",\"sidebarPosition\":\"fixed\",\"headerPosition\":\"fixed\",\"containerLayout\":\"wide\",\"direction\":\"ltr\"}', NULL, NULL, NULL, 1, NULL, NULL, 0),
(78, 'Theme.select_admin_theme', 'admin/zenix', NULL, NULL, 'text', 0, NULL, NULL, 0),
(80, 'Reading.multi_lang_theme', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(81, 'Reading.lang_position', 'Footer', NULL, NULL, NULL, 1, NULL, NULL, 0),
(82, 'Reading.language_widgets', '1', NULL, NULL, NULL, 1, NULL, NULL, 0),
(84, 'Admin.logo_light', 'admin-logo-full-white.png', 'Admin Logo Light', 'Admin Logo Light', 'file', 1, NULL, '', 0),
(85, 'Admin.logo_dark', 'admin-logo-full-black.png', 'Admin Logo Dark', 'Admin Logo Dark', 'file', 1, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(49) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `language_code` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `country` varchar(500) DEFAULT NULL,
  `country_code` varchar(500) DEFAULT NULL,
  `is_universal` enum('0','1') DEFAULT '0',
  `is_main` enum('0','1') DEFAULT '0',
  `is_regional` enum('0','1') DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `language_code`, `country_id`, `country`, `country_code`, `is_universal`, `is_main`, `is_regional`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 14, 'Australia', 'AU', '1', NULL, NULL, '2023-09-12 16:31:17', '2023-09-15 05:23:20'),
(2, 'Afar', 'aa', 71, 'Ethiopia', 'ET', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 11:56:05'),
(3, 'Abkhazian', 'ab', 185, 'Russian Federation', 'RU', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 11:56:16'),
(4, 'Afrikaans', 'af', 209, 'South Africa', 'ZA', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:11:35'),
(5, 'Amharic', 'am', 12, 'Ethiopia', 'ET', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 11:58:43'),
(6, 'Arabic', 'ar', 11, 'Egypt', 'EG', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 11:50:16'),
(7, 'Assamese', 'as', 103, 'India', 'IN', NULL, NULL, '1', '2023-09-12 16:31:17', '2023-09-15 06:32:38'),
(8, 'Aymara', 'ay', 176, 'Peru', 'PE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:24:33'),
(9, 'Azerbaijani', 'az', 16, 'Azerbaijan', 'AZ', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:25:04'),
(10, 'Bashkir', 'ba', 185, 'Russian Federation', 'RU', NULL, '1', NULL, '2023-09-12 16:31:17', '2023-09-15 06:32:52'),
(11, 'Belarusian', 'be', 21, 'Belarus', 'BY', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:26:05'),
(12, 'Bulgarian', 'bg', 35, 'Bulgaria', 'BG', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:26:29'),
(13, 'Bihari', 'bh', 103, 'India', 'IN', NULL, NULL, '1', '2023-09-12 16:31:17', '2023-09-15 05:14:48'),
(14, 'Bislama', 'bi', 243, 'Vanuatu', 'VU', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:37:10'),
(15, 'Bengali/Bangla', 'bn', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:37:28'),
(16, 'Tibetan', 'bo', 46, 'China', 'CN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:37:56'),
(17, 'Breton', 'br', 76, 'France', 'FR', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:38:43'),
(18, 'Catalan', 'ca', 6, 'Andorra', 'AD', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 11:59:48'),
(19, 'Corsican', 'co', 110, 'Italy', 'IT', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:40:07'),
(20, 'Czech', 'cs', 60, 'Czech Republic', 'CZ', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:41:05'),
(21, 'Welsh', 'cy', 238, 'United Kingdom', 'GB', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:41:29'),
(22, 'Danish', 'da', 61, 'Denmark', 'DK', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:41:53'),
(23, 'German', 'de', 83, 'Germany', 'DE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:42:23'),
(24, 'Bhutani', 'dz', 26, 'Bhutan', 'BT', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:42:52'),
(25, 'Greek', 'el', 86, 'Greece', 'GR', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:44:10'),
(26, 'Esperanto', 'eo', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(27, 'Spanish', 'es', 212, 'Spain', 'ES', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:45:58'),
(28, 'Estonian', 'et', 70, 'Estonia', 'EE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:46:25'),
(29, 'Basque', 'eu', 212, 'Spain', 'ES', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:47:00'),
(30, 'Persian', 'fa', 1, 'Afghanistan', 'AF', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:47:50'),
(31, 'Finnish', 'fi', 75, 'Finland', 'FI', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:48:38'),
(32, 'Fiji', 'fj', 74, 'Fiji', 'FJ', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:49:08'),
(33, 'Faeroese', 'fo', 72, 'Falkland Islands (Malvinas)', 'FK', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:19:21'),
(34, 'French', 'fr', 22, 'Belgium', 'BE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:49:57'),
(35, 'Frisian', 'fy', 158, 'Netherlands', 'NL', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:50:42'),
(36, 'Irish', 'ga', 107, 'Ireland', 'IE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:51:16'),
(37, 'Scots/Gaelic', 'gd', 238, 'United Kingdom', 'GB', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:52:01'),
(38, 'Galician', 'gl', 212, 'Spain', 'ES', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:52:34'),
(39, 'Guarani', 'gn', 27, 'Bolivia', 'BO', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:53:21'),
(40, 'Gujarati', 'gu', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:53:35'),
(41, 'Hausa', 'ha', 163, 'Niger', 'NE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:54:09'),
(42, 'Hindi', 'hi', 103, 'India', 'IN', NULL, '1', NULL, '2023-09-12 16:31:17', '2023-09-15 05:12:01'),
(43, 'Croatian', 'hr', 56, 'Croatia', 'HR', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:54:52'),
(44, 'Hungarian', 'hu', 101, 'Hungary', 'HU', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:55:21'),
(45, 'Armenian', 'hy', 12, 'Armenia', 'AM', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 06:55:58'),
(46, 'Interlingua', 'ia', 72, 'Falkland Islands (Malvinas)', 'FK', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:21:33'),
(47, 'Interlingue', 'ie', 65, 'Ecuador', 'EC', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:23:11'),
(48, 'Inupiak', 'ik', 239, 'United States', 'US', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 13:05:42'),
(49, 'Indonesian', 'in', 104, 'Indonesia', 'ID', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 12:57:14'),
(50, 'Icelandic', 'is', 102, 'Iceland', 'IS', NULL, '1', NULL, '2023-09-12 16:31:17', '2023-09-15 13:21:10'),
(51, 'Italian', 'it', 110, 'Italy', 'IT', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:26:13'),
(52, 'Hebrew', 'iw', 109, 'Israel', 'IL', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:26:42'),
(53, 'Japanese', 'ja', 112, 'Japan', 'JP', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:27:03'),
(54, 'Yiddish', 'ji', 218, 'Sweden', 'SE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:27:58'),
(55, 'Javanese', 'jw', 104, 'Indonesia', 'ID', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:28:36'),
(56, 'Georgian', 'ka', 82, 'Georgia', 'GE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:29:10'),
(57, 'Kazakh', 'kk', 115, 'Kazakhstan', 'KZ', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:29:44'),
(58, 'Greenlandic', 'kl', 87, 'Greenland', 'GL', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 12:58:18'),
(59, 'Cambodian', 'km', 253, 'Kambodiya', 'KH', NULL, '1', '0', '2023-09-12 16:31:17', '2023-09-15 13:07:52'),
(60, 'Kannada', 'kn', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:30:37'),
(61, 'Korean', 'ko', 119, 'Korea, Republic of', 'KR', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:31:33'),
(62, 'Kashmiri', 'ks', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:32:15'),
(63, 'Kurdish', 'ku', 106, 'Iraq', 'IQ', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:32:54'),
(64, 'Kirghiz', 'ky', 115, 'Kazakhstan', 'KZ', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 13:26:40'),
(65, 'Latin', 'la', 243, 'Vanuatu', 'VU', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:33:55'),
(66, 'Lingala', 'ln', 51, 'Congo', 'CG', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:57:08'),
(67, 'Laothian', 'lo', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(68, 'Lithuanian', 'lt', 130, 'Lithuania', 'LT', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:58:07'),
(69, 'Latvian/Lettish', 'lv', 124, 'Latvia', 'LV', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:58:44'),
(70, 'Malagasy', 'mg', 134, 'Madagascar', 'MG', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:59:16'),
(71, 'Maori', 'mi', 161, 'New Zealand', 'NZ', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 12:59:49'),
(72, 'Macedonian', 'mk', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:02:33'),
(73, 'Malayalam', 'ml', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:03:01'),
(74, 'Mongolian', 'mn', 149, 'Mongolia', 'MN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:03:36'),
(75, 'Moldavian', 'mo', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(76, 'Marathi', 'mr', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:04:19'),
(77, 'Malay', 'ms', 136, 'Malaysia', 'MY', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:15:41'),
(78, 'Maltese', 'mt', 139, 'Malta', 'MT', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:16:47'),
(79, 'Burmese', 'my', 154, 'Myanmar', 'MM', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:17:22'),
(80, 'Nauru', 'na', 156, 'Nauru', 'NR', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:18:02'),
(81, 'Nepali', 'ne', 157, 'Nepal', 'NP', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:18:25'),
(82, 'Dutch', 'nl', 22, 'Belgium', 'BE', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:19:07'),
(83, 'Norwegian', 'no', 168, 'Norway', 'NO', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:19:57'),
(84, 'Occitan', 'oc', 212, 'Spain', 'ES', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:20:55'),
(85, '(Afan)/Oromoor/Oriya', 'om', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:21:39'),
(86, 'Punjabi', 'pa', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:22:03'),
(87, 'Polish', 'pl', 179, 'Poland', 'PL', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:22:42'),
(88, 'Pashto/Pushto', 'ps', 1, 'Afghanistan', 'AF', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:23:20'),
(89, 'Portuguese', 'pt', 196, 'Sao Tome and Principe', 'ST', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:24:05'),
(90, 'Quechua', 'qu', 27, 'Bolivia', 'BO', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:24:49'),
(91, 'Rhaeto-Romance', 'rm', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(92, 'Kirundi', 'rn', 37, 'Burundi', 'BI', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:25:45'),
(93, 'Romanian', 'ro', 147, 'Moldova, Republic of', 'MD', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:26:33'),
(94, 'Russian', 'ru', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(95, 'Kinyarwanda', 'rw', 185, 'Russian Federation', 'RU', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:27:19'),
(96, 'Sanskrit', 'sa', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 07:04:02'),
(97, 'Sindhi', 'sd', 103, 'India', 'IN', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-14 13:28:11'),
(98, 'Sangro', 'sg', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(99, 'Serbo-Croatian', 'sh', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(100, 'Singhalese', 'si', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(101, 'Slovak', 'sk', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(102, 'Slovenian', 'sl', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(103, 'Samoan', 'sm', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(104, 'Shona', 'sn', 252, 'Zimbabwe', 'ZW', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 11:08:24'),
(105, 'Somali', 'so', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(106, 'Albanian', 'sq', 3, 'Albania', 'AL', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 13:06:55'),
(107, 'Serbian', 'sr', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(108, 'Siswati', 'ss', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(109, 'Sesotho', 'st', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(110, 'Sundanese', 'su', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(111, 'Swedish', 'sv', 102, 'Iceland', 'IS', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-16 09:54:38'),
(112, 'Swahili', 'sw', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(113, 'Tamil', 'ta', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(114, 'Telugu', 'te', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(115, 'Tajik', 'tg', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(116, 'Thai', 'th', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(117, 'Tigrinya', 'ti', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(118, 'Turkmen', 'tk', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(119, 'Tagalog', 'tl', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(120, 'Setswana', 'tn', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(121, 'Tonga', 'to', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(122, 'Turkish', 'tr', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(123, 'Tsonga', 'ts', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(124, 'Tatar', 'tt', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(125, 'Twi', 'tw', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(126, 'Ukrainian', 'uk', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(127, 'Urdu', 'ur', 170, 'Pakistan', 'PK', NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-15 12:45:56'),
(128, 'Uzbek', 'uz', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(129, 'Vietnamese', 'vi', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(130, 'Volapuk', 'vo', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(131, 'Wolof', 'wo', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(132, 'Xhosa', 'xh', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(133, 'Yoruba', 'yo', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:07:52'),
(134, 'Chinese', 'zh', 46, 'China', 'CN', NULL, '1', NULL, '2023-09-12 16:31:17', '2023-09-15 13:20:26'),
(135, 'Zulu', 'zu', NULL, NULL, NULL, NULL, '0', '0', '2023-09-12 16:31:17', '2023-09-13 12:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` enum('Admin','User') DEFAULT NULL COMMENT 'A => Admin, U => User',
  `order` bigint(20) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `title`, `slug`, `type`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Primary Menu', 'primary-menu', NULL, 1, '2024-01-25 06:32:13', '2024-01-25 06:46:19'),
(2, 1, 'Footer Menu', 'footer-menu', NULL, 2, '2024-01-25 06:47:41', '2024-01-25 06:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT 0,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) DEFAULT 0,
  `type` varchar(255) NOT NULL COMMENT 'Page, Link, Category, Post, Tag, Cpt',
  `title` varchar(255) NOT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `menu_target` tinyint(4) DEFAULT 0,
  `css_classes` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `order` bigint(20) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `parent_id`, `menu_id`, `item_id`, `type`, `title`, `attribute`, `link`, `menu_target`, `css_classes`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 'Page', 'Home', 'Home', NULL, 0, NULL, NULL, 0, '2024-01-25 06:32:21', '2024-01-25 06:46:19'),
(2, 0, 1, 2, 'Page', 'About Us', 'About Us', NULL, 0, NULL, NULL, 1, '2024-01-25 06:32:21', '2024-01-25 06:46:19'),
(3, 0, 1, 3, 'Page', 'Contact Us', 'Contact Us', NULL, 0, NULL, NULL, 6, '2024-01-25 06:32:21', '2024-01-25 06:46:19'),
(4, 0, 1, 0, 'Link', 'Pages', 'Pages', 'javascript:void(0);', 0, NULL, NULL, 2, '2024-01-25 06:40:36', '2024-01-25 06:46:19'),
(7, 0, 1, 0, 'Link', 'Blogs', 'Blogs', 'https://demo.w3cms.in/lemars/blog', 0, NULL, NULL, 5, '2024-01-25 06:42:27', '2024-01-25 06:46:19'),
(8, 4, 1, 6, 'Category', 'Category', 'Category', NULL, 0, NULL, NULL, 3, '2024-01-25 06:45:26', '2024-01-25 06:46:19'),
(9, 4, 1, 2, 'Tag', 'Tag', 'Tag', NULL, 0, NULL, NULL, 4, '2024-01-25 06:46:01', '2024-01-25 06:46:19'),
(10, 0, 2, 1, 'Page', 'Home', 'Home', NULL, 0, NULL, NULL, 0, '2024-01-25 06:47:50', '2024-01-25 06:47:54'),
(11, 0, 2, 2, 'Page', 'About Us', 'About Us', NULL, 0, NULL, NULL, 1, '2024-01-25 06:47:50', '2024-01-25 06:47:54'),
(12, 0, 2, 3, 'Page', 'Contact Us', 'Contact Us', NULL, 0, NULL, NULL, 2, '2024-01-25 06:47:50', '2024-01-25 06:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_06_22_115736_create_configurations_table', 1),
(7, '2021_10_21_093713_create_temp_permissions_tables', 1),
(8, '2021_10_21_093714_create_permission_tables', 1),
(9, '2021_10_23_113846_create_sessions_table', 1),
(10, '2021_11_01_070431_create_pages_table', 1),
(11, '2021_11_01_070450_create_page_metas_table', 1),
(12, '2021_11_01_070459_create_page_seos_table', 1),
(13, '2021_11_12_103141_create_blogs_table', 1),
(14, '2021_11_12_103153_create_blog_tags_table', 1),
(15, '2021_11_12_103159_create_blog_metas_table', 1),
(16, '2021_11_12_103208_create_blog_categories_table', 1),
(17, '2021_11_12_103209_create_blog_blog_categories_table', 1),
(18, '2021_11_12_103216_create_blog_blog_tags_table', 1),
(19, '2021_11_12_103305_create_blog_seos_table', 1),
(20, '2022_01_21_064821_create_menus_table', 1),
(21, '2022_01_21_064832_create_menu_items_table', 1),
(22, '2022_12_17_114134_create_contacts_table', 1),
(26, '2023_04_10_095456_create_terms_table', 1),
(27, '2023_04_10_095537_create_term_relationships_table', 1),
(28, '2023_05_04_121624_create_comments_table', 1),
(29, '2023_05_04_121624_create_comments_table', 1),
(30, '2021_07_03_1_create_notification_config_table', 2),
(31, '2021_07_03_2_create_notification_templates_table', 2),
(32, '2021_07_03_3_create_notifications_table', 2),
(33, '2021_07_03_4_create_user_notification_config_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `deny` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_config_id` bigint(20) NOT NULL,
  `notification_types` varchar(50) NOT NULL,
  `object_id` bigint(20) NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `receiver_id` bigint(20) DEFAULT NULL,
  `read` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=Unread, 1=read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_config`
--

CREATE TABLE `notification_config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `table_model` varchar(255) NOT NULL,
  `notification_types` varchar(50) DEFAULT NULL COMMENT 'Type-A 1- Email Type-B 2-Header Notification 3-Popup Notification 4-Mobile Notification',
  `placeholders` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_config`
--

INSERT INTO `notification_config` (`id`, `title`, `code`, `table_model`, `notification_types`, `placeholders`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Update Blog', 'BLOG-UB', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-29 05:50:55', '2023-06-02 00:23:42'),
(4, 'New Ticket Generation', 'SPRT-NTG', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 07:33:51', '2023-06-03 07:53:10'),
(5, 'Reply on Ticket', 'SPRT-ROT', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 07:34:49', '2023-06-03 07:53:10'),
(6, 'Like on ticket', 'SPRT-LOT', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 07:35:47', '2023-06-03 07:53:10'),
(7, 'Started ticket', 'SPRT-ST', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 07:36:27', '2023-06-03 07:53:10'),
(8, 'Ticket Status Changed', 'SPRT-TSC', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 07:58:12', '2023-06-03 07:53:10'),
(9, 'Ticket Category Changed', 'SPRT-TCC', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 07:58:58', '2023-06-03 07:53:10'),
(10, 'Assign Ticket To Other', 'SPRT-ATO', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 07:59:33', '2023-06-03 07:53:10'),
(11, 'Flagged Inappropriate', 'SPRT-FI', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 08:00:56', '2023-06-03 07:53:11'),
(12, 'Mark as Read', 'SPRT-MR', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 08:02:16', '2023-06-03 07:53:11'),
(13, 'Make Private', 'SPRT-MP', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 08:03:05', '2023-06-03 07:53:11'),
(14, 'Delete Ticket', 'SPRT-DT', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 08:03:38', '2023-06-03 07:53:11'),
(15, 'Send a Note', 'SPRT-SN', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 08:04:18', '2023-06-03 07:53:11'),
(16, 'Close Ticket', 'SPRT-CT', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 08:04:53', '2023-06-03 07:53:11'),
(17, 'Reopen Ticket', 'SPRT-RT', 'Ticket', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-30 08:05:40', '2023-06-03 07:53:11'),
(18, 'Add New Blog', 'BLOG-ANB', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 01:09:22', '2023-06-03 07:53:11'),
(19, 'Delete Blog', 'BLOG-DB', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 01:31:34', '2023-06-03 07:53:11'),
(20, 'Trash Blog', 'BLOG-TB', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 01:36:52', '2023-06-03 07:53:11'),
(21, 'Add New Blog Category', 'BLOG-ANBC', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 01:55:17', '2023-06-03 07:53:11');
INSERT INTO `notification_config` (`id`, `title`, `code`, `table_model`, `notification_types`, `placeholders`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Update Blog Category', 'BLOG-UBCT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 02:01:59', '2023-06-03 07:53:11'),
(23, 'Delete Blog Category', 'BLOG-DBC', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 03:07:08', '2023-06-03 07:53:11'),
(24, 'Add New Blog Tag', 'BLOG-ANBT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 03:55:06', '2023-06-03 07:53:11'),
(25, 'Update Blog Tag', 'BLOG-UBT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:01:26', '2023-06-03 07:53:11'),
(26, 'Delete Blog Tag', 'BLOG-DBT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:04:53', '2023-06-03 07:53:11'),
(27, 'Blog New Comment', 'BLOG-NBC', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:09:43', '2023-06-03 07:53:11'),
(28, 'Blog Comment Delete', 'BLOG-BCD', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:19:41', '2023-06-03 07:53:11'),
(29, 'Add New Page', 'PAGE-ANP', 'Page', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:25:14', '2023-06-03 07:53:11'),
(30, 'Update Page', 'PAGE-UP', 'Page', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:34:36', '2023-06-03 07:53:11'),
(31, 'Trash Page', 'PAGE-TP', 'Page', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:38:31', '2023-06-03 07:53:11'),
(32, 'Delete Page', 'PAGE-DP', 'Page', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:41:31', '2023-06-03 07:53:11'),
(33, 'Create New Post Type', 'W3CPT-CNPT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:46:36', '2023-06-03 07:53:11'),
(34, 'Update Post Type', 'W3CPT-UPT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:48:22', '2023-06-03 07:53:11'),
(35, 'Trash Post Type', 'W3CPT-TPT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:55:11', '2023-06-03 07:53:12'),
(36, 'Delete Post Type', 'W3CPT-DPT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:57:12', '2023-06-03 07:53:12'),
(37, 'Create New Taxonomy', 'W3CPT-CNT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 04:59:01', '2023-06-03 07:53:12'),
(38, 'Update Taxonomy', 'W3CPT-UT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 05:00:10', '2023-06-03 07:53:12'),
(39, 'Trash Taxonomy', 'W3CPT-TT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 05:00:51', '2023-06-03 07:53:12');
INSERT INTO `notification_config` (`id`, `title`, `code`, `table_model`, `notification_types`, `placeholders`, `status`, `created_at`, `updated_at`) VALUES
(40, 'Delete Taxonomy', 'W3CPT-DT', 'Blog', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Post type content can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n#BLOGTAGCONTENT#: Blog tag content can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-05-31 05:01:32', '2023-06-03 07:53:12'),
(41, 'Add New User', 'ADMIN-ANU', 'User', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 02:05:00', '2023-06-03 07:53:12'),
(42, 'Update User', 'ADMIN-UP', 'User', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 03:30:18', '2023-06-03 07:53:12'),
(43, 'Delete User', 'ADMIN-DU', 'User', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 03:35:32', '2023-06-03 07:53:12'),
(44, 'Update User Password', 'ADMIN-UUPASS', 'User', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 04:27:05', '2023-06-03 07:53:12'),
(45, 'Assign User Role', 'ADMIN-AUR', 'User', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 04:37:06', '2023-06-03 07:53:12'),
(46, 'Add New Role', 'ADMIN-ANR', 'Role', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 04:41:08', '2023-06-03 07:53:12'),
(47, 'Update Role', 'ADMIN-UR', 'Role', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 04:42:07', '2023-06-03 07:53:12'),
(48, 'Delete Role', 'ADMIN-DR', 'Role', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 04:42:54', '2023-06-03 07:53:12'),
(49, 'Update Blog Comment', 'BLOG-UBC', 'Comment', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 06:58:54', '2023-06-03 07:53:12'),
(50, 'Trash Blog Comment', 'BLOG-TBC', 'Role', '', '<b>User Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#FULLNAME#: Firstname can display with this placeholder.<br />\r\n#EMAIL#: Firstname can display with this placeholder.<br />\r\n#FIRSTNAME#: Firstname can display with this placeholder.<br />\r\n#LASTNAME#: Lastname can display with this placeholder.<br />\r\n#PASSWORD#: password can display with this placeholder.<br />\r\n#ROLE#: User role can display with this placeholder.<br />\r\n#PROFILE#: User profile can display with this placeholder.<br />\r\n<b>Role Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#NAME#: Firstname can display with this placeholder.<br />\r\n<b>Config Configuration </b><br />\r\n#SITETITLE#: Site title can display with this placeholder.<br />\r\n#SITELINK#: Site link can display with this placeholder.<br />\r\n#ADMINEMAIL#: Admin email can display with this placeholder.<br />\r\n#SUPPORTEMAIL#: Support email can display with this placeholder.<br />\r\n#SITEADDRESS#: Site address can display with this placeholder.<br />\r\n<b>Generate Configuration </b><br />\r\n#ACTIVATIONLINK#: Activation link can display with this placeholder.<br />\r\n#SITELOGO#: Site logo can display with this placeholder.<br />\r\n#LOGINLINK#: Login link can display with this placeholder.<br />\r\n#REGESTERLINK#: Registration link can display with this placeholder.<br />\r\n<b>Contact Configuration </b><br />\r\n#NAME#: Contact user name can display with this placeholder.<br />\r\n#EMAIL#: Contact user email can display with this placeholder.<br />\r\n#MESSAGE#: Contact user message can display with this placeholder.<br />\r\n<b>Subscribe Configuration </b><br />\r\n#USERNAME#: Subscribe user email can display with this placeholder.<br />\r\n<b>Blog Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTITLE#: Blog title can display with this placeholder.<br />\r\n#BLOGCONTENT#: Blog content can display with this placeholder.<br />\r\n#TAXONOMYTITLE#: Taxonomy title can display with this placeholder.<br />\r\n#TAXONOMYCONTENT#: Taxonomy content can display with this placeholder.<br />\r\n#POSTTYPETITLE#: Post type title can display with this placeholder.<br />\r\n#POSTTYPECONTENT#: Post type content can display with this placeholder.<br />\r\n<b>Comment Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCOMMENT#: Blog comment can display with this placeholder.<br />\r\n<b>BlogCategory Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGCATEGORYTITLE#: Blog category title can display with this placeholder.<br />\r\n#BLOGCATEGORYCONTENT#: Blog category content can display with this placeholder.<br />\r\n<b>BlogTag Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#BLOGTAGTITLE#: Blog tag title can display with this placeholder.<br />\r\n<b>Page Configuration </b><br />\r\n#USERNAME#: Username can display with this placeholder.<br />\r\n#PAGETITLE#: Page title can display with this placeholder.<br />\r\n#PAGECONTENT#: Page content can display with this placeholder.', 1, '2023-06-01 07:15:16', '2023-06-03 07:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_config_id` bigint(20) UNSIGNED NOT NULL,
  `notification_type_id` tinyint(4) NOT NULL,
  `subject` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `notification_config_id`, `notification_type_id`, `subject`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'W3CMS: Updated Blog #BLOGTITLE#', 'w3-c-m-s:-updated-blog#-b-l-o-g-t-i-t-l-e#', '<p>Blog updated by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTITLE#</h3>\r\n#BLOGCONTENT#', '2023-05-29 05:50:55', '2023-06-03 07:56:53'),
(3, 3, 2, '', '', NULL, '2023-05-29 05:50:55', '2023-05-29 05:50:55'),
(4, 3, 3, '', '', NULL, '2023-05-29 05:50:56', '2023-05-29 05:50:56'),
(5, 4, 1, 'W3itexperts Support: Ticket Comment from #SENDERNAME# [Ticket ##TICKETID#]', 'w3itexperts-support:-ticket-comment-from#-s-e-n-d-e-r-n-a-m-e#[-ticket##-t-i-c-k-e-t-i-d#]', '<p>There is a new comment on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/1#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 07:33:51', '2023-05-30 07:33:51'),
(6, 4, 2, '', '', NULL, '2023-05-30 07:33:51', '2023-05-30 07:33:51'),
(7, 4, 3, '', '', NULL, '2023-05-30 07:33:52', '2023-05-30 07:33:52'),
(8, 5, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Comment by #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-comment-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is a new comment on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/2#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 07:34:49', '2023-05-30 07:34:49'),
(9, 5, 2, '', '', NULL, '2023-05-30 07:34:50', '2023-05-30 07:34:50'),
(10, 5, 3, '', '', NULL, '2023-05-30 07:34:50', '2023-05-30 07:34:50'),
(11, 6, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Like By #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-like-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is new like on the support ticket in the <strong>#CATEGORYNAME#</strong> category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<div style=\"padding:0px 20px; border-left: 3px solid #eee; color:#888;\">\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n</div>\r\n\r\n<p><strong>Do not reply to this email!</strong> <a href=\"#TICKETLINK#\" style=\"display: block;\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 07:35:47', '2023-05-30 07:35:47'),
(12, 6, 2, '', '', NULL, '2023-05-30 07:35:47', '2023-05-30 07:35:47'),
(13, 6, 3, '', '', NULL, '2023-05-30 07:35:47', '2023-05-30 07:35:47'),
(14, 7, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Starred By #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-starred-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is starred ticket on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/4#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 07:36:27', '2023-05-30 07:36:27'),
(15, 7, 2, '', '', NULL, '2023-05-30 07:36:27', '2023-05-30 07:36:27'),
(16, 7, 3, '', '', NULL, '2023-05-30 07:36:27', '2023-05-30 07:36:27'),
(17, 8, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Status Changed By #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-status-changed-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is ticket status changed by&nbsp;#SENDERNAME#&nbsp;on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/5#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 07:58:12', '2023-05-30 07:58:12'),
(18, 8, 2, '', '', NULL, '2023-05-30 07:58:12', '2023-05-30 07:58:12'),
(19, 8, 3, '', '', NULL, '2023-05-30 07:58:12', '2023-05-30 07:58:12'),
(20, 9, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Category Changed by #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-category-changed-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is category&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;changed by #SENDERNAME# on the support ticket. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/6#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 07:58:58', '2023-05-30 07:58:58'),
(21, 9, 2, '', '', NULL, '2023-05-30 07:58:58', '2023-05-30 07:58:58'),
(22, 9, 3, '', '', NULL, '2023-05-30 07:58:58', '2023-05-30 07:58:58'),
(23, 10, 1, 'W3itexperts Support: #SENDERNAME# Assigned Ticket for #RECEIVERNAME# [Ticket ##TICKETID#]', 'w3itexperts-support:#-s-e-n-d-e-r-n-a-m-e#-assigned-ticket-for#-r-e-c-e-i-v-e-r-n-a-m-e#[-ticket##-t-i-c-k-e-t-i-d#]', '<p>There is assigned ticket to&nbsp;<b>#RECEIVERNAME#</b>&nbsp;on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/7#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 07:59:33', '2023-05-30 07:59:33'),
(24, 10, 2, '', '', NULL, '2023-05-30 07:59:33', '2023-05-30 07:59:33'),
(25, 10, 3, '', '', NULL, '2023-05-30 07:59:33', '2023-05-30 07:59:33'),
(26, 11, 1, 'W3itexperts Support: #SENDERNAME# Flagged #RECEIVERNAME# [Ticket ##TICKETID#]', 'w3itexperts-support:#-s-e-n-d-e-r-n-a-m-e#-flagged#-r-e-c-e-i-v-e-r-n-a-m-e#[-ticket##-t-i-c-k-e-t-i-d#]', '<p>#SENDERNAME# Flagged #RECEIVERNAME# [Ticket ##TICKETID#]</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/8#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 08:00:56', '2023-05-30 08:00:56'),
(27, 11, 2, '', '', NULL, '2023-05-30 08:00:56', '2023-05-30 08:00:56'),
(28, 11, 3, '', '', NULL, '2023-05-30 08:00:56', '2023-05-30 08:00:56'),
(29, 12, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Comment Read By #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-comment-read-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is comment read by&nbsp;<b>#SENDERNAME#</b>&nbsp;on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/9#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 08:02:16', '2023-05-30 08:02:16'),
(30, 12, 2, '', '', NULL, '2023-05-30 08:02:16', '2023-05-30 08:02:16'),
(31, 12, 3, '', '', NULL, '2023-05-30 08:02:16', '2023-05-30 08:02:16'),
(32, 13, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Make Private by #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-make-private-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is a ticket make private on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/10#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 08:03:05', '2023-05-30 08:03:05'),
(33, 13, 2, '', '', NULL, '2023-05-30 08:03:05', '2023-05-30 08:03:05'),
(34, 13, 3, '', '', NULL, '2023-05-30 08:03:05', '2023-05-30 08:03:05'),
(35, 14, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Deleted By #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-deleted-by#-s-e-n-d-e-r-n-a-m-e#', '<p>[Ticket ##TICKETID#] Deleted By #SENDERNAME#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/11#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 08:03:38', '2023-05-30 08:03:38'),
(36, 14, 2, '', '', NULL, '2023-05-30 08:03:38', '2023-05-30 08:03:38'),
(37, 14, 3, '', '', NULL, '2023-05-30 08:03:38', '2023-05-30 08:03:38'),
(38, 15, 1, 'W3itexperts Support: Ticket Note from #SENDERNAME# [Ticket ##TICKETID#]', 'w3itexperts-support:-ticket-note-from#-s-e-n-d-e-r-n-a-m-e#[-ticket##-t-i-c-k-e-t-i-d#]', '<p>There is a new note on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/12#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 08:04:18', '2023-05-30 08:04:18'),
(39, 15, 2, '', '', NULL, '2023-05-30 08:04:18', '2023-05-30 08:04:18'),
(40, 15, 3, '', '', NULL, '2023-05-30 08:04:18', '2023-05-30 08:04:18'),
(41, 16, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Closed by #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-closed-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is closed ticket on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/13#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 08:04:54', '2023-05-30 08:04:54'),
(42, 16, 2, '', '', NULL, '2023-05-30 08:04:54', '2023-05-30 08:04:54'),
(43, 16, 3, '', '', NULL, '2023-05-30 08:04:54', '2023-05-30 08:04:54'),
(44, 17, 1, 'W3itexperts Support: [Ticket ##TICKETID#] Reopen by #SENDERNAME#', 'w3itexperts-support:[-ticket##-t-i-c-k-e-t-i-d#]-reopen-by#-s-e-n-d-e-r-n-a-m-e#', '<p>There is reopen ticket on the support ticket in the&nbsp;<strong>#CATEGORYNAME#</strong>&nbsp;category from #SENDERNAME#. Here&#39;s what they said:</p>\r\n\r\n<p>#TICKETCOMMENT#</p>\r\n\r\n<p>#TICKETATTACHMENT#</p>\r\n\r\n<p><strong>Do not reply to this email!</strong><a href=\"https://192.168.29.205/support/admin/notifications/edit/14#TICKETLINK#\">Click here to sign in and reply to this ticket.</a></p>', '2023-05-30 08:05:40', '2023-05-30 08:05:40'),
(45, 17, 2, '', '', NULL, '2023-05-30 08:05:40', '2023-05-30 08:05:40'),
(46, 17, 3, '', '', NULL, '2023-05-30 08:05:40', '2023-05-30 08:05:40'),
(47, 18, 1, 'W3CMS: Created New Blog #BLOGTITLE#', 'w3-c-m-s:-created-new-blog#-b-l-o-g-t-i-t-l-e#', '<p>New blog created by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTITLE#</h3>\r\n\r\n<p>#BLOGCONTENT#</p>', '2023-05-31 01:09:23', '2023-05-31 05:56:54'),
(48, 18, 2, '', '', NULL, '2023-05-31 01:09:23', '2023-05-31 01:09:23'),
(49, 18, 3, '', '', NULL, '2023-05-31 01:09:23', '2023-05-31 01:09:23'),
(50, 19, 1, 'W3CMS: Deleted Blog #BLOGTITLE#', 'w3-c-m-s:-deleted-blog#-b-l-o-g-t-i-t-l-e#', '<p>Blog deleted by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTITLE#</h3>\r\n\r\n<p>#BLOGCONTENT#</p>', '2023-05-31 01:31:34', '2023-05-31 06:27:51'),
(51, 19, 2, '', '', NULL, '2023-05-31 01:31:34', '2023-05-31 01:31:34'),
(52, 19, 3, '', '', NULL, '2023-05-31 01:31:34', '2023-05-31 01:31:34'),
(53, 20, 1, 'W3CMS: Trashed Blog #BLOGTITLE#', 'w3-c-m-s:-trashed-blog#-b-l-o-g-t-i-t-l-e#', '<p>Blog trashed by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTITLE#</h3>\r\n\r\n<p>#BLOGCONTENT#</p>', '2023-05-31 01:36:52', '2023-05-31 06:27:39'),
(54, 20, 2, '', '', NULL, '2023-05-31 01:36:52', '2023-05-31 01:36:52'),
(55, 20, 3, '', '', NULL, '2023-05-31 01:36:52', '2023-05-31 01:36:52'),
(56, 21, 1, 'W3CMS: New Blog Category Added #BLOGCATEGORYTITLE#', 'w3-c-m-s:-new-blog-category-added#-b-l-o-g-c-a-t-e-g-o-r-y-t-i-t-l-e#', '<p>New blog category added by: #USERNAME#</p>\r\n\r\n<h3>#BLOGCATEGORYTITLE#</h3>\r\n\r\n<p>#BLOGCATEGORYCONTENT#</p>', '2023-05-31 01:55:18', '2023-05-31 06:26:34'),
(57, 21, 2, '', '', NULL, '2023-05-31 01:55:18', '2023-05-31 01:55:18'),
(58, 21, 3, '', '', NULL, '2023-05-31 01:55:18', '2023-05-31 01:55:18'),
(59, 22, 1, 'W3CMS: Updated Blog Category #BLOGCATEGORYTITLE#', 'w3-c-m-s:-updated-blog-category#-b-l-o-g-c-a-t-e-g-o-r-y-t-i-t-l-e#', '<p>Blog category updated by: #USERNAME#</p>\r\n\r\n<h3>#BLOGCATEGORYTITLE#</h3>\r\n\r\n<p>#BLOGCATEGORYCONTENT#</p>', '2023-05-31 02:01:59', '2023-05-31 06:23:11'),
(60, 22, 2, '', '', NULL, '2023-05-31 02:01:59', '2023-05-31 02:01:59'),
(61, 22, 3, '', '', NULL, '2023-05-31 02:01:59', '2023-05-31 02:01:59'),
(62, 23, 1, 'W3CMS: Deleted Blog Category #BLOGCATEGORYTITLE#', 'w3-c-m-s:-deleted-blog-category#-b-l-o-g-c-a-t-e-g-o-r-y-t-i-t-l-e#', '<p>Blog category deleted by: #USERNAME#</p>\r\n\r\n<h3>#BLOGCATEGORYTITLE#</h3>\r\n\r\n<p>#BLOGCATEGORYCONTENT#</p>', '2023-05-31 03:07:08', '2023-05-31 06:22:59'),
(63, 23, 2, '', '', NULL, '2023-05-31 03:07:08', '2023-05-31 03:07:08'),
(64, 23, 3, '', '', NULL, '2023-05-31 03:07:08', '2023-05-31 03:07:08'),
(65, 24, 1, 'W3CMS: New Blog Tag Added #BLOGTAGTITLE#', 'w3-c-m-s:-new-blog-tag-added#-b-l-o-g-t-a-g-t-i-t-l-e#', '<p>New blog tag added by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTAGTITLE#</h3>\r\n\r\n<p>#BLOGTAGCONTENT#</p>', '2023-05-31 03:55:06', '2023-05-31 06:21:29'),
(66, 24, 2, '', '', NULL, '2023-05-31 03:55:06', '2023-05-31 03:55:06'),
(67, 24, 3, '', '', NULL, '2023-05-31 03:55:06', '2023-05-31 03:55:06'),
(68, 25, 1, 'W3CMS: Updated Blog Tag #BLOGTAGTITLE#', 'w3-c-m-s:-updated-blog-tag#-b-l-o-g-t-a-g-t-i-t-l-e#', '<p>Blog tag updated by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTAGTITLE#</h3>\r\n\r\n<p>#BLOGTAGCONTENT#</p>', '2023-05-31 04:01:26', '2023-05-31 06:20:04'),
(69, 25, 2, '', '', NULL, '2023-05-31 04:01:26', '2023-05-31 04:01:26'),
(70, 25, 3, '', '', NULL, '2023-05-31 04:01:26', '2023-05-31 04:01:26'),
(71, 26, 1, 'W3CMS: Deleted Blog Tag #BLOGTAGTITLE#', 'w3-c-m-s:-deleted-blog-tag#-b-l-o-g-t-a-g-t-i-t-l-e#', '<p>Blog tag deleted by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTAGTITLE#</h3>\r\n\r\n<p>#BLOGTAGCONTENT#</p>', '2023-05-31 04:04:53', '2023-05-31 06:19:06'),
(72, 26, 2, '', '', NULL, '2023-05-31 04:04:53', '2023-05-31 04:04:53'),
(73, 26, 3, '', '', NULL, '2023-05-31 04:04:53', '2023-05-31 04:04:53'),
(74, 27, 1, 'W3CMS: Blog New Comment #BLOGTITLE#', 'w3-c-m-s:-blog-new-comment#-b-l-o-g-t-i-t-l-e#', '<p>Blog new comment by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTITLE#</h3>\r\n\r\n<p>#BLOGCOMMENT#</p>', '2023-05-31 04:09:44', '2023-05-31 06:16:54'),
(75, 27, 2, '', '', NULL, '2023-05-31 04:09:44', '2023-05-31 04:09:44'),
(76, 27, 3, '', '', NULL, '2023-05-31 04:09:44', '2023-05-31 04:09:44'),
(77, 28, 1, 'W3CMS: Deleted Blog Comment #BLOGTITLE#', 'w3-c-m-s:-deleted-blog-comment#-b-l-o-g-t-i-t-l-e#', '<p>Blog comment deleted by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTITLE#</h3>\r\n\r\n<p>#BLOGCOMMENT#</p>', '2023-05-31 04:19:41', '2023-05-31 06:16:20'),
(78, 28, 2, '', '', NULL, '2023-05-31 04:19:41', '2023-05-31 04:19:41'),
(79, 28, 3, '', '', NULL, '2023-05-31 04:19:41', '2023-05-31 04:19:41'),
(80, 29, 1, 'W3CMS: Added New Page #PAGETITLE#', 'w3-c-m-s:-added-new-page#-p-a-g-e-t-i-t-l-e#', '<p>New page added by: #USERNAME#</p>\r\n\r\n<h3>#PAGETITLE#</h3>\r\n\r\n<p>#PAGECONTENT#</p>', '2023-05-31 04:25:14', '2023-05-31 06:10:04'),
(81, 29, 2, '', '', NULL, '2023-05-31 04:25:14', '2023-05-31 04:25:14'),
(82, 29, 3, '', '', NULL, '2023-05-31 04:25:14', '2023-05-31 04:25:14'),
(83, 30, 1, 'W3CMS: Updated Page #PAGETITLE#', 'w3-c-m-s:-updated-page#-p-a-g-e-t-i-t-l-e#', '<p>Page updated by: #USERNAME#</p>\r\n\r\n<h3>#PAGETITLE#</h3>', '2023-05-31 04:34:36', '2023-06-03 07:57:19'),
(84, 30, 2, '', '', NULL, '2023-05-31 04:34:36', '2023-05-31 04:34:36'),
(85, 30, 3, '', '', NULL, '2023-05-31 04:34:36', '2023-05-31 04:34:36'),
(86, 31, 1, 'W3CMS: Trashed Page #PAGETITLE#', 'w3-c-m-s:-trashed-page#-p-a-g-e-t-i-t-l-e#', '<p>Page trashed by: #USERNAME#</p>\r\n\r\n<h3>#PAGETITLE#</h3>\r\n\r\n<p>#PAGECONTENT#</p>', '2023-05-31 04:38:31', '2023-05-31 06:08:58'),
(87, 31, 2, '', '', NULL, '2023-05-31 04:38:31', '2023-05-31 04:38:31'),
(88, 31, 3, '', '', NULL, '2023-05-31 04:38:32', '2023-05-31 04:38:32'),
(89, 32, 1, 'W3CMS: Deleted Page #PAGETITLE#', 'w3-c-m-s:-deleted-page#-p-a-g-e-t-i-t-l-e#', '<p>Page deleted by: #USERNAME#</p>\r\n\r\n<h3>#PAGETITLE#</h3>\r\n\r\n<p>#PAGECONTENT#</p>', '2023-05-31 04:41:31', '2023-05-31 06:07:57'),
(90, 32, 2, '', '', NULL, '2023-05-31 04:41:31', '2023-05-31 04:41:31'),
(91, 32, 3, '', '', NULL, '2023-05-31 04:41:31', '2023-05-31 04:41:31'),
(92, 33, 1, 'W3CMS: Created New Post Type #POSTTYPETITLE#', 'w3-c-m-s:-created-new-post-type#-p-o-s-t-t-y-p-e-t-i-t-l-e#', '<p>New post type created by: #USERNAME#</p>\r\n\r\n<h3>#POSTTYPETITLE#</h3>\r\n\r\n<p>#POSTTYPECOMMENT#</p>', '2023-05-31 04:46:36', '2023-05-31 06:06:21'),
(93, 33, 2, '', '', NULL, '2023-05-31 04:46:36', '2023-05-31 04:46:36'),
(94, 33, 3, '', '', NULL, '2023-05-31 04:46:36', '2023-05-31 04:46:36'),
(95, 34, 1, 'W3CMS: Updated Post Type #POSTTYPETITLE#', 'w3-c-m-s:-updated-post-type#-p-o-s-t-t-y-p-e-t-i-t-l-e#', '<p>Post type updated by: #USERNAME#</p>\r\n\r\n<h3>#POSTTYPETITLE#</h3>\r\n\r\n<p>#POSTTYPECOMMENT#</p>', '2023-05-31 04:48:22', '2023-05-31 06:06:06'),
(96, 34, 2, '', '', NULL, '2023-05-31 04:48:22', '2023-05-31 04:48:22'),
(97, 34, 3, '', '', NULL, '2023-05-31 04:48:22', '2023-05-31 04:48:22'),
(98, 35, 1, 'W3CMS: Trashed Post Type #POSTTYPETITLE#', 'w3-c-m-s:-trashed-post-type#-p-o-s-t-t-y-p-e-t-i-t-l-e#', '<p>Post type trashed by: #USERNAME#</p>\r\n\r\n<h3>#POSTTYPETITLE#</h3>\r\n\r\n<p>#POSTTYPECONTENT#</p>', '2023-05-31 04:55:11', '2023-05-31 04:55:11'),
(99, 35, 2, '', '', NULL, '2023-05-31 04:55:11', '2023-05-31 04:55:11'),
(100, 35, 3, '', '', NULL, '2023-05-31 04:55:11', '2023-05-31 04:55:11'),
(101, 36, 1, 'W3CMS: Deleted Post Type #POSTTYPETITLE#', 'w3-c-m-s:-deleted-post-type#-p-o-s-t-t-y-p-e-t-i-t-l-e#', '<p>Post type deleted by: #USERNAME#</p>\r\n\r\n<h3>#POSTTYPETITLE#</h3>\r\n\r\n<p>#POSTTYPECONTENT#</p>', '2023-05-31 04:57:12', '2023-05-31 04:57:12'),
(102, 36, 2, '', '', NULL, '2023-05-31 04:57:12', '2023-05-31 04:57:12'),
(103, 36, 3, '', '', NULL, '2023-05-31 04:57:12', '2023-05-31 04:57:12'),
(104, 37, 1, 'W3CMS: Created New Taxonomy #TAXONOMYTITLE#', 'w3-c-m-s:-created-new-taxonomy#-t-a-x-o-n-o-m-y-t-i-t-l-e#', '<p>Taxonomy created by: #USERNAME#</p>\r\n\r\n<h3>#TAXONOMYTITLE#</h3>\r\n\r\n<p>#TAXONOMYCONTENT#</p>', '2023-05-31 04:59:01', '2023-05-31 04:59:01'),
(105, 37, 2, '', '', NULL, '2023-05-31 04:59:01', '2023-05-31 04:59:01'),
(106, 37, 3, '', '', NULL, '2023-05-31 04:59:01', '2023-05-31 04:59:01'),
(107, 38, 1, 'W3CMS: Updated Taxonomy #TAXONOMYTITLE#', 'w3-c-m-s:-updated-taxonomy#-t-a-x-o-n-o-m-y-t-i-t-l-e#', '<p>Taxonomy updated by: #USERNAME#</p>\r\n\r\n<h3>#TAXONOMYTITLE#</h3>\r\n\r\n<p>#TAXONOMYCONTENT#</p>', '2023-05-31 05:00:10', '2023-05-31 06:02:14'),
(108, 38, 2, '', '', NULL, '2023-05-31 05:00:10', '2023-05-31 05:00:10'),
(109, 38, 3, '', '', NULL, '2023-05-31 05:00:10', '2023-05-31 05:00:10'),
(110, 39, 1, 'W3CMS: Trashed Taxonomy #TAXONOMYTITLE#', 'w3-c-m-s:-trashed-taxonomy#-t-a-x-o-n-o-m-y-t-i-t-l-e#', '<p>Taxonomy trashed by: #USERNAME#</p>\r\n\r\n<h3>#TAXONOMYTITLE#</h3>\r\n\r\n<p>#TAXONOMYCONTENT#</p>', '2023-05-31 05:00:51', '2023-05-31 05:00:51'),
(111, 39, 2, '', '', NULL, '2023-05-31 05:00:51', '2023-05-31 05:00:51'),
(112, 39, 3, '', '', NULL, '2023-05-31 05:00:51', '2023-05-31 05:00:51'),
(113, 40, 1, 'W3CMS: Deleted Taxonomy #TAXONOMYTITLE#', 'w3-c-m-s:-deleted-taxonomy#-t-a-x-o-n-o-m-y-t-i-t-l-e#', '<p>Taxonomy deleted by: #USERNAME#</p>\r\n\r\n<h3>#TAXONOMYTITLE#</h3>\r\n\r\n<p>#TAXONOMYCONTENT#</p>', '2023-05-31 05:01:32', '2023-05-31 05:01:32'),
(114, 40, 2, '', '', NULL, '2023-05-31 05:01:32', '2023-05-31 05:01:32'),
(115, 40, 3, '', '', NULL, '2023-05-31 05:01:32', '2023-05-31 05:01:32'),
(116, 41, 1, 'W3CMS: Added New User #FULLNAME#', 'w3-c-m-s:-added-new-user#-f-u-l-l-n-a-m-e#', '<p>New user created by: #USERNAME#</p>\r\n\r\n<p>#PROFILE#<br />\r\nName: #FULLNAME#<br />\r\nEmail: #EMAIL#<br />\r\nUser Role: #ROLE#</p>', '2023-06-01 02:05:00', '2023-06-01 06:24:56'),
(117, 41, 2, '', '', NULL, '2023-06-01 02:05:00', '2023-06-01 02:05:00'),
(118, 41, 3, '', '', NULL, '2023-06-01 02:05:00', '2023-06-01 02:05:00'),
(119, 42, 1, 'W3CMS: Updated User #FULLNAME#', 'w3-c-m-s:-updated-user#-f-u-l-l-n-a-m-e#', '<p>User updated by: #USERNAME#</p>\r\n\r\n<p>#PROFILE#<br />\r\nName: #FULLNAME#<br />\r\nEmail: #EMAIL#</p>', '2023-06-01 03:30:18', '2023-06-01 06:17:26'),
(120, 42, 2, '', '', NULL, '2023-06-01 03:30:18', '2023-06-01 03:30:18'),
(121, 42, 3, '', '', NULL, '2023-06-01 03:30:18', '2023-06-01 03:30:18'),
(122, 43, 1, 'W3CMS: Deleted User', 'w3-c-m-s:-deleted-user', '<p>User deleted by: #USERNAME#</p>\r\n\r\n<p>#PROFILE#<br />\r\nName: #FULLNAME#<br />\r\nEmail: #EMAIL#<br />\r\nUser Role: #ROLE#</p>', '2023-06-01 03:35:32', '2023-06-01 06:20:32'),
(123, 43, 2, '', '', NULL, '2023-06-01 03:35:32', '2023-06-01 03:35:32'),
(124, 43, 3, '', '', NULL, '2023-06-01 03:35:32', '2023-06-01 03:35:32'),
(125, 44, 1, 'W3CMS: Updated User Password', 'w3-c-m-s:-updated-user-password', '<p>User password Updated by: #USERNAME#</p>\r\n#PROFILE#<br />\r\nName: #FULLNAME#<br />\r\nEmail: #EMAIL#', '2023-06-01 04:27:06', '2023-06-01 06:34:03'),
(126, 44, 2, '', '', NULL, '2023-06-01 04:27:06', '2023-06-01 04:27:06'),
(127, 44, 3, '', '', NULL, '2023-06-01 04:27:06', '2023-06-01 04:27:06'),
(128, 45, 1, 'W3CMS: Role Assigned To User #FULLNAME#', 'w3-c-m-s:-role-assigned-to-user#-f-u-l-l-n-a-m-e#', '<p>Role assigned by: #USERNAME#</p>\r\n\r\n<p>Name: #FULLNAME#<br />\r\nEmail: #EMAIL#<br />\r\nUser Role: #ROLE#</p>', '2023-06-01 04:37:06', '2023-06-01 06:17:54'),
(129, 45, 2, '', '', NULL, '2023-06-01 04:37:07', '2023-06-01 04:37:07'),
(130, 45, 3, '', '', NULL, '2023-06-01 04:37:07', '2023-06-01 04:37:07'),
(131, 46, 1, 'W3CMS: Created New Role', 'w3-c-m-s:-created-new-role', '<p>Role created by: #USERNAME#</p>\r\n\r\n<p>Role Name: #NAME#</p>', '2023-06-01 04:41:08', '2023-06-01 04:42:10'),
(132, 46, 2, '', '', NULL, '2023-06-01 04:41:08', '2023-06-01 04:41:08'),
(133, 46, 3, '', '', NULL, '2023-06-01 04:41:08', '2023-06-01 04:41:08'),
(134, 47, 1, 'W3CMS: Updated Role', 'w3-c-m-s:-updated-role', '<p>Role updated by: #USERNAME#</p>\r\n\r\n<p>Role Name: #NAME#</p>', '2023-06-01 04:42:07', '2023-06-01 04:42:07'),
(135, 47, 2, '', '', NULL, '2023-06-01 04:42:08', '2023-06-01 04:42:08'),
(136, 47, 3, '', '', NULL, '2023-06-01 04:42:08', '2023-06-01 04:42:08'),
(137, 48, 1, 'W3CMS: Deleted Role', 'w3-c-m-s:-deleted-role', '<p>Role deleted by: #USERNAME#</p>\r\n\r\n<p>Role Name: #NAME#</p>', '2023-06-01 04:42:54', '2023-06-01 04:42:54'),
(138, 48, 2, '', '', NULL, '2023-06-01 04:42:54', '2023-06-01 04:42:54'),
(139, 48, 3, '', '', NULL, '2023-06-01 04:42:54', '2023-06-01 04:42:54'),
(140, 49, 1, 'W3CMS: Updated Blog Comment #BLOGTITLE#', 'w3-c-m-s:-updated-blog-comment#-b-l-o-g-t-i-t-l-e#', '<p>Blog comment updated by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTITLE#</h3>', '2023-06-01 06:58:54', '2023-06-03 07:55:19'),
(141, 49, 2, '', '', NULL, '2023-06-01 06:58:54', '2023-06-01 06:58:54'),
(142, 49, 3, '', '', NULL, '2023-06-01 06:58:54', '2023-06-01 06:58:54'),
(143, 50, 1, 'W3CMS: Trashed Blog Comment #BLOGTITLE#', 'w3-c-m-s:-trashed-blog-comment#-b-l-o-g-t-i-t-l-e#', '<p>Blog comment trashed by: #USERNAME#</p>\r\n\r\n<h3>#BLOGTITLE#</h3>\r\n\r\n<p>#BLOGCOMMENT#</p>', '2023-06-01 07:15:16', '2023-06-01 07:15:16'),
(144, 50, 2, '', '', NULL, '2023-06-01 07:15:16', '2023-06-01 07:15:16'),
(145, 50, 3, '', '', NULL, '2023-06-01 07:15:16', '2023-06-01 07:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `page_type` enum('Page','Widget') DEFAULT NULL,
  `content` text DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `comment` tinyint(4) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => Published, 2 => Draft, 3 => Trash, 4 => Private, 5 => Pending',
  `visibility` enum('Pu','PP','Pr') NOT NULL COMMENT 'Pu => Public, PP => Password Protected, Pr => Private',
  `publish_on` datetime DEFAULT NULL,
  `order` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `user_id`, `title`, `slug`, `page_type`, `content`, `excerpt`, `comment`, `password`, `status`, `visibility`, `publish_on`, `order`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Home', 'home', NULL, '[lemars_slider_banner_1&lt;%ME-EL%&gt;image=&quot;lemars_page_pic1.jpg&quot;&lt;%ME-EL%&gt;post_category_ids=&quot;nature,place,sports,beauty,lifestyle&quot;&lt;%ME-EL%&gt;no_of_posts=&quot;5&quot;&lt;%ME-EL%&gt;orderby=&quot;title&quot;&lt;%ME-EL%&gt;order=&quot;ASC&quot;&lt;%ME-EL%&gt;grabCursor=&quot;true&quot;&lt;%ME-EL%&gt;space_between=&quot;30&quot;&lt;%ME-EL%&gt;keyboard_control=&quot;true&quot;&lt;%ME-EL%&gt;auto_play=&quot;true&quot;&lt;%ME-EL%&gt;autoplay_delay=&quot;1500&quot;&lt;%ME-EL%&gt;loop=&quot;true&quot;&lt;%ME-EL%&gt;speed=&quot;1500&quot;]&lt;%ME%&gt;[lemars_post_listing_2&lt;%ME-EL%&gt;post_category_ids=&quot;nature,place&quot;&lt;%ME-EL%&gt;post_with_images=&quot;true&quot;&lt;%ME-EL%&gt;no_of_posts=&quot;4&quot;&lt;%ME-EL%&gt;orderby=&quot;title&quot;&lt;%ME-EL%&gt;order=&quot;ASC&quot;&lt;%ME-EL%&gt;page_id=&quot;about-us&quot;]&lt;%ME%&gt;[lemars_post_listing_1&lt;%ME-EL%&gt;post_category_ids=&quot;nature,place&quot;&lt;%ME-EL%&gt;post_with_images=&quot;true&quot;&lt;%ME-EL%&gt;pagination=&quot;true&quot;&lt;%ME-EL%&gt;no_of_posts=&quot;5&quot;&lt;%ME-EL%&gt;orderby=&quot;title&quot;&lt;%ME-EL%&gt;order=&quot;ASC&quot;&lt;%ME-EL%&gt;view_all=&quot;true&quot;&lt;%ME-EL%&gt;page_id=&quot;about-us&quot;]&lt;%ME%&gt;[lemars_subscription_box_1&lt;%ME-EL%&gt;title=&quot;Subscribe to My Blog&quot;&lt;%ME-EL%&gt;image=&quot;lemars_page_pic2.png&quot;]', NULL, 0, NULL, 1, 'Pu', '2024-01-24 00:00:00', NULL, '2024-01-24 11:38:59', '2024-01-31 09:17:00'),
(2, NULL, 1, 'About Us', 'about-us', NULL, '[lemars_content_box_1&lt;%ME-EL%&gt;title=&quot;About Me&quot;&lt;%ME-EL%&gt;image=&quot;lemars_page_pic3.jpg&quot;&lt;%ME-EL%&gt;content1=&quot;Lorem ipsum dolor sit amet, consectetur adipisci elit. Nam imperdiet, orci sed volutpat tempor, nisl massa ullamcorper tortor, vitae vestibulu neque lacus em. Donec nisl purus, euismod vitae risu non, accumsan mollis urna. In consectetur ante, et interdum tortor. Aenean tristiquee dui vel semper.&quot;&lt;%ME-EL%&gt;content2=&quot;Lorem ipsum dolor sit amet, consectetur adipisci elit. Nam imperdiet, orci sed volutpat tempor, nisl massa ullamcorper tortor, vitae vestibulu neque lacus em. Donec nisl purus, euismod vitae risu non, accumsan mollis urna. In consectetur ante, et interdum tortor. Aenean tristiquee dui vel semper.&quot;&lt;%ME-EL%&gt;facebook_link=&quot;https://www.facebook.com/&quot;&lt;%ME-EL%&gt;instagram_link=&quot;https://www.instagram.com/&quot;&lt;%ME-EL%&gt;twitter_link=&quot;https://twitter.com/&quot;&lt;%ME-EL%&gt;whatsapp_link=&quot;https://www.whatsapp.com/&quot;]&lt;%ME%&gt;[lemars_subscription_box_1&lt;%ME-EL%&gt;title=&quot;Subscribe to My Blog&quot;&lt;%ME-EL%&gt;image=&quot;lemars_page_pic4.png&quot;]', NULL, 0, NULL, 1, 'Pu', '2024-01-24 00:00:00', NULL, '2024-01-24 13:25:01', '2024-01-24 13:28:10'),
(3, NULL, 1, 'Contact Us', 'contact-us', NULL, '[lemars_contact_us_form_1&lt;%ME-EL%&gt;title=&quot;Contact Me&quot;&lt;%ME-EL%&gt;show_image=&quot;true&quot;&lt;%ME-EL%&gt;image=&quot;lemars_page_pic5.jpg&quot;&lt;%ME-EL%&gt;address=&quot;New York, USA&quot;&lt;%ME-EL%&gt;email=&quot;writeme@lamars.com&quot;&lt;%ME-EL%&gt;phone=&quot;(001) 222-3344&quot;&lt;%ME-EL%&gt;grouped=&quot;{%22icon%22:%22facebook%22,%22social_link%22:%22#%22}&quot;&lt;%ME-EL%&gt;grouped=&quot;{%22icon%22:%22instagram%22,%22social_link%22:%22#%22}&quot;&lt;%ME-EL%&gt;grouped=&quot;{%22icon%22:%22linkedin%22,%22social_link%22:%22#%22}&quot;&lt;%ME-EL%&gt;grouped=&quot;{%22icon%22:%22google%22,%22social_link%22:%22#%22}&quot;]&lt;%ME%&gt;[lemars_subscription_box_1&lt;%ME-EL%&gt;title=&quot;Subscribe to My Blog&quot;&lt;%ME-EL%&gt;image=&quot;lemars_page_pic6.png&quot;]', NULL, 0, NULL, 1, 'Pu', '2024-01-24 00:00:00', NULL, '2024-01-24 13:34:30', '2024-01-31 10:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `page_metas`
--

CREATE TABLE `page_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_metas`
--

INSERT INTO `page_metas` (`id`, `page_id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(5, 2, 'ximage', NULL, '2024-01-24 13:28:10', '2024-01-24 13:28:10'),
(14, 1, 'ximage', NULL, '2024-01-31 09:17:00', '2024-01-31 09:17:00'),
(15, 3, 'ximage', NULL, '2024-01-31 10:00:56', '2024-01-31 10:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `page_seos`
--

CREATE TABLE `page_seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_descriptions` text DEFAULT NULL,
  `content_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_seos`
--

INSERT INTO `page_seos` (`id`, `page_id`, `page_title`, `meta_keywords`, `meta_descriptions`, `content_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', 'Home', 'Home', NULL, '2024-01-24 11:38:59', '2024-01-31 09:17:00'),
(2, 2, NULL, NULL, NULL, NULL, '2024-01-24 13:25:01', '2024-01-24 13:28:10'),
(3, 3, NULL, NULL, NULL, NULL, '2024-01-24 13:34:30', '2024-01-31 10:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `temp_permission_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `action` text NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `type` enum('pre-define','user-define') NOT NULL DEFAULT 'user-define',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `temp_permission_id`, `name`, `action`, `guard_name`, `type`, `created_at`, `updated_at`) VALUES
(1, 4, 'Controllers > PermissionsController > index', 'Controllers/PermissionsController@index', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(2, 5, 'Controllers > PermissionsController > roles_permissions', 'Controllers/PermissionsController@roles_permissions', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(3, 6, 'Controllers > PermissionsController > role_permissions', 'Controllers/PermissionsController@role_permissions', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(4, 7, 'Controllers > PermissionsController > user_permissions', 'Controllers/PermissionsController@user_permissions', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(5, 8, 'Controllers > PermissionsController > manage_user_permissions', 'Controllers/PermissionsController@manage_user_permissions', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(6, 9, 'Controllers > PermissionsController > sync', 'Controllers/PermissionsController@sync', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(7, 10, 'Controllers > PermissionsController > manage_role_all_permissions', 'Controllers/PermissionsController@manage_role_all_permissions', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(8, 11, 'Controllers > PermissionsController > manage_role_permission', 'Controllers/PermissionsController@manage_role_permission', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(9, 12, 'Controllers > PermissionsController > manage_user_permission', 'Controllers/PermissionsController@manage_user_permission', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(10, 13, 'Controllers > PermissionsController > delete_user_permission', 'Controllers/PermissionsController@delete_user_permission', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(11, 14, 'Controllers > PermissionsController > remove_user_all_permission', 'Controllers/PermissionsController@remove_user_all_permission', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(12, 15, 'Controllers > PermissionsController > temp_permissions', 'Controllers/PermissionsController@temp_permissions', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(13, 16, 'Controllers > PermissionsController > generate_permissions', 'Controllers/PermissionsController@generate_permissions', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(14, 17, 'Controllers > PermissionsController > add_to_permissions', 'Controllers/PermissionsController@add_to_permissions', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(15, 18, 'Controllers > PermissionsController > permission_by_action', 'Controllers/PermissionsController@permission_by_action', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(16, 19, 'Controllers > PermissionsController > get_users_by_role', 'Controllers/PermissionsController@get_users_by_role', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(17, 20, 'Controllers > PermissionsController > get_permission_by_user', 'Controllers/PermissionsController@get_permission_by_user', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(18, 22, 'Controllers > UsersController > dashboard', 'Controllers/UsersController@dashboard', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(19, 23, 'Controllers > UsersController > index', 'Controllers/UsersController@index', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(20, 24, 'Controllers > UsersController > create', 'Controllers/UsersController@create', 'web', 'user-define', '2022-12-13 07:20:56', '2022-12-13 07:20:56'),
(21, 25, 'Controllers > UsersController > store', 'Controllers/UsersController@store', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(22, 26, 'Controllers > UsersController > edit', 'Controllers/UsersController@edit', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(23, 27, 'Controllers > UsersController > update', 'Controllers/UsersController@update', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(24, 28, 'Controllers > UsersController > destroy', 'Controllers/UsersController@destroy', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(25, 29, 'Controllers > UsersController > update_password', 'Controllers/UsersController@update_password', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(26, 30, 'Controllers > UsersController > update_user_roles', 'Controllers/UsersController@update_user_roles', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(27, 31, 'Controllers > UsersController > profile', 'Controllers/UsersController@profile', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(28, 33, 'Controllers > RolesController > index', 'Controllers/RolesController@index', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(29, 34, 'Controllers > RolesController > create', 'Controllers/RolesController@create', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(30, 35, 'Controllers > RolesController > store', 'Controllers/RolesController@store', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(31, 36, 'Controllers > RolesController > edit', 'Controllers/RolesController@edit', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(32, 37, 'Controllers > RolesController > update', 'Controllers/RolesController@update', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(33, 38, 'Controllers > RolesController > destroy', 'Controllers/RolesController@destroy', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(34, 40, 'Controllers > BlogsController > admin_index', 'Controllers/BlogsController@admin_index', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(35, 41, 'Controllers > BlogsController > admin_create', 'Controllers/BlogsController@admin_create', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(36, 42, 'Controllers > BlogsController > admin_store', 'Controllers/BlogsController@admin_store', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(37, 43, 'Controllers > BlogsController > admin_edit', 'Controllers/BlogsController@admin_edit', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(38, 44, 'Controllers > BlogsController > admin_update', 'Controllers/BlogsController@admin_update', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(39, 45, 'Controllers > BlogsController > admin_destroy', 'Controllers/BlogsController@admin_destroy', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(40, 46, 'Controllers > BlogsController > admin_trash_status', 'Controllers/BlogsController@admin_trash_status', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(41, 47, 'Controllers > BlogsController > remove_feature_image', 'Controllers/BlogsController@remove_feature_image', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(42, 49, 'Controllers > BlogCategoriesController > list', 'Controllers/BlogCategoriesController@list', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(43, 50, 'Controllers > BlogCategoriesController > admin_index', 'Controllers/BlogCategoriesController@admin_index', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(44, 51, 'Controllers > BlogCategoriesController > admin_create', 'Controllers/BlogCategoriesController@admin_create', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(45, 52, 'Controllers > BlogCategoriesController > admin_store', 'Controllers/BlogCategoriesController@admin_store', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(46, 53, 'Controllers > BlogCategoriesController > admin_edit', 'Controllers/BlogCategoriesController@admin_edit', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(47, 54, 'Controllers > BlogCategoriesController > admin_update', 'Controllers/BlogCategoriesController@admin_update', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(48, 55, 'Controllers > BlogCategoriesController > admin_destroy', 'Controllers/BlogCategoriesController@admin_destroy', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(49, 56, 'Controllers > BlogCategoriesController > admin_trash_status', 'Controllers/BlogCategoriesController@admin_trash_status', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(50, 57, 'Controllers > BlogCategoriesController > admin_ajax_add_category', 'Controllers/BlogCategoriesController@admin_ajax_add_category', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(51, 58, 'Controllers > BlogCategoriesController > admin_moveup', 'Controllers/BlogCategoriesController@admin_moveup', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(52, 59, 'Controllers > BlogCategoriesController > admin_movedown', 'Controllers/BlogCategoriesController@admin_movedown', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(53, 61, 'Controllers > PagesController > admin_index', 'Controllers/PagesController@admin_index', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(54, 62, 'Controllers > PagesController > admin_create', 'Controllers/PagesController@admin_create', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(55, 63, 'Controllers > PagesController > admin_store', 'Controllers/PagesController@admin_store', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(56, 64, 'Controllers > PagesController > admin_edit', 'Controllers/PagesController@admin_edit', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(57, 65, 'Controllers > PagesController > admin_update', 'Controllers/PagesController@admin_update', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(58, 66, 'Controllers > PagesController > admin_destroy', 'Controllers/PagesController@admin_destroy', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(59, 67, 'Controllers > PagesController > admin_trash_status', 'Controllers/PagesController@admin_trash_status', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(60, 68, 'Controllers > PagesController > remove_feature_image', 'Controllers/PagesController@remove_feature_image', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(61, 70, 'Controllers > MenusController > admin_index', 'Controllers/MenusController@admin_index', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(62, 71, 'Controllers > MenusController > admin_create', 'Controllers/MenusController@admin_create', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(63, 72, 'Controllers > MenusController > admin_store', 'Controllers/MenusController@admin_store', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(64, 73, 'Controllers > MenusController > admin_edit', 'Controllers/MenusController@admin_edit', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(65, 74, 'Controllers > MenusController > admin_update', 'Controllers/MenusController@admin_update', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(66, 75, 'Controllers > MenusController > admin_destroy', 'Controllers/MenusController@admin_destroy', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(67, 76, 'Controllers > MenusController > ajax_menu_item_delete', 'Controllers/MenusController@ajax_menu_item_delete', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(68, 77, 'Controllers > MenusController > admin_select_menu', 'Controllers/MenusController@admin_select_menu', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(69, 78, 'Controllers > MenusController > ajax_add_link', 'Controllers/MenusController@ajax_add_link', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(70, 79, 'Controllers > MenusController > ajax_add_page', 'Controllers/MenusController@ajax_add_page', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(71, 80, 'Controllers > MenusController > search_menus', 'Controllers/MenusController@search_menus', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(72, 82, 'Controllers > ConfigurationsController > admin_index', 'Controllers/ConfigurationsController@admin_index', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(73, 83, 'Controllers > ConfigurationsController > admin_add', 'Controllers/ConfigurationsController@admin_add', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(74, 84, 'Controllers > ConfigurationsController > admin_edit', 'Controllers/ConfigurationsController@admin_edit', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(75, 85, 'Controllers > ConfigurationsController > admin_delete', 'Controllers/ConfigurationsController@admin_delete', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(76, 86, 'Controllers > ConfigurationsController > admin_view', 'Controllers/ConfigurationsController@admin_view', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(77, 87, 'Controllers > ConfigurationsController > admin_prefix', 'Controllers/ConfigurationsController@admin_prefix', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(78, 88, 'Controllers > ConfigurationsController > admin_change_theme', 'Controllers/ConfigurationsController@admin_change_theme', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(79, 89, 'Controllers > ConfigurationsController > admin_change', 'Controllers/ConfigurationsController@admin_change', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(80, 90, 'Controllers > ConfigurationsController > admin_moveup', 'Controllers/ConfigurationsController@admin_moveup', 'web', 'user-define', '2022-12-13 07:20:57', '2022-12-13 07:20:57'),
(81, 91, 'Controllers > ConfigurationsController > admin_movedown', 'Controllers/ConfigurationsController@admin_movedown', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(82, 92, 'Controllers > ConfigurationsController > save_permalink', 'Controllers/ConfigurationsController@save_permalink', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(83, 93, 'Controllers > ConfigurationsController > upload_editor_image', 'Controllers/ConfigurationsController@upload_editor_image', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(84, 130, 'Controllers > DashboardController > dashboard', 'Controllers/DashboardController@dashboard', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(85, 132, 'Controllers > BlogTagsController > list', 'Controllers/BlogTagsController@list', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(86, 133, 'Controllers > BlogTagsController > admin_index', 'Controllers/BlogTagsController@admin_index', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(87, 134, 'Controllers > BlogTagsController > admin_create', 'Controllers/BlogTagsController@admin_create', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(88, 135, 'Controllers > BlogTagsController > admin_store', 'Controllers/BlogTagsController@admin_store', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(89, 136, 'Controllers > BlogTagsController > admin_edit', 'Controllers/BlogTagsController@admin_edit', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(90, 137, 'Controllers > BlogTagsController > admin_update', 'Controllers/BlogTagsController@admin_update', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(91, 138, 'Controllers > BlogTagsController > admin_destroy', 'Controllers/BlogTagsController@admin_destroy', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(92, 96, 'Controllers > HomeController > blogcategory', 'Controllers/HomeController@blogcategory', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(93, 97, 'Controllers > HomeController > detail', 'Controllers/HomeController@detail', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(94, 125, 'Controllers > HomeController > author', 'Controllers/HomeController@author', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(95, 126, 'Controllers > HomeController > blogtag', 'Controllers/HomeController@blogtag', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(96, 127, 'Controllers > HomeController > search', 'Controllers/HomeController@search', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(97, 128, 'Controllers > HomeController > all', 'Controllers/HomeController@all', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(98, 139, 'Controllers > HomeController > blogarchive', 'Controllers/HomeController@blogarchive', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(99, 140, 'Controllers > HomeController > blogslist', 'Controllers/HomeController@blogslist', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(100, 102, 'Installation > WelcomeController > welcome', 'Installation/WelcomeController@welcome', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(101, 104, 'Installation > EnvironmentController > environmentMenu', 'Installation/EnvironmentController@environmentMenu', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(102, 105, 'Installation > EnvironmentController > environmentWizard', 'Installation/EnvironmentController@environmentWizard', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(103, 106, 'Installation > EnvironmentController > saveWizard', 'Installation/EnvironmentController@saveWizard', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(104, 107, 'Installation > EnvironmentController > environmentClassic', 'Installation/EnvironmentController@environmentClassic', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(105, 108, 'Installation > EnvironmentController > saveClassic', 'Installation/EnvironmentController@saveClassic', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(106, 110, 'Installation > RequirementsController > requirements', 'Installation/RequirementsController@requirements', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(107, 112, 'Installation > PermissionsController > permissions', 'Installation/PermissionsController@permissions', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(108, 114, 'Installation > DatabaseController > database', 'Installation/DatabaseController@database', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(109, 116, 'Installation > AdminSetupController > admin', 'Installation/AdminSetupController@admin', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(110, 117, 'Installation > AdminSetupController > saveAdmin', 'Installation/AdminSetupController@saveAdmin', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(111, 119, 'Installation > FinalController > finish', 'Installation/FinalController@finish', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(112, 121, 'Installation > UpdateController > welcome', 'Installation/UpdateController@welcome', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(113, 122, 'Installation > UpdateController > overview', 'Installation/UpdateController@overview', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(114, 123, 'Installation > UpdateController > database', 'Installation/UpdateController@database', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(115, 124, 'Installation > UpdateController > finish', 'Installation/UpdateController@finish', 'web', 'user-define', '2022-12-13 07:20:58', '2022-12-13 07:20:58'),
(116, 141, 'Controllers > UsersController > remove_user_image', 'Controllers/UsersController@remove_user_image', 'web', 'user-define', '2022-12-23 03:48:13', '2022-12-23 03:48:13'),
(117, 142, 'Controllers > HomeController > contact', 'Controllers/HomeController@contact', 'web', 'user-define', '2022-12-23 03:48:13', '2022-12-23 03:48:13'),
(118, 143, 'Controllers > ConfigurationsController > remove_config_image', 'Controllers/ConfigurationsController@remove_config_image', 'web', 'user-define', '2023-02-11 04:32:50', '2023-02-11 04:32:50'),
(119, 144, 'Controllers > PermissionsController > manage_user_all_permission', 'Controllers/PermissionsController@manage_user_all_permission', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(120, 150, 'Controllers > BlogsController > restore_blog', 'Controllers/BlogsController@restore_blog', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(121, 151, 'Controllers > BlogsController > trash_list', 'Controllers/BlogsController@trash_list', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(122, 152, 'Controllers > PagesController > trash_list', 'Controllers/PagesController@trash_list', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(123, 153, 'Controllers > PagesController > restore_page', 'Controllers/PagesController@restore_page', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(124, 192, 'Controllers > ConfigurationsController > make_slug', 'Controllers/ConfigurationsController@make_slug', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(125, 193, 'Controllers > ConfigurationsController > upload_files', 'Controllers/ConfigurationsController@upload_files', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(126, 194, 'Controllers > ConfigurationsController > remove_file', 'Controllers/ConfigurationsController@remove_file', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(127, 195, 'Controllers > ConfigurationsController > ckeditor_uploads', 'Controllers/ConfigurationsController@ckeditor_uploads', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(128, 197, 'Controllers > ConfigurationsController > admin_reading', 'Controllers/ConfigurationsController@admin_reading', 'web', 'user-define', '2023-11-28 01:40:57', '2023-11-28 01:40:57'),
(129, 198, 'Controllers > ConfigurationsController > admin_settings', 'Controllers/ConfigurationsController@admin_settings', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(130, 199, 'Controllers > ConfigurationsController > save_config', 'Controllers/ConfigurationsController@save_config', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(131, 200, 'Controllers > ConfigurationsController > date_time_format', 'Controllers/ConfigurationsController@date_time_format', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(132, 146, 'Controllers > LanguageController > index', 'Controllers/LanguageController@index', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(133, 147, 'Controllers > LanguageController > show', 'Controllers/LanguageController@show', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(134, 148, 'Controllers > LanguageController > translate', 'Controllers/LanguageController@translate', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(135, 149, 'Controllers > LanguageController > add_language', 'Controllers/LanguageController@add_language', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(136, 155, 'Controllers > ToolsController > export', 'Controllers/ToolsController@export', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(137, 156, 'Controllers > ToolsController > import', 'Controllers/ToolsController@import', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(138, 158, 'Controllers > ThemesController > index', 'Controllers/ThemesController@index', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(139, 159, 'Controllers > ThemesController > admin_themes', 'Controllers/ThemesController@admin_themes', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(140, 160, 'Controllers > ThemesController > import_theme', 'Controllers/ThemesController@import_theme', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(141, 161, 'Controllers > ThemesController > add_theme', 'Controllers/ThemesController@add_theme', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(142, 162, 'Controllers > ThemesController > add_admin_theme', 'Controllers/ThemesController@add_admin_theme', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(143, 163, 'Controllers > ThemesController > install_theme', 'Controllers/ThemesController@install_theme', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(144, 164, 'Controllers > ThemesController > install_upload_theme', 'Controllers/ThemesController@install_upload_theme', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(145, 165, 'Controllers > ThemesController > delete', 'Controllers/ThemesController@delete', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(146, 167, 'Controllers > MagicEditorsController > admin_use_me', 'Controllers/MagicEditorsController@admin_use_me', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(147, 168, 'Controllers > MagicEditorsController > admin_edit_section', 'Controllers/MagicEditorsController@admin_edit_section', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(148, 169, 'Controllers > MagicEditorsController > admin_update_element', 'Controllers/MagicEditorsController@admin_update_element', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(149, 170, 'Controllers > MagicEditorsController > admin_remove_image', 'Controllers/MagicEditorsController@admin_remove_image', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(150, 171, 'Controllers > MagicEditorsController > get_page_content', 'Controllers/MagicEditorsController@get_page_content', 'web', 'user-define', '2023-11-28 01:40:58', '2023-11-28 01:40:58'),
(151, 172, 'Controllers > MagicEditorsController > get_all_cpt', 'Controllers/MagicEditorsController@get_all_cpt', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(152, 173, 'Controllers > MagicEditorsController > get_post_by_cpt', 'Controllers/MagicEditorsController@get_post_by_cpt', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(153, 174, 'Controllers > MagicEditorsController > get_post_taxonomy', 'Controllers/MagicEditorsController@get_post_taxonomy', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(154, 175, 'Controllers > MagicEditorsController > get_post_by_category', 'Controllers/MagicEditorsController@get_post_by_category', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(155, 176, 'Controllers > MagicEditorsController > get_cpt_categories', 'Controllers/MagicEditorsController@get_cpt_categories', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(156, 177, 'Controllers > MagicEditorsController > get_post_by_cpt_category', 'Controllers/MagicEditorsController@get_post_by_cpt_category', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(157, 178, 'Controllers > MagicEditorsController > ajax_load_more', 'Controllers/MagicEditorsController@ajax_load_more', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(158, 180, 'Controllers > NotificationsController > index', 'Controllers/NotificationsController@index', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(159, 181, 'Controllers > NotificationsController > create', 'Controllers/NotificationsController@create', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(160, 182, 'Controllers > NotificationsController > store', 'Controllers/NotificationsController@store', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(161, 183, 'Controllers > NotificationsController > edit', 'Controllers/NotificationsController@edit', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(162, 184, 'Controllers > NotificationsController > update', 'Controllers/NotificationsController@update', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(163, 185, 'Controllers > NotificationsController > destroy', 'Controllers/NotificationsController@destroy', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(164, 186, 'Controllers > NotificationsController > settings', 'Controllers/NotificationsController@settings', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(165, 187, 'Controllers > NotificationsController > notifications_config', 'Controllers/NotificationsController@notifications_config', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(166, 188, 'Controllers > NotificationsController > edit_template', 'Controllers/NotificationsController@edit_template', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(167, 189, 'Controllers > NotificationsController > edit_email_template', 'Controllers/NotificationsController@edit_email_template', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(168, 190, 'Controllers > NotificationsController > edit_web_template', 'Controllers/NotificationsController@edit_web_template', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(169, 191, 'Controllers > NotificationsController > edit_sms_template', 'Controllers/NotificationsController@edit_sms_template', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(170, 202, 'Controllers > CommentsController > admin_index', 'Controllers/CommentsController@admin_index', 'web', 'user-define', '2023-11-28 01:40:59', '2023-11-28 01:40:59'),
(171, 203, 'Controllers > CommentsController > admin_edit', 'Controllers/CommentsController@admin_edit', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(172, 204, 'Controllers > CommentsController > admin_update', 'Controllers/CommentsController@admin_update', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(173, 205, 'Controllers > CommentsController > admin_trash', 'Controllers/CommentsController@admin_trash', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(174, 206, 'Controllers > CommentsController > admin_destroy', 'Controllers/CommentsController@admin_destroy', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(175, 207, 'Controllers > CommentsController > admin_store', 'Controllers/CommentsController@admin_store', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(176, 196, 'Controllers > HomeController > themelanguage', 'Controllers/HomeController@themelanguage', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(177, 209, 'Installation > InstallationController > welcome', 'Installation/InstallationController@welcome', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(178, 210, 'Installation > InstallationController > environmentWizard', 'Installation/InstallationController@environmentWizard', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(179, 211, 'Installation > InstallationController > saveWizard', 'Installation/InstallationController@saveWizard', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(180, 212, 'Installation > InstallationController > database', 'Installation/InstallationController@database', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(181, 213, 'Installation > InstallationController > admin', 'Installation/InstallationController@admin', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(182, 214, 'Installation > InstallationController > saveAdmin', 'Installation/InstallationController@saveAdmin', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(183, 215, 'Installation > InstallationController > finish', 'Installation/InstallationController@finish', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(184, 216, 'Installation > InstallationController > requirements', 'Installation/InstallationController@requirements', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(185, 221, 'WCPT > W3CPTController > index', 'WCPT/W3CPTController@index', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(186, 222, 'WCPT > W3CPTController > save', 'WCPT/W3CPTController@save', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(187, 223, 'WCPT > W3CPTController > destroy', 'WCPT/W3CPTController@destroy', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(188, 224, 'WCPT > W3CPTController > index_taxo', 'WCPT/W3CPTController@index_taxo', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(189, 225, 'WCPT > W3CPTController > save_taxo', 'WCPT/W3CPTController@save_taxo', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(190, 226, 'WCPT > W3CPTController > destroy_taxo', 'WCPT/W3CPTController@destroy_taxo', 'web', 'user-define', '2023-11-28 01:41:00', '2023-11-28 01:41:00'),
(191, 227, 'WCPT > W3CPTController > trash_cpt', 'WCPT/W3CPTController@trash_cpt', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(192, 228, 'WCPT > W3CPTController > trash_taxo', 'WCPT/W3CPTController@trash_taxo', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(193, 229, 'WCPT > W3CPTController > trash_list', 'WCPT/W3CPTController@trash_list', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(194, 230, 'WCPT > W3CPTController > trash_taxo_list', 'WCPT/W3CPTController@trash_taxo_list', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(195, 231, 'WCPT > W3CPTController > resotre_cpt_taxo', 'WCPT/W3CPTController@resotre_cpt_taxo', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(196, 233, 'WCPT > BlogsController > admin_index', 'WCPT/BlogsController@admin_index', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(197, 234, 'WCPT > BlogsController > admin_create', 'WCPT/BlogsController@admin_create', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(198, 235, 'WCPT > BlogsController > admin_store', 'WCPT/BlogsController@admin_store', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(199, 236, 'WCPT > BlogsController > admin_edit', 'WCPT/BlogsController@admin_edit', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(200, 237, 'WCPT > BlogsController > admin_update', 'WCPT/BlogsController@admin_update', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(201, 238, 'WCPT > BlogsController > admin_destroy', 'WCPT/BlogsController@admin_destroy', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(202, 239, 'WCPT > BlogsController > admin_trash_status', 'WCPT/BlogsController@admin_trash_status', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(203, 240, 'WCPT > BlogsController > restore_blog', 'WCPT/BlogsController@restore_blog', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(204, 241, 'WCPT > BlogsController > trash_list', 'WCPT/BlogsController@trash_list', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(205, 242, 'WCPT > BlogsController > remove_feature_image', 'WCPT/BlogsController@remove_feature_image', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(206, 244, 'WCPT > BlogCategoriesController > list', 'WCPT/BlogCategoriesController@list', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(207, 245, 'WCPT > BlogCategoriesController > admin_index', 'WCPT/BlogCategoriesController@admin_index', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(208, 246, 'WCPT > BlogCategoriesController > admin_create', 'WCPT/BlogCategoriesController@admin_create', 'web', 'user-define', '2023-11-28 01:41:01', '2023-11-28 01:41:01'),
(209, 247, 'WCPT > BlogCategoriesController > admin_store', 'WCPT/BlogCategoriesController@admin_store', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(210, 248, 'WCPT > BlogCategoriesController > admin_edit', 'WCPT/BlogCategoriesController@admin_edit', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(211, 249, 'WCPT > BlogCategoriesController > admin_update', 'WCPT/BlogCategoriesController@admin_update', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(212, 250, 'WCPT > BlogCategoriesController > admin_destroy', 'WCPT/BlogCategoriesController@admin_destroy', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(213, 251, 'WCPT > BlogCategoriesController > admin_trash_status', 'WCPT/BlogCategoriesController@admin_trash_status', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(214, 252, 'WCPT > BlogCategoriesController > admin_ajax_add_category', 'WCPT/BlogCategoriesController@admin_ajax_add_category', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(215, 253, 'WCPT > BlogCategoriesController > admin_moveup', 'WCPT/BlogCategoriesController@admin_moveup', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(216, 254, 'WCPT > BlogCategoriesController > admin_movedown', 'WCPT/BlogCategoriesController@admin_movedown', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(217, 256, 'WCPT > BlogTagsController > list', 'WCPT/BlogTagsController@list', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(218, 257, 'WCPT > BlogTagsController > admin_index', 'WCPT/BlogTagsController@admin_index', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(219, 258, 'WCPT > BlogTagsController > admin_create', 'WCPT/BlogTagsController@admin_create', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(220, 259, 'WCPT > BlogTagsController > admin_store', 'WCPT/BlogTagsController@admin_store', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(221, 260, 'WCPT > BlogTagsController > admin_edit', 'WCPT/BlogTagsController@admin_edit', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(222, 261, 'WCPT > BlogTagsController > admin_update', 'WCPT/BlogTagsController@admin_update', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02'),
(223, 262, 'WCPT > BlogTagsController > admin_destroy', 'WCPT/BlogTagsController@admin_destroy', 'web', 'user-define', '2023-11-28 01:41:02', '2023-11-28 01:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `module` text DEFAULT NULL COMMENT 'for laravel plugin/modules roles',
  `level` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'to maintain hierarchy',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `module`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', NULL, 0, '2023-09-01 05:40:50', '2023-09-01 05:40:50'),
(2, 'Manager', 'web', NULL, 0, '2022-10-29 08:21:29', '2022-12-24 05:19:21'),
(3, 'Customer', 'web', NULL, 0, '2022-12-08 07:03:15', '2022-12-24 05:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(84, 2),
(84, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_permissions`
--

CREATE TABLE `temp_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `type` enum('App','Module','Controller','Action') NOT NULL DEFAULT 'App',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_permissions`
--

INSERT INTO `temp_permissions` (`id`, `parent_id`, `name`, `path`, `controller`, `action`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 'Controllers', 'App\\Http\\Controllers\\Admin\\PermissionsController@index', NULL, NULL, 'App', NULL, NULL),
(2, 1, 'Admin', 'App\\Http\\Controllers\\Admin\\PermissionsController@index', NULL, NULL, 'App', NULL, NULL),
(3, 2, 'App\\Http\\Controllers\\Admin\\PermissionsController', 'App\\Http\\Controllers\\Admin\\PermissionsController@index', 'PermissionsController', NULL, 'Controller', NULL, NULL),
(4, 3, 'index', 'App\\Http\\Controllers\\Admin\\PermissionsController@index', 'PermissionsController', 'index', 'Action', NULL, NULL),
(5, 3, 'roles_permissions', 'App\\Http\\Controllers\\Admin\\PermissionsController@roles_permissions', 'PermissionsController', 'roles_permissions', 'Action', NULL, NULL),
(6, 3, 'role_permissions', 'App\\Http\\Controllers\\Admin\\PermissionsController@role_permissions', 'PermissionsController', 'role_permissions', 'Action', NULL, NULL),
(7, 3, 'user_permissions', 'App\\Http\\Controllers\\Admin\\PermissionsController@user_permissions', 'PermissionsController', 'user_permissions', 'Action', NULL, NULL),
(8, 3, 'manage_user_permissions', 'App\\Http\\Controllers\\Admin\\PermissionsController@manage_user_permissions', 'PermissionsController', 'manage_user_permissions', 'Action', NULL, NULL),
(9, 3, 'manage_role_all_permissions', 'App\\Http\\Controllers\\Admin\\PermissionsController@manage_role_all_permissions', 'PermissionsController', 'manage_role_all_permissions', 'Action', NULL, NULL),
(10, 3, 'manage_role_permission', 'App\\Http\\Controllers\\Admin\\PermissionsController@manage_role_permission', 'PermissionsController', 'manage_role_permission', 'Action', NULL, NULL),
(11, 3, 'manage_user_permission', 'App\\Http\\Controllers\\Admin\\PermissionsController@manage_user_permission', 'PermissionsController', 'manage_user_permission', 'Action', NULL, NULL),
(12, 3, 'delete_user_permission', 'App\\Http\\Controllers\\Admin\\PermissionsController@delete_user_permission', 'PermissionsController', 'delete_user_permission', 'Action', NULL, NULL),
(13, 3, 'manage_user_all_permission', 'App\\Http\\Controllers\\Admin\\PermissionsController@manage_user_all_permission', 'PermissionsController', 'manage_user_all_permission', 'Action', NULL, NULL),
(14, 3, 'temp_permissions', 'App\\Http\\Controllers\\Admin\\PermissionsController@temp_permissions', 'PermissionsController', 'temp_permissions', 'Action', NULL, NULL),
(15, 3, 'generate_permissions', 'App\\Http\\Controllers\\Admin\\PermissionsController@generate_permissions', 'PermissionsController', 'generate_permissions', 'Action', NULL, NULL),
(16, 3, 'add_to_permissions', 'App\\Http\\Controllers\\Admin\\PermissionsController@add_to_permissions', 'PermissionsController', 'add_to_permissions', 'Action', NULL, NULL),
(17, 3, 'permission_by_action', 'App\\Http\\Controllers\\Admin\\PermissionsController@permission_by_action', 'PermissionsController', 'permission_by_action', 'Action', NULL, NULL),
(18, 3, 'get_users_by_role', 'App\\Http\\Controllers\\Admin\\PermissionsController@get_users_by_role', 'PermissionsController', 'get_users_by_role', 'Action', NULL, NULL),
(19, 3, 'get_permission_by_user', 'App\\Http\\Controllers\\Admin\\PermissionsController@get_permission_by_user', 'PermissionsController', 'get_permission_by_user', 'Action', NULL, NULL),
(20, 2, 'App\\Http\\Controllers\\Admin\\DashboardController', 'App\\Http\\Controllers\\Admin\\DashboardController@dashboard', 'DashboardController', NULL, 'Controller', NULL, NULL),
(21, 20, 'dashboard', 'App\\Http\\Controllers\\Admin\\DashboardController@dashboard', 'DashboardController', 'dashboard', 'Action', NULL, NULL),
(22, 2, 'App\\Http\\Controllers\\Admin\\UsersController', 'App\\Http\\Controllers\\Admin\\UsersController@index', 'UsersController', NULL, 'Controller', NULL, NULL),
(23, 22, 'index', 'App\\Http\\Controllers\\Admin\\UsersController@index', 'UsersController', 'index', 'Action', NULL, NULL),
(24, 22, 'create', 'App\\Http\\Controllers\\Admin\\UsersController@create', 'UsersController', 'create', 'Action', NULL, NULL),
(25, 22, 'store', 'App\\Http\\Controllers\\Admin\\UsersController@store', 'UsersController', 'store', 'Action', NULL, NULL),
(26, 22, 'edit', 'App\\Http\\Controllers\\Admin\\UsersController@edit', 'UsersController', 'edit', 'Action', NULL, NULL),
(27, 22, 'update', 'App\\Http\\Controllers\\Admin\\UsersController@update', 'UsersController', 'update', 'Action', NULL, NULL),
(28, 22, 'destroy', 'App\\Http\\Controllers\\Admin\\UsersController@destroy', 'UsersController', 'destroy', 'Action', NULL, NULL),
(29, 22, 'update_password', 'App\\Http\\Controllers\\Admin\\UsersController@update_password', 'UsersController', 'update_password', 'Action', NULL, NULL),
(30, 22, 'update_user_roles', 'App\\Http\\Controllers\\Admin\\UsersController@update_user_roles', 'UsersController', 'update_user_roles', 'Action', NULL, NULL),
(31, 22, 'profile', 'App\\Http\\Controllers\\Admin\\UsersController@profile', 'UsersController', 'profile', 'Action', NULL, NULL),
(32, 22, 'remove_user_image', 'App\\Http\\Controllers\\Admin\\UsersController@remove_user_image', 'UsersController', 'remove_user_image', 'Action', NULL, NULL),
(33, 2, 'App\\Http\\Controllers\\Admin\\RolesController', 'App\\Http\\Controllers\\Admin\\RolesController@index', 'RolesController', NULL, 'Controller', NULL, NULL),
(34, 33, 'index', 'App\\Http\\Controllers\\Admin\\RolesController@index', 'RolesController', 'index', 'Action', NULL, NULL),
(35, 33, 'create', 'App\\Http\\Controllers\\Admin\\RolesController@create', 'RolesController', 'create', 'Action', NULL, NULL),
(36, 33, 'store', 'App\\Http\\Controllers\\Admin\\RolesController@store', 'RolesController', 'store', 'Action', NULL, NULL),
(37, 33, 'edit', 'App\\Http\\Controllers\\Admin\\RolesController@edit', 'RolesController', 'edit', 'Action', NULL, NULL),
(38, 33, 'update', 'App\\Http\\Controllers\\Admin\\RolesController@update', 'RolesController', 'update', 'Action', NULL, NULL),
(39, 33, 'destroy', 'App\\Http\\Controllers\\Admin\\RolesController@destroy', 'RolesController', 'destroy', 'Action', NULL, NULL),
(40, 2, 'App\\Http\\Controllers\\Admin\\LanguageController', 'App\\Http\\Controllers\\Admin\\LanguageController@index', 'LanguageController', NULL, 'Controller', NULL, NULL),
(41, 40, 'index', 'App\\Http\\Controllers\\Admin\\LanguageController@index', 'LanguageController', 'index', 'Action', NULL, NULL),
(42, 40, 'show', 'App\\Http\\Controllers\\Admin\\LanguageController@show', 'LanguageController', 'show', 'Action', NULL, NULL),
(43, 40, 'translate', 'App\\Http\\Controllers\\Admin\\LanguageController@translate', 'LanguageController', 'translate', 'Action', NULL, NULL),
(44, 40, 'add_language', 'App\\Http\\Controllers\\Admin\\LanguageController@add_language', 'LanguageController', 'add_language', 'Action', NULL, NULL),
(45, 2, 'App\\Http\\Controllers\\Admin\\BlogsController', 'App\\Http\\Controllers\\Admin\\BlogsController@admin_index', 'BlogsController', NULL, 'Controller', NULL, NULL),
(46, 45, 'admin_index', 'App\\Http\\Controllers\\Admin\\BlogsController@admin_index', 'BlogsController', 'admin_index', 'Action', NULL, NULL),
(47, 45, 'admin_create', 'App\\Http\\Controllers\\Admin\\BlogsController@admin_create', 'BlogsController', 'admin_create', 'Action', NULL, NULL),
(48, 45, 'admin_store', 'App\\Http\\Controllers\\Admin\\BlogsController@admin_store', 'BlogsController', 'admin_store', 'Action', NULL, NULL),
(49, 45, 'admin_edit', 'App\\Http\\Controllers\\Admin\\BlogsController@admin_edit', 'BlogsController', 'admin_edit', 'Action', NULL, NULL),
(50, 45, 'admin_update', 'App\\Http\\Controllers\\Admin\\BlogsController@admin_update', 'BlogsController', 'admin_update', 'Action', NULL, NULL),
(51, 45, 'admin_destroy', 'App\\Http\\Controllers\\Admin\\BlogsController@admin_destroy', 'BlogsController', 'admin_destroy', 'Action', NULL, NULL),
(52, 45, 'admin_trash_status', 'App\\Http\\Controllers\\Admin\\BlogsController@admin_trash_status', 'BlogsController', 'admin_trash_status', 'Action', NULL, NULL),
(53, 45, 'restore_blog', 'App\\Http\\Controllers\\Admin\\BlogsController@restore_blog', 'BlogsController', 'restore_blog', 'Action', NULL, NULL),
(54, 45, 'trash_list', 'App\\Http\\Controllers\\Admin\\BlogsController@trash_list', 'BlogsController', 'trash_list', 'Action', NULL, NULL),
(55, 45, 'remove_feature_image', 'App\\Http\\Controllers\\Admin\\BlogsController@remove_feature_image', 'BlogsController', 'remove_feature_image', 'Action', NULL, NULL),
(56, 2, 'App\\Http\\Controllers\\Admin\\BlogCategoriesController', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@list', 'BlogCategoriesController', NULL, 'Controller', NULL, NULL),
(57, 56, 'list', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@list', 'BlogCategoriesController', 'list', 'Action', NULL, NULL),
(58, 56, 'admin_index', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_index', 'BlogCategoriesController', 'admin_index', 'Action', NULL, NULL),
(59, 56, 'admin_create', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_create', 'BlogCategoriesController', 'admin_create', 'Action', NULL, NULL),
(60, 56, 'admin_store', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_store', 'BlogCategoriesController', 'admin_store', 'Action', NULL, NULL),
(61, 56, 'admin_edit', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_edit', 'BlogCategoriesController', 'admin_edit', 'Action', NULL, NULL),
(62, 56, 'admin_update', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_update', 'BlogCategoriesController', 'admin_update', 'Action', NULL, NULL),
(63, 56, 'admin_destroy', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_destroy', 'BlogCategoriesController', 'admin_destroy', 'Action', NULL, NULL),
(64, 56, 'admin_trash_status', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_trash_status', 'BlogCategoriesController', 'admin_trash_status', 'Action', NULL, NULL),
(65, 56, 'admin_ajax_add_category', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_ajax_add_category', 'BlogCategoriesController', 'admin_ajax_add_category', 'Action', NULL, NULL),
(66, 56, 'admin_moveup', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_moveup', 'BlogCategoriesController', 'admin_moveup', 'Action', NULL, NULL),
(67, 56, 'admin_movedown', 'App\\Http\\Controllers\\Admin\\BlogCategoriesController@admin_movedown', 'BlogCategoriesController', 'admin_movedown', 'Action', NULL, NULL),
(68, 2, 'App\\Http\\Controllers\\Admin\\BlogTagsController', 'App\\Http\\Controllers\\Admin\\BlogTagsController@list', 'BlogTagsController', NULL, 'Controller', NULL, NULL),
(69, 68, 'list', 'App\\Http\\Controllers\\Admin\\BlogTagsController@list', 'BlogTagsController', 'list', 'Action', NULL, NULL),
(70, 68, 'admin_index', 'App\\Http\\Controllers\\Admin\\BlogTagsController@admin_index', 'BlogTagsController', 'admin_index', 'Action', NULL, NULL),
(71, 68, 'admin_create', 'App\\Http\\Controllers\\Admin\\BlogTagsController@admin_create', 'BlogTagsController', 'admin_create', 'Action', NULL, NULL),
(72, 68, 'admin_store', 'App\\Http\\Controllers\\Admin\\BlogTagsController@admin_store', 'BlogTagsController', 'admin_store', 'Action', NULL, NULL),
(73, 68, 'admin_edit', 'App\\Http\\Controllers\\Admin\\BlogTagsController@admin_edit', 'BlogTagsController', 'admin_edit', 'Action', NULL, NULL),
(74, 68, 'admin_update', 'App\\Http\\Controllers\\Admin\\BlogTagsController@admin_update', 'BlogTagsController', 'admin_update', 'Action', NULL, NULL),
(75, 68, 'admin_destroy', 'App\\Http\\Controllers\\Admin\\BlogTagsController@admin_destroy', 'BlogTagsController', 'admin_destroy', 'Action', NULL, NULL),
(76, 2, 'App\\Http\\Controllers\\Admin\\PagesController', 'App\\Http\\Controllers\\Admin\\PagesController@admin_index', 'PagesController', NULL, 'Controller', NULL, NULL),
(77, 76, 'admin_index', 'App\\Http\\Controllers\\Admin\\PagesController@admin_index', 'PagesController', 'admin_index', 'Action', NULL, NULL),
(78, 76, 'admin_create', 'App\\Http\\Controllers\\Admin\\PagesController@admin_create', 'PagesController', 'admin_create', 'Action', NULL, NULL),
(79, 76, 'admin_store', 'App\\Http\\Controllers\\Admin\\PagesController@admin_store', 'PagesController', 'admin_store', 'Action', NULL, NULL),
(80, 76, 'admin_edit', 'App\\Http\\Controllers\\Admin\\PagesController@admin_edit', 'PagesController', 'admin_edit', 'Action', NULL, NULL),
(81, 76, 'admin_update', 'App\\Http\\Controllers\\Admin\\PagesController@admin_update', 'PagesController', 'admin_update', 'Action', NULL, NULL),
(82, 76, 'admin_destroy', 'App\\Http\\Controllers\\Admin\\PagesController@admin_destroy', 'PagesController', 'admin_destroy', 'Action', NULL, NULL),
(83, 76, 'trash_list', 'App\\Http\\Controllers\\Admin\\PagesController@trash_list', 'PagesController', 'trash_list', 'Action', NULL, NULL),
(84, 76, 'restore_page', 'App\\Http\\Controllers\\Admin\\PagesController@restore_page', 'PagesController', 'restore_page', 'Action', NULL, NULL),
(85, 76, 'admin_trash_status', 'App\\Http\\Controllers\\Admin\\PagesController@admin_trash_status', 'PagesController', 'admin_trash_status', 'Action', NULL, NULL),
(86, 76, 'remove_feature_image', 'App\\Http\\Controllers\\Admin\\PagesController@remove_feature_image', 'PagesController', 'remove_feature_image', 'Action', NULL, NULL),
(87, 2, 'App\\Http\\Controllers\\Admin\\MenusController', 'App\\Http\\Controllers\\Admin\\MenusController@admin_index', 'MenusController', NULL, 'Controller', NULL, NULL),
(88, 87, 'admin_index', 'App\\Http\\Controllers\\Admin\\MenusController@admin_index', 'MenusController', 'admin_index', 'Action', NULL, NULL),
(89, 87, 'admin_create', 'App\\Http\\Controllers\\Admin\\MenusController@admin_create', 'MenusController', 'admin_create', 'Action', NULL, NULL),
(90, 87, 'admin_destroy', 'App\\Http\\Controllers\\Admin\\MenusController@admin_destroy', 'MenusController', 'admin_destroy', 'Action', NULL, NULL),
(91, 87, 'ajax_menu_item_delete', 'App\\Http\\Controllers\\Admin\\MenusController@ajax_menu_item_delete', 'MenusController', 'ajax_menu_item_delete', 'Action', NULL, NULL),
(92, 87, 'admin_select_menu', 'App\\Http\\Controllers\\Admin\\MenusController@admin_select_menu', 'MenusController', 'admin_select_menu', 'Action', NULL, NULL),
(93, 87, 'ajax_add_link', 'App\\Http\\Controllers\\Admin\\MenusController@ajax_add_link', 'MenusController', 'ajax_add_link', 'Action', NULL, NULL),
(94, 87, 'ajax_add_page', 'App\\Http\\Controllers\\Admin\\MenusController@ajax_add_page', 'MenusController', 'ajax_add_page', 'Action', NULL, NULL),
(95, 87, 'search_menus', 'App\\Http\\Controllers\\Admin\\MenusController@search_menus', 'MenusController', 'search_menus', 'Action', NULL, NULL),
(96, 2, 'App\\Http\\Controllers\\Admin\\ToolsController', 'App\\Http\\Controllers\\Admin\\ToolsController@export', 'ToolsController', NULL, 'Controller', NULL, NULL),
(97, 96, 'export', 'App\\Http\\Controllers\\Admin\\ToolsController@export', 'ToolsController', 'export', 'Action', NULL, NULL),
(98, 96, 'import', 'App\\Http\\Controllers\\Admin\\ToolsController@import', 'ToolsController', 'import', 'Action', NULL, NULL),
(99, 2, 'App\\Http\\Controllers\\Admin\\ThemesController', 'App\\Http\\Controllers\\Admin\\ThemesController@index', 'ThemesController', NULL, 'Controller', NULL, NULL),
(100, 99, 'index', 'App\\Http\\Controllers\\Admin\\ThemesController@index', 'ThemesController', 'index', 'Action', NULL, NULL),
(101, 99, 'admin_themes', 'App\\Http\\Controllers\\Admin\\ThemesController@admin_themes', 'ThemesController', 'admin_themes', 'Action', NULL, NULL),
(102, 99, 'import_theme', 'App\\Http\\Controllers\\Admin\\ThemesController@import_theme', 'ThemesController', 'import_theme', 'Action', NULL, NULL),
(103, 99, 'add_theme', 'App\\Http\\Controllers\\Admin\\ThemesController@add_theme', 'ThemesController', 'add_theme', 'Action', NULL, NULL),
(104, 99, 'add_admin_theme', 'App\\Http\\Controllers\\Admin\\ThemesController@add_admin_theme', 'ThemesController', 'add_admin_theme', 'Action', NULL, NULL),
(105, 99, 'install_theme', 'App\\Http\\Controllers\\Admin\\ThemesController@install_theme', 'ThemesController', 'install_theme', 'Action', NULL, NULL),
(106, 99, 'install_upload_theme', 'App\\Http\\Controllers\\Admin\\ThemesController@install_upload_theme', 'ThemesController', 'install_upload_theme', 'Action', NULL, NULL),
(107, 99, 'delete', 'App\\Http\\Controllers\\Admin\\ThemesController@delete', 'ThemesController', 'delete', 'Action', NULL, NULL),
(108, 2, 'App\\Http\\Controllers\\Admin\\MagicEditorsController', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@admin_use_me', 'MagicEditorsController', NULL, 'Controller', NULL, NULL),
(109, 108, 'admin_use_me', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@admin_use_me', 'MagicEditorsController', 'admin_use_me', 'Action', NULL, NULL),
(110, 108, 'admin_edit_section', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@admin_edit_section', 'MagicEditorsController', 'admin_edit_section', 'Action', NULL, NULL),
(111, 108, 'admin_update_element', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@admin_update_element', 'MagicEditorsController', 'admin_update_element', 'Action', NULL, NULL),
(112, 108, 'admin_remove_image', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@admin_remove_image', 'MagicEditorsController', 'admin_remove_image', 'Action', NULL, NULL),
(113, 108, 'get_page_content', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@get_page_content', 'MagicEditorsController', 'get_page_content', 'Action', NULL, NULL),
(114, 108, 'get_all_cpt', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@get_all_cpt', 'MagicEditorsController', 'get_all_cpt', 'Action', NULL, NULL),
(115, 108, 'get_post_by_cpt', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@get_post_by_cpt', 'MagicEditorsController', 'get_post_by_cpt', 'Action', NULL, NULL),
(116, 108, 'get_post_taxonomy', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@get_post_taxonomy', 'MagicEditorsController', 'get_post_taxonomy', 'Action', NULL, NULL),
(117, 108, 'get_post_by_category', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@get_post_by_category', 'MagicEditorsController', 'get_post_by_category', 'Action', NULL, NULL),
(118, 108, 'get_cpt_categories', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@get_cpt_categories', 'MagicEditorsController', 'get_cpt_categories', 'Action', NULL, NULL),
(119, 108, 'get_post_by_cpt_category', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@get_post_by_cpt_category', 'MagicEditorsController', 'get_post_by_cpt_category', 'Action', NULL, NULL),
(120, 108, 'ajax_load_more', 'App\\Http\\Controllers\\Admin\\MagicEditorsController@ajax_load_more', 'MagicEditorsController', 'ajax_load_more', 'Action', NULL, NULL),
(121, 2, 'App\\Http\\Controllers\\Admin\\NotificationsController', 'App\\Http\\Controllers\\Admin\\NotificationsController@index', 'NotificationsController', NULL, 'Controller', NULL, NULL),
(122, 121, 'index', 'App\\Http\\Controllers\\Admin\\NotificationsController@index', 'NotificationsController', 'index', 'Action', NULL, NULL),
(123, 121, 'create', 'App\\Http\\Controllers\\Admin\\NotificationsController@create', 'NotificationsController', 'create', 'Action', NULL, NULL),
(124, 121, 'store', 'App\\Http\\Controllers\\Admin\\NotificationsController@store', 'NotificationsController', 'store', 'Action', NULL, NULL),
(125, 121, 'edit', 'App\\Http\\Controllers\\Admin\\NotificationsController@edit', 'NotificationsController', 'edit', 'Action', NULL, NULL),
(126, 121, 'update', 'App\\Http\\Controllers\\Admin\\NotificationsController@update', 'NotificationsController', 'update', 'Action', NULL, NULL),
(127, 121, 'destroy', 'App\\Http\\Controllers\\Admin\\NotificationsController@destroy', 'NotificationsController', 'destroy', 'Action', NULL, NULL),
(128, 121, 'settings', 'App\\Http\\Controllers\\Admin\\NotificationsController@settings', 'NotificationsController', 'settings', 'Action', NULL, NULL),
(129, 121, 'notifications_config', 'App\\Http\\Controllers\\Admin\\NotificationsController@notifications_config', 'NotificationsController', 'notifications_config', 'Action', NULL, NULL),
(130, 121, 'edit_template', 'App\\Http\\Controllers\\Admin\\NotificationsController@edit_template', 'NotificationsController', 'edit_template', 'Action', NULL, NULL),
(131, 121, 'edit_email_template', 'App\\Http\\Controllers\\Admin\\NotificationsController@edit_email_template', 'NotificationsController', 'edit_email_template', 'Action', NULL, NULL),
(132, 121, 'edit_web_template', 'App\\Http\\Controllers\\Admin\\NotificationsController@edit_web_template', 'NotificationsController', 'edit_web_template', 'Action', NULL, NULL),
(133, 121, 'edit_sms_template', 'App\\Http\\Controllers\\Admin\\NotificationsController@edit_sms_template', 'NotificationsController', 'edit_sms_template', 'Action', NULL, NULL),
(134, 2, 'App\\Http\\Controllers\\Admin\\ConfigurationsController', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@make_slug', 'ConfigurationsController', NULL, 'Controller', NULL, NULL),
(135, 134, 'make_slug', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@make_slug', 'ConfigurationsController', 'make_slug', 'Action', NULL, NULL),
(136, 134, 'upload_files', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@upload_files', 'ConfigurationsController', 'upload_files', 'Action', NULL, NULL),
(137, 134, 'remove_file', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@remove_file', 'ConfigurationsController', 'remove_file', 'Action', NULL, NULL),
(138, 134, 'ckeditor_uploads', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@ckeditor_uploads', 'ConfigurationsController', 'ckeditor_uploads', 'Action', NULL, NULL),
(139, 1, 'Front', 'App\\Http\\Controllers\\Front\\HomeController@themelanguage', NULL, NULL, 'App', NULL, NULL),
(140, 139, 'App\\Http\\Controllers\\Front\\HomeController', 'App\\Http\\Controllers\\Front\\HomeController@themelanguage', 'HomeController', NULL, 'Controller', NULL, NULL),
(141, 140, 'themelanguage', 'App\\Http\\Controllers\\Front\\HomeController@themelanguage', 'HomeController', 'themelanguage', 'Action', NULL, NULL),
(142, 134, 'admin_index', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_index', 'ConfigurationsController', 'admin_index', 'Action', NULL, NULL),
(143, 134, 'admin_add', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_add', 'ConfigurationsController', 'admin_add', 'Action', NULL, NULL),
(144, 134, 'admin_edit', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_edit', 'ConfigurationsController', 'admin_edit', 'Action', NULL, NULL),
(145, 134, 'admin_delete', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_delete', 'ConfigurationsController', 'admin_delete', 'Action', NULL, NULL),
(146, 134, 'admin_view', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_view', 'ConfigurationsController', 'admin_view', 'Action', NULL, NULL),
(147, 134, 'admin_reading', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_reading', 'ConfigurationsController', 'admin_reading', 'Action', NULL, NULL),
(148, 134, 'admin_settings', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_settings', 'ConfigurationsController', 'admin_settings', 'Action', NULL, NULL),
(149, 134, 'admin_prefix', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_prefix', 'ConfigurationsController', 'admin_prefix', 'Action', NULL, NULL),
(150, 134, 'save_config', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@save_config', 'ConfigurationsController', 'save_config', 'Action', NULL, NULL),
(151, 134, 'admin_change_theme', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_change_theme', 'ConfigurationsController', 'admin_change_theme', 'Action', NULL, NULL),
(152, 134, 'admin_change', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_change', 'ConfigurationsController', 'admin_change', 'Action', NULL, NULL),
(153, 134, 'admin_moveup', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_moveup', 'ConfigurationsController', 'admin_moveup', 'Action', NULL, NULL),
(154, 134, 'admin_movedown', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@admin_movedown', 'ConfigurationsController', 'admin_movedown', 'Action', NULL, NULL),
(155, 134, 'save_permalink', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@save_permalink', 'ConfigurationsController', 'save_permalink', 'Action', NULL, NULL),
(156, 134, 'upload_editor_image', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@upload_editor_image', 'ConfigurationsController', 'upload_editor_image', 'Action', NULL, NULL),
(157, 134, 'remove_config_image', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@remove_config_image', 'ConfigurationsController', 'remove_config_image', 'Action', NULL, NULL),
(158, 134, 'date_time_format', 'App\\Http\\Controllers\\Admin\\ConfigurationsController@date_time_format', 'ConfigurationsController', 'date_time_format', 'Action', NULL, NULL),
(159, 140, 'blogcategory', 'App\\Http\\Controllers\\Front\\HomeController@blogcategory', 'HomeController', 'blogcategory', 'Action', NULL, NULL),
(160, 140, 'author', 'App\\Http\\Controllers\\Front\\HomeController@author', 'HomeController', 'author', 'Action', NULL, NULL),
(161, 140, 'blogtag', 'App\\Http\\Controllers\\Front\\HomeController@blogtag', 'HomeController', 'blogtag', 'Action', NULL, NULL),
(162, 140, 'search', 'App\\Http\\Controllers\\Front\\HomeController@search', 'HomeController', 'search', 'Action', NULL, NULL),
(163, 140, 'blogarchive', 'App\\Http\\Controllers\\Front\\HomeController@blogarchive', 'HomeController', 'blogarchive', 'Action', NULL, NULL),
(164, 140, 'blogslist', 'App\\Http\\Controllers\\Front\\HomeController@blogslist', 'HomeController', 'blogslist', 'Action', NULL, NULL),
(165, 140, 'contact', 'App\\Http\\Controllers\\Front\\HomeController@contact', 'HomeController', 'contact', 'Action', NULL, NULL),
(166, 140, 'all', 'App\\Http\\Controllers\\Front\\HomeController@all', 'HomeController', 'all', 'Action', NULL, NULL),
(167, 140, 'detail', 'App\\Http\\Controllers\\Front\\HomeController@detail', 'HomeController', 'detail', 'Action', NULL, NULL),
(168, 2, 'App\\Http\\Controllers\\Admin\\CommentsController', 'App\\Http\\Controllers\\Admin\\CommentsController@admin_index', 'CommentsController', NULL, 'Controller', NULL, NULL),
(169, 168, 'admin_index', 'App\\Http\\Controllers\\Admin\\CommentsController@admin_index', 'CommentsController', 'admin_index', 'Action', NULL, NULL),
(170, 168, 'admin_edit', 'App\\Http\\Controllers\\Admin\\CommentsController@admin_edit', 'CommentsController', 'admin_edit', 'Action', NULL, NULL),
(171, 168, 'admin_update', 'App\\Http\\Controllers\\Admin\\CommentsController@admin_update', 'CommentsController', 'admin_update', 'Action', NULL, NULL),
(172, 168, 'admin_trash', 'App\\Http\\Controllers\\Admin\\CommentsController@admin_trash', 'CommentsController', 'admin_trash', 'Action', NULL, NULL),
(173, 168, 'admin_destroy', 'App\\Http\\Controllers\\Admin\\CommentsController@admin_destroy', 'CommentsController', 'admin_destroy', 'Action', NULL, NULL),
(174, 168, 'admin_store', 'App\\Http\\Controllers\\Admin\\CommentsController@admin_store', 'CommentsController', 'admin_store', 'Action', NULL, NULL),
(175, 0, 'Installation 0', 'Modules\\Installation\\Http\\Controllers\\InstallationController@welcome', NULL, NULL, 'Module', NULL, NULL),
(176, 175, 'Http 175', 'Modules\\Installation\\Http\\Controllers\\InstallationController@welcome', NULL, NULL, 'Module', NULL, NULL),
(177, 176, 'Controllers 176', 'Modules\\Installation\\Http\\Controllers\\InstallationController@welcome', NULL, NULL, 'Module', NULL, NULL),
(178, 177, 'Modules\\Installation\\Http\\Controllers\\InstallationController', 'Modules\\Installation\\Http\\Controllers\\InstallationController@welcome', 'InstallationController', NULL, 'Controller', NULL, NULL),
(179, 178, 'welcome', 'Modules\\Installation\\Http\\Controllers\\InstallationController@welcome', 'InstallationController', 'welcome', 'Action', NULL, NULL),
(180, 178, 'environmentWizard', 'Modules\\Installation\\Http\\Controllers\\InstallationController@environmentWizard', 'InstallationController', 'environmentWizard', 'Action', NULL, NULL),
(181, 178, 'saveWizard', 'Modules\\Installation\\Http\\Controllers\\InstallationController@saveWizard', 'InstallationController', 'saveWizard', 'Action', NULL, NULL),
(182, 178, 'database', 'Modules\\Installation\\Http\\Controllers\\InstallationController@database', 'InstallationController', 'database', 'Action', NULL, NULL),
(183, 178, 'admin', 'Modules\\Installation\\Http\\Controllers\\InstallationController@admin', 'InstallationController', 'admin', 'Action', NULL, NULL),
(184, 178, 'saveAdmin', 'Modules\\Installation\\Http\\Controllers\\InstallationController@saveAdmin', 'InstallationController', 'saveAdmin', 'Action', NULL, NULL),
(185, 178, 'finish', 'Modules\\Installation\\Http\\Controllers\\InstallationController@finish', 'InstallationController', 'finish', 'Action', NULL, NULL),
(186, 178, 'requirements', 'Modules\\Installation\\Http\\Controllers\\InstallationController@requirements', 'InstallationController', 'requirements', 'Action', NULL, NULL),
(187, 0, 'W3CPT 0', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@index', NULL, NULL, 'Module', NULL, NULL),
(188, 187, 'Http 187', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@index', NULL, NULL, 'Module', NULL, NULL),
(189, 188, 'Controllers 188', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@index', NULL, NULL, 'Module', NULL, NULL),
(190, 189, 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@index', 'W3CPTController', NULL, 'Controller', NULL, NULL),
(191, 190, 'index', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@index', 'W3CPTController', 'index', 'Action', NULL, NULL),
(192, 190, 'save', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@save', 'W3CPTController', 'save', 'Action', NULL, NULL),
(193, 190, 'destroy', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@destroy', 'W3CPTController', 'destroy', 'Action', NULL, NULL),
(194, 190, 'index_taxo', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@index_taxo', 'W3CPTController', 'index_taxo', 'Action', NULL, NULL),
(195, 190, 'save_taxo', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@save_taxo', 'W3CPTController', 'save_taxo', 'Action', NULL, NULL),
(196, 190, 'destroy_taxo', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@destroy_taxo', 'W3CPTController', 'destroy_taxo', 'Action', NULL, NULL),
(197, 190, 'trash_cpt', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@trash_cpt', 'W3CPTController', 'trash_cpt', 'Action', NULL, NULL),
(198, 190, 'trash_taxo', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@trash_taxo', 'W3CPTController', 'trash_taxo', 'Action', NULL, NULL),
(199, 190, 'trash_list', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@trash_list', 'W3CPTController', 'trash_list', 'Action', NULL, NULL),
(200, 190, 'trash_taxo_list', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@trash_taxo_list', 'W3CPTController', 'trash_taxo_list', 'Action', NULL, NULL),
(201, 190, 'resotre_cpt_taxo', 'Modules\\W3CPT\\Http\\Controllers\\W3CPTController@resotre_cpt_taxo', 'W3CPTController', 'resotre_cpt_taxo', 'Action', NULL, NULL),
(202, 189, 'Modules\\W3CPT\\Http\\Controllers\\BlogsController', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@admin_index', 'BlogsController', NULL, 'Controller', NULL, NULL),
(203, 202, 'admin_index', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@admin_index', 'BlogsController', 'admin_index', 'Action', NULL, NULL),
(204, 202, 'admin_create', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@admin_create', 'BlogsController', 'admin_create', 'Action', NULL, NULL),
(205, 202, 'admin_store', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@admin_store', 'BlogsController', 'admin_store', 'Action', NULL, NULL),
(206, 202, 'admin_edit', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@admin_edit', 'BlogsController', 'admin_edit', 'Action', NULL, NULL),
(207, 202, 'admin_update', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@admin_update', 'BlogsController', 'admin_update', 'Action', NULL, NULL),
(208, 202, 'admin_destroy', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@admin_destroy', 'BlogsController', 'admin_destroy', 'Action', NULL, NULL),
(209, 202, 'admin_trash_status', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@admin_trash_status', 'BlogsController', 'admin_trash_status', 'Action', NULL, NULL),
(210, 202, 'restore_blog', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@restore_blog', 'BlogsController', 'restore_blog', 'Action', NULL, NULL),
(211, 202, 'trash_list', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@trash_list', 'BlogsController', 'trash_list', 'Action', NULL, NULL),
(212, 202, 'remove_feature_image', 'Modules\\W3CPT\\Http\\Controllers\\BlogsController@remove_feature_image', 'BlogsController', 'remove_feature_image', 'Action', NULL, NULL),
(213, 189, 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@list', 'BlogCategoriesController', NULL, 'Controller', NULL, NULL),
(214, 213, 'list', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@list', 'BlogCategoriesController', 'list', 'Action', NULL, NULL),
(215, 213, 'admin_index', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_index', 'BlogCategoriesController', 'admin_index', 'Action', NULL, NULL),
(216, 213, 'admin_create', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_create', 'BlogCategoriesController', 'admin_create', 'Action', NULL, NULL),
(217, 213, 'admin_store', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_store', 'BlogCategoriesController', 'admin_store', 'Action', NULL, NULL),
(218, 213, 'admin_edit', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_edit', 'BlogCategoriesController', 'admin_edit', 'Action', NULL, NULL),
(219, 213, 'admin_update', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_update', 'BlogCategoriesController', 'admin_update', 'Action', NULL, NULL),
(220, 213, 'admin_destroy', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_destroy', 'BlogCategoriesController', 'admin_destroy', 'Action', NULL, NULL),
(221, 213, 'admin_trash_status', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_trash_status', 'BlogCategoriesController', 'admin_trash_status', 'Action', NULL, NULL),
(222, 213, 'admin_ajax_add_category', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_ajax_add_category', 'BlogCategoriesController', 'admin_ajax_add_category', 'Action', NULL, NULL),
(223, 213, 'admin_moveup', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_moveup', 'BlogCategoriesController', 'admin_moveup', 'Action', NULL, NULL),
(224, 213, 'admin_movedown', 'Modules\\W3CPT\\Http\\Controllers\\BlogCategoriesController@admin_movedown', 'BlogCategoriesController', 'admin_movedown', 'Action', NULL, NULL),
(225, 189, 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController', 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController@list', 'BlogTagsController', NULL, 'Controller', NULL, NULL),
(226, 225, 'list', 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController@list', 'BlogTagsController', 'list', 'Action', NULL, NULL),
(227, 225, 'admin_index', 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController@admin_index', 'BlogTagsController', 'admin_index', 'Action', NULL, NULL),
(228, 225, 'admin_create', 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController@admin_create', 'BlogTagsController', 'admin_create', 'Action', NULL, NULL),
(229, 225, 'admin_store', 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController@admin_store', 'BlogTagsController', 'admin_store', 'Action', NULL, NULL),
(230, 225, 'admin_edit', 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController@admin_edit', 'BlogTagsController', 'admin_edit', 'Action', NULL, NULL),
(231, 225, 'admin_update', 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController@admin_update', 'BlogTagsController', 'admin_update', 'Action', NULL, NULL),
(232, 225, 'admin_destroy', 'Modules\\W3CPT\\Http\\Controllers\\BlogTagsController@admin_destroy', 'BlogTagsController', 'admin_destroy', 'Action', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `post_count` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term_relationships`
--

CREATE TABLE `term_relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `object_id` bigint(20) NOT NULL,
  `term_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(500) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_notification_config`
--

CREATE TABLE `user_notification_config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notification_config_id` bigint(20) UNSIGNED NOT NULL,
  `notification_types` enum('A','B') NOT NULL COMMENT 'Type-A 1- Email Type-B 2-Header Notification 3-Popup Notification 4-Mobile Notification',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_blog_categories`
--
ALTER TABLE `blog_blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_blog_categories_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_blog_categories_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_blog_tags`
--
ALTER TABLE `blog_blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_blog_tags_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_blog_tags_blog_tag_id_foreign` (`blog_tag_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_metas`
--
ALTER TABLE `blog_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_metas_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `blog_seos`
--
ALTER TABLE `blog_seos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_seos_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_tags_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_config`
--
ALTER TABLE `notification_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_templates_notification_config_id_foreign` (`notification_config_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_metas`
--
ALTER TABLE `page_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_metas_page_id_foreign` (`page_id`);

--
-- Indexes for table `page_seos`
--
ALTER TABLE `page_seos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_seos_page_id_foreign` (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `permissions_temp_permission_id_foreign` (`temp_permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `temp_permissions`
--
ALTER TABLE `temp_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_relationships`
--
ALTER TABLE `term_relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_notification_config`
--
ALTER TABLE `user_notification_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notification_config_user_id_foreign` (`user_id`),
  ADD KEY `user_notification_config_notification_config_id_foreign` (`notification_config_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_blog_categories`
--
ALTER TABLE `blog_blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `blog_blog_tags`
--
ALTER TABLE `blog_blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_metas`
--
ALTER TABLE `blog_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `blog_seos`
--
ALTER TABLE `blog_seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_config`
--
ALTER TABLE `notification_config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_metas`
--
ALTER TABLE `page_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `page_seos`
--
ALTER TABLE `page_seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp_permissions`
--
ALTER TABLE `temp_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term_relationships`
--
ALTER TABLE `term_relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notification_config`
--
ALTER TABLE `user_notification_config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_blog_categories`
--
ALTER TABLE `blog_blog_categories`
  ADD CONSTRAINT `blog_blog_categories_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_blog_categories_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_blog_tags`
--
ALTER TABLE `blog_blog_tags`
  ADD CONSTRAINT `blog_blog_tags_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_blog_tags_blog_tag_id_foreign` FOREIGN KEY (`blog_tag_id`) REFERENCES `blog_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_metas`
--
ALTER TABLE `blog_metas`
  ADD CONSTRAINT `blog_metas_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_seos`
--
ALTER TABLE `blog_seos`
  ADD CONSTRAINT `blog_seos_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD CONSTRAINT `blog_tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD CONSTRAINT `notification_templates_notification_config_id_foreign` FOREIGN KEY (`notification_config_id`) REFERENCES `notification_config` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_metas`
--
ALTER TABLE `page_metas`
  ADD CONSTRAINT `page_metas_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_seos`
--
ALTER TABLE `page_seos`
  ADD CONSTRAINT `page_seos_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_temp_permission_id_foreign` FOREIGN KEY (`temp_permission_id`) REFERENCES `temp_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_notification_config`
--
ALTER TABLE `user_notification_config`
  ADD CONSTRAINT `user_notification_config_notification_config_id_foreign` FOREIGN KEY (`notification_config_id`) REFERENCES `notification_config` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_notification_config_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
