-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2021 at 08:48 PM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jatinomi_web_peternakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak_perusahaan`
--

CREATE TABLE `anak_perusahaan` (
  `id_ap` int(11) NOT NULL,
  `gambar_ap` varchar(300) NOT NULL,
  `nama_ap` varchar(300) NOT NULL,
  `deskripsi_ap` text DEFAULT NULL,
  `link_ap` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anak_perusahaan`
--

INSERT INTO `anak_perusahaan` (`id_ap`, `gambar_ap`, `nama_ap`, `deskripsi_ap`, `link_ap`) VALUES
(5, 'Anak Kota-8Bgfky8QMEOA2T2pTd9m.png', 'PT. Jatinom Indah Agri', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://jatinomindah.com/blog/5'),
(9, 'PT. Lima Satu Lima-bXjjc2yf8qLPPpOpKDXv.jpg', 'PT. Lima Satu Lima', '<p>                             qqqq\r\n                            <img src=\"data:image/png;base64,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\" style=\"width: 256px;\" data-filename=\"008-orpington-chicken.png\"></p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `gambar_blog` varchar(300) NOT NULL,
  `judul_blog` varchar(300) NOT NULL,
  `isi_blog` text NOT NULL,
  `tanggal_blog` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `gambar_blog`, `judul_blog`, `isi_blog`, `tanggal_blog`) VALUES
(4, 'Quality Control menjadi Tolok Ukur Keberhasilan-jX0KIbti4UkoDuulTYMt.jpg', 'Quality Control menjadi Tolok Ukur Keberhasilan', 'Menjaga input yang diberikan terhadap ayam menjadi kunci keberhasilan dalam berternak.', '2021-06-19'),
(5, 'Sejak 1970 Dipercaya-eUsBJMuOSmrKgUloynPs.jpg', 'Sejak 1970 Dipercaya', 'Berdiri sejak tahun 1970 dan bertahan hingga sekarang, hal tersebut menjadi bukti bahwa kami selalu menjaga kepercayaan pelanggan dan mitra.', '2021-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_pelanggan` bigint(20) NOT NULL,
  `id_produk` int(12) NOT NULL,
  `id_cart` int(12) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `id_pemesanan` int(12) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_pelanggan`, `id_produk`, `id_cart`, `jumlah`, `satuan`, `harga`, `total`, `id_pemesanan`, `status`) VALUES
(3, 7, 30, 3, '', 0, 360000, 25, 'sudah'),
(3, 7, 31, 2, '', 0, 240000, 26, 'sudah'),
(3, 7, 32, 2, '', 0, 240000, 26, 'sudah'),
(3, 7, 33, 7, '', 0, 840000, 26, 'sudah'),
(5, 7, 35, 3, '', 0, 360000, 27, 'sudah'),
(3, 7, 37, 3, '', 0, 360000, 31, 'sudah'),
(5, 8, 38, 2, '', 0, 100000, 32, 'sudah'),
(5, 7, 39, 3, '', 0, 360000, 32, 'sudah'),
(6, 7, 42, 3, '', 0, 360000, 33, 'sudah'),
(6, 7, 43, 2, '', 0, 240000, NULL, NULL),
(7, 7, 44, 2, '', 0, 240000, NULL, NULL),
(8, 7, 45, 2, '', 0, 240000, 34, 'sudah'),
(8, 7, 46, 2, '', 0, 240000, 35, 'sudah'),
(8, 20, 47, 15, 'Kg', 12000, 180000, 36, 'sudah'),
(8, 12, 48, 5, 'Kg', 6860, 34300, 36, 'sudah'),
(8, 11, 49, 9, 'Kg', 7000, 63000, 36, 'sudah'),
(14, 18, 52, 0, 'Minggu', 5300, 0, 37, 'sudah'),
(14, 16, 53, 9000, 'Kg', 19860, 178740000, 37, 'sudah'),
(16, 20, 54, 10, 'Kg', 12000, 120000, 38, 'sudah'),
(17, 15, 55, 200, 'Kg', 10500, 2100000, NULL, NULL),
(14, 20, 56, 20000, 'Kg', 12000, 240000000, 39, 'sudah'),
(19, 16, 57, 5000, 'Kg', 19860, 99300000, 40, 'sudah'),
(21, 18, 58, 1, 'Minggu', 5300, 5300, 41, 'sudah'),
(21, 16, 59, 3, 'Kg', 19860, 59580, 41, 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `direksi`
--

CREATE TABLE `direksi` (
  `id_direksi` int(12) NOT NULL,
  `nama_direksi` varchar(255) NOT NULL,
  `jabatan_direksi` varchar(255) NOT NULL,
  `gambar_direksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direksi`
--

INSERT INTO `direksi` (`id_direksi`, `nama_direksi`, `jabatan_direksi`, `gambar_direksi`) VALUES
(7, 'Salman Al Farisi', 'Purchasing', 'Salman Al Farisi-OO8hdVKJByoDr8I00udT.jpg'),
(8, 'Rojer Aufa', 'Marketing', 'Rojer Aufa-DJqWfZL9KXuYxN6NLbGd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id_expertise` int(12) NOT NULL,
  `nama_expertise` varchar(255) NOT NULL,
  `deskripsi_expertise` varchar(1000) NOT NULL,
  `gambar_expertise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id_expertise`, `nama_expertise`, `deskripsi_expertise`, `gambar_expertise`) VALUES
(9, 'Pemeliharaan Unggas', 'Kami konsisten terhadap hasil yang kami berikan, adaptif terkait teknis pelaksanaan, dan terbuka akan pembaharuan. <br/> &ensp;', 'Pemasok Ayam-q3dAuCfdBhBiAEOX1ZD3.png'),
(10, 'Telur Ayam <div class=\"d-block d-md-none d-lg-none\">&emsp;</div>', 'Kami memproduksi telur ayam dengan berbagai ukuran, warna, ketahanan, hingga nutrisi untuk mengisi berbagai segmen.', 'Pemasok Telur-p0uKHKDDy52P53o7Xeaw.png'),
(11, 'Rantai Pasok <div class=\"d-none d-sm-block d-md-none d-lg-none\">&emsp;</div>', 'Kami membantu para peternak unggas dengan memenuhi kebutuhan dan keperluan mereka.<br>&ensp;<br>&ensp;', 'Rantai Pemasok-8ll9jGcaaJh0kSQGk6Vh.png'),
(12, 'Distribusi <br> ', 'Bekerjasama dengan berbagai brand FMCG, kami banyak mendistribusikan produk mereka di wilayah Blitar hingga Madiun.', 'Distribusi-ljwsdcy5tUOR3X7McQ27.png');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(300) NOT NULL,
  `gambar_fasilitas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `gambar_fasilitas`) VALUES
(3, 'Feed Mill', 'Feed Mill-rk7TwKBRpCfkPBP7zjoU.jpg'),
(4, 'Expedition', 'Expedition-03xFSMYfnMexj7xA3xIr.jpg'),
(5, 'Open House', 'Open House-zPZ9Lh8md7TZjIAxfHen.jpg'),
(6, 'Cold Storage', 'Cold Storage-cyJ8CFqdVXPK5wpsFqLc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `id_produk`, `harga`, `satuan`) VALUES
(1, 20, 12000, 'Kg'),
(3, 19, 1600, 'Kg'),
(4, 18, 5300, 'Minggu'),
(5, 16, 19860, 'Kg'),
(6, 15, 10500, 'Kg'),
(7, 14, 1250, 'Kg'),
(8, 12, 6860, 'Kg'),
(9, 11, 7000, 'Kg'),
(10, 16, 53400, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Frozen'),
(6, 'Telur'),
(7, 'Day One Chick');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`) VALUES
(1, 'Fresh'),
(2, 'Frozen');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id_partner` int(11) NOT NULL,
  `gambar_partner` varchar(300) NOT NULL,
  `nama_partner` varchar(300) NOT NULL,
  `link_partner` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id_partner`, `gambar_partner`, `nama_partner`, `link_partner`) VALUES
(2, 'asas-YtRCFA2eggZfBlzFzGX5.png', 'asas', 'asassa'),
(3, 'Charoen Pokphand-d4kW9T2NoMUmqSyCC9v3.jpg', 'Charoen Pokphand', 'https://cp.co.id/'),
(4, 'Sreeya Sewu-xTGflTlwj5K1tPnJgIZQ.jpg', 'Sreeya Sewu', 'https://sreeyasewu.com/');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `rt` varchar(50) NOT NULL,
  `alamat_tambahan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `password`, `no_telepon`, `provinsi`, `kota`, `kecamatan`, `desa`, `rw`, `rt`, `alamat_tambahan`) VALUES
(1, 'asasasas', 'asasas', '121221212', 'aaaaa', 'sssss', 'ddddd', 'ffffff', '12', '12', 'asaasa');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` bigint(12) NOT NULL,
  `kode_verifikasi` varchar(8) NOT NULL,
  `id_pelanggan` int(13) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nama_perusahaan` varchar(120) DEFAULT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(120) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tgl_pesan` date NOT NULL,
  `catatan` varchar(500) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `status_proses` varchar(300) NOT NULL,
  `bukti_pembayaran` varchar(300) NOT NULL,
  `total` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_verifikasi`, `id_pelanggan`, `nama`, `nama_perusahaan`, `no_telp`, `email`, `alamat`, `tgl_kirim`, `tgl_pesan`, `catatan`, `status`, `status_proses`, `bukti_pembayaran`, `total`) VALUES
(39, 'ZKS5hCs8', 14, 'Uji Coba', NULL, '080808080', 'ujicoba@dotcom', 'Jl. Maluku no. 45 (depan Yonif 511) Kel.Kuningan Kec.Kanigoro Blitar Jawa Timur 66171', '2021-09-22', '2021-09-18', NULL, 'Belum Lunas', 'Belum diproses', 'Belum dibayar.png', 240000000),
(40, 'HnCiJA1H', 19, 'Uji', NULL, '123434355', 'ujiicoba@gmail.com', 'Blitar Kel.Blitar Kec.Blitar Blitar Jawa timur 66171', '2021-10-20', '2021-10-15', NULL, 'Belum Lunas', 'Belum diproses', 'Belum dibayar.png', 99300000),
(41, 'mt840yLr', 21, 'boladikita', NULL, '0894342453', 'boladikita@gmail.com', 'malang Kel.mallang Kec.malang malang jawa 65211', '2021-10-21', '2021-10-19', NULL, 'Proses', 'Belum diproses', 'Belum dibayar.png', 64880),
(42, 'UkGIVtFP', 24, 'Raswa', NULL, '08112118141', 'carbackkartiwin@gmail.com', 'Dsn.Linggaharja 06/02 Kel.Mekarsari Kec.Tambaksari Ciamis Jawa Barat 46388', '2021-12-04', '2021-11-25', NULL, 'Selesai', 'Belum diproses', 'Belum dibayar.png', 0);

--
-- Triggers `pemesanan`
--
DELIMITER $$
CREATE TRIGGER `update_cart` AFTER INSERT ON `pemesanan` FOR EACH ROW UPDATE cart SET id_pemesanan = new.id_pemesanan WHERE cart.id_pemesanan IS NULL AND new.id_pelanggan = id_pelanggan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `id_ukuran` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `jumlah_produk` int(10) NOT NULL,
  `total_harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_kategori`, `id_ukuran`, `id_produk`, `id_pelanggan`, `jumlah_produk`, `total_harga`) VALUES
(1, 1, 2, 7, 1, 3, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar_produk` varchar(300) NOT NULL,
  `nama_produk` varchar(300) NOT NULL,
  `deskripsi_produk` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `gambar_produk`, `nama_produk`, `deskripsi_produk`) VALUES
(11, 7, 'DOC Ayam Kampung-o8nG8TkUlpz77fCheijx.jpg', 'DOC Ayam Kampung', 'Day One Chiken Ayam Kampung'),
(12, 7, 'DOC Broiler-nXbRWNdrZHeA1u0Lz6qi.jpg', 'DOC Broiler', 'Day One Chiken Broiler strain Lohman'),
(14, 7, 'DOQ-HvxtaZT9oz7NJnRzN0of.jpg', 'DOQ', 'Day One Quill Ayam Puyuh'),
(15, 7, 'DOD-WFjsk4CQoJ2Vj2yyQ3Q3.jpg', 'DOD', 'Day One Duck Bebek'),
(16, 6, 'Telur Ras-8ZjHwSByaprvvlggRrPT.png', 'Telur Ras', 'Telur ras atau juga disebut telur merah pembelian minimal 4 ton'),
(18, 7, 'Pullet-2Zc8k9MVBwRZzhgGFgMB.jpg', 'Pullet', 'Ayam Siap Telur'),
(19, 7, 'BKK-tFamTU7QszWwuyAW6ee7.jpg', 'BKK', 'Bungkil Kedelai'),
(20, 3, 'MBM-j2vCz1tJpmvX4Nzpw7i3.jpg', 'MBM', 'Meat Bone Meal');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `gambar_slider` varchar(300) NOT NULL,
  `judul_slider` varchar(300) NOT NULL,
  `caption_slider` varchar(300) NOT NULL,
  `link_slider` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `gambar_slider`, `judul_slider`, `caption_slider`, `link_slider`) VALUES
(9, 'Mengutamakan Kualitas-QCd6diXbo5QGmNf1LL4w.jpg', 'Kualitas adalah Prioritas', 'Bagi kami, kualitas menjadi prioritas yang turun temurun kami jaga', 'http://jatinomindah.com/blog/4'),
(10, 'Produk Kami-ABBj5JsvxzXoeP9TR5xy.jpg', 'Produk Kami', 'Temukan produk-produk dari kami yang terjamin kualitasnya', 'produk-user'),
(11, '50 Tahun Lebih Menjaga Amanah-uG14jy9iF9ViK9XKxNjA.jpg', '50 Tahun Lebih Menjaga Amanah', 'Bahkan dalam badai krisis pun kami tidak kabur', 'http://jatinomindah.com/blog/5');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `nama_ukuran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama_ukuran`) VALUES
(1, '12-14'),
(2, '14-16');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `nama_ulasan` varchar(300) NOT NULL,
  `email_ulasan` varchar(300) NOT NULL,
  `isi_ulasan` varchar(300) NOT NULL,
  `tgl_ulasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `nama_ulasan`, `email_ulasan`, `isi_ulasan`, `tgl_ulasan`) VALUES
(10, 'James', 'w@e', 'Jatinom is a great partner! Beside their quality, they keep their words! Absolutely trustworthy', '2021-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kab_kota` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_telp`, `provinsi`, `kab_kota`, `kecamatan`, `kelurahan`, `alamat`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Jatinom Indah', 'jatinomindah2021@gmail.com', '0895395168312', 'Jawa Timur', 'Kab.Blitar', 'Blitar', 'Blitar', 'Blitar', NULL, '$2y$10$1JDgHCfvAfQUavx5FpLHxOFSNIBiNNG8F5m6tewkUt4gvpjZzv0Ee', NULL, '2021-05-16 05:46:56', '2021-05-16 05:46:56', 1),
(9, 'Rojer', 'aufadroger@gmail.com', '085704972554', 'Jawa Timur', 'Blitar', 'Kanigoro', 'Kuningan', 'Jl. Maluku no. 45 (depan Yonif 511)', NULL, '$2y$10$GMZV//Qo6W/HpflZy3iMye5Yzct5fBddlaaMTRiSJYbFlSGIPwina', NULL, '2021-06-17 23:58:51', '2021-06-17 23:58:51', 2),
(12, 'Rojer', 'rogeralaufa@gmail.com', '085704972554', 'Jawa Timur', 'Blitar', 'Kanigoro', 'Kuningan', 'Jl. Maluku no. 45 (depan Yonif 511)', NULL, '$2y$10$wQ.VTsCZKJoYc66epIUu6.duR.9BwAci/jhooagna/jzNLndN/o5S', NULL, '2021-07-02 09:41:05', '2021-07-02 09:41:05', 2),
(14, 'Uji Coba', 'ujicoba@dotcom', '080808080', 'Jawa Timur', 'Blitar', 'Kanigoro', 'Kuningan', 'Jl. Maluku no. 45 (depan Yonif 511)', NULL, '$2y$10$zw6/3ZMqggu4PbMaW3S.lu9Oa2rQgn8/mDVopriRtGV6IV78wAolq', NULL, '2021-08-03 23:37:32', '2021-08-03 23:37:32', 2),
(15, 'Bayu', 'bayu.prasetiawibowo@gmail.com', '081330561832', 'Jawatimur', 'Malang', 'Lowokwaru', 'Tlogomas', 'Jl. Pintu Keluar Terminal Landungsari No.1', NULL, '$2y$10$JMzm0BhiVYw5V1VQEkhIs.yH6Rc/F.gSz2y2jVCkuQ76Sg9.Gbd36', NULL, '2021-09-01 20:12:33', '2021-09-01 20:12:33', 2),
(17, 'EKO NURWAHYUDI SANTOSA', 'ekow45002@gmail.com', '085608613310', 'JAWA TIMUR', 'JOMBANG', 'PERAK', 'SUMBERAGUNG', 'RT 02 RW 03 DESA SUMBERAGUNG', NULL, '$2y$10$Nwjah34dxlOcy0uc54CyH.sgM2mwgeMK0Mfn6QRBvtgsL0iZjLGx.', NULL, '2021-09-04 07:28:51', '2021-09-04 07:28:51', 2),
(18, 'yushivan rendi h', 'rendiharvi@gmail.com', '089345234423', 'jawa timur', 'Mlaang', 'lawang', 'lawang', 'jl.slamet riadi no 35', NULL, '$2y$10$XcCJZ/zpyun8KFAKYlPSKOCleCstpMujIiqLTO92.ZQJ1O5kX5/2K', NULL, '2021-09-17 01:18:20', '2021-09-17 01:18:20', 2),
(19, 'Uji', 'ujiicoba@gmail.com', '123434355', 'Jawa timur', 'Blitar', 'Blitar', 'Blitar', 'Blitar', NULL, '$2y$10$M4WQwx.Vu8f68FXB74uWyewhaDUu2Gd3qrRpDDcZF2fEMjxt1VV5K', NULL, '2021-10-14 19:50:00', '2021-10-14 19:50:00', 2),
(21, 'boladikita', 'boladikita@gmail.com', '0894342453', 'jawa', 'malang', 'malang', 'mallang', 'malang', NULL, '$2y$10$1JDgHCfvAfQUavx5FpLHxOFSNIBiNNG8F5m6tewkUt4gvpjZzv0Ee', NULL, '2021-10-18 21:13:43', '2021-10-18 21:13:43', 2),
(22, 'Yudho Lestari Dwi Puspito', 'yudholestaridp@gmail.com', '083834422888', 'Jawa Timur', 'Kab. Malang', 'Gedangan', 'Sumberrejo', 'RT 12 RW 04', NULL, '$2y$10$zWSmpPX5mvcyganYYwO...IEy.v5BN5cGJIOAyLV8FJhPm3xl8D4C', NULL, '2021-10-21 07:49:48', '2021-10-21 07:49:48', 2),
(23, 'rini', 'rinisarwidi2519@gmail.com', '082211148474', 'jawa barat', 'bekasi', 'rawalumbu', 'bojongrawalumbu', 'jl bojong indah blok c 4 no 5 bekasi', NULL, '$2y$10$TX6GkAh6AHQXA.K96hPx7.SW2D6nXliFT.ZcKY1SHdd5IlG6mr3RW', NULL, '2021-11-08 09:07:49', '2021-11-08 09:07:49', 2),
(24, 'Raswa', 'carbackkartiwin@gmail.com', '08112118141', 'Jawa Barat', 'Ciamis', 'Tambaksari', 'Mekarsari', 'Dsn.Linggaharja 06/02', NULL, '$2y$10$yEfVJsdkz7znIzguupzw9.38xryYQLOmB9Qbao1tMDLaUYKDcNsRu', NULL, '2021-11-25 11:02:55', '2021-11-25 11:02:55', 2),
(26, 'realxiao', 'realxiao59@gmail.com', '089566772618', 'bandung', 'bandung barat', 'parahyangan', 'parahyangan barat', 'ciwidey', NULL, '$2y$10$.ICn95SpKQBLrT6lkXKeNu4du9u2hAmianplgo30DVkga3kGiFZ8u', NULL, '2021-11-25 21:14:36', '2021-11-25 21:14:36', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak_perusahaan`
--
ALTER TABLE `anak_perusahaan`
  ADD PRIMARY KEY (`id_ap`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `direksi`
--
ALTER TABLE `direksi`
  ADD PRIMARY KEY (`id_direksi`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id_expertise`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD UNIQUE KEY `kode_verifikasi` (`kode_verifikasi`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_ukuran` (`id_ukuran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak_perusahaan`
--
ALTER TABLE `anak_perusahaan`
  MODIFY `id_ap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `direksi`
--
ALTER TABLE `direksi`
  MODIFY `id_direksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id_expertise` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
