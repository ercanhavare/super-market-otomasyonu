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
 //silme işlemi
 
 $tablo = "musteriler";
 $sorgu = sprintf("DELETE FROM $tablo WHERE tc_no='%s'",$_GET["tc_no"]);
 $sonuc = @mysql_query($sorgu);
 
 	if($sonuc){
		echo "
			<script type='text/javascript'>
				alert(Müşteri kaydı başarıyla silindi.);
				window.location = 'musteri_sil.php';
			</script>
		";
		
		}else{
			echo "
			<script type='text/javascript'>
				alert(Müşteri kaydı silinemedi.);
				window.location = 'musteriler.php';
			</script>
		";
			}
 
 //sorgulama 
 
 $sorgu = "SELECT * FROM $tablo";
 $sonuc = @mysql_query($sorgu);
  if(!$sonuc){
	   echo "<script type='text/javascript'> 
	   alert('Veri okuma hatası...'); 
	   window.location = 'musteriler.php';
	   </script>";}
	   
	//kayit sayisi
	$kayit_sayisi = @mysql_num_rows($sonuc);
	if($kayit_sayisi==0){ 
	
		echo "<script type='text/javascript'> 
		  var karar=confirm('Müşteri kaydı bulunamadi.  Müşteriler sayfasına dönmek ister misiniz?');
		  if(karar) window.location = 'musteri_ekle.php';
	   </script>";
  		
		}
 ?>       
        	<div class="tablo">
            	<br /><br />
<form id="form1" name="form1" method="post" action="">
<div style="float:right;padding-right:50px;font-weight:bold;color:rgba(0,153,102,1);"><?php echo "Toplam Kayıt :".$kayit_sayisi; ?></div>
  <table width="950" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px dotted red;">
    <tr align="center">
     <td width="100" height="50"><h4>T.C. NO</h4></td>
      <td width="120" height="50"><h4>AD</h4></td>
      <td width="120" height="50"><h4>SOYAD</h4></td>
      <td width="120" height="50"><h4>CİNSİYET</h4></td>
      <td width="120" height="50"><h4>TELEFON</h4></td>
      <td width="120" height="50"><h4>E-MAIL</h4></td>
      <td width="120" height="50"><h4>ADRES</h4></td>
      <td width="100" height="50"><h4>İŞLEMLER</h4></td>
    </tr>
   <?php 
   while($satir = @mysql_fetch_array($sonuc)){ ?>
  
   <tr align="center" style="color:rgba(255,0,0,1);">
     <td height="35" bgcolor="#CCCCCC"><?php echo $satir["tc_no"];  ?> </td>
      <td bgcolor="#999999"><?php echo $satir["ad"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["soyad"];  ?> </td>
      <td bgcolor="#999999"><?php echo $satir["cinsiyet"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["telefon"];  ?> </td>
      <td bgcolor="#999999"><?php echo $satir["email"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["adres"];  ?> </td>
      <style>
	  .islem a{color:rgba(255,255,255,1);text-decoration:none;}
	  .islem a:hover{color:rgba(255,51,0,1);}
	  </style>
      <td bgcolor="#999999" class="islem">
      <a href="musteri_sil.php?tc_no=<?php echo $satir["tc_no"];  ?>" onclick="return confirm('Silme işlemini onaylıyor musunuz?')">Sil</a>	
      
     
      </td>
     </tr>
     <?php } ?>
     
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