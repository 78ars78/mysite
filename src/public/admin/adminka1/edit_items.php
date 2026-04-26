<?  $id = isset($_GET['id']) ? $_GET['id'] : 0;

include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);




?>
 
<? $stmt22=$product->music3($id);
while($row22=$stmt22->fetch(PDO::FETCH_ASSOC)) {
extract($row22); 
print <<<HERE
	<center><form name="form1" action="update_items.php" method="post">
	<label>song<br>
  <input value="$row22[song]" type="text" name="song" id="song" >
  </label>  <br>
  
   
	
      <input type="hidden" name="id" value="$row22[id]">
  <input type="submit"   name="submit" id="submit"  value="submit">
	</form></center>

  
	 
HERE;
?>
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


?><?	}  ?> 

