

<? 


$id = isset($_POST['id']) ? $_POST['id'] : 0;
if (isset($_POST['title'])) {$title=$_POST['title']; if ($title=='') {unset($title);}}
if (isset($_POST['parent'])) {$parent=$_POST['parent']; /* if ($parent=='') {unset($parent);} */}


include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);



if (isset($title) && isset($parent)) {
  	$stmt28 = $product->cat_ins($title,$parent); 
?>
<center>
<button onclick="history.go(-2);" style="position:relative; border-color:green; top:100px; inline-size:25ch; aspect-ratio:1; border-radius:50%;  width: 400; height:400; cursor:pointer;">обновлено!</button></center>
<?

} else { 
?>
	<center>
	<button onclick="history.go(-2);" style="position:relative; border-color:red; top:100px; inline-size:25ch; aspect-ratio:1; border-radius:50%;  width: 400; height:400; cursor:pointer;">заполните все поля!</button></center>
	<?
}
		 
?>


