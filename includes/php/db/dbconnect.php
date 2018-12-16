<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mozaik Süpermarket Stok Otomasyonu</title>
<body>

<?php

//Veritabanı Tanımlamaları


$db_user="root";
$db_password="";
$db_name="market";
$db_server="localhost";
$db_char="SET NAMES utf8";



//db bağlantısı

$baglan=@mysql_connect($db_server,$db_user,$db_password);
	if(!$baglan) die("Hata:Sunucu bağlantı hatası".mysql_error());
	
$db_baglan=@mysql_select_db($db_name,$baglan);
	if(!$db_baglan) die("Hata:Veritabanı bağlantı hatası".mysql_error());
	
@mysql_query($db_char);



?>
</body>
</html>