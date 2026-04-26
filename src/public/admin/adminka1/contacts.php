<? include ("blocks/bd.php");
$result=mysql_query("SELECT title, meta_d,meta_k,text FROM settings WHERE page='contacts'", $db);
if (!$result)
{echo "<p>запрос не выполнен. код ошибки: </p>";	
 exit(mysql_error()); }
if (mysql_num_rows($result)>0) 
{$myrow=mysql_fetch_array($result); }
else {	echo "нет записей в таблице"; exit(); }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta name="description" content="<? echo $myrow['meta_d']; ?>">
<meta name="keywords" content="<? echo $myrow['meta_k']; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo $myrow["title"]; ?></title>
<style type="text/css">@import url("style.css");
</style>
</head>

<body cellpadding="0" background="img/bg.gif" cellspacing="0" topmargin="0" leftmargin="0">
 
	<table  width="690" border="0" cellpadding="0"  cellspacing="0" align="left"><center>
		<? include ("blocks/header.php"); ?> <tr> <? include ("blocks/lefttd.php"); ?> <td width="100%" align="center" valign="top" class="text"><? echo $myrow["text"]; ?>		
</td></tr><tr><td colspan="2"><hr width="543px" align="center" color="red"></td></tr></center></table></body></html>
