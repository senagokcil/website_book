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
		<i style="color: red"><?php
								if ($_GET["siparis"] == "olusturulamadi") {
									echo "Girilen bilgileri kontrol ediniz !";
								}
								?></i>

		<tr>
			<td style="font-size:15px;width:210px;"><b>Çekilecek Tutar : </b></td>
			<td>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="cekilecektutar" onkeyup="sadece_para('amount');" placeholder="Çekilecek tutar" value="<?php echo $toplamsepet ?>">
				</div>

			</td>
		</tr>
		<tr>
			<td style="font-size:15px;width:210px;"><b>Kart Üzerindeki İsim : </b></td>
			<td>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="kartisim" placeholder="Kart üzerindeki isim" autocomplete=off size="20">
				</div>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px;width:210px;"><b>Kart Numarası : </b></td>
			<td>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="kartno" maxlength="16" onkeydown="sadece_rakam('pan');" placeholder="Kart numarası" autocomplete=off size="20">
				</div>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px;"><b>Son Kullanma Ay / Yıl : </b></td>
			<td style="text-align:left;">
				<div class="col-sm-8" style="float:left;">
					<input style="width:80px;padding:3px;font-size:15px;" name="kartay">
					/
					<input style="width:80px;padding:3px;font-size:15px;" name="kartyıl">

				</div>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px;"><b>CCV : <br /><span style="font-weight:100;">(Kartın arkasındaki 3 hane)</span></b></td>
			<td>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="ccv" maxlength="4" placeholder="CCV" autocomplete=off size="4" value="">
				</div>
			</td>
		</tr>
		<tr>
			<td>
			<td>
				<button class="btn btn-info" type="submit" class="btn btn-primary" name="devamet">SİPARİŞ TAMAMLA</button>
			</td>

		</tr>
	</table>
</form>
<?php require_once("footer.php") ?>