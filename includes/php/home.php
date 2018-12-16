<?php require_once('db/dbconnect.php'); ?>

<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Mozaik Süpermarket Stok Otomasyonu</title>
  <?php require_once('giris_kontrol.php'); ?>  

</head>
    <style>
	
	body{
	background-image:url(../../images/background/arkaplan2.jpg);
	background-repeat:no-repeat;
	background-attachment:fixed;
	background-size:cover;}
	
	</style>
    <body>
  
     <!--///////////login css//////////////-->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
	<!-- Skitter Styles -->
	<link href="../css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
    
	<!-- Skitter JS -->
	<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.skitter.min.js"></script>
	
	<!-- Init Skitter -->
	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'clean',
				numbers_align: 'center',
				progressbar: true, 
				dots: true, 
				preview: true
			});
		});
	</script>

</head>

<body>
<div class="header">
    
        <div class="menu">
        
                <div class="right"><a href="home.php">Anasayfa</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	|
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<a href="hakkimizda.php">Hakkımızda</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
                <a href="iletisim.php"> İletişim</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<a href="cikis.php">Çıkış</a></div>
            
                <div class="left">MOZAİK SÜPERMARKET STOK OTOMASYONU</div>
                <div style="clear:left"></div>
		</div>
 <!--///////////////////////////////////////////Menu son////////////////////////////////////////////////////////////////-->
  <div class="user">
  
  	<div class="userimg"><!--///////////////////////Profil resim start///////////////////////////////-->
    <?php
    
	$sorgu = @sprintf("SELECT * FROM profil_resim WHERE kullanici_adi = '%s'",$_SESSION["kullanici_adi"]);
	$sonuc = @mysql_query($sorgu);
	
		$satir=@mysql_fetch_array($sonuc);
		echo " <img src='$satir[image]' width='95' height='100'/> ";
	
	
	
	
	?>
	

    </div><!--///////////////////////Profil resim end///////////////////////////////-->
 <!--///////////////////////////////////////////Userimg son//////////////////////////////////////////////////////-->
    <div class="usertext">
    		<p>Hoşgeldin, <?php echo ucwords($_COOKIE["kullanici_adi"]);?></p>
            <p><a href="profil_image.php">Profil Resmini Düzenle</a></p>
    </div>
 <!--///////////////////////////////////////////Usertext son//////////////////////////////////////////////////////////-->  
  </div>
  <!--///////////////////////////////////////////User son////////////////////////////////////////////////////////////////-->
  <div class="imggalery">
  
				<div class="box_skitter box_skitter_large">
					<ul>
						<li><img src="../../images/header/home_header/001.jpg" class="cube" /></li>
						<li><img src="../../images/header/home_header/002.jpg" class="cubeRandom" /></li>
						<li><img src="../../images/header/home_header/003.jpg" class="block" /></li>
						<li><img src="../../images/header/home_header/004.jpg" class="cubeStop" /></li>
                        <li><img src="../../images/header/home_header/005.jpg" class="cubeRandom" /></li>
						<li><img src="../../images/header/home_header/006.jpg" class="block" /></li>	
                        <li><img src="../../images/header/home_header/007.jpg" class="cubeStop" /></li>
					</ul>
         
				</div>
<!--///////////////////////////////////////////Galeri son////////////////////////////////////////////////////////////////-->
  
  </div>
<!--///////////////////////////////////////////Imggalery son//////////////////////////////////////////////////////////-->
</div>
<!--///////////////////////////////////////////Header son////////////////////////////////////////////////////////////////--></label>
      <div class="iceriktut">  
            <div class="content">
            
                <div class="contenttut">
                
                      <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/Stok Listele.jpg"></div>
                     <div class="menutext"><p align="center"><a href="stok_listele.php">STOK LİSTELE</a><p></div>
                     
                  </div>
                     
                     
                    <div class="menu">
                     	<div class="menuimg"><a href="stok_ekle.php"><img src="../../images/content/ekle.jpg"></a></div>
                     	<div class="menutext"><p align="center"><a href="stok_ekle.php">STOK EKLE</a><p></div>
                     
                  </div>
 
                    <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/sil.jpg"></div>
                     	<div class="menutext"><p align="center"><a href="stok_sil.php">STOK SİL</a><p></div>
                     
                  </div>
                  
                  
                   
                    <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/musteriler.jpg"></div>
                     	<div class="menutext"><p align="center"><a href="musteriler.php">MÜŞTERİLER</a><p></div>
                     
                  </div>
 <!--/////////////////////////////////////////Contenttut Son////////////////////////////////////////////////////////////-->
              </div>
   
                <div class="contenttut">
                
                
                     <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/satis.jpg"></div>
                     	<div class="menutext"><p align="center"><a href="stok_listele.php">SATIŞ YAP</a><p></div>
                     
                     </div>
                     
                  
                   <div class="menu">
                   		<div class="menuimg"><img src="../../images/content/guncelle.jpg"></div>
                     	<div class="menutext"><p align="center"><a href="satislarim.php">SATIŞLARIM</a><p></div>
                     
                  </div>


                    <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/hesabim.jpg"></div>
                     	<div class="menutext"><p align="center"><a href="hesap_ayarlari.php?session=<?php echo $_SESSION['kullanici_adi']; ?>">HESAP AYARLARI</a><p></div>
                     
                  </div>
  
  
                    <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/cikis.jpg"></div>
                     	<div class="menutext"><p align="center"><a href="cikis.php">ÇIKIŞ</a><p></div>
                     
                  </div>
                    <div class="clear"></div>
                
  <!--///////////////////////////////////////////Contenttut son//////////////////////////////////////////////////////////-->    
                </div>
                
  
<!--///////////////////////////////////////////Content Son////////////////////////////////////////////////////////////-->
            </div>
<!--///////////////////////////////////////////icerik tut son/////////////////////////////////////////////////////////-->  
	</div>        
        
	 <?php require_once('footer.php') ?>	
<!--///////////////////////////////////////////footer son////////////////////////////////////////////////////////////////-->
</body>
</html>