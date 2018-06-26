-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Jun 2018 pada 07.07
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
  `password` varchar(50) NOT NULL,
  `level_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_anggota`, `username`, `nama`, `email`, `password`, `level_user`) VALUES
(11052010, 10001, 'admin', 'Administrator', 'admin@digitallibrary.com', '0ca5416d9ce8160429e6f074df5e3b7a1b78fe8d', 'admin'),
(11052011, 10002, 'anissa', 'Anissa Kusuma Dewi', 'anissakd@gmail.com', '0ca5416d9ce8160429e6f074df5e3b7a1b78fe8d', 'operator');

--
-- Trigger `tb_admin`
--
DELIMITER $$
CREATE TRIGGER `haps anggota` BEFORE DELETE ON `tb_admin` FOR EACH ROW DELETE FROM tb_anggota  WHERE id_anggota=OLD.id_anggota
$$
DELIMITER ;

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
  `password` varchar(50) NOT NULL,
  `statuslogin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `username`, `nim`, `nama`, `email`, `password`, `statuslogin`) VALUES
(10001, 'admin', '171530001', 'Administrator', 'admin@digitallibrary.com', '0ca5416d9ce8160429e6f074df5e3b7a1b78fe8d', 1),
(10002, 'anissa', '171530002', 'Anissa Kusuma Dewi', 'anissakd@gmail.com', '0ca5416d9ce8160429e6f074df5e3b7a1b78fe8d', 0),
(10006, 'dilan', '171530003', 'Dilan', 'dilan@gmail.com', 'fa9f1991b525abb209b957a34a8a94ef3ffbce0b', 0);

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
-- Struktur dari tabel `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL,
  `kode_buku` char(13) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berkas`
--

INSERT INTO `tb_berkas` (`id_berkas`, `kode_buku`, `nama_berkas`) VALUES
(3, '9786020822150', '9786020822150aac2.pdf'),
(4, '9786027870864', '9786027870864Pidi Baiq - Dilan 1990 (Bagian 1).pdf'),
(5, '9786027870994', '9786027870994Pidi Baiq - Dilan 1991 (Bagian 2).pdf'),
(6, '9786020822151', '9786020822151ketikacintabertasbihBuku1.pdf'),
(7, '9789793604350', '9789793604350Bumi Cinta Karya Habiburrahman El-Shirazy.pdf');

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
('9786020822150', 'Ayat-Ayat Cinta 2', 'Habiburrahman El Shirazy', 'Republika', 'Novel', 'Fahri, yang kini tinggal di Edinburgh dan bahkan menjadi dosen di University of Edinburgh, terpaksa menjalani kehidupan sehari-harinya sendirian. Bersama dengan Paman Hulusi, asisten rumah tangganya yang berdarah Turki, ia meneruskan kehidupannya tanpa Aisha. Terkadang Fahri masih saja menangis saat mengingat kenangan-kenangannya bersama Aisha. Kenyataan bahwa istri yang sangat dicintainya itu kini menghilang entah ke mana, membuatnya nelangsa dan hampir putus asa. Maka ia menghabiskan hari-harinya dengan menenggelamkan diri dalam kesibukan pekerjaan, penelitian, mengajar, dan bisnis yang dulu dikelola berdua bersama Aisha. Aisha menghilang dalam sebuah perjalanan ke Palestina bersama teman wanitanya saat ingin membuat cerita dan reportase tentang kehidupan di sana. \r\n\r\nTeman Aisha ditemukan dalam keadaan sudah kehilangan nyawa dan kondisi tubuh yang mengenaskan dan sangat mungkin kondisi Aisha juga sama meski tubuhnya belum ditemukan saat ini. Sudah lebih dari dua tahun Fahri berduka dan tenggelam dalam usaha pencarian istri yang sangat dicintainya itu. Ia pun pindah ke Edinburgh karena itulah kota yang sangat disukai Aisha di dataran Inggris. \r\n\r\nDengan menyibukkan dirinya, ia berusaha menyingkirkan rasa sedihnya sekaligus memperbaiki citra Islam dan muslim di negeri dunia pertama itu. Ia berbuat baik pada tetangganya, menyebarkan ilmu agama pada berbagai pihak, dan membantu orang-orang yang butuh bantuannya tanpa memandang bulu. Berbagai kegiatan menyibukkan dirinya, hingga sebuah pertanyaan mengusik datang dari berbagai pihak. Akankah ia membujang seumur hidup setelah ditinggal Aisha? Akankah ia bertemu dengan istrinya itu sekali lagi?\r\n', 'THE GREAT LOVE STORY\r\n\r\nAKAN SEGERA DITAYANGKAN DI BIOSKOP KESAYANGAN ANDA\r\n\r\nPEMAIN: FEDI NURIL - TATJANA SAPHIRA - CHELSEA ISLAN - DEWI SANDRA - NUR FAZURA\r\n\r\n***\r\n\r\n\r\nAyat Ayat Cinta 2 ini adalah karya sastra racikan Kang Abik yang mengejutkan. Lebih bcrani dan dinamis. Tapi tetap sarat makna dan pesan.\r\n- Melly Goeslaw, Musisi Indonesia.\r\n\r\nJika Sutarji Calzoum Bahri selalu menyihir dengan puisi-puisi mantranya, maka Habiburrahman El Shirazy selalu menyihir dengan novel-novel pembangun jiwanya. Sungguh, Ayat Ayat Cinta 2 ini menyihir dan menggetarkan jiwa dari awal sampai\r\nakhir.\r\n- Irwan Kelana, Sastrawan Indonesia.\r\n\r\nRevolusi mental hakiki dengan membaea novel ini! Cara menyikapi kenakalan anak remaja sangat mengesankan.\r\n- Dr. Asrorun Niam Sholeh, MA., \r\nKatib Syuriah PBNU.\r\n\r\nKonsistcnsi dan kualitasnya terjaga. Alurnya meliuk-liuk tak terduga. Dcskripsinya\r\ndetail dan kaya wawasan. Pesannya menyesap jiwa. Ayat Ayat Cinta 2 ini akan\r\nmcnginspirasi anak-anak muda Indonesia bcrorientasi mondial dan bcrprestasi di\r\ntingkat global.\r\n- Dr. Makmur Haji Harun, MA,\r\nDosen Sastra Melayu dan Peradaban Islam, UPSI Malaysia.\r\n\r\nIni novel cinta dan perjuangan! Cinta kemanusiaan dan perjuangan sehari-hari Fahri\r\nbersama jutaan umat Islam di Barat.\r\n- Ganjar Widhiyoga,\r\nKandidat Doktor Hubungan Internasional, Durham University, Inggris.\r\n\r\nJadilah muslim yang hanif, penuh cinta, dan bcrakhlakul karimah pada siapa saja!\r\nItulah pesan kuat novel dahsyat ini.\r\n- Fahmi Salim, MA,\r\nWasekjen MIUMI dan Anggota Majelis Tarjih PP. Muhammadiyah\r\n\r\n10 tahun lalu, Ayat Ayat Cinta betul-betul mengubah hidup saya yang saat itu baru 13 tahun. Kini, Ayat Ayat Cinta 2 tak kalah merckonstruksi mindset dan saya yakin jalan hidup saya saat ini.\r\n- Azri Zakkiyah, Novclis muda Indonesia.'),
('9786020822151', 'Ketika Cinta Bertasbih', 'Habiburrahman El Shirazy', 'Republika', 'Novel', 'Azzam adalah seorang pemuda sederhana yang memilih untuk menuntut ilmunya di Kampus Universitas Al Azhar, Kairo. Azzam dikenal sebagai sosok yang tegas dan dewasa. Dia sangat memegang teguh prinsip-prinsip Islam dalam kehidupan sehari-harinya. Di kalangan teman-temannya pun Azzam menjadi panutan dan sosok yang bisa diandalkan.\r\n\r\nSetelah bapaknya meninggal, sebagai anak tertua dalam keluarganya, dialah yang menanggung kehidupan keluarganya di Solo. Oleh karena itu, selain sebagai mahasiswa, dia juga bekerja keras sebagai pembuat tempe dan bakso untuk menghidupi ibu dan adik-adik perempuannya di Indonesia serta kehidupannya sendiri di Cairo. Bahkan Azzam rela meninggalkan kuliahnya untuk sementara dan lebih berfokus untuk mencari rezeki. Meski terkadang ada rasa iri melihat teman-teman satu angkatannya yang sudah terlebih dahulu lulus, bahkan ada yang hampir menyelesaikan S2-nya tetapi Azzam segera sadar kalau dia tidak sama dengan teman-temannya yang lain. Azzam lebih dikenal sebagai tukang tempe di kalangan mahasiswa Indonesia yang sedang kuliah di Al Azhar.', 'Kembalilah Anna pada orang tuanya,. Azzam yang lumpuh setelah kecelakaan itu telah sembuh seperti semula, Ia mendatangi kiai Lutfi mohon bantuan mencarikan jodoh yang tepat sesuai permintaan Ibunya dulu. Kiai Lutfi lalu menceritakan seorang wanita yang dicerai suaminya karena suatu hal dan wanita itu masih perawan, yang diharapkan kiai Lutfi sendiri agar dapat diterima Azzam. Tanpa disadari Azzam Ia menerima tawaran Kiai Lutfi, agar menerima wanita itu menjadi istrinya, Azzam sangat senang begitu tahu kalau wanita yang diceritakan itu adalah orang yang pernah dicintainya yaitu Anna Althafunnisa, begitu juga sebaliknya Anna sangat senang karena Ia juga menjadi istri dari orang yang dulu sangat diharapkannya, atau cinta pertamanya.\r\n\r\nSetelah sebulan pernikahan Anna dengan Azzam, tiba-tiba Furqan kembali menghubungi Anna dan membawa rujukan, dan Ia menceritakan bahwa Ia tidak terkena HIV. Tapi semua sudah terjadi Anna dan Azzam sudah bahagia, dan mereka mendoakan agar Furqan menemukan pasangan hidup yang cocok untuk nya.'),
('9786027870864', 'Dilan', 'Pidi Baiq', 'DAR! Mizan ', 'Novel', 'Sinopsis Novel:\r\n\r\nCinta, walaupun sudah berlalu sekian lama, tetap saja, saat dikenang begitu manis.\r\n\r\nMilea, dia kembali ke tahun 1990 untuk menceritakan seorang laki-laki yang pernah menjadi seseorang yang sangat dicintainya, Dilan.\r\n\r\nLaki-laki yang mendekatinya (milea) bukan dengan seikat bunga atau kata-kata manis untuk menarik perhatiannya. Namun, melalui ramalan seperti tergambarkan pada penggalan cerita berikut :\r\n\r\nâ€œAku ramal, nanti kita bertemu di kantin.â€\r\n\r\nTapi, sayang sekali ramalannya salah. Hari itu, Miela tidak ke kantin karena ia harus membicarakan urusan kelas dengan kawan-kawannya. Sebuah cara sederhana namun bikin senyum dipilih Dilan untuk kembali menarik perhatian dari Milea. Dian mengirim Piyan untuk menyampaikan suratnya yang isinya :\r\n\r\nâ€œMilea, ramalanku, kita akan bertemu di kantin. Ternyata salah. Maaf, tapi ingin meramal lagi : besok kita akan bertemu.â€\r\n\r\nTunggu, besok yang dimaksud oleh dilan itu adalah hari minggu. Ngga mungkin, kan mereka bertemu? Namun, ternyata ramalannya kali ini benar. Dilan datang ke rumah Miela untuk menyampaikan surat undangannya yang isinya :\r\n\r\nâ€œBismillahirrahmanirrahim. Dengan nama Allah Yang Maha Pengasih lagiPenyayang. Dengan ini, dengan penuh perasaan, mengundang Milea Adnan untuk sekolah pada : Hari Senin, Selasa, Rabu, Kamis, Jumat, dan Sabtu.\r\n\r\nHal-hal yang sederhana ini nyatanya dapat membuat Milea tersenyum, dan perlahan mulai menaruh perhatiannya kepada Dilan. Sampai-sampai, sebentar dia lupa, ada Beni yaitu pacarnya yang berada di Jakarta.\r\n\r\nMilea tak mau kehilangan Dilan. Baginya, Dilan seperti sesuatu yang selalu dapat membuat hari-harinya penuh warna. Tapi, dia tampak sangat jahat pada Dilan, karena dia mau untuk menerima perhatian dari Dilan, padahal dia sudah ada yang memiliki.\r\n\r\nSampai pada waktu milea memutuskan hubungannya dengan beni, pacarnya di jakarta. Ia cowok yang sangat emosian dan manja. Karena suatu hal yang ga perlu dijelaskan. Semenjak itu hubugan Dilan dan Milea semakin erat saja.', '\r\nFILM yang diangkat dari novel laris \"Dilan 1990\" sudah tayang di bioskop, sejak 25 Januari 2018. Rilisan ini konon dinanti banyak orang. Terutama pembaca trilogi Dilan karya Pidi Baiq.\r\n\r\nBagi pencinta buku yang belum sempat membaca novel Trilogi Dilan, segera melakukan pemesanan --- STOK TERBATAS!\r\n\r\n\r\n\r\nSinopsis\r\n\r\n\"Milea kamu cantik, tapi aku belum mencintaimu. Enggak tahu kalau sore. Tunggu aja.\"\r\n(Dilan 1990)\r\n\r\n\"Milea jangan pernah bilang ke aku ada yang menyakitimu., nanti besoknya, orang itu akan hilang.\" (Dilan 1990)\r\n\r\n\"Cinta sejati adalah kenyamanan, kepercayaan, dan dukungan. Kalau kamu tidak setuju, aku tidak peduli. \" (Milea 1990)'),
('9786027870994', 'Dilan 2', 'Pidi Baiq', 'Pastel Books ', 'Novel', 'Milea kembali bercerita tentang kisah percintaannya dengan Dilan. Seperti orang yang baru jadian pada umumnya, Milea mengalami masa yang indah di SMA sesudah resmi jadi pacar Dilan. Ketika guyuran hujan menerpa, Dilan menggunaka motor CB dengan Milea di belakangnya. Milea dengan erat memeluk Dilan. Mereka berdua jalan-jalan menyusuri Jl. Buah Batu sembari ketawa riang, itu semua berkat Dilan yang selalu membuat hari-hari Milea bahagia.\r\n\r\nJawaban yang diberikan Dilan selalu saja membaut Milea tersenyum, Dilan pun termasuk orang yang cerdas dan pintar di kelasnya, buktinya dia selalu mendapatkan ranking satu atau dua. Meski Melia merasa khawatir dengan Dilan yang bergabung dengan geng motor, karena Melia takut terjadi hal yang buruk menimpa Dilan karena geng motor.\r\n\r\nKetika itu, sekolah tidak ada kegiatan belajar mengajar sebab para guru sedang melakukan rapat untuk mempersiapkan pembagian rapor. Milea merasa tidak enak dengan kejadian Dilan berkelahi dengan Anhar sebab membela dirinya. Milea merasa takut dan cemas jika nantinya Dilan dikeluarkan dari sekolah. Tiba-tiba, datang Piyan memberitahu Milea bahwa Dilan berkelahi di warungnya Bi Eem.', 'FILM yang diangkat dari novel laris \"Dilan 1990\" sudah tayang di bioskop, sejak 25 Januari 2018. Rilisan ini konon dinanti banyak orang. Terutama pembaca trilogi Dilan karya Pidi Baiq.\r\n\r\n'),
('9789793604350', 'Bumi', 'Habiburrahman', 'Ihwah', 'Novel', '', '');

--
-- Trigger `tb_buku`
--
DELIMITER $$
CREATE TRIGGER `insert statistik` AFTER INSERT ON `tb_buku` FOR EACH ROW INSERT INTO tb_statistik (kode_buku, jumlah_download) VALUES (new.kode_buku, 0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cover`
--

CREATE TABLE `tb_cover` (
  `id_cover` int(11) NOT NULL,
  `kode_buku` char(13) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cover`
--

INSERT INTO `tb_cover` (`id_cover`, `kode_buku`, `nama_file`) VALUES
(7, '9786020822150', '9786020822150aac2.jpg'),
(8, '9786027870864', '978602787086474492_f.jpg'),
(9, '9786027870994', '978602787099486106_f.jpg'),
(10, '9786020822151', '9786020822151BacaHalaman.jpg'),
(11, '9789793604350', '9789793604350img1081-1362045859.jpg');

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
  `instagram` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailanggota`
--

INSERT INTO `tb_detailanggota` (`id_detail`, `id_anggota`, `alamat`, `tmplahir`, `tgllahir`, `no_hp`, `facebook`, `instagram`) VALUES
(10001, 10001, 'Gria Panguripan Indah Blok F No 7', 'Pekalongan', '1996-09-12', '085290059281', 'keisya.annajma', 'oratakashii'),
(10002, 10002, 'Karanganyar Pekalongan', 'Bekasi', '1999-07-11', '085290059281', 'anissakd', 'anissakd_'),
(10007, 10006, '', '', '2018-04-01', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_favorit`
--

CREATE TABLE `tb_favorit` (
  `id_favorit` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `kode_buku` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_favorit`
--

INSERT INTO `tb_favorit` (`id_favorit`, `id_anggota`, `kode_buku`) VALUES
(1, 10001, '9786027870864'),
(2, 10001, '9786020822150'),
(3, 10001, '9789793604350'),
(4, 10001, '9786020822151'),
(5, 10001, '9786027870994'),
(6, 10002, '9786027870864');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `id_anggota`, `nama_file`) VALUES
(2, 10002, '10002IMG20180331114117.jpg'),
(3, 10006, '10006IMG-20180421-WA0004-1.jpg'),
(5, 10001, '10001IMG_20180414_075504.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_statistik`
--

CREATE TABLE `tb_statistik` (
  `id_statistik` int(11) NOT NULL,
  `kode_buku` char(13) NOT NULL,
  `jumlah_download` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_statistik`
--

INSERT INTO `tb_statistik` (`id_statistik`, `kode_buku`, `jumlah_download`) VALUES
(1, '9786020822150', 2),
(2, '9786020822151', 1),
(4, '9786027870864', 2),
(5, '9786027870994', 1),
(10, '9789793604350', 1);

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
-- Indeks untuk tabel `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `tb_cover`
--
ALTER TABLE `tb_cover`
  ADD PRIMARY KEY (`id_cover`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indeks untuk tabel `tb_detailanggota`
--
ALTER TABLE `tb_detailanggota`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `tb_favorit`
--
ALTER TABLE `tb_favorit`
  ADD PRIMARY KEY (`id_favorit`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indeks untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `fk_foto` (`id_anggota`);

--
-- Indeks untuk tabel `tb_statistik`
--
ALTER TABLE `tb_statistik`
  ADD PRIMARY KEY (`id_statistik`),
  ADD KEY `kode_buku` (`kode_buku`);

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;

--
-- AUTO_INCREMENT untuk tabel `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_cover`
--
ALTER TABLE `tb_cover`
  MODIFY `id_cover` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_detailanggota`
--
ALTER TABLE `tb_detailanggota`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10008;

--
-- AUTO_INCREMENT untuk tabel `tb_favorit`
--
ALTER TABLE `tb_favorit`
  MODIFY `id_favorit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_statistik`
--
ALTER TABLE `tb_statistik`
  MODIFY `id_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `fk_id_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD CONSTRAINT `fk_berkas` FOREIGN KEY (`kode_buku`) REFERENCES `tb_buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_cover`
--
ALTER TABLE `tb_cover`
  ADD CONSTRAINT `fk_cover` FOREIGN KEY (`kode_buku`) REFERENCES `tb_buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detailanggota`
--
ALTER TABLE `tb_detailanggota`
  ADD CONSTRAINT `tb_detailanggota_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Ketidakleluasaan untuk tabel `tb_favorit`
--
ALTER TABLE `tb_favorit`
  ADD CONSTRAINT `fk_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_buku` FOREIGN KEY (`kode_buku`) REFERENCES `tb_buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD CONSTRAINT `fk_foto` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_statistik`
--
ALTER TABLE `tb_statistik`
  ADD CONSTRAINT `fk_statistik` FOREIGN KEY (`kode_buku`) REFERENCES `tb_buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
