-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 30. Mei 2013 jam 03:48
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `editor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` longtext NOT NULL,
  `tanggal_artikel` date NOT NULL,
  `status_artikel` char(1) NOT NULL,
  `id_kategori_artikel` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_artikel`),
  KEY `id_kategori_materi` (`id_kategori_artikel`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_kategori_artikel` (`id_kategori_artikel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `tanggal_artikel`, `status_artikel`, `id_kategori_artikel`, `id_pengguna`) VALUES
(19, 'Pengertian HTML', 'HTML (HyperText Markup Language) adalah standar dipakai pada halaman web. Berdasarkan standar inilah browser bisa memahami isi suatu dokumen yang berasal dari web server. HTML bekerja dengan menggunakan HTTP (Hypertext Transfer Protocol), yaitu protokol komunikasi yang memungkinkan web server berkomunikasi dengan web browser.\r\nKode HTML berupa sebuah berkas teks dengan akhirnya berupa .HTML, .html, .HTM, .htm.', '2013-02-15', '0', 6, 4),
(20, 'Pengertian PHP', 'Menurut dokumen resmi PHP. PHP merupakan singkatan dari Hypertext Preprocessor. PHP merupakan sebuah file teks yang terpasang pada HTML dan merupakan bahasa berbentuk script yang ditempatkan dalam server dan diproses di server. Hasilnya dikirimkan ke klien tempat pemakai menggunakan browser.\r\nSecara khusus PHP, dirancang untuk membentuk aplikasi web dinamis. Artinya dapat membentuk suatu tampilan berdasarkan permintaan terkini. Misalnya Anda bisa menampilkan isi database ke halaman web. Pada prinsipnya PHP mempunyai fungsi yang sama dengan script-script seperti ASP (Active Server Page), Cold Fusion ataupun Perl. Namun perlu diketahui bahwa PHP sebenarnya bisa dipakai secara command line. Artinya script PHP dapat dijalankan melibatkan web server maupun browser.\r\nSecara khusus PHP, dirancang untuk membentuk aplikasi web dinamis. Artinya dapat membentuk suatu tampilan berdasarkan permintaan terkini. Misalnya Anda bisa menampilkan isi database ke halaman web. Pada prinsipnya PHP mempunyai fungsi yang sama dengan script-script seperti ASP (Active Server Page), Cold Fusion ataupun Perl. Namun perlu diketahui bahwa PHP sebenarnya bisa dipakai secara command line. Artinya script PHP dapat dijalankan melibatkan web server maupun browser. Yang menarik kode PHP juga bisa berkomunikasi dengan database dan melakuakan perhitungan-perhitungan yang kompleks sambil jalan.', '2013-02-15', '0', 1, 4),
(21, 'Konsep Kerja PHP', 'Model kerja HTML diawali dengan permintaan suatu halaman web oleh browser. Berdasarkan URL atau dikenal dengan sebutan alamat internet, browser mendapatkan alamat dari web server, mengidentifikasi halaman yang dikehendaki dan menyampaikan segala informasi yang dibutuhkan oleh web server.\r\nSelanjutnya web server akan mencarikan berkas yang diminta dan memberikan isinya ke browser. Browser yang mendapatkan isinya segera melakukan proses penterjemahan kode HTML dan menampilkan ke layar pemakai.\r\nBagaimana halnya kalau yang diminta adalah sebuah halaman PHP ? Prinsipnya serupa dengan kode HTML, hanya saja ketika berkas PHP dan mesin inilah yang memproses dan memberikan hasilnya ( Berupa kode HTML ) ke web Server untuk selanjutnya disampaikan ke client yang request', '2013-02-15', '0', 1, 4),
(22, 'PHP dan Database', 'Salah satu kelebihan PHP adalah mampu berkomunikasi dengan berbagai database yang umum dan sering digunakan, misalnya MySQL. PHP sangat cocok digunakan dalam pembangunan halamanhalaman web dinamis.\r\nPada saat ini PHP sudah dapat berkomunikasi dengan berbagai database meskipun dengan kelengkapan yang berbeda-beda.', '2013-02-15', '1', 1, 4),
(23, 'Pengertian CSS', 'Cascading Style Sheets merupakan feature yang sangat penting dalam membuat dynamic HTML. Meskipun bukan merupakan suatu keharusan dalam membuat web, akan tetapi penggunaan style sheets merupakan kelebihan tersendiri. Suatu style sheet merupakan tempat dimana anda mengontrol dan memanage style-style yang ada. Style sheet mendeskripsikan bagaimana tampilan document HTML di layar. Anda juga bias menyebutnya sebagai template dari documents HTML yang menggunakanya.\r\nAnda juga bisa membuat efek-efek sepesial di web anda dengan menggunakan style sheet. Sebagai contoh anda bisa membuat style sheet yang mendefinisikan style untuk <H1> dengan style bold dan italic dan berwarna biru. Atau pada tag <P> yang akan di tampilkan dengan warna kuning dan menggunakan font verdana dan masih banyak lagi yang bisa anda lakukan dengan style sheet.\r\nSecara teoritis anda bisa menggunakan style sheet technology dengan HTML. Akan tetapi pada prakteknya hanya Cascading Style Sheet (CSS) technology yang support pada hampir semua web Browser. Karena CSS telah di setandartkan oleh World Wide Web Consortium (W3C) untuk di gunakan di web browser.', '2013-02-15', '1', 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikel`
--

CREATE TABLE IF NOT EXISTS `kategori_artikel` (
  `id_kategori_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_artikel` varchar(100) NOT NULL,
  `status_kategori_artikel` char(1) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_kategori_artikel`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori_artikel`, `nama_kategori_artikel`, `status_kategori_artikel`, `id_pengguna`) VALUES
(1, 'PHP', '0', 4),
(2, 'JavaScript', '1', 4),
(5, 'CSS', '0', 4),
(6, 'HTML', '0', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Anggota'),
(3, 'Moderator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan_database`
--

CREATE TABLE IF NOT EXISTS `pengaturan_database` (
  `id_pengaturan_database` int(11) NOT NULL AUTO_INCREMENT,
  `nama_database` varchar(100) NOT NULL,
  `username_database` varchar(100) NOT NULL,
  `password_database` varchar(100) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_pengaturan_database`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `pengaturan_database`
--

INSERT INTO `pengaturan_database` (`id_pengaturan_database`, `nama_database`, `username_database`, `password_database`, `id_pengguna`) VALUES
(17, 'aa', 'aa', 'aa', 27),
(18, 'bb', 'bb', 'bb', 29),
(19, 'nurul_db', 'nurul', 'nurul', 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan_pengguna` varchar(100) NOT NULL,
  `nama_belakang_pengguna` varchar(100) NOT NULL,
  `password_pengguna` varchar(100) NOT NULL,
  `email_pengguna` varchar(100) NOT NULL,
  `status_pengguna` char(1) NOT NULL,
  `validasi` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `id_level` (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_depan_pengguna`, `nama_belakang_pengguna`, `password_pengguna`, `email_pengguna`, `status_pengguna`, `validasi`, `id_level`) VALUES
(4, 'Sinta', 'Nur Kholifah', '08ca451b5ef1a7c86763d31e7711a522', 'sinta@yahoo.com', '0', 'admin', 1),
(27, 'Ulfah', 'Athiqoh', '2e16118df77f82c56521c9a6935cdeb1', 'ulfah@yahoo.com', '0', '327868717', 2),
(28, 'Moh.', 'Nurul', '6968a2c57c3a4fee8fadc79a80355e4d', 'nurul@yahoo.com', '0', '1039815397', 2),
(29, 'Moh.', 'Roni', 'd78b154c99fe7f06ebc02ebd63d1c87c', 'roni@yahoo.com', '0', '978968424', 2),
(31, 'moderator', 'moderator', '0408f3c997f309c03b08bf3a4bc7b730', 'moderator@yahoo.com', '0', 'moderator', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `isi_pesan` longtext NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_pengguna_2` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  PRIMARY KEY (`id_pesan`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_project` (`id_project`),
  KEY `id_pengguna_2` (`id_pengguna_2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `isi_pesan`, `tanggal_pesan`, `id_pengguna`, `id_pengguna_2`, `id_project`) VALUES
(1, 'halo ulfah', '2013-05-27', 29, 27, 54),
(2, 'hai jg', '2013-05-27', 27, 29, 54);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `nama_project` varchar(100) NOT NULL,
  `tanggal_project` date NOT NULL,
  `status_project` char(1) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_pengaturan_database` int(11) NOT NULL,
  PRIMARY KEY (`id_project`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_pengaturan_database` (`id_pengaturan_database`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_project`, `nama_project`, `tanggal_project`, `status_project`, `id_pengguna`, `id_pengaturan_database`) VALUES
(54, 'aa', '2013-05-23', '1', 27, 17),
(56, 'project_roni', '2013-05-23', '1', 29, 18),
(57, 'project_aa', '2013-05-23', '0', 28, 19);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_3` FOREIGN KEY (`id_kategori_artikel`) REFERENCES `kategori_artikel` (`id_kategori_artikel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD CONSTRAINT `kategori_artikel_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaturan_database`
--
ALTER TABLE `pengaturan_database`
  ADD CONSTRAINT `pengaturan_database_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
