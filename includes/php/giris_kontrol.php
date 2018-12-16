<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="all" href="../css/giris.css" type="text/css"/>
<title>Mozaik Süpermarket Otomasyonu</title>
</head>

<body>
<?php
    session_start();
ob_start();

if(!isset($_SESSION["giris"]))
{
echo  "<div class='hatalar'><img src=../../images/hata.gif border=0 />Bu sayfayı görüntülemek için giriş yapmalısınız.</div>";
header("Refresh: 2; url= ../../index.php");
return;
}
 require_once('db/dbconnect.php');

$sorgula = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='".$_COOKIE["kullanici_adi"]."' and parola='".$_COOKIE["parola"]."'") or die (mysql_error());

$uyeler = mysql_fetch_array($sorgula);
// giriş yapan üye admin yetkisine sahip ise yönetim paneline yönlendiriyoruz
if($uyeler['yetki']=="1")
{
$_SESSION["yetki"]="true";	
echo  "
	<script type='text/javascript'>
	alert('Admin Paneline yöndiriliyorsunuz, lütfen bekleyiniz.');
	window.location = 'admin.php';
	</script>";
	return;

}
?>
</body>
</html>