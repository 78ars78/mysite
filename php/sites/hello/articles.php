<? include ("blocks/bd.php");
	$result= mysql_query("SELECT title, meta_d, meta_k, text FROM settings WHERE page= 'articles'",$db);
$myrow= mysql_fetch_array($result); ?>
<meta name="description" content="<? echo $myrow['meta_d'] ?>">
<meta name="keywords" content="<? echo $myrow['meta_k'] ?>">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo $myrow['title']?></title>
<style type="text/css">@import url("style.css");</style>
</head> <body>	<table width="690" border="0" align="center" class="main_border">  <tbody>
	  <? include ("blocks/header.php");   ?>
	 <tr>
	 <? include ("blocks/lefttd.php");   ?>
	      <td width="505" valign="top">
	  <?  echo $myrow['text']; ?>
	<?	$result= mysql_query("SELECT id,title,description,author,date FROM articles ",$db);
	$myrow= mysql_fetch_array($result);
	do { printf("
   <table align='center' class='lesson'>
      <tbody><tr align='center'>
    <td class='lesson_title' scope='col'><p  class='lesson_name'>
	<a href='view_article.php?id=%s'>%s</a></p><p class='lesson_adds'>Дата добавления: %s</p><p class='lesson_adds'>      Автор урока : %s</p></td>
     </tr>  <tr align='center'><td>%s</td></tr>
    </tbody></table>", $myrow["id"], $myrow["title"], $myrow["date"],$myrow["author"] ,$myrow["description"]);
	}
   while($myrow=mysql_fetch_array($result));	
	?>	</td>   </tr>   <tr>
     <? include ("blocks/footer.php");	?>	
  </tr>  </tbody> </table></body></html>