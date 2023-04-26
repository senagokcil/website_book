<?php require_once("header.php");

$urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC"); //urunler_id ye göre ilk kayıt olandan son kayıt olana doğru sıralıyorum.
$urunler->execute(array(
    "urun_id" => $_GET["urun_id"]
));
($urunlercek = $urunler->fetch(PDO::FETCH_ASSOC));
$katsid = $urunlercek["kategori_id"];
?>
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <?php
                        $cokluresim = $baglanti->prepare("SELECT * FROM cokluresim where urun_id=:urun_id order by id ASC");
                        $cokluresim->execute(array(
                            'urun_id'=>$_GET['urun_id'] 
                            //htaccessteki değeri alıyorum.
                        ));
                        while ($cokluresimcek=$cokluresim->fetch(PDO::FETCH_ASSOC)) { ?>
                         <div class="lg-image">
                                <img style="height:400px;width:261px" src="admin/resimler/cokluresim/<?php echo $cokluresimcek["resim"] ?>" alt="product image">
                            </div>
                         <?php } ?>
                    </div>
                    
                    <div class="product-details-thumbs slider-thumbs-1">
                    <?php
                        $cokluresim = $baglanti->prepare("SELECT * FROM cokluresim where urun_id=:urun_id order by id ASC");
                        $cokluresim->execute(array(
                            'urun_id'=>$_GET['urun_id'] 
                            //htaccessteki değeri alıyorum.
                        ));
                        while ($cokluresimcek=$cokluresim->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="sm-image"><img style="height: 150px !important" src="admin/resimler/cokluresim/<?php echo $cokluresimcek["resim"] ?>" alt="product image thumb"></div>
                        <?php } ?>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content sp-normal-content pt-60">
                    <div class="product-info">
                        <h1 style="color:black;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"><?php echo $urunlercek["urun_baslik"] ?></h1>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2"><?php echo $urunlercek["urun_fiyat"] ?>₺</span>
                        </div>
                        <div class="single-add-to-cart">
                            <form action="islem" method="POST" class="cart-quantity">
                                <div class="quantity">
                                    <label>Adet</label>
                                    <div class="cart-plus-minus">
                                        <input name="adet" class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <input type="hidden" name="urun_id" value="<?php echo $urunlercek["urun_id"] ?>">
                                <button name="sepeteekle" class="add-to-cart" type="submit">Sepete Ekle</button>
                                <h2 style="color:green;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Stok Durumu : <?php echo $urunlercek["urun_adet"] ?></h2>
                                <input type="hidden" name="stok" value="<?php echo $urunlercek["urun_adet"] ?>">
                            </form>
                        </div>
      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Açıklama</span></a></li>
                        <li><a data-toggle="tab" href="#reviews"><span>Yorumlar</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <span><?php echo $urunlercek["urun_aciklama"] ?></span>
                </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
                <div class="product-details-manufacturer">
                    <a href="#">
                        <img src="images/product-details/1.jpg" alt="Product Manufacturer Image">
                    </a>
                    <p><span>Reference</span> demo_7</p>
                    <p><span>Reference</span> demo_7</p>
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                    <?php 
        
                    $yorum = $baglanti->prepare("SELECT * FROM yorumlar where urun_id=:urun_id and yorum_onay=:yorum_onay order by yorum_id ASC"); 
                    //where urun_id yazarak; yorumun hangi ürünün altında olacağını belirliyorum.
                    $yorum->execute(array(
                        'urun_id'=>$_GET['urun_id'], //htaccess ten gelen urun_id
                        'yorum_onay'=>1
                    ));
                   while ($yorumcek = $yorum->fetch(PDO::FETCH_ASSOC)) {
                   ?>
                        <div class="comment-author-infos pt-25">
<?php
               $yorumyapanid=$yorumcek["kullanici_id"];
               $kullanicilar = $baglanti->prepare("SELECT * FROM kullanicilar where kullanici_id=:kullanici_id");
                        $kullanicilar->execute(array(
                            'kullanici_id'=>$yorumyapanid
                        ));
                        $kullanicilarcek=$kullanicilar->fetch(PDO::FETCH_ASSOC)
?>
                            <span><?php echo $kullanicilarcek["kullanici_adsoyad"] ?></span>
                            <em><?php echo $yorumcek["yorum_detay"] ?></em>
                        </div>
                        <?php } ?>
                    </div>
                        <div class="review-btn">
                            <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">YORUM YAZ</a>
                        </div>
                        <!-- Begin Quick View | Modal Area -->
                        <div class="modal fade modal-wrapper" id="mymodal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 class="review-page-title">YORUM YAZ</h3>
                                        <div class="modal-inner-area row">
                                            <div class="col-lg-12">
                                                <div class="li-review-content">
                                                    <!-- Begin Feedback Area -->
                                                    <div class="feedback-area">
                                                        <div class="feedback">
                                                                <form action="admin/islem/islem.php" method="post">
                                                                    <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek["kullanici_id"] ?>">
                                                                    <input type="hidden" name="urunid" value="<?php echo $urunlercek["urun_id"] ?>">
                                                                <p class="feedback-form">
                                                                    <label for="feedback">YORUMUNUZ : </label>
                                                                    <textarea name="yorum" cols="45" rows="8"></textarea>
                                                                </p>
                                                                <div class="feedback-input">
                                                                    <div class="feedback-btn pb-15">
                                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">KAPAT</a>
                                                                        <button type="submit" name="yorumkaydet" class="btn btn-dark">GÖNDER</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Feedback Area End Here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Quick View | Modal Area End Here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Benzer Ürünler</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">

                        <?php
                        $urunler = $baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id and urun_durum=:urun_durum order by urun_sira ASC"); //urunler_id ye göre ilk kayıt olandan son kayıt olana doğru sıralıyorum.
                        $urunler->execute(array(
                            "kategori_id" => $katsid,
                            "urun_durum" => 1
                        ));
                        while ($urunlercek = $urunler->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div style="width: 195px;height:300px" class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="urun_detay-<?= seolink($urunlercek["urun_baslik"]) . '-' . $urunlercek["urun_id"] ?>">
                                            <img src="admin/resimler/urunler/<?php echo $urunlercek["urun_resim"] ?>" alt="Li's Product Image">
                                        </a>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <h4><a class="product_name" href="urun_detay-<?= seolink($urunlercek["urun_baslik"]) . '-' . $urunlercek["urun_id"] ?>"><?php echo $urunlercek["urun_baslik"] ?></a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2"><?php echo $urunlercek["urun_fiyat"] ?>₺</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="urun_detay-<?= seolink($urunlercek["urun_baslik"]) . '-' . $urunlercek["urun_id"] ?>">Ürüne Git</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<?php require_once("footer.php"); ?>