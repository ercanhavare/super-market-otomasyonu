

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
 //kaydı getir
 if($_GET["urun_id"]!=""){

	 
	 
 require_once('db/dbconnect.php');
 $sorgu=@sprintf("SELECT * FROM urunler WHERE urun_id='%s'",$_GET["urun_id"]);
 $sonuc=@mysql_query($sorgu);
 
 if(@mysql_num_rows($sonuc)==0){
	echo "
			<script type='text/javascript'>
				alert('Ürün kaydı bulunamadı..');
				window.location = 'stok_ekle.php';
			</script>";
	}
 $satir=mysql_fetch_array($sonuc);
 //kayit güncelle
 	}elseif($_POST["kayit"]=="guncelle"){
 		require_once('db/dbconnect.php');
		
			 
	$barkod_no = $_POST["barkod_no"];
	$urun_ad = $_POST["urun_ad"];
	$urun_tur = $_POST["urun_tur"];
	$urun_adet = $_POST["urun_adet"];
	$urun_alis = $_POST["urun_alis"];
	$urun_satis = $_POST["urun_satis"];
//bos dolu kontrolü
if(empty($barkod_no) || empty($urun_ad) || empty($urun_tur) || empty($urun_adet) || empty($urun_alis) || empty($urun_satis)){
	echo "
			<script type='text/javascript'>
				alert('Lütfen tüm alanları eksiksiz doldurunuz.');
				window.location = 'stok_listele.php';
			</script>";
	} //güncelleme sorgusu
 			$sorgu=@sprintf("UPDATE urunler SET barkod_no='%s',urun_ad='%s',urun_tur='%s',
								urun_adet='%s',urun_alis='%s',urun_satis='%s' WHERE urun_id='%s'",
										$barkod_no,$urun_ad,$urun_tur,$urun_adet,$urun_alis,$urun_satis,$_POST["id"]);
										
 							$guncelle=@mysql_query($sorgu);	 
 //güncelleme cevap
 if($guncelle) {
	echo "
			<script type='text/javascript'>
				alert('Ürün güncelleme işlemi başarıyla yapıldı..');
				window.location = 'stok_listele.php';
			</script>";
	} else{
		{
	echo "
			<script type='text/javascript'>
				alert('Üzgünüm, ürün güncellemesi başarısız.');
				window.location = 'stok_listele.php';
			</script>";
	}
		
		}//güncelleme cevap son
	 
	 }else{
		 {
	echo "
			<script type='text/javascript'>
				alert('Güncelleme alanı doğrudan çalıştırılamaz.');
				window.location = 'stok_listele.php';
			</script>";
	}
		 
		 }
 
 
 
 ?>      
        
        	<div class="tablo">
            	<br /><br /><br />
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="150" height="50">ÜRÜN BARKOD NO&nbsp;&nbsp;.....:</td>
      <td width="344">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="barkod_no" size="25" value="<?php echo $satir["barkod_no"]; ?>"/></td>
      <td width="200">Hoşgeldiniz,Stok Güncelleme sayfasındasınız.</td>
    </tr>
    <tr>
      <td height="50">ÜRÜN ADI&nbsp;&nbsp;....................:</td>
      <td>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_ad" size="25" value="<?php echo $satir["urun_ad"]; ?>"/></td>
     <td>Bu sayfada stoklarınızı düzenleyip güncelleme işlemi yapabilirsiniz.</td>
    </tr>
    <tr>
      <td height="50">ÜRÜN TÜRÜ&nbsp;&nbsp;................:</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
         <select name="urun_tur" size="1" />
         <option value="<?php echo $satir["urun_tur"]; ?>"><?php echo $satir["urun_tur"]; ?></option>
         <?php 
		 $tablo = "urun_tur";
		 $sorgu = @sprintf("SELECT * FROM $tablo ORDER BY urun_tur");
		 $sonuc = @mysql_query($sorgu); 
		 while($liste = @mysql_fetch_array($sonuc)){
		 ?>
        <option value="<?php echo $liste["urun_tur"]; ?>"><?php echo $liste["urun_tur"]; ?></option>
        <?php } ?>
        
      </select></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN ADEDİ&nbsp;&nbsp;................:</td>
      <td>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_adet" size="25" value="<?php echo $satir["urun_adet"]; ?>"/></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN ALIŞ FİYATI&nbsp;&nbsp;........:</td>
      <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_alis" size="25" value="<?php echo $satir["urun_alis"]; ?>"/></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN SATIŞ FİYATI&nbsp;&nbsp;......:</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_satis" size="25" value="<?php echo $satir["urun_satis"]; ?>"/></td>
    </tr>
    <tr>
      <td height="50">&nbsp;</td>
      <td align="right">
      <input type="hidden" name="kayit" value="guncelle" />
      <input type="hidden" name="id" id="id" value="<?php echo $satir["urun_id"]; ?>">
       <input type="submit" name="button" value="Stok Güncelle" />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      
    </tr>
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