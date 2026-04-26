<? 
$id = isset($_GET['id']) ? $_GET['id'] : 0;


include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head>
	<title>Выпадающее меню</title>
    
	<link rel="stylesheet" href="libs/css/custom.css">
	<link rel="stylesheet" href="style.css">
  <style>
  body,td,th {	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; }  
  </style>
</head>
<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg">
	<table topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
	<tr><td>	
		<?	include_once "layout_header.php"; ?>	
		</td></tr><tr><td  >
<table style="border-bottom: none; border-left:none; border-right:none; border-top: none;" border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
bordercolor="black" width="100%" align= "center">
</td></tr><tr align="left" width="100%" >
<td valign="top" width="205" bgcolor=" #cdcdcd"><? $n=$l; include_once "lefttd.php"; ?>
</td><td  valign="top" style="background:white">

<?


$stmt15=$product->music_pair($id);
while($row15=$stmt15->fetch(PDO::FETCH_ASSOC)) {
extract($row15); 

/* echo "<br>$row15[id]"; */ 
/* $id=$row15['id']; */

$stmt14 = $product->music($row15['id']); 
while ($row14 = $stmt14->fetch(PDO::FETCH_ASSOC)) { 
	extract($row14); 
 echo '<br><center>'.$row14['song'].'</center>';         

}}




$stmt16=$product->music_pair1($id);
while($row16=$stmt16->fetch(PDO::FETCH_ASSOC)) {
extract($row16);

$stmt14 = $product->music($row16['id']); 
while ($row14 = $stmt14->fetch(PDO::FETCH_ASSOC)) { 
	extract($row14); 
 echo '<br><center>'.$row14['song'].'</center>';  
}


$stmt17=$product->music_pair2($row16['id']);
while($row17=$stmt17->fetch(PDO::FETCH_ASSOC)) {
extract($row17);

$stmt14 = $product->music($row17['id']); 
while ($row14 = $stmt14->fetch(PDO::FETCH_ASSOC)) { 
	extract($row14); 
 echo '<br><center>'.$row14['song'].'</center>';  
}
}
}


 
 
 
 
 
 
 ?>

</td></tr></table></table>
<center>
<? require_once("layout_footer.php"); ?></center><br><br><br><br><br><br><br><br>
</body>
</html>