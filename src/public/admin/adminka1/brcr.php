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


 

$stmt25=$product->music_brcr($id);
while($row25=$stmt25->fetch(PDO::FETCH_ASSOC)) {
extract($row25);


 ?>
 


<p align=left style="position:absolute; top:0px; left:74px; " ><a href="edit_cat.php?id=<?= $row25['id'];?>">Редактировать</a></p>



<p align=left style="position:absolute; top:0px; left:195px;">
<a href="del_cat.php?id=<?= $row25['id']; ?>" style="color:red;">Удалить</a></p>




<? 



} ?>





