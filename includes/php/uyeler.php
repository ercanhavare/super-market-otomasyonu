<?php require_once('db/dbconnect.php'); ?>
<?php include_once("headeradminalt.php");?>

    <body>

 		
<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
 		<div class="content2">
  <?php
  $tablo = "uyeler";
  $sorgu = "SELECT * FROM uyeler";
  $sonuc = @mysql_query($sorgu);
  
  if(!$sonuc) echo "
  		<script type='text/javascript'>
			alert('Veri okuma hatası.');
			window.location = 'admin.php';
		</script>";
  
  $kayit_sayisi = @mysql_num_rows($sonuc);
  if($kayit_sayisi==0) echo "
  		<script type='text/javascript'>
			karar=confirm('Kayıtlı üye bulunamadi.Devam etmek ister misiniz?');
			if(karar){window.location = 'uye ekle.php';
			}else{
				window.location = 'admin.php';
				}
			
		</script>";
  
  
  
  ?>      
        	<div class="tablo">
            <div style="text-align:right;padding-right:50px;color:rgba(0,153,102,1); font-weight:bold;"></div>
            	<br /><br />
<form id="form1" name="form1" method="post" action="">
<div style="float:right;padding-right:50px;font-weight:bold;color:rgba(0,153,102,1);"><?php echo "Toplam Kayıt :".$kayit_sayisi; ?></div>
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px dotted red;">
    <tr align="center" style="font-size:13px">
      <td width="100" height="50"><h4>AD</h4></td>
      <td width="100" height="50"><h4>SOYAD</h4></td>
      <td width="100" height="50"><h4>E-MAIL</h4></td>
      <td width="100" height="50"><h4>KULLANICI ADI</h4></td>
      <td width="100" height="50"><h4>TELEFON</h4></td>
      <td width="100" height="50"><h4>CİNSİYET</h4></td>
      <td width="100" height="50"><h4>DOGUM TARİHİ</h4></td>
      <td width="100" height="50"><h4>ADRES</h4></td>
       <td width="150" height="50"><h4>İŞLEMLER</h4></td>
    </tr>
   <?php 
   while($satir=mysql_fetch_array($sonuc)){
   
   
   ?>
    <tr align="center" style="color:rgba(255,0,0,1);">
     <td height="35" bgcolor="#999999"><?php echo $satir["ad"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["soyad"];  ?> </td>
      <td bgcolor="#999999"><?php echo $satir["email"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["kullanici_adi"];  ?> </td>
      <td bgcolor="#999999"><?php echo $satir["telefon"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["cinsiyet"];  ?> </td>
      <td bgcolor="#999999"><?php echo $satir["d_tarih"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["adres"];  ?> </td>
      <style>
	  .islem a{color:rgba(255,255,255,1);text-decoration:none;}
	  .islem a:hover{color:rgba(255,51,0,1);}
	  </style>
      <td bgcolor="#999999" class="islem">
      <a href="uye_duzenle.php?kullanici_adi=<?php echo $satir["kullanici_adi"]; ?>">Düzenle</a>	|	<a href="uye_sil.php">Sil</a>	
      
     <?php } ?> 
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