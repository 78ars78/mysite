<? 
/* $id = isset($_GET['id']) ? $_GET['id'] : 0; */
$id6 = isset($_GET['id6']) ? $_GET['id6'] : 1;


include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db); 
/* if (!$id) { echo "привет"; }
 */


if ($id6==0) {  echo "корень сsdvsvv sdv s ффы аафы айта";
 }  else {  

$stmt25=$product->music_brcr($id);
while($row25=$stmt25->fetch(PDO::FETCH_ASSOC)) {
extract($row25);


 ?>
 


<p align=left style="position:relative; top:0px; left:174px; " ><a href="edit_cat.php?id=<?= $row25['id'];?>">Редактировать</a></p>



<p align=left style="position:absolute; top:0px; left:300px;">
<a href="del_cat.php?id=<?= $row25['id']; ?>" style="color:red;">Удалить</a></p>



<!-- <p align=left><a href="new_cat.php?parent=<? echo $id; ?>" style=" width:158px; background:gray; position:absolute; top:0px; left:0px; color:yellow; text-decoration:none" >&nbsp;Добавить категории&nbsp;</a></p> -->

<? 



}} ?>





