<?  $id2 = isset($_GET['id']) ? $_GET['id'] : 0;

include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);



$stmt29 = $product->music_iskl($id2);
$num29 = $stmt29->rowCount();
  if ($num29) {

?>   

<center>
<button onclick="history.go(-1);" style="position:relative; top:100px; inline-size:25ch; aspect-ratio:1; border-radius:50%;  width: 400; height:400; cursor:pointer;">Удалить нельзя. Есть следущая!</button></center>


 <? } else {

 
  $stmt27 = $product->del_music($id2); 
  ?> <center> 
  <a href="music_min.php?id6=0"  style="position:relative; top:100px; inline-size:25ch; aspect-ratio:1; border-radius:50%;  width: 400; height:400; cursor:pointer;">Удалено!</a></center>
<?  

}

?>




