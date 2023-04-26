<?php require_once("header.php");


                                $siparis = $baglanti->prepare("SELECT * FROM siparisler where kullanici_id=:kullanici_id"); //kullanici_id yi alıyorum ki her kullanıcı kendi siparişini görsün.
                                $siparis->execute(array(
                                    "kullanici_id" => $kullanicicek["kullanici_id"]
                                ));
                                $sipariscek = $siparis->fetch(PDO::FETCH_ASSOC);


                                $kdv = ($sepettutar * 0.18);
                                $toplamsepet = ($sepettutar + $kdv);
                                    ?>
<form method="post" action="islem.php">
	<table class="table table-condensed table-bordered" style="border:1px solid #ccc;background:#fbfbfb;margin:5px;width:99%;">
	<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek["kullanici_id"] ?>">
	<input type="hidden" name="urun_adet" value="<?php echo $urunlercek["urun_adet"] ?>">
	<input type="hidden" name="urun_id" value="<?php echo $urunlercek["urun_id"] ?>">

		<tr>
			<td style="font-size:15px;width:210px;"><b>Ödenecek Tutar : </b></td>
			<td>
				<div class="col-sm-5">
				  <input type="text" class="form-control" name="cekilecektutar" onkeyup="sadece_para('amount');" placeholder="Çekilecek tutar" value="<?php echo $toplamsepet ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px;width:250px;"><b>Kapıda Ödeme Hizmet Bedeli : </b></td>
			<td>
				<div class="col-sm-5">
				  15₺
				</div>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px;width:210px;"><b>Toplam Ödenecek Tutar : </b></td>
			<td>
				<div class="col-sm-5">
				 <?php echo $toplamsepet+15 ?>₺
				</div>
			</td>
		</tr>
        <tr>
            <td>
            <td>
        <button class="btn btn-info" type="submit" class="btn btn-primary" name="tamamla">SİPARİŞ TAMAMLA</button>
            </td>
            
        </tr>
	</table>
</form>
<?php require_once("footer.php") ?>