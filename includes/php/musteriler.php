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
  //tablo adi
  $tablo = "musteriler";
 
 //sorgulama
  $sorgu = "SELECT * FROM $tablo";
  $sonuc = @mysql_query($sorgu);
  if(!$sonuc){
	  echo "<script>alert('Veri okunamadı.')</script>";
	  header("refresh:2; url=../../index.php");
	  }
  //kayit sayısı
  $kayit_sayisi = @mysql_num_rows($sonuc);
  if(!$kayit_sayisi){
	  //true or false 
	  echo "<script>
	  
	  var karar=confirm('Müşteri kaydı bulanamadı. Müşteri kayıt sayfasına gitmek ister misiniz?');
	  if(karar) window.location = 'musteri_ekle.php'
	  
	  </script> "; 	  
	  }

  
  ?>     
        	<div class="tablo">
            	<br /><br />
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div style="float:right;padding-right:50px;font-weight:bold;color:rgba(0,153,102,1);">Toplam müşteri sayısı :<?php echo $kayit_sayisi;?></div>
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px dotted red;">
    <tr align="center">
     <td width="70" height="50"><h4>T.C. NO</h4></td>
      <td width="120" height="50"><h4>AD</h4></td>
      <td width="120" height="50"><h4>SOYAD</h4></td>
      <td width="120" height="50"><h4>CİNSİYET</h4></td>
      <td width="120" height="50"><h4>TELEFON</h4></td>
      <td width="120" height="50"><h4>E-MAIL</h4></td>
      <td width="120" height="50"><h4>ADRES</h4></td>
      <td width="100" height="50"><h4>İŞLEMLER</h4></td>
  
    </tr>
<?php 
	while($satir=@mysql_fetch_array($sonuc)){//dongu başladı...


 ?>
    <tr align="center" style="color:rgba(255,0,0,1);">
     <td height="35" bgcolor="#CCCCCC"><?php echo $satir["tc_no"]; ?></td>
      <td bgcolor="#999999"><?php echo $satir["ad"]; ?></td>
      <td bgcolor="#CCCCCC"><?php echo $satir["soyad"]; ?></td>
      <td bgcolor="#999999"><?php echo $satir["cinsiyet"]; ?></td>
      <td bgcolor="#CCCCCC"><?php echo $satir["telefon"]; ?></td>
      <td bgcolor="#999999"><?php echo $satir["email"]; ?></td>
      <td bgcolor="#CCCCCC"><?php echo $satir["adres"]; ?></td>
      <style>
	  .islem a{color:rgba(255,255,255,1);text-decoration:none;}
	  .islem a:hover{color:rgba(255,51,0,1);}
	  </style>
      <td bgcolor="#999999" class="islem">
      <a href="musteri_duzenle.php?tc_no=<?php echo $satir['tc_no']; ?>">Düzenle</a>	|	<a href="musteri_sil.php">Sil</a>	
      </td>
     </tr>
<?php }//dongu bitti... ?>	  
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