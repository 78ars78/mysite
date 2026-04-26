

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




  	$stmt21 = $product->music4($song,$id); 
	 
		 
?>

<!-- <script> setInterval(function() {location.reload();},1000);

</script> -->



<!-- <script>
window.location.reload(true);
</script> -->





<!-- <p id="demo"></p>
<button type="button" onclick="loadDoc()" >изменить</button> -->





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




<!-- <button type="button" onclick="loadDoc();" >изменить</button> -->



<center>
<button onclick="history.go(-2);" style="border-color:green; position:relative; top:100px; inline-size:25ch; aspect-ratio:1; border-radius:50%;  width: 400; height:400; cursor:pointer;">обновлено!</button></center>


	