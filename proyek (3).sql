-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Bulan Mei 2018 pada 05.47
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_anggota`, `username`, `nama`, `email`, `password`, `level_user`) VALUES
(11052010, 10001, 'admin', 'Administrator', 'admin@digitallibrary.com', 'admin', 'admin'),
(11052011, 10002, 'anissa', 'Anissa Kusuma Dewi', 'anissakd@gmail.com', 'anissakd', 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `statuslogin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `username`, `nim`, `nama`, `email`, `password`, `statuslogin`) VALUES
(10001, 'admin', '171530001', 'Administrator', 'admin@digitallibrary.com', 'admin', 1),
(10002, 'anissa', '171530002', 'Anissa Kusuma Dewi', 'anissakd@gmail.com', 'anissakd', 1),
(10005, 'simbah', '1251515', 'simbah', 'simbah', 'simbah', 0);

--
-- Trigger `tb_anggota`
--
DELIMITER $$
CREATE TRIGGER `Hapus tb_detailanggota` BEFORE DELETE ON `tb_anggota` FOR EACH ROW DELETE FROM tb_detailanggota WHERE id_anggota=OLD.id_anggota
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah tb_detail` AFTER INSERT ON `tb_anggota` FOR EACH ROW INSERT INTO tb_detailanggota (id_anggota, tgllahir) VALUES (NEW.id_anggota, '2018-04-01')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kode_buku` char(13) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `pengarang` varchar(32) NOT NULL,
  `penerbit` varchar(32) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`kode_buku`, `judul`, `pengarang`, `penerbit`, `kategori`, `sinopsis`, `deskripsi`) VALUES
('9789793604022', 'Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 'Republika', 'Novel', 'Ini adalah kisah cinta. Tapi bukan cuma sekadar kisah cinta yang biasa. Ini tentang bagaimana menghadapi turun-naiknya persoalan hidup dengan cara Islam. Fahri bin Abdillah adalah pelajar Indonesia yang berusaha menggapai gelar masternya di Al-Azhar. Berjibaku dengan panas-debu Mesir. Berkutat dengan berbagai macam target dan kesederhanaan hidup. Bertahan dengan menjadi penerjemah buku-buku agama.', 'PERAIH PENA AWARD \r\nNOVEL TERPUJI NASIONAL 2005 PERAIH PENGHARGAAN THE MOST FAVORITE BOOK \r\n2005 *** \"Berbeda selisih 4 suara dengan Harry Potter, akhirnya \r\nAyat-Ayat Cinta terpilih menjadi The Most Favorite Book...\" \r\n-- Majalah Muslimah, Edisi Januari 2006 \r\n\r\n\"Penulis\r\nnovel ini berhasil menggambarkan latar (setting) sosial-budaya Timur \r\nTengah dengan sangat hidup tanpa harus memakai istilah-istilah Arab. \r\nBahasanya yang mengalir, karakterisasi tokoh-tokohnya yang begitu kuat, \r\ndan gambaran latarnya yang begitu hidup, membuat kisah dalam novel ini \r\nterasa benar-benar terjadi. Ini contoh novel karya penulis muda yang \r\nsangat bagus!\" \r\n-- Ahmadun Yosi Herfanda Sastrawan dan Redaktur Budaya Republika \r\n\r\n\"Jarang\r\nada buku seperti ini. Saya tidak yakin akan ada novel serupa dari \r\npenulis muda lndonesia lainnya; saat ini bahkan mungkin hingga beberapa \r\npuluh tahun ke depan. Begitu menyentuh. Begitu dalam. Dan begitu \r\ndewasa!\" \r\n-- Mohammad Fauzil Adhim Psikolog dan Penulis Buku-buku Best Seller \r\n\r\n\"Jika\r\nNaguib Mahfuz menulis Mesir dari pandangan orang Mesir, maka Mesir kali\r\nini ditulis dalam pandangan orang Indonesia. Novel ini ditulis oleh \r\norang Indonesia yang paham betul seluk-beluk negeri itu, hingga ke \r\ndetail-detail yang paling kecil. Ia hidup, berbaur dan berinteraksi \r\ndalam kehidupan sehari-hari; lalu menyerap spirit dan pengetahuan \r\ndarinya, dan dituangkan dengan sepenuh hati dalam bentuk novel kaya. \r\nDitulis dengan bahasa yang lancar, dengan tokoh-tokoh yang \'hidup\' dan \r\nberkelebatan dalam berbagai karakter. Membaca novel ini seperti membuka \r\ncermin cakrawala yang terbuka...\" \r\n-- Joni Ariadinata Cerpenis, Redaktur Jurnal Cerpen Indonesia \r\n\r\n\"Novel\r\nyang tidak klise dan tak terduga pada setiap babnya. Habiburrahman El \r\nShirazy dengan sangat menyakinkan mengajak kita menyelusuri lekuk Mesir \r\nyang eksotis itu, tanpa lelah. Tak sampai di situ, Ayat-Ayat Cinta \r\nmengajak kita untuk lebih jernih, lebih cerdas dalam memahami cakrawala \r\nkeislaman, kehidupan dan juga cinta.\" \r\n-- Helvy Tiana Rosa Mantan Ketua Umum forum Lingkar Pena \r\n\r\n\"Membaca\r\nAyat-Ayat Cinta ini membuat angan kita melayang-layang ke negeri seribu\r\nmenara dan merasakan \'pelangi\' akhlak yang menghiasi pesona-pesonanya. \r\nSungguh sebuah cerita yang layak dibaca dan disosialisikan pada para \r\npemburu bacaan popular yang sudah tidak mengindahkan akhlak sebagai menu\r\nutamanya, agar dunia bacaan kita terhiasi karya-karya yang \'membangun.\'\r\n-- Ratih Sang Mantan Peragawati dan Artis Muslimah\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailanggota`
--

CREATE TABLE `tb_detailanggota` (
  `id_detail` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tmplahir` varchar(32) NOT NULL,
  `tgllahir` date NOT NULL,
  `no_hp` char(12) NOT NULL,
  `facebook` varchar(32) NOT NULL,
  `instagram` varchar(32) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailanggota`
--

INSERT INTO `tb_detailanggota` (`id_detail`, `id_anggota`, `alamat`, `tmplahir`, `tgllahir`, `no_hp`, `facebook`, `instagram`, `semester`) VALUES
(10001, 10001, 'Gria Panguripan Indah Blok F No 7', 'Pekalongan', '1996-09-12', '085290059281', 'keisya.annajma', 'oratakashii', 2),
(10002, 10002, '', '', '1999-07-11', '', '', '', 2),
(10006, 10005, '', '', '2018-04-01', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`,`id_anggota`) USING BTREE,
  ADD KEY `fk_id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`,`username`,`email`,`nim`) USING BTREE;

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `tb_detailanggota`
--
ALTER TABLE `tb_detailanggota`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11052012;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;

--
-- AUTO_INCREMENT untuk tabel `tb_detailanggota`
--
ALTER TABLE `tb_detailanggota`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `fk_id_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detailanggota`
--
ALTER TABLE `tb_detailanggota`
  ADD CONSTRAINT `tb_detailanggota_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
