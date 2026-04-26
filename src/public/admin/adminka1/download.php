<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<? include("blocks/bd.php");

if (isset($_GET['prcod'])) { $prcod=($_GET['prcod']);}
if (isset($_GET['files'])) { $files=($_GET['files']);}
if (isset($_GET['d_files'])) { $d_files=($_GET['d_files']);}
if (!preg_match("|^[\d]+$|", $prcod)) exit ("неверно. проверьте url!");
$result3=mysql_query("SELECT * FROM movie WHERE prcod= '$prcod'", $db);
if (!$result3)
{echo "<p>запрос не выполнен. код ошибки: </p>"; 	exit(mysql_error()); }
if (mysql_num_rows($result3)>0) echo "<br>";
$myrow3=mysql_fetch_array($result3); 
 $a=$myrow3['files'];
  $new_d_files=$myrow3["d_files"]+1; $update= mysql_query("UPDATE movie SET d_files='$new_d_files' WHERE prcod='$prcod'",$db); ?>
<? echo "<center>Скачали : ".$new_d_files."</center><br>"  ?> 
<html><body> 		
<form action="movie.php" method="post" name="down_post">
<input name="prcod" type="hidden" value="<? echo $prcod; ?>"><input name="d_files" type="hidden" value="<? echo $d_files; ?>">
<center><input value="Скачать" type="button" name="button" onClick="location.href='<? echo $a; ?>'"></center>
</form>
	</body></html>