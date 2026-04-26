<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head>
	<title>Выпадающее меню</title>
</head>
<body  cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg">
	<table  topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
	<tr><td>	
	</td></tr><tr><td  >
<table  style=" border-bottom: none; border-left:none; border-right:none; border-top: none;" border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
bordercolor="black" width="100%" align= "center">
</td></tr><tr align="left" width="100%" >
<td valign="top" width="205" bgcolor=" #cdcdcd">
</td><td  valign="top" style="background:white;">

    <?    
include_once "database.php";
include_once "product.php";

// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);


 ?>
 



</td></tr></table></table>
<br><br><br><br><br><br><br><br>


</body>
</html>