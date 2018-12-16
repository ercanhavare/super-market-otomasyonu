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
 //kaydı getir
 $tablo = "uyeler";
 if(!empty($_GET["session"])){
	 require_once("db/dbconnect.php");
	 $sorgu = @sprintf("SELECT * FROM $tablo WHERE kullanici_adi='%s'",$_GET["session"]);
	 $sonuc = @mysql_query($sorgu);
	 
	 $satir = @mysql_fetch_array($sonuc);//verileri cek...
	 
 			}elseif($_POST["guncelle"]=="1"){//guncelleme işlemi yap
					
		$sorgu = @sprintf("UPDATE uyeler SET ad='%s',soyad='%s',email='%s',telefon='%s',cinsiyet='%s',d_tarih='%s',adres='%s' 
				 WHERE kullanici_adi='%s'",$_POST["ad"],$_POST["soyad"],$_POST["email"],$_POST["telefon"],$_POST["cinsiyet"],
				  $_POST["d_tarih"],$_POST["adres"],$_POST["id"]);
								
			$guncelle = @mysql_query($sorgu);
			//güncelleme cevabı...
				 if($guncelle) {
					 echo "
						 <script type='text/javascript'>
						 
								 alert('Hesap bilgileriniz başarıyla güncellendi.');
								 window.location = 'home.php';
								 
						 </script>";
						 }else{
							 echo "
								 <script type='text/javascript'>
								 
										 alert('Kayıt güncelleme başarısız oldu.');
										 window.location = 'home.php';
										 
								 </script>"; }//guncelleme cevabı son...	 
		 
		 }else{//direk çalıştırma red
			  echo "
		 <script type='text/javascript'>
		 
				 alert('Güncelleme doğrudan çalıştırılamaz.');
				 window.location = 'home.php';
		 
		 </script>"; 
			 }
		 
		 
		 
 
 ?>

 
 
        
        	<div class="tablo">
            	<br /><br /><br />
<form name="form1" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
      <td width="162" height="50">Ad......................:</td>
      <td width="240">
      <input name="ad" type="text" size="25" maxlength="11" value="<?php echo $satir['ad']; ?>"></td>
      <td width="342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hesap Ayarları sayfasındasınız.</td>
    </tr>
    
    <tr>
      <td width="162" height="50">Soyad..............................:</td>
      <td width="240">
      <input name="soyad" type="text" size="25" value="<?php echo $satir['soyad']; ?>"></td>
      <td width="342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bu sayfada hesap bilgilerinizi düzenleyebilirsiniz.</td>
    </tr>
   
    <tr>
      <td height="50">E-mail........................:</td>
      <td>
      <input name="email" type="text"  size="25" value="<?php echo $satir['email']; ?>"></td>
      <td>&nbsp;</td>
    </tr>    
    
    <tr>
      <td height="50">Telefon......................:</td>
      <td><input type="text" name="telefon" size="25" value="<?php echo $satir['telefon']; ?>">
      </td>
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
      <td><input type="submit"  value="Kaydet" style="color:rgba(0,153,102,1);background-color:rgba(204,204,204,1);"></td>
      <td>
      <input type="hidden" name="guncelle" value="1">
      <input type="hidden" name="id" value="<?php echo $satir['kullanici_adi']; ?>">
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