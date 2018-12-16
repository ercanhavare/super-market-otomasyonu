

<!doctype html>
<html>
<head>
    <link rel="stylesheet" media="all" href="../css/style.css" type="text/css"/>
    <link rel="stylesheet" media="all" href="../css/style2.css" type="text/css" />


    
    <meta charset="utf-8">
    <title>Mozaik Süpermarket Stok Otomasyonu</title>

    </head>
    
    <body>
<?php include_once("headeralt.php");?>


<?php

if($_POST["ekle"]==1){
	require_once('db/dbconnect.php');


$barkod_no = $_POST["barkod_no"];
$urun_ad = $_POST["urun_ad"];
$urun_tur = $_POST["urun_tur"];
$urun_adet = $_POST["urun_adet"];
$urun_alis = $_POST["urun_alis"];
$urun_satis = $_POST["urun_satis"];

if(empty($barkod_no) || empty($urun_ad) || empty($urun_tur) || empty($urun_adet) || empty($urun_alis) || empty($urun_satis)){
	echo "
			<script type='text/javascript'>
				alert('Lütfen tüm alanları eksiksiz doldurunuz.');
				window.location = 'stok_ekle.php';
			</script>";
	}

$tablo = "urunler";
$sorgu = @sprintf("SELECT * FROM $tablo WHERE barkod_no = '".$barkod_no."' and kullanici_adi = '".$_SESSION["kullanici_adi"]."'") or die(mysql_error());
$kontrol = @mysql_query($sorgu);

$varmi = @mysql_num_rows($kontrol);
if($varmi > 0){
	
	echo "
			<script type='text/javascript'>
				alert('Bu ürün kayıtlıdır. Lütfen başka ürün ekleyiniz.');
				window.location = 'stok_ekle.php';
			</script>";
	}
//ürün kayıt
	$tablo="urunler";
	$sorgu=sprintf("INSERT INTO %s (barkod_no,kullanici_adi,urun_ad,urun_tur,urun_adet,urun_alis,urun_satis) VALUES ('%s','%s','%s','%s','%s','%s','%s')",
		$tablo,$barkod_no,$_SESSION["kullanici_adi"],$urun_ad,$urun_tur,$urun_adet,$urun_alis,$urun_satis);
	//echo $sorgu;
	$kaydet=mysql_query($sorgu);
		if($kaydet){
			echo "
			<script type='text/javascript'>
				alert('Ürününüz başarıyla kaydedildi.');
				window.location = 'stok_listele.php';
			</script>";
			}else{
				echo "
			<script type='text/javascript'>
				alert('Üzgünüm,ürününüz kaydedilirken hata oluştu.');
				window.location = 'stok_listele.php';
			</script>";
				}
	}else{
?>
		
<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
 		<div class="content2">
        
        	<div class="tablo">
            	<br /><br /><br /> 
                 
<form name="urun_ekle" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="150" height="50">ÜRÜN BARKOD NO&nbsp;&nbsp;.....:</td>
      <td width="344">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="barkod_no" size="25"/></td>
      <td width="200">Hoşgeldiniz,Stok Ekleme sayfasındasınız.</td>
    </tr>
    <tr>
      <td height="50">ÜRÜN ADI&nbsp;&nbsp;....................:</td>
      <td>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_ad" size="25"/></td>
     <td><p>Bu sayfada yeni stoklarınızı ekleme işlemi yapabilirsiniz.</p><p><?php echo $hata; ?></p></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN TÜRÜ&nbsp;&nbsp;................:</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="urun_tur">
<option value="">--- Secim Yap ---</option>
<?php
// Veritabanındaki  urunler tablosundan kayıtları alıyoruz (table "urun_tur").
$liste=@mysql_query("SELECT * FROM urun_tur ORDER BY urun_tur");

// While döngüsü ile kayıtları gösteriyoruz 
while($urun_listesi=mysql_fetch_array($liste)){
?>
<option value="<?php echo $urun_listesi['urun_tur']; ?>"><?php echo $urun_listesi['urun_tur']; ?></option>
<?php
// döngü bitti
}
?>
</select></td>
    <td></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN ADEDİ&nbsp;&nbsp;................:</td>
      <td>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_adet" size="25"/></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN ALIŞ FİYATI(TL)&nbsp;&nbsp;.:</td>
      <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_alis" size="25"/></td>
    </tr>
    <tr>
      <td height="50">ÜRÜN SATIŞ FİYATI(TL)&nbsp;&nbsp;:</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="urun_satis" size="25"/></td>
    </tr>
    <tr>
      <td height="50">&nbsp;</td>
      <td align="right">
       <input type="submit" name="button" value="Ürünü Ekle" class="submit"/>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="hidden" name="ekle" value="1" />
      </td>
    </tr>
    <tr>
      
    </tr>
  </table>
</form>
   <?php } ?>  
            </div>
<!--/////////////////////////////////////////////tablo son////////////////////////////////////////////////////////////-->
        
        
        
        </div>
<!--/////////////////////////////////////////////Content2 son////////////////////////////////////////////////////////////-->

		













	 <?php require_once('footer.php') ?>	
<!--///////////////////////////////////////////footer son////////////////////////////////////////////////////////////////-->
</body>
</html>