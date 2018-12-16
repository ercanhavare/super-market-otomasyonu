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
 
 if(!empty($_GET["urun_id"])){
	 
//kaydı getir	 
	$tablo = "urunler";
	 $sorgu = @sprintf("SELECT * FROM $tablo WHERE urun_id = '%s'",$_GET["urun_id"]);
	 $sonuc = @mysql_query($sorgu);
	 
	 //kayit 
	 $kayit_sayisi = @mysql_num_rows($sonuc);
	 if($kayit_sayisi == 0) echo "<script type='text/javascript'>alert('Kayıtlı ürün bulunamadi.');window.location =  'stok_listele.php'</script>";
	 
	 
	 $satir = @mysql_fetch_array($sonuc);
	 }elseif($_POST["guncelle"]==1){//guncelleme sorgusu stok dusüyor
		 $tablo = "urunler";
			
		 $gelen=$_POST["urun_adet"];
		 $sorgu = @sprintf("UPDATE $tablo SET urun_adet = urun_adet-'%s' WHERE urun_id='%s' and kullanici_adi='%s'",$gelen,$_POST["id"],$_SESSION["kullanici_adi"]);
		 
		 $sonuc = @mysql_query($sorgu);
		 
		 if($sonuc){//guncelleme cevabı
			 $urun_sorgu = @sprintf("SELECT * FROM satislarim WHERE urun_id='%s' and kullanici_adi='%s'",$_POST["id"],$_SESSION["kullanici_adi"]);
			 $urun_kontrol = @mysql_query($urun_sorgu);
			 $urun_varmi = @mysql_num_rows($urun_kontrol);
			 
			 if($urun_varmi == 0){//urun kaydı yoksa 
			 $urun_ekle = @sprintf("INSERT INTO satislarim (barkod_no,kullanici_adi,urun_ad,urun_tur,urun_adet,urun_satis) 
			 				VALUES('%s','%s','%s','%s','%s','%s')",
							$_POST["barkod_no"],$_SESSION["kullanici_adi"],$_POST["urun_ad"],$_POST["urun_tur"],$gelen,$_POST["urun_satis"]);
			 
			 $urun_sonuc = @mysql_query($urun_ekle);
			 
			 
			 				if($urun_sonuc){//guncelleme ve satıs gerçekleştıyse
								echo "
									 <script type='text/javascript'>
										alert('Ürün satışı gerçekleştirildi.');
										window.location = 'stok_listele.php';
									 </script>";
								
											}else{//guncelleme ve satış olumsuzsa
											
																echo "
																	 <script type='text/javascript'>
																		alert('Üzgünüm,satış işleme başarısız oldu.');
																		window.location = 'stok_listele.php';
																	 </script>";
											}
		 
			 
			 }else{	//urun kaydı varsa		 
			 //satışlarım tablosu
			 $sorgu = @sprintf("UPDATE satislarim SET urun_adet=urun_adet+'%s' WHERE urun_id='%s' and kullanici_adi='%s'",$gelen,$_POST["id"],$_SESSION["kullanici_adi"]);
					
					$satis = @mysql_query($sorgu);
			 
			 				if($satis){//guncelleme ve satıs gerçekleştıyse
								echo "
									 <script type='text/javascript'>
										alert('Ürün satışı gerçekleştirildi.');
										window.location = 'stok_listele.php';
									 </script>";
								
											}else{//guncelleme ve satış olumsuzsa
											
																echo "
																	 <script type='text/javascript'>
																		alert('Üzgünüm,satış işleme başarısız oldu.');
																		window.location = 'stok_listele.php';
																	 </script>";
											}
									}

			 //guncelleme yanıtı			 
			 }
		 
		 
		 
		 
		 }else{//post gelen değer kontrolu
			 
			 
			 echo "
			 <script type='text/javascript'>
			 	alert('Satış işleme doğrudan çalıştırılamaz.');
				window.location = 'stok_listele.php';
			 </script>";
			 
			 }
 
 
 
 
 
 
 
 
 
 
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
        
        	<div class="tablo">
            	<br /><br /><br /> 
                 
<form name="urun_ekle" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="150" height="50">ÜRÜN BARKOD NO&nbsp;&nbsp;.....:</td>
      <td width="344">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="barkod_no" type="text" value="<?php echo $satir["barkod_no"]; ?>" size="25" readonly/></td>
      <td width="200">Hoşgeldiniz,Satış Yap sayfasındasınız.</td>
    </tr>
    <tr>
      <td height="50">ÜRÜN ADI&nbsp;&nbsp;....................:</td>
      <td>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_ad" size="25" value="<?php echo $satir["urun_ad"]; ?>" readonly/></td>
     <td><p>Bu sayfada ürün satışı yapabilir ve kar elde edebilirsiniz.Bol kazançlar dileriz.</p></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN TÜRÜ&nbsp;&nbsp;................:</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <select name="urun_tur" size="1"/>
        <option value="<?php echo $satir["urun_tur"]; ?>"><?php echo $satir["urun_tur"]; ?></option>
        
       
      </select></td>
    <td></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN ADEDİ&nbsp;&nbsp;................:</td>
      <td>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_adet" size="25" /></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN SATIŞ FİYATI(TL)&nbsp;&nbsp;:</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_satis" size="25" value="<?php echo $satir["urun_satis"]; ?>" readonly/></td>
    </tr>
    <tr>
      <td height="50">&nbsp;</td>
      <td align="right">
       <input type="submit" name="button" value="Satış Yap" class="submit"/>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="hidden" name="guncelle" value="1" />
      <input type="hidden" name="id" value="<?php echo $satir["urun_id"]; ?>" />
      </td>
    </tr>
    <tr>
      
    </tr>
  </table>
</form>
 
            </div>
<!--/////////////////////////////////////////////tablo son////////////////////////////////////////////////////////////-->
        
        
        
        </div>
<!--/////////////////////////////////////////////Content2 son////////////////////////////////////////////////////////////-->

		













	 <?php require_once('footer.php') ?>	
<!--///////////////////////////////////////////footer son////////////////////////////////////////////////////////////////-->
</body>
</html>