
<?
include("blocks/bd.php");

if (isset($_GET['id'])) {$id=$_GET['id'];}


$result01=mysql_query("SELECT * FROM auto WHERE id='$id'",$db);
$myrow01=mysql_fetch_array($result01);
?>
<img src="img/auto/<? echo $myrow01['itog']; ?>" width="100%">






	
	
	
	