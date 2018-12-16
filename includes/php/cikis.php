<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="all" href="../css/giris.css" type="text/css"/>
<?php
ob_start();
session_start();
session_destroy();

setcookie ("kullanici_adi", "", time() - 3600);
setcookie ("parola", "", time() - 3600);

echo  "<div class='hatalar'><img src=../../images/yukleniyor.gif border=0 /> Çıkış işlemi tamamlandı, lütfen bekleyiniz..</div>";
header("Refresh: 2; url= ../../index.php");
ob_end_flush();
?>