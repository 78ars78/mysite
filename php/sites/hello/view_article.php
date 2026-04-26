<? include ("blocks/bd.php");
if (isset($_GET['id'])) { $id=$_GET['id'] ;} if (!preg_match("|^[\d]+$|", $id)) exit ("неверно. проверьте url!");
	$result= mysql_query("SELECT * FROM articles WHERE id=$id",$db);

    $myrow= mysql_fetch_array($result); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta name="description" content="<? echo $myrow['meta_d'] ?> ">
    <meta name="keywords" content="<? echo $myrow['meta_k'] ?>">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo $myrow['title']?></title>
<style type="text/css">@import url("style.css");</style>
</head>
<body>	<table width="690" border="0" align="center" class="main_border">
  <tbody>
  	  <? include ("blocks/header.php");   ?>
    <tr> <? include ("blocks/lefttd.php");   ?>
        <td width="505" valign="top">
	     <p><? echo $myrow['title'] ?></p>
			<p>дата</p><p><? echo $myrow['date'] ?></p>
			<p>автор</p><p><? echo $myrow['author'] ?></p>
  <? echo $myrow['text']	  ?>
	  </td></tr><tr><? include("blocks/footer.php"); ?>	 </tr> </tbody></table></body></html>