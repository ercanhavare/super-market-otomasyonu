<?php require_once('db/dbconnect.php'); ?>
<?php include_once("headeradmin.php");?>

    
    <body>

 		
<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
<div class="iceriktutadmin">  
            <div class="content">
            
                <div class="contenttut">
                
                      <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/musteriler.jpg"></div>
                     <div class="menutext"><p align="center"><a href="uyeler.php">ÜYELER</a><p></div>
                     
                     </div>
                     
                     
                    <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/hakkimizda.png"></div>
                     	<div class="menutext"><p align="center"><a href="admin_hakkimizda.php">HAKKIMIZDA</a><p></div>
                     
                     </div>
 
                    
                     <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/hesabim.jpg"></div>
   <div class="menutext">
   <p align="center">
   <a href="admin_hesap_ayarlari.php?session=<?php echo $_SESSION["kullanici_adi"]; ?>">HESAP AYARLARI</a><p></div>
                     
                     </div>
                    
 
                    <div class="menu">
                     	<div class="menuimg"><img src="../../images/content/iletisim.jpg"></div>
                     	<div class="menutext"><p align="center"><a href="admin_iletisim.php">iLETİŞİM</a><p></div>
                     
                     </div>
 <!--/////////////////////////////////////////Contenttut Son////////////////////////////////////////////////////////////-->
               
                
  
<!--///////////////////////////////////////////Content Son////////////////////////////////////////////////////////////-->
            </div>
<!--///////////////////////////////////////////icerik tut son/////////////////////////////////////////////////////////-->  
	</div>        
        
	 <?php require_once('footer.php') ?>	
<!--///////////////////////////////////////////footer son////////////////////////////////////////////////////////////////-->
</body>
</html>