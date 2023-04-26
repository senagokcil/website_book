<?php require_once("header.php") ?>

    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <div class="about-us-wrapper pt-60 pb-40">
                <div class="container">
                    <div class="row">
                        <!-- About Text Start -->
                        <div class="col-lg-6" style="text-align: center;">
                        <img  src="admin/resimler/hakkimizda_resim/<?php echo $hakkimizdacek["hakkimizda_resim"] ?>" alt="About Us" />
                        </div>
                        <!-- About Text End -->
                        <!-- About Image Start -->
                        <div class="col-lg-5 col-md-10" style="text-align: center;">
                        
                        <div class="about-text-wrap">
                                <h2 style="color: black; font-family:Lucida Handwriting;font-size:x-large"><?php echo $hakkimizdacek["hakkimizda_baslik"] ?></h2>
                                <p><?php echo $hakkimizdacek["hakkimizda_detay"] ?></p>
                                <h4 style="color: black; font-family:Lucida Handwriting;font-size:x-large">Vizyonumuz</h4>
                                <p><?php echo $hakkimizdacek["hakkimizda_vizyon"] ?></p>
                                <h4 style="color: black; font-family:Lucida Handwriting;font-size:x-large">Misyonumuz</h4>
                                <p><?php echo $hakkimizdacek["hakkimizda_misyon"] ?></p>

                            </div>
                            
                        </div>
                        <!-- About Image End -->
                    </div>
                </div>
            </div>
          <?php require_once("footer.php") ?>
        
         