<?  $id = isset($_GET['id']) ? $_GET['id'] : 0;
if (isset($_GET['label'])) {$label=$_GET['label']; if ($label=='') {unset($label);}}

include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);




?>




<?  
print <<<HERE
	<center><form name="form1" id="form1" action="add_items.php" method="POST">
	<label>song<br>
  <input value="" type="text" name="song" id="song" >
  </label>  <br>
<input type="hidden" id="label" name="label" value="$label">
<input type="hidden" id="id" name="id" value="$id">
 <button type="submit" name="submit" id="submit"  value="submit">вставить</button>
</form ></center>

  
	 
HERE;
?>



<!-- <script>



let somefun = function() {  alert('добавлено!'); history.back();};
let elForm = document.querySelector('#form1');
elForm.addEventListener('submit',somefun);



</script> -->


<!-- <script> setInterval(function() {location.reload();},1000);
</script> -->
<!-- <script>
document.form[0].submit();
</script> -->
<? 
/* session_start();
$_SESSION['prev_page'] = $_SERVER['REQUEST_URI'];
header("Location: " .$_SESSION['prev_page'] );
exit; */	


?><?	  ?> 