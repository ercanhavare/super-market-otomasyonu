<?php require_once('giris_kontrol.php'); ?>
<?php session_start(); ?>

<title>MOZAİK</title>

    		<div class="header2">
            
        <div class="menu">
        
                <div class="right" align="right">Hoşgeldin&nbsp;&nbsp;<a href="hesap_ayarlari.php?session=<?php echo $_SESSION['kullanici_adi']; ?>"><?php echo $_SESSION["kullanici_adi"];?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	|
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<a href="cikis.php">Çıkış</a></div>
            
                <div class="left">MOZAİK SÜPERMARKET STOK OTOMASYONU</div>
              <div style="clear:left"></div>  
		</div>
 <!--///////////////////////////////////////////Menu son////////////////////////////////////////////////////////////////-->
<style>
	
	body{
	background-image:url(../../images/background/arkaplan2.jpg);
	background-repeat:no-repeat;
	background-attachment:fixed;
	background-size:cover;}
	
	</style>
         		<div class="menu2">
                
                <ul id="menu3">
                	 <li><a href="home.php">Anasayfa</a></li>
                       <li><a href="hakkimizda.php">Hakkımızda</a></li>
                      
                                
                    <li><a href="stok_listele.php">Stok</a>
                    	<ul>
                        <li><a href="stok_listele.php">Stok Listele</a></li>
                        <li><a href="stok_ekle.php">Stok Ekle</a></li>
                        <li><a href="stok_sil.php">Stok Sil</a></li>
                        </ul>                                              
                    </li>
                                 
					<li><a href="satislarim.php">Satışlarım</a></li>
                    
                    <li><a href="musteriler.php">Müşteri</a>
                    	<ul>
                        <li><a href="musteriler.php">Müşteriler</a></li>
                        <li><a href="musteri_ekle.php">Müşteri Ekle</a></li>
                        <li><a href="musteri_sil.php">Müşteri Sil</a></li>
                        </ul>   
                    </li>
                	
                    <li><a href="hesap_ayarlari.php?session=<?php echo $_SESSION['kullanici_adi']; ?>">Hesap Ayarları</a></li>
                    <li><a href="iletisim.php">İletişim</a></li>
                                    
                </ul>
                
                
                
                </div>
         
         
            </div>
 		
<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
