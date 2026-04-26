<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title></title></head>
<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" >
	
	<table width="205px" bgcolor="white">
	<tr><td>
	</td></tr>
	</table>
			

	<a href=../index.php style="color:black">&nbsp;&nbsp;&nbsp;Админка</a>

<div id="coolmenu1"><a href="auto_min2.php?"></a></div>


<? 


include_once "config/database.php";
include_once "product.php";
	
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
	
$product = new Product($db);


	 
$k=1;
	$stmt1 = $product->auto(); 
	while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) { 
	extract($row1); 
	
	 
  printf( "<p align=left>&nbsp&nbsp&nbsp&nbsp<a style='color:#424242; text-decoration: none;' href='auto_min1.php?j=$k'>%s</a></p>",$row1["razr"]);
	  
		if (isset($j) && $j ==$k) {   
		$m=1;
			$stmt2 = $product->autoRazr($j); 
			while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
			extract($row2);	 
	 if($m==$n) { printf( "<p align=left><a style='margin-left:30px; background-color:grey; color:white; text-decoration: none;' href='auto_min.php?j=$k&l=$m'>%s</a></p>",$row2["razr"]); } else {
	printf( "<p align=left><a style='margin-left:30px; color:green; text-decoration: none;' href='auto_min.php?j=$k&l=$m'>%s</a></p>",$row2["razr"]); 	}
		
		   $m++; 
	   } }
	$k++; 
	   }  
  ?>


	


</body></html>