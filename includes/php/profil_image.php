<?php require_once('db/dbconnect.php'); ?>

<!doctype html>
<html>
    <head>
    <link rel="stylesheet" media="all" href="../css/style.css"  type="text/css"/>
    <link rel="stylesheet" media="all" href="../css/style2.css" type="text/css" />
    <meta charset="utf-8">
    <title>Mozaik Süpermarket Stok Otomasyonu</title>

    </head>
    
    <body>
<?php include_once("headeralt.php");?>
<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
 		<div class="content2">

<?php

	if($_POST["kayit"]=="Yukle"){
	$kaynak = $_FILES["profil_img"]["tmp_name"];
	$bilgi = getimagesize($kaynak);
	$tur = $bilgi["mime"];
		if($tur!="image/jpeg") die("
			<script>
			alert('Lütfen jpg veya jpeg formatında resim yükleyiniz.')
			window.location = 'profil_image.php'
			</script>
		");
	$dsy_adi = $_FILES["profil_img"]["name"];
	$ad=substr($dsy_adi,-4);
	$yeni_ad=(rand(1,100)).$ad;
	$hedef = "../../images/mstr_prfl/$yeni_ad";
				if($_FILES["profil_img"]["size"]<=2048*1024){//resim boyut kontrolu
				$sor = @mysql_query(@sprintf("SELECT * FROM profil_resim WHERE kullanici_adi='%s'",$_SESSION["kullanici_adi"]));
				$kisi_sor = @mysql_num_rows($sor);
				if($kisi_sor>0) die("
							<script>
							alert('Daha önceden profil resminiz bulunmaktadır.')
							window.location = 'profil_image.php'
							</script>
						");
						$yukle=move_uploaded_file($kaynak,$hedef);
								if($yukle==false) die("
							<script>
							alert('Resim yüklenemedi.')
							window.location = 'profil_image.php'
							</script>
						");else{
	$sorgu = @sprintf("INSERT INTO profil_resim (image,kullanici_adi) VALUES ('%s','%s')",$hedef,$_SESSION["kullanici_adi"]);
						$sonuc = @mysql_query($sorgu);
							if($sonuc){
									echo "
								<script>
									alert('Resim başarıyla yüklendi.')
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
        	<div class="tablo">
            	<br /><br /><br />
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
      <td width="300" height="50">Profil Resmi Yükle......:</td>
      <td width="100"><input name="profil_img" type="file" size="25" </td>
      
      <td width="100">
      <input type="submit" value="Yükle" style="color:rgba(0,153,102,1);background-color:rgba(204,204,204,1);">
      <input type="hidden" name="kayit" value="Yukle">
      </td>
    </tr>

  </table>
</form>
<!--///////////////////////////////////Profil resmi yükle son////////////////////////////////////////////-->


<table align="center"  width="500" height="300"  style="border:1px dotted #FF3300; border-left:none;border-right:none;">
    <tr>
		<td>
        <?php
        $sorgu = @sprintf("SELECT * FROM profil_resim WHERE kullanici_adi='%s'",$_SESSION["kullanici_adi"]);
		$sonuc = @mysql_query($sorgu);
		
		$satir = @mysql_fetch_array($sonuc);
		
		echo "<center>
				<img src='$satir[image]' width='250' height='300'/>
			  </center>
		";
		
		?>
               
        
        </td>
    </tr>

</table>














<!--///////////////////////////////////Profil resmi guncelle////////////////////////////////////////////-->
<form name="form1" method="post" action="prfl_img_update.php" enctype="multipart/form-data">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
      <td width="300" height="50">Profil Resmini Güncelle....:</td>
      <td width="100"><input name="profil_img" type="file" size="25" </td>
      
      <td width="100">
      <input type="submit" value="Guncelle" style="color:rgba(0,153,102,1);background-color:rgba(204,204,204,1);"> 
      <input type="hidden" name="guncelle" value="1"> 
      </td>

  </table>
</form>
            
            </div>
<!--/////////////////////////////////////////////Content2 son////////////////////////////////////////////////////////////-->
        
        
        
        </div>
<!--/////////////////////////////////////////////Content2 son////////////////////////////////////////////////////////////-->

		













	 <?php require_once('footer.php') ?>	
<!--///////////////////////////////////////////footer son////////////////////////////////////////////////////////////////-->
</body>
</html>