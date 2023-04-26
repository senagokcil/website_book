<div class="slider-with-banner" >
    <div class="container">
        <div class="row"  >
            <div class="col-lg-8 col-md-8">
                <div class="slider-area" style="width: 1200px; height:390px">
                    <div class="slider-active owl-carousel">
                        <?php
                        $slider = $baglanti->prepare("SELECT * FROM slider where slider_durum=:slider_durum and slider_banner=:slider_banner order by slider_sira ASC");
                        $slider->execute(array(
                            'slider_durum' => 1,   //aktif olanları getir.
                            'slider_banner' => 1  //slider olanları getir.
                        ));
                        while ($slidercek = $slider->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                            <div style="background-image: url(admin/resimler/slider/<?php echo $slidercek["slider_resim"] ?>);background-size: 1200px 390px;height:450px;background-position: top;" class="single-slide align-center-left  animation-style-01 bg-1">
                                <div class="slider-progress"></div>
                                <div style="bottom: 0;" class="slider-content">
                                <h5 style="color: black; font-family:Lucida Handwriting;font-size:larger"><?php echo $slidercek["slider_aciklama"] ?></h5>
                                <h2 style="color: black; font-family:Lucida Handwriting;font-size:larger"><?php echo $slidercek["slider_baslik"] ?></h2>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
            <?php
                        $slider = $baglanti->prepare("SELECT * FROM slider where slider_durum=:slider_durum and slider_banner=:slider_banner order by slider_sira ASC");
                        $slider->execute(array(
                            'slider_durum' => 1,   //aktif olanları getir.
                            'slider_banner' => 0  //banner olanları getir.
                        ));
                        while ($slidercek = $slider->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                <div class="li-banner">
                        <img style="width: 126px; height: 225px;" src="admin/resimler/slider/<?php echo $slidercek["slider_resim"] ?>" alt="">
                    </a>
                </div>
    
                <?php } ?>
            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>