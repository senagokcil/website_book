<?php require_once("header.php"); 

if($var==0){

    header("location:giris_kayit?durum=girisyap"); //giriş yapmamış olan kullanıcının hesabım sayfasına gitmesini engelliyorum.
                                                  //giriş yapmamış kullanıcıyı giris_kayit sayfasına yönlendirdim.
}




?>
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="admin/islem/islem.php" method="POST">
                    <div class="login-form">
                        <h4 class="login-title">KULLANICI BİLGİLERİ &nbsp;&nbsp;&nbsp;
                            <i style="color: green"><?php if (@$_GET["duzenleme"] == "basarili") {
                                                        echo " Bilgileriniz güncellendi";
                                                    } ?></i>
                            <i style="color: red"><?php if (@$_GET["duzenleme"] == "basarisiz") {
                                                        echo "Güncelleme başarısız";
                                                    } ?></i>

                        </h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <input type="hidden" name="kid" value="<?php echo $kullanicicek["kullanici_id"] ?>">
                                <label>Kullanıcı Ad - Soyad</label>
                                <input value="<?php echo $kullanicicek["kullanici_adsoyad"] ?>" name="kadsoyad" class="mb-0" type="text">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Email</label>
                                <input name="kmail" value="<?php echo $kullanicicek["kullanici_mail"] ?>" class="mb-0" type="email" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Adres</label>
                                <input name="kadres" value="<?php echo $kullanicicek["kullanici_adres"] ?>" class="mb-0" type="text" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Telefon</label>
                                <input name="ktelefon" value="<?php echo $kullanicicek["kullanici_tel"] ?>" class="mb-0" type="text" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Şifre</label>
                                <input name="ksifre" value="<?php echo $kullanicicek["kullanici_sifre"] ?>" class="mb-0" type="password" required>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0" name="kullaniciduzenle">KAYDET</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="islem.php" method="POST">
                    <div class="login-form">
                        <h4 class="login-title">KAYIT &nbsp;&nbsp;&nbsp;
                            <i style="color: red"><?php if (@$_GET["durum"] == "kullanicivar") {
                                                        echo "Böyle bir kullanıcı zaten kayıtlı !";
                                                    } ?></i>
                            <i style="color: red"><?php if (@$_GET["durum"] == "sifrehata") {
                                                        echo "Şifreler eşleşmedi !";
                                                    } ?></i>
                            <i style="color: red"><?php if (@$_GET["yuklenme"] == "basarisiz") {
                                                        echo "Kullanıcı kaydı gerçekleşemedi !";
                                                    } ?></i>
                        </h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Adınız Soyadınız</label>
                                <input name="adsoyad" class="mb-0" type="text" placeholder="Adınız ve soyadınızı giriniz" required>
                            </div>
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email</label>
                                <input name="email" class="mb-0" type="email" placeholder="Email adresinizi giriniz" required>
                            </div>
                            <div class="col-md-12 col-12 mb-20">
                                <label>Telefon Numarası</label>
                                <input name="tel" class="mb-0" type="text" placeholder="Telefon numarasını giriniz" required>
                            </div>
                            <div class="col-md-12 col-12 mb-20">
                                <label>Adres</label>
                                <input name="adres" class="mb-0" type="text" placeholder="Adresinizi giriniz" required>
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Kullanıcı Adı</label>
                                <input name="kadi" class="mb-0" type="text" placeholder="Kullanıcı adınızı giriniz" required>
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Şifre</label>
                                <input name="sifre" class="mb-0" type="password" placeholder="Şifrenizi giriniz" required>
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Şifre Tekrar</label>
                                <input name="sifretekrar" class="mb-0" type="password" placeholder="Şifrenizi giriniz" required>
                            </div>
                            <div class="col-12">
                                <button name="kayitOl" class="register-button mt-0">KAYIT OL</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
<!-- Login Content Area End Here -->
<?php require_once("footer.php") ?>