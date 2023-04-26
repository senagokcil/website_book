-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Nis 2023, 17:57:43
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(12) NOT NULL,
  `baslik` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `anahtar_kelime` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `telefon` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `adres` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `facebook` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `instagram` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `twitter` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `youtube` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `logo` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mesai` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `baslik`, `aciklama`, `anahtar_kelime`, `telefon`, `email`, `adres`, `facebook`, `instagram`, `twitter`, `youtube`, `logo`, `mesai`) VALUES
(1, 'kitaplarca.com', 'E-Ticaret Sitesi', 'kitap', '+905462570729', 'gokcilsenanur@gmail.com', 'Süleymanpaşa/TEKİRDAĞ', 'facebook.com/', 'instagram.com/', 'twitter.com/', 'youtube.com/', '751101336849679133logo2.png', '7/24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cokluresim`
--

CREATE TABLE `cokluresim` (
  `id` int(11) NOT NULL,
  `resim` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `cokluresim`
--

INSERT INTO `cokluresim` (`id`, `resim`, `urun_id`) VALUES
(15, '686183181509991218m4.png', 25),
(16, '1759109235671359855m1.png', 25),
(17, '618068128258395763m3.jpg', 25),
(18, '4048914496981699077iphone-14-pro.jpg', 18),
(23, '824754525214217010WhatsApp Image 2022-12-29 at 18.46.26 (2).jpeg', 26),
(24, '7110835464751655142WhatsApp Image 2022-12-29 at 18.46.27.jpeg', 26),
(25, '7447686891891220WhatsApp Image 2022-12-29 at 18.46.27 (2).jpeg', 26),
(26, '5075484673581801251WhatsApp Image 2022-12-29 at 18.46.28.jpeg', 26),
(30, '869500405628696525livaneli.jpeg', 28),
(31, '937430759065994163WhatsApp Image 2022-12-29 at 18.46.21.jpeg', 28),
(32, '273390144921129745WhatsApp Image 2022-12-29 at 18.46.19.jpeg', 28),
(33, '6432638537861194214WhatsApp Image 2022-12-29 at 18.46.22 (1).jpeg', 30),
(34, '8963361474181328721WhatsApp Image 2022-12-29 at 18.46.23 (1).jpeg', 30),
(35, '3892496939461349298WhatsApp Image 2022-12-29 at 18.46.23.jpeg', 30),
(36, '245763141682259180WhatsApp Image 2022-12-29 at 18.46.25.jpeg', 31),
(37, '895532630201983341WhatsApp Image 2022-12-29 at 18.46.30.jpeg', 33),
(38, '866658904371670307WhatsApp Image 2022-12-29 at 18.46.28 (1).jpeg', 34),
(39, '817372349058950145WhatsApp Image 2022-12-29 at 19.08.45.jpeg', 36),
(40, '401662354823271935WhatsApp Image 2022-12-29 at 19.08.44.jpeg', 37),
(41, '849172731770864189WhatsApp Image 2022-12-29 at 19.08.30.jpeg', 38),
(42, '376665613702575437sefiller.jpg', 27),
(43, '38795960806918480birdelininhatıradefteri.jpg', 40),
(44, '8324722683421351345insaneileyaşar.jpg', 41),
(45, '3095218705791749470sefiller.jpg', 42),
(46, '651629130503120689birdelininhatıradefteri.jpg', 43),
(48, '1893356212062228760001775354001-1.jpg', 45),
(49, '364872627491157969pinokyo.jpg', 46),
(50, '183644378152244880001957979001-1.jpg', 48),
(51, '690759929111313240000000666166-1.jpg', 49),
(52, '71191493334311960010001903548001-1.jpg', 50),
(53, '1853295191015491960002004808001-1.jpg', 51),
(54, '2729069103066841640000000624760-1.jpg', 52),
(55, '78687961556813869430001786072001-1.jpg', 53),
(56, '6344674937633185250001776130001-1.jpg', 54),
(57, '18171181870313447010001972847001-1.jpg', 55),
(58, '565153963715254570001992214001-1.jpg', 56),
(59, '3488788928339144600001992267001-1.jpg', 57),
(60, '7189291330209039450000000710455-1.jpg', 58),
(61, '902757588998565440000000482384-1.jpg', 59),
(62, '77093594197015083490001870906001-1.jpg', 47),
(63, '5758598421817514680002022096001-1.jpg', 60),
(64, '3510413195113917939786059781312-2.png', 58),
(65, '15207174524014512960001836087001-1.jpg', 44);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hakkimizda_detay` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `hakkimizda_resim` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hakkimizda_vizyon` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `hakkimizda_misyon` varchar(3000) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_detay`, `hakkimizda_resim`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(1, 'Hakkımızda', '<p>Herkesi, k&uuml;lt&uuml;r ve eğlence d&uuml;nyasının sunduğu zenginlikleri daha sık, daha kolay ve daha nitelikli bir şekilde keşfetmeye, keyfini &ccedil;ıkarmaya ve paylaşmaya teşvik eden, b&ouml;ylece insanları ortak bir platformda bir araya getiren ve hayatın her anını zenginleştiren bir d&uuml;nya.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '9234685660041569489logo2.png', 'İnsanların zihnen özgürleşmesinin ve kişisel gelişimlerinin en büyük destekçisi olarak en çok sevilen ve tercih edilen deneyim markası olmak.', 'Sınırları kaldıran, özgürleştiren, destekleyen ve cesaretlendiren platform olmak.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_sira` int(50) NOT NULL,
  `kategori_durum` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_adi`, `kategori_sira`, `kategori_durum`) VALUES
(18, 'Dünya Klasikleri', 1, 1),
(19, 'Kişisel Gelişim', 2, 1),
(20, 'Çizgi Roman', 3, 1),
(21, 'LGS Ders ve Sınav Kitapları', 4, 1),
(22, 'YKS Ders ve Sınav Kitapları', 5, 1),
(23, 'Sözlükler', 7, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kullanici_adi` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_sifre` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_mail` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_yetki` int(2) NOT NULL,
  `kullanici_adres` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_tel` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_resim` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_zaman`, `kullanici_adi`, `kullanici_sifre`, `kullanici_adsoyad`, `kullanici_mail`, `kullanici_yetki`, `kullanici_adres`, `kullanici_tel`, `kullanici_resim`) VALUES
(9, '2022-12-26 19:27:30', 'gokcilsena', '59e21e247914070da0cef11f3b64cba3', 'Senanur Gökçil', 'gokcilsenanur@gmail.com', 2, 'süleymanpaşa/TEKİRDAĞ', '05462570729', '529220763137549607senanurVesika.jpg'),
(27, '2023-01-11 07:07:01', 'senanur', 'c1947c94fa8e7fc71b2849b873731d1d', 'Senanur Gökçil', '1190606019@nku.edu.tr', 1, 'Çiftlikönü Mah. Soğancılar Cad. Karaca APT. Süleymanpaşa/TEKİRDAĞ', '+905462570729', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `siparis_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(11) NOT NULL,
  `urun_fiyat` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `toplam_fiyat` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `odeme_turu` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `siparis_onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_baslik` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_aciklama` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_resim` varchar(1000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_sira` int(11) NOT NULL,
  `slider_durum` int(11) NOT NULL,
  `slider_banner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_baslik`, `slider_aciklama`, `slider_resim`, `slider_sira`, `slider_durum`, `slider_banner`) VALUES
(22, '', '', '829580450771259123Sinavlara-Hazirlik-Kitaplariniz-Hazir_anasayfa_1200x390.jpg', 1, 1, 1),
(23, '', '', '6009645504561401523xxxx1200x390_SeninSucundegil.jpg', 2, 1, 1),
(24, '', '', '798772561200835684cizgi-roman-01.jpg', 3, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_resim` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_baslik` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_aciklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_sira` int(11) NOT NULL,
  `urun_model` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_renk` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_adet` int(100) NOT NULL,
  `urun_fiyat` float(10,2) NOT NULL,
  `urun_etiket` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `kategori_id`, `urun_resim`, `urun_baslik`, `urun_aciklama`, `urun_sira`, `urun_model`, `urun_renk`, `urun_adet`, `urun_fiyat`, `urun_etiket`, `urun_zaman`, `urun_durum`) VALUES
(43, 18, '881679551231463126birdelininhatıradefteri.jpg', 'Bir Delinin Hatıra Defteri', '<p>Rus ger&ccedil;ek&ccedil;iliğinin kurucularından olan Gogol, Bir Delinin Hatıra Defteri ile hayata tutunmaya &ccedil;alışan bir şizofreni ve Burun ile Palto hik&acirc;yelerinde ise fantastik &ouml;ğeleri g&ouml;zlem yeteneği ve ince ironisiyle birleştirerek Rus toplumunun genel yapısını anlatır. &Ouml;nemli Rus yazarların da esin kaynağı sayılan Gogol, yaşamı boyunca &uuml;&ccedil; oyun yazmış ve &ouml;l&uuml;m&uuml;nden sonra pek &ccedil;ok eseri oyunlaştırılmıştır. &Uuml;lkemizde de sahnelenen ve d&uuml;nya &ccedil;apında b&uuml;y&uuml;k yankılar uyandıran Bir Delinin Hatıra Defteri bunlardan biridir. Okuyuculara farklı pencereler a&ccedil;arken Rus b&uuml;rokrasisinin işleyişini ger&ccedil;ek&ccedil;i bi&ccedil;imde g&ouml;zler &ouml;n&uuml;ne seren Gogol&#39;&uuml; belki de en iyi Hepimiz Gogol&#39;&uuml;n &#39;Palto&#39;sundan &ccedil;ıktık s&ouml;zleriyle Dostoyevski &ouml;zetlemektedir.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Bir Delinin Hatıra Defteri</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Nikolay Vasilyevi&ccedil; Gogol</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>İndigo Kitap</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>13,5 x 21</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2019</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n</ul>\r\n', 1, '', '', 100, 12.00, '', '2023-01-11 07:57:19', 1),
(44, 18, '62279886018811585030001836087001-1.jpg', 'İnsan Neyle Yaşar ?', '<p>Lev Nikolayevi&ccedil; Tolstoy (Leo Tolstoy), 9 Eyl&uuml;l 1828&rsquo;de Tula&rsquo;da bulunan ailesine ait Yasyana Polyana Malikanesinde dogmustur. Kont Tolstoy ile Prenses Mariya&acute;nin d&ouml;rd&uuml;nc&uuml; &ccedil;ocugudur. K&uuml;&ccedil;&uuml;k yasta anne ve babasini kaybetmistir. Anne ve babasinin olmamasi y&uuml;z&uuml;nden &ccedil;ocuklugu halalarinin yaninda ge&ccedil;ti, egitimini onlar &uuml;stlenmistir.</p>\r\n\r\n<p>Dogu Dilleri Fak&uuml;ltesinde sinifta kalinca 1846&acute;da Hukuk Fak&uuml;tesine ge&ccedil;mistir. 1851&acute;de Rus ordusuna yazildi ve Kirim Savasi&acute;nda top&ccedil;u tegmeni olarak g&ouml;rev yapan agabeyi Nikolay&acute;in yanina gitmistir. 1852&acute;de astsubay olarak top&ccedil;u bataryalarindan birine verilmistir. Bir s&uuml;re sonra sagligi bozulmustur ve can sikintisini gidermek i&ccedil;in roman yazmaya baslamistir.</p>\r\n\r\n<p>&Ccedil;ocukluk &Ccedil;agi adli uzun &ouml;yk&uuml;s&uuml;n&uuml; begenen sair Nekrasov, onu &Ccedil;agdas dergisinde yayimlayacagini Tolstoy&acute;a bildirmistir. Elestirmenler de &ouml;yk&uuml;y&uuml; begenmisler ve Tolstoy&acute;un edebiyata attigi bu ilk adim gereken ilgiyi g&ouml;rm&uuml;st&uuml;r.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap&nbsp;Adı&nbsp; &nbsp;&nbsp;</strong>İnsan Ne İle Yaşar</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Lev Nikolayevi&ccedil; Tolstoy</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Dorlion Yayınevi</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>13,5 x 21</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2019</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 2, '', '', 40, 12.00, '', '2023-01-11 07:19:01', 1),
(46, 18, '302296588285179588pinokyo.jpg', 'Pinokyo', '<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Pinokyo - D&uuml;nya Klasikleri</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Carlo Collodi</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>D&uuml;nya Bizim Kitaplığı</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2021</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 3, '', '', 20, 12.00, '', '2023-01-10 18:38:36', 1),
(47, 18, '1756254732101489040001870906001-1.jpg', 'Macellan', '<p>Dahi bir insan, d&acirc;hi bir zamana denk geldiğinde, ve &ccedil;ağının yaratıcı ihtiyacını akıllılıkla kavradığında tarihte harika şeyler ger&ccedil;ekleşir.<br />\r\nHayatı talihsizliklerle dolu olan Macellan&rsquo;ın, bacağı sakatlanınca kahramanlıklar g&ouml;sterdiği Portekiz ordusundaki g&ouml;revine son verilir. Oysa onun yapmak istediği şeyler vardır.<br />\r\n<br />\r\nMacellan baharat i&ccedil;in aşılması gereken tehlikeyle dolu uzun bir yol yerine Hindistan&rsquo;a giden daha uygun yeni bir yol bulmak istemektedir. Projesini krala g&ouml;t&uuml;rd&uuml;ğ&uuml;nde kral onu aşağılar. Bunun &uuml;zerine Macellan kraldan Portekiz vatandaşlığından azlini ister ve bu isteği kabul edilir. İspanya&rsquo;ya giden Macellan&rsquo;ın şansı yaver gidince planlarını İspanyol Kralı V. Charles&rsquo;a kabul ettirir ve kurduğu donanımlı bir filoyla hayaline doğru yelken a&ccedil;ar...<br />\r\n<br />\r\nMacellan&rsquo;ın hayatı bir hayale cesaret ve azimle sahip &ccedil;ıkıp bu uğurda m&uuml;cadele eden bir kahramanın hayatıdır. Onu hi&ccedil;bir şey yolundan d&ouml;nd&uuml;remez. Macellan&rsquo;ın heyecan dolu bu meşakkatli yolculuğunu bu roman tadındaki kitaptan zevkle okuyacaksınız.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Macellan-Modern D&uuml;nya Klasikleri</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Stefan Zweig</li>\r\n	<li><strong>&Ccedil;evirmen&nbsp; &nbsp;&nbsp;</strong>Deniz Bostancı</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Martı Yayınları</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>352</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>12,5 x 19,5</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2020</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 4, '', '', 10, 35.00, '', '2023-01-11 07:10:29', 1),
(48, 19, '72029187571418961460001957979001-1.jpg', 'Sırlarımız Kadar Hastayız', '<p>Hastalık, ruhumuzun &ccedil;ığlığından başka bir şey değildir, o halde neden ısrarla &ccedil;areyi sadece bedende arıyoruz?<br />\r\n*<br />\r\nBug&uuml;n geleneksel tıp muhteşem g&ouml;r&uuml;nt&uuml;leme teknikleriyle, kusursuz testleriyle ve olağan&uuml;st&uuml; teşhisleriyle işimizi &ccedil;ok kolaylaştırsa da, bedeni h&acirc;l&acirc; bir makine gibi g&ouml;rd&uuml;ğ&uuml; i&ccedil;in enerji bedenimizi yok sayar. Oysa bedenimiz duygusal, zihinsel ve ruhsal &ccedil;atışmalarla bir b&uuml;t&uuml;nd&uuml;r. Bedensel bir hastalığın sadece bedenle ilgili olduğunu d&uuml;ş&uuml;nmek hem hekimler hem de hastalar i&ccedil;in eksik bir yaklaşımdır.<br />\r\nBedende oluşan bir hastalık ruhun ilgili b&ouml;l&uuml;m&uuml;nde başlar, sonrasında bedene mesaj olarak iletilir. Bu mesaj g&ouml;r&uuml;n&uuml;r hale geldiğinde biz buna &ldquo;hastalık&rdquo; deriz. İla&ccedil;ları reddetmek m&uuml;mk&uuml;n değildir, ancak enerji bedenin ila&ccedil;lardan &ccedil;ok daha etkili olduğu artık aşik&acirc;rdır, &uuml;stelik enerji bedenin şifasından faydalanmak i&ccedil;in bir bedel &ouml;demeniz de gerekmez.<br />\r\nDr. B&uuml;lent Demircioğlu, Sırlarımız Kadar Hastayız kitabında enerji bedeninizi nasıl iyileştireceğinizi en sade ve pratik yoluyla anlatıyor. Resetting metoduyla ruhun &ccedil;alışma prensibini, travmaların kodlarını, bunların y&ouml;netilmesini ve boşaltımını her hastalığı ele alarak a&ccedil;ıklıyor, kendi kendinize iyileşmenin holistik yollarını aktarıyor.:<br />\r\n&ldquo;Nasip.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Sırlarımız Kadar Hastayız</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>B&uuml;lent Demircioğlu</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Destek Yayınları</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>344</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>13,5 x 21</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2022</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 1, '', '', 10, 60.00, '', '2023-01-10 18:38:34', 1),
(49, 19, '46417794801514544880000000666166-1.jpg', 'Ted Gibi Konuş', '<p>Teknoloji, Eğlence ve Dizayn s&ouml;zc&uuml;klerinin baş harflerinden adını alan TED konferanslarının g&ouml;rd&uuml;ğ&uuml; ilgi b&uuml;t&uuml;n d&uuml;nyada artarak s&uuml;r&uuml;yor. &quot;Paylaşmaya değer fikirler&quot; sloganıyla anılan, insanları bu denli etkileyen 18 dakikalık TED konuşmaları internette 4 milyardan fazla izlendi. Peki ni&ccedil;in? Bu kadar &ccedil;ok insanı bu kadar etkileyen konuşmaların sırrı ne? Etkili, ikna edici, ilham veren bir sunum yapmak i&ccedil;in en &ccedil;ok neye gereksinim duyarız? Yetenek?<br />\r\n<br />\r\nHayır, bildiğiniz gibi değil. Topluluk &ouml;n&uuml;nde konuşmak o kadar da korkutucu değil. Carmine Gallo&#39;nun, Wall Street Journal &ccedil;oksatar listesine girmiş bu kitabı, 100&#39;den fazla TED konuşmasının &ccedil;&ouml;z&uuml;mlemesi, TED&#39;in en sevilen konuşmacılarıyla s&ouml;yleşiler, psikoloji, n&ouml;robilim ve iletişim uzmanlarının g&ouml;r&uuml;şlerini bir araya getiriyor.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Ted Gibi Konuş</li>\r\n	<li><strong>&Ccedil;evirmen&nbsp; &nbsp;&nbsp;</strong>Figen Bing&uuml;l</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Carmine Gallo</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Aganta Kitap</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2015</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 2, '', '', 15, 57.00, '', '2023-01-10 19:42:42', 1),
(50, 19, '61325480067214427420001903548001-1.jpg', 'Var mısın? - Güçlü Bir Yaşam İçin Öneriler', '<p>&ldquo;Gen&ccedil;liğimde gergin, stresli, mutsuz g&uuml;nlerim &ccedil;ok oldu. Kendimi su&ccedil;lu hissettiğim, değersiz g&ouml;rd&uuml;ğ&uuml;m d&ouml;nemler yaşadım. Şimdi hayatım anlamlı, coşkulu ve ş&uuml;k&uuml;r duygusuyla dopdolu... Neden? İ&ccedil;inde yaşadığım koşulların iyileşmesinden mi? Geliştirdiğim farkındalıkların sonucu mu?&rdquo;</p>\r\n\r\n<p>Doğan C&uuml;celoğlu</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Doğan C&uuml;celoğlu, yalnızca psikoloji kariyeriyle değil, insan hayatına dokunan ve insana dair her hik&acirc;yeden şifa &ccedil;ıkarabilen bilgeliğiyle bu coğrafyanın en &ouml;nemli ilim insanlarından biri. Seksen yılı aşkın &ouml;mr&uuml;n&uuml;n bir birikimi olarak, şimdi herkesin merak ettiği &ldquo;hayati&rdquo; sorulara en samimi cevaplarını sunuyor. Herkes gibi aslında o da h&acirc;l&acirc; savaşıyor, keşfediyor, hayata değer katıyor.<br />\r\n<br />\r\nHayatın anlamı nedir?</p>\r\n\r\n<p>İnsan kendini nasıl geliştirir?</p>\r\n\r\n<p>Umutsuzluk nasıl aşılır?</p>\r\n\r\n<p>İ&ccedil;imizdeki &ouml;z nasıl ortaya &ccedil;ıkar?</p>\r\n\r\n<p>&Ccedil;evremiz bizi nasıl etkiler?</p>\r\n\r\n<p>Kime akıl danışılır?</p>\r\n\r\n<p>Yaşam neleri &ouml;d&uuml;llendirir?</p>\r\n\r\n<p>&nbsp;Zihin nasıl işler?</p>\r\n\r\n<p>&ldquo;Biz&rdquo; olmak i&ccedil;in neler yapılmalıdır?<br />\r\n<br />\r\n&Ouml;m&uuml;r yolculuğunda neyin &ouml;nemli olduğunu anlamak, keşif ve merak duygularına sahip &ccedil;ıkmak bir hayatı &ldquo;kıymetli&rdquo; kılmak i&ccedil;in en &ouml;nemli meziyetler arasında. Elinizdeki rehber niteliğindeki kitap, yaşamı boyunca bu meziyetlerin peşine d&uuml;şm&uuml;ş ve her &acirc;nına onları ilmek ilmek işlemiş Doğan C&uuml;celoğlu&rsquo;nun, Deniz Bayramoğlu ile sohbetlerinden oluşuyor ve herkese şu soruyu soruyor: &ldquo;Zorluklarla başa &ccedil;ıkmaya, i&ccedil;indeki g&uuml;c&uuml; keşfetmeye VAR MISIN?&rdquo;</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Var mısın? - G&uuml;&ccedil;l&uuml; Bir Yaşam İ&ccedil;in &Ouml;neriler</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Doğan C&uuml;celoğlu</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Kronik Kitap</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>320</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>13,5 x 21</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2021</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 3, '', '', 10, 48.00, '', '2023-01-10 13:48:47', 1),
(51, 20, '5269845587032237260002004808001-1.jpg', 'Bloodborne 1 - Uykunun Ölümü', '<p>AVI AŞMAK İ&Ccedil;İN SOLUKKAN&rsquo;I ARAYIN!<br />\r\n&nbsp;<br />\r\nFromSoftware/Hidetaka Miyazaki&#39;nin eleştirmenlerce beğenilen Bloodborne video oyunundan &ccedil;ıkan yepyeni bir &ccedil;izgi roman serisinde Eski Yharnam&#39;ın korkun&ccedil; sırlarını keşfedin!<br />\r\n&nbsp;<br />\r\nKorkun&ccedil; yaratıkların g&ouml;lgelerde dolaştığı ve sokakların lanetlilerin kanıyla kayganlaştığı, sapkın bir salgının musallat olduğu eski bir şehirde uyanan isimsiz bir Avcı, Solukkan&#39;ı aramak i&ccedil;in tehlikeli bir maceraya atılıyor... Sonsuz Av Gecesi&#39;nden tek ka&ccedil;ış yolu...<br />\r\n&nbsp;<br />\r\nBloodborne Serisi - Cilt 1<br />\r\nUykunun &Ouml;l&uuml;m&uuml;&nbsp; # 1- 4</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Bloodborne 1 - Uykunun &Ouml;l&uuml;m&uuml;</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Ales Kot</li>\r\n	<li><strong>&Ccedil;evirmen&nbsp; &nbsp;&nbsp;</strong>Sadık Efe Sarıtunalı</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Eksik Par&ccedil;a</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>112</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>16,5 x 24</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2022</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 1, '', '', 5, 55.00, '', '2023-01-10 13:51:47', 1),
(52, 20, '923046548084891760000000624760-1.jpg', 'Death Note - Ölüm Defteri 13', '<p>Japon &ccedil;izgi romanlarına verilen isim olan Manga, d&uuml;nyada bir &ccedil;ılgınlık halini almıştır. Death Note (&Ouml;l&uuml;m Defteri) yayınladığı b&uuml;t&uuml;n &uuml;lkelerde satış rekorları kıran ve geniş bir hayran kitlesine sahip en &ouml;nemli manga serilerinden biridir.<br />\r\n<br />\r\nBu deftere adı yazılanlar &ouml;l&uuml;r&hellip; &Ouml;l&uuml;m Tanrısı Şinigami Ryuk&#39;un insanoğlu d&uuml;nyasına d&uuml;ş&uuml;rd&uuml;ğ&uuml; defter: DEATH NOTE (&Ouml;L&Uuml;M DEFTERİ). Bu doğa&uuml;st&uuml; defteri bulan ve d&uuml;nyadaki cani su&ccedil;luları ortadan kaldırmak i&ccedil;in kullanmaya karar veren Light Yagami (nam-ı diğer Kira) ile kimsenin &ccedil;&ouml;zemediği olaylarda polise yardım eden L adlı gizemli detektif arasındaki muhteşem m&uuml;cadele b&ouml;yle başlar.<br />\r\n<br />\r\nD&uuml;nyayı sarsan Kira olayı. Bir de bu olayın arka planında Death Note&#39;un varlığı. Bu kez, olay ve defterle ilgili farklı kayıtları kaleme alıp, &ccedil;izgilendirdik. Gizem perdesi arkasında kalan bir&ccedil;ok ger&ccedil;ek şimdi g&uuml;n y&uuml;z&uuml;ne &ccedil;ıkıyor! 12 ciltlik maceranın perde arkasını&ouml;ğrenmeye, karakterleri yakından tanımaya ve Death Note&#39;un yazarı ve &ccedil;izeri ile yapılan samimi r&ouml;portajları okumaya hazır mısınız?</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Death Note - &Ouml;l&uuml;m Defteri 13</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Tsugumi Ooba</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Akıl&ccedil;elen Kitaplar</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2014</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 2, '', '', 8, 30.00, '', '2023-01-10 17:28:55', 1),
(53, 22, '98709265369111829900001786072001-1.jpg', '2022 TYT Fizik Soru Bankası', '<p>Yeni TYT Fizik Soru Bankası &Uuml;&ccedil; D&ouml;rt Beş Yayınları&#39;ndan olup Fizik branşında da bundan sonra yeni kitaplar &ccedil;ıkacak.&nbsp;</p>\r\n\r\n<p>TYT Fizik Soru Bankasında Neler Var?</p>\r\n\r\n<p>Video &Ccedil;&ouml;z&uuml;ml&uuml; Sorular&Ouml;SYM Tarzında HazırlanmışKazanım odaklı sorular ile konuyu &ouml;ğrenKarma sorular ile konuyu pekiştir.Orijinal sorular ile ufkunu genişlet.Akıllı Tahta Uyumlu345 Mobil K&uuml;t&uuml;phane &Ouml;zelliği</p>\r\n\r\n<p>&Uuml;&ccedil; D&ouml;rt Beş Yayınları TYT Fizik Soru Bankası Akıllı Tahta Uyumlu mu?</p>\r\n\r\n<p>&Uuml;r&uuml;nlerimizin hepsi akıllı tahta uyumlu olup sitemizden &uuml;cretsiz indirebilirsiniz ayrıca 345 Mobil K&uuml;t&uuml;phane &ouml;zelliği ile ios ve android kullanıcıları i&ccedil;in mobil uygulamamız olup bu &uuml;r&uuml;n&uuml; mobilden de g&ouml;r&uuml;nt&uuml;leyebilirsiniz.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>2022 TYT Fizik Soru Bankası</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>&Uuml;mit Akıncı</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>&Uuml;&ccedil; D&ouml;rt Beş Yayınları</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>368</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>22 x 29</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2018</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n</ul>\r\n', 1, '', '', 20, 105.00, '', '2023-01-10 13:58:12', 1),
(54, 22, '5037544514747500990001776130001-1.jpg', '2022 AYT Matematik Soru Bankası', '<p>Yeni M&uuml;fredata G&ouml;re</p>\r\n\r\n<p>&nbsp;&Ouml;SYM Tarzında Hazırlanmış</p>\r\n\r\n<p>Video &Ccedil;&ouml;z&uuml;ml&uuml;</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>2022 AYT Matematik Soru Bankası</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Mehmet Kıvrak</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>&Uuml;&ccedil; D&ouml;rt Beş Yayınları</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>375</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>22 x 29</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2021</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 2, '', '', 20, 150.00, '', '2023-01-10 14:01:31', 1),
(55, 22, '99418161206813915190001972847001-1.jpg', 'TYT Türkçe Soru Bankası', '<p>Derslere ve sınavlara hazırlık i&ccedil;in tasarlanmıştır.<br />\r\nM&uuml;fredata uygundur.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>TYT T&uuml;rk&ccedil;e Soru Bankası</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Kolektif</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Limit Yayınları</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>416</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>19 x 27</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2022</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 3, '', '', 10, 150.00, '', '2023-01-10 14:03:20', 1),
(56, 21, '216380623885983170001992214001-1.jpg', 'LGS İlk Tekrar', '<p>Derslere ve sınavlara hazırlık i&ccedil;in tasarlanmıştır.<br />\r\nM&uuml;fredata uygundur.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>LGS İlk Tekrar</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Kolektif</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Tongu&ccedil; Akademi</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>1. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>200</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>19 x 27</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2022</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 1, '', '', 10, 94.00, '', '2023-01-10 21:32:49', 1),
(57, 21, '7705236962617756380001992267001-1.jpg', 'LGS Derece Set', '<p>Derslere ve sınavlara hazırlık i&ccedil;in tasarlanmıştır.<br />\r\nM&uuml;fredata uygundur.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>LGS Derece Set</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Kolektif</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Tongu&ccedil; Akademi</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>1. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>632</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>19 x 27</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2022</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 2, '', '', 50, 194.00, '', '2023-01-10 21:18:02', 1),
(58, 23, '7253611556034035870000000710455-1.jpg', 'İlköğretim Resimli Sözlük', '<p><strong>İlk&ouml;ğretim Resimli S&ouml;zl&uuml;k, reng&acirc;renk resimli i&ccedil;eriği sayesinde İngilizcede en sık kullanılan 5000 s&ouml;zc&uuml;ğ&uuml; kolayca &ouml;ğrenmenize yardımcı olacak!</strong></p>\r\n\r\n<ul>\r\n	<li>İngilizce &ouml;ğretim programında &ouml;ğretilen İngilizce s&ouml;zc&uuml;k, deyim ve terimlerin T&uuml;rk&ccedil;e karşılıkları</li>\r\n	<li>İngilizce s&ouml;zc&uuml;klerin seslendirilişini g&ouml;steren Sesletim Kılavuzu</li>\r\n	<li>İngilizce maddebaşı s&ouml;zc&uuml;klerin hecelenişi</li>\r\n	<li>İsimlerin &ccedil;oğul bi&ccedil;imleri, fillerin &ccedil;ekim bi&ccedil;imleri, sıfatların ve zarfların &uuml;st&uuml;nl&uuml;k ve en&uuml;st&uuml;nl&uuml;k dereceleri</li>\r\n	<li>&Ccedil;oğu madde ve alt maddenin karşılık ve tanımını pekiştiren &ouml;rnekler ve T&uuml;rk&ccedil;e &ccedil;evirileri</li>\r\n	<li>Bazı maddebaşı s&ouml;zc&uuml;klerle ilgili ayrıntılı dilbilgisi a&ccedil;ıklamaları</li>\r\n	<li>Bir&ccedil;ok maddebaşı s&ouml;zc&uuml;ğ&uuml; &ouml;rneklendiren renkli resimler</li>\r\n	<li>Referans ama&ccedil;lı kullanılabilecek T&uuml;rk&ccedil;e-İngilizce b&ouml;l&uuml;m&uuml;</li>\r\n	<li>D&uuml;nya &uuml;zerindeki 197 bağımsız &uuml;lkenin bayrakları eşliğinde İngilizce ve T&uuml;rk&ccedil;e adlarının listes</li>\r\n	<br />\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>İlk&ouml;ğretim Resimli S&ouml;zl&uuml;k</li>\r\n	<li><strong>Edit&ouml;r&nbsp; &nbsp;&nbsp;</strong>Turgay Bayındır</li>\r\n	<li><strong>Yayın Y&ouml;netmeni&nbsp; &nbsp;&nbsp;</strong>S. Baha S&ouml;nmez</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Redhouse Yayınları - S&ouml;zl&uuml;kler Dizisi</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2016</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 1, '', '', 5, 60.00, '', '2023-01-11 07:58:21', 1),
(59, 23, '3915158849212708910000000482384-1.jpg', 'RusçaRusça Sözlük', '<p>30.000 kelime, 70.000 kelime grubu.</p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Rus&ccedil;aRus&ccedil;a S&ouml;zl&uuml;k</li>\r\n	<li><strong>&Ccedil;evirmen&nbsp; &nbsp;&nbsp;</strong>Ludmila Lopatina, Vladimir Lopatin</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Multilingual</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2001</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 2, '', '', 5, 47.00, '', '2023-01-10 14:13:20', 1),
(60, 19, '644271118026759690002022096001-1.jpg', 'Senin Suçun Değil', '<p>Hayatındaki sorunları d&uuml;ş&uuml;n; değersizlik duygun, sana zarar veren ilişkilerinden vazge&ccedil;emeyişin, başarısızlıkların, aynı hataları tekrar tekrar yapışın, başkalarına şefkatle yaklaşırken kendine acımasız oluşun, i&ccedil;indeki kaybolmayan &ouml;fke ve hatta kıskan&ccedil;lıkların&hellip;</p>\r\n\r\n<p>Bunları yaşamayı sen mi se&ccedil;tin? Ya da belki de ge&ccedil;mişte yaşadıkların bug&uuml;n b&ouml;yle hissetmene neden oluyor. Kendini su&ccedil;lamayı bırak, bu işleri daha k&ouml;t&uuml; hale getirmekten başka bir işe yaramaz.</p>\r\n\r\n<p>Bu kitapla birlikte ge&ccedil;mişinin karanlık dehlizlerine doğru bir yolculuğa &ccedil;ıkacağız; i&ccedil;ine doğduğun aileden, yaşadığın travmalara kadar, bug&uuml;n var olan problemlerinin ge&ccedil;mişteki izini s&uuml;receğiz. &Ccedil;ocukken alman gereken sevgi, saygı ve g&uuml;veni alamadığın zaman neler olduğunu, zehirli anne baba davranışlarının nasıl yıkıma yol a&ccedil;tığını g&ouml;recek; bazen &ouml;nemsiz sanılan k&uuml;&ccedil;&uuml;k bir travmanın uzun vadeli etkilerinin &ccedil;ok b&uuml;y&uuml;k olduğunu fark ettik&ccedil;e hafifleyeceksin.</p>\r\n\r\n<p>Bu kitap sana mucizeler vadetmiyor, hi&ccedil;bir şey m&uuml;kemmel olmayacak, ancak şu anki halinden daha&nbsp; iyi hissetmen kesinlikle m&uuml;mk&uuml;n. Beraber y&uuml;r&uuml;yeceğimiz yolun amacı bu.</p>\r\n\r\n<p><strong>Kendine bu şansı vermelisin&hellip;</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Kitap Adı&nbsp; &nbsp;&nbsp;</strong>Senin Su&ccedil;un Değil</li>\r\n	<li><strong>Yazar&nbsp; &nbsp;&nbsp;</strong>Beyhan Budak</li>\r\n	<li><strong>Yayınevi&nbsp; &nbsp;&nbsp;</strong>Sahi Kitap</li>\r\n	<li><strong>Hamur Tipi&nbsp; &nbsp;&nbsp;</strong>2. Hamur</li>\r\n	<li><strong>Sayfa Sayısı&nbsp; &nbsp;&nbsp;</strong>264</li>\r\n	<li><strong>Ebat&nbsp; &nbsp;&nbsp;</strong>14 x 21</li>\r\n	<li><strong>İlk Baskı Yılı&nbsp; &nbsp;&nbsp;</strong>2022</li>\r\n	<li><strong>Baskı Sayısı&nbsp; &nbsp;&nbsp;</strong>1. Basım</li>\r\n	<li><strong>Dil&nbsp; &nbsp;&nbsp;</strong>T&uuml;rk&ccedil;e</li>\r\n</ul>\r\n', 4, '', '', 18, 60.00, '', '2023-01-10 16:20:17', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `yorum_detay` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum_onay` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_zaman`, `yorum_detay`, `yorum_onay`, `urun_id`, `kullanici_id`) VALUES
(19, '2023-01-10 19:07:09', 'Okuduğumda beni etkileyen bir eserdi.', 1, 43, 27),
(22, '2023-01-11 07:17:49', 'iyi', 1, 44, 27);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cokluresim`
--
ALTER TABLE `cokluresim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cokluresim`
--
ALTER TABLE `cokluresim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
