<? include ("blocks/bd.php"); include ("lock.php"); 
if (isset($_GET['id'])) {$id = $_GET['id'];} ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"><title>страница изменения урока</title><style type="text/css"> @import url("style.css");</style></head><body>	
<table width="690" border="0" align="center" class="main_border">  <tbody> <? include ("blocks/header.php"); ?>	   
    <tr> <? include ("blocks/lefttd.php");  ?>
	 <td width="505" valign="top"> <p> <?   if (!isset($id)) { $result= mysql_query("SELECT id, title FROM lessons",$db); $myrow=mysql_fetch_array($result);
do { printf ("<p><a href='edit_lesson.php?id=%s'>%s</a></p>", $myrow['id'], $myrow['title']);   }
  while ($myrow=mysql_fetch_array($result)); } else {
	$result= mysql_query("SELECT * FROM lessons WHERE id='$id'",$db); $myrow=mysql_fetch_array($result);
 print <<<HERE
	<form name="form1" action="update_lesson.php" method="post"	<label>введите название урока<br>
    <input value="$myrow[title]" type="text" name="title" id="title" >  </label>  <label>  <br>
   введите краткое описание урока<br>
   <input value="$myrow[meta_d]" type="text" id="meta_d" name="meta_d"><br></label>	введите ключевые слова<br>
	<input value="$myrow[meta_k]" type="text" id="meta_k" name="meta_k"><br>введите дату добавл урока<br>
	<input type="date" value="$myrow[date]" id="date" name="date"><br>   введите описание урока<br>
    <textarea name="description" cols="40" rows="5" maxlength="80" id="description" title="описание">$myrow[description]</textarea><br>	введите текст урока<br>
   <textarea name="text" cols="40" rows="10" maxlength="200" id="text" title="text">$myrow[text]</textarea><br>введите автора<br><input type="text" value="$myrow[author]" id="author" name="author"> <br>
    <input type="hidden" name="id" value="$myrow[id]">
  <input type="submit" name="submit" id="submit"  value="отправить урок в базу"> </form>
HERE;
	}  ?></p></td></tr>	<tr><? include ("blocks/footer.php"); ?></tr></tbody></table></body></html>