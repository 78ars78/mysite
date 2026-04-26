<? 
$k = isset($_GET['k']) ? $_GET['k'] : 0;
$i = isset($_GET['i']) ? $_GET['i'] : '';
$j = isset($_GET['j']) ? $_GET['j'] : 0;
$l = isset($_GET['l']) ? $_GET['l'] : 0;
$vertic = isset($_GET['vertic']) ? $_GET['vertic'] : 'inline-block';
$gg = isset($_GET['gg']) ? $_GET['gg'] : 1;

 // страница, указанная в параметре URL, страница по умолчанию - 1
$page = isset($_GET["page"]) ? $_GET["page"] : 1;

// устанавливаем ограничение количества записей на странице
$records_per_page = 2;

// подсчитываем лимит запроса
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head>
	<title>Выпадающее меню</title>

	
	


    <meta charset="UTF-8">
    <meta content="height=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=no" name="viewport">
    

    <!-- <script type="text/javascript" src="http://livejs.com/live.js"></script> -->
    <!-- <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script> -->
    
   
   


<link rel="stylesheet" href="try5.css">
	<link rel="stylesheet" href="libs/css/custom.css">
	<link rel="stylesheet" href="style.css">
	
  <style>
  body,td,th {	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; }  
  </style>
</head>
	
	
<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg">
	<table topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
	<tr><td>	
		<?	include_once("layout_header.php"); ?>

		
		
		
		<!-- <div  style="position:absolute; left:225px; top: 264px; z-index: 2;"><img name="mainpic" src="2.jpg" width=370 height=280 border=0></div> -->
		
		
		</td></tr><tr><td  >


    
		<table style="border-bottom: none; border-left:none; border-right:none; border-top: none;" border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
	   bordercolor="black" width="100%" align= "center">
		</td></tr><tr width="100%" >
		<td valign="top" width="205" bgcolor=" #cdcdcd"><?  include "lefttd.php"; ?>
	</td><td  valign="top" style="background:white">



    <?
include_once "config/database.php";
include_once "product.php";

// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// запрос товаров
$stmt = $product->readAll($from_record_num, $records_per_page); 
$num = $stmt->rowCount(); 

// установка заголовка страницы
$page_title = "Вывод товаров";




 // здесь будет пагинация
// страница, на которой используется пагинация
$page_url = "index.php?";

// подсчёт всех товаров в базе данных, чтобы подсчитать общее количество страниц
$total_rows = $product->countAll2();




echo "<p id='quantity' style='position:absolute; top: 175px; left:350px; color:red;'></p><p  style='position:absolute; top: 175px; left:350px; color:black;'><br>товаров</p>";





echo "<center><div class='order'><font color=white style='background-color: black '>&nbsp; сортировка :&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp;"; 


 echo "<a href=# id='sort3' style='color:#2C7CE9; text-decoration:none'>подешевле&nbsp;&nbsp;&nbsp;</a>";
 echo "<a href=# id='sort1' style='color:#2C7CE9; text-decoration:none'>подороже&nbsp;&nbsp;&nbsp;</a>";
 echo "<a href=# id='sort2' style='color:#2C7CE9; text-decoration:none'>по цвету&nbsp;&nbsp;&nbsp;</a>";
 





 echo "<font style='color:white; background:black'>&nbsp;&nbsp;выводить по :&nbsp;&nbsp;</font> 
 <select id='sel' name='sel' onchange='change()'>
 <option value='2' selected> 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
 <option value='5'> 5 </option>
 <option value='50' > 50 </option>
 </select>";







echo "</div></center><br>";


// пагинация
/* include_once "paging.php";  */





echo "<div class='row_col'><a href=#><img id='imj' style='border:  1px solid black;' onclick='myFunc()' src='blocki.jpg'></a>&nbsp";
				 echo "<a href=#><img id='imj1' style='border:  1px solid white;'  onclick='myFunc1()' src='stroki.jpg'></a></div><br>";

      




				  
		?>	





		<!-- пагинация -->
		<div class="block" id="block"></div>
<div class="pagination" id="pagination">
  <div class="pagination__arrow pagination__arrow_p  pagination__arrow_prev"></div>
  <ul class="pagination__list"></ul>
  <div class="pagination__arrow pagination__arrow_n  pagination__arrow_next"></div>
</div>
		
		<!-- фильтры -->
<div  class="result">
  
<? $stmt12 = $product->moto_auto(); 
	while ($row12 = $stmt12->fetch(PDO::FETCH_ASSOC)) { 
	extract($row12); 
  printf('<div  class="%s %s %s"><p class="itsme" >img/auto/%s.jpg</p>
					 <p class="itsme1" ><i>%s</i></p><p class="itsme2">%s</p><p class="itsme3"><i>%s</i></p><p  class="itsme4">%s</p><p class="itsme5"><i>%s</i></p>
				 </div>',$marka,$row12["brightness"],$row12["color"],$row12["img"],$row12["name"],$row12["marka"],$row12["price"],$row12["color"],$row12["brightness"]); 
  
  } 
  



  

// отображаем товары, если они есть
/* if ($num > 0) {



            if ($gg==1) {$g="ORDER BY id";}
			if ($gg==2) {$g="ORDER BY marka";}
			if ($gg==3) {$g="ORDER BY model";}
			
			$l=100;      
            $stmt11 = $product->auto1($g);
            while ($row11 = $stmt11->fetch(PDO::FETCH_ASSOC)) {
            extract($row11);


			echo "<table align='center' id='idd' class='box{$фирма} lesson'>
			<tr align='center'>
		   <td><p  class='lesson_name'>
		   <a href='motopost.php?id={$id}'><img height=133 src='img/auto/{$itog_0}'></a>
		   </p><p class='lesson_adds'>{$marka}</p></td>
			</tr>  <tr align='center'><td style='color: yellow;' align=left><a  href='read_product.php?id={$id}' class='btn btn-primary left-margin'>
     В корзину
</a>{$model}</td></tr>
</table>"; 
		
		  } 	
				 
   }
 */
// сообщим пользователю, что товаров нет
/* else {
    echo "<div class='alert alert-info'>Товары не найдены.</div>";
} ?>
 
	</td></tr></table></table> */  ?>




<!-- <form>
aerdh
<select id='sel' name='sel' onchange='handle()'>
<option value='5'>пять</option>
<option value='10'>десять</option>
<option value='50'>пятьдесят</option>
</select>
</form>


<script>

function handle() {
const selectElem=document.getElementById('sel').value;
alert(selectElem);
  }

</script> -->





	 <center>
<? require_once("layout_footer.php");  ?></center><br><br><br><br><br><br><br><br>




<script src="script.js"></script>
</body>
</html>
