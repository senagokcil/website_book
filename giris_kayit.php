<?php require_once("header.php") ?>

<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="islem.php" method="POST">
                    <div class="login-form">
                        <h4 class="login-title">GİRİŞ &nbsp;&nbsp;&nbsp;<i style="color: red"><?php if (@$_GET["durum"] == "hata") {
                                                                                                    echo "Kullanıcı adı veya parola hatalı !";
                                                                                                } ?></i></h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Kullanıcı Adı</label>
                                <input name="kadi" class="mb-0" type="text" placeholder="Kullanıcı adınızı giriniz" required>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Şifre</label>
                                <input name="sifre" class="mb-0" type="password" placeholder="Şifrenizi giriniz" required>
                            </div>
                            <div class="col-md-12 mt-10 mb-20 text-left text-md-right">
                                <a href="sifremiunuttum"> <span style="float: right;">Şifremi Unuttum</span></a>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0" name="girisYap">GİRİŞ YAP</button>
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
                                                        echo "Kullanıcı kaydı gerçekleşemedi ! Daha sonra tekrar deneyiniz";
                                                    } ?></i>
                            <i style="color: green"><?php if (@$_GET["yuklenme"] == "basarili") {
                                                        echo " 
    <script> alert('Kayıt başarılı. Giriş yapabilirsiniz...')
             document.location.href = 'giris_kayit.php';
             </script>
              ";
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