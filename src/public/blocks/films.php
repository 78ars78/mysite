<? include("blocks/bd.php");

$result=mysql_query("SELECT title, meta_d,meta_k,text FROM settings WHERE page='movie'", $db); if (!$result)
{echo "<p>запрос не выполнен. код ошибки: </p>"; exit(mysql_error()); }if (mysql_num_rows($result)>0) {$myrow=mysql_fetch_array($result); }
else {	echo "нет записей в таблице"; exit(); }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">




<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"> <meta name="description" content="<? echo $myrow['meta_d']; ?>">
<meta name="keywords" content="<? echo $myrow['meta_k']; ?>">
	<title><? echo $myrow["title"]; ?></title>
	</head><body>





<? if(isset($_GET['i'])) {$i=$_GET['i'];}
$result3= mysql_query("SELECT id,title,description,year,actors,d_files,files,prcod FROM movie WHERE prcod='10'",$db);
	$myrow3=mysql_fetch_array($result3);

printf("<i><table align='center'>
<tr align='center'><td  scope='col'><p><a href='download.php?prcod=10' style='text-decoration:none; color:yellow'>%s</a></p>%s</tr><tr align='center'><td>дата выхода: %s<br><center>в ролях: %s</center></td></tr></table></i>", $myrow3["title"],$myrow3["description"],$myrow3["year"],$myrow3["actors"]);
?>
<hr width="542px" align="center" color="red">
<center><a style="color:white; text-decoration: none;" href="movie.php?i=1"><font color="blue">50р.&nbsp;&nbsp;</font>Грязные танцы. (нажать <font color=" #0A00FF"><a href='#' class='s1button'> 1</a></font>)</a><? if ($i==1) {echo "<center>Грязные танцы. Dirty dancing.<br>1987 Патрик Суэйзи</center>";}

?></center>
<center><a style="color:white; text-decoration: none;" href="movie.php?i=2"><font color="blue">50р.&nbsp;&nbsp;</font>Прибытие. (нажать <font color=" #0A00FF"><a href="#" class='s1button'> 2</a></font>)</a><? 
if ($i==2) {echo "<center>Прибытие.The Arrival.<br>1996 Чарли Шин</center>";}

 
?></center>
<center><a style="color:white; text-decoration: none;" href="movie.php?i=3"><font color="blue">50р.&nbsp;&nbsp;</font>Телохранитель. (нажать <font color=" #0A00FF"><a href='#' class='s1button'>3</a></font>)</a><? 

if ($i==3) {echo "<center>Телохранитель.The Bodyguard.<br>1992 Уитни Хьюстон, Кевин Костнер</center>";}
 
?></center>

<center><a style="color:white; text-decoration: none;" href="movie.php?i=4"><font color="blue">50р.&nbsp;&nbsp;</font>Ледниковый период. (нажать <font color=" #0A00FF"><a href='#' class='s1button'> 4</a></font>)</a><? if ($i==4) {echo "<center>Ледниковый период. Ice age.<br>2002 Мульт</center>";}
?></center></body></html>
