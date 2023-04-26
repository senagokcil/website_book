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
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php
                  if (@$_GET['silme']=="basarili"){ ?>
                   <h6 style="color:green">Ürün silme işlemi başarılı..</h6>
                <?php  
                }
                  elseif (@$_GET['silme']=="basarisiz"){ ?>
                    <h6 style="color:red">Ürün silme işlemi başarısız..</h6>
                <?php }
                ?>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color:black; font-family:'Lucida Sans Typewriter'; font-size:larger">ÜRÜNLER</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">

                <a href="urunler_ekle?katid=<?php echo $_GET['katid'] ?>"><button style="float:right" type="submit" class="btn btn-success">Yeni Ürün Ekle + </button></a>
                  <thead>
                    <tr>
                      <th>RESİM</th>
                      <th>BAŞLIK</th>
                      <th>MODEL</th>
                      <th>RENK</th>
                      <th>SIRA</th>
                      <th>DURUM</th>
                      <th>ADET SAYISI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $urunler = $baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id order by urun_id ASC"); //urunler_id ye göre ilk kayıt olandan son kayıt olana doğru sıralıyorum.
                    $urunler->execute(array(
                      "kategori_id"=>$_GET["katid"]
                    ));
                   while ($urunlercek = $urunler->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                      <td><img style="width:200px ;" src="resimler/urunler/<?php echo $urunlercek["urun_resim"] ?>"></td>
                      <td><?php echo $urunlercek["urun_baslik"] ?></td>
                      <td><?php echo $urunlercek["urun_model"] ?></td>
                      <td><?php echo $urunlercek["urun_renk"] ?></td>
                      <td><?php echo $urunlercek["urun_sira"] ?></td>
                      <td><?php  
                            if ($urunlercek["urun_durum"]==1){
                                echo "Aktif";
                            }
                            else{ 
                                ($urunlercek["urun_durum"]==0);
                                    echo "Pasif";
                            }
                      ?></td>
                      <td><?php echo $urunlercek["urun_adet"] ?></td>
                      <td><a href="urunler_duzenle?id=<?php echo $urunlercek['urun_id'] ?>&katid=<?php echo $urunlercek['kategori_id'] ?>"><button type="submit" class="btn btn-info">Düzenle</button></a></td>
                      <form action="islem/islem.php" method="post">
                           <input type="hidden" name="id" value="<?php echo $urunlercek['urun_id'] ?>">
                           <input type="hidden" name="resim" value="<?php echo $urunlercek['urun_resim'] ?>">
                           <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                        <td><button name="urunlersil" type="submit" class="btn btn-danger">Sil</button></td>
                      </form>
                      <td><a href="cokluresim?id=<?php echo $urunlercek["urun_id"] ?>"><button name="resimekle" class="btn btn-warning" style="color: white;">Çoklu Resim</button></a></td>
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
