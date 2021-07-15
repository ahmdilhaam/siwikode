# Host: localhost  (Version 5.5.5-10.4.20-MariaDB)
# Date: 2021-07-15 20:27:28
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "galeri_foto"
#

DROP TABLE IF EXISTS `galeri_foto`;
CREATE TABLE `galeri_foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wisata_id` int(11) DEFAULT NULL,
  `file` tinytext DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

#
# Data for table "galeri_foto"
#

INSERT INTO `galeri_foto` VALUES (1,1,'aladin.jpg','2021-06-18 00:19:07','2021-06-18 00:19:30'),(2,1,'aladin-2.jpg','2021-06-18 00:19:08','2021-06-18 00:20:18'),(3,1,'aladin-3.jpg','2021-06-18 00:19:08','2021-06-18 00:20:23'),(4,1,'aladin-4.jpg','2021-06-18 00:19:09','2021-06-18 00:20:28'),(5,1,'aladin-5.jpg','2021-06-18 00:19:09','2021-06-18 00:20:32'),(6,1,'aladin-6.jpg','2021-06-18 00:19:10','2021-06-18 00:20:37'),(7,2,'sop-duren.jpg','2021-06-18 01:32:35','2021-06-18 01:33:07'),(8,2,'sop-duren-2.jpg','2021-06-18 01:32:35','2021-06-18 01:33:15'),(9,2,'sop-duren-3.jpeg','2021-06-18 01:32:36','2021-06-18 01:33:48'),(10,2,'sop-duren-4.jpg','2021-06-18 01:32:36','2021-06-18 01:33:25'),(11,2,'sop-duren-5.jpg','2021-06-18 01:32:37','2021-06-18 01:33:29'),(12,2,'sop-duren-6.jpeg','2021-06-18 01:32:37','2021-06-18 01:33:58'),(23,8,'seluncuran-tinggi-0.JPG','2021-07-02 20:46:43','2021-07-02 20:46:43'),(24,8,'seluncuran-tinggi-01.jpg','2021-07-02 20:46:43','2021-07-02 20:46:43'),(25,8,'seluncuran-tinggi-02.jpg','2021-07-02 20:46:43','2021-07-02 20:46:43'),(26,8,'seluncuran-tinggi-0.jpeg','2021-07-02 20:46:43','2021-07-02 20:46:43'),(27,8,'seluncuran-tinggi-03.jpg','2021-07-02 20:46:43','2021-07-02 20:46:43');

#
# Structure for table "jenis_kuliner"
#

DROP TABLE IF EXISTS `jenis_kuliner`;
CREATE TABLE `jenis_kuliner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "jenis_kuliner"
#

INSERT INTO `jenis_kuliner` VALUES (1,'Kedai/Cafe'),(2,'Restaurant'),(3,'Pasar Kaget');

#
# Structure for table "jenis_rekreasi"
#

DROP TABLE IF EXISTS `jenis_rekreasi`;
CREATE TABLE `jenis_rekreasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "jenis_rekreasi"
#

INSERT INTO `jenis_rekreasi` VALUES (1,'Argo Wisata'),(2,'Kuliner'),(3,'Taman Wisata'),(4,'Museum'),(5,'Water Park / Kolam Renang');

#
# Structure for table "profesi"
#

DROP TABLE IF EXISTS `profesi`;
CREATE TABLE `profesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "profesi"
#

INSERT INTO `profesi` VALUES (1,'Artis'),(2,'Pejabat'),(3,'Mahasiswa'),(4,'Pegawai Swasta'),(5,'Umum');

#
# Structure for table "testimoni"
#

DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `wisata_id` int(11) NOT NULL,
  `profesi_id` int(11) NOT NULL,
  `rating` smallint(6) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `is_disabled` enum('false','true') DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "testimoni"
#

INSERT INTO `testimoni` VALUES (1,'Rojali','rojali@gmail.com',1,5,4,'Seruu permainannya dan tempat berenang juga bagus, udah 2x ke tmpat ini, ga mengecewakan pokoknya ... Thanks Seruu permainannya dan tempat berenang juga bagus, udah 2x ke tmpat ini, ga mengecewakan pokoknya ... Thanks \n','false'),(2,'Maisaroh','maisaroh@gmail.com',2,2,5,'seger bener es nya, jos pisan','false'),(4,'tester','tester@yopmail.com',2,4,3,'enak','false'),(5,'suaeb','suaeb@mail.com',2,5,5,'sedep bener','true'),(6,'suaeb','kamu@sayang.aku',8,4,4,'hahah tinggi','false'),(8,'zuriyah','zuriyah.squad@gmail.com',1,4,5,'hahahhhahaha','false'),(9,'hahhhaah','haha@yopmail.com',1,1,3,'kamar mandi','false');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `role` enum('admin','superadmin') DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_disabled` enum('false','true') DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'siwikode@gmail.com','SIWIKODE','superadmin','$2y$10$jmLRhAgKNvhf/wrtZkQcUOwo5gRJg4pG/1muR0EMw2QV9GExlghq2','2021-07-08 23:45:48','2021-07-15 20:26:45','false'),(2,'john@gmail.com','john','admin','$2y$10$5UuYIFyUeuj82l8SxtHkOOKfeSmPSrNZzbAXsBH8JlX8xg20fY0nS','2021-07-15 20:01:46','2021-07-15 20:12:21','false');

#
# Structure for table "wisata"
#

DROP TABLE IF EXISTS `wisata`;
CREATE TABLE `wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `note` tinytext DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jenis_rekreasi_id` int(11) NOT NULL,
  `fasilitas` text DEFAULT NULL,
  `bintang` varchar(6) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `latlong` varchar(50) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `web` varchar(45) DEFAULT NULL,
  `jenis_kuliner_id` int(11) NOT NULL,
  `cover` tinytext DEFAULT NULL,
  `status` enum('invalid','valid') DEFAULT 'invalid',
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "wisata"
#

INSERT INTO `wisata` VALUES (1,'Aladin Waterpark','aladin-waterpark','Salah satu waterpark terbesar di kota Depok yang sering juga dikenal dengan Aladin Waterpark. Dengan harga tiket Depok Fantasi Waterpark yang masih terjangkau sudah bisa bermain di berbagai wahana seru.','Waterpark ini salah satu tempat rekreasi air pertama dan terbesar yang berada di kawasan Grand Depok City, Kota Depok. Waterpark yang memiliki tema dan bernuansa Negeri 1001 malam dengan berbagai permainan air yang seru buat keluarga.\r\n\r\nBanyak wahana seru yang bisa dicoba baik untuk anak-anak maupun dewasa. Esthatic Tower, Giant Slide, Waterplay, Kiddy Pool, adalah beberapa wahana yang bisa dimainkan.\r\n\r\nSemua permainan dan wahana tentu ditunjang dengan fasilitas yang cukup lengkap. Mulai dari foodcourt, gazebo, panggung, hiburan serta fasilitas lainnya. Disediakan buat kenyamanan pengunjung yang berwisata ke waterpark ini.\r\n',5,NULL,'4','(021) 77826633','Jl. Boulevard Grand Depok City, Tirtajaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16412','-6.419684920582882, 106.82839727012329','cs@aladin.com','aladin.com',0,'aladin.jpg','valid','2021-06-17 21:35:27','2021-07-09 00:14:12'),(2,'Sop Duren Margonda','sop-duren-margonda','Buka sejak 2010, Sop Duren Margando selalu ramai pembeli. Dulu tempat berjualannya terbilang kecil tanpa area bersantap. Tapi kini pengunjung bisa menikmati sop duren di tempat.','Menu andalan Sop Duren Margonda adalah sop duren original seharga Rp 15.000. Diracik dari daging buah duren, parutan keju cheddar dan air gula plus susu. Kreasi lain dari Sop Duren Margonda adalah paduan sop duren dengan ketan, roti dan strawberry. Masing-masing dihargai sekitar Rp 14.000 - 16.000 saja.\r\n\r\nPaduan ketan putih yang pulen lengkat dengan duren legit mantap. Karena ada sensasi gurih khas ketan. Kalau suka kacang ijo, boleh mencicip paduan duren dengan kacang ijo yang empuk dan lembaran roti pandan.\r\n\r\nMau melahap duren yang praktis? Pancake duren di Sop Duren Margonda juga laris manis. Dijual dalam keadaan beku, dessert ini dihargai Rp 10.000 per buah',0,NULL,'4.3','0813-6927-0571','Jl. Margonda Raya No.1, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16436','-6.390424228325654, 106.8251512794721','cs@sopduren.com','sopduren.com',1,'sop-duren.jpg','valid','2021-06-17 21:35:27','2021-07-09 01:10:36'),(8,'seluncuran tinggi','seluncuran-tinggi','tinggi','banget dah',0,NULL,'4','0821','kebon raya','-7.907357, -36.850982','seluncuran@tin.ggi','http://seluncuran.tinggi',3,'seluncuran-tinggi-03.JPG','valid','2021-07-02 20:46:43','2021-07-15 19:25:21');
