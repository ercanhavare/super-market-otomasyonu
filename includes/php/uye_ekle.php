

<!doctype html>
<html>
    <head>
    <link rel="stylesheet" media="all" href="../css/style.css"  type="text/css"/>
    <link rel="stylesheet" media="all" href="../css/style2.css" type="text/css" />
    <meta charset="utf-8">
    <title>Mozaik Süpermarket Stok Otomasyonu</title>

    </head>
    
    <body>
  <?php include_once("headeradminalt.php");?>
<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
 		<div class="content2">
 
 <?php
 ob_start();
 if($_POST["kayit"]==1){
	require_once('db/dbconnect.php');
//karsılama	 
 $ad = $_POST["ad"];
 $soyad=$_POST["soyad"];
 $email=$_POST["email"];
 $kullanici_adi=$_POST["kullanici_adi"];
 $parola=$_POST["parola"];
 $parola_tekrar=$_POST["parola_tekrar"];
 $telefon=$_POST["telefon"];
 $cinsiyet=$_POST["cinsiyet"];
 $d_tarih=$_POST["d_tarih"];
 $adres=$_POST["adres"];
 
 //bos dolu kontrol
 if(empty($kullanici_adi) || empty($parola) || empty($parola_tekrar)){
	 echo "
	 <script type='text/javascript'>
	 	alert('Lütfen tüm alanları eksiksiz doldurunuz.');
		window.location = 'uye_ekle.php';
	 </script>";
	 
	 }elseif($parola != $parola_tekrar){
		 
		  echo "
	 <script type='text/javascript'>
	 	alert('Girdiğiniz parolalar aynı olmalıdır.');
		window.location = 'uye_ekle.php';
	 </script>";
		 }
 	//var yok kontrol
	
	$tablo = "uyeler";
	
	//kullanici_adi kontrol
	$sorgu = @sprintf("SELECT * FROM $tablo WHERE kullanici_adi = '".$kullanici_adi."'") or die(mysql_error());
	$isim_kontrol = @mysql_query($sorgu);
	
	$uye_varmi = @mysql_num_rows($isim_kontrol);
	
	if($uye_varmi > 0){
		echo "
	 <script type='text/javascript'>
	 	alert('Kullanıcı adı başka bir üye tarafından kullanılıyor!');
		window.location = 'uye_ekle.php';
	 </script>";
	 return;
		}
 	
	//email kontrol	
	$sorgu = @sprintf("SELECT * FROM $tablo WHERE email = '".$email."'") or die(mysql_error());	
	$email_kontrol = @mysql_query($sorgu);
	
	$email_varmi = @mysql_num_rows($email_kontrol);
	
	if($email_varmi > 0){
		echo "
	 <script type='text/javascript'>
	 	alert('E-Posta başka bir üye tarafından kullanılıyor!');
		window.location = 'uye_ekle.php';
	 </script>";
	 return;
		}
 
 //uye kayit
 	
		$tablo="uyeler";
	$sorgu=sprintf("INSERT INTO %s (ad, soyad, email, kullanici_adi ,parola, telefon, cinsiyet, d_tarih, adres)
				VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $tablo,
				$ad, $soyad, $email, $kullanici_adi, md5(md5($parola)), $telefon, $cinsiyet, $d_tarih, $adres);
	
	$sonuc=@mysql_query($sorgu);
	
		if($sonuc){
			echo "
			<script type='text/javascript'>
				alert('Kayıt başarıyla tamamlandı.');
				window.location = 'uyeler.php';			
			</script>";
			}else{
			echo "
			<script type='text/javascript'>
				alert('Kayıt işlemi gerçekleşemedi.');		
			</script>";	
				}
	
	}
			
 
 
	
 
 ob_end_flush();
 ?>
 
 
 
 
 
 
 
        
        	<div class="tablo">
            	<br /><br /><br />
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="850" border="0" align="center" cellpadding="0" cellspacing="0">

    
    <tr>
      <td width="162" height="50">Ad..............................:</td>
      <td width="240">
      <input name="ad" type="text" size="25"></td>
      <td width="342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bu sayfada üye kaydı yapabilirsiniz.</td>
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
      <td height="50">Kullanıcı Adı...............:</td>
      <td>
      <input name="kullanici_adi" type="text"  size="25" maxlength="11"></td>
    </tr>
    
     <tr>
      <td height="50">Parola........................:</td>
      <td>
      <input name="parola" type="password"  size="25" maxlength="11"></td>
    </tr>
    
     <tr>
      <td height="50">Parola Tekrarı...........:</td>
      <td>
      <input name="parola_tekrar" type="password"  size="25" maxlength="11"></td>
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
         
            </div>
<!--/////////////////////////////////////////////Content2 son////////////////////////////////////////////////////////////-->
        
        
        
        </div>
<!--/////////////////////////////////////////////Content2 son////////////////////////////////////////////////////////////-->

		













	 <?php require_once('footer.php'); ?>	
<!--///////////////////////////////////////////footer son////////////////////////////////////////////////////////////////-->
</body>
</html>