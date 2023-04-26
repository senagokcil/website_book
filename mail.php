<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["mesajgonder"])){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='gokcilsenanur@gmail.com';
    $mail->Password='uxkgxbemzckptswc';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom($_POST["email"]);
    $mail->addAddress('gokcilsenanur@gmail.com');
    $mail->addReplyTo($_POST["email"]);
    $mail->isHTML(true);
    $mail->FromName=$_POST["adsoyad"];
    $mail->Subject=$_POST["konu"];
    $mail->Body=$_POST["mesaj"];
    $mail->CharSet='UTF-8';
    $mail->send();
    
    echo " 
    <script> alert('Mesajınız iletildi')
             document.location.href = 'iletisim.php';
             </script>
              ";


}

?>