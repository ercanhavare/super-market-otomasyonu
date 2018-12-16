<?php require_once('db/dbconnect.php'); ?>
<?php include_once("headeradminalt.php");?>
    
    <body>

<!--/////////////////////////////////////////////Header son////////////////////////////////////////////////////////////-->
 		<div class="content2">
 
 <?php
 
 
 
 if(!empty($_GET["kullanici_adi"])){
	//kaydı getir 
	$tablo = "uyeler";
	 $sorgu = @sprintf("SELECT * FROM $tablo WHERE kullanici_adi = '%s'",$_GET["kullanici_adi"]);
	 $sonuc = @mysql_query($sorgu);
	 
	 if(@mysql_num_rows($sonuc)==0) echo "<script type='text/javascript'>alert('Müşteri kaydı bulunamadı.');</script>";
	 $satir = @mysql_fetch_array($sonuc);
	 
	 }elseif($_POST["guncelle"]==1){//kaydı guncelle
	 
		require_once('db/dbconnect.php');
		
		 $ad = $_POST["ad"];
		 $soyad = $_POST["soyad"];
		 $kullanici_adi = $_POST["kullanici_adi"];
		 $yeni_parola = $_POST["yeni_parola"];
		 $yeni_parola_tekrar = $_POST["yeni_parola_tekrar"];
		 
		 //kullanıcı adı bos kontrol
		 if(empty($kullanici_adi) || empty($yeni_parola) || empty($yeni_parola_tekrar)){
			 
			 echo "
	 <script type='text/javascript'>
	 	alert('Lütfen tüm alanları eksiksiz doldurunuz.');
		window.location = 'uyeler.php';
	 </script>";
			 }elseif($yeni_parola != $yeni_parola_tekrar){
		 
		  echo "
	 <script type='text/javascript'>
	 	alert('Girdiğiniz parolalar aynı olmalıdır.');
		window.location = 'uyeler.php';
	 </script>";
		 }
			 
			 //kullanici adı kontrolü
		$sorgu = @sprintf("SELECT * FROM uyeler WHERE kullanici_adi = '%s'",$kullanici_adi) or die(mysql_error());
		
		$isim_kontrol = @mysql_query($sorgu);
		
		$uye_varmi = @mysql_num_rows($isim_kontrol);
		
		if($uye_varmi > 0){
			echo "
	 <script type='text/javascript'>
	 	alert('Kullanıcı adı başka bir üye tarafından kullanılıyor!');
		window.location = 'uyeler.php';
	 </script>";
		
			}
		 require_once('db/dbconnect.php');
		 //kaydı guncelle
		 $tablo = "uyeler";
		 $guncelle = @sprintf("UPDATE $tablo SET kullanici_adi='%s',parola='%s',WHERE kullanici_adi='%s'",
												$kullanici_adi,$yeni_parola,$_POST["id"]);
									
				$sonuc = @mysql_query($guncelle);
		 	 //güncelleme cevabı...
				 if($sonuc) {
					 echo "
						 <script type='text/javascript'>
						 
								 alert('Üye kaydı başarıyla güncellendi.');
								 window.location = 'uyeler.php';
								 
						 </script>";
						 }else{
							 echo "
								 <script type='text/javascript'>
								 
										 alert('Kayıt güncelleme başarısız oldu.');
										 window.location = 'uyeler.php';
										 
								 </script>"; }//guncelleme cevabı son...	 
		 
		 }else{
			  echo "
		 <script type='text/javascript'>
		 
				 alert('Güncelleme doğrudan çalıştırılamaz.');
				 window.location = 'uyeler.php';
		 
		 </script>"; 
			 }
		 

 ?>
 
 
 
 
 
 
        
               	<div class="tablo">
            	<br /><br /><br />
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="850" border="0" align="center" cellpadding="0" cellspacing="0">

    
    <tr>
      <td width="162" height="50">Ad..............................:</td>
      <td width="240">
      <input name="ad" type="text" size="25" value="<?php echo $satir['ad']; ?>" readonly></td>
      <td width="342">&nbsp;</td>
    </tr>
   
    <tr>
      <td height="50">Soyad........................:</td>
      <td>
      <input name="soyad" type="text"  size="25" value="<?php echo $satir['soyad']; ?>" readonly></td>
      <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="50">Yeni Kullanıcı Adı..........:</td>
      <td>
      <input name="kullanici_adi" type="text"  size="25" maxlength="11" ></td>
    </tr>
    
       <tr>
      <td height="50">Yeni Parola...............:</td>
      <td>
      <input name="yeni_parola" type="password"  size="25" maxlength="11" ></td>
    </tr>
    
       <tr>
      <td height="50">Yeni Parola Tekrarı...............:</td>
      <td>
      <input name="yeni_parola_tekrar" type="password"  size="25" maxlength="11"></td>
    </tr>
    
   
    <tr>
      <td height="50">&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Kaydı Güncelle" style="color:rgba(0,153,102,1);background-color:rgba(204,204,204,1);"></td>
      <td><input type="hidden" name="guncelle" value="1">
      	  <input type="hidden" name="id" value="<?php echo $satir["kullanici_adi"]; ?>"
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