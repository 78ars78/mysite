<? 
$k = isset($_GET['k']) ? $_GET['k'] : 0;
$i = isset($_GET['i']) ? $_GET['i'] : 0;
$j = isset($_GET['j']) ? $_GET['j'] : 0;
$l = isset($_GET['l']) ? $_GET['l'] : 0;
$order= isset($_GET['order']) ? $_GET['order'] : 'marka';
$f= isset($_GET['f']) ? $_GET['f'] : 1;
$d= isset($_GET['d']) ? $_GET['d'] : 0; 

$hh=$_GET['hh'];


if ($hh==1)
{ $jj='';  $ll='';
    $cjj='countAll2';
    $ccj=''; $ccj1='';
    $ord='order2';
    $ordd='orderDesc2'; 
   }

if ($hh==2) { $ll=''; $jj='&j=1'; 
$cjj='countAll1';
$ccj=$j; $ccj1='';
$ord='order1';
$ordd='orderDesc1';
} 

if ($hh==3) {
$jj='&j=1'; $ll='&l=1';
$cjj='countAll';
$ccj=$j; $ccj1=$l;
$ord='order';
$ordd='orderDesc';
}




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
    <link href="style7.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="libs/css/custom.css">
	<link rel="stylesheet" href="style.css">
  <style>
  body,td,th { 	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; }  
  </style>
</head>

  


<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg" >
	<table  topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
	<tr><td>	
		<?	include_once "layout_header.php"; ?>
		
		
		
		
		
		</td></tr><tr><td  >


    
<table  style="background:white;  " style="border-bottom: none; border-left:none; border-right:none; border-top: none;"  border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
bordercolor="black" width="100%" align= "center">
</td></tr><tr align="left" width="100%" >
<td valign="top" width="205" bgcolor=" #cdcdcd"><? $n=$l; include_once "lefttd1.php"; ?>
</td><td valign="top" >




<center><br>
    <font color=black style="background-color: white ">&nbsp; сортировка по: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		

		        <? if($hh==1) { $hhh=1;} 
                if($hh==2) { $hhh=2;}
                if($hh==3) { $hhh=3;}
                ?>


                           
        <a style="<? if ($d==1) {echo "color:#C15E5F";} else {echo "color:#2C7CE9";} ?>; text-decoration: none; " href="auto_min.php?hh=<? echo $hhh; ?>&order=marka&f=1&d=1<? echo "$ll$jj&i=$i"; ?>">
        марка(возр) </a>	&nbsp;&nbsp;&nbsp;	
                
                
            
        <a style="<? if ($d==2) {echo "color:#C15E5F";} else {echo "color:#2C7CE9";} ?>; text-decoration: none" href="auto_min.php?hh=<? echo $hhh; ?>&order=marka&f=2&d=2<? echo "$ll$jj&i=$i"; ?>"> марка(убыв) </a>	&nbsp;&nbsp;&nbsp;
                
                
                
         <a style="<? if ($d==3) {echo "color:#C15E5F";} else {echo "color:#2C7CE9";} ?>; text-decoration: none" href="auto_min.php?hh=<? echo $hhh; ?>&order=model&f=1&d=3<? echo "$ll$jj&i=$i"; ?>"> модель </a>&nbsp;
        
            </font><br></center>





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
$page_url = "auto_min.php?hh=$hhh&i=1$jj$ll&order=$order&f=$f&d=$d&";

// подсчёт всех товаров в базе данных, чтобы подсчитать общее количество страниц
/* $total_rows = $product->countAll2($ccj,$ccj1); */
    $jj='';  $ll='';
    $cjj='';
    $ccj=''; $ccj1='';
    $ord='order2';
    $ordd='orderDesc2';                 /*  $cjj='countAll2'; */
$total_rows = $product->countAll2($ccj,$ccj1);
// пагинация
include "paging.php";
?>



<?

// отображаем товары, если они есть
if ($num > 0 && $total_rows > 0) {

    echo "<table  class='table table-hover table-responsive table-bordered'><br>";
        echo "<tr >";
            echo "<th>Товар</th>";
            echo "<th>Цена</th>";
            echo "<th>Описание</th>";
            echo "<th>Категория</th>";
            echo "<th>Действия</th>";
        echo "</tr>";

                                             /*    $ord='order2';
                                                $ordd='orderDesc2'; */


        if ($f==1) {  $stmt7 = $product->$ord($j,$l,$order,$from_record_num,$records_per_page); 
  
           
        }
            else {$stmt7 = $product->$ordd($j,$l,$order,$from_record_num,$records_per_page);
         
         
         }	
 
             
             
             if (!$stmt7) { include_once "end.php"; exit();}



        while ($row7 = $stmt7->fetch(PDO::FETCH_ASSOC)) {

            extract($row7);

            echo "<tr>";
                echo "<td><img src='img/auto/".$row7['itog_0']."'></td>";
                echo "<td>{$marka}</td>";
                echo "<td>".$row7['model']."</td>";
                echo "<td>";
                    
                echo "</td>";
  
                echo "<td>";
                    // здесь будут кнопки для просмотра, редактирования и удаления
// ссылки/кнопки для просмотра, редактирования и удаления товара
echo "<a href='read_product.php?id={$id}' class='btn btn-primary left-margin'>
     В корзину </a>";
                echo "</td>";

            echo "</tr>";

        }

    echo "</table>";







}

// сообщим пользователю, что товаров нет
else {
    echo "<div class='alert alert-info'>&nbsp Товары не найдены.</div>";
} ?>



<? include "paging.php"; ?>





	</td></tr></table></table>
	 <center>
	 
		 
		 <? require_once("layout_footer.php"); ?></center><br><br><br><br><br><br><br><br>

		 


</body>
</html>