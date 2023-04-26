<?php
require_once("islem/baglanti.php");
?>

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
  
<?php require_once("sidebar.php"); ?>
<div class="wrapper">

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php
                  if (@$_GET['silme']=="basarili"){ ?>
                   <h6 style="color:green">Yorum silme başarılı..</h6>
                <?php  
                }
                  elseif (@$_GET['silme']=="basarisiz"){ ?>
                    <h6 style="color:red">Yorum silme başarısız..</h6>
                <?php }
                ?>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color:black; font-family:'Lucida Sans Typewriter'; font-size:larger">YORUMLAR</h3>
              </div>
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th></th>
                      <th>YORUM YAPAN</th>
                      <th>YORUM YAPILAN ÜRÜN</th>
                      <th>YORUM</th>
                      <th>YORUM ZAMAN</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $yorum = $baglanti->prepare("SELECT * FROM yorumlar order by yorum_id ASC"); //yorum_id ye göre ilk kayıt olandan son kayıt olana doğru sıralıyorum.
                    $yorum->execute();
                   while ($yorumcek = $yorum->fetch(PDO::FETCH_ASSOC)) {
                   ?>
                    <tr>
                      <td><?php echo $yorumcek["yorum_id"] ?></td>
<?php
$yorumyapanid=$yorumcek["kullanici_id"];
$kullanicilar = $baglanti->prepare("SELECT * FROM kullanicilar where kullanici_id=:kullanici_id");
$kullanicilar->execute(array(
    'kullanici_id'=>$yorumyapanid
    ));
    $kullanicilarcek=$kullanicilar->fetch(PDO::FETCH_ASSOC)
?>
                      <td><?php echo $kullanicilarcek["kullanici_adi"] ?></td>
<?php
$yorumyapılanurun=$yorumcek["urun_id"];
$urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id");
$urunler->execute(array(
    'urun_id'=>$yorumyapılanurun
    ));
    $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)
?>
                       <td><?php echo $urunlercek["urun_baslik"] ?></td>
                      <td><?php echo $yorumcek["yorum_detay"] ?></td>
                      <td><?php echo $yorumcek["yorum_zaman"] ?></td>
                      <form action="islem/islem.php" method="POST" >
                        <input type="hidden" name="yorumid" value="<?php echo $yorumcek["yorum_id"] ?>" >
                      <td><button <?php if($yorumcek["yorum_onay"]==1){
                        echo "disabled";
                      }
                      ?>
                      name="yorumonayla" type="submit" class="btn btn-success">Onayla</button></td>
                      </form>
                      <td><a href="islem/islem.php?yorumsil&id=<?php echo $yorumcek['yorum_id'] ?>"><button type="submit" class="btn btn-danger">Sil</button></a></td>
                     
                    </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        </div>
       
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
</body>
</html>
