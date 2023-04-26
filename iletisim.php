<?php require_once("header.php") ?>
            <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
                <div class="container mb-60">
                </div>
                <div class="container">
                <div style="background-image: url(admin/resimler/hakkimizda_resim/<?php echo $hakkimizdacek["hakkimizda_resim"] ?>)">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                            <div class="contact-page-side-content">
                                <h3 class="contact-page-title">İletişim</h3>
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-fax"></i> ADRES : </h4>
                                    <p><?php echo $ayarcek["adres"] ?></p>
                                </div>
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-phone"></i> TELEFON : </h4>
                                    <p><?php echo $ayarcek["telefon"] ?></p>
                                </div>
                                <div class="single-contact-block last-child">
                                    <h4><i class="fa fa-envelope-o"></i> EMAİL : </h4>
                                    <p><?php echo $ayarcek["email"] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                            <div class="contact-form-content pt-sm-55 pt-xs-55">
                                <h3 class="contact-page-title">MESAJ BIRAKIN</h3>
                                <div class="contact-form">
                                    <form action="mail" method="post">
                                        <div class="form-group">
                                            <label>ADINIZ SOYADINIZ : <span class="required"></span></label>
                                            <input type="text" name="adsoyad" id="customername" required>
                                        </div>
                                        <div class="form-group">
                                            <label>EMAİL : <span class="required"></span></label>
                                            <input type="email" name="email" id="customerEmail" required>
                                        </div>
                                        <div class="form-group">
                                            <label>KONU : </label>
                                            <input type="text" name="konu" id="contactSubject">
                                        </div>
                                        <div class="form-group mb-30">
                                            <label>MESAJINIZ : </label>
                                            <textarea name="mesaj" id="contactMessage" ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" value="submit" class="li-btn-3" name="mesajgonder">GÖNDER</button>
                                        </div>
                                    </form>
                                </div>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Contact Main Page Area End Here -->
 <?php require_once("footer.php") ?>