<?php

require_once("islem/baglanti.php");

if(!empty($_FILES)){
$uploads_dir = 'resimler/cokluresim';           //resimi yükleyeceğimiz yer
@$tmp_name = $_FILES["file"] ["tmp_name"];   //post la gelen resmin ismini alıyorum
@$name = $_FILES["file"] ["name"];          //resmi ve ismini alıyorum

$sayi = rand(1,1000000);
$sayi2 = rand(1,1000000);
$sayi3 = rand(10000,2000000);   //resimin ismi için rastgele sayılar belirliyorum

$sayilar = $sayi.$sayi2.$sayi3;
$resimyolu = $sayilar.$name;

@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

$cokluresimkaydet = $baglanti->prepare("INSERT into cokluresim SET 
    resim=:resim,
    urun_id=:urun_id
    ");
  
  $insert = $cokluresimkaydet->execute(array(
    "resim"=>$resimyolu,
    "urun_id"=>$_POST["urun_id"]
  ));
}


?>