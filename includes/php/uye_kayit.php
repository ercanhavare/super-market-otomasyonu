<?php ob_start();?>
<html>
<head>
<link rel="stylesheet" media="all" href="../css/giris.css" type="text/css"/>
<title>Mozaik Market</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
 
        <?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

require_once('db/dbconnect.php');

$uye_ad = $_POST["ad"];
$uye_soyad = $_POST["soyad"];
$uye_email = $_POST["email"];
$kullanici_adi = $_POST["kullanici_adi"];
$uye_parola = $_POST["parola"];
$uye_parola_tekrar = $_POST["parola_tekrar"];
$uye_telefon = $_POST["telefon"];
$cinsiyet = $_POST["cinsiyet"];
$d_tarih = $_POST["d_tarih"];
$uye_adres = $_POST["adres"];

//kayıt doğrulama
if($kullanici_adi=="" or $uye_parola=="" or $uye_parola_tekrar=="")
{
	echo  "<div class='hatalar'>Lütfen tüm alanları eksiksiz doldurun!";
	header("Refresh: 2; url=uye_kayit.php");
	return;
}
elseif($uye_parola != $uye_parola_tekrar)
{
	echo  "<div class='hatalar'>Parola ve Parola Tekrar alanları aynı olmalı! ";
	header("Refresh: 2; url=uye_kayit.php");
	return;	
}


$tablo="uyeler";
$sorgu=sprintf("SELECT * FROM $tablo WHERE kullanici_adi='".$kullanici_adi."'") or die(mysql_error());

$isim_kontrol = mysql_query($sorgu);

$uye_varmi = mysql_num_rows($isim_kontrol);
if($uye_varmi > 0)
{
	echo  "<div class='hatalar'>Kullanıcı adı başka bir üye tarafından kullanılıyor!</div> ";
	header("Refresh: 2; url=uye_kayit.php");
	return;		
}

$email_kontrol = mysql_query("select * from uyeler where email='".$email."'") or die (mysql_error());

$email_varmi = mysql_num_rows($email_kontrol);
if($email_varmi > 0)
{
	echo  "<div class='hatalar'>E-Posta başka bir üye tarafından kullanılıyor!</div> ";
	header("Refresh: 2; url=uye_kayit.php");
	return;		
}



//UYE KAYIT
$tablo="uyeler";
$sorgu=sprintf("INSERT INTO %s (ad, soyad, email, kullanici_adi ,parola, telefon, cinsiyet, d_tarih, adres)
				VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $tablo,
				$uye_ad, $uye_soyad, $uye_email, $kullanici_adi, md5(md5($uye_parola)), $uye_telefon, $cinsiyet, $d_tarih, $uye_adres);

$yeni_kayit = @mysql_query($sorgu);
if(!$yeni_kayit) die("<div class='hatalar'>Kayıt işlemi yapılamadı, lütfen bekleyiniz.</div>");
if($yeni_kayit)
{
	echo  "<div class='hatalar'>Kayıt işlemi tamamlandı, lütfen bekleyiniz.</div>";
	header("Refresh: 2; url=../../index.php");
	return;		
}

}


ob_end_flush();
?>

	   
		<body>
    <style>
	   a{text-decoration:none;color:rgba(204,204,204,1);}
	   a:hover{color:rgba(255,255,255,1);}
	   </style>
        <div class="baslik"><a href="../../index.php">MOZAİK SÜPERMARKET OTOMASYONU</a></div>
		<div class="kayit"><br />
   <form name="form1" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th height="50" colspan="3" scope="col">ÜYE KAYIT FORMU</th>
    </tr>
    <tr>
    <tr>
      <th height="50" colspan="3" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td width="162" height="50">Ad................................:</td>
      <td width="240">
      <input name="ad" type="text"  size="25"></td>
      <td width="342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hoşgeldiniz, Şu anda üye kayıt sayfasındasınız.</td>
    </tr>
    <tr>
      <td height="50">Soyad........................:</td>
      <td>
      <input name="soyad" type="text"  size="25"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Üye kayıt formunu doldurduktan sonra sizleri de<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;aramızda görmekten mutluluk duyacağız.</td>
    </tr>
    <tr>
      <td height="50">E-mail........................:</td>
      <td>
      <input name="email" type="text"  size="25"></td>
      <td></td>
    </tr>
    <tr>
      <td height="50">Kullanıcı Adı..........:</td>
      <td>
      <input name="kullanici_adi" type="text"  size="25"></td>
      <td></td>
    </tr>
    <tr>
      <td height="50">Parola........................:</td>
      <td>
      <input name="parola" type="password"  size="25"></td>
      <td rowspan="5"></td>
    </tr>
    <tr>
      <td height="50">Parola Tekrarı......:</td>
      <td>
      <input name="parola_tekrar" type="password"  size="25"></td>
    </tr>
    <tr>
      <td height="50">Telefon......................:</td>
      <td>
      <input name="telefon" type="text"  size="25"></td>
    </tr>
    <tr>
      <td height="50">Cinsiyet.....................:</td>
      <td>Erkek<input type="radio" name="cinsiyet" value="Erkek">
        
        Kadın<input type="radio" name="cinsiyet" value="Kadın">
      </td>
    </tr>
    <tr>
      <td height="50">Doğum Tarihi........:</td>
      <td>
        <input type="date" name="d_tarih" />
        </td>
    </tr>
    <tr>
      <td height="150" valign="top"><br><br>Adres..........................:</td>
      <td>
      <textarea name="adres"  cols="30" rows="5"></textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="50">&nbsp;</td>
      <td>
      <input type="hidden" name="kayit" value="kabul" />
      <input type="submit" name="button"  value="Kaydı Tamamla" style="color:rgba(0,153,102,1);background-color:rgba(204,204,204,1);"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>  
    
 <!--/////////////////////////////////////////////kayıt son//////////////////////////////////////////////////////-->
		</div>

</body>
</html>