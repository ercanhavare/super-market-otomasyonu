<?php require_once('db/dbconnect.php') ?>
<html>
<head>
<link rel="stylesheet" media="all" href="../css/giris.css" type="text/css"/>
<title>Mozaik Market</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
    
    <?php
session_start();
ob_start();
// sayfaya erişim yapan kişinin admin yetkisini kontrol ediyoruz
if(!isset($_SESSION["yetki"]))
{
echo  "<div class='hatalar'><img src=../../images/hata.gif  border=0 /> Yönetim Paneli sadece yetkili kullanıcılara açıktır!</div>";
header("Refresh: 2; url= ../../index.php");
return;
}
?>
	   <style>
	   a{text-decoration:none;color:rgba(204,204,204,1);}
	   a:hover{color:rgba(255,255,255,1);}
	   </style>
		<body>
    
        <div  class="baslik">   
        <div style="float:left;">MOZAİK SÜPERMARKET OTOMASYONU</div>
		<div style="float:right;padding-right:10px;text-decoration:none;"><a href="../../index.php">Üye</a></div>
        </div>
        <div style="clear:left;"></div>
        
        
        
        
        
		<div class="login">
		  <div class="user">
          	<div class="usertext">	
          Yönetici Girişi
          	</div>
          	<div class="userort">
          <form name="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
          	<p>&nbsp;E mail:<br><input type="text" name="email"  size="25" class="input"/></p>
            <p>&nbsp;Parola:<br><input type="password" name="pass" size="25"  class="input"/></p> 
            <div class="userbuton"> 
       <p><input type="submit" value="Giriş Yap" class="submit"/></p>
       <input type="hidden" name="login" value="1"/>
            </div>
          </form>
          <span style="font:12px Georgia, 'Times New Roman', Times, serif;">
          
 <!--/////////////////////////////////////////////userort son//////////////////////////////////////////////////////-->
          		</div>
          
          
<!--/////////////////////////////////////////////user son//////////////////////////////////////////////////////-->          
          
          </div>
     <hr  style="height:200px; float:left; margin-top:35px; border:1px dotted rgba(229,229,229,1.00);">
          
 
		  <div class="register">
          <div class="registertext">
          <p>Sizde marketinizde satışlarınızı ve müşterilerinizi kayıt altına almak istiyorsanız hemen bizimle çalışmaya başlayabilirsiniz.<br />Bunun için <b>üye kayıt formu<b>nu doldurmanız yeterlidir.</p>
          </div>
          <div class="registerbutton"><a href="includes/php/uye_kayit.php">ÜYE OL!</a></div>
   <div style="clear:left;"></div>        
<!--/////////////////////////////////////////////register son//////////////////////////////////////////////////////-->          
          </div>
 <!--/////////////////////////////////////////////login son//////////////////////////////////////////////////////-->

		</div>

</body>
</html>