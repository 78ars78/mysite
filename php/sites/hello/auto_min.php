<? include("blocks/bd.php");
if (isset($_GET['i'])) {$i=$_GET['i'];} 
if (isset($_GET['j'])) {$j=$_GET['j'];}
if (isset($_GET['l'])) {$l=$_GET['l'];} 

if (isset($_GET['order'])) {$order=$_GET['order'];} else $order='marka';
if (isset($_GET['f'])) {$f=$_GET['f'];} else $f=1;
if (isset($_GET['d'])) {$d=$_GET['d'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head><title></title>
  <link href="style7.css" rel="stylesheet" type="text/css">
  <style type="text/css">
  body,td,th {	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; }  </style>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"></head>
<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg">
	<table  topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
	<tr><td>	
		<?	include("blocks/header.php"); ?>
		</td></tr><tr><td>
		<table  style="border-bottom: none; border-left:none; border-right:none; border-top: none;" border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
		  bgcolor="white"   bordercolor="black" width="100%" align= "center">
		</td><tr width="100%" >
		<td valign="top" width="205" border="10px" bgcolor="#CDCDCD"><? $n=$l; include("blocks/lefttd.php"); ?></td>
	  <td valign="top" align="center">
		<table>
		<tr align="center"><td valign="top">
		
			
			<font color=black style="background-color: white ">&nbsp; сортировка по: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
	<a style="<? if ($d==1) {echo "color:#C15E5F";} else {echo "color:#2C7CE9";} ?>; text-decoration: none; " href="auto_min.php?order=marka&f=1&d=1<? echo "&j=$j&l=$l&i=$i"; ?>">
	марка(возр) </a>	&nbsp;&nbsp;&nbsp;	
			
			
		
	<a style="<? if ($d==2) {echo "color:#C15E5F";} else {echo "color:#2C7CE9";} ?>; text-decoration: none" href="auto_min.php?order=marka&f=2&d=2<? echo "&j=$j&l=$l&i=$i"; ?>"> марка(убыв) </a>	&nbsp;&nbsp;&nbsp;
			
			
			
     <a style="<? if ($d==3) {echo "color:#C15E5F";} else {echo "color:#2C7CE9";} ?>; text-decoration: none" href="auto_min.php?order=model&f=1&d=3<? echo "&j=$j&l=$l&i=$i"; ?>"> модель </a>&nbsp;
	
		</font><br>
					
		<?		
			
			 
	 
			
		$num =3;
// Извлекаем из URL текущую страницу
@$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result00 = mysql_query("SELECT COUNT(*) FROM auto WHERE j='$j' AND l='$l'",$db);
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
// Находим общее число страниц
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
	
		
	
			if ($f==1) { 
		$result=mysql_query("SELECT * FROM auto WHERE j='$j' AND l='$l'  ORDER BY $order LIMIT $start, $num ",$db);}
		else { 
		$result=mysql_query("SELECT * FROM auto WHERE j='$j' AND l='$l'  ORDER BY $order DESC LIMIT $start, $num",$db);}	
		
			
			
			if (!$result) { include("blocks/end.php"); exit();}
	if (mysql_num_rows($result)>0)
	{  $myrow=mysql_fetch_array($result);
	  do {	
	
		 printf("<table align='left' style='z-index: 3; position: relative;' class='lesson'>
     <tr align='center' >
    <td ><p   class='lesson_name'>
	<a href='autopost.php?id=%s'><img src='img/auto/%s' ></a>
	</p><p class='lesson_adds'>%s</p></td>
     </tr>  <tr align='center'><td style='color: yellow;'>%s</td></tr>
  </table>", $myrow['id'], $myrow['itog_0'], $myrow['marka'], $myrow['model']);  	
		  
		 
   } while($myrow=mysql_fetch_array($result));
			
			
					
	
	 

 echo "</table><font align=right>"; 	 
	 // Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page=1>Первая</a> | <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page - 1) .'>Предыдущая</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page + 1) .'>Следующая</a> | <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page=' .$total. '>Последняя</a>';
// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=auto_min.php?order='.$order.'&f='.$f.'&d='.$d.'&i='.$i.'&j='.$j.'&l='.$l.'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';
// Вывод меню если страниц больше одной
if ($total >1) { Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>"; echo "</font>"; }} else {echo "нет уроков"; exit(); }
						 ?>
	 
	</td></tr> </table><? include("blocks/footer.php"); ?></table>

	
 </table></body></html>