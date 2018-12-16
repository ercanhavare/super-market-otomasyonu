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
 $tablo = "musteriler";
 //kaydı getir
 if(!$_GET["tc_no"]==""){
	 require_once("db/dbconnect.php");
	 $sorgu = sprintf("SELECT * FROM $tablo WHERE tc_no='%s'",$_GET["tc_no"]);
	 $sonuc = @mysql_query($sorgu);
	 
	 if(@mysql_num_rows($sonuc)==0) echo "<script type='text/javascript'>alert('Müşteri kaydı bulunamadı.');</script>";
	 $satir = @mysql_fetch_array($sonuc);//verileri cek...
	 }elseif($_POST["kayit"]=="guncelle"){
		 require_once("db/dbconnect.php");
		 $sorgu = sprintf("UPDATE $tablo SET tc_no='%s',ad='%s',soyad='%s',email='%s',telefon='%s',
		 							cinsiyet='%s',d_tarih='%s',adres='%s' WHERE tc_no='%s'",
		 					$_POST["tc_no"],$_POST["ad"],$_POST["soyad"],$_POST["email"],
									$_POST["telefon"],$_POST["cinsiyet"],$_POST["d_tarih"],$_POST["adres"],$_POST["id"]);
		 $sonuc = @mysql_query($sorgu);
				 //güncelleme cevabı...
				 if($sonuc) {
					 echo "
						 <script type='text/javascript'>
						 
								 alert('Müşteri kaydı başarıyla güncellendi.');
								 window.location = 'musteriler.php';
								 
						 </script>";
						 }else{
							 echo "
								 <script type='text/javascript'>
								 
										 alert('Kayıt güncelleme başarısız oldu.');
										 window.location = 'musteriler.php';
										 
								 </script>"; }//guncelleme cevabı son...	 
		 
		 }else{
			  echo "
		 <script type='text/javascript'>
		 
				 alert('Güncelleme doğrudan çalıştırılamaz.');
				 window.location = 'musteriler.php';
		 
		 </script>"; 
			 }
		 
		 
		 
 
 
 
 
 
 ?>       
        	<div class="tablo">
            	<br /><br /><br />
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
      <td width="162" height="50">T.C. No......................:</td>
      <td width="240">
      <input name="tc_no" type="text" size="25" maxlength="11" value="<?php echo $satir['tc_no']; ?>"></td>
      <td width="342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Müşteri ekleme sayfasındasınız.</td>
    </tr>
    
    <tr>
      <td width="162" height="50">Ad..............................:</td>
      <td width="240">
      <input name="ad" type="text" size="25" value="<?php echo $satir['ad']; ?>"></td>
      <td width="342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bu sayfada müşteri kaydı yapabilirsiniz.</td>
    </tr>
   
    <tr>
      <td height="50">Soyad........................:</td>
      <td>
      <input name="soyad" type="text"  size="25" value="<?php echo $satir['soyad']; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    
    
    
    <tr>
      <td height="50">E-mail........................:</td>
      <td>
      <input name="email" type="text" size="25" value="<?php echo $satir['email']; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    
   
   
   
    <tr>
      <td height="50">Telefon......................:</td>
      <td>
      <input name="telefon" type="text"  size="25" maxlength="11" value="<?php echo $satir['telefon']; ?>"></td>
    </tr>
    
    
    
    <tr>
      <td height="50">Cinsiyet......................:</td>
      <td>Erkek<input type="radio" name="cinsiyet" value="Erkek" <?php if($satir['cinsiyet']=='Erkek') echo 'checked="checked"'; ?>>
        
        Kadın<input type="radio" name="cinsiyet"  value="Kadın" <?php if($satir['cinsiyet']=='Kadın') echo 'checked="checked"'; ?>>
      </td>
    </tr>
   
   
   
    <tr>
      <td height="50">Doğum Tarihi.............:</td>
      <td><input type="date" name="d_tarih" size="25" value="<?php echo $satir['d_tarih']; ?>"></td>
    </tr>
    
    
    
    <tr>
      <td height="150" valign="top"><br><br>Adres.........................:</td>
      <td>
      <textarea name="adres" cols="30" rows="5"><?php echo $satir['adres']; ?></textarea></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td height="50">&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Kaydı Güncelle" style="color:rgba(0,153,102,1);background-color:rgba(204,204,204,1);"></td>
      <td>
      <input type="hidden" name="kayit" value="guncelle">
      <input type="hidden" name="id" value="<?php echo $satir['tc_no']; ?>">
      </td>
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