<?
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$idd = isset($_GET['id']) ? $_GET['id'] : 1;
$id6 = isset($_GET['id6']) ? $_GET['id6'] : 1;
$order= isset($_GET['order']) ? $_GET['order'] : 'marka';

$kk = isset($_GET['kk']) ? $_GET['kk'] : 0;
 


$hh=$_GET['hh'];

 $jj='';  $ll='';
    $cjj='countAll2';
    $ccj=''; $ccj1='';
    $ord='order2';
    $ordd='orderDesc2'; 
   

// страница, указанная в параметре URL, страница по умолчанию - 1
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
// устанавливаем ограничение количества записей на странице
$records_per_page = 3;
// подсчитываем лимит запроса
$from_record_num = ($records_per_page * $page) - $records_per_page;



include "config/database.php";
include "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);


$stmt = $product->readAll($from_record_num, $records_per_page); 
$num = $stmt->rowCount(); 
// установка заголовка страницы
$page_title = "Вывод товаров";
// здесь будет пагинация
// страница, на которой используется пагинация
$page_url = "music_min.php?id=$id&";
// подсчёт всех товаров в базе данных, чтобы подсчитать общее количество страниц
$total_rows = 1;

/* echo $kk; */
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head>
	<title>Выпадающее меню</title>
    
	<link rel="stylesheet" href="libs/css/custom.css">
	<link rel="stylesheet" href="style.css">
  <style>
  body,td,th {	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; }  
  </style>

<script>
function loadDoc() {
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
    async function f1()  { let timerId;
let promise = new Promise((resolve,reject) => {
resolve(timerId=setTimeout(()=> location.reload(),1000 ) )});
let result = await promise; 
setTimeout(()=> clearTimeout(timerId),1000);
}
f1();
}
};
xhttp.open("GET","ajax_info.php",true);
xhttp.send();
}
</script>

</head>
<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left">
<table topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
<tr><td  >
<table style="border-bottom: none; border-left:none; border-right:none; border-top: none;" border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
bordercolor="black" width="100%" align= "center">
</td></tr><tr align="left" width="100%" >
<td valign="top" width="205" bgcolor="white"><? $kkk=$kk;   include "lefttd.php";  ?>
</td><td  valign="top">

<? 



$stmt25=$product->music_brcr($id);
while($row25=$stmt25->fetch(PDO::FETCH_ASSOC)) {
extract($row25);


 ?>
 


<p align=left style="position:absolute; top:25px; left:374px; " ><a href="edit_cat.php?id=<?= $row25['id'];?>">Редактировать</a></p>



<p align=left style="position:absolute; top:25px; left:495px;">
<a href="del_cat.php?id=<?= $row25['id']; ?>" style="color:red;">Удалить</a></p>




<? 
}

 
 







$stmt15=$product->music_pair($id);
while($row15=$stmt15->fetch(PDO::FETCH_ASSOC)) {
extract($row15); 
  
/* $total_rows =4;
 */
$stmt141= $product->musicc($row15['id']);
 $total_rows = $stmt141->rowCount();

}
?>
<? if ($id6==0) {  echo "<br><br><br>&nbsp;&nbsp;Корень меню";   } ?>
<br><br><? 

if ($id6==0) {    echo "
<button type='button' onclick='loadDoc()'  style='font-size: 23px; color:green; position:fixed; top:25px; left: 580px;  border-color: green;   width: 350px; height:50px; cursor:pointer;'>СОХРАНИТЬ ИЗМЕНЕНИЯ</button>"; 
  
 echo "<p align=right><a href='new_cat.php?parent=0' style=' width:148px; background:gray; position:absolute; top:26px; left:210px; color:yellow; text-decoration:none' >&nbsp;Добавить категории&nbsp;</a></p>";
  
  
  exit();
}


 echo "<div style='position: relative; position:absolute; width:800px;  right: 100px; '>"; include 'paging.php'; echo "</div>";   ?> 



<?  

// отображаем товары, если они есть
if ($num > 0 && $total_rows > 0) {

    echo "<br><br><br><br><table  class='table table-hover table-responsive table-bordered'>";
        echo "<tr >";
            echo "<th>Товар</th>";
            echo "<th>Цена</th>";
            echo "<th>Описание</th>";
            echo "<th>Категория</th>";
            echo "<th>Действия</th>";
        echo "</tr>";

                                            

         

  
$stmt15=$product->music_pair($id);
while($row15=$stmt15->fetch(PDO::FETCH_ASSOC)) {
extract($row15); 
  
/* $total_rows =4;
 */
$stmt141= $product->musicc($row15['id']);
 $total_rows = $stmt141->rowCount();
?> <?
$stmt14 = $product->music($row15['id'],$from_record_num,$records_per_page); 
   
    /* $total_r = $stmt14->rowCount(); echo $total_r; */

while ($row14 = $stmt14->fetch(PDO::FETCH_ASSOC)) { 
	extract($row14);  
 /*   $total_rows = $product->countAll2();
 */echo "<tr >";
 ?> 
 <p align=right ><td  align=right><?= $row14['song']; ?></td><td  align=right></td><td colspan="2" align=right><p><a href="edit_items.php?id=<?= $row14['id'];?>">редактировать</a></p></td>
<? if ($kkk<3) {
echo "<p align=right><a href='new_cat.php?parent=$idd' style=' width:148px; background:gray; position:absolute; top:26px; left:210px; color:yellow; text-decoration:none' >&nbsp;Добавить категории&nbsp;</a></p>"; }
?>
<td>
<p align=right  >
<a href="delete_items.php?id=<?= $row14['id']; ?>" style="color:red;">удалить</a></p>

</td>

 <?
  echo "</tr>";
// здесь будут кнопки для просмотра, редактирования и удаления
// ссылки/кнопки для просмотра, редактирования и удаления товара
/* echo "<a href='read_product.php?id={$id}' class='btn btn-primary left-margin'>
     В корзину </a>"; */
}
     }   echo "</table><tr><td>";
} 
 
// сообщим пользователю, что товаров нет
 else { echo "<p align=right><a href='new_cat.php?parent=$idd' style=' width:148px; background:gray; position:absolute; top:26px; left:210px; color:yellow; text-decoration:none' >&nbsp;Добавить категории&nbsp;</a></p>";
    echo "<div class='alert alert-info'><br>&nbsp Товары не найдены.</div>";
}

if($kkk==3) { ?>

<p align=right><a href="new_items.php?label=<?= $idd;  ?>" style="background:gray; position:absolute; top:30px; right:0px; color:white; text-decoration:none" >&nbsp;Добавить элементы&nbsp;</a></p> <? } ?>

<button type="button" onclick="loadDoc()"  style="font-size: 23px; color:green; position:fixed; top:25px; left: 580px;  border-color: green;   width: 350px; height:50px; cursor:pointer;">СОХРАНИТЬ ИЗМЕНЕНИЯ</button>


</td></tr></table>
</table><div style="position: relative; position:absolute;  right: 100px; width: 800px;"><? 
// пагинация  
include "paging.php"; 
?></div>
<br><br><br><br><br><br><br><br> 
</body>
</html>