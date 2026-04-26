<? 
$k = isset($_GET['k']) ? $_GET['k'] : 0;
$i = isset($_GET['i']) ? $_GET['i'] : 0;
$j = isset($_GET['j']) ? $_GET['j'] : 0;
$order= isset($_GET['order']) ? $_GET['order'] : 'marka';
$f= isset($_GET['f']) ? $_GET['f'] : 1;
$d= isset($_GET['d']) ? $_GET['d'] : 0; 
// страница, указанная в параметре URL, страница по умолчанию - 1
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
// устанавливаем ограничение количества записей на странице
$records_per_page = 2;
// подсчитываем лимит запроса
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head><title>Выпадающее меню</title>
    <link rel="stylesheet" href="libs/css/custom.css">
	<link rel="stylesheet" href="style.css">
     <style>
    body,td,th {	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; }  
     </style></head>

<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg">
	<table topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
	<tr><td>	
	</td></tr><tr><td  >
<table style="border-bottom: none; border-left:none; border-right:none; border-top: none;" border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
bordercolor="black" width="100%" align= "center">
</td></tr><tr align="left" width="100%" >
<td valign="top" width="205" bgcolor=" white"><? $n=$l; include_once "lefttd.php"; ?>
</td><td  valign="top" style="background:white">

     <!-- <div style="position: relative; left:100px; top:50px; color:red;"><? echo $count; ?><p style="color: black;"> товаров</p></div> --> <?
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
// страница, на которой используется пагинация
$page_url = "auto_min2.php?order=$order&f=$f&d=$d&";
// подсчёт всех товаров в базе данных, чтобы подсчитать общее количество страниц
$total_rows = $product->countAll2(); 
 
// пагинация
include "paging.php";

// отображаем товары, если они есть
if ($num > 0 && $total_rows > 0) { 

    echo "<table class='table table-hover table-responsive table-bordered'><br>";
        echo "<tr>";
            echo "<th>Товар</th>";
            echo "<th>Цена</th>";
            echo "<th>Описание</th>";
            echo "<th>Категория</th>";
            echo "<th>Действия</th>";
        echo "</tr>";



        if ($f==1) {  $stmt7 = $product->order2($order,$from_record_num,$records_per_page); } 
           else {/* $stmt7 = $product->orderDesc2($order,$from_record_num,$records_per_page); */  }	
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
} 
include "paging.php";  ?>
	</td></tr></table></table>
	 <center>
	 </center><br><br><br><br><br><br><br><br>
</body>
</html>