<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/giris.css" media="all" type="text/css" />
<title>Untitled Document</title>
</head>

<body>
 <?php
 ob_start();
 session_start();


require_once("db/dbconnect.php");

$kullanici_adi = htmlentities(mysql_real_escape_string($_POST["kullanici_adi"]));
$parola = md5(md5(htmlentities(mysql_real_escape_string($_POST["parola"]))));

$sorgula = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='{$kullanici_adi}' and parola='{$parola}'") or die (mysql_error());

$uye_varmi = mysql_num_rows($sorgula);
if($uye_varmi > 0)
{
$_SESSION["giris"] = "true";
$_SESSION["kullanici_adi"] = $kullanici_adi;
$_SESSION["parola"] = $parola;

setcookie("kullanici_adi",$kullanici_adi,time()+60*60*24);
setcookie("parola",$parola,time()+60*60*24);


echo  "<div class='hatalar'><img src=../../images/yukleniyor.gif border=0 /> Giriş başarılı, lütfen bekleyiniz..</div>";
	header("Refresh: 2; url=home.php");
	return;
}

else
{
	
echo  "<div class='hatalar'><img src=../../images/hata.gif border=0 /> Kullanıcı adı veya parola hatalı!</div>";
	header("Refresh: 2; url=../../index.php");
	return;	
	
}
mysql_close();
ob_end_flush();
?>
</body>
</html>