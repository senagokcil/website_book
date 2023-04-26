<?php require_once("header.php"); 
if($var==0){

    header("location:giris_kayit?durum=girisyap"); 
                                                  
}
?>

<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th class="li-product-remove">SİPARİŞ TARİHİ</th>
                                    <th class="li-product-thumbnail">RESİM</th>
                                    <th class="cart-product-name">ÜRÜN</th>
                                    <th class="li-product-price">ÖDENEN TUTAR</th>
                                    <th class="li-product-quantity">ADET</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $siparis = $baglanti->prepare("SELECT * FROM siparisler where kullanici_id=:kullanici_id order by siparis_zaman DESC"); //kullanici_id yi alıyorum ki her kullanıcı kendi siparişini görsün.
                                $siparis->execute(array(
                                    "kullanici_id" => $kullanicicek["kullanici_id"],
                                   
                                ));
                                while ($sipariscek = $siparis->fetch(PDO::FETCH_ASSOC)) {
                                    $alinanurunid = $sipariscek["urun_id"];

                                    $urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id"); 
                                    $urunler->execute(array(
                                        "urun_id" => $alinanurunid
                                    ));
                                    $urunlercek = $urunler->fetch(PDO::FETCH_ASSOC)

                                ?>

                                    <?php

                                    $kdv = ($sepettutar * 0.18);
                                    $toplamsepet = ($sepettutar + $kdv);

                                    ?>
                                    <tr>
                                        <td class="li-product-name"><a href="#"><?php echo $sipariscek["siparis_zaman"] ?></a></td>
                                        <td class="li-product-thumbnail"><a href="#"><img style="width: 150px;" src="admin/resimler/urunler/<?php echo $urunlercek["urun_resim"] ?>" alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a href="#"><?php echo $urunlercek["urun_baslik"] ?></a></td>
                                        <td class="li-product-price"><span class="amount"><?php echo $toplamsepet ?>₺</span></td>
                                        <td class="li-product-name"><a href="#"><?php echo $sipariscek["urun_adet"] ?></a></td>
                                    </tr>



                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->
<?php require_once("footer.php"); ?>