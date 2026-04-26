<? include("blocks/bd.php");
$result=mysql_query("SELECT title, meta_d,meta_k,text FROM settings WHERE page='music'", $db);
$myrow=mysql_fetch_array($result);
if (!$result) {echo "<p>запрос не выполнен. код ошибки: </p>"; exit(mysql_error()); }if (mysql_num_rows($result)>0) {$myrow=mysql_fetch_array($result); }
else {	echo "нет записей в таблице"; exit(); } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta name="description" content="<? echo $myrow['meta_d']; ?>"><meta name="keywords" content="<? echo $myrow['meta_k']; ?>"> <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo $myrow['title']; ?></title>
<style type="text/css">@import url("style.css");
</style></head><body background="img/bg.gif" topmargin="0px" leftmargin="0px"  >
	<table  class="main_border" width="690px" border="0" align="left" cellpadding="0" cellspacing="0">
		<?	include ("blocks/header.php"); ?>
	<tr>
		<?	include ("blocks/lefttd.php"); ?>
<td   width="600px" align="left" valign="top" class="text"><? echo $myrow['text'];
	
	$result2= mysql_query("SELECT id,title,description FROM music ",$db);
	$myrow2=mysql_fetch_array($result2);
if (!$myrow2) {  exit(mysql_error()); } 	 					
	$result=mysql_query("SELECT * FROM music", $db);
	$myrow= mysql_fetch_array($result);
do { printf(" <table align='center' class='lesson'>
      <tbody><tr align='center'>
    <td ><p  class='lesson_name'>
	<a href='view_music.php?id=%s' style='color: yellow;'>%s</a></p><p class='lesson_adds'> </p></td>
     </tr>  <tr align='center' style='color:5px'><td style='color: white;'>%s</td></tr>
    </tbody></table>", $myrow["id"], $myrow["title"], $myrow["description"]);	}
while($myrow=mysql_fetch_array($result));
?></tr><tr><td colspan="2"><hr width="542px" align="center" color="red"></td></tr></table></body></html>
