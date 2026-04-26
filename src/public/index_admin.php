<? 
$id1 = isset($_GET['id1']) ? $_GET['id1'] : 0;
$id2 = isset($_GET['id2']) ? $_GET['id2'] : 0;
$id3 = isset($_GET['id3']) ? $_GET['id3'] : 0;

include_once "database.php";
include_once "prod_admin.php";
// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head><title>Выпадающее меню</title></head>
<body  cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left">

<input type="text" id="inp" placeholder="привет">
<input type="text" id="inp1">
<input type="text" id="inp2">
<input type="text" id="inp3">

<table><tr>
<td valign=top><span id='ip' style='margin-right:100px; margin-top:0px'></span></td>
<td valign=top><span id='ip1' style='margin-right:100px; margin-top:0px'></span></td>
<td valign=top><span id='ip2' style='margin-right:100px; margin-top:0px'></span></td>
<td valign=top><span id='ip3' style='margin-right:100px; margin-top:0px'></span></td>
<td valign=top><span id='ip4' style='margin-right:100px; margin-top:0px'></span></td>
</tr></table>

<?
$stmt=$product->singer();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
extract($row);
?>

<script> 
document.getElementById('ip').insertAdjacentHTML("beforeend","<a href='?id1=<?= $row["id"]; ?>' onClick='this.style.background=`blue`'><?= $row['title']; ?></a><br>");
</script>



<?  if($id1!==0) {
$stmt1=$product->singer1($id1);
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)) {
extract($row1); 
if ($row1['parent']==$row['id']) {
?>

<script>  document.querySelector('#inp').value="<?= $row['title']; ?>";
document.getElementById('ip1').insertAdjacentHTML("beforeend","<a href='?id1=<?= $row["id"]; ?>&id2=<?= $row1["id"]; ?>'><?= $row1['title']; ?></a><br>");
</script>


<? echo " привет "; 
if($id2!==0)  {
    
$stmt2=$product->singer2($id2); 
$num2 = $stmt2->rowCount();
if(!$num2) { 
?>
<script> 
document.querySelector('#inp1').value="<?= $row1['title']; ?>";
</script>

<?  echo " пока ";   } else {
 
 while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)) {
 extract($row2); 
 if ($row2['parent']==$row1['id']) {   echo ' 1111 ';   
?>
 
<script> 
document.querySelector('#inp1').value="<?= $row1['title']; ?>";
document.getElementById('ip2').insertAdjacentHTML("beforeend","<a href='?id1=<?= $row["id"]; ?>&id2=<?= $row1["id"]; ?>&id3=<?= $row2["id"]; ?>'><?= $row2['title']; ?></a><br>"); 
</script>


<?  if($id3!==0) {  
    $stmt3=$product->singer3($id3); 
    $num3 = $stmt3->rowCount();
    if(!$num3) { 
          echo " авоська "; 
   ?>
       
<script> 
   document.querySelector('#inp2').value="<?= $row2['title']; ?>";
</script>
   
       <?
       echo " да ";
           
    }    /* else {  echo " я "; } */
    
/*     while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)) {
    extract($row3); 
    if ($row3['parent']==$row2['id']) {  echo $parent;   
   ?>
    
   <script> 
   document.querySelector('#inp3').value="<?= $row3['title']; ?>";
   document.getElementById('ip4').insertAdjacentHTML("beforeend","<a href='?id1=<?= $row["id"]; ?>&id2=<?= $row1["id"]; ?>&id3=<?= $row2["id"]; ?>'><?= $row3['title']; ?></a><br>"); 
   </script>
   
   <?   
   
   }  
   
   }  */}
}  }

}}}}}}


?>

</body>
</html>