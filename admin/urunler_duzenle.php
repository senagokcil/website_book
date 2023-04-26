<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SENAELİF | E-TİCARET SİTESİ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php 
require_once("sidebar.php"); 
require_once("islem/baglanti.php");

$urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id");
$urunler->execute(array(
'urun_id'=>$_GET["id"]  

));
$urunlercek = $urunler->fetch(PDO::FETCH_ASSOC);
?>

<div class="wrapper">

  
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">


        <div class="card card-primary col-md-12">
              <div class="card-header">
                <h3 class="card-title">ÜRÜN EKLE</h3></div>
                  <?php
                  if (@$_GET['yuklenme']=="basarili"){ ?>
                   <h6 style="color:green">Yükleme işlemi başarılı..</h6>
                <?php  
                }
                  elseif (@$_GET['yuklenme']=="basarisiz"){ ?>
                    <h6 style="color:red">Yükleme işlemi başarısız..</h6>
                <?php }?>
  
              <!-- form start -->
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <input type="hidden" name="id" value="<?php echo $urunlercek['urun_id'] ?>">
            <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control select2" name="kategori" style="width: 100%;">
                  <!-- kategori kısmına kategorilerimi çekmek için sorgumu çağırıyorum. -->
                  <?php 
                  $katid=$urunlercek["kategori_id"];
                    $kategori = $baglanti->prepare("SELECT * FROM kategori order by kategori_id ASC");
                    $kategori->execute();
                   while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) {
                    $kategoriid=$kategoricek["kategori_id"];
                   ?>
                   <!-- kategoriler sayfasındaki git butonuna basıldığında gelen id değeriyle,
                        ürünler tablomdaki kategori_id değeri birbirine eşitse o kategoriyi kategori kısmına aldık. artık ürün seçilen kategoriye eklenecek.-->
                    <option <?php 
                        if($katid==$kategoriid){
                            echo "selected";
                        }?> value="<?php echo $kategoriid ?>"> <?php echo $kategoricek["kategori_adi"] ?></option>
                           <?php } ?>
                  </select>
                </div>  
                <input type="hidden" name="eskiresim" value="<?php echo $urunlercek['urun_resim'] ?>">
                <label for="exampleInputText">Güncel Resim : </label>
                <img style="width: 150px;" src="resimler/urunler/<?php echo $urunlercek['urun_resim']; ?>" >
                  <div class="form-group">
                    <label>Resim</label>
                    <input type="file" name="uresim" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Ürün Başlık</label>
                    <input value="<?php echo $urunlercek["urun_baslik"] ?>" type="text" name="ubaslik" class="form-control" placeholder="Ürün başlığı giriniz">
                    </div>
                    <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                    <label for="exampleInputText">Ürün Açıklama</label>
                    <textarea class="ckeditor" id="editor1" name="uaciklama"><?php echo $urunlercek["urun_aciklama"] ?></textarea>
                    <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Model</label>
                    <input value="<?php echo $urunlercek["urun_model"] ?>" type="text" name="umodel" class="form-control" placeholder="Ürünün modelini giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Renk</label>
                    <input value="<?php echo $urunlercek["urun_renk"] ?>" type="text" name="urenk" class="form-control" placeholder="Ürünün rengini giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Fiyat</label>
                    <input value="<?php echo $urunlercek["urun_fiyat"] ?>" type="text" name="ufiyat" class="form-control" placeholder="Ürünün fiyatını giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Adet</label>
                    <input value="<?php echo $urunlercek["urun_adet"] ?>" type="text" name="uadet" class="form-control" placeholder="Ürünün adedini giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Sıra</label>
                    <input value="<?php echo $urunlercek["urun_sira"] ?>" type="text" name="usira" class="form-control" placeholder="Ürün sıra numarası giriniz">
                  </div>
                  <div class="form-group">
                  <label>Ürün Durumu</label>
                  <select class="form-control select2" name="udurum" style="width: 100%;">
                    <option value="1" <?php if($urunlercek["urun_durum"]=="1"){ echo "selected";} ?>>Aktif</option>
                    <option value="0" <?php if($urunlercek["urun_durum"]=="0"){ echo "selected";} ?>>Pasif</option>
                  </select>
                </div>   
                <div class="card-footer">
                  <button type="submit" name="urunduzenle" class="btn btn-success">Kaydet</button>
                </div>
              </form>
            </div>
        </div>
      </div>
      <div class="row">


</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
</body>
</html>
