<?php require_once("header.php"); ?>
<?php if (@$_GET["siparis"] == "olusturuldu") {
    echo " 
    <script> alert('Siparişiniz alındı. Siparişinizi hesabımdaki siparişlerim kısmından görebilirsiniz.')
             document.location.href = 'index.php';
             </script>
              ";
    } ?>
    <?php if (@$_GET["yuklenme"] == "basarili") {
    echo " 
    <script> alert('Yorumunuz iletildi. Onaylandığında görüntüleyebilirsiniz.')
             document.location.href = 'index.php';
             </script>
              ";
    } ?>


 <?php require_once("slider.php"); ?>
            <?php require_once("footer.php"); ?>
  