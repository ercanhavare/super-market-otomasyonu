<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<div class="footer">
    <?php
	require_once("db/dbconnect.php");
	
    if(empty($baglan)) die(@mysql_close($baglan));
	
	
	?>	
    
   @ Copyright Ercan HAVARE 2014
    </div>
</body>
</html>