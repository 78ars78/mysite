<? include ("blocks/bd.php");
if (isset($_GET['id'])) {$id=$_GET['id'];}
if (!preg_match("|^[\d]+$|", $id)) exit ("неверно. проверьте url!");
$result=mysql_query("SELECT * FROM music WHERE id=$id", $db);
$myrow=mysql_fetch_array($result);?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta name="description" content="<? echo $myrow['meta_d']; ?>">
<meta name="keywords" content="<? echo $myrow['meta_k']; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo $myrow['title']; ?></title>
<style type="text/css">@import url("style.css");
</style>
</head>

<body background="img/bg.gif" cellpadding="0px" cellspacing="0px" topmargin="0px" leftmargin="0px" >
 
	<table class="main_border" width="690px" border="0px" align="center" cellpadding="0px" cellspacing="0px">
		
	<?	include ("blocks/header.php"); ?>
	<tr>
		<?	include ("blocks/lefttd.php"); ?>
		
		
		
<td width="600px" align="center" valign="top" class="text"><? echo $myrow['text'] ?>
</td></tr><tr><td colspan="2"><hr width="542px" align="center" color="red"></td></tr></body></html>
