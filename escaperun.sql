-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 27-05-2024 a las 12:59:40
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.8

CREATE DATABASE escaperun;
USE escaperun;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escaperun`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `adminMail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminPass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainPageSponsorPrice` int NOT NULL DEFAULT '250',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `adminMail`, `adminName`, `adminPass`, `mainPageSponsorPrice`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hettinger.lenna@example.org', 'Corrine Paucek', '$2y$12$vdM.c/el4Zwsoyjp9oB5b.roCyO5wm7gJqGsSJIS5F660QdyAlC6u', 250, NULL, '2024-04-04 08:26:13', '2024-04-04 08:26:13'),
(2, 'sarina66@example.net', 'Ron Balistreri', '$2y$12$9zon7ptP3JCCjNrN83JpL.AtdOWJTMrZ4/B3i69VGsuPIZb1/JC0u', 250, NULL, '2024-04-04 08:26:13', '2024-04-04 08:26:13'),
(3, 'flossie.mann@example.com', 'Zora Cruickshank', '$2y$12$xcrlkleJWTd2PXBDu9V.b.wtRaZOSj.wu9LkwubjHJo081P/QScdq', 250, NULL, '2024-04-04 08:26:13', '2024-04-04 08:26:13'),
(4, 'dashawn61@example.org', 'Beverly Hirthe', '$2y$12$v9.fB6TuY5vRmG8YjK6dFOK6cJnqoj9ofddvwgfMRMu59vzj/k7ne', 250, NULL, '2024-04-04 08:26:13', '2024-04-04 08:26:13'),
(5, 'ahalvorson@example.net', 'Mr. Enrico Bins', '$2y$12$yn1NsBPxRX5MmtCJxdfK7.CO433kp8dR/jmPU6T4FAVub83xeJ8FO', 250, NULL, '2024-04-04 08:26:13', '2024-04-04 08:26:13'),
(6, 'joel@gurre.com', 'Joel', '$2y$12$yn1NsBPxRX5MmtCJxdfK7.CO433kp8dR/jmPU6T4FAVub83xeJ8FO', 250, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insurance_companies`
--

CREATE TABLE `insurance_companies` (
  `id` bigint UNSIGNED NOT NULL,
  `CIF` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insuranceName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insuranceAdress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `insurance_companies`
--

INSERT INTO `insurance_companies` (`id`, `CIF`, `insuranceName`, `insuranceAdress`, `active`, `created_at`, `updated_at`) VALUES
(1, '323310728', 'Prof. Carmine Jast', '1695 Kayla Manor Suite 449\nLake Jacky, WI 47955-9101', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(2, '606276503', 'Dr. Dario Bartell Sr.', '43152 Lindgren Alley\nNorth Eulah, AK 27259', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(3, '318347843', 'Florencio Gutmann', '2036 Ryan Lake Suite 515\nLibbyside, IL 11391-9126', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(4, '539643975', 'Prof. Gerardo Ankunding DVM', '173 Karley Forest\nNorth Candacefurt, LA 81882-0218', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(5, '939558584', 'Vernice Tromp', '4371 Halie Green\nKaileemouth, CA 70058-1106', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(6, '416416639', 'Prof. Elisa Schmeler MD', '978 Clementina Point Apt. 325\nEast Akeem, NY 59086-9523', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(7, '619698465', 'Damien Vandervort', '5991 Toy Lake\nWest Liliane, VT 60340-8493', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(8, '174994932', 'Prof. Olaf Kuhlman Sr.', '800 Turner Plains Suite 962\nNorth Thadside, NY 87605', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(9, '405812795', 'Mrs. Aubree Windler DVM', '3564 Federico Union Apt. 027\nCarlostad, TX 39434-2547', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(10, '960015845', 'Myrna Kuhn', '749 Patrick Gateway Suite 310\nJudemouth, WY 29699-0277', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(11, '67021765H', 'Prueba', 'La famosa calle de la aseguradora', 1, '2024-04-14 15:03:47', '2024-04-14 15:03:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insured_rooms`
--

CREATE TABLE `insured_rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `roomId` bigint UNSIGNED NOT NULL,
  `insuranceCompanieCIF` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insuranceCost` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `insured_rooms`
--

INSERT INTO `insured_rooms` (`id`, `roomId`, `insuranceCompanieCIF`, `insuranceCost`, `created_at`, `updated_at`) VALUES
(1, 10, '960015845', 99501, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(2, 14, '174994932', 53067, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(3, 14, '619698465', 18977, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(4, 1, '405812795', 87338, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(5, 7, '416416639', 33180, '2024-04-04 08:26:19', '2024-04-04 08:26:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2024_03_06_093513_create_rooms_table', 1),
(15, '2024_03_06_093553_create_insurance_companies_table', 1),
(16, '2024_03_06_093632_create_insured_rooms_table', 1),
(17, '2024_03_06_093658_create_sponsor_companies_table', 1),
(18, '2024_03_06_093712_create_sponsors_table', 1),
(19, '2024_03_06_093720_create_users_table', 1),
(20, '2024_03_06_093729_create_teams_table', 1),
(21, '2024_03_06_093739_create_team_invitations_table', 1),
(22, '2024_03_06_093753_create_team_signups_table', 1),
(23, '2024_03_06_093807_create_photos_table', 1),
(24, '2024_03_06_093823_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` bigint UNSIGNED NOT NULL,
  `roomId` bigint UNSIGNED NOT NULL,
  `imgRute` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `roomName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomDescription` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomMaxTeams` int NOT NULL,
  `roomMaxTime` int NOT NULL,
  `roomDate` datetime NOT NULL,
  `roomTotalTeams` int DEFAULT NULL,
  `roomStructueImg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomPromotionImg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomPromotionCost` int NOT NULL,
  `roomInscriptionPrice` int NOT NULL,
  `roomInscriptionPriceMembers` int NOT NULL,
  `active` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `roomName`, `roomDescription`, `roomMaxTeams`, `roomMaxTime`, `roomDate`, `roomTotalTeams`, `roomStructueImg`, `roomPromotionImg`, `roomPromotionCost`, `roomInscriptionPrice`, `roomInscriptionPriceMembers`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Giuseppe Heller', 'labore eos et alias omnis accusamus fugiat molestiae quod aut odit dolores autem qui temporibus necessitatibus ut eum est sunt et numquam ut quia possimus', 4, 75, '2030-03-29 06:11:45', 4, 'ruta.jpg', 'ruta.jpg', 2016, 111, 75, 1, '2024-04-04 08:26:13', '2024-04-11 16:30:18'),
(2, 'Ross Larson', 'numquam impedit dolor sunt optio minus consequatur et adipisci necessitatibus ea modi laboriosam enim deleniti eius labore est repellendus totam ad odio officia enim libero', 9, 80, '2030-03-29 06:11:45', 6, 'ruta.jpg', 'ruta.jpg', 2116, 117, 96, 1, '2024-04-04 08:26:13', '2024-04-11 16:29:43'),
(3, 'Mrs. Janet Abshire DDS', 'quod numquam error recusandae dolorem quae reiciendis eos magni laudantium ut ipsum quis et placeat error vel qui cumque temporibus et similique officia sit architecto', 9, 75, '2030-03-29 06:11:45', 3, 'ruta.jpg', 'ruta.jpg', 1564, 144, 109, 1, '2024-04-04 08:26:13', '2024-04-11 16:29:43'),
(4, 'Ms. Laney O\'Connell DDS', 'eaque sit deleniti ea voluptatem doloremque rerum voluptatibus porro sint debitis corporis sequi incidunt ab dolor non sed ad ut maxime voluptas omnis hic dolorum', 3, 60, '2030-03-29 06:11:45', 0, 'ruta.jpg', 'ruta.jpg', 2288, 114, 90, 1, '2024-04-04 08:26:13', '2024-04-11 16:29:43'),
(5, 'Anjali Flatley', 'odio molestiae aliquam praesentium eligendi ducimus est ut omnis itaque voluptatibus alias quidem tempora dolores voluptatem aut veniam necessitatibus nemo blanditiis harum sit ducimus dignissimos', 9, 86, '2030-03-29 06:11:45', 3, 'ruta.jpg', 'ruta.jpg', 2042, 113, 82, 1, '2024-04-04 08:26:13', '2024-04-11 16:29:43'),
(6, 'Dr. Jaylen Lakin I', 'nesciunt est ab tempore alias accusamus rerum ipsa ab sit optio tenetur harum quas est et sint nostrum veniam ab omnis sit ipsa voluptate quasi', 7, 83, '2030-03-29 06:11:45', 4, 'ruta.jpg', 'ruta.jpg', 1377, 136, 103, 1, '2024-04-04 08:26:13', '2024-04-11 16:29:43'),
(7, 'Kaitlyn Breitenberg I', 'necessitatibus dolorem omnis et veritatis eos non est molestiae ipsa libero quae a quas et id a quae illo inventore quia velit veritatis itaque quas', 4, 64, '2030-03-29 06:11:45', 0, 'ruta.jpg', 'ruta.jpg', 1307, 147, 117, 1, '2024-04-04 08:26:13', '2024-04-11 16:29:43'),
(8, 'Ms. Pinkie Cremin Jr.', 'incidunt doloremque molestiae dolores ut reprehenderit laudantium iusto et provident cupiditate saepe dolor voluptates laboriosam neque quibusdam porro adipisci et aspernatur voluptatem saepe sapiente commodi', 7, 80, '2030-03-29 06:11:45', 4, 'ruta.jpg', 'ruta.jpg', 2211, 131, 115, 1, '2024-04-04 08:26:14', '2024-04-11 16:29:43'),
(9, 'Ricardo Williamson', 'incidunt nobis ut molestiae ipsam quis minus nam eos iusto iste aperiam aliquid ut consequatur esse ipsum officia qui vel impedit cupiditate voluptatem vitae impedit', 8, 81, '2030-03-29 06:11:45', 8, 'ruta.jpg', 'ruta.jpg', 1817, 129, 112, 1, '2024-04-04 08:26:14', '2024-04-11 16:29:43'),
(10, 'Betsy Conroy', 'ullam assumenda est vel debitis ut et qui qui mollitia asperiores repellendus voluptatem sit voluptates et at qui consequatur perspiciatis iste animi quis illum beatae', 6, 87, '2030-03-29 06:11:45', 3, 'ruta.jpg', 'ruta.jpg', 2422, 126, 105, 1, '2024-04-04 08:26:14', '2024-04-11 16:29:43'),
(11, 'Raphaelle Beatty', 'accusamus et labore officia et nesciunt modi neque saepe nulla nesciunt qui qui ad sapiente nam dolorum quibusdam corrupti veniam culpa laudantium quaerat dolores quod', 5, 88, '2030-03-29 06:11:45', 1, 'ruta.jpg', 'ruta.jpg', 1301, 150, 107, 1, '2024-04-04 08:26:14', '2024-04-11 16:29:43'),
(12, 'Fleta Howe', 'mollitia doloribus iusto quia et exercitationem modi nihil commodi deserunt sed quia iste consequatur nihil eos reiciendis ut ipsum sit aliquid necessitatibus consequatur enim qui', 7, 84, '2030-03-29 06:11:45', 0, 'ruta.jpg', 'ruta.jpg', 2008, 110, 120, 1, '2024-04-04 08:26:14', '2024-04-11 16:29:43'),
(13, 'Nathan Kub', 'ut saepe ab asperiores pariatur facere aut reiciendis atque cupiditate libero ut quis nihil nostrum nulla facilis quis officia aliquam voluptatem id eos similique alias', 6, 61, '2030-03-29 06:11:45', 0, 'ruta.jpg', 'ruta.jpg', 2482, 121, 113, 1, '2024-04-04 08:26:14', '2024-04-11 16:29:43'),
(14, 'Prof. Hiram Mante III', 'quos sit eius quibusdam eligendi itaque itaque nihil fugiat et suscipit id voluptatem temporibus totam sed veritatis est recusandae et architecto incidunt deserunt vero accusamus', 6, 83, '2030-03-29 06:11:45', 2, 'ruta.jpg', 'ruta.jpg', 2096, 125, 100, 1, '2024-04-04 08:26:14', '2024-04-11 16:29:43'),
(15, 'Prof. Georgianna West III', 'repellat at illo laborum qui doloremque ipsum modi ipsam beatae repellendus eius illo quia eius unde adipisci iste illum quasi veniam eius sit quas nihil', 6, 81, '2030-03-29 06:11:45', 0, 'ruta.jpg', 'ruta.jpg', 2233, 110, 106, 1, '2024-04-04 08:26:14', '2024-04-11 16:29:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint UNSIGNED NOT NULL,
  `roomId` bigint UNSIGNED NOT NULL,
  `sponsorId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sponsors`
--

INSERT INTO `sponsors` (`id`, `roomId`, `sponsorId`, `created_at`, `updated_at`) VALUES
(9, 1, '686265679', '2024-04-11 11:47:58', '2024-04-11 11:47:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsor_companies`
--

CREATE TABLE `sponsor_companies` (
  `id` bigint UNSIGNED NOT NULL,
  `CIF` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainPage` smallint NOT NULL,
  `sponsorName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsorAdress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsorLogo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sponsor_companies`
--

INSERT INTO `sponsor_companies` (`id`, `CIF`, `mainPage`, `sponsorName`, `sponsorAdress`, `sponsorLogo`, `active`, `created_at`, `updated_at`) VALUES
(1, '686265679', 1, 'oleta.friesen', '85733 Lubowitz StreetsJosianeshire, NV 98508', '686265679Logo.jpg', 1, '2024-04-04 08:26:16', '2024-04-11 12:12:24'),
(2, '306368739', 0, 'colleen02', '2355 Metz Cape Suite 536Goyetteburgh, MA 48657-5768', '306368739Logo.jpg', 1, '2024-04-04 08:26:16', '2024-04-10 15:07:52'),
(3, '825270803', 0, 'ratke.gracie', '6658 Erika Parkway Apt. 451\nEast Darrelbury, FL 55394', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(4, '193085308', 1, 'gudrun.brown', '42956 Zulauf Trail\nLake Steve, ME 71136-6437', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(5, '481765373', 0, 'hintz.adrien', '4600 Gunnar Highway\nColliertown, AL 64254', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(6, '339859476', 1, 'weber.ara', '291 Lebsack Ville\nBechtelarhaven, ME 98486', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(7, '926134581', 0, 'herman.ransom', '107 Darrin Plaza Apt. 414\nSchambergerland, NE 31085', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(8, '855981374', 1, 'myrl.hermann', '9180 Oda Highway Apt. 887\nSouth Lily, MD 43141-6248', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(9, '362422382', 1, 'hmacejkovic', '470 Hills Glen Apt. 177\nJosephineport, WY 17632', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(10, '698831856', 0, 'dayne.bednar', '1251 Ariel Orchard Apt. 445\nNorth Pasqualeport, RI 19077-6090', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(11, '716828614', 1, 'libbie50', '36605 Goyette Meadows\nNataliehaven, DC 53671', 'ruta.jpg', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(12, '258574787', 0, 'dandre.armstrong', '6830 McLaughlin Mission Suite 036\nMaidafurt, MT 33884', 'ruta.jpg', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(13, '385455832', 0, 'devin.brakus', '788 Will Junction Suite 544\nHoegerside, NC 36703-8199', 'ruta.jpg', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(14, '957009319', 1, 'clare12', '3354 Jarrett Curve\nMcGlynnstad, NM 78389-2799', 'ruta.jpg', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17'),
(15, '756612385', 1, 'srempel', '5409 Ernestina Branch\nJaskolskimouth, WA 78204', 'ruta.jpg', 1, '2024-04-04 08:26:17', '2024-04-04 08:26:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `teamName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `leagueParticipant` smallint NOT NULL,
  `roomsDone` int NOT NULL DEFAULT '0',
  `points` int NOT NULL DEFAULT '0',
  `teamLeadMail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `teamName`, `leagueParticipant`, `roomsDone`, `points`, `teamLeadMail`, `active`, `created_at`, `updated_at`) VALUES
(1, 'micah24', 1, 21, 7274, 'glover.myrl@example.net', 1, '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(2, 'qbernier', 0, 97, 6885, 'lavina.spinka@example.net', 1, '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(3, 'reece74', 0, 85, 2145, 'susan.casper@example.com', 1, '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(4, 'wallace.marks', 1, 43, 7042, 'jamaal.flatley@example.org', 1, '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(5, 'doyle.estefania', 1, 47, 1396, 'jeanie.casper@example.net', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(6, 'pbechtelar', 1, 67, 8214, 'chris82@example.org', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(7, 'duncan.zieme', 0, 42, 2896, 'hilario71@example.net', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(8, 'rebeka.mraz', 1, 66, 8794, 'carolyn.schiller@example.org', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(9, 'kiarra26', 1, 37, 317, 'jettie89@example.com', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(10, 'ekuhic', 0, 66, 6805, 'hiram.murray@example.org', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(11, 'ekutch', 1, 12, 7490, 'hamill.chester@example.net', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(12, 'elbert.beahan', 1, 82, 927, 'hilario71@example.net', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(13, 'rohan.brandon', 0, 22, 565, 'jacobs.deshawn@example.org', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(14, 'arely.simonis', 1, 42, 936, 'chris82@example.org', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(15, 'alanna.swift', 0, 91, 904, 'hilario71@example.net', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(16, 'jjerde', 1, 74, 2789, 'eleonore.hayes@example.com', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(17, 'chaya95', 1, 98, 229, 'hilario71@example.net', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(18, 'gcorwin', 0, 70, 2584, 'marcia.kreiger@example.net', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(19, 'federico.bashirian', 0, 65, 1141, 'jeanie.casper@example.net', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(20, 'klein.bennett', 1, 0, 4702, 'karianne34@example.org', 1, '2024-04-04 08:26:16', '2024-04-04 08:26:16'),
(21, 'Lomascapos', 0, 0, 0, 'joelgurrera@gmail.com', 1, '2024-04-17 12:15:37', '2024-04-17 12:15:37'),
(22, 'Equipo Test', 0, 0, 0, 'wilburn.price@example.net', 1, '2024-04-17 12:20:27', '2024-04-17 12:20:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint UNSIGNED NOT NULL,
  `teamID` bigint UNSIGNED NOT NULL,
  `invitedUserMail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_signups`
--

CREATE TABLE `team_signups` (
  `id` bigint UNSIGNED NOT NULL,
  `roomId` bigint UNSIGNED NOT NULL,
  `teamId` bigint UNSIGNED NOT NULL,
  `status` smallint NOT NULL DEFAULT '0',
  `dorsal` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `team_signups`
--

INSERT INTO `team_signups` (`id`, `roomId`, `teamId`, `status`, `dorsal`, `created_at`, `updated_at`) VALUES
(1, 13, 10, 0, 422, '2024-04-04 08:26:18', '2024-04-04 08:26:18'),
(2, 8, 1, 0, 683, '2024-04-04 08:26:18', '2024-04-04 08:26:18'),
(3, 15, 15, 0, 481, '2024-04-04 08:26:18', '2024-04-04 08:26:18'),
(4, 13, 14, 0, 984, '2024-04-04 08:26:18', '2024-04-04 08:26:18'),
(5, 5, 16, 0, 351, '2024-04-04 08:26:18', '2024-04-04 08:26:18'),
(6, 1, 14, 0, 404, '2024-04-04 08:26:18', '2024-04-04 08:26:18'),
(7, 4, 18, 0, 811, '2024-04-04 08:26:18', '2024-04-04 08:26:18'),
(8, 3, 10, 0, 836, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(9, 5, 17, 0, 625, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(10, 13, 16, 0, 376, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(11, 14, 19, 0, 239, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(12, 6, 17, 0, 93, '2024-04-04 08:26:19', '2024-04-04 08:26:19'),
(13, 4, 16, 0, 146, '2024-04-04 09:13:15', '2024-04-04 09:13:15'),
(14, 15, 11, 0, 61, '2024-04-04 09:13:15', '2024-04-04 09:13:15'),
(15, 3, 3, 0, 686, '2024-04-04 09:13:15', '2024-04-04 09:13:15'),
(16, 7, 13, 0, 30, '2024-04-04 09:13:15', '2024-04-04 09:13:15'),
(17, 14, 10, 0, 923, '2024-04-04 09:13:15', '2024-04-04 09:13:15'),
(18, 3, 6, 0, 646, '2024-04-04 09:13:24', '2024-04-04 09:13:24'),
(19, 5, 17, 0, 696, '2024-04-04 09:13:24', '2024-04-04 09:13:24'),
(20, 15, 4, 0, 128, '2024-04-04 09:13:24', '2024-04-04 09:13:24'),
(21, 9, 11, 0, 341, '2024-04-04 09:13:24', '2024-04-04 09:13:24'),
(22, 9, 19, 0, 241, '2024-04-04 09:13:24', '2024-04-04 09:13:24'),
(23, 5, 2, 0, 332, '2024-04-04 09:13:26', '2024-04-04 09:13:26'),
(24, 10, 7, 0, 637, '2024-04-04 09:13:26', '2024-04-04 09:13:26'),
(25, 11, 5, 0, 612, '2024-04-04 09:13:26', '2024-04-04 09:13:26'),
(26, 6, 19, 0, 134, '2024-04-04 09:13:27', '2024-04-04 09:13:27'),
(27, 15, 14, 0, 901, '2024-04-04 09:13:27', '2024-04-04 09:13:27'),
(28, 2, 8, 0, 480, '2024-04-04 09:13:29', '2024-04-04 09:13:29'),
(29, 4, 1, 0, 79, '2024-04-04 09:13:29', '2024-04-04 09:13:29'),
(30, 11, 13, 0, 965, '2024-04-04 09:13:29', '2024-04-04 09:13:29'),
(31, 11, 3, 0, 874, '2024-04-04 09:13:29', '2024-04-04 09:13:29'),
(32, 11, 3, 0, 722, '2024-04-04 09:13:29', '2024-04-04 09:13:29'),
(33, 9, 5, 0, 662, '2024-04-04 09:16:53', '2024-04-04 09:16:53'),
(34, 13, 18, 0, 901, '2024-04-04 09:16:53', '2024-04-04 09:16:53'),
(35, 5, 3, 0, 110, '2024-04-04 09:16:53', '2024-04-04 09:16:53'),
(36, 13, 20, 0, 256, '2024-04-04 09:16:53', '2024-04-04 09:16:53'),
(37, 12, 12, 0, 475, '2024-04-04 09:16:53', '2024-04-04 09:16:53'),
(38, 1, 15, 0, 941, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(39, 12, 15, 0, 499, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(40, 13, 20, 0, 577, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(41, 15, 6, 0, 294, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(42, 6, 18, 0, 281, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(43, 12, 2, 0, 139, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(44, 2, 4, 0, 957, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(45, 7, 19, 0, 110, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(46, 4, 13, 0, 580, '2024-04-04 09:17:19', '2024-04-04 09:17:19'),
(47, 15, 18, 0, 28, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(48, 9, 12, 0, 902, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(49, 13, 7, 0, 301, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(50, 13, 7, 0, 9, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(51, 5, 2, 0, 411, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(52, 15, 9, 0, 27, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(53, 4, 4, 0, 783, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(54, 10, 16, 0, 953, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(55, 10, 2, 0, 242, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(56, 15, 13, 0, 344, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(57, 7, 4, 0, 314, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(58, 8, 16, 0, 829, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(59, 5, 10, 0, 867, '2024-04-04 09:17:20', '2024-04-04 09:17:20'),
(60, 7, 11, 0, 197, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(61, 10, 8, 0, 807, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(62, 3, 12, 0, 324, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(63, 6, 15, 0, 288, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(64, 1, 13, 0, 913, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(65, 12, 7, 0, 513, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(66, 3, 17, 0, 397, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(67, 6, 9, 0, 392, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(68, 5, 6, 0, 440, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(69, 1, 10, 0, 533, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(70, 14, 3, 0, 805, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(71, 2, 1, 0, 300, '2024-04-04 09:17:21', '2024-04-04 09:17:21'),
(72, 14, 14, 0, 112, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(73, 6, 5, 0, 578, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(74, 9, 16, 0, 454, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(75, 11, 10, 0, 806, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(76, 5, 16, 0, 999, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(77, 11, 19, 0, 383, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(78, 6, 19, 0, 521, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(79, 2, 9, 0, 891, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(80, 1, 8, 0, 42, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(81, 9, 16, 0, 740, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(82, 2, 8, 0, 582, '2024-04-04 09:17:22', '2024-04-04 09:17:22'),
(83, 11, 2, 0, 929, '2024-04-04 09:17:23', '2024-04-04 09:17:23'),
(84, 7, 16, 0, 37, '2024-04-04 09:17:23', '2024-04-04 09:17:23'),
(85, 7, 7, 0, 463, '2024-04-04 09:17:23', '2024-04-04 09:17:23'),
(86, 13, 7, 0, 205, '2024-04-04 09:17:23', '2024-04-04 09:17:23'),
(87, 14, 5, 0, 596, '2024-04-04 09:17:23', '2024-04-04 09:17:23'),
(88, 1, 17, 0, 957, '2024-04-04 09:17:29', '2024-04-04 09:17:29'),
(89, 14, 6, 0, 917, '2024-04-04 09:17:29', '2024-04-04 09:17:29'),
(90, 14, 18, 0, 112, '2024-04-04 09:17:29', '2024-04-04 09:17:29'),
(91, 15, 7, 0, 856, '2024-04-04 09:17:29', '2024-04-04 09:17:29'),
(92, 2, 19, 0, 765, '2024-04-04 09:17:29', '2024-04-04 09:17:29'),
(93, 4, 10, 0, 32, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(94, 3, 13, 0, 351, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(95, 2, 3, 0, 805, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(96, 1, 5, 0, 49, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(97, 3, 4, 0, 263, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(98, 8, 6, 0, 104, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(99, 9, 9, 0, 964, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(100, 14, 12, 0, 651, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(101, 8, 14, 0, 495, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(102, 14, 19, 0, 529, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(103, 10, 18, 0, 921, '2024-04-04 09:17:30', '2024-04-04 09:17:30'),
(104, 14, 8, 0, 672, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(105, 3, 19, 0, 143, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(106, 9, 3, 0, 869, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(107, 3, 20, 0, 558, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(108, 13, 18, 0, 509, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(109, 10, 19, 0, 586, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(110, 6, 8, 0, 395, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(111, 4, 14, 0, 496, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(112, 5, 1, 0, 618, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(113, 3, 14, 0, 695, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(114, 9, 8, 0, 876, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(115, 11, 19, 0, 481, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(116, 1, 5, 0, 717, '2024-04-04 09:17:31', '2024-04-04 09:17:31'),
(117, 6, 19, 0, 684, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(118, 8, 19, 0, 988, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(119, 1, 20, 0, 816, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(120, 11, 20, 0, 955, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(121, 10, 10, 0, 954, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(122, 14, 16, 0, 327, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(123, 9, 15, 0, 335, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(124, 3, 6, 0, 207, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(125, 4, 19, 0, 892, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(126, 11, 2, 0, 759, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(127, 8, 19, 0, 182, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(128, 4, 5, 0, 732, '2024-04-04 09:17:32', '2024-04-04 09:17:32'),
(129, 15, 12, 0, 90, '2024-04-04 09:17:33', '2024-04-04 09:17:33'),
(130, 11, 9, 0, 791, '2024-04-04 09:17:33', '2024-04-04 09:17:33'),
(131, 11, 8, 0, 549, '2024-04-04 09:17:33', '2024-04-04 09:17:33'),
(132, 14, 3, 0, 30, '2024-04-04 09:17:33', '2024-04-04 09:17:33'),
(133, 4, 20, 0, 136, '2024-04-04 09:17:33', '2024-04-04 09:17:33'),
(134, 7, 15, 0, 893, '2024-04-04 09:17:33', '2024-04-04 09:17:33'),
(135, 14, 7, 0, 586, '2024-04-04 09:17:33', '2024-04-04 09:17:33'),
(136, 14, 14, 0, 568, '2024-04-04 09:17:33', '2024-04-04 09:17:33'),
(137, 5, 7, 0, 199, '2024-04-04 09:17:33', '2024-04-04 09:17:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `userMail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userSurname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userAdress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userBirthDay` date NOT NULL,
  `userGender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamId` int DEFAULT '0',
  `member` smallint NOT NULL DEFAULT '0',
  `userPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `userMail`, `userName`, `userSurname`, `userAdress`, `userBirthDay`, `userGender`, `teamId`, `member`, `userPassword`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'wilburn.price@example.net', 'Miss Creola Heller IV', 'smitham.roslyn', '6679 Marilyne Spurs Apt. 828\nGunnerside, OK 05610', '1985-08-09', 'non binary', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'VcGZY3XRD8zK0uT2tJxtrrSM7YrNrXjFR77A6u9oL4t4QNMJXvwsvmjC0vUi', '2024-04-04 08:26:14', '2024-04-17 12:22:46'),
(2, 'anibal51@example.net', 'Skylar Bernier', 'tgoldner', '8315 Senger Underpass\nEast Lesterborough, GA 24735', '2010-10-10', 'female', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'eYnD7TSXF3', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(3, 'susan.casper@example.com', 'Skyla Corkery', 'fkautzer', '836 Fritsch Cliffs Apt. 647\nRueckerfurt, WA 58094-1898', '1982-12-24', 'non binary', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'SrdaiUROL2', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(4, 'glover.myrl@example.net', 'Carlie Conn', 'snitzsche', '4742 Ward Views\nKleinburgh, KS 70889-7226', '1981-09-27', 'female', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'xZPDlyQfxn', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(5, 'marcia.kreiger@example.net', 'Mr. Alf Ruecker', 'kaelyn61', '7656 Wisoky Drives Apt. 697\nHaagland, NE 54546-0312', '1978-02-24', 'male', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '9isf4KjDFT', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(6, 'armand36@example.org', 'Peggie Wiza', 'dovie63', '8803 Dedric Cliff\nEast Donato, NH 61182-3021', '2012-01-25', 'non binary', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '4QK9l76Ifz', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(7, 'ressie.harris@example.com', 'Janick Borer DDS', 'xjacobs', '257 Lilla Throughway\nWest Christellechester, AL 89147', '2017-04-28', 'male', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'APMFu60p28', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(8, 'hamill.chester@example.net', 'Dan Nolan', 'little.rey', '42007 Kertzmann Terrace\nEast Roxanne, DC 58749', '1989-07-01', 'female', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'b6uFvGe7iT', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(9, 'gtorp@example.org', 'Colin Hudson III', 'grant.rosanna', '4975 Sylvester Ridge Apt. 049\nLangshire, ND 07033-5475', '1972-02-19', 'female', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '0KkzGk0UcX', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(10, 'gusikowski.christelle@example.net', 'Dana Thiel', 'henriette82', '14006 Parisian Greens Suite 967\nKleinmouth, MA 71370', '2008-10-18', 'male', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'dOxdY2F1Hr', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(11, 'ona18@example.com', 'Miss Shea Lindgren', 'hkuhic', '7382 Halvorson Spring\nKirstinville, OK 98595-1596', '1975-04-05', 'female', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'RaTDDkDiOL', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(12, 'ryann62@example.com', 'Miss Dahlia Morissette', 'lukas83', '95581 Emmet Knoll Suite 000\nEast Micheleland, AL 56849-7461', '2000-12-03', 'female', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'wFT55auR5j', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(13, 'jaylen.considine@example.net', 'Priscilla Schuppe', 'cletus.ortiz', '572 Reilly Path Suite 614\nNew Fred, NC 79959', '1987-07-29', 'non binary', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'lTUzqwLmv7', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(14, 'abeer@example.org', 'Augusta Stokes', 'olen89', '7007 Wiza Meadows Suite 395\nPort Millieside, MS 24776', '1978-01-13', 'non binary', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'pe1HShohox', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(15, 'karianne34@example.org', 'Mr. Warren Maggio', 'claire.zemlak', '36451 Nelda Ranch Suite 524\nKatherynmouth, WI 47281-0237', '1992-09-12', 'female', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'xOaIAy8j8w', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(16, 'lavina.spinka@example.net', 'Miss Vivian Buckridge', 'xkuhic', '51180 Francisca River Apt. 120\nReneefort, MI 10629-9163', '1985-07-27', 'female', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'h80xDnBG81', '2024-04-04 08:26:14', '2024-04-04 08:26:14'),
(17, 'vance.fay@example.com', 'Kay Herzog', 'madilyn16', '580 Torp Drives Apt. 614\nStromanbury, LA 14633', '1984-09-11', 'non binary', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'TTJgGlYKDM', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(18, 'vlynch@example.org', 'Easter Baumbach Jr.', 'leo67', '2898 Vandervort Via Suite 627\nNorth Nat, SC 80503', '2009-08-28', 'male', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'GkoBvHVvSb', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(19, 'carolyn.schiller@example.org', 'Hector Ferry', 'nkuphal', '361 Lowe Key\nJenkinston, MS 76711', '2015-05-27', 'male', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'ez9WqREVaW', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(20, 'kavon.rodriguez@example.org', 'Rocio Goldner', 'gswift', '6282 Parisian Drive\nSouth Chaunceyburgh, NC 20217', '1995-09-28', 'non binary', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'BxoYxfJLZ0', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(21, 'pprohaska@example.org', 'Dr. Jocelyn Sanford', 'ron38', '2937 Concepcion Centers Apt. 202\nEast Sydnieview, RI 88813', '1974-03-08', 'female', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '7zt9iyOsFq', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(22, 'jettie89@example.com', 'Dena Daniel', 'cory.kemmer', '63589 Conn Ranch Suite 106\nLilianeborough, NH 69217', '2014-11-27', 'non binary', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'FG0vdIC8bF', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(23, 'green.arnaldo@example.net', 'Meta Bayer', 'altenwerth.zelma', '84391 Powlowski Garden\nAndersonberg, MT 17004', '1990-02-02', 'male', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '4Zb7CHsn1s', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(24, 'eleonore.hayes@example.com', 'Mr. Everardo Borer', 'tad26', '291 Mireya Manors\nEast Trystanbury, VA 64147-8778', '2010-03-15', 'female', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'yzdedQCHxV', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(25, 'hilario71@example.net', 'Ella Fay', 'schumm.harley', '195 Jermain Inlet\nTateland, HI 16053', '1994-08-31', 'male', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'VBgHsuQFWL', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(26, 'jamaal.flatley@example.org', 'Elnora Mante', 'stroman.bulah', '68037 Corkery Cape\nWildermanchester, AZ 52684-0058', '1978-02-22', 'non binary', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'RhkJK3jw8z', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(27, 'amraz@example.org', 'Mrs. Ebony Heller II', 'brown.glennie', '46160 Charlie Ways\nSchowaltermouth, ME 38800-5153', '1977-03-12', 'male', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '4ovYAjBbSF', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(28, 'gutmann.dejah@example.com', 'Prof. Zachery Murazik I', 'braulio20', '28424 Wehner Way Suite 661\nEast Kanefurt, OH 02382', '2019-02-24', 'female', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '0pcCGjSHWJ', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(29, 'belle.turner@example.com', 'Lillie Runolfsdottir', 'armando99', '9575 Kiel Crest Suite 978\nNorth Odessaville, VA 60694', '2011-11-25', 'non binary', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'nUy9VU7k22', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(30, 'jeanie.casper@example.net', 'Miss Brianne Gusikowski', 'daisy.shanahan', '865 Timmothy Squares\nJuliannebury, LA 30752', '1974-07-20', 'female', 5, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'dXET67wheq', '2024-04-04 08:26:15', '2024-04-17 12:26:55'),
(31, 'hiram.murray@example.org', 'Osborne Kulas', 'lgerhold', '652 Onie Fort Apt. 972\nWest Effieview, IL 37895', '1998-05-17', 'non binary', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'yPcO9tWsoB', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(32, 'catharine51@example.com', 'Miss Rachelle Bernhard', 'orpha99', '93475 Abbott Prairie\nNew Kaleyton, NV 44133', '2005-12-05', 'female', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'LoqHF6NDL3', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(33, 'jacobs.deshawn@example.org', 'Ricardo Auer', 'unader', '213 Minerva Avenue\nTurnerberg, RI 09498-1973', '1976-12-19', 'male', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '3PrWBnCfyZ', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(34, 'chris82@example.org', 'Jess Schuppe', 'kris.conor', '40814 Stamm Plains Apt. 820\nPort Loriton, KY 92873-0508', '1986-02-12', 'non binary', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'ozc1STsyhv', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(35, 'umedhurst@example.net', 'Hannah Mraz V', 'erin.langosh', '9358 Fisher Orchard\nSwiftfurt, AR 42635-9960', '2020-11-29', 'non binary', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'X4W5moU8T9', '2024-04-04 08:26:15', '2024-04-04 08:26:15'),
(36, 'joel@gmail.com', 'Joel', 'gurre', 'calle', '1994-04-01', 'non binary', 0, 0, '0000', 1, NULL, '2024-04-10 08:38:22', '2024-04-10 08:38:22'),
(37, 'pedro@gmail.com', 'Joel', 'Gurre', 'calle', '2001-08-03', 'male', 0, 0, '0000', 1, NULL, '2024-04-10 08:46:37', '2024-04-10 08:46:37'),
(39, 'joelPrueba@gmail.com', 'Joel', 'Gurre', 'Calle', '2001-08-03', 'male', 0, 0, '$2y$12$bebFOc5a3KDfGPpRowW1BOVBgiqZS81flV8328Bz7AWA8lEHCO2A6', 1, NULL, '2024-04-12 10:02:31', '2024-04-12 10:02:31'),
(40, 'joelgurrera@gmail.com', 'Joel', 'Gurrera', 'Calle la Calle', '2001-08-03', 'male', 21, 1, '$2y$12$JGvOZYGxqB.qDX54BcvZ7uxGSlul0doF0/CVAil4f5AOt4GSDe0EK', 1, NULL, '2024-04-14 14:43:51', '2024-05-22 17:21:17'),
(41, 'mrxjunior808@gmail.com', 'Joel', 'Gurrera', 'Calleteroas', '1999-02-10', 'female', 0, 0, '$2y$12$qa6rbdjS3p8ol/b1QmVJsOcExsIFUAsjYbOq6nfHs4q9yr5eJhAea', 1, NULL, '2024-04-15 15:03:56', '2024-04-15 15:03:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_adminmail_unique` (`adminMail`);

--
-- Indices de la tabla `insurance_companies`
--
ALTER TABLE `insurance_companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `insurance_companies_cif_unique` (`CIF`);

--
-- Indices de la tabla `insured_rooms`
--
ALTER TABLE `insured_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insured_rooms_roomid_foreign` (`roomId`),
  ADD KEY `insured_rooms_insurancecompaniecif_foreign` (`insuranceCompanieCIF`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_roomid_foreign` (`roomId`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sponsors_roomid_foreign` (`roomId`),
  ADD KEY `sponsors_sponsorid_foreign` (`sponsorId`);

--
-- Indices de la tabla `sponsor_companies`
--
ALTER TABLE `sponsor_companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sponsor_companies_cif_unique` (`CIF`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_teamleadmail_foreign` (`teamLeadMail`);

--
-- Indices de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_invitations_teamid_foreign` (`teamID`),
  ADD KEY `team_invitations_invitedusermail_foreign` (`invitedUserMail`);

--
-- Indices de la tabla `team_signups`
--
ALTER TABLE `team_signups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_signups_roomid_foreign` (`roomId`),
  ADD KEY `team_signups_teamid_foreign` (`teamId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_usermail_unique` (`userMail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `insurance_companies`
--
ALTER TABLE `insurance_companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `insured_rooms`
--
ALTER TABLE `insured_rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sponsor_companies`
--
ALTER TABLE `sponsor_companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `team_signups`
--
ALTER TABLE `team_signups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `insured_rooms`
--
ALTER TABLE `insured_rooms`
  ADD CONSTRAINT `insured_rooms_insurancecompaniecif_foreign` FOREIGN KEY (`insuranceCompanieCIF`) REFERENCES `insurance_companies` (`CIF`),
  ADD CONSTRAINT `insured_rooms_roomid_foreign` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`id`);

--
-- Filtros para la tabla `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_roomid_foreign` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`id`);

--
-- Filtros para la tabla `sponsors`
--
ALTER TABLE `sponsors`
  ADD CONSTRAINT `sponsors_roomid_foreign` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `sponsors_sponsorid_foreign` FOREIGN KEY (`sponsorId`) REFERENCES `sponsor_companies` (`CIF`);

--
-- Filtros para la tabla `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_teamleadmail_foreign` FOREIGN KEY (`teamLeadMail`) REFERENCES `users` (`userMail`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_invitedusermail_foreign` FOREIGN KEY (`invitedUserMail`) REFERENCES `users` (`userMail`) ON UPDATE CASCADE,
  ADD CONSTRAINT `team_invitations_teamid_foreign` FOREIGN KEY (`teamID`) REFERENCES `teams` (`id`);

--
-- Filtros para la tabla `team_signups`
--
ALTER TABLE `team_signups`
  ADD CONSTRAINT `team_signups_roomid_foreign` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `team_signups_teamid_foreign` FOREIGN KEY (`teamId`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
