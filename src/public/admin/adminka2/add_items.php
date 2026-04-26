<? 
$id = isset($_POST['id']) ? $_POST['id'] : 0;
if (isset($_POST['song'])) {$song=$_POST['song']; if ($song=='') {unset($song);}}
if (isset($_POST['label'])) {$label=$_POST['label']; if ($label=='') {unset($label);}}


include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);


if (isset($id) && isset($song) && isset($label)) {
  	$stmt24 = $product->music_ins($song,$label); 
	 
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

<!-- <script> setInterval(function() {location.reload();},1000);
</script> -->

<!-- <script>
window.location.reload(true);
</script> -->

<!-- <button type="button" onclick="loadDoc();" >изменить</button> -->





	