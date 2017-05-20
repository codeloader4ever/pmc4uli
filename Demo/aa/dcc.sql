-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 09. Februari 2011 jam 15:29
-- Versi Server: 5.0.45
-- Versi PHP: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `labdcc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(10) collate latin1_general_ci NOT NULL default '',
  `nama` varchar(30) collate latin1_general_ci NOT NULL default '',
  `namafoto` varchar(50) collate latin1_general_ci NOT NULL,
  `tgllahir` date NOT NULL default '0000-00-00',
  `jenkel` varchar(10) collate latin1_general_ci NOT NULL default '0',
  `alamat` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`nip`),
  UNIQUE KEY `nim` (`nip`),
  KEY `nim_2` (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `namafoto`, `tgllahir`, `jenkel`, `alamat`) VALUES
('09032323', 'Farid Wajidi', '161263_1010601021_5240751_n.jpg', '1986-08-01', 'Pria', 'Panjang'),
('1001', 'Diah Wahyuni', '161711_571510281_2864011_n.jpg', '1972-01-01', 'Wanita', 'Antasari'),
('0503231001', 'Chaerul Ramadhan', 'a.jpg', '1986-05-16', 'Pria', 'Korpri, Sukarame'),
('75558585', 'Cintya Ramadhani', '161581_1786424809_8088665_n.jpg', '1970-01-01', 'Wanita', 'Bekasi Timur'),
('434363536', 'Devid Saputra', '173726_1682042410_2210173_n.jpg', '1970-01-01', 'Pria', 'Panjang');
