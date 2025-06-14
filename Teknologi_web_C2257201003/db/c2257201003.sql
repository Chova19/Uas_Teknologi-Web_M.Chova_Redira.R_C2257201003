<br />
<b>Warning</b>:  Undefined variable $F in <b>C:\laragon\www\adminer.php</b> on line <b>1147</b><br />
-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `id_jenis` int NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1,	'KOPI'),
(2,	'NON KOPI'),
(3,	'SNACK');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) NOT NULL,
  `id_jenis` int NOT NULL,
  `penjelasan` text NOT NULL,
  `stok` enum('A','H') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'A=ADA, H=HABIS',
  `harga` double NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `menu` (`id_menu`, `nama_menu`, `id_jenis`, `penjelasan`, `stok`, `harga`, `foto`) VALUES
(1,	'cappucino',	1,	'Cappuccino adalah secangkir kopi susu yang berasal dari Italia dan mulai hadir di Eropa dan Amerika sejak tahun 1980-an. Secangkir kopi cappuccino memiliki perbandingan espresso, steamed milk dan busa yang sama. Rasa kopi cappuccino umumnya sangat rich, walaupun sudah dicampur susu, rasa kopinya tetap kuat.',	'A',	15000,	'chino.jpg'),
(2,	'Espresso ',	1,	'Espresso merupakan kopi yang dihasilkan dari proses penyeduhan kopi dengan tekanan dan suhu tinggi. Kopi espresso dibuat dengan menggiling kopi hingga halus, lalu dipadatkan atau biasa disebut “tamping”, kemudian kopi diseduh dengan tekanan tinggi dengan suhu yang tinggi, sehingga menghasilkan ekstrak kopi yang kental.',	'H',	10000,	'espres.jpg'),
(3,	'Matca Green Tea',	2,	'Matcha merupakan bubuk yang terbuat dari daun teh hijau yang ditumbuk kalus dari tanaman camellia sinensis.',	'A',	15000,	'teagreen.jpg'),
(4,	'Milk Tea',	2,	' milk tea biasanya berarti teh dengan susu di dalamnya, dan versi roasted berarti bahan pembuatnya sudah dipanggai atau disangrai sampai mendapat cita rasa \"panggang\" nan nikmat. Anda sebenarnya bisa pakai teh apapun, tapi milk tea tradisional umumnya menggunakan teh hitam sebagai bahan dasar.',	'A',	10000,	'milktea.jpg'),
(5,	'French Fries',	3,	'Kentang goreng adalah hidangan yang dibuat dari potongan-potongan kentang yang digoreng dalam minyak goreng panas. Di dalam menu rumah-rumah makan, kentang goreng yang dipotong panjang-panjang dan digoreng dalam keadaan terendam di dalam minyak goreng panas disebut French fries.',	'A',	10000,	'gorengkentang.jpg'),
(6,	'Risol Mayo',	3,	'Risol mayo adalah hidangan yang lezat dan cukup populer di Indonesia. Olahan ini mirip dengan pastel goreng berbentuk segitiga atau panjang dengan isian seperti wortel, kubis, daging cincang, dan jamur yang bisa kamu buat sendiri untuk camilan keluarga.',	'A',	15000,	'MAYO.jpg'),
(8,	'Taro Ice',	2,	'Minuman Taro adalah minuman yang populer saat ini, terbuat dari bahan dasar talas ungu (taro). Talas ungu ini memiliki warna ungu yang khas dan rasa yang manis serta sedikit nutty (seperti kacang). Minuman taro biasanya memiliki tekstur yang lembut dan creamy, serta aroma yang harum.',	'A',	15000,	'50cec969-ba2d-4fe5-a97e-b52a9fe535bc.jpg'),
(9,	'Churros',	3,	'Tentu, dengan senang hati saya akan jelaskan tentang menu churros:\r\n\r\nChurros adalah camilan populer yang berasal dari Spanyol, berbentuk panjang dan bergelombang, serta memiliki tekstur luar yang renyah dan bagian dalam yang lembut. Churros biasanya disajikan panas-panas dan dicocolkan ke dalam saus cokelat kental atau gula bubuk yang bercampur dengan kayu manis.',	'A',	15000,	'chur.jpeg'),
(10,	'Indomie',	3,	'Indomie adalah mi instan yang sangat populer di Indonesia, bahkan mendunia. Dengan berbagai varian rasa dan kemudahan penyajiannya, Indomie menjadi salah satu makanan favorit banyak orang.',	'A',	10000,	'Inomie.jpeg'),
(11,	'Red Valvet',	2,	'Red Velvet adalah jenis kue atau makanan penutup yang sangat populer karena warna merahnya yang mencolok dan rasa yang lembut serta sedikit cokelat. Warna merah pada kue ini berasal dari pewarna makanan alami atau buatan, sedangkan rasa cokelatnya didapat dari bubuk kakao yang dicampurkan ke dalam adonan.',	'A',	20000,	'redvalvet.jpg'),
(12,	'Tropical Blue Mocktail ',	2,	'Tropical Blue Mocktail adalah jenis minuman non-alkohol yang sangat menyegarkan dan populer, terutama di acara-acara santai atau pesta. Seperti namanya, minuman ini memiliki warna biru yang mencolok dan cita rasa tropis yang khas. Warna biru yang menarik ini biasanya berasal dari sirup biru atau pewarna makanan alami seperti bunga telang.',	'H',	20000,	'tropical blue mocktail.jpg'),
(13,	'Cireng',	3,	'Cireng adalah makanan ringan khas Sunda yang terbuat dari adonan tepung tapioka yang digoreng hingga renyah. Nama \"cireng\" sendiri merupakan akronim dari \"aci digoreng\", yang artinya tepung tapioka yang digoreng. Cireng memiliki tekstur luar yang garing dan bagian dalam yang kenyal, serta rasa yang gurih dan lezat.',	'A',	10000,	'Cireng.jpg');

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `user_id` varchar(50) NOT NULL,
  `sandi` varchar(100) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `pengguna` (`user_id`, `sandi`, `nama_pengguna`) VALUES
('chova',	'76f81687727f148f483269bfdbe69cd7',	'chova');

DROP VIEW IF EXISTS `view_menu_jenis`;
CREATE TABLE `view_menu_jenis` (`id_menu` int, `nama_menu` varchar(100), `id_jenis` int, `nama_jenis` varchar(20), `penjelasan` text, `stok` enum('A','H'), `harga` double, `foto` varchar(100));


DROP TABLE IF EXISTS `view_menu_jenis`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_menu_jenis` AS select `o`.`id_menu` AS `id_menu`,`o`.`nama_menu` AS `nama_menu`,`o`.`id_jenis` AS `id_jenis`,`w`.`nama_jenis` AS `nama_jenis`,`o`.`penjelasan` AS `penjelasan`,`o`.`stok` AS `stok`,`o`.`harga` AS `harga`,`o`.`foto` AS `foto` from (`menu` `o` join `jenis` `w`) where (`o`.`id_jenis` = `w`.`id_jenis`);

-- 2025-06-11 13:12:48
