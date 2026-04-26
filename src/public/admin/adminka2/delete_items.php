<?  $id = isset($_GET['id']) ? $_GET['id'] : 0;

include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);




 





  	$stmt23 = $product->music_del($id); 
	 
		 
?>


<center>
<button onclick="history.go(-1);" style="position:relative; top:100px; inline-size:25ch; aspect-ratio:1; border-radius:50%;  width: 400; height:400; cursor:pointer;">удалено!</button></center>


