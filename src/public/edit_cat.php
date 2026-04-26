<?  $id = isset($_GET['id']) ? $_GET['id'] : 0;

include_once "config/database.php";
include_once "product.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);




?>
 
<? $stmt25=$product->music_brcr($id);
while($row25=$stmt25->fetch(PDO::FETCH_ASSOC)) {
extract($row25); 
print <<<HERE
	<center><form name="form1" action="update_cat.php" method="post">
	<label>song<br>
  <input value="$row25[title]" type="text" name="title" id="title" >
  </label>  <br>
  
   
	
      <input type="hidden" name="id" value="$row25[id]">
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