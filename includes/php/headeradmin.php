<!doctype html>
<html>
    <head>
    <link rel="stylesheet" media="all" href="../css/style.css"  type="text/css"/>
    <link rel="stylesheet" media="all" href="../css/style2.css" type="text/css" />
    <meta charset="utf-8">
    <title>Mozaik Süpermarket Stok Otomasyonu</title>

    </head>
<?php 
session_start();
if(empty($_SESSION["kullanici_adi"])) echo "<script>alert('Bu sayfayı görme yetkiniz bulunmuyor!')</script>"; ?>
    		<div class="header2">
            
        <div class="menu">
        
 <div class="right" align="right">Hoşgeldin&nbsp;&nbsp;
 	<a href="admin_hesap_ayarlari.php?session=<?php echo $_SESSION["kullanici_adi"]; ?>">
 		<?php echo $_SESSION["kullanici_adi"];?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	|
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<a href="cikis.php">Çıkış</a></div>
            
                <div class="left">MOZAİK SÜPERMARKET STOK OTOMASYONU</div>
              <div style="clear:left"></div>  
		</div>
 <!--///////////////////////////////////////////Menu son////////////////////////////////////////////////////////////////-->

         		<div class="menu2">
                
                
                
                
                
                </div>
         
         
            </div>
 		
<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
