<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Giriş</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="card" >
    <div class="card-body login-card-body"style="background-color: black;">    
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><h1 style="color: white; font-family:monospace"> - Tech Site - </h1></a>
  </div>
  <!-- /.login-logo -->
  
    
    <?php
    
    if(@$_GET["durum"]=="hata"){?> 
        <p class="login-box-msg" style="color: red; font-family:monospace">Kullanıcı adı veya parola hatalı !</p>
   <?php }
    else{?>
      <p class="login-box-msg" style="color: white; font-family:monospace">Yönetim Paneline Giriş</p>

   <?php } ?>
    
    

      <form action="islem/islem.php" method="post">
        <div class="input-group mb-3">
          <input name="kadi" type="text" class="form-control" placeholder="Kullanıcı Adı">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="sifre" type="password" class="form-control" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button name="girisyap" type="submit" class="btn btn-secondary btn-block" style="color: white; font-family:monospace">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  </div>
</div>
<!-- /.login-box -->


</body>
</html>
