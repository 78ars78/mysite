<? include ("lock.php"); include ("blocks/bd.php");
if (isset($_POST['title'])) {$title=$_POST['title']; if ($title=='') {unset($title);}}
if (isset($_POST['meta_d'])) {$meta_d=$_POST['meta_d']; if ($meta_d=='') {unset($meta_d);}}
if (isset($_POST['meta_k'])) {$meta_k=$_POST['meta_k']; if ($meta_k=='') {unset($meta_k);}}
if (isset($_POST['date'])) {$date=$_POST['date']; if ($date=='') {unset($date);}}
if (isset($_POST['description'])) {$description=$_POST['description']; if ($description=='') {unset($description);}}
if (isset($_POST['text'])) {$text=$_POST['text']; if ($text=='') {unset($text);}}
if (isset($_POST['author'])) {$author=$_POST['author']; if ($author==''){unset($author);}}
if (isset($_POST['id'])) {$id=$_POST['id'];}  ?>
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
 { 	$result=mysql_query("UPDATE articles SET title='$title', meta_d='$meta_d', meta_k='$meta_k', date='$date', description='$description', text='$text', author='$author' WHERE id='$id'");
		if ($result =='true') {echo "обновлен";}		 
			 else { echo "статья не обновлена";}
 }	 else {	 echo "<p>вы ввели не всю информацию.</p> "; } ?>			 
	 </td> </tr><tr> <? include ("blocks/footer.php") ?> </tr>
  </tbody></table></body></html>