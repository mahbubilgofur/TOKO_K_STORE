-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2025 pada 05.35
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl2_12`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `id_transaksi` varchar(25) NOT NULL,
  `total` varchar(25) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `sub_total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kasirtransaksi`
--

CREATE TABLE `tbl_kasirtransaksi` (
  `id_kasirtransaksi` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `total` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(50) NOT NULL COMMENT '\r\n',
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `induk_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama`, `deskripsi`, `induk_id`) VALUES
('S00001', 'Elektronik', 'utama', '0'),
('S00002', 'Pakaian', 'utama', '0'),
('S00003', 'Aksesoris', 'utama', '0'),
('S00004', 'Perlengkapan Rumah Tangga', 'utama', '0'),
('S00005', 'Makanan dan Minuman', 'utama', '0'),
('S00006', 'Kesehatan dan Kecantikan', 'utama', '0'),
('S00007', 'Buku dan Media', 'utama', '0'),
('S00008', 'Atasan Pria', 'kedua', 'S00002'),
('S00009', 'Baju', 'ketiga', 'S00008'),
('S00010', 'Kaos pria', '.', 'S00009'),
('S00012', 'Sweater Pria ', 'BAGUS', 'S00009'),
('S00013', 'Jaket Pria', 'ga tau', 'S00009'),
('S00014', 'Kemeja Pria', 'BAGUS', 'S00008'),
('S00015', 'Kemeja Formal Pria', '.', 'S00014'),
('S00016', 'Kemeja Kasual Pria', '.', 'S00014'),
('S00017', 'Kemeja Flanel Pria', '.', 'S00014'),
('S00018', 'Kemeja Polo Pria', '.', 'S00014'),
('S00019', 'Jaket Musim Dingin Pria', '.', 'S00013'),
('S00020', 'Jaket Kulit Pria', '.', 'S00013'),
('S00021', 'Jaket Denim Pria', '.', 'S00013'),
('S00022', 'Jaket Olahraga Pria', '.', 'S00008'),
('S00023', 'Bawahan Pria', '.', 'S00002'),
('S00024', 'Celana Pria', '.', 'S00023'),
('S00025', 'Celana Jeans Pria', '.', 'S00024'),
('S00026', 'Celana Formal Pria', '.', 'S00024'),
('S00027', 'Celana Pendek Pria', '.', 'S00024'),
('S00028', 'Celana Jogger Pria', '.', 'S00024'),
('S00029', 'Celana Panjang Pria', '.', 'S00023'),
('S00030', 'Celana Formal Panjang Pria', '.', 'S00029'),
('S00031', 'Celana Kasual Panjang Pria', '.', 'S00029'),
('S00032', 'Celana Chino Pria', '.', 'S00029'),
('S00033', 'Celana Kargo Pria', '.', 'S00029'),
('S00034', 'Pakaian Dalam Pria', '.', 'S00023'),
('S00035', ' Celana Dalam Pria', '.', 'S00023'),
('S00036', 'Boxer Pria', '.', 'S00035'),
('S00037', 'Komputer dan Laptop', '.', 'S00001'),
('S00038', 'Leptop', '.', 'S00001'),
('S00039', 'Laptop Windows', '.', 'S00038'),
('S00040', 'Laptop Mac', '.', 'S00038'),
('S00041', 'Laptop Chromebook', '.', 'S00038'),
('S00042', 'Desktop Komputer', '.', 'S00037'),
('S00043', 'Desktop PC', '.', 'S00042'),
('S00044', 'Komputer All-in-One', '.', 'S00042'),
('S00045', 'Perangkat Komputer', '.', 'S00037'),
('S00046', 'Monitor Komputer', '.', 'S00045'),
('S00047', 'Keyboard', '.', 'S00045'),
('S00048', 'Mouse', '.', 'S00045'),
('S00049', 'Printer', '.', 'S00045'),
('S00050', 'Audio dan Headset', '.', 'S00001'),
('S00051', 'Speaker', '.', 'S00050'),
('S00052', 'Speaker Bluetooth', '.', 'S00051'),
('S00053', 'Speaker Komputer', '.', 'S00051'),
('S00054', 'Speaker Portabel', '.', 'S00051'),
('S00055', 'Headset', '.', 'S00050'),
('S00056', 'Headset Bluetooth', '.', 'S00055'),
('S00057', 'Headset dengan Kabel', '.', 'S00055'),
('S00058', 'Earphone', '.', 'S00055'),
('S00059', 'Kamera dan Fotografi', '.', 'S00001'),
('S00060', 'Kamera Digital', '.', 'S00059'),
('S00061', ' Kamera DSLR', '.', 'S00060'),
('S00062', 'Kamera Mirrorless', ',', 'S00060'),
('S00063', 'Kamera Kompak', '.', 'S00060'),
('S00064', 'Aksesoris Kamera', '.', 'S00059'),
('S00065', 'Lensa Kamera', '.', 'S00064'),
('S00066', 'Tripod', ',', 'S00064'),
('S00067', 'Tas Kamera', ',', 'S00064'),
('S00068', 'Flash', '.', 'S00064'),
('S00069', 'Perangkat Fotografi', '.', 'S00059'),
('S00070', 'Drone', '.', 'S00069'),
('S00071', 'Kamera Aksi', '.', 'S00069'),
('S00072', 'Kamera Polaroid', '.', 'S00069'),
('S00073', 'Aksesoris hp', '-', '0'),
('S00074', 'hp', '.', 'S00001'),
('S00075', 'topi', '. ', 'S00008'),
('S00076', 'sepatu', '.', 'S00003'),
('S00084', 'kaos', '.', 'S00008'),
('S00085', 'sweater', '.', 'S00008'),
('S00086', 'Topi', '.', 'S00003'),
('S00087', 'Celana Wanita', '.', 'S00002'),
('S00088', 'Sweater', '.', 'S00008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `gambar1` varchar(255) NOT NULL,
  `gambar2` varchar(255) NOT NULL,
  `gambar3` varchar(255) NOT NULL,
  `gambar4` varchar(255) NOT NULL,
  `gambar5` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  `berat` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama`, `harga`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `deskripsi`, `id_kategori`, `berat`, `stok`) VALUES
('PR00001', 'Sepatu Ventela Evil  x Papa Gading All Is Well High Original', '450000', 'Sepatu_Ventela_Evil_x_Papa_Gading_All_Is_Well_High_Original_2023-11-28_gambar11.jpg', 'Sepatu_Ventela_Evil_x_Papa_Gading_All_Is_Well_High_Original_2023-11-26_gambar21.jpeg', 'Sepatu_Ventela_Evil_x_Papa_Gading_All_Is_Well_High_Original_2023-11-26_gambar31.jpeg', 'Sepatu_Ventela_Evil_x_Papa_Gading_All_Is_Well_High_Original_2023-11-26_gambar41.jpeg', '0', '[READY STOCK]  Sepatu Ventela Evil Gading - All is well - High and Low  Sepatu Ventela Reborn Black (Produk baru dari Ventela, bukan Ventela Evil)  SPESIFIKASI: Menggunakan bahan canvas premium, sole luar di desain khusus menggunakan bahan transparan, stripe logo menggunakan velcro, dapat di ganti di setiap pasang sepatu, ada 3 jenis bahan untuk logo stripe yaitu reflective, kulit (putih) , suede (hitam).  SIZE : 37-38-39-40-41-42-43-44-45  PENGIRIMAN DARI KOTA TANGERANG', 'S00076', '400', '13350'),
('PR00002', 'Original Sepatu Brand Lokal Casual Black White Hi Not Compass Gazelle Black White High', '279000', 'Original_Sepatu_Brand_Lokal_Casual_Black_White_Hi_Not_Compass_Gazelle_Black_White_High_2023-11-26_gambar1.jpeg', 'Original_Sepatu_Brand_Lokal_Casual_Black_White_Hi_Not_Compass_Gazelle_Black_White_High_2023-11-26_gambar2.jpeg', 'Original_Sepatu_Brand_Lokal_Casual_Black_White_Hi_Not_Compass_Gazelle_Black_White_High_2023-11-26_gambar3.jpeg', 'Original_Sepatu_Brand_Lokal_Casual_Black_White_Hi_Not_Compass_Gazelle_Black_White_High_2023-11-26_gambar4.jpeg', 'Original_Sepatu_Brand_Lokal_Casual_Black_White_Hi_Not_Compass_Gazelle_Black_White_High_2023-11-26_gambar5.jpeg', ' PENTING :  Jangan melihat ulasan yang memberikan review bintang rendah (1 dan 2 ) Lihatlah dan jadikan patokan ulasan yang memberikan review bintang Tinggi (4 dan 5). Karna bisa saja yg memberikan ulasan rendah bintang (1 dan 2 ) adalah pesaing atau competitor kami, yang takut toko dan produknya tersaingi.  Tersedia Ukuran :  36 / 37 / 38 / 39 / 40 / 41 / 42 / 43 / 44  COLOR : BLACK WHITE KUALITAS : ORIGINAL 100%  ----- BENANG/JAHITAN MENYALA BILA DI SOROT DENGAN SENTER/SINAR UV  ----- BAHAN CANVAS 12oz, MEMBUAT SEPATU KUAT DAN KOKOH    SPESIFIKASI PRODUK :  + UPPER CANVAS 12oz + OUTSOLE KARET (ANTI LICIN) + SWOOSH / LOGO (LEATHER) + 100% VULCANIZED (OVEN AUTOCLAVE) + 100% MADE IN INDONESIA  KONDISI : BRAND NEW IN BOX (BNIB) PRODUK : MADE IN INDONESIA (LOKAL) KELENGKAPAN & BONUS :  — 1 PASANG SEPATU — BOX BRAND — TALI SEPATU PREMIUM — KAOS KAKI — BUBBLE WARP PACKING  OPEN RESELLER & DROPSHIPER :  HUBUNGI KAMI SEGERA  CATATAN: 1/ Foto produk menggunakan 100% foto asli ATAU real pict ada stiker ', 'S00076', '500', '5373'),
('PR00003', 'Sepatu Pria Ads Strip Cutting Emboss', '100000', 'Sepatu_Pria_Ads_Strip_Cutting_Emboss_2023-11-26_gambar1.jpeg', 'Sepatu_Pria_Ads_Strip_Cutting_Emboss_2023-11-26_gambar2.jpeg', 'Sepatu_Pria_Ads_Strip_Cutting_Emboss_2023-11-26_gambar3.jpeg', 'Sepatu_Pria_Ads_Strip_Cutting_Emboss_2023-11-26_gambar4.jpeg', 'Sepatu_Pria_Ads_Strip_Cutting_Emboss_2023-11-26_gambar5.jpeg', 'Sepatu sneakers pria terbaru 2023 Ads Strip cutting Desain simpel dan modern Terbuat dari bahan Canvas EMBOSS Berkualitas Motif Timbul Nyaman dan tahan lama Cocok untuk berbagai aktivitas  Detail Produk • New Fashion, model lebih terbaru. • Upper Tebal dan Lentur • Nyaman saat dipakai • Outsole Dengan Bahan Phylon Quality (Ringan) • Lapisan dalam insole TA bukan Bontek / kertas karton • Lem kuat Jahit Bagus Tersedia 4 warna dasar Hitam Abu Merah dan Navy  Panduan Ukuran Insole bukan Panjang Kaki ya kak. 39 = 24cm 40 = 25cm 41 = 26cm 42 = 27cm 43 = 28cm  untuk size 36,37,38 , 44,45,46,47 Chat Admin. Ready strip Hitam dan Navy Bila saat barang datang tidak sesuai pesanan dimohon Ajukan pengembalian.', 'S00076', '400', '5000'),
('PR00004', 'PANARYBODY J2027 Sepatu Pria Casual Sneakers Fashion OOTD Hangout Kuliah Kerja Travel Sepatu Cowok Modis', '458000', 'PANARYBODY_J2027_Sepatu_Pria_Casual_Sneakers_Fashion_OOTD_Hangout_Kuliah_Kerja_Travel_Sepatu_Cowok_Modis_2023-11-26_gambar1.jpeg', 'PANARYBODY_J2027_Sepatu_Pria_Casual_Sneakers_Fashion_OOTD_Hangout_Kuliah_Kerja_Travel_Sepatu_Cowok_Modis_2023-11-26_gambar2.jpeg', 'PANARYBODY_J2027_Sepatu_Pria_Casual_Sneakers_Fashion_OOTD_Hangout_Kuliah_Kerja_Travel_Sepatu_Cowok_Modis_2023-11-26_gambar3.jpeg', 'PANARYBODY_J2027_Sepatu_Pria_Casual_Sneakers_Fashion_OOTD_Hangout_Kuliah_Kerja_Travel_Sepatu_Cowok_Modis_2023-11-26_gambar4.jpeg', 'PANARYBODY_J2027_Sepatu_Pria_Casual_Sneakers_Fashion_OOTD_Hangout_Kuliah_Kerja_Travel_Sepatu_Cowok_Modis_2023-11-26_gambar5.jpeg', 'Selamat datang di Panarybody Official Shop, toko kami menyediakan sepatu olahraga, sangat santai atau pun nyaman saat dipakai, dan juga ringan saat dipakai berolahraga. Sepatu Sport Casual Sneakers sangat baik untuk dipakai saat waktu di sekolah, kuliah, kerja, jalan santai, berlari, travel, mendaki gunung, outdoor sport dll.  Rincian Ukuran Insole:   39 = 24.5 cm  40 = 25 cm  41 = 25.5 cm 42 = 26 cm 43 = 26.5 cm 44 = 27 cm  Diharapkan membaca ketentuan dari toko kami, jika anda sudah order maka anda sudah setuju dengan ketentuan toko kami  1. Produk ready sesuai etalase yang tersedia, jika sudah terlanjur order tetapi warna, size atau produk kosong akan kami hubungi via chat 2. Toko kami memproses orderan sesuai data yang masuk, 3. Tidak menerima pergantian warna, size atau produk via note (pesan) 4. Jika ingin ganti silakan langsung chat toko kami segera mungkin sebelum nomor resi keluar (jika resi sudah keluar tidak bisa ganti dan cancel, akan kami proses sesuai orderan) 5. Harap membaca size chart dengan cermat sebelum membeli supaya tidak ada kesalahan  PENUKARAN BARANG 1.Maksimal penukaran barang 7 hari setelah paket diterima 2.Lampirkan video unboxing dan foto barang saat diterima 3.Kondisi barang harus masih dalam keadaan bersih dan bagus 4.Sebelum mengajukan penukaran barang wajib review bintang 5 5.Ongkos kirim ditanggung pembeli karena kami sudah kirimkan sesuai orderan  PRODUK BERMASALAH / SALAH KIRIM 1.Komplain kurang barang atau kembali dana wajib menyertakan video unboxing dan foto label pengiriman beserta foto barang yang diterima, Tidak ada video unboxing tidak bisa diproses. 2.Penggantian produk bisa diproses jika barang masih tersedia, jika barang sudah habis maka akan kami tawarkan produk lain  PENGIRIMAN Senin s/d Sabtu, tanggal merah tidak ada pengiriman', 'S00076', '500', '8000'),
('PR00005', 'CONVERSE size 36-43 BOOTS ALSTAR  Sepatu sneakers Termurahh', '125000', 'CONVERSE_size_36-43_BOOTS_ALSTAR_Sepatu_sneakers_Termurahh_2023-11-26_gambar1.jpeg', 'CONVERSE_size_36-43_BOOTS_ALSTAR_Sepatu_sneakers_Termurahh_2023-11-26_gambar2.jpeg', 'CONVERSE_size_36-43_BOOTS_ALSTAR_Sepatu_sneakers_Termurahh_2023-11-26_gambar3.jpeg', 'CONVERSE_size_36-43_BOOTS_ALSTAR_Sepatu_sneakers_Termurahh_2023-11-26_gambar4.jpeg', '0', 'Silahkan cek dan baca dengan seksama mengenai deskripsi produk kami   Merek Barang : AL STARR CONVERSE  Ukuran : 38.39, 40, 41, 42, 43, 4 Bahan  Material : KANVAS BAHAN TERBAIK Qualitas : ORIGINAL HANDMADE Untuk laki-laki Dan Perempuan   size-chart   39= 24 cm 40=25 cm 41=26 cm 42=27 cm 43=28 CM', 'S00076', '500', '6000'),
('PR00006', 'Kaos Lengan Pendek Retro Love Ink Baju Wanita unisex Korean Stylee', '33000', 'Kaos_Lengan_Pendek_Retro_Love_Ink_Baju_Wanita_unisex_Korean_Stylee_2023-11-26_gambar1.jpeg', 'Kaos_Lengan_Pendek_Retro_Love_Ink_Baju_Wanita_unisex_Korean_Stylee_2023-11-26_gambar2.jpeg', 'Kaos_Lengan_Pendek_Retro_Love_Ink_Baju_Wanita_unisex_Korean_Stylee_2023-11-26_gambar3.jpeg', 'Kaos_Lengan_Pendek_Retro_Love_Ink_Baju_Wanita_unisex_Korean_Stylee_2023-11-26_gambar4.jpeg', 'Kaos_Lengan_Pendek_Retro_Love_Ink_Baju_Wanita_unisex_Korean_Stylee_2023-11-26_gambar5.jpeg', 'Spesifikasi Produk Kami : Bahan = semi katun 24s ReaktifLembut & Tidak Menyusut Sablon = Digital printing Hightquality (Menyesuaikan Design) Jahitan = Menggunakan Mesin Overdeck & Rantai Di Bagian Pundak  Produk Kami Melalui 7 Kali Proses Finishing (Quality terkontrol )  Bijaklah Dalam Memilih Ukuran Untuk detail size nya sudah ada di foto Detail Size di atas merupakan ukuran baju kita keterangan : bijaklah dalam memilih pilihan varian yang anda inginkan ', 'S00009', '250', '126211'),
('PR00007', 'T-shirt Distro Premium Bahan Katun l Kaos Pria Wanita Motif Simpel', '31400', 'T-shirt_Distro_Premium_Bahan_Katun_l_Kaos_Pria_Wanita_Motif_Simpel_2023-11-26_gambar1.jpeg', 'T-shirt_Distro_Premium_Bahan_Katun_l_Kaos_Pria_Wanita_Motif_Simpel_2023-11-26_gambar2.jpeg', 'T-shirt_Distro_Premium_Bahan_Katun_l_Kaos_Pria_Wanita_Motif_Simpel_2023-11-26_gambar3.jpeg', 'T-shirt_Distro_Premium_Bahan_Katun_l_Kaos_Pria_Wanita_Motif_Simpel_2023-11-26_gambar4.jpeg', 'T-shirt_Distro_Premium_Bahan_Katun_l_Kaos_Pria_Wanita_Motif_Simpel_2023-11-26_gambar5.jpeg', ' SPESIFIKASI PRODUK  - 100% BAHAN PAKAIAN KATUN (LEMBUT, TIDAK PANAS DAN NYERAP KERINGAT) - MOTIF PRINTING DIGITAL PREMIUM TIDAK PECAH DAN TIDAK MUDAH LEPAS - TERSEDIA BANYAK PILIHAN WARNA DAN WARNA TIDAK LUNTUR - JAHITAN RAPI DAN STANDAR GARMENT & KUALITAS TERJAMIN !!! - UNISEX BISA DIPAKAI PRIA DAN WANITA  ', 'S00009', '250', '61287'),
('PR00008', 'Oversize - T-Shirt Oversize Elevendays - T-Shirt Distro - Baju Kaos - T-Shirt Cowok - T-Shirt Wanita - T-Shirt Cewek - Kaos Oversize - T-Shirt', '100000', 'Oversize_-_T-Shirt_Oversize_Elevendays_-_T-Shirt_Distro_-_Baju_Kaos_-_T-Shirt_Cowok_-_T-Shirt_Wanita_-_T-Shirt_Cewek_-_Kaos_Oversize_-_T-Shirt_2023-11-26_gambar1.jpeg', 'Oversize_-_T-Shirt_Oversize_Elevendays_-_T-Shirt_Distro_-_Baju_Kaos_-_T-Shirt_Cowok_-_T-Shirt_Wanita_-_T-Shirt_Cewek_-_Kaos_Oversize_-_T-Shirt_2023-11-26_gambar2.jpeg', 'Oversize_-_T-Shirt_Oversize_Elevendays_-_T-Shirt_Distro_-_Baju_Kaos_-_T-Shirt_Cowok_-_T-Shirt_Wanita_-_T-Shirt_Cewek_-_Kaos_Oversize_-_T-Shirt_2023-11-26_gambar3.jpeg', 'Oversize_-_T-Shirt_Oversize_Elevendays_-_T-Shirt_Distro_-_Baju_Kaos_-_T-Shirt_Cowok_-_T-Shirt_Wanita_-_T-Shirt_Cewek_-_Kaos_Oversize_-_T-Shirt_2023-11-26_gambar4.jpeg', 'Oversize_-_T-Shirt_Oversize_Elevendays_-_T-Shirt_Distro_-_Baju_Kaos_-_T-Shirt_Cowok_-_T-Shirt_Wanita_-_T-Shirt_Cewek_-_Kaos_Oversize_-_T-Shirt_2023-11-26_gambar5.jpeg', ' Rincian Ukuran Kaos Elevendays : M = Lebar 55 x Panjang 70 x Lengan 25 Cm L  = Lebar 58 x Panjang 72 x Lengan 26 Cm XL = Lebar 60 x Panjang 74 x Lengan 27 Cm  NOTE:  * Jadwal pengiriman barang adalah Senin-Sabtu. Hari minggu dan libur nasional tutup ya kak. Untuk pemesanan di hari libur akan dikirim hari selanjutnya.  * Paket akan dikirim di hari yang sama dengan pemesanan sebelum jam 17.30 WIB   * Jika barang yang diterima tidak sesuai dengan orderan akan diproses ulang dengan chat admin terlebih dahulu karena admin tidak luput dari kesalahan :)  * Kami sangat senang menerima review bintang 5 barang di setiap produk yang kakak beli  * Yuk dibeli sekarang juga sebelum kehabisan karena stok terbatas banget . Spesifikasi Produk Kami : Bahan = Cotton Combed 24s Reaktif (Grade A) Lembut & Tidak Menyusut Sablon = Plastisol , Discharge , SW dan HightDensity (Menyesuaikan Design) Jahitan = Menggunakan Mesin Overdeck & Rantai Di Bagian Pundak Aksesoris = Full Hangtag , Label , Washing Instructions dan Tafeta Produk Kami Melalui 3 Kali Proses Finishing (Quality Control)', 'S00009', '250', '41834'),
('PR00009', 'KAOS PRIA DISTRO OVERSIZE - KAOS BAND METALLICA - KAOS METALLICA JUSTICE - KAOS ACDC - KAOS BAND BMTH', '100000', 'KAOS_PRIA_DISTRO_OVERSIZE_-_KAOS_BAND_METALLICA_-_KAOS_METALLICA_JUSTICE_-_KAOS_ACDC_-_KAOS_BAND_BMTH_2023-11-26_gambar1.jpeg', 'KAOS_PRIA_DISTRO_OVERSIZE_-_KAOS_BAND_METALLICA_-_KAOS_METALLICA_JUSTICE_-_KAOS_ACDC_-_KAOS_BAND_BMTH_2023-11-26_gambar2.jpeg', 'KAOS_PRIA_DISTRO_OVERSIZE_-_KAOS_BAND_METALLICA_-_KAOS_METALLICA_JUSTICE_-_KAOS_ACDC_-_KAOS_BAND_BMTH_2023-11-26_gambar3.jpeg', 'KAOS_PRIA_DISTRO_OVERSIZE_-_KAOS_BAND_METALLICA_-_KAOS_METALLICA_JUSTICE_-_KAOS_ACDC_-_KAOS_BAND_BMTH_2023-11-26_gambar4.jpeg', 'KAOS_PRIA_DISTRO_OVERSIZE_-_KAOS_BAND_METALLICA_-_KAOS_METALLICA_JUSTICE_-_KAOS_ACDC_-_KAOS_BAND_BMTH_2023-11-26_gambar5.jpeg', 'Rincian Ukuran Kaos Elevendays : M = Lebar 50 x Panjang 70 x Lengan 23 Cm L  = Lebar 52 x Panjang 72 x Lengan 24 Cm XL = Lebar 54 x Panjang 74 Lengan 25 Cm  NOTE:  = Jadwal pengiriman barang adalah Senin-Sabtu. Hari minggu dan libur nasional tutup ya kak. Untuk pemesanan di hari libur akan dikirim hari selanjutnya.  = Paket akan dikirim di hari yang sama dengan pemesanan sebelum jam 17.30 WIB   = Jika barang yang diterima tidak sesuai dengan orderan akan diproses ulang dengan chat admin terlebih dahulu karena admin tidak luput dari kesalahan :)  = Kami sangat senang menerima review bintang 5 barang di setiap produk yang kakak beli  = Yuk dibeli sekarang juga sebelum kehabisan karena stok terbatas banget . Spesifikasi Produk Kami : Bahan = Cotton Combed 24s Reaktif (Grade A) Lembut & Tidak Menyusut Sablon = Plastisol , Discharge , SW dan HightDensity (Menyesuaikan Design) Jahitan = Menggunakan Mesin Overdeck & Rantai Di Bagian Pundak Aksesoris = Full Hangtag , Label , Washing Instructions dan Tafeta Produk Kami Melalui 3 Kali Proses Finishing (Quality Control)', 'S00009', '250', '30000'),
('PR00010', 'Otsky Kaos Oversize Salur Biggest Cotton Combed 24s', '74000', 'Otsky_Kaos_Oversize_Salur_Biggest_Cotton_Combed_24s_2023-11-26_gambar1.jpeg', 'Otsky_Kaos_Oversize_Salur_Biggest_Cotton_Combed_24s_2023-11-26_gambar2.jpeg', 'Otsky_Kaos_Oversize_Salur_Biggest_Cotton_Combed_24s_2023-11-26_gambar3.jpeg', 'Otsky_Kaos_Oversize_Salur_Biggest_Cotton_Combed_24s_2023-11-26_gambar4.jpeg', 'Otsky_Kaos_Oversize_Salur_Biggest_Cotton_Combed_24s_2023-11-26_gambar5.jpeg', 'Keterangan Produk :  - Cotton 24s  - Warna Tidak Cepat Pudar  - Lembut, Mudah Menyerap Keringat, Tidak Gerah, dan Tidak Kaku.  - Kualitas jahitan terbaik  - Sablon terbaik (Printing / plastisol yang merupakan cat level high end     Kelengkapan Produk  (Packaging Set)  -  Free Sticker    Kalo mau Cuttingan Oversize  (Pilih 1 size lebih besar, misal pake Size M order size L )    Warna yang terlihat pada gambar mungkin tidak 100% sama dengan produk yang sebenarnya, disebabkan faktor cahaya pada pengambilan gambar, atau kondisi produk yang digunakan untuk melihat gambar.     ORIGINAL PRODUCT BY OTSKY.    PENTING INFORMASI PENGIRIMAN SAMEDAY & INSTANT    - Order di terima pada hari Senin-Jumat ( sebelum jam 12.00 WIB ) akan di kirimkan pada hari yang sama  - Order di terima pada hari Senin-Kamis ( setelah jam 12.00 WIB ) akan di kirimkan pada hari berikutnya  - Order di terima pada hari Jumat ( setelah jam 12.00 WIB ) dan Sabtu-Minggu akan di kirimkan pada hari Senin  - Untuk pesanan instant lewat dari jam 3 sore akan diproses dihari berikutnya    (*) waktu pengiriman bisa berubah jika ada tanggal merah/libur nasional    PENGIRIMAN  SENIN s/s SABTU   DILAKUKAN PADA JAM 17.00 WIB   MINGGU TIDAK ADA PENGIRIMAN    NOTE  - Jika ada kesalahan dari pembeli tidak dapat ditukar / pengembalian dana  - Resi akan di update pada malam hari atau maksimal H+1  - ISI ALAMAT DAN NOMOR TELEFON DENGAN JELAS DAN AKTIF KARENA KESALAHAN  ALAMAT DILUAR TANGGUNG JAWAB KAMI, DAN ALAMAT TIDAK BISA DIGANTI KETIKA PESANAN SUDAH MASUK!  TERIMA KASIH.', 'S00009', '250', '15000'),
('PR00011', 'kemeja Pria motif - kemeja Pria lengan pendek - kemeja cowok full print - kemeja distro pria', '60000', 'kemeja_Pria_motif_-_kemeja_Pria_lengan_pendek_-_kemeja_cowok_full_print_-_kemeja_distro_pria_2023-11-26_gambar1.jpeg', 'kemeja_Pria_motif_-_kemeja_Pria_lengan_pendek_-_kemeja_cowok_full_print_-_kemeja_distro_pria_2023-11-26_gambar2.jpeg', 'kemeja_Pria_motif_-_kemeja_Pria_lengan_pendek_-_kemeja_cowok_full_print_-_kemeja_distro_pria_2023-11-26_gambar3.jpeg', 'kemeja_Pria_motif_-_kemeja_Pria_lengan_pendek_-_kemeja_cowok_full_print_-_kemeja_distro_pria_2023-11-26_gambar4.jpeg', 'kemeja_Pria_motif_-_kemeja_Pria_lengan_pendek_-_kemeja_cowok_full_print_-_kemeja_distro_pria_2023-11-26_gambar5.jpeg', ' Baca dulu sebelum membeli...kami mengirim produk sesuai dengan pilihan konsumen...    Bahan : 100% katun Ukuran: , L, XL Warna : Sesuai urutan gambar ( Realpicture)   SIZE CHAT :   BAHAN : KATUN   Ukuran L: 52x2 Dan PJ 72 Ukuran XL 54x2 Dan PJ 74', 'S00014', '250', '1500'),
('PR00012', 'kemeja batik pria baju lengan panjang hem cowok Kemeja Lengan panjang Slimfit Atasan batik outfit Kondangan alisan Model Terbaru', '130000', 'kemeja_batik_pria_baju_lengan_panjang_hem_cowok_Kemeja_Lengan_panjang_Slimfit_Atasan_batik_outfit_Kondangan_alisan_Model_Terbaru_2023-11-26_gambar1.jpeg', 'kemeja_batik_pria_baju_lengan_panjang_hem_cowok_Kemeja_Lengan_panjang_Slimfit_Atasan_batik_outfit_Kondangan_alisan_Model_Terbaru_2023-11-26_gambar2.jpeg', 'kemeja_batik_pria_baju_lengan_panjang_hem_cowok_Kemeja_Lengan_panjang_Slimfit_Atasan_batik_outfit_Kondangan_alisan_Model_Terbaru_2023-11-26_gambar3.jpeg', 'kemeja_batik_pria_baju_lengan_panjang_hem_cowok_Kemeja_Lengan_panjang_Slimfit_Atasan_batik_outfit_Kondangan_alisan_Model_Terbaru_2023-11-26_gambar4.jpeg', 'kemeja_batik_pria_baju_lengan_panjang_hem_cowok_Kemeja_Lengan_panjang_Slimfit_Atasan_batik_outfit_Kondangan_alisan_Model_Terbaru_2023-11-26_gambar5.jpeg', '  INFO PRODUK..   Batik Premium  Printed Batik  Bahan Katun Prima lampion  Model SlimFit  Sudah Lapis Furing  Jahitan Butik Rapi, Awet & Kuat  Adem & Nyaman Dipakai  Segera Order Sebelum Sold Out   Size Chart Cm  S = LD 100 & PB 71  M = LD 104 & PB 72  L = LD108 & PB 73  XL = LD112 & PB 75  XXL = LD 116 & PB 77  Ukuran Mungkin Bisa Berbeda 1-2cm    Baju Batik Pria Premium Lengan Panjang Modern  Care Label   Dapat dicuci menggunakan mesin cuci  Jangan menggunakan pemutih pakaian  Jemur secara terbalik terutama untuk bagian kerah', 'S00014', '250', '500'),
('PR00013', 'BAJU ATASAN KEMEJA BATIK PRIA PREMIUM LENGAN PANJANG SLIMFIT REMAJA PRIA KANTOR KONDANGAN CASUAL RESMI', '120000', 'BAJU_ATASAN_KEMEJA_BATIK_PRIA_PREMIUM_LENGAN_PANJANG_SLIMFIT_REMAJA_PRIA_KANTOR_KONDANGAN_CASUAL_RESMI_2023-11-26_gambar1.jpeg', 'BAJU_ATASAN_KEMEJA_BATIK_PRIA_PREMIUM_LENGAN_PANJANG_SLIMFIT_REMAJA_PRIA_KANTOR_KONDANGAN_CASUAL_RESMI_2023-11-26_gambar2.jpeg', 'BAJU_ATASAN_KEMEJA_BATIK_PRIA_PREMIUM_LENGAN_PANJANG_SLIMFIT_REMAJA_PRIA_KANTOR_KONDANGAN_CASUAL_RESMI_2023-11-26_gambar3.jpeg', 'BAJU_ATASAN_KEMEJA_BATIK_PRIA_PREMIUM_LENGAN_PANJANG_SLIMFIT_REMAJA_PRIA_KANTOR_KONDANGAN_CASUAL_RESMI_2023-11-26_gambar4.jpeg', 'BAJU_ATASAN_KEMEJA_BATIK_PRIA_PREMIUM_LENGAN_PANJANG_SLIMFIT_REMAJA_PRIA_KANTOR_KONDANGAN_CASUAL_RESMI_2023-11-26_gambar5.jpeg', 'Spesifikasi Produk :  1. Bahan katun prima halus & nyaman di pakai .  2. Teknik Handprint kualitas PREMIUM untuk Hem Batik yang awet, tidak luntur, tidak menciut dan tidak transparan.  3. Di jahit orang profesional di bidangnya.  4. Kemeja lapis furing yg halus & tidak panas.   Refrensi Ukuran Model yg di foto :  slimfit  *ukuran baju   S : Lingkar dada = 100cm        Panjang badan = 68 cm   M : Lingkar dada = 104cm         Panjang badan = 70 cm   L : Lingkar dada = 108cm       Panjang badan = 72   XL : Lingkar dada = 112 cm          Panjang badan = 74   XXL : Lingkar dada = 116cm            Panjang badan = 76 cm   XXL : lingkar dada = 116cm            Panjang badan = 78 cm', 'S00014', '250', '5000'),
('PR00015', 'batik solo kemeja pria lengan panjang batik pria lengan panjang modern baju batik lengan panjang baju kemeja batik pria kemeja batik', '130000', 'batik_solo_kemeja_pria_lengan_panjang_batik_pria_lengan_panjang_modern_baju_batik_lengan_panjang_baju_kemeja_batik_pria_kemeja_batik_2023-11-26_gambar11.jpeg', 'batik_solo_kemeja_pria_lengan_panjang_batik_pria_lengan_panjang_modern_baju_batik_lengan_panjang_baju_kemeja_batik_pria_kemeja_batik_2023-11-26_gambar21.jpeg', 'batik_solo_kemeja_pria_lengan_panjang_batik_pria_lengan_panjang_modern_baju_batik_lengan_panjang_baju_kemeja_batik_pria_kemeja_batik_2023-11-26_gambar31.jpeg', 'batik_solo_kemeja_pria_lengan_panjang_batik_pria_lengan_panjang_modern_baju_batik_lengan_panjang_baju_kemeja_batik_pria_kemeja_batik_2023-11-26_gambar41.jpeg', 'batik_solo_kemeja_pria_lengan_panjang_batik_pria_lengan_panjang_modern_baju_batik_lengan_panjang_baju_kemeja_batik_pria_kemeja_batik_2023-11-26_gambar51.jpeg', '  INFO PRODUK....   Batik Premium  Printed Batik  Bahan Katun Prima lampion  Model SlimFit  Sudah Lapis Furing  Jahitan Butik Rapi, Awet & Kuat  Adem & Nyaman Dipakai  Segera Order Sebelum Sold Out   Size Chart Cm  S = LD 100 & PB 71  M = LD 104 & PB 72  L = LD108 & PB 73  XL = LD112 & PB 75  XXL = LD 116 & PB 77  Ukuran Mungkin Bisa Berbeda 1-2cm    Baju Batik Pria Premium Lengan Panjang Modern  Care Label   Dapat dicuci menggunakan mesin cuci  Jangan menggunakan pemutih pakaian  Jemur secara terbalik terutama untuk bagian kerah', 'S00014', '250', '200'),
('PR00016', 'Celana Katun Pria Panjang Cino Karet Standar Jumbo Premium M-XXL Taktik Outdor Sport Casual KOREAN STYLE', '75000', 'Celana_Katun_Pria_Panjang_Cino_Karet_Standar_Jumbo_Premium_M-XXL_Taktik_Outdor_Sport_Casual_KOREAN_STYLE_2023-11-26_gambar1.jpeg', 'Celana_Katun_Pria_Panjang_Cino_Karet_Standar_Jumbo_Premium_M-XXL_Taktik_Outdor_Sport_Casual_KOREAN_STYLE_2023-11-26_gambar2.jpeg', 'Celana_Katun_Pria_Panjang_Cino_Karet_Standar_Jumbo_Premium_M-XXL_Taktik_Outdor_Sport_Casual_KOREAN_STYLE_2023-11-26_gambar3.jpeg', 'Celana_Katun_Pria_Panjang_Cino_Karet_Standar_Jumbo_Premium_M-XXL_Taktik_Outdor_Sport_Casual_KOREAN_STYLE_2023-11-26_gambar4.jpeg', 'Celana_Katun_Pria_Panjang_Cino_Karet_Standar_Jumbo_Premium_M-XXL_Taktik_Outdor_Sport_Casual_KOREAN_STYLE_2023-11-26_gambar5.jpeg', 'CELANA PANJANG MODIS YUK DI CHEK OUT : ]  - BERBAHAN KATUN TWIL COCOK DI PAKAI OLAHRAGA ATAU SANTAI DI RUMAH BISA DI PAKAI PRIA DAN WANITA BAIK REMAJA ATAU DEWASA -MENYERAP KERINGAT DAN ADEM DI PAKAI -SAKU TEMPEL DI BAGIAN BELAKANG -BENTUK POLA SESUAI DENGAN TREND KEKINIAN -PINGGANG MENGGUNAKAN KARET DAN TALI SEHINGGA LENTUR DAN ELASTIS BISA DI KECILIN BISA DI BESARIN   SELAMAT BERBELANJA DI TOKO KAMI  MATERIAL BAHAN : KATUN MICRO SUEDE JAHITAN RAPIH STANDAR DISTRO BERIKUT DESKRIPSI UNTUK CELANA STRAIGH  SIZE M -PANJANG CELANA ; 96 -P.SELANGKANG      ; 33 CM -LEBAR PAHA           ; 30 CM -LINGKAR PINGGANG ; 66-100 CM -UKURAN BERAT BADAN 50-60  SIZE L -PANJANG CELANA ; 98 CM -P.SELANGKANG      ; 35 CM -LEBAR PAHA           ; 34 CM -LINGKAR PINGGANG ; 68-102 CM -UKURAN BERAT BADAN 60-75  SIZE XL -PANJANG CELANA ; 100 CM -P.SELANGKANG      ; 36 CM -LEBAR PAHA           ; 35 CM -LINGKAR PINGGANG ; 70-104 CM -UKURAN BERAT BADAN 75-85  SIZE XXL -PANJANG CELANA ; 102 CM -P.SELANGKANG      ; 37 CM -LEBAR PAHA           ; 37 CM -LINGKAR PINGGANG ; 72-106 CM -UKURAN BERAT BADAN 85-95  SILAHKAN BERBELANJA DI TOKO KAMI KAKA', 'S00032', '300', '1500'),
('PR00017', 'Celana Chino / Chinos Panjang Pria Bahan Melar Kerja cowo Santai Liburan Cowok nongkrong main jalan', '150000', 'Celana_Chino_Chinos_Panjang_Pria_Bahan_Melar_Kerja_cowo_Santai_Liburan_Cowok_nongkrong_main_jalan_2023-11-26_gambar1.jpeg', 'Celana_Chino_Chinos_Panjang_Pria_Bahan_Melar_Kerja_cowo_Santai_Liburan_Cowok_nongkrong_main_jalan_2023-11-26_gambar2.jpeg', 'Celana_Chino_Chinos_Panjang_Pria_Bahan_Melar_Kerja_cowo_Santai_Liburan_Cowok_nongkrong_main_jalan_2023-11-26_gambar3.jpeg', 'Celana_Chino_Chinos_Panjang_Pria_Bahan_Melar_Kerja_cowo_Santai_Liburan_Cowok_nongkrong_main_jalan_2023-11-26_gambar4.jpeg', 'Celana_Chino_Chinos_Panjang_Pria_Bahan_Melar_Kerja_cowo_Santai_Liburan_Cowok_nongkrong_main_jalan_2023-11-26_gambar5.jpeg', 'GUDANG CENTER FASHION gudangcenter fashion  • Full tag Bermerk  - Merk brand sesuai foto (jangan tertarik dengan cino murah tapi merk dan kualitas kw/abal abal).                    • Barang 99% realpict(foto asli)karena kita ambil foto sendiri.  • Jahitan rapih dan tidak mudah sobek   • Zipper/Resleting premium,anti karat & anti slek  • Nyaman dipakai karena bahan yg dipakai berkualitas  • Sangat cocok untuk dipakai nongkrong atau kegiatan sehari-hari, Kerja Kantoran, Kerja Karyawan Bahkan Big Bos pun Pakai celana ini.  • Sangat cocok untuk semua kalangan yang ingin tampil trendi.  Bahan: Cotton Chinos (Tidak Terlalu Tebal/Tidak Terlalu tipis agar sangat nyaman saat di gunakan).  Model: Slimfit/Pensil skinny Stretch.  Kualitas: Grade A teebaik di kelas harganya yang menggunakan bahan katun tidak terlalu tebal/tipis posisi di tengah tengah untuk menghasilkan kenyamanan saat di pakai.  Mengunakan kancing, resleting.  Warna: Hitam/Black, Abu/Gray, Cream, Mocca/Coklat. -BAHAN: tidak terlalu melar karena ini adalah cino Pria/cowo.  # Harap Tidak Komplain Celananya kekecilan, karena di krim sudah sangat sesuai dengan ukuran (Harap Di Ukur Dahulu Sebelum Membeli).  ukuran No produk lokal (silahkan diukur dahulu ya ka sebelum membeli).  DETAIL SIZE : Untuk Pembelian ukuran 38/39 harus tulis DiCatatan/dipesan (contoh mau 38 maka tulis 38) /bisa chat admin.  LP: Lingkar Pinggang PJ: Panjang Celana  27: LP 71cm , PJ 97cm 28: LP 74cm , PJ 98cm 29: LP 76cm , PJ 98cm 30: LP 78cm , PJ 99cm 31: LP 80cm , PJ 99cm 32: LP 82cm , PJ 99cm 33: LP 84cm , PJ 99cm 34: LP 86cm , PJ 99cm 35: LP 88cm , PJ 99cm 36: LP 91cm , PJ 100cm 37: LP 93cm, PJ 100cm 38: LP 96cm , PJ 100cm 39: Lp 99cm , PJ 100cm  *TOLERANSI UKURAN 1-2cm  Panjang celana kisaran untuk tinggi orang indonesia yaitu 160/165cm - 175 cm.  ( TOLERANSI -+2 CM ) , TOLONG TIDAK KOMPLAIN MASALAH UKURAN KARENA SUDAH JELAS DI JELASKAN DI DEKRIPSI INI/CATATAN INI. dan berikan bintang 5 .  • Terima Return/Kembali barang / uang jika ada cacat pada barang atau kesalahan pengiriman. • Retur tidak akan dilayani apabila kesalahan pembeli.  • BARANG SELALU READY STOK (STORE KAMI BUKAN STORE ABAL ABAL / DROPSHIPER KAMI STORE BESAR & SUDAH BERDIRI SEJAK 2018 tepercaya, yang berani jual barang murah biar untung sedikit tapi berjalan kepanjangan) ', 'S00032', '300', '192459169'),
('PR00018', 'CELANA PANJANG PRIA Slim fit Panjang Kerja kantor Santai Liburan Cowok Gentleman Boy size 27 - 38', '120000', 'CELANA_PANJANG_PRIA_Slim_fit_Panjang_Kerja_kantor_Santai_Liburan_Cowok_Gentleman_Boy_size_27_-_38_2023-11-26_gambar1.png', 'CELANA_PANJANG_PRIA_Slim_fit_Panjang_Kerja_kantor_Santai_Liburan_Cowok_Gentleman_Boy_size_27_-_38_2023-11-26_gambar2.jpeg', 'CELANA_PANJANG_PRIA_Slim_fit_Panjang_Kerja_kantor_Santai_Liburan_Cowok_Gentleman_Boy_size_27_-_38_2023-11-26_gambar3.jpeg', 'CELANA_PANJANG_PRIA_Slim_fit_Panjang_Kerja_kantor_Santai_Liburan_Cowok_Gentleman_Boy_size_27_-_38_2023-11-26_gambar4.jpeg', 'CELANA_PANJANG_PRIA_Slim_fit_Panjang_Kerja_kantor_Santai_Liburan_Cowok_Gentleman_Boy_size_27_-_38_2023-11-26_gambar5.jpeg', 'Deskripsi Produk   Ready warna  Krem 27-38 Black 27-38 Mocca 27-38 Grey /Abu 27-38  Bahan : katun twill Stretch (melar/elastis).   Detail Saku belakang model pendam (bukan tempel)   Ada juga yang polos tanpa variasi ( kantong polos sama dengan warna bahan ). Silahkan pilih sesuai selera anda.  Variasi polos merk random sesuai stok.   Bingung memilih ukuran Size? Takut kebesaran apalagi kekecilan? Jangan khawatir ikuti pentunjuk  menentukan ukuran celana dibawah ini.  Size : 27-38 (Ukuran standard berdasarkan lingkar pinggang dalam satuan inci) dan jika ingin dirubah dalam cm tinggal dikali 2,54  Tabel Ukuran celana:  Panjang celana = +- 97cm  Size = Lingkar pinggang  27=+- (68 ) cm 28 =+- (71) cm 29 =+- (74 ) cm 30 =+- (76 ) cm 31 =+- (79 ) cm 32 =+- (81) cm  33 =+- (84) cm 34 =+- (86) cm 35 = +-(89) cm 36 =+- (91) cm 37 =+- (94) cm 38 =+- (97) cm   perkiran Berat badan : 27=-+45kg 28=-+46kg 29= -+48kg 30= -+50kg  31=-+55kg 32=-+60kg 33= -+65kg  34=-+68kg 35=-+72kg 36= -+75kg  37=-+78kg 38=-+80kg', 'S00029', '300', '421495'),
('PR00019', '] Size 27 - 38 ORIGINAL Celana Cargo Panjang Pria Army Loreng Ufc Venum Mma Pantai Gym TerLaris', '100000', '_Size_27_-_38_ORIGINAL_Celana_Cargo_Panjang_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_TerLaris_2023-11-26_gambar1.jpeg', '_Size_27_-_38_ORIGINAL_Celana_Cargo_Panjang_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_TerLaris_2023-11-26_gambar2.jpeg', '_Size_27_-_38_ORIGINAL_Celana_Cargo_Panjang_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_TerLaris_2023-11-26_gambar3.jpeg', '_Size_27_-_38_ORIGINAL_Celana_Cargo_Panjang_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_TerLaris_2023-11-26_gambar4.jpeg', '_Size_27_-_38_ORIGINAL_Celana_Cargo_Panjang_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_TerLaris_2023-11-26_gambar5.jpeg', 'READY STOK   Celana Cargo Panjang Pria PREMIUM  kenapa harus beli celana di toko kami ??    kami pastikan barang 100% realpict ya kak sesuai dengan aslinya  celana dengan standar distro premium tentunya  Bahan cotton twill sweding lembut dan tebal & tentunnya sangat nyaman saat dipakai   sangat cocok untuk di pakai beraktifitas sehari2   tersedia 6 saku pada bagian depan + belakang & bagian samping menambah kesan sporty   Warna yang tersedia : - GREY - MOCCA - HITAM - CREAM - ARMY SIZE / UKURAN LINGKAR PINGGANG: size 27 lingkar pinggang 69 cm  size 28 lingkar pinggang 72 cm  size 29 lingkar pinggang 75 cm  size 30 lingkar pinggang 78 cm  size 31 lingkar pinggang 81 cm  size 32 lingkar pinggang 83 cm  size 33 lingkar pinggang 86 cm size 34 lingkar pinggang 89 cm  size 35 lingkar pinggang 92 cm size 36 lingkar pinggang 95cm size 37 lingkar pinggang 98 cm size 38 lingkar pinggang 100 cm Panjang celana 95-99cm (Panjang celana menyesuaikan size)  UKURAN MENURUT BERAT BADAN DENGAN TINGGI 155-175 CM  Ukuran berdasarkan berat badan ini hanya sebagai acuan,lebih baik mengikuti ukuran celana yang biasa dipakai atau dilebihkan satu ukuran untuk antisipasi kekecilan.  BB 49-55 KG =  SIZE 27/28 BB 57-60 KG =  SIZE 29/ 30 BB 61-65 KG =  SIZE 31/ 32 BB  69-75 KG = SIZE 33/ 34 BB 77-80 KG =  SIZE 35/36  BB 82-87KG =   SIZE 37/38    Cara Mengukur Lingkar Pinggang Cara melakukan pengukuran lingkar pinggang yang benar adalah sebagi berikut. 1. Buka sebagian baju sehingga bagian badan yang sejajar dengan pusar terbuka. 2. Ambil napas biasa, sehingga perut berada dalam keadaan normal. 3. Gunakan meteran untuk mengukur lingkar perut sejajar dengan pusar, dimulai dari pusar. Lingkarkan meteran menempel pada tempat gesper/sabuk  catatan pembeli : - Belanja aman dan nyaman - Pastikan warna dan ukuran sebelum memesan agar tidak terjadi kesalahan pengiriman - Sertakan alamat lengkap, barang yang diorder + size ketika melakukan pemesanan -reseller welcome banget & Dropship aman', 'S00033', '300', '292225'),
('PR00020', 'YANG LAGI HITS Celana Cargo Pendek Pria Army Loreng Ufc Venum Mma Pantai Gym Lari Fitnes Seri I9880', '100000', 'YANG_LAGI_HITS_Celana_Cargo_Pendek_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_Lari_Fitnes_Seri_I9880_2023-11-26_gambar1.jpeg', 'YANG_LAGI_HITS_Celana_Cargo_Pendek_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_Lari_Fitnes_Seri_I9880_2023-11-26_gambar2.jpeg', 'YANG_LAGI_HITS_Celana_Cargo_Pendek_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_Lari_Fitnes_Seri_I9880_2023-11-26_gambar3.jpeg', 'YANG_LAGI_HITS_Celana_Cargo_Pendek_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_Lari_Fitnes_Seri_I9880_2023-11-26_gambar4.jpeg', 'YANG_LAGI_HITS_Celana_Cargo_Pendek_Pria_Army_Loreng_Ufc_Venum_Mma_Pantai_Gym_Lari_Fitnes_Seri_I9880_2023-11-26_gambar5.jpeg', 'READY SIZE 27-38 (KOMPLIT) Cocok dipakai untuk santai Sepedaan adventure  MERK TRASHER bahan: American dril  model limited paling murah paling komplit size nya tentunya good produk  ready warna HITAM GREY  MOCA CREAM  CHART SIZE Size = Lingkar pinggang  27=+- (74 ) cm 28 =+- (76) cm 29 =+- (78 ) cm 30 =+- (80 ) cm 31 =+- (82 ) cm 32 =+- (86) cm 33 =+- (88) cm 34 =+- (90) cm 35 = +-(94) cm 36 =+- (96) cm 37 =+- (100) cm 38 =+- (104) cm   Panjang 50-52cm   NB = -warna tidak selalu sama seperti digambar TAPI YANG JELAS TETAP PESAN HITAM KAMI KIRIM HITAM. -NO CANCEL ORDER!!! Pastikan checkout barang sesuai dengan produk yang di inginkan, bukan tanggung jawab kami jika barang yg dikirim tidak sesuai yang di harapkan karena kesalahan Checkout, WARNA dan UKURAN wajib di cantumkan di NOTE. HARGA TIAP VARIAN (UKURAN) BEDA', 'S00033', '300', '1000'),
('PR00021', 'Topi Baseball Pria Wanita Terlaris Topi Pria Bordir Brooklyn Topi Distro Original', '9200', 'Topi_Baseball_Pria_Wanita_Terlaris_Topi_Pria_Bordir_Brooklyn_Topi_Distro_Original_2023-11-26_gambar1.jpeg', 'Topi_Baseball_Pria_Wanita_Terlaris_Topi_Pria_Bordir_Brooklyn_Topi_Distro_Original_2023-11-26_gambar2.jpeg', 'Topi_Baseball_Pria_Wanita_Terlaris_Topi_Pria_Bordir_Brooklyn_Topi_Distro_Original_2023-11-26_gambar3.jpeg', 'Topi_Baseball_Pria_Wanita_Terlaris_Topi_Pria_Bordir_Brooklyn_Topi_Distro_Original_2023-11-26_gambar4.jpeg', 'Topi_Baseball_Pria_Wanita_Terlaris_Topi_Pria_Bordir_Brooklyn_Topi_Distro_Original_2023-11-26_gambar5.jpeg', 'WELCOME DELTHASHOP.ID  * UNTUK GAMBAR/MODEL TOPI LAIN NYA SILAHKAN CEK DI TOKO KAMI  Topi Dewasa Bordir Bisa Untuk Pria Dan Wanita  Topi dengan kualitas premium , nyaman digunakan untuk segala aktifitas  Spesifikasi: * Ready Warna Hitam, Cream, Grey, Coklat, Hijau * Bahan drill twill Premium * Lingkar Kepala 54-62 cm * Menggunakan jepitan besi di bagian belakang sehingga bisa di perkecil dan di perbesar sesuai keinginan   CATATAN * Untuk stok barang kita ready stock tiap hari * Barang rusak/tidak sesuai pesanan bisa di kembalikan/ditukar * Wajib Ada VIDEO UNBOXING kalo mau komplain , tidak ada VIDEO UNBOXING komplain DITOLAK !!!', 'S00075', '95', '478136'),
('PR00022', 'Topi Cewek Baseball cap Unisex Lembut Top Tmi Huruf Pure Warna Nyaman Bahan Katun Topi Inisial Huruf Topi Cewe Topi Baseball Pria', '115000', 'Topi_Cewek_Baseball_cap_Unisex_Lembut_Top_Tmi_Huruf_Pure_Warna_Nyaman_Bahan_Katun_Topi_Inisial_Huruf_Topi_Cewe_Topi_Baseball_Pria_2023-11-26_gambar1.jpeg', 'Topi_Cewek_Baseball_cap_Unisex_Lembut_Top_Tmi_Huruf_Pure_Warna_Nyaman_Bahan_Katun_Topi_Inisial_Huruf_Topi_Cewe_Topi_Baseball_Pria_2023-11-26_gambar2.jpeg', 'Topi_Cewek_Baseball_cap_Unisex_Lembut_Top_Tmi_Huruf_Pure_Warna_Nyaman_Bahan_Katun_Topi_Inisial_Huruf_Topi_Cewe_Topi_Baseball_Pria_2023-11-26_gambar3.jpeg', 'Topi_Cewek_Baseball_cap_Unisex_Lembut_Top_Tmi_Huruf_Pure_Warna_Nyaman_Bahan_Katun_Topi_Inisial_Huruf_Topi_Cewe_Topi_Baseball_Pria_2023-11-26_gambar4.jpeg', 'Topi_Cewek_Baseball_cap_Unisex_Lembut_Top_Tmi_Huruf_Pure_Warna_Nyaman_Bahan_Katun_Topi_Inisial_Huruf_Topi_Cewe_Topi_Baseball_Pria_2023-11-26_gambar5.jpeg', 'Baseball cap Unisex Lembut Top Tmi Huruf Pure Warna Nyaman Bahan Katun Topi Baseball Dewasa Pria Wanita  Topi Dewasa Bordir  keluar rumah tidak takut kepala kena panas bisa pakai Topi baseball Kami ,karna topi kami bisa bahan nya bisa menyerap keringat ,,  Setelah Pakai Produk dari kami , Muka jadi kelihatan jadi cantik , pipi jadi tirus produk topi kami terbuat dari bahan yang berkualitas premium import asli Original.   Bisa Untuk Pria Dan Wanita  Topi dengan kualitas premium , nyaman digunakan untuk segala aktifitas  Spesifikasi:   Bahan KATUN MURNI   Lingkar Kepala 54-60 cm  Tinggi topi 16 cm  Lidah Topi 7 cm  Lebar Lidah Topi 16 cm  * Menggunakan jepitan besi di bagian belakang sehingga bisa di perkecil dan di perbesar sesuai keinginan  Daily Activities Use.  - Sangat cocok di gunakan untuk sehari-hari ataupun berolahraga, menambah penampilan agar terlihat lebih keren dan casual, sekaligus bisa melindungi kepala kamu.  - Karena pencahayaan kamera yang berbeda, warna topi yang ada di gambar dengan aslinya mungkin memiliki sedikit perbedaan.  Keunggulan Produk :  - Bisa digunakan untuk pria dan wanita/ UNISEX  - Lidah topi yang elastis bisa dibentuk sesuai lengkungan yang anda inginkan.  - Mudah dibersihkan.  - Bahan  KATUN MURNI  - Strap topi dapat disesuaikan sesuai lingkar kepala.  - Topi ini Bisa menyerap keringat  - Bisa bikin wajah jadi tirus  - Pinggiran topi tebal  Cara Membersihkan Topi  - Tidak dianjurkan untuk di Cuci di mesin cuci  - Gunakan sikat berbulu lembut untuk menyapu debu ata kotoran dengan lembut sebelum sempat meresap ke dalam bahan topi - Jika kalian mengenakan topi saat hari yang panas dan berkeringat, biarkan hingga benar-benar keringn di tempat terbuka sebelum menyimpannya di dalam kotak topi.  Cara Penyimpanan Topi yang Benar  -Topi paling baik diletakkan di rak topi di saat tidak digunakan - Namun, jika kalian tidak memiliki rak untuk menyimpan topi kalian, simpan topi kalian secara terbalik di mahkotanya, terdengar aneh namun ini cara terbaik untuk menghindari bagian  brim topi kalian menjadi rata jika disimpan pada waktu yang lama. -Dengan menyimpan topi pada kotak, dapat menghindari topi dari debu, kondisi basah atau terhindar dari tertumpuk oleh benda lain yang dapat merusak bentuk topi.', 'S00075', '94', '6727'),
('PR00023', 'Topi Baseball NEW YORK EST 1625 Hat Cap Casual Sport Distro', '23000', 'Topi_Baseball_NEW_YORK_EST_1625_Hat_Cap_Casual_Sport_Distro_2023-12-20_gambar1.jpeg', 'Topi_Baseball_NEW_YORK_EST_1625_Hat_Cap_Casual_Sport_Distro_2023-11-26_gambar2.jpeg', 'Topi_Baseball_NEW_YORK_EST_1625_Hat_Cap_Casual_Sport_Distro_2023-11-26_gambar3.jpeg', 'Topi_Baseball_NEW_YORK_EST_1625_Hat_Cap_Casual_Sport_Distro_2023-11-26_gambar4.jpeg', 'Topi_Baseball_NEW_YORK_EST_1625_Hat_Cap_Casual_Sport_Distro_2023-11-26_gambar5.jpeg', 'Baseball cap : NEW YORK - Topi Baseball Spesiifkasi : 1. Material : 100% cotton 2. Embroidered graphics :  - Depan : NEW YORK - EST. 1625 - Belakang : new york city  - Samping : - 3.Dimensi : -  Ukuran 1size adjustable untuk lingkar kepala : 54-62 +/- 1cm - Tinggi : 12cm - Panjang Visor/Lidah : 7cm - Berat : 200gram 4. PIlihan warna : - BLACK - BROWN - RED - GRAY - GREEN - NAVY - ORANGE Silahkan order di varian warna yg diinginkan 6. EFFECT  : STONE WASHED EFFECT/VINTAGE LOOK/EFEK BELEL PERHATIKAN : KARENA EFFECT VINTAGE, WARNA AKAN BISA BERVARIASI +/- 10%', 'S00075', '94', '9095'),
('PR00024', 'Topi Trasher Trucker', '8000', 'Topi_Trasher_Trucker_2023-11-26_gambar1.jpeg', 'Topi_Trasher_Trucker_2023-11-26_gambar2.jpeg', 'Topi_Trasher_Trucker_2023-11-26_gambar3.jpeg', 'Topi_Trasher_Trucker_2023-11-26_gambar4.jpeg', '0', 'KONDISI: New BAHAN:NYLON KINI HADIR  KATALOG BARU KITA>>>> TRUCKER KEREN YG COCOK DIPAKAI DI KESEHARIAN KALIAN DENGAN PENAMPILAN CASUAL YG ELEGAN - Trucker - Aksesoris kepala - Material Twill - Nyaman dikenakan di kepala - Pas lengkapi gaya kasual sehari-hari dengan desain yang masa kini - Ukuran topi bisa disesuaikan - Neat Stitching and Strong - Adjustable snap closure - Detail Print - Six panel construction  Size Info - Lingkar dalam 55cm (strap normal) - Tinggi 13cm - Pet Topi/Lidah 7cm dari bagian depan  Info & Care : Gosok dengan sikat dengan bulu halus dibagian yang kotor Sikat perlahan jika kotor, jangan dicuci menggunakan mesin cuci', 'S00075', '94', '33719'),
('PR00025', 'Topi Polos Baseball Pria Premium Topi Polos Pria Wanita', '6000', 'Topi_Polos_Baseball_Pria_Premium_Topi_Polos_Pria_Wanita_2023-11-26_gambar1.jpeg', 'Topi_Polos_Baseball_Pria_Premium_Topi_Polos_Pria_Wanita_2023-11-26_gambar2.jpeg', 'Topi_Polos_Baseball_Pria_Premium_Topi_Polos_Pria_Wanita_2023-11-26_gambar3.jpeg', 'Topi_Polos_Baseball_Pria_Premium_Topi_Polos_Pria_Wanita_2023-11-26_gambar4.jpeg', 'Topi_Polos_Baseball_Pria_Premium_Topi_Polos_Pria_Wanita_2023-11-26_gambar5.jpeg', 'TOPI POLOS BASEBALL   KUALITAS BINTANG 5 HARGA TERMURAH    A. TOPI BASEBALL POLOS SPESIFIKASI PRODUK : - MODEL TOPI BASEBALL (Unisex pria/wanita) - BAHAN PREMIUM COTTON BERKUALITAS - JAHITAN RAPIH  - BAGIAN BELAKANG MEMAKAI RING BESI BERKUALITAS UNTUK MENGATUT BESAR KECIL TOPI   PILIHAN WARNA - HITAM - PUTIH - CREAM - HIJAU ARMY - COKLAT  * Stok Warna Dapat Berubah Ubah, Silahkan Pesan Sesuai Stok Yang Ada Dan Jangan Lupa Berikan Warna Cadangan Untuk Menghindari Pengiriman Random)*   - Pengiriman setiap hari  (termasuk hari libur) - Orderan yang masuk dibawah jam 16.00 akan dikirim dihari yang sama , jika diatas jam 16.00 akan dikirim besok harinya - Wajib memberikan video unboxing ketika menerima paket , kami tidak akan melayani komplen apapun jika paket yang diterima rusak tanpa video unboxing - Jangan Lupa follow linbes.id   Silahkan diorder', 'S00075', '94', '51987'),
('PR00027', 'Baju Kaos Oversize SHADOWS / Kaos Oversize Wanita Terbaru', '55000', 'GSC_-_Baju_Kaos_Oversize_SHADOWS_Kaos_Oversize_Wanita_Terbaru_2023-12-20_gambar1.jpeg', 'GSC_-_Baju_Kaos_Oversize_SHADOWS_Kaos_Oversize_Wanita_Terbaru_2023-12-20_gambar2.jpeg', 'GSC_-_Baju_Kaos_Oversize_SHADOWS_Kaos_Oversize_Wanita_Terbaru_2023-12-20_gambar3.jpeg', 'GSC_-_Baju_Kaos_Oversize_SHADOWS_Kaos_Oversize_Wanita_Terbaru_2023-12-20_gambar4.jpeg', 'GSC_-_Baju_Kaos_Oversize_SHADOWS_Kaos_Oversize_Wanita_Terbaru_2023-12-20_gambar5.jpeg', 'Bahan : Spandex Ukuran : Fit to XL LD : 110 cM PJ : 63 CM  - Note tolong kasih toleransi 2-3cm ya kak - Buat kemakan jahitan ya kak  !!  CATATAN UNTUK PEMBELI !! - Variasi Produk bisa di Klik = Ready Stok  - Variasi tidak bisa di Klik = Kosong ❌ - Variasi yang di pilih = yang dikirim ( tidak menerima perubahan via chat / pesan ) - Dapatkan Potongan Ongkir Se-Indonesia ( silahkan klaim di halaman utama Shopee ) - Pengiriman dari Jakarta ( JNE, JNE Trucking, J&T dan COD Shopee Express )   - Kita Terima Paket Besar Kirim Ke Seluruh Indonesia    - PERATURAN TOKO    - WAJIB melakukan video unboxing saat paket diterima  - Jika ada kekurangan barang, harap foto Label Pengiriman & video unboxing  - Tidak menerima perubahan nama, alamat & warna di Catatan dan Chat', 'S00009', '5', '18'),
('PR00028', 't shirt hitam retro street style motorcycle kaos oversize wanita baju wanita korea', '90000', 't_shirt_hitam_retro_street_style_motorcycle_kaos_oversize_wanita_baju_wanita_korea_2023-12-20_gambar1.jpeg', 't_shirt_hitam_retro_street_style_motorcycle_kaos_oversize_wanita_baju_wanita_korea_2023-12-20_gambar2.jpeg', 't_shirt_hitam_retro_street_style_motorcycle_kaos_oversize_wanita_baju_wanita_korea_2023-12-20_gambar3.jpeg', 't_shirt_hitam_retro_street_style_motorcycle_kaos_oversize_wanita_baju_wanita_korea_2023-12-20_gambar4.jpeg', 't_shirt_hitam_retro_street_style_motorcycle_kaos_oversize_wanita_baju_wanita_korea_2023-12-20_gambar5.jpeg', 'selalu mengunakan \"kekuatan muda\" sebagai latar belakang nilainya, dan berkomitmen untuk memberikan \"terjangkau dan berkualitas tinggi\" dan menghasilkan lebih banyak item fashion yang disukai anak muda dengan \"gender apapun\" sebagai intinya. Berdasarkan bahan dan harga terjangkau, SEZO telah menciptakan wilayah trennya sendiri  Produk di toko dijamin 100% foto asli, dan gambar yang diambil akan diselidiki  [ukuran pakaian] Raglan T Shirt M  Panjang 69   Dada 108  Lengan 33 L Panjang 71 Dada 112 Lengan 34 XL Panjang 73 Dada 116 Lengan 35  Washed T Shirt M  Panjang 68   Dada 104  Lengan 22   Bahu 51 L Panjang 70 Dada 108 Lengan 23 Bahu 53 XL Panjang 72 Dada 112 Lengan 24 Bahu 55 XXL Panjang 74 Dada 116 Lengan 25 Bahu 57  T shirt M Panjang 69 Dada 104 Lengan 19 Bahu 48 L Panjang 71 Dada 108 Lengan 20 Bahu 49 XL Panjang 73 Dada 112 Lengan 21 Bahu 50 XXL Panjang 75 Dada 116 Lengan 22 Bahu 51  Jika anda tidak yakin dengan ukurannya, anda dapat menghubungi asisten layanan pelanggan untuk berkonsultasi. Pengukuran manual dengan +- 1-3 cm dalam range normal  [Tentang Logistik] Barang akan dikirim dalam waktu 48 jam setelah melakukan pemesanan.  [Pesan tanpa khawatir] - Ikuti toko untuk diskon lebih banyak.  - Jika gambarnya bagus, Anda dapat menghubungi layanan pelanggan obrolan untuk menerima kupon diskon.  [Petunjuk pencucian] - Disarankan untuk mencuci produk dengan tangan, jangan memasukkannya ke dalam mesin cuci. - Harap cuci pakaian berwarna gelap secara terpisah dari pakaian berwarna terang. - Untuk menghindari perubahan warna dan memudar, jangan menyentuh sinar matahari yang kuat.', 'S00009', '2', '66'),
('PR00030', 'Kemeja Polos Pria Slimfit Panjang Maroon Putih Hitam Navy Abu muda abu Tua Biru Softblue', '30000', 'Kemeja_Polos_Pria_Slimfit_Panjang_Maroon_Putih_Hitam_Navy_Abu_muda_abu_Tua_Biru_Softblue_2023-12-20_gambar14.jpeg', 'Kemeja_Polos_Pria_Slimfit_Panjang_Maroon_Putih_Hitam_Navy_Abu_muda_abu_Tua_Biru_Softblue_2023-12-20_gambar24.jpeg', 'Kemeja_Polos_Pria_Slimfit_Panjang_Maroon_Putih_Hitam_Navy_Abu_muda_abu_Tua_Biru_Softblue_2023-12-20_gambar34.jpeg', 'Kemeja_Polos_Pria_Slimfit_Panjang_Maroon_Putih_Hitam_Navy_Abu_muda_abu_Tua_Biru_Softblue_2023-12-20_gambar44.jpeg', 'Kemeja_Polos_Pria_Slimfit_Panjang_Maroon_Putih_Hitam_Navy_Abu_muda_abu_Tua_Biru_Softblue_2023-12-20_gambar54.jpeg', 'Matterial bahan OXFORD dan katun poplin  Adem tidak mudah kusut  Kualitas import matterial bahan   SIZE STANDAR INDONESIA Dimensi ukuran  size M lebar dada 50cm panjang baju 70cm lingkar badan 100cm  size L lebar dada 52cm panjang baju 72cm lingkar badan 104cm  size XL lebar dada 54cm panjang baju 74cm lingkar badan 108cm  FULL ACSESORIS ADA MERK DISAKU..   NB : TOLERANSI SIZE 1 cm   Polos dan simple model kerah ada variasi kancing kecil dan ada saku sebelah kiri ada merknya  Banyak Variasi warna ', 'S00014', '3', '55'),
('PR00033', 'CIVILIAN HAT', '12000', 'CIVILIAN_HAT_2023-12-20_gambar1.jpeg', 'CIVILIAN_HAT_2023-12-20_gambar2.jpeg', 'CIVILIAN_HAT_2023-12-20_gambar3.jpeg', 'CIVILIAN_HAT_2023-12-20_gambar4.jpeg', 'CIVILIAN_HAT_2023-12-20_gambar5.jpeg', 'Fungsional dan nyaman, topi bucket Civilian melindungi Anda dari paparan sinar matahari saat Anda beraktivitas di luar ruang. Terbuat dari bahan Nylon 100% yang dilengkapi sistem ventilasi dengan teknologi laser cutting pada kedua sisi, topi ini memberikan sirkulasi udara yang lebih baik ketika dipakai dalam cuaca panas sekali pun.  Material: 100% Nylon  Fitur:  Topi dengan model bucket  Sablon logo Eiger dengan teknik High-Density  Adjuster elastis pada bagian belakang  Sistem ventilasi menggunakan teknologi laser cutting  Sweatband pada bagian depan  Terbuat dari bahan Nylon 100%  Technology: Tropic Repellent, Tropic Vent', 'S00075', '4', '200'),
('PR00034', 'Topi Rimba - Thanksom - Bucket Hiking -Bucket Camping - Topi Mancing - Bucket Santai', '40000', 'Topi_Rimba_-_Thanksom_-_Bucket_Hiking_-Bucket_Camping_-_Topi_Mancing_-_Bucket_Santai_2023-12-20_gambar1.jpeg', 'Topi_Rimba_-_Thanksom_-_Bucket_Hiking_-Bucket_Camping_-_Topi_Mancing_-_Bucket_Santai_2023-12-20_gambar2.jpeg', 'Topi_Rimba_-_Thanksom_-_Bucket_Hiking_-Bucket_Camping_-_Topi_Mancing_-_Bucket_Santai_2023-12-20_gambar3.jpeg', 'Topi_Rimba_-_Thanksom_-_Bucket_Hiking_-Bucket_Camping_-_Topi_Mancing_-_Bucket_Santai_2023-12-20_gambar4.jpeg', 'Topi_Rimba_-_Thanksom_-_Bucket_Hiking_-Bucket_Camping_-_Topi_Mancing_-_Bucket_Santai_2023-12-20_gambar5.jpeg', 'Detail produk dari ( COD ) NEW Produk/ pusat topi Termurah/ Topi Rimba Thanksinsomnia/Topi Hiking/Topi Camping * Staylist * bahan Kain Marsoto ( nyaman/tebal/halus) * top Product * best seller * Ada Tali * Pengirimannya cepat * bisa bayar ditempat * harga merakyat * hasil poto sendiri * ready stock * 100% berkualitas dan nyaman * kemungkinan ada perbedaan warna sedikit karena pencahayaan pada foto * bisa COD', 'S00075', '4', '126'),
('PR00039', 'Dini Pants HIGH WAIST CELANA BAHAN CELANA WANITA TERLARIS KEKINIAN MUSLIMAH', '40000', 'Dini_Pants_HIGH_WAIST_CELANA_BAHAN_CELANA_WANITA_TERLARIS_KEKINIAN_MUSLIMAH_2023-12-20_gambar1.jpeg', 'Dini_Pants_HIGH_WAIST_CELANA_BAHAN_CELANA_WANITA_TERLARIS_KEKINIAN_MUSLIMAH_2023-12-20_gambar2.jpeg', 'Dini_Pants_HIGH_WAIST_CELANA_BAHAN_CELANA_WANITA_TERLARIS_KEKINIAN_MUSLIMAH_2023-12-20_gambar3.jpeg', 'Dini_Pants_HIGH_WAIST_CELANA_BAHAN_CELANA_WANITA_TERLARIS_KEKINIAN_MUSLIMAH_2023-12-20_gambar4.jpeg', 'Dini_Pants_HIGH_WAIST_CELANA_BAHAN_CELANA_WANITA_TERLARIS_KEKINIAN_MUSLIMAH_2023-12-20_gambar5.jpeg', ' Celana Dini Pants   Tersedia 11 Varian Warna : Hitam Pink Coksu Putih Maroon Army Mustard Navy Ungu Lilac Sage Green Abu  Rincian Produk : * Ukuran : All Size * LP         : 90 CM * PJ         : 99 CM * Bahan  : CREPE  Tidak ada Saku/Kantong  Warna Sesuai Foto, Ketidaksesuaian Akibat Efek Cahaya   Produk Ready Stock dan Siap Di Kirim  Kemiripan produk 95% dengan gambar  Bahan Adem & Nyaman Di Pakai   Tampil Fashionable dan Kekinian Dengan Harga Bersahabat  1 Kg Muat : 5 Pcs', 'S00087', '5', '223'),
('PR00040', 'Celana Chino Panjang Pria Slimfit Premium Cotton Twill Stretch', '95000', 'Celana_Chino_Panjang_Pria_Slimfit_Premium_Cotton_Twill_Stretch_2023-12-20_gambar1.jpeg', 'Celana_Chino_Panjang_Pria_Slimfit_Premium_Cotton_Twill_Stretch_2023-12-20_gambar2.jpeg', 'Celana_Chino_Panjang_Pria_Slimfit_Premium_Cotton_Twill_Stretch_2023-12-20_gambar3.jpeg', 'Celana_Chino_Panjang_Pria_Slimfit_Premium_Cotton_Twill_Stretch_2023-12-20_gambar4.jpeg', 'Celana_Chino_Panjang_Pria_Slimfit_Premium_Cotton_Twill_Stretch_2023-12-20_gambar5.jpeg', 'Ready Warna  Cream 27-38 Hitam 27-38 Mocca 27-38 Grey /Abu 27-38  2 kantong saku disamping dan 2 kantong saku dibelakang Detail Saku belakang model pendam (bukan tempel) Silahkan pilih sesuai selera anda.  Bingung memilih ukuran Size? Takut kebesaran apalagi kekecilan? Jangan khawatir ikuti pentunjuk  menentukan ukuran celana dibawah ini', 'S00024', '5', '87'),
('PR00042', 'Sepatu Wanita Sneakers Casual Sportsme JD 03', '50000', 'Sepatu_Wanita_Sneakers_Casual_Sportsme_JD_03_2023-12-20_gambar1.jpeg', 'Sepatu_Wanita_Sneakers_Casual_Sportsme_JD_03_2023-12-20_gambar2.jpeg', 'Sepatu_Wanita_Sneakers_Casual_Sportsme_JD_03_2023-12-20_gambar3.jpeg', 'Sepatu_Wanita_Sneakers_Casual_Sportsme_JD_03_2023-12-20_gambar4.jpeg', 'Sepatu_Wanita_Sneakers_Casual_Sportsme_JD_03_2023-12-20_gambar5.jpeg', 'PRODUCT BY DIVA STORE OFFICIAL SHOP  Detail produk: Bahan          : sintetis out sole      : pvc ready size  : 37-40  size chart 36 = 22.5 - 23cm  37 = 23 - 23.5cm  38 = 23.5 - 24cm  39 = 24 - 24.5cm  40 = 24.5 - 25cm   toleransi kesalahan +/-0.5-1 cm    Mengenai Ukuran: Selisih 0.5-1 cm mungkin terjadi dikarenakan proses pengembangan dan produksi. Mengenai Warna: Warna sesungguhnya mungkin dapat berbeda. Hal ini dikarenakan setiap layar memiliki kemampuan yang berbeda-beda untuk menampilkan warna, kami tidak dapat menjamin bahwa warna yang Anda lihat adalah warna akurat dari produk tersebut.', 'S00076', '4', '62');
INSERT INTO `tbl_produk` (`id_produk`, `nama`, `harga`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `deskripsi`, `id_kategori`, `berat`, `stok`) VALUES
('PR00043', 'Sepatu Sneakers Sport Wanita Bahan Rajut Women Shoes Casual 37-40 - 0017', '60000', 'Sepatu_Sneakers_Sport_Wanita_Bahan_Rajut_Women_Shoes_Casual_37-40_-_0017_2023-12-20_gambar1.jpeg', 'Sepatu_Sneakers_Sport_Wanita_Bahan_Rajut_Women_Shoes_Casual_37-40_-_0017_2023-12-20_gambar2.jpeg', 'Sepatu_Sneakers_Sport_Wanita_Bahan_Rajut_Women_Shoes_Casual_37-40_-_0017_2023-12-20_gambar3.jpeg', 'Sepatu_Sneakers_Sport_Wanita_Bahan_Rajut_Women_Shoes_Casual_37-40_-_0017_2023-12-20_gambar4.jpeg', 'Sepatu_Sneakers_Sport_Wanita_Bahan_Rajut_Women_Shoes_Casual_37-40_-_0017_2023-12-20_gambar5.jpeg', 'PRODUK READY SESUAI VARIASI YANG BISA DI KLIK  Packaging Menggunakan Kotak Sepatu  Bahan : Rajut Tinggi Hak : 3 cm Jenis : Sneakers Wanita Tali Import Berat : 545 Gram / Pasang Warna : SESUAI VARIASI Size : 37 / 38 / 39 / 40  Size Insole : Size 37 = Panjang Alas 23 cm Size 38 = Panjang Alas 23,5 cm Size 39 = Panjang Alas 24 cm Size 40 = Panjang Alas 24,5 cm  CEK DAHULU SEBELUM MEMESAN, KAMI TIDAK MENERIMA SISIPAN PERGANTIAN MODEL, WARNA, SIZE, NAMA PENERIMA, NO HP DAN ALAMAT DI CHAT ATAU CATATAN PEMBELI.  HARAP MEMBUAT VIDEO UNBOXING / VIDEO BUKA PAKET SUPAYA TIDAK TERJADI MISKOMUNIKASI APABILA BARANG YANG DITERIMA KURANG / TIDAK SESUAI. (TIDAK MENERIMA ALASAN APAPUN SEPERTI LUPA VIDEO, HP LOWBAT, DLL)  CEPAT LAMBAT NYA PAKET DITERIMA, TERGANTUNG DARI EKSPEDISI YANG DIPILIH CUSTOMER KAMI SEBAGAI PENJUAL HANYA MENGIRIMKAN PAKET SESUAI EKSPEDISI YANG TELAH DIPILIH CUSTOMER  WARNING : BACA ATURAN TOKO SEBELUM BER BELANJA DITOKO  KAMI MEMBELI = SETUJU DENGAN ATURAN TOKO KAMI', 'S00076', '4', '53'),
('PR00044', 'Sepatu Sneakers Casual Wanita Women Shoes Sporty Look PU 37-40 - 0064', '105000', 'Sepatu_Sneakers_Casual_Wanita_Women_Shoes_Sporty_Look_PU_37-40_-_0064_2023-12-20_gambar1.jpeg', 'Sepatu_Sneakers_Casual_Wanita_Women_Shoes_Sporty_Look_PU_37-40_-_0064_2023-12-20_gambar2.jpeg', 'Sepatu_Sneakers_Casual_Wanita_Women_Shoes_Sporty_Look_PU_37-40_-_0064_2023-12-20_gambar3.jpeg', 'Sepatu_Sneakers_Casual_Wanita_Women_Shoes_Sporty_Look_PU_37-40_-_0064_2023-12-20_gambar4.jpeg', 'Sepatu_Sneakers_Casual_Wanita_Women_Shoes_Sporty_Look_PU_37-40_-_0064_2023-12-20_gambar5.jpeg', 'PRODUK READY SESUAI VARIASI YANG BISA DI KLIK  Packaging Menggunakan Kotak Sepatu  Bahan : Sintetis Tinggi Hak : 3 cm Jenis : Sneakers Wanita Tali Import Berat : 625 Gram / Pasang Warna : PINKBLUE / WHITEPINK Size : 36 / 37 / 38 / 39 / 40 /41  Size Insole : Size 36 = Panjang Alas 22 cm Size 37 = Panjang Alas 22,5 cm Size 38 = Panjang Alas 23 cm Size 39 = Panjang Alas 23,5 cm Size 40 = Panjang Alas 24 cm Size 41 = Panjang Alas 24,5 cm  \" Untuk model sepatu ini sizenya LEBIH KECIL dari ukuran biasanya ya kak ,kami menyarankan untuk menaikkan 1 size dari yang biasa dipakai \"  CEK DAHULU SEBELUM MEMESAN, KAMI TIDAK MENERIMA SISIPAN PERGANTIAN MODEL, WARNA, SIZE, NAMA PENERIMA, NO HP DAN ALAMAT DI CHAT ATAU CATATAN PEMBELI.  HARAP MEMBUAT VIDEO UNBOXING / VIDEO BUKA PAKET SUPAYA TIDAK TERJADI MISKOMUNIKASI APABILA BARANG YANG DITERIMA KURANG / TIDAK SESUAI. (TIDAK MENERIMA ALASAN APAPUN SEPERTI LUPA VIDEO, HP LOWBAT, DLL)  CEPAT LAMBAT NYA PAKET DITERIMA, TERGANTUNG DARI EKSPEDISI YANG DIPILIH CUSTOMER KAMI SEBAGAI PENJUAL HANYA MENGIRIMKAN PAKET SESUAI EKSPEDISI YANG TELAH DIPILIH CUSTOMER  WARNING : BACA ATURAN TOKO SEBELUM BER BELANJA DITOKO  KAMI MEMBELI = SETUJU DENGAN ATURAN TOKO KAMI', 'S00076', '4', '134'),
('PR00045', 'Sepatu Sneakers Wanita Women Shoes Casual Sporty Anti Slip PU 37-40 - 0024', '105000', 'Sepatu_Sneakers_Wanita_Women_Shoes_Casual_Sporty_Anti_Slip_PU_37-40_-_0024_2023-12-20_gambar1.jpeg', 'Sepatu_Sneakers_Wanita_Women_Shoes_Casual_Sporty_Anti_Slip_PU_37-40_-_0024_2023-12-20_gambar2.jpeg', 'Sepatu_Sneakers_Wanita_Women_Shoes_Casual_Sporty_Anti_Slip_PU_37-40_-_0024_2023-12-20_gambar3.jpeg', 'Sepatu_Sneakers_Wanita_Women_Shoes_Casual_Sporty_Anti_Slip_PU_37-40_-_0024_2023-12-20_gambar4.jpeg', 'Sepatu_Sneakers_Wanita_Women_Shoes_Casual_Sporty_Anti_Slip_PU_37-40_-_0024_2023-12-20_gambar5.jpeg', 'PRODUK READY SESUAI VARIASI YANG BISA DI KLIK  Packaging Menggunakan Kotak Sepatu  Bahan : Sintetis Jenis : Sneakers Wanita Tali Import Berat : 795 Gram / Pasang Warna : SESUAI VARIASI Size : 37 / 38 / 39 / 40  Size Insole : Size 37 = Panjang Alas 23,5 cm Size 38 = Panjang Alas 24 cm Size 39 = Panjang Alas 24,5 cm Size 40 = Panjang Alas 25 cm  CEK DAHULU SEBELUM MEMESAN, KAMI TIDAK MENERIMA SISIPAN PERGANTIAN MODEL, WARNA, SIZE, NAMA PENERIMA, NO HP DAN ALAMAT DI CHAT ATAU CATATAN PEMBELI.  HARAP MEMBUAT VIDEO UNBOXING / VIDEO BUKA PAKET SUPAYA TIDAK TERJADI MISKOMUNIKASI APABILA BARANG YANG DITERIMA KURANG / TIDAK SESUAI. (TIDAK MENERIMA ALASAN APAPUN SEPERTI LUPA VIDEO, HP LOWBAT, DLL)  CEPAT LAMBAT NYA PAKET DITERIMA, TERGANTUNG DARI EKSPEDISI YANG DIPILIH CUSTOMER KAMI SEBAGAI PENJUAL HANYA MENGIRIMKAN PAKET SESUAI EKSPEDISI YANG TELAH DIPILIH CUSTOMER  WARNING : BACA ATURAN TOKO SEBELUM BER BELANJA DITOKO  KAMI MEMBELI = SETUJU DENGAN ATURAN TOKO KAMI', 'S00076', '4', '42'),
('PR00046', 'Sepatu Sneakers Canvas Casual Wanita Model Low 37-40 - 1276', '105000', 'Sepatu_Sneakers_Canvas_Casual_Wanita_Model_Low_37-40_-_1276_2023-12-20_gambar1.jpeg', 'Sepatu_Sneakers_Canvas_Casual_Wanita_Model_Low_37-40_-_1276_2023-12-20_gambar2.jpeg', 'Sepatu_Sneakers_Canvas_Casual_Wanita_Model_Low_37-40_-_1276_2023-12-20_gambar3.jpeg', 'Sepatu_Sneakers_Canvas_Casual_Wanita_Model_Low_37-40_-_1276_2023-12-20_gambar4.jpeg', 'Sepatu_Sneakers_Canvas_Casual_Wanita_Model_Low_37-40_-_1276_2023-12-20_gambar5.jpeg', 'PRODUK READY SESUAI VARIASI YANG BISA DI KLIK  Packaging Menggunakan KOTAK SEPATU   Bahan : Kanvas Tinggi Hak : 3 cm Jenis : Sneakers Wanita Tali Import Berat : 710 Gram / Pasang Warna : SESUAI VARIASI Size : 37 / 38 / 39 / 40  Size Insole : Size 37 = Panjang Alas 23,5 cm Size 38 = Panjang Alas 24 cm Size 39 = Panjang Alas 24,5 cm Size 40 = Panjang Alas 25 cm  CEK DAHULU SEBELUM MEMESAN, KAMI TIDAK MENERIMA SISIPAN PERGANTIAN MODEL, WARNA, SIZE, NAMA PENERIMA, NO HP DAN ALAMAT DI CHAT ATAU CATATAN PEMBELI.  HARAP MEMBUAT VIDEO UNBOXING / VIDEO BUKA PAKET SUPAYA TIDAK TERJADI MISKOMUNIKASI APABILA BARANG YANG DITERIMA KURANG / TIDAK SESUAI. (TIDAK MENERIMA ALASAN APAPUN SEPERTI LUPA VIDEO, HP LOWBAT, DLL)  CEPAT LAMBAT NYA PAKET DITERIMA, TERGANTUNG DARI EKSPEDISI YANG DIPILIH CUSTOMER KAMI SEBAGAI PENJUAL HANYA MENGIRIMKAN PAKET SESUAI EKSPEDISI YANG TELAH DIPILIH CUSTOMER  WARNING : BACA ATURAN TOKO SEBELUM BER BELANJA DITOKO  KAMI MEMBELI = SETUJU DENGAN ATURAN TOKO KAMI', 'S00076', '4', '85'),
('PR00047', 'tes', '400', 'tes_2023-12-24_gambar1.jpeg', 'tes_2023-12-24_gambar2.jpeg', 'tes_2023-12-24_gambar3.jpeg', 'tes_2023-12-24_gambar4.jpeg', 'tes_2023-12-24_gambar5.jpeg', 'Kaos distro Native8 model casual dengan desain yang beragam, unik dan berbeda dengan yang lain.\r\nMenggunakan bahan katun yang berkualitas tinggi, nyaman dipakai untuk melengkapi hari harimu.\r\n\r\n- Kain :  Cotton combed 30s, Supersoft, Gramasi : 145 gr (bukan 24s ya!!)\r\n- Sablon:   Plastisol High Density (Tidak pecah walau di cuci berkali kali.)\r\n- Jahitan standar distro Bandung,  Overdeck kumis, jahitan pundak dirantai. Cocok dipakai laki-laki atau perempuan.\r\n- Full hangtag\r\n- Perbedaan Warna produk dengan display pada settingan layar monitor anda dapat terjadi.\r\n', 'S00010', '10', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `atas_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '3012930139', 'boboit'),
(2, 'BCA', '84883838389', 'BOBIY');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_produk` varchar(35) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci`, `no_order`, `id_produk`, `qty`) VALUES
(1, '20231025NQHFQYKG', 'PR00005', 20),
(2, '20231025NQHFQYKG', 'PR00011', 1),
(3, '20231025NQHFQYKG', 'PR00016', 1),
(4, '20231025WB4F0E6R', 'PR00005', 20),
(5, '20231025WB4F0E6R', 'PR00011', 1),
(6, '20231025WB4F0E6R', 'PR00016', 1),
(7, '20231025MI2CQFWN', 'PR00011', 1),
(8, '20231025MI2CQFWN', 'PR00016', 1),
(9, '20231025N6SAD2LD', 'PR00011', 1),
(10, '20231025N6SAD2LD', 'PR00016', 1),
(11, '20231025HHOM3D6U', 'PR00005', 1),
(12, '202310265XGADGCW', 'PR00001', 6),
(13, '202310269ZGIBKXL', 'PR00001', 3),
(14, '20231026KWVFTMQY', 'PR00001', 3),
(15, '20231027LXBHMAYC', 'PR00002', 11),
(16, '20231027X3NAJKCQ', 'PR00002', 2),
(17, '20231027Z3SDUDVA', 'PR00002', 1),
(18, '20231027JNKSAGET', 'PR00002', 20),
(19, '202310276DTZMUPV', 'PR00002', 1),
(20, '20231028HEIYGYDK', 'PR00002', 1),
(21, '20231028L5WVFALP', 'PR00002', 25),
(22, '20231029UMYLMGVZ', 'PR00003', 2),
(23, '20231030W6MTM4RC', 'PR00001', 5),
(24, '20231030W6MTM4RC', 'PR00006', 3),
(25, '202310315FEDWHBR', 'PR00037', 4),
(26, '202310315FEDWHBR', 'PR00027', 27),
(27, '202310315FEDWHBR', 'PR00004', 7),
(28, '202311153RMLJGCB', 'PR00007', 4),
(29, '20231116MADSNFXB', 'PR00001', 2),
(30, '20231116MADSNFXB', 'PR00006', 3),
(31, '20231118QELEHMVR', 'PR00006', 20),
(32, '20231118QELEHMVR', 'PR00005', 20),
(33, '20231118QELEHMVR', 'PR00014', 20),
(34, '20231120MRDEDU9Y', 'PR00002', 5),
(35, '20231121HMTBX04D', 'PR00003', 5),
(36, '20231121APRBHWNN', 'PR00001', 10),
(37, '202311276ULYKJOY', 'PR00002', 2),
(38, '20231127SNPBE8JL', 'PR00002', 10),
(39, '20231127SNPBE8JL', 'PR00002', 1),
(40, '20231127SNPBE8JL', 'PR00002', 10),
(41, '20231127SNPBE8JL', 'PR00012', 5),
(42, '20231215NWHI7IDJ', 'PR00006', 3),
(43, '20231215NWHI7IDJ', 'PR00001', 11),
(44, '20231215NWHI7IDJ', 'PR00012', 9),
(45, '2023121743QNVKJC', 'PR00006', 10),
(46, '2023121743QNVKJC', 'PR00001', 10),
(47, '20231218PIS9BJZC', 'PR00001', 2),
(48, '20231218PIS9BJZC', 'PR00001', 7),
(49, '20231218PIS9BJZC', 'PR00006', 7),
(50, '20231221WSTYNREA', 'PR00024', 1),
(51, '20231221WSTYNREA', 'PR00007', 1),
(52, '20231221WSTYNREA', 'PR00034', 1),
(53, '20231221WSTYNREA', 'PR00008', 1),
(54, '20231227FMSCL6DL', 'PR00028', 17),
(55, '20240410R9PZSYUV', 'PR00007', 9),
(56, '20250501KJZABCAS', 'PR00020', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `alamat_toko` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telepon`) VALUES
(1, 'SHOPEASY ', 160, 'JL.PB SUDIRMAN ', '0895351987');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `id` varchar(15) NOT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `hp_penerima` varchar(15) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `exspedisi` varchar(50) DEFAULT NULL,
  `berat` varchar(50) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id`, `no_order`, `tgl_order`, `nama_penerima`, `hp_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `exspedisi`, `berat`, `paket`, `estimasi`, `ongkir`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(20, '4', '20231027Z3SDUDVA', '2023-10-27', '5', '5', 'Bangka Belitung', 'Bangka Selatan', '5', '55', 'jne', '100', 'REG', '2-3 Hari', 59000, 20000, 79000, 1, 'kaos26.jpeg', 'aboy', 'MANDIRI', '123765', 0, NULL),
(21, '4', '20231027JNKSAGET', '2023-10-27', '90', '90', 'Kalimantan Barat', 'Landak', '90', '90', 'tiki', '2000', 'REG', '3 Hari', 124000, 400000, 524000, 1, 'kaosslide3.png', 'coba', 'coba', '654321', 2, '7777evis'),
(22, '4', '202310276DTZMUPV', '2023-10-27', '7', '7', 'Kalimantan Timur', 'Kutai Kartanegara', '7', '7', 'pos', '100', 'Pos Reguler', '6 HARI Hari', 49000, 20000, 69000, 1, 'kaos31.jpeg', 'bapao', 'BRI', '83838319', 0, NULL),
(23, '4', '20231028HEIYGYDK', '2023-10-28', 'bobiiyy', '0899198988', 'Jawa Timur', 'Blitar', 'gambirono', '09090909', 'tiki', '100', 'REG', '3 Hari', 15000, 20000, 35000, 1, 'kaosslide11.png', 'abiyy', 'BCA', '908981898', 3, 'SANZZ123'),
(24, '6', '20231028L5WVFALP', '2023-10-28', 'KIBOY', '0858378929', 'Jawa Timur', 'Bondowoso', 'JL PB SUDIRMAN NO.53', '12', 'pos', '2500', 'Pos Nextday', '1 HARI Hari', 39000, 500000, 539000, 1, 'kaos2.png', 'BAPAO', 'BRI', '1324', 3, 'MAAP123'),
(25, '2', '20231029UMYLMGVZ', '2023-10-29', 'tes1', '089900099', 'Jawa Tengah', 'Cilacap', 'gambirono', '404', 'tiki', '20', 'ECO', '4 Hari', 16000, 64000000, 64016000, 1, '4e281e6e3f474decac496f1ea1b4900f.jpg', 'saya', 'MANDIRI', '54321', 2, 'QTY'),
(26, '6', '20231030W6MTM4RC', '2023-10-30', 'bobiiyy', '08988787', 'DKI Jakarta', 'Jakarta Pusat', 'gambirono', '9098', 'pos', '80', 'Pos Reguler', '2 HARI Hari', 14000, 106000000, 106014000, 1, '4e281e6e3f474decac496f1ea1b4900f1.jpg', 'coba', 'BRI', '321', 2, '5555'),
(27, '6', '202310315FEDWHBR', '2023-10-31', 'bobiiyy', '45453453453345', 'Bangka Belitung', 'Bangka Barat', 'gambirono', '123', 'jne', '380', 'OKE', '3-6 Hari', 51000, 9560000, 9611000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(28, '6', '202311153RMLJGCB', '2023-11-15', 'bob', '90900909909', 'Jawa Tengah', 'Batang', 'gambirono', '90', 'jne', '40', 'OKE', '3-6 Hari', 19000, 2400000, 2419000, 1, '09c8ab7a37f5694c3374bb08c8a93fb6.jpg', 'bobiyyyy', 'bca', '080808', 2, '8888'),
(29, '6', '20231116MADSNFXB', '2023-11-16', 'TAZZ', '08998989890', 'Papua', 'Merauke', 'gambirono', '7777', 'pos', '50', 'Pos Reguler', '5 HARI Hari', 122000, 46000000, 46122000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(30, '6', '20231118QELEHMVR', '2023-11-18', 'sanz', '0899129182', 'Papua', 'Merauke', 'bangsalsari', '90909', 'tiki', '800', 'REG', '4 Hari', 145000, 681000000, 681145000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(31, '6', '20231120MRDEDU9Y', '2023-11-20', 'subaweh', '0892891291829', 'Banten', 'Lebak', 'gambirono', '743284', 'tiki', '50', 'ECO', '5 Hari', 28000, 250000, 278000, 1, 'sepatu_03.jpg', 'bobby', 'BCA', '08976', 3, '44445'),
(32, '6', '20231121HMTBX04D', '2023-11-21', 'mahbub', '0989898808', 'Banten', 'Pandeglang', 'gambirono', '80808', 'tiki', '50', 'ECO', '5 Hari', 26000, 450000, 476000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(33, '8', '20231121APRBHWNN', '2023-11-21', 'mmm', '989898980980', 'Lampung', 'Lampung Selatan', 'gambirono', '66', 'tiki', '100', 'ECO', '5 Hari', 35000, 550000, 585000, 1, '4e281e6e3f474decac496f1ea1b4900f2.jpg', 'bobiyy', 'MANDIRI', '90909', 3, '123'),
(34, '6', '202311276ULYKJOY', '2023-11-27', 'a', '0899198988', 'Banten', 'Lebak', 'gambirono', 'a', 'pos', '20', 'Pos Reguler', '3 HARI Hari', 22000, 130000, 152000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(35, '6', '20231127SNPBE8JL', '2023-11-27', 'mahbubil', '089927329', 'Jawa Tengah', 'Grobogan', 'bangsalsari', '345', 'pos', '260', 'Pos Kargo', '7-14 HARI Hari', 50000, 684800, 734800, 0, NULL, NULL, NULL, NULL, 0, NULL),
(36, '6', '20231215NWHI7IDJ', '2023-12-15', 'mahbub', '0854883488', 'Papua', 'Jayapura', 'gambirono', '8088', 'pos', '7400', 'Pos Reguler', '5 HARI Hari', 896000, 1815000, 2711000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(37, '6', '2023121743QNVKJC', '2023-12-17', 'mahbub', '0899190800', 'Gorontalo', 'Gorontalo', 'gambirono', '123', 'pos', '6500', 'Pos Ekonomi', '7-14 HARI Hari', 367500, 790000, 1157500, 1, '09c8ab7a37f5694c3374bb08c8a93fb61.jpg', 'abiyy', 'BCA', '7998800', 2, '188780'),
(38, '6', '20231218PIS9BJZC', '2023-12-18', 'mahbub', '08982828', 'DKI Jakarta', 'Jakarta Timur', 'jember', '9003', 'jne', '5350', 'YES', '1-1 Hari', 264000, 643000, 907000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(39, '6', '20231221WSTYNREA', '2023-12-21', 'fitroh ', '08918187', 'Gorontalo', 'Gorontalo', 'gambirono', '109', 'tiki', '598', 'REG', '3 Hari', 90000, 112500, 202500, 0, NULL, NULL, NULL, NULL, 0, NULL),
(40, '15', '20231227FMSCL6DL', '2023-12-27', 'bobiiyy', '45453453453345', 'Jambi', 'Merangin', 'gambirono', '123', 'pos', '34', 'Pos Reguler', '9 HARI Hari', 51500, 1530000, 1581500, 1, 'images_(1).jpeg', 'bobiyy', 'BCA', '10180', 2, '54321'),
(41, '6', '20240410R9PZSYUV', '2024-04-10', 'kjhjkh', '67890', 'Jawa Barat', 'Bandung', 'klbllbhggh', '78888', 'jne', '2250', 'REG', '1-2 Hari', 42000, 288000, 330000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(42, '25', '20250501KJZABCAS', '2025-05-01', 'sam', '089123456789', 'Jambi', 'Merangin', 'jl asd', '0910', 'pos', '1500', 'Pos Reguler', '9 HARI Hari', 103000, 500000, 603000, 1, 'cursor.png', 'sam', 'bri', '346553', 2, '98543');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `email`, `password`, `role_id`, `gambar`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$nsKQUV/YukprqVNJsULnDevdlVSe//aacVFTbHi5kwqouFWlldVs2', 1, '1'),
(6, 'bobiysanzz', 'bobiy@gmail.com', '$2y$10$yJQBO0dbgz730ikeFy3Beu.SE.nc91.4mUrM27FCDPx4iw1U.VuiS', 2, './assets/gambaruser/user.jpg'),
(18, 'mahbubgofur0123', 'mahbubilgofur@gmail.com', '$2y$10$9OWtsizOCtztNNPrGncTJekVz9sWYvVQjYvVcH8gi2tn99VjMriEy', 2, './gambar_user/user_0.jpg'),
(21, 'zerohero090', 'zero@gmail.com', '$2y$10$3HOhOcNMlWBGbUTCJoVo8uTPb8VYa7UIlUlF/OTYBu2dZiTkRUm6G', 2, 'user_21.jpg'),
(22, 'branz', 'branz@gmail.com', '$2y$10$cm0KwXQi84F0meSXMEMuHOW8kWAbDPxtTRwIGlhlIGG/HUeF7bKkS', 2, './gambar_user/user_22.jpg'),
(23, 'abub', 'abub@gmail.com', '$2y$10$4U5UtfTQl/JftDAkTcKkyeGTPcVeYtbrioWg4qYA5zRN9Pv4JbBDS', 2, 'user_23.jpg'),
(24, 'aku', 'aku@gmail.com', '$2y$10$.u/fcbQwjICfVRvZhio6mO4k4whw09QB1/EJaAccm9/038ajJnY42', 2, './gambar_user/user_24.jpg'),
(25, 'nonemo', 'none111@gmail.com', '$2y$10$1xCFoQaDGt7FOLW8bRKohO88yM0KvlKLrr.MKO/IVXPekcNn4qawu', 2, './gambar_user/user_25.jpg'),
(26, 'arif s', 'arif15@gmail.com', '$2y$10$TytWhGrTiOG4o.DyroGFG.9i8gwtYwnuIIiSVLGX5FFMwL74BE5Hu', 2, 'gambar_user/user.jpg'),
(27, 'pp', 'pppop1@gmail.com', '$2y$10$oHejtY6rXAHHDHDVDXjThO6L6cQTwyDwpXk5qrFxOv9BHaBlrvRjq', 2, 'gambar_user/user.jpg'),
(29, 'bobi', 'bobi13@gmail.com', '$2y$10$x1zjpFXW01ukAaV240yOAeLNGi7vpRpjCssBkFNqbg9AcNFtCkgQ2', 2, 'user_29.png'),
(30, 'ahit rama', 'uiaaaaa45@gmail.com', '$2y$10$N6SA3o7Llrc1hlSeE7nb4.GVwN8JrJVjNl1Qy8oPs/8HiRiJVoYp2', 2, '@Bruhh_soul.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_variasiproduk`
--

CREATE TABLE `tbl_variasiproduk` (
  `id_variasiproduk` varchar(25) NOT NULL,
  `id_produk` varchar(25) NOT NULL,
  `warna` varchar(25) NOT NULL,
  `ukuran` varchar(25) NOT NULL,
  `stok` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_variasiproduk`
--

INSERT INTO `tbl_variasiproduk` (`id_variasiproduk`, `id_produk`, `warna`, `ukuran`, `stok`, `gambar`, `harga`) VALUES
('VAR00001', 'PR00001', '0', '41', '5', '6575da561a486_gambar_produk.jpg', '45000'),
('VAR00002', 'PR00001', '0', '42', '5', '6575da561a486_gambar_produk.jpg', '45000'),
('VAR00003', 'PR00001', '0', '43', '5', '6575da561a486_gambar_produk.jpg', '45000'),
('VAR00004', 'PR00001', '0', '44', '5', '6575da561a486_gambar_produk.jpg', '45000'),
('VAR00005', 'PR00001', '0', '45', '5', '6575da561a486_gambar_produk.jpg', '45000'),
('VAR00006', 'PR00001', '0', '46', '5', '6575da561a486_gambar_produk.jpg', '45000'),
('VAR00007', 'PR00001', '0', '47', '10', '6575da561a486_gambar_produk.jpg', '45000'),
('VAR00008', 'PR00001', '0', '41', '5', '6575da561a486_gambar_produk.jpg', '45000'),
('VAR00009', 'PR00002', '0', '37', '122', '6580e4f87ccf2_gambar_produk.jpeg', '279000'),
('VAR00011', 'PR00002', '0', '39', '70', '6580e4f87ccf2_gambar_produk.jpeg', '279000'),
('VAR00012', 'PR00002', '0', '40', '54', '6580e4f87ccf2_gambar_produk.jpeg', '279000'),
('VAR00013', 'PR00002', '0', '41', '111', '6580e4f87ccf2_gambar_produk.jpeg', '279000'),
('VAR00014', 'PR00002', '0', '42', '144', '6580e4f87ccf2_gambar_produk.jpeg', '279000'),
('VAR00015', 'PR00002', '0', '43', '171', '6580e4f87ccf2_gambar_produk.jpeg', '279000'),
('VAR00016', 'PR00002', '0', '37', '122', '6580e4f87ccf2_gambar_produk.jpeg', '279000'),
('VAR00017', 'PR00003', 'Navy strip', '39', '101', '6580e6395b977_gambar_produk.jpeg', '100000'),
('VAR00018', 'PR00003', 'Navy strip', '41', '127', '6580e6395b977_gambar_produk.jpeg', '100000'),
('VAR00019', 'PR00003', 'Navy strip', '42', '109', '6580e6395b977_gambar_produk.jpeg', '100000'),
('VAR00020', 'PR00003', 'Navy strip', '43', '97', '6580e6395b977_gambar_produk.jpeg', '100000'),
('VAR00021', 'PR00003', 'Navy strip', '40', '101', '6580e6395b977_gambar_produk.jpeg', '100000'),
('VAR00022', 'PR00003', 'Hitam strip', '40', '45', '6580e6a78ada6_gambar_produk.jpeg', '100000'),
('VAR00023', 'PR00003', 'Hitam strip', '42', '67', '6580e6a78ada6_gambar_produk.jpeg', '100000'),
('VAR00024', 'PR00003', 'Hitam strip', '41', '45', '6580e6a78ada6_gambar_produk.jpeg', '100000'),
('VAR00025', 'PR00003', 'Abu strip', '39', '78', '6580e7074a69d_gambar_produk.jpeg', '100000'),
('VAR00026', 'PR00003', 'Abu strip', '41', '69', '6580e7074a69d_gambar_produk.jpeg', '100000'),
('VAR00027', 'PR00003', 'Abu strip', '40', '78', '6580e7074a69d_gambar_produk.jpeg', '100000'),
('VAR00028', 'PR00003', 'Maroon strip putih', '41', '114', '6580e73f3ed00_gambar_produk.jpeg', '100000'),
('VAR00029', 'PR00003', 'Maroon strip putih', '43', '135', '6580e73f3ed00_gambar_produk.jpeg', '100000'),
('VAR00030', 'PR00003', 'Maroon strip putih', '42', '114', '6580e73f3ed00_gambar_produk.jpeg', '100000'),
('VAR00031', 'PR00004', '027 abu-abu', '39', '145', '6580e896e8c5a_gambar_produk.jpeg', '458000'),
('VAR00032', 'PR00004', '027 abu-abu', '41', '124', '6580e896e8c5a_gambar_produk.jpeg', '458000'),
('VAR00033', 'PR00004', '027 abu-abu', '42', '135', '6580e896e8c5a_gambar_produk.jpeg', '458000'),
('VAR00034', 'PR00004', '027 abu-abu', '43', '129', '6580e896e8c5a_gambar_produk.jpeg', '458000'),
('VAR00035', 'PR00004', '027 abu-abu', '44', '156', '6580e896e8c5a_gambar_produk.jpeg', '458000'),
('VAR00036', 'PR00004', '027 abu-abu', '40', '145', '6580e896e8c5a_gambar_produk.jpeg', '458000'),
('VAR00037', 'PR00004', '025 hitam', '39', '145', '6580e923e2380_gambar_produk.jpeg', '458000'),
('VAR00038', 'PR00004', '025 hitam', '41', '176', '6580e923e2380_gambar_produk.jpeg', '458000'),
('VAR00039', 'PR00004', '025 hitam', '42', '129', '6580e923e2380_gambar_produk.jpeg', '458000'),
('VAR00040', 'PR00004', '025 hitam', '43', '177', '6580e923e2380_gambar_produk.jpeg', '458000'),
('VAR00041', 'PR00004', '025 hitam', '40', '145', '6580e923e2380_gambar_produk.jpeg', '458000'),
('VAR00042', 'PR00004', '025 biru', '40', '178', '6580e9ac7764f_gambar_produk.jpeg', '458000'),
('VAR00043', 'PR00004', '025 biru', '42', '117', '6580e9ac7764f_gambar_produk.jpeg', '458000'),
('VAR00044', 'PR00004', '025 biru', '43', '109', '6580e9ac7764f_gambar_produk.jpeg', '458000'),
('VAR00045', 'PR00004', '025 biru', '41', '178', '6580e9ac7764f_gambar_produk.jpeg', '458000'),
('VAR00046', 'PR00004', '027 beige', '39', '113', '6580ea189bd5e_gambar_produk.jpeg', '485000'),
('VAR00047', 'PR00004', '027 beige', '41', '132', '6580ea189bd5e_gambar_produk.jpeg', '485000'),
('VAR00048', 'PR00004', '027 beige', '42', '171', '6580ea189bd5e_gambar_produk.jpeg', '485000'),
('VAR00049', 'PR00004', '027 beige', '40', '113', '6580ea189bd5e_gambar_produk.jpeg', '485000'),
('VAR00050', 'PR00004', '027 hitam', '39', '191', '6580ea66f2498_gambar_produk.jpeg', '458000'),
('VAR00051', 'PR00004', '027 hitam', '41', '171', '6580ea66f2498_gambar_produk.jpeg', '458000'),
('VAR00052', 'PR00004', '027 hitam', '42', '198', '6580ea66f2498_gambar_produk.jpeg', '458000'),
('VAR00053', 'PR00004', '027 hitam', '43', '156', '6580ea66f2498_gambar_produk.jpeg', '458000'),
('VAR00054', 'PR00004', '027 hitam', '40', '191', '6580ea66f2498_gambar_produk.jpeg', '458000'),
('VAR00055', 'PR00005', 'Tali putih boots', '37', '139', '6580eb7698454_gambar_produk.jpeg', '125000'),
('VAR00056', 'PR00005', 'Tali putih boots', '38', '157', '6580eb7698454_gambar_produk.jpeg', '125000'),
('VAR00057', 'PR00005', 'Tali putih boots', '39', '148', '6580eb7698454_gambar_produk.jpeg', '125000'),
('VAR00058', 'PR00005', 'Tali putih boots', '40', '197', '6580eb7698454_gambar_produk.jpeg', '125000'),
('VAR00059', 'PR00005', 'Tali putih boots', '41', '171', '6580eb7698454_gambar_produk.jpeg', '125000'),
('VAR00060', 'PR00005', 'Tali putih boots', '42', '192', '6580eb7698454_gambar_produk.jpeg', '125000'),
('VAR00061', 'PR00005', 'Tali putih boots', '43', '169', '6580eb7698454_gambar_produk.jpeg', '125000'),
('VAR00062', 'PR00005', 'Tali putih boots', '36', '139', '6580eb7698454_gambar_produk.jpeg', '125000'),
('VAR00063', 'PR00005', 'Tali HITAM Pendek', '36', '119', '6580ec1468cbe_gambar_produk.jpeg', '125000'),
('VAR00064', 'PR00005', 'Tali HITAM Pendek', '38', '199', '6580ec1468cbe_gambar_produk.jpeg', '125000'),
('VAR00065', 'PR00005', 'Tali HITAM Pendek', '39', '201', '6580ec1468cbe_gambar_produk.jpeg', '125000'),
('VAR00066', 'PR00005', 'Tali HITAM Pendek', '40', '212', '6580ec1468cbe_gambar_produk.jpeg', '125000'),
('VAR00067', 'PR00005', 'Tali HITAM Pendek', '41', '190', '6580ec1468cbe_gambar_produk.jpeg', '125000'),
('VAR00068', 'PR00005', 'Tali HITAM Pendek', '42', '156', '6580ec1468cbe_gambar_produk.jpeg', '125000'),
('VAR00069', 'PR00005', 'Tali HITAM Pendek', '43', '109', '6580ec1468cbe_gambar_produk.jpeg', '125000'),
('VAR00070', 'PR00005', 'Tali HITAM Pendek', '37', '119', '6580ec1468cbe_gambar_produk.jpeg', '125000'),
('VAR00071', 'PR00005', 'Tali hitam boots', '37', '157', '6580ed5027f27_gambar_produk.jpeg', '125000'),
('VAR00072', 'PR00005', 'Tali hitam boots', '38', '146', '6580ed5027f27_gambar_produk.jpeg', '125000'),
('VAR00073', 'PR00005', 'Tali hitam boots', '39', '101', '6580ed5027f27_gambar_produk.jpeg', '125000'),
('VAR00074', 'PR00005', 'Tali hitam boots', '40', '203', '6580ed5027f27_gambar_produk.jpeg', '125000'),
('VAR00075', 'PR00005', 'Tali hitam boots', '41', '187', '6580ed5027f27_gambar_produk.jpeg', '125000'),
('VAR00076', 'PR00005', 'Tali hitam boots', '42', '145', '6580ed5027f27_gambar_produk.jpeg', '125000'),
('VAR00077', 'PR00005', 'Tali hitam boots', '43', '143', '6580ed5027f27_gambar_produk.jpeg', '125000'),
('VAR00078', 'PR00005', 'Tali hitam boots', '37', '157', '6580ed5027f27_gambar_produk.jpeg', '125000'),
('VAR00079', 'PR00005', 'Tali putih pendek', '37', '191', '6580edceb2df1_gambar_produk.jpeg', '125000'),
('VAR00080', 'PR00005', 'Tali putih pendek', '38', '178', '6580edceb2df1_gambar_produk.jpeg', '125000'),
('VAR00081', 'PR00005', 'Tali putih pendek', '39', '180', '6580edceb2df1_gambar_produk.jpeg', '125000'),
('VAR00082', 'PR00005', 'Tali putih pendek', '40', '195', '6580edceb2df1_gambar_produk.jpeg', '125000'),
('VAR00083', 'PR00005', 'Tali putih pendek', '41', '109', '6580edceb2df1_gambar_produk.jpeg', '125000'),
('VAR00084', 'PR00005', 'Tali putih pendek', '42', '200', '6580edceb2df1_gambar_produk.jpeg', '125000'),
('VAR00085', 'PR00005', 'Tali putih pendek', '43', '196', '6580edceb2df1_gambar_produk.jpeg', '125000'),
('VAR00086', 'PR00005', 'Tali putih pendek', '37', '191', '6580edceb2df1_gambar_produk.jpeg', '125000'),
('VAR00087', 'PR00006', 'Hitam fond pink', 'S', '179', '6580ef27e36a4_gambar_produk.jpeg', '21000'),
('VAR00088', 'PR00006', 'Hitam fond pink', 'L', '161', '6580ef27e36a4_gambar_produk.jpeg', '24000'),
('VAR00089', 'PR00006', 'Hitam fond pink', 'XL', '176', '6580ef27e36a4_gambar_produk.jpeg', '27000'),
('VAR00090', 'PR00006', 'Hitam fond pink', 'XXL', '127', '6580ef27e36a4_gambar_produk.jpeg', '30000'),
('VAR00091', 'PR00006', 'Hitam fond pink', 'M', '179', '6580ef27e36a4_gambar_produk.jpeg', '33000'),
('VAR00092', 'PR00006', 'Putih', 'S', '189', '6580f06190096_gambar_produk.jpeg', '21000'),
('VAR00093', 'PR00006', 'Putih', 'L', '181', '6580f06190096_gambar_produk.jpeg', '27000'),
('VAR00094', 'PR00006', 'Putih', 'XL', '174', '6580f06190096_gambar_produk.jpeg', '30000'),
('VAR00095', 'PR00006', 'Putih', 'XXL', '178', '6580f06190096_gambar_produk.jpeg', '21000'),
('VAR00096', 'PR00006', 'Putih', 'M', '189', '6580f06190096_gambar_produk.jpeg', '24000'),
('VAR00097', 'PR00006', 'Hitam', 'M', '139', '6580f0cb454b5_gambar_produk.jpeg', '24000'),
('VAR00098', 'PR00006', 'Hitam', 'L', '199', '6580f0cb454b5_gambar_produk.jpeg', '27000'),
('VAR00099', 'PR00006', 'Hitam', 'XL', '145', '6580f0cb454b5_gambar_produk.jpeg', '30000'),
('VAR00100', 'PR00006', 'Hitam', 'XXL', '145', '6580f0cb454b5_gambar_produk.jpeg', '33000'),
('VAR00101', 'PR00006', 'Hitam', 'S', '145', '6580f1c8cbd3d_gambar_produk.jpeg', '21000'),
('VAR00102', 'PR00007', 'Emote grey', 'M', '167', '6580f3ea86155_gambar_produk.jpeg', '32000'),
('VAR00103', 'PR00007', 'Emote grey', 'XL', '191', '6580f3ea86155_gambar_produk.jpeg', '33000'),
('VAR00104', 'PR00007', 'Emote grey', 'L', '167', '6580f3ea86155_gambar_produk.jpeg', '32000'),
('VAR00105', 'PR00007', 'Emote grey', 'L', '158', '65827f32a61aa_gambar_produk.jpeg', '39000'),
('VAR00106', 'PR00007', 'Emote grey', 'XL', '128', '65827f32a61aa_gambar_produk.jpeg', '39000'),
('VAR00107', 'PR00007', 'Emote grey', 'M', '156', '65827f32a61aa_gambar_produk.jpeg', '39000'),
('VAR00108', 'PR00007', 'Emote hitam', 'L', '137', '65827fb8d9f93_gambar_produk.jpeg', '39000'),
('VAR00109', 'PR00007', 'Emote hitam', 'XL', '110', '65827fb8d9f93_gambar_produk.jpeg', '39000'),
('VAR00110', 'PR00007', 'Emote hitam', 'M', '129', '65827fb8d9f93_gambar_produk.jpeg', '39000'),
('VAR00111', 'PR00007', 'Smile kotak mint', 'L', '171', '65828063defe9_gambar_produk.jpeg', '39000'),
('VAR00112', 'PR00007', 'Smile kotak mint', 'XL', '196', '65828063defe9_gambar_produk.jpeg', '39000'),
('VAR00113', 'PR00007', 'Smile kotak mint', 'M', '191', '65828063defe9_gambar_produk.jpeg', '39000'),
('VAR00114', 'PR00007', 'Why not putih', 'L', '135', '658280ae20638_gambar_produk.jpeg', '39000'),
('VAR00115', 'PR00007', 'Why not putih', 'XL', '129', '658280ae20638_gambar_produk.jpeg', '39000'),
('VAR00116', 'PR00007', 'Why not putih', 'M', '190', '658280ae20638_gambar_produk.jpeg', '39000'),
('VAR00117', 'PR00007', 'Cream beigh cool', 'L', '157', '65828137a3a19_gambar_produk.jpeg', '39000'),
('VAR00118', 'PR00007', 'Cream beigh cool', 'XL', '139', '65828137a3a19_gambar_produk.jpeg', '39000'),
('VAR00119', 'PR00007', 'Cream beigh cool', 'M', '198', '65828137a3a19_gambar_produk.jpeg', '39000'),
('VAR00120', 'PR00008', 'Elvndys', 'L', '110', '65828292bdc16_gambar_produk.jpeg', '25500'),
('VAR00121', 'PR00008', 'Elvndys', 'XL', '199', '65828292bdc16_gambar_produk.jpeg', '25500'),
('VAR00122', 'PR00008', 'Elvndys', 'M', '180', '65828292bdc16_gambar_produk.jpeg', '25500'),
('VAR00123', 'PR00008', 'ENEMY', 'L', '191', '658282f079bb5_gambar_produk.jpeg', '25500'),
('VAR00124', 'PR00008', 'ENEMY', 'XL', '187', '658282f079bb5_gambar_produk.jpeg', '25500'),
('VAR00125', 'PR00008', 'ENEMY', 'M', '176', '658282f079bb5_gambar_produk.jpeg', '25500'),
('VAR00126', 'PR00008', 'Edpink', 'L', '190', '658283224dc93_gambar_produk.jpeg', '25500'),
('VAR00127', 'PR00008', 'Edpink', 'XL', '201', '658283224dc93_gambar_produk.jpeg', '25500'),
('VAR00128', 'PR00008', 'Edpink', 'M', '170', '658283224dc93_gambar_produk.jpeg', '25500'),
('VAR00129', 'PR00008', 'Edblack', 'L', '190', '658283c0520b6_gambar_produk.jpeg', '25500'),
('VAR00130', 'PR00008', 'Edblack', 'XL', '229', '658283c0520b6_gambar_produk.jpeg', '25500'),
('VAR00131', 'PR00008', 'Edblack', 'M', '178', '658283c0520b6_gambar_produk.jpeg', '25500'),
('VAR00132', 'PR00008', 'Edwhite', 'L', '195', '6582840788775_gambar_produk.jpeg', '25500'),
('VAR00133', 'PR00008', 'Edwhite', 'XL', '201', '6582840788775_gambar_produk.jpeg', '25500'),
('VAR00134', 'PR00008', 'Edwhite', 'M', '156', '6582840788775_gambar_produk.jpeg', '25500'),
('VAR00135', 'PR00009', 'Mithovoly', 'L', '189', '6582859158a28_gambar_produk.jpeg', '59000'),
('VAR00136', 'PR00009', 'Mithovoly', 'XL', '192', '6582859158a28_gambar_produk.jpeg', '59000'),
('VAR00137', 'PR00009', 'Mithovoly', 'M', '209', '6582859158a28_gambar_produk.jpeg', '59000'),
('VAR00138', 'PR00009', 'Metallica', 'L', '167', '6582861250124_gambar_produk.jpeg', '59000'),
('VAR00139', 'PR00009', 'Metallica', 'XL', '127', '6582861250124_gambar_produk.jpeg', '59000'),
('VAR00140', 'PR00009', 'Metallica', 'M', '196', '6582861250124_gambar_produk.jpeg', '59000'),
('VAR00141', 'PR00009', 'Oneself', 'L', '158', '65828646dd086_gambar_produk.jpeg', '59000'),
('VAR00142', 'PR00009', 'Oneself', 'XL', '190', '65828646dd086_gambar_produk.jpeg', '59000'),
('VAR00143', 'PR00009', 'Oneself', 'M', '187', '65828646dd086_gambar_produk.jpeg', '59000'),
('VAR00144', 'PR00009', 'Perfunctory', 'L', '106', '65828689ef346_gambar_produk.jpeg', '59000'),
('VAR00145', 'PR00009', 'Perfunctory', 'XL', '198', '65828689ef346_gambar_produk.jpeg', '59000'),
('VAR00146', 'PR00009', 'Perfunctory', 'M', '178', '65828689ef346_gambar_produk.jpeg', '59000'),
('VAR00147', 'PR00010', 'Hitam Putih', 'L', '167', '658288453b0d5_gambar_produk.jpeg', '74000'),
('VAR00148', 'PR00010', 'Hitam Putih', 'XL', '147', '658288453b0d5_gambar_produk.jpeg', '74000'),
('VAR00149', 'PR00010', 'Hitam Putih', 'XLL', '174', '658288453b0d5_gambar_produk.jpeg', '74000'),
('VAR00150', 'PR00010', 'Hitam Putih', 'M', '190', '658288453b0d5_gambar_produk.jpeg', '74000'),
('VAR00151', 'PR00010', 'Maroon putih', 'L', '147', '658288ff8d1a5_gambar_produk.jpeg', '74000'),
('VAR00152', 'PR00010', 'Maroon putih', 'XL', '105', '658288ff8d1a5_gambar_produk.jpeg', '74000'),
('VAR00153', 'PR00010', 'Maroon putih', 'XLL', '192', '658288ff8d1a5_gambar_produk.jpeg', '74000'),
('VAR00154', 'PR00010', 'Maroon putih', 'M', '179', '658288ff8d1a5_gambar_produk.jpeg', '74000'),
('VAR00155', 'PR00010', 'Putih sage', 'L', '138', '6582893b79545_gambar_produk.jpeg', '74000'),
('VAR00156', 'PR00010', 'Putih sage', 'XL', '193', '6582893b79545_gambar_produk.jpeg', '74000'),
('VAR00157', 'PR00010', 'Putih sage', 'XLL', '148', '6582893b79545_gambar_produk.jpeg', '74000'),
('VAR00158', 'PR00010', 'Putih sage', 'M', '185', '6582893b79545_gambar_produk.jpeg', '74000'),
('VAR00159', 'PR00010', 'Navy putih', 'L', '194', '6582899eab2c8_gambar_produk.jpeg', '74000'),
('VAR00160', 'PR00010', 'Navy putih', 'XL', '194', '6582899eab2c8_gambar_produk.jpeg', '74000'),
('VAR00161', 'PR00010', 'Navy putih', 'XLL', '184', '6582899eab2c8_gambar_produk.jpeg', '74000'),
('VAR00162', 'PR00010', 'Navy putih', 'M', '148', '6582899eab2c8_gambar_produk.jpeg', '74000'),
('VAR00163', 'PR00010', 'Hitam hijau', 'L', '179', '65828a6f120c7_gambar_produk.jpeg', '74000'),
('VAR00164', 'PR00010', 'Hitam hijau', 'XL', '129', '65828a6f120c7_gambar_produk.jpeg', '74000'),
('VAR00165', 'PR00010', 'Hitam hijau', 'M', '188', '65828a6f120c7_gambar_produk.jpeg', '74000'),
('VAR00166', 'PR00011', 'No 1', 'L', '148', '6582f30e319cb_gambar_produk.jpeg', '60000'),
('VAR00167', 'PR00011', 'No 1', 'XL', '120', '6582f30e319cb_gambar_produk.jpeg', '60000'),
('VAR00168', 'PR00011', 'No 1', 'M', '190', '6582f30e319cb_gambar_produk.jpeg', '60000'),
('VAR00169', 'PR00011', 'No 2', 'L', '159', '6582f3444a807_gambar_produk.jpeg', '60000'),
('VAR00170', 'PR00011', 'No 2', 'XL', '203', '6582f3444a807_gambar_produk.jpeg', '60000'),
('VAR00171', 'PR00011', 'No 2', 'M', '191', '6582f3444a807_gambar_produk.jpeg', '60000'),
('VAR00172', 'PR00011', 'No 3', 'L', '180', '6582f38ec83cc_gambar_produk.jpeg', '60000'),
('VAR00173', 'PR00011', 'No 3', 'XL', '197', '6582f38ec83cc_gambar_produk.jpeg', '60000'),
('VAR00174', 'PR00011', 'No 3', 'M', '148', '6582f38ec83cc_gambar_produk.jpeg', '60000'),
('VAR00175', 'PR00011', 'No 4', 'L', '187', '6582f3d3a5d79_gambar_produk.jpeg', '60000'),
('VAR00176', 'PR00011', 'No 4', 'XL', '151', '6582f3d3a5d79_gambar_produk.jpeg', '60000'),
('VAR00177', 'PR00011', 'No 4', 'M', '159', '6582f3d3a5d79_gambar_produk.jpeg', '60000'),
('VAR00178', 'PR00011', 'No 5', 'L', '178', '6582f3ffa04cb_gambar_produk.jpeg', '60000'),
('VAR00179', 'PR00011', 'No 5', 'XL', '129', '6582f3ffa04cb_gambar_produk.jpeg', '60000'),
('VAR00180', 'PR00011', 'No 5', 'M', '170', '6582f3ffa04cb_gambar_produk.jpeg', '60000'),
('VAR00181', 'PR00012', '0', 'M', '180', '6582f4ae961a0_gambar_produk.jpeg', '130000'),
('VAR00182', 'PR00012', '0', 'L', '129', '6582f4ae961a0_gambar_produk.jpeg', '130000'),
('VAR00183', 'PR00012', '0', 'XL', '158', '6582f4ae961a0_gambar_produk.jpeg', '130000'),
('VAR00184', 'PR00012', '0', 'XXL', '149', '6582f4ae961a0_gambar_produk.jpeg', '130000'),
('VAR00186', 'PR00012', '0', 'S', '189', '6582f4ae961a0_gambar_produk.jpeg', '130000'),
('VAR00187', 'PR00012', '0', 'KAIN BAHAN 110X230CM', '100', '6582f4e88cf27_gambar_produk.jpeg', '135000'),
('VAR00188', 'PR00013', '0', 'M', '167', '6582f5f62baaf_gambar_produk.jpeg', '120000'),
('VAR00189', 'PR00013', '0', 'L', '148', '6582f5f62baaf_gambar_produk.jpeg', '120000'),
('VAR00190', 'PR00013', '0', 'XL', '139', '6582f5f62baaf_gambar_produk.jpeg', '120000'),
('VAR00191', 'PR00013', '0', 'XXL', '200', '6582f5f62baaf_gambar_produk.jpeg', '120000'),
('VAR00192', 'PR00013', '0', 'S', '180', '6582f5f62baaf_gambar_produk.jpeg', '120000'),
('VAR00193', 'PR00013', '0', 'KAIN BAHAN 110X230CM', '101', '6582f62896820_gambar_produk.jpeg', '125000'),
('VAR00194', 'PR00014', '0', 'M', '189', '6582f7533c316_gambar_produk.jpeg', '120000'),
('VAR00195', 'PR00014', '0', 'L', '179', '6582f7533c316_gambar_produk.jpeg', '120000'),
('VAR00196', 'PR00014', '0', 'XL', '101', '6582f7533c316_gambar_produk.jpeg', '120000'),
('VAR00197', 'PR00014', '0', 'XXL', '129', '6582f7533c316_gambar_produk.jpeg', '120000'),
('VAR00198', 'PR00014', '0', 'S', '128', '6582f7533c316_gambar_produk.jpeg', '120000'),
('VAR00199', 'PR00014', '0', 'KAIN BAHAN 110X230CM', '105', '6582f76f2c1a6_gambar_produk.jpeg', '125000'),
('VAR00200', 'PR00015', '0', 'M', '139', '6582f84a89e19_gambar_produk.jpeg', '130000'),
('VAR00201', 'PR00015', '0', 'L', '139', '6582f84a89e19_gambar_produk.jpeg', '130000'),
('VAR00202', 'PR00015', '0', 'XL', '158', '6582f84a89e19_gambar_produk.jpeg', '130000'),
('VAR00203', 'PR00015', '0', 'XXL', '179', '6582f84a89e19_gambar_produk.jpeg', '130000'),
('VAR00204', 'PR00015', '0', 'S', '179', '6582f84a89e19_gambar_produk.jpeg', '130000'),
('VAR00205', 'PR00016', 'Coksu straigh', 'L', '127', '6582f8d4c07d5_gambar_produk.jpeg', '75000'),
('VAR00206', 'PR00016', 'Coksu straigh', 'XL', '121', '6582f8d4c07d5_gambar_produk.jpeg', '75000'),
('VAR00207', 'PR00016', 'Coksu straigh', 'XXL', '198', '6582f8d4c07d5_gambar_produk.jpeg', '75000'),
('VAR00208', 'PR00016', 'Coksu straigh', 'M', '149', '6582f8d4c07d5_gambar_produk.jpeg', '75000'),
('VAR00209', 'PR00016', 'Army straigh', 'L', '139', '6582f933b54f9_gambar_produk.jpeg', '75000'),
('VAR00210', 'PR00016', 'Army straigh', 'XL', '139', '6582f933b54f9_gambar_produk.jpeg', '75000'),
('VAR00211', 'PR00016', 'Army straigh', 'XXL', '152', '6582f933b54f9_gambar_produk.jpeg', '75000'),
('VAR00212', 'PR00016', 'Army straigh', 'M', '100', '6582f933b54f9_gambar_produk.jpeg', '75000'),
('VAR00213', 'PR00016', 'Hitam straigh', 'L', '138', '6582f9661bbb7_gambar_produk.jpeg', '75000'),
('VAR00214', 'PR00016', 'Hitam straigh', 'XL', '129', '6582f9661bbb7_gambar_produk.jpeg', '75000'),
('VAR00215', 'PR00016', 'Hitam straigh', 'XXL', '121', '6582f9661bbb7_gambar_produk.jpeg', '75000'),
('VAR00216', 'PR00016', 'Hitam straigh', 'M', '120', '6582f9661bbb7_gambar_produk.jpeg', '75000'),
('VAR00217', 'PR00017', 'Hitam pekat', '28', '111', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00218', 'PR00017', 'Hitam pekat', '29', '178', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00219', 'PR00017', 'Hitam pekat', '30', '128', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00220', 'PR00017', 'Hitam pekat', '31', '139', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00221', 'PR00017', 'Hitam pekat', '32', '110', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00222', 'PR00017', 'Hitam pekat', '33', '179', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00223', 'PR00017', 'Hitam pekat', '34', '198', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00224', 'PR00017', 'Hitam pekat', '35', '100', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00225', 'PR00017', 'Hitam pekat', '36', '127', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00226', 'PR00017', 'Hitam pekat', '37', '101', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00227', 'PR00017', 'Hitam pekat', '38', '138', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00228', 'PR00017', 'Hitam pekat', '27', '189', '6582fa5dd4d7e_gambar_produk.jpeg', '150000'),
('VAR00229', 'PR00017', 'Cream', '28', '103', '6582faf5ca359_gambar_produk.jpeg', '150000'),
('VAR00230', 'PR00017', 'Cream', '30', '112', '6582faf5ca359_gambar_produk.jpeg', '150000'),
('VAR00231', 'PR00017', 'Cream', '31', '104', '6582faf5ca359_gambar_produk.jpeg', '150000'),
('VAR00232', 'PR00017', 'Cream', '32', '119', '6582faf5ca359_gambar_produk.jpeg', '150000'),
('VAR00233', 'PR00017', 'Cream', '33', '149', '6582faf5ca359_gambar_produk.jpeg', '150000'),
('VAR00234', 'PR00017', 'Cream', '34', '121', '6582faf5ca359_gambar_produk.jpeg', '150000'),
('VAR00235', 'PR00017', 'Cream', '38', '90', '6582faf5ca359_gambar_produk.jpeg', '150000'),
('VAR00236', 'PR00017', 'Cream', '27', '120', '6582faf5ca359_gambar_produk.jpeg', '150000'),
('VAR00237', 'PR00017', 'Mocca', '30', '103', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00238', 'PR00017', 'Mocca', '31', '171', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00239', 'PR00017', 'Mocca', '32', '130', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00240', 'PR00017', 'Mocca', '33', '138', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00241', 'PR00017', 'Mocca', '34', '140', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00242', 'PR00017', 'Mocca', '35', '120', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00243', 'PR00017', 'Mocca', '36', '149', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00244', 'PR00017', 'Mocca', '37', '129', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00245', 'PR00017', 'Mocca', '38', '138', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00246', 'PR00017', 'Mocca', '29', '179', '6582fb857aaf8_gambar_produk.jpeg', '150000'),
('VAR00247', 'PR00017', 'Abu/gray', '28', '190', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00248', 'PR00017', 'Abu/gray', '29', '189', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00249', 'PR00017', 'Abu/gray', '30', '123', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00250', 'PR00017', 'Abu/gray', '31', '190', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00251', 'PR00017', 'Abu/gray', '32', '109', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00252', 'PR00017', 'Abu/gray', '33', '139', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00253', 'PR00017', 'Abu/gray', '34', '180', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00254', 'PR00017', 'Abu/gray', '37', '180', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00255', 'PR00017', 'Abu/gray', '27', '101', '6582fc11d3215_gambar_produk.jpeg', '150000'),
('VAR00256', 'PR00018', 'Hitam', '28', '190', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00257', 'PR00018', 'Hitam', '29', '189', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00258', 'PR00018', 'Hitam', '30', '189', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00259', 'PR00018', 'Hitam', '31', '179', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00260', 'PR00018', 'Hitam', '32', '178', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00261', 'PR00018', 'Hitam', '33', '191', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00262', 'PR00018', 'Hitam', '34', '178', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00263', 'PR00018', 'Hitam', '35', '181', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00264', 'PR00018', 'Hitam', '36', '169', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00265', 'PR00018', 'Hitam', '37', '179', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00266', 'PR00018', 'Hitam', '38', '169', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00267', 'PR00018', 'Hitam', '27', '219', '6582fd01a530e_gambar_produk.jpeg', '120000'),
('VAR00268', 'PR00018', 'Grey', '28', '168', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00269', 'PR00018', 'Grey', '29', '169', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00270', 'PR00018', 'Grey', '30', '191', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00271', 'PR00018', 'Grey', '31', '179', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00272', 'PR00018', 'Grey', '31', '182', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00273', 'PR00018', 'Grey', '32', '139', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00274', 'PR00018', 'Grey', '33', '120', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00275', 'PR00018', 'Grey', '34', '131', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00276', 'PR00018', 'Grey', '35', '193', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00277', 'PR00018', 'Grey', '36', '130', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00278', 'PR00018', 'Grey', '38', '100', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00279', 'PR00018', 'Grey', '27', '179', '6582fdadb54db_gambar_produk.jpeg', '120000'),
('VAR00280', 'PR00018', 'Cream', '28', '179', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00281', 'PR00018', 'Cream', '29', '179', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00282', 'PR00018', 'Cream', '31', '109', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00283', 'PR00018', 'Cream', '32', '181', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00284', 'PR00018', 'Cream', '33', '168', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00285', 'PR00018', 'Cream', '34', '192', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00286', 'PR00018', 'Cream', '35', '103', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00287', 'PR00018', 'Cream', '36', '189', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00288', 'PR00018', 'Cream', '38', '199', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00289', 'PR00018', 'Cream', '27', '120', '6582fe1d6791f_gambar_produk.jpeg', '120000'),
('VAR00290', 'PR00018', 'Mocca', '31', '181', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00291', 'PR00018', 'Mocca', '32', '130', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00292', 'PR00018', 'Mocca', '33', '101', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00293', 'PR00018', 'Mocca', '34', '179', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00294', 'PR00018', 'Mocca', '35', '178', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00295', 'PR00018', 'Mocca', '36', '191', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00296', 'PR00018', 'Mocca', '37', '171', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00297', 'PR00018', 'Mocca', '38', '100', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00298', 'PR00018', 'Mocca', '30', '189', '6582fe8f8f9f9_gambar_produk.jpeg', '120000'),
('VAR00299', 'PR00019', 'Panjang abu', '30', '115', '6582ff7d419c3_gambar_produk.jpeg', '100000'),
('VAR00300', 'PR00019', 'Panjang abu', '31', '181', '6582ff7d419c3_gambar_produk.jpeg', '100000'),
('VAR00301', 'PR00019', 'Panjang abu', '32', '112', '6582ff7d419c3_gambar_produk.jpeg', '100000'),
('VAR00302', 'PR00019', 'Panjang abu', '33', '160', '6582ff7d419c3_gambar_produk.jpeg', '100000'),
('VAR00303', 'PR00019', 'Panjang abu', '34', '150', '6582ff7d419c3_gambar_produk.jpeg', '100000'),
('VAR00304', 'PR00019', 'Panjang abu', '29', '168', '6582ff7d419c3_gambar_produk.jpeg', '100000'),
('VAR00305', 'PR00019', 'Panjang krem', '30', '160', '6582fff92448b_gambar_produk.jpeg', '100000'),
('VAR00306', 'PR00019', 'Panjang krem', '31', '120', '6582fff92448b_gambar_produk.jpeg', '100000'),
('VAR00307', 'PR00019', 'Panjang krem', '32', '138', '6582fff92448b_gambar_produk.jpeg', '100000'),
('VAR00308', 'PR00019', 'Panjang krem', '33', '149', '6582fff92448b_gambar_produk.jpeg', '100000'),
('VAR00309', 'PR00019', 'Panjang krem', '34', '170', '6582fff92448b_gambar_produk.jpeg', '100000'),
('VAR00310', 'PR00019', 'Panjang krem', '29', '168', '6582fff92448b_gambar_produk.jpeg', '100000'),
('VAR00311', 'PR00019', 'Panjang mocca', '30', '130', '6583005d7ae42_gambar_produk.jpeg', '100000'),
('VAR00312', 'PR00019', 'Panjang mocca', '31', '149', '6583005d7ae42_gambar_produk.jpeg', '100000'),
('VAR00313', 'PR00019', 'Panjang mocca', '32', '191', '6583005d7ae42_gambar_produk.jpeg', '100000'),
('VAR00314', 'PR00019', 'Panjang mocca', '33', '101', '6583005d7ae42_gambar_produk.jpeg', '100000'),
('VAR00315', 'PR00019', 'Panjang mocca', '34', '141', '6583005d7ae42_gambar_produk.jpeg', '100000'),
('VAR00316', 'PR00019', 'Panjang mocca', '29', '147', '6583005d7ae42_gambar_produk.jpeg', '100000'),
('VAR00317', 'PR00019', 'Panjang hitam', '30', '107', '658300d0aa785_gambar_produk.jpeg', '100000'),
('VAR00318', 'PR00019', 'Panjang hitam', '31', '101', '658300d0aa785_gambar_produk.jpeg', '100000'),
('VAR00319', 'PR00019', 'Panjang hitam', '32', '190', '658300d0aa785_gambar_produk.jpeg', '100000'),
('VAR00320', 'PR00019', 'Panjang hitam', '33', '190', '658300d0aa785_gambar_produk.jpeg', '100000'),
('VAR00321', 'PR00019', 'Panjang hitam', '34', '139', '658300d0aa785_gambar_produk.jpeg', '100000'),
('VAR00322', 'PR00019', 'Panjang hitam', '29', '139', '658300d0aa785_gambar_produk.jpeg', '100000'),
('VAR00323', 'PR00019', 'Panjang army', '32', '139', '65830126a0e09_gambar_produk.jpeg', '100000'),
('VAR00324', 'PR00019', 'Panjang army', '33', '161', '65830126a0e09_gambar_produk.jpeg', '100000'),
('VAR00325', 'PR00019', 'Panjang army', '34', '179', '65830126a0e09_gambar_produk.jpeg', '100000'),
('VAR00326', 'PR00019', 'Panjang army', '31', '190', '65830126a0e09_gambar_produk.jpeg', '100000'),
('VAR00327', 'PR00020', 'Abu-abu', '29', '178', '65830240742fa_gambar_produk.jpeg', '100000'),
('VAR00328', 'PR00020', 'Abu-abu', '30', '138', '65830240742fa_gambar_produk.jpeg', '100000'),
('VAR00329', 'PR00020', 'Abu-abu', '31', '170', '65830240742fa_gambar_produk.jpeg', '100000'),
('VAR00330', 'PR00020', 'Abu-abu', '32', '113', '65830240742fa_gambar_produk.jpeg', '100000'),
('VAR00331', 'PR00020', 'Abu-abu', '33', '130', '65830240742fa_gambar_produk.jpeg', '100000'),
('VAR00332', 'PR00020', 'Abu-abu', '34', '110', '65830240742fa_gambar_produk.jpeg', '100000'),
('VAR00333', 'PR00020', 'Abu-abu', '28', '171', '65830240742fa_gambar_produk.jpeg', '100000'),
('VAR00334', 'PR00020', 'Army', '29', '116', '6583028f36711_gambar_produk.jpeg', '100000'),
('VAR00335', 'PR00020', 'Army', '30', '191', '6583028f36711_gambar_produk.jpeg', '100000'),
('VAR00336', 'PR00020', 'Army', '31', '101', '6583028f36711_gambar_produk.jpeg', '100000'),
('VAR00337', 'PR00020', 'Army', '32', '128', '6583028f36711_gambar_produk.jpeg', '100000'),
('VAR00338', 'PR00020', 'Army', '33', '194', '6583028f36711_gambar_produk.jpeg', '100000'),
('VAR00339', 'PR00020', 'Army', '34', '129', '6583028f36711_gambar_produk.jpeg', '100000'),
('VAR00340', 'PR00020', 'Army', '28', '189', '6583028f36711_gambar_produk.jpeg', '100000'),
('VAR00341', 'PR00020', 'Hitam', '29', '178', '658302efb28a4_gambar_produk.jpeg', '100000'),
('VAR00342', 'PR00020', 'Hitam', '30', '131', '658302efb28a4_gambar_produk.jpeg', '100000'),
('VAR00343', 'PR00020', 'Hitam', '31', '138', '658302efb28a4_gambar_produk.jpeg', '100000'),
('VAR00344', 'PR00020', 'Hitam', '32', '123', '658302efb28a4_gambar_produk.jpeg', '100000'),
('VAR00345', 'PR00020', 'Hitam', '28', '180', '658302efb28a4_gambar_produk.jpeg', '100000'),
('VAR00346', 'PR00020', 'Mocca', '31', '139', '6583034f8e8a7_gambar_produk.jpeg', '100000'),
('VAR00347', 'PR00020', 'Mocca', '32', '120', '6583034f8e8a7_gambar_produk.jpeg', '100000'),
('VAR00348', 'PR00020', 'Mocca', '33', '190', '6583034f8e8a7_gambar_produk.jpeg', '100000'),
('VAR00349', 'PR00020', 'Mocca', '34', '190', '6583034f8e8a7_gambar_produk.jpeg', '100000'),
('VAR00350', 'PR00020', 'Mocca', '30', '181', '6583034f8e8a7_gambar_produk.jpeg', '100000'),
('VAR00351', 'PR00020', 'Cream', '29', '178', '6583038c14c9b_gambar_produk.jpeg', '100000'),
('VAR00352', 'PR00020', 'Cream', '30', '191', '6583038c14c9b_gambar_produk.jpeg', '100000'),
('VAR00353', 'PR00020', 'Cream', '31', '157', '6583038c14c9b_gambar_produk.jpeg', '100000'),
('VAR00354', 'PR00020', 'Cream', '28', '201', '6583038c14c9b_gambar_produk.jpeg', '100000'),
('VAR00355', 'PR00021', 'Cream', 'ALLSIZE', '290', '658304c0a2dbe_gambar_produk.jpeg', '9000'),
('VAR00356', 'PR00021', 'Grey', 'ALLSIZE', '238', '6583050011581_gambar_produk.jpeg', '9000'),
('VAR00357', 'PR00021', 'Hijau army', 'ALLSIZE', '210', '6583051f596e0_gambar_produk.jpeg', '9000'),
('VAR00358', 'PR00021', 'Hijau botol', 'ALLSIZE', '200', '6583054694204_gambar_produk.jpeg', '9000'),
('VAR00359', 'PR00022', 'Black', 'ALLSIZE', '238', '658305cd25971_gambar_produk.jpeg', '100000'),
('VAR00360', 'PR00022', 'Beige', 'ALLSIZE', '278', '658305f8c016a_gambar_produk.jpeg', '100000'),
('VAR00361', 'PR00022', 'Coffee', 'ALLSIZE', '231', '658306308412c_gambar_produk.jpeg', '100000'),
('VAR00362', 'PR00022', 'Grey', 'ALLSIZE', '278', '6583065c79e54_gambar_produk.jpeg', '100000'),
('VAR00363', 'PR00022', 'Green', 'ALLSIZE', '200', '65830679cc4e1_gambar_produk.jpeg', '100000'),
('VAR00364', 'PR00023', 'abu\n', 'ALLSIZE', '238', '658308635787b_gambar_produk.jpeg', '23000'),
('VAR00365', 'PR00023', 'army', 'ALLSIZE', '271', '658308bbbebab_gambar_produk.jpeg', '23000'),
('VAR00366', 'PR00023', 'maroon', 'ALLSIZE', '283', '6583094179360_gambar_produk.jpeg', '23000'),
('VAR00367', 'PR00023', 'coklat', 'ALLSIZE', '268', '6583096d66222_gambar_produk.jpeg', '23000'),
('VAR00368', 'PR00024', 'Trasher hitam', 'ALLSIZE', '291', '65830a04f0451_gambar_produk.jpeg', '8000'),
('VAR00369', 'PR00024', 'Trasher api', 'ALLSIZE', '238', '65830a20b3731_gambar_produk.jpeg', '8000'),
('VAR00370', 'PR00024', 'Trasher api 2', 'ALLSIZE', '283', '65830a476ba1b_gambar_produk.jpeg', '8000'),
('VAR00371', 'PR00024', 'Trasher unggu', 'ALLSIZE', '287', '65830a7186564_gambar_produk.jpeg', '8000'),
('VAR00372', 'PR00025', 'Hitam', 'ALLSIZE', '279', '65830b0aac7f3_gambar_produk.jpeg', '6000'),
('VAR00373', 'PR00025', 'Cream', 'ALLSIZE', '238', '65830b63ef1cc_gambar_produk.jpeg', '6000'),
('VAR00374', 'PR00025', 'Coklat', 'ALLSIZE', '286', '65830b86215d2_gambar_produk.jpeg', '6000'),
('VAR00375', 'PR00025', 'Putih', 'ALLSIZE', '238', '65830ba165306_gambar_produk.jpeg', '6000'),
('VAR00376', 'PR00025', 'Abu', 'ALLSIZE', '221', '65830bd1d53d8_gambar_produk.jpeg', '6000'),
('VAR00377', 'PR00027', 'Hitam shadow', 'XL', '170', '65830c6d1256b_gambar_produk.jpeg', '55000'),
('VAR00378', 'PR00027', 'Hitam shadow', 'L', '179', '65830c6d1256b_gambar_produk.jpeg', '55000'),
('VAR00379', 'PR00027', 'Ethereal hitam', 'XL', '157', '65830cad93c59_gambar_produk.jpeg', '55000'),
('VAR00380', 'PR00027', 'Ethereal hitam', 'L', '187', '65830cad93c59_gambar_produk.jpeg', '55000'),
('VAR00381', 'PR00027', 'Stop talking army', 'XL', '141', '65830cd5516f1_gambar_produk.jpeg', '55000'),
('VAR00382', 'PR00027', 'Stop talking army', 'L', '147', '65830cd5516f1_gambar_produk.jpeg', '55000'),
('VAR00383', 'PR00027', 'Bad putih font hitam', 'XL', '181', '65830cf9460a5_gambar_produk.jpeg', '55000'),
('VAR00384', 'PR00027', 'Bad putih font hitam', 'L', '189', '65830cf9460a5_gambar_produk.jpeg', '55000'),
('VAR00385', 'PR00027', 'Stop talking hitam', 'XL', '156', '65830d309aace_gambar_produk.jpeg', '55000'),
('VAR00386', 'PR00027', 'Stop talking hitam', 'L', '192', '65830d309aace_gambar_produk.jpeg', '55000'),
('VAR00387', 'PR00029', 'Rugby  hitam beige', 'L', '170', '65830ee354357_gambar_produk.jpeg', '150000'),
('VAR00388', 'PR00029', 'Rugby  hitam beige', 'XL', '119', '65830ee354357_gambar_produk.jpeg', '150000'),
('VAR00389', 'PR00029', 'Rugby  hitam beige', 'M', '178', '65830ee354357_gambar_produk.jpeg', '150000'),
('VAR00390', 'PR00029', 'Vice', 'L', '185', '65830f7099ecd_gambar_produk.jpeg', '150000'),
('VAR00391', 'PR00029', 'Vice', 'XL', '157', '65830f7099ecd_gambar_produk.jpeg', '150000'),
('VAR00392', 'PR00029', 'Vice', 'M', '187', '65830f7099ecd_gambar_produk.jpeg', '150000'),
('VAR00393', 'PR00029', 'Krgjntn cream green', 'XL', '147', '65830fad31bf1_gambar_produk.jpeg', '150000'),
('VAR00394', 'PR00029', 'Krgjntn cream green', 'L', '187', '65830fad31bf1_gambar_produk.jpeg', '150000'),
('VAR00395', 'PR00029', 'Hills', 'L', '148', '65830fd8730a4_gambar_produk.jpeg', '150000'),
('VAR00396', 'PR00029', 'Hills', 'XL', '182', '65830fd8730a4_gambar_produk.jpeg', '150000'),
('VAR00397', 'PR00029', 'Hills', 'M', '189', '65830fd8730a4_gambar_produk.jpeg', '150000'),
('VAR00398', 'PR00029', 'Speedway', 'L', '128', '65831011a6487_gambar_produk.jpeg', '150000'),
('VAR00399', 'PR00029', 'Speedway', 'XL', '193', '65831011a6487_gambar_produk.jpeg', '150000'),
('VAR00400', 'PR00029', 'Speedway', 'M', '181', '65831011a6487_gambar_produk.jpeg', '150000'),
('VAR00401', 'PR00030', 'Coksu', 'L', '186', '658310c935996_gambar_produk.jpeg', '30000'),
('VAR00402', 'PR00030', 'Coksu', 'XL', '183', '658310c935996_gambar_produk.jpeg', '30000'),
('VAR00403', 'PR00030', 'Coksu', 'M', '198', '658310c935996_gambar_produk.jpeg', '30000'),
('VAR00404', 'PR00030', 'Hitam', 'L', '197', '658310fa37bb6_gambar_produk.jpeg', '30000'),
('VAR00405', 'PR00030', 'Hitam', 'XL', '126', '658310fa37bb6_gambar_produk.jpeg', '30000'),
('VAR00406', 'PR00030', 'Hitam', 'M', '174', '658310fa37bb6_gambar_produk.jpeg', '30000'),
('VAR00407', 'PR00030', 'Navi', 'L', '160', '6583118983d5e_gambar_produk.jpeg', '30000'),
('VAR00408', 'PR00030', 'Navi', 'XL', '157', '6583118983d5e_gambar_produk.jpeg', '30000'),
('VAR00409', 'PR00030', 'Navi', 'M', '165', '6583118983d5e_gambar_produk.jpeg', '30000'),
('VAR00410', 'PR00030', 'Putih', 'L', '186', '658311b800b77_gambar_produk.jpeg', '30000'),
('VAR00411', 'PR00030', 'Putih', 'XL', '164', '658311b800b77_gambar_produk.jpeg', '30000'),
('VAR00412', 'PR00030', 'Putih', 'M', '196', '658311b800b77_gambar_produk.jpeg', '30000'),
('VAR00413', 'PR00030', 'Hijau army', 'L', '172', '658311db96ab0_gambar_produk.jpeg', '30000'),
('VAR00414', 'PR00030', 'Hijau army', 'XL', '142', '658311db96ab0_gambar_produk.jpeg', '30000'),
('VAR00415', 'PR00030', 'Hijau army', 'M', '197', '658311db96ab0_gambar_produk.jpeg', '30000'),
('VAR00416', 'PR00033', 'Abu', 'ALLSIZE', '164', '65831349d7390_gambar_produk.jpeg', '12000'),
('VAR00417', 'PR00033', 'Krem tua', 'ALLSIZE', '186', '6583139ff1a19_gambar_produk.jpeg', '12000'),
('VAR00418', 'PR00034', 'Hitam', 'ALLSIZE', '164', '6583143018de6_gambar_produk.jpeg', '40000'),
('VAR00419', 'PR00034', 'Coklat', 'ALLSIZE', '175', '65831472b2a0a_gambar_produk.jpeg', '40000'),
('VAR00420', 'PR00034', 'Hijau army', 'ALLSIZE', '186', '65831488048dc_gambar_produk.jpeg', '40000'),
('VAR00421', 'PR00034', 'Navy', 'ALLSIZE', '186', '658314a696d97_gambar_produk.jpeg', '40000'),
('VAR00422', 'PR00035', 'Ear hitam', 'ALLSIZE', '146', '658315bee442f_gambar_produk.jpeg', '60000'),
('VAR00423', 'PR00035', 'Non ear hitam', 'ALLSIZE', '176', '658315d6988a3_gambar_produk.jpeg', '60000'),
('VAR00424', 'PR00035', 'Ear krem', 'ALLSIZE', '154', '65831609ac040_gambar_produk.jpeg', '60000'),
('VAR00425', 'PR00035', 'Non ear hijau', 'ALLSIZE', '176', '658316195d58d_gambar_produk.jpeg', '60000'),
('VAR00426', 'PR00036', 'Full black bear', 'ALLSIZE', '172', '658316be24159_gambar_produk.jpeg', '65000'),
('VAR00427', 'PR00036', 'Hijau putih', 'ALLSIZE', '176', '658317470969f_gambar_produk.jpeg', '65000'),
('VAR00428', 'PR00036', 'Hitam cream viral', 'ALLSIZE', '124', '6583176f50d31_gambar_produk.jpeg', '65000'),
('VAR00429', 'PR00036', 'Putih navy', 'ALLSIZE', '135', '6583179d6e7f1_gambar_produk.jpeg', '65000'),
('VAR00430', 'PR00036', 'Full black', 'ALLSIZE', '124', '658317c19902c_gambar_produk.jpeg', '65000'),
('VAR00431', 'PR00039', 'Pink', 'L', '165', '658318c3c6557_gambar_produk.jpeg', '40000'),
('VAR00432', 'PR00039', 'Pink', 'M', '132', '658318c3c6557_gambar_produk.jpeg', '40000'),
('VAR00433', 'PR00039', 'Coksu', 'L', '165', '658318f083990_gambar_produk.jpeg', '40000'),
('VAR00434', 'PR00039', 'Coksu', 'M', '153', '658318f083990_gambar_produk.jpeg', '40000'),
('VAR00435', 'PR00039', 'Abu', 'L', '142', '658319091fac4_gambar_produk.jpeg', '40000'),
('VAR00436', 'PR00039', 'Abu', 'M', '123', '658319091fac4_gambar_produk.jpeg', '40000'),
('VAR00437', 'PR00039', 'Army', 'L', '121', '6583192f7057f_gambar_produk.jpeg', '40000'),
('VAR00438', 'PR00039', 'Army', 'M', '131', '6583192f7057f_gambar_produk.jpeg', '40000'),
('VAR00439', 'PR00040', 'Hitam', '28', '165', '658319c0ba6da_gambar_produk.jpeg', '95000'),
('VAR00440', 'PR00040', 'Hitam', '29', '168', '658319c0ba6da_gambar_produk.jpeg', '95000'),
('VAR00441', 'PR00040', 'Hitam', '30', '121', '658319c0ba6da_gambar_produk.jpeg', '95000'),
('VAR00442', 'PR00040', 'Hitam', '31', '192', '658319c0ba6da_gambar_produk.jpeg', '95000'),
('VAR00443', 'PR00040', 'Hitam', '32', '128', '658319c0ba6da_gambar_produk.jpeg', '95000'),
('VAR00444', 'PR00040', 'Hitam', '33', '192', '658319c0ba6da_gambar_produk.jpeg', '95000'),
('VAR00445', 'PR00040', 'Hitam', '34', '120', '658319c0ba6da_gambar_produk.jpeg', '95000'),
('VAR00446', 'PR00040', 'Hitam', '27', '176', '658319c0ba6da_gambar_produk.jpeg', '95000'),
('VAR00447', 'PR00040', 'Abu', '28', '176', '65831a2d76416_gambar_produk.jpeg', '95000'),
('VAR00448', 'PR00040', 'Abu', '29', '176', '65831a2d76416_gambar_produk.jpeg', '95000'),
('VAR00449', 'PR00040', 'Abu', '30', '161', '65831a2d76416_gambar_produk.jpeg', '95000'),
('VAR00450', 'PR00040', 'Abu', '31', '176', '65831a2d76416_gambar_produk.jpeg', '95000'),
('VAR00451', 'PR00040', 'Abu', '32', '183', '65831a2d76416_gambar_produk.jpeg', '95000'),
('VAR00452', 'PR00040', 'Abu', '33', '121', '65831a2d76416_gambar_produk.jpeg', '95000'),
('VAR00453', 'PR00040', 'Abu', '34', '189', '65831a2d76416_gambar_produk.jpeg', '95000'),
('VAR00454', 'PR00040', 'Abu', '27', '165', '65831a2d76416_gambar_produk.jpeg', '95000'),
('VAR00455', 'PR00040', 'Crem', '28', '160', '65831a930b329_gambar_produk.jpeg', '95000'),
('VAR00456', 'PR00040', 'Crem', '29', '131', '65831a930b329_gambar_produk.jpeg', '95000'),
('VAR00457', 'PR00040', 'Crem', '30', '171', '65831a930b329_gambar_produk.jpeg', '95000'),
('VAR00458', 'PR00040', 'Crem', '31', '187', '65831a930b329_gambar_produk.jpeg', '95000'),
('VAR00459', 'PR00040', 'Crem', '32', '189', '65831a930b329_gambar_produk.jpeg', '95000'),
('VAR00460', 'PR00040', 'Crem', '33', '199', '65831a930b329_gambar_produk.jpeg', '95000'),
('VAR00461', 'PR00040', 'Crem', '27', '165', '65831a930b329_gambar_produk.jpeg', '95000'),
('VAR00462', 'PR00040', 'Mocca', '28', '176', '65831ad66dde7_gambar_produk.jpeg', '95000'),
('VAR00463', 'PR00040', 'Mocca', '29', '134', '65831ad66dde7_gambar_produk.jpeg', '95000'),
('VAR00464', 'PR00040', 'Mocca', '30', '131', '65831ad66dde7_gambar_produk.jpeg', '95000'),
('VAR00465', 'PR00040', 'Mocca', '31', '181', '65831ad66dde7_gambar_produk.jpeg', '95000'),
('VAR00466', 'PR00040', 'Mocca', '32', '191', '65831ad66dde7_gambar_produk.jpeg', '95000'),
('VAR00467', 'PR00040', 'Mocca', '33', '198', '65831ad66dde7_gambar_produk.jpeg', '95000'),
('VAR00468', 'PR00040', 'Mocca', '34', '197', '65831ad66dde7_gambar_produk.jpeg', '95000'),
('VAR00469', 'PR00040', 'Mocca', '27', '165', '65831ad66dde7_gambar_produk.jpeg', '95000'),
('VAR00470', 'PR00042', 'Hitam', '38', '127', '65831b34686cc_gambar_produk.jpeg', '50000'),
('VAR00471', 'PR00042', 'Hitam', '39', '129', '65831b34686cc_gambar_produk.jpeg', '50000'),
('VAR00472', 'PR00042', 'Hitam', '40', '171', '65831b34686cc_gambar_produk.jpeg', '50000'),
('VAR00473', 'PR00042', 'Hitam', '37', '176', '65831b34686cc_gambar_produk.jpeg', '50000'),
('VAR00474', 'PR00042', 'Pink', '38', '164', '65831b82714e9_gambar_produk.jpeg', '50000'),
('VAR00475', 'PR00042', 'Pink', '39', '154', '65831b82714e9_gambar_produk.jpeg', '50000'),
('VAR00476', 'PR00042', 'Pink', '40', '190', '65831b82714e9_gambar_produk.jpeg', '50000'),
('VAR00477', 'PR00042', 'Pink', '37', '154', '65831b82714e9_gambar_produk.jpeg', '50000'),
('VAR00478', 'PR00042', 'Abu', '38', '189', '65831bd114888_gambar_produk.jpeg', '50000'),
('VAR00479', 'PR00042', 'Abu', '39', '190', '65831bd114888_gambar_produk.jpeg', '50000'),
('VAR00480', 'PR00042', 'Abu', '40', '124', '65831bd114888_gambar_produk.jpeg', '50000'),
('VAR00481', 'PR00042', 'Abu', '37', '134', '65831bd114888_gambar_produk.jpeg', '50000'),
('VAR00482', 'PR00043', 'Black', '38', '189', '65831c3f51b45_gambar_produk.jpeg', '60000'),
('VAR00483', 'PR00043', 'Black', '39', '182', '65831c3f51b45_gambar_produk.jpeg', '60000'),
('VAR00484', 'PR00043', 'Black', '40', '143', '65831c3f51b45_gambar_produk.jpeg', '60000'),
('VAR00485', 'PR00043', 'Black', '37', '172', '65831c3f51b45_gambar_produk.jpeg', '60000'),
('VAR00486', 'PR00043', 'Pink', '38', '164', '65831c64e386f_gambar_produk.jpeg', '60000'),
('VAR00487', 'PR00043', 'Pink', '39', '143', '65831c64e386f_gambar_produk.jpeg', '60000'),
('VAR00488', 'PR00043', 'Pink', '40', '198', '65831c64e386f_gambar_produk.jpeg', '60000'),
('VAR00489', 'PR00043', 'Pink', '37', '187', '65831c64e386f_gambar_produk.jpeg', '60000'),
('VAR00490', 'PR00043', 'Gray', '38', '156', '65831c9801067_gambar_produk.jpeg', '60000'),
('VAR00491', 'PR00043', 'Gray', '39', '190', '65831c9801067_gambar_produk.jpeg', '60000'),
('VAR00492', 'PR00043', 'Gray', '40', '172', '65831c9801067_gambar_produk.jpeg', '60000'),
('VAR00493', 'PR00043', 'Gray', '37', '178', '65831c9801067_gambar_produk.jpeg', '60000'),
('VAR00494', 'PR00043', 'White', '38', '189', '65831cc22bc73_gambar_produk.jpeg', '60000'),
('VAR00495', 'PR00043', 'White', '39', '154', '65831cc22bc73_gambar_produk.jpeg', '60000'),
('VAR00496', 'PR00043', 'White', '40', '114', '65831cc22bc73_gambar_produk.jpeg', '60000'),
('VAR00497', 'PR00043', 'White', '37', '175', '65831cc22bc73_gambar_produk.jpeg', '60000'),
('VAR00498', 'PR00044', 'Pinkblue', '38', '109', '65831d15ad601_gambar_produk.jpeg', '105000'),
('VAR00499', 'PR00044', 'Pinkblue', '39', '115', '65831d15ad601_gambar_produk.jpeg', '105000'),
('VAR00500', 'PR00044', 'Pinkblue', '40', '201', '65831d15ad601_gambar_produk.jpeg', '105000'),
('VAR00501', 'PR00044', 'Pinkblue', '37', '187', '65831d15ad601_gambar_produk.jpeg', '105000'),
('VAR00502', 'PR00044', 'Whitepink', '38', '145', '65831d4c4f348_gambar_produk.jpeg', '105000'),
('VAR00503', 'PR00044', 'Whitepink', '29', '120', '65831d4c4f348_gambar_produk.jpeg', '105000'),
('VAR00504', 'PR00044', 'Whitepink', '40', '137', '65831d4c4f348_gambar_produk.jpeg', '105000'),
('VAR00505', 'PR00044', 'Whitepink', '37', '193', '65831d4c4f348_gambar_produk.jpeg', '105000'),
('VAR00506', 'PR00044', 'Black', '38', '116', '65831d7ec53f0_gambar_produk.jpeg', '105000'),
('VAR00507', 'PR00044', 'Black', '39', '183', '65831d7ec53f0_gambar_produk.jpeg', '105000'),
('VAR00508', 'PR00044', 'Black', '40', '197', '65831d7ec53f0_gambar_produk.jpeg', '105000'),
('VAR00509', 'PR00044', 'Black', '37', '186', '65831d7ec53f0_gambar_produk.jpeg', '105000'),
('VAR00510', 'PR00044', 'White', '38', '168', '65831dbb9c11a_gambar_produk.jpeg', '105000'),
('VAR00511', 'PR00044', 'White', '39', '136', '65831dbb9c11a_gambar_produk.jpeg', '105000'),
('VAR00512', 'PR00044', 'White', '40', '121', '65831dbb9c11a_gambar_produk.jpeg', '105000'),
('VAR00513', 'PR00044', 'White', '37', '189', '65831dbb9c11a_gambar_produk.jpeg', '105000'),
('VAR00514', 'PR00045', 'Cream', '38', '180', '65831e2f82d50_gambar_produk.jpeg', '105000'),
('VAR00515', 'PR00045', 'Cream', '39', '156', '65831e2f82d50_gambar_produk.jpeg', '105000'),
('VAR00516', 'PR00045', 'Cream', '40', '161', '65831e2f82d50_gambar_produk.jpeg', '105000'),
('VAR00517', 'PR00045', 'Cream', '37', '176', '65831e2f82d50_gambar_produk.jpeg', '105000'),
('VAR00518', 'PR00045', 'White', '38', '123', '65831e643a396_gambar_produk.jpeg', '105000'),
('VAR00519', 'PR00045', 'White', '39', '193', '65831e643a396_gambar_produk.jpeg', '105000'),
('VAR00520', 'PR00045', 'White', '40', '142', '65831e643a396_gambar_produk.jpeg', '105000'),
('VAR00521', 'PR00045', 'White', '37', '186', '65831e643a396_gambar_produk.jpeg', '105000'),
('VAR00522', 'PR00045', 'Black', '38', '131', '65831e8914f57_gambar_produk.jpeg', '105000'),
('VAR00523', 'PR00045', 'Black', '39', '102', '65831e8914f57_gambar_produk.jpeg', '105000'),
('VAR00524', 'PR00045', 'Black', '40', '177', '65831e8914f57_gambar_produk.jpeg', '105000'),
('VAR00525', 'PR00045', 'Black', '37', '197', '65831e8914f57_gambar_produk.jpeg', '105000'),
('VAR00526', 'PR00045', 'Pink', '38', '101', '65831ead69cde_gambar_produk.jpeg', '105000'),
('VAR00527', 'PR00045', 'Pink', '39', '188', '65831ead69cde_gambar_produk.jpeg', '105000'),
('VAR00528', 'PR00045', 'Pink', '49', '199', '65831ead69cde_gambar_produk.jpeg', '105000'),
('VAR00529', 'PR00045', 'Pink', '37', '121', '65831ead69cde_gambar_produk.jpeg', '105000'),
('VAR00530', 'PR00046', 'Cream', '38', '189', '65831f45aee62_gambar_produk.jpeg', '105000'),
('VAR00531', 'PR00046', 'Cream', '39', '189', '65831f45aee62_gambar_produk.jpeg', '105000'),
('VAR00532', 'PR00046', 'Cream', '40', '177', '65831f45aee62_gambar_produk.jpeg', '105000'),
('VAR00533', 'PR00046', 'Cream', '37', '129', '65831f45aee62_gambar_produk.jpeg', '105000'),
('VAR00534', 'PR00046', 'Purple', '38', '188', '65831f7428725_gambar_produk.jpeg', '105000'),
('VAR00535', 'PR00046', 'Purple', '39', '132', '65831f7428725_gambar_produk.jpeg', '105000');
INSERT INTO `tbl_variasiproduk` (`id_variasiproduk`, `id_produk`, `warna`, `ukuran`, `stok`, `gambar`, `harga`) VALUES
('VAR00536', 'PR00046', 'Purple', '40', '133', '65831f7428725_gambar_produk.jpeg', '105000'),
('VAR00537', 'PR00046', 'Purple', '37', '182', '65831f7428725_gambar_produk.jpeg', '105000'),
('VAR00538', 'PR00046', 'Pink', '38', '157', '65831fe83f5c7_gambar_produk.jpeg', '105000'),
('VAR00539', 'PR00046', 'Pink', '39', '155', '65831fe83f5c7_gambar_produk.jpeg', '105000'),
('VAR00540', 'PR00046', 'Pink', '40', '199', '65831fe83f5c7_gambar_produk.jpeg', '105000'),
('VAR00541', 'PR00046', 'Pink', '37', '156', '65831fe83f5c7_gambar_produk.jpeg', '105000'),
('VAR00542', 'PR00046', 'White', '38', '145', '6583200812b2d_gambar_produk.jpeg', '105000'),
('VAR00543', 'PR00046', 'White', '39', '134', '6583200812b2d_gambar_produk.jpeg', '105000'),
('VAR00544', 'PR00046', 'White', '40', '109', '6583200812b2d_gambar_produk.jpeg', '105000'),
('VAR00545', 'PR00046', 'White', '37', '188', '6583200812b2d_gambar_produk.jpeg', '105000'),
('VAR00546', 'PR00046', 'Black', '38', '127', '6583202d35a1c_gambar_produk.jpeg', '105000'),
('VAR00547', 'PR00046', 'Black', '39', '199', '6583202d35a1c_gambar_produk.jpeg', '105000'),
('VAR00548', 'PR00046', 'Black', '40', '182', '6583202d35a1c_gambar_produk.jpeg', '105000'),
('VAR00549', 'PR00046', 'Black', '37', '156', '6583202d35a1c_gambar_produk.jpeg', '105000'),
('VAR00550', 'PR00028', 'Toffe', 'L', '179', '65839769a9f09_gambar_produk.jpeg', '90000'),
('VAR00551', 'PR00028', 'Toffe', 'XL', '192', '65839769a9f09_gambar_produk.jpeg', '90000'),
('VAR00552', 'PR00028', 'Toffe', 'XXL', '120', '65839769a9f09_gambar_produk.jpeg', '90000'),
('VAR00553', 'PR00028', 'Toffe', 'M', '185', '65839769a9f09_gambar_produk.jpeg', '90000'),
('VAR00554', 'PR00028', 'Hitam(washed)', 'L', '128', '658397a250d6e_gambar_produk.jpeg', '90000'),
('VAR00555', 'PR00028', 'Hitam(washed)', 'XL', '102', '658397a250d6e_gambar_produk.jpeg', '90000'),
('VAR00556', 'PR00028', 'Hitam(washed)', 'XXL', '197', '658397a250d6e_gambar_produk.jpeg', '90000'),
('VAR00557', 'PR00028', 'Hitam(washed)', 'M', '187', '658397a250d6e_gambar_produk.jpeg', '90000'),
('VAR00558', 'PR00028', 'Cream', 'L', '199', '658397d3a0cfe_gambar_produk.jpeg', '90000'),
('VAR00559', 'PR00028', 'Cream', 'XL', '177', '658397d3a0cfe_gambar_produk.jpeg', '90000'),
('VAR00560', 'PR00028', 'Cream', 'XXL', '128', '658397d3a0cfe_gambar_produk.jpeg', '90000'),
('VAR00561', 'PR00028', 'Cream', 'M', '186', '658397d3a0cfe_gambar_produk.jpeg', '90000'),
('VAR00562', 'PR00028', 'Putih', 'L', '127', '658397fce63f9_gambar_produk.jpeg', '90000'),
('VAR00563', 'PR00028', 'Putih', 'XL', '123', '658397fce63f9_gambar_produk.jpeg', '90000'),
('VAR00564', 'PR00028', 'Putih', 'XXL', '109', '658397fce63f9_gambar_produk.jpeg', '90000'),
('VAR00565', 'PR00028', 'Putih', 'M', '155', '658397fce63f9_gambar_produk.jpeg', '90000'),
('VAR00566', 'PR00031', 'Hitam', 'L', '133', '6583985f9b0d6_gambar_produk.jpeg', '60000'),
('VAR00567', 'PR00031', 'Hitam', 'XL', '189', '6583985f9b0d6_gambar_produk.jpeg', '60000'),
('VAR00568', 'PR00031', 'Hitam', 'M', '177', '6583985f9b0d6_gambar_produk.jpeg', '60000'),
('VAR00569', 'PR00031', 'Coksu', 'L', '199', '65839895ba156_gambar_produk.jpeg', '60000'),
('VAR00570', 'PR00031', 'Coksu', 'XL', '122', '65839895ba156_gambar_produk.jpeg', '60000'),
('VAR00571', 'PR00031', 'Coksu', 'M', '156', '65839895ba156_gambar_produk.jpeg', '60000'),
('VAR00572', 'PR00031', 'Army', 'L', '155', '658398c04bdd3_gambar_produk.jpeg', '60000'),
('VAR00573', 'PR00031', 'Army', 'XL', '166', '658398c04bdd3_gambar_produk.jpeg', '60000'),
('VAR00574', 'PR00031', 'Army', 'M', '157', '658398c04bdd3_gambar_produk.jpeg', '60000'),
('VAR00575', 'PR00031', 'Putih', 'L', '177', '658398ebe3baa_gambar_produk.jpeg', '60000'),
('VAR00576', 'PR00031', 'Putih', 'XL', '160', '658398ebe3baa_gambar_produk.jpeg', '60000'),
('VAR00577', 'PR00031', 'Putih', 'M', '168', '658398ebe3baa_gambar_produk.jpeg', '60000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tbl_kasirtransaksi`
--
ALTER TABLE `tbl_kasirtransaksi`
  ADD PRIMARY KEY (`id_kasirtransaksi`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_variasiproduk`
--
ALTER TABLE `tbl_variasiproduk`
  ADD PRIMARY KEY (`id_variasiproduk`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
