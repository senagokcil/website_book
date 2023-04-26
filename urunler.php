<?php require_once("header.php"); ?>
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    <?php
                                    $urunler = $baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id and urun_durum=:urun_durum and urun_adet>0 order by urun_sira ASC"); 
                                    //kategori_id si headerdaki kategorilerden getle gelen kategori_id ye eşit olanları çağırdık ve urun adedi 0 dan büyük olanları çağırdık.
                                    $urunler->execute(array(
                                        "kategori_id" => $_GET["kategori_id"],
                                        "urun_durum" => 1
                                    ));
                                    while ($urunlercek = $urunler->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
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
                                                            <span class="new-price"><?php echo $urunlercek["urun_fiyat"] ?>₺</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a href="urun_detay-<?= seolink($urunlercek["urun_baslik"]) . '-' . $urunlercek["urun_id"] ?>">ÜRÜNE GİT</a></li>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
        </div>
    </div>
</div>
<!-- Content Wraper Area End Here -->
<?php require_once("footer.php"); ?>