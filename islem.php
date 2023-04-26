<?php
session_start();
error_reporting(0);
require_once("admin/islem/baglanti.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["girisYap"])){
    $kadi = htmlspecialchars($_POST["kadi"]);   //htmlspecialchars ile kodlarda zararlı şey varsa zararsıza çevirir. Güvenli hale gelir.
    $sifre = htmlspecialchars($_POST["sifre"]);
    $gizlisifre = md5($sifre);
  
 
  
  $kullanicisor = $baglanti->prepare("SELECT * from kullanicilar where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre
   and kullanici_yetki=:kullanici_yetki");
  $kullanicisor->execute(array(
    "kullanici_adi"=>$kadi,
    "kullanici_sifre"=>$gizlisifre,
    "kullanici_yetki"=>1
  )) ;

  $var = $kullanicisor->rowCount();   //rowcount : veritabanında böyle bir bilgi var mı bakıyorum.
  if($var >0){
   $_SESSION["normalgiris"]=$kadi;
   header("Location:index.php?durum=hosgeldin");
  }  
  else{
  header("Location:giris_kayit.php?durum=hata");
  }
}

if (isset($_POST["kayitOl"])) {


    $adsoyad = htmlspecialchars($_POST["adsoyad"]);
    $kadi = htmlspecialchars($_POST["kadi"]);   //htmlspecialchars ile kodlarda zararlı şey varsa zararsıza çevirir. Güvenli hale gelir.
    $email = htmlspecialchars($_POST["email"]);
    $tel = htmlspecialchars($_POST["tel"]);
    $adres = htmlspecialchars($_POST["adres"]);
    $sifre = htmlspecialchars($_POST["sifre"]);
    $gizlisifre = md5($sifre);
    $sifretekrar = htmlspecialchars($_POST["sifretekrar"]);
    $gizlisifretekrar = md5($sifretekrar);


    $kullanicisor = $baglanti->prepare("SELECT * from kullanicilar where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki");
    $kullanicisor->execute(array(
        "kullanici_adi" => $kadi,
        "kullanici_yetki" => 1
    ));

    $var = $kullanicisor->rowCount();
    if ($var > 0) {
        header("Location:giris_kayit.php?durum=kullanicivar");
    } else {
        if ($gizlisifre == $gizlisifretekrar) {

                $kullanicikaydet = $baglanti->prepare("INSERT into kullanicilar SET 
                kullanici_adsoyad=:kullanici_adsoyad,
                kullanici_adi=:kullanici_adi,
                kullanici_sifre=:kullanici_sifre,
                kullanici_mail=:kullanici_mail,
                kullanici_tel=:kullanici_tel,
                kullanici_adres=:kullanici_adres,
                kullanici_yetki=:kullanici_yetki


    ");

                $insert = $kullanicikaydet->execute(array(
                    'kullanici_adsoyad' => $adsoyad,
                    'kullanici_adi' => $kadi,
                    'kullanici_sifre' => $gizlisifre,
                    'kullanici_mail' => $email,
                    'kullanici_tel' => $tel,
                    'kullanici_adres' => $adres,
                    'kullanici_yetki' => 1


                ));
                if ($insert) {
                    header('Location:giris_kayit.php?yuklenme=basarili');
                } else {
                    header('Location:giris_kayit.php?yuklenme=basarisiz');
                }
        } else {
            header("Location:giris_kayit.php?durum=sifrehata");
        }
    }
}



if(isset($_POST["sepeteekle"])){
    $id=$_POST["urun_id"];
    $adet=$_POST["adet"];
    $stok=$_POST["stok"];
if($adet<=$stok){
    setcookie('sepet['.$id.']',$adet, strtotime("+7day")); 
    //sepet adında cookie, $id-->urunlercekten gelen urun_id(hangi urun seçilmişse), $adet üründen kaç adet alındığı bilgisi, 7 gün sepette tutulsun.

    header("location:sepet?durum=eklendi");
}
else{
  echo " 
  <script> alert('YETERSİZ STOK !')
           document.location.href = 'sepet.php';
           </script>
            ";
}
}


if(isset($_GET["sepetsil"])){
    $id=$_GET["id"];
    $adet=$_GET["adet"];

    setcookie('sepet['.$id.']',$adet, strtotime("-7day")); //eksi işaretiyle sepetten ürünü siliyorum.
    header("location:sepet?durum=silindi");
}



  if(isset($_POST["alisverisbitir"])&&($_POST["odemeturu"])=="1"){
    header("location:kapidaodeme?kapidaodeme=yonlendirildi");
  }

  if(isset($_POST["tamamla"])){
    $kullanici_id=$_POST["kullanici_id"];
    $toplamfiyat=$_POST["cekilecektutar"];
    $urun_id=$_POST["urun_id"];
    
    
  //döngü kullanarak birden çok ürünü aynı anda veritabanına ekliyorum.
  foreach (@$_COOKIE['sepet'] as $key => $value) { 
    $urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC");
    $urunler->execute(array(
        "urun_id" => $key //sepete eklenmiş olan urunleri($key) alıyorum
    ));
    $urunlercek = $urunler->fetch(PDO::FETCH_ASSOC);
    $urunfiyat=$urunlercek["urun_fiyat"];
  
    $sipariskaydet = $baglanti->prepare("INSERT into siparisler SET
    kullanici_id=:kullanici_id,
    urun_id=:urun_id,
    urun_adet=:urun_adet,
    urun_fiyat=:urun_fiyat,
    toplam_fiyat=:toplam_fiyat,
    odeme_turu=:odeme_turu,
    siparis_onay=:siparis_onay
    ");
  
  $insert = $sipariskaydet->execute(array(
    'kullanici_id'=>$kullanici_id,
    "urun_id"=>$key,
    "toplam_fiyat"=>$toplamfiyat,
    "urun_adet"=>$value,
    "urun_fiyat"=>$urunfiyat,
    "toplam_fiyat"=>$toplamfiyat,
    "odeme_turu"=>1,
    "siparis_onay"=>0
   
  
  ));
 } 
  if($insert){
    foreach (@$_COOKIE['sepet'] as $key => $value) { 
      $urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC");
    $urunler->execute(array(
        "urun_id" => $key
    ));
    $urunlercek = $urunler->fetch(PDO::FETCH_ASSOC);
    $urun_adet=$urunlercek["urun_adet"];
  
   
    $duzenle = $baglanti->prepare("UPDATE urunler SET 
    
    urun_adet=:urun_adet

  WHERE urun_id=$key
    
    "); 
  
 $update = $duzenle->execute(array(
    'urun_adet'=>($urun_adet-$value) 
  ));

}
    echo " 
    <script> alert('Siparişiniz alınmıştır.Teşekkür ederiz :)')
             document.location.href = 'siparisler.php';
             </script>
              ";
  
   }

  else{
    header('Location:kapidaodeme?siparis=olusturulamadi');
  }

 
}


  if(isset($_POST["alisverisbitir"])&&($_POST["odemeturu"])=="0"){
    header("location:odeme?kartlaodeme");
  }

  if(isset($_POST["devamet"])){
    if(is_string($_POST["kartisim"])&&(strlen($_POST["kartno"]))==14){
      
   $kullanici_id=$_POST["kullanici_id"];
    $toplamfiyat=$_POST["cekilecektutar"];
    

  //döngü kullanarak birden çok ürünü aynı anda veritabanına ekliyorum.
  foreach ($_COOKIE['sepet'] as $key => $value) { 
    $urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC");
    $urunler->execute(array(
        "urun_id" => $key
    ));
    $urunlercek = $urunler->fetch(PDO::FETCH_ASSOC);
    $urunfiyat=$urunlercek["urun_fiyat"];
  
    $sipariskaydet = $baglanti->prepare("INSERT into siparisler SET
    kullanici_id=:kullanici_id,
    urun_id=:urun_id,
    urun_adet=:urun_adet,
    urun_fiyat=:urun_fiyat,
    toplam_fiyat=:toplam_fiyat,
    odeme_turu=:odeme_turu,
    siparis_onay=:siparis_onay
    ");
  
  $insert = $sipariskaydet->execute(array(
    'kullanici_id'=>$kullanici_id,
    "urun_id"=>$key,
    "toplam_fiyat"=>$toplamfiyat,
    "urun_adet"=>$value,
    "urun_fiyat"=>$urunfiyat,
    "toplam_fiyat"=>$toplamfiyat,
    "odeme_turu"=>0,
    "siparis_onay"=>0
   
  
  ));
  }
  if($insert){
    

    foreach (@$_COOKIE['sepet'] as $key => $value) {
      $urunler = $baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC");
		$urunler->execute(array(
			"urun_id" => $key
		));
		$urunlercek = $urunler->fetch(PDO::FETCH_ASSOC);
    $urun_adet=$urunlercek["urun_adet"];

    $duzenle = $baglanti->prepare("UPDATE urunler SET 
    
    urun_adet=:urun_adet

  WHERE urun_id=$key
    
    "); 
  
  $update = $duzenle->execute(array(
    'urun_adet'=>($urun_adet-$value)
  ));
}
    echo " 
    <script> alert('Siparişiniz alınmıştır.Teşekkür ederiz :)')
             document.location.href = 'siparisler.php';
             </script>
              ";
  } 
}
  else{
    header('Location:odeme?siparis=olusturulamadi');
  }
  }
  

  
 

  if(isset($_POST["gonder"])){
    $email=$_POST["email"];

    //bu mail bilgisine sahip bir müşteri var mı kontrol ediyorum.
    $kullanicisor = $baglanti->prepare("SELECT * from kullanicilar where kullanici_mail=:kullanici_mail and kullanici_yetki=:kullanici_yetki");
    $kullanicisor->execute(array(
    "kullanici_mail" => $email,
    "kullanici_yetki" => 1
));
    $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);
    $var = $kullanicisor->rowCount();  

    $id=$kullanicicek["kullanici_id"]; 

    if($var==0){
      echo " 
    <script> alert('Girdiğiniz mail kayıtlı değil !')
             document.location.href = 'sifremiunuttum.php';
             </script>
              ";
    }
    else{
      /*1->şifre oluşturma
        2->şifreyi md5 le
        3->veritabanına aktarma
        4->mail at
      */
      $sifresayi=substr(str_shuffle("1234567890"),0,6);
      $sifreharf="qem";
      $sifreharf2="uvp";
      $sifreolustur=$sifreharf.$sifresayi.$sifreharf2;
      
      $md5sifreolustur=md5($sifreolustur);



      $duzenle = $baglanti->prepare("UPDATE kullanicilar SET 
    
      kullanici_sifre=:kullanici_sifre

      where kullanici_id=$id
    
      "); 
  
     $update = $duzenle->execute(array(
    'kullanici_sifre'=>$md5sifreolustur
      ));

    }
    if($update){
      
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host='smtp.gmail.com';
      $mail->SMTPAuth=true;
      $mail->Username='gokcilsenanur@gmail.com';
      $mail->Password='uxkgxbemzckptswc';
      $mail->SMTPSecure='ssl';
      $mail->Port=465;
      $mail->setFrom($_POST["email"]);
      $mail->addAddress($email);
      $mail->addReplyTo($_POST["email"]);
      $mail->isHTML(true);
      $mail->FromName=$_POST["adsoyad"];
      $mail->Subject="ŞİFRE DEĞİŞTİRME TALEBİ";
      $mail->Body="Merhaba, aşağıdaki geçici şifreyle hesabınıza giriş yapabilirsiniz.<br><br>$sifreolustur";
      $mail->CharSet='UTF-8';
      $mail->send();
    
    echo " 
    <script> alert('Geçici şifreniz mailinize iletildi.')
             document.location.href = 'sifremiunuttum.php';
             </script>
              ";
    }
  }

if(isset($_POST["devamet"])){
  echo " 
    <script> alert('Ödemeniz başarıyla alınmıştır.Teşekkür ederiz :)')
             document.location.href = 'siparisler.php';
             </script>
              ";
}


?>