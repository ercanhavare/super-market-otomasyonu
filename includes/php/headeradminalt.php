<?php
session_start();
if(empty($_SESSION["kullanici_adi"])) echo "
					<script>
							alert('Lütfen giriş yapınız.Yetkiniz bulunmuyor.');
							window.location = '../../index.php'
					</script>


";


?>
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" media="all" href="../css/style.css"  type="text/css"/>
    <link rel="stylesheet" media="all" href="../css/style2.css" type="text/css" />
    <meta charset="utf-8">
    <title>Mozaik Süpermarket Stok Otomasyonu</title>

    </head>
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
                
                <ul id="menu3">
                	 <li><a href="admin.php">Anasayfa</a></li>
                       <li><a href="admin_hakkimizda.php">Hakkımızda</a></li>
                      
                                
                    <li><a href="uyeler.php">Üyeler</a>
                    	<ul>
                        <li><a href="uyeler.php">Üye Listele</a></li>
                        <li><a href="uye_ekle.php">Üye Ekle</a></li>
                        <li><a href="uye_sil.php">Üye Sil</a></li>
                        </ul>                                              
                    </li>
                                 
					
                	
                    <li><a href="admin_hesap_ayarlari.php?session=<?php echo $_SESSION["kullanici_adi"];?>">Hesap Ayarları</a></li>
                    <li><a href="admin_iletisim.php">İletişim</a></li>
                                    
                </ul>
                
                
                
                </div>
         
         
            </div>
 		
<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
