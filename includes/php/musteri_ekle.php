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
 if($_POST["kayit"]==1){
 $tablo = "musteriler";
 $sorgu = sprintf("INSERT INTO %s (tc_no, ad, soyad, email, telefon, cinsiyet, d_tarih, adres) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
 				$tablo, $_POST["tc_no"], $_POST["ad"], $_POST["soyad"], $_POST["email"], $_POST["telefon"], $_POST["cinsiyet"], $_POST["d_tarih"], $_POST["adres"]);
 
 $sonuc = @mysql_query($sorgu);
 
 if(!$sonuc){
	 echo "<script type='text/javascript'>
		 
			 alert('Kayıt başarısız oldu..');
			 window.location = 'musteri_ekle.php';
			</script>";		 
		 
			 }else{
				 echo "<script type='text/javascript'>
				 
						 alert('Kayıt başarıyla tamamlandı.');
						 window.location = 'musteriler.php';
							</script>";
				 
				 }//kayıt sonuc
 
 }else{//post ile kayıt gelmediyse
 
 ?>
 
 
 
 
 
 
 
 
 
        
        	<div class="tablo">
            	<br /><br /><br />
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="850" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
      <td width="162" height="50">T.C. No......................:</td>
      <td width="240">
      <input name="tc_no" type="text" size="25" maxlength="11"></td>
      <td width="342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Müşteri ekleme sayfasındasınız.</td>
    </tr>
    
    <tr>
      <td width="162" height="50">Ad..............................:</td>
      <td width="240">
      <input name="ad" type="text" size="25"></td>
      <td width="342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bu sayfada müşteri kaydı yapabilirsiniz.</td>
    </tr>
   
    <tr>
      <td height="50">Soyad........................:</td>
      <td>
      <input name="soyad" type="text"  size="25"></td>
      <td>&nbsp;</td>
    </tr>
    
    
    
    <tr>
      <td height="50">E-mail........................:</td>
      <td>
      <input name="email" type="text" size="25"></td>
      <td>&nbsp;</td>
    </tr>
    
   
   
   
    <tr>
      <td height="50">Telefon......................:</td>
      <td>
      <input name="telefon" type="text"  size="25" maxlength="11"></td>
    </tr>
    
    
    
    <tr>
      <td height="50">Cinsiyet......................:</td>
      <td>Erkek<input type="radio" name="cinsiyet"  value="Erkek">
        
        Kadın<input type="radio" name="cinsiyet" value="Kadın">
      </td>
    </tr>
   
   
   
    <tr>
      <td height="50">Doğum Tarihi.............:</td>
      <td><input type="date" name="d_tarih" size="25"></td>
    </tr>
    
    
    
    <tr>
      <td height="150" valign="top"><br><br>Adres.........................:</td>
      <td>
      <textarea name="adres" cols="30" rows="5"></textarea></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td height="50">&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Kaydı Tamamla" style="color:rgba(0,153,102,1);background-color:rgba(204,204,204,1);"></td>
      <td><input type="hidden" name="kayit" value="1"></td>
    </tr>
  </table>
</form>
  <?php }//post ile kayit gelmediyse son ?>          
            </div>
<!--/////////////////////////////////////////////Content2 son////////////////////////////////////////////////////////////-->
        
        
        
        </div>
<!--/////////////////////////////////////////////Content2 son////////////////////////////////////////////////////////////-->

		













	 <?php require_once('footer.php') ?>	
<!--///////////////////////////////////////////footer son////////////////////////////////////////////////////////////////-->
</body>
</html>