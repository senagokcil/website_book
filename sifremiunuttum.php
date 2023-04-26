<?php require_once("header.php") ?>

            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="islem.php" method="POST">
                                <div class="login-form">
                                    <h4 class="login-title">ŞİFREMİ UNUTTUM &nbsp;&nbsp;&nbsp;</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>E-Mail : </label>
                                            <input name="email" class="mb-0" type="text" placeholder="E-mail adresinizi giriniz" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="register-button mt-0" name="gonder">GÖNDER</button>
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
