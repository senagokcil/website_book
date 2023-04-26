<?php require_once("header.php"); ?>


            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove"></th>
                                                <th class="li-product-thumbnail">RESİM</th>
                                                <th class="cart-product-name">ÜRÜN</th>
                                                <th class="li-product-price">BİRİM FİYAT</th>
                                                <th class="li-product-quantity">ADET</th>
                                                <th class="li-product-subtotal">TOPLAM TUTAR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php


//foreach döngümle sepet.php sayfamda sepetime eklediğim ürünleri listeliyorum.
foreach (@$_COOKIE['sepet'] as $key => $value) { //key değeri urun_id yi tutarken value değeri adet değerini tutuyor.
    $urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC");
    $urunler->execute(array(
        "urun_id" => $key
    ));
    $urunlercek = $urunler->fetch(PDO::FETCH_ASSOC);
?>

   <tr>

       <!-- sepetten ürün silme -->
       <td class="li-product-remove">
           <a href="islem?sepetsil&id=<?php echo $key ?>"><i class="fa fa-times"></i></a>
       </td>



       <td class="li-product-thumbnail"><a href="#"><img style="width: 150px;" src="admin/resimler/urunler/<?php echo $urunlercek["urun_resim"] ?>" alt="Li's Product Image"></a></td>
       <td class="li-product-name"><a href="#"><?php echo $urunlercek["urun_baslik"] ?></a></td>
       <td class="li-product-price"><span class="amount"><?php echo $urunlercek["urun_fiyat"] ?>₺</span></td>
       <td class="li-product-name"><a href="#"><?php echo $value?></a></td>
       <td class="product-subtotal"><span class="amount"><?php echo ($value*$urunlercek["urun_fiyat"]) ?>₺</span></td>
   </tr>
                                           


<?php

$kdv=($sepettutar*0.18);
$toplamsepet=($sepettutar+$kdv);

?>

<?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <ul>
                                                <li>Sepet Tutarı <span><?php echo $sepettutar ?>₺</span></li>
                                                <li>KDV <span><?php echo $kdv ?>₺</span></li>
                                                <li>Toplam Sepet Tutarı <span><?php echo $toplamsepet ?>₺</span></li>
                                            </ul>
                                            <a class="btn btn-dark" href="alisveris?toplamsepet=<?php echo $toplamsepet ?>">ALIŞVERİŞİ TAMAMLA</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
            <?php require_once("footer.php"); ?>