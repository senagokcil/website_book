<?php require_once("header.php"); 
if($var==0){

    header("location:giris_kayit?durum=girisyap"); //giriş yapmamış olan kullanıcının hesabım sayfasına gitmesini engelliyorum.
                                                  //giriş yapmamış kullanıcıyı giris_kayit sayfasına yönlendirdim.
}?>

            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="islem" method="POST">
                                
                                <input type="hidden" name="toplamfiyat" value="<?php echo $_GET["toplamsepet"] ?>">
                                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek["kullanici_id"] ?>">
                                <input type="hidden" name="urun_adet" value="<?php echo $urunlercek["urun_adet"] ?>">
                                <input type="hidden" name="urun_id" value="<?php echo $urunlercek["urun_id"] ?>">
	                        
                                <div class="row">
                                    <div class="col-12">
                                        <h3 style="color: black;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Adres Bilgileriniz : </h3><br><h6 style="color: black;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"><?php echo $kullanicicek["kullanici_adres"] ?></h6>
                                        <h6 style="color: green;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Adres bilgilerinizi hesabım sayfasından güncelleyebilirsiniz..</h6>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-5 ml-auto">
                                    <br><h6 style="color: black;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Ödenecek Toplam Tutar : <?php echo $_GET["toplamsepet"] ?></h6>
                                        <select name="odemeturu">
                                        <option value="1">Kapıda Ödeme</option>
                                        <option value="0" >Kredi Kartı İle Ödeme</option>

                                        </select>
                                        <div class="cart-page-total">
                                        
                                            <button type="submit" class="btn btn-dark" name="alisverisbitir">ÖDEMEYE GEÇ</button>

                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php  ?>
            <!--Shopping Cart Area End-->
            <?php require_once("footer.php"); ?>