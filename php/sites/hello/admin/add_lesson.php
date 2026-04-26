<? include ("blocks/bd.php"); include ("lock.php");
if (isset($_POST['title'])) {$title=$_POST['title']; if ($title=='') {unset($title);}}
if (isset($_POST['meta_d'])) {$meta_d=$_POST['meta_d']; if ($meta_d=='') {unset($meta_d);}}
if (isset($_POST['meta_k'])) {$meta_k=$_POST['meta_k']; if ($meta_k=='') {unset($meta_k);}}
if (isset($_POST['date'])) {$date=$_POST['date']; if ($date=='') {unset($date);}}
if (isset($_POST['description'])) {$description=$_POST['description']; if ($description=='') {unset($description);}}
if (isset($_POST['text'])) {$text=$_POST['text']; if ($text=='') {unset($text);}}
if (isset($_POST['author'])) {$author=$_POST['author']; if ($author==''){unset($author);}} ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>обработчик</title>
<style type="text/css">@import url("style.css");</style></head>
<body><table width="690" border="0" align="center" class="main_border">
  <tbody> <? include ("blocks/header.php"); ?>	   
    <tr> <? include ("blocks/lefttd.php");  ?>
	  <td width="505" valign="top">			 
<?	if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author))	
 { 	$result=mysql_query("INSERT INTO lessons (title,meta_d,meta_k,date,description,text,author) VALUES ('$title','$meta_d', '$meta_k','$date','$description','$text','$author')", $db);
		if ($result =='true') {echo "внесено";}		 
			 else { echo "урок не добавлен";}
 }	 else {	 echo "<p>вы ввели не всю информацию.</p> "; } ?>			 
	 </td> </tr><tr> <? include ("blocks/footer.php") ?> </tr>
  </tbody></table></body></html>