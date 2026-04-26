<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title></title></head>
<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" >
	
	<table width="205px" bgcolor="white">
	<tr><td><a href="index.php" style="text-decoration: none; color: green" >Главная страница<font color="black"> / </font></a>
	</td></tr>
	</table>
			
	<? include_once("menu.php");  ?>
	
<div id="coolmenu4"><a href="index.php"></a></div><br>
	

<strong><center>---Обои---</center></strong>
<div id="coolmenu1"><a href="auto_min.php?hh=1&i=1"></a></div>


<? 


include_once "config/database.php";
include_once "product.php";
	
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
	
$product = new Product($db);

if ($i==1) {
	 
$k=1;
	$stmt1 = $product->auto(); 
	while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) { 
	extract($row1); 
	
	 
    printf( "<p align=left>&nbsp&nbsp&nbsp&nbsp<a style='color:#424242; text-decoration: none;' href='auto_min.php?hh=2&i=1&j=$k'>%s</a></p>",$row1["razr"]);
	  
		if (isset($j) && $j ==$k) {   
		$m=1;
			$stmt2 = $product->autoRazr($j); 
			while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
			extract($row2);	 
	if($m==$n) { printf( "<p align=left><a style='margin-left:30px; background-color:grey; color:white; text-decoration: none;' href='auto_min.php?hh=3&i=1&j=$k&l=$m'>%s</a></p>",$row2["razr"]); } else {
	printf( "<p align=left><a style='margin-left:30px; color:green; text-decoration: none;' href='auto_min.php?hh=3&i=1&j=$k&l=$m'>%s</a></p>",$row2["razr"]); 	}
		
		   $m=$m+1; 
	   } }
	$k=$k+1; 
	   }  }
  ?>

<div id="coolmenu2"><a href="moto_min.php?i=3"></a></div>

<? if ($i==3) { ?> 



<div class="filter">
        <br><center><b><font color=red>МАРКА</font></b></center>
<div style='user-select:none'>
<? 

function input($nazv,$rel) {
        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);
$stmt13 = $product->moto_input($nazv);  
while ($row13 = $stmt13->fetch(PDO::FETCH_ASSOC)) {
  extract($row13); printf("<div class='checkbox'>            
  <input  id='%s'  type='checkbox' rel='%s' class=$rel onchange='change()' /><label for='%s'>%s</label></div>", $row13['id'] , $row13['nazv'],$row13['id'],$row13['name']); }
}   


input('marka','models');

       ?>
       	<br><center><b><font color=red>ЦЕНА</font></b></center>
<? include('try6.php');  ?>

 
		<br><center><font color=red><b>ОТТЕНОК</b></font></center>

        <div class="radio"> <div height=100% width=100% style="display: table; margin-top: -10px;"><div style="display:table-cell; vertical-align:middle; ">        
            <input type="radio" name="answer" checked onchange="change()" id="r0"><label for='r0'>Все</label></div>
<div style="margin-left:-20px;margin-top:17px">
            <input type="radio" name="answer" rel="bright" class="rad" onchange="change()" id="r1"/><label for='r1'>Светлый</label>
          <br>
            <input type="radio" name="answer"  rel="dark" class="rad" onchange="change()" id="r2"/><label for='r2'>Темный</label>
        </div><br></div></div>




		<center><font color=red><b>ЦВЕТ</b></font></center>

<div style='user-select:none'>
        
<?  input('color','processors');  ?>
</div>
   


	

<br>
 <table border=2 style="position: relative; left:30px; top:10px"><tr height="20px"><td>




	<!-- показать все - скинуть на начало чекбоксов  -->
	<a style="text-decoration: none; color: black" href="moto_min.php?i=3">
	<center>C б р о с и т ь</center>
	
	<center><img src="img/wn2_0.jpg">&nbsp;&nbsp;&nbsp;&nbsp; фильтры &nbsp; &nbsp;&nbsp;&nbsp;<img src="img/wn2_0.jpg"><br></center></a>	
	</td></tr></table>	<br>
			 


        
  </div></div>
	
	
  


<? } ?>
<br>


</body></html>