-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2022 at 08:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `KodeBooking` char(6) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `UserID`, `EventID`, `qty`) VALUES
(34, 2, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ChatID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chatdetail`
--

CREATE TABLE `chatdetail` (
  `ChatDetailID` int(11) NOT NULL,
  `ChatID` int(11) NOT NULL,
  `Pesan` varchar(5000) NOT NULL,
  `TanggalWaktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(11) NOT NULL,
  `KategoriID` int(11) NOT NULL,
  `Nama` varchar(200) NOT NULL,
  `Deskripsi` mediumtext NOT NULL,
  `GambarPoster` varchar(100) DEFAULT NULL,
  `Harga` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Lokasi` varchar(200) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `JenisPert` varchar(10) NOT NULL,
  `sisaTicket` int(11) DEFAULT 50,
  `Twibbon` varchar(100) DEFAULT NULL,
  `NamaOrganizer` varchar(200) NOT NULL,
  `Instagram` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `KategoriID`, `Nama`, `Deskripsi`, `GambarPoster`, `Harga`, `Tanggal`, `Lokasi`, `Alamat`, `JenisPert`, `sisaTicket`, `Twibbon`, `NamaOrganizer`, `Instagram`, `Email`) VALUES
(4, 1, 'Webinar: Aku VS Emosiku', 'Setiap orang pastinya memiliki tingkat dan pengelolaan emosi yang berbeda-beda. Nah emosi ini tidak hanya perasaan marah atau sedih ya teman-teman, tapi senang dan bahagia juga termasuk emosi loh! Nah apa jadinya ya kalo kita tidak bisa mengendalikan emosi yang kita punya? Apakah akan mempengaruhi hidup kita? Atau justru emosi tersebut bisa menguasai diri kita? ', '1.jpeg', 0, '2022-11-19', 'Zoom', 'Zoom', 'Online', 50, '', 'Manupsia', '@manupsia', ''),
(5, 3, 'Pesta Olahraga Rumah Autis (PORA) 2022', 'Hello, agents! \r\n\r\nSports is a basic requirement for a healthy body, PORA 2022 \"Kembali Beraksi!!!\" Untuk teman-teman yang memiliki ketertarikan dengan olahraga dan dunia anak-anak berkebutuhan khusus, Rumah Autis mengadakan kegiatan Pesta Olahraga yang akan diikuti oleh peserta Berkebutuhan khusus se-Jabodetabekar. Kami membuka kesempatan bagi teman-teman untuk berpartisipasi dalam membantu melaksanakan kegiatan tersebut. \r\n\r\nPORA 2022 \"Kembali Beraksi!!!\" akan dilaksanakan pada Selasa, 13 Desember 2022. Pada event ini kami membutuhkan voluntir sebagai panitia pelaksana: \r\n1. Pendamping \r\n2. Dokumentasi \r\n3. Team Wasit dan Official \r\n4. Team Perlengkapan dan Konsumsi \r\n5. Acara Seremoni \r\n6. Team Medis Informasi tambahan mengenai kegiatan dapat menghubungi : 082374703948 (Anggek)', '2.jpeg', 0, '2022-12-13', 'Bekasi', 'STADION PATRIOT CANDRABHAGA Jl. Jend. Sudirman, RT. 004/RW. 016, Kayuringin Jaya, Kec. Bekasi Selatana Kota Bekasi, Jawa Barat', 'Offline', 50, '', 'Rumah Autis', '@rumahautis', ''),
(6, 1, 'I-Talk ', 'I-Talk adalah webinar dari ICOSH FEB UB yang berfokus pada pengembangan english public speaking. Tema dari I-Talk tahun ini adalah \"Break the Limit and be an Outstanding Public Speaker.\"\r\n\r\nPemateri dari I-Talk kali ini adalah Deris Nagara yang merupakan LPDP awardee at Columbia Universitu, New York.\r\n\r\nI-Talk dibuka untuk umum dan akan dilaksanakan secara online via Zoom Meeting pada hari Sabtu, 26 November 2022 pada jam 12.30', '3.jpeg', 0, '2022-11-26', 'Zoom', 'Zoom', 'Online', 50, '', 'ICOSH English Festival', '@ief.febub', 'icoshenglishfestival@gmail.com'),
(7, 4, 'Biology Smart Competition', '📢HMJ PENDIDIKAN BIOLOGI UWKS PROUDLY PRESENT📢\r\n\r\n✨Biology Smart Competition 2023✨\r\n\r\nHaloo adik-adik SMA/Se-derajat👋🏻\r\nBiology Smart Competition is BACK‼️\r\nBSC 2023 hadir untuk adik-adik SMA/Se-derajat Tingkat Jawa dan bali dan akan dilaksanakan secara OFFLINE🤩.\r\nYuk Segera persiapkan diri kalian untuk pendaftaran dan jangan sia-siakan kesempatan untuk menantang diri sendiri dan jadilah pemenang🔥', '4.png', 160000, '2023-01-25', 'Surabaya', 'Univ Wijaya Kusuma Surabaya.\r\nJl. Dukuh Kupang XXV No.54, Dukuh Kupang, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60225', 'Offline', 50, '', 'Biology Smart Competition UWKS', '@bscuwks', 'biologiuwks@gmail.com'),
(8, 4, 'Media Selaras Festival - Transformasi Pendidikan Digital', '✨  MEDIA SELARAS FESTIVAL 2022 ✨\r\n\r\nBerkarya merupakan suatu hal yang semua orang bisa. Namun untuk membuktikannya berkaryalah senyata itu. Bagi kalian yang mempunyai bakat dan karya, Mari kita wujudkan hari ini 🔥\r\n\r\nMedia Selaras proudly present: \r\n\r\n✨Media Selaras Festival✨\r\n\r\nDengan berbagai macam lomba yang diantaranya:\r\n\r\n🔥 Esai\r\n🔥 Podcast\r\n🔥 Cover Song\r\n🔥 Poster\r\n\r\nUntuk ketentuan dapat dilihat dalam link berikut ini :\r\nbit.ly/BookletMedfest2022\r\n\r\nSo, tunggu apa lagi, ayo jangan terus memendam bakatmu ‼️', '5.jpeg', 25000, '2022-12-31', 'Zoom', 'Zoom', 'Online', 50, '', 'Media Selaras Festival', '@mediaselarasfestival', 'mediaselarass@gmail.com'),
(9, 2, 'Women\'s Day Out - Beauty Fest & Women need', 'Womens day Out Jakarta Nih\r\n\r\nUdah tau kan Women & Beuaty Fest yang concern dengan Perempuan , mental health dan juga sexual Harassment\r\n\r\nKapan lagi ada beauty Fest Free dan banyak yg bisa kamu explore\r\n\r\n    Make Up Free !!!\r\n    Konsul Psikologi CURCOL Free !!!\r\n    FOTO GRATIS BAGAI MODEL !!!!\r\n    FREE SAMPLE PULUHAN BRAND !!!\r\n    MUSIC CONCERT !!!\r\n\r\nGuest Star :\r\n\r\n    Okaay\r\n    Reza Dharmawangsa\r\n    Dj Verny Hasan\r\n    Geisha\r\n    Dan ada lagi Mystery Guest', '6.jpeg', 0, '2022-12-01', 'Jakarta Selatan', 'Plaza Semanggi.Karet Semanggi, Setiabudi, Kota Jakarta Selatan', 'Offline', 50, '', 'Women\'s day out', '@womensdayoutid', ''),
(10, 3, 'Charity Booth GNOTA', 'Panggilan Terbuka untuk semua yang ingin menjadi Volunteer bersama GNOTA dalam mendukung anak-anak Indonesia terus mengenyam pendidikan wajib belajar 13 tahun.\r\n\r\nPada bulan Desember 2022 ini, GNOTA bersama dengan Plaza Senayan akan membuka Christmas Charity Booth dan akan melakukan kegiatan-kegiatan menarik bersama Anak-Anak Asuh GNOTA dan juga bersama para Orang Tua Asuh lainnya.\r\n\r\nYuk menjadi bagian dari Sahabat GNOTA, dan menyebarkan pentingnya dukungan kita dalam mendampingi mereka meraih cita-cita.', '7.jpeg', 0, '2022-12-01', 'Jakarta', 'Plaza Senayan', 'Offline', 50, '', 'Yayasan GNOTA (Gerakan Nasional Orang Tua Asuh)', '@yayasangnota', ''),
(11, 4, 'National Business Case Competition', '[National Business Case Competition 2022]\r\n\r\nHai Dream Warriors!✨🙌🏻\r\n\r\nKalian mahasiswa/mahasiswi S1? Mau memperbanyak pengalaman baru? Lagi cari info lomba untuk menambah prestasi? Atau mau mengasah kemampuan analisa dan berpikir kritis? \r\n\r\nWah pas banget nih! Kejar Mimpi chapter Depok lagi ngadain National Business Case Competition dengan tema “Accelerate Business Future Through Sustainability”!\r\n\r\nSelain kompetisi, bakal ada banyak rangkaian acara lain yang pastinya nggak kalah keren, seru, dan insightful nih! \r\n\r\nTimeline :\r\n📍Pre-event : 15 November 2022\r\n📍Competition : 30 November - 11 Desember 2022\r\n📍Workshop : 9 Desember 2022 \r\n📍Talkshow : 11 Desember 2022\r\n\r\nJadi, tunggu apalagi? Yuk daftarkan diri kalian dan jadilah juaranya!🤩', '8.jpeg', 70000, '2022-11-30', 'Online', 'Online', 'Online', 50, '', 'Kejar Mimpi Depok', '@kejarmimpi_depok', 'kejarmimpidepok@gmail.com'),
(12, 1, 'Seminar Nasional ', 'BADAN EKSEKUTIF MAHASISWA FAKULTAS EKONOMI DAN BISNIS UNIVERSITAS NGURAH RAI\r\n- PROUDLY PRESENT-\r\n\r\n📢SEMINAR NASIONAL📢\r\n\r\nHalo civitas akademika🙌🏻\r\nBadan Eksekutif Mahasiswa Fakultas Ekonomi dan Bisnis Universitas Ngurah Rai, Menyelenggarakan Seminar Nasional dengan tema:\r\n\r\n“Manfaat Presidensi G20 Terhadap UMKM di Indonesia”\r\n\r\nNasumber :\r\n1. Fixy, SE., Ak., M.Phil (Assistant Deputy for Market Expansion and Partnership Ministry of Cooperatives and SMEes Republic of Indonesia)\r\n2. Dr Ni Putu Tirka Widanti, MM., M.Hum (Rektor Universitas Ngurah Rai)\r\n3. Kadek Surya Prasetya Wiguna (CEO of Cau Chocolates Bali)', '9.jpeg', 40000, '2022-11-19', 'Zoom', 'Zoom', 'Online', 50, '', 'BEM FEB UNR', '@bemfebunr', 'bemfebunr@gmail.com'),
(13, 1, 'Seminar Nasional Bisnis Berbasis IT', '✨ [𝗦𝗲𝗺𝗶𝗻𝗮𝗿 𝗡𝗮𝘀𝗶𝗼𝗻𝗮𝗹 𝗕𝗶𝘀𝗻𝗶𝘀 𝗕𝗲𝗿𝗯𝗮𝘀𝗶𝘀 𝗜𝗧] ✨\r\n\r\nConsultee & Company Proudly Present\r\n\r\n𝗦𝗲𝗺𝗶𝗻𝗮𝗿 𝗡𝗮𝘀𝗶𝗼𝗻𝗮𝗹: 𝗣𝗲𝗹𝘂𝗮𝗻𝗴 𝗠𝗲𝗺𝗯𝗮𝗻𝗴𝘂𝗻 𝗕𝗶𝘀𝗻𝗶𝘀 𝗕𝗲𝗿𝗯𝗮𝘀𝗶𝘀 𝗜𝗧 𝗗𝗶 𝗘𝗿𝗮 𝗜𝗻𝗱𝘂𝘀𝘁𝗿𝗶 𝟰.𝟬\r\n\"𝗦𝗲𝗺𝘂𝗮 𝗕𝗶𝘀𝗮 𝗚𝗼 𝗗𝗶𝗴𝗶𝘁𝗮𝗹\"\r\n\r\n“𝗦𝗲𝘁𝗶𝗮𝗽 𝘁𝗲𝗸𝗻𝗼𝗹𝗼𝗴𝗶 𝘆𝗮𝗻𝗴 𝗰𝘂𝗸𝘂𝗽 𝗰𝗮𝗻𝗴𝗴𝗶𝗵 𝘀𝗲𝘁𝗮𝗿𝗮 𝗱𝗲𝗻𝗴𝗮𝗻 𝗠𝗮𝗴𝗶𝗰.” – 𝗧𝘂𝗮𝗻 𝗔𝗿𝘁𝗵𝘂𝗿 𝗖𝗹𝗮𝗿𝗸𝗲\r\n\r\n“𝗔𝗺𝗯𝗶𝗹 𝗿𝗶𝘀𝗶𝗸𝗼 𝘀𝗲𝗸𝗮𝗿𝗮𝗻𝗴 𝗱𝗮𝗻 𝗹𝗮𝗸𝘂𝗸𝗮𝗻 𝘀𝗲𝘀𝘂𝗮𝘁𝘂 𝘆𝗮𝗻𝗴 𝗯𝗲𝗿𝗮𝗻𝗶. 𝗔𝗻𝗱𝗮 𝘁𝗶𝗱𝗮𝗸 𝗮𝗸𝗮𝗻 𝗺𝗲𝗻𝘆𝗲𝘀𝗮𝗹𝗶𝗻𝘆𝗮. ” – 𝗞𝘂𝘁𝗶𝗽𝗮𝗻 𝗘𝗹𝗼𝗻 𝗠𝘂𝘀𝗸\r\n\r\nBegitu pula dalam bisnis, kalimat tersebut menguatkan pentingnya teknologi dalam mencapai keberhasilan. Maka, jika ingin membangun perusahaan besar dan sukses, pemanfaatan teknologi bisa menjadi salah satu kuncinya!\r\n\r\n𝗕𝗮𝗴𝗮𝗶𝗺𝗮𝗻𝗮 𝘀𝗶𝗵 𝘀𝘁𝗿𝗮𝘁𝗲𝗴𝗶, 𝘁𝗶𝗽𝘀 𝗱𝗮𝗻 𝘁𝗿𝗶𝗸𝗻𝘆𝗮 𝘂𝗻𝘁𝘂𝗸 𝗠𝗲𝗺𝗯𝗮𝗻𝗴𝘂𝗻 𝗕𝗶𝘀𝗻𝗶𝘀 𝗕𝗲𝗿𝗯𝗮𝘀𝗶𝘀 𝗜𝗧? 𝗮𝗽𝗮𝘀𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴𝗻𝘆𝗮 𝘁𝗲𝗸𝗻𝗼𝗹𝗼𝗴𝗶 𝗱𝗶 𝗺𝗮𝘀𝗮 𝘆𝗮𝗻𝗴 𝗮𝗸𝗮𝗻 𝗱𝗮𝘁𝗮𝗻𝗴? 𝗕𝗮𝗴𝗮𝗶𝗺𝗮𝗻𝗮 𝗰𝗮𝗿𝗮 𝗯𝗲𝗿𝘀𝗮𝗶𝗻𝗴 𝗱𝗲𝗻𝗴𝗮𝗻 𝘁𝗲𝗸𝗻𝗼𝗹𝗼𝗴𝗶 𝗱𝗶 𝗲𝗿𝗮 𝗶𝗻𝗱𝘂𝘀𝘁𝗿𝗶 𝟰.𝟬?\r\n\r\nOkay tenang, kita akan kupas tuntas itu semua dalam webinar nasional yang berjudul \"𝗣𝗲𝗹𝘂𝗮𝗻𝗴 𝗠𝗲𝗺𝗯𝗮𝗻𝗴𝘂𝗻 𝗕𝗶𝘀𝗻𝗶𝘀 𝗕𝗲𝗿𝗯𝗮𝘀𝗶𝘀 𝗜𝗧 𝗗𝗶 𝗘𝗿𝗮 𝗜𝗻𝗱𝘂𝘀𝘁𝗿𝗶 𝟰.𝟬\"\r\n\r\n📢 𝗦𝗽𝗲𝗮𝗸𝗲𝗿 📢\r\n🧑🏻‍💼 Singgih Ardiansyah\r\nCEO PT Include Teknologi Indonesia\r\nStart Up IoT Expert', '10.jpeg', 0, '2022-11-27', 'Zoom', 'Zoom', 'Online', 50, '', 'Consultee company', '@consultee.co', ''),
(14, 1, 'KENALSURANSI PROGRAM', 'Halo sobat asuransi!! 👋\r\nBelakangan ini banyak sekali isu-isu mengenai resesi di tahun 2023, Lalu jika terjadi apa saja sih yang perlu kita persiapkan? semua jawabannya ada di seminar ini!\r\nAcara ini cocok banget buat kalian yang pengen tahu apa saja yang perlu disiapkan untuk menghadapi resesi di tahun 2023 langsung dari para ahlinya! 😱🔥 Selain itu juga banyak sekali hadiah menarik langsung diberikan oleh Dewan Asuransi Indonesia (DAI) dan perusahaan-perusahaan asuransi ternama lhoo!', '11.jpeg', 0, '2022-11-19', 'Zoom', 'Zoom', 'Online', 50, '', 'Dewan Asuransi Indonesia', '@dewanasuransi', 'sekretariat@dai.or.id'),
(15, 2, 'Lexima Fest', '\"PENAT\" sama ekspektasi hidup, \"BURNOUT\" sama kerjaan, \"LELAH\" sama drama percintaan, atau \"BOSEN\" sama aktivitas yang itu-itu aja.\r\nNgonser di lexima fest aja yuk. Buat yang udah sering nonton konser pasti aktivitas \"Sing A long\" itu menyegarkan dan mood booster banget.\r\nSee u at Gambir Expo Kemayoran - 27 November 2022!', '12.jpeg', 100000, '2022-11-27', 'Jakarta Utara', 'Gambir Expo - Arena PRJ Kemayoran, Kec. Pademangan, Kota Jkt Utara', 'Offline', 50, '', 'Badan Eksekutif Mahasiswa Universitas Binawan', '@leximafest', ''),
(16, 2, 'NCT 127 2ND TOUR \'NEO CITY : JAKARTA – THE LINK\'', 'NCT 127 Siap Menyapa Penggemar Tanah Air Lewat Konser NEO CITY: THE LINK November Mendatang\r\n\r\nJakarta, Indonesia – Dyandra Global Edutainment dengan bangga akan menggelar konser tunggal NCT 127 pada 5 November 2022 di Indonesia Convention Exhibition (ICE) BSD, Tangerang, Indonesia. Konser ini menjadi bagian dari tur keduanya yang bertajuk NCT 127 2ND TOUR ‘NEO CITY: JAKARTA – THE LINK’.\r\n\r\nJakarta dan Bangkok terpilih menjadi negara di Asia yang akan disambangi NCT 127 dalam tur ini, setelah sebelumnya dimulai di Seoul pada Desember 2021 lalu dan diikuti di Nagoya, Tokyo, Singapura, serta Filipina. Setelah kunjungannya di Los Angeles, New Ark, dan Amerika Latin, Jakarta akan menjadi kota yang selanjutnya akan dikunjungi oleh boyband beranggotakan sembilan orang ini.', '13.jpg', 1045000, '2022-11-04', 'Tangerang ', 'Jl. BSD Grand Boulevard No.1, Pagedangan, Kec. Pagedangan, Kabupaten Tangerang, Banten 15339', 'Offline', 50, '', 'Dyandra Global Edutainment', '@dyandraglobal', 'info@dyandraglobal.com'),
(17, 2, 'Let\'s Love Indonesia - We are All One K-Pop Concert', 'Konser Let\'s Love Indonesia - We are All One K-Pop Concert akan digelar di Madya Stadium Gelora Bung Karno pada 10-12 November 2022 mendatang. Line up untuk konser ini termasuk ASTRO (Moobin, Yoon Sanha, Jinjin, dan Rocky), BamBam, Youngjae, Oh My Girl, SF9, NMIXX, CIX, Pentagon, dan Chen EXO yang akan tampil di hari kedua dan ketiga.', '14.jpg', 340000, '2022-11-10', 'Jakarta', 'Jl. Pintu Satu Senayan, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'Offline', 50, '', 'PT.Coution Live', '@coutionliveindonesia_official', 'coutionlive@naver.com'),
(18, 2, 'Gudfest 2022', 'Festival musik Gudfest 2022 siap digelar pada 18 sampai 20 November 2022 di Gelora Bung Karno, Jakarta. Deretan musisi-musisi internasional dan Indonesia ternama mewarnai lineup Gudfest 2022 termasuk Eric Nam, Lee Hi, HONNE, Lauv, CHVRCHES, Ruel, Dashboard Confessional, Teza Sumendra, Rinni Wulandari, Reality Club, Rendy Pandugo, dan sebagainya.', '15.jpg', 725000, '2022-11-18', 'Jakarta', 'Jl. Pintu Satu Senayan, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'Offline', 50, '', 'Gudlive', '@gudlive.id', 'gudfest2022@gmail.com'),
(19, 4, 'Turnamen Mobile Legends - Champions All-Star Season 1', 'Turnamen MOLE Kembali dengan lebih meriah. Lomba diadakan pada tanggal 10 Maret 2023. Pendaftaran akan ditutup tanggal 9 Maret 2019. Biaya pendaftaran hanya IDR 40.000,- / Slot dan diadakan secara online\r\n\r\nSlot tersedia sebanyak 64 lebih dan boleh memakai skin yang kalian punya. Tier bronze pun boleh main loh!! Mode game adalah costum draft pick mode. Tunggu apa lagi ayo ajak teman temanmu untuk bersaing di event mole terbesar abad ini. ', '16.jpg', 40000, '2024-03-24', 'Zoom', 'Zoom', 'Online', 50, '16.jpg', 'Tourntey.id', '@tourntey_id', 'tourntey_id@gmail.com'),
(20, 4, 'CAMBRIDGE (Competition of Ambitious Bright Generation) 2022', 'Hai, buat kalian siswa SLTA sederajat di wilayah Se-JATIM, yuk ikutan CAMBRIDGE (Competition of Ambitious Bright Generation) 2022! Kegiatan ini merupakan lomba dengan 2 cabang perlombaan dianntaranya Story Telling Competition dan Speech Contest. Ada total hadiah jutaan rupiah loh yang bisa anda menangkan! Batas akhir pendaftaran hingga tanggal 05 Desember 2022. Jadi, jangan sampai ketinggalan ya!', '17.jpg', 50000, '2022-12-10', 'Zoom', 'Zoom', 'Online', 50, '', 'Esa Universitas Islam Nasional Jember', '@esauinjember', ''),
(21, 4, 'Kreasi Pewarta Anak Bangsa 2022: Lomba Penulisan Feature dan Foto', 'Gojek, perusahaan teknologi on-demand terdepan di Asia Tenggara, kembali menggelar Kreasi Pewarta Anak Bangsa (KPAB) 2022, ajang penghargaan karya jurnalistik bagi insan pers di Indonesia.\r\n\r\nGelaran rutin yang memasuki tahun ketiga ini pertama kali diadakan pada 2020. Berbeda dengan tahun-tahun sebelumnya, kali ini KPAB 2022 akan menyertakan kategori terbaru yakni Kompetisi Foto KPAB 2022, hasil kerja sama dengan Pewarta Foto Indonesia (PFI), sebagai apresiasi bagi para fotografer yang selama ini mendukung perjalanan Gojek.\r\n\r\nPenilaian terhadap karya jurnalistik dalam kompetisi KPAB dilakukan dengan mempertimbangkan berbagai faktor seperti orisinalitas ide, objektivitas, rekomendasi yang diberikan penulis dan faktor lainnya yang telah disepakati bersama seluruh dewan juri.', '18 .jpg', 0, '2022-10-31', 'Jakarta Selatan', 'Kantor Pusat Gojek, Pasaraya Blok M Gedung B Lt. 6, Jl. Iskandarsyah II No.7, RT.3/RW.1, Melawai, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160', 'Offline', 50, '', 'Gojek', '@gojekindonesia', 'customerservice@gojek.com'),
(22, 4, 'Youth Ideas Competition NBRI-YIC 2022', 'NBRI-YIC 2022 Paper Competition merupakan kompetisi yang menantang para pesertanya untuk melakukan penelitian ilmiah untuk membuat makalah yang layak dengan keunggulan dalam keterampilan menulis dan berpikir analitis terkait dengan Tujuan Pembangunan Berkelanjutan (SDGs).\r\nYouth Ideas Competition NBRI-YIC 2022 merupakan lkti nasional yang terbuka untuk mahasiswa aktif (ijazah/sarjana) atau fresh graduate (yang lulus dalam waktu 1 tahun sebelum kompetisi). Batas akhir pendaftaran dan pengumpulan abstrak hingga tanggal 25 November 2022. Total hadiah yang diperebutkan pada lomba menulis kali ini senilai 7 juta rupiah. Jadi, jangan sampai ketinggalan ya!', '20.jpg', 150000, '2022-12-24', 'Zoom', 'Zoom', 'Online', 50, '', 'Najamudin center', '@najamudin', 'contact@najamudin.net'),
(23, 2, 'Tunggu Aku di Jakarta', 'Jakarta, 1 November 2022 - Menembus 27 tahun bermusik dan menghadirkan deretan lagu-lagu yang berhasil dinikmati oleh berbagai generasi, Sheila On 7 dipastikan terus melanjutkan perjalanannya dengan menghasilkan lagu-lagu yang mewakili isi hati para penggemar. Meski demikian, belum sekalipun Sheila On 7 menampilkan sisi otentiknya di atas panggung. Namun hal itu akan segera tercipta. \r\n\r\nDikenal sebagai band papan atas di Indonesia, Sheila On 7 ingin kembali mengulang kisah klasik bersama Sheila Gank dalam konser tunggal yang akan diselenggarakan dengan tajuk \"Tunggu Aku Di\' yang dimulai dengan \'Tunggu Aku di Jakarta\", sesuai dengan salah satu judul lagu dari Sheila On 7. Konser ini akan digelar pada 28 Januari 2023 di Jiexpo, PRJ Kemayoran, Jakarta. Diharapkan gelaran \'Tunggu Aku Di\' bisa berlanjut ke kota-kota lain. \r\n\r\nUntuk seluruh Sheila Gank yang ingin datang ke \'Tunggu Aku di Jakarta\', pembelian tiket dapat dilakukan secara online melalui laman www.tungguakudi.id mulai 7 November 2022. Informasi terbaru live in concert Sheila On 7 \'Tunggu Aku Di Jakarta hanya akan diinfokan melalui instagram @antara.suara dan @loketcom. Tunggu Sheila On 7 di Jakarta!', '21.webp', 750000, '2023-01-28', 'Jakarta Pusat', 'JIExpo, PRJ Kemayoran, Jakarta', 'Offline', 50, '', 'Antara Suara', '@antara.suara', ''),
(24, 4, 'ACTUARIAL SCIENCE 2022', 'Hello math enthusiast! 👋🏻 \r\n\r\nPada tahun ini, acara Actuarial Science Day mengangkat tema “Adventure Through Ma(r)th” yang merupakan penggabungan antara konsep Adventure dan Art of Math. Perkembangan zaman yang semakin maju membuat banyak perubahan dan tentunya perubahan tersebut harus diimbangi dengan sebuah adaptasi. Oleh sebab itu, tema Adventure yang diambil menggambarkan siswa/i SMA yang berpetualang mengeksplorasi tentang aktuaria di acara Actuarial Science Day. ', '22.webp', 105000, '2022-08-22', 'Zoom', 'Zoom', 'Online', 50, '', 'Universitas Prasetya Mulya', '@asd.prasmul', ''),
(25, 4, 'Lomba Film Pendek: Aneka Pangan Nusantara', 'Hallo sobat pangan\r\n\r\nBadan Pangan Nasional berkolaborasi dengan Perum Produksi Film Negara membuka kesempatan untuk para Sineas Film di seluruh wilayah di Indonesia untuk mengikuti Lomba Film Pendek dengan Tema: Aneka Ragam Pangan Nusantara “Indonesia kaya sumber pangan pokok, protein hewani, sayur dan buah”.', '23.jpeg', 0, '2022-10-27', 'Zoom', 'Zoom', 'Online', 50, '', 'Badan Pangan Nasional', '@badanpangannasional', ''),
(26, 1, 'SEMINAR NASIONAL K3 UPNVJ 2022', 'Halo sobat safety!👋🏻\r\n\r\nMahasiswa Program Studi Kesehatan Masyarakat Program Sarjana UPN \"Veteran\" Jakarta kembali mengadakan Seminar Nasional K3 UPNVJ', '24.png', 15000, '2022-11-12', 'Zoom', 'Zoom', 'Online', 50, '', 'Universitas Pembangunan Nasional \"Veteran\" Jakarta', '@upnveteranjakarta', ''),
(27, 1, 'SEMINAR NASIONAL FISIOTERAPI UNIVERSITAS AIRLANGGA 2022', '[ Himpunan Mahasiswa Fisioterapi Universitas Airlangga ]\r\n\r\nProudly present ...\r\n\r\n💫 SEMINAR NASIONAL FISIOTERAPI UNIVERSITAS AIRLANGGA 2022 💫\r\n\r\n✨ Pelaksanaan Seminar Nasional tahun ini tentunya akan menghadirkan pemateri yang ahli dalam bidangnya masing-masing. So, without any further a do, let’s check out our great speakers! 🙌\r\n1. Dewi Poerwandari, dr., SpKFR-K\r\n2. Nur Sulastri, dr. SpKFR-K\r\n3. Isnaini Herawati, S.Fis.,Ftr.,M.Sc\r\n4. Akhmad Susiloaji, S.Tr.Kes., S.KM\r\nModerator : Dimas Aji Prayitno, S.Tr.Fis, MPT.', '25.jpeg', 150000, '2022-11-13', 'Surabaya', 'Ruang Auditorium Gedung Kuliah Bersama (GKB) Kampus C Universitas Airlangga, Kota Surabaya. ', 'Offline', 50, '', 'Himpunan Mahasiswa Fisioterapi Universitas Airlangga', '@himafis_unair', ''),
(28, 3, 'KARSA CITA IS LOOKING FOR VOLUNTEERS BATCH 4', 'Aloha Sobat Kata! 👋\r\n\r\nGood news, Karsa Cita membuka kesempatan bagi kalian yang mau berkontribusi kepada masyarakat di bidang mental issues dan self-development melalui program KATAVOLUNTEERS ✨\r\n\r\nLangsung aja daftarkan dirimu untuk posisi berikut :\r\n🎨 Visual Designer\r\n📄 Content Writer\r\n🗣 Public Speaker\r\n👥 Public Relation\r\n📂 Event Specialist\r\n📖 Community Development\r\n📲 Social Media\r\n🎙️Podcast Specialist', '26.jpeg', 0, '2022-12-17', 'Zoom', 'Zoom', 'Online', 50, '', 'Karsa Cita', '@karsacita.id\r\n', ''),
(29, 3, 'OPEN RECRUITMENT CLIMATE RANGERS SURABAYA', 'Bumi (sedang) tidak baik-baik saja!\r\n\r\nSuhu tahunan bumi diperkirakan akan naik 1,5 derajat Celsius selama lima tahun ke depan dan akan terus meningkat. Umur bumi yang katanya tinggal 3 tahun bisa jadi kenyataan, nih😭\r\n\r\nUntuk itu, Climate Rangers Surabaya membuka kesempatan bagi kamu yang ingin berkontribusi dalam perubahan iklim, terutama yang suka bikin konten. Karyamu bisa menjadi langkah pertama untuk menyadarkan banyak orang akan krisis iklim yang sedang terjadi.\r\n\r\nSelain itu, kamu juga bisa dapatkan benefit lainnya, lho\r\n1. Relasi se-Indonesia;\r\n2. Menjadi bagian dari agent of change bidang lingkungan;\r\n3. Mendapatkan E-Certificate pengurus;\r\n4. Dapat mengikuti kegiatan lingkungan bersama CR Surabaya;\r\n5. Dapat mengikuti kegiatan yang diadakan 350id.', '27.jpeg', 0, '2022-11-29', 'Surabaya', 'Surabaya', 'Offline', 50, 'CR Surabaya', 'CR Surabaya', '@cr_surabaya', ''),
(30, 2, 'Senja di Akasa bersama Ardhito Pramono', '25 November, ingat tanggalnya ya! Waktunya kita #melipirkeutara buat nyanyi bareng Ardhito Pramono di Asha Akasa! 🎤\r\n\r\nBuat yang kemarin kehabisan tiket presale, pembelian tiket reguler sudah dikembali untuk hari ini! 👀\r\n\r\nTiket dapat dibeli melalui link yang tersedia di bio kami, juga ada pembelian tiket secara offline di Asha Akasa secara terbatas ✍️', '28.jpeg', 175000, '2022-11-25', 'Yogyakarta', 'Jl. Palagan KM.12, Donoharjo. Sleman - Jogjakarta', 'Offline', 50, '', 'Asha Akasa', '@asha.akasa', ''),
(31, 2, 'Secondhand Serenade', 'Jangan lewatkan kesempatan Anda untuk menyaksikan pertunjukan Secondhand Serenade secara langsung di Bali!\r\n\r\nSecondhand Serenade adalah band rock Amerika yang dipimpin oleh gitaris, pianis dan vokalis John Vesely, terkenal dengan lagunya \"Fall for you\" yang dirilis pada tahun 2008. Pada tanggal 25 November John akan memberikan penampilan akustik di panggung Hard Rock Cafe Bali didukung oleh Painful by Kisses sebagai pembuka.', '29.jpeg', 350000, '2022-11-25', 'Bali', 'Hard Rock Cafe, Jl. Pantai Kuta, Banjar Pande Mas, Kec. Kuta, Denpasar, Bali 80361', 'Offline', 50, '', 'Hard Rock Cafe Bali', '@hardrockcafebali', ''),
(32, 4, 'WICOM 2.0 - Writing Essay On Theme \"Hero\"', 'Halo sobat muda!\r\n\r\n\r\nICE kini kembali hadir lagi membawakan event terbaik untuk kamu! Sebagai bentuk penghormatam dan memperingati Hari Pahlawan 10 November 2022. Event kali ini adalah Lomba Menulis Essay tema \"Kepahlawanan\".\r\n\r\n\r\nBENEFIT \r\n\r\nJuara 1, 2, dan 3: Medali + Piagam + Frame +  e-Piagam + e-Sertifikat \r\n\r\nSemua partisipan lomba: e-Sertifikat nasional + Uang tunai untuk peserta yang beruntung', '30.webp', 15000, '2022-11-08', 'Zoom', 'Zoom', 'Online', 50, '', 'Integrity Corporate', '@integritycorporate.events', ''),
(33, 2, 'SEVENTEEN WORLD TOUR [BE THE SUN]', 'Kabar gembira untuk CARAT! Setelah mengadakan SEVENTEEN WORLD TOUR [BE THE SUN] - JAKARTA selama 2 hari di bulan September, SEVENTEEN akan kembali lagi ke Jakarta di penghujung tahun ini untuk konser [BE THE SUN] dan berjumpa dengan lebih banyak CARAT di venue yang lebih besar. SEVENTEEN akan menampilkan lagu-lagu terbaiknya di Stadion Madya Gelora Bung Karno pada tanggal 28 Desember 2022. Kategori BLUE SOUNDCHECK PACKAGE tersedia untuk Official CARAT Member dan MCP Member untuk dapat menyapa SEVENTEEN lebih dekat. Tiket tersedia di Mecimashop.com dan Tiket.com. CARAT, mari menghabiskan akhir tahun 2022 bersama SEVENTEEN!', '31.png', 1115000, '2022-12-28', 'Jakarta Pusat', 'Jl.Asia Afrika, Rt.1/Rw.3, Gelora, Kecamatan Tanah Abang Jakarta Selatan, Dki Jakarta 10270 Indonesia, Gelora Bung Karno Madya Stadium, Jakarta Pusat, Jakarta, Indonesia', 'Offline', 50, '', 'MCP', '@mecimapro', 'contact@mecimapro.com'),
(34, 2, 'SARANGHAEYO INDONESIA 2022', 'Saranghaeyo Indonesia (SHI) is a joint concert of Korean Pop (K-Pop) Artists created by Mecimapro. “Saranghaeyo” is a phrase in Korean which means “I love you”. This event is the perfect way for the beloved K-Pop Artists to express their love to their Indonesian fans, and for the Indonesian fans to show how much they adore all things K-Pop. Artists lineup: TREASURE, JUN. K, more to be announced.', '32.png', 1265000, '2022-12-10', 'Jakarta Pusat', 'Jl. Pintu Satu Senayan No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'Offline', 50, '', 'MCP', '@mecimapro', 'contact@mecimapro.com'),
(35, 2, 'ITSY THE 1ST WORLD TOUR (CHECKMATE) IN JAKARTA', 'Grup K-pop internasional, ITZY akan datang ke Jakarta dengan tur dunia pertama mereka yang bertajuk, ITZY THE 1ST WORLD TOUR <CHECKMATE> IN JAKARTA pada tanggal 4 Februari 2023 di Tennis Indoor Stadium Senayan! ITZY akan kembali menyapa MIDZY Indonesia untuk kedua kalinya. Jadi, MIDZY, persiapkan dirimu untuk menari dan menyanyi bersama lagu-lagu hits dari ITZY! Tiket Soundcheck tersedia untuk MIDZY yang ingin berjumpa lebih dekat dengan MIDZY. Tiket tersedia di Mecimashop.com dan Tiket.com. Sampai jumpa di bulan Februari, MIDZY!', '33.png', 1415000, '2022-02-04', 'Jakarta Pusat', 'Jl. Pintu Satu Senayan No.1, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'Offline', 50, '', 'MCP', '@mecimapro', 'contact@mecimapro.com'),
(36, 2, 'THEATER MUSIKAL CEK TOKO SEBELAH ', 'Sebuah pertunjukan teater musikal karya Jakarta Movin, adaptasi dari film Cek Toko Sebelah karya Ernest Prakasa', '34.png', 350000, '2022-12-09', 'Jakarta Pusat', 'Jl. Cikini Raya No.73, Rt.8/rw.2, Cikini, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10330', 'Offline', 50, '', 'Indonesia Kaya', '@indonesia_kaya', 'kontak@indonesiakaya.com'),
(37, 2, 'ROSSA 25 SHINING YEARS CONCERT (PALEMBANG)', 'Merayakan 25 tahun karir Rossa di industri musik Indonesia. Inspire IDN akan mengadakan konser offline di 4 kota berbeda. Setelah menahan rindu selama 2 tahun akibat pandemi, pada tahun 2022 Rossa akan langsung menyapa pecinta Rossa di kota Jakarta, Bandung, Surabaya, Medan, Lampung, Kuala Lumpur dan Palembang.', '35.png', 300000, '2022-11-26', 'Palembang', 'Palembang Icon Mall, Jl. Pom Ix No. 1, Lorok Pakjo, Kec Ilir Bar. I, Kota Palembang, Sumatera Selatan 30137', 'Offline', 50, '', 'Scarlett', '@scarlett_whitening', 'marketing@scarlettwhitening.com'),
(38, 1, 'Go Scholarship 2022', 'Go Scholarship 2022 proudly present\r\n\r\n“𝙀𝙣𝙧𝙞𝙘𝙝 𝙮𝙤𝙪𝙧 𝘼𝙗𝙞𝙡𝙞𝙩𝙮, 𝙐𝙣𝙡𝙤𝙘𝙠 𝙮𝙤𝙪𝙧 𝙣𝙚𝙬 𝙊𝙥𝙥𝙤𝙧𝙩𝙪𝙣𝙞𝙩𝙮”\r\n\r\nAn Inspiring with our awardees from several well-known scholarships and “𝐏𝐚𝐫𝐚𝐦𝐚 𝐏𝐫𝐚𝐝𝐚𝐧𝐚 𝐒𝐮𝐭𝐞𝐣𝐚” as our guest star!', '36.png', 0, '2022-11-05', 'Zoom', 'Zoom', 'Online', 50, '', 'FEB Universitas Airlangga, Departemen Adkesma', '@Goscholarship2022', 'humas@feb.unair.ac.id'),
(39, 1, 'Pekan Raya Biologi 2022', '37.jpeg', '', 0, '2022-09-17', 'Sleman', 'Jl. Marsda Adisucipto', 'Offline', 50, '', 'Universitas Islam Negeri Sunan Kalijaga', '@prbuinsuka2022', 'fst@uin-suka.ac.id'),
(40, 1, 'LAWFERENCE', '[KSM DEBATE AND MOOTCOURT SOCIETY FAKULTAS HUKUM UNIVERSITAS SURABAYA x PSEUDORECHTSPRAAK FAKULTAS HUKUM UNIVERSITAS DIPONEGORO] \r\n\r\n⚖ LAWFERENCE ⚖ \r\n\r\nWEBINAR NASIONAL KOLABORATIF HIMPUNAN KOMUNITAS PERADILAN SEMU WILAYAH JAWA II INDONESIA UBAYA x UNDIP ', '38.jpeg', 0, '2022-08-11', 'Zoom', 'Zoom', 'Online', 50, '', 'HIMPUNAN KOMUNITAS PERADILAN SEMU WILAYAH JAWA II INDONESIA UBAYA x UNDIP', '@undip_semarang', 'humas@unit.ubaya.ac.id'),
(41, 1, 'TALKSHOW FOURTYFIVE STATION 2022', '[TALKSHOW FOURTYFIVE STATION 2022]\r\n\r\nSobat Muda mau tau peran Radio terhadap industri kreatif berbasis audio di era digital? Dengan pembicara yang sudah berpengalaman di bidangnya?!', '39.jpeg', 0, '2022-07-16', 'Depok', 'Jalan RS. Fatmawati Raya, Pd. Labu, Kec. Cilandak, Kota Depok, Jawa Barat 12450', 'Offline', 50, '', 'FORTYFIVE RADIO', '@fourtyfiveradio', 'fourtyfiveradio@upnvj.ac.id'),
(42, 1, 'SEMINAR NASIONAL \" Mewujudkan Kampus yang Bersih dari Kekerasan Seksual dengan NGOJEK \"', '[Badan Eksekutif Mahasiswa Ikatan Keluarga Besar Mahasiswa Universitas Hindu Indonesia 2021/2022]\r\n\r\n✨Proundly Present✨\r\n\"SEMINAR NASIONAL\" \r\ndengan tema \r\n\"Mewujudkan Kampus yang Bersih dari Kekerasan Seksual dengan NGOJEK (Ngobrol Jenius Kekinian)\"', '40.jpg', 45000, '2022-04-23', 'Bali', 'JI. Sanggalangit, Tembau, Penatih.', 'Offline', 50, '', 'Badan Eksekutif Mahasiswa Ikatan Keluarga Besar Mahasiswa Universitas Hindu Indonesia 2021/2022', '@bem_uhnigbsdenpasar', 'infos1@unhi.ac.id'),
(43, 2, 'BLACKPINK WORLD TOUR [BORN PINK] JAKARTA (GENERAL SALES)', 'BLACKPINK IN YOUR AREAAA~\r\n\r\nGrup K-pop legendaris, BLACKPINK akan datang kembali ke Jakarta untuk mempromosikan album terbaru mereka, BORN PINK melalui tur dunia mereka yang bertajuk, BLACKPINK WORLD TOUR [BORN PINK] JAKARTA pada tanggal 11 & 12 Maret 2023 di Stadion Utama Gelora Bung Karno, Jakarta!\r\n\r\nGrup beranggotakan empat orang ini akan menyapa BLINK Indonesia selama dua hari! Jadi, BLINKS, persiapkan dirimu untuk menari dan menyanyi bersama lagu-lagu hits mereka mulai dari Pink Venom, DDU-DU DDU-DU, Shut Down, BOOMBAYAH, dan masih banyak lagi!', '41.png', 1385000, '2023-03-12', 'Jakarta Pusat', 'Jakarta Pusat', 'Offline', 50, '', 'Black Pink Indonesia', '@blackpinkofficial', 'blackpink_id@gmail.com'),
(44, 2, 'SARANGIRANEUN IREUMEURO', 'MOOMOO dan TOO MOON siap-siap karena kedua grup ini bakal menyambangi Jakarta dan konser SARANGIRANEUN IREUMEURO. Bertempat di JIEXPO, Kemayoran, MAMAMOO dan ONEUS akan tampil bersama bintang tamu spesial, yakni The Overtunes. Beli tiket konser SARANGIRANEUN IREUMEURO di tiket.com sekarang!', '42.png', 1000000, '2022-12-17', 'Jakarta Utara', 'RW.10, Pademangan Tim., Kec. Pademangan, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 14410', 'Offline', 50, '', 'RBW Entertaiment', '@rbw_official', 'info@rbbridge.com'),
(45, 2, 'JKT48 11th Anniversary Concert: FLYING HIGH', 'Siapkah kamu untuk kembali terbang? JKT48 akan segera merayakan ulang tahun yang ke-11 bertajuk JKT48 11th Anniversary Concert: Flying High. \r\n\r\nKencangkan sabuk pengamanmu karena JKT48 akan mengajakmu untuk terbang lebih tinggi menuju angkasa. Bersama, kita akan menyaksikan keindahan semesta melalui lagu dan tarian bintang-bintang JKT48.\r\n\r\nAyo sekali lagi angkat lightstick-mu dan berteriak bersama menjadi saksi indahnya konser JKT48 di penghujung tahun 2022 ini!', '43.png', 250000, '2022-12-17', 'Semarang', 'Jl. Villa Marina No.1, Tawangsari, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50144', 'Offline', 50, '', 'Jkt48 Operation Team', '@jkt48', 'official.jkt48@gmail.com'),
(46, 2, 'November Love Story', 'Saksikan Konser November Love Story dengan Bintang Tamu yang luar bisa seperti FABIO ASHER, YURA, LYODRA & BUDI DOREMI. \r\nSegera dapatkan tiketnya sebelum kehabisan!!', '44.png', 184700, '2022-11-26', 'Kubu Raya', 'Jalan Arteri Supadio Km 12.8 No. 16, Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat, Indonesia.', 'Offline', 50, '', 'Wahyu Athalla Trans', '@rentalmobilbalilombok', 'admin@rentalmobilbalilombok.com'),
(47, 2, 'Psycholand Fest', 'Acara Festival Music yang diadakan pada tanggal 17 Desember 2022 meliputi Talkshow serta penampilan dari beberapa musisi ternama tanah air', '45.png', 125000, '2022-12-17', 'Bekasi', 'Jl. Perjuangan, No. 81, Rt/Rw. 03/002, Kel. Marga Mulya, Kec. Bekasi Utara, Kota Bekasi', 'Offline', 50, '', 'psycholandfest', '@psycholandfest', 'psycholandfest8@gmail.com'),
(48, 2, 'KPOP LAND IN JAKARTA 2022', 'BE READY KPOP FANS!! KARD, ATEEZ, KIHYUN (MONSTA X),WEEEKLY, VICTON and Special Guest MADDOX\r\n\r\nKPOP LAND dipromotori oleh PT. Boart Indonesia. KPOP LAND mempersembahkan konser Boy Band dengan mengusung tema “CELEBRATING, LOVE, PEACE AND A BETTER WORLD” yang dimeriahkan oleh kedatangan Line up KARD, ATEEZ, KIHYUN (MONSTA X), WEEEKLY, VICTON & MADDOX dan akan diadakan di Stadium Baseball Senayan, Jakarta pada hari Jum’at, tanggal 16 September 2022 mulai pukul 18.30 WIB.\r\n\r\n\r\nSalah satu KPOP yang akan tampil adalah ATEEZ. ATEEZ memiliki Facebook fanbase di Indonesia sebesar 38.3 Ribu dan Instagram followers sebesar 22.3 Ribu. ATEEZ terdiri dari 8 personil dibawah KQ Entertainment dengan debut mereka di tahun 2018 “Treasure EP.1: All to Zero”. Dengan personil : Hongjoong, Seonghwa, Yunho, Yeosang, San, Mingi, Wooyoung dan Jongho. Hits yang banyak disukai oleh fans di Indonesia adalah Answer. Didalam lagu Answer dari awal hingga akhir lagu dimanjakan oleh suara personil dan nada yang sempurna.\r\n\r\n\r\nSelain ATEEZ, Kihyun dia adalah salah satu personil dari Monsta X. Kihyun dipercaya menyanyikan OST drama seperti Orange Marmalade dan Suspicious Partner. Kihyun adalah vocalist di dalam group Monsta X. Hits dari Monsta X seperti Beautiful, Shine Forever, From Zero, Underwater, Queen, You Can’t Hold My Heart, Flavors of Love.\r\n\r\nDan Performance lainnya yang akan tampil adalah KARD, WEEKLY, VICTON dan Special Guest MADDOX.', '46.png', 2230000, '2022-09-16', 'Jakarta', 'Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'Offline', 50, '', 'Boart Indonesia', '@boartindonesia', ''),
(49, 2, 'Westlife : The Wild Dreams Tour', 'Grup album terlaris Inggris abad ke-21, Westlife, hari ini mengumumkan tur ekstensif 2022 saat kembalinya mereka yang sensasional ke musik berlanjut. Dipromosikan oleh PK Entertainment dan Sound Rhythm, Westlife akan tampil di Stadion Madya Gelora Bung Karno Jakarta pada 11 Februari 2023. Tiket Westlife The Wild Dreams Tour 2023 Jakarta akan dijual mulai 28 Mei pukul 10.00 WIB. (GMT+7 / Jakarta Local Time) secara eksklusif di www.westlifeinjakarta.com\r\n\r\nWestlife mengatakan, “Kami sangat bersemangat untuk mengumumkan berita tentang The Wild Dreams Tour dan akhirnya kembali tampil untuk semua penggemar kami di Jakarta, Indonesia. Setelah beberapa bulan terakhir ini dengan semua yang terjadi di dunia, tur ini lebih berarti bagi kami daripada yang pernah kami lakukan sebelumnya. Ini akan menjadi perayaan besar-besaran dan akan membawa kami lebih dekat dengan penggemar kami daripada sebelumnya. Kami sedang merencanakan beberapa pertunjukan spektakuler yang akan mencakup semua hit terbesar kami dan beberapa kejutan spesial.”\r\n\r\nBerita tur 2022 menandai awal dari jadwal padat Westlife menyusul kesuksesan besar album terbaru mereka \'Wild Dreams\' yang dirilis November 2021. Berempat - Shane, Nicky, Mark dan Kian telah memantapkan diri mereka sebagai band terbesar di dunia. abad ke-21, telah menjual lebih dari 55 juta rekaman di seluruh dunia dan merupakan satu-satunya band yang memiliki tujuh single pertama mereka masuk tangga lagu Inggris di No.1. Mereka juga memiliki single terbanyak dari artis mana pun yang debut di No.1 di Inggris. Secara keseluruhan, Westlife memiliki 14 single No.1 yang luar biasa, hanya di belakang Elvis Presley dan The Beatles. Mereka telah memiliki 33 album No.1 di seluruh dunia dan sebagai aksi live mereka telah menjual lima juta tiket konser di seluruh dunia dan terus bertambah.', '47.jpeg', 1400000, '2023-02-11', 'Jakarta Pusat', 'Gelora Bung Karno, Jl. Pintu Satu Senayan, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, DKI Jakarta 10270', 'Offline', 50, '', 'PK Entertainment', '@pkentertaiment.id', 'contact@pk-ent.com'),
(50, 2, 'Heads in The Clouds', 'Penyelenggara Head In The Clouds Jakarta merilis daftar lineup atau pengisi festival musik itu yang bakal digelar pada 3-4 Desember 2022 mendatang di Community Park PIK2, Jakarta Utara.\r\nHead In The Clouds Jakarta akan menghadirkan banyak musisi internasional maupun lokal yang berada di bawah naungan label 88Rising, termasuk Rich Brian, NIKI, Warren Hue, Joji, Jackson Wang hingga (G)I-dle.\r\n\r\nTak hanya itu, Head In The Clouds Jakarta juga membuka kembali pre-sale tiket gelombang kedua mulai 21 September 2022.', '48.png', 2514300, '2022-12-03', 'Tangerang', 'Tangerang', 'Offline', 50, '', 'HITC Jakarta', '@hitcjakarta', 'contact@hitc.jkt.com'),
(51, 4, 'Coding OLYMPICS INDONESIA 2022', 'Coding Olympics Indonesia 2022 merupakan ajang kompetisi coding tahunan yang ditujukan untuk murid Sekolah Dasar (SD) yang diorganisir oleh iGroup – MangoSTEEMS, bekerja sama dengan KodeKiddo. Coding Olympics 2022 merupakan kompetisi coding pertama yang didukung secara resmi oleh CodeMonkey di Indonesia.\r\n\r\nKompetisi ini dilakukan di platform coding CodeMonkey, dimana peserta kompetisi akan diberi coding challenges untuk menyelesaikan suatu masalah dengan menggunakan teknik programming yang cocok untuk kiddos di level SD.\r\n\r\nSelain berkompetisi, kiddos akan mengasah & mendapatkan pengetahuan computer programming, kemampuan memecahkan masalah (problem-solving), kemampuan berpikir secara logis dan matematis (mathematical logic thinking), serta kemampuan untuk berpikir kritis (critical thinking).', '49.png', 250000, '2022-12-25', 'Zoom', 'Zoom', 'Online', 50, '', 'KodeKiddo', '@KodeKiddo', 'info@kodekiddo.com'),
(52, 4, 'CODE RUN 2022', 'Code Run merupakan kompetisi programming terbuka terbesar di Indonesia. Terbuka untuk seluruh penggiat kode Indonesia tanpa batasan umur, profesi dan edukasi. Saatnya kamu unjuk gigi dengan kemampuan programming-mu! Kompetisi diadakan selama 15 - 20 Desember 2022\r\n\r\nCode Run diadakan secara full online menggunakan platform Algobash untuk melakukan submission programming. Ada 3 Cabang Lomba: Pemecahan Algoritma (programming logic), React, Golang. Event ini hanya berlaku untuk Warga Negara Indonesia (WNI). Peserta hanya diperbolehkan mengikuti 1 (satu) kali untuk setiap cabang kompetisi.', '50.png', 0, '2022-12-15', 'Zoom', 'Zoom', 'Online', 50, '', 'Algo Bash', '@algobashofficial', 'algobashdev@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `eventdetail`
--

CREATE TABLE `eventdetail` (
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `KodeBooking` char(6) NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `KategoriID` int(11) NOT NULL,
  `Kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`KategoriID`, `Kategori`) VALUES
(1, 'Seminar'),
(2, 'Concert'),
(3, 'Volunteer'),
(4, 'Competition');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `ReminderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`ReminderID`, `UserID`, `EventID`) VALUES
(1, 2, 5),
(2, 2, 5),
(3, 1, 4),
(4, 1, 5),
(13, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `buktiPembayaran` varchar(100) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `userID`, `buktiPembayaran`, `status`) VALUES
(4, 2, NULL, 'BELUM'),
(5, 2, 'bukti5.png', 'SUDAH'),
(6, 1, NULL, 'BELUM'),
(7, 1, 'bukti7.png', 'SUDAH'),
(8, 1, NULL, 'BELUM'),
(9, 1, 'bukti9.png', 'SUDAH');

-- --------------------------------------------------------

--
-- Table structure for table `transactionDetail`
--

CREATE TABLE `transactionDetail` (
  `transactiondetailID` int(11) NOT NULL,
  `transactionID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `kodeBooking` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionDetail`
--

INSERT INTO `transactionDetail` (`transactiondetailID`, `transactionID`, `eventID`, `qty`, `kodeBooking`) VALUES
(4, 4, 8, 1, NULL),
(5, 4, 7, 2, NULL),
(6, 5, 5, 1, NULL),
(7, 7, 4, 1, NULL),
(8, 9, 5, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Nama` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `JenisKelamin` char(6) DEFAULT NULL,
  `NoTelp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Nama`, `Email`, `Password`, `TanggalLahir`, `JenisKelamin`, `NoTelp`) VALUES
(1, 'Brychan Artanto', 'brychan58@gmail.com', '$2y$10$zT2W1LECyuepFLW3agJ9Vu.en6uRywPT8nTY3K/Pdl4ldyRr2PMLW', '1970-11-02', '', '082157318364'),
(2, 'Vincent Kartamulya Santo Paulus', 'vincent.santoso03@gmail.com', '$2y$10$CRJ16mOm9JxtHaD2euyeYus7r7TUyfIJ2TX3ZTlWclVH2mN8hKhZm', '1970-11-02', '', '081287966089');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`KodeBooking`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_EventID` (`EventID`),
  ADD KEY `cart_ibfk_1` (`UserID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatID`),
  ADD KEY `fk_userID` (`UserID`);

--
-- Indexes for table `chatdetail`
--
ALTER TABLE `chatdetail`
  ADD PRIMARY KEY (`ChatDetailID`),
  ADD KEY `fk_chatID` (`ChatID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `fk_kategoriID` (`KategoriID`);

--
-- Indexes for table `eventdetail`
--
ALTER TABLE `eventdetail`
  ADD PRIMARY KEY (`EventID`,`UserID`),
  ADD UNIQUE KEY `fk_eventID2` (`EventID`),
  ADD KEY `fk_userID2` (`UserID`),
  ADD KEY `fk_kodeBooking` (`KodeBooking`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`ReminderID`),
  ADD KEY `fk_userID3` (`UserID`),
  ADD KEY `fk_eventID3` (`EventID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `transactionDetail`
--
ALTER TABLE `transactionDetail`
  ADD PRIMARY KEY (`transactiondetailID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `transactionID` (`transactionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ChatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatdetail`
--
ALTER TABLE `chatdetail`
  MODIFY `ChatDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `ReminderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactionDetail`
--
ALTER TABLE `transactionDetail`
  MODIFY `transactiondetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_EventID` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chatdetail`
--
ALTER TABLE `chatdetail`
  ADD CONSTRAINT `fk_chatID` FOREIGN KEY (`ChatID`) REFERENCES `chat` (`ChatID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_kategoriID` FOREIGN KEY (`KategoriID`) REFERENCES `kategori` (`KategoriID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventdetail`
--
ALTER TABLE `eventdetail`
  ADD CONSTRAINT `fk_eventID2` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kodeBooking` FOREIGN KEY (`KodeBooking`) REFERENCES `booking` (`KodeBooking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userID2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `fk_eventID3` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userID3` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactionDetail`
--
ALTER TABLE `transactionDetail`
  ADD CONSTRAINT `transactiondetail_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `transactiondetail_ibfk_3` FOREIGN KEY (`transactionID`) REFERENCES `transaction` (`transactionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
