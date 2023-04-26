<?php
session_start();
require_once ('baglanti.php');

if (isset($_POST["ayarKaydet"])) {
  
  $duzenle = $baglanti->prepare("UPDATE ayarlar SET 
  
  baslik=:baslik,
  aciklama=:aciklama,
  anahtar_kelime=:anahtar_kelime
WHERE id=1;
  
  ");   //ayarlar tablosunda güncelleme yapıyorum

$update = $duzenle->execute(array(
  'baslik'=>$_POST['baslik'],
  'aciklama'=>$_POST['aciklama'],
  'anahtar_kelime'=>$_POST['anahtar_kelime']
));
if($update){
  header('Location:../ayarlar.php?yuklenme=basarili');  //(../) sayesinde üst klasöre çıkıyorum
}
else{
  header('Location:../ayarlar.php?yuklenme=basarisiz'); //url kısmında mesaj veriyorum 
}
}


if (isset($_POST["iletisimkaydet"])) {
  
  $duzenle = $baglanti->prepare("UPDATE ayarlar SET
  
  telefon=:telefon,
  adres=:adres,
  email=:email,
  mesai=:mesai
WHERE id=1;
  
  ");

$update = $duzenle->execute(array(
  'telefon'=>$_POST['telefon'],
  'adres'=>$_POST['adres'],
  'email'=>$_POST['email'],
  'mesai'=>$_POST['mesai']
));
if($update){
  header('Location:../iletisim.php?yuklenme=basarili');
}
else{
  header('Location:../iletisim.php?yuklenme=basarisiz');
}
}

if (isset($_POST["sosyalmedyakaydet"])) {
  
  $duzenle = $baglanti->prepare("UPDATE ayarlar SET 
  
  facebook=:facebook,
  instagram=:instagram,
  twitter=:twitter,
  youtube=:youtube
WHERE id=1;
  
  ");   //ayarlar tablosunda güncelleme yapıyorum

$update = $duzenle->execute(array(
  'facebook'=>$_POST['facebook'],
  'instagram'=>$_POST['instagram'],
  'twitter'=>$_POST['twitter'],
  'youtube'=>$_POST['youtube']

));
if($update){
  header('Location:../sosyalmedya.php?yuklenme=basarili');
}
else{
  header('Location:../sosyalmedya.php?yuklenme=basarisiz');
}
}

if (isset($_POST["logokaydet"])){
  $uploads_dir = '../resimler/logo';    //logoyu yükleyeceğimiz yer
  @$tmp_name = $_FILES["logo"] ["tmp_name"];   //post la gelen logonun ismini alıyorum
  @$name = $_FILES["logo"] ["name"];   //logo ve ismini alıyorum

  $sayi = rand(1,1000000);
  $sayi2 = rand(1,1000000);
  $sayi3 = rand(10000,2000000);   //resimin ismi için rastgele sayılar belirliyorum

  $sayilar = $sayi.$sayi2.$sayi3;
  $resimyolu = $sayilar.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");   //resim yüklemeyi gerçekleştiriyorum

  $duzenle = $baglanti->prepare("UPDATE ayarlar SET
  
  logo=:logo

WHERE id=1;
  
  ");

$update = $duzenle->execute(array(
  'logo'=>$resimyolu
));
if($update){
  $resimsil = $_POST['eskilogo'];
  unlink("../resimler/logo/$resimsil");   //eski logoyu klasörümden siliyorum

  header('Location:../ayarlar.php?yuklenme=basarili');
}
else{
  header('Location:../ayarlar.php?yuklenme=basarisiz');
}

}


if (isset($_POST["hakkimizdakaydet"])) {

  if ($_FILES['hakkimizda_resim'] ["size"]>0) {   //eğer resmim geliyorsa..
    $uploads_dir = '../resimler/hakkimizda_resim';           //resimi yükleyeceğimiz yer
    @$tmp_name = $_FILES["hakkimizda_resim"] ["tmp_name"];   //post la gelen resmin ismini alıyorum
    @$name = $_FILES["hakkimizda_resim"] ["name"];          //resmi ve ismini alıyorum
  
    $sayi = rand(1,1000000);
    $sayi2 = rand(1,1000000);
    $sayi3 = rand(10000,2000000);   //resimin ismi için rastgele sayılar belirliyorum
  
    $sayilar = $sayi.$sayi2.$sayi3;
    $resimyolu = $sayilar.$name;
  
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");   

    $duzenle = $baglanti->prepare("UPDATE hakkimizda SET 
  
    hakkimizda_baslik=:hakkimizda_baslik,
    hakkimizda_detay=:hakkimizda_detay,
    hakkimizda_vizyon=:hakkimizda_vizyon,
    hakkimizda_misyon=:hakkimizda_misyon,
    hakkimizda_resim=:hakkimizda_resim

  
  WHERE hakkimizda_id=1;
    
    ");   //hakkimizda tablosunda güncelleme yapıyorum
  
  $update = $duzenle->execute(array(
    'hakkimizda_baslik'=>$_POST['hakkimizda_baslik'],
    'hakkimizda_detay'=>$_POST['hakkimizda_detay'],
    'hakkimizda_vizyon'=>$_POST['hakkimizda_vizyon'],
    'hakkimizda_misyon'=>$_POST['hakkimizda_misyon'],
    'hakkimizda_resim'=>$resimyolu

  
  ));
  if($update){
    $resimsil = $_POST['eskiresim'];
    unlink("../resimler/hakkimizda_resim/$resimsil"); 
    header('Location:../hakkimizda.php?yuklenme=basarili');
  }
  else{
    header('Location:../hakkimizda.php?yuklenme=basarisiz');
  }
  
  }
  else{     //resim yüklemeden de diğer işlemleri yapabilmek için..
    $duzenle = $baglanti->prepare("UPDATE hakkimizda SET 
  
    hakkimizda_baslik=:hakkimizda_baslik,
    hakkimizda_detay=:hakkimizda_detay,
    hakkimizda_vizyon=:hakkimizda_vizyon,
    hakkimizda_misyon=:hakkimizda_misyon

  WHERE hakkimizda_id=1;
    
    ");   //hakkimizda tablosunda güncelleme yapıyorum
  
  $update = $duzenle->execute(array(
    'hakkimizda_baslik'=>$_POST['hakkimizda_baslik'],
    'hakkimizda_detay'=>$_POST['hakkimizda_detay'],
    'hakkimizda_vizyon'=>$_POST['hakkimizda_vizyon'],
    'hakkimizda_misyon'=>$_POST['hakkimizda_misyon']

  
  ));
  if($update){
    header('Location:../hakkimizda.php?yuklenme=basarili');
  }
  else{
    header('Location:../hakkimizda.php?yuklenme=basarisiz');
  }
  }
  }

  if (isset($_POST["girisyap"])) {
    $kadi = htmlspecialchars($_POST["kadi"]);   //htmlspecialchars ile kodlarda zararlı şey varsa zararsıza çevirir. Güvenli hale gelir.
    $sifre = htmlspecialchars($_POST["sifre"]);
    $gizlisifre = md5($sifre);
  
 
  
  $kullanicisor = $baglanti->prepare("SELECT * from kullanicilar where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre
  and kullanici_yetki=:kullanici_yetki");
  $kullanicisor->execute(array(
    "kullanici_adi"=>$kadi,
    "kullanici_sifre"=>$gizlisifre,
    "kullanici_yetki"=>2
  )) ;

  $var = $kullanicisor->rowCount();   //rowcount : veritabanında böyle bir bilgi var mı bakıyorum.
  if($var >0){
   $_SESSION["girisbelgesi"]=$kadi;
   header("Location: ../index?durum=basarili");
  }  
  else{
  header("Location: ../login?durum=hata");
  }
  }

  if(isset($_POST["uyelerkaydet"])){

    $adsoyad = htmlspecialchars($_POST["kadsoyad"]);
    $kadi = htmlspecialchars($_POST["kadi"]);   //htmlspecialchars ile kodlarda zararlı şey varsa zararsıza çevirir. Güvenli hale gelir.
    $sifre = htmlspecialchars($_POST["ksifre"]);
    $gizlisifre = md5($sifre);
    $adres = htmlspecialchars($_POST["kadres"]);
    $tel = htmlspecialchars($_POST["ktel"]);

    $kullanicisor = $baglanti->prepare("SELECT * from kullanicilar where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki");
    $kullanicisor->execute(array(
      "kullanici_adi"=>$kadi,
      "kullanici_yetki"=>2
    )) ;
  
    $var = $kullanicisor->rowCount();
    if($var>0){
      header("Location:../uyeler_ekle?durum=kullanicivar");
    }
    else{


    $uploads_dir = '../resimler/kullanicilar';           //resimi yükleyeceğimiz yer
    @$tmp_name = $_FILES["kresim"] ["tmp_name"];   //post la gelen resmin ismini alıyorum
    @$name = $_FILES["kresim"] ["name"];          //resmi ve ismini alıyorum
  
    $sayi = rand(1,1000000);
    $sayi2 = rand(1,1000000);
    $sayi3 = rand(10000,2000000);   //resimin ismi için rastgele sayılar belirliyorum
  
    $sayilar = $sayi.$sayi2.$sayi3;
    $resimyolu = $sayilar.$name;
  
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

    $kullanicikaydet = $baglanti->prepare("INSERT into kullanicilar SET 
    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_adi=:kullanici_adi,
    kullanici_sifre=:kullanici_sifre,
    kullanici_adres=:kullanici_adres,
    kullanici_tel=:kullanici_tel,
    kullanici_yetki=:kullanici_yetki,
    kullanici_resim=:kullanici_resim


    ");
  
  $insert = $kullanicikaydet->execute(array(
    'kullanici_adsoyad'=>$adsoyad,
    'kullanici_adi'=>$kadi,
    'kullanici_sifre'=>$gizlisifre,
    'kullanici_adres'=>$adres,
    'kullanici_tel'=>$tel,
    'kullanici_yetki'=>2,
    'kullanici_resim'=>$resimyolu

  
  ));
  if($insert){
    header('Location:../uyeler?yuklenme=basarili');
  }
  else{
    header('Location:../uyeler?yuklenme=basarisiz');
  }
  }
  }

  if(isset($_GET["kullanicisil"])){
    
    $kullanicisil = $baglanti->prepare("DELETE from kullanicilar where kullanici_id=:kullanici_id");

    $kullanicisil->execute(array(
      "kullanici_id"=>$_GET["id"]
    ));

    if ($kullanicisil) {
      header("Location:../uyeler?durum=basarili");
    }
    else {
      header("Location:../uyeler?durum=basarisiz");
    }
  }

  if(isset($_POST["kategorikaydet"])){
    $kategorikaydet = $baglanti->prepare("INSERT into kategori SET
    kategori_adi=:kategori_adi,
    kategori_sira=:kategori_sira,
    kategori_durum=:kategori_durum
    ");
  
  $insert = $kategorikaydet->execute(array(
    'kategori_adi'=>$_POST["kadi"],
    'kategori_sira'=>$_POST["ksira"],
    'kategori_durum'=>$_POST["kdurum"]

  ));
  if($insert){
    header('Location:../kategori?yuklenme=basarili');
  }
  else{
    header('Location:../kategori?yuklenme=basarisiz');
  }
  }
  if(isset($_GET["kategorisil"])){
    
    $kategorisil = $baglanti->prepare("DELETE from kategori where kategori_id=:kategori_id");

    $kategorisil->execute(array(
      "kategori_id"=>$_GET["id"]
    ));

    if ($kategorisil) {
      header("Location:../kategori?silme=basarili");
    }
    else {
      header("Location:../kategori?silme=basarisiz");
    }
  }

  if(isset($_POST["kategoriduzenle"])){
   $katid=$_POST["katid"];
    $duzenle = $baglanti->prepare("UPDATE kategori SET 
 
    kategori_adi=:kategori_adi,
    kategori_sira=:kategori_sira,
    kategori_durum=:kategori_durum
  WHERE kategori_id=$katid
    
    ");  
  
  $update = $duzenle->execute(array(
    'kategori_adi'=>$_POST["kadi"],
    'kategori_sira'=>$_POST["ksira"],
    'kategori_durum'=>$_POST["kdurum"]
  
  ));
  if($update){
    header('Location:../kategori.php?yuklenme=basarili');
  }
  else{
    header('Location:../kategori.php?yuklenme=basarisiz');
  }
  }

  if(isset($_POST["sliderkaydet"])){
   
    $uploads_dir = '../resimler/slider';           //resimi yükleyeceğimiz yer
    @$tmp_name = $_FILES["sresim"] ["tmp_name"];   //post la gelen resmin ismini alıyorum
    @$name = $_FILES["sresim"] ["name"];          //resmi ve ismini alıyorum
  
    $sayi = rand(1,1000000);
    $sayi2 = rand(1,1000000);
    $sayi3 = rand(10000,2000000);   //resimin ismi için rastgele sayılar belirliyorum
  
    $sayilar = $sayi.$sayi2.$sayi3;
    $resimyolu = $sayilar.$name;
  
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
   $sliderkaydet = $baglanti->prepare("INSERT into slider SET
    slider_baslik=:slider_baslik,
    slider_aciklama=:slider_aciklama,
    slider_sira=:slider_sira,
    slider_durum=:slider_durum,
    slider_resim=:slider_resim,
    slider_banner=:slider_banner
    ");
  
  $insert = $sliderkaydet->execute(array(
    'slider_baslik'=>$_POST["sbaslik"],
    'slider_aciklama'=>$_POST["saciklama"],
    'slider_sira'=>$_POST["ssira"],
    'slider_durum'=>$_POST["sdurum"],
    'slider_resim'=>$resimyolu,
    'slider_banner'=>$_POST["sbanner"]

  ));
  if($insert){
    header('Location:../slider?yuklenme=basarili');
  }
  else{
    header('Location:../slider?yuklenme=basarisiz');
  }
  }
  
  if(isset($_POST["sliderduzenle"])){
    $sliderid=$_POST["id"];
    
    $uploads_dir = '../resimler/slider';           //resimi yükleyeceğimiz yer
    @$tmp_name = $_FILES["sresim"] ["tmp_name"];   //post la gelen resmin ismini alıyorum
    @$name = $_FILES["sresim"] ["name"];          //resmi ve ismini alıyorum
  
    $sayi = rand(1,1000000);
    $sayi2 = rand(1,1000000);
    $sayi3 = rand(10000,2000000);   //resimin ismi için rastgele sayılar belirliyorum
  
    $sayilar = $sayi.$sayi2.$sayi3;
    $resimyolu = $sayilar.$name;
  
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
    if ($_FILES['sresim'] ["size"]>0){
    $duzenle = $baglanti->prepare("UPDATE slider SET 
  
    slider_baslik=:slider_baslik,
    slider_aciklama=:slider_aciklama,
    slider_sira=:slider_sira,
    slider_durum=:slider_durum,
    slider_resim=:slider_resim,
    slider_banner=:slider_banner
   WHERE slider_id=$sliderid
     
     ");  
   
   $update = $duzenle->execute(array(
    'slider_baslik'=>$_POST["sbaslik"],
    'slider_aciklama'=>$_POST["saciklama"],
    'slider_sira'=>$_POST["ssira"],
    'slider_durum'=>$_POST["sdurum"],
    'slider_resim'=>$resimyolu,
    'slider_banner'=>$_POST["sbanner"]
   
   ));
   if($update){
    $resimsil = $_POST['eskiresim'];
    unlink("../resimler/slider/$resimsil"); 
     header('Location:../slider.php?yuklenme=basarili');
   }
   else{
     header('Location:../slider.php?yuklenme=basarisiz');
   }
   }
  
  else{
    $duzenle = $baglanti->prepare("UPDATE slider SET 
  
    slider_baslik=:slider_baslik,
    slider_aciklama=:slider_aciklama,
    slider_sira=:slider_sira,
    slider_durum=:slider_durum,
    slider_banner=:slider_banner
   WHERE slider_id=$sliderid
     
     ");  
   
   $update = $duzenle->execute(array(
    'slider_baslik'=>$_POST["sbaslik"],
    'slider_aciklama'=>$_POST["saciklama"],
    'slider_sira'=>$_POST["ssira"],
    'slider_durum'=>$_POST["sdurum"],
    'slider_banner'=>$_POST["sbanner"]
   
   ));
   if($update){
     header('Location:../slider.php?yuklenme=basarili');
   }
   else{
     header('Location:../slider.php?yuklenme=basarisiz');
   }
   }
  }
  if(isset($_GET["slidersil"])){
    
    $slidersil = $baglanti->prepare("DELETE from slider where slider_id=:slider_id");

    $slidersil->execute(array(
      "slider_id"=>$_GET["id"]
    ));

    if ($slidersil) {
      $resimsil = $_POST['eskiresim'];
      unlink("../resimler/slider/$resimsil"); 
      header("Location:../slider?silme=basarili");
    }
    else {
      header("Location:../slider?silme=basarisiz");
    }
  }
 




  if(isset($_POST["urunlerkaydet"])){
    $yonlendir=$_POST['katsid'];
   
    $uploads_dir = '../resimler/urunler';           //resimi yükleyeceğimiz yer
    @$tmp_name = $_FILES["uresim"] ["tmp_name"];   //post la gelen resmin ismini alıyorum
    @$name = $_FILES["uresim"] ["name"];          //resmi ve ismini alıyorum
  
    $sayi = rand(1,1000000);
    $sayi2 = rand(1,1000000);
    $sayi3 = rand(10000,2000000);   //resimin ismi için rastgele sayılar belirliyorum
  
    $sayilar = $sayi.$sayi2.$sayi3;
    $resimyolu = $sayilar.$name;
  
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

   $urunlerkaydet = $baglanti->prepare("INSERT into urunler SET
    urun_resim=:urun_resim,
    kategori_id=:kategori_id,
    urun_baslik=:urun_baslik,
    urun_aciklama=:urun_aciklama,
    urun_model=:urun_model,
    urun_renk=:urun_renk,
    urun_fiyat=:urun_fiyat,
    urun_adet=:urun_adet,
    urun_sira=:urun_sira,
    urun_durum=:urun_durum
    
    ");
  
  $insert = $urunlerkaydet->execute(array(
    'urun_resim'=>$resimyolu,
    'kategori_id'=>$_POST["kategori"],
    'urun_baslik'=>$_POST["ubaslik"],
    'urun_aciklama'=>$_POST["uaciklama"],
    'urun_model'=>$_POST["umodel"],
    'urun_renk'=>$_POST["urenk"],
    'urun_fiyat'=>$_POST["ufiyat"],
    'urun_adet'=>$_POST["uadet"],
    'urun_sira'=>$_POST["usira"],
    'urun_durum'=>$_POST["udurum"]
    
  ));
	if ($insert) {

		header("Location:../urunler?katid=$yonlendir&yuklenme=basarili");
	}
	else{
		header("Location:../urunler?katid=$yonlendir&yuklenme=basarisiz");
	}
  }

  
  if(isset($_POST["urunduzenle"])){
    $yonlendir=$_POST['katsid'];

    $urun_id=$_POST['id'];
    
    $uploads_dir = '../resimler/urunler';           //resimi yükleyeceğimiz yer
    @$tmp_name = $_FILES["uresim"] ["tmp_name"];   //post la gelen resmin ismini alıyorum
    @$name = $_FILES["uresim"] ["name"];          //resmi ve ismini alıyorum
  
    $sayi = rand(1,1000000);
    $sayi2 = rand(1,1000000);
    $sayi3 = rand(10000,2000000);   //resimin ismi için rastgele sayılar belirliyorum
  
    $sayilar = $sayi.$sayi2.$sayi3;
    $resimyolu = $sayilar.$name;
  
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
    if ($_FILES['uresim'] ["size"]>0){
    $duzenle = $baglanti->prepare("UPDATE urunler SET 
  
    kategori_id=:kategori_id,
    urun_baslik=:urun_baslik,
    urun_aciklama=:urun_aciklama,
    urun_model=:urun_model,
    urun_renk=:urun_renk,
    urun_fiyat=:urun_fiyat,
    urun_adet=:urun_adet,
    urun_sira=:urun_sira,
    urun_durum=:urun_durum,
    urun_resim=:urun_resim
   WHERE urun_id=$urun_id
     
     ");  
   
   $update = $duzenle->execute(array(
    'kategori_id'=>$_POST["kategori"],
    'urun_baslik'=>$_POST["ubaslik"],
    'urun_aciklama'=>$_POST["uaciklama"],
    'urun_model'=>$_POST["umodel"],
    'urun_renk'=>$_POST["urenk"],
    'urun_fiyat'=>$_POST["ufiyat"],
    'urun_adet'=>$_POST["uadet"],
    'urun_sira'=>$_POST["usira"],
    'urun_durum'=>$_POST["udurum"],
    'urun_resim'=>$resimyolu
   
   ));
		if ($update) {

			$resimsil=$_POST['eskiresim'];
			unlink("../resimler/urunler/$resimsil");

			header("Location:../urunler?katid=$yonlendir&yuklenme=basarili");
		}
		else{
		header("Location:../urunler?katid=$yonlendir&yuklenme=basarisiz");
		}
   }
  
  else{
    $duzenle = $baglanti->prepare("UPDATE urunler SET 
  
    kategori_id=:kategori_id,
    urun_baslik=:urun_baslik,
    urun_aciklama=:urun_aciklama,
    urun_model=:urun_model,
    urun_renk=:urun_renk,
    urun_fiyat=:urun_fiyat,
    urun_adet=:urun_adet,
    urun_sira=:urun_sira,
    urun_durum=:urun_durum
   WHERE urun_id=$urun_id
     
     ");  
   
   $update = $duzenle->execute(array(
    'kategori_id'=>$_POST["kategori"],
    'urun_baslik'=>$_POST["ubaslik"],
    'urun_aciklama'=>$_POST["uaciklama"],
    'urun_model'=>$_POST["umodel"],
    'urun_renk'=>$_POST["urenk"],
    'urun_fiyat'=>$_POST["ufiyat"],
    'urun_adet'=>$_POST["uadet"],
    'urun_sira'=>$_POST["usira"],
    'urun_durum'=>$_POST["udurum"]
   
   ));
   if ($update) {

		header("Location:../urunler?katid=$yonlendir&yuklenme=basarili");
		}
		else{
			header("Location:../urunler?katid=$yonlendir&yuklenme=basarisiz");
		}
   }
  }

  if (isset($_POST['urunlersil'])) {
    $yonlendir=$_POST['katsid'];
    
      $urunlersil=$baglanti->prepare("DELETE from  urunler where urun_id=:urun_id ");
    
      $urunlersil->execute(array(
        'urun_id'=>$_POST['id']
    
    
      ));
    
      if ($urunlersil) {
    
        $resimsil=$_POST['resim'];
        unlink("../resimler/urunler/$resimsil");
        header("Location:../urunler?katid=$yonlendir&yuklenme=basarili");
      }
      else{
          header("Location:../urunler?katid=$yonlendir&yuklenme=basarisiz");
      }
    }



    if (isset($_POST['resimsil'])) {
      $yonlendir=$_POST['urun_id'];
      
        $resimsil=$baglanti->prepare("DELETE from  cokluresim where id=:id ");
      
        $resimsil->execute(array(
          'id'=>$_POST['id']
        ));
      
        if ($resimsil) {
      
          $resimsil=$_POST['resim'];
          unlink("../resimler/cokluresim/$resimsil");
          header("Location:../cokluresim?id=$yonlendir&yuklenme=basarili");
        }
        else{
            header("Location:../cokluresim?id=$yonlendir&yuklenme=basarisiz");
        }
      }
    

      if (isset($_POST["kullaniciduzenle"])) {
  $kullaniciid=$_POST["kid"];
  $sifre=md5($_POST["ksifre"]);
        $duzenle = $baglanti->prepare("UPDATE kullanicilar SET 
        
        kullanici_adsoyad=:kullanici_adsoyad,
        kullanici_mail=:kullanici_mail,
        kullanici_adres=:kullanici_adres,
        kullanici_tel=:kullanici_tel,
        kullanici_sifre=:kullanici_sifre
        
      WHERE kullanici_id=$kullaniciid;
        
        ");  
      $update = $duzenle->execute(array(
        'kullanici_adsoyad'=>$_POST['kadsoyad'],
        'kullanici_mail'=>$_POST['kmail'],
        'kullanici_adres'=>$_POST['kadres'],
        'kullanici_tel'=>$_POST['ktelefon'],
        'kullanici_sifre'=>$sifre
        
      
      ));
      if($update){
        header('Location:../../kullanici.php?duzenleme=basarili');
      }
      else{
        header('Location:../../kullanici.php?duzenleme=basarisiz');
      }
      }


      if(isset($_POST["yorumkaydet"])){
       
        $yorumkaydet = $baglanti->prepare("INSERT into yorumlar SET
        yorum_detay=:yorum_detay,
        yorum_onay=:yorum_onay,
        urun_id=:urun_id,
        kullanici_id=:kullanici_id
        ");
      
      $insert = $yorumkaydet->execute(array(
        'yorum_detay'=>$_POST["yorum"],
        'yorum_onay'=>0,
        'urun_id' => $_POST["urunid"],
        'kullanici_id'=>$_POST["kullaniciid"]

      ));
      if($insert){
        
        header('Location:../../index?yuklenme=basarili');
      }
      else{
        header('Location:../../index?yuklenme=basarisiz');
      }
    }
     


      if (isset($_POST["yorumonayla"])) {
        $yorumid=$_POST["yorumid"];
        $duzenle = $baglanti->prepare("UPDATE yorumlar SET 
        
        yorum_onay=:yorum_onay

      WHERE yorum_id=$yorumid
        
        "); 
      
      $update = $duzenle->execute(array(
        'yorum_onay'=>1
      ));
      if($update){
        header('Location:../yorum.php?yuklenme=basarili');  //(../) sayesinde üst klasöre çıkıyorum
      }
      else{
        header('Location:../yorum.php?yuklenme=basarisiz'); //url kısmında mesaj veriyorum 
      }
      }
      
if(isset($_GET["yorumsil"])){
    
    $yorumsil = $baglanti->prepare("DELETE from yorumlar where yorum_id=:yorum_id");

    $yorumsil->execute(array(
      "yorum_id"=>$_GET["id"]
    ));

    if ($yorumsil) {
      header("Location:../yorum?silme=basarili");
    }
    else {
      header("Location:../yorum?silme=basarisiz");
    }
  }
 




  
if(isset($_POST["siparissil"])){
  
  $siparis_id=$_POST["siparis_id"];
  $urun_adet=$_POST["urun_adet"];
  $siparis_adet=$_POST["siparis_adet"];


$siparissil = $baglanti->prepare("DELETE from siparisler where siparis_id=:siparis_id");

$siparissil->execute(array(
  "siparis_id"=>$siparis_id
));

if ($siparissil) {
  $urun_id=$_POST["urun_id"];
  $duzenle = $baglanti->prepare("UPDATE urunler SET 
                                
  urun_adet=:urun_adet

WHERE urun_id=$urun_id
  
  "); 

$update = $duzenle->execute(array(
  'urun_adet'=>($urun_adet+$siparis_adet),
));
  header("Location:../siparisler?silme=basarili");

  
}
else {
  header("Location:../siparisler?silme=basarisiz");
}


}
?>