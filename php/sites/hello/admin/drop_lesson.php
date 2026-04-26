<?  include ("lock.php"); include ("blocks/bd.php"); 
if (isset($_POST['id'])) {$id=$_POST['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>обработчик</title>
<style type="text/css">@import url("style.css");</style></head>
<body><table width="690" border="0" align="center" class="main_border">
  <tbody> <? include ("blocks/header.php"); ?>	   
    <tr> <? include ("blocks/lefttd.php");  ?>
	  <td width="505" valign="top">			 
<?		
  if (isset($id))
	{$result=mysql_query("DELETE FROM lessons WHERE id='$id'");
		if ($result =='true') {echo "удален";}		 
  else { echo "урок не удален";}}
 else {echo "<p>вы запустли данный файл без id.</p>";} ?>			 
	 </td> </tr><tr> <? include ("blocks/footer.php") ?> </tr>
  </tbody></table></body></html>