-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2016 at 05:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sambil_kerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
`id_admin` int(11) NOT NULL,
  `administrator_name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(55) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `avatar` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_admin`, `administrator_name`, `username`, `email`, `password`, `created_time`, `last_login`, `avatar`) VALUES
(2, 'administrator', 'userdewa', 'administrator@sambilkerja.com', 'b0615c473cffb2618f6111cc8c6c6b01', '2016-02-12 17:35:06', '2016-02-17 18:26:58', '8cf4d0fd037e4258c3b2bf275caa9495.jpg'),
(4, 'Faisal Rahman', 'faisalrn', 'faisalrahman@gmail.com', 'af1264cbdb9d5b3c7b401168118726fd', '2016-02-13 06:41:56', '0000-00-00 00:00:00', ''),
(5, 'Ilyas Habiburrahman', 'ilyashrn', 'ilyashabhab@gmail.com', 'af1264cbdb9d5b3c7b401168118726fd', '2016-02-15 18:27:24', '2016-03-02 04:01:21', ''),
(6, 'Idris Izzaturrahman H', 'idrisih', 'idrisizzaturrahman@gmail.com', 'af1264cbdb9d5b3c7b401168118726fd', '2016-02-15 18:59:08', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id_city` int(11) NOT NULL,
  `city_name` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id_city`, `city_name`) VALUES
(1, 'Aceh Barat Daya Kab.'),
(2, 'Aceh Barat Kab.'),
(3, 'Aceh Besar Kab.'),
(4, 'Aceh Jaya Kab.'),
(5, 'Aceh Selatan Kab.'),
(6, 'Aceh Singkil Kab.'),
(7, 'Aceh Tamiang Kab.'),
(8, 'Aceh Tengah Kab.'),
(9, 'Aceh Tenggara Kab.'),
(10, 'Aceh Timur Kab.'),
(11, 'Aceh Utara Kab.'),
(12, 'Banda Aceh Kota'),
(13, 'Bener Meriah Kab.'),
(14, 'Bireuen Kab.'),
(15, 'Gayo Lues Kab.'),
(16, 'Langsa Kota'),
(17, 'Lhokseumawe Kota'),
(18, 'Nagan Raya Kab.'),
(19, 'Pidie Jaya Kab.'),
(20, 'Pidie Kab.'),
(21, 'Sabang Kota'),
(22, 'Simeulue Kab.'),
(23, 'Subulussalam Kota'),
(24, 'Badung Kab.'),
(25, 'Bangli Kab.'),
(26, 'Buleleng Kab.'),
(27, 'Denpasar Kota'),
(28, 'Gianyar Kab.'),
(29, 'Jembrana Kab.'),
(30, 'Karangasem Kab.'),
(31, 'Klungkung Kab.'),
(32, 'Tabanan Kab.'),
(33, 'Bangka Barat Kab.'),
(34, 'Bangka Kab.'),
(35, 'Bangka Selatan Kab.'),
(36, 'Bangka Tengah Kab.'),
(37, 'Belitung Kab.'),
(38, 'Belitung Timur Kab.'),
(39, 'Pangkal Pinang Kota'),
(40, 'Cilegon Kota'),
(41, 'Lebak Kab.'),
(42, 'Pandeglang Kab.'),
(43, 'Pendeglang Kab.'),
(44, 'Serang Kab.'),
(45, 'Serang Kota'),
(46, 'Tangerang Kab.'),
(47, 'Tangerang Kota'),
(48, 'Tangerang Selatan Kota'),
(49, 'Bengkulu Kota'),
(50, 'Bengkulu Selatan Kab.'),
(51, 'Bengkulu Tengah Kab.'),
(52, 'Bengkulu Utara Kab.'),
(53, 'Kaur Kab.'),
(54, 'Kepahiang Kab.'),
(55, 'Lebong Kab.'),
(56, 'Mukomuko Kab.'),
(57, 'Rejang Lebong Kab.'),
(58, 'Seluma Kab.'),
(59, 'Boalemo Kab.'),
(60, 'Bone Bolango Kab.'),
(61, 'Gorontalo Kab.'),
(62, 'Gorontalo Kota'),
(63, 'Gorontalo Utara Kab.'),
(64, 'Pohuwato Kab.'),
(65, 'Jakarta Barat'),
(66, 'Jakarta Pusat'),
(67, 'Jakarta Selatan'),
(68, 'Jakarta Timur'),
(69, 'Jakarta Utara'),
(70, 'Kepulauan Seribu'),
(71, 'Batang Hari Kab.'),
(72, 'Bungo Kab.'),
(73, 'Jambi Kota'),
(74, 'Kerinci Kab.'),
(75, 'Merangin Kab.'),
(76, 'Muaro Jambi Kab.'),
(77, 'Sarolangun Kab.'),
(78, 'Sungai Penuh Kota'),
(79, 'Tanjung Jabung Barat Kab.'),
(80, 'Tanjung Jabung Timur Kab.'),
(81, 'Tebo Kab.'),
(82, 'Bandung Barat Kab.'),
(83, 'Bandung Kab.'),
(84, 'Bandung Kota'),
(85, 'Banjar Kota'),
(86, 'Bekasi Kab.'),
(87, 'Bekasi Kota'),
(88, 'Bogor Kab.'),
(89, 'Bogor Kota'),
(90, 'Ciamis Kab.'),
(91, 'Cianjur Kab.'),
(92, 'Cimahi Kota'),
(93, 'Cirebon Kab.'),
(94, 'Cirebon Kota'),
(95, 'Depok Kota'),
(96, 'Garut Kab.'),
(97, 'Indramayu Kab.'),
(98, 'Karawang Kab.'),
(99, 'Kerawang Kab.'),
(100, 'Kuningan Kab.'),
(101, 'Majalengka Kab.'),
(102, 'Purwakarta Kab.'),
(103, 'Subang Kab.'),
(104, 'Sukabumi Kab.'),
(105, 'Sukabumi Kota'),
(106, 'Sumedang Kab.'),
(107, 'Tasikmalaya Kab.'),
(108, 'Tasikmalaya Kota'),
(109, 'Banjarnegara Kab.'),
(110, 'Banyumas Kab.'),
(111, 'Batang Kab.'),
(112, 'Blora Kab.'),
(113, 'Boyolali Kab.'),
(114, 'Brebes Kab.'),
(115, 'Cilacap Kab.'),
(116, 'Demak Kab.'),
(117, 'Grobogan Kab.'),
(118, 'Jepara Kab.'),
(119, 'Karanganyar Kab.'),
(120, 'Kebumen Kab.'),
(121, 'Kendal Kab.'),
(122, 'Klaten Kab.'),
(123, 'Kudus Kab.'),
(124, 'Magelang Kab.'),
(125, 'Magelang Kota'),
(126, 'Pati Kab.'),
(127, 'Pekalongan Kab.'),
(128, 'Pekalongan Kota'),
(129, 'Pemalang Kab.'),
(130, 'Purbalingga Kab.'),
(131, 'Purworejo Kab.'),
(132, 'Rembang Kab.'),
(133, 'Salatiga Kota'),
(134, 'Semarang Kab.'),
(135, 'Semarang Kota'),
(136, 'Sragen Kab.'),
(137, 'Sukoharjo Kab.'),
(138, 'Surakarta Kota'),
(139, 'Tegal Kab.'),
(140, 'Tegal Kota'),
(141, 'Temanggung Kab.'),
(142, 'Wonogiri Kab.'),
(143, 'Wonosobo Kab.'),
(144, 'Bangkalan Kab.'),
(145, 'Banyuwangi Kab.'),
(146, 'Batu Kota'),
(147, 'Blitar Kab.'),
(148, 'Blitar Kota'),
(149, 'Bojonegoro Kab. '),
(150, 'Bondowoso Kab. '),
(151, 'Gresik Kab. '),
(152, 'Jember Kab.'),
(153, 'Jombang Kab.'),
(154, 'Kediri Kab.'),
(155, 'Kediri Kota'),
(156, 'Lamongan Kab.'),
(157, 'Lumajang Kab. '),
(158, 'Madiun Kab. '),
(159, 'Madiun Kota'),
(160, 'Magetan Kab. '),
(161, 'Malang Kab.'),
(162, 'Malang Kota'),
(163, 'Mojokerto Kab. '),
(164, 'Mojokerto Kota'),
(165, 'Nganjuk Kab. '),
(166, 'Ngawi Kab. '),
(167, 'Pacitan Kab. '),
(168, 'Pamekasan Kab. '),
(169, 'Pasuruan Kab. '),
(170, 'Pasuruan Kota'),
(171, 'Ponorogo Kab. '),
(172, 'Probolinggo Kab. '),
(173, 'Probolinggo Kota'),
(174, 'Sampang Kab. '),
(175, 'Sidoarjo Kab.'),
(176, 'Situbondo Kab. '),
(177, 'Sumenep Kab. '),
(178, 'Surabaya Kota'),
(179, 'Trenggalek Kab. '),
(180, 'Tuban Kab.'),
(181, 'Tulungagung Kab. '),
(182, 'Bengkayang Kab.'),
(183, 'Kapuas Hulu Kab.'),
(184, 'Kayong Utara Kab.'),
(185, 'Ketapang Kab.'),
(186, 'Kubu Raya Kab.'),
(187, 'Landak Kab.'),
(188, 'Melawi Kab.'),
(189, 'Pontianak Kab.'),
(190, 'Pontianak Kota'),
(191, 'Sambas Kab.'),
(192, 'Sanggau Kab.'),
(193, 'Sekadau Kab.'),
(194, 'Singkawang Kota'),
(195, 'Sintang Kab.'),
(196, 'Balanngan Kab.'),
(197, 'Banjar Kab.'),
(198, 'Banjarbaru Kota'),
(199, 'Banjarmasin Kota'),
(200, 'Barito Kuala Kab.'),
(201, 'Hulu Sungai Selatan Kab.'),
(202, 'Hulu Sungai Tengah Kab.'),
(203, 'Hulu Sungai Utara Kab.'),
(204, 'Kotabaru Kab.'),
(205, 'Tabalong Kab.'),
(206, 'Tanah Bumbu Kab.'),
(207, 'Tanah Laut Kab.'),
(208, 'Tapin Kab.'),
(209, 'Barito Selatan Kab.'),
(210, 'Barito Timur Kab.'),
(211, 'Barito Utara Kab.'),
(212, 'Gunung Mas Kab.'),
(213, 'Kapuas Kab.'),
(214, 'Katingan Kab.'),
(215, 'Kotawaringin Barat Kab.'),
(216, 'Kotawaringin Timur Kab.'),
(217, 'Lamandau Kab.'),
(218, 'Murung Raya Kab.'),
(219, 'Palangkaraya Kota'),
(220, 'Pulang Pisau Kab.'),
(221, 'Seruyan Kab.'),
(222, 'Sukamara Kab.'),
(223, 'Balikpapan Kota'),
(224, 'Berau Kab.'),
(225, 'Bontang Kota'),
(226, 'Kutai Barat Kab.'),
(227, 'Kutai Kartanegara Kab.'),
(228, 'Kutai Timur Kab.'),
(229, 'Paser Kab.'),
(230, 'Penajam Paser Utara Kab.'),
(231, 'Samarinda Kota'),
(232, 'Bulungan Kab.'),
(233, 'Malinau Kab.'),
(234, 'Nunukan Kab.'),
(235, 'Tana Tidung Kab.'),
(236, 'Tarakan Kota'),
(237, 'Batam Kota'),
(238, 'Bintan Kab.'),
(239, 'Karimun Kab.'),
(240, 'Kepulauan Anambas Kab.'),
(241, 'Lingga Kab.'),
(242, 'Natuna Kab.'),
(243, 'Tanjung Pinang Kota'),
(244, 'Bandar Lampung Kota'),
(245, 'Lampung Barat Kab.'),
(246, 'Lampung Selatan Kab.'),
(247, 'Lampung Tengah Kab.'),
(248, 'Lampung Timur Kab.'),
(249, 'Lampung Utara Kab.'),
(250, 'Mesuji Kab.'),
(251, 'Metro Kota'),
(252, 'Pesawaran Kab.'),
(253, 'Pringsewu Kab.'),
(254, 'Tanggamus Kab.'),
(255, 'Tulang Bawang Barat Kab.'),
(256, 'Tulang Bawang Kab.'),
(257, 'Way Kanan Kab.'),
(258, 'Ambon Kota'),
(259, 'Buru Kab.'),
(260, 'Buru Selatan Kab.'),
(261, 'Kepulauan Aru Kab.'),
(262, 'Maluku Barat Daya Kab.'),
(263, 'Maluku Tengah Kab.'),
(264, 'Maluku Tenggara Barat Kab.'),
(265, 'Maluku Tenggara Kab.'),
(266, 'Seram Bagian Barat Kab.'),
(267, 'Seram Bagian Timur Kab.'),
(268, 'Tual Kab.'),
(269, 'Halmahera Barat Kab.'),
(270, 'Halmahera Selatan Kab.'),
(271, 'Halmahera Tengah Kab.'),
(272, 'Halmahera Timur Kab.'),
(273, 'Halmahera Utara Kab.'),
(274, 'Kepuluan Sula Kab.'),
(275, 'Pulau Morotai Kab.'),
(276, 'Ternate Kota'),
(277, 'Tidore Kepulauan Kota'),
(278, 'Bima Kab.'),
(279, 'Bima Kota'),
(280, 'Dompu Kab.'),
(281, 'Lombok Barat Kab.'),
(282, 'Lombok Tengah Kab.'),
(283, 'Lombok Timur Kab.'),
(284, 'Lombok Utara Kab.'),
(285, 'Mataram Kota'),
(286, 'Sumbawa Barat Kab.'),
(287, 'Sumbawa Kab.'),
(288, 'Alor Kab.'),
(289, 'Belu Kab.'),
(290, 'Ende Kab.'),
(291, 'Flores Timur Kab.'),
(292, 'Kupang Kab.'),
(293, 'Kupang Kota'),
(294, 'Lembata Kab.'),
(295, 'Manggarai Kab.'),
(296, 'Manggarai Barat Kab.'),
(297, 'Manggarai Timur Kab.'),
(298, 'Nagekeo Kab.'),
(299, 'Ngada Kab.'),
(300, 'Rote Ndao Kab.'),
(301, 'Sabu Raijua Kab.'),
(302, 'Sikka Kab.'),
(303, 'Sumba Barat Daya Kab.'),
(304, 'Sumba Barat Kab.'),
(305, 'Sumba Tengah Kab.'),
(306, 'Sumba Timur Kab.'),
(307, 'Timor Tengah Selatan Kab.'),
(308, 'Timor Tengah Utara Kab.'),
(309, 'Asmat Kab.'),
(310, 'Biak Numfor Kab.'),
(311, 'Boven Digoel Kab.'),
(312, 'Deiyai Kab.'),
(313, 'Dogiyai Kab.'),
(314, 'Intan Jaya Kab.'),
(315, 'Jayapura Kab.'),
(316, 'Jayapura Kota'),
(317, 'Jayawijaya Kab.'),
(318, 'Keerom Kab.'),
(319, 'Lanny Jaya Kab.'),
(320, 'Mamberamo Raya Kab.'),
(321, 'Mamberamo Tengah Kab.'),
(322, 'Mappi Kab.'),
(323, 'Merauke Kab.'),
(324, 'Mimika Kab.'),
(325, 'Nabire Kab.'),
(326, 'Nduga Kab.'),
(327, 'Paniai Kab.'),
(328, 'Pengunungan Bintang Kab.'),
(329, 'Puncak Jaya Kab.'),
(330, 'Puncak Kab.'),
(331, 'Sarmi Kab.'),
(332, 'Supiori Kab.'),
(333, 'Tolikara Kab.'),
(334, 'Waropen Kab.'),
(335, 'Yahukimo Kab.'),
(336, 'Yalimo Kab.'),
(337, 'Yapen Waropen Kab.'),
(338, 'Fakfak Kab.'),
(339, 'Kaimana Kab.'),
(340, 'Manokwari Kab.'),
(341, 'Maybrat Kab.'),
(342, 'Raja Ampat Kab.'),
(343, 'Sorong Kab.'),
(344, 'Sorong Kota'),
(345, 'Sorong Selatan Kab.'),
(346, 'Tambrauw Kab.'),
(347, 'Teluk Bintuni Kab.'),
(348, 'Teluk Wondama Kab.'),
(349, 'Bengkalis Kab.'),
(350, 'Dumai Kota'),
(351, 'Indragiri Hilir Kab.'),
(352, 'Indragiri Hulu Kab.'),
(353, 'Kampar Kab.'),
(354, 'Kepulauan Meranti Kab.'),
(355, 'Kuantan Singingi Kab.'),
(356, 'Pekanbaru Kota'),
(357, 'Pelalawan Kab.'),
(358, 'Rokan Hilir Kab.'),
(359, 'Rokan Hulu Kab.'),
(360, 'Siak Kab.'),
(361, 'Majene'),
(362, 'Mamasa'),
(363, 'Mamuju'),
(364, 'Mamuju Utara'),
(365, 'Polewali Mandar'),
(366, 'Bantaeng Kab.'),
(367, 'Barru Kab.'),
(368, 'Bone Kab.'),
(369, 'Bulukumba Kab.'),
(370, 'Enrekang Kab.'),
(371, 'Gowa Kab.'),
(372, 'Jenepronto Kab.'),
(373, 'Kepulauan Selayar Kab.'),
(374, 'Luwu Kab.'),
(375, 'Luwu Timur Kab.'),
(376, 'Luwu Utara Kab.'),
(377, 'Makassar Kota'),
(378, 'Maros Kab.'),
(379, 'Palopo Kota'),
(380, 'Pangkajene dan Kepulauan Kab.'),
(381, 'Pare-Pare Kota'),
(382, 'Pinrang Kab.'),
(383, 'Sidenreng Rappang Kab.'),
(384, 'Sinjai Kab.'),
(385, 'Soppeng Kab.'),
(386, 'Takalar Kab.'),
(387, 'Tana Toraja Kab.'),
(388, 'Toraja Utara Kab.'),
(389, 'Wajo Kab.'),
(390, 'Banggai Kab.'),
(391, 'Banggai Kepulauan Kab.'),
(392, 'Buol Kab.'),
(393, 'Donggala Kab.'),
(394, 'Morowali Kab.'),
(395, 'Palu Kota'),
(396, 'Parigi Moutong Kab.'),
(397, 'Poso Kab.'),
(398, 'Sigi Kab.'),
(399, 'Tojo Una-una Kab.'),
(400, 'Toli-Toli Kab.'),
(401, 'Bau-Bau Kota'),
(402, 'Bombana Kab.'),
(403, 'Buton Kab.'),
(404, 'Buton Utara Kab.'),
(405, 'Kendari Kota'),
(406, 'Kolaka Kab.'),
(407, 'Kolaka Utara Kab.'),
(408, 'Konawe Kab.'),
(409, 'Konawe Selatan Kab.'),
(410, 'Konawe Utara Kab.'),
(411, 'Muna Kab.'),
(412, 'Wakatobi Kab.'),
(413, 'Bitung Kota'),
(414, 'Bitung Kota'),
(415, 'Bolaang Mongondow Kab.'),
(416, 'Bolaang Mongondow Selatan Kab.'),
(417, 'Bolaang Mongondow Timur Kab.'),
(418, 'Bolaang Mongondow Utara Kab.'),
(419, 'Kepulauan Sangihe Kab.'),
(420, 'Kepulauan Siau Tagulandang Biaro Ka'),
(421, 'Kepulauan Talaud Kab.'),
(422, 'Kotamobagu Kota'),
(423, 'Manado Kota'),
(424, 'Minahasa Kab.'),
(425, 'Minahasa Selatan Kab.'),
(426, 'Minahasa Tenggara Kab.'),
(427, 'Minahasa Utara Kab.'),
(428, 'Tomohon Kota'),
(429, 'Agam Kab.'),
(430, 'Bukittinggi Kota'),
(431, 'Dharmasraya Kab.'),
(432, 'Kepulauan Mentawai Kab.'),
(433, 'Lima Puluh Kota Kab.'),
(434, 'Padang Kota'),
(435, 'Padang Panjang Kota'),
(436, 'Padang Pariaman Kab.'),
(437, 'Pariaman Kota'),
(438, 'Pasaman Barat Kab.'),
(439, 'Pasaman Kab.'),
(440, 'Payakumbuh Kota'),
(441, 'Pesisir Selatan Kab.'),
(442, 'Sawahlunto Kota'),
(443, 'Sijunjung Kab.'),
(444, 'Solok Kab.'),
(445, 'Solok Kota'),
(446, 'Solok Selatan Kab.'),
(447, 'Tanah Datar Kab.'),
(448, 'Banyuasin Kab.'),
(449, 'Empat Lawang Kab.'),
(450, 'Lahat Kab.'),
(451, 'Lubuklinggau Kota'),
(452, 'Muara Enim Kab.'),
(453, 'Musi Banyuasin Kab.'),
(454, 'Musi Rawas Kab.'),
(455, 'Ogan Ilir Kab.'),
(456, 'Ogan Komering Ilir Kab.'),
(457, 'Ogan Komering Ulu Kab.'),
(458, 'Ogan Komering Ulu Selatan Kab.'),
(459, 'Ogan Komering Ulu Timur Kab.'),
(460, 'Pagar Alam Kota'),
(461, 'Palembang Kota'),
(462, 'Prabumulih Kota'),
(463, 'Asahan Kab.'),
(464, 'Batubara Kab.'),
(465, 'Binjai Kota'),
(466, 'Dairi Kab.'),
(467, 'Deli Serdang Kab.'),
(468, 'Gunung Sitoli Kota'),
(469, 'Humbang Hasundutan Kab.'),
(470, 'Karo Kab.'),
(471, 'Labuhanbatu Kab.'),
(472, 'Labuhanbatu Selatan Kab.'),
(473, 'Labuhanbatu Utara Kab.'),
(474, 'Langkat Kab.'),
(475, 'Mandailing Natal Kab.'),
(476, 'Medan Kota'),
(477, 'Nias Barat Kab.'),
(478, 'Nias Kab.'),
(479, 'Nias Selatan Kab.'),
(480, 'Nias Utara Kab.'),
(481, 'Padang Lawas Kab.'),
(482, 'Padang Lawas Utara Kab.'),
(483, 'Padang Sidempuan Kota'),
(484, 'Pakpak Bharat Kab.'),
(485, 'Pematangsiantar Kota'),
(486, 'Samosir Kab.'),
(487, 'Serdang Bedagai Kab.'),
(488, 'Sibolga Kota'),
(489, 'Simalungun Kab.'),
(490, 'Tanjung Balai Kota'),
(491, 'Tapanuli Selatan Kab.'),
(492, 'Tapanuli Tengah Kab.'),
(493, 'Tapanuli Utara Kab.'),
(494, 'Tebing Tinggi Kota'),
(495, 'Toba Samosir Kab.'),
(496, 'Bantul Kab.'),
(497, 'Gunung Kidul Kab.'),
(498, 'Kulon Progo Kab.'),
(499, 'Sleman Kab.'),
(500, 'Yogyakarta Kota');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`id_company` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `secondary_email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `username`, `email`, `secondary_email`, `password`, `created_time`, `last_login`) VALUES
(2, 'PT Sucacco TBK', 'succaco', 'succaco@succaco.com', 'succaco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-01-24 09:50:38', '0000-00-00 00:00:00'),
(4, 'GumCode Startup', 'gumcode10', 'ilyashabhab@gmail.com', 'ilyashabhab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-02-02 10:32:16', '2016-02-02 04:32:35'),
(6, 'Sambilkerja', 'Administrator', 'administrator@sambilkerja.com', 'no-reply@sambilkerja.com', 'af1264cbdb9d5b3c7b401168118726fd', '2016-02-12 17:28:40', '2016-02-14 03:28:49'),
(7, 'PT Bukalapak.com', 'bukalapak', 'bl@bukalapak.com', '', 'af1264cbdb9d5b3c7b401168118726fd', '2016-02-13 01:53:49', '0000-00-00 00:00:00'),
(8, 'PT Indosat Ooredo', 'indosat', 'ilyashabiburrahman@gmail.com', 'indosat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-02-13 07:34:33', '2016-03-05 04:04:04'),
(9, 'Universitas Brawijaya', 'unibraw', 'unibraw@gmail.com', 'unibraw2@gmail.com', 'af1264cbdb9d5b3c7b401168118726fd', '2016-02-15 19:47:12', '2016-02-15 19:47:44'),
(10, 'Universitas Indonesia', 'UI', 'UI@gmail.com', '', 'af1264cbdb9d5b3c7b401168118726fd', '2016-02-15 20:41:43', '0000-00-00 00:00:00'),
(11, 'Kodemerah', 'kodemerah', 'email@kodemerah.com', 'email2@kodemerah.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-02-16 07:26:03', '2016-02-15 19:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`id_cont` int(11) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(20) NOT NULL,
  `google` varchar(40) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id_cont`, `facebook`, `twitter`, `google`, `telp`, `email`) VALUES
(1, 'facebook.com', 'sambilkerja', 'google.com', '09546546', 'sambilkerja@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `c_hired`
--

CREATE TABLE IF NOT EXISTS `c_hired` (
`id_hired` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `review` text NOT NULL,
  `stars` double NOT NULL,
  `hire_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `review_date` timestamp NULL DEFAULT NULL,
  `store` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_hired`
--

INSERT INTO `c_hired` (`id_hired`, `id_worker`, `id_company`, `id_job`, `id_status`, `review`, `stars`, `hire_date`, `review_date`, `store`) VALUES
(3, 1, 8, 11, 3, 'Pekerjaannya bagus, rapih, dan sopan anaknya. ', 5, '2016-03-02 04:02:55', '2016-02-15 17:00:00', 0),
(6, 1, 2, 15, 1, '', 0, '2016-02-14 03:25:17', NULL, 0),
(7, 12, 11, 16, 2, 'Mengecewakan', 0.5, '2016-02-16 07:51:55', '2016-02-15 19:51:55', 0),
(8, 1, 10, 19, 1, '', 0, '2016-03-02 03:46:31', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `c_hired_status`
--

CREATE TABLE IF NOT EXISTS `c_hired_status` (
`id_status` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `label` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_hired_status`
--

INSERT INTO `c_hired_status` (`id_status`, `status`, `label`) VALUES
(1, 'Pending', 'warning'),
(2, 'Hired', 'success'),
(3, 'Dismissed', 'warning'),
(4, 'Rejected', 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `c_identity`
--

CREATE TABLE IF NOT EXISTS `c_identity` (
`id_identity` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `ownership` varchar(35) NOT NULL,
  `NPWP` int(20) NOT NULL,
  `address` text NOT NULL,
  `telp_number` varchar(15) NOT NULL,
  `domicile` int(11) NOT NULL,
  `business_form` varchar(15) NOT NULL,
  `bidang` varchar(30) NOT NULL,
  `avatar` varchar(40) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_identity`
--

INSERT INTO `c_identity` (`id_identity`, `id_company`, `ownership`, `NPWP`, `address`, `telp_number`, `domicile`, `business_form`, `bidang`, `avatar`, `about`) VALUES
(3, 4, '', 0, 'Jl. Kemang Dahlia Raya E8\nKemang Pratama 2', '', 0, 'BUMN', '', '', ''),
(7, 2, '', 0, '', '', 0, 'BUMN', '', '2479ef95da9418e6d6fb16bc8f4e1afe.jpg', ''),
(8, 8, 'Ilyas Habiburrahman', 2147483647, 'Jl. Kemang Dahlia Raya E8\nKemang Pratama 2', '085719311994', 65, 'BUMN', 'Telekomunikasi', 'b93a4b35b5f6fb8acccfdad8b9707585.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(9, 6, '', 0, '', '', 0, 'BUMN', '', '', ''),
(10, 10, '', 0, '', '', 0, 'BUMN', '', '', ''),
(11, 11, '', 2147483647, 'Taman Harapan Baru', '087779222236', 87, 'PT', 'Software Perusahaan', '751b7663d77ce02da4506578fa2bad9d.jpg', 'Destop Software, Mobile Software, SEO');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
`id_faq` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `question`, `answer`) VALUES
(1, 'Bagaimana caranya bla bla bla?', 'ya begskgklsjfklsjfklsdjfklsdf'),
(2, 'djfdsjkfhsjkfhsdjkfhkjs', 'sdjkfhsdjkfhsdjkfhdsjkfhjksdf');

-- --------------------------------------------------------

--
-- Table structure for table `hak`
--

CREATE TABLE IF NOT EXISTS `hak` (
`id_hak` int(11) NOT NULL,
  `hak` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak`
--

INSERT INTO `hak` (`id_hak`, `hak`) VALUES
(2, 'Memperoleh hak privasi atas identitas sambilan, identitas hanya dapat diakses oleh pekerjakan yang dituju'),
(4, 'Memperoleh Informasi lowongan pekerjaan sambilan yang dilansir dari halaman web sambilkerja.com'),
(5, 'Mengakses untuk memilih dan mendaftar pekerjaan dari para pekerjakan yang membuka lowongan kerja di sambilkerja.com'),
(6, 'Mendapatkan rating dari pekerjakan atas pekerjaan yang telah dilakukan');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE IF NOT EXISTS `job_categories` (
`id_category` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id_category`, `category_name`) VALUES
(1, 'Jasa Keuangan'),
(2, 'Jasa Pelayanan'),
(3, 'Jasa Desain Grafis'),
(4, 'Jasa Internet');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE IF NOT EXISTS `job_post` (
`id_post` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `post_title` varchar(35) NOT NULL,
  `id_job_category` int(11) NOT NULL,
  `description` text NOT NULL,
  `salary` int(11) NOT NULL,
  `file` varchar(40) NOT NULL,
  `file_desc` varchar(30) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` date NOT NULL,
  `id_location` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_post`, `id_company`, `post_title`, `id_job_category`, `description`, `salary`, `file`, `file_desc`, `created_time`, `deadline`, `id_location`, `start_date`, `end_date`) VALUES
(10, 8, 'Asisten Manager', 1, 'belum tau', 9500000, 'indosat - Asisten Manager', '', '2016-02-13 07:35:58', '2016-02-17', 86, '0000-00-00', '0000-00-00'),
(11, 8, 'Setup Engineer', 35, 'bsdjfsdhfjksdhjfkdshjfkhjsdkf', 1000000, '', '', '2016-02-13 11:01:02', '2016-07-23', 162, '0000-00-00', '0000-00-00'),
(15, 2, 'Manager Finansial', 7, 'belum tau disuruh apa', 2575000, 'succaco_-_Manager_Finansial.pdf', 'File panduan', '2016-02-13 13:50:19', '2016-07-15', 241, '0000-00-00', '0000-00-00'),
(16, 11, 'Judul Info Lowongan', 30, 'Membuat website dengan cepat', 4000000, 'kodemerah_-_Judul_Info_Lowongan.pdf', '', '2016-02-16 07:33:36', '2016-02-19', 87, '0000-00-00', '0000-00-00'),
(17, 8, 'Apa aja lah', 10, 'Apa aja lah', 8999982, 'indosat_-_Apa_aja_lah.pdf', 'Apa aja lah', '2016-02-16 16:04:40', '2016-02-27', 1, '2016-02-16', '2016-02-26'),
(19, 10, 'Coba lagi yuk', 7, 'apa ajalah', 950000, 'UI - Coba lagi yuk', '', '2016-02-16 16:31:07', '2016-02-20', 22, '2016-02-06', '2016-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `job_req_skill`
--

CREATE TABLE IF NOT EXISTS `job_req_skill` (
`id_job_req` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_req_skill`
--

INSERT INTO `job_req_skill` (`id_job_req`, `id_post`, `id_skill`) VALUES
(41, 10, 3),
(42, 10, 4),
(43, 16, 41),
(47, 17, 2),
(48, 17, 3),
(49, 17, 4);

-- --------------------------------------------------------

--
-- Table structure for table `job_sub_categories`
--

CREATE TABLE IF NOT EXISTS `job_sub_categories` (
`id_sub_category` int(11) NOT NULL,
  `sub_category_name` varchar(30) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_sub_categories`
--

INSERT INTO `job_sub_categories` (`id_sub_category`, `sub_category_name`, `id_category`) VALUES
(1, 'Akuntan Keuangan', 1),
(2, 'Kasir', 1),
(3, 'Penulis', 2),
(4, 'Sopir', 2),
(5, 'Waiters', 2),
(6, 'Fotografer', 2),
(7, 'Operator', 2),
(8, 'Penjaga Toko', 2),
(9, 'Marketing/Reseller', 2),
(10, 'Koki', 2),
(11, 'Tour Guide', 2),
(12, 'Tenaga Pengajar (Guru/Mentor)', 2),
(13, 'Resepsionis(Penerima Tamu)', 2),
(14, 'Barista', 2),
(15, 'Teknisi', 2),
(16, 'Kurir', 2),
(17, 'Pengrajin', 2),
(18, 'Asisten Rumah Tangga', 2),
(19, 'Petugas Kebersihan', 2),
(20, 'Petugas Keamanan', 2),
(21, 'Arsitek', 3),
(22, 'Desain Web', 3),
(23, 'Vector Graphic Editor', 3),
(24, 'Photo Editor', 3),
(25, 'Ilustrator', 3),
(26, 'Karikatur', 3),
(27, 'Video Editor', 3),
(28, 'Web Design', 4),
(29, 'Search Engine Optimization (SE', 4),
(30, 'Pembuatan Website', 4),
(31, 'Penulisan Artikel', 4),
(32, 'Copywriting', 4),
(33, 'Transkirp', 4),
(34, 'Penerjemah Artikel', 4),
(35, 'Admin Social Media/Website', 4),
(36, 'Digital Marketing', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kewajiban`
--

CREATE TABLE IF NOT EXISTS `kewajiban` (
`id_kewajiban` int(11) NOT NULL,
  `kewajiban` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kewajiban`
--

INSERT INTO `kewajiban` (`id_kewajiban`, `kewajiban`) VALUES
(1, 'Beritikad Baik'),
(2, 'Tidak melanggar ketentuan undang-undang yang berlaku'),
(3, 'Mendaftar pada menu daftar sambilan di laman web sambilkerja.com'),
(4, 'Menyisihkan 2,5% gaji yang diterima dari pekerjakan untuk biaya administrasi sambilkerja.com'),
(5, 'Bertanggung jawab atas lamaran pekerjaan yang dilamar'),
(6, ' Apabila telah diterima bekerja bersedia mengikuti alur dari pihak pekerjaan'),
(7, 'Tidak melakukan kegiatan yang dapat mengganggu aktivitas website (Spamming, dll)');

-- --------------------------------------------------------

--
-- Table structure for table `languages_set`
--

CREATE TABLE IF NOT EXISTS `languages_set` (
`id_language` int(11) NOT NULL,
  `language_name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages_set`
--

INSERT INTO `languages_set` (`id_language`, `language_name`) VALUES
(1, 'Bahasa Inggris'),
(2, 'Bahasa Arab'),
(3, 'Bahasa Mandarin'),
(4, 'Bahasa Jepang '),
(5, 'Bahasa  Korea'),
(6, 'Bahasa China');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id_location` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_province` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `id_city`, `id_province`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 2),
(25, 25, 2),
(26, 26, 2),
(27, 27, 2),
(28, 28, 2),
(29, 29, 2),
(30, 30, 2),
(31, 31, 2),
(32, 32, 2),
(33, 33, 3),
(34, 34, 3),
(35, 35, 3),
(36, 36, 3),
(37, 37, 3),
(38, 38, 3),
(39, 39, 3),
(40, 40, 4),
(41, 41, 4),
(42, 42, 4),
(43, 43, 4),
(44, 44, 4),
(45, 45, 4),
(46, 46, 4),
(47, 47, 4),
(48, 48, 4),
(49, 49, 5),
(50, 50, 5),
(51, 51, 5),
(52, 52, 5),
(53, 53, 5),
(54, 54, 5),
(55, 55, 5),
(56, 56, 5),
(57, 57, 5),
(58, 58, 5),
(59, 59, 6),
(60, 60, 6),
(61, 61, 6),
(62, 62, 6),
(63, 63, 6),
(64, 64, 6),
(65, 65, 7),
(66, 66, 7),
(67, 67, 7),
(68, 68, 7),
(69, 69, 7),
(70, 70, 7),
(71, 71, 8),
(72, 72, 8),
(73, 73, 8),
(74, 74, 8),
(75, 75, 8),
(76, 76, 8),
(77, 77, 8),
(78, 78, 8),
(79, 79, 8),
(80, 80, 8),
(81, 81, 8),
(82, 82, 9),
(83, 83, 9),
(84, 84, 9),
(85, 85, 9),
(86, 86, 9),
(87, 87, 9),
(88, 88, 9),
(89, 89, 9),
(90, 90, 9),
(91, 91, 9),
(92, 92, 9),
(93, 93, 9),
(94, 94, 9),
(95, 95, 9),
(96, 96, 9),
(97, 97, 9),
(98, 98, 9),
(99, 99, 9),
(100, 100, 9),
(101, 101, 9),
(102, 102, 9),
(103, 103, 9),
(104, 104, 9),
(105, 105, 9),
(106, 106, 9),
(107, 107, 9),
(108, 108, 9),
(109, 109, 10),
(110, 110, 10),
(111, 111, 10),
(112, 112, 10),
(113, 113, 10),
(114, 114, 10),
(115, 115, 10),
(116, 116, 10),
(117, 117, 10),
(118, 118, 10),
(119, 119, 10),
(120, 120, 10),
(121, 121, 10),
(122, 122, 10),
(123, 123, 10),
(124, 124, 10),
(125, 125, 10),
(126, 126, 10),
(127, 127, 10),
(128, 128, 10),
(129, 129, 10),
(130, 130, 10),
(131, 131, 10),
(132, 132, 10),
(133, 133, 10),
(134, 134, 10),
(135, 135, 10),
(136, 136, 10),
(137, 137, 10),
(138, 138, 10),
(139, 139, 10),
(140, 140, 10),
(141, 141, 10),
(142, 142, 10),
(143, 143, 10),
(144, 144, 11),
(145, 145, 11),
(146, 146, 11),
(147, 147, 11),
(148, 148, 11),
(149, 149, 11),
(150, 150, 11),
(151, 151, 11),
(152, 152, 11),
(153, 153, 11),
(154, 154, 11),
(155, 155, 11),
(156, 156, 11),
(157, 157, 11),
(158, 158, 11),
(159, 159, 11),
(160, 160, 11),
(161, 161, 11),
(162, 162, 11),
(163, 163, 11),
(164, 164, 11),
(165, 165, 11),
(166, 166, 11),
(167, 167, 11),
(168, 168, 11),
(169, 169, 11),
(170, 170, 11),
(171, 171, 11),
(172, 172, 11),
(173, 173, 11),
(174, 174, 11),
(175, 175, 11),
(176, 176, 11),
(177, 177, 11),
(178, 178, 11),
(179, 179, 11),
(180, 180, 11),
(181, 181, 11),
(182, 182, 12),
(183, 183, 12),
(184, 184, 12),
(185, 185, 12),
(186, 186, 12),
(187, 187, 12),
(188, 188, 12),
(189, 189, 12),
(190, 190, 12),
(191, 191, 12),
(192, 192, 12),
(193, 193, 12),
(194, 194, 12),
(195, 195, 12),
(196, 196, 13),
(197, 197, 13),
(198, 198, 13),
(199, 199, 13),
(200, 200, 13),
(201, 201, 13),
(202, 202, 13),
(203, 203, 13),
(204, 204, 13),
(205, 205, 13),
(206, 206, 13),
(207, 207, 13),
(208, 208, 13),
(209, 209, 14),
(210, 210, 14),
(211, 211, 14),
(212, 212, 14),
(213, 213, 14),
(214, 214, 14),
(215, 215, 14),
(216, 216, 14),
(217, 217, 14),
(218, 218, 14),
(219, 219, 14),
(220, 220, 14),
(221, 221, 14),
(222, 222, 14),
(223, 223, 15),
(224, 224, 15),
(225, 225, 15),
(226, 226, 15),
(227, 227, 15),
(228, 228, 15),
(229, 229, 15),
(230, 230, 15),
(231, 231, 15),
(232, 232, 16),
(233, 233, 16),
(234, 234, 16),
(235, 235, 16),
(236, 236, 16),
(237, 237, 17),
(238, 238, 17),
(239, 239, 17),
(240, 240, 17),
(241, 241, 17),
(242, 242, 17),
(243, 243, 17),
(244, 244, 18),
(245, 245, 18),
(246, 246, 18),
(247, 247, 18),
(248, 248, 18),
(249, 249, 18),
(250, 250, 18),
(251, 251, 18),
(252, 252, 18),
(253, 253, 18),
(254, 254, 18),
(255, 255, 18),
(256, 256, 18),
(257, 257, 18),
(258, 258, 19),
(259, 259, 19),
(260, 260, 19),
(261, 261, 19),
(262, 262, 19),
(263, 263, 19),
(264, 264, 19),
(265, 265, 19),
(266, 266, 19),
(267, 267, 19),
(268, 268, 19),
(269, 269, 20),
(270, 270, 20),
(271, 271, 20),
(272, 272, 20),
(273, 273, 20),
(274, 274, 20),
(275, 275, 20),
(276, 276, 20),
(277, 277, 20),
(278, 278, 21),
(279, 279, 21),
(280, 280, 21),
(281, 281, 21),
(282, 282, 21),
(283, 283, 21),
(284, 284, 21),
(285, 285, 21),
(286, 286, 21),
(287, 287, 21),
(288, 288, 22),
(289, 289, 22),
(290, 290, 22),
(291, 291, 22),
(292, 292, 22),
(293, 293, 22),
(294, 294, 22),
(295, 295, 22),
(296, 296, 22),
(297, 297, 22),
(298, 298, 22),
(299, 299, 22),
(300, 300, 22),
(301, 301, 22),
(302, 302, 22),
(303, 303, 22),
(304, 304, 22),
(305, 305, 22),
(306, 306, 22),
(307, 307, 22),
(308, 308, 22),
(309, 309, 23),
(310, 310, 23),
(311, 311, 23),
(312, 312, 23),
(313, 313, 23),
(314, 314, 23),
(315, 315, 23),
(316, 316, 23),
(317, 317, 23),
(318, 318, 23),
(319, 319, 23),
(320, 320, 23),
(321, 321, 23),
(322, 322, 23),
(323, 323, 23),
(324, 324, 23),
(325, 325, 23),
(326, 326, 23),
(327, 327, 23),
(328, 328, 23),
(329, 329, 23),
(330, 330, 23),
(331, 331, 23),
(332, 332, 23),
(333, 333, 23),
(334, 334, 23),
(335, 335, 23),
(336, 336, 23),
(337, 337, 23),
(338, 338, 24),
(339, 339, 24),
(340, 340, 24),
(341, 341, 24),
(342, 342, 24),
(343, 343, 24),
(344, 344, 24),
(345, 345, 24),
(346, 346, 24),
(347, 347, 24),
(348, 348, 24),
(349, 349, 25),
(350, 350, 25),
(351, 351, 25),
(352, 352, 25),
(353, 353, 25),
(354, 354, 25),
(355, 355, 25),
(356, 356, 25),
(357, 357, 25),
(358, 358, 25),
(359, 359, 25),
(360, 360, 25),
(361, 361, 26),
(362, 362, 26),
(363, 363, 26),
(364, 364, 26),
(365, 365, 26),
(366, 366, 27),
(367, 367, 27),
(368, 368, 27),
(369, 369, 27),
(370, 370, 27),
(371, 371, 27),
(372, 372, 27),
(373, 373, 27),
(374, 374, 27),
(375, 375, 27),
(376, 376, 27),
(377, 377, 27),
(378, 378, 27),
(379, 379, 27),
(380, 380, 27),
(381, 381, 27),
(382, 382, 27),
(383, 383, 27),
(384, 384, 27),
(385, 385, 27),
(386, 386, 27),
(387, 387, 27),
(388, 388, 27),
(389, 389, 27),
(390, 390, 28),
(391, 391, 28),
(392, 392, 28),
(393, 393, 28),
(394, 394, 28),
(395, 395, 28),
(396, 396, 28),
(397, 397, 28),
(398, 398, 28),
(399, 399, 28),
(400, 400, 28),
(401, 401, 29),
(402, 402, 29),
(403, 403, 29),
(404, 404, 29),
(405, 405, 29),
(406, 406, 29),
(407, 407, 29),
(408, 408, 29),
(409, 409, 29),
(410, 410, 29),
(411, 411, 29),
(412, 412, 29),
(413, 413, 30),
(414, 414, 30),
(415, 415, 30),
(416, 416, 30),
(417, 417, 30),
(418, 418, 30),
(419, 419, 30),
(420, 420, 30),
(421, 421, 30),
(422, 422, 30),
(423, 423, 30),
(424, 424, 30),
(425, 425, 30),
(426, 426, 30),
(427, 427, 30),
(428, 428, 30),
(429, 429, 31),
(430, 430, 31),
(431, 431, 31),
(432, 432, 31),
(433, 433, 31),
(434, 434, 31),
(435, 435, 31),
(436, 436, 31),
(437, 437, 31),
(438, 438, 31),
(439, 439, 31),
(440, 440, 31),
(441, 441, 31),
(442, 442, 31),
(443, 443, 31),
(444, 444, 31),
(445, 445, 31),
(446, 446, 31),
(447, 447, 31),
(448, 448, 32),
(449, 449, 32),
(450, 450, 32),
(451, 451, 32),
(452, 452, 32),
(453, 453, 32),
(454, 454, 32),
(455, 455, 32),
(456, 456, 32),
(457, 457, 32),
(458, 458, 32),
(459, 459, 32),
(460, 460, 32),
(461, 461, 32),
(462, 462, 32),
(463, 463, 33),
(464, 464, 33),
(465, 465, 33),
(466, 466, 33),
(467, 467, 33),
(468, 468, 33),
(469, 469, 33),
(470, 470, 33),
(471, 471, 33),
(472, 472, 33),
(473, 473, 33),
(474, 474, 33),
(475, 475, 33),
(476, 476, 33),
(477, 477, 33),
(478, 478, 33),
(479, 479, 33),
(480, 480, 33),
(481, 481, 33),
(482, 482, 33),
(483, 483, 33),
(484, 484, 33),
(485, 485, 33),
(486, 486, 33),
(487, 487, 33),
(488, 488, 33),
(489, 489, 33),
(490, 490, 33),
(491, 491, 33),
(492, 492, 33),
(493, 493, 33),
(494, 494, 33),
(495, 495, 33),
(496, 496, 34),
(497, 497, 34),
(498, 498, 34),
(499, 499, 34),
(500, 500, 34);

-- --------------------------------------------------------

--
-- Table structure for table `mayors_set`
--

CREATE TABLE IF NOT EXISTS `mayors_set` (
`id_mayor` int(11) NOT NULL,
  `mayor_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mayors_set`
--

INSERT INTO `mayors_set` (`id_mayor`, `mayor_name`) VALUES
(1, 'Administrasi Asuransi & Aktuaria'),
(2, 'Administrasi Keuangan dan Perbankan'),
(3, 'Administrasi Perkantoran & Sekretari'),
(4, 'Administrasi Perpajakan'),
(5, 'Aeronotika dan Astronotika'),
(6, 'Agribisnis'),
(7, 'Agronomi dan Hortikultura'),
(8, 'Akuntansi'),
(9, 'Akuntansi Sektor Publik'),
(10, 'Akuntansi Teknologi Sistem Informasi'),
(11, 'Akuntasi Keuangan'),
(12, 'Analisis Kimia'),
(13, 'Anatomi, Fisiologi, dan Farmakologi'),
(14, 'Antropologi Sosial'),
(15, 'Arsitektur'),
(16, 'Arsitektur Interior'),
(17, 'Arsitektur Lanskap'),
(18, 'Astronomi'),
(19, 'Bahasa dan Kebudayaan Korea'),
(20, 'Bahasa dan Sastra Belanda'),
(21, 'Biokimia'),
(22, 'Biologi'),
(23, 'Budidaya Perairan'),
(24, 'Desain Interior'),
(25, 'Desain Komunikasi Visual'),
(26, 'Desain Produk'),
(27, 'Desain Produk Industri'),
(28, 'Ekonomi Dan Studi Pembangunan'),
(29, 'Ekonomi Islam dan Bisnis Islam'),
(30, 'Ekonomi Sumberdaya dan Lingkungan'),
(31, 'Ekonomi Syariah'),
(32, 'Ekowisata'),
(33, 'Farmasi'),
(34, 'Farmasi Klinik dan Komunitas'),
(35, 'Fisika'),
(36, 'Fisioterapi'),
(37, 'Geografi'),
(38, 'Gizi'),
(39, 'Gizi Masyarakat'),
(40, 'Hasil Hutan'),
(41, 'Hubungan Masyarakat'),
(42, 'Ilmu Administrasi (Negara, Niaga, Perpajakan)'),
(43, 'Ilmu Arkeologi'),
(44, 'Ilmu dan Teknologi Kelautan'),
(45, 'Ilmu dan Teknologi Pangan'),
(46, 'Ilmu Ekonomi'),
(47, 'Ilmu Filsafat'),
(48, 'Ilmu Hubungan Internasional'),
(49, 'Ilmu Hukum'),
(50, 'Ilmu Keperawatan'),
(51, 'Ilmu Kesejahteraan Sosial'),
(52, 'Ilmu Komputer'),
(53, 'Ilmu Komunikasi'),
(54, 'Ilmu Nutrisi dan Teknologi Pakan'),
(55, 'Ilmu Penyakit Hewan dan Kesehatan Masyarakat Veter'),
(56, 'Ilmu Perpustakaan'),
(57, 'Ilmu Politik'),
(58, 'Ilmu Produksi dan Teknologi Peternakan'),
(59, 'Ilmu Sejarah'),
(60, 'Ilmu Tanah dan Sumberdaya Lahan'),
(61, 'KALK (Ketatalaksanaan Angkutan Laut dan Kepelabuha'),
(62, 'Kedokteran'),
(63, 'Kedokteran Gigi'),
(64, 'Kesehatan Masyarakat'),
(65, 'Kewirausahaan'),
(66, 'Kimia'),
(67, 'Klinik, Reproduksi, dan Patologi'),
(68, 'Komunikasi dan Pengembangan Masyarakat'),
(69, 'Konservasi Sumberdaya Hutan dan Ekowisata'),
(70, 'Kria'),
(71, 'Kriminologi'),
(72, 'lmu Keluarga dan Konsumen'),
(73, 'Manajemen'),
(74, 'Manajemen Agribisnis'),
(75, 'Manajemen Bisnis'),
(76, 'Manajemen Hutan'),
(77, 'Manajemen Industri Jasa Makanan dan Gizi'),
(78, 'Manajemen Informasi & Dokumen'),
(79, 'Manajemen Informatika'),
(80, 'Manajemen Logistik'),
(81, 'Manajemen Logistik dan Material'),
(82, 'Manajemen Rekayasa Industri'),
(83, 'Manajemen Sumberdaya Lahan'),
(84, 'Manajemen Sumberdaya Perairan'),
(85, 'Manajemen Transpor Darat'),
(86, 'Manajemen Transpor Laut'),
(87, 'Manajemen Transpor Udara'),
(88, 'Matematika'),
(89, 'Meteorologi'),
(90, 'Meteorologi Terapan'),
(91, 'Mikrobiologi'),
(92, 'Okupasi Terapi'),
(93, 'Oseanografi'),
(94, 'Pariwisata'),
(95, 'Pemanfaatan Sumberdaya Perikanan'),
(96, 'Penyiaran'),
(97, 'Perencanaan dan Pengendalian Produksi Manufaktur/J'),
(98, 'Perencanaan Wilayah dan Kota'),
(99, 'Periklanan'),
(100, 'Perkebunan Kelapa Sawit'),
(101, 'Perumahsakitan'),
(102, 'Proteksi Tanaman'),
(103, 'Psikologi'),
(104, 'Rekayasa Hayati'),
(105, 'Rekayasa Infrastruktur Lingkungan'),
(106, 'Rekayasa Kehutanan'),
(107, 'Rekayasa Pertanian'),
(108, 'Sastra Arab'),
(109, 'Sastra Cina'),
(110, 'Sastra Daerah/Jawa'),
(111, 'Sastra Indonesia'),
(112, 'Sastra Inggris'),
(113, 'Sastra Jepang'),
(114, 'Sastra Jerman'),
(115, 'Sastra Prancis'),
(116, 'Sastra Slavia'),
(117, 'Seni Rupa'),
(118, 'Silvikultur'),
(119, 'Sistem dan Teknologi Informasi'),
(120, 'Sistem Informasi'),
(121, 'Sosiologi'),
(122, 'Statistika'),
(123, 'Supervisor Jaminan Mutu Pangan'),
(124, 'Teknik dan Manajemen Lingkungan'),
(125, 'Teknik dan Pengelolaan Sumber Daya Air'),
(126, 'Teknik Elektro'),
(127, 'Teknik Fisika (TF)'),
(128, 'Teknik Geodesi dan Geomatika'),
(129, 'Teknik Geofisika'),
(130, 'Teknik Geologi'),
(131, 'Teknik Geomatika'),
(132, 'Teknik Industri'),
(133, 'Teknik Informatika'),
(134, 'Teknik Kelautan'),
(135, 'Teknik Kimia'),
(136, 'Teknik Komputer'),
(137, 'Teknik Lingkungan'),
(138, 'Teknik Material '),
(139, 'Teknik Mesin'),
(140, 'Teknik Mesin dan Biosains'),
(141, 'Teknik Metalurgi'),
(142, 'Teknik Metalurgi dan Material'),
(143, 'Teknik Multimedia dan Jaringan'),
(144, 'Teknik Perkapalan'),
(145, 'Teknik Perminyakan'),
(146, 'Teknik Pertambangan'),
(147, 'Teknik Sipil'),
(148, 'Teknik Sipil dan Lingkungan'),
(149, 'Teknik Sistem Perkapalan'),
(150, 'Teknik Telekomunikasi'),
(151, 'Teknik Tenaga Listrik'),
(152, 'Teknologi & Manajemen Perikanan Budidaya'),
(153, 'Teknologi & Manajemen Perikanan Tangkap'),
(154, 'Teknologi Bioproses'),
(155, 'Teknologi dan Manajemen Ternak'),
(156, 'Teknologi Farmasi'),
(157, 'Teknologi Hasil Hutan'),
(158, 'Teknologi Hasil Perairan'),
(159, 'Teknologi Industri Benih'),
(160, 'Teknologi Industri Pertanian'),
(161, 'Teknologi Manajemen Perkebunan'),
(162, 'Teknologi Produksi & Pengembangan Masyarakat Perta'),
(163, 'Teknologi Produksi dan Manajemen Perikanan Budiday'),
(164, 'Teknologi Produksi Ternak'),
(165, 'Tingkat  I    (ANT I)'),
(166, 'Tingkat  I    (ATT I)'),
(167, 'Tingkat Dasar (ANT D)'),
(168, 'Tingkat Dasar (ATT D)'),
(169, 'Tingkat  II   (ANT II)'),
(170, 'Tingkat  II   (ATT II)'),
(171, 'Tingkat  III  (ANT III)'),
(172, 'Tingkat  III  (ATT III)'),
(173, 'Tingkat  IV  (ANT IV)'),
(174, 'Tingkat  IV  (ATT IV)'),
(175, 'Tingkat  V   (ANT V)'),
(176, 'Tingkat  V   (ATT V)');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
`id_province` int(11) NOT NULL,
  `province_name` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id_province`, `province_name`) VALUES
(1, 'Aceh D.I.'),
(2, 'Bali'),
(3, 'Bangka Belitung'),
(4, 'Banten'),
(5, 'Bengkulu'),
(6, 'Gorontalo'),
(7, 'Jakarta D.K.I.'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nusa Tenggara Barat'),
(22, 'Nusa Tenggara Timur'),
(23, 'Papua'),
(24, 'Papua Barat'),
(25, 'Riau'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Tenggara'),
(30, 'Sulawesi Utara'),
(31, 'Sumatra Barat'),
(32, 'Sumatra Selatan'),
(33, 'Sumatra Utara'),
(34, 'Yogyakarta D.I.');

-- --------------------------------------------------------

--
-- Table structure for table `schools_set`
--

CREATE TABLE IF NOT EXISTS `schools_set` (
`id_school` int(11) NOT NULL,
  `school_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=802 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools_set`
--

INSERT INTO `schools_set` (`id_school`, `school_name`) VALUES
(1, 'Universitas Airlangga/Surabaya'),
(2, 'Universitas Andalas/Padang'),
(3, 'Universitas Bengkulu/Bengkulu'),
(4, 'Universitas Brawijaya/Malang'),
(5, 'Universitas Cenderawasih/Papua Barat'),
(6, 'Universitas Diponegoro/Semarang'),
(7, 'Universitas Gadjah Mada/Yogyakarta'),
(8, 'Universitas Haluoleo/Kendari'),
(9, 'Universitas Hasanuddin/Makassar'),
(10, 'Universitas Indonesia/Jakarta'),
(11, 'Universitas Jambi/Jambi'),
(12, 'Universitas Jember/Jember'),
(13, 'Universitas Jenderal Soedirman/Purwokerto'),
(14, 'Universitas Lambung Mangkurat/Banjarmasin'),
(15, 'Universitas Lampung/Lampung'),
(16, 'Universitas Malikussaleh/Lhokseumawe'),
(17, 'Universitas Mataram/Mataram'),
(18, 'Universitas Mulawarman/Samarinda'),
(19, 'Universitas Negeri Gorontalo/Gorontalo'),
(20, 'Universitas Negeri Jakarta/Jakarta'),
(21, 'Universitas Negeri Makassar/Makassar'),
(22, 'Universitas Negeri Malang/Malang'),
(23, 'Universitas Negeri Manado/Menado'),
(24, 'Universitas Negeri Medan/Medan'),
(25, 'Universitas Negeri Padang/Padang'),
(26, 'Universitas Negeri Papua/Papua'),
(27, 'Universitas Negeri Semarang/Semarang'),
(28, 'Universitas Negeri Surabaya/Surabaya'),
(29, 'Universitas Negeri Yogyakarta/Yogyakarta'),
(30, 'Universitas Nusa Cendana/Kupang'),
(31, 'Universitas Padjadjaran/Bandung'),
(32, 'Universitas Palangkaraya/Palangkaraya'),
(33, 'Universitas Pattimura/Ambon'),
(34, 'Universitas Pendidikan Indonesia/Bandung'),
(35, 'Universitas Riau/Riau'),
(36, 'Universitas Sam Ratulangi/Menado'),
(37, 'Universitas Sebelas Maret/Surakarta'),
(38, 'Universitas Sriwijaya/Palembang'),
(39, 'Universitas Sultan Ageng Tirtayasa/Banten'),
(40, 'Universitas Sumatera Utara/Medan'),
(41, 'Universitas Syiah Kuala/Banda Aceh'),
(42, 'Universitas Tadulako/Palu'),
(43, 'Universitas Tanjungpura/Pontianak'),
(44, 'Universitas Terbuka/Jakarta'),
(45, 'Universitas Trunojoyo/Madura'),
(46, 'Universitas Udayana/Denpasar'),
(47, 'Universitas Terbuka/Palembang'),
(48, 'Institut Pertanian Bogor/Bogor'),
(49, 'Institut Seni Indonesia/Denpasar'),
(50, 'Institut Seni Indonesia/Yogyakarta'),
(51, 'Institut Teknologi Bandung/Bandung'),
(52, 'Institut Teknologi Sepuluh Nopember/Surabaya'),
(53, 'Institut Manajemen Koperasi Indonesia (IKOPIN)/Sum'),
(54, 'UIN Alauddin /Makassar'),
(55, 'UIN Antasari /Banjarmasin'),
(56, 'UIN Ar-Raniry/Banda Aceh'),
(57, 'UIN Imam Bonjol/Padang'),
(58, 'UIN Raden Fatah/Palembang'),
(59, 'UIN Raden Intan/Bandar Lampung'),
(60, 'UIN Sulthan Syarif Qosim/Pekanbaru'),
(61, 'UIN Sulthan Thaha Saifuddin/Jambi'),
(62, 'UIN Sumatera Utara/Medan'),
(63, 'UIN Sunan Ampel/Surabaya'),
(64, 'UIN Sunan Gunung Djati/Bandung'),
(65, 'UIN Sunan Kalijaga/Yogyakarta'),
(66, 'UIN Walisongo/Semarang'),
(67, 'UIN Syarif Hidayatullah/Jakarta'),
(68, 'PTK Akamigas-STEM Cepu/Cepu'),
(69, 'Sekolah Tinggi Seni Indonesia/Bandung'),
(70, 'Sekolah Tinggi Seni Indonesia/Surakarta'),
(71, 'Sekolah Tinggi Teknologi Tekstil/Bandung'),
(72, 'STAN/Jakarta'),
(73, 'STIA LAN/Jakarta'),
(74, 'Sekolah Tinggi Ilmu Pelayaran (STIP)/Jakarta'),
(75, 'Sekolah Tinggi Teknologi Angkatan Laut/Surabaya'),
(76, 'STIE Banten/Banten'),
(77, 'Universitas 17 Agustus 1945/Banyuwangi'),
(78, 'Universitas 17 Agustus 1945/Cirebon'),
(79, 'Universitas 17 Agustus 1945/Jakarta'),
(80, 'Universitas 17 Agustus 1945/Samarinda'),
(81, 'Universitas 17 Agustus 1945/Semarang'),
(82, 'Universitas 17 Agustus 1945/Surabaya'),
(83, 'Universitas Abdulrachman Saleh/Situbondo'),
(84, 'Universitas Abulyatama/Banda Aceh'),
(85, 'Universitas Advent Indonesia/Bandung'),
(86, 'Universitas Ahmad Dahlan /Yogyakarta'),
(87, 'Universitas Al Azhar Indonesia/Jakarta'),
(88, 'Universitas Al Azhar/Medan'),
(89, 'Universitas Amir Hamzah/Medan'),
(90, 'Universitas Asahan/Kisaran'),
(91, 'Universitas Atma Jaya/Jakarta'),
(92, 'Universitas Atma Jaya/Makassar'),
(93, 'Universitas Atma Jaya/Yogyakarta'),
(94, 'Universitas Bali/Bali'),
(95, 'Universitas Balikpapan/Balikpapan'),
(96, 'Universitas Bangka Belitung/Bangka'),
(97, 'Universitas Batanghari/Jambi'),
(98, 'Universitas Bhayangkara/Surabaya'),
(99, 'Universitas Bina Nusantara/Jakarta'),
(100, 'Universitas Bojonegoro/Bojonegoro'),
(101, 'Universitas Borneo/Tarakan'),
(102, 'Universitas Borobudur/Jakarta'),
(103, 'Universitas Bung Hatta/Padang'),
(104, 'Universitas Cokroaminoto/Yogyakarta'),
(105, 'Universitas Cut Nyak Dhien/Medan'),
(106, 'Universitas Darma Agung/Medan'),
(107, 'Universitas Darma Persada/Jakarta'),
(108, 'Universitas Darul''ulum/Jombang'),
(109, 'Universitas Dharma Wangsa/Medan'),
(110, 'Universitas Djuanda/Bogor'),
(111, 'Universitas Dr Soetomo/Surabaya'),
(112, 'Universitas Dwijendra/Denpasar'),
(113, 'Universitas Eka Sakti/Padang'),
(114, 'Universitas Flores/Flores'),
(115, 'Universitas Graha Nusantara/Padang Sidempuan'),
(116, 'Universitas Gresik/Gresik'),
(117, 'Universitas Gunadarma/Jakarta'),
(118, 'Universitas HKBP Nommensen/Medan'),
(119, 'Universitas Ibnu Khaldun/Bogor'),
(120, 'Universitas Ibnu Khaldun/Jakarta'),
(121, 'Universitas Indonusa Esa Unggul/Jakarta'),
(122, 'Universitas Indraprasta Pgri/Jakarta'),
(123, 'Universitas Internasional Ambon/Ambon'),
(124, 'Universitas Iskandar Muda/Banda Aceh'),
(125, 'Universitas Islam /Jakarta'),
(126, 'Universitas Islam Al Azar/Mataram'),
(127, 'Universitas Islam Bandung/Bandung'),
(128, 'Universitas Islam Indonesia/Yogyakarta'),
(129, 'Universitas Islam Kiyai Mojo/Surakarta'),
(130, 'Universitas Islam Labuhan Batu/Rantau Prapat'),
(131, 'Universitas Islam Lamongan/Lamongan'),
(132, 'Universitas Islam Malang/Malang'),
(133, 'Universitas Islam Nusantara/Bandung'),
(134, 'Universitas Islam Riau/Riau'),
(135, 'Universitas Islam Sultan Agung/Semarang'),
(136, 'Universitas Islam Sumatera Utara (UISU)/Medan'),
(137, 'Universitas Islam Syekh Yusuf/Jakarta'),
(138, 'Universitas Islam Syekh Yusuf/Tangerang'),
(139, 'Universitas Jabal Gafur/Sigli'),
(140, 'Universitas Jakarta/Jakarta'),
(141, 'Universitas Janabadra/Yogyakarta'),
(142, 'Universitas Jayabaya/Jakarta'),
(143, 'Universitas Jenderal Achmad Yani/Bandung'),
(144, 'Universitas Jenggala/Sidoarjo'),
(145, 'Universitas Kanjuruhan/Malang'),
(146, 'Universitas Karo/Kabanjahe'),
(147, 'Universitas Kartanegara/Trenggarong'),
(148, 'Universitas Kartini/Surabaya'),
(149, 'Universitas Katolik Widya Mandira/Kupang'),
(150, 'Universitas Katolik Parahyangan/Bandung'),
(151, 'Universitas Katolik Santo Thomas/Medan'),
(152, 'Universitas Katolik Soegijapranata/Semarang'),
(153, 'Universitas Katolik Widya Karya/Malang'),
(154, 'Universitas Kediri/Kediri'),
(155, 'Universitas Khairun/Ternate'),
(156, 'Universitas Klabat/Manado'),
(157, 'Universitas Komputer Indonesia/Bandung'),
(158, 'Universitas Kris.Ind.Paulus/Makassar'),
(159, 'Universitas Kris.Ind.Tomohon/Manado'),
(160, 'Universitas Krisnadwipayana/Jakarta'),
(161, 'Universitas Kristen Duta Wacana/Yogyakarta'),
(162, 'Universitas Kristen Indonesia/Jakarta'),
(163, 'Universitas Kristen Jaya/Jakarta'),
(164, 'Universitas Kristen Maranatha/Bandung'),
(165, 'Universitas Kristen Petra/Surabaya'),
(166, 'Universitas Kristen Satya Wacana/Salatiga'),
(167, 'Universitas Lancang Kuning/Pekanbaru'),
(168, 'Universitas Langlang Buana/Bandung'),
(169, 'Universitas M.Arsyadbanjari/Banjarmasin'),
(170, 'Universitas Madura/Pamekasan'),
(171, 'Universitas Mahasaraswati/Denpasar'),
(172, 'Universitas Mahasaraswati/Mataram'),
(173, 'Universitas Mahendradatta/Denpasar'),
(174, 'Universitas Malikussaleh/Lhokseumawe'),
(175, 'Universitas Mayjen.Sungkono/Mojokerto'),
(176, 'Universitas Medan Area (UMA)/Medan'),
(177, 'Universitas Merdeka/Madiun'),
(178, 'Universitas Merdeka/Malang'),
(179, 'Universitas Merdeka/Ponorogo'),
(180, 'Universitas Merdeka/Surabaya'),
(181, 'Universitas Methodist Indonesia/Medan'),
(182, 'Universitas Mochammadiyah Kupang/Kupang'),
(183, 'Universitas Moh.Sroedji/Jember'),
(184, 'Universitas Muhammadiyah Makassar/Makassar'),
(185, 'Universitas Muhammadiyah Banda Aceh/Banda Aceh'),
(186, 'Universitas Muhammadiyah Cirebon/Cirebon'),
(187, 'Universitas Muhammadiyah Jember/Jember'),
(188, 'Universitas Muhammadiyah Karanganyar/Karanganyar'),
(189, 'Universitas Muhammadiyah Magelang/Magelang'),
(190, 'Universitas Muhammadiyah Malang/Malang'),
(191, 'Universitas Muhammadiyah Mataram/Mataram'),
(192, 'Universitas Muhammadiyah Palembang/Palembang'),
(193, 'Universitas Muhammadiyah Prof. DR. HAMKA (UHAMKA)/'),
(194, 'Universitas Muhammadiyah Purwokerto/Purwokerto'),
(195, 'Universitas Muhammadiyah Purworejo/Purworejo'),
(196, 'Universitas Muhammadiyah Sidoarjo/Sidoarjo'),
(197, 'Universitas Muhammadiyah Sumatera Utara/Medan'),
(198, 'Universitas Muhammadiyah Sumbar/Padang'),
(199, 'Universitas Muhammadiyah Surabaya/Surabaya'),
(200, 'Universitas Muhammadiyah Surakarta/Surakarta'),
(201, 'Universitas Muhammadiyah Tapanuli Selatan/Padang S'),
(202, 'Universitas Muhammadiyah Yogyakarta/Yogyakarta'),
(203, 'Universitas Muria Kudus/Kudus'),
(204, 'Universitas Musamus/Merauke'),
(205, 'Universitas Muslim Indonesia/Jakarta'),
(206, 'Universitas Muslim Indonesia/Makassar'),
(207, 'Universitas Muslim Nusantara Al-Wasliyah/Medan'),
(208, 'Universitas Muslim Nusantara/Medan'),
(209, 'Universitas Narotama/Surabaya'),
(210, 'Universitas Nasional/Jakarta'),
(211, 'Universitas Ngurah Rai/Denpasar'),
(212, 'Universitas Nusa Bangsa/Bogor'),
(213, 'Universitas Nusantara/Manado'),
(214, 'Universitas Pakuan/Bogor'),
(215, 'Universitas Panca Bhakti/Pontianak'),
(216, 'Universitas Pancasakti/Tegal'),
(217, 'Universitas Pancasila/Jakarta'),
(218, 'Universitas Pasundan/Bandung'),
(219, 'Universitas Pekalongan/Pekalongan'),
(220, 'Universitas Pelita Harapan/Tangerang'),
(221, 'Universitas Pembangunan Masyarakat Indonesia/Medan'),
(222, 'Universitas Pembangunan Panca Budi/Medan'),
(223, 'Universitas Pend.Nasional / Denpasar'),
(224, 'Universitas Pepabri/Makassar'),
(225, 'Universitas Persada Indonesia YAI/Jakarta'),
(226, 'Universitas Prof.Dr.Moestopo/Jakarta'),
(227, 'Universitas Proklamasi ''45/Yogyakarta'),
(228, 'Universitas Respati Indonesia/Jakarta'),
(229, 'Universitas Samudra/Langsa'),
(230, 'Universitas Sanata Dharma/Yogyakarta'),
(231, 'Universitas Sarj.Wiyata T.Siswa/Yogyakarta'),
(232, 'Universitas Sedaya International/Jakarta'),
(233, 'Universitas Semarak/Bengkulu'),
(234, 'Universitas Semarang/Semarang'),
(235, 'Universitas Siliwangi/Tasikmalaya'),
(236, 'Universitas Simalungun/Medan'),
(237, 'Universitas Simalungun/Pematang Siantar'),
(238, 'Universitas Sisingamangaraja XII/Medan'),
(239, 'Universitas Sisingamangaraja XII/Siborong'),
(240, 'Universitas Sjakhyakirti/Palembang'),
(241, 'Universitas Slamet Riyadi/Surakarta'),
(242, 'Universitas Soerjo/Ngawi'),
(243, 'Universitas STIKUBANK/Semarang'),
(244, 'Universitas Sunan Giri/Surabaya'),
(245, 'Universitas Surabaya/Surabaya'),
(246, 'Universitas Surakarta/Surakarta'),
(247, 'Universitas Suryadarma/Jakarta'),
(248, 'Universitas Swadaya Gunung Jati/Cirebon'),
(249, 'Universitas Tabanan/Kediri'),
(250, 'Universitas Tarumanagara/Jakarta'),
(251, 'Universitas Teknologi Yogyakarta/Yogyakarta'),
(252, 'Universitas Tidar/Magelang'),
(253, 'Universitas Tirtayasa Serang/Banten'),
(254, 'Universitas Tri Dharma/Surabaya'),
(255, 'Universitas Tridinanti/Palembang'),
(256, 'Universitas Trisakti/Jakarta'),
(257, 'Universitas Trunajaya/Bontang'),
(258, 'Universitas Tunas Pembangunan/Surakarta'),
(259, 'Universitas Veteran A.Yani/Banjarmasin'),
(260, 'Universitas Veteran RI/Makassar'),
(261, 'Universitas Wangsa Manggala/Yogyakarta'),
(262, 'Universitas Waskita Dharma/Malang'),
(263, 'Universitas Widya Kartika/Surabaya'),
(264, 'Universitas Widyatama/Bandung'),
(265, 'Universitas Wijaya Kusuma/Surabaya'),
(266, 'Universitas Wijaya Putra/Surabaya'),
(267, 'Universitas Wijayakusuma/Purwokerto'),
(268, 'Universitas Wiralodra/Indramayu'),
(269, 'Universitas Wisnu Wardhana/Malang'),
(270, 'Universitas WR Supratman/Surabaya'),
(271, 'Universitas YARSI/Jakarta'),
(272, 'Universitas Yos Sudarso/Surabaya'),
(273, 'Universitas Katolik Widya Mandala/Surabaya'),
(274, 'UPN Veteran Jakarta/Jakarta'),
(275, 'UPN Veteran JATIM/Surabaya'),
(276, 'UPN Veteran Yogyakarta/Yogyakarta'),
(277, 'Swiss German University/Jakarta'),
(278, 'Universitas Tri Dharma/Balikpapan'),
(279, 'Universitas Harapan Kasih/Menado'),
(280, 'Universitas Ajakhyakirti/Palembang'),
(281, 'Universitas Tama Jagakarsa/Jakarta'),
(282, 'Universitas Putra Bangsa/Surabaya'),
(283, 'Universitas Surapati/Jakarta'),
(284, 'Universitas Palembang/Palembang'),
(285, 'Universitas Hangtuah/Surabaya'),
(286, 'Universitas Tri Dharma/Balikpapan'),
(287, 'Universitas Sains &Teknologi/Jayapura'),
(288, 'Universitas Palembang/Palembang'),
(289, 'Universitas Mercubuana/Jakarta'),
(290, 'Universitas Winaya Mukti/Sumedang'),
(291, 'Universitas Budi Luhur/Jakarta'),
(292, 'Universitas Islam Batik (UNIBA)/Surakarta'),
(293, 'Universitas 17 Agustus 1945/Makassar'),
(294, 'Universitas Sahid/ Jakarta'),
(295, 'Universitas Bina Darma/Palembang'),
(296, 'Universitas IBA/Palembang'),
(297, 'Universitas Nusa Nipa/Maumere'),
(298, 'IKIP Gunung Sitoli/Gunung Sitoli'),
(299, 'IKIP Mataram/Mataram'),
(300, 'IKIP PGRI Banyuwangi/Banyuwangi'),
(301, 'IKIP PGRI Bojonegoro/Bojonegoro'),
(302, 'IKIP PGRI Madiun/Madiun'),
(303, 'IKIP PGRI Malang/Malang'),
(304, 'IKIP PGRI Samarinda/Samarinda'),
(305, 'IKIP PGRI Surabaya/Surabaya'),
(306, 'IKIP PGRI Tuban/Tuban'),
(307, 'IKIP PGRI Wates/Yogyakarta'),
(308, 'IKIP Saraswati/Tabanan'),
(309, 'IKIP Veteran  Yogyakarta/Yogyakarta'),
(310, 'IKIP Veteran Semarang/Semarang'),
(311, 'IKIP Veteran Sukoharjo/Sukoharjo'),
(312, 'IKIP Widya Dharma/Surabaya'),
(313, 'IKIP Yayasan Pend.Klaten/Klaten'),
(314, 'Institut Hindu Dharma/Denpasar'),
(315, 'Institut Ilmu Keuangan'),
(316, 'Institut Ilmu Sospol/Jakarta'),
(317, 'Institut Informatika Indonesia (I-3)/Surabaya'),
(318, 'Institut Kesenian Jakarta/Jakarta'),
(319, 'Institut Pengembangan Manajemen Indonesia/Jakarta'),
(320, 'Institut Pertanian "Stiper" Yogyakarta/Yogyakarta'),
(321, 'Institut Sains & Teknologi Akprind /Yogyakarta'),
(322, 'Institut Sains & Teknologi TD Pardede/Medan'),
(323, 'Institut Sains Dan Teknologi Nasional/Jakarta'),
(324, 'Institut Teknologi Adhi Tama/Surabaya'),
(325, 'Institut Teknologi Dan Sains /Bandung'),
(326, 'Institut Teknologi Harapan Bangsa/Bandung'),
(327, 'Institut Teknologi Indonesia/Serpong'),
(328, 'Institut Teknologi Medan/Medan'),
(329, 'Institut Teknologi Nasional Bandung/Bandung'),
(330, 'Institut Teknologi Nasional/Malang'),
(331, 'Institut Teknologi Pembangunan/Surabaya'),
(332, 'Institut Teknologi Budi Utomo/Jakarta'),
(333, 'Sekolah Tinggi Teknologi Nasional /Yogyakarta'),
(334, 'ST Admnistrasi Dan Sekretari "ASMI"/Jakarta'),
(335, 'ST Bahasa Asing Harapan/Medan'),
(336, 'ST Bahasa Asing JIA/Bekasi'),
(337, 'ST Bahasa Asing LIA/Jakarta'),
(338, 'ST Bahasa Asing Swadaya/Medan'),
(339, 'ST Desain Indonesia (STDI)/Bandung'),
(340, 'ST Ekonomi Teladan/Medan'),
(341, 'ST Filsafat/Kupang'),
(342, 'ST Filsafat K."PRADNYA WIDYA"/YOGYAKARTA'),
(343, 'ST Filsafat Katolik Ledalero/Flores'),
(344, 'ST Filsafat Seminari/Pineleng'),
(345, 'ST Filsafat Theologi S Nusantara/Pematang Siantar'),
(346, 'ST Filsafat Widya Sasana/Malang'),
(347, 'ST Filsafat/Jakarta'),
(348, 'ST Filsafat Driyarkara/Jakarta'),
(349, 'ST Hukum Bandung/Bandung'),
(350, 'ST Hukum Galunggung/Tasikmalaya'),
(351, 'ST Hukum Pangkal Perjuangan/Karawang'),
(352, 'ST Hukum Pasundan/Sukabumi'),
(353, 'ST Hukum Purnawarman/Purwakarta'),
(354, 'ST Hukum Suryakancana/Cianjur'),
(355, 'ST Hukum YNI/Pematang Siantar'),
(356, 'ST Ilmu Bahasa Asing ITMI/Medan'),
(357, 'ST Ilmu Hukum Al-Hikmah/Medan'),
(358, 'ST Ilmu Hukum Benteng Huraba/Padang Sidempuan'),
(359, 'ST Ilmu Hukum Cut Nyak Dhien/Medan'),
(360, 'ST Ilmu Hukum Graha Kirana/Medan'),
(361, 'ST Ilmu Hukum Labuhan Batu/Rantau Prapat'),
(362, 'ST Ilmu Hukum Muhammadiyah Kisaran/Kisaran'),
(363, 'ST Ilmu Hukum Muhammadiyah Takengon/Takengon'),
(364, 'ST Ilmu Hukum Swadaya/Medan'),
(365, 'ST Ilmu Kehutanan Pante Kulu/Banda Aceh'),
(366, 'ST Ilmu Kesehatan Deli Husada/Delitua'),
(367, 'ST Ilmu Kesehatan Helvetia/Medan'),
(368, 'ST Ilmu Kesehatan Medistra/Lubuk Pakam'),
(369, 'ST Ilmu Kesehatan Mutiara Indonesia/Medan'),
(370, 'ST Ilmu Kesehatan Prima Husada/Medan'),
(371, 'ST Ilmu Kesehatan Takasima/Kabanjahe'),
(372, 'ST Ilmu Komunikasi Medan/Medan'),
(373, 'ST Ilmu Komunikasi Pembangunan/Medan'),
(374, 'ST Ilmu Manajemen Banda Aceh/Banda Aceh'),
(375, 'ST Ilmu Manajemen Masyarakat Pase/Langsa'),
(376, 'ST Ilmu Manajemen Medan/Medan'),
(377, 'ST Ilmu Manajemen Sukma/Medan'),
(378, 'ST Ilmu Pertanian Labuhan Batu/Rantau Prapat'),
(379, 'ST Ilmu Psikologi Harapan Bangsa/Banda Aceh'),
(380, 'ST Kelautan Dan Perikanan Indonesia/Medan'),
(381, 'ST Kesenian Wilwatikta/Surabaya'),
(382, 'ST Ketatalaksanaan Pelayaran Niaga/Jakarta'),
(383, 'STIM Labora/Jakarta'),
(384, 'ST Manajemen & Ilmu Komputer Logika/Medan'),
(385, 'ST Manajemen & Ilmu Komputer Meulaboh/Meulaboh'),
(386, 'ST Manajemen & Ilmu Komputer Mikroskil/Medan'),
(387, 'ST Manajemen & Ilmu Komputer Time/Medan'),
(388, 'ST Manajemen Prasetiya Mulya/Jakarta'),
(389, 'ST MGT  INDUST. Jakarta/Jakarta'),
(390, 'ST Olahraga & Kesehatan Binaguna/Medan'),
(391, 'ST Pariwisata Sahid/Surakarta'),
(392, 'ST Perikanan Sibolga/Sibolga'),
(393, 'ST Pertanian Al-Muslim/Bireuen'),
(394, 'ST Pertanian Benteng Huraba/Padang Sidempuan'),
(395, 'ST Pertanian Duta Nusantara /Medan'),
(396, 'ST Pertanian Gajah Putih/Takengon'),
(397, 'ST Pertanian Gunung Leuser/Kuta Cane'),
(398, 'ST Pertanian Jember/Jember'),
(399, 'ST Pertanian Meulaboh/Meulaboh'),
(400, 'ST Pertanian Namo Raya/Tebing Tinggi'),
(401, 'ST Pertanian/Yogyakarta'),
(402, 'ST Politik Cut Nyak Dhien /Medan'),
(403, 'ST Politik Surya Nusantara/Tebing Tinggi'),
(404, 'ST Psikologi Yogyakarta/Yogyakarta'),
(405, 'ST Seni Rupa Dan Desain Indonesia/Bandung'),
(406, 'ST Technologi Industri/Surabaya'),
(407, 'ST Teknik Atlas Nusantara/Malang'),
(408, 'ST Teknik Bina Cendikia/Banda Aceh'),
(409, 'ST Teknik Cut Nyak Dhien/Medan'),
(410, 'ST Teknik Duta Nusantara/Medan'),
(411, 'ST Teknik Graha Kirana/Medan'),
(412, 'ST Teknik Harapan/Medan'),
(413, 'ST Teknik Industri Glugur/Medan'),
(414, 'ST Teknik Iskandar Thani/Banda Aceh'),
(415, 'ST Teknik Pelita Bangsa/Binjai'),
(416, 'ST Teknik Raden Wijaya/Mojokerto'),
(417, 'ST Teknik Surabaya/Surabaya'),
(418, 'ST Teknologi Immanuel/Medan'),
(419, 'ST Teknologi Industri Serambi Mekah/Banda Aceh'),
(420, 'ST Teknologi Pertanian Serambi Mekah/Banda Aceh'),
(421, 'ST Theo.Ger.Kir.Injil.I/Jayapura'),
(422, 'ST Theo.Ind.Bag.Tmr/Makassar'),
(423, 'ST Theo.Jaffray./Makassar'),
(424, 'ST Theo.Kat.Abepura/Jayapura'),
(425, 'ST Theologi Duta Wacana/Yogyakarta'),
(426, 'ST Theologi HKBP/Pematang Siantar'),
(427, 'STBA YAPARI-ABA Bandung/Bandung'),
(428, 'STI Hukum/Manokwari'),
(429, 'STI Hukum Gozali/Sopeng'),
(430, 'STI Hukum Jend.Sudirman/Lumajang'),
(431, 'STI Hukum SM Tsjafioeddin/Singkawang'),
(432, 'STI Hukum Saburai/Tanjung Karang'),
(433, 'STI Hukum Sunan Giri/Malang'),
(434, 'STI Hukum Tambun Bungai/Palangkaraya'),
(435, 'STI Hukum Yayasan Samudra/Langsa'),
(436, 'STI Hukum Zainul Hasan/Probolinggo'),
(437, 'STI Kesej. Sosial/Makassar'),
(438, 'STI Man.Ind.Handayani/Denpasar'),
(439, 'STI Muhammadiyah Banda Aceh /Banda Aceh'),
(440, 'STI Pertanian Ind."YAPI"/Makassar'),
(441, 'STI Sospol 17 Agustus 45/Makassar'),
(442, 'STI Sospol Candradimuka/Palembang'),
(443, 'STI Sospol Imam Bonjol/Padang'),
(444, 'STI Sospol Iskandar Muda/Banda Aceh'),
(445, 'STI Sospol Merdeka/Manado'),
(446, 'STI Sospol Widuri/Jakarta'),
(447, 'STI Sospol/Garut'),
(448, 'STI Yayasan Swadaya/Jakarta'),
(449, 'STIA "Pawyatan Daha"/Kediri'),
(450, 'STIA "YAPPAN"/Jakarta'),
(451, 'STIA Al Amin/Sorong'),
(452, 'STIA Al Gazali/Barru'),
(453, 'STIA Al Gazali/Soppeng'),
(454, 'STIA Angkasa/Bandung'),
(455, 'STIA Banyuangga/Probolinggo'),
(456, 'STIA Bima/Bima'),
(457, 'STIA Bina Banua/Banjarmasin'),
(458, 'STIA Denpasar/Denpasar'),
(459, 'STIA Iskandar Thani/Banda Aceh'),
(460, 'STIA Kutawaringin/Subang'),
(461, 'STIA Lampung/Lampung'),
(462, 'STIA Malang/Malang'),
(463, 'STIA Malikusaleh/Medan'),
(464, 'STIA Mataram/Mataram'),
(465, 'STIA Maulana Yusuf/Banten'),
(466, 'STIA Nasional/Lhokseumawe'),
(467, 'STIA Palopo/Palopo'),
(468, 'STIA Puangrimanggalatung/Sengkang'),
(469, 'STIA Tasikmalaya/Tasikmalaya'),
(470, 'STIA"YAPPI"/Makassar'),
(471, 'STIE "Gajayana"/Malang'),
(472, 'STIE "Satya Widya"/Surabaya'),
(473, 'STIE ''45 Mataram/Mataram'),
(474, 'STIE Ahmad Dahlan/Jakarta'),
(475, 'STIE Al-Hikmah/Medan'),
(476, 'STIE Al-Washliyah/Sibolga'),
(477, 'STIE Artha Bodhi Iswara/Surabaya'),
(478, 'STIE Atmatera/Medan'),
(479, 'STIE Bandung/Bandung'),
(480, 'STIE Benteng Huraba/Padang Sidempuan'),
(481, 'STIE Bina Karya/Tebing Tinggi'),
(482, 'STIE Cut Nyak Dhien/Medan'),
(483, 'STIE Duta Nusantara/Medan'),
(484, 'STIE Eka Prasetya/Medan'),
(485, 'STIE Gajah Putih/Takengon'),
(486, 'STIE Graha Kirana/Medan'),
(487, 'STIE Gunung Leuser/Kutacane'),
(488, 'STIE Harapan/Medan'),
(489, 'STIE IBBI/Medan'),
(490, 'STIE IBMI/Medan'),
(491, 'STIE IBMT/Jakarta'),
(492, 'STIE Indonesia/Banjarmasin'),
(493, 'STIE Indonesia/Jakarta'),
(494, 'STIE Indonesia/Banda Aceh'),
(495, 'STIE Indonesia/Makassar'),
(496, 'STIE Indonesia/Surabaya'),
(497, 'STIE IPWI/Jakarta'),
(498, 'STIE IPWIJA/Jakarta'),
(499, 'STIE ITMI/Medang'),
(500, 'STIE Jagakarsa/Jakarta'),
(501, 'STIE Jaya Negara/Malang'),
(502, 'STIE Jember/Jember'),
(503, 'STIE Jenderal Sudirman/Medan'),
(504, 'STIE Kampus Ungu/Jakarta'),
(505, 'STIE Kesuma Negara (STIEKEN)/Blitar'),
(506, 'STIE Khalsa/Medan'),
(507, 'STIE L M Immanuel Indonesia/Medan'),
(508, 'STIE Labuhan Batu/Rantau Prapat'),
(509, 'STIE Mahardika/Surabaya'),
(510, 'STIE Makassar/Makassar'),
(511, 'STIE Malang Kucecwara/Malang'),
(512, 'STIE Malang/Malang'),
(513, 'STIE Mandala/Jember'),
(514, 'STIE Mars/Pematang Siantar'),
(515, 'STIE Merdeka/Pasuruan'),
(516, 'STIE Muhammadiyah Asahan/Kisaran'),
(517, 'STIE Muhammadiyah Ponorogo/Ponorogo'),
(518, 'STIE Muhammadiyah Samarinda/Samarinda'),
(519, 'STIE Nusa Bangsa/Medan'),
(520, 'STIE Nusantara/Jakarta'),
(521, 'STIE Palembang/Palembang'),
(522, 'STIE Pasundan/Bandung'),
(523, 'STIE Pelita Bangsa/Binjai'),
(524, 'STIE Pembangunan/Gunung Sitoli'),
(525, 'STIE PERBANAS Jakarta/Jakarta'),
(526, 'STIE PERBANAS Surabaya/Surabaya'),
(527, 'STIE PERTIBA/Pangkal Pinang'),
(528, 'STIE Riama/Medan'),
(529, 'STIE Sabang/Banda Aceh'),
(530, 'STIE Samudra/Langsa'),
(531, 'STIE Serambi Mekah/Banda Aceh'),
(532, 'STIE Soposurung/Balige'),
(533, 'STIE Sultan Agung/Pematang Siantar'),
(534, 'STIE Surabaya/Surabaya'),
(535, 'STIE Surya Nusantara/Pematang Siantar'),
(536, 'STIE Swadaya/Medan'),
(537, 'STIE Taman Harapan/Medan'),
(538, 'STIE Tjut Nya''dhien/Medan'),
(539, 'STIE Tri Dharma/Bandung'),
(540, 'STIE Tri Karya/Medan'),
(541, 'STIE Tricom/Medan'),
(542, 'STIE Tunas Nusantara/Jakarta'),
(543, 'STIE Urip Sumoharjo/Surabaya'),
(544, 'STIE Widya Gama/Malang'),
(545, 'STIE YAPIS/Jayapura'),
(546, 'STIE YHB/Banda Aceh'),
(547, 'STIE YKPN/Yogyakarta'),
(548, 'STIE YP Kampus/Padang Sidempuan'),
(549, 'STIKES, AKPER, DAN AKBID Helvetia /Medan'),
(550, 'STIKOM Bali/Bali'),
(551, 'STIKOM Balikpapan/Balikpapan'),
(552, 'STIKOM Surabaya/Surabaya'),
(553, 'STIM Jakarta/Jakarta'),
(554, 'STKI Pend. YBPK/Surabaya'),
(555, 'STKI Purnama/Jakarta'),
(556, 'STKI Wijaya Bhakti/Jakarta'),
(557, 'STKIP Abulyatama/Banda Aceh'),
(558, 'STKIP Almuslim – Bireuen/Bireuen'),
(559, 'STKIP Al-Washliyah/Banda Aceh'),
(560, 'STKIP Bangko/Maringin Baru'),
(561, 'STKIP Bima/Bima'),
(562, 'STKIP Budi Daya/Binjai'),
(563, 'STKIP Catur Sakti/Yogyakarta'),
(564, 'STKIP Cokroaminoto/Palopo'),
(565, 'STKIP Cokroaminoto/Pinrang'),
(566, 'STKIP Darul Dakwah/Polewali'),
(567, 'STKIP Galuh/Ciamis'),
(568, 'STKIP Gunung Leuser/Kutacane'),
(569, 'STKIP Hamzanwadi/Pancor Selong'),
(570, 'STKIP Jabal Ghafur/Sigli'),
(571, 'STKIP Jambi/Jambi'),
(572, 'STKIP Kristen/Makali'),
(573, 'STKIP Kuningan/Kuningan'),
(574, 'STKIP Kusumanegara/Jakarta'),
(575, 'STKIP Labuhan Batu/Rantau Prapat'),
(576, 'STKIP Muhamadiyah Bone/Wetampone'),
(577, 'STKIP Muhammadiyah  Metro/Metro'),
(578, 'STKIP Muhammadiyah  Pringsewu/Pringsewu'),
(579, 'STKIP Muhammadiyah  Sidenreng Rappa/Sidenreng Rapp'),
(580, 'STKIP Muhammadiyah Barru/Barru'),
(581, 'STKIP Muhammadiyah Bengkulu/Bengkulu'),
(582, 'STKIP Muhammadiyah Bulukumba/Bulukumba'),
(583, 'STKIP Muhammadiyah Enrekang/Enrekang'),
(584, 'STKIP Muhammadiyah Kotabumi /Kotabumi'),
(585, 'STKIP Muhammadiyah Pare Pare/Pare Pare'),
(586, 'STKIP Pelita Bangsa/Binjai'),
(587, 'STKIP PGRI  Lamongan/Lamongan'),
(588, 'STKIP PGRI  Ponorogo/Ponorogo'),
(589, 'STKIP PGRI Bandar Lampung/Bandar Lampung'),
(590, 'STKIP PGRI Bangalan/Bangalan'),
(591, 'STKIP PGRI Blitar/Blitar'),
(592, 'STKIP PGRI Jakarta/Jakarta'),
(593, 'STKIP PGRI Jember/Jember'),
(594, 'STKIP PGRI Jombang/Jombang'),
(595, 'STKIP PGRI Magetan/Magetan'),
(596, 'STKIP PGRI Nganjuk/Nganjuk'),
(597, 'STKIP PGRI Ngawi/Ngawi'),
(598, 'STKIP PGRI Pasuruan/Pasuruan'),
(599, 'STKIP PGRI Pontianak /Pontianak'),
(600, 'STKIP PGRI Probolinggo/Probolinggo'),
(601, 'STKIP PGRI Semarang/Semarang'),
(602, 'STKIP PGRI Situbondo/Situbondo'),
(603, 'STKIP PGRI Trenggalek/Trenggalek'),
(604, 'STKIP PGRI Tulung Agung/Tulung Agung'),
(605, 'STKIP Puangrimanggalatung/Sengkang'),
(606, 'STKIP Riama/Medan'),
(607, 'STKIP Saburai /Tanjung Karang'),
(608, 'STKIP Serambi Mekah/Banda Aceh'),
(609, 'STKIP Sumbawa Besar/Sumbawa Besar'),
(610, 'STKIP Suryakancana/Cianjur'),
(611, 'STKIP Tapanuli Selatan/Padang Sidempuan'),
(612, 'STKIP Teladan/Medan'),
(613, 'STKIP Tompotika/Luwuk Banggai'),
(614, 'STKIP Veteran Sidrap/Pangkajene Sidrap'),
(615, 'STKIP Widya Mandala/Madiun'),
(616, 'STKIP Widya Yuana/Madiun'),
(617, 'STMIK AMIK Bandung/Bandung'),
(618, 'STMIK  Mikroskil /Medan'),
(619, 'STMIK & AMIK Logika /Medan'),
(620, 'STMIK Abulyatama/Banda Aceh'),
(621, 'STMIK AKAKOM /Yogyakarta'),
(622, 'STMIK AMIKOM/Yogyakarta'),
(623, 'STMIK Banjarbaru/Banjarbaru'),
(624, 'STMIK Bina Bangsa/Lhokseumawe'),
(625, 'STMIK Budi Darma/Medan'),
(626, 'STMIK Budi Luhur/Jakarta'),
(627, 'STMIK CIC Cirebon/Cirebon'),
(628, 'STMIK Darmajaya/Lampung'),
(629, 'STMIK Dharma Bangsa/Yogyakarta'),
(630, 'STMIK Dian Nuswantoro/Semarang'),
(631, 'STMIK Gunadarma/Jakarta'),
(632, 'STMIK Indo Global Mandiri (IGM)/Palembang'),
(633, 'STMIK Indonesia Malang/Malang'),
(634, 'STMIK Indonesia Mandiri/Bandung'),
(635, 'STMIK Kaputama/Binjai'),
(636, 'STMIK Kharisma/Makassar'),
(637, 'STMIK Multi Data/Palembang'),
(638, 'STMIK Pontianak/Pontianak'),
(639, 'STMIK Pradnya Paramitha/Malang'),
(640, 'STMIK Sisingamangaraja XII/Medan'),
(641, 'STMIK Swadharma/Jakarta'),
(642, 'STMIK Widya Cipta Dharma /Samarinda'),
(643, 'STMIK Widya Pratama/Pekalongan'),
(644, 'STT Jakarta (STTJ)/Jakarta'),
(645, 'STT Malikusaleh/Banda Aceh'),
(646, 'STT Mesin Medan/Medan'),
(647, 'STT Nurul Jadid/Probolinggo'),
(648, 'STT Telkom/Bandung'),
(649, 'STT Wastukancana/Purwakarta'),
(650, 'STIE Pioneer/Menado'),
(651, 'STT Wiworotomo/Purwokerto'),
(652, 'STIKES Respati/Tasikmalaya'),
(653, 'Sekolah Tinggi Manajemen IMMI/Jakarta'),
(654, 'STIE Isti Ekatana Upaweda (IEU)/Yogyakarta'),
(655, 'STIE Kerjasama/Yogyakarta'),
(656, 'STIE Dharma Putra/Semarang'),
(657, 'STKIP Siliwangi/Cimahi'),
(658, 'STIA Lancang Kuning/Dumai'),
(659, 'STISIPOL Silas Papare/Jayapura'),
(660, 'STIE Muhammadiyah/Cilacap'),
(661, 'STKIP Cimahi/Bandung'),
(662, 'STIE AMA Salatiga/Salatiga'),
(663, 'STIE Kesuma Negara (STIEKEN)/Jakarta'),
(664, 'STIE Widya Jayakarta/Jakarta'),
(665, 'STIE Bisnis Indonesia/Jakarta'),
(666, 'STIE Bajiminasa/Makassar'),
(667, 'STIKOM The London School of Public Relation/Jakart'),
(668, 'STIA Makassar/Makassar'),
(669, 'STIE SATRIA/Purwokerto'),
(670, 'STIE Yasmi/Cirebon'),
(671, 'STIE Kerjasama/Yogyakarta'),
(672, 'STIE YPUP/Makassar'),
(673, 'STIE YASMI/Cirebon'),
(674, 'STKIP Siliwangi/Bandung'),
(675, 'Sekolah Tinggi Ilmu Manajemen LPI/Makassar'),
(676, 'Sekolah Tinggi Teknologi Minyak dan Gas Bumi (STT '),
(677, 'STIE Yayasan Administrasi Indonesia/Jakarta'),
(678, 'Sekolah Tinggi Manajemen Informatika Komputer/Jaka'),
(679, 'School of Business & Management ITB/Bandung'),
(680, 'Universitas Dumoga Kotamobagu/Kotamobagu'),
(681, 'Sekolah Tinggi Ilmu Komputer POLTEK/Cirebon'),
(682, 'STIE Kesatuan Bogor/Bogor'),
(683, 'STMIK Nusa Mandiri/Jakarta'),
(684, 'ST Ilmu Hukum Sumpah Pemuda Palembang/Palembang'),
(685, 'Universitas Pramita Indonesia/Tangerang'),
(686, 'STIE Bhakti Pembangunan/Jakarta'),
(687, 'STIE Teladan/Medan'),
(688, 'Sekolah Tinggi Teknologi Texmaco/Subang'),
(689, 'STIE Muhammadiyah/Jakarta'),
(690, 'Universitas Bina Darma/Jakarta'),
(691, 'STIE Al-Anwar/Mojokerto'),
(692, 'Universitas Tamansiswa/Palembang'),
(693, 'STIE Jambi/Jambi'),
(694, 'STIE APRIN/Palembang'),
(695, 'STIE Pelita Bangsa/Bekasi'),
(696, 'Universitas Mpu Tantular/Jakarta'),
(697, 'Sekolah Tinggi Teknik Malang / Malang'),
(698, 'STIE MH Thamrin / Jakarta'),
(699, 'Sekolah Tinggi Manajemen PPM/Jakarta'),
(700, 'STIE International Golden Institute/Jakarta'),
(701, 'Universitas Bung Karno/Jakarta'),
(702, 'STIMIK Perbanas/Jakarta'),
(703, 'STEKPI/Jakarta'),
(704, 'Universitas Paramadina/Jakarta'),
(705, 'STIE Ottow & Geissler/Jayapura'),
(706, 'STIE Cirebon/Cirebon'),
(707, 'STIE Solusi Bisnis Indonesia /Yogyakarta'),
(708, 'STIE Gotong Royong/Jakarta'),
(709, 'Sekolah Tinggi Manajemen Transport Trisakti/Jakart'),
(710, 'Sekolah Tinggi Teknologi (STT) Dumai/Dumai'),
(711, 'Universitas Muhammadiyah Luwuk/ Luwuk'),
(712, 'Universitas Muhammadiyah Jakarta/Jakarta'),
(713, 'Universitas Sang Bumi Ruwa Jurai/Bandar Lampung'),
(714, 'Sekolah Tinggi Hukum Indonesia/Jakarta'),
(715, 'Institut Agama Islam Imam Ghazali / Cilacap'),
(716, 'STIE IBII / Jakarta'),
(717, 'Institut Teknologi Minaesa / Tomohon'),
(718, 'STIE Widya Manggala / Semarang'),
(719, 'Institut Sains & Teknologi Palapa / Malang'),
(720, 'Politeknik Negeri Banjarmasin'),
(721, 'Sekolah Tinggi Hukum Militer AHM-PTHM / Jakarta'),
(722, 'STIP Widya Dharma / Palembang'),
(723, 'STISIP Mbojo Bima /NTB'),
(724, 'Universitas Tulang Bawang / Lampung'),
(725, 'STIE Supra / Jakarta'),
(726, 'Universitas Satria Makassar'),
(727, 'Totalwin Institute Of Management / Yogyakarta'),
(728, 'STIE Mitra Indonesia / Yogyakarta'),
(729, 'STTL Yayasan Lingkungan Hidup / Yogyakarta'),
(730, 'STT Ronggolawe Cepu'),
(731, 'Universitas Panca Marga / Probolinggo'),
(732, 'Universitas Kader Bangsa / Palembang'),
(733, 'Universitas Baturaja'),
(734, 'Universitas Satya Negara Indonesia / Jakarta'),
(735, 'Universitas Kristen Cipta Wacana / Malang'),
(736, 'Universitas Widya Mataram / Yogyakarta'),
(737, 'Universitas Tritunggal / Surabaya'),
(738, 'Universitas Islam 45 / Bekasi'),
(739, 'Universitas Alkhairaat / Palu'),
(740, 'Universitas PGRI Adi Buana / Surabaya'),
(741, 'STIE Pancasetia / Banjarmasin'),
(742, 'STIKES Abdi Nusa / Pangkal Pinang'),
(743, 'STIE Adhy Niaga / Bekasi'),
(744, 'STIE Adi Unggul Bhirawa / Surakarta'),
(745, 'Universitas Ars Internasional / Bandung'),
(746, 'STMIK Yadika Bangil / Pasuruan'),
(747, 'STIE Tamansiswa / Jakarta'),
(748, 'STIE Mulia Pratama / Bekasi'),
(749, 'STIE YPKP / Bandung'),
(750, 'STIE Gema Widya Bangsa / Bandung'),
(751, 'STIE YPM / Sidoarjo'),
(752, 'STIE Pengembangan Bisnis & Manajemen / Jakarta'),
(753, 'STIE Kalpataru / Bogor'),
(754, 'STIE Muhammadiyah Palopo / Makassar'),
(755, 'STIM LPMI / Jakarta'),
(756, 'STIK Tamalatea / Makassar'),
(757, 'STIM Lasharan Jaya / Makassar'),
(758, 'STIE Kertanegara / Malang'),
(759, 'STIE Mah-Eisa / Manokwari'),
(760, 'STIE Widya Wiwaha / Yogyakarta'),
(761, 'STIE Tri Dharma Widya / Jakarta'),
(762, 'STIE Ganesha / Jakarta'),
(763, 'STIE Inaba / Bandung'),
(764, 'Sekolah Tinggi Ilmu Manajemen / Banjarmasin'),
(765, 'Sekolah Tinggi Manajemen Industri / Jakarta'),
(766, 'STMIK Bina Bangsa / Kendari'),
(767, 'University of Tulsa/USA'),
(768, 'Victoria University of Wellington/New Zealand'),
(769, 'United Nation University/Reykjavik - Iceland'),
(770, 'University of Auckland/Auckland - New Zealand'),
(771, 'University Of Hannover/Hannover - German'),
(772, 'University of Huddersfield/United Kingdom'),
(773, 'Leningrad State University/Rusia'),
(774, 'Royal Melbourne Institute of Technology/Melbourne-'),
(775, 'The University of Queensland/Australia'),
(776, 'Curtin University of Technology/Australia'),
(777, 'Michigan State University/USA'),
(778, 'Business Administration & Economic College of Notr'),
(779, 'University of Groningen/Netherlands'),
(780, 'Edith Cowan University / Perth - Australia'),
(781, 'University of New South Wales/ Australia'),
(782, 'University of Adelaide/ Australia'),
(783, 'HEC Montreal / Quebec-Canada'),
(784, 'University of Essex/ England'),
(785, 'University of Leeds/ England'),
(786, 'Offenburg University/ Germany'),
(787, 'World Maritime University / Malmo - Sweden'),
(788, 'American Global University /California - USA'),
(789, 'Boston University / Massachusetts - USA'),
(790, 'University of Utah/ USA'),
(791, 'Urbana University / Ohio - USA'),
(792, 'University of Arizona/ USA'),
(793, 'Oklahoma City University/ USA'),
(794, 'University of Wisconsin / Madison - USA'),
(795, 'West Virginia University/ USA'),
(796, 'American University Washington College of Law/ USA'),
(797, 'VU University / Amsterdam - Netherlands'),
(798, 'University of The East / Manila'),
(799, 'Lain-lain'),
(801, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `skills_set`
--

CREATE TABLE IF NOT EXISTS `skills_set` (
`id_skill` int(11) NOT NULL,
  `skill_name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills_set`
--

INSERT INTO `skills_set` (`id_skill`, `skill_name`) VALUES
(1, 'Desain Grafis'),
(2, 'Ilustrator'),
(3, 'Photoshop'),
(4, 'Corel Draw'),
(5, 'Adobe Ilustrator'),
(6, 'Fotografi'),
(7, 'Adobe After Effect'),
(8, 'Adobe Premiere'),
(9, 'Adobe In design'),
(10, 'Menggambar Sketsa'),
(11, 'Akutansi/Keuangan'),
(12, 'Melukis'),
(13, 'Memasak'),
(14, 'Matematika'),
(15, 'Ilmu Pengetahuan Sosial'),
(16, 'Ilmu Pengetahuan Alam'),
(17, 'Kimia'),
(18, 'Fisika'),
(19, 'Filsafat'),
(20, 'Sejarah'),
(21, 'Biologi'),
(22, 'Sosiologi'),
(23, 'Komunikatif'),
(24, 'Lobbying'),
(25, 'Marketing'),
(26, 'Ekonomi'),
(27, 'Barista'),
(28, 'Mengemudi Sepeda Motor'),
(29, 'Mengemudi Mobil'),
(30, 'Mengemudi Truk'),
(31, 'Web Desain'),
(32, 'SEO'),
(33, 'Copywriting'),
(34, 'Digital Marketing'),
(35, 'Penerjemah'),
(36, 'Teknik Sipil'),
(37, 'Teknik Elektro'),
(38, 'Teknik Mesin'),
(39, 'Teknik Arsitektur'),
(40, 'Teknik Industri'),
(41, 'Proggraming'),
(42, 'AutoCAD'),
(43, 'Menulis'),
(44, 'Admin Sosial Media'),
(45, 'Teknik Perkayuan'),
(46, 'Menggambar');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id_img` int(11) NOT NULL,
  `img` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_img`, `img`) VALUES
(1, 'image-1.jpg'),
(2, 'image-2.jpg'),
(3, 'image-3.jpg'),
(7, '4fdb7b926bfbc62a8bde95dc2347e074.png');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
`id_worker` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id_worker`, `fullname`, `username`, `email`, `password`, `created_time`, `last_login`) VALUES
(1, 'Ilyas Habiburrahman', 'yayashrn', 'ilyashabhab@gmail.com', 'af1264cbdb9d5b3c7b401168118726fd', '2016-01-23 06:58:39', '2016-03-05 04:04:29'),
(2, 'Idris Izzaturrahman H', 'idrisih', 'idrisizzaturrahman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-01-23 07:13:57', '0000-00-00 00:00:00'),
(3, 'Isyah Auliarahmani Rafifa', 'isyahARR', 'isyahauliahamani@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-01-23 07:21:32', '0000-00-00 00:00:00'),
(9, 'Kurnia Dwi Agustin', 'kurniadwiarr', 'kurniadwiar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-02-01 11:07:46', '2016-01-31 18:04:51'),
(10, 'Cahya Wahyu Pratama', 'cahyawahyu', 'cahyawahyu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-02-01 13:17:38', '2016-01-31 19:18:37'),
(11, 'Alif Lutfi Mulya Pratama', 'aliflmp', 'aliflmp@gmail.com', 'af1264cbdb9d5b3c7b401168118726fd', '2016-02-15 19:22:17', '0000-00-00 00:00:00'),
(12, 'Naufal Fathin', 'nfathin', 'nfathin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-02-16 07:44:17', '2016-02-15 19:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `w_achievement`
--

CREATE TABLE IF NOT EXISTS `w_achievement` (
`id_w_achievement` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `ach_name` varchar(30) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `w_education`
--

CREATE TABLE IF NOT EXISTS `w_education` (
`id_w_education` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `id_school` int(11) NOT NULL,
  `id_mayor` int(11) NOT NULL,
  `year_in` year(4) NOT NULL,
  `year_out` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_education`
--

INSERT INTO `w_education` (`id_w_education`, `id_worker`, `id_school`, `id_mayor`, `year_in`, `year_out`) VALUES
(1, 1, 4, 120, 2012, '2016'),
(2, 1, 10, 52, 1994, '1998'),
(4, 1, 48, 120, 2012, 'Sekarang'),
(5, 1, 48, 8, 2013, 'Sekarang'),
(6, 12, 5, 4, 2013, 'Sekarang');

-- --------------------------------------------------------

--
-- Table structure for table `w_experience`
--

CREATE TABLE IF NOT EXISTS `w_experience` (
`id_w_experience` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `company` varchar(45) NOT NULL,
  `position` varchar(30) NOT NULL,
  `year_in` year(4) NOT NULL,
  `year_out` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_experience`
--

INSERT INTO `w_experience` (`id_w_experience`, `id_worker`, `company`, `position`, `year_in`, `year_out`) VALUES
(1, 1, 'Google Inc.', 'Database Administrator', 2012, '2014'),
(2, 9, 'IPB', 'Dosen Arsitektur', 2012, '2011'),
(3, 1, 'Web Developper', 'IBM Corp.', 2015, 'Sekarang'),
(4, 12, 'PT. Gabut', 'Gabut', 2002, '2003');

-- --------------------------------------------------------

--
-- Table structure for table `w_identity`
--

CREATE TABLE IF NOT EXISTS `w_identity` (
`id_identity` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `telp_number` varchar(15) NOT NULL,
  `dob` date DEFAULT NULL,
  `pob` int(11) NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `domicile` int(11) DEFAULT NULL,
  `about` text NOT NULL,
  `avatar` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_identity`
--

INSERT INTO `w_identity` (`id_identity`, `id_worker`, `nickname`, `telp_number`, `dob`, `pob`, `gender`, `address`, `domicile`, `about`, `avatar`) VALUES
(12, 1, 'Ilyas', '085719311994', '0000-00-00', 162, 1, 'Jl. LA Sucipto Gang 1 no. 1', 87, 'Biasa saja', '9e0f3298da3afd11a5adb8ba7dfe9daf.jpg'),
(13, 9, 'Kurnia', '034535', '1995-02-18', 169, 2, 'Jl. dfdsfsfsfsdfsf', 170, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'c5d2752c2b19c621b7d2873821396fad.jpg'),
(14, 10, '', '', NULL, 0, NULL, '', NULL, '', ''),
(15, 3, 'Isyah', '0', '0000-00-00', 0, 1, '', 0, '', ''),
(18, 2, 'Idris', '0', '0000-00-00', 116, 1, 'Jl. Kemang Dahlia Raya E8\nKemang Pratama 2', 83, '', '7538cd95da9da875a94bc3042a15ac3c.jpg'),
(19, 11, '', '', NULL, 0, NULL, '', NULL, '', ''),
(20, 12, '', '08797657654', '2016-02-17', 88, 2, 'Bogor kampung', 162, 'anak kampung bogor', '436d1a0af3c4a1d9750098d7b252162f.png');

-- --------------------------------------------------------

--
-- Table structure for table `w_language`
--

CREATE TABLE IF NOT EXISTS `w_language` (
`id_w_language` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_language`
--

INSERT INTO `w_language` (`id_w_language`, `id_worker`, `id_language`) VALUES
(38, 1, 2),
(39, 9, 2),
(40, 9, 3),
(41, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `w_skill`
--

CREATE TABLE IF NOT EXISTS `w_skill` (
`id_w_skill` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_skill`
--

INSERT INTO `w_skill` (`id_w_skill`, `id_worker`, `id_skill`) VALUES
(79, 1, 2),
(80, 1, 4),
(81, 1, 5),
(82, 9, 2),
(83, 9, 3),
(84, 9, 5),
(85, 12, 2),
(86, 12, 3),
(87, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `w_training`
--

CREATE TABLE IF NOT EXISTS `w_training` (
`id_w_training` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `course_name` varchar(35) NOT NULL,
  `institution` varchar(35) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_training`
--

INSERT INTO `w_training` (`id_w_training`, `id_worker`, `course_name`, `institution`, `year`) VALUES
(1, 1, 'ESQ', 'MUI', 2012);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`id_cont`);

--
-- Indexes for table `c_hired`
--
ALTER TABLE `c_hired`
 ADD PRIMARY KEY (`id_hired`), ADD KEY `id_status` (`id_status`), ADD KEY `id_worker` (`id_worker`), ADD KEY `id_job` (`id_job`), ADD KEY `id_company` (`id_company`);

--
-- Indexes for table `c_hired_status`
--
ALTER TABLE `c_hired_status`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `c_identity`
--
ALTER TABLE `c_identity`
 ADD PRIMARY KEY (`id_identity`), ADD KEY `id_company` (`id_company`), ADD KEY `domicile` (`domicile`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
 ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `hak`
--
ALTER TABLE `hak`
 ADD PRIMARY KEY (`id_hak`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
 ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
 ADD PRIMARY KEY (`id_post`), ADD KEY `id_company` (`id_company`), ADD KEY `id_job_category` (`id_job_category`);

--
-- Indexes for table `job_req_skill`
--
ALTER TABLE `job_req_skill`
 ADD PRIMARY KEY (`id_job_req`), ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
 ADD PRIMARY KEY (`id_sub_category`), ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `kewajiban`
--
ALTER TABLE `kewajiban`
 ADD PRIMARY KEY (`id_kewajiban`);

--
-- Indexes for table `languages_set`
--
ALTER TABLE `languages_set`
 ADD PRIMARY KEY (`id_language`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id_location`), ADD KEY `id_city` (`id_city`), ADD KEY `id_province` (`id_province`);

--
-- Indexes for table `mayors_set`
--
ALTER TABLE `mayors_set`
 ADD PRIMARY KEY (`id_mayor`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
 ADD PRIMARY KEY (`id_province`);

--
-- Indexes for table `schools_set`
--
ALTER TABLE `schools_set`
 ADD PRIMARY KEY (`id_school`);

--
-- Indexes for table `skills_set`
--
ALTER TABLE `skills_set`
 ADD PRIMARY KEY (`id_skill`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
 ADD PRIMARY KEY (`id_worker`);

--
-- Indexes for table `w_achievement`
--
ALTER TABLE `w_achievement`
 ADD PRIMARY KEY (`id_w_achievement`), ADD KEY `id_worker` (`id_worker`);

--
-- Indexes for table `w_education`
--
ALTER TABLE `w_education`
 ADD PRIMARY KEY (`id_w_education`), ADD KEY `id_worker` (`id_worker`), ADD KEY `id_mayor` (`id_mayor`), ADD KEY `id_school` (`id_school`);

--
-- Indexes for table `w_experience`
--
ALTER TABLE `w_experience`
 ADD PRIMARY KEY (`id_w_experience`), ADD KEY `id_worker` (`id_worker`);

--
-- Indexes for table `w_identity`
--
ALTER TABLE `w_identity`
 ADD PRIMARY KEY (`id_identity`), ADD KEY `id_worker` (`id_worker`), ADD KEY `domicile` (`domicile`);

--
-- Indexes for table `w_language`
--
ALTER TABLE `w_language`
 ADD PRIMARY KEY (`id_w_language`), ADD KEY `id_worker` (`id_worker`), ADD KEY `id_language` (`id_language`);

--
-- Indexes for table `w_skill`
--
ALTER TABLE `w_skill`
 ADD PRIMARY KEY (`id_w_skill`), ADD KEY `id_worker` (`id_worker`), ADD KEY `id_skill` (`id_skill`);

--
-- Indexes for table `w_training`
--
ALTER TABLE `w_training`
 ADD PRIMARY KEY (`id_w_training`), ADD KEY `id_worker` (`id_worker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=501;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id_cont` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `c_hired`
--
ALTER TABLE `c_hired`
MODIFY `id_hired` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `c_hired_status`
--
ALTER TABLE `c_hired_status`
MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `c_identity`
--
ALTER TABLE `c_identity`
MODIFY `id_identity` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hak`
--
ALTER TABLE `hak`
MODIFY `id_hak` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `job_req_skill`
--
ALTER TABLE `job_req_skill`
MODIFY `id_job_req` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
MODIFY `id_sub_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `kewajiban`
--
ALTER TABLE `kewajiban`
MODIFY `id_kewajiban` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `languages_set`
--
ALTER TABLE `languages_set`
MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=501;
--
-- AUTO_INCREMENT for table `mayors_set`
--
ALTER TABLE `mayors_set`
MODIFY `id_mayor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
MODIFY `id_province` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `schools_set`
--
ALTER TABLE `schools_set`
MODIFY `id_school` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=802;
--
-- AUTO_INCREMENT for table `skills_set`
--
ALTER TABLE `skills_set`
MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
MODIFY `id_worker` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `w_achievement`
--
ALTER TABLE `w_achievement`
MODIFY `id_w_achievement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `w_education`
--
ALTER TABLE `w_education`
MODIFY `id_w_education` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `w_experience`
--
ALTER TABLE `w_experience`
MODIFY `id_w_experience` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `w_identity`
--
ALTER TABLE `w_identity`
MODIFY `id_identity` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `w_language`
--
ALTER TABLE `w_language`
MODIFY `id_w_language` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `w_skill`
--
ALTER TABLE `w_skill`
MODIFY `id_w_skill` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `w_training`
--
ALTER TABLE `w_training`
MODIFY `id_w_training` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `c_hired`
--
ALTER TABLE `c_hired`
ADD CONSTRAINT `c_hired_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `c_hired_status` (`id_status`),
ADD CONSTRAINT `c_hired_ibfk_2` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`),
ADD CONSTRAINT `c_hired_ibfk_3` FOREIGN KEY (`id_job`) REFERENCES `job_post` (`id_post`),
ADD CONSTRAINT `c_hired_ibfk_4` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);

--
-- Constraints for table `c_identity`
--
ALTER TABLE `c_identity`
ADD CONSTRAINT `c_identity_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);

--
-- Constraints for table `job_post`
--
ALTER TABLE `job_post`
ADD CONSTRAINT `job_post_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`),
ADD CONSTRAINT `job_post_ibfk_5` FOREIGN KEY (`id_job_category`) REFERENCES `job_sub_categories` (`id_sub_category`);

--
-- Constraints for table `job_req_skill`
--
ALTER TABLE `job_req_skill`
ADD CONSTRAINT `job_req_skill_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `job_post` (`id_post`);

--
-- Constraints for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
ADD CONSTRAINT `job_sub_categories_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `job_categories` (`id_category`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`),
ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`id_province`) REFERENCES `province` (`id_province`);

--
-- Constraints for table `w_achievement`
--
ALTER TABLE `w_achievement`
ADD CONSTRAINT `w_achievement_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`);

--
-- Constraints for table `w_education`
--
ALTER TABLE `w_education`
ADD CONSTRAINT `w_education_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`),
ADD CONSTRAINT `w_education_ibfk_2` FOREIGN KEY (`id_mayor`) REFERENCES `mayors_set` (`id_mayor`),
ADD CONSTRAINT `w_education_ibfk_3` FOREIGN KEY (`id_school`) REFERENCES `schools_set` (`id_school`);

--
-- Constraints for table `w_experience`
--
ALTER TABLE `w_experience`
ADD CONSTRAINT `w_experience_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`);

--
-- Constraints for table `w_identity`
--
ALTER TABLE `w_identity`
ADD CONSTRAINT `w_identity_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`);

--
-- Constraints for table `w_language`
--
ALTER TABLE `w_language`
ADD CONSTRAINT `w_language_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`),
ADD CONSTRAINT `w_language_ibfk_2` FOREIGN KEY (`id_language`) REFERENCES `languages_set` (`id_language`);

--
-- Constraints for table `w_skill`
--
ALTER TABLE `w_skill`
ADD CONSTRAINT `w_skill_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`),
ADD CONSTRAINT `w_skill_ibfk_2` FOREIGN KEY (`id_skill`) REFERENCES `skills_set` (`id_skill`);

--
-- Constraints for table `w_training`
--
ALTER TABLE `w_training`
ADD CONSTRAINT `w_training_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `worker` (`id_worker`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
