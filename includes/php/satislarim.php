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
        
        	<div class="tablo">
            	<br /><br />
                <div style="text-align:right;padding-right:50px;color:rgba(0,153,102,1); font-weight:bold;">
<?php
//sorgula
$tablo="satislarim";
$sorgu=@sprintf("SELECT * FROM {$tablo} WHERE kullanici_adi = '%s'",$_SESSION["kullanici_adi"]);

$sonuc=@mysql_query($sorgu);
if(!$sonuc)die($hata="Veri okunamadı".@mysql_error());
$kayit_sayisi=@mysql_num_rows($sonuc);
if($kayit_sayisi==0)die("Henüz satış işlemi gerçekleştirmemişsiniz.");


?>
  
                
                </div>
<form id="form1" name="form1" method="post" action="">
<div style="float:right;padding-right:50px;font-weight:bold;color:rgba(0,153,102,1);"><?php echo "Toplam Kayıt :".$kayit_sayisi; ?></div>
  <table width="950" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px dotted red;">
    <tr align="center">
      <td width="120" height="50"><h4>BARKOD NO</h4></td>
      <td width="120" height="50"><h4>ÜRÜN ADI</h4></td>
      <td width="120" height="50"><h4>ÜRÜN TÜRÜ</h4></td>
      <td width="120" height="50"><h4>ÜRÜN ADEDİ</h4></td>
      <td width="120" height="50"><h4>SATIŞ FİYATI (TL)</h4></td>
    </tr>
   <?php 
   while($satir=mysql_fetch_array($sonuc)){
   
   
   ?>
    <tr align="center" style="color:rgba(255,0,0,1);">
     <td height="35" bgcolor="#CCCCCC"><?php echo $satir["barkod_no"];  ?> </td>
      <td bgcolor="#999999"><?php echo $satir["urun_ad"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["urun_tur"];  ?> </td>
      <td bgcolor="#999999"><?php echo $satir["urun_adet"];  ?> </td>
      <td bgcolor="#CCCCCC"><?php echo $satir["urun_satis"];  ?> </td>
     
     <?php } ?> 
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