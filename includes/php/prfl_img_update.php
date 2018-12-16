<?php require_once('giris_kontrol.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mozaik Süpermarket Otomasyonu</title>
</head>

<body>

<?php

if($_POST["guncelle"]==1){
	require_once('db/dbconnect.php');
	$kaynak = $_FILES["profil_img"]["tmp_name"];
	$bilgi = getimagesize($kaynak);
	$tur = $bilgi["mime"];//resim turu kontrolü
		if($tur!="image/jpeg") die("
			<script>
			alert('Lütfen jpg veya jpeg formatında resim yükleyiniz.')
			window.location = 'profil_image.php'
			</script>
		");
	$dsya_adi = $_FILES["profil_img"]["name"];
	$ad = substr($dsya_adi,-4);
	$yeni_ad = (rand(1,100)).$ad;
	$hedef = "../../images/mstr_prfl/$yeni_ad";
	if($_FILES["profil_img"]["size"]<=2048*1024){//resim boyut kontrolu
	$sor = @mysql_query(@sprintf("SELECT * FROM profil_resim WHERE kullanici_adi='%s'",$_SESSION["kullanici_adi"]));
				$kisi_sor = @mysql_num_rows($sor);
				if($kisi_sor<=0) die("
							<script>
							alert('Güncelleme çalıştırılamaz. Lütfen resim yükleyiniz.')
							window.location = 'profil_image.php'
							</script>
						");
				
				
						$yukle=move_uploaded_file($kaynak,$hedef);//resim yükle
								if($yukle==false) die("
							<script>
							alert('Resim yüklenemedi.')
							window.location = 'profil_image.php'
							</script>
						");else{
							
					$img_sil_sorgu = @sprintf("SELECT * FROM profil_resim WHERE kullanici_adi='%s'",$_SESSION['kullanici_adi']);
					$img_sonuc=@mysql_query($img_sil_sorgu);
					$img_sil=@mysql_fetch_array($img_sonuc);
						unlink($img_sil["image"]);
	$sorgu = @sprintf("UPDATE profil_resim SET image='%s' WHERE kullanici_adi='%s'",$hedef,$_SESSION['kullanici_adi']);
						$sonuc = @mysql_query($sorgu);
							if($sonuc){
								echo "
							<script>
							alert('Resim başarıyla değştirildi.')
							window.location = 'home.php'
							</script>
						";
								}else{
								echo"
							<script>
							alert('Resim veritabanına yüklenemedi.')
							window.location = 'profil_image.php'
							</script>
						";
									
									}
						}//resim yüklendi
			
			}else{
				echo "Dosya boyutu uygun değil.";
				}

	}





?>


</body>
</html>