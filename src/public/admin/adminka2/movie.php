<? include("blocks/bd.php"); if(isset($_GET['i'])) {$i=$_GET['i'];}
$result=mysql_query("SELECT title, meta_d,meta_k,text FROM settings WHERE page='movie'", $db); if (!$result)
{echo "<p>запрос не выполнен. код ошибки: </p>"; exit(mysql_error()); }if (mysql_num_rows($result)>0) {$myrow=mysql_fetch_array($result); }
else {	echo "нет записей в таблице"; exit(); }
if (isset($_POST["code"])) { $code= $_POST["code"]; } 
if (isset($_POST['d_files'])) { $d_files=($_POST['d_files']);} ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"> <meta name="description" content="<? echo $myrow['meta_d']; ?>">
<meta name="keywords" content="<? echo $myrow['meta_k']; ?>">
	<title><? echo $myrow["title"]; ?></title>
	<style type="text/css">@import url("style.css");</style></head><body background="img/bg.gif" topmargin="0" leftmargin="0"><table width="690" border="0" cellpadding="0"  cellspacing="0" align="left"><? include ("blocks/header.php"); ?> <tr> <? include ("blocks/lefttd.php"); ?> <td width="100%" valign="top"><? echo $myrow["text"];	
	echo "<center><a href='#' class='sbutton'>&nbsp;&nbsp; 1 &nbsp;&nbsp;</a>
	<a href='#' class='sbutton'>&nbsp;&nbsp; 2 &nbsp;&nbsp;</a>
	<a href='#' class='sbutton'>&nbsp;&nbsp; 3 &nbsp;&nbsp;</a>
	<a href='#' class='sbutton'>&nbsp;&nbsp; 4 &nbsp;&nbsp;</a>
	</center>";  
	 	include("blocks/films.php"); 
	   if ($code=='') { exit(mysql_error()); }
	$result2= mysql_query("SELECT id,title,description,year,actors,d_files,files,prcod FROM movie WHERE prcod='$code'",$db);
	$myrow2=mysql_fetch_array($result2);
if (!$myrow2) {  exit(mysql_error()); } 	 					
		
 printf("<i><table align='center'>
<tr align='center'><td  scope='col'><p><a href='download.php?prcod=%s&files=%s' style='text-decoration:none; color:yellow'> %s</a></p>%s</tr><tr><td><center>дата выхода: %s</center><center>в ролях: %s</center></td></tr></table></i>",$myrow2["prcod"] ,$myrow2["files"], $myrow2["title"],$myrow2["description"],$myrow2["year"],$myrow2["actors"]); ?>
		</center></tr></table></body></html>