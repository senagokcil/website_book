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
                   <h6 style="color:green">Kategori silme başarılı..</h6>
                <?php  
                }
                  elseif (@$_GET['silme']=="basarisiz"){ ?>
                    <h6 style="color:red">Kategori silme başarısız..</h6>
                <?php }
                ?>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color:black; font-family:'Lucida Sans Typewriter'; font-size:larger">KATEGORİLER</h3>
              </div>
              <!-- /.card-header -->
              <a href="kategori_ekle"><button type="submit" class="btn btn-success" style="float:right; width:250px">Yeni Kategori Ekle <i class="fas fa-user-plus"></i></button></a>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th></th>
                      <th>KATEGORİ AD</th>
                      <th>KATEGORİ SIRA</th>
                      <th>KATEGORİ DURUM</th>
                      <th></th>
                      <th></th>
                      <th>ÜRÜNLER</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $kategori = $baglanti->prepare("SELECT * FROM kategori order by kategori_id ASC"); //kategori_id ye göre ilk kayıt olandan son kayıt olana doğru sıralıyorum.
                    $kategori->execute();
                   while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) {
                   ?>
                    <tr>
                      <td><?php echo $kategoricek["kategori_id"] ?></td>
                      <td><?php echo $kategoricek["kategori_adi"] ?></td>
                      <td><?php echo $kategoricek["kategori_sira"] ?></td>
                      <td><?php  
                            if ($kategoricek["kategori_durum"]==1){
                                echo "Aktif";
                            }
                            else{ 
                                ($kategoricek["kategori_durum"]==0);
                                    echo "Pasif";
                            }
                      ?></td>
                      <td><a href="kategori_duzenle?id=<?php echo $kategoricek['kategori_id'] ?>"><button type="submit" class="btn btn-info">Düzenle</button></a></td>
                      <td><a href="islem/islem.php?kategorisil&id=<?php echo $kategoricek['kategori_id'] ?>"><button type="submit" class="btn btn-danger">Sil</button></a></td>
                      <td><a href="urunler?katid=<?php echo $kategoricek['kategori_id'] ?>"><button type="submit" class="btn btn-success">Git</button></a></td>
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
