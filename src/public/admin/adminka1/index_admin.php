<? 
$id1 = isset($_GET['id1']) ? $_GET['id1'] : 0;

include_once "database.php";
include_once "prod_admin.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head>
<title>Выпадающее меню</title>
</head>
<body  cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg">


<table><tr><td>
<?

$stmt=$product->singer();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
extract($row); 
echo "<a href='?id1=$id'><font color=black>$title</font></a><br>";

/* echo "</td><td>"; */

$stmt1=$product->singer1($id1); 
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)) {
extract($row1);
if ($parent==$row['id']) {
echo "<a style='color:red; position:absolute; left: 200px;' href=#>$title</a><br>";



}}}

?>
</td></tr></table>

</body>
</html>