<?php
error_reporting(0);
session_start();
ob_start(); //yönlendirmeler hatasız olması için kullandım.
require_once("admin/islem/baglanti.php");
require_once("function.php");

$ayar = $baglanti->prepare("SELECT * FROM ayarlar where id=?");
$ayar->execute(array(1));
$ayarcek = $ayar->fetch(PDO::FETCH_ASSOC);

$hakkimizda = $baglanti->prepare("SELECT * FROM hakkimizda where hakkimizda_id=?");
$hakkimizda->execute(array(1));
$hakkimizdacek = $hakkimizda->fetch(PDO::FETCH_ASSOC);

//giriş yapan kullanıcının bilgilerini çekmek için sorgu çağırdım.
$kullanicisor = $baglanti->prepare("SELECT * from kullanicilar where kullanici_adi=:kullanici_adi");
$kullanicisor->execute(array(
    "kullanici_adi" => $_SESSION['normalgiris']
));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);
$var = $kullanicisor->rowCount();   //var değişkeniyle kullanıcının giriş yapıp yapmadığını kontrol ettim.
//buna göre de kullanıcı sayfamda gereken işlemleri yaptım.




?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>kitaplarca.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="css/fontawesome-stars.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="css/meanmenu.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="css/venobox.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Modernizr js -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <header>
        
        <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0" style="background: url(resim/kitaplar.jpg);background-size:cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pb-sm-30 pb-xs-30">
                            <a href="index.php">
                                <h1  style="color: white; font-family:Lucida Handwriting;font-size:xx-large"><?php echo $ayarcek["baslik"] ?></h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-0 ml-sm-15 ml-xs-15">
                        <div class="header-middle-right">
                        <a href="giris_kayit"><span class="item-text" style="color: white; font-family:Lucida Handwriting;font-size:medium">GİRİŞ-KAYIT</span></a>
                            <ul class="ht-menu">

                                <li>
                                    <div class="ht-setting-trigger"><span class="item-text" style="color: white; font-family:Lucida Handwriting;font-size:larger">HESABIM</span></div>
                                    <div class="setting ht-setting">
                                        <ul class="ht-setting-list">
                                            <li><a href="kullanici"><span  style="color: black; font-family:Lucida Handwriting;font-size:larger" >Bilgilerim</span></a></li>
                                            <li><a href="siparisler"><span  style="color: black; font-family:Lucida Handwriting;font-size:larger" >Siparişlerim</span></a></li>
                                            <li><a href="cikis"><span  style="color: red; font-family:Lucida Handwriting;font-size:larger" >ÇIKIŞ YAP</span><i class="fa fa-sign-out" style="color:red"></i></a></li>
        
                                        </ul>
                                    </div>
                                </li>
                                <li class="hm-minicart">
                                    <div class="hm-minicart-trigger">
                                        <span class="item-icon"></span>
                                        <span class="item-text"  style="color: white; font-family:Lucida Handwriting;font-size:larger">SEPETİM</span>
                                    </div>
                                   
                                  
                                    <div class="minicart">
                                        <ul class="minicart-product-list">

                                            <?php
                                            //foreach döngümle sepet.php sayfamda sepetime eklediğim ürünleri listeliyorum.
                                            foreach (@$_COOKIE['sepet'] as $key => $value) { //key değeri urun_id yi tutarken value değeri adet değerini tutuyor.
                                                $urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC");
                                                $urunler->execute(array(
                                                    "urun_id" => $key
                                                ));
                                                $urunlercek = $urunler->fetch(PDO::FETCH_ASSOC);
                                                $sepettutar += ($value * $urunlercek["urun_fiyat"]);
                                            ?>

                                                <li>
                                                    <a href="single-product.html" class="minicart-product-image">
                                                        <img style="width: 50px;" src="admin/resimler/urunler/<?php echo $urunlercek["urun_resim"] ?>" alt="Li's Product Image">
                                                    </a>
                                                    <div class="minicart-product-details">
                                                        <h6><a href="single-product.html"><?php echo $urunlercek["urun_baslik"] ?></a></h6>
                                                        <span><?php echo $urunlercek["urun_fiyat"] ?>₺ x <?php echo $value ?></span>
                                                    </div>
                                                    <a href="islem?sepetsil&id=<?php echo $key ?>"><button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <p class="minicart-total">TOPLAM TUTAR<span><?php echo $sepettutar ?>₺</span></p>
                                        <div class="minicart-button">
                                            <a href="sepet" class="li-button li-button-fullwidth li-button-dark">
                                                <span>SEPETE GİT</span>
                                            </a>
                                            <a href="alisveris" class="li-button li-button-fullwidth">
                                                <span>ALIŞVERİŞİ TAMAMLA</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: orange;" class="header-top header-sticky d-none d-lg-block d-xl-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hb-menu">
                            <nav>
                                <ul>
                                    <li style="color: black; font-family:Lucida Handwriting;font-size:larger"><a href="index.php">ANASAYFA</a></li>
                                    <li style="color: black; font-family:Lucida Handwriting;font-size:larger" class="megamenu-holder"><a>KATEGORİLER</a>
                                        <ul class="megamenu hb-megamenu">
                                            <li> <a>Okuma Kitapları</a>
                                                <ul>
                                                    <?php
                                                    $kategori = $baglanti->prepare("SELECT * FROM kategori where kategori_durum=:kategori_durum and kategori_sira between 1 and 3"); //kategori_sira ya göre 1 ve 5 arası değerleri getir.
                                                    $kategori->execute(array(
                                                        "kategori_durum" => 1
                                                    ));
                                                    while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <li><a href="urunler-<?= seolink($kategoricek["kategori_adi"]) . '-' . $kategoricek["kategori_id"] ?>"><?php echo $kategoricek["kategori_adi"] ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li><a>Sınava Hazırlık</a>
                                                <ul>
                                                    <?php
                                                    $kategori = $baglanti->prepare("SELECT * FROM kategori where kategori_durum=:kategori_durum and  kategori_sira between 4 and 6");
                                                    $kategori->execute(array(
                                                        "kategori_durum" => 1
                                                    ));
                                                    while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <li><a href="urunler-<?= seolink($kategoricek["kategori_adi"]) . '-' . $kategoricek["kategori_id"] ?>"><?php echo $kategoricek["kategori_adi"] ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li><a>Eğitim</a>
                                                <ul>
                                                    <?php
                                                    $kategori = $baglanti->prepare("SELECT * FROM kategori where kategori_durum=:kategori_durum and  kategori_sira between 7 and 10");
                                                    $kategori->execute(array(
                                                        "kategori_durum" => 1
                                                    ));
                                                    while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <li><a href="urunler-<?= seolink($kategoricek["kategori_adi"]) . '-' . $kategoricek["kategori_id"] ?>"><?php echo $kategoricek["kategori_adi"] ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li style="color: black; font-family:Lucida Handwriting;font-size:larger;font-weight: 900px;"><a href="hakkimizda-sayfa">HAKKIMIZDA</a></li>
                                    
                                    <li style="color: black; font-family:Lucida Handwriting;font-size:larger"><a href="iletisim">İLETİŞİM</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Bottom Menu Area End Here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Area End Here -->
    </header>